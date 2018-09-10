<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UomModel extends MY_Model {

//    public $_table = '';
//    public $primary_key = 'id';
//    protected $soft_delete = true;
//    protected $soft_delete_key = 'isactive';


    function get_uomtypes($user_id) {
        $this->db->select('uom_type.id,uom_type.name,uom.name as uomname');
        $this->db->from('uom_type');
        $this->db->join('uom', 'uom_type.uom_id=uom.id');
        $this->db->where('uom_type.createdby', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_uom($id) {
        $this->db->select('uom.id,uom.name');
        $this->db->from('uom');
        $this->db->where(array('createdby' => $id, 'isactive' => 1));
        $query = $this->db->get();

        foreach ($query->result_array() as $k => $row) {
            $row_set[$k]['id'] = htmlentities(stripslashes($row['id']));
            $row_set[$k]['name'] = htmlentities(stripslashes($row['name']));
        }

        echo json_encode($row_set);
    }

    function insert_uom($data) {
        $alreadyexit = $this->db->from('asset_type')->where('name', $data['name'])->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('asset_type', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function uomtype_update($id, $data) {
        $alreadyexit = $this->db->from('asset_type')->where('id', $id)->get()->result();
        if ($alreadyexit) {
            $this->db->where('id', $id);
            $this->db->update('asset_type', $data);
        }
        return $this->db->affected_rows();
    }

}
