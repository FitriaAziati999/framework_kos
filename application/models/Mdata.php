<?php

class Mdata extends CI_Model 
{
    // mengambil data login tertentu
  public function get_login($id){

    $this->db->where('id_pemilik',$id);
    $login = $this->db->get('datakos');
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

  public function update_datakos($id,$namakos,$alamatkos,$khususkos,$fasilitaskos,$lingkungankos,$peraturankos){

    if($id == '' || empty($namakos) || empty($alamatkos)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_pemilik"=>$id
      );

      $set = array(
        "namakos"=>$namakos,
        "alamatkos"=>$alamatkos,
        "khususkos"=>$khususkos,
        "fasilitaskos"=>$fasilitaskos,
        "lingkungankos"=>$lingkungankos,
        "peraturankos"=>$peraturankos,
      );

      $this->db->where($where);
      $update = $this->db->update("datakos",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data kos diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data kos gagal diubah.';
        return $response;
      }
    }

  }

  public function getDataTrans($id = null)
  {
    return $this->db->get_where('datakos',['id_kos'=>$id])->result_array();
  }

}

