<!-- Begin page content -->
<main class="container-fluid h-100 ">
    <div class="row h-100">
        <div class="col-11 col-sm-11 mx-auto">
            <!-- header -->
            <div class="row">
                <header class="header">
                    <div class="row">
                        <div class="col">
                            <!-- <div class="logo-small">
                                    <img src="assets/img/logo.png" alt="" />
                                    <h5><span class="text-secondary fw-light">Finance</span><br />Wallet</h5>
                                </div> -->
                        </div>
                        <div class="col-auto align-self-center">
                            <a href="<?= base_url('auth/login') ?>" onclick="unreload(this)" class="label-merah"> Masuk <i class="bi bi-arrow-right"></i> </a>
                        </div>
                    </div>
                </header>
            </div>
            <!-- header ends -->
        </div>
        <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
            <div class="text-center">
                <img src="<?= base_url(); ?>assets/images/lupa-kata-sandi.png" width="200" class="img-fluid">
            </div>

            <div class="text-start my-5">
                <p class="mb-1 title-1">Lupa Kata Sandi ?</p>
                <p class="mb-0 fw-600 size-18 title-4">Masukkan alamat email yang terdaftar untuk mengubah kata sandi</p>
            </div>

            <div class="mb-4">
                <label for="exampleFormControlInput3" class="form-label title-3">Kode Sekolah</label>
                <input type="text" class="form-control form-control-pribadi" id="exampleFormControlInput3" placeholder="Masukkan Username" autocomplete="off">
            </div>

            <div class="mb-4">
                <label for="exampleFormControlInput4" class="form-label title-3">Email</label>
                <input type="email" class="form-control form-control-pribadi" id="exampleFormControlInput4" placeholder="Masukkan email" autocomplete="off">
            </div>
        </div>
        <div class="col-11 col-sm-11 mt-auto mx-auto pt-4 pb-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-center d-grid">
                    <a href="<?= base_url('auth/otp') ?>" onclick="unreload(this)" class="btn btn-lg shadow-sm btn-pribadi">Kirim</a>
                </div>
            </div>
        </div>
    </div>
</main>