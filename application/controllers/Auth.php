<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('captcha');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $captcha = $this->create_captcha(); // Panggil fungsi untuk membuat CAPTCHA
            if ($captcha) {
                $data['captcha'] = $captcha;
            } else {
                $data['captcha'] = ['image_src' => '', 'word' => ''];
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed to generate captcha. Please try again later.</div>');
            }

            $this->load->view('auth/index', $data); // Kirim data ke view
        } else {
            $this->login();
        }
    }

    public function create_captcha()
    {
        $options = array(
            'word'          => '', // Biarkan kosong untuk menghasilkan kata acak
            'img_path'      => './captcha/', // Path untuk menyimpan gambar
            'img_url'       => base_url() . 'captcha/', // URL untuk mengakses gambar
            'img_width'     => 150, // Lebar gambar
            'img_height'    => 50, // Tinggi gambar
            'expiration'    => 7200, // Waktu kedaluwarsa dalam detik
            'word_length'   => 6, // Panjang kata acak
            'font_size'     => 16, // Ukuran font
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(0, 0, 0),
                'text' => array(0, 0, 0),
                'grid' => array(255, 240, 240)
            )
        );

        $captcha = create_captcha($options);

        if (!$captcha) {
            log_message('error', 'Failed to create captcha: ' . print_r($options, true));
        } else {
            log_message('info', 'CAPTCHA created successfully: ' . print_r($captcha, true));
            $this->session->set_userdata('captchaWord', $captcha['word']);
        }

        return $captcha;
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $captcha_input = $this->input->post('captcha');

        $captcha_word = $this->session->userdata('captchaWord');

        if ($captcha_input === $captcha_word) {
            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if ($user) {
                // Gunakan password_verify() untuk memeriksa apakah kata sandi cocok
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'level' => $user['level']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['level'] == 1) {
                        redirect('dashboard');
                    } else {
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Nama Pengguna Atau Password Salah!
               </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Nama Pengguna Atau Password Salah!
            </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Captcha does not match.
        </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Keluar Aplikasi Berhasil!
           
        </div>');
        redirect('auth');
    }
}
