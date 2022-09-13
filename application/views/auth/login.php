<body>


    <!-- <div class="container"> -->
    <div class="container" style="height: 100vh;">
        <div class="row justify-content-center align-items-center h-100">
            <div class="card col-md-5 col-sm-8">
                <!-- <div class="card-header">
                <h4 class="card-title">Single Layout</h4>
            </div> -->
                <div class="card-header">
                    <h4>HARAP LOGIN TERLEBIH DAHULU</h4>

                    <?= $this->session->flashdata('message'); ?>

                </div>
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-10 col-10">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="<?= base_url('auth'); ?>" method="POST">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>username</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Username Anda" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                                            LOGIN
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
            </div>
        </div>
    </div>
</body>

</html>