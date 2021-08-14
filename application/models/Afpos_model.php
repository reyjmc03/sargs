<?php 
class Afpos_model extends CI_Model {
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
        $query = $this->db->order_by("id", "desc");
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
    public function search_data($match) {
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
            return $query->result();
        } else {
            return false;
        } 
    }

    // delete only afpos
    public function delete_only_data($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_ref_afpos');

        if($this->db->affect_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // delete all afpos
    public function delete_all_data() {
        $this->db->empty_table('tbl_ref_afpos');

        if($this->db->affected_rows() > 0) {
            return true;
        } else { 
            return false; 
        }
    }

    // add afpos
    public function add_data($data) {
        return $this->db->insert('tbl_ref_afpos', $data);
    }

    // update apfpos
    public function update_data($id, $field) {
        $this->db->where('id', $id);
        $this->db->update('tbl_ref_afpos', $field);
        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}