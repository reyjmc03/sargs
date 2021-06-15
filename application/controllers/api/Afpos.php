<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Afpos extends CI_Controller {

    public function __Construct() {
        parent::__construct();
        $this->load->model('afpos_model');
    }
    
    // show all afpos
    function show_all_data() {
        $result = $this->afpos_model->get_all_data();
        $data = array();
        $no = '0';

        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['id'] = $result->id;
            $row['afpos'] = $result->afpos;
            $row['description'] = $result->description;
            $row['date_created'] = $result->date_created;
            $row['date_modified'] = $result->date_modified;
            $data[] = $row;
        }

        $output - array(
            "afpos" => $data,
            "recordsTotal" => $this->afpos_model->count_all(),
        );

        echo json_encode($output);
    }


    // search afpos
    function search() {
        $value = $this->input->post('text');
        $results = $this->afpos_model->search_data($value);
        $data = array();
        $no = '0';

        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['id'] = $result->id;
            $row['afpos'] = $result->afpos;
            $row['description'] = $result->description;
            $row['date_created'] = $result->date_created;
            $row['date_modified'] = $result->date_modified;
            $data[] = $row;
        }

        $output = array(
            "ranks" => $data,
            "recordsTotal" => $this->afpos_model->count_all(),
        );

        echo json_encode($output);
    }
}