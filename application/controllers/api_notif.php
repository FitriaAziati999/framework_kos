<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Api_notif extends CI_Controller
{
	
	
		public function __construct()

		{
			parent::__construct();
			$this->load->model('api_model', 'api_notif');

		}
		

		public function sewa()

		{

			$method = $_SERVER['REQUEST_METHOD'];

			$response = [];

			if ($method == "GET") {

				
				$id = $this->input->get('id_pemilik');
				if ($id == null) {

					$fetchAll = $this->api_notif->getAllSewa();

					foreach ($fetchAll as $fetch) {
						$get = [

							'id_pemilik' => $fetch['id_pemilik'],
							'nama_penyewa' => $fetch['namapen'],
							'alamat_penyewa' => $fetch['alamatpen'],
							'nama_kos' => $fetch['namakos'],
							'harga_sewa' => $fetch['harga']

						];
						
						array_push($response, $get);
					}

				} else {

					$fetchIdCat = $this->api_notif->getIdCat($id);

					$fetch = $fetchIdCat->row_array();

					if ($fetchIdCat->num_rows() > 0) {


						$get = [

							'id_pemilik' => $fetch['id_pemilik'],
							'nama_penyewa' => $fetch['namapen'],
							'alamat_penyewa' => $fetch['alamatpen'],
							'nama_kos' => $fetch['namakos'],
							'harga_sewa' => $fetch['harga']

						];

		
					} else {

							$get = [

							'id_pemilik' => null,

							];
					

					}


					array_push($response, $get);
				}

				echo header("Content-Type: application/json");
				echo json_encode($response);
			}
		}
	
}
