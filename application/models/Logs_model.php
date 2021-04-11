<?php
class Logs_model extends CI_Model {
    protected $logs = 'tbl_activity_log';

    // function __construct() {
    //     parent::__construct();
    // }

    // get log by users id

    // get all logs
    public function get_all_logs() {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_activity_log');
        $query = $this->db->get();

        if ($query->num_rows() >= 1):
			return $query->result();
		else:
			return FALSE;	
		endif;
    }
}