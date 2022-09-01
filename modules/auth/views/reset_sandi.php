<!-- Begin page content -->
<main class="container-fluid h-100 ">
    <div class="row h-100">
        <div class="col-11 col-sm-11 mx-auto">
            <!-- header -->
            <div class="row">
                <header class="header">
                    <div class="row">
                        <!-- <div class="col">
                                <div class="logo-small">
                                    <img src="<?= base_url(); ?>assets/img/logo.png" alt="" />
                                    <h5><span class="text-secondary fw-light">Finance</span><br />Wallet</h5>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                                <a href="signin-SD.html" class="label-merah"> Masuk <i class="bi bi-arrow-right"></i>  </a>
                            </div> -->
                    </div>
                </header>
            </div>
            <!-- header ends -->
        </div>
        <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
            <div class="text-center">
                <img src="<?= base_url(); ?>assets/images/reset-kata-sandi.png" width="200" class="img-fluid">
            </div>

            <div class="text-start my-5">
                <p class="mb-1 title-1">Reset Kata Sandi ?</p>
                <p class="mb-0 fw-600 size-18 title-4">Masukkan kata sandi baru dan masukkan kata sandi konfirmasi </p>
            </div>

            <div class="form-group mb-4">
                <label for="exampleFormControlInput3" class="form-label title-3">Kata sandi baru</label>
                <div class="wrapper-password d-flex">
                    <input type="password" class="form-control form-control-pribadi" name="password_new" id="passwordNew" placeholder="Masukkan kata sandi baru" autocomplete="off">

                    <div class="input-group-append show-hide">

                        <span class="input-group-text" onclick="password_show_hide_new();">

                            <i class="bi bi-eye" id="show_eye_new"></i>

                            <i class="bi bi-eye-slash d-none" id="hide_eye_new"></i>

                        </span>

                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="exampleFormControlInput3" class="form-label title-3">Konfirmasi kata sandi</label>
                <div class="wrapper-password d-flex">
                    <input type="password" class="form-control form-control-pribadi" name="password" id="passwordConfirm" placeholder="Masukkan kata sandi" autocomplete="off">

                    <div class="input-group-append show-hide">

                        <span class="input-group-text" onclick="password_show_hide_confirm();">

                            <i class="bi bi-eye" id="show_eye_confirm"></i>

                            <i class="bi bi-eye-slash d-none" id="hide_eye_confirm"></i>

                        </span>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 col-sm-11 mt-auto mx-auto pt-4 pb-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-center d-grid">
                    <a href="<?= base_url('auth/login') ?>" onclick="unreload(this)" class="btn btn-lg shadow-sm btn-pribadi">Kirim</a>
                </div>
            </div>
        </div>
    </div>
</main>