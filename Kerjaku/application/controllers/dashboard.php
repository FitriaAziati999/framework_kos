<?php

/**
 * 
 */
class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_dashboard');
		// is_logged_in();
	}
	public function index()
	{
		$data['title'] = "Home Page";
		$data['kos'] = $this->m_dashboard->select_by_user();

		$this->load->view('templates/header', $data);
		$this->load->view('penyewa/index', $data);
		$this->load->view('templates/footer');
	}
}


//class Dashboard extends CI_Controller
//{

//	public function __construct()
//	{
//		parent::__construct();
//		$this->load->model('m_dashboard');
//
//	}
//	public function search_keyword()
//	{
//		$keyword = $this->input->post('keyword');
//		$data['result'] = $this->m_dashboard->search($keyword);

//		$this->load->view('templates/header', $data);
//		$this->load->view('penyewa/index', $data);
//		$this->load->view('templates/footer'); -->
//	}
//}