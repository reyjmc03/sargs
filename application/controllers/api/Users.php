<?php defined('BASEPATH') OR exit('no direct scripts access allowed');
class Users extends CI_Controller {
    public function __Construct() {

		parent::__construct();
        $this->load->model('user_model');
    }

    //login function
    public function login(){
        $validator = array('erro3r' => true, 'message' =>array());
        $validation_data = array(
        array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
        ),
              array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
        ));

        $this->form_validation->set_rules($validation_data);
        
        if($this->form_validation->run()===false){
          $validator['error'] = true;
            foreach($_POST as $key =>$value){
                $validator['message'][$key] = form_error($key);
            }
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->user_model->login($username, $password);
            if($login){
                $data = array('user_id' => $login,'logged_in' => true);
                $this->session->set_userdata($data);
                $validator['error'] = false;
                $validator['message']['success'] = 'dashboard';

                //activity
                $this->load->model('Logs_model');
                $params = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'action' => 'successfully login.',
                    'ip' =>  $_SERVER['REMOTE_ADDR'],
                    'date_created' =>date("Y-m-d H:i:s"),
                    'date_modified' =>date("Y-m-d H:i:s"),
                );
                $this->Logs_model->add_log($params);
                ///////////
            }else{
                $validator['error'] = true;
                $validator['message']['failed'] = 'INVALID USERNAME OR PASSWORD!'; 
            }
        }
        echo json_encode($validator);
    }

    // for logout function
    public function logout(){
        //activity
        $this->load->model('Logs_model');
        $params = array(
            'user_id' => $this->session->userdata('user_id'),
            'action' => 'successfully logout.',
            'ip' =>  $_SERVER['REMOTE_ADDR'],
            'date_created' =>date("Y-m-d H:i:s"),
            'date_modified' =>date("Y-m-d H:i:s"),
        );
        $this->Logs_model->add_log($params);
        ///////////

        $this->session->sess_destroy();
        redirect('./');
    }

    // for table display
    function show_all_users() {
        $results = $this->user_model->get_all_data();

        $data = array();

        $no = '0';

        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['userid'] = $result->id;
            $row['username'] = $result->username;
            $row['email'] = $result->email;
            $row['password'] = $result->password;
            $row['status'] = $result->status;
            $row['userlevel'] = $result->userlevel;
            $row['date_created'] = $result->datecreated;
            $row['date_modified'] = $result->datemodified;
            $row['rank'] = $result->rank;
            $row['firstname'] = $result->firstname;
            $row['middlename'] = $result->middlename;
            $row['lastname'] = $result->lastname;
            $row['suffixname'] = $result->suffixname;
            $row['afpsn'] = $result->afpsn;
            $row['bos'] = $result->bos;
            $row['afpos'] = $result->afpos;
            $row['address'] = $result->address;
            $row['phone'] = $result->phone;
            $data[] = $row;
        }

        $output = array(
            "users" => $data,
            "recordsTotal" => $this->user_model->count_all(),
        );

        echo json_encode($output) . "\r\n";
    }




    function add() {
        $config = array(
            array('field' => 'rank', 'label' => 'Rank', 'rules' => 'trim|required'),
            array('field' => 'description', 'label' => 'Description', 'rules' => 'trim|required'),
            array('field' => 'category', 'label' => 'Category', 'rules' => 'trim|required')
        );

        $this->from_validation->set_rules($config);

        //if($this)
    }
}