<?php

class PrivilegeModel extends MY_Model {

    //put your code here

    public $_table = 'privileges';
    public $primary_key = 'id';

public function getUserTypeList()
{
     $this->db->select('*');
        $this->db->from('roles');
        $this->db->join('groups', 'roles.group_id = groups.id', 'left');
        $query = $this->db->get();
        $user_data = $query->result();
        return $user_data;
}
public function getMenuList()
{
        $this->db->select('*');
        $this->db->from('menu');
        $query = $this->db->get();
        $user_data = $query->result();
        return $user_data;
}

}
