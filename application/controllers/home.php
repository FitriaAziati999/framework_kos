<?php
 class Home extends Ci_Controller
 {
  public function __construct()
  {
    parent::__construct();
  $this->load->model('mhome','',TRUE);
  $this->load->helper(array('form','url'));
  }
  public function index()
  {

  //  $data['kos']= $this->db->get ('datakos')->result();
      $data['kos']  =$this->mhome->innerjoin();
      $this->load->view('templateshome/vheaderhome');
      $this->load->view('templateshome/vhome',$data);
      $this->load->view('templateshome/vfooterhome');
  }
 
  public function search(){

    $keyword =$this->input->post('keyword');
    $data['kos'] = $this->mhome->get_keyword($keyword);
    //var_dump($data);
    //die;
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
      
}
?>
