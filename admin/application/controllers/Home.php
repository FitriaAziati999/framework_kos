<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('admin', ['emailadmin' => $this -
            $this->session->userdata('emailadmin')])->row_array();
    }
}
