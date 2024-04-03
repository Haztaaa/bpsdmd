<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Sertifikat extends CI_Model
{
    function get_data($tahun, $jenis)
    {
        // Select columns from both tables
        $this->db->select('d.*, jp.*');
        $this->db->from('data as d');
        $this->db->join('jenis_pelatihan as jp', 'd.id_jenis = jp.id_jenis');
        if (!empty($tahun)) {
            $this->db->where('d.tahun_pelatihan', $tahun);
        }
        if (!empty($jenis)) {
            $this->db->where('d.id_jenis', $jenis);
        }
        // Execute the query and return results
        return  $this->db->get();
    }

    function get_no_serti($search)
    {
        $this->db->select('no_sertifikat'); // Hanya memilih kolom no_sertifikat
        $this->db->from('data');
        $this->db->like('no_sertifikat', $search);
        $results = $this->db->get()->result_array();
        return $results;
    }
    function insert_data($data)
    {
        return $this->db->insert('data', $data);
    }
    function filtered_pelatihan($id)
    {
        return $this->db->query("SELECT d.*,jp.* FROM data as d JOIN jenis_pelatihan as jp ON d.id_jenis = jp.id_jenis WHERE d.id_jenis = '$id'");
    }
    function update($id, $data)
    {
        $this->db->where('id_data', $id);
        return $this->db->update('data', $data);
    }
    function import($data)
    {
        return $this->db->insert_batch('data', $data);
    }
    function export()
    {
        return $this->db->query("SELECT * FROM data AS d JOIN jenis_pelatihan AS jp ON d.id_jenis = jp.id_jenis")->result_array();
    }
}
