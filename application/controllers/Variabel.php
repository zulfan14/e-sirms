<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Variabel extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'INPUT VARIABEL';
        $data['heading'] = 'FORM INPUT VARIABEL';
        $data['variabel'] = $this->m_tamsil->get('tb_variabel');
        // var_dump($data['variabel']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('variabel/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah_variabel()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_variabel.nm_variabel]', [
            'is_unique' => 'nama variabel sudah digunakan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Variabel Sudah Digunakan!!</div>');
            redirect('variabel');
        } else {
            $data = [
                'nm_variabel' => htmlspecialchars($this->input->post('nama', true))
            ];

            $this->m_tamsil->insert('tb_variabel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nama Variabel Berhasil di Tambah!!</div>');
            redirect('variabel');
        }
    }
}
