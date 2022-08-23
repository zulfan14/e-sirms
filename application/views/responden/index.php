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
                                        <form class="form" data-parsley-validate action="<?= base_url('kriteria/tambah_kriteria'); ?>" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="nama" class="form-label">Nama Kriteria</label>
                                                        <input type="text" id="nama" class="form-control" placeholder="Input Nama Variabel" name="nama" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="nama" class="form-label">Variabel</label>
                                                        <select name="variabel" id="variabel" class="form-control" data-parsley-required="true">
                                                            <?php foreach ($variabel as $vb) : ?>
                                                                <option value="<?= $vb->id_variabel; ?>"><?= $vb->nm_variabel; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <!-- <input type="text" id="nama" class="form-control" placeholder="Input Nama Variabel" name="nama" data-parsley-required="true" /> -->
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
                        <div class="card-header">Jquery Datatable</div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Nama Variabel</th>
                                        <th colspan="2">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kriteria as $kt) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $kt->nama_kriteria; ?></td>
                                            <td><?= $kt->nm_variabel; ?></td>
                                            <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')"><?= anchor('admin/hapuskriteria/' . $kt->id_kriteria, '<div class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"> </i></div>'); ?>
                                            </td>
                                            <td><?= anchor('admin/editkriteria/' . $kt->id_kriteria, '<div class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></div>'); ?>
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