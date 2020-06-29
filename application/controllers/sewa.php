<?php
 class Sewa extends Ci_Controller
{
  public function __construct()
  {
  parent::__construct();
  $this->load->model('mhome','',TRUE);
  $this->load->helper(array('form','url'));
  $this->load->library('form_validation');
  }
  
  public function tampil_sewa($id, $id_k) 
  {
    if ($this->session->userdata('id_penyewa')){ 
    $data['detail'] = $this->mhome->tampil_sewa($id, $id_k);
    $this->load->view('templateshome/vheaderhome');
    $this->load->view('templateshome/vsewakos',$data);
    $this->load->view('templateshome/vfooterhome');
  } else { $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Sebelum melakukan proses transaksi, silahkan Login terlebih dahulu!
     </div>');
    redirect('auth/login');}
}
public function aksi_sewa() 
{   
    $id_sewa = $this->input->post('id_sewa');
    $id_penyewa = $this->input->post('id_penyewa');
    $id = $this->input->post('id_kos');
    $id_k = $this->input->post('id_kamar');
    $namakos = $this->input->post('namakos');
    $alamatkos = $this->input->post('alamatkos');
    $harga = $this->input->post('harga');
    $namapen = $this->input->post('namapen');
    $alamatpen = $this->input->post('alamatpen');
    $nopen =	$this->input->post('nopen');
    $masuk_kos = $this->input->post('masuk_kos');
    $rek_tujuan= $this->input->post('rek_tujuan');
    $rek_penyewa =	$this->input->post('rek_penyewa');
    $tgl_bayar= $this->input->post('tgl_bayar');
    $status= $this->input->post('status');
    $uploadfoto = $_FILES['bukti']['name'];
    if($uploadfoto=''){}else{
       $config['upload_path']='./assets/img/bukti_transaksi';
       $config['allowed_types']='jpg|png|jpeg|jfif';
       $config['max_size']='2000';

       $this->load->library('upload',$config);
                 if(!$this->upload->do_upload('bukti')){
                  echo"Foto Bukti transfer gagal diupload!";
                  
                }else{
                  $uploadfoto = $this->upload->data('file_name');
                 }
                }
 
    $data= array(
      'id_sewa'=> $id_sewa,
      'id_penyewa'=> $id_penyewa,
      'id_kos' =>  $id,
      'id_kamar' => $id_k ,
      'namakos' => $namakos ,
      'alamatkos'=>  $alamatkos,
      'harga'=>  $harga,
      'namapen' =>$namapen,
      'alamatpen' =>$alamatpen, 
      'nopen' =>$nopen ,
      'masuk_kos' =>$masuk_kos,
      'rek_tujuan' =>$rek_tujuan,
      'rek_penyewa'=>$rek_penyewa,
      'tgl_bayar'=>date('Y-m-d'),
      'status' =>'Proses Verifikasi',
      'bukti' =>$uploadfoto
    );
   
    $this->mhome->insert_data($data,'sewa');

    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Proses penyewaan kos telah berhasil, Pihak admin akan menverifikasi data Anda dan segera menginformasikan kepada pemilik kos 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
    redirect('home/index');
}
}?>