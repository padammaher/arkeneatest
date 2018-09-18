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
            return $this->db->update('asset', $assets_data);
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
        return $this->db->delete('asset');
    }

    public function assets_list($user_id, $id = NULL) {

        $this->db->select('asset.id,asset.code,asset_user.id as `asset_user_tbl_id,branch_user.client_name,branch_user.client_username,customer_business_location.id as locid,customer_business_location.location_name as location,asset_category.id as asset_catid, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename, CONCAT(users.first_name," ",users.last_name) AS first_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');
        //    $this->db->select('asset.id,asset.code,asset_user.id as `asset_user_tbl_id`,asset_location.id as locid,asset_location.location,asset_category.id as asset_catid, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');            
        $this->db->from('asset');
        $this->db->join('customer_business_location', 'customer_business_location.id= asset.customer_locationid', 'left');
        $this->db->join('asset_user', 'asset_user.asset_id= asset.id', 'left');
        $this->db->join('branch_user', 'branch_user.id= asset_user.assetuser_id', 'left');
        $this->db->join('asset_category', 'asset_category.id= asset.asset_catid');
        $this->db->join('asset_type', 'asset_type.id= asset.asset_typeid');
        $this->db->join('users', 'users.id=asset.createdby');
//        $this->db->group_by('asset.id');
        if (isset($id) && $id !== NULL) {
            $this->db->where('asset.id', $id);
        }
        $this->db->where('asset.createdby', $user_id);
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
        $this->db->select('asset.id,asset.code,customer_business_location.id as locid,customer_business_location.location_name as location,asset_category.id as asset_catid,asset.isactive, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');
        // $this->db->select('asset.id,asset.code,asset_location.location,asset_location.id as locid,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');
        $this->db->from('asset');
        $this->db->join('customer_business_location', 'customer_business_location.id= asset.customer_locationid', 'left');
        $this->db->join('asset_category', 'asset_category.id= asset.asset_catid');
        $this->db->join('asset_type', 'asset_type.id= asset.asset_typeid');
        $this->db->join('users', 'users.id=asset.createdby');
        $this->db->where('asset.id', $edit_asset_list_id);
        $query = $this->db->get();
        $assets_list = $query->result_array();
        return $assets_list;
    }

    public function CustomerLocation_list($user_id) {
        $this->db->select('id,location_name');
        $this->db->from('customer_business_location');
        $this->db->where('user_id', $user_id);
        $this->db->group_by('id');
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

    public function AssetCategory_list($user_id) {
        $this->db->select('id,name');
        $this->db->from('asset_category');
        $this->db->where('isactive', 1);
        $this->db->where('createdby', $user_id);        
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function AssetType_list($user_id) {
        $this->db->select('id,name');
        $this->db->from('asset_type');
        $this->db->where('isactive', 1);
        $this->db->where('createdby', $user_id);        
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function assets_location_list($user_id) {
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
        $this->db->join('asset_user', 'asset_user.asset_id=asset.id', 'left');
        $this->db->join('branch_user', 'branch_user.id=asset_user.assetuser_id', 'left');
        $this->db->where('asset_location.createdby', $user_id);
        $query = $this->db->get();
        // echo  $this->db->last_query();
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

    public function assetcode_list($user_id) {
        $this->db->select('id,code');
        $this->db->from('asset');
        $this->db->where('isactive', 1);
        $this->db->where('createdby', $user_id);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

    public function assetcode_list_for_asset_location($user_id) {
        $query = "SELECT asset.id,asset.code FROM asset
                where asset.createdby=" . $user_id . " and id not in(select asset_id from asset_location)";
        $res = $this->db->query($query);
        return $obj = $res->result_array();
    }

    public function asset_userid_list() {
        $this->db->select('id,client_name');
        $this->db->from('branch_user');
        $this->db->where('status', 1);
        // $this->db->where('isactive', 1);
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

    public function parameter_range_list($asset_id, $param_range_id = NULL) {
        $this->db->select('parameter_range.id,parameter.name as parameter,parameter.id as param_id,min_value,max_value,scaling_factor,uom.name as uom,uom_id,bits_per_sign');
        $this->db->from('parameter_range');
        $this->db->join('parameter', 'parameter_range.parameter_id=parameter.id');
        $this->db->join('uom', 'parameter_range.uom_id=uom.id');
        if (isset($param_range_id) && $param_range_id !== NULL) {
            $this->db->where('parameter_range.id', $param_range_id);
        }
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

    public function add_asset_rule_detail($data, $parameter_range_id = '') {

        // $alreadyexist = $this->db->from('asset_parameter_rule')->where('parameter_range_id', $parameter_range_id)->get()->result();
        // if (!$alreadyexist) {
        $this->db->insert('asset_parameter_rule', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
        //} else {
        //    return false;
        //}
    }

    public function update_asset_rule_detail($data, $asset_rule_id) {

        $this->db->where('id', $asset_rule_id);
        $this->db->update('asset_parameter_rule', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return false;
        }

        // $alreadyexist=$this->db->from('asset_parameter_rule')->where('parameter_range_id',$parameter_range_id)->get()->result();
        // if(!$alreadyexist){
        //     $this->db->insert('asset_parameter_rule', $data); 
        //     $insert_id= $this->db->insert_id();
        //     return $insert_id; 
        // }else{
        //     return false;
        // }
    }

    public function get_asset_rule_list($parameter_range_id='') { //
        $asset_data = $this->db->from('asset_parameter_rule')->where('parameter_range_id', $parameter_range_id)->get()->result();
        if ($asset_data)
            return $asset_data;
        else
            return false;
    }

    public function get_asset_details($asset_rule_id) {
        $asset_rule_data = $this->db->from('asset_parameter_rule')->where('id', $asset_rule_id)->get()->result();
        if ($asset_rule_data) {
            return $asset_rule_data;
        } else {
            return false;
        }
    }

    public function delete_asset_rule($asset_rule_id) {
        $this->db->where('id', $asset_rule_id);
        $this->db->delete('asset_parameter_rule');
        return true;
    }
    public function get_asset_id($parameter_id){
        $this->db->select('asset_id');
        $this->db->from('parameter_range');
        $this->db->where('parameter_range.id', $parameter_id);
        $query = $this->db->get();
        $asset_id= $query->result_array();   
        
        return  $asset_id[0]['asset_id']; 
    }

    public function get_parameter_range($parameter_id){
        $this->db->select('asset.id,asset.customer_locationid,asset.code,asset.specification,parameter_range.uom_id,parameter_range.parameter_id,parameter_range.min_value,parameter_range.max_value,parameter_range.scaling_factor,parameter_range.bits_per_sign');
        $this->db->from('parameter_range');
        $this->db->join('asset', 'parameter_range.asset_id = asset.id', 'left');
        $this->db->where('parameter_range.id', $parameter_id);
        $query = $this->db->get();
        $asset_data = $query->result_array();

       // print_r($asset_data[0]['customer_locationid']); exit(); 
        if ($query->num_rows() > 0) {
            foreach ($asset_data as $key => $value) {
               $asset_location= $this->get_asset_location($value['customer_locationid']); 
                if(isset($asset_location[0]['location']))
                $asset_data[$key]['location']=$asset_location[0]['location'];

                if(isset($asset_location[0]['address']))
                $asset_data[$key]['address']=$asset_location[0]['address'];

                $param_name = $this->get_paramiter_name($value['parameter_id']);
                $uom_name = $this->get_uom_name($value['uom_id']);
                if ($param_name) {
                    $asset_data[$key]['param_name'] = $param_name[0]['name'];
                }
                if ($uom_name)
                    $asset_data[$key]['uom_name'] = $uom_name[0]['name'];
            }
            if($asset_data) {
                return $asset_data;
            } else {
                return false;
            }
        }

    }
    public function get_asset_location($location_id){
        $this->db->select('asset_location.location,asset_location.address');
        $this->db->from('asset_location');
        $this->db->where('asset_location.id', $location_id);
        $query = $this->db->get();
        $location_data = $query->result_array();
        return $location_data;
    }

    // public function get_parameter_range($asset_id) {

    //     $this->db->select('asset.id,asset.code,asset.specification,parameter_range.uom_id,parameter_range.parameter_id,parameter_range.min_value,parameter_range.max_value,parameter_range.scaling_factor,parameter_range.bits_per_sign,asset_location.location,asset_location.address');
    //     $this->db->from('asset');
    //     $this->db->join('parameter_range', 'parameter_range.asset_id = asset.id', 'left');
    //     $this->db->join('asset_location', 'asset_location.id = asset.customer_locationid', 'left');
    //     $this->db->where('asset.id', $asset_id);
    //     $query = $this->db->get();
    //     $asset_data = $query->result_array();
    //     if ($query->num_rows() > 0) {
    //         foreach ($asset_data as $key => $value) {
    //             $param_name = $this->get_paramiter_name($value['parameter_id']);
    //             $uom_name = $this->get_uom_name($value['uom_id']);
    //             if ($param_name) {
    //                 $asset_data[$key]['param_name'] = $param_name[0]['name'];
    //             }
    //             if ($uom_name)
    //                 $asset_data[$key]['uom_name'] = $uom_name[0]['name'];
    //         }
    //         if ($asset_data) {
    //             return $asset_data;
    //         } else {
    //             return false;
    //         }
    //     }
    // }

    public function get_paramiter_name($id) {
        $asset_param_data = $this->db->select('id,name')->from('parameter')->where('id', $id)->get()->result_array();
        if ($asset_param_data) {
            return $asset_param_data;
        }
    }

    public function get_uom_name($uom_type_id) {
        $this->db->select('id,name');
        $this->db->from('uom');
        //$this->db->join('uom', 'uom.id = uom_type.uom_id', 'left');
        $this->db->where('id', $uom_type_id);
        $query = $this->db->get();
        $uom_type_data = $query->result_array();
        if ($uom_type_data)
            return $uom_type_data;
    }

    public function checkasset_locationIfExists($table = NULL, $unique_Data = array()) {
        //var_dump($table,$unique_Data);die;
        $query = $this->db->get_where($table, $unique_Data);
        // echo $this->db->last_query();
        // exit;
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

    public function trigger_list($user_id, $asset_id) {

        $this->db->select('trigger.id,
                        trigger.rule_id,
                        trigger.asset_id,
                        trigger.trigger_name,
                        trigger.trigger_threshold_id,
                        trigger.email,
                        trigger.sms_contact_no,
                        trigger.createdate,
                        trigger.createby');
        $this->db->from('trigger');
        $this->db->where(array('trigger.asset_id' => $asset_id, 'trigger.createby' => $user_id));
//        $this->db->where('trigger.isactive', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function edit_trigger_list($user_id, $asset_id, $trigger_post_id) {

        $this->db->select('trigger.id,
                                    trigger.rule_id,
                                    trigger.asset_id,
                                    trigger.trigger_name,
                                    trigger.trigger_threshold_id,
                                    trigger.email,
                                    trigger.sms_contact_no,
                                    trigger.createdate,
                                    trigger.createby');
        $this->db->from('trigger');
        $this->db->where(array('trigger.asset_id' => $asset_id, 'trigger.createby' => $user_id, 'trigger.id' => $trigger_post_id));
        //        $this->db->where('trigger.isactive', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update_trigger($trigger_input_data, $trigger_post_id) {

        $this->db->where('id', $trigger_post_id);
        return $this->db->update('trigger', $trigger_input_data);
    }

    public function delete_trigger($trigger_post_id) {
        $this->db->where(array('id' => $trigger_post_id));
        return $this->db->delete('trigger');
    }

    public function Trigger_threshold($asset_id, $rule_id) {
        $this->db->select('trigger.id,trigger.trigger_threshold_id');
        $this->db->from('trigger');
        $this->db->where(array('trigger.asset_id' => $asset_id, 'trigger.rule_id' => $rule_id, 'isactive' => 1));
        $result = $this->db->get()->result();
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

    public function asset_parameter_add($data) {
    $alreadyexit = $this->db->from('parameter_range')->where(array('parameter_id' => $data['parameter_id'], 'uom_id' => $data['uom_id'], 'isactive' => 1,$data['createdby'] => 1))->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('parameter_range', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    public function asset_parameter_update($data, $id, $type) {
        if ($type == 'edit') {
            $alreadyexit = $this->db->from('parameter_range')->where(array('parameter_id' => $data['parameter_id'], 'uom_id' => $data['uom_id'], 'isactive' => 1))->get()->result();
            if (count($alreadyexit) == 1 && $alreadyexit[0]->id == $id) {
                $this->db->where('id', $id);
                $this->db->update('parameter_range', $data);
                return $this->db->affected_rows();
            } else {
                return 'duplicate';
            }
        } elseif ($type == 'delete') {
            $this->db->where('id', $id);
            $this->db->update('parameter_range', $data);
            return $this->db->affected_rows();
        }
    }

    public function showdescription($asset_id) {


        $query = "SELECT 
                asset_parameter_rule.id AS `asset_parameter_rule_tbl_id`,asset_parameter_rule.rule_name,asset_parameter_rule.rule_des,
                asset_parameter_rule.green_value,
                asset_parameter_rule.orange_value,
                asset_parameter_rule.red_value,asset_parameter_rule.wef_date,asset.code,asset.specification,branch_user.client_name,branch_user.client_username,parameter.name as `parameter_name`,
                parameter_range.id as parameter_range_tbl_id,(select count(`trigger`.trigger_threshold_id) from `trigger` where `trigger`.`rule_id`=asset_parameter_rule.id) as `trigger_threshold_id_count`
             FROM asset_parameter_rule
             inner join parameter_range on parameter_range.id=asset_parameter_rule.parameter_range_id
             inner join parameter on parameter.id=parameter_range.parameter_id
             inner join asset on asset.id=parameter_range.asset_id
             inner join asset_user on asset_user.asset_id= asset.id
             inner join branch_user on branch_user.id= asset_user.assetuser_id
             left join `trigger` on `trigger`.`rule_id`=asset_parameter_rule.id
             where asset_parameter_rule.rule_status='1' and parameter_range.isactive='1' and parameter_range.asset_id=" . $asset_id . " ";
        $res = $this->db->query($query);
        return $obj = $res->result_array();
    }

}
