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
    public function lupapwd()
    {
        $emailpen=set_value('emailpen');
        $nopen=set_value('nopen');
        $result= $this->db
                    ->where('emailpen',$emailpen)
                    ->where('nopen',$nopen)
                    ->limit(1)
                    ->get_where('penyewa');
        if($result->num_rows()> 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }

    public function tampilprofil($table)
    {
    ; 
        $this->db->get($table);
    }
    public function gantipwd ($where,$data,$table)
    {
        $this->db->where($where); 
        $this->db->update($table,$data);
    }
    
    public function editprofil ($where,$table,$data)
    {
        $this->db->where($where); 
        $this->db->update($table,$data);
        
    }

}?>