<!-- main page content -->
<div class="main-container container position-relative">
    <div class="row mb-3" id="display_jurnal">
        <form id="form_edit_jurnal" action=" <?= base_url('func_jurnal/edit_jurnal_guru') ?>" method="POST" class="col-12">
            <input type="hidden" name="id_pelajaran" value="<?= $id_pelajaran; ?>">
            <input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
            <input type="hidden" name="tanggal" value="<?= $tanggal; ?>">
            <?php if ($tanggal == date('Y-m-d')) : ?>
                <a id="edit_jurnal" onclick="edit_jurnal()" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed <?php if ($result->jurnal->status == false) {
                                                                                                                                                                    echo 'd-none';
                                                                                                                                                                } ?>">
                    <i class="fa-solid fa-plus-large  size-26 text-white mt-1"></i>
                </a>
                <a id="save_jurnal" onclick="submit_form(this,'#form_edit_jurnal',0,'big')" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed <?php if ($result->jurnal->status == true) {
                                                                                                                                                                                                    echo 'd-none';
                                                                                                                                                                                                } ?>">
                    <i class="fa-solid fa-check size-26 text-white mt-1"></i>
                </a>
            <?php endif; ?>
            <div class="row mb-3">
                <a href="#">
                    <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden mb-3 p-3">
                        <div class="row py-1 px-2 mb-2 ">
                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                        <i class="fa-brands fa-stack-overflow size-22 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Mata Pelajaran</p>
                                <p class="mb-0 fw-normal size-15"><?= $result->detail->pelajaran; ?></p>
                            </div>
                        </div>
                        <div class="row py-1 px-2 mb-2">
                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-circle avatar-presensi-inline" style="line-height: 43px;">
                                        <i class="fa-solid fa-building-user size-16 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Kelas</p>
                                <p class="mb-0 fw-normal size-15"><?= $result->detail->kelas; ?></p>
                            </div>
                        </div>
                        <div class="row py-1 px-2 mb-2">
                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-circle avatar-presensi-inline" style="line-height: 43px;">
                                        <i class="fa-solid fa-building-user size-16 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Tanggal</p>
                                <p class="mb-0 fw-normal size-15"><?= day_from_number(date('N', strtotime($tanggal))) . ', ' . date('d', strtotime($tanggal)) . ' ' . month_from_number(date('m', strtotime($tanggal))) . ' ' . date('Y', strtotime($tanggal)) ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php if ($tanggal == date('Y-m-d') || $result->jurnal->status == true) : ?>
                <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden mb-3 p-3" id="req_materi">
                    <div class="title">
                        <label class="form-label fw-medium" style="color : #EC3528;">Materi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <p id="materi_text" class="<?php if ($result->jurnal->status == false) {
                                                        echo 'd-none';
                                                    } ?>"><?= $result->jurnal->materi; ?></p>
                        <textarea id="materi_input" name="materi" class="form-control form-control-solid border-0 bg-tugas <?php if ($result->jurnal->status == true) {
                                                                                                                                echo 'd-none';
                                                                                                                            } ?>" style="height: 150px"><?= $result->jurnal->materi; ?></textarea>
                    </div>
                </div>

                <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden mb-3 p-3" id="req_kegiatan_guru">
                    <div class="title">
                        <label class="form-label fw-medium" style="color : #EC3528;">Kegiatan Guru</label>
                    </div>
                    <div class="form-floating mb-3">
                        <p id="kegiatan_guru_text" class="<?php if ($result->jurnal->status == false) {
                                                                echo 'd-none';
                                                            } ?>"><?= $result->jurnal->kegiatan_guru; ?></p>
                        <textarea id="kegiatan_guru_input" name="kegiatan_guru" class="form-control form-control-solid border-0 bg-tugas <?php if ($result->jurnal->status == true) {
                                                                                                                                                echo 'd-none';
                                                                                                                                            } ?>" style="height: 150px"><?= $result->jurnal->kegiatan_guru; ?></textarea>
                    </div>
                </div>

                <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden mb-3 p-3" id="req_kegiatan_siswa">
                    <div class="title">
                        <label class="form-label fw-medium" style="color : #EC3528;">Kegiatan Siswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <p id="kegiatan_siswa_text" class="<?php if ($result->jurnal->status == false) {
                                                                echo 'd-none';
                                                            } ?>"><?= $result->jurnal->kegiatan_siswa; ?></p>
                        <textarea id="kegiatan_siswa_input" name="kegiatan_siswa" class="form-control form-control-solid border-0 bg-tugas <?php if ($result->jurnal->status == true) {
                                                                                                                                                echo 'd-none';
                                                                                                                                            } ?>" style="height: 150px"><?= $result->jurnal->kegiatan_siswa; ?></textarea>
                    </div>
                </div>


                <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden mb-3 p-3" id="req_kegiatan_kelas">
                    <div class="title">
                        <label class="form-label fw-medium" style="color : #EC3528;">Kejadian Kelas</label>
                    </div>
                    <div class="form-floating mb-3">
                        <p id="kegiatan_kelas_text" class="<?php if ($result->jurnal->status == false) {
                                                                echo 'd-none';
                                                            } ?>"><?= $result->jurnal->kegiatan_kelas; ?></p>
                        <textarea id="kegiatan_kelas_input" name="kegiatan_kelas" class="form-control form-control-solid border-0 bg-tugas <?php if ($result->jurnal->status == true) {
                                                                                                                                                echo 'd-none';
                                                                                                                                            } ?>" style="height: 150px"><?= $result->jurnal->kegiatan_kelas; ?></textarea>
                    </div>
                </div>
            <?php else : ?>
                <?= vector_default('vector_jurnal_guru_kosong.svg', 'Anda belum mengisi jurnal guru', 'Jurnal guru hanya bisa di isikan pada hari kbm berlangsung. Hubungi admin jika terjadi kesalahan!'); ?>
            <?php endif; ?>
        </form>
    </div>
</div>
<!-- main page content ends -->
</main>