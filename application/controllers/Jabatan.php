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
    public function editjabatan($id_jabatan)
    {
        $data['title'] = 'Edit jabatan';
        $data['heading'] = 'Edit jabatan';
        $where = [
            'id_jabatan' => $id_jabatan
        ];
        $data['jabatan'] = $this->m_tamsil->get_data($where, 'tb_jabatan')->result();
        // var_dump($data['jabatan']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('jabatan/editjabatan', $data);
        $this->load->view('template/footer');
    }
    public function update_jabatan()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_jabatan.nama_jabatan]', [
            'is_unique' => 'nama jabatan sudah digunakan'
        ]);
        $id_jabatan = $this->input->post('id_jabatan');

        $where = [
            'id_jabatan' => $id_jabatan
        ];
        $data['jabatan'] = $this->m_tamsil->get_data($where, 'tb_jabatan')->result();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit jabatan';
            $data['heading'] = 'Edit jabatan';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('jabatan/editjabatan', $data);
            $this->load->view('template/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama jabatan Sudah Digunakan!!</div>');
        } else {
            $nm_jabatan = $this->input->post('nama');
            $id_jabatan = $this->input->post('id_jabatan');
            $data = [
                'nama_jabatan' => $nm_jabatan
            ];
            $where = [
                'id_jabatan' => $id_jabatan
            ];
            $this->m_tamsil->update_data($where, $data, 'tb_jabatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update!!</div>');
            redirect('jabatan');
        }
    }
    public function hapusjabatan($id_jabatan)
    {

        $where = [
            'id_jabatan' => $id_jabatan
        ];
        $this->m_tamsil->hapus_data($where, 'tb_jabatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data jabatan Berhasil di Hapus!!</div>');
        redirect('jabatan');
    }
}
