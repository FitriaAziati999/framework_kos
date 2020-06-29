<?php
 class Home extends Ci_Controller
 {
  public function __construct()
  {
    parent::__construct();
  $this->load->model('mhome','',TRUE);
  $this->load->helper(array('form','url'));
  $this->load->library('form_validation');
  }
  //function home atau beranda
  public function index()
  {
  //  $data['kos']= $this->db->get ('datakos')->result();
      $data['kos']  =$this->mhome->innerjoin();
      $this->load->view('templateshome/vheaderhome');
      $this->load->view('templateshome/vhome',$data);
      $this->load->view('templateshome/vfooterhome');
  }

 //function pencarian
  public function search(){
    $keyword =$this->input->post('keyword');
    //$data['kos'] = $this->mhome->get_keyword($keyword);

    $data = [
             "kos" => $this->mhome->get_keyword($keyword),
             "All" => $this->mhome->innerjoin(),
    ];

    if(!$data['kos']){
      $this->session->set_flashdata('kosong', 'Pencarian Tidak Ditemukan');
      $this->load->view('templateshome/vheaderhome');
      $this->load->view('templateshome/vhome',$data);
      $this->load->view('templateshome/vfooterhome');
    } else{
      $this->load->view('templateshome/vheaderhome');
      $this->load->view('templateshome/vhome',$data);
      $this->load->view('templateshome/vfooterhome');
    }

  }

  public function search_terendah(){
  $keyword1 =$this->input->post('min'); // Menagkap Input Harga Terendah
  $keyword2 =$this->input->post('max'); // Menagkap Input Harga Tertinggi


  $data['kos'] = $this->mhome->get_harga_terendah($keyword1,$keyword2);

  $this->load->view('templateshome/vheaderhome');
  $this->load->view('templateshome/vhome',$data);
  $this->load->view('templateshome/vfooterhome');
}

public function search_tertinggi(){
  $keyword1 =$this->input->post('min'); // Menagkap Input Harga Terendah
  $keyword2 =$this->input->post('max'); // Menagkap Input Harga Tertinggi


  $data['kos'] = $this->mhome->get_harga_tertinggi($keyword1,$keyword2);

  $this->load->view('templateshome/vheaderhome');
  $this->load->view('templateshome/vhome',$data);
  $this->load->view('templateshome/vfooterhome');
}
  
  public function info(){
   
    $this->load->view('templateshome/vheaderhome');
    $this->load->view('templateshome/vinfo');
    $this->load->view('templateshome/vfooterhome');
  }
  
  //function detail kos
  public function detail($id, $id_kamar) 
  {
  $data['kos']  =$this->mhome->innerjoin();
  $data['detail'] = $this->mhome->ambil_id($id, $id_kamar);
  $this->load->view('templateshome/vheaderhome');
  $this->load->view('templateshome/vdetail',$data);
  $this->load->view('templateshome/vfooterhome');
  }
  
  //function favorit kos
  public function favoritkos()
  {
      if ($this->session->userdata('id_penyewa')){ 
            //pendifinisian
            $id_wishlist = $this->input->post('id_wishlist');
            $id_penyewa = $this->input->post('id_penyewa');
            $id = $this->input->post('id_kos');
            $id_k = $this->input->post('id_kamar');
            $data= array(
              'id_wishlist'=> $id_wishlist,
              'id_penyewa'=> $id_penyewa,
              'id_kos' =>  $id,
              'id_kamar' => $id_k 
            );
            //input data ke databse
            $this->mhome->insert_fav($data,'wishlist');
          } else { $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            silahkan Login terlebih dahulu!
            </div>');
            redirect('auth/login');
          }
        }
  
}
?>
