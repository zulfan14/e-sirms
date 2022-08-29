<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/template/'); ?>assets/css/main/app.css">
    <link rel="shortcut icon" href="<?= base_url('assets/template/'); ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/template/'); ?>assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="index.html"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="assets/images/logo/logo.svg">
            </a>
        </div>
    </nav>


    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2 class="page-heading">SELAMAT DATANG DI APLIKASI EVALUASI SIMRS JIWA BANDA ACEH</h2>
            </div>
            <div class="card-body">
                <p>Silahkan Isikan Data Anda</p>

                <form action="">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-group mandatory">
                                <label for="nama" class="form-label">Id Responden</label>
                                <input type="text" id="nama" class="form-control" placeholder="Input Nama pendidikan" name="nama" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-group mandatory">
                                <label for="nama" class="form-label">Nama Responden</label>
                                <input type="read" id="nama" class="form-control" placeholder="Input Nama pendidikan" name="nama" value="maun" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-group mandatory">
                                <label for="nama" class="form-label">Nama Bagian</label>
                                <input type="read" id="nama" class="form-control" placeholder="Input Nama pendidikan" name="nama" value="Staff" data-parsley-required="true" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                                <button type="submit" class="btn btn-danger me-1 mb-1">
                                    Next
                                </button>
                            </div>
                            <!-- table bordered -->
                            <div class="card-body">
                                <form class="form" action="<?= base_url('auth/save/'); ?>" method="POST">
                                    <div class="table-responsive">
                                        <?php
                                        foreach ($variabel as $vb) : ?>
                                            <br>
                                            <h4 class="card-title"><?= $vb->nm_variabel; ?></h4>
                                            <br>
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Pernyataan</th>
                                                        <?php foreach ($skalalikert as $sl) : ?>
                                                            <th><?= $sl->keterangan; ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>



                                                <tbody>
                                                    <?php
                                                    $menuId = $vb->id_variabel;
                                                    $querySubMenu = "SELECT *
                                                                   FROM `tb_kriteria` JOIN `tb_variabel` 
                                                                     ON `tb_kriteria`.`id_variabel` = `tb_variabel`.`id_variabel`
                                                                  WHERE `tb_kriteria`.`id_variabel` = $menuId
                                                            ";
                                                    $subMenu = $this->db->query($querySubMenu)->result();
                                                    // echo '<pre>';
                                                    // var_dump($subMenu);
                                                    // die;
                                                    // echo '</pre>';
                                                    foreach ($subMenu as $kt) : ?>

                                                        <tr>
                                                            <td class="text-bold-500"><?= $kt->nama_kriteria; ?></td>

                                                            <?php
                                                            foreach ($skalalikert as $sl) : ?>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="kriteria[<?= $sl->keterangan ?>]" id="flexRadioDefault.1" data-parsley-required="true" value="<?= $sl->nilai; ?>">
                                                                        <label class="form-check-label form-label" for="flexRadioDefault1"><?= $sl->nilai; ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            <?php endforeach; ?>
                                                        </tr>

                                                    <?php
                                                    endforeach; ?>
                                                </tbody>
                                            <?php
                                        endforeach; ?>
                                            </table>
                                    </div>
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
                            </div>
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