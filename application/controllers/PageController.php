<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends My_Controller {
    function __construct() {
        parent::__construct();

    }


    public function view($page = 'index') {
        if(!file_exists(APPPATH. 'views/' . $page . '.php')){show_404();}
        
        // login page
        if($page == 'index'){
            $this->loggedIn();
            $data['nav'] = 'LOGIN';
            $data['system_name'] = 'Student Admission Registration and Grading System (S.A.R.G.S)';
            $data['version'] = '1.0.0';
        }

        // dashboard or home
        if($page == 'dashboard') {
            //$this->notLoggedIn();
            $data['nav'] = 'DASHBOARD';
            $data['page_title'] = 'Dashboard';
            $data['breadcrumbs'] = 'Dashboard/';
        }

        // user profile
        if($page == 'user-profile') {
            $data['nav'] = 'USER PROFILE';
            $data['page_title'] = 'User Profile';
            $data['breadcrumbs'] = 'User Profile/';
        }

        // page output
        $page == 'index' ? '' : $this->load->view('includes/header', $data);
        $this->load->view($page, $data);
        $page == 'index' ? '' : $this->load->view('includes/footer');
    }
}