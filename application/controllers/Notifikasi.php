<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_Notifikasi');
        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }
    }
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $data['notif'] = $this->db->get('notifications')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('notifikasi/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function getLimitedNotifications()
    {
        $notifications = $this->Model_Notifikasi->getNotifications();
        echo json_encode($notifications);
    }
    public function removeNotification()
    {
        $notificationId = $this->input->post('id');

        // Panggil model untuk menghapus notifikasi berdasarkan ID
        $this->Model_Notifikasi->removeNotification($notificationId);

        echo "success";
    }
    public function getTotalNotificationCount()
    {

        $notifications = $this->Model_Notifikasi->getTotalNotificationCount();
        echo json_encode($notifications);
    }
    public function hapus()
    {
        $id = $this->input->post('hapus');

        $this->db->where('id', $id);
        $this->db->delete('notifications');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Hapus data notifikasi berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
        redirect('notifikasi');
    }
    public function get($id)
    {
        $data = $this->db->get_where('notifications', ['id' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
