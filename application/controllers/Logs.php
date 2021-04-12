<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logs extends CI_Controller {

    public function __Construct() {
		parent::__construct();
        $this->load->model('logs_model');
    }

    function show_all_logs(){
        $query = $this->logs_model->get_all_logs();
        if($query){
            $result['logs']  = $this->logs_model->get_all_logs();
        }
        echo json_encode($result);
    }
}