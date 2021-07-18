<?php defined('BASEPATH') OR exit('No direct scripts access allowed');

class Bos extends My_Controller {
    public function __Construct() {
        parent::__construct();
        $this->load->model('bos_model');
    }

    // show all rank table
    function show_all() {
        $this->notLoggedIn();

        $result = $this->bos_model->get_all_data();
        $data = array();
        $no = '0';

        foreach($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['id'] = $result->id;
            $row['bos'] = $result->bos;
            $row['description'] = $result->description;
            $row['date_created'] = $result->date_created;
            $row['date_modified'] = $result->date_modified;
            $data[] = $row;
        }

        $output = array(
            "ranks" => $data, 
            "recordsTotal" => $this->bos_model->count_all(),
        );

        echo json_encode($output);
    }
}