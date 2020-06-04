<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
public function dashboard()
{   
   $dtitle['title']='KosKita-Admin';
   
   //$result['penyewa']= $this->db->get_where('penyewa',['emailpen'=> $this->session->userdata('emailpen')])->row_array();
   //echo' selamat datang'; 
   $this->load->view('templatesadmin/vadmin',$dtitle);
}


}

