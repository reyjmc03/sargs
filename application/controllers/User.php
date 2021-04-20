<?php
class User extends My_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    
//     public function register(){
//         $validator = array('success' => false, 'message' =>array());
//         $validation_data = array(
//         array('field' => 'firstname','label' => 'Firstname','rules' => 'trim|required'),
//         array('field' => 'lastname','label' => 'Lastname','rules' => 'trim|required'),
//         array('field' => 'username','label' => 'Username','rules' => 'trim|required|is_unique[users.username]'),
//         array('field' => 'email','label' => 'Email','rules' => 'trim|required|valid_email|is_unique[users.email]' ),
//          array('field' => 'password','label' => 'Password','rules' => 'trim|required|matches[confirm_password]' ),
//         array('field' => 'confirm_password','label' => 'Confirm Password','rules' => 'trim|required')
// );
//         $this->form_validation->set_rules($validation_data);
//         $this->form_validation->set_message('is_unique', 'The {field} is already exist');
//         $this->form_validation->set_message('required', '{field} is required');
//         $this->form_validation->set_message('valid_email', '{field} is not formatted properly');
//         $this->form_validation->set_error_delimiters('<p class="text-danger"></p>');
        
//         if($this->form_validation->run()){
//             $this->user_model->register();
//             $validator['success'] = true;
//             $validator['message']['success'] = 'Successfully Registered';
            
//         }else{
//             $validator['success'] = false;
//             foreach($_POST as $key =>$value){
//                 $validator['message'][$key] = form_error($key);
//             }
//         }
//         echo json_encode($validator);
//     }
    
    
    
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
                    'date_updated' =>date("Y-m-d H:i:s"),
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

    public function logout(){
        //activity
        $this->load->model('Logs_model');
        $params = array(
            'user_id' => $this->session->userdata('user_id'),
            'action' => 'successfully logout.',
            'ip' =>  $_SERVER['REMOTE_ADDR'],
            'date_created' =>date("Y-m-d H:i:s"),
            'date_updated' =>date("Y-m-d H:i:s"),
        );
        $this->Logs_model->add_log($params);
        ///////////

        $this->session->sess_destroy();
        redirect('./');
    }


    function show_all_users() {
        // $query = $this->db->select('ul.id AS id');
        // $query = $this->db->select('ul.username AS username');
        // $query = $this->db->select('ul.email AS email');
        // $query = $this->db->select('ul.password AS password');
        // $query = $this->db->select('ul.status AS status');
        // $query = $this->db->select('ul.userlevel AS userlevel');
        // $query = $this->db->select('ul.date_created AS datecreated');
        // $query = $this->db->select('ul.date_modified AS datemodified');
        // $query = $this->db->select('ui.rank AS rank');
        // $query = $this->db->select('ui.firstname AS firstname');
        // $query = $this->db->select('ui.middlename AS middlename');
        // $query = $this->db->select('ui.lastname AS lastname');
        // $query = $this->db->select('ui.suffixname AS suffixname');
        // $query = $this->db->select('ui.afpsn AS afpsn');
        // $query = $this->db->select('ui.bos AS bos');
        // $query = $this->db->select('ui.mos AS mos');
        // $query = $this->db->select('ui.address AS address');
        // $query = $this->db->select('ui.phone AS phone');

        $RESULTS = $this->user_model->get_all_data();
        $data = array();
        $no = '0';

        foreach ($RESULTS as $result) {
            $no++;
            $row = array();
            $row['nos']  = $no;
            $row['user_id']  = $result->id;
            $row['username']  = $result->username;
            $row['email']  = $result->email;
            $row['password']  = $result->password; // it maybe an option to display
            $row['status']  = $result->status;
            $row['userlevel']  = $result->userlevel;
            $row['rank']  = $result->rank;
            $row['firstname']  = $result->firstname;
            $row['middelname']  = $result->middlename;
            $row['lastname']  = $result->lastname;
            $row['suffixname']  = $result->suffixname;
            $row['afpsn']  = $result->afpsn;
            $row['bos']  = $result->bos;
            $row['mos']  = $result->mos;
            $row['address']  = $result->address;
            $row['phone']  = $result->phone;
            $row['date_created']  = $result->datecreated;
            $row['date_modified']  = $result->datemodified;
            $data[] = $row;
        }


        $output = array(
            "users" => $data,
            "recordsTotal" => $this->user_model->count_all(), 
        );

        echo json_encode($output);
    }
    
    // public function forgot_password(){
    //         $this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
    //     if($this->form_validation->run()){
    //         $email = $this->input->post('email');
    //     $email_check = $this->user_model->check_email($email);
    //     if($email_check){
    //         $data['error'] = false;
    //         $user = $this->user_model->get_user_by_email($email);
    //         $reset_key = md5(uniqid($email));
    //        if( $this->user_model->update_reset_key($reset_key, $email)){
    //     $this->load->library("phpmailer");
    //     $mail = $this->phpmailer->load();
    //   $mail->isSMTP();
    //             $mail->Host = 'smtp.gmail.com'; 
    //             $mail->Username = "your_google_email@gmail.com";                 
    //             $mail->Password = 'yourpassword123'; 
    //             $mail->Port = 465; 
    //             $mail->SMTPSecure = 'ssl';  
    //             $mail->SMTPAuth = true;
    //            $mail->isHTML(true); 
               
    //            $mail->setFrom('marckevinflores@gmail.com');
    //            $mail->addAddress($email);
    //            $mail->Subject = 'Reset your password';
    //            $mail->Body = '<html>';
    //            $mail->Body .= "<body>";
    //            $mail->Body .= "<div style='background-color:#f2f3f5; padding:30px;'>";
    //            $mail->Body .= "<div style='background-color:#42a5f5;border: 1px solid rgba(0, 0, 0, 0.125);border-radius:0.25rem 0.25rem 0px 0px; padding:10px;'>";
    //            $mail->Body .= "<h1 style=' margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.1;color:white;text-align: center;'>Hi, ".$user->firstname." ".$user->lastname."</h1>";
    //            $mail->Body .= '</div>';
    //             $mail->Body .= "<div style='background-color:white;border: 10px solid rgba(0, 0, 0, 0.125);border-radius:0px 0px 0.25rem 0.25rem; padding:50px;'>";
    //            $mail->Body .= '<h3 style="text-align: center;color: #292b2c;">Your Security Code:</h3>';
    //            $mail->Body .= '<h3 style="text-align: center;color: #292b2c;">'.$reset_key.'</h3>';
    //            $mail->Body .= '</div>';
    //            $mail->Body .= '</div>';
    //            $mail->Body .= '</body>';
    //            $mail->Body .= '</html>';
    //            if($mail->send()){
    //                $data['error'] = false;
    //                $data['email'] = $email;
                   
    //            }else{
    //                $data['error'] = true;
    //                $data['message'] = 'Cannot send email! Kindly contact to our customer service to help you';
    //            }
    //        }
    //     }else{
    //         $data['error'] = true;
    //         $data['message'] = 'Email did not found';
    //     }
        
       
    // }else{
    //         $data['error'] = true;
    //         $data['message'] = form_error('email');
    //     }
    //         echo json_encode($data); 
    // }
    
    // public function change_password(){
    //     $validation_data = array(
    //     array('field' => 'password',
    //         'label' => 'Password',
    //         'rules' => 'trim|required|matches[confirm_password]'
    //     ),
    //     array(
    //         'field' => 'confirm_password',
    //         'label' => 'Confirm Password',
    //         'rules' => 'trim|required'
    //     ));

    //     $this->form_validation->set_rules($validation_data);
    //      if($this->form_validation->run()){
    //        $result=$this->user_model->change_password($this->input->post('id'));
    //         if($result){
    //             $data['error'] = false;
    //             $data['message'] = 'Your password has been successfully changed';
    //         }else{
    //             $data['error'] = true;
    //             $data['message'] = 'Your password cannot be change sorry ';
    //         }
    //      }else{
    //         $data['error'] = true;
    //         $data['message'] = form_error('password');
    //      }
    //     echo json_encode($data);
    // }
    
    
    // public function check_google_user(){
    //      $email = $this->input->post('email');
    //     $google_user = $this->user_model->google_email_exist($email);
    //         if($google_user){
    //            $data = array('user_id' => $google_user,'logged_in' => true);
    //             $this->session->set_userdata($data);
    //              $data['user_exists'] = true;
    //             $data['redirect'] = 'dashboard';
    //         }else{
    //             $data['user_exists'] = false;
    //         }
    //     echo json_encode($data);
    // }

    // public function google_user_register(){
    //     $data = array('error' => true, 'message' =>array());
    //     $validation_data = array(
    //     array(
    //             'field' => 'username',
    //             'label' => 'Username',
    //             'rules' => 'trim|required|is_unique[users.username]'
    //     ),
    //           array(
    //             'field' => 'password',
    //             'label' => 'Password',
    //             'rules' => 'trim|required|matches[confirm_password]'
    //     ),
    //     array(
    //             'field' => 'confirm_password',
    //             'label' => 'Confirm Password',
    //             'rules' => 'trim|required'
    //     ));

    //     $this->form_validation->set_rules($validation_data);
        
    //     if($this->form_validation->run()){
    //         $data['error'] = false;
    //         $google_user = $this->user_model->google_register();
    //         if($google_user)
    //         $data = array('user_id' => $google_user,'logged_in' => true);
    //             $this->session->set_userdata($data);
    //              $data['user_exists'] = true;
    //             $data['redirect'] = 'dashboard';
          
    //     }else{
    //         $data['error'] = true;
    //         foreach($_POST as $key =>$value){
    //             $data['message'][$key] = form_error($key);
    //         }
    //     }
    //     echo json_encode($data);
    // }

    // public function check_for_code(){
    //         $data['error'] = true; 
    //         $email = $this->input->post('email');
    //         $code = $this->input->post('code');
    //         $email_check = $this->user_model->check_email($email);
    //     if($email_check){
    //          $check = $this->user_model->get_user_by_email($email);
    //        if($check->validation_code == $code){
    //            $data['error'] = false;
    //            foreach($check as $key=>$value){
    //                $data['user_info'][$key] = $value;
    //            }
               
    //        }else{
    //            $data['error'] = true;
    //             $data['message'] = 'Your code is incorrect';
    //        }
    //     }else{
    //         $data['message'] = 'Email did not found';
    //     }
           
        
    //     echo json_encode($data);
    // }
}
