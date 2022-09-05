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
}
