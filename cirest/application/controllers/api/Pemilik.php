<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Pemilik extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('api/Pemilik_model');
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
            $datakos = $this->Pemilik_model->index($id);
            $this->response([
                'status' => TRUE,
                'data' => $datakos
            ], REST_Controller::HTTP_OK);
        }
    }

    public function register_post(){
        
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

    public function login_post() {

        # Form Validation
        $this->form_validation->set_rules('emailpem', 'Email', 'trim|required');
        $this->form_validation->set_rules('passpem', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            // Form Validation
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            // Load Login Function
            $output = $this->Pemilik_model->akun_login($this->input->post('emailpem'), $this->input->post('passpem'));
            if(!empty($output) AND $output != FALSE) {

                // Load Authorization Token Library
                $this->load->library('Authorization_Token');

                // Generate Token
                $token_data['id_pemilik'] = $output->id_pemilik;
                $token_data['namapem'] = $output->namapem;
                $token_data['emailpem'] = $output->emailpem;
                $token_data['userpem'] = $output->userpem;
                $token_data['alamatpem'] = $output->alamatpem;
                $token_data['nopem'] = $output->nopem;
                $token_data['nikpem'] = $output->nikpem;
                $token_data['passpem'] = $output->passpem;
                $token_data['status'] = $output->status;
                $token_data['fotopem'] = $output->fotopem;

                $akun_token = $this->authorization_token->generateToken($token_data);

                $return_data = [
                    'id_pemilik' => $output->id_pemilik,
                    'namapem' => $output->namapem,
                    'emailpem' => $output->emailpem,
                    'userpem' => $output->userpem,
                    'alamatpem' => $output->alamatpem,
                    'nopem' => $output->nopem,
                    'nikpem' => $output->nikpem,
                    'passpem' => $output->passpem,
                    'status' => $output->status,
                    'fotopem' => $output->fotopem,
                    'token' => $akun_token,
                    'pesan' => "Selamat Datang"
                ];

                // Login Success
                $message = [
                    'status' => TRUE,
                    'data' => $return_data,
                    'message' => "Selamat Datang"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else {
                // LoginError
                $message = [
                    'status' => FALSE,
                    'message' => "Email atau Password Salah"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_put()
    {
        if ($this->put('id_pemilik'))
        {
            $id = $this->put('id_pemilik');

            $config = uniqid().'.jpeg';
            $path = './uploads/pemilik/'.$config;

            $pemilik = $this->db->get_where('pemilik', ['id_pemilik' => $id])->row_array();
            
            if($pemilik) {
                if($this->put('fotopem')) {
                    $foto = $this->put('fotopem');

                    $data = array(
                        'namapem' => $this->put('namapem'),
                        'alamatpem' => $this->put('alamatpem'),
                        'nopem' => $this->put('nopem'),
                        'emailpem' => $this->put('emailpem'),
                        'userpem' => $this->put('userpem'),
                        'nikpem' => $this->put('nikpem'),
                        'fotopem' => $config
                    );

                        if ($this->db->update('pemilik', $data, ['id_pemilik' => $id])) {
                            file_put_contents($path, base64_decode($foto));
                            // jika berhasil
                            $this->set_response([
                                'status' => true,
                                'message' => 'Berhasil Mengupdate Profil'
                            ], 200);
                        } else {
                            // jika gagal
                            $this->set_response([
                                'status' => false,
                                'message' => 'Gagal Mengupdate Profil'
                            ], 401);
                        }

                    } else {
                        $data = array(
                        'namapem' => $this->put('namapem'),
                        'alamatpem' => $this->put('alamatpem'),
                        'nopem' => $this->put('nopem'),
                        'emailpem' => $this->put('emailpem'),
                        'userpem' => $this->put('userpem'),
                        'nikpem' => $this->put('nikpem')          
                        );
                        
                        if ($this->db->update('pemilik', $data, ['id_pemilik' => $id])) {                        
                            // jika berhasil
                            $this->set_response([
                                'status' => true,
                                'message' => 'Berhasil Mengupdate Profil'
                            ], 200);
                        } else {
                            // jika gagal
                            $this->set_response([
                                'status' => false,
                                'message' => 'Gagal Mengupdate Profil'
                            ], 401);
                        }
                    }
                    
                } else {
                    // jika data pengguna tidak ada
                    $this->set_response([
                        'status' => false,
                        'message' => 'User could not be found'
                    ], 404);
                }

        } else {
            // jika tidak ada parameter id
            $this->set_response([
                'status' => false,
                'message' => 'User could not be found'
            ], 404);
        }
    }

}