<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SensorModel extends MY_Model {

//    public $_table = '';
//    public $primary_key = 'id';
//    protected $soft_delete = true;
//    protected $soft_delete_key = 'isactive';

    function get_sensortypeList($user_id) {
        $this->db->select('sensor_type.id,sensor_type.name,sensor_type.description,sensor_type.isactive');
        $this->db->from('sensor_type');
        $this->db->where(array('createdby' => $user_id, 'isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_sensor_type($id) {
        $this->db->select('sensor_type.id,sensor_type.name,sensor_type.description,sensor_type.isactive');
        $this->db->from('sensor_type');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function insert_sensor_type($data) {
        $alreadyexit = $this->db->from('sensor_type')->where('name', $data['name'])->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('sensor_type', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function sensortype_update($id, $data) {
        $alreadyexit = $this->db->from('sensor_type')->where('id', $id)->get()->result();
        if ($alreadyexit) {
            $this->db->where('id', $id);
            $this->db->update('sensor_type', $data);
        }
        return $this->db->affected_rows();
    }

    function check_sensortype_in_use($id) {
        $this->db->select('sensor_inventory.id,sensor_inventory.sensor_no');
        $this->db->join('sensor_type', 'sensor_inventory.sensor_type_id=sensor_type.id');
        $this->db->where(array('sensor_inventory.sensor_type_id' => $id, 'sensor_inventory.isactive' => 1, 'sensor_inventory.isdeleted' => 0));
        $result = $this->db->get('sensor_inventory')->result();
        return $result;
    }

}

/* End of file MasterModel.php */
/* Location: ./application/modules/account/models/MasterModule.php */