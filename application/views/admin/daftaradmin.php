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
                                        <form class="form" data-parsley-validate action="<?= base_url('admin/tambah_admin'); ?>" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="id" class="form-label">ID Admin</label>
                                                        <input type="number" id="id" class="form-control" placeholder="Input ID Admin" name="id" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="nama" class="form-label">Username</label>
                                                        <input type="text" id="nama" class="form-control" placeholder="Input Username" name="nama" data-parsley-required="true" />
                                                    </div>
                                                    <div class="form-group mandatory">
                                                        <label for="password" class="form-label">Password Admin</label>
                                                        <input type="password" id="password" class="form-control" placeholder="Input password Admin" name="password" data-parsley-required="true" />
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

                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">Data admin</div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID admin</th>
                                        <th>Username</th>
                                        <th colspan="2">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($admin as $rp) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $rp->id_responden; ?></td>
                                            <td><?= $rp->nama_responden; ?></td>
                                            <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')"><?= anchor('admin/hapusadmin/' . $rp->id_responden, '<div class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"> </i></div>'); ?>
                                            </td>
                                            <td><?= anchor('admin/editadmin/' . $rp->id_responden, '<div class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></div>'); ?>
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