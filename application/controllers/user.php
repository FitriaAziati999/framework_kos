<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
public function dashboard()
{   
   $dtitle['title']='KosKita-My profil';
   
   //$result['penyewa']= $this->db->get_where('penyewa',['emailpen'=> $this->session->userdata('emailpen')])->row_array();
   //echo' selamat datang'; 
   $this->load->view('templatesuser/vuser',$dtitle);
}


}

