<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Jenis extends CI_Model
{
    function get()
    {
        return $this->db->query("SELECT * FROM jenis_pelatihan as jp INNER JOIN bidang as b ON jp.id_bidang = b.id_bidang");
    }
    function insert($data)
    {
        return $this->db->insert('jenis_pelatihan', $data);
    }
    function update($id, $data)
    {
        $this->db->where('id_jenis', $id);
        return $this->db->update('jenis_pelatihan', $data);
    }
    function get_where($id)
    {
        return $this->db->query("SELECT * FROM jenis_pelatihan WHERE id_jenis = '$id'");
    }
}
