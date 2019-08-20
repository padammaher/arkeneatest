<?php

class ApiModel extends MY_Model {

    //put your code here

    public $_table = 'tbl_app_thirdparty_users';
    public $primary_key = 'id';
    public $where_not_grpid_is_one = "group_id !='1'";

   var $client_service = "frontend-client";
    var $auth_key = "simplerestapi";

    public function check_auth_client() {
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key = $this->input->get_request_header('Auth-Key', TRUE);
        if ($client_service == $this->client_service && $auth_key == $this->auth_key) {
            return true;
        } else {
            return json_output(401, array('status' => 401, 'message' => 'Unauthorized.'));
        }
    }

    function getToken($randomIdLength = 10) {
        $token = '';
        do {
            $bytes = rand($randomIdLength, 2);
            $token .= str_replace(
                    ['.', '/', '='], '', md5($bytes)
            );
        } while (strlen($token) < $randomIdLength);
        return $token;
    }

    public function login($username, $password) {
        $q = $this->db->select('password,id')->from('thirdparty_users')->where('username', $username)->get()->row();
		//echo $this->db->last_query();
        if ($q == "") {
            return array('status' => 204, 'message' => 'Username not found.');
        } else {
            $hashed_password = $q->password;
            $id = $q->id;
            if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
                $last_login = date('Y-m-d H:i:s');
                $token = $this->getToken();
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->trans_start();
                $this->db->where('id', $id)->update('thirdparty_users', array('last_login' => $last_login));
                $this->db->insert('thirdparty_users_authentication', array('users_id' => $id, 'token' => $token, 'expired_at' => $expired_at));
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return array('status' => 500, 'message' => 'Internal server error.');
                } else {
                    $this->db->trans_commit();
                    return $result = array('status' => 200, 'message' => 'Successfully login.', 'id' => $id, 'token' => $token);
                }
            } else {
                return array('status' => 204, 'message' => 'Wrong password.');
            }
        }
    }

    public function logout() {
        $users_id = $this->input->get_request_header('User-ID', TRUE);
        $token = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('users_id', $users_id)->where('token', $token)->delete('thirdparty_users_authentication');
        return array('status' => 200, 'message' => 'Successfully logout.');
    }

    public function auth() {
        $users_id = trim($this->input->get_request_header('User-ID', TRUE));
        $token = trim($this->input->get_request_header('Authorization', TRUE));

        $q = $this->db->select('expired_at')->from('thirdparty_users_authentication')->where('users_id', $users_id)->where('token', $token)->get()->row();

        if ($q == "") {
            return json_output(401, array('status' => 401, 'message' => 'Unauthorized.'));
        } else {
            if ($q->expired_at < date('Y-m-d H:i:s')) {
                return json_output(401, array('status' => 401, 'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('users_id', $users_id)->where('token', $token)->update('thirdparty_users_authentication', array('expired_at' => $expired_at, 'updated_at' => $updated_at));
                return array('status' => 200, 'message' => 'Authorized.');
            }
        }
    }

 



    public function temp_create_data($data) {
        $this->db->insert('temp_data', $data);
        return array('status' => 201, 'message' => 'Data has been inserted.');
    }


    function base64_to_jpeg($base64_string, $output_file) {
        $ifp = fopen($output_file, 'wb');

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode(',', $base64_string);

        // we could add validation here with ensuring count( $data ) > 1
        fwrite($ifp, base64_decode($data[1]));

        // clean up the file resource
        fclose($ifp);

        return $output_file;
    }

    function genRandomString() {
        $length = 5;
        $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWZYZ";

        $real_string_length = strlen($characters);
        $string = "id";

        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, $real_string_length - 1)];
        }

        return strtolower($string);
    }




}
