<?php
class Logs_model extends CI_Model {
    public $logs = 'tbl_activity_log';

    function __construct() {
        parent::__construct();
    }

    // get log by users id
    public function get_by_user_data($id) {
        $query = $this->db->select('log.id AS id'); 
        $query = $this->db->select('log.user_id AS userid'); 
        $query = $this->db->select('login.username AS username'); 
        $query = $this->db->select('login.userlevel as userlevel');
        $query = $this->db->select('info.rank AS rank'); 
        $query = $this->db->select('info.firstname AS firstname'); 
        $query = $this->db->select('info.middlename AS middlename'); 
        $query = $this->db->select('info.lastname AS lastname'); 
        $query = $this->db->select('info.suffixname AS suffixname'); 
        $query = $this->db->select('info.afpsn AS suffixname'); 
        $query = $this->db->select('info.afpsn AS afpsn'); 
        $query = $this->db->select('info.afpos AS afpos'); 
        $query = $this->db->select('info.bos AS bos'); 
        $query = $this->db->select('login.email AS  email');
        $query = $this->db->select('log.action AS activity'); 
        $query = $this->db->select('log.ip AS ip'); 
        $query = $this->db->select('log.date_created AS datecreated');
        $query = $this->db->select('log.date_modified AS dateupdated');
        // $query = $this->db->select('login.username AS username');
        $query = $this->db->from('tbl_activity_log log');
        $query = $this->db->join('tbl_sysuser_login login', 'login.id = log.user_id');
        $query = $this->db->join('tbl_sysuser_info info', 'info.id = login.id');
        $query = $this->db->where('log.user_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() >= 1){
            return $query->result();
        }
		else{
			return FALSE;	
        }
    }

    // get all logs
    public function get_all_data() {
        $query = $this->db->select('log.id AS id'); 
        $query = $this->db->select('log.user_id AS userid'); 
        $query = $this->db->select('login.username AS username'); 
        $query = $this->db->select('login.userlevel as userlevel');
        $query = $this->db->select('info.rank AS rank'); 
        $query = $this->db->select('info.firstname AS firstname'); 
        $query = $this->db->select('info.middlename AS middlename'); 
        $query = $this->db->select('info.lastname AS lastname'); 
        $query = $this->db->select('info.suffixname AS suffixname'); 
        $query = $this->db->select('info.afpsn AS suffixname'); 
        $query = $this->db->select('info.afpsn AS afpsn'); 
        $query = $this->db->select('info.afpos AS afpos'); 
        $query = $this->db->select('info.bos AS bos'); 
        $query = $this->db->select('login.email AS  email');
        $query = $this->db->select('log.action AS activity'); 
        $query = $this->db->select('log.ip AS ip'); 
        $query = $this->db->select('log.date_created AS datecreated');
        $query = $this->db->select('log.date_modified AS dateupdated');
        // $query = $this->db->select('login.username AS username');
        $query = $this->db->from('tbl_activity_log log');
        $query = $this->db->join('tbl_sysuser_login login', 'login.id = log.user_id');
        $query = $this->db->join('tbl_sysuser_info info', 'info.id = login.id');
        $query = $this->db->order_by("id", "desc");
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

    // search log one data
    public function search_log_one_data($match, $id) {
        $query = $this->db->select('log.id AS id'); 
        $query = $this->db->select('log.user_id AS userid'); 
        $query = $this->db->select('login.username AS username'); 
        $query = $this->db->select('login.userlevel as userlevel');
        $query = $this->db->select('info.rank AS rank'); 
        $query = $this->db->select('info.firstname AS firstname'); 
        $query = $this->db->select('info.middlename AS middlename'); 
        $query = $this->db->select('info.lastname AS lastname'); 
        $query = $this->db->select('info.suffixname AS suffixname'); 
        $query = $this->db->select('login.email AS  email');
        $query = $this->db->select('log.action AS activity'); 
        $query = $this->db->select('log.ip AS ip'); 
        $query = $this->db->select('log.date_created AS datecreated');
        $query = $this->db->select('log.date_modified AS dateupdated');
        $query = $this->db->from('tbl_activity_log log');
        $query = $this->db->join('tbl_sysuser_login login', 'login.id = log.user_id');
        $query = $this->db->join('tbl_sysuser_info info', 'info.id = login.id');

        $query = $this->db->like('log.id', $match, 'both');
        $query = $this->db->or_like('login.username',$match, 'both');
        $query = $this->db->or_like('login.userlevel',$match, 'both');
        $query = $this->db->or_like('info.rank',$match, 'both');
        $query = $this->db->or_like('info.firstname',$match, 'both');
        $query = $this->db->or_like('info.middlename',$match, 'both');
        $query = $this->db->or_like('info.lastname',$match, 'both');
        $query = $this->db->or_like('info.suffixname',$match, 'both');
        $query = $this->db->or_like('login.email',$match, 'both');
        $query = $this->db->or_like('log.action',$match, 'both');
        $query = $this->db->or_like('log.ip',$match, 'both');
        $query = $this->db->or_like('log.date_created',$match, 'both');
        $query = $this->db->or_like('log.date_modified',$match, 'both');

        $query = $this->db->where('log.user_id', $id);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        } 
    }

    // search log data
    public function search_log_data($match) {
        $query = $this->db->select('log.id AS id'); 
        $query = $this->db->select('log.user_id AS userid'); 
        $query = $this->db->select('login.username AS username'); 
        $query = $this->db->select('login.userlevel as userlevel');
        $query = $this->db->select('info.rank AS rank'); 
        $query = $this->db->select('info.firstname AS firstname'); 
        $query = $this->db->select('info.middlename AS middlename'); 
        $query = $this->db->select('info.lastname AS lastname'); 
        $query = $this->db->select('info.suffixname AS suffixname'); 
        $query = $this->db->select('login.email AS  email');
        $query = $this->db->select('log.action AS activity'); 
        $query = $this->db->select('log.ip AS ip'); 
        $query = $this->db->select('log.date_created AS datecreated');
        $query = $this->db->select('log.date_modified AS dateupdated');
        $query = $this->db->from('tbl_activity_log log');
        $query = $this->db->join('tbl_sysuser_login login', 'login.id = log.user_id');
        $query = $this->db->join('tbl_sysuser_info info', 'info.id = login.id');

        $query = $this->db->like('log.id', $match, 'both');
        $query = $this->db->or_like('log.user_id', $match, 'both');
        $query = $this->db->or_like('login.username',$match, 'both');
        $query = $this->db->or_like('login.userlevel',$match, 'both');
        $query = $this->db->or_like('info.rank',$match, 'both');
        $query = $this->db->or_like('info.firstname',$match, 'both');
        $query = $this->db->or_like('info.middlename',$match, 'both');
        $query = $this->db->or_like('info.lastname',$match, 'both');
        $query = $this->db->or_like('info.suffixname',$match, 'both');
        $query = $this->db->or_like('login.email',$match, 'both');
        $query = $this->db->or_like('log.action',$match, 'both');
        $query = $this->db->or_like('log.ip',$match, 'both');
        $query = $this->db->or_like('log.date_created',$match, 'both');
        $query = $this->db->or_like('log.date_modified',$match, 'both');


        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        } 
    }

}