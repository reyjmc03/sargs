<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logs extends CI_Controller {

    public function __Construct() {
		parent::__construct();
        $this->load->model('logs_model');
    }

    function show_all_logs() {
        $results = $this->logs_model->get_all_data();
        $data = array();
        $no = '0';
        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['user_id'] = $result->userid;
            //$row['userinfo'] = $result->rank . ' ' . $result->firstname . ' ' . $result->middlename . ' ' . $result->lastname . ' ' . $result->suffixname . ' (' . $result->username . ') ';
            $row['activity'] = $result->activity;
            $row['username'] = $result->username;
            $row['userlevel'] = $result->userlevel;
            $row['ip'] = $result->ip;
            $row['rank'] = $result->rank; 
            $row['firstname'] = $result->firstname; 
            $row['middlename'] = $result->middlename; 
            $row['lastname'] = $result->lastname; 
            $row['suffixname'] = $result->suffixname; 
            $row['afpsn'] = $result->afpsn;
            $row['afpos'] = $result->afpos;
            $row['bos'] = $result->bos;
            $row['email'] =  $result->email;
            $row['created_date'] = $result->datecreated;
            $row['updated_date'] = $result->dateupdated;
            $row['id'] = $result->id;
            $data[] = $row;
        }

        $output = array(
            "logs" => $data, 
            "recordsTotal" => $this->logs_model->count_all(), 
        );

        echo json_encode($output);
    }


    function delete_log_only($id) {
        $result = $this->logs_model->delete_log_data($id);
        if($result){
            $msg['error'] = false;
            $msg['success'] = 'User deleted successfully';
        }
        else{
            $msg['error'] = true;
        }
        echo json_encode($msg);
    }

    function delete_log_all() {
        $result = $this->logs_model->delete_all_logs_data();
        if($result){
            $msg['error'] = false;
            $msg['success'] = 'User deleted successfully';
        }
        else{
            $msg['error'] = true;
        }
        echo json_encode($msg);
    }

    function search_log() {
        $value = $this->input->post('text');
        $results = $this->logs_model->search_log_data($value);
        $data = array();
        $no = '0';
        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['user_id'] = $result->userid;
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
            $row['created_date'] = $result->datecreated;
            $row['updated_date'] = $result->dateupdated;
            $row['id'] = $result->id;
            $data[] = $row;
        }

        $output = array(
            "logs" => $data, 
            "recordsTotal" => $this->logs_model->count_all(), 
        );

        echo json_encode($output);
    }
}