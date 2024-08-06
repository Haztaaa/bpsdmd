<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_Dashboard');
    }

    public function index()
    {
        $data['total_pelatihan'] = $this->db->get('jenis_pelatihan')->num_rows();
        $data['total_sertifikat'] = $this->db->get('data')->num_rows();
        $data['total_bidang'] = $this->db->get('bidang')->num_rows();
        $data['x_axis_categories'] = $this->db->get('bidang')->result_array();
        $data['chart_data'] = $this->db->query("
        SELECT b.nama_bidang, jp.*, COUNT(d.id_data) AS total_peserta
        FROM jenis_pelatihan jp
        LEFT JOIN data d ON jp.id_jenis = d.id_jenis
        LEFT JOIN bidang b ON jp.id_bidang = b.id_bidang
        GROUP BY b.nama_bidang, jp.pelatihan
         ")->result();

        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function pengaturan()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $id_user = $this->input->post('id_user');
        $level = $this->session->userdata('level');
        $this->form_validation->set_rules('nama', 'Nama', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/pengaturan', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $level = $this->session->userdata('level');
            $id_user = $this->session->userdata('id_user'); // Ambil id_user dari sesi

            $data_user = array(
                'nama' => $this->input->post('nama')
            );

            $this->Model_Dashboard->update_user($id_user, $data_user);



            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Mengubah Data Diri!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('dashboard/pengaturan');
        }
    }
    public function username()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->form_validation->set_rules('username_lama', 'Username Lama', 'required|callback_check_username_lama');
        $this->form_validation->set_rules('username_baru', 'Username Baru', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('konfirmasi_username', 'Konfirmasi Username Baru', 'required|matches[username_baru]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/username', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_user = $this->input->post('id_user');
            $username_lama = $this->input->post('username_lama');
            $username_baru = $this->input->post('username_baru');

            // Periksa apakah username lama sesuai dengan yang ada di database
            $user = $this->Model_Dashboard->get_user_by_id_and_username($id_user, $username_lama);
            if ($user) {
                // Jika username lama sesuai, simpan username baru ke database
                $data = array(
                    'username' => $username_baru
                );
                $this->Model_Dashboard->update_user($id_user, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Berhasil Mengubah Username!
                       <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </a>
                   </div>');
                redirect('dashboard/username');
            } else {
                // Tampilkan pesan kesalahan jika username lama tidak sesuai
                $this->load->view('form_view', array('username_lama_error' => 'Username lama tidak sesuai dengan yang ada di database.'));
            }
        }
    }
    public function check_username_lama($username_lama)
    {
        $id_user = $this->input->post('id_user');
        $user = $this->Model_Dashboard->get_user_by_id_and_username($id_user, $username_lama);
        if ($user) {
            return true; // Username lama sesuai
        } else {
            $this->form_validation->set_message('check_username_lama', 'Username lama tidak sesuai!');
            return false; // Username lama tidak sesuai
        }
    }
    public function password()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/password', $data);
            $this->load->view('templates/footer', $data);
        } else {


            // Periksa apakah username lama sesuai dengan yang ada di database
            $id_user = $this->input->post('id_user');
            $password_baru = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);

            // Update password baru dalam database
            $data = array(
                'password' => $password_baru
            );
            $this->Model_Dashboard->update_user($id_user, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Mengubah Password!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('dashboard/password');
        }
    }
    function cetak()
    {
        $this->load->view('dashboard/cetak');
    }
}
