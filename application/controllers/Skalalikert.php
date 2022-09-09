<?php
defined('BASEPATH') or exit('No direct script access allowed');

class skalalikert extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'SKALA LIKERT';
        $data['heading'] = 'FORM INPUT SKALA LIKERT';

        $data['skalalikert'] = $this->m_tamsil->get('tb_skalalikert');

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('skalalikert/index', $data);
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">nilai skalalikert Berhasil di Tambah!!</div>');
            redirect('skalalikert');
        }
    }
    public function editskalalikert($id_skalalikert)
    {
        $data['title'] = 'Edit skalalikert';
        $data['heading'] = 'Edit skalalikert';
        $where = [
            'id_skalalikert' => $id_skalalikert
        ];
        $data['skalalikert'] = $this->m_tamsil->get_data($where, 'tb_skalalikert')->result();
        // var_dump($data['skalalikert']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('skalalikert/editskalalikert', $data);
        $this->load->view('template/footer');
    }
    public function update_skalalikert()
    {

        $this->form_validation->set_rules('nilai', 'nilai', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $id_skalalikert = $this->input->post('id_skalalikert');

        $where = [
            'id_skalalikert' => $id_skalalikert
        ];
        $data['skalalikert'] = $this->m_tamsil->get_data($where, 'tb_skalalikert')->result();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit skalalikert';
            $data['heading'] = 'Edit skalalikert';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('skalalikert/editskalalikert', $data);
            $this->load->view('template/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nilai atau keterangan skalalikert Sudah Digunakan!!</div>');
        } else {
            $nilai = $this->input->post('nilai');
            $keterangan = $this->input->post('keterangan');
            $id_skalalikert = $this->input->post('id_skalalikert');
            $data = [
                'nilai' => $nilai,
                'keterangan' => $keterangan
            ];
            $where = [
                'id_skalalikert' => $id_skalalikert
            ];
            $this->m_tamsil->update_data($where, $data, 'tb_skalalikert');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update!!</div>');
            redirect('skalalikert');
        }
    }
    public function hapusskalalikert($id_skalalikert)
    {

        $where = [
            'id_skalalikert' => $id_skalalikert
        ];
        $this->m_tamsil->hapus_data($where, 'tb_skalalikert');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data skalalikert Berhasil di Hapus!!</div>');
        redirect('skalalikert');
    }
}
