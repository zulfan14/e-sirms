<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('name')) {
            redirect('auth/selesai');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'INPUT JABATAN';
            $data['heading'] = 'FORM INPUT JABATAN';
            $this->load->view('template/header', $data);
            // $this->load->view('template/sidebar', $data);
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    public function selesai()
    {
        $this->load->view('auth/selesai');
    }

    public function save2()
    {
        // var_dump($_POST);
        $data['skalalikert'] = $this->m_tamsil->get('tb_skalalikert');
        $data['kriteria'] = $this->m_tamsil->get('tb_kriteria');
        $kriteria = $_POST;
        var_dump($kriteria);
        die;
        $total = [];
        $totalResponden = count($kriteria);
        foreach ($kriteria as $keterangan => $kriteria) {
            if (isset($total[$keterangan])) {
                $total[$keterangan] += $kriteria;
            } else {
                $total[$keterangan] = $kriteria;
            }
        }

        $nilaiSkala = 0;
        foreach ($total as $keterangan => $nilai) {
            $nilaiSkala += $nilai / $totalResponden;
        }

        echo "nilai " . $nilaiSkala;

        // var_dump($total);
        // foreach ($data['skalalikert'] as $dt):
        // foreach ($kriteria as $kl) :
        //     $name=kriteria[$kl->idkriteria];
        // endforeach;
        echo '<rev>';

        die;
        echo '</rev>';

        // $this->load->view('auth/index', $data);
    }
    public function login()
    {
        $data['title'] = 'INPUT JABATAN';
        $data['heading'] = 'FORM INPUT JABATAN';


        $this->load->view('template/header', $data);
        // $this->load->view('template/sidebar', $data);
        $this->load->view('auth/login', $data);
        // $this->load->view('template/footer');
    }
    private function _login()
    {
        $name = $this->input->post('nama');
        $password = $this->input->post('password');

        $user = $this->m_tamsil->get_data(['nama_responden' => $name], 'tb_responden')->row_array();

        // Jika Usernya Ada
        if ($user) {
            // Jika Usernya ada

            // Cek Password
            if (password_verify($password, $user['password'])) {

                $data = [
                    'nama_responden' => $user['nama_responden'],
                    'role_id' => $user['role_id'],
                    'id_responden' => $user['id_responden']
                ];
                // var_dump($data);
                // die;
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Maaf, password anda salah! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, name anda belum terdaftar! </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Selamat anda berhasil keluar! </div>');
        redirect('auth');
    }
}
