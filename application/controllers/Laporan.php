<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'laporan';
        $data['heading'] = 'LAPORAN';

        $data['responden'] = $this->db->query("SELECT COUNT(distinct id_user) as total FROM tb_respon")->row_array();
        $data['kriteria'] = $this->db->query("SELECT COUNT(distinct id_kriteria) as total_kriteria FROM tb_respon GROUP BY (id_variabel)")->result_array();
        $data['jumlah_variabel'] = $this->db->query("SELECT COUNT(distinct id_variabel) as total_variabel FROM tb_respon")->row_array();

        $data['variabel'] = $this->m_tamsil->get('tb_variabel');
        // echo '<pre>';
        // var_dump($data['jumlah_variabel']);
        // die;
        // echo '</pre>';


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('laporan/index', $data);
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
