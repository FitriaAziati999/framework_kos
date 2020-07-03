<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Register extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('api/Pemilik_model');
    }

    public function index_post(){
        $namapem = $this->input->post('namapem');
        $emailpem = $this->input->post('emailpem');
        $userpem = $this->input->post('userpem');
        $alamatpem = $this->input->post('alamatpem');
        $nopem = $this->input->post('nopem');
        $nikpem = $this->input->post('nikpem');
        $passpem = $this->input->post('passpem');

        $cek = $this->db->get_where('pemilik', ['emailpem' => $emailpem])->row_array();
        if ($cek > 0) {
            $response = [
                'status' => false,
                'message' => 'Email Telah Digunakan',
            ];
        }else {
            $arr = [
                'namapem' => $namapem,
                'emailpem' => $emailpem,
                'userpem' => $userpem,
                'alamatpem' => $alamatpem,
                'nopem' => $nopem,
                'nikpem' => $nikpem,
                'passpem' => $passpem,
                'status' => '1'
            ];

            $cek = $this->Pemilik_model->insert('pemilik', $arr);

            $response = [
                'status' => true,
                'pesan' => 'Pendaftaran Akun Berhasil',
            ];
        }
        $this->response($response, 200);
    }
}