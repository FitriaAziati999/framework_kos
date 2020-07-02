<?php 
 
class Login extends CI_Model {
    protected $akun_mhs = 'user';

    public function akun_login($NIM, $PASSWORD_MHS) 
    {
        $this->db->where('NIM', $NIM);
        $q = $this->db->get($this->akun_mhs);

        if($q->num_rows()) {
            $akun_pass = $q->row('PASSWORD_MHS');
            if(md5 ($PASSWORD_MHS) === $akun_pass) {
                return $q->row();
            }
            return FALSE;
        } else {
            return FALSE;
        }
    }

    public function getDosen() {
        return $this->db->get('dosen')->result_array();
    }

}