<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Error404Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function error() {
        $this->load->view('includes/error404');
    }
}