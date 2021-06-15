<?php 
class Rank_model extends CI_Model {
    public $table = 'tbl_ref_afpos';


    function __construct(){
        parent::__construct();
    }


    // get all afpos
    public function get_all_data() {
        $query = $this->db->select('id');
        $query = $this->db->select('afpos');
        $query = $this->db->select('description');
        $qeury = $this->db->select('date_created');
        $query = $this->db->select('date_modified');
        $query = $this->db->from('tbl_ref_afpos');
        $query = $this->db->get();

        if ($query->num_rows() >= 1){
            return $query->result();
        } else {
            return FALSE;
        }
    }

    // display total count
    public function count_all() {
        $this->db->from('tbl_ref_afpos');
        return $this->db->count_all_results();
    } 


    // search afpos
    public function search_data() {
        $query = $this->db->select('id');
        $query = $this->db->select('afpos');
        $query = $this->db->select('description');
        $qeury = $this->db->select('date_created');
        $query = $this->db->select('date_modified');

        $query = $this->db->from('tbl_ref_afpos');

        $query = $this->db->like('id', $match, 'both');
        $query = $this->db->like('afpos', $match, 'both');
        $query = $this->db->like('description', $match, 'both');
        $query = $this->db->like('date_created', $match, 'both');
        $query = $this->db->like('date_modified', $match, 'both');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return 
        } else {
            return false;
        }
    }
}