<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kriteria extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'KRITERIA';
        $data['heading'] = 'FORM INPUT KRITERIA';


        $data['variabel'] = $this->m_tamsil->get('tb_variabel');
        $data['kriteria'] = $this->m_tamsil->get_data_kriteria();
        // echo '<pre>';
        // var_dump($data['kriteria']);
        // die;
        // echo '</pre>';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('kriteria/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah_kriteria()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('variabel', 'Variabel', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Variabel Gagal Ditambahkan!!</div>');
            redirect('kriteria');
        } else {
            $data = [
                'nama_kriteria' => htmlspecialchars($this->input->post('nama', true)),
                'id_variabel' => htmlspecialchars($this->input->post('variabel', true))
            ];
            // echo '<pre>';
            // var_dump($data);
            // die;
            // echo '<pre>';
            $this->m_tamsil->insert('tb_kriteria', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nama Kriteria Berhasil di Tambah!!</div>');
            redirect('kriteria');
        }
    }
}
