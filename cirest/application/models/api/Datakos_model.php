<?php

class Datakos_model extends CI_Model
{
    public function index($id = null)
    {
        return $this->db->get_where('datakos', ['id_pemilik' => $id])->result_array();
    }

    public function getDetailKos($id_kos)
    {
        $query = "SELECT datakos.id_kos, datakos.namakos, datakos.alamatkos, datakos.khususkos, datakos.fasilitaskos,
        datakos.lingkungankos, datakos.peraturankos FROM datakos
        
        WHERE datakos.id_kos = '$id_kos'";

        return $this->db->query($query)->result_array();
    }

    public function insert($tabel, $arr)
    {
        $cek = $this->db->insert($tabel, $arr);
        return $cek;
    }
}
