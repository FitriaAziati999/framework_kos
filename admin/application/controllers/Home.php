<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        // $data['user'] = $this->db->get_where('admin', ['emailadmin' => $this -
        //     $this->session->userdata('emailadmin')])->row_array();
        $data['admin'] = $this->admin->getAdmin();
        // var_dump($data['admin']);
        // die;

        $this->load->view('Admin/dashboard', $data);
    }

    public function updateStatus($id)
    {
        $this->admin->setStatus($id);
        redirect('home');
    }
}
