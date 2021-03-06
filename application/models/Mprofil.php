<?php

class Mprofil extends CI_Model 
{
    // mengambil data login tertentu
  public function get_login($id){

    $this->db->where('id_pemilik',$id);
    $login = $this->db->get('pemilik');
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

  public function update_profil($id,$namapem,$emailpem,$alamatpem,$nopem,$userpem,$nikpem,$passpem){

    if($id == '' || empty($namapem) || empty($emailpem)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_pemilik"=>$id
      );

      $set = array(
        "namapem"=>$namapem,
        "emailpem"=>$emailpem,
        "alamatpem"=>$alamatpem,
        "userpem"=>$userpem,
        "nopem"=>$nopem,
        "nikpem"=>$nikpem,
        "passpem"=>$passpem
      );

      $this->db->where($where);
      $update = $this->db->update("pemilik",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data profil diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data profil gagal diubah.';
        return $response;
      }
    }

  }
}

