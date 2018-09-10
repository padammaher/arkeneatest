<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inventory_model extends MY_Model {

    public $_table = 'groups';
    public $primary_key = 'id';
    public $belongs_to = array('country', 'state');
    public $before_create = array('timestamps_bc');

    function Add_deviceinventory($data) {
//   print_r($data);
        $todaysdate=date('Y-m-d'); 
        $user_id = $this->session->userdata('user_id');
        $isactivestatus = ($data['device_status'] == "on") ?'1':'0' ;
            $insert_data=array(
                                'user_id'=>$user_id,
                                'number'=>$data['devicename'],
                                'serial_no'=>$data['serialnumber'],
                                'make'=>$data['devicemake'],
                                'model'=>$data['devicemodel'],
                                'description'=>$data['devicedescription'],
                                'communication_type'=>$data['comm_type'],
                                'gsm_number'=>$data['gsmnumber'],
                                'communication_status'=>$data['comm_status'],
                                'communication_history'=>$data['comm_history'],
                                'communication_protocol'=>$data['comm_protocol'],
                                'createdat'=>$todaysdate,
                                'createdby'=>$user_id,
                                'isactive`'=>$isactivestatus  
                              );
  
        $table = 'device_inventory';
//        print_r($insert_data);
//        exit;
//        unset($_POST);
        $check = $this->db->insert($table, $insert_data);
        return $this->db->insert_id();
        
        
//        echo $this->db->last_query();exit;
    }

    public function Device_inventory_list() {
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
                            isactive');
        $this->db->from('device_inventory');
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
                            isactive');
        $this->db->from('device_inventory');
        $this->db->where('id',$inventoryid);
        $query = $this->db->get();
        
        $objData = $query->result_array();
        return $objData;
    }
    
    public function update_deviceinventory($insert_data,$form_action_type) {
        $table='device_inventory';
//            $data=array('report_flag'=>$flagstatus);
            //$this->db->set('report_flag','report_flag',false);
            $this->db->where('id',$insert_data['id']);
            return $this->db->update('device_inventory',$insert_data);
        
       
       // return $objData[0];
    }

    public function Delete_Device_inventory($dev_inv_id) {
       $this->db->where(array('id'=>$dev_inv_id));
        return  $this->db->delete('device_inventory');
    }
    
    //------ * sensor Inventory *--------
    public function sensor_inventory_list() {
                       $this->db->select('device_sensor_mapping.id,
                           device_sensor_mapping.device_id,
                           device_sensor_mapping.sensor_id,
                           device_sensor_mapping.createdat,
                           device_sensor_mapping.createdby,
                           device_inventory.id as `device_inventory_id`,device_inventory.number');
        $this->db->from('device_sensor_mapping');
        $this->db->join('device_inventory','device_sensor_mapping.device_id=device_inventory.id');
        $query = $this->db->get();
        $objData = $query->result_array();
        return $objData;
    }
    
    
    public function device_list() {
               $this->db->select('id,                            
                            number,
                            serial_no');
        $this->db->from('device_inventory');
        $this->db->where('isactive',1);
        $query = $this->db->get();
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
                           device_inventory.id as `device_inventory_id`,device_inventory.number');
        $this->db->from('device_sensor_mapping');
        $this->db->join('device_inventory','device_sensor_mapping.device_id=device_inventory.id');
        $this->db->where('device_sensor_mapping.id',$dev_sens_id);        
        $query = $this->db->get();        
//        echo $this->db->last_query();
        $objData = $query->result_array();
        
        return $objData;
    }
    
    
     public function Update_device_sensors_model($update_data,$form_action_type_id) {
//        $table='device_sensor_mapping';
            $this->db->where('id',$form_action_type_id);
            return $this->db->update('device_sensor_mapping',$update_data);

    }
//    Delete_sensor_inventory
        public function Delete_sensor_inventory($dev_sen_id) {
       $this->db->where(array('id'=>$dev_sen_id));
        return  $this->db->delete('device_sensor_mapping');
    }
    
        public function add_device_asset($insert_data) {
         $table = 'device_asset'; 
        $check = $this->db->insert($table, $insert_data);
        return $this->db->insert_id();
    } 
     public function device_asset_list() {
                       $this->db->select('device_asset.id,
                           device_asset.device_id,
                           device_asset.asset_id,
                           device_asset.createdate,
                           device_asset.createdby,
                           device_inventory.id as `device_inventory_id`,device_inventory.number');
        $this->db->from('device_asset');
        $this->db->join('device_inventory','device_asset.device_id=device_inventory.id');
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
                           device_inventory.id as `device_inventory_id`,device_inventory.number');
        $this->db->from('device_asset');
        $this->db->join('device_inventory','device_asset.device_id=device_inventory.id');
        $this->db->where('device_asset.id',$dev_asset_id);        
        $query = $this->db->get();        
//        echo $this->db->last_query();
        $objData = $query->result_array();
        
        return $objData;
    }
    
         public function Update_device_asset_model($update_data,$form_action_type_id) {
//        $table='device_sensor_mapping';
            $this->db->where('id',$form_action_type_id);
            return $this->db->update('device_asset',$update_data);
//                    echo $this->db->last_query(); exit;

    }
    
            public function Delete_device_asset($dev_asset_id) {
       $this->db->where(array('id'=>$dev_asset_id));
        return  $this->db->delete('device_asset');
    }

}
