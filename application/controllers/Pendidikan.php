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
    public function editpendidikan($id_pendidikan)
    {
        $data['title'] = 'Edit pendidikan';
        $data['heading'] = 'Edit pendidikan';
        $where = [
            'id_pendidikan' => $id_pendidikan
        ];
        $data['pendidikan'] = $this->m_tamsil->get_data($where, 'tb_pendidikan')->result();
        // var_dump($data['pendidikan']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pendidikan/editpendidikan', $data);
        $this->load->view('template/footer');
    }
    public function update_pendidikan()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_pendidikan.nama_pendidikan]', [
            'is_unique' => 'nama pendidikan sudah digunakan'
        ]);
        $id_pendidikan = $this->input->post('id_pendidikan');

        $where = [
            'id_pendidikan' => $id_pendidikan
        ];
        $data['pendidikan'] = $this->m_tamsil->get_data($where, 'tb_pendidikan')->result();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit pendidikan';
            $data['heading'] = 'Edit pendidikan';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pendidikan/editpendidikan', $data);
            $this->load->view('template/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama pendidikan Sudah Digunakan!!</div>');
        } else {
            $nm_pendidikan = $this->input->post('nama');
            $id_pendidikan = $this->input->post('id_pendidikan');
            $data = [
                'nama_pendidikan' => $nm_pendidikan
            ];
            $where = [
                'id_pendidikan' => $id_pendidikan
            ];
            $this->m_tamsil->update_data($where, $data, 'tb_pendidikan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update!!</div>');
            redirect('pendidikan');
        }
    }
    public function hapuspendidikan($id_pendidikan)
    {

        $where = [
            'id_pendidikan' => $id_pendidikan
        ];
        $this->m_tamsil->hapus_data($where, 'tb_pendidikan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pendidikan Berhasil di Hapus!!</div>');
        redirect('pendidikan');
    }
}
