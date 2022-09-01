<div class="row mx-2">
    <div class="col-12">
        <form action="<?= base_url('func_profil/edit_profil_proses') ?>" id="form_ubah_profil" method="POST" class="row g-3 mt-1">
            <?php if ($result->nis) : ?>
                <div class="col-12">
                    <label for="nis" class="form-label fw-bold size-14">Nomer Induk Siswa (NIS)</label>
                    <input type="text" class="form-control form-control-pribadi text-start" id="nis" value="<?= $result->nis; ?>" placeholder="Masukan NIS" autocomplete="off" readonly>
                </div>
            <?php endif; ?>
            <?php if ($result->nisn) : ?>
                <div class="col-12">
                    <label for="nis" class="form-label fw-bold size-14">Nomer Induk Siswa Nasional (NISN)</label>
                    <input type="text" class="form-control form-control-pribadi text-start" id="nis" value="<?= $result->nisn; ?>" placeholder="Masukan NISN" autocomplete="off" readonly>
                </div>
            <?php endif; ?>
            <div class="col-12" id="req_username">
                <label for="username" class="form-label fw-bold size-14">ID Pengguna</label>
                <input type="text" name="username" class="form-control form-control-pribadi text-start" id="username" value="<?= $result->username; ?>" placeholder="Masukan ID Pengguna" autocomplete="off">
            </div>
            <div class="col-12" id="req_nama">
                <label for="nama" class="form-label fw-bold size-14">Nama lengkap</label>
                <input type="text" name="nama" class="form-control form-control-pribadi text-start" id="nama" value="<?= $result->nama; ?>" placeholder="Masukan nama lengkap" autocomplete="off">
            </div>
            <div class="col-12" id="req_gender">
                <label class="form-label fw-bold size-14">Gender</label>
                <div class="row">
                    <div class="col bg-f5f5f5 mx-2 py-2 d-flex align-items-center rounded-10 gender-laki">
                        <input class="form-check-input p-2 m-0 bg-grey border-white" type="radio" value="L" name="gender" id="gender" autocomplete="off" <?php if ($result->gender == 'L') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }  ?>>
                        <label class="ms-2 form-check-label size-14 text-secondary" for="gender">
                            laki-laki
                        </label>
                    </div>
                    <div class="col bg-f5f5f5 mx-2 py-2 d-flex align-items-center rounded-10 gender-perempuan">
                        <input class="form-check-input p-2 m-0 bg-grey border-white" type="radio" value="P" name="gender" id="gender2" autocomplete="off" <?php if ($result->gender == 'P') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }  ?>>
                        <label class="ms-2 form-check-label size-14 text-secondary" for="gender2">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-12" id="req_alamat">
                <label for="alamat" class="form-label fw-bold size-14">Alamat</label>
                <input type="text" name="alamat" class="form-control form-control-pribadi text-start" id="alamat" value="<?= $result->alamat; ?>" placeholder="Masukan alamat rumah" autocomplete="off">
            </div>
            <div class="col-12" id="req_telp">
                <label for="nohp" class="form-label fw-bold size-14">No. Telepon</label>
                <div class="d-flex">
                    <span class="kode-negara d-flex justify-content-center align-items-center">+62</span>
                    <input type="text" name="telp" class="form-control form-control-pribadi nomor-telepon text-start" id="nohp" value="<?= $result->telp; ?>" placeholder="Masukan nomor telepon">
                </div>
            </div>
            <div class="col-12 mb-4" id="req_email">
                <label for="email" class="form-label fw-bold size-14">Email</label>
                <input type="text" name="email" class="form-control form-control-pribadi text-start" id="email" value="<?= $result->email; ?>" placeholder="Masukan email anda" autocomplete="off">
            </div>
        </form>
    </div>

    <div class="col-11 col-sm-11 mt-auto mx-auto pt-4 pb-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center d-grid">
                <button type="button" id="button_submit_profil" onclick="submit_form(this,'#form_ubah_profil')" class="w-100 py-3 rounded-pill btn btn-primary bg-ec3528 border-white size-10 fw-medium btn-simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>