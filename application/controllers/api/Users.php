<?php defined('BASEPATH') OR exit('no direct scripts access allowed');
class Users extends CI_Controller {
    public function __Construct() {

		parent::__construct();
        $this->load->model('user_model');
    }

    function show_all_users() {
        $results = $this->user_model->get_all_data();

        $data = array();

        $no = '0';

        foreach ($results as $result) {
            $no++;
            $row = array();
            $row['nos'] = $no;
            $row['id'] = $result->id;
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
            $row['mos'] = $result->mos;
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

    // $query = $this->db->select('ul.id AS id');
    //     $query = $this->db->select('ul.username AS username');
    //     $query = $this->db->select('ul.email AS email');
    //     $query = $this->db->select('ul.password AS password');
    //     $query = $this->db->select('ul.status AS status');
    //     $query = $this->db->select('ul.userlevel AS userlevel');
    //     $query = $this->db->select('ul.date_created AS datecreated');
    //     $query = $this->db->select('ul.date_modified AS datemodified');
    //     $query = $this->db->select('ui.rank AS rank');
    //     $query = $this->db->select('ui.firstname AS firstname');
    //     $query = $this->db->select('ui.middlename AS middlename');
    //     $query = $this->db->select('ui.lastname AS lastname');
    //     $query = $this->db->select('ui.suffixname AS suffixname');
    //     $query = $this->db->select('ui.afpsn AS afpsn');
    //     $query = $this->db->select('ui.bos AS bos');
    //     $query = $this->db->select('ui.mos AS mos');
    //     $query = $this->db->select('ui.address AS address');
    //     $query = $this->db->select('ui.phone AS phone');
   
}