<?php if (!defined('BASEPATH')) exit('no direct script access allowed');

class Mhome extends Ci_Model{
public function innerjoin(){
    $this->db->select('*');
    $this->db->from('datakos');
    $this->db->join('tipekamar','datakos.id_kos = tipekamar.id_kos');
    $query= $this->db->get();
    return $query->result();
}
}

?>