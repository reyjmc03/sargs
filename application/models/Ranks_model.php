<?php
class Ranks_model extends CI_Model {
    public $table_ranks = 'tbl_ref_ranks';

    function __construct() {
        parent::__construct();
    }

    // get all ranks
    public function get_all_data() {
        $query = $this->db->select('id');
        $query = $this->db->select('rank');
        $query = $this->db->select('description');
        $query = $this->db->select('category');
        $qeury = $this->db->select('date_created');
        $query = $this->db->select('date_modified');
        $query = $this->db->from('tbl_ref_ranks');
        $query = $this->db->get();

        if ($query->num_rows() >= 1){
            return $query->result();
        } else {
            return FALSE;
        }
    }

    // display total rows count
    public function count_all() {
        $this->db->from('tbl_ref_ranks');
        return $this->db->count_all_results();
    }

    // search  rank data
    public function search_data($match) {
        $query = $this->db->select('id');
        $query = $this->db->select('rank');
        $query = $this->db->select('description');
        $query = $this->db->select('category');
        $qeury = $this->db->select('date_created');
        $query = $this->db->select('date_modified');

        $query = $this->db->from('tbl_ref_ranks');

        $query = $this->db->like('id', $match, 'both');
        $query = $this->db->or_like('rank', $match, 'both');
        $query = $this->db->or_like('description', $match, 'both');
        $query = $this->db->or_like('category', $match, 'both');
        $query = $this->db->or_like('date_created', $match, 'both');
        $query = $this->db->or_like('date_modified', $match, 'both');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // delete only rank
    public function delete_only_data($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_ref_ranks');

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    } 

    // delete all ranks
    public function delete_all_data() {
        $this->db->empty_table('tbl_ref_ranks');

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}