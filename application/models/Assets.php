<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Assets extends MY_Model {

    public $_table = 'asset';
    public $primary_key = 'id';
        public function __construct() {
        parent::__construct();

      $this->Loginuser_location_id=$this->session->userdata('location_id');                

    }
    
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
        $todays=date("Y-m-d");
        $where_condtion="startdate<='".$todays."' and enddate>='".$todays."'";
        $Sql_query=$this->db->select('id')->from('asset')->where('id',$id1)->where($where_condtion)->get()->num_rows();
//        echo $this->db->last_query();
//        ======= ** delete(update) query ***====================
         $assets_data = array('isdeleted' => 1);
         $this->db->where('asset.id', $id1);
         
        if($Sql_query>0)
        {
           return false;
        }
        else
        {
           return $this->db->update('asset', $assets_data);
        }
//             return $this->db->delete('asset');
    }

    public function getCustomerLocationCount($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('count(customer_business_location.id) as locationcount');
        $this->db->from('customer_business_location ');
        if ($group_id == '2') {
            $this->db->join('users', 'users.location_id=customer_business_location.id', 'left');
            $this->db->where('users.id', $user_id);
            $this->db->where(array('users.active' => 1, 'users.isdeleted' => 0));
        } else {
            // 
        }
        $this->db->where(array('customer_business_location.isactive' => 1, 'customer_business_location.isdeleted' => 0));
        $query = $this->db->get();
        $obj = $query->result_array();
        return $obj[0]['locationcount'];
    }

    public function getAssetCount($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('count(id) as assetcount');
        $this->db->from('asset');
        if($group_id=='2'){
        $this->db->where('createdby', $user_id);
        }
        $this->db->where(array('isactive' => 1, 'isdeleted' => 0));
        $query = $this->db->get();
        $obj = $query->result_array();
        return $obj[0]['assetcount'];
    }

    public function getDeviceCount($user_id) {
         $group_id = $this->session->userdata('group_id');
        $this->db->select('count(id) as devicecount');
        $this->db->from('device_inventory');
        if($group_id=='2'){
        $this->db->where('createdby', $user_id);
        }
        $this->db->where(array('isactive' => 1, 'isdeleted' => 0));
        $query = $this->db->get();
        $obj = $query->result_array();
        return $obj[0]['devicecount'];
    }

    public function getSensorCount($user_id) {
         $group_id = $this->session->userdata('group_id');
        $this->db->select('count(id) as sensorcount');
        $this->db->from('sensor_inventory');
         if($group_id=='2'){
        $this->db->where('createdby', $user_id);
         }
        $this->db->where(array('isactive' => 1, 'isdeleted' => 0));
        $query = $this->db->get();
        $obj = $query->result_array();
        return $obj[0]['sensorcount'];
    }

    public function assets_list($user_id, $id = NULL) {
        $group_id = $this->session->userdata('group_id');
       
        $this->db->select('asset.id,asset.code,asset_user.id as `asset_user_tbl_id,asset.isactive,users.first_name as `client_name`,users.username as `client_username`,customer_business_location.id as locid,customer_business_location.location_name as location,asset_category.id as asset_catid, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename, CONCAT(users.first_name," ",users.last_name) AS first_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable,asset.startdate,asset.enddate,asset_location.id as assetlocid');
        //    $this->db->select('asset.id,asset.code,asset_user.id as `asset_user_tbl_id`,asset_location.id as locid,asset_location.location,asset_category.id as asset_catid, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable');            
        $this->db->from('asset');
        $this->db->join('customer_business_location', 'customer_business_location.id= asset.customer_locationid', 'left');
        $this->db->join('asset_location', 'asset_location.asset_id= asset.id', 'left');
        $this->db->join('asset_user', 'asset_user.asset_id= asset.id', 'left');
        $this->db->join('asset_category', 'asset_category.id= asset.asset_catid');
        $this->db->join('asset_type', 'asset_type.id= asset.asset_typeid');
        $this->db->join('users', 'users.id=asset_user.assetuser_id','left');
//        $this->db->where('users.isdeleted IN (select users.id as assetlocid from asset_location where isdeleted=0 and asset_location.asset_id=asset.id)', NULL, FALSE);
//        $this->db->group_by('asset.id');
        if (isset($id) && $id !== NULL) {
            $this->db->where('asset.id', $id);
        }
        if ($group_id == '2') {
//            $this->db->where(array('asset.createdby' => $user_id));
              $this->db->where(array('users.location_id' => $this->Loginuser_location_id));
            
        }
        $this->db->where(array('asset.isdeleted' => 0));
        $query = $this->db->get();
//        echo $this->db->last_query();
        $assets_list = $query->result_array();

        $param_range_id = null;


        foreach ($assets_list as $k => $data) {
            $assets_list[$k]['parametercount'] = $this->parameter_range_list($data['id'], $param_range_id);
        }

        return $assets_list;
    }

    public function assets_list_info($user_id, $id = NULL) {
        $assets_list[0]['customerlocationcount'] = $this->getCustomerLocationCount($user_id);

        $assets_list['assetcount'] = $this->getAssetCount($user_id);
        $assets_list['devicecount'] = $this->getDeviceCount($user_id);
        $assets_list['sensorcount'] = $this->getSensorCount($user_id);

        return $assets_list;
    }

    public function Asset_edit($edit_asset_list_id) {
        $this->db->select('asset.id,asset.code,customer_business_location.id as locid,customer_business_location.location_name as location,asset_category.id as asset_catid,asset.isactive, asset_category.name as assetcategoryname,asset_type.id as asset_typeid,asset_type.name as assettypename,users.first_name,users.last_name,asset.customer_locationid,asset.asset_catid,asset.asset_typeid,asset.specification,asset.serial_no,asset.make,asset.model,asset.description,asset.ismovable,asset.startdate,asset.enddate');
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
        $group_id = $this->session->userdata('group_id');
        $this->db->select('customer_business_location.id,customer_business_location.location_name');
        $this->db->from('customer_business_location');


        if ($group_id == '2') {
            $this->db->join('users', 'users.location_id=customer_business_location.id');
//            $this->db->where('users.id', $user_id);
             $this->db->where(array('users.location_id' => $this->Loginuser_location_id));
            $this->db->where('users.isdeleted', 0);
        }

        $this->db->group_by('customer_business_location.id');
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

    public function AssetCategory_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('id,name');
        $this->db->from('asset_category');
        $this->db->where('isactive', 1);
        $this->db->where('isdeleted', 0);
        if ($group_id == '2') {
            //$this->db->where('createdby', $user_id);
        }
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function AssetType_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('id,name');
        $this->db->from('asset_type');
        $this->db->where('isactive', 1);
        $this->db->where('isdeleted', 0);

        if ($group_id == '2') {
            // $this->db->where('createdby', $user_id);
        }
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function assets_location_list($user_id) {
        $group_id = $this->session->userdata('group_id');
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
                                asset.id as `asset_tbl_id`,asset.code,users.id as `branch_user_id`,asset_user.id as `asset_user_tbl_id`');
        $this->db->from('asset_location');
        $this->db->join('asset', 'asset.id=asset_location.asset_id', 'inner');
        $this->db->join('users', 'users.location_id=asset.customer_locationid', 'inner');
        $this->db->join('asset_user', 'asset_user.asset_id=asset.id', 'left');
        $this->db->group_by('asset_location.id','desc');
        

        $this->db->where('asset_location.isdeleted', 0);

        if ($group_id == '2') {
            //$this->db->where('asset_location.createdby', $user_id);
            $this->db->where('users.location_id', $this->Loginuser_location_id);
        }

        $query = $this->db->get();
//         echo  $this->db->last_query();
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
        $update_data = array('isdeleted' => 1);
        $this->db->where(array('id' => $asset_loc_id));
        return $this->db->update('asset_location', $update_data);
//        return $this->db->delete('asset_location');
    }

    public function Update_asset_location($update_data, $asset_loc_id) {
        //  var_dump($assets_data,$edit_asset_list_id);die;
//        if ($update_data != null) {
        $this->db->where('id', $asset_loc_id);
        return $this->db->update('asset_location', $update_data);
//        }
    }

    public function asset_user_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('asset_user.id,
                                    asset.id as `asset_tbl_id`,
                                    asset.`code`,users.location_id,
                                    users.id as `branch_user_tbl_id`,
                                    users.first_name as `client_name`,
                                    asset_user.createdate,
                                    asset_user.isactive');
        $this->db->from('asset_user');
        $this->db->join('asset', 'asset.id = asset_user.asset_id', 'inner');
        $this->db->join('users', 'users.id = asset_user.assetuser_id', 'inner');
//        $this->db->where('branch_user.status', 1);
        $this->db->where('asset_user.isdeleted', 0);

        if ($group_id == '2') {
            $this->db->where('users.location_id', $this->Loginuser_location_id);
        }

        $query = $this->db->get();

        // echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

    public function assetcode_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('asset.id,asset.code,asset.customer_locationid');
        $this->db->from('asset');
        $this->db->join('users', 'users.location_id = asset.customer_locationid', 'inner');
        $this->db->where('asset.isactive', 1);
        $this->db->where('asset.isdeleted', 0);
        $this->db->where('asset.id NOT IN (select asset_user.asset_id from asset_user where isdeleted=0 and asset_user.asset_id=asset.id)', NULL, FALSE);
        if ($group_id == '2') {
//            $this->db->where('createdby', $user_id);
            $this->db->where('users.location_id', $this->Loginuser_location_id);
        }
        $this->db->group_by('asset.id','desc');
        $query = $this->db->get();
        // echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

    public function assetcode_list_for_asset_location($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('asset.id,asset.code');
        $this->db->from('asset');
        $this->db->join('users','`users`.`location_id`= `asset`.`customer_locationid`','inner');
        $this->db->where('asset.isactive', 1);
        $this->db->where('asset.isdeleted', 0);
        $this->db->where('asset.id NOT IN (select asset_id from asset_location where asset_location.isdeleted=0)');
        
//        $query = "SELECT asset.id,asset.code FROM asset
//                where asset.isactive='1' and isdeleted='0' 
//                and asset.createdby=" . $user_id . " and id not in(select asset_id from asset_location)";
        if ($group_id == '2') {
//            $this->db->where('createdby', $user_id);   
            $this->db->where('users.location_id', $this->Loginuser_location_id);
        }
        $this->db->group_by('asset.id','desc');
        $query = $this->db->get();
        return $obj = $query->result_array();
    }

//    public function asset_userid_list($user_id) {
//        $this->db->select('id,client_name');
//        $this->db->from('branch_user');
////        $this->db->where('status', 1);
//        $this->db->where('user_id', $user_id);
//        $this->db->where('isdeleted', 0);
//        $query = $this->db->get();
//        $objData = $query->result_array();
//        return $objData;
//    }

    public function asset_userid_list($user_id ,$location_id=NULL) {
        $groupid = $this->session->userdata('group_id');
        $this->db->select('users.id,users.first_name as client_name');
        $this->db->from('users');
        $this->db->join('`asset`','`users`.`location_id`= `asset`.`customer_locationid`','inner');

        if ($groupid == 2) {
//            $this->db->where('id', $user_id);
            $this->db->where('users.location_id', $this->Loginuser_location_id);
        }else if($location_id)
        {
           $this->db->where('users.location_id',$location_id);
        }
        $this->db->where(array('users.active' => 1, 'users.isdeleted' => 0));
        $this->db->group_by('users.id');
        $query = $this->db->get();
//    echo $this->db->last_query(); 
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
                                    asset.`code`,users.location_id,
                                    users.id as `branch_user_tbl_id`,
                                    users.first_name as `client_name`,
                                    asset_user.createdate,
                                    asset_user.isactive');
        $this->db->from('asset_user');
        $this->db->join('asset', 'asset.id = asset_user.asset_id', 'inner');
        $this->db->join('users', 'users.id = asset_user.assetuser_id', 'inner');
        $this->db->where('asset_user.id', $asset_user_tbl_id);
        $query = $this->db->get();
//        echo $this->db->last_query();
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
        $update_data = array('isdeleted' => 1);
        $this->db->where(array('id' => $asset_user_id));
        return $this->db->update('asset_user', $update_data);
//        return $this->db->delete('asset_user');
    }
    
        public function Load_Locationwise_user_list($assetcode,$location_id, $user_id) {       
        $group_id = $this->session->userdata('group_id');        
        $this->db->select('id,first_name as client_name');
        $this->db->from('users');
        $this->db->where('users.location_id', $location_id);
        $this->db->where(array('active' => 1, 'isdeleted' => 0));
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }
    
    public function parameter_range_list($asset_id, $param_range_id = NULL) {
        $this->db->select('parameter_range.id,parameter.name as parameter,parameter.id as param_id,min_value,max_value,scaling_factor,uom.name as uom,uom_id,bits_per_sign,parameter_range.isactive');
        $this->db->from('parameter_range');
        $this->db->join('parameter', 'parameter_range.parameter_id=parameter.id');
        $this->db->join('uom', 'parameter_range.uom_id=uom.id');
        if (isset($param_range_id) && $param_range_id !== NULL) {
            $this->db->where('parameter_range.id', $param_range_id);
        }
        $this->db->where(array('asset_id' => $asset_id, 'parameter_range.isdeleted' => 0));
        $this->db->where('parameter_range.isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function checkassetcodeIfExists($table = NULL, $unique_Data = array()) {
        //var_dump($table,$unique_Data);die;
        $query = $this->db->get_where($table, $unique_Data);
//        echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkassetcodeIfExists_or_scheduled_for_add($table = NULL, $unique_Data = array()) {

        $query = $this->db->select('id,code,startdate,enddate')
                ->from('asset')
                ->where(array('code' => $unique_Data['code'], 'enddate>=' => $unique_Data['startdate'],'isdeleted'=>$unique_Data['isdeleted']))
                ->get();
        // $result=$query->
//                  echo $this->db->last_query();

        $returnvar = 'DateProblem';
        if ($query->num_rows() > 0) {


            return $returnvar;
        } else {
            return false;
        }
    }

    public function checkassetcodeIfExists_or_scheduled($table = NULL, $unique_Data = array()) {

        $query = $this->db->select('id,code,startdate,enddate')
                ->from('asset')
                ->where(array('code' => $unique_Data['code'], 'enddate>=' => $unique_Data['startdate'],'isdeleted'=>$unique_Data['isdeleted']))
                ->get();
        // $result=$query->
//                  echo $this->db->last_query();

        $returnvar = 'DateProblem';
        if ($query->num_rows() > 1) {


            return $returnvar;
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

    public function update_asset_rule_detail($data, $parameter_range_id) {
        $this->db->where('id', $parameter_range_id);
        $this->db->update('asset_parameter_rule', $data);
        return true;

        // $alreadyexist=$this->db->from('asset_parameter_rule')->where('parameter_range_id',$parameter_range_id)->get()->result();
        // if(!$alreadyexist){
        //     $this->db->insert('asset_parameter_rule', $data); 
        //     $insert_id= $this->db->insert_id();
        //     return $insert_id; 
        // }else{
        //     return false;
        // }
    }

    public function get_asset_rule_list($parameter_range_id = '') {
        $this->db->select('asset_parameter_rule.*, parameter.name as pararameter_name, uom.name as uom_name');
        $this->db->from('asset_parameter_rule');
        $this->db->join('uom', 'asset_parameter_rule.uom = uom.id', 'left');
        $this->db->join('parameter', 'asset_parameter_rule.parameter = parameter.id', 'left');
        $this->db->where(array('asset_parameter_rule.parameter_range_id' => $parameter_range_id, 'asset_parameter_rule.isdeleted' => 0));
        $query = $this->db->get();
        $asset_data = $query->result_array();
        if ($query->num_rows() > 0) {
            foreach ($asset_data as $key => $value) {
                $asset_data[$key]['triger_count'] = $this->get_triger_count($value['id']);
            }
        }

        //print_r($asset_data); exit;
        if ($asset_data)
            return $asset_data;
        else
            return false;
    }

    public function get_triger_count($rule_id) {
        $asset_rule_data = $this->db->select('count(id) as triger_count')->from('trigger')->where('rule_id', $rule_id)->get()->result_array();
        //print_r($asset_rule_data[0]['triger_count']); exit;
        if ($asset_rule_data) {
            return $asset_rule_data[0]['triger_count'];
        } else {
            return false;
        }
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

//<<<<<<< HEAD
//    public function get_parameter_range($asset_id) {
//        $asset_id = 63;
//
//
//        $this->db->select('asset.id,asset.code,asset.specification,parameter_range.uom_id,parameter_range.parameter_id,parameter_range.min_value,parameter_range.max_value,parameter_range.scaling_factor,parameter_range.bits_per_sign,asset_location.location,asset_location.address');
//        $this->db->from('asset');
//        $this->db->join('parameter_range', 'parameter_range.asset_id = asset.id', 'left');
//        $this->db->join('asset_location', 'asset_location.id = asset.customer_locationid', 'left');
//        $this->db->where('asset.id', $asset_id);
//        $query = $this->db->get();
//        $asset_data = $query->result_array();
//        if ($query->num_rows() > 0) {
//            foreach ($asset_data as $key => $value) {
//=======

    public function get_asset_id($parameter_id) {
        $this->db->select('asset_id');
        $this->db->from('parameter_range');
        $this->db->where('parameter_range.id', $parameter_id);
        $query = $this->db->get();
        $asset_id = $query->result_array();

        return $asset_id[0]['asset_id'];
    }

    public function get_parameter_range($parameter_id) {
        $this->db->select('asset.id,asset.customer_locationid,asset.code,asset.specification,parameter_range.uom_id,parameter_range.parameter_id,parameter_range.min_value,parameter_range.max_value,parameter_range.scaling_factor,parameter_range.bits_per_sign');
        $this->db->from('parameter_range');
        $this->db->join('asset', 'parameter_range.asset_id = asset.id', 'left');
        $this->db->where('parameter_range.id', $parameter_id);
        $query = $this->db->get();
        $asset_data = $query->result_array();
        if ($query->num_rows() > 0) {
            foreach ($asset_data as $key => $value) {
                $asset_location = $this->get_asset_location($value['customer_locationid']);
                if (isset($asset_location[0]['location']))
                    $asset_data[$key]['location'] = $asset_location[0]['location'];

                if (isset($asset_location[0]['address']))
                    $asset_data[$key]['address'] = $asset_location[0]['address'];


                $param_name = $this->get_paramiter_name($value['parameter_id']);
                $uom_name = $this->get_uom_name($value['uom_id']);
                if ($param_name) {
                    $asset_data[$key]['param_name'] = $param_name[0]['name'];
                }


                if ($uom_name)
                    $asset_data[$key]['uom_name'] = $uom_name[0]['name'];
            }
            if ($asset_data) {
                return $asset_data;
            } else {
                return false;
            }
        }
    }

    public function get_asset_location($location_id) {
        $this->db->select('customer_business_location.location_name as location');
        $this->db->from('customer_business_location');
        $this->db->where('customer_business_location.id', $location_id);
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
        $asset_param_data = $this->db->select('id,name,uom_type_id,')->from('parameter')->where('id', $id)->get()->result_array();
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

    public function get_uom_data($uom_type_id) {
        $this->db->select('uom.id,uom.name');
        $this->db->from('uom_type');
        $this->db->join('uom', 'uom.id = uom_type.uom_id', 'left');
        $this->db->where('uom_type.id', $uom_type_id);
        $query = $this->db->get();
        $uom_type_data = $query->result_array();
        return $uom_type_data;
    }

    public function get_uom_list_type($uom_type_id) {
        $this->db->select('id,name,isactive');
        $this->db->from('uom');
        $this->db->where(array('uom_type_id'=>$uom_type_id,'isdeleted'=>0));
        $query = $this->db->get();
        $uom_list_data = $query->result_array();
        return $uom_list_data;
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
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');
        $this->db->select('uom.id,uom.name,parameter.id as paramid');
        $this->db->from('parameter');
        $this->db->join('uom_type', 'parameter.uom_type_id=uom_type.id');
        $this->db->join('uom', 'uom_type.id=uom.uom_type_id');
        $this->db->where('parameter.id', $param_id);
        $this->db->where(array('uom.isactive' => 1, 'uom.isdeleted' => 0));
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

    public function trigger_list($rule_id = NULL, $user_id, $asset_id) {
        $groupid = $this->session->userdata('group_id');
        $deletedstatus = "trigger.isdeleted!='1'";
        $this->db->select('trigger.id,
                        trigger.rule_id,
                        trigger.asset_id,
                        trigger.trigger_name,
                        trigger.trigger_threshold_id,
                        trigger.email,
                        trigger.sms_contact_no,
                        trigger.createdate,
                        trigger.createby,trigger.isactive,trigger.isdeleted');
        $this->db->from('trigger');
        $this->db->where(array('trigger.asset_id' => $asset_id, 'trigger.rule_id' => $rule_id));
//        $this->db->where('trigger.isactive', 1);
        if($groupid == '2'){
//        $this->db->where('trigger.createby', $user_id);                     
        }
        $this->db->where('trigger.isdeleted',0);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $result = $query->result_array();
        return $result;
    }

    public function edit_trigger_list($user_id, $asset_id, $trigger_post_id) {
        $groupid = $this->session->userdata('group_id');
        $this->db->select('trigger.id,
                                    trigger.rule_id,
                                    trigger.asset_id,
                                    trigger.trigger_name,
                                    trigger.trigger_threshold_id,
                                    trigger.email,
                                    trigger.sms_contact_no,
                                    trigger.createdate,
                                    trigger.createby,trigger.isactive');
        $this->db->from('trigger');
        $this->db->where(array('trigger.asset_id' => $asset_id, 'trigger.id' => $trigger_post_id));
        //        $this->db->where('trigger.isactive', 1);
        if($groupid=='2'){
//          $this->db->where('trigger.createby', $user_id);   
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update_trigger($trigger_input_data, $trigger_post_id) {

        $this->db->where('id', $trigger_post_id);
        return $this->db->update('trigger', $trigger_input_data);
    }

    public function delete_trigger($trigger_post_id) {
        //$this->db->where(array('id' => $trigger_post_id));
        //return $this->db->delete('trigger');
        $trigger_input_data = array('isdeleted' => 1);
        $this->db->where('id', $trigger_post_id);
        return $this->db->update('trigger', $trigger_input_data);
    }

    public function Trigger_threshold($asset_id, $rule_id) {
        $groupid = $this->session->userdata('group_id');
        $this->db->select('trigger.id,trigger.trigger_threshold_id');
        $this->db->from('trigger');
        $this->db->where(array('trigger.asset_id' => $asset_id, 'trigger.rule_id' => $rule_id, 'isactive' => 1, 'isdeleted' => 0));
        
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
        $alreadyexit = $this->db->from('parameter_range')->where(array('parameter_id' => $data['parameter_id'], 'uom_id' => $data['uom_id'], 'isactive' => 1, $data['createdby'] => 1))->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('parameter_range', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    public function asset_parameter_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('parameter_range', $data);
        return $this->db->affected_rows();
//        if ($type == 'edit') {
//            $alreadyexit = $this->db->from('parameter_range')->where(array('parameter_id' => $data['parameter_id'], 'uom_id' => $data['uom_id'], 'isactive' => 1))->get()->result();
//            if (count($alreadyexit) == 1 && $alreadyexit[0]->id == $id) {
//                $this->db->where('id', $id);
//                $this->db->update('parameter_range', $data);
//                return $this->db->affected_rows();
//            } else {
//                return 'duplicate';
//            }
//        } elseif ($type == 'delete') {
//            $this->db->where('id', $id);
//            $this->db->update('parameter_range', $data);
//            return $this->db->affected_rows();
//        }
    }

    public function showdescription($set_rule_id = NULL, $user_id, $asset_id) {
        $groupid = $this->session->userdata('group_id');
    if($groupid=='2'){
        $where="asset.id=" . $asset_id . " and asset.customer_locationid=" . $this->Loginuser_location_id . " and asset.isactive='1' and asset.isdeleted='0'";
    }else
    {
      $where="asset.id=" . $asset_id . " and asset.isactive='1' and asset.isdeleted='0'";  
    }
        
        
        $query = "SELECT 
    asset.code,
    asset.specification,
    customer_business_location.location_name AS `location`,
    users.first_name AS `client_name`,
    users.username AS `client_username`,
    asset_parameter_rule.id AS `asset_parameter_rule_tbl_id`,
    (SELECT 
            asset_parameter_rule.rule_name
        FROM
            asset_parameter_rule
        WHERE
            asset_parameter_rule.id = ".$set_rule_id.") AS `rule_name`,
    (SELECT 
            asset_parameter_rule.rule_des
        FROM
            asset_parameter_rule
        WHERE
            asset_parameter_rule.id = ".$set_rule_id.") AS `rule_des`,
    (SELECT 
            asset_parameter_rule.green_value
        FROM
            asset_parameter_rule
        WHERE
            asset_parameter_rule.id = ".$set_rule_id.") AS `green_value`,
    (SELECT 
            asset_parameter_rule.orange_value
        FROM
            asset_parameter_rule
        WHERE
            asset_parameter_rule.id = ".$set_rule_id.") AS `orange_value`,
    (SELECT 
            asset_parameter_rule.red_value
        FROM
            asset_parameter_rule
        WHERE
            asset_parameter_rule.id = ".$set_rule_id.") AS `red_value`,
    (SELECT 
            asset_parameter_rule.wef_date
        FROM
            asset_parameter_rule
        WHERE
            asset_parameter_rule.id = ".$set_rule_id.") AS `wef_date`,
    parameter.name AS `parameter_name`,
    parameter_range.id AS parameter_range_tbl_id,
    (SELECT 
            COUNT(`trigger`.trigger_threshold_id)
        FROM
            `trigger`
        WHERE
            `trigger`.`rule_id` = ".$set_rule_id.") AS `trigger_threshold_id_count`
FROM
    asset
        LEFT JOIN
    customer_business_location ON customer_business_location.id = asset.customer_locationid
        LEFT JOIN
    asset_user ON asset_user.asset_id = asset.id
        LEFT JOIN
    users ON users.id = ".$user_id."    
        LEFT JOIN
    asset_parameter_rule ON asset_parameter_rule.id = '".$set_rule_id."'
		LEFT JOIN
    parameter_range ON parameter_range.id = asset_parameter_rule.parameter_range_id
        LEFT JOIN
    parameter ON parameter.id = parameter_range.parameter_id
    
        LEFT JOIN
    `trigger` ON `trigger`.`rule_id` = asset_parameter_rule.id
WHERE  ".$where." 	    
 group by asset.id ";
//        echo $query;
        $res = $this->db->query($query);
        return $obj = $res->result_array();
    }

    public function Check_assetcode_is_exist($assetcode, $user_id) {
        $this->db->select('id,code,count(code) as `Cnt_number`');
        $this->db->from('asset');
        $this->db->limit('1');
        $this->db->group_by('id');
        $this->db->where('asset.code', $assetcode);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result();
        return $objData;
    }

    public function get_parameter_range_limits($parameter_id) {
        $this->db->select('min_value,max_value');
        $this->db->from('parameter_range');
//        $this->db->where('parameter_id', $parameter_id);
        $this->db->where('id', $parameter_id);
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
