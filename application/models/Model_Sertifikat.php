<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Sertifikat extends CI_Model
{
    function get_data($tahun, $jenis, $bidang)
    {
        if ($this->session->userdata('level') == 2) {
            $this->db->select('d.*, jp.*, b.*');
            $this->db->from('data as d');
            $this->db->join('jenis_pelatihan as jp', 'd.id_jenis = jp.id_jenis');
            $this->db->join('bidang as b', 'b.id_bidang = jp.id_bidang');
            $this->db->where('jp.id_bidang', 1);
        }
        if ($this->session->userdata('level') == 3) {
            $this->db->select('d.*, jp.*, b.*');
            $this->db->from('data as d');
            $this->db->join('jenis_pelatihan as jp', 'd.id_jenis = jp.id_jenis');
            $this->db->join('bidang as b', 'b.id_bidang = jp.id_bidang');
            $this->db->where('jp.id_bidang', 2);
        }
        if ($this->session->userdata('level') == 4) {
            $this->db->select('d.*, jp.*, b.*');
            $this->db->from('data as d');
            $this->db->join('jenis_pelatihan as jp', 'd.id_jenis = jp.id_jenis');
            $this->db->join('bidang as b', 'b.id_bidang = jp.id_bidang');
            $this->db->where('jp.id_bidang', 3);
        }
        if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) {
            $this->db->select('d.*, jp.*, b.*');
            $this->db->from('data as d');
            $this->db->join('jenis_pelatihan as jp', 'd.id_jenis = jp.id_jenis');
            $this->db->join('bidang as b', 'b.id_bidang = jp.id_bidang');
        }
        if (!empty($tahun)) {
            $this->db->where('d.tahun_pelatihan', $tahun);
        }
        if (!empty($jenis)) {
            $this->db->where('d.id_jenis', $jenis);
        }
        if (!empty($bidang)) {
            $this->db->where('jp.id_bidang', $bidang);
        }
        // Execute the query and return results
        return $this->db->get();
    }

    function get_serti($q)
    {
        $this->db->select('d.*, jp.*, b.*');
        $this->db->from('data as d');
        $this->db->join('jenis_pelatihan as jp', 'd.id_jenis = jp.id_jenis');
        $this->db->join('bidang as b', 'b.id_bidang = jp.id_bidang');
        $this->db->where('d.nip', $q); // Menambahkan klausa WHERE untuk mencari nip

        return $this->db->get();
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
