<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">

                            <div class="card">
                                <!-- <div class="card-content"> -->
                                <!-- </div> -->

                                <div id="priode" class="card-content">
                                    <div class="card-body">
                                        <div class="tab">
                                            <button class="tablinks btn btn-primary me-1 mb-1 mt-4 " onclick="openCity(event, 'priode')" id="defaultOpen">Priode</button>
                                            <button class="tablinks btn btn-primary me-1 mb-1 mt-4" onclick="openCity(event, 'lengkap')">Keseluruhan</button>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <?= $this->session->flashdata('message'); ?>
                                        </div>
                                        <form class="form" action="<?= base_url('laporan/detail'); ?>" method="GET" data-parsley-validate>
                                            <div class="row">
                                                <h4><b>Priode</b></h4>
                                                <div class="col-lg-6 col-6">
                                                    <div class="form-group mandatory">
                                                        <label for="tanggal" class="form-label">Dari Tanggal</label>
                                                        <input type="date" id="tanggal_mulai" class="form-control" placeholder="Input tanggal mulai pendidikan" name="tanggal_mulai" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-6">
                                                    <div class="form-group mandatory">
                                                        <label for="tanggal_akhir" class="form-label">Sampai Tanggal</label>
                                                        <input type="date" id="tanggal_akhir" class="form-control" placeholder="Input tanggal_akhir pendidikan" name="tanggal_akhir" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                                            Lihat Laporan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div id="lengkap" class="card-content">
                                    <div class="card-body">
                                        <div class="tab">
                                            <button class="tablinks btn btn-primary me-1 mb-5 mt-4 " onclick="openCity(event, 'priode')" id="defaultOpen">Priode</button>
                                            <button class="tablinks btn btn-primary me-1 mb-5 mt-4" onclick="openCity(event, 'lengkap')">Keseluruhan</button>
                                            <br>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <?= $this->session->flashdata('message'); ?>
                                        </div>
                                        <form class="form" action="<?= base_url('laporan/detail'); ?>" method="POST" data-parsley-validate>
                                            <div class="row">
                                                <h4><b>Keseluruhan</b></h4>
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                                            Lihat Laporan
                                                        </button>
                                                    </div>
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