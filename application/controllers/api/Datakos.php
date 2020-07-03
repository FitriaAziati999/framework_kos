<?php
defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Datakos extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Datakos_model', 'a');
    }

    public function index_get()
    {
        $id = $this->get('id_pemilik');
        if ($id === null || $id === '') {
            $this->response([
                'status' => FALSE,
                'message' => 'Masukkan id Anda'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $datakos = $this->a->index($id);
            $this->response([
                'status' => TRUE,
                'data' => $datakos
            ], REST_Controller::HTTP_OK);
        }
    }

    public function detail_post()
    {
        if ($this->post('id_kos')) {
            $id_kos = $this->post('id_kos');

            $detailRiwayat = $this->a->getDetailKos($id_kos);

            if ($detailRiwayat) {
                $this->response([
                    'status' => TRUE,
                    'data' => $detailRiwayat
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'id_kos tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id_kos tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post(){
        $id_pemilik = $this->input->post('id_pemilik');
        $namakos = $this->input->post('namakos');
        $alamatkos = $this->input->post('alamatkos');
        $khususkos = $this->input->post('khususkos');
        $fasilitaskos = $this->input->post('fasilitaskos');
        $lingkungankos = $this->input->post('lingkungankos');
        $peraturankos = $this->input->post('peraturankos');
        
            $arr = [
                'id_pemilik' => $id_pemilik,
                'namakos' => $namakos,
                'alamatkos' => $alamatkos,
                'khususkos' => $khususkos,
                'fasilitaskos' => $fasilitaskos,
                'lingkungankos' => $lingkungankos,
                'peraturankos' => $peraturankos
            ];

            $cek = $this->a->insert('datakos', $arr);

            $response = [
                'status' => true,
                'pesan' => 'Berhasil',
            ];
        
        $this->response($response, 200);
    }
}
