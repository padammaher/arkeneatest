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

    public function load_dashboard_batch_data($user_id) {
        $batch_data_query = $this->db->select('`batchdata`.`id`,
                                            `batchdata`.`serial_num`,
                                            `batchdata`.`asset_id`,`asset`.`code`,
                                            `asset`.`location_id` as `asset_location_id`,`asset`.`customer_locationid`,
                                            `batchdata`.`device_id`,
                                            `batchdata`.`location_id`,
                                            `batchdata`.`p1`,
                                            `batchdata`.`p2`,
                                            `batchdata`.`p3`,
                                            `batchdata`.`p4`,
                                            `batchdata`.`p5`,
                                            `batchdata`.`runcode_id`,
                                            `batchdata`.`createddate`')
                ->from('batchdata')
                ->join('runcode', 'batchdata.runcode_id=runcode.id', 'inner')
                ->join('asset', 'asset.id= batchdata.asset_id', 'inner')
                ->where('batchdata.runcode_id =(select id from runcode order by runcode.id desc limit 1)', NULL, FALSE)
                ->get();

        return $batch_data_result = $batch_data_query->result_array();
    }

    function get_data_by_assets($asset_id, $location_id, $user_id) {
        $group_id = $this->session->userdata('group_id');
        $this->db->select('device_asset.id,
                           device_asset.device_id,
                           device_asset.asset_id,
                           device_asset.createdate,
                           device_asset.createdby,device_asset.isactive,
                           device_inventory.id as `device_inventory_id`,device_inventory.number,asset.code');
        $this->db->from('device_inventory');
        $this->db->join('device_asset', 'device_asset.device_id=device_inventory.id');
        $this->db->join('asset', 'asset.id=device_asset.asset_id');

        $this->db->where(array('device_asset.asset_id' => $asset_id, 'device_asset.isdeleted' => 0));
        if ($group_id == '2') {

            // $this->db->where('device_inventory.customer_location_id',$location_id);
        }

        $query = $this->db->get();
        // echo $this->db->last_query();        
        $data['objData'] = $query->result_array();


        $query2 = "select parameter.id,parameter_range.min_value,parameter_range.max_value,parameter.name,uom.name as uom,
                (CASE 
                  WHEN parameter.id ='1' THEN (select batchdata.p1 from batchdata where batchdata.asset_id='" . $asset_id . "' order by batchdata.id desc limit 1)  
                  WHEN parameter.id ='2' THEN (select batchdata.p2 from batchdata where batchdata.asset_id='" . $asset_id . "' order by batchdata.id desc limit 1)  
                  WHEN parameter.id ='3' THEN (select batchdata.p3 from batchdata where batchdata.asset_id='" . $asset_id . "' order by batchdata.id desc limit 1)  
                  WHEN parameter.id ='4' THEN (select batchdata.p4 from batchdata where batchdata.asset_id='" . $asset_id . "' order by batchdata.id desc limit 1)  
                  WHEN parameter.id ='5' THEN (select batchdata.p5 from batchdata where batchdata.asset_id='" . $asset_id . "' order by batchdata.id desc limit 1)  
                  ELSE 0
                END) AS 'current_value'
                from parameter
                inner join parameter_range on parameter.id = parameter_range.parameter_id
                inner join uom on parameter_range.uom_id=uom.id
                group by parameter.id";

        $data['chart_data'] = $this->db->query($query2)->result_array();
        return $data;
    }

}
