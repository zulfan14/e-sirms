<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['skalalikert'] = $this->m_tamsil->get('tb_skalalikert');
        // $data['kriteria'] = $this->m_tamsil->get('tb_kriteria');
        $data['variabel'] = $this->m_tamsil->get('tb_variabel');
        $this->load->view('auth/index', $data);
    }
    public function selesai()
    {
        $this->load->view('auth/selesai');
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
                    $ts = 1;
                    $s = 0;
                    $ss = 0;
                } elseif ($skala[$kt['id_kriteria']] == 3) {
                    $sts = 1;
                    $ts = 0;
                    $s = 3;
                    $ss = 0;
                } else {
                    $sts = 0;
                    $ts = 0;
                    $s = 0;
                    $ss = 1;
                }

                array_push($dataarray, [
                    'id_kriteria' => $id_kriteria[$kt['id_kriteria']],
                    'id_variabel' => $id_variabel[$kt['id_kriteria']],
                    'id_user' => $id_user,
                    'jawabanskala' => $skala[$kt['id_kriteria']],
                    'skalasts' => $sts,
                    'skalats' => $ts,
                    'skalas' => $s,
                    'skalass' => $ss,
                ]);
            }
            // echo '<pre>';
            // var_dump($kriteria->result_array());
            // die;
            // echo '</pre>';
            redirect('auth/selesai');
        }
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
        $this->load->view('template/footer');
    }
}
