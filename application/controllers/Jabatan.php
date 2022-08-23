<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jabatan extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'INPUT JABATAN';
        $data['heading'] = 'FORM INPUT JABATAN';

        $data['jabatan'] = $this->m_tamsil->get('tb_jabatan');

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('jabatan/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah_jabatan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Jabatan Gagal Ditambahkan!!</div>');
            redirect('kriteria');
        } else {
            $data = [
                'nama_jabatan' => htmlspecialchars($this->input->post('nama', true))
            ];

            $this->m_tamsil->insert('tb_jabatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nama Jabatan Berhasil di Tambah!!</div>');
            redirect('jabatan');
        }
    }
}
