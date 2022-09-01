<!-- main page content -->
<div class="main-container container">
    <!-- comment -->
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div class="image-profile position-relative text-center">
                <figure id="photouser" class="avatar avatar-125 rounded-35 shadow-sm position-relative avatar-profile" style="background-position: center; background-size: cover; background-image: url('<?= $foto; ?>');">
                    <!-- <img src="" alt="" class="rounded-20" id="photouser"> -->
                </figure>
                <label for="photo" class="custom-profile-upload position-absolute top-100 start-100 bg-ec3528 rounded-15 icon-box-profile d-flex justify-content-center align-items-center fs-3 text-light">
                    <i class="bi bi-plus-lg lg-size-myicon"></i>
                </label>
                <input id="photo" type="file" onchange="previewImage()" accept="image/*" />
            </div>
        </div>
        <div class="col-12 text-center mt-2 mb-3">
            <span class="fw-bold size-18"><?= $nama; ?></span>
            <p class="size-12"><?= $role;; ?></p>
        </div>
    </div>


    <div class="row">
        <div class="col-12 px-0">
            <div class="box-fiture">
                <a href="<?= base_url('profil/ubah_profil') ?>" class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="d-flex col-auto align-items-center ">
                            <div class="bg-ec3528 rounded-10 icon-box-profile d-flex justify-content-center align-items-center fs-3 text-light">
                                <i class="fa-solid fa-user size-18"></i>
                            </div>
                        </div>
                        <div class="col align-self-center p-0">
                            <p class="mb-0 fw-bold size-14">Ubah Profil</p>
                            <p class="text-secondary size-12">
                                Nis, Nama lengkap, Gender, dll
                            </p>
                        </div>
                        <div class="col-auto d-flex justify-content-end align-items-center ps-0">
                            <div class="fs-3">
                                <i class="fa-solid fa-chevron-right size-14"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="<?= base_url('profil/ubah_password') ?>" class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="d-flex col-auto align-items-center ">
                            <div class="bg-ec3528 rounded-10 icon-box-profile d-flex justify-content-center align-items-center fs-3 text-light">
                                <i class="fa-solid fa-key-skeleton size-18"></i>
                            </div>
                        </div>
                        <div class="col align-self-center p-0">
                            <p class="mb-0 fw-bold size-14">Ubah Kata Sandi</p>
                            <p class="text-secondary size-12">
                                perubahan kata sandi lama
                            </p>
                        </div>
                        <div class="col-auto d-flex justify-content-end align-items-center ps-0">
                            <div class="fs-3">
                                <i class="fa-solid fa-chevron-right size-14"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="<?= base_url('profil/laporan_presensi') ?>" class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="d-flex col-auto align-items-center ">
                            <div class="bg-ec3528 rounded-10 icon-box-profile d-flex justify-content-center align-items-center fs-3 text-light">
                                <i class="fa-solid fa-calendars size-1"></i>
                            </div>
                        </div>
                        <div class="col align-self-center p-0">
                            <p class="mb-0 fw-bold size-14">Laporan Presensi</p>
                            <p class="text-secondary size-12">
                                Data kehadiran staf dan siswa
                            </p>
                        </div>
                        <div class="col-auto d-flex justify-content-end align-items-center ps-0">
                            <div class="fs-3">
                                <i class="fa-solid fa-chevron-right size-14"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <?php if ($wali_kelas == true) : ?>
                    <a href="<?= base_url('profil/laporan_wali_kelas'); ?>" class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                        <div class="row p-2">
                            <div class="d-flex col-auto align-items-center ">
                                <div class="bg-ec3528 rounded-10 icon-box-profile d-flex justify-content-center align-items-center fs-3 text-light">
                                    <i class="fa-solid fa-calendars size-1"></i>
                                </div>
                            </div>
                            <div class="col align-self-center p-0">
                                <p class="mb-0 fw-bold size-14">Laporan Wali Kelas</p>
                                <p class="text-secondary size-12">
                                    Data wali Kelas
                                </p>
                            </div>
                            <div class="col-auto d-flex justify-content-end align-items-center ps-0">
                                <div class="fs-3">
                                    <i class="fa-solid fa-chevron-right size-14"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
                <a href="<?= base_url('profil/tentang_sekolah'); ?>" class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="d-flex col-auto align-items-center ">
                            <div class="bg-ec3528 rounded-10 icon-box-profile d-flex justify-content-center align-items-center fs-3 text-light">
                                <i class="fa-solid fa-school size-18  "></i>
                            </div>
                        </div>
                        <div class="col align-self-center p-0">
                            <p class="mb-0 fw-bold size-14">Tentang Sekolah</p>
                            <p class="text-secondary size-12">
                                Sejarah, Tempat, dll
                            </p>
                        </div>
                        <div class="col-auto d-flex justify-content-end align-items-center ps-0">
                            <div class="fs-3">
                                <i class="fa-solid fa-chevron-right size-14"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="<?= base_url('profil/bantuan'); ?>" class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="d-flex col-auto align-items-center ">
                            <div class="bg-ec3528 rounded-10 icon-box-profile d-flex justify-content-center align-items-center fs-3 text-light">
                                <i class="fa-solid fa-comment-question size-18"></i>
                            </div>
                        </div>
                        <div class="col align-self-center p-0">
                            <p class="mb-0 fw-bold size-14">Bantuan</p>
                            <p class="text-secondary size-12">
                                Informasi lengkap aplikasi
                            </p>
                        </div>
                        <div class="col-auto d-flex justify-content-end align-items-center ps-0">
                            <div class="fs-3">
                                <i class="fa-solid fa-chevron-right size-14"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="<?= base_url('auth/logout') ?>" class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3 question_alert" <?= alert_question('KONFIRMASI', 'Apakah anda akan keluar dari aplikasi KlasQ Staf ?', 'question') ?>>
                    <div class="row p-2">
                        <div class="d-flex col-auto align-items-center ">
                            <div class="bg-ec3528 rounded-10 icon-box-profile d-flex justify-content-center align-items-center fs-3 text-light">
                                <i class="fa-solid fa-right-from-bracket size-18  "></i>
                            </div>
                        </div>
                        <div class="col align-self-center p-0">
                            <p class="mb-0 fw-bold size-14">Keluar</p>
                        </div>
                        <div class="col-auto d-flex justify-content-end align-items-center ps-0">
                            <div class="fs-3">
                                <i class="fa-solid fa-chevron-right size-14"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
<!-- main page content ends -->
</main>