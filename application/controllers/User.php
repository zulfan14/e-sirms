<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'User Dashboard';
        $data['heading'] = 'SELAMAT DATANG DI APLIKASI EVALUASI SIMRS JIWA BANDA ACEH';

        $data['user'] = $this->db->get_where('tb_responden', ['nama_responden' => $this->session->userdata('nama_responden')])->row_array();
        $data['user2'] = $this->m_tamsil->get_user($data['user']['nama_responden'])->row_array();
        $data['skalalikert'] = $this->m_tamsil->get('tb_skalalikert');
        $data['variabel'] = $this->m_tamsil->get('tb_variabel');

        $this->load->view('template/header', $data);
        $this->load->view('template/u_sidebar', $data);
        $this->load->view('auth/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function save()
    {
        $variabel = $this->db->query("SELECT * FROM tb_variabel");
        $id_user = $this->input->post('id');
        $id_kriteria = $this->input->post('id_kriteria');
        $id_variabel = $this->input->post('id_variabel');
        $skala = $this->input->post('skala');
        $dataarray = [];

        foreach ($variabel->result_array() as $vb) {
            $kriteria = $this->db->query("SELECT * FROM tb_kriteria where id_variabel = '" . $vb['id_variabel'] . "' ");
            foreach ($kriteria->result_array() as $kt) {
                if ($skala[$kt['id_kriteria']] == 1) {
                    $sts = 1;
                    $ts = 0;
                    $s = 0;
                    $ss = 0;
                } elseif ($skala[$kt['id_kriteria']] == 2) {
                    $sts = 0;
                    $ts = 2;
                    $s = 0;
                    $ss = 0;
                } elseif ($skala[$kt['id_kriteria']] == 3) {
                    $sts = 0;
                    $ts = 0;
                    $s = 3;
                    $ss = 0;
                } else {
                    $sts = 0;
                    $ts = 0;
                    $s = 0;
                    $ss = 4;
                }

                array_push($dataarray, [
                    'id_user' => $id_user,
                    'id_kriteria' => $id_kriteria[$kt['id_kriteria']],
                    'id_variabel' => $id_variabel[$kt['id_kriteria']],
                    'jawabanskala' => $skala[$kt['id_kriteria']],
                    'skalasts' => $sts,
                    'skalats' => $ts,
                    'skalas' => $s,
                    'skalass' => $ss,
                    'tanggal' => time()

                ]);
            }
        }
        foreach ($variabel->result() as $vb) {
            $query = $this->db->query("SELECT  tb_respon.*, SUM(jawabanskala) as jawaban FROM tb_respon where jawabanskala=3  GROUP BY id_variabel")->result_array();
            $query = $this->db->query("SELECT * FROM tb_respon where jawabanskala=3  GROUP BY id_kriteria")->result_array();
            $this->m_tamsil->inputAnswer('tb_respon', $dataarray);
            //     echo '<pre>';
            //     var_dump($query);
            //     die;
            //     echo '</pre>';
        }
        redirect('auth/selesai');
    }
    public function selesai()
    {
        $data['title'] = 'User Dashboard';
        $data['heading'] = 'SELAMAT DATANG DI APLIKASI EVALUASI SIMRS JIWA BANDA ACEH';

        $data['user'] = $this->db->get_where('tb_responden', ['nama_responden' => $this->session->userdata('nama_responden')])->row_array();
        $data['user2'] = $this->m_tamsil->get_user($data['user']['nama_responden'])->row_array();
        $data['skalalikert'] = $this->m_tamsil->get('tb_skalalikert');
        $data['variabel'] = $this->m_tamsil->get('tb_variabel');

        $this->load->view('template/header', $data);
        $this->load->view('template/u_sidebar', $data);
        $this->load->view('auth/selesai', $data);
        $this->load->view('template/footer', $data);
    }
    public function editpassword()
    {
        $data['title'] = 'Edit user';
        $data['heading'] = 'Edit user';
        $data['user'] = $this->m_tamsil->get_data([
            'nama_responden' => $this->session->userdata('nama_responden')
        ], 'tb_responden')->row_array();
        // var_dump($data['user']);
        // die;
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('npassword', 'Npassword', 'required|trim');
        // $data['user'] = $this->m_tamsil->get_data($where, 'tb_responden')->result();
        // var_dump($data['responden']);
        // die;
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/u_sidebar', $data);
            $this->load->view('auth/editpassword', $data);
            $this->load->view('template/footer');
        } else {
            $password = $this->input->post('password');
            $npassword = $this->input->post('npassword');
            if (!password_verify($password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Yang Anda Masukkan Salah!!</div>');
                redirect('user/editpassword');
            } else {
                if ($password == $npassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama dengan Password Lama!!</div>');
                    redirect('user/editpassword');
                    # code...
                } else {
                    $newpassword = password_hash($npassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $newpassword);
                    $this->db->where('id_responden', $this->session->userdata('id_responden'));
                    $this->db->update('tb_responden');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Anda Berhasil DI Update!!</div>');
                    redirect('user/editpassword');
                }
            }
        }
    }
}
