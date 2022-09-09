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
                                        <form class="form" data-parsley-validate action="<?= base_url('skalalikert/update_skalalikert'); ?>" method="POST">
                                            <?php foreach ($skalalikert as $kt) : ?>
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="nama" class="form-label">Nama skalalikert</label>
                                                            <input type="hidden" id="id_skalalikert" class="form-control" placeholder="Input id_skalalikert Variabel" name="id_skalalikert" value="<?= $kt->id_skalalikert; ?>" data-parsley-required="true" />
                                                            <input type="number" id="nilai" class="form-control" placeholder="Input nilai skalalikert" name="nilai" value="<?= $kt->nilai; ?>" data-parsley-required="true" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="keterangan" class="form-label">keterangan </label>
                                                            <input type="text" id="keterangan" class="form-control" placeholder="Input keterangan skalalikert" name="keterangan" value="<?= $kt->keterangan; ?>" data-parsley-required="true" />
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