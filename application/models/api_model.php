<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Api_model extends CI_Controller

{

	function getAllNotifikasi()
	{
		return $this->db->get('sewa')->result_array();
	}
}

?>