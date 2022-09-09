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
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama kriteria Gagal Ditambahkan!!</div>');
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
    public function editkriteria($id_kriteria)
    {
        $data['title'] = 'Edit kriteria';
        $data['heading'] = 'Edit kriteria';
        $where = [
            'id_kriteria' => $id_kriteria
        ];
        $data['kriteria'] = $this->m_tamsil->get_data($where, 'tb_kriteria')->result();
        $data['variabel'] = $this->m_tamsil->get('tb_variabel');
        // var_dump($data['kriteria']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('kriteria/editkriteria', $data);
        $this->load->view('template/footer');
    }
    public function update_kriteria()
    {
        $id_kriteria = $this->input->post('id_kriteria');
        $nama_kriteria = $this->input->post('nama');
        $id_variabel = $this->input->post('variabel');
        $data = [
            'nama_kriteria' => $nama_kriteria,
            'id_variabel' => $id_variabel
        ];
        $where = [
            'id_kriteria' => $id_kriteria
        ];
        $this->m_tamsil->update_data($where, $data, 'tb_kriteria');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kriteria Berhasil di Update!!</div>');
        redirect('kriteria');
    }
    public function hapuskriteria($id_kriteria)
    {

        $where = [
            'id_kriteria' => $id_kriteria
        ];
        $this->m_tamsil->hapus_data($where, 'tb_kriteria');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kriteria Berhasil di Hapus!!</div>');
        redirect('kriteria');
    }
}
