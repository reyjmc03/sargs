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
    public function search_rank_data($match) {
        $query = $this->db->select('id');
        $query = $this->db->select('rank');
        $query = $this->db->select('description');
        $query = $this->db->select('category');
        $qeury = $this->db->select('date_created');
        $query = $this->db->select('date_modified');

        $query = $this->db->from('tbl_ref_ranks');

        $query = $this->db->like('id', $match, 'both');
        $query = $this->db->like('ranks', $match, 'both');
        $query = $this->db->like('description', $match, 'both');
        $query = $this->db->like('category', $match, 'both');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}