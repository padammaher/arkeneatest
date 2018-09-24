<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UomModel extends MY_Model {

//    public $_table = '';
//    public $primary_key = 'id';
//    protected $soft_delete = true;
//    protected $soft_delete_key = 'isactive';


    function get_uomtypes($user_id) {
        $this->db->select('uom_type.id,uom_type.name,uom.name as uomname,uom_type.isactive');
        $this->db->from('uom_type');
        $this->db->join('uom', 'uom_type.uom_id=uom.id');
        $this->db->where(array('uom_type.createdby' => $user_id));
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_uom($id, $type = "normal") {
        $this->db->select('uom.id,uom.name');
        $this->db->from('uom');
        $this->db->where(array('createdby' => $id, 'isactive' => 1));
        $query = $this->db->get();

        if ($type == "json") {
            foreach ($query->result_array() as $k => $row) {
                $row_set[$k]['id'] = htmlentities(stripslashes($row['id']));
                $row_set[$k]['name'] = htmlentities(stripslashes($row['name']));
            }
            echo json_encode($row_set);
        } else {
            $result = $query->result_array();
            return $result;
        }
    }

    function insert_uom($uom_data) {
        $this->db->insert('uom', $uom_data);
        return $this->db->insert_id();
    }

    function update_uom($id, $uom_data) {
        $uomtype = $this->db->from('uom_type')->where('id', $id)->get()->result();
        if (count($uomtype) == 1) {
            $this->db->where('uom.id', $uomtype[0]->uom_id);
            $this->db->update('uom', $uom_data);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }

    function insert_uom_type($data) {
//        $alreadyexit = $this->db->from('uom_type')->where('name', $data['name'])->get()->result();
//        if (!$alreadyexit) {
        $this->db->insert('uom_type', $data);
        return $this->db->affected_rows();
//        } else {
//            return 'duplicate';
//        }
    }

    function uomtype_update($id, $data) {
        $alreadyexit = $this->db->from('uom_type')->where('id', $id)->get()->result();
        if ($alreadyexit) {
            $this->db->where('id', $id);
            $this->db->update('uom_type', $data);
        }
        return $this->db->affected_rows();
    }

    function get_uom_type($id) {
        $this->db->select('uom_type.id,uom_type.name,uom.name as uomname');
        $this->db->from('uom_type');
        $this->db->join('uom', 'uom_type.uom_id=uom.id');
        $this->db->where('uom_type.id', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

}
