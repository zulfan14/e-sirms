<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['skalalikert'] = $this->m_tamsil->get('tb_skalalikert');
        $data['kriteria'] = $this->m_tamsil->get('tb_kriteria');
        $this->load->view('auth/index', $data);
    }
}
