<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <!-- // Basic multiple Column Form section end -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">Jquery Datatable</div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th style="text-align: center;">Variabel</th>
                                        <th style="text-align: center;">STS</th>
                                        <th style="text-align: center;">TS</th>
                                        <th style="text-align: center;">S</th>
                                        <th style="text-align: center;">SS</th>
                                        <th style="text-align: center;">Nilai Skala</th>
                                        <th style="text-align: center;">Rata-Rata Variabel</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1;
                                    $total = 0;
                                    foreach ($variabel as $vb) :
                                        $querysts = $this->db->query("SELECT SUM(jawabanskala) as skala FROM tb_respon where  id_variabel=$vb->id_variabel and jawabanskala='1'  GROUP BY id_kriteria");
                                        $queryts = $this->db->query("SELECT SUM(jawabanskala) as skala FROM tb_respon where  id_variabel=$vb->id_variabel and jawabanskala='2'  GROUP BY id_kriteria");
                                        $querys = $this->db->query("SELECT SUM(jawabanskala) as skala FROM tb_respon where  id_variabel=$vb->id_variabel and jawabanskala='3'  GROUP BY id_kriteria");
                                        $queryss = $this->db->query("SELECT SUM(jawabanskala) as skala FROM tb_respon where  id_variabel=$vb->id_variabel and jawabanskala='4'  GROUP BY id_kriteria");
                                    ?>
                                        <tr>
                                            <td style="text-align: center;" width="20px">
                                                <?= $n++ ?>
                                            </td>
                                            <td>
                                                <?= $vb->nm_variabel; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $missts = 0;
                                                $sts = 0;
                                                foreach ($querysts->result() as $q) :
                                                    $missts += $q->skala / $responden['total'];
                                                    $sts += $q->skala;
                                                endforeach;
                                                echo $sts;
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $mists = 0;
                                                $ts = 0;
                                                foreach ($queryts->result() as $q) :
                                                    $mists += $q->skala / $responden['total'];
                                                    $ts += $q->skala;
                                                endforeach;
                                                echo $ts;
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $miss = 0;
                                                $s = 0;

                                                foreach ($querys->result() as $q) :
                                                    $miss += $q->skala / $responden['total'];
                                                    $s += $q->skala;

                                                endforeach;
                                                echo $s
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $misss = 0;
                                                $ss = 0;
                                                foreach ($queryss->result() as $q) :
                                                    $misss += $q->skala / $responden['total'];
                                                    $ss += $q->skala;
                                                endforeach;
                                                echo $ss;
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                echo number_format($mists + $missts + $miss + $misss, 2);
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $variabel = 0;
                                                foreach ($kriteria as $kt) :
                                                    $total_kriteria = ($sts + $ts + $s + $ss) / $kt['total_kriteria'];
                                                endforeach;
                                                $total += $total_kriteria;
                                                echo $total_kriteria;
                                                ?>
                                            </td>
                                        </tr>

                                    <?php endforeach;
                                    $nilai_hot_fit = $total / $jumlah_variabel['total_variabel'];
                                    ?>

                                    <tr>
                                        <td colspan=2>
                                            <h5><b>Jumlah Responden</b></h5>
                                        </td>
                                        <td class="text-center">
                                            <h5><b><?= $responden['total']; ?></b></h5>
                                        </td>
                                        <td colspan=5></td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>
                                            <h5><b>Nilai Hot Fit</b></h5>
                                        </td>
                                        <td class="text-center">
                                            <h5><b><?= number_format($nilai_hot_fit, 2); ?></b></h5>
                                        </td>
                                        <td colspan=5></td>
                                    </tr>

                                    <!-- // $pembanding = $q->id_variabel;
                                    // $kategori = $this->db->query("SELECT * FROM tb_kriteria where id_variabel = '$pembanding'")->result_array(); -->



                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>


            </div>
    </section>
</div>