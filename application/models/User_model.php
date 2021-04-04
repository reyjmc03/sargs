<?php 
class User_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    // login function
    public function login($username, $password) {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_sysuser_login ul');
        $query = $this->db->join('tbl_sysuser_info ui', 'ui.id = ul.id');
        $query = $this->db->where(array('username' => $username));
        $query = $this->db->get();

        if($query->num_rows() == 0) {
            return false;
        }
        else {
            $dbpassword = $query->row(5)->password;
            if(password_verify($password, $dbpassword)) {
                return $result->row(0)->id;
            } else {
                return false;
            }
        }
    }


    public function login2($username, $password){
        $result = $this->db->get_where('tr_users', array('username' => $username));
        if($result->num_rows() == 0){
            return false;
        }else{
            $db_password = $result->row(5)->password;
            if(password_verify($password, $db_password)){
                return $result->row(0)->id;
            }else{
                return false;
            } 
        }
       
    }
}