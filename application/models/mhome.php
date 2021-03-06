<?php if (!defined('BASEPATH')) exit('no direct script access allowed');

class Mhome extends Ci_Model{
public function innerjoin(){
    $this->db->select('*');
    $this->db->from('datakos');
    $this->db->join('tipekamar','datakos.id_kos = tipekamar.id_kos');
    $query= $this->db->get();
    return $query->result();
}
//function pencarian
public function get_keyword($keyword){
    $this->db->select('*');
    $this->db->from('datakos');
    $this->db->join('tipekamar','datakos.id_kos = tipekamar.id_kos');
    $this->db->like('namakos', $keyword);
    $this->db->or_like('alamatkos', $keyword);
    $this->db->or_like('harga', $keyword);
    $this->db->or_like('khususkos', $keyword);
    return $this->db->get()->result();
}
public function get_harga_terendah($keyword1,$keyword2){
    $this->db->from('datakos');
    $this->db->join('tipekamar','datakos.id_kos = tipekamar.id_kos');
    $this->db->order_by('harga', 'DESC');
    $this->db->where('harga >=', $keyword1);
    $this->db->where('harga <=', $keyword2);

    return $this->db->get()->result();
}

public function get_harga_tertinggi($keyword1,$keyword2){
    $this->db->from('datakos');
    $this->db->join('tipekamar','datakos.id_kos = tipekamar.id_kos');
    $this->db->order_by('harga', 'DESC');
    $this->db->where('harga >=', $keyword1);
    $this->db->where('harga <=', $keyword2);

    return $this->db->get()->result();
}
//ambil id untuk menampilkan detailkos
public function ambil_id($id, $id_kamar){
    $hasil = $this->db->select('*');
    $hasil = $this->db->from('datakos');
    $hasil = $this->db->join('tipekamar','datakos.id_kos = tipekamar.id_kos', 'left');
    $hasil = $this->db->join('pemilik', 'datakos.id_pemilik = pemilik.id_pemilik');
    $hasil = $this->db->where('tipekamar.id_kos', $id );
    $hasil = $this->db->where('tipekamar.id_kamar', $id_kamar );
    $hasil = $this->db->limit('1');
    $query= $this->db->get();
    return $query->result_array();
}

public function tampil_sewa($id, $id_k)
    {
        $hasil = $this->db->select('*');
        $hasil = $this->db->from('datakos');
        $hasil = $this->db->join('tipekamar','datakos.id_kos = tipekamar.id_kos','left');
        $hasil = $this->db->join('pemilik', 'datakos.id_pemilik = pemilik.id_pemilik');
        $hasil = $this->db->where('tipekamar.id_kos', $id );
        $hasil = $this->db->where('tipekamar.id_kamar', $id_k );
        $hasil = $this->db->limit('1');
        $query= $this->db->get();
        return $query->result_array();
    }
//insert data transaksi ke tabel sewa
public function insert_data( $data,$table)
    {
        
        $this->db->insert('sewa',$data);
        
    }
//mencari  id data kos dan id barang  untuk dimasukkan  ke tabel wishlist
public function insert_kosfav( $data,$table)
    {
        
        $this->db->insert('wishlist',$data);
        
    }

}

?>