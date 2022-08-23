<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="col-lg-6 col-6">
                                            <?= $this->session->flashdata('message'); ?>
                                        </div>
                                        <form class="form" action="<?= base_url('skalalikert/tambah_skalalikert'); ?>" method="POST" data-parsley-validate>
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="nilai" class="form-label">nilai</label>
                                                        <input type="number" id="nilai" class="form-control" placeholder="Input nilai Skala Likert" name="nilai" data-parsley-required="true" data-parsley-unique="true" />
                                                    </div>
                                                    <div class="form-group mandatory">
                                                        <label for="keterangan" class="form-label">Keterangan</label>
                                                        <input type="text" id="keterangan" class="form-control" placeholder="Input Keterangan Skala Likert" name="keterangan" data-parsley-required="true" />
                                                    </div>
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
                <!-- // Basic multiple Column Form section end -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">Jquery Datatable</div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                        <th colspan="2">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($skalalikert as $sl) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $sl->nilai; ?></td>
                                            <td><?= $sl->keterangan; ?></td>
                                            <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')"><?= anchor('admin/hapusskalalikert/' . $sl->id_skalalikert, '<div class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"> </i></div>'); ?>
                                            </td>
                                            <td><?= anchor('admin/editskalalikert/' . $sl->id_skalalikert, '<div class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></div>'); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>


            </div>
    </section>
</div>