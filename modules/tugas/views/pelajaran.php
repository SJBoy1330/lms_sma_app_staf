<!-- Header ends -->
<div class="main-container container top-20">
    <div class="row mt-3">
        <a data-bs-toggle="modal" data-bs-target="#filterTambahTugas" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed">
            <i class="fa-solid fa-plus-large size-26 text-white mt-1"></i>
        </a>
        <div class="col-12">
            <?php if ($result) : ?>
                <?php foreach ($result as $row) : ?>
                    <a href="<?= base_url('tugas/tugas_sekolah/' . $row->id_kelas . '/' . $row->id_pelajaran . $wali_kelas); ?>" class="card mb-3 showing">
                        <div class="card-body bg-tugas-pelajaran">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                            <i class="fa-solid fa-building-user size-18 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-13 fw-medium text-dark"><?= $row->pelajaran; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <?= vector_default('vector_kbm_kosong.svg', 'Tidak ada pelajaran terkait', 'Tidak ada pelajaran anda yang terkait dengan kelas ini, hubungi pihak sekolah jika terjadi kesalahan !'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
</main>

<!-- Filter Tambah Tugas -->
<div class="modal fade" id="filterTambahTugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <form action="<?= base_url('tugas/tambah_tugas'); ?>" enctype="multipart/form-data" method="POST" id="form_tambah_tugas" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%); border-radius:0px;">
            <div class="modal-header border-0">
                <h5 class="modal-title">Tambah Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="sumber" value="2">
                <div class="mb-3" id="req_id_pelajaran">
                    <label for="select_pelajaran" class="form-label title-3">Mata Pelajaran</label>
                    <select name="id_pelajaran" class="form-select form-select form-select-pribadi border-0" aria-label="Default select example">
                        <?php if ($result) : ?>
                            <option value="" disabled selected hidden>Pilih pelajaran</option>
                            <?php foreach ($result as $row) : ?>
                                <option value="<?= $row->id_pelajaran ?>"><?= $row->pelajaran; ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value="" disabled selected hidden>Tidak ada data pelajaran</option>
                        <?php endif; ?>
                    </select>
                </div>
                <input type="hidden" value="<?= $id_kelas; ?>" name="id_kelas">

                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label title-3">Upload File</label>
                    <label for="attachment">
                        <input class="form-control form-control-solid form-control-tugas border-0" type="file" name="tugas[]" id="attachment" multiple />
                    </label>
                    <p id="files-area">
                        <span id="filesList">
                            <span id="files-names"></span>
                        </span>
                    </p>
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