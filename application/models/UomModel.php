<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UomModel extends MY_Model {

//    public $_table = '';
//    public $primary_key = 'id';
//    protected $soft_delete = true;
//    protected $soft_delete_key = 'isactive';


    function get_uomtypes($user_id) {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('uom_type.id,uom_type.name,uom.isactive,uom_type.createdby');
        $this->db->from('uom_type');
        $this->db->join('uom', 'uom_type.id=uom.uom_type_id');
        $this->db->where(array('uom_type.createdby' => $user_id, 'uom_type.isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();
        if ($result) {
            foreach ($result as $key => $value) {
                $result[$key]['uomlist'] = $this->get_uom_data($value['id']);
            }
        }
        return $result;
    }

    public function get_uom_data($uom_type_id) {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('id,name,isactive,isdeleted');
        $this->db->from('uom');
        $this->db->where(array('uom_type_id' => $uom_type_id, 'uom.createdby' => $user_id, 'uom.isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function get_uom_list($user_id) {

        $this->db->select('uom.id,uom_type.name,uom.name as uomname,uom_type.isactive');
        $this->db->from('uom_type');
        $this->db->where(array('uom_type.createdby' => $user_id, 'uom.isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_uom($id, $type = "normal", $type_id = '') {
        $this->db->select('uom.id,uom.name');
        $this->db->from('uom');
        $this->db->where(array('createdby' => $id, 'isactive' => 1));
        if ($type_id) {
            $this->db->where('uom_type_id', $type_id);
        }
        $query = $this->db->get();

        if ($type == "json") {
            foreach ($query->result_array() as $k => $row) {
                $row_set[$k]['id'] = htmlentities(stripslashes($row['id']));
                $row_set[$k]['name'] = htmlentities(stripslashes($row['name']));
            }
            echo json_encode($row_set);
        } else {
            $result = $query->result_array();
            return $result;
        }
    }

    public function uom_types($user_id, $id = null) {
        $this->db->distinct();
        $this->db->select('uom_type.id,uom_type.name,uom_type.isactive');
        $this->db->from('uom_type');
        $this->db->where(array('isdeleted' => 0, 'uom_type.createdby' => $user_id));
        if ($id) {
            $this->db->where('uom_type.id', $id);
        }
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function insert_uom($uom_data) {
        $this->db->insert('uom', $uom_data);
        return $this->db->affected_rows();
    }

    function update_uom($id, $uom_data) {
//        $uomtype = $this->db->from('uom')->where('id', $id)->get()->result();
//        if (count($uomtype) == 1) {
        $this->db->where('uom.id', $id);
        $this->db->update('uom', $uom_data);
        return $this->db->affected_rows();
    }

    function insert_uom_type($data) {
        $alreadyexit = $this->db->from('uom_type')->where('name', $data['name'])->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('uom_type', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function uomtype_update($id, $data) {
//        $alreadyexit = $this->db->from('uom_type')->where('name', $data['name'])->get()->result();
//        if (count($alreadyexit) == 1) {
        $this->db->where('id', $id);
        $this->db->update('uom_type', $data);
        return $this->db->affected_rows();
//        } else {
//            return 'duplicate';
//        }
    }

    function get_uom_type($id) {
        $this->db->select('uom_type.id,uom_type.name,uom.isactive');
        $this->db->from('uom_type');
        $this->db->join('uom', 'uom_type.id=uom.uom_type_id');
        $this->db->where('uom_type.id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($result) {
            foreach ($result as $key => $value) {
                $result[$key]['uomlist'] = $this->get_uom_data($value['id']);
            }
        }
        return $result;
    }

    public function get_uom_exitst($uom_name) {
        $result1 = $this->db->from('uom')->where('name', $uom_name)->get()->result();
        if ($result1) {
            return $result1;
        } else {
            return false;
        }
    }

    public function delete_uom($id) {
        $this->db->where('uom_type_id', $id);
        $this->db->delete('uom');
        return true;
    }

    public function check_exist_uom($uom_type_id, $uom_name) {
        $this->db->select('id,name,isactive');
        $this->db->from('uom');
        $this->db->where(array('uom.uom_type_id' => $uom_type_id, 'uom.name' => $uom_name, 'isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update_uom_record($id, $uom_name, $data) {
        $this->db->where(array('uom.uom_type_id' => $id, 'uom.name' => $uom_name));
        $this->db->update('uom', $data);
        return $this->db->affected_rows();
    }

    public function delete_uom_record($id, $data) {     //print_r($id); exit(); 
        $this->db->where('uom_type_id', $id);
        $this->db->update('uom', $data);
        return $this->db->affected_rows();
    }

    function get_uomlistrecords($id = null) {
        $user_id = $this->session->userdata('user_id');
        $this->db->select("uom_type.id,uom_type.name,uom_type.isactive,uom.isactive as active,uom_type.createdby,GROUP_CONCAT(uom.name) as uomnames");
//        $this->db->select("uom_type.id,uom_type.name,uom_type.isactive,uom_type.createdby,GROUP_CONCAT(uom.name,':',uom.id) as uomnames");
        $this->db->from('uom_type');
        $this->db->join('uom', 'uom_type.id=uom.uom_type_id');
        $this->db->where(array('uom.isdeleted' => 0, 'uom.createdby' => $user_id));
        if ($id) {
            $this->db->where('uom_type.id', $id);
        }
        $this->db->group_by('uom_type.id');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function uom_type($id) {
        $this->db->select('uom_type.id,uom_type.name,uom.isactive');
        $this->db->from('uom_type');
        $this->db->join('uom', 'uom_type.id=uom.uom_type_id');
        $this->db->where('uom_type.id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($result) {
            foreach ($result as $key => $value) {
                $result[$key]['uomlist'] = $this->get_uom_data($value['id']);
            }
        }
        return $result;
    }

    function check_uomtype_in_use($id) {
        $this->db->select('uom_type.id,parameter.id as paramid');
        $this->db->join('parameter', 'uom_type.id=parameter.uom_type_id');
        $this->db->where(array('uom_type.id' => $id, 'parameter.isactive' => 1, 'parameter.isdeleted' => 0));
        $result = $this->db->get('uom_type')->result();

        if (count($result) > 0) {
            return count($result);
        } else {
            $this->db->select('uom_type.id,uom.id as uomid');
            $this->db->join('uom', 'uom_type.id=uom.uom_type_id');
            $this->db->where(array('uom_type.id' => $id, 'uom.isactive' => 1, 'uom.isdeleted' => 0));
            $result1 = $this->db->get('uom_type')->result();
            return count($result1);
        }
    }

    function check_uom_in_use($id) {
        $this->db->select('uom.id,parameter_range.id as paramrangeid,uom.uom_type_id');
        $this->db->join('parameter_range', 'uom.id=parameter_range.uom_id');
        $this->db->where('uom.uom_type_id', $id);
        $this->db->where(array('parameter_range.isactive' => 1, 'parameter_range.isdeleted' => 0, 'uom.isdeleted' => 0));
        $result = $this->db->get('uom')->result();

        if (count($result) > 0) {
            return count($result);
        } else {
            $this->db->select('uom.id,sensor_inventory.id as sensin_id,uom.uom_type_id');
            $this->db->join('sensor_inventory', 'uom.id=sensor_inventory.uom_type_id');
            $this->db->where(array('uom.uom_type_id' => $id, 'sensor_inventory.isactive' => 1, 'sensor_inventory.isdeleted' => 0, 'uom.isdeleted' => 0));
            $result1 = $this->db->get('uom')->result();
            return count($result1);
        }
    }

    function getUOM() {
        $this->db->select('uom.id,uom.name,iconpath');
        $this->db->where(array('isactive' => 1, 'isdeleted' => 0));
        $result = $this->db->get('uom')->result_array();
        return $result;
    }

    function update_uom_icon($uom_id, $data) {
        if (isset($data, $uom_id) && !empty($data)) {
            $this->db->where('id', $uom_id);
            $this->db->update('uom', $data);
            return $this->db->affected_rows();
        }
    }

}
