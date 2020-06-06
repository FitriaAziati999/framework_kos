<?php

require APPPATH . 'libraries/REST_Controller.php';

class data extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Mdata');
  }

  // method index untuk menampilkan semua data mhs menggunakan method get
  public function index_get(){
    $response = $this->Mdata->all_datakos();
    $this->response($response);
  }

  // untuk menambah mhs menaggunakan method post
  public function add_post(){
    $response = $this->MhsM->add_mhs(
        $this->post('namakos'),
        $this->post('alamatkos'),
        $this->post('khususkos'),
        $this->post('fasilitaskos'),
        
      );
    $this->response($response);
  }

  public function id_post(){
    $response = $this->MhsM->get_mhs_by_id($this->post('id'));
    $this->response($response);
  }

  // update data mhs menggunakan method put
  
  public function foto_post(){
      $response = $this->MhsM->foto_mhs(
            $this->post('id'),
            $this->post('foto')
          );
        $this->response($response);
  }
  
  public function update_put(){
      if($this->put('foto')){
        $response = $this->MhsM->upload_mhs(
            $this->put('id'),
            $this->put('foto')
            );
      } else {
          $response = $this->MhsM->update_mhs(
            $this->put('id'),
            $this->put('nim'),
            $this->put('nama'),
            $this->put('jurusan')
            );
      }
      $this->response($response);
  }

  // hapus data mhs menggunakan method delete
  public function delete_post(){
    $response = $this->MhsM->delete_mhs(
        $this->post('id')
      );
    $this->response($response);
  }

}

?>
