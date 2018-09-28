<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ParameterModel extends MY_Model {

//    public $_table = '';
//    public $primary_key = 'id';
//    protected $soft_delete = true;
//    protected $soft_delete_key = 'isactive';

    function get_parameterlist($user_id, $id = null) {
        $this->db->select('parameter.id,parameter.name,parameter.description,uom_type.name as uomtype_name,parameter.isactive');
        $this->db->from('parameter');
        $this->db->join('uom_type', 'parameter.uom_type_id=uom_type.id');
        if ($id != null) {
            $this->db->where('parameter.id', $id);
        }
        $this->db->where(array('parameter.isdeleted' => 0));
//        $this->db->where('parameter.isactive', 1);
        $query = $this->db->get();
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
        $alreadyexit = $this->db->from('parameter')->where('id', $id)->get()->result();
        if ($alreadyexit) {
            $this->db->where('id', $id);
            $this->db->update('parameter', $data);
        }
        return $this->db->affected_rows();
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

}

/* End of file MasterModel.php */
/* Location: ./application/modules/account/models/MasterModule.php */