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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus nemo quasi labore expedita? Veritatis
                    at maxime id voluptates excepturi molestiae possimus blanditiis dicta consequuntur maiores suscipit,
                    eveniet neque obcaecati doloribus.</p>
            </div>
        </div>
        <!-- Bordered table start -->
        <section class="section">
            <div class=" row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bordered table</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Add <code>.table-bordered</code> for borders on all sides of the table
                                    and
                                    cells. For
                                    Inverse Dark Table, add <code>.table-dark</code> along with
                                    <code>.table-bordered</code>.
                                </p>
                            </div>
                            <!-- table bordered -->
                            <form class="form" action="<?= base_url('auth/save/'); ?>" method="POST">
                                <div class="table-responsive">
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
                                            foreach ($kriteria as $kt) : ?>

                                                <tr>
                                                    <td class="text-bold-500"><?= $kt->nama_kriteria; ?></td>

                                                    <?php
                                                    foreach ($skalalikert as $sl) : ?>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="kriterii_<?= $kt->id_kriteria ?>" id="flexRadioDefault.1" data-parsley-required="true" value="<?= $sl->nilai; ?>">
                                                                <label class="form-check-label form-label" for="flexRadioDefault1"><?= $sl->nilai; ?>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    <?php endforeach; ?>
                                                </tr>

                                            <?php
                                            endforeach; ?>
                                        </tbody>
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