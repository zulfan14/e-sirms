<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['heading'] = 'SELAMAT DATANG DI APLIKASI EVALUASI SIMRS JIWA BANDA ACEH';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/index');
        $this->load->view('template/footer');
    }
    public function daftaradmin()
    {
        $data['title'] = 'ADMIN';
        $data['heading'] = 'FORM INPUT ADMIN';

        $data['admin'] = $this->m_tamsil->get_admin();
        $data['pendidikan'] = $this->m_tamsil->get('tb_pendidikan');
        $data['jabatan'] = $this->m_tamsil->get('tb_jabatan');

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/daftaradmin', $data);
        $this->load->view('template/footer');
    }
    public function tambah_admin()
    {
        $this->form_validation->set_rules('id', 'iD', 'required|trim|is_unique[tb_responden.id_responden]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_responden.nama_responden]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Atau Username Sudah Pernah Digunakan!!</div>');
            redirect('admin/daftaradmin');
        } else {
            $data = [
                'id_responden' => htmlspecialchars($this->input->post('id', true)),
                'nama_responden' => htmlspecialchars($this->input->post('nama', true)),
                'tempat_lahir' => '-',
                'tanggal_lahir' => time(),
                'id_pendidikan' => 1,
                'id_jabatan' => 1,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => '1',
            ];

            $this->m_tamsil->insert('tb_responden', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin Berhasil di Tambah!!</div>');
            redirect('admin/daftaradmin');
        }
    }
    public function editadmin($id_responden)
    {
        $data['title'] = 'Edit admin';
        $data['heading'] = 'Edit admin';
        $where = [
            'id_responden' => $id_responden
        ];
        $data['admin'] = $this->m_tamsil->get_data($where, 'tb_responden')->result();
        // var_dump($data['responden']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/editadmin', $data);
        $this->load->view('template/footer');
    }
    public function update_admin()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_responden.nama_responden]');
        $where = [
            'id_responden' => $this->input->post('id')
        ];

        $data['admin'] = $this->m_tamsil->get_data($where, 'tb_responden')->result();
        if ($this->form_validation->run() == false) {
            // var_dump($data['responden']);
            // die;
            $data['title'] = 'Edit admin';
            $data['heading'] = 'Edit admin';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/editadmin', $data);
            $this->load->view('template/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Sudah Pernah Digunakan!!</div>');
        } else {
            $data = [
                'nama_responden' => htmlspecialchars($this->input->post('nama', true)),
            ];

            $this->m_tamsil->update_data($where, $data, 'tb_responden');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin Berhasil di Update!!</div>');
            redirect('admin/daftaradmin');
        }
    }
    public function hapusadmin($id_responden)
    {

        $where = [
            'id_responden' => $id_responden
        ];
        $this->m_tamsil->hapus_data($where, 'tb_responden');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data admin Berhasil di Hapus!!</div>');
        redirect('admin/daftaradmin');
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
    public function editpassword()
    {
        $data['title'] = 'Edit admin';
        $data['heading'] = 'Edit admin';
        $data['admin'] = $this->m_tamsil->get_data([
            'nama_responden' => $this->session->userdata('nama_responden')
        ], 'tb_responden')->row_array();
        // var_dump($data['admin']);
        // die;
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('npassword', 'Npassword', 'required|trim');
        // $data['admin'] = $this->m_tamsil->get_data($where, 'tb_responden')->result();
        // var_dump($data['responden']);
        // die;
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/editpassword', $data);
            $this->load->view('template/footer');
        } else {
            $password = $this->input->post('password');
            $npassword = $this->input->post('npassword');
            if (!password_verify($password, $data['admin']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Yang Anda Masukkan Salah!!</div>');
                redirect('admin/editpassword');
            } else {
                if ($password == $npassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama dengan Password Lama!!</div>');
                    redirect('admin/editpassword');
                    # code...
                } else {
                    $newpassword = password_hash($npassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $newpassword);
                    $this->db->where('id_responden', $this->session->userdata('id_responden'));
                    $this->db->update('tb_responden');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Anda Berhasil DI Update!!</div>');
                    redirect('admin/editpassword');
                }
            }
        }
    }
}
