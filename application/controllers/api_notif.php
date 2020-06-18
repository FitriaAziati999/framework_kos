<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Api_notif extends CI_Controller
{
	
	
	
		public function __construct()

		{
			parent::__construct();
			$this->load->model('api_model', 'api_notif');

		}

		public function notifikasi()

		{

			$method = $_SERVER['REQUEST_METHOD'];

			$response = [];

			if ($method == "GET") {
				$id = $this->input->get('id');
				if ($id == null) {

					$fetchAll = $this->api->getAllnotifikasi();

					var_dump($fetchAll);
					die;

					foreach ($fetchAll as $fetch) {
						$get = [

							'id' -> $fetch['id_pemilik'],
							'alamat' -> $fetch['alamatpen'],
							'nama' -> $fetch['namapen'],
							'kos' -> $fetch['namakos'],
							'harga' -> $fetch['harga']

						];

						array_push($response, $get);
					}
				}
			}
		}
	
}
?>