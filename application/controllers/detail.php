<?php
 class Detail extends Ci_Controller
 {
  public function __construct()
  {
    parent::__construct();
  $this->load->model('mhome','',TRUE);
  $this->load->helper(array('form','url'));
  }

   public function detail($id, $id_kamar) 
    {
        $data['kos']  =$this->mhome->innerjoin();
        $data['detail'] = $this->mhome->ambil_id($id, $id_kamar);
        $this->load->view('templateshome/vheaderhome');
        $this->load->view('templateshome/vdetail',$data);
        $this->load->view('templateshome/vfooterhome');
    }


}
?>
