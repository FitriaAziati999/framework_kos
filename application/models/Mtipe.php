<?php

class Mtipe extends CI_Model 
{
    // mengambil data login tertentu
  public function get_login($id){

    $this->db->where('id_kos',$id);
    $login = $this->db->get('tipekamar');
    $response['status']=200;
    $response['error']=false;
    $response['data']=$login->result();
    $response['message']='success';
    return $response;

  }
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  public function update_datakos($id,$ukuran,$stok,$harga,$penghuni,$fasilitaskamar,$fotokamar){

    if($id == '' || empty($ukuran) || empty($stok)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_kos"=>$id
      );

      $set = array(
        "ukuran"=>$ukuran,
        "stok"=>$stok,
        "harga"=>$harga,
        "penghuni"=>$penghuni,
        "fasilitaskamar"=>$fasilitaskamar,
        "fotokamar"=>$fotokamar,
      );

      $this->db->where($where);
      $update = $this->db->update("tipekamar",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data kamar diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data kamar gagal diubah.';
        return $response;
      }
    }

  }
}

