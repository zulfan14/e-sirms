<?php
defined('BASEPATH') or exit('No direct script access allowed');

class responden extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'RESPONDEN';
        $data['heading'] = 'FORM INPUT RESPONDEN';

        $data['responden'] = $this->m_tamsil->get_responden();
        $data['pendidikan'] = $this->m_tamsil->get('tb_pendidikan');
        $data['jabatan'] = $this->m_tamsil->get('tb_jabatan');

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('responden/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah_responden()
    {
        $this->form_validation->set_rules('id', 'iD', 'required|trim|is_unique[tb_responden.id_responden]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Responden Sudah Pernah Digunakan!!</div>');
            redirect('responden');
        } else {
            $data = [
                'id_responden' => htmlspecialchars($this->input->post('id', true)),
                'nama_responden' => htmlspecialchars($this->input->post('nama', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal', true)),
                'id_pendidikan' => htmlspecialchars($this->input->post('pendidikan', true)),
                'id_jabatan' => htmlspecialchars($this->input->post('jabatan', true))
            ];

            // echo '<pre>';
            // var_dump($data);
            // die;
            // echo '</pre>';

            $this->m_tamsil->insert('tb_responden', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Responden Berhasil di Tambah!!</div>');
            redirect('responden');
        }
    }
}
