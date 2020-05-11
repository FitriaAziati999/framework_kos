<?php

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Profil extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Mprofil');
  }

  public function id_post(){
    $response = $this->Mprofil->get_login($this->post('id'));
    $this->response($response);
  }

  public function update_put(){
    
        $response = $this->Mprofil->update_profil(
          $this->put('id_pemilik'),
          $this->put('namapem'),
          $this->put('nopem'),
          $this->put('alamatpem'),
          $this->put('nikpem'),
          $this->put('emailpem')
          );
    
  
  $this->response($response);
}

}

?>