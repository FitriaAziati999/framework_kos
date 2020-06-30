<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Api_logn extends CI_Controller

{
    
         function __construct()


        {

            parent::__construct();
            $this->load->database();

        }

        public function sign_In() {


        	$response = [];
        	if ($_SERVER['REQUEST_METHOD'] == "POST") {
        		$d = $_POST;
        		
        		try {

        			if ($d) {
        				$a = $this->db->get_where("pemilik", ['emailpem' => $d['emailpem']])->result_array();

        				if (count($a) < 1) {

                            echo
        					  "Login gagal, Email salah! Silahkan cek email anda kembali";

        				} else {

                            $a = $a[0];

        					if($d['passpem'] != $a['passpem']) {

        						echo "Login gagal, Password salah! Silahkan cek password anda kembali";

        					}else {
                                echo json_encode($a);
        						

        					       }
        					}
        				}
        			}

                     catch(Exception $e) {
            echo "Kesalahan"; 
        }
    }else {
        echo "Method Not Allowed";
    
    
        }
   
        		}

        	}


            

        