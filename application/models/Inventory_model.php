<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inventory_model extends MY_Model {

    public $_table = 'groups';
    public $primary_key = 'id';
    public $belongs_to = array('country', 'state');
    public $before_create = array('timestamps_bc');

    function Add_deviceinventory($insert_data) {
//   print_r($data);
        $todaysdate = date('Y-m-d');

        $table = 'device_inventory';
//        print_r($insert_data);
//        exit;
//        unset($_POST);
        $check = $this->db->insert($table, $insert_data);
        return $this->db->insert_id();


//        echo $this->db->last_query();exit;
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
    
//     public function checkUnique($table = NULL, $data = array()) {
//        $query = $this->db->get_where($table, $data);
////        echo $this->db->last_query();
//        if ($query->num_rows() > 0) {
//            return true;
//        } else {
//            return false;
//        }
//    }

    public function Device_inventory_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('device_inventory.id,
                            device_inventory.user_id,
                            device_inventory.number,
                            device_inventory.serial_no,
                            device_inventory.make,
                            device_inventory.model,
                            device_inventory.description,
                            device_inventory.communication_type,
                            device_inventory.gsm_number,
                            device_inventory.communication_status,
                            device_inventory.communication_history,
                            device_inventory.communication_protocol,
                            device_inventory.createdat,
                            device_inventory.createdby,
                            device_inventory.isactive,                            
                            device_inventory.stock_date,
                            device_inventory.oem_ser_interval_type,
                            device_inventory.oem_ser_interval_number,
                            device_inventory.service_after_type,
                            device_inventory.service_after_number,
                            device_inventory.customer_location_id,customer_business_location.location_name,
                            device_sensor_mapping.id as `dev_sen_id`,asset.id as `asset_tbl_id`, asset.code,device_asset.id as `device_asset_id`');
        $this->db->from('device_inventory');
        $this->db->join('device_sensor_mapping', 'device_sensor_mapping.device_id=device_inventory.id', 'left');
        $this->db->join('device_asset', 'device_asset.device_id=device_inventory.id', 'left');
        $this->db->join('asset', 'asset.id=device_asset.asset_id', 'left');
        $this->db->join('customer_business_location', 'customer_business_location.id=device_inventory.customer_location_id', 'left');
        
        $this->db->where('device_inventory.isdeleted', 0);
        if($group_id =='2'){
        $this->db->where('device_inventory.createdby', $user_id);
        } 
        $this->db->group_by('device_inventory.id');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function edit_deviceinventory($inventoryid) {
        $this->db->select('id,
                            user_id,
                            number,
                            serial_no,
                            make,
                            model,
                            description,
                            communication_type,
                            gsm_number,
                            communication_status,
                            communication_history,
                            communication_protocol,
                            createdat,
                            createdby,
                            isactive,
                            stock_date,
                            oem_ser_interval_type,
                            oem_ser_interval_number,
                            service_after_type,
                            service_after_number,
                            customer_location_id');
        $this->db->from('device_inventory');
        $this->db->where('id', $inventoryid);
        $query = $this->db->get();

        $objData = $query->result_array();
        return $objData;
    }

    public function update_deviceinventory($insert_data, $form_action_type) {
        $table = 'device_inventory';

        $this->db->where('id', $insert_data['id']);
        return $this->db->update('device_inventory', $insert_data);


        // return $objData[0];
    }

    public function Delete_Device_inventory($dev_inv_id) {
        $this->db->where(array('id' => $dev_inv_id));
        $insert_data = array('isdeleted' => 1);
//        return  $this->db->delete('device_inventory');
        return $this->db->update('device_inventory', $insert_data);
    }

    //------ * sensor Inventory *--------
    public function sensor_inventory_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('sensor_inventory.id, sensor_inventory.sensor_no,sensor_inventory.make,sensor_inventory.model,sensor_inventory.description,sensor_inventory.isactive,
                                          sensor_inventory.createdat,sensor_inventory.createdby,
                                          sensor_type.id as `sensor_type_tbl_id`,sensor_type.name as `sensor_type_tbl_name`,
                                          parameter.id as `parameter_tbl_id`,parameter.name,
                                          uom_type.id as `uom_type_tbl_id`,uom_type.name as `uom_type_tbl_name`,device_sensor_mapping.id as `device_sensor_mapping_id`,device_asset.id as device_asset_tbl_id`,`device_inventory`.`id` as `device_inventory_tbl_id`,`device_inventory`.number AS `device_id_number`,sensor_inventory.customer_location_id,customer_business_location.location_name');
        $this->db->from('sensor_inventory');
        $this->db->join('sensor_type', 'sensor_type.id=sensor_inventory.sensor_type_id', 'left');
        $this->db->join('device_sensor_mapping', 'device_sensor_mapping.sensor_id=sensor_inventory.id', 'left');
        $this->db->join('device_inventory', 'device_sensor_mapping.device_id=device_inventory.id', 'left');
        $this->db->join('device_asset', 'device_asset.device_id=sensor_inventory.id', 'left');
        $this->db->join('parameter', 'parameter.id=sensor_inventory.parameter_id', 'left');
        $this->db->join('uom_type', 'uom_type.id=sensor_inventory.uom_type_id', 'left');
        $this->db->join('customer_business_location', 'customer_business_location.id=sensor_inventory.customer_location_id', 'left');
        
        $this->db->where('sensor_inventory.isdeleted', 0);
        if($group_id =='2'){
        $this->db->where('sensor_inventory.createdby', $user_id);
        } 
        $this->db->group_by('sensor_inventory.id');
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

    public function edit_sensor_inventory_list($user_id, $sen_inv_id) {
        $this->db->select('sensor_inventory.id, sensor_inventory.sensor_no,sensor_inventory.make,sensor_inventory.model,sensor_inventory.description,
                                          sensor_inventory.createdat,sensor_inventory.createdby,sensor_inventory.isactive,
                                          sensor_type.id as `sensor_type_tbl_id`,sensor_type.name as `sensor_type_tbl_name`,
                                          parameter.id as `parameter_tbl_id`,parameter.name,
                                          uom_type.id as `uom_type_tbl_id`,uom_type.name as `uom_type_tbl_name`,sensor_inventory.customer_location_id,customer_business_location.location_name');
        $this->db->from('sensor_inventory');
        $this->db->join('sensor_type', 'sensor_type.id=sensor_inventory.sensor_type_id', 'left');
        $this->db->join('parameter', 'parameter.id=sensor_inventory.parameter_id', 'left');
        $this->db->join('uom_type', 'uom_type.id=sensor_inventory.uom_type_id', 'left');
        $this->db->join('customer_business_location', 'customer_business_location.id=sensor_inventory.customer_location_id', 'left');
//        $this->db->where('sensor_inventory.createdby', $user_id);
        $this->db->where('sensor_inventory.id', $sen_inv_id);
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function add_sensor_inventory($insert_data) {
        $table = 'sensor_inventory';
        $check = $this->db->insert($table, $insert_data);
        return $this->db->insert_id();
    }

    public function update_sensor_inventory($insert_data, $form_action_type) {
        $table = 'sensor_inventory';

        $this->db->where('id', $form_action_type);
        return $this->db->update('sensor_inventory', $insert_data);


        // return $objData[0];
    }

    public function assetcode_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('id,code');
        $this->db->from('asset');
        $this->db->where('isactive', 1);
        $this->db->where('asset.id NOT IN (select asset_id from device_asset where device_asset.isdeleted=0)');    
        $this->db->group_by('id');
        
        if($group_id =='2'){
        $this->db->where('createdby', $user_id);
        }
        
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function device_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('id,number,serial_no,customer_location_id');
        $this->db->from('device_inventory');
        $this->db->where('isactive', 1);
        $this->db->where(array('isdeleted'=>0));
        $this->db->where('device_inventory.id NOT IN (select device_id from device_asset where device_asset.isdeleted=0)');    
                            
        if($group_id =='2'){
        $this->db->where('createdby', $user_id);
        }
        $this->db->group_by('id');
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

    public function sensorid_list($user_id) {
        $group_id = $this->session->userdata('group_id');
//        $this->db->select('id,sensor_no');
//        $this->db->from('sensor_inventory');
//        $this->db->where('isactive', 1);
//        $this->db->where(array('isdeleted'=>0,'createdby'=>$user_id));
//        $this->db->group_by('id');
        
          $this->db->select('device_inventory.id as `device_inventory_id`,sensor_inventory.id,sensor_inventory.sensor_no');
        $this->db->from('sensor_inventory');
        $this->db->join('device_inventory', 'device_inventory.customer_location_id=sensor_inventory.customer_location_id', 'inner');
        $this->db->where('sensor_inventory.isactive', 1);
        $this->db->where(array('sensor_inventory.isdeleted'=>0));        
        
        if($group_id =='2'){
        $this->db->where('sensor_inventory.createdby', $user_id);
        }
        
        $this->db->group_by('sensor_inventory.id');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
        
        
       
    }

    public function sensor_type_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('id,name');
        $this->db->from('sensor_type');
        $this->db->where('isactive', 1);
        $this->db->where('isdeleted', 0);
        
        if($group_id =='2'){
//        $this->db->where('createdby', $user_id);
        }
        $this->db->group_by('id');
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }

//    sensor_type_list
    public function parameter_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('id,name');
        $this->db->from('parameter');
        $this->db->where('isactive', 1);
        $this->db->where('isdeleted', 0);
        
        if($group_id =='2'){
//        $this->db->where('createdby', $user_id);
        }
        $this->db->group_by('id');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function uomtype_list($parameter, $user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('uom_type.id,uom_type.name,uom_type.uom_id,count(`uom_type`.`id`) as `typecount`');
        $this->db->from('uom_type');
        $this->db->join('parameter', 'parameter.uom_type_id=uom_type.id', 'inner');
        $this->db->where('parameter.isactive', 1);
       
        $this->db->where('parameter.id', $parameter);
        if($group_id =='2'){
//         $this->db->where('parameter.createdby', $user_id);
        }
        $this->db->group_by('parameter.id');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function device_sensors_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('device_sensor_mapping.id,
                           device_sensor_mapping.device_id,
                           device_sensor_mapping.sensor_id,
                           device_sensor_mapping.createdat,
                           device_sensor_mapping.createdby,
                           device_sensor_mapping.isactive,
                           device_inventory.id as `device_inventory_id`,device_inventory.number,
                           sensor_inventory.id as `sensor_inventory_tbl_id,sensor_inventory.sensor_no`,`device_inventory`.number AS `device_id_number`');
        $this->db->from('device_sensor_mapping');
        $this->db->join('device_inventory', 'device_sensor_mapping.device_id=device_inventory.id');
        $this->db->join('sensor_inventory', 'sensor_inventory.id=device_sensor_mapping.sensor_id');
        
        $this->db->where('device_sensor_mapping.isdeleted', 0);
        if($group_id =='2'){
         $this->db->where('device_sensor_mapping.createdby', $user_id);        
        }
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();

        return $objData;
    }

    public function add_devicesensor($insert_data) {
        $table = 'device_sensor_mapping';
        $check = $this->db->insert($table, $insert_data);
        return $this->db->insert_id();
    }

    public function Edit_device_sensors_model($dev_sens_id) {
        $this->db->select('device_sensor_mapping.id,
                           device_sensor_mapping.device_id,
                           device_sensor_mapping.sensor_id,
                           device_sensor_mapping.createdat,
                           device_sensor_mapping.createdby,
                           device_sensor_mapping.isactive,
                           device_inventory.id as `device_inventory_id`,device_inventory.number,
                           sensor_inventory.id as `sensor_inventory_tbl_id,sensor_inventory.sensor_no`');
        $this->db->from('device_sensor_mapping');
        $this->db->join('device_inventory', 'device_sensor_mapping.device_id=device_inventory.id');
        $this->db->join('sensor_inventory', 'sensor_inventory.id=device_sensor_mapping.sensor_id');
        $this->db->where('device_sensor_mapping.id', $dev_sens_id);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();

        return $objData;
    }

    public function Update_device_sensors_model($update_data, $form_action_type_id) {
//        $table='device_sensor_mapping';
        $this->db->where('id', $form_action_type_id);
        return $this->db->update('device_sensor_mapping', $update_data);
    }

//    Delete_sensor_inventory
    public function Delete_Device_sensor($dev_sen_id) {
        $this->db->where(array('id' => $dev_sen_id));
        $update_data = array('isdeleted' => 1);
//        return  $this->db->delete('device_sensor_mapping');
        return $this->db->update('device_sensor_mapping', $update_data);
    }

    //    Delete_sensor_inventory
    public function Delete_sensor_inventory($sen_inv_id) {
        $this->db->where(array('id' => $sen_inv_id));
        //return  $this->db->delete('sensor_inventory');
        $update_data = array('isdeleted' => 1);
        return $this->db->update('sensor_inventory', $update_data);
    }

    public function add_device_asset($insert_data) {
        $table = 'device_asset';
        $check = $this->db->insert($table, $insert_data);
        return $this->db->insert_id();
    }

    public function device_asset_list($user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('device_asset.id,
                           device_asset.device_id,
                           device_asset.asset_id,
                           device_asset.createdate,
                           device_asset.createdby,device_inventory.isactive,
                           device_inventory.id as `device_inventory_id`,device_inventory.number,asset.code');
        $this->db->from('device_inventory');
        $this->db->join('device_asset', 'device_asset.device_id=device_inventory.id');
        $this->db->join('asset', 'asset.id=device_asset.asset_id');
        
        $this->db->where('device_asset.isdeleted', 0);
         if($group_id =='2'){
         $this->db->where('device_inventory.createdby', $user_id);
        }
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }

    public function Edit_device_asset_model($dev_asset_id) {
        $this->db->select('device_asset.id,
                           device_asset.device_id,
                           device_asset.asset_id,
                           device_asset.createdate,
                           device_asset.createdby,
                           device_inventory.id as `device_inventory_id`,device_inventory.number,asset.code');
        $this->db->from('device_inventory');
        $this->db->join('device_asset', 'device_asset.device_id=device_inventory.id');
        $this->db->join('asset', 'asset.id=device_asset.asset_id');
        $this->db->where('device_asset.id', $dev_asset_id);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();

        return $objData;
    }

    public function Update_device_asset_model($update_data, $form_action_type_id) {
//        $table='device_sensor_mapping';
        $this->db->where('id', $form_action_type_id);
        return $this->db->update('device_asset', $update_data);
//                    echo $this->db->last_query(); exit;
    }

    public function Delete_device_asset($dev_asset_id) {
        $update_data = array('isdeleted' => 1);
        $this->db->where(array('id' => $dev_asset_id));
//        return  $this->db->delete('device_asset');
        return $this->db->update('device_asset', $update_data);
    }

    public function Check_devicenum_is_exist($devicenum, $user_id) {
        $this->db->select('id,number,count(number) as `Cnt_number`');
        $this->db->from('device_inventory');
        $this->db->limit('1');
        $this->db->group_by('id');
        $this->db->where('device_inventory.number', $devicenum);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result();
        return $objData;
    }

    public function Check_serialnum_is_exist($devicenum, $user_id) {
        $this->db->select('id,serial_no,count(serial_no) as `Cnt_number`');
        $this->db->from('device_inventory');
        $this->db->limit('1');
        $this->db->group_by('id');
        $this->db->where('device_inventory.serial_no', $devicenum);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result();
        return $objData;
    }
    
        function load_uomtype_by_parameter() {
        $data = '';

        $user_id = $this->session->userdata('user_id');
        $parameter = $this->input->post('parameterid');
        $uomtypedata = $this->Inventory_model->uomtype_list($parameter, $user_id);

        echo json_encode($uomtypedata);
    }
    
        public function Load_Locationwise_sensor_list($deviceid, $user_id) {       
        $group_id = $this->session->userdata('group_id');
        $this->db->select('device_inventory.id as `device_inventory_id`,sensor_inventory.id as `sensor_inventory_id`,sensor_inventory.sensor_no');
        $this->db->from('device_inventory');
        $this->db->join('sensor_inventory', 'sensor_inventory.customer_location_id=device_inventory.customer_location_id', 'inner');
        $this->db->where('sensor_inventory.isactive', 1);
        $this->db->where(array('device_inventory.id'=>$deviceid,'sensor_inventory.isdeleted'=>0));        
        if($group_id =='2'){
         $this->db->where('sensor_inventory.createdby', $user_id);
        }
        $this->db->group_by('sensor_inventory.id');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }
        public function Load_Locationwise_assetid_list($deviceid,$user_id) {
       $group_id = $this->session->userdata('group_id');     
        $this->db->select('device_inventory.id as `device_inventory_id`,asset.id,asset.code');
        $this->db->from('device_inventory');
        $this->db->join('asset', 'asset.customer_locationid=device_inventory.customer_location_id', 'inner');
        $this->db->where('asset.isactive', 1);
        $this->db->where(array('device_inventory.id'=>$deviceid,'asset.isdeleted'=>0));  
        $this->db->where('asset.id NOT IN (select asset_id from device_asset where device_asset.isdeleted=0)');    
         if($group_id =='2'){
         $this->db->where('asset.createdby', $user_id);
        }
        
        $this->db->group_by('asset.id');        
        $query = $this->db->get();
//        echo $this->db->last_query();
        $objData = $query->result_array();
        return $objData;
    }
    
    public function getsensor_data($deviceid,$user_id){
        $group_id = $this->session->userdata('group_id');     
        $this->db->select('sensor_inventory.id as `sensorid`,sensor_inventory.sensor_no');
        $this->db->from('device_inventory');
        $this->db->join('sensor_inventory', 'sensor_inventory.customer_location_id=device_inventory.customer_location_id', 'inner');
        $this->db->where('sensor_inventory.isactive', 1);
        $this->db->where(array('device_inventory.id'=>$deviceid,'sensor_inventory.isdeleted'=>0));        
        if($group_id =='2'){
         $this->db->where('sensor_inventory.createdby', $user_id);
        }
        $this->db->group_by('sensor_inventory.id');
        $query = $this->db->get();
         foreach ($query->result_array() as $k => $row) {
            $row_set[$k]['id'] = htmlentities(stripslashes($row['sensorid']));
            $row_set[$k]['name'] = htmlentities(stripslashes($row['sensor_no']));
        }

        echo json_encode($row_set);
        
//        $objData = $query->result_array();
//         foreach ($objData as $k => $row) {
//            $objData[$k]['sensorid'] = htmlentities(stripslashes($row['sensor_inventory_id']));
//            $objData[$k]['sensorno'] = htmlentities(stripslashes($row['sensor_no']));
//        }
//        echo json_encode($objData);
    }

}
