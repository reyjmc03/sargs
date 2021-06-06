<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ranks extends CI_Controller {

    public function __Construct() {
		parent::__construct();
        $this->load->model('ranks_model');
    }

    // show all rank table
    function show_all_ranks() {
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
            $data[] = $row;
        }

        $output = array(
            "ranks" => $data,
            "recordsTotal" => $this->ranks_model->count_all(),
        );

        echo json_encode($output);
    }

    // search rank 
    function search_rank() {
        $value = $this->input->post('text');
        $results = $this->ranks_model->search_rank_data($value);
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
            $data[] = $row;
        }

        $output = array(
            "ranks" => $data,
            "recordsTotal" => $this->ranks_model->count_all(),
        );

        echo json_encode($output);

    }
}