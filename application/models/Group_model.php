<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Group_model extends MY_Model {

    public $_table = 'groups';
    public $primary_key = 'id';
    public $belongs_to = array('country', 'state');
    public $before_create = array('timestamps_bc');

    function get_level($group_id) {

        $result = $this->db->get_where('main_groups', array('id' => $group_id))->row();
        return $result->level;
        //echo $this->db->last_query();exit;
    }

    public function get_allGroupData() {
        $this->db->select('*');
        $this->db->from('groups');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function get_role($id) {
        $this->db->select('name');
        $this->db->from('groups');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $objData = $query->result_array();
      //  var_dump($objData);
        return $objData[0];
    }

    public function getroles($current_user_id) {
        $this->db->select('group_id');
        $this->db->from('users_groups');
        $this->db->where('user_id', $current_user_id);
        $query = $this->db->get();
        $objData = $query->result_array();
        foreach ($objData as $k => $v) {
            $objData[$k]['role'] = $this->get_role($v['group_id']);
        }
        return $objData;
    }

}
