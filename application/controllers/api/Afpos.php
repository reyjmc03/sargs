<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Afpos extends My_Controller {

    public function __Construct() {
        parent::__construct();
        $this->load->model('afpos_model');
    }
    
    // show all AFPOS table
    function show_all() {
        $this->notLoggedIn();

        $results = $this->afpos_model->get_all_data();
        $data = array();
        $no = '0';

        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['id'] = $result->id;
            $row['afpos'] = $result->afpos;
            $row['description'] = $result->description;
            $row['date_created'] = $result->date_created;
            $row['date_modified'] = $result->date_modified;
            $data[] = $row;
        }

        $output = array(
            "afposs" => $data, 
            "recordsTotal" => $this->afpos_model->count_all(),
        );

        echo json_encode($output);
    }


    // search afpos
    function search() {
        $this->notLoggedIn();

        $value = $this->input->post('text');
        $results = $this->afpos_model->search_data($value);
        $data = array();
        $no = '0';

        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['id'] = $result->id;
            $row['afpos'] = $result->afpos;
            $row['description'] = $result->description;
            $row['date_created'] = $result->date_created;
            $row['date_modified'] = $result->date_modified;
            $data[] = $row;
        }

        $output = array(
            "afposs" => $data,
            "recordsTotal" => $this->afpos_model->count_all(),
        );

        echo json_encode($output);
    }


    
    function delete_only($id) {
        $this->notLoggedIn();

        $result = $this->afpos_model->delete_only_data($id);

        if($result){
            $msg['error'] = false;
            $msg['success'] = 'A AFP of service deleted successfully.';

            //activity
            $this->load->model('logs_model');
            $params = array(
                'user_id' => $this->session->userdata('user_id'),
                'action' => 'successfully DELETED a AFP of service.',
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

    // delete all bos
    function delete_all() {
        $this->notLoggedIn();

        $result =  $this->afpos_model->delete_all_data();

        if($result) {
            $msg['error'] = false;
            $msg['success'] = 'AFPOS deleted successfully';

             //activity
             $this->load->model('logs_model');
             $params = array(
                 'user_id' => $this->session->userdata('user_id'),
                 'action' => 'successfully DELETED all AFP of service data.',
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

    // add afpos
    function add() {
        $this->notLoggedIn();
        
        $config = array(
            // bos field
            array('field' => 'afpos', 'label' => 'AFPOS', 'rules' => 'trim|required'),
            // description
            array('field' => 'description', 'label' => 'Description', 'rules' => 'trim|required'),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'afpos' => form_error('afpos'), 
                'description' => form_error('description')
            );
        }
        else {
            $data = array(
                'afpos' => $this->input->post('afpos'),
                'description' => $this->input->post('description'),
                'date_created' => date("Y-m-d H:i:s"),
            );

            $result = $this->afpos_model->add_data($data);

            // add new afpos
            if($result) {
                $result['error'] = false;
                $result['msg'] ='A new afpos added successfully.';

                //activity
                $this->load->model('logs_model');
                $params = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'action' => 'successfully ADDED a new AFP of service.',
                    'ip' =>  $_SERVER['REMOTE_ADDR'],
                    'date_created' => date("Y-m-d H:i:s"),
                    'date_modified' => date("Y-m-d H:i:s"),
                );
                $this->logs_model->add_log($params);
                /////////
            }
        }
        
        echo json_encode($result);
    }

    // update afpos
    function update() {
        $this->notLoggedIn();

        $config = array(
            //afpos field
            array(
                'field' => 'afpos', 
                'label' => 'AFPOS', 
                'rules' => 'trim|required'),
            // description field
            array(
                'field' => 'description', 
                'label' => 'Description', 
                'rules' => 'trim|required'),
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'afpos' => form_error('afpos'), 
                'description' => form_error('description')
            );
        }
        else {
            $id = $this->input->post('id');
            $data = array(
                'afpos' => $this->input->post('afpos'),
                'description' => $this->input->post('description'),
                'date_modified' =>date("Y-m-d H:i:s"),
            );
                if($this->afpos_model->update_data($id, $data)){
                    $result['error'] = false;
                    $result['success'] = 'A AFP of service updated successfully.';

                    //activity
                    $this->load->model('logs_model');
                    $params = array(
                        'user_id' => $this->session->userdata('user_id'),
                        'action' => 'successfully UPDATED a AFP of service.',
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