<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPageController extends My_Controller {
    function __construct() {
        parent::__construct();
    }

    public function view($page = 'administrator/index') {
        if(!file_exists(APPPATH. 'views/' . $page . '.php')){show_404();}

        // administrator login page
        if($page == 'index'){
            $page->loggedIn();
            $data['nav'] = 'ADMINISTRATOR LOGIN';
        }

        // page output
        $page == 'administrator/index' ? '' : $this->load->view('includes/header', $data);
        $this->load->view($page, $data);
        $page == 'administrator/index' ? '' : $this->load->view('includes/footer');
    }
}