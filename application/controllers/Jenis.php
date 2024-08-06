<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_Jenis');
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $data['jenis'] = $this->Model_Jenis->get()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('jenis/index', $data);
        $this->load->view('templates/footer', $data);
    }
    function add()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        if ($this->session->userdata('level') == 1) {
            $data['bidang'] = $this->db->get('bidang')->result_array();
        }
        if ($this->session->userdata('level') == 2) {
            $data['bidang'] = $this->db->get_where('bidang', ['id_bidang' => 1])->result_array();
        }
        if ($this->session->userdata('level') == 3) {
            $data['bidang'] = $this->db->get_where('bidang', ['id_bidang' => 2])->result_array();
        }
        if ($this->session->userdata('level') == 4) {
            $data['bidang'] = $this->db->get_where('bidang', ['id_bidang' => 3])->result_array();
        }
        $this->form_validation->set_rules('jenis_pelatihan', 'Jenis Pelatihan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('jenis/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id_bidang' => $this->input->post('bidang'),
                'pelatihan' => $this->input->post('jenis_pelatihan'),
            ];
            $this->Model_Jenis->insert($data);
            $who = $this->session->userdata('nama');
            $notif = array(
                'title' => 'Mengubah Data Jenis Pelatihan',
                'message' => 'Akun ' . $who . ' Menambah Data Jenis Pelatihan '
            );
            $this->db->insert('notifications', $notif);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tambah Data Pelatihan Berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('jenis');
        }
    }
    function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        if ($this->session->userdata('level') == 1) {
            $data['bidang'] = $this->db->get('bidang')->result_array();
        }
        if ($this->session->userdata('level') == 2) {
            $data['bidang'] = $this->db->get_where('bidang', ['id_bidang' => 1])->result_array();
        }
        if ($this->session->userdata('level') == 3) {
            $data['bidang'] = $this->db->get_where('bidang', ['id_bidang' => 2])->result_array();
        }
        if ($this->session->userdata('level') == 4) {
            $data['bidang'] = $this->db->get_where('bidang', ['id_bidang' => 3])->result_array();
        }
        $data['val'] = $this->db->get_where('jenis_pelatihan', ['id_jenis' => $id])->row_array();
        $this->form_validation->set_rules('jenis_pelatihan', 'Jenis Pelatihan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('jenis/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id_bidang' => $this->input->post('bidang'),
                'pelatihan' => $this->input->post('jenis_pelatihan'),
            ];

            $this->Model_Jenis->update($id, $data);
            $who = $this->session->userdata('nama');
            $notif = array(
                'title' => 'Mengubah Data Jenis Pelatihan',
                'message' => 'Akun ' . $who . ' Mengubah Data Jenis Pelatihan '
            );
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tambah Data Pelatihan Berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('jenis');
        }
    }
}
