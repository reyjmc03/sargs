<?php
class AuthUserController extends My_Controller{
    public function __construct(){
        parent::__construct();
    }

    // login function
    public function login() {
        $validator = array('erro3r' => true, 'message' => array());
        $validation_data = array(
            array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required'),
            array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required'));
        
        $this->form_validation->set_rules($validation_data);

        if($this->form_validation->run()===false){
            foreach($_POST as $key =>$value){
                $validator['message'][$key] = form_error($key);
            }
        } 
        else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $login = $this->user_model->login($username, $password);

            if($login){
                $data = array('user_id' => $login, 'logged_in' => true);
                $this->session->set_userdata($data);
                $validator['error'] = false;
                $validator['message']['success'] = 'dashboard';
            }
            else{
                $validator['error'] = true;
                $validator['message']['failed'] = 'INVALID USERNAME OR PASSWORD!';
            }
        }
        
        echo json_encode($validator);
    }

    //logout function
    public function logout() {
        $this->session->sess_destroy();
        redirect('./');
    }
}