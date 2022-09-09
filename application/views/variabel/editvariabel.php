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
                                        <?php foreach ($variabel as $vb) : ?>
                                            <form class="form" action="<?= base_url('variabel/update_variabel'); ?>" method="POST" data-parsley-validate>
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="nama" class="form-label">Nama Variabel</label>
                                                            <input type="hidden" id="id_variabel" class="form-control" placeholder="Input id_variabel Variabel" name="id_variabel" value="<?= $vb->id_variabel; ?>" data-parsley-required="true" />
                                                            <input type="text" id="nama" class="form-control" placeholder="Input Nama Variabel" name="nama" value="<?= $vb->nm_variabel; ?>" data-parsley-required="true" />
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
                                        <?php endforeach; ?>
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