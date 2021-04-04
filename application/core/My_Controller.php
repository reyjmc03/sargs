<?php
class My_Controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function loggedIn(){
        if($this->session->userdata('logged_in') === true){
            redirected('dashboard');
        }
    }

    public function notLoggedIn(){
        if($this->session->userdata('logged_id') !== true){
            redirect('./');
        }
    }
}