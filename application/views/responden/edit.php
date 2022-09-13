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
                                        <form class="form" data-parsley-validate action="<?= base_url('responden/update_responden'); ?>" method="POST">
                                            <?php foreach ($responden as $rp) : ?>
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">

                                                            <input type="hidden" id="id" class="form-control" placeholder="Input ID Responden" name="id" value="<?= $rp->id_responden; ?>" data-parsley-required="true" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="nama" class="form-label">Nama Responden</label>
                                                            <input type="text" id="nama" class="form-control" placeholder="Input Nama Responden" name="nama" value="<?= $rp->nama_responden; ?>" data-parsley-required="true" />
                                                        </div>
                                                        <!-- <div class="form-group mandatory">
                                                            <label for="password" class="form-label">Password Responden</label>
                                                            <input type="password" id="password" class="form-control" placeholder="Input password Responden" name="password" data-parsley-required="true" />
                                                        </div> -->
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="tempat" class="form-label">Tempat Lahir</label>
                                                            <input type="text" id="tempat" class="form-control" placeholder="Input tempat Lahir" name="tempat" value="<?= $rp->tempat_lahir; ?>" data-parsley-required="true" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="tanggal" class="form-label">Tanggal Lahir</label>
                                                            <input type="date" id="tanggal" class="form-control" placeholder="Input Tanggal Lahir" name="tanggal" value="<?= $rp->tanggal_lahir; ?>" data-parsley-required="true" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group mandatory">
                                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                                            <select name="pendidikan" id="pendidikan" class="form-control" data-parsley-required="true">
                                                                <?php foreach ($pendidikan as $pd) : ?>
                                                                    <?php if ($pd->id_pendidikan == $rp->id_pendidikan) :  ?>
                                                                        <option value="<?= $pd->id_pendidikan; ?>" selected><?= $pd->nama_pendidikan; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $pd->id_pendidikan; ?>"><?= $pd->nama_pendidikan; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mandatory">
                                                            <label for="jabatan" class="form-label">Jabatan</label>
                                                            <select name="jabatan" id="jabatan" class="form-control" data-parsley-required="true">
                                                                <?php foreach ($jabatan as $jb) : ?>
                                                                    <?php if ($jb->id_jabatan == $rp->id_jabatan) :  ?>
                                                                        <option value="<?= $rp->id_jabatan; ?>" selected><?= $jb->nama_jabatan; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $jb->id_jabatan; ?>"><?= $jb->nama_jabatan; ?></option>
                                                                    <?php endif; ?>
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