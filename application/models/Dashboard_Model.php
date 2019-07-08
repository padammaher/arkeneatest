<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_Model extends MY_Model {

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
                                             `batchdata`.`createddate`,
                                             `runcode`.`start`,
                                             `runcode`.`end`')
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

    function get_total_alarms($user_id) {
        $location_id = $this->session->userdata('location_id');
        $group_id = $this->session->userdata('group_id');
        $this->db->select('trigger.id');
        $this->db->join('asset', 'trigger.asset_id=asset.id');
        if ($group_id != 1) {
            $this->db->where('asset.customer_locationid', $location_id);
        }
        $this->db->where('asset.isdeleted', 0);
        $response = $this->db->get('trigger')->result();
        return $response;
    }

    function get_total_assets($user_id) {
        $location_id = $this->session->userdata('location_id');
        $group_id = $this->session->userdata('group_id');
        $this->db->select('asset.id,isactive');
        if ($group_id != 1) {
            $this->db->where('customer_locationid', $location_id);
        }
        $this->db->where('isdeleted', 0);
        $response = $this->db->get('asset')->result();
        return $response;
    }

    function get_device_status() {
//        $this->db->select('asset.id');
//        $this->db->where('asset.isactive', 1);
//        $result = $this->db->get('asset')->result_array();
//        $device_info = array();
//        if (isset($result) && !empty($result)) {
//            foreach ($result as $asset) {
        $this->db->select('batchdata.status,device_inventory.number,runcode.start,runcode.end');
        $this->db->join('asset', 'batchdata.asset_id=asset.id');
        $this->db->join('device_inventory', 'batchdata.device_id=device_inventory.id');
        $this->db->join('runcode', 'batchdata.runcode_id=runcode.id');
//                $this->db->where('asset.id', $asset['id']);
        $this->db->where('batchdata.createddate', date("Y-m-d"));
        $this->db->order_by('batchdata.id', 'desc');
//                $this->db->limit(1);
        $device = $this->db->get('batchdata')->result_array();
//                if (isset($device) && !empty($device)) {
//                    foreach ($device as $d) {
//                        $device_info[] = $d;
//                    }
//                }
//            }
//        }
        return $device;
    }

    function get_alarms() {
        
    }

}
