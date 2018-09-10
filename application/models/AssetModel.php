<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AssetModel extends MY_Model {

    function __construct() {
        parent::__construct();
//        $this->load->database();
    }

    //public $_table = 'main_business_entity';
//    public $primary_key = 'id';
//    protected $soft_delete = true;
//    protected $soft_delete_key = 'isactive';

    function get_AssetCategoryList() {
        $this->db->select('asset_category.id,asset_category.name,asset_category.description,asset_category.isactive');
        $this->db->from('asset_category');
        $this->db->where('isactive', 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_asset_category($id) {
        $this->db->select('asset_category.id,asset_category.name,asset_category.description');
        $this->db->from('asset_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function insert_asset_category($data) {
        $alreadyexit = $this->db->from('asset_category')->where('name', $data['name'])->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('asset_category', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function assetcategory_update($id, $data) {
        $alreadyexit = $this->db->from('asset_category')->where('id', $id)->get()->result();
        if ($alreadyexit) {
            $this->db->where('id', $id);
            $this->db->update('asset_category', $data);
        }
        return $this->db->affected_rows();
    }

    function get_assettypeList() {
        $this->db->select('asset_type.id,asset_type.name,asset_type.description');
        $this->db->from('asset_type');
        $this->db->where('isactive', 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_asset_type($id) {
        $this->db->select('asset_type.id,asset_type.name,asset_type.description');
        $this->db->from('asset_type');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function insert_asset_type($data) {
        $alreadyexit = $this->db->from('asset_type')->where('name', $data['name'])->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('asset_type', $data);
            return $this->db->affected_rows();
        } else {
            return 'duplicate';
        }
    }

    function assettype_update($id, $data) {
        $alreadyexit = $this->db->from('asset_type')->where('id', $id)->get()->result();
        if ($alreadyexit) {
            $this->db->where('id', $id);
            $this->db->update('asset_type', $data);
        }
        return $this->db->affected_rows();
    }

}

/* End of file MasterModel.php */
/* Location: ./application/modules/account/models/MasterModule.php */