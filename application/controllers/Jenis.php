<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Jenis');
    }

    public function index()
    {
        $data['jenis'] = $this->Model_Jenis->get()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jenis/index', $data);
        $this->load->view('templates/footer');
    }
    function add()
    {
        $data['bidang'] = $this->db->get('bidang')->result_array();
        $this->form_validation->set_rules('jenis_pelatihan', 'Jenis Pelatihan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('jenis/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_bidang' => $this->input->post('bidang'),
                'pelatihan' => $this->input->post('jenis_pelatihan'),
            ];
            $this->Model_Jenis->insert($data);
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
