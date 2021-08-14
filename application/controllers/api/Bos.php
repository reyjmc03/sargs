<?php defined('BASEPATH') OR exit('No direct scripts access allowed');

class Bos extends My_Controller {

    public function __Construct() {
        parent::__construct();
        $this->load->model('bos_model');
    }

    // show all BOS table
    function show_all() {
        $this->notLoggedIn();

        $results = $this->bos_model->get_all_data();
        $data = array();
        $no = '0';

        foreach ($results as $result) {
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
            "boss" => $data, 
            "recordsTotal" => $this->bos_model->count_all(),
        );

        echo json_encode($output);
    }

    // search bos
    function search() {
        $this->notLoggedIn();

        $value = $this->input->post('text');
        $results = $this->bos_model->search_data($value);
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
            "boss" => $data,
            "recordsTotal" => $this->bos_model->count_all(),
        );

        echo json_encode($output);
    }

    // delete one bos
    function delete_only($id) {
        $this->notLoggedIn();

        $result = $this->bos_model->delete_only_data($id);

        if($result){
            $msg['error'] = false;
            $msg['success'] = 'A branch of service deleted successfully';

            //activity
            $this->load->model('logs_model');
            $params = array(
                'user_id' => $this->session->userdata('user_id'),
                'action' => 'successfully DELETED a branch of service.',
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

        $result =  $this->bos_model->delete_all_data();

        if($result) {
            $msg['error'] = false;
            $msg['success'] = 'BOS deleted successfully';

             //activity
             $this->load->model('logs_model');
             $params = array(
                 'user_id' => $this->session->userdata('user_id'),
                 'action' => 'successfully DELETED all branch of service.',
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

    // add bos
    function add() {
        $this->notLoggedIn();
        
        $config = array(
            // bos field
            array('field' => 'bos', 'label' => 'BOS', 'rules' => 'trim|required'),
            // description
            array('field' => 'description', 'label' => 'Description', 'rules' => 'trim|required'),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'bos' => form_error('bos'), 
                'description' => form_error('description')
            );
        }
        else {
            $data = array(
                'bos' => $this->input->post('bos'),
                'description' => $this->input->post('description'),
                'date_created' => date("Y-m-d H:i:s"),
            );

            $result = $this->bos_model->add_data($data);

            // add new bos
            if($result) {
                $result['error'] = false;
                $result['msg'] ='A new bos added successfully.';

                //activity
                $this->load->model('logs_model');
                $params = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'action' => 'successfully ADDED a new branch of service.',
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

    // update bos
    function update() {
        $this->notLoggedIn();

        $config = array(
            //bos field
            array(
                'field' => 'bos', 
                'label' => 'BOS', 
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
                'bos' => form_error('bos'), 
                'description' => form_error('description')
            );
        }
        else {
            $id = $this->input->post('id');
            $data = array(
                'bos' => $this->input->post('bos'),
                'description' => $this->input->post('description'),
                'date_modified' =>date("Y-m-d H:i:s"),
            );
                if($this->bos_model->update_data($id, $data)){
                    $result['error'] = false;
                    $result['success'] = 'A branch of service updated successfully.';

                    //activity
                    $this->load->model('logs_model');
                    $params = array(
                        'user_id' => $this->session->userdata('user_id'),
                        'action' => 'successfully UPDATED a branch of service.',
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