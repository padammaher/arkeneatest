<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UomModel extends MY_Model {

//    public $_table = '';
//    public $primary_key = 'id';
//    protected $soft_delete = true;
//    protected $soft_delete_key = 'isactive';


    function get_uomtypes($user_id) {
          $user_id = $this->session->userdata('user_id');
        $this->db->select('uom_type.id,uom_type.name,uom_type.isactive,uom_type.createdby');
        $this->db->from('uom_type');
       // $this->db->join('uom', 'uom_type.uom_id=uom.id');
        $this->db->where(array('uom_type.createdby' => $user_id,'uom_type.isactive' => 1,'uom_type.isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();
               if($result){
            foreach($result as $key=>$value){
                $result[$key]['uomlist']= $this->get_uom_data($value['id']); 
            }
        }
        return $result;
    }
    public  function get_uom_data($uom_type_id)
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('id,name');
        $this->db->from('uom');
        $this->db->where(array('uom_type_id'=>$uom_type_id,'uom.createdby' => $user_id, 'uom.isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function get_uom_list($user_id) {
        
        $this->db->select('uom.id,uom_type.name,uom.name as uomname,uom_type.isactive');
        $this->db->from('uom_type');
        $this->db->where(array('uom_type.createdby' => $user_id, 'uom.isdeleted' => 0));
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

    public function uom_types($id) {
        $this->db->distinct();
        $this->db->select('uom_type.id,uom_type.name');
        $this->db->from('uom_type');
        $this->db->where(array('uom_type.isactive' => 1, 'isdeleted' => 0, 'uom_type.createdby' => $id));
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function insert_uom($uom_data) {
        $this->db->insert('uom', $uom_data);
        return $this->db->affected_rows();
    }

    function update_uom($id, $uom_data) {
        $uomtype = $this->db->from('uom')->where('id', $id)->get()->result();
        if (count($uomtype) == 1) {
            $this->db->where('uom.id', $id);
            $this->db->update('uom', $uom_data);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }

    function insert_uom_type($data) {
        $alreadyexit = $this->db->from('uom_type')->where('name', $data['name'])->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('uom_type', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function uomtype_update($id, $data) {
        $alreadyexit = $this->db->from('uom_type')->where('name', $data['name'])->get()->result();
        if (count($alreadyexit) == 1) {
            $this->db->where('id', $id);
            $this->db->update('uom_type', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function get_uom_type($id) {
        $this->db->select('uom_type.id,uom_type.name');
        $this->db->from('uom_type');
       // $this->db->join('uom', 'uom_type.uom_id=uom.id');
        $this->db->where('uom_type.id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
         if($result){
             foreach($result as $key=>$value){
                $result[$key]['uomlist']= $this->get_uom_data($value['id']); 
            }
        }
        return $result;
    }
    
    
    public function  get_uom_exitst($uom_name){
         $result1=$this->db->from('uom')->where('name',$uom_name)->get()->result(); 
         if($result1){
              return $result1; 
         }else{
             return false; 
         }
                
    }
    
    public function  delete_uom($id){
        $this->db->where('uom_type_id', $id);
         $this->db->delete('uom'); 
         return true; 
    }
    public function  delete_uom_record($id,$data)
    {     //print_r($id); exit(); 
          $this->db->where('uom_type_id', $id);
          $this->db->update('uom', $data);
       return $this->db->affected_rows();
    }

}
