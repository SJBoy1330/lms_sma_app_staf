<!-- Header ends -->
<div class="main-container container top-20">
    <div class="row mt-3">
        <a data-bs-toggle="modal" data-bs-target="#filterTambahTugas" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed">
            <i class="fa-solid fa-plus-large size-26 text-white mt-1"></i>
        </a>
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <div class="row">
                <?php if ($result->kelas_pribadi || $result->kelas) : ?>
                    <?php if ($result->kelas_pribadi) : ?>
                        <div class="col-12 mx-auto mb-2 showing">
                            <a href="<?= base_url('tugas/pelajaran/' . $result->kelas_pribadi->id_kelas . '?wali_kelas=true'); ?>" class="card mb-3 tugas">
                                <div class="badge-keterangan-kelas">
                                    <p class="text-white size-12 fw-normal">Kelas Anda</p>
                                </div>
                                <div class="card-body bg-tugas">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                                <div class="avatar avatar-40 rounded-12 avatar-presensi-inline">
                                                    <i class="fa-solid fa-screen-users size-20 text-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="mb-0 size-15 fw-normal text-dark"><?= $result->kelas_pribadi->kelas; ?></p>
                                            <p class="mb-0 size-14 fw-normal text-muted"><?= $result->kelas_pribadi->jumlah_murid; ?> Orang</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($result->kelas) : ?>
                        <?php foreach ($result->kelas as $row) : ?>
                            <div class="col-6 mx-auto mb-2 showing">
                                <a href="<?= base_url('tugas/pelajaran/' . $row->id_kelas); ?>" class="card mb-3 tugas">
                                    <div class="card-body bg-tugas" style="height : 150px;">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center align-items-center">
                                                <div class="avatar avatar-60 shadow-sm rounded-circle avatar-presensi-outline">
                                                    <div class="avatar avatar-50 rounded-circle avatar-presensi-inline">
                                                        <i class="fa-solid fa-screen-users size-20 text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col align-self-center mt-2 text-center">
                                                <p class="mb-0 size-15 fw-normal"><?= tampil_text($row->kelas, 30); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <?= vector_default('vector_jadwal_kosong.svg', 'Tidak ada kelas', 'Tidak ada kelas yang ter integrasi dengan anda, hubungi pihak sekolah jika terjadi kesalahan!'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Filter Tambah Tugas -->
<div class="modal fade" id="filterTambahTugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen" id="parent_modal">
        <form action="<?= base_url('tugas/tambah_tugas'); ?>" enctype="multipart/form-data" method="POST" id="form_tambah_tugas" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%); border-radius:0px;">
            <div class="modal-header border-0">
                <h5 class="modal-title">Tambah Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3" id="req_id_pelajaran">
                    <input type="hidden" name="sumber" value="1">
                    <label for="select_pelajaran" class="form-label title-3">Mata Pelajaran</label>
                    <select name="id_pelajaran" class="form-select form-select form-select-pribadi border-0" id="select_pelajaran" aria-label="Default select example">
                        <?php if ($pelajaran) : ?>
                            <option value="" disabled selected hidden>Pilih pelajaran</option>
                            <?php foreach ($pelajaran as $row) : ?>
                                <option value="<?= $row->id_pelajaran ?>"><?= $row->tingkat . ' - ' . $row->pelajaran; ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value="" disabled selected hidden>Tidak ada data pelajaran</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-start align-items-start flex-wrap" id="display_tag">
                        </div>
                    </div>
                    <div class="row mt-2" id="req_id_kelas">
                        <label for="select_kelas" class="form-label title-3">Kelas</label>
                        <div class="col-12">
                            <input type="text" id="cari_kelas" onkeyup="search(this,'.target_search')" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Pilih pelajaran terlebih dahulu" autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="row mt-2 checkbox" id="display_kelas">

                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label title-3">Upload File</label>
                    <label for="attachment">
                        <input class="form-control form-control-solid form-control-tugas border-0" type="file" name="tugas[]" id="attachment" multiple />
                    </label>
                    <div class="files-area">
                        <span id="filesList">
                            <span id="files-names"></span>
                        </span>
                    </div>
                </div>

                <div class="mb-3" id="req_nama">
                    <label for="exampleFormControlInput3" class="form-label title-3">Nama Tugas</label>
                    <input type="text" name="nama" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Isikan nama tugas" autocomplete="off">
                </div>

                <div class="mb-3" id="req_batas_waktu">
                    <label for="exampleFormControlInput3" class="form-label title-3">Batas Waktu</label>
                    <input name="batas_waktu" class="form-control form-control-solid form-control-pribadi border-0 ps-12" type="datetime-local" placeholder="Isikan batas waktu" />
                </div>

                <div>
                    <label for="exampleFormControlInput3" class="form-label title-3">Keterangan</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="keterangan" class="form-control form-control-solid border-0" placeholder="Isikan keterangan" id="keterangan" style="height: 100px"></textarea>
                </div>

                <div>
                    <label class="form-label title-3">Boleh Terlambat</label>
                </div>
                <div class="form-check form-switch">
                    <input name="izin_terlambat" value="Y" class=" form-check-input" type="checkbox" id="boleh_terlambat">
                    <label class="form-check-label mt-1 ps-2" for="boleh_terlambat">Ijinkan</label>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" id="button_tambah_tugas" onclick="submit_form(this,'#form_tambah_tugas',0,'big')" class="btn btn-block btn-md btn-danger btn-filter">Simpan</button>
            </div>
        </form>
    </div>
</div>
</main>