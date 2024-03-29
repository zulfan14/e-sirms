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
                'id_jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => '2',
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
    public function hapusresponden($id_responden)
    {


        $where = [
            'id_responden' => $id_responden
        ];
        $this->m_tamsil->hapus_data($where, 'tb_responden');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Responden Berhasil di Hapus!!</div>');
        redirect('responden');
    }
    public function edit_responden($id)
    {
        $data['title'] = 'EDIT RESPONDEN';
        $data['heading'] = 'FORM EDIT RESPONDEN';
        $where = [
            'id_responden' => $id
        ];

        $data['responden'] = $this->m_tamsil->get_data($where, 'tb_responden')->result();
        $data['pendidikan'] = $this->m_tamsil->get('tb_pendidikan');
        $data['jabatan'] = $this->m_tamsil->get('tb_jabatan');
        // var_dump($data['responden']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('responden/edit', $data);
        $this->load->view('template/footer');
    }
    public function update_responden()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $id_responden = $this->input->post('id');
        $where = [
            'id_responden' => $id_responden
        ];

        $data['responden'] = $this->m_tamsil->get_data($where, 'tb_responden')->result();
        $data['pendidikan'] = $this->m_tamsil->get('tb_pendidikan');
        $data['jabatan'] = $this->m_tamsil->get('tb_jabatan');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'EDIT RESPONDEN';
            $data['heading'] = 'FORM EDIT RESPONDEN';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('responden/edit', $data);
            $this->load->view('template/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal di Update!!</div>');
        } else {
            $data = [
                'nama_responden' => htmlspecialchars($this->input->post('nama', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal', true)),
                'id_pendidikan' => htmlspecialchars($this->input->post('pendidikan', true)),
                'id_jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            // var_dump($data);
            // die;

            // echo '<pre>';
            // var_dump($data);
            // die;
            // echo '</pre>';

            $this->m_tamsil->update_data($where, $data, 'tb_responden');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Responden Berhasil di Edit!!</div>');
            redirect('responden');
        }
    }
}
