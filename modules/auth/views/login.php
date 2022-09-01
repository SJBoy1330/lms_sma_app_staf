<!-- Begin page content -->
<main class="container-fluid h-100 welcome">
    <div class="row h-100">
        <div class="col-11 col-sm-11 mx-auto">

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
                            <!-- <a href="signup.html">Sing up</a> -->
                        </div>
                    </div>
                </header>
            </div>

        </div>

        <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
            <form id="form_login" method="POST" action="<?= base_url('func_auth/login_proses'); ?>">
                <div class="text-center my-5">
                    <p class="mb-1 title-1">Log in App Staf</p>
                    <p class="mb-0 fw-600 size-18 title-2">Masuk dengan Kode sekolah, ID pengguna dan Kata sandi</p>
                </div>

                <div class="mb-4" id="req_kode_sekolah">
                    <label for="kode_sekolah" class="form-label title-3">Kode Sekolah</label>
                    <input type="text" class="form-control form-control-pribadi" id="kode_sekolah" name="kode_sekolah" placeholder="Masukkan kode sekolah" autocomplete="off">
                </div>

                <div class="mb-4" id="req_username">
                    <label for="username" class="form-label title-3">ID Pengguna</label>
                    <input type="text" class="form-control form-control-pribadi" id="username" name="username" placeholder="Masukkan ID pengguna" autocomplete="off">
                </div>

                <div class="form-group mb-4" id="req_kata_sandi">
                    <label for="kata_sandi" class="form-label title-3">Kata Sandi</label>
                    <div class="wrapper-password d-flex">
                        <input type="password" class="form-control form-control-pribadi" name="kata_sandi" id="kata_sandi" placeholder="Masukkan kata sandi" autocomplete="off">

                        <div class="input-group-append show-hide">

                            <span class="input-group-text" onclick="password_show_hide();">

                                <i class="bi bi-eye" id="show_eye"></i>

                                <i class="bi bi-eye-slash d-none" id="hide_eye"></i>

                            </span>

                        </div>
                    </div>
                </div>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <label class="form-check-label fw-600" for="flexCheckDefault">
                        <input class="form-check-input form-check-input-pribadi me-1" type="checkbox" value="" id="flexCheckDefault">
                        Ingat saya
                    </label>

                    <!-- <a href="<?= base_url('auth/send_email'); ?>" onclick="unreload(this)" class="label-merah">
                        Lupa kata sandi?
                    </a> -->

                    <a href="#" onclick="unreload(this)" class="label-merah">
                        Lupa kata sandi?
                    </a>
                </div>
            </form>
        </div>
        <div class="col-11 col-sm-11 mt-auto mx-auto pt-4 pb-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-center d-grid">
                    <button type="button" id="button_submit" onclick="submit_form(this,'#form_login')" class="btn btn-lg shadow-sm btn-pribadi">Masuk</button>
                </div>
            </div>
        </div>
    </div>
</main>