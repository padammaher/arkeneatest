<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Assets extends MY_Model {

    public $_table = 'asset';
    public $primary_key = 'id';

    protected function data_process($row) {
        $row[$this->callback_parameters[0]] = $this->_process($row[$this->callback_parameters[0]]);

        return $row;
    }

    public function add_assets($assets_data) {
        // var_dump($assets_data);die;
        if ($assets_data != null) {
            return $this->insert($assets_data);
        } else
            return false;
    }

    public function update_assets($assets_data, $id) {
        //  var_dump($assets_data,$edit_asset_list_id);die;
        if ($assets_data != null) {
            $this->db->where('asset.id', $id);
            $this->db->update('asset', $assets_data);
        }
    }

    public function delete_assets($id1) {
       // var_dump($id);die;
     
            $this->db->where('asset.id', $id1);
            $this->db->delete('asset');
        
    }

    public function assets_list() {
        $this->db->select('asset.id,asset.code,asset_location.id as locid,asset_location.location,asset_category.id as asset_catid, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');
        $this->db->from('asset');
        $this->db->join('asset_location', 'asset_location.id= asset.customer_locationid');
        $this->db->join('asset_category', 'asset_category.id= asset.asset_catid');
        $this->db->join('asset_type', 'asset_type.id= asset.asset_typeid');
        $this->db->join('users', 'users.id=asset.createdby');
        $query = $this->db->get();
        $assets_list = $query->result_array();
        return $assets_list;
    }

    public function Asset_edit($edit_asset_list_id) {
        $this->db->select('asset.id,asset.code,asset_location.id as locid,asset_location.location,asset_category.id as asset_catid, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');
        // $this->db->select('asset.id,asset.code,asset_location.location,asset_location.id as locid,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');
        $this->db->from('asset');
        $this->db->join('asset_location', 'asset_location.id= asset.customer_locationid');
        $this->db->join('asset_category', 'asset_category.id= asset.asset_catid');
        $this->db->join('asset_type', 'asset_type.id= asset.asset_typeid');
        $this->db->join('users', 'users.id=asset.createdby');
        $this->db->where('asset.id', $edit_asset_list_id);
        $query = $this->db->get();
        $assets_list = $query->result_array();
        return $assets_list;
    }

    public function CustomerLocation_list() {
        $this->db->select('id,location');
        $this->db->from('asset_location');
        $this->db->where('isactive', 1);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }
    
     public function AssetCategory_list() {
        $this->db->select('id,name');
        $this->db->from('asset_category');
        $this->db->where('isactive', 1);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }
   public function AssetType_list() {
        $this->db->select('id,name');
        $this->db->from('asset_type');
        $this->db->where('isactive', 1);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }
    
          public function assets_location_list() {
            $this->db->select('id,
                                location,
                                address,
                                latitude,
                                contact_no,
                                longitude,
                                contact_person,
                                contact_email,
                                createdat,
                                createdby,
                                isactive');
        $this->db->from('asset_location');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    } 
    
            public function edit_assets_location($asset_loc_id) {
            $this->db->select('id,
                                location,
                                address,
                                latitude,
                                contact_no,
                                longitude,
                                contact_person,
                                contact_email,
                                createdat,
                                createdby,
                                isactive');
        $this->db->from('asset_location');
        $this->db->where('id',$asset_loc_id);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    } 
        public function add_assets_location($insert_data) {
            $table='asset_location';            
            $check = $this->db->insert($table, $insert_data);
            return $this->db->insert_id();
    }
    
            public function Delete_asset_location($asset_loc_id) {
            $this->db->where(array('id'=>$asset_loc_id));
             return  $this->db->delete('asset_location');
    }
    
    
        public function Update_asset_location($update_data, $asset_loc_id) {
        //  var_dump($assets_data,$edit_asset_list_id);die;
//        if ($update_data != null) {
            $this->db->where('id', $asset_loc_id);
           return $this->db->update('asset_location', $update_data);
//        }
    }
}
