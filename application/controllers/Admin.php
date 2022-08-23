<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['heading'] = 'SELAMAT DATANG DI APLIKASI EVALUASI SIMRS JIWA BANDA ACEH';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('auth/index');
        $this->load->view('template/footer');
    }
}
