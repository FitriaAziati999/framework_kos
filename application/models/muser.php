<?php if (!defined('BASEPATH')) exit('no direct script access allowed');

class Muser extends Ci_Model{

    public function cek_login()
    {
        $emailpen=set_value('emailpen');
        $passpen=set_value('passpen');
        $result= $this->db
                    ->where('emailpen',$emailpen)
                    ->where('passpen',md5($passpen))
                    ->limit(1)
                    ->get_where('penyewa');
        if($result->num_rows()> 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }



}?>