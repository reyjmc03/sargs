<?php
class Logs_model extends CI_Model {
    protected $logs = 'tbl_activity_log';

    function __construct() {
        parent::__construct();
    }

    // get log by users id

    // get all logs
    public function get_all_logs() {
        $query = $this->db->select('log.user_id AS userid, 
            login.username AS username, 
            info.rank AS rank, 
            info.firstname AS firstname, 
            info.middlename AS middlename, 
            info.lastname AS lastname, 
            info.suffixname AS suffixname, 
            login.email AS  email,
            log.action AS activity, 
            log.ip AS ip, 
            log.date_created AS datecreated');
        $query = $this->db->select('login.username');
        $query = $this->db->from('tbl_activity_log log');
        $query = $this->db->join('tbl_sysuser_login login', 'login.id = log.user_id');
        $query = $this->db->join('tbl_sysuser_info info', 'info.id = login.id');
        $query = $this->db->get();

        if ($query->num_rows() >= 1){
            return $query->result();
        }
		else{
			return FALSE;	
        }
    }
}