<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pendidikan extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'PENDIDIKAN';
        $data['heading'] = 'FORM INPUT PENDIDIKAN';

        $data['pendidikan'] = $this->m_tamsil->get('tb_pendidikan');

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pendidikan/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah_pendidikan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Pendidikan Gagal Ditambahkan!!</div>');
            redirect('kriteria');
        } else {
            $data = [
                'nama_pendidikan' => htmlspecialchars($this->input->post('nama', true))
            ];

            $this->m_tamsil->insert('tb_pendidikan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nama pendidikan Berhasil di Tambah!!</div>');
            redirect('pendidikan');
        }
    }
}
