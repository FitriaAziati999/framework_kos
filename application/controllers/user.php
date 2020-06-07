<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('muser');
	}
   
   public function dashboard()
   {  
      $data['penyewa']=$this->db->get_where('penyewa',['id_penyewa'=> $this->session->userdata('id_penyewa')])->row_array();
      $dtitle['title']='KosKita-My profil';
      $this->load->view('templatesuser/vheaderuser',$dtitle);
      $this->load->view('templatesuser/vsidebaruser');
      $this->load->view('templatesuser/vuser',$data);
      $this->load->view('templatesuser/vfooteruser');
   }
   
   public function editprofil()
   {   
      $data['penyewa']=$this->db->get_where('penyewa',['id_penyewa'=> $this->session->userdata('id_penyewa')])->row_array();
      //$where= array('id_penyewa'=> $this->session->userdata('id_penyewa'));
     // $data['penyewa']=$this->db->query("SELECT * FROM penyewa where id_penyewa='id_penyewa'")->result();
      $dtitle['title']='KosKita-Edit profil';
      $this->load->view('templatesuser/vheaderuser',$dtitle);
      $this->load->view('templatesuser/vsidebaruser');
      $this->load->view('templatesuser/veditprofil',$data);
      $this->load->view('templatesuser/vfooteruser');
   }

   public function aksi_editprofil()
   {        
   
   //$this->form_validation->set_rules(
   // 'emailpen',
   // 'email',
   // 'required|trim|valid_email|is_unique[penyewa.emailpen]',
   // [
   //    'required' => 'Harap Isi data terlebih daulu !',
      //   'trim' => 'Harap tidak menggunakan spasi',
      //   'is_unique' => 'Email telah tersedia, gunakan email lain',
      //   'valid_email' => 'Harap menggunakan email yang valid'
      //]
   //);
   //$this->form_validation->set_rules(
      //'passpen',
    //  'password',
      //'required|trim|min_length[4]|max_length[10]|alpha_numeric|matches[passpen2]',
      //[
        // 'required' => 'Harap Isi data terlebih daulu !',
         //'matches' => 'Password tidak cocok, periksa kembali',
         //'min_length' => 'Password terdiri atas 4 sampai 13 digit',
         //'max_length' => 'Password terdiri atas 4 sampai 13 digit',
        // 'alpha_numerik' => 'Password terdiri atas angka dan abjad',
        // 'trim' => 'Harap tidak menggunakan spasi',

     // ]
   //);
  // $this->form_validation->set_rules(
   //   'passpen2',
   //   'confirm password',
    //  'required|trim|min_length[4]|max_length[10]|alpha_numeric|matches[passpen]',
   //   [
    //     'required' => 'Harap Isi data terlebih daulu !',
    //     'matches' => 'Password tidak cocok, periksa kembali',
    //     'min_length' => 'Password terdiri atas 4 sampai 13 digit',
    //     'max_length' => 'Password terdiri atas 4 sampai 13 digit',
    //     'alpha_numerik' => 'Password terdiri atas angka dan abjad',
    //     'trim' => 'Harap tidak menggunakan spasi',
     // ]
   //);
   $this->form_validation->set_rules(
      'namapen',
      'name',
      'required|trim|max_length[25]',
      [
         'required' => 'Harap Isi data terlebih daulu !',
         'trim' => 'Harap tidak menggunakan spasi',
         'max_length' => 'Gunakan username 0-25 karakter '
      ]
   );
   $this->form_validation->set_rules(
      'userpen',
      'username',
      'required|trim|max_length[20]',
      [
         'required' => 'Harap Isi data terlebih daulu !',
         'trim' => 'Harap tidak menggunakan spasi',
         'max_length' => 'Gunakan username 0-20 karakter (contoh : Fitria986)'
      ]
   );
   $this->form_validation->set_rules(
      'nopen',
      'handhphone',
      'required|trim|numeric|exact_length[12]',
      [
         'required' => 'Harap Isi data terlebih daulu !',
         'trim' => 'Harap tidak menggunakan spasi',
         'exact_length' => 'Masukkan nomor handphone aktif anda(085*************)',
         'numeric' => 'Masukkan nomor handphone aktif anda(085*************)',
      ]
   );
   $this->form_validation->set_rules(
      'alamatpen',
      'address',
      'required|max_length[50]',
      [
         'required' => ' Isi alamat anda yang sesuai dan benar!',
         'max_length' => 'Isi alamat anda yang sesuai dan benar!'
      ]
   ); 
   $this->form_validation->set_rules(
      'pekerjaanpen',
      'job',
      'required',
      [
         'required' => 'Harap Isi data terlebih daulu !'
      ]
   );
   $this->form_validation->set_rules(
      'jkpen',
      'gender',
      'required',
      [
         'required' => 'Harap Isi data terlebih daulu !'
      ]
   );
   //$this->form_validation->set_rules(
   //   'nikpen',
   //   'NIK',
   //   'required|trim|numeric|exact_length[16]',
   //   [
   //     'required' => 'Harap Isi data terlebih daulu !',
   //      'trim' => 'Harap tidak menggunakan spasi',
   //      'exact_length' => 'Masukkan NIK dengan benar !',
   //      'numeric' => 'Masukkan NIK dengan benar !',
   //  ]
   //);

 $this->form_validation->set_rules(
    'fotopen',
   'Foto ',
      'is_image',
    [
      'is_image' => 'isi data dengan benar !',
       
     ]
  );
      if ($this->form_validation->run() == false) {
    
         $this->editprofil();
        
      } else {
               
               $userpen = $this->input->post('userpen');
               //$userpen = htmlspecialchars($this->input->post('userpen', true));
               //$passpen =md5 ($this->input->post('passpen'));
               $namapen = $this->input->post('namapen');
               $jkpen = $this->input->post('jkpen');
               $pekerjaanpen = $this->input->post('pekerjaanpen');
               $nopen = $this->input->post('nopen');
               $alamatpen = $this->input->post('alamatpen');
               $emailpen= $this->input->post('emailpen');
               $nikpen =	$this->input->post('nikpen');
               //$role_id= $this->input->post('role_id');
               //$date_created= $this->input->post('date_created');
               //$is_active= $this->input->post('is_active');
               //cek gambar yang akan diupload
              $uploadfoto = $_FILES['fotopen']['name'];
               if($uploadfoto){
                  $config['upload_path']='./assets/img/profil/';
                  $config['allowed_types']='jpg|png|jpeg|jfif';
                  $config['max_size']='2000';
 
                 $this->load->library('upload',$config);
                 if($this->upload->do_upload('fotopen')){
                  //oldimage digunakan untuk menghapus foto lama agr tdk menumpuk   
                     $oldimage=$data['penyewa']['fotopen'];
                     if($oldimage !='default.jpg'){
                        //bukan memakai perintah delete tp unlinkfcpath
                        unlink(pathinfo.'/assets/img/profil/'.$oldimage);
                     }
                     $newimage = $this->upload->data('file_name');
                     $this->db->set('fotopen',$newimage);
                  }else{
                     echo $this->upload->display_errors();
                     
                 }
               }

               $data= array(
                  'userpen'=> $userpen ,
                  //'passpen' =>$passpen,
                  'namapen' => $namapen,
                  //'fotopen' => $fotopen,
                  'jkpen' => $jkpen ,
                  'pekerjaanpen'=> $pekerjaanpen,
                  'nopen' =>$nopen,
                  'alamatpen' =>$alamatpen, 
                  'emailpen' =>$emailpen ,
                  'nikpen' =>$nikpen,
                  //'role_id' =>2,
                  //'date_created'=> time(),
                  //'is_active' =>1
               );

            $where= array('id_penyewa'=> $this->session->userdata('id_penyewa'));
            $this->muser->editprofil($where,'penyewa', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success role="alert">
            Data anda berhasil di update !</div>');
            redirect('user/dashboard');
            }
      }

      public function gantipwd()
      {   
         $dtitle['title']='KosKita-My profil';
         $this->load->view('templatesuser/vheaderuser',$dtitle);
         $this->load->view('templatesuser/vsidebaruser');
         $this->load->view('templatesuser/vgantipwd');
         $this->load->view('templatesuser/vfooteruser');
      }
   
      public function aksi_gantipwd()
      {
         $this->form_validation->set_rules(
            'passpen',
            'password',
            'required|trim|min_length[4]|max_length[10]|alpha_numeric|matches[passpen2]',
            [
               'required' => 'Harap Isi data terlebih daulu !',
               'matches' => 'Password tidak cocok, periksa kembali',
               'min_length' => 'Password terdiri atas 4 sampai 13 digit',
               'max_length' => 'Password terdiri atas 4 sampai 13 digit',
               'alpha_numerik' => 'Password terdiri atas angka dan abjad',
               'trim' => 'Harap tidak menggunakan spasi',
            ]
         );
         $this->form_validation->set_rules(
            'passpen2',
            'confirm password',
            'required|trim|min_length[4]|max_length[10]|alpha_numeric|matches[passpen]',
            [
               'required' => 'Harap Isi data terlebih daulu !',
               'matches' => 'Password tidak cocok, periksa kembali',
               'min_length' => 'Password terdiri atas 4 sampai 13 digit',
               'max_length' => 'Password terdiri atas 4 sampai 13 digit',
               'alpha_numerik' => 'Password terdiri atas angka dan abjad',
               'trim' => 'Harap tidak menggunakan spasi',
            ]
         );
         $passpen= $this->input->post('passpen');
         $passpen2 = $this->input->post('passpen2');
      
         //cek form validasi
         if ($this->form_validation->run()== FALSE){
            $data['title']='Kos kita- Ganti password';
            $this->load->view('templatesuser/vheaderuser',$data);
            $this->load->view('templatesuser/vsidebaruser');
            $this->load->view('templatesuser/vgantipwd');
            $this->load->view('templatesuser/vfooteruser');
         }else{
            $data= array('passpen'=> md5($passpen));
            $id= array('id_penyewa'=> $this->session->userdata('id_penyewa'));
       
            $this->muser->gantipwd($id,$data,'penyewa');
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success role="alert">
            <strong> Selamat !</strong> Password anda berhasil di update ! </div>');
            redirect('user/gantipwd');
         }    

      }
}
?>
