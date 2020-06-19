<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class Api_model extends CI_Model

{

	function getAllSewa()
	{
		return $this->db->get('sewa')->result_array();
	}
}

