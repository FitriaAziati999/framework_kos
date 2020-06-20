<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post(){
        $email = $this->post('email');
        $password = $this->post('password');

        $cek = $this->db->select('user', ['email' => $email])->result();
        if($cek){
            $this->response($cek, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }
}