<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Bidang extends CI_Model
{
    function get()
    {
        return $this->db->query("SELECT * FROM bidang");
    }
    function insert($data)
    {
        return $this->db->insert('bidang', $data);
    }
    function update($id, $data)
    {

        $this->db->where('id_bidang', $id);
        return $this->db->update('bidang', $data);
    }
    function get_where($id)
    {
        return $this->db->query("SELECT * FROM bidang WHERE id_bidang = '$id'");
    }
}
