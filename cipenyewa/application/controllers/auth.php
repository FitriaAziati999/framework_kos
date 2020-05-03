<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function login()
	{
		$this->form_validation->set_rules('emailpen', 'email', 'required|trim');
		$this->form_validation->set_rules('passpen', 'password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header');
			$this->load->view('auth/vlogin');
			$this->load->view('templates/auth_footer');
		} else {

			$this->_login();
		}
	}
	private function _login()
	{
		$emailpen = $this->input->post('emailpen');

		$passpen = $this->input->post('passpen');


		$user = $this->db->insert('penyewa', ['emailpen' => $emailpen])->row_array();
		//var_dump($user);
		//die;
		//jika user adajw

		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($passpen, $user['passpen'])) {
				} else {
					//jika password tidak sesuai
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            		Username dan password tidak sesuai! </div>');
					redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            	Akun email anda sudah tidak aktif</div>');
				redirect('auth/login');
			}
		} else {
			//jika user tidak ada
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email anda belum terdaftar, silahkan daftar terlebih dahulu!</div>');
			redirect('auth/login');
		}
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
			$this->load->view('templates/auth_header');
			$this->load->view('auth/vregistrasi');
			$this->load->view('templates/auth_footer');
		} else {
			//echo 'Data Berhasil Ditambahkan !';
			//$data = [
				//'userpen' => htmlspecialchars($this->input->post('userpen', true)),
				//'passpen' => password_hash($this->input->post('passpen'), PASSWORD_DEFAULT),
				//'namapen' => $this->input->post('namapen'),
				//'fotopen' => 'default.jpg',
				//'jkpen' => $this->input->post('jkpen'),
				//'pekerjaanpen' => $this->input->post('pekerjaanpen'),
				//'nopen' => $this->input->post('nopen'),
				//'alamatpen' => $this->input->post('alamatpen'),
				//'emailpen' => htmlspecialchars($this->input->post('emailpen', true)),
				//'nikpen' => $this->input->post('ktppen'),	
			//];
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
				'role_id' =>2
			
			);

			$this->db->insert('penyewa', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! your account has been created.Please Login!
          </div>');
			redirect('auth/login');
		}
	}
}

?>