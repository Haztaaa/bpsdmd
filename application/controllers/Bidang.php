<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_Bidang');
    }

    public function index()
    {
        $data['bidang'] = $this->Model_Bidang->get()->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('bidang/index', $data);
        $this->load->view('templates/footer');
    }
    function add()
    {
        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('bidang/add');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_bidang' => $this->input->post('nama_bidang')
            ];

            $this->Model_Bidang->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tambah Data Bidang Berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('bidang');
        }
    }

    function edit($id)
    {

        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');
        if ($this->form_validation->run() == false) {
            $data['val'] = $this->Model_Bidang->get_where($id)->row_array();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('bidang/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_bidang' => $this->input->post('nama_bidang')
            ];

            $this->Model_Bidang->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Ubah Data Bidang Berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('bidang');
        }
    }
    public function delete()
    {
        $id = $this->input->post('hapus');

        $this->db->where('id_bidang', $id);
        $this->db->delete('bidang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Hapus data  bidang berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
        redirect('bidang');
    }
    public function get($id)
    {
        $data = $this->db->get_where('bidang', ['id_bidang' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
    public function get_pelatihan($id)
    {
        $data = $this->db->get_where('jenis_pelatihan', ['id_bidang' => $id])->result();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
