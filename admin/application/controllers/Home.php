<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        // $data['user'] = $this->db->get_where('admin', ['emailadmin' => $this -
        //     $this->session->userdata('emailadmin')])->row_array();
        $data['admin'] = $this->admin->getAdmin();
        // var_dump($data['admin']);
        // die;
        // var_dump($_SESSION);

        $this->load->view('Admin/dashboard', $data);
    }

    public function pemilik()
    {
        $data['pemilik'] = $this->admin->get_pemilik();
        $this->load->view('Admin/pemilik', $data);
    }

    public function penyewa()
    {
        $data['penyewa'] = $this->db->get('penyewa')->result_array();
        $this->load->view('Admin/penyewa', $data);
    }
    public function sewa()
    {
        $data['sewa'] = $this->db->get('sewa')->result_array();
        $this->load->view('Admin/sewa', $data);
    }

    public function updateStatus($id)
    {
        $this->admin->setStatus($id);
        redirect('home');
    }
    public function hapus($id)
    {
        $this->db->delete('pemilik', ['id_pemilik' => $id]);
        redirect('home/pemilik');
    }
    public function edit()
    {
        $id = $this->input->post('id_pemilik');
        $nama = $this->input->post('nama_pemilik');
        $alamat = $this->input->post('alamat_pemilik');
        $no = $this->input->post('no_pemilik');
        $nik = $this->input->post('nik_pemilik');

        $edit = [
            'namapem' => $nama,
            'alamatpem' => $alamat,
            'nopem' => $no,
            'nikpem' => $nik
        ];

        $this->db->where('id_pemilik', $id);
        $this->db->update('pemilik', $edit);

        redirect('home/pemilik');
    }
    public function hapus_penyewa($id)
    {
        $this->db->delete('penyewa', ['id_penyewa' => $id]);
        redirect('home/penyewa');
    }
    public function update_sewa($id)
    {
        $edit = [
            'status' => 'Terverifikasi'
        ];
        $this->db->where('id_sewa', $id);
        $this->db->update('sewa', $edit);

        redirect('home/sewa');
    }
}
