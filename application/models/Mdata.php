<?php

class Mdata extends CI_Model {
    
    // response jika field ada yang kosong
    public function empty_response(){
      $response['status']=502;
      $response['error']=true;
      $response['message']='Field tidak boleh kosong';
      return $response;
    }
  
    // function untuk insert data ke tabel datakos
    public function add_datakos ($namakos,$alamatkos,$khususkos,$fasilitaskos,$lingkungankos,$peraturankos){
  
      if(empty($namakos) || empty($alamatkos) || empty($khususkos) || empty($fasilitaskos) || empty($lingkungankos) || empty($peraturankos)   ){
        return $this->empty_response();
      }else{
        $data = array(
          "namakos"=>$namakos,
          "alamatkos"=>$alamatkos,
          "khususkos"=>$khususkos,
          "fasilitaskos"=>$fasilitaskos,
          "lingkungankos"=>$lingkungankos,
          "peraturankos"=>$peraturankos,

        );
  
        $insert = $this->db->insert("datakos", $data);
  
        if($insert){
          $response['status']=200;
          $response['error']=false;
          $response['message']='Data Kos berhasil ditambahkan.';
          return $response;
        }else{
          $response['status']=502;
          $response['error']=true;
          $response['message']='Data Kos gagal ditambahkan.';
          return $response;
        }
      }
  
    }
  
    // mengambil semua data mhs
    public function all_datakos(){
  
      $all = $this->db->get("datakos")->result();
      $response['status']=200;
      $response['error']=false;
      $response['mhs']=$all;
      return $response;
  
    }
  
    // mengambil data mhs tertentu
    public function get_datakos_by_id($id){
  
      $mhs = $this->db->get_where('datakos', array('id_kos' => $id))->result();
      $response['status']=200;
      $response['error']=false;
      $response['mhs']=$mhs;
      return $response;
  
    }
  
    // hapus data mhs
    public function delete_datakos($id){
  
      if($id == ''){
        return $this->empty_response();
      }else{
        $where = array(
          "id_kos"=>$id
        );
  
        $this->db->where($where);
        $delete = $this->db->delete("datakos");
        if($delete){
          $response['status']=200;
          $response['error']=false;
          $response['message']='Data kos berhasil dihapus.';
          return $response;
        }else{
          $response['status']=502;
          $response['error']=true;
          $response['message']='Data kos gagal dihapus.';
          return $response;
        }
      }
  
    }
  
    // update mhs
    public function update_datakos($id_kos,$id_pemilik,$namakos,$alamatkos,$khususkos,$fasilitaskos,$lingkungankos,$peraturankos){
  
      if($id_kos == '' ||$id_pemilik == '' || empty($namakos) || empty($alamatkos) || empty($khususkos) || empty($fasilitaskos) || empty($lingkungankos) || empty($peraturankos)  ){
        return $this->empty_response();
      }else{
        $where = array(
          "id_kos"=>$id_kos, "id_pemilik"=>$id_pemilik
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
          $response['message']='Data kos berhasil diubah.';
          return $response;
        }else{
          $response['status']=502;
          $response['error']=true;
          $response['message']='Data kos gagal diubah.';
          return $response;
        }
      }
  
    }
  
  ?>