<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logs extends CI_Controller {

    public function __Construct() {
		parent::__construct();
        $this->load->model('logs_model');
    }

    // function show_all_logs(){
    //     $query = $this->logs_model->get_all_logs();
    //     if($query){
    //         $result['logs']  = $this->logs_model->get_all_logs();
    //     }
    //     echo json_encode($result);
    // }

    function show_all_logs() {
        $results = $this->logs_model->get_all_data();
        $data = array();
        $no = '0';
        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['userinfo'] = $result->rank . ' ' . $result->firstname . ' ' . $result->middlename . ' ' . $result->lastname . ' ' . $result->suffixname . ' (' . $result->username . ') ';
            $row['activity'] = $result->activity;
            $row['username'] = $result->username;
            $row['userlevel'] = $result->userlevel;
            $row['ip'] = $result->ip;
            $row['rank'] = $result->rank; 
            $row['firstname'] = $result->firstname; 
            $row['middlename'] = $result->middlename; 
            $row['lastname'] = $result->lastname; 
            $row['suffixname'] = $result->suffixname; 
            $row['email'] =  $result->email;
            $row['activity_date'] = $result->datecreated;
            $row['id'] = $result->id;
            $data[] = $row;
        }

        $output = array(
            "logs" => $data, 
            "recordsTotal" => $this->logs_model->count_all(), 
        );

        echo json_encode($output);
    }
    

    function deleteLog() {

    }

    function deleteAllLogs() {

    }
}