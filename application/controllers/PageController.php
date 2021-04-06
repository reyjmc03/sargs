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
            $this->notLoggedIn();
            $data['nav'] = 'DASHBOARD';
            $data['page_title'] = 'Welcome';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'dashboard">Dashboard</a></li>'
            . '<li class="breadcrumb-item"></li>';

            // $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'dashboard">Dashboard</a></li>
            // <li class="breadcrumb-item active">Add Teachers</li>';
        }

        // user profile
        if($page == 'user-profile') {
            $this->notLoggedIn();
            $data['nav'] = 'USER PROFILE';
            $data['page_title'] = 'User Profile';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'user-profile">User Profile</a></li>' 
            . '<li class="breadcrumb-item"></li>';
        }

        // user accounts
        if($page == 'user-accounts') {
            $this->notLoggedIn();
            $data['nav'] = 'USER ACCOUNTS';
            $data['page_title'] = 'User Accounts';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'user-accounts">User Accounts</a></li>' 
            . '<li class="breadcrumb-item"></li>';
        }

        // user logs
        if($page == 'user-logs') {
            $this->notLoggedIn();
            $data['nav'] = 'USER LOGS';
            $data['page_title'] = 'User Logs';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'user-logs">User Logs</a></li>' 
            . '<li class="breadcrumb-item"></li>';
        }


        // user logs
        if($page == 'student-identification') {
            $this->notLoggedIn();
            $data['nav'] = 'STUDENT I.D';
            $data['page_title'] = 'Student Identification Card (I.D)';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'user-logs">Student Identification Card (I.D)</a></li>' 
            . '<li class="breadcrumb-item"></li>';
        }

        // page output
        $page == 'index' ? '' : $this->load->view('includes/header', $data);
        $this->load->view($page, $data);
        $page == 'index' ? '' : $this->load->view('includes/footer');
    }
}