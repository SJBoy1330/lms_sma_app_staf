<!-- Begin page -->
<main class="h-100 py-0">

    <!-- main page content -->
    <div class="main-container container top-20">
        <div class="row mt-3">
            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                <?php if ($result) : ?>
                    <div class="row mb-3 px-1">
                        <div class="col align-self-center">
                            <h6 class="title">Jadwal Pelajaran</h6>
                        </div>
                        <div class="col-auto align-self-center">
                            <select onchange="get_jadwal(this)" class="form-select form-select-solid rounded-10 border-0" aria-label="Default select example">
                                <?php foreach (day_from_number() as $kode => $value) : ?>
                                    <option value="<?= $kode; ?>" <?php if ($kode == date('N')) {
                                                                        echo 'selected';
                                                                    } ?>><?= $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div id="display_jadwal">
                        <?php foreach ($result as $row => $loop) : ?>
                            <div data-page="jadwal-<?= $row ?>" class="row zoom-filter  <?php if ($row == date('N')) {
                                                                                            echo 'showing';
                                                                                        } else {
                                                                                            echo 'hiding';
                                                                                        } ?>">
                                <?php if ($loop) : ?>
                                    <?php foreach ($loop as $jadwal) : ?>
                                        <?php if ($jadwal->kegiatan_lain != NULL || $jadwal->nama_pelajaran != NULL) : ?>
                                            <div class="col-12 mx-auto">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                                                    <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                                                        <i class="fa-brands fa-stack-overflow size-24 text-white"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col align-self-center ps-0">
                                                                <?php if ($jadwal->kbm == 'Y' && $jadwal->jadwal == true) : ?>
                                                                    <p class="mb-0 size-13 fw-normal text-secondary">Mata Pelajaran</p>
                                                                    <p class="mb-0 size-14 fw-normal"><?= ifnull($jadwal->nama_pelajaran, ' - '); ?></p>
                                                                <?php else : ?>
                                                                    <p class="mb-0 size-13 fw-normal text-secondary">Kegiatan</p>
                                                                    <p class="mb-0 size-14 fw-normal"><?= ifnull($jadwal->kegiatan_lain, ' - '); ?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                                                    <div class="avatar avatar-40 rounded-15 avatar-presensi-inline" style="line-height: 44px;">
                                                                        <i class="fa-solid fa-clock size-24 text-white"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto align-self-center ps-0">
                                                                <?php if ($jadwal->kbm == 'Y' && $jadwal->jadwal == true) : ?>
                                                                    <p class="mb-0 size-13 fw-normal text-secondary">Jam Pelajaran</p>
                                                                <?php else : ?>
                                                                    <p class="mb-0 size-13 fw-normal text-secondary">Waktu</p>
                                                                <?php endif; ?>
                                                                <p class="mb-0 size-14 fw-normal"><?= ifnull($jadwal->jam_mulai); ?> - <?= ifnull($jadwal->jam_selesai, ' - '); ?></p>
                                                            </div>
                                                        </div>
                                                        <?php if ($jadwal->kbm == 'Y' && $jadwal->jadwal == true) : ?>
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                                                            <i class="fa-solid fa-chalkboard-user size-20 text-white"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col align-self-center ps-0">
                                                                    <p class="mb-0 size-13 fw-normal text-secondary">Kelas</p>
                                                                    <p class="mb-0 size-14 fw-normal"><?= ifnull($jadwal->nama_kelas, ' - '); ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?= vector_default('vector_jadwal_kosong.svg', 'Tidak ada jadwal', 'Tidak ada jadwal tersedia hari ini, coba pilih hari lain atau hubungi pihak sekolah!') ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php else : ?>
                    <?= vector_default('vector_jadwal_kosong.svg', 'Jadwal tidak tersedia', 'Tidak ada jadwal tersedia, coba pilih hari lain atau hubungi pihak sekolah!') ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <!-- main page content ends -->


</main>
<!-- Page ends-->