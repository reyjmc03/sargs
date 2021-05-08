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

        
        // ***********
        // * MAIN MENU
        // ***********
        /* dashboard or home */
        if($page == 'dashboard') {
            $this->notLoggedIn();
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['nav'] = 'DASHBOARD';
            $data['page_title'] = 'Welcome';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'dashboard">Dashboard</a></li>'
            . '<li class="breadcrumb-item"></li>';

            // $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'dashboard">Dashboard</a></li>
            // <li class="breadcrumb-item active">Add Teachers</li>';
        }


        // ****************************
        // * IDENTIFICATION CARDS (I.D)
        // ****************************
        // student identification
        if($page == 'student-identification') {
            $this->notLoggedIn();
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['nav'] = 'STUDENT I.D';
            $data['page_title'] = 'IDENTIFICATION CARDS (I.D)';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active"><a href="'. base_url() . 'user-logs">IDENTIFICATION CARDS (I.D)</a></li>' 
            . '<li class="breadcrumb-item">Generate Student ID</li>';
        }


        // *********
        // * REPORTS
        // *********


        // ******************************
        // * GRADES, CERTIFICATE & AWARDS
        // ******************************
        /* student certificate */
        if($page == 'student-certificate') {
            $this->notLoggedIn();
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['nav'] = 'STUDENT CERTITICATE';
            $data['page_title'] = 'Student Certificate';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">Grades, Certificate & Awards</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';
        }
        /* commanders recognition award */
        if($page == 'commanders-recognition-award') {
            $this->notLoggedIn();
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['nav'] = 'COMMANDERS RECOGNITION AWARD';
            $data['page_title'] = 'Commanders Recognition Award';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">Grades, Certificate & Awards</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';
        }
        /* commandants award */
        if($page == 'commandants-award') {
            $this->notLoggedIn();
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['nav'] = 'COMMANDANTS AWARD';
            $data['page_title'] = 'Commandants Award';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">Grades, Certificate & Awards</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';
        }
        /* comtradoc award */
        if($page == 'comtradoc-award') {
            $this->notLoggedIn();
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['nav'] = 'COMTRADOC AWARD';
            $data['page_title'] = 'COMTRADOC Award';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">Grades, Certificate & Awards</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';
        }

        // ******************************
        // * REFERENCES
        // ******************************
        /* signatories */
        /* ranks */
           if($page == 'ranks'){
            $this->notLoggedIn();
            $data['nav'] = 'RANKS';
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['page_title'] = 'Ranks';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">References</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';


        }

        // *******************
        // * SYSTEM MANAGEMENT
        // *******************
        /* user accounts */
        if($page == 'user-accounts') {
            $this->notLoggedIn();
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['nav'] = 'USER ACCOUNTS';
            $data['page_title'] = 'User Accounts';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">System Management</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';
            $data['add_button'] = '';
        }
        /* activity logs */
        if($page == 'activity-logs') {
            $this->notLoggedIn();
            $data['nav'] = 'ACTIVITY LOGS';
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['page_title'] = 'Activity Logs';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">System Management</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';

        }
        /* download database */
        if($page == 'download-database') {
            $this->notLoggedIn();
            $data['nav'] = 'DOWNLOAD DATABASE';
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['page_title'] = 'Download Database';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">System Management</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';

        }

        /* about the system */
        if($page == 'about'){
            $this->notLoggedIn();
            $data['nav'] = 'ABOUT';
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['page_title'] = 'About the System';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">System Management</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';


        }




        /* user profile */
        if($page == 'user-profile') {
            $this->notLoggedIn();
            $data['nav'] = 'MY PROFILE';
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
            $data['page_title'] = 'My Profile';
            $data['breadcrumbs'] = '<li class="breadcrumb-item active">System Management</li>' 
            . '<li class="breadcrumb-item"><a href="'. base_url($page) . '">' . $data['page_title'] . '</a></li>';
        }

        // page output
        $page == 'index' ? '' : $this->load->view('includes/header', $data);
        $this->load->view($page, $data);
        $page == 'index' ? '' : $this->load->view('includes/footer');
    }
}