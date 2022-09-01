<!-- main page content -->
<div class="main-container container top-20">
    <div class="row d-flex justify-content-center">
        <a data-bs-toggle="modal" data-bs-target="#filterTambahTugas" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed">
            <i class="fa-solid fa-plus-large size-26 text-white mt-1"></i>
        </a>
        <div id="parent_tugas">
            <div id="reload_tugas">
                <?php if ($result) : ?>

                    <div class="wrapper-searching-tugas">
                        <div class="wrapper-samaran"></div>
                        <div class="row bg-white">
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="text" id="search_tugas" onkeyup="search(this,'div.target_search','#vector_tugas')" class="form-control form-control-pribadi pencarian" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="basic-addon2">
                                    <button class="input-group-text searhing" id="basic-addon2"><i class="fa-solid fa-magnifying-glass size-20 text-white"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="sumber" value="3">
                    <input type="hidden" id="id_pelajaran" name="id_pelajaran" value="<?= $id_pelajaran; ?>">
                    <input type="hidden" id="id_kelas" name="id_kelas" value="<?= $id_kelas; ?>">
                    <?php foreach ($result as $row) : ?>
                        <div class="col-12 showing target_search" id="tugas-<?= $row->id_tugas; ?>">
                            <div class=" row mb-3">
                                <div class="col-12">
                                    <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden p-3">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <p class="fw-bolder size-15"><?= tampil_text($row->nama, 30); ?></p>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <div class="button-action position-absolute d-flex flex-wrap flex-column">
                                                    <?php if ($status_wali == false) : ?>
                                                        <button onclick="hapus_tugas(<?= $row->id_tugas; ?>)" class="btn btn-secondary bg-button rounded-pill" type="button">
                                                            <i class="fa-solid fa-trash" style="font-size: 14px; color: #EC3528;"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row py-1 px-2 mb-3">
                                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                                <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                                    <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                                        <i class="fa-regular fa-memo-pad size-20 text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                                <p class="mb-0 fw-normal size-13 text-secondary">Keterangan</p>
                                                <p class="mb-0 fw-normal size-15" style="width: 75%;"><?= ifnull(tampil_text($row->keterangan, 50), '..........'); ?></p>
                                            </div>
                                        </div>

                                        <div class="row mt-4 mx-1">
                                            <a href="<?= base_url('tugas/jawaban_siswa/' . $row->id_kelas . '/' . $row->id_pelajaran . '/' . $row->id_tugas . $wali_kelas); ?>" class="btn btn-block btn-md btn-danger btn-detail-tugas">Detail Tugas</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?= vector_default('vector_tugas_kosong.svg', 'Tidak ada tugas', 'Anda belum menambahkan tugas! hubungi pihak sekolah jika terjadi kesalahan', 'vector_tugas', count($result)); ?>
            </div>
        </div>

    </div>
</div>
<!-- main page content ends -->


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
                <input type="hidden" value="<?= $id_pelajaran; ?>" name="id_pelajaran">
                <input type="hidden" value="<?= $id_kelas; ?>" name="id_kelas[]">

                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label title-3">Upload File</label>
                    <label for="attachment">
                        <input class="form-control form-control-solid form-control-tugas border-0" type="file" name="tugas[]" id="attachment" multiple />
                    </label>
                    <div id="files-area">
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