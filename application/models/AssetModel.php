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

    function get_AssetCategoryList($user_id) {
        $this->db->select('asset_category.id,asset_category.name,asset_category.description,asset_category.isactive');
        $this->db->from('asset_category');
        $this->db->where(array('createdby' => $user_id, 'isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_asset_category($id) {
        $this->db->select('asset_category.id,asset_category.name,asset_category.description,asset_category.isactive');
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

    function get_assettypeList($user_id) {
        $this->db->select('asset_type.id,asset_type.name,asset_type.description,asset_type.isactive');
        $this->db->from('asset_type');
        $this->db->where(array('createdby' => $user_id, 'isdeleted' => 0));
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_asset_type($id) {
        $this->db->select('asset_type.id,asset_type.name,asset_type.description,asset_type.isactive');
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

    function check_category_in_use($id) {
        $this->db->select('asset.id,asset.code');
        $this->db->join('asset_category', 'asset.asset_catid=asset_category.id');
        $this->db->where(array('asset.asset_catid' => $id, 'asset.isactive' => 1, 'asset.isdeleted' => 0));
        $result = $this->db->get('asset')->result();
        return $result;
    }

    function check_assettype_in_use($id) {
        $this->db->select('asset.id,asset.code');
        $this->db->join('asset_type', 'asset.asset_typeid=asset_type.id');
        $this->db->where(array('asset.asset_typeid' => $id, 'asset.isactive' => 1, 'asset.isdeleted' => 0));
        $result = $this->db->get('asset')->result();
        return $result;
    }

}

/* End of file MasterModel.php */
/* Location: ./application/modules/account/models/MasterModule.php */