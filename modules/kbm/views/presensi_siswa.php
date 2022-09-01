<!-- Header ends -->
<!-- main page content -->
<div class="main-container container top-20">
    <div class="row mt-3">
        <div class="col-12 col-md-10 col-lg-8 mx-auto" id="parent_presensi">
            <div class="row g-0" id="reload_presensi">
                <form action="<?= base_url('kbm/func_presensi') ?>" method="post" id="form_presensi" class="col-12">
                    <input type="hidden" name="id_pelajaran" value="<?= $id_pelajaran; ?>">
                    <input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
                    <input type="hidden" class="lat" name="lat" value="<?= $lat; ?>">
                    <input type="hidden" class="long" name="long" value="<?= $long; ?>">
                    <?php if ($peserta) : ?>
                        <?php foreach ($peserta as $row) : ?>
                            <div class="accordion accordion-flush p-0 shadow-sm mb-3" id="accordion-<?= $row->id_siswa; ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading-<?= $row->id_siswa; ?>">
                                        <button class="accordion-button collapsed text-wrap bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?= $row->id_siswa; ?>" aria-expanded="false" aria-controls="flush-collapse-<?= $row->id_siswa; ?>" style="border-radius: 10px;">
                                            <?php if ($row->presensi > 1) : ?>
                                                <div class="badge-ijin">
                                                    <p class="text-white size-12">
                                                        <?php
                                                        if ($row->presensi == 2) {
                                                            echo 'Ijin';
                                                        } else {
                                                            echo 'Sakit';
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            <?php elseif ($row->presensi == 1) : ?>
                                                <div class="badge-hadir">
                                                    <p class="text-white size-12">
                                                        <?= $row->jam_hadir; ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded-circle avatar-pesan">
                                                        <img src="<?= $row->foto; ?>" alt="" load="lazy">
                                                    </div>
                                                </div>
                                                <div class="col align-self-center ps-0 presensi-siswa">
                                                    <p class="mb-0 size-14 fw-medium" style="width: 70%;"><?= $row->nama; ?></p>
                                                    <p class="text-muted text-secondary size-12">Status Kehadiran</p>
                                                </div>
                                            </div>
                                        </button>

                                    </h2>
                                    <div id="flush-collapse-<?= $row->id_siswa; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-<?= $row->id_siswa; ?>">
                                        <input type="hidden" name="status-presensi-<?= $row->id_siswa; ?>" value="<?php if ($row->presensi == 1) {
                                                                                                                        echo 1;
                                                                                                                    } else {
                                                                                                                        echo 0;
                                                                                                                    } ?>">
                                        <input type="hidden" name="id_siswa[]" value="<?= $row->id_siswa; ?>">
                                        <div class="accordion-body size-11">
                                            <div class="row mb-3 ps-4">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="1" name="presensi-<?= $row->id_siswa; ?>" id="presensi-haadir-<?= $row->id_siswa; ?>" <?php if ($row->presensi == 1) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    } ?>>
                                                        <label class="form-check-label size-15 fw-normal" for="presensi-haadir-<?= $row->id_siswa; ?>">
                                                            Hadir
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="3" name="presensi-<?= $row->id_siswa; ?>" id="presensi-sakit-<?= $row->id_siswa; ?>" <?php if ($row->presensi == 3) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    } ?>>
                                                        <label class="form-check-label size-15 fw-normal" for="presensi-sakit-<?= $row->id_siswa; ?>">
                                                            Sakit
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ps-4">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="3" name="presensi-<?= $row->id_siswa; ?>" id="presensi-ijin-<?= $row->id_siswa; ?>" <?php if ($row->presensi == 2) {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                } ?>>
                                                        <label class="form-check-label size-15 fw-normal" for="presensi-ijin-<?= $row->id_siswa; ?>">
                                                            Ijin
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="0" name="presensi-<?= $row->id_siswa; ?>" id="presensi-alpha-<?= $row->id_siswa; ?>" <?php if ($row->presensi == 0 || $row->presensi == NULL) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    } ?>>
                                                        <label class="form-check-label size-15 fw-normal" for="presensi-alpha-<?= $row->id_siswa; ?>">
                                                            Alpha
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($row->presensi > 1) : ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <?php if ($row->surat) : ?>
                                                            <button data-bs-toggle="modal" type="button" data-bs-target="#modalLihatSuratIzin" class="btn btn-block btn-md btn-danger btn-surat-izin">Lihat surat</button>
                                                        <?php else : ?>
                                                            <button type="button" class="btn btn-block btn-md btn-danger btn-surat-izin" disabled>Tidak ada surat</button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?= vector_default('vector_jadwal_kosong.svg', 'Tidak ada siswa terkait', 'Belum ada siswa yang terkait dengan kelas ini! Hubungi admin atau pihak sekolah jika terjadi kesalahan'); ?>
                    <?php endif; ?>
                    <div class="wrapper-button">
                        <button type="button" id="button_submit_presensi" onclick="submit_form(this,'#form_presensi',0,'big')" class="btn btn-block btn-md btn-danger btn-filter button_get_lokasi_siswa">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</main>



<div class="modal fade show" id="modalLihatSuratIzin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-4">
                <h5 class="modal-title">Detail Surat Izin</h5>
                <button type="button" class="btn-close me-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mb-0 pb-0">
                <div class="row">
                    <!-- jika surat izin berupa gambar -->
                    <div class="col-12">
                        <figure class="overflow-hidden rounded-15 text-center detail-pengumuman" style="background-position: center; background-size: cover; background-image: url('<?= base_url('assets/img/categories1.png') ?>');">
                        </figure>
                    </div>
                    <!-- Jika surat izin berupa file -->
                    <div class="col-12">
                        <figure class="overflow-hidden rounded-15 text-center" style="background-color: #FFE6E6; padding: 40px;">
                            <i class="fa-solid fa-file-pdf" style="font-size: 7rem;"></i>
                        </figure>
                        <a class="btn btn-block btn-md btn-filter" href="#">DOWNLOAD</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center border-0 mt-0 pt-0">
            </div>
        </div>
    </div>
</div>