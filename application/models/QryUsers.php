<?php if (! defined('BASEPATH')) exit('ERRO: 404 Not Found');
// PROGRAMMER               : JOSE MARI C REY
// TYPE OF WEB APPLICATION  : A progressive web application based student grading system.
// NAME OF APPLICATION      : Student Admission, Registration and Grading System for C2C, Training and Doctrine Command, Phillipine Army
// VERSION                  : 1.0
// DATE                     : 22 February 2021

Class QryUsers extends CI_Model {
    function __Construct() {
        parent::__construct();
    }

    // ***************************************************************
    // It attemps to query the data from database.
    // I uses crud method (Created, Read, Update and Delete) excepts 
    // login and logout function.
    // ***************************************************************

    // login function
    function login() {
       
    }

    // logout function 
    function logout() {
        $this->session->unset_userdata('');
        $this->session->session_destroy();
        redirect('home', 'refresh');
    }

    // session user function
    function session_user() {

    }

    // ***************************************************************
    // It will implements the crud (Create, Read, Update and Delete)
    // ***************************************************************

    // CREATE QUERY
    function register_user_login() {

    }

    function register_user_info() {

    }

    function register_user_eval_settings() {

    }

    // READ QUERY
    function user_username_exist() {

    }

    function user_userid_exist() {

    }

    function get_users_page() {

    }

    // UPDATE QUERY
    // DELETE QUERY
}