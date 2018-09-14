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
          return   $this->db->update('asset', $assets_data);
        }
    }
 public function checkUnique($table = NULL, $data = array()) {
        $query = $this->db->get_where($table, $data);
//        echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_assets($id1) {
        // var_dump($id);die;

        $this->db->where('asset.id', $id1);
      return  $this->db->delete('asset');
    }

    public function assets_list() {
    
            $this->db->select('asset.id,asset.code,asset_user.id as `asset_user_tbl_id,branch_user.client_name,branch_user.client_username,asset_location.id as locid,asset_location.location,asset_category.id as asset_catid, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename, CONCAT(users.first_name," ",users.last_name) AS first_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');
    //    $this->db->select('asset.id,asset.code,asset_user.id as `asset_user_tbl_id`,asset_location.id as locid,asset_location.location,asset_category.id as asset_catid, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');            
      $this->db->from('asset');
       $this->db->join('asset_location', 'asset_location.asset_id= asset.id','left');
        $this->db->join('asset_user', 'asset_user.asset_id= asset.id','left');
        $this->db->join('branch_user', 'branch_user.id= asset_user.assetuser_id','left');
        $this->db->join('asset_category', 'asset_category.id= asset.asset_catid');
        $this->db->join('asset_type', 'asset_type.id= asset.asset_typeid');
        $this->db->join('users', 'users.id=asset.createdby');
//        $this->db->group_by('asset.id');
        if (isset($id) && $id !== NULL) {
            $this->db->where('asset.id', $id);
        }
        $query = $this->db->get();
        $assets_list = $query->result_array();
        return $assets_list;
    }

//    public function get_assets($id) {
//        $this->db->select('asset.id,asset.code,asset_location.location,asset_category.name as assetcategoryname,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable,branch_user.client_name');
//        $this->db->from('asset');
//        $this->db->join('asset_location', 'asset_location.id= asset.customer_locationid', 'left');
//        $this->db->join('asset_user', 'asset_user.asset_id= asset.id', 'left');
//        $this->db->join('branch_user', 'asset_user.assetuser_id= branch_user.id', 'left');
//        $this->db->join('asset_category', 'asset_category.id= asset.asset_catid');
//        $this->db->join('asset_type', 'asset_type.id= asset.asset_typeid');
//        $this->db->join('users', 'users.id=asset.createdby');
//        $this->db->where('asset.id', $id);
////        $this->db->group_by('asset.id');
//        $query = $this->db->get();
//        $asset = $query->result_array();
//        return $asset;
//    }

    public function Asset_edit($edit_asset_list_id) {
        $this->db->select('asset.id,asset.code,asset_location.id as locid,asset_location.location,asset_category.id as asset_catid,asset.isactive, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');
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
        $this->db->select('asset_location.id,
                                asset_location.location,
                                asset_location.address,
                                asset_location.latitude,
                                asset_location.contact_no,
                                asset_location.longitude,
                                asset_location.contact_person,
                                asset_location.contact_email,
                                asset_location.createdat,
                                asset_location.createdby,
                                asset_location.isactive,
                                asset.id as `asset_tbl_id`,asset.code,branch_user.id as `branch_user_id`,asset_user.id as `asset_user_tbl_id`');
        $this->db->from('asset_location');
        $this->db->join('asset', 'asset.id=asset_location.asset_id', 'inner');
        $this->db->join('asset_user', 'asset_user.asset_id=asset.id', 'inner');
        $this->db->join('branch_user', 'branch_user.id=asset_user.assetuser_id', 'inner');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function edit_assets_location($asset_loc_id) {
        $this->db->select('asset_location.id,
                                asset_location.location,
                                asset_location.address,
                                asset_location.latitude,
                                asset_location.contact_no,
                                asset_location.longitude,
                                asset_location.contact_person,
                                asset_location.contact_email,
                                asset_location.createdat,
                                asset_location.createdby,
                                asset_location.isactive,
                                asset.id as `asset_tbl_id`,asset.code');
        $this->db->from('asset_location');
        $this->db->join('asset', 'asset.id=asset_location.asset_id', 'inner');
        $this->db->where('asset_location.id', $asset_loc_id);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function add_assets_location($insert_data) {
        $table = 'asset_location';
        $check = $this->db->insert($table, $insert_data);
        return $this->db->insert_id();
    }

    public function Delete_asset_location($asset_loc_id) {
        $this->db->where(array('id' => $asset_loc_id));
        return $this->db->delete('asset_location');
    }

    public function Update_asset_location($update_data, $asset_loc_id) {
        //  var_dump($assets_data,$edit_asset_list_id);die;
//        if ($update_data != null) {
        $this->db->where('id', $asset_loc_id);
        return $this->db->update('asset_location', $update_data);
//        }
    }

    public function asset_user_list() {

        $this->db->select('asset_user.id,
                                    asset.id as `asset_tbl_id`,
                                    asset.`code`,
                                    branch_user.id as `branch_user_tbl_id`,
                                    branch_user.client_name,
                                    asset_user.createdate');
        $this->db->from('asset_user');
        $this->db->join('asset', 'asset.id = asset_user.asset_id', 'inner');
        $this->db->join('branch_user', 'branch_user.id = asset_user.assetuser_id', 'inner');
        $this->db->where('branch_user.status', 1);
        $query = $this->db->get();
        // echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

    public function assetcode_list() {
        $this->db->select('id,code');
        $this->db->from('asset');
        $this->db->where('isactive', 1);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function asset_userid_list() {
        $this->db->select('id,client_name');
        $this->db->from('branch_user');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function add_asset_user($insert_data) {
        $table = 'asset_user';
        $check = $this->db->insert($table, $insert_data);
        return $this->db->insert_id();
    }

    public function edit_assets_user($asset_user_tbl_id) {

        $this->db->select('asset_user.id,
                                    asset.id as `asset_tbl_id`,
                                    asset.`code`,
                                    branch_user.id as `branch_user_tbl_id`,
                                    branch_user.client_name,
                                    asset_user.createdate');
        $this->db->from('asset_user');
        $this->db->join('asset', 'asset.id = asset_user.asset_id', 'inner');
        $this->db->join('branch_user', 'branch_user.id = asset_user.assetuser_id', 'inner');
        $this->db->where('asset_user.id', $asset_user_tbl_id);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function update_asset_user($update_data, $id) {
        //  var_dump($assets_data,$edit_asset_list_id);die;
//        if ($assets_data != null) {
        $this->db->where('id', $id);
        return $this->db->update('asset_user', $update_data);
//        }
    }

    public function delete_asset_user($asset_user_id) {
        $this->db->where(array('id' => $asset_user_id));
        return $this->db->delete('asset_user');
    }

    public function parameter_range_list($asset_id) {
        $this->db->select('parameter_range.id,parameter_range.name,min_value,max_value,scaling_factor,uom.name as uom,bits_per_sign');
        $this->db->from('parameter_range');
        $this->db->join('uom', 'parameter_range.uom_id=uom.id');
        $this->db->where(array('asset_id' => $asset_id, 'parameter_range.isactive' => 1));
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function checkassetcodeIfExists($table = NULL, $unique_Data = array()) {
        //var_dump($table,$unique_Data);die;
        $query = $this->db->get_where($table, $unique_Data);
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function checkasset_locationIfExists($table = NULL, $unique_Data = array()) {
        //var_dump($table,$unique_Data);die;
        $query = $this->db->get_where($table, $unique_Data);
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function parameter_uom($param_id) {
        $this->db->select('uom.id,uom.name,parameter.id as paramid');
        $this->db->from('parameter');
        $this->db->join('uom_type', 'uom_type.id=parameter.uom_type_id');
        $this->db->join('uom', 'uom_type.uom_id=uom.id');
        $this->db->where('parameter.id', $param_id);
        $this->db->where('uom.isactive', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
//    ****----- add trigger data --**************
       public function add_trigger($trigger_input_data) {
        $table = 'trigger';
        $check = $this->db->insert($table, $trigger_input_data);
        return $this->db->insert_id();
    }
    
     public function trigger_list($user_id,$asset_id) {
 
    $this->db->select( 'trigger.id,
                        trigger.rule_id,
                        trigger.asset_id,
                        trigger.trigger_name,
                        trigger.trigger_threshold_id,
                        trigger.email,
                        trigger.sms_contact_no,
                        trigger.createdate,
                        trigger.createby');
        $this->db->from('trigger');        
        $this->db->where(array('trigger.asset_id'=>$asset_id,'trigger.createby'=>$user_id));
//        $this->db->where('trigger.isactive', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
     }
     
     
    public function edit_trigger_list($user_id,$asset_id,$trigger_post_id) {
 
                $this->db->select( 'trigger.id,
                                    trigger.rule_id,
                                    trigger.asset_id,
                                    trigger.trigger_name,
                                    trigger.trigger_threshold_id,
                                    trigger.email,
                                    trigger.sms_contact_no,
                                    trigger.createdate,
                                    trigger.createby');
                    $this->db->from('trigger');        
                    $this->db->where(array('trigger.asset_id'=>$asset_id,'trigger.createby'=>$user_id,'trigger.id'=>$trigger_post_id));
            //        $this->db->where('trigger.isactive', 1);
                    $query = $this->db->get();
                    $result = $query->result_array();
                    return $result;
     }
     
     
        public function update_trigger($trigger_input_data,$trigger_post_id) {
        
        $this->db->where('id', $trigger_post_id);
        return $this->db->update('trigger', $trigger_input_data);

    }
        public function delete_trigger($trigger_post_id) {
        $this->db->where(array('id' => $trigger_post_id));
        return $this->db->delete('trigger');
    }
  

     
     public function Trigger_threshold($asset_id,$rule_id) {
         $this->db->select('trigger.id,trigger.trigger_threshold_id');
         $this->db->from('trigger');
         $this->db->where(array('trigger.asset_id'=>$asset_id,'trigger.rule_id'=>$rule_id,'isactive'=>1));
         $result=$this->db->get()->result();
//         $result=$query->resut_array();
         return $result;
//         $this->db->query('')
//         $query="SELECT asset_parameter_rule.id AS `asset_parameter_rule_tbl_id`,
//                        asset_parameter_rule.green_value,
//                        asset_parameter_rule.orange_value,
//                        asset_parameter_rule.red_value,
//                        parameter_range.id as parameter_range_tbl_id
//                FROM asset_parameter_rule
//                    inner join parameter_range on parameter_range.id=asset_parameter_rule.parameter_range_id
//                    where asset_parameter_rule.rule_status='1' and parameter_range.isactive='1' and parameter_range.asset_id=".$asset_id." 
//                    and asset_parameter_rule.id not in(select  `trigger`.`rule_id` from `trigger` where `trigger`.`asset_id` = '63' and `trigger`.`rule_id`= asset_parameter_rule.id)";
//        $res = $this->db->query($query);
//        return $obj = $res->result_array();         
     }
    
    


}
