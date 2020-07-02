<?php

class Admin_model extends CI_Model
{
    function getAdmin()
    {
        return $this->db->get('admin')->result_array();
    }

    public function setStatus($id)
    {
        $rs =  $this->db->get_where('admin', ['id_admin' => $id])->row_array();
        if ($rs['is_activate'] == 0) {
            # code...
            $this->db->where('id_admin', $id);
            $this->db->update('admin', ['is_activate' => 1]);
        } else {
            $this->db->where('id_admin', $id);
            $this->db->update('admin', ['is_activate' => 0]);
        }
    }
    public function get_pemilik()
    {
        return $this->db->get('pemilik')->result_array();
    }
}
