<?php

class PrivilegeModel extends MY_Model {

    //put your code here

    public $_table = 'privileges';
    public $primary_key = 'id';

    public function getUserTypeList($id = null, $user_id) {
        $this->db->select('`roles`.`id`,
                        `roles`.`rolename`,
                        `roles`.`roletype`,
                        `roles`.`roledescription`,
                        `roles`.`group_id`,
                        `roles`.`levelid`,
                        `roles`.`createdby`,
                        `roles`.`modifiedby`,
                        `roles`.`createddate` as `roles_createddate`,
                        `roles`.`modifieddate` as `as roles_modifieddate`,
                        `roles`.`isactive` as `roles_isactive`,                        
                        `groups`.`name`,
                        `groups`.`description`,
                        `groups`.`level`,
                        `groups`.`isactive`,
                        `groups`.`createdby`,
                        `groups`.`createdat`');
        $this->db->from('roles');
        $this->db->join('groups', 'roles.group_id = groups.id', 'left');
//        $this->db->join('privileges', 'privileges.role = roles.id', 'left');
        if (!empty($id)) {
            $this->db->where('roles.id', $id);
        }
        $this->db->group_by('roles.id');
//        $this->db->order_by('privileges_id','desc');
        $query = $this->db->get();

        $user_data = $query->result();
        return $user_data;
    }

    public function getMenuList() {
        $this->db->select('*');
        $this->db->from('menu');
        $query = $this->db->get();
        $user_data = $query->result();
        return $user_data;
    }

    public function checkIfExists($table = NULL, $groupid_and_roleid = array()) {

        $this->db->select('object');
        $this->db->from($table);
        $this->db->where(array('role' => $groupid_and_roleid[1], 'group_id' => $groupid_and_roleid[0]));
        $query = $this->db->get();
//                  $this->db->last_query();
//                $this->db->get_where($table, $unique_Data);        
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function AddPrivileges($table, $data_insert, $id_and_groupid) {
        $check = $this->db->insert_batch($table, $data_insert);
        return $this->db->affected_rows();
    }

    public function update_Privileges($table, $update_data, $groupid_and_roleid) {
        $returnVal = '';

        foreach ($update_data as $update_data_value) {

            $this->db->select('object');
            $this->db->from($table);
            $this->db->where(array('role' => $groupid_and_roleid[1], 'group_id' => $groupid_and_roleid[0], 'object' => $update_data_value['object']));
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $this->db->where(array('role' => $groupid_and_roleid[1], 'group_id' => $groupid_and_roleid[0], 'object' => $update_data_value['object']));
                $returnVa = $this->db->update($table, $update_data_value);
//        if(!$returnVa){
//         $this->db->insert_batch($table, $update_data_value);    
            } else {
                $this->db->insert($table, $update_data_value);
            }
            $returnVal++;
        }

        return $returnVal;
//        }
    }

    public function getUser_privilege_dataList($id = null, $user_id) {
        $this->db->select('`privileges`.`id`,
                        `privileges`.`role`,
                        `privileges`.`group_id`,
                        `privileges`.`object`,
                        `privileges`.`addpermission`,
                        `privileges`.`editpermission`,
                        `privileges`.`deletepermission`,
                        `privileges`.`viewpermission`,
                        `privileges`.`createdby`,
                        `privileges`.`modifiedby`,
                        `privileges`.`createddate`,
                        `privileges`.`modifieddate`,
                        `privileges`.`isactive`');
        $this->db->from('roles');
        $this->db->join('groups', 'roles.group_id = groups.id', 'inner');
        $this->db->join('privileges', 'privileges.role = roles.id', 'inner');
        if (!empty($id)) {
            $this->db->where('roles.id', $id);
        }
        $this->db->group_by('privileges.id');
//        $this->db->order_by('privileges_id','desc');
        $query = $this->db->get();

        $user_data = $query->result();
        return $user_data;
    }

}
