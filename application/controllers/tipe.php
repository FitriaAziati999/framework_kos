<?php

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Tipe extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Mtipe');
  }

  public function id_post(){
    $response = $this->Mtipe->get_login($this->post('id'));
    $this->response($response);
  }

  public function update_put(){
    
    $response = $this->Mtipe->update_tipe(
      $this->put('id_kos'),
      $this->put('ukuran'),
      $this->put('stok'),
      $this->put('harga'),
      $this->put('penghuni'),
      $this->put('fasilitaskamar'),
      $this->put('fotokamar'),
      );


$this->response($response);
}

public function index_get(){
  $id = $this->get('id_kamar');
  if ($id === null || $id === ''){
    $this->response([
      'status' => FALSE,
      'message' => 'login dahulu'
    ], REST_Controller::HTTP_NOT_FOUND);
}else{
  $datakos = $this->Mdata->getDataTrans($id);
  $this->response([
    'status' => TRUE,
    'data' => $datakos
  ], REST_Controller::HTTP_OK);
 }
}

}

?>