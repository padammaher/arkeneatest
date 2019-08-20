<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ParameterModel extends MY_Model {

//    public $_table = '';
//    public $primary_key = 'id';
//    protected $soft_delete = true;
//    protected $soft_delete_key = 'isactive';

    function get_parameter_list($user_id, $id = null) {
        $this->db->select('parameter.id,parameter.name,parameter.description,uom_type.name as uomtype_name,parameter.isactive');
        $this->db->from('parameter');
        $this->db->join('uom_type', 'parameter.uom_type_id=uom_type.id', 'left');
        if ($id != null) {
            $this->db->where('parameter.id', $id);
        }
        $this->db->where(array('parameter.isdeleted' => 0));
        $this->db->where('parameter.isactive', 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function get_parameterlist($user_id, $id = null) {
        $asset_id = $this->session->userdata('asset_id');
        $this->db->select('parameter.id,parameter.name,parameter.description,uom_type.name as uomtype_name,parameter.isactive');
        $this->db->from('parameter');
        $this->db->join('uom_type', 'parameter.uom_type_id=uom_type.id', 'left');
        if ($id != null) {
            $this->db->where('parameter.id', $id);
            // $this->db->where('parameter.id NOT IN (select parameter_id from parameter_range where asset_id="'.$asset_id.'" and isdeleted=0)',NULL , FALSE);
        } else {
            $this->db->where('parameter.id NOT IN (select parameter_id from parameter_range where asset_id="' . $asset_id . '" and isdeleted=0 and parameter.id=parameter_range.parameter_id)', NULL, FALSE);
        }

        // parameter.id NOT IN (select parameter_id from parameter_range where asset_id=1 and isdeleted=0
        // and parameter.id=parameter_range.parameter_id);
        // $this->db->where('asset.id NOT IN (select asset_user.asset_id from asset_user where isdeleted=0 and asset_user.asset_id=asset.id)', NULL, FALSE);
        $this->db->where(array('parameter.isdeleted' => 0));
//        $this->db->where('parameter.isactive', 1);
        $query = $this->db->get();
//        echo $this->db->last_query();
//        exit();
        $result = $query->result_array();

        return $result;
    }

    public function get_parameter($id) {
        $this->db->select('parameter.id,parameter.name,parameter.description,parameter.uom_type_id,parameter.isactive');
        $this->db->from('parameter');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function insert_parameter($data) {
        $alreadyexit = $this->db->from('parameter')->where(array('name' => $data['name'], 'uom_type_id' => $data['uom_type_id']))->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('parameter', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function parameter_update($id, $data) {
        $alreadyexit = $this->db->from('parameter')->where(array('name' => $data['name'], 'uom_type_id' => $data['uom_type_id']))->get()->result();
        if (count($alreadyexit) == 0) {
            $this->db->where('id', $id);
            $this->db->update('parameter', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function get_uomtypes($user_id) {
        $this->db->distinct();
        $this->db->select('uom_type.id,uom_type.name');
        $this->db->from('uom_type');
        $this->db->where(array('uom_type.isactive' => 1, 'isdeleted' => 0, 'uom_type.createdby' => $user_id));
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function check_parameter_in_use($id) {
        $this->db->select('parameter_range.id');
        $this->db->join('parameter_range', 'parameter.id = parameter_range.parameter_id');
        $this->db->where(array('parameter.id' => $id, 'parameter_range.isactive' => 1, 'parameter_range.isdeleted' => 0));
        $result = $this->db->get('parameter')->result();

        if (count($result) > 0) {
            return count($result);
        } else {
            $this->db->select('sensor_inventory.id');
            $this->db->join('sensor_inventory', 'parameter.id = sensor_inventory.parameter_id');
            $this->db->where(array('parameter.id' => $id, 'sensor_inventory.isactive' => 1, 'sensor_inventory.isdeleted' => 0));
            $result1 = $this->db->get('parameter')->result();
            return count($result1);
        }
    }

}

/* End of file MasterModel.php */
/* Location: ./application/modules/account/models/MasterModule.php */