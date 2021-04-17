<?php
class Logs_model extends CI_Model {
    public $logs = 'tbl_activity_log';

    function __construct() {
        parent::__construct();
    }

    // get log by users id

    // get all logs
    public function get_all_data() {
        $query = $this->db->select('log.id AS id, 
            log.user_id AS userid, 
            login.username AS username, 
            login.userlevel as userlevel,
            info.rank AS rank, 
            info.firstname AS firstname, 
            info.middlename AS middlename, 
            info.lastname AS lastname, 
            info.suffixname AS suffixname, 
            login.email AS  email,
            log.action AS activity, 
            log.ip AS ip, 
            log.date_created AS datecreated');
        $query = $this->db->select('login.username AS username');
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

    // display total rows count
    public function count_all() {
        $this->db->from('tbl_activity_log');
        return $this->db->count_all_results();
    }

    // add activity log
    public function add_log($params) {
        $this->db->insert('tbl_activity_log', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }


    // delete 1 activity log only.
    public function delete_log_data($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_activity_log');
           if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
    }

    // delete all activity logs
    public function delete_all_logs_data() {
        $this->db->empty_table('tbl_activity_log');
           if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
    }

}