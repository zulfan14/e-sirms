<?php
defined('BASEPATH') or exit('No direct script access allowed');

class responden extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'RESPONDEN';
        $data['heading'] = 'FORM INPUT RESPONDEN';

        $data['responden'] = $this->m_tamsil->get('tb_responden');

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('responden/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah_skalalikert()
    {
        $this->form_validation->set_rules('nilai', 'Nilai', 'required|trim|is_unique[tb_skalalikert.nilai]');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim|is_unique[tb_skalalikert.keterangan]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nilai atau Keterangan skalalikert Sudah Pernah Digunakan!!</div>');
            redirect('skalalikert');
        } else {
            $data = [
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                'nilai' => htmlspecialchars($this->input->post('nilai', true))
            ];

            // var_dump($data);
            // die;

            $this->m_tamsil->insert('tb_skalalikert', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nama skalalikert Berhasil di Tambah!!</div>');
            redirect('skalalikert');
        }
    }
}
