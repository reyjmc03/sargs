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

            //activity
            $this->load->model('logs_model');
            $params = array(
                'user_id' => $this->session->userdata('user_id'),
                'action' => 'successfully deleted a one rank',
                'ip' =>  $_SERVER['REMOTE_ADDR'],
                'date_created' =>date("Y-m-d H:i:s"),
                'date_modified' =>date("Y-m-d H:i:s"),
            );
            $this->logs_model->add_log($params);
            /////////
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

             //activity
             $this->load->model('logs_model');
             $params = array(
                 'user_id' => $this->session->userdata('user_id'),
                 'action' => 'successfully deleted all rank data.',
                 'ip' =>  $_SERVER['REMOTE_ADDR'],
                 'date_created' =>date("Y-m-d H:i:s"),
                 'date_modified' =>date("Y-m-d H:i:s"),
             );
             $this->logs_model->add_log($params);
             /////////
        } else {
            $msg['error'] = true;
        }
        
        echo json_encode($msg);
    }

    // add rank
    function add() {
        $config = array(
            // rank field
            array('field' => 'rank', 'label' => 'Rank', 'rules' => 'trim|required'),
            // description
            array('field' => 'description', 'label' => 'Description', 'rules' => 'trim|required'),
            // category
            array('field' => 'category', 'label' => 'Category', 'rules' => 'trim|required' ),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'rank' => form_error('rank'), 
                'description' => form_error('description'), 
                'category' => form_error('category')
            );
        } else {
            $data = array(
                'rank' => $this->input->post('rank'),
                'description' => $this->input->post('description'),
                'category' => $this->input->post('category'),
                'date_created' =>date("Y-m-d H:i:s"),
            );

            // add new rank
            if($this->ranks_model->add_data($data)) {
                $result['error'] = false;
                $result['msg'] ='A new rank added successfully.';

                //activity
                $this->load->model('logs_model');
                $params = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'action' => 'successfully added a new rank.',
                    'ip' =>  $_SERVER['REMOTE_ADDR'],
                    'date_created' =>date("Y-m-d H:i:s"),
                    'date_modified' =>date("Y-m-d H:i:s"),
                );
                $this->logs_model->add_log($params);
                /////////
            }
        }

        echo json_encode($result);
    }

    // update rank
    function update() {
        $config = array(
            // rank field
            array('field' => 'rank', 
                  'label' => 'Rank', 
                  'rules' => 'trim|required'),
            // description field
            array('field' => 'description',
                  'label' => 'Description', 
                  'rules' => 'trim|required'),
            // category field
            array('field' => 'category', 
                  'label' => 'Category', 
                  'rules' => 'trim|required' ),
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'rank' => form_error('rank'), 
                'description' => form_error('description'), 
                'category' => form_error('category')
            );
        } else {
            $id = $this->input->post('id');
            $data = array(
                'rank' => $this->input->post('rank'),
                'description' => $this->input->post('description'),
                'category' => $this->input->post('category'),
                'date_modified' =>date("Y-m-d H:i:s"),
            );
                if($this->ranks_model->update_data($id, $data)){
                    $result['error'] = false;
                    $result['success'] = 'Rank updated successfully.';

                    //activity
                $this->load->model('logs_model');
                $params = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'action' => 'successfully updated a rank.',
                    'ip' =>  $_SERVER['REMOTE_ADDR'],
                    'date_created' =>date("Y-m-d H:i:s"),
                    'date_modified' =>date("Y-m-d H:i:s"),
                );
                $this->logs_model->add_log($params);
                /////////
                }
        }

        echo json_encode($result);
    }
}