<?php
class Bos_model extends CI_Model {
    public $table_bos = 'tbl_ref_bos';

    function __construct() {
        parent::__construct();
    }

    // get all bos
    public function get_all_data() {
        $query = $this->db->select('id');
        $query = $this->db->select('bos');
        $query = $this->db->select('description');
        $query = $this->db->select('date_created');
        $query = $this->db->select('date_modified');
        $query = $this->db->from('tbl_ref_bos');
        $query = $this->db->order_by("id", "desc");
        $query = $this->db->get();

        if($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

     // display total rows count
     public function count_all() {
        $this->db->from('tbl_ref_bos');
        return $this->db->count_all_results();
    }

    // search bos data
    public function search_data($match) {
        $query = $this->db->select('id');
        $query = $this->db->select('bos');
        $query = $this->db->select('description');
        $query = $this->db->select('date_created');
        $query = $this->db->select('date_modified');

        $query = $this->db->from('tbl_ref_bos');

        $query = $this->db->like('id', $match, 'both');
        $query = $this->db->or_like('bos', $match, 'both');
        $query = $this->db->or_like('description', $match, 'both');
        $query = $this->db->or_like('date_created', $match, 'both');
        $query = $this->db->or_like('date_modified', $match, 'both');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // delete only bos
    public function delete_only_data($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_ref_bos');

        if($this->db->affect_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // delete all bos
    public function delete_all_data() {
        $this->db->empty_table('tbl_ref_bos');

        if($this->db->affected_rows() > 0) {
            return true;
        } else { 
            return false; 
        }
    }

    // add bos
    public function add_data($data) {
        return $this->db->insert('tbl_ref_bos', $data);
    }

    // update bos
    public function update_data($id, $field) {
        $this->db->where('id', $id);
        $this->db->update('tbl_ref_bos', $field);
        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}