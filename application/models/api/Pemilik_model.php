<?php 
 
class Pemilik_model extends CI_Model {
    protected $akun_pemilik = 'pemilik';

    public function insert($tabel, $arr)
    {
        $cek = $this->db->insert($tabel, $arr);
        return $cek;
        
    }

    public function akun_login($emailpem, $passpem) 
    {
        $this->db->where('emailpem', $emailpem);
        $q = $this->db->get($this->akun_pemilik);

        if($q->num_rows()) {
            $akun_pass = $q->row('passpem');
            if($passpem === $akun_pass){
                return $q->row();
            }
            return FALSE;
        } else {
            return FALSE;
        }
    }
    public function getPemilik()
    {
        {
            return $this->db->get('pemilik', ['id_pemilik' => $id])->result_array();
        }
        
    }

    public function updatePemilik($data, $id)
    {
        $this->db->update('pemilik', $data, ['id_pemilik' => $id]);
        return $this->db->affected_rows();
    }

    public function index($id=null)
    {
        return $this->db->get_where('pemilik' , ['id_pemilik' => $id])->result_array();   
    }

}