<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('muser');
	}

	public function login()
	{
		$this->form_validation->set_rules('emailpen', 'email', 'required|trim|valid_email',
		[  
			'required' => 'Harap Isi data terlebih daulu !',
			'valid_email' => 'Harap menggunakan email yang valid'
		]
		);
		$this->form_validation->set_rules('passpen', 'password', 'required|trim',
		[
			'required' => 'Harap Isi data terlebih daulu !']
		);

		if ($this->form_validation->run() == false) {
			$data['title']='Kos kita-Login';
			$this->load->view('auth/auth_header',$data);
			$this->load->view('auth/vlogin');
			$this->load->view('auth/auth_footer');
		} else {
		//$this->_login();
		$emailpen = $this->input->post('emailpen');
		$passpen = md5($this->input->post('passpen'));	
		$cek = $this->muser->cek_login($emailpen, $passpen);

		if ($cek==FALSE){
		
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        	Email atau Password tidak sesuai !
       		</div>');
			redirect('auth/login');
			}else{
				$this->session->set_userdata('id_penyewa', $cek->id_penyewa);
				$this->session->set_userdata('userpen', $cek->userpen);
				$this->session->set_userdata('namapen', $cek->namapen);
				$this->session->set_userdata('jkpen', $cek->jkpen);
				$this->session->set_userdata('nopen', $cek->nopen);
				$this->session->set_userdata('alamatpen', $cek->alamatpen);
				$this->session->set_userdata('fotopen', $cek->fotopen);
				$this->session->set_userdata('pekerjaanpen', $cek->pekerjaanpen);
				$this->session->set_userdata('emailpen', $cek->emailpen);
				$this->session->set_userdata('nikpen', $cek->nikpen);
				$this->session->set_userdata('role_id', $cek->role_id);
				switch($cek->role_id){
				case 1 : 	redirect('admin/dashboard');
								break;
				case 2 : 	redirect('home/index');
							//	break;
					default: break;
					}
				}
			}
		}
	
		
	public function logout ()
	{
		$this->session->sess_destroy();
		redirect('home/index');
	}
			
	public function registrasi()
	{
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
			'emailpen',
			'email',
			'required|trim|valid_email|is_unique[penyewa.emailpen]',
			[
				'required' => 'Harap Isi data terlebih daulu !',
				'trim' => 'Harap tidak menggunakan spasi',
				'is_unique' => 'Email telah tersedia, gunakan email lain',
				'valid_email' => 'Harap menggunakan email yang valid'
			]
		);
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
		$this->form_validation->set_rules(
			'nikpen',
			'NIK',
			'required|trim|numeric|exact_length[16]',
			[
				'required' => 'Harap Isi data terlebih daulu !',
				'trim' => 'Harap tidak menggunakan spasi',
				'exact_length' => 'Masukkan NIK dengan benar !',
				'numeric' => 'Masukkan NIK dengan benar !',
			]
		);
		if ($this->form_validation->run() == false) {
			$data['title']= 'Kos kita-Daftar';
			$this->load->view('auth/auth_header',$data);
			$this->load->view('auth/vregistrasi');
			$this->load->view('auth/auth_footer');
		} else {
			$userpen = htmlspecialchars($this->input->post('userpen', true));
			$passpen =md5 ($this->input->post('passpen'));
			$namapen = $this->input->post('namapen');
			$jkpen = $this->input->post('jkpen');
			$pekerjaanpen = $this->input->post('pekerjaanpen');
			$nopen = $this->input->post('nopen');
			$alamatpen = $this->input->post('alamatpen');
			$emailpen= $this->input->post('emailpen');
			$nikpen =	$this->input->post('nikpen');
			$role_id= $this->input->post('role_id');
			$date_created= $this->input->post('date_created');
			$is_active= $this->input->post('is_active');
			
			$data= array(
				'userpen'=> $userpen ,
				'passpen' =>$passpen,
				'namapen' => $namapen,
				'fotopen' => 'default.jpg',
				'jkpen' => $jkpen ,
				'pekerjaanpen'=> $pekerjaanpen,
				'nopen' =>$nopen,
				'alamatpen' =>$alamatpen, 
				'emailpen' =>$emailpen ,
				'nikpen' =>$nikpen,
				'role_id' =>2,
				'date_created'=>date('Y-m-d'),
				'is_active' =>1
			);

			$this->db->insert('penyewa', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, Akun anda sudah berhasil dibuat. Silahkan Login terlebih dahulu!
          </div>');
			redirect('auth/login');
		}
	}


   public function lupapwd()
	{
		$this->form_validation->set_rules('emailpen', 'email', 'required|trim|valid_email',
		[  
			'required' => 'Harap Isi data terlebih daulu !',
			'valid_email' => 'Harap menggunakan email yang valid'
		]
		);
		$this->form_validation->set_rules('nopen', 'handhphone', 'required|trim',
		[
			'required' => 'Harap Isi data terlebih daulu !']
		);

		if ($this->form_validation->run() == false) {
			$data['title']='Kos kita- Lupa password';
			$this->load->view('auth/auth_header',$data);
			$this->load->view('auth/vlupapwd');
			$this->load->view('auth/auth_footer');
		} else {
         //$this->_login();
         $emailpen = $this->input->post('emailpen');
         $nopen = $this->input->post('nopen');	
         $cek = $this->muser->lupapwd($emailpen, $nopen);
         
		if ($cek==FALSE){
		
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        	Email atau No Handhphone anda belum terdaftar !
       		</div>');
         redirect('lupapwd/index');
         }else{
            $this->session->set_userdata('id_penyewa', $cek->id_penyewa);
            $this->resetpwd(); 
            }
      }
   }
 
   public function resetpwd()
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
         $this->load->view('auth/auth_header',$data);
         $this->load->view('auth/vresetpwd');
         $this->load->view('auth/auth_footer');
      }else{
         $id= array('id_penyewa' =>$this->session->userdata('id_penyewa'));
         $data= array('passpen' =>md5($passpen));
         $this->muser->gantipwd($id,$data,'penyewa');
         
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Password berhasil di update! Silahkan login
         </div>');
         redirect('auth/login');
      }    
   }
}

?>