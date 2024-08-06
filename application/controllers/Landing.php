<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Model_Sertifikat');
    }
    public function index()
    {

        $this->load->view('landing/index');
    }
    public function search()
    {
        $q = $this->input->get('q');
        $data['query'] = $q;
        $data['dat'] = $this->Model_Sertifikat->get_serti($q)->result_array();

        $this->load->view('landing/hasil', $data);
    }
}
