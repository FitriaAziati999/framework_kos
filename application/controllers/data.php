<?php

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Data extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Mdata');
  }

  public function id_post(){
    $response = $this->Mdata->get_login($this->post('id'));
    $this->response($response);
  }

  public function update_put(){
    
    $response = $this->Mdata->update_datakos(
      $this->put('id_kost'),
      $this->put('id_pemilik'),
      $this->put('namakos'),
      $this->put('alamatkos'),
      $this->put('khususkos'),
      $this->put('fasilitaskos'),
      $this->put('lingkungankos'),
      $this->put('peraturankos'),
      );


$this->response($response);
}
}

?>
