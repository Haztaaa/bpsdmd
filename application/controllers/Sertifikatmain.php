<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikatmain extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_Sertifikat');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $tahun = $this->input->GET('tahun_pelatihan');
        $jenis = $this->input->GET('jenis_pelatihan');
        $bidang = $this->input->GET('bidang');
        $data['serti'] = $this->Model_Sertifikat->get_data($tahun, $jenis, $bidang)->result_array();
        if ($this->session->userdata('level') == 2) {
            $data['jenis_pelatihan'] = $this->db->query("SELECT * FROM jenis_pelatihan WHERE id_bidang ='1'")->result_array();
        }
        if ($this->session->userdata('level') == 3) {
            $data['jenis_pelatihan'] = $this->db->query("SELECT * FROM jenis_pelatihan WHERE id_bidang ='2'")->result_array();
        }
        if ($this->session->userdata('level') == 4) {
            $data['jenis_pelatihan'] = $this->db->query("SELECT * FROM jenis_pelatihan WHERE id_bidang ='3'")->result_array();
        }
        if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) {
            $data['jenis_pelatihan'] = $this->db->query("SELECT * FROM jenis_pelatihan ")->result_array();
        }
        $data['bidang'] = $this->db->query("SELECT * FROM bidang")->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sertifikatmain/index', $data);
        $this->load->view('templates/footer', $data);
    }

    function add()
    {
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('no_sertifikat', 'No Sertifikat', 'required');
        $this->form_validation->set_rules('tahun_pelatihan', 'Tahun Pelatihan', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');

        if ($this->form_validation->run() == false) {
            $data['jenis_pelatihan'] = $this->db->get('jenis_pelatihan')->result_array();
            $data['user'] = $this->db->get_where('user', ['id_user' =>
            $this->session->userdata('id_user')])->row_array();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('sertifikatmain/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // Ambil data dari formulir
            $no_sertifikat = $this->input->post('no_sertifikat');
            $jenis = $this->input->post('jenis');
            $tahun_pelatihan = $this->input->post('tahun_pelatihan');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $nip = $this->input->post('nip');
            $ttl = $this->input->post('ttl');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $no_hp = $this->input->post('no_hp');
            $pangkat = $this->input->post('pangkat');
            $jabatan = $this->input->post('jabatan');
            $nama_instansi = $this->input->post('nama_instansi');

            // Masukkan data ke dalam database
            $data = array(
                'no_sertifikat' => $no_sertifikat,
                'id_jenis' => $jenis,
                'tahun_pelatihan' => $tahun_pelatihan,
                'nama_lengkap' => $nama_lengkap,
                'nip' => $nip,
                'ttl' => $ttl,
                'jenis_kelamin' => $jenis_kelamin,
                'no_hp' => $no_hp,
                'pangkat' => $pangkat,
                'jabatan' => $jabatan,
                'nama_instansi' => $nama_instansi,

            );
            // Panggil model untuk menyimpan data
            $this->Model_Sertifikat->insert_data($data);
            $who = $this->session->userdata('nama');
            $notif = array(
                'title' => 'Menambah Data Peserta',
                'message' => 'Akun ' . $who . ' Menambah Data Peserta Nama:  ' . $nama_lengkap . '!'
            );
            $this->db->insert('notifications', $notif);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tambah Data Peserta Berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('sertifikatmain');
        }
    }
    function edit($id)
    {
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
        $data['jenis_pelatihan'] = $this->db->query("SELECT * FROM jenis_pelatihan ")->result_array();
        $this->form_validation->set_rules('no_sertifikat', 'No Sertifikat', 'required');
        $this->form_validation->set_rules('tahun_pelatihan', 'Tahun Pelatihan', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');

        $this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');

        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');


        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['id_user' =>
            $this->session->userdata('id_user')])->row_array();
            $data['data'] = $this->db->query("SELECT * FROM data WHERE id_data = '$id'")->row_array();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('sertifikatmain/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $no_sertifikat = $this->input->post('no_sertifikat');
            $jenis = $this->input->post('jenis');
            $tahun_pelatihan = $this->input->post('tahun_pelatihan');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $nip = $this->input->post('nip');
            $ttl = $this->input->post('ttl');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $no_hp = $this->input->post('no_hp');
            $pangkat = $this->input->post('pangkat');
            $jabatan = $this->input->post('jabatan');
            $nama_instansi = $this->input->post('nama_instansi');


            $data = array(
                'no_sertifikat' => $no_sertifikat,
                'id_jenis' => $jenis,
                'tahun_pelatihan' => $tahun_pelatihan,
                'nama_lengkap' => $nama_lengkap,
                'nip' => $nip,
                'ttl' => $ttl,
                'jenis_kelamin' => $jenis_kelamin,
                'no_hp' => $no_hp,
                'pangkat' => $pangkat,
                'jabatan' => $jabatan,
                'nama_instansi' => $nama_instansi,


            );
            $this->Model_Sertifikat->update($id, $data);

            $who = $this->session->userdata('nama');
            $notif = array(
                'title' => 'Mengubah Data Peserta',
                'message' => 'Akun ' . $who . ' Mengubah Data Peserta Nama:  ' . $nama_lengkap . '!'
            );
            $this->db->insert('notifications', $notif);


            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Ubah Data Peserta Berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('sertifikatmain');
        }
    }
    function detail($id)
    {
        $data['val'] = $this->db->query("SELECT * FROM data as d JOIN jenis_pelatihan as jp ON d.id_jenis=jp.id_jenis WHERE id_data = '$id'")->row_array();
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sertifikatmain/detail', $data);
        $this->load->view('templates/footer', $data);
    }
    function detailPelatihan($id)
    {
        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $data['serti'] = $this->Model_Sertifikat->filtered_pelatihan($id)->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sertifikatmain/pelatihan', $data);
        $this->load->view('templates/footer', $data);
    }
    function getData()
    {
        $search = $this->input->post('search');
        $result = $this->Model_Sertifikat->get_no_serti($search);
        echo json_encode($result);
    }

    public function view_pdf($filename)
    {
        // Path menuju file PDF
        $pdf_path = FCPATH . 'assets/uploads/' . $filename;

        // Periksa apakah file PDF ada
        if (file_exists($pdf_path)) {
            // Set header untuk menampilkan file di browser
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($pdf_path));

            // Baca dan keluarkan isi file PDF
            readfile($pdf_path);
        } else {
            // Jika file tidak ditemukan, tampilkan pesan atau lakukan tindakan lain
            echo 'File PDF tidak ditemukan';
        }
    }
    function import()
    {
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
        error_reporting(0);
        $data['page_name'] = "import Data Latih";
        // if( !($_POST) ) redirect(site_url(''));  

        $filename = "excel";
        $config['upload_path'] = './assets/uploads/excel';
        $config['allowed_types'] = "xls|xlsx|csv";
        $config['overwrite'] = "true";
        $config['max_size'] = "2048";
        $config['file_name'] = '' . $filename;
        $this->load->library('upload', $config); // Load librari upload


        if (!$this->upload->do_upload("document_file")) {
            $error = $this->upload->display_errors();
        } else {
            $filename = $this->upload->data()["file_name"];
            // echo $filename;
            // Load plugin PHPExcel nya
            include APPPATH . 'third_party/PHPExcel.php';

            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('assets/uploads/excel/' . $filename); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            // Buat sebuah vari
            $data_testing = array();
            $numrow = 1;
            foreach ($sheet as $row) {
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1 &&  !empty($row['A'])) {
                    $data_test["no_sertifikat"] = $row['B'];
                    $data_test["id_jenis"] = $row['C'];
                    $data_test["tahun_pelatihan"] = $row['D'];
                    $data_test["nama_lengkap"] = $row['E'];
                    $data_test["nip"] = $row['F'];
                    $data_test["ttl"] = $row['G'];
                    $data_test["jenis_kelamin"] = $row['H'];
                    $data_test["no_hp"] = $row['I'];
                    $data_test["pangkat"] = $row['J'];
                    $data_test["jabatan"] = $row['K'];
                    $data_test["nama_instansi"] = $row['L'];

                    // Kita push (add) array data ke variabel data
                    array_push($data_testing, $data_test);
                }

                $numrow++; // Tambah 1 setiap kali looping
            }


            if ($this->Model_Sertifikat->import($data_testing)) {
                $who = $this->session->userdata('nama');
                $notif = array(
                    'title' => 'Mengubah Data Peserta',
                    'message' => 'Akun ' . $who . ' Menambah Data Peserta! (Import Excel)'
                );
                $this->db->insert('notifications', $notif);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Tambah Data Peserta Berhasil!
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>');
                redirect(site_url('sertifikatmain'));
                return;
            }
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
            ));
            redirect(site_url('sertifikatmain'));
        }
    }
    function export()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $jenis = $this->input->post('pelatihan');
        $tahun = $this->input->post('tahun');
        $bidang = $this->input->post('bidang');

        $data['title'] = 'Data Sertifikat';
        $data['semua'] = $this->Model_Sertifikat->get_data($tahun, $jenis, $bidang)->result_array();

        $this->load->view('sertifikatmain/export', $data);
    }
    function view_import()
    {
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sertifikatmain/import', $data);
        $this->load->view('templates/footer', $data);
    }
    function view_pasfoto($id)
    {
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $data['val'] = $id;
        $data['var'] = $this->db->get_where('data', ['id_data' => $id])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sertifikatmain/pasfoto', $data);
        $this->load->view('templates/footer', $data);
    }
    function view_serti($id)
    {
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $data['val'] = $id;
        $data['var'] = $this->db->get_where('data', ['id_data' => $id])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sertifikatmain/serti', $data);
        $this->load->view('templates/footer', $data);
    }
    function upload_pasfoto()
    {
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
        $id = $this->input->post('id');
        $pas_foto = $_FILES['pas_foto'];


        $photo_config['upload_path'] = './assets/uploads/pasfoto'; // Lokasi penyimpanan foto
        $photo_config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file foto yang diizinkan
        $photo_config['max_size'] = '5048'; // Batasan ukuran file foto (dalam kilobyte), maksimal 5 MB

        // Upload foto
        $this->load->library('upload', $photo_config); // Inisialisasi ulang dengan konfigurasi foto

        if (!$this->upload->do_upload('pas_foto')) {
            $error = $this->upload->display_errors();
        } else {
            $nama_foto = $this->upload->data('file_name');
            // Generate nomor acak
            $random_number = uniqid();
            // Mendapatkan ekstensi file
            $file_ext = pathinfo($nama_foto, PATHINFO_EXTENSION);
            // Buat nama file baru dengan menambahkan nomor acak
            $new_filename = 'pas_foto_' . $random_number . '.' . $file_ext;
            // Ubah nama file
            rename('./assets/uploads/pasfoto/' . $nama_foto, './assets/uploads/pasfoto/' . $new_filename);
        }
        // Jika unggahan berhasil, dapatkan informasi tentang file yang diunggah

        // Proses penyimpanan data ke database

        $data = array(

            'pas_foto' => $new_filename,

        );
        $this->Model_Sertifikat->update($id, $data);


        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Upload Pas Foto Berhasil!
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>');
        redirect('sertifikatmain');
    }
    function upload_serti()
    {
        if ($this->session->userdata('level') == 5) {
            redirect('dashboard');
        }
        $id = $this->input->post('id');
        $sertifikat = ''; // Inisialisasi variabel untuk nama file PDF

        // Cek apakah ada file PDF yang diunggah

        $pdf_config['upload_path'] = './assets/uploads'; // Lokasi penyimpanan file PDF
        $pdf_config['allowed_types'] = 'pdf'; // Jenis file PDF yang diizinkan
        $pdf_config['max_size'] = '2048'; // Batasan ukuran file PDF (dalam kilobyte), maksimal 2 MB

        // Upload file PDF baru
        $this->load->library('upload', $pdf_config);

        if (!$this->upload->do_upload('sertifikat')) {
            $error = $this->upload->display_errors();
        } else {
            $sertifikat = $this->upload->data('file_name');
            // Generate nomor acak
            $random_number = uniqid();
            // Mendapatkan ekstensi file
            $file_ext = pathinfo($sertifikat, PATHINFO_EXTENSION);
            // Buat nama file baru dengan menambahkan nomor acak
            $new_filename = 'sertifikat_' . $random_number . '.' . $file_ext;
            // Ubah nama file
            rename('./assets/uploads/' . $sertifikat, './assets/uploads/' . $new_filename);
        }

        $data = array(
            'sertifikat' => $new_filename
        );
        $this->Model_Sertifikat->update($id, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Upload Sertifikat Berhasil!
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>');
        redirect('sertifikatmain');
    }
}