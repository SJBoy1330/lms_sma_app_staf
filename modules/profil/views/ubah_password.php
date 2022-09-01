<!-- comment -->
<div class="row mx-2">
    <div class="col-12">
        <div class="row">
            <div class="col-12 text-center">
                <img src="<?= base_url('assets/images/ubah-sandi.svg') ?>" alt="" width="250">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <h3>Ubah Kata Sandi?</h3>
                <span class="text-secondary">Silahkan isi inputan dibawah ini</span>
            </div>
        </div>
        <form class="row" method="POST" action="<?= base_url('func_profil/ubah_password_proses'); ?>" id="form_update_password">
            <div class="form-group mb-4" id="req_nowpassword">
                <label for="kata_sandi" class="form-label title-3">Kata sandi sekarang</label>
                <div class="wrapper-password d-flex">
                    <input type="password" class="form-control form-control-pribadi text-start" name="nowpassword" id="nowpassword" placeholder="Masukkan kata sandi sekarang" autocomplete="off">

                    <div class="input-group-append show-hide">

                        <span class="input-group-text bg-f5f5f5 border-0 show-hide">
                            <i class="bi bi-eye" id="togglePasswordNow" style="cursor: pointer"></i>
                        </span>

                    </div>
                </div>
            </div>

            <div class="form-group mb-4" id="req_newpassword">
                <label for="kata_sandi" class="form-label title-3">Kata sandi baru</label>
                <div class="wrapper-password d-flex">
                    <input type="password" class="form-control form-control-pribadi text-start" name="newpassword" id="newpassword" placeholder="Masukkan kata sandi baru" autocomplete="off">

                    <div class="input-group-append show-hide">

                        <span class="input-group-text bg-f5f5f5 border-0 show-hide">
                            <i class="bi bi-eye" id="togglePasswordNew" style="cursor: pointer"></i>
                        </span>

                    </div>
                </div>
            </div>

            <div class="form-group mb-4" id="req_repeat_newpassword">
                <label for="kata_sandi" class="form-label title-3">Ulangi kata sandi</label>
                <div class="wrapper-password d-flex">
                    <input type="password" class="form-control form-control-pribadi text-start" name="repeat_newpassword" id="repeat-newpassword" placeholder="Masukkan kata sandi baru" autocomplete="off">

                    <div class="input-group-append show-hide">

                        <span class="input-group-text bg-f5f5f5 border-0 show-hide">
                            <i class="bi bi-eye" id="togglePasswordRe" style="cursor: pointer"></i>
                        </span>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-11 col-sm-11 mt-auto mx-auto pt-4 pb-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center d-grid">
                <button type="button" id="button_submit" onclick="submit_form(this,'#form_update_password')" class="w-100 py-3 rounded-pill btn btn-primary bg-ec3528 border-white size-10 fw-medium btn-simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

</div>
<!-- main page content ends -->
</main>