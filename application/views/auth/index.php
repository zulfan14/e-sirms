    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <form class="form" action="<?= base_url('user/save/'); ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-group mandatory">
                                <label for="id" class="form-label">Id Responden</label>
                                <input type="text" id="id" class="form-control" placeholder="Input id Anda" name="id" data-parsley-required="true" value="<?= $user2['id_responden'] ?>" readonly />
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-group mandatory">
                                <label for="nama" class="form-label">Nama Responden</label>
                                <input type="read" id="nama" class="form-control" placeholder="Input Nama pendidikan" name="nama" value="<?= $user2['nama_responden'] ?>" data-parsley-required="true" readonly />
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-group mandatory">
                                <label for="nama" class="form-label">Nama Bagian</label>
                                <input type="read" id="jabatan" class="form-control" placeholder="Input jabatan pendidikan" name="jabatan" value="<?= $user2['nama_jabatan'] ?>" data-parsley-required="true" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                    </div>
                    <!-- Bordered table start -->
                    <section class="section">
                        <div class=" row" id="table-bordered">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p class="card-text">Keterangan :
                                            </p>
                                            <p class="card-text">Pilihlah salah satu jawaban yang paling sesuai menurut anda mengenai penerapan sistem informasi yang anda gunakan dengan memberi tanda checklist (√) pada kolom jawaban yang tersedia. Pernyataan ini akan menggambarkan persepsi anda mengenai sistem yang anda gunakan berdasarkan aspek organisasi.
                                            </p>
                                            <p class="card-text">Nilai Kriteria : SS = Sangat Setuju TS = Tidak Setuju
                                                SS = Setuju STS = Sangat Tidak Setuju
                                            </p>
                                        </div>
                                        <!-- table bordered -->
                                        <div class="card-body">

                                            <?php foreach ($variabel as $vb) { ?>
                                                <h4><?= strtoupper($vb->nm_variabel); ?></h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>NO</th>
                                                                    <th>Pernyataan</th>
                                                                    <?php foreach ($skalalikert as $sl) : ?>
                                                                        <th><?= $sl->keterangan; ?></th>
                                                                    <?php endforeach; ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                $kriteria = $this->db->query("SELECT * FROM tb_kriteria where id_variabel = '" . $vb->id_variabel . "' ");
                                                                foreach ($kriteria->result_array() as $kt) { ?>
                                                                    <input type="hidden" name="id_kriteria[<?= $kt['id_kriteria'] ?>]" value="<?= $kt['id_kriteria'] ?>">
                                                                    <input type="hidden" name="id_variabel[<?= $kt['id_kriteria'] ?>]" value="<?= $vb->id_variabel ?>">

                                                                    <tr>
                                                                        <td><?= $no ?></td>
                                                                        <td class="text-bold-500"><?= $kt['nama_kriteria']; ?></td>
                                                                        <td bgcolor=#F9EDED align="center">
                                                                            <input name="skala[<?= $kt['id_kriteria'] ?>]" type="radio" value="1" required>
                                                                        </td>
                                                                        <td bgcolor=#F9EDED align="center">
                                                                            <input name="skala[<?= $kt['id_kriteria'] ?>]" type="radio" value="2" required>
                                                                        </td>
                                                                        <td bgcolor=#F9EDED align="center">
                                                                            <input name="skala[<?= $kt['id_kriteria'] ?>]" type="radio" value="3" required>
                                                                        </td>
                                                                        <td bgcolor=#F9EDED align="center">
                                                                            <input name="skala[<?= $kt['id_kriteria'] ?>]" type="radio" value="4" required>
                                                                        </td>


                                                                    </tr>

                                                                <?php $no++;
                                                                } ?>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                </form>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Bordered table end -->
    </div>



    <script src="<?= base_url('assets/template/'); ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/template/'); ?>assets/js/app.js"></script>

    <script src="<?= base_url('assets/template/'); ?>assets/extensions/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/template/'); ?>assets/extensions/parsleyjs/parsley.min.js"></script>
    <script src="<?= base_url('assets/template/'); ?>assets/js/pages/parsley.js"></script>

    </body>

    </html>