<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ranks extends My_Controller {

    public function __Construct() {
		parent::__construct();
        $this->load->model('ranks_model');
    }

    // show all rank table
    function show_all() {
        $this->notLoggedIn();

        $results = $this->ranks_model->get_all_data();
        $data = array();
        $no = '0';

        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['id'] = $result->id;
            $row['rank'] = $result->rank;
            $row['description'] = $result->description;
            $row['category'] = $result->category;
            $row['date_created'] = $result->date_created;
            $row['date_modified'] = $result->date_modified;
            $data[] = $row;
        }

        $output = array(
            "ranks" => $data,
            "recordsTotal" => $this->ranks_model->count_all(),
        );

        echo json_encode($output);
    }

    // search rank 
    function search() {
        $this->notLoggedIn();

        $value = $this->input->post('text');
        $results = $this->ranks_model->search_data($value);
        $data = array();
        $no = '0';
        
        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['id'] = $result->id;
            $row['rank'] = $result->rank;
            $row['description'] = $result->description;
            $row['category'] = $result->category;
            $row['date_created'] = $result->date_created;
            $row['date_modified'] = $result->date_modified;
            $data[] = $row;
        }

        $output = array(
            "ranks" => $data,
            "recordsTotal" => $this->ranks_model->count_all(),
        );

        echo json_encode($output);

    }

    // delete one rank
    function delete_only($id) {
        $this->notLoggedIn();

        $result = $this->ranks_model->delete_only_data($id);

        if($result){
            $msg['error'] = false;
            $msg['success'] = 'User deleted successfully';
        } else{
            $msg['error'] = true;
        }

        echo json_encode($msg);
    }

    // delete all rank
    function delete_all() {
        $this->notLoggedIn();

        $result =  $this->ranks_model->delete_all_data();

        if($result) {
            $msg['error'] = false;
            $msg['success'] = 'User deleted successfully';
        } else {
            $msg['error'] = true;
        }
        
        echo json_encode($msg);
    }
}