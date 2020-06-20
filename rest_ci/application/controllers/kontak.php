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

    //Menampilkan data yang diminta berdasarkan id
    // function index_get()
    // {
    //     $id = $this->get('id');
    //     if ($id == '') {
    //         $kontak = $this->db->get('telepon')->result();
    //     } else {
    //         $this->db->where('id', $id);
    //         $kontak = $this->db->get('telepon')->result();
    //     }
    //     $this->response($kontak, 200);
    // }

    function index_get()
    {
        $email = $this->get('email');
        if ($email == '') {
            $kontak = $this->db->get('user')->result();
        } else {
            $this->db->where('id', $email);
            $kontak = $this->db->get('user')->result();
        }
        $this->response($kontak, 200);
    }

    function index_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');
        $cek = $this->db->get_where('user', ['email' => $email])->result_array();
        $cek = $cek[0];
        if ($cek) {
            if ($cek['aktivasi'] == 0) {
                // $this->response('Akun Anda belum di Aktifasi');
                $result['login'] = array();
                array_push($result['login']);
                $result['success'] = 0;
                $result['message'] = 'Akun Anda Belum Diaktivasi';

                echo json_encode($result);
            } else {
                if (password_verify($password, $cek['password'])) {

                    $result['login'] = array();
                    $index = $cek;
                    array_push($result['login'], $index);
                    $result['success'] = 1;
                    $result['message'] = 'success';

                    echo json_encode($result);
                } else {
                    $this->response('Password Salah');
                }
            }
        } else {
            $this->response('Akun Tidak Terdaftar');
        }
    }

    // //menambahkan data baru 
    // function index_post()
    // {
    //     $data = array(
    //         'id' => '',
    //         'nama' => $this->post('nama'),
    //         'nomor' => $this->post('nomor')
    //     );
    //     $insert = $this->db->insert('telepon', $data);
    //     if ($insert) {
    //         $this->response($data, 200);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }


    // //Memperbarui data yang telah ada
    // function index_put()
    // {
    //     $id = $this->put('id');
    //     $data = array(
    //         'id'       => $this->put('id'),
    //         'nama'          => $this->put('nama'),
    //         'nomor'    => $this->put('nomor')
    //     );
    //     $this->db->where('id', $id);
    //     $update = $this->db->update('telepon', $data);
    //     if ($update) {
    //         $this->response($data, 200);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }



    //  //Menghapus data berdasarkan id
    //  function index_delete() {
    //     $id = $this->delete('id');
    //     $this->db->where('id', $id);
    //     $delete = $this->db->delete('telepon');
    //     if ($delete) {
    //         $this->response(array('status' => 'success'), 201);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }

    // //Masukan function selanjutnya disini
}
