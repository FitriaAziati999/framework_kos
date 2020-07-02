<?php

use FFI\ParserException;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        Parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'LOGIN ADMIN';
            $this->load->view('templates/log_header', $data);
            $this->load->view('Admin/login');
            $this->load->view('templates/log_footer');
        } else {
            $this->__login();
        }
    }
    private function __login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $con = $this->db->get_where('admin', ['emailadmin' => $email])->row_array();

        if ($con) {
            if ($con['is_activate'] == 1) {
                if (password_verify($password, $con['passadmin'])) {
                    $data = ['email' => $con['emailadmin'], 'nama' => $con['useradmin']];
                    $this->session->set_userdata($data);

                    redirect('home');
                } else {
                    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Password Wrong!</div>');
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Email Not active!</div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Email Not Register!</div>');
            redirect('admin');
        }
    }
    public function registration()
    {
        $this->form_validation->set_rules('user', 'Username', 'trim|required|is_unique[admin.useradmin]', [
            'is_unique' => 'Username already used!'
        ]);
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]|matches[pass2]', [
            'matches' => 'password dont match!!',
            'min_length' => 'password to sort!'
        ]);
        $this->form_validation->set_rules('pass2', 'Password', 'trim|required|matches[pass]', [
            'matches' => 'password dont match!!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[admin.emailadmin]|valid_email', [
            'is_unique' => 'Username already used!'
        ]);
        $this->form_validation->set_rules('telp', 'Telephone', 'trim|required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[12]');


        if ($this->form_validation->run() == false) {

            $data['title'] = 'REGISTRASI ADMIN';
            $this->load->view('templates/log_header', $data);
            $this->load->view('Admin/registration');
            $this->load->view('templates/log_footer');
        } else {
            $data = [

                'useradmin' => $this->input->post('user', true),
                'passadmin' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                'noadmin' => $this->input->post('telp'),
                'emailadmin' => $this->input->post('email', true),
                'image' => 'default.png',
                'alamatadmin' => $this->input->post('alamat'),
                'is_activate' => 0,
                'date_create' => time(),


            ];
            $this->db->insert('admin', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            Data has been created!!</div>');
            redirect('admin');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }
}
