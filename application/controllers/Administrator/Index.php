<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// PROGRAMMER               : JOSE MARI C REY
// TYPE OF WEB APPLICATION  : A progressive web application based student grading system.
// NAME OF APPLICATION      : Student Admission, Registration and Grading System for C2C, Training and Doctrine Command, Phillipine Army
// VERSION                  : 1.0
// DATE                     : 08 February 2021

class Index extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __Construct() {
		parent::__construct();
	}

	# +++++++++++++++++++++++++++
	# + DEFAULT PAGE CONTROLLER +
	# +++++++++++++++++++++++++++
	public function index() {
		//$this->load->view('admin/view-admin-login');
        $this->load->view('administrator_page/login.php');
        
	}

	public function pogi() {
		echo 'pogi';
	}
}
