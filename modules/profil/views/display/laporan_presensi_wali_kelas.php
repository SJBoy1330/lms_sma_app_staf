<div class="col-12 mb-5">
    <h6 class="pt-3 ps-3 my-2" style="color: #EC3528;"><?= $tanggal; ?></h6>
    <?php if ($result) : ?>
        <div class="row">
            <div class="col-12 px-4">
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="row">
                            <div class="col-6 mt-3 align-self-center">

                                <div class="jam-masuk d-flex justify-content-center align-items-center">
                                    <i class="fa-regular fa-door-open" style="font-size:1.5rem; margin-right: 15px; color: #EC3528;"></i>
                                    <p class="text-secondary fw-normal size-15">Hadir
                                        <br>
                                        <span class="fw-medium size-1%" style="color: #EC3528;"><?= $result->jumlah->hadir; ?> Siswa</span>
                                    </p>
                                </div>
                                <div class="solid-line my-3"></div>

                                <div class="jam-pulang d-flex justify-content-center align-items-center">
                                    <i class="fa-regular fa-door-open" style="font-size:1.5rem; margin-right: 15px; color: #EC3528;"></i>
                                    <p class="text-secondary fw-normal size-15">Ijin
                                        <br>
                                        <span class="fw-medium size-15" style="color: #EC3528;"><?= $result->jumlah->ijin; ?> Siswa</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 mt-3 align-self-center">

                                <div class="jam-masuk d-flex justify-content-center align-items-center">
                                    <i class="fa-regular fa-door-open" style="font-size:1.5rem; margin-right: 15px; color: #EC3528;"></i>
                                    <p class="text-secondary fw-normal size-15">Sakit
                                        <br>
                                        <span class="fw-medium size-1%" style="color: #EC3528;"><?= $result->jumlah->sakit; ?> Siswa</span>
                                    </p>
                                </div>
                                <div class="solid-line my-3"></div>

                                <div class="jam-pulang d-flex justify-content-center align-items-center">
                                    <i class="fa-regular fa-door-open" style="font-size:1.5rem; margin-right: 15px; color: #EC3528;"></i>
                                    <p class="text-secondary fw-normal size-15">Alpha
                                        <br>
                                        <span class="fw-medium size-15" style="color: #EC3528;"><?= $result->jumlah->alpha; ?> Siswa</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($result->mapel != 1) : ?>
            <div class="row px-4">

                <?php if ($result->mapel != NULL) : ?>
                    <?php foreach ($result->mapel as $row) : ?>
                        <a data-bs-toggle="modal" onclick="detail_presensi(<?= $row->id_kelas; ?>,<?= $row->id_pelajaran; ?>,<?= $time; ?>)" href="#modalPresensiSiswa" class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                                <i class="fa-solid fa-calendar-range size-20 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <p class="mb-0 size-15 fw-medium"><?= $row->nama_pelajaran; ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?= vector_default("vector_jadwal_kosong.svg", "Tidak ada jadwal", "Tidak ada jadwal pada hari ini, Silahkan pilih hari lain atau hubungi pihak sekolah jika terjadi kesalahan!"); ?>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    <?php else : ?>
        <?= vector_default("vector_laporan_kosong.svg", "Tidak ada data presensi", "Tidak ditemukan data presensi hari ini, silahkan cari pada tanggal lain atau hubungi andim jika terjadi kesalahan!"); ?>
    <?php endif; ?>
</div>