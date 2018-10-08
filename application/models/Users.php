<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author admin
 */
class Users extends MY_Model {

    //put your code here

    public $_table = 'users';
    public $primary_key = 'id';

    function get_slug_by_id($id) {
        if ($id != null) {
            $obj = $this->db->select('salt')->get_where('main_users', array('id' => $id))->row();
            if (isset($obj)) {
                return $obj->salt;
            }
        }

        return null;
    }

    public function get_allData($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        $objData = $query->result_array();
        if ($objData) {
            $objData[0]['menulist'] = $this->get_menu_list();
        }
        if (isset($objData)) {
            $group_id = $objData[0]['group_id'];
            if ($group_id != 1) {
                $objData[0]['admin_company_logo'] = $this->get_company_logo();
            }
        }
        return $objData[0];
    }

    public function update_user_group_id($group_data) {
        $this->db->set('group_id', $group_data['group_id']);
        $this->db->where('id', $group_data['user_id']);
        $this->db->update('main_users');
    }

    public function update_user_status_id($id) {

        if (isset($id) && $id != NULL) {
            $this->db->set('isactive', '5');
            $this->db->where('id', $id);
            $this->db->update('main_users');
            return true;
        } else {
            return false;
        }
    }

    public function check_email($email_id) {

        $result = $this->db->select('email')->get_where('main_users', array('email' => $email_id))->row();
        if (isset($result))
            return FALSE;
        else
            return TRUE;
    }

    public function get_menu_list() {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('menu.id,menu.menuName,menu.url,menu.parent,menu.nav_ids,menu.iconPath'); //,groups.name,groups.id as group_id
        $this->db->from('menu');
        $this->db->where('menu.sidebar_flag', 1);
        $this->db->where('isactive', 1);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_permissions($menu) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('id');
        $this->db->where('group_id', $group_id);
        $roleData = $this->db->get('roles')->result();
        if (count($roleData) > 0) {
            $role_id = $roleData[0]->id;
        }
        if (isset($role_id, $group_id)) {
            $this->db->select('privileges.id,role,privileges.group_id,object,addpermission,editpermission,deletepermission,'
                    . 'viewpermission,privileges.isactive,menu.menuName');
            $this->db->join('menu', 'privileges.object=menu.id');
            $this->db->where(array('privileges.isactive' => 1, 'privileges.group_id' => $group_id, 'privileges.role' => $role_id));
            if (is_array($menu) && !empty($menu)) {
                $this->db->where_in('menu.menuName', $menu);
            } else {
                $this->db->where('menu.menuName', $menu);
            }
            $result = $this->db->get('privileges')->result();
            return $result;
        }
    }

    public function get_company_logo() {
        $this->db->select('company_logo');
        $this->db->from('users');
        $this->db->where('group_id', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
