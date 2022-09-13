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
                                        <form class="form" data-parsley-validate action="<?= base_url('responden/tambah_responden'); ?>" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="id" class="form-label">ID Responden</label>
                                                        <input type="number" id="id" class="form-control" placeholder="Input ID Responden" name="id" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="nama" class="form-label">Nama Responden</label>
                                                        <input type="text" id="nama" class="form-control" placeholder="Input Nama Responden" name="nama" data-parsley-required="true" />
                                                    </div>
                                                    <div class="form-group mandatory">
                                                        <label for="password" class="form-label">Password Responden</label>
                                                        <input type="password" id="password" class="form-control" placeholder="Input password Responden" name="password" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="tempat" class="form-label">Tempat Lahir</label>
                                                        <input type="text" id="tempat" class="form-control" placeholder="Input tempat Lahir" name="tempat" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="tanggal" class="form-label">Tanggal Lahir</label>
                                                        <input type="date" id="tanggal" class="form-control" placeholder="Input Tanggal Lahir" name="tanggal" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="pendidikan" class="form-label">Pendidikan</label>
                                                        <select name="pendidikan" id="pendidikan" class="form-control" data-parsley-required="true">
                                                            <?php foreach ($pendidikan as $pd) : ?>
                                                                <option value="<?= $pd->id_pendidikan; ?>"><?= $pd->nama_pendidikan; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mandatory">
                                                        <label for="jabatan" class="form-label">Jabatan</label>
                                                        <select name="jabatan" id="jabatan" class="form-control" data-parsley-required="true">
                                                            <?php foreach ($jabatan as $jb) : ?>
                                                                <option value="<?= $jb->id_jabatan; ?>"><?= $jb->nama_jabatan; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
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
                        <div class="card-header">Data Responden</div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Responden</th>
                                        <th>Nama Responden</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Pendidikan</th>
                                        <th>Jabatan</th>
                                        <th colspan="2">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($responden as $rp) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $rp->id_responden; ?></td>
                                            <td><?= $rp->nama_responden; ?></td>
                                            <td><?= $rp->tempat_lahir; ?></td>
                                            <td><?= $rp->tanggal_lahir; ?></td>
                                            <td><?= $rp->nama_pendidikan; ?></td>
                                            <td><?= $rp->nama_jabatan; ?></td>
                                            <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')"><?= anchor('responden/hapusresponden/' . $rp->id_responden, '<div class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"> </i></div>'); ?>
                                            </td>
                                            <td><?= anchor('responden/edit_responden/' . $rp->id_responden, '<div class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></div>'); ?>
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