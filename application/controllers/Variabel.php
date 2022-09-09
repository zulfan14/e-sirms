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
    public function editvariabel($id_variabel)
    {
        $data['title'] = 'Edit Variabel';
        $data['heading'] = 'Edit Variabel';
        $where = [
            'id_variabel' => $id_variabel
        ];
        $data['variabel'] = $this->m_tamsil->get_data($where, 'tb_variabel')->result();
        // var_dump($data['variabel']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('variabel/editvariabel', $data);
        $this->load->view('template/footer');
    }
    public function update_variabel()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_variabel.nm_variabel]', [
            'is_unique' => 'nama variabel sudah digunakan'
        ]);
        $id_variabel = $this->input->post('id_variabel');

        $where = [
            'id_variabel' => $id_variabel
        ];
        $data['variabel'] = $this->m_tamsil->get_data($where, 'tb_variabel')->result();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Variabel';
            $data['heading'] = 'Edit Variabel';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('variabel/editvariabel', $data);
            $this->load->view('template/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Variabel Sudah Digunakan!!</div>');
        } else {
            $nm_variabel = $this->input->post('nama');
            $id_variabel = $this->input->post('id_variabel');
            $data = [
                'nm_variabel' => $nm_variabel
            ];
            $where = [
                'id_variabel' => $id_variabel
            ];
            $this->m_tamsil->update_data($where, $data, 'tb_variabel');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update!!</div>');
            redirect('variabel');
        }
    }
    public function hapusvariabel($id_variabel)
    {

        $where = [
            'id_variabel' => $id_variabel
        ];
        $this->m_tamsil->hapus_data($where, 'tb_variabel');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data variabel Berhasil di Hapus!!</div>');
        redirect('variabel');
    }
}
