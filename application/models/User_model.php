<?php
class User_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        //$result = $this->db->get_where('users', array('username' => $username));
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_sysuser_login ul');
        $query = $this->db->join('tbl_sysuser_info ui', 'ui.id = ul.id');
        $query = $this->db->where(array('username' => $username));
        $query = $this->db->get();
        
        if($query->num_rows() == 0){
            return false;
        }else{
            $db_password = $query->row(5)->password;
            if(password_verify($password, $db_password)){
                return $query->row(0)->id;
            }else{
                return false;
            } 
        } 
    }

    public function get_userdata($id){
        //$query = $this->db->get_where('users', array('id' => $id));

        $query = $this->db->select('*');
        $query = $this->db->from('tbl_sysuser_login ul');
        $query = $this->db->join('tbl_sysuser_info ui', 'ui.id = ul.id');
        $query = $this->db->where(array('ui.id' => $id));
        $query = $this->db->get();

        return $query->row();
    }

    // get all users
    public function get_all_data() {
        $query = $this->db->select('ul.id AS id');
        $query = $this->db->select('ul.username AS username');
        $query = $this->db->select('ul.email AS email');
        $query = $this->db->select('ul.password AS password');
        $query = $this->db->select('ul.status AS status');
        $query = $this->db->select('ul.userlevel AS userlevel');
        $query = $this->db->select('ul.date_created AS datecreated');
        $query = $this->db->select('ul.date_modified AS datemodified');
        $query = $this->db->select('ui.rank AS rank');
        $query = $this->db->select('ui.firstname AS firstname');
        $query = $this->db->select('ui.middlename AS middlename');
        $query = $this->db->select('ui.lastname AS lastname');
        $query = $this->db->select('ui.suffixname AS suffixname');
        $query = $this->db->select('ui.afpsn AS afpsn');
        $query = $this->db->select('ui.bos AS bos');
        $query = $this->db->select('ui.afpos AS afpos');
        $query = $this->db->select('ui.address AS address');
        $query = $this->db->select('ui.phone AS phone');
            $query = $this->db->from('tbl_sysuser_login ul');
            $query = $this->db->join('tbl_sysuser_info ui', 'ui.id = ul.id');
            $query = $this->db->get();

        if($query->num_rows() >= 1){
            return $query->result();
        }
        else {
            return false;
        }
    }

    // display total rows count
    public function count_all() {
        $this->db->from('tbl_sysuser_login ul');
        $this->db->join('tbl_sysuser_info ui', 'ui.id = ul.id');
        return $this->db->count_all_results();
    }
    
    //   public function register(){
    //     $option = ['cost'=>12];
    //     $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT,$option);
    //         $insert_data = array(
    //          'firstname'=>$this->input->post('firstname'), 
    //          'lastname'=>$this->input->post('lastname'),   
    //          'username'=>$this->input->post('username'),   
    //          'email'=>$this->input->post('email'),
    //         'password'=>$encrypted_pass
    //         ); 
        
    //       return  $insert_data = $this->db->insert('users', $insert_data);
    // }
    
    
    //    public function get_userdata($id){
    //     $query = $this->db->get_where('users', array('id' => $id));
    //     return $query->row();
    // }
    
    
    // public function check_email($email){
    //     $res = $this->db->get_where('users', array('email' => $email));
    //     return $res->num_rows()>0 ?true:false;
    // }
    
    
    // public function get_user_by_email($email){
    //     $query = $this->db->get_where('users', array('email' => $email));
	// 	if($query->num_rows()) return $query->row();
	// 	return false;
    // }
    
    
    // public function update_reset_key($reset_key, $email){
    //     $this->db->where('email',$email);
    //     $data = array('validation_code'=>$reset_key);
    //     $this->db->update('users',$data);
    //      return $this->db->affected_rows() >0 ? true:false;
    // }
    
    
    //  public function change_password($id){
    //     $option = ['cost'=>12];
    //     $field = array(
    //     'password'=> password_hash($this->input->post('password'), PASSWORD_BCRYPT,$option)
    //     );     
    //      $this->db->where('id', $id);
    //     $this->db->update('users', $field);
    //      return $this->db->affected_rows() >0 ? true:false;
    // }
    
    
    //  public function google_email_exist($email){
    //      $res = $this->db->get_where('users', array('email' => $email));
    //      return $res->num_rows()==0 ? false:$res->row(0)->id;
    // }
    
    
    // public function google_register(){
    //      $option = ['cost'=>12];
    //     $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT,$option);
    //         $insert_data = array(
    //         'oauth_provider'=>$this->input->post('oauth_provider'), 
    //         'oauth_uid'=>$this->input->post('oauth_uid'),   
    //         'picture'=>$this->input->post('picture'),   
    //         'firstname'=>$this->input->post('firstname'),
    //         'lastname'=>$this->input->post('lastname'),
    //         'username'=>$this->input->post('username'),
    //         'email'=>$this->input->post('email'),
    //         'password'=>$encrypted_pass, 
    //         ); 
    //     if($this->db->insert('users', $insert_data)){
    //         return $this->db->insert_id();
    //     }else{
    //         return false;
    //     }
    // }
    // public function email_code_exists($email, $code){
    //       $res = $this->db->get_where('users',array('email' => $email));
    //         if($res->row(9)->validation_code == $code){
    //             return true;
    //         }else{
    //             return false;
    //         }
    // }
    
}