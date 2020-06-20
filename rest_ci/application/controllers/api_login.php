

<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/Rest_Controller.php';

use Restserver\Libraries\Rest_Controller;


class Api_login extends Rest_Controller

{
    
         function __construct($config = 'rest')


        {

            parent::__construct($config);
            $this->load->database();

        }

    
    function index_post()

    {
        $email = $this->post('emailpem');
        $password = $this->post('passpem');
        if ($email && $password) {
            $cek = $this->db->get_where('pemilik', ['emailpem' => $email])->row_array();
            if ($cek) {

                if ($cek['passpem'] == 0) {
                    $result['login'] = array();
                    array_push($result['login']);
                    $result['success'] = 0;
                    $result['message'] = 'password salah';

                    echo json_encode($result);
                } else {
                
                    if (password($password, $cek['passpem'])) {

                        $result['login'] = array();
                        $index = $cek;
                        array_push($result['login'], $index);
                        $result['success'] = 1;
                        $result['message'] = 'success';

                        echo json_encode($result);
                    } else {

                        $result['login'] = array();
                        array_push($result['login']);
                        $result['success'] = 0;
                        $result['message'] = 'Password Salah';
                        echo json_encode($result);
                    }
                }
            } else {
                $result['login'] = array();
                array_push($result['login']);
                $result['success'] = 0;
                $result['message'] = 'Akun Anda Belum Terdaftar';
                echo json_encode($result);
            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value wajib diisi';
            echo json_encode($result);
        }
    }


