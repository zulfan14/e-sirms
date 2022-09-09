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
                                        <form class="form" data-parsley-validate action="<?= base_url('admin/editpassword'); ?>" method="POST">
                                            <div class="row">

                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="password" class="form-label">Password Lama</label>
                                                        <input type="password" id="password" class="form-control" placeholder="Input password Admin" name="password" data-parsley-required="true" />
                                                    </div>
                                                    <div class="form-group mandatory">
                                                        <label for="npassword" class="form-label">Password Baru</label>
                                                        <input type="password" id="npassword" class="form-control" placeholder="Input password Admin" name="npassword" data-parsley-required="true" />
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
            </div>
    </section>
</div>