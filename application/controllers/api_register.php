<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/Rest_Controller.php';

use Restserver\Libraries\Rest_Controller;


class Api_register extends Rest_Controller

{

function daftar_post()
    {
        $nama = $this->input->post('namapem');
        $email = $this->input->post('emailpem');
        $username = $this->input->post('userpem');
        $alamat = $this->input->post('alamatpem');
        $telepon = $this->input->post('nopem');
        $nik = $this->input->post('nikpem');
        $password = $this->input->post('passpem');

        
        $data = [                
            'namapem' => $nama,
            'emailpem' => $email,
            'userpem' => $username,
            'alamatpem' => $alamat,
            'nopem' => $telepon,
            'nikpem' => $nik,
            'passpem' => $password
            
        ];

        if($nama && $email && $username && $alamat && $telepon && $nik && $password){
            

            //masukan akun kedalam DB
            $this->db->insert('pemilik', $data);


            //kirim server respon
            $result['success'] = 1;
            echo "Akun Berhasil Didaftarkan";
           

        } else {

            //kirim server respon gagal daftar
            $result['success'] = 0;
            echo "Key dan Value wajib diisi";
            
        }

    }
}