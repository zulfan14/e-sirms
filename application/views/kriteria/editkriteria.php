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
                                        <form class="form" data-parsley-validate action="<?= base_url('kriteria/update_kriteria'); ?>" method="POST">
                                            <?php foreach ($kriteria as $kt) : ?>
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="nama" class="form-label">Nama Kriteria</label>
                                                            <input type="hidden" id="id_kriteria" class="form-control" placeholder="Input id_kriteria Variabel" name="id_kriteria" value="<?= $kt->id_kriteria; ?>" data-parsley-required="true" />
                                                            <input type="text" id="nama" class="form-control" placeholder="Input Nama kriteria" name="nama" value="<?= $kt->nama_kriteria; ?>" data-parsley-required="true" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="nama" class="form-label">Variabel</label>
                                                            <select name="variabel" id="variabel" class="form-control" data-parsley-required="true">
                                                                <?php foreach ($variabel as $vb) : ?>
                                                                    <?php if ($vb->id_variabel == $kt->id_variabel) :  ?>
                                                                        <option value="<?= $vb->id_variabel; ?>" selected><?= $vb->nm_variabel; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $vb->id_variabel; ?>"><?= $vb->nm_variabel; ?></option>
                                                                    <?php endif; ?>

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
                                                <?php endforeach; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->

            </div>
    </section>
</div>