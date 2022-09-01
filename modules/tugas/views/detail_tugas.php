<!-- Header ends -->
<div class="main-container container">
    <div id="display_tugas" class="row">
        <div class="col-12" id="reload_tugas">
            <a class="row">
                <a data-bs-toggle="modal" data-bs-target="#">
                    <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden p-3 mb-3">
                        <div class="row py-1 px-2 mt-2 mb-2 ">
                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                        <i class="fa-solid fa-graduation-cap size-20 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Nama Siswa</p>
                                <p class="mb-0 fw-normal size-15"><?= $result->detail->nama; ?></p>
                            </div>
                        </div>
                        <div class="row py-1 px-2 mb-2">
                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                        <i class="fa-solid fa-calendar-week size-20 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Tanggal Pengumpulan</p>
                                <p class="mb-0 fw-normal size-15"><?= $result->detail->nice_tanggal; ?></p>
                            </div>
                        </div>

                        <?php if ($result->detail->nilai != NULL) : ?>
                            <div class="row py-1 px-2 mb-2">
                                <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                    <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                            <i class="fa-solid fa-feather size-20 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                    <p class="mb-0 fw-normal size-13 text-secondary">Nilai</p>
                                    <p class="mb-0 fw-normal size-15"><?= $result->detail->nilai; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row py-1 px-2">
                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                        <i class="fa-regular fa-memo-pad size-20 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                <?php if ($result->detail->kode_status == 0) {
                                    $css = 'style="color: #ffbd17"';
                                } elseif ($result->detail->kode_status == 1) {
                                    $css = 'style="color: #00DFA3"';
                                } else {
                                    $css = 'style="color: #EC3528"';
                                } ?>
                                <p class="mb-0 fw-normal size-13 text-secondary">Status</p>
                                <p class="mb-0 fw-normal size-15" <?= $css; ?>><?= $result->detail->status; ?></p>
                            </div>
                        </div>
                        <?php if ($result->detail->keterangan != NULL) : ?>
                            <div class="row py-1 px-2 mb-2">
                                <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                    <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                            <i class="fa-solid fa-feather size-20 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                    <p class="mb-0 fw-normal size-13 text-secondary">Catatan</p>
                                    <p class="mb-0 fw-normal size-15"><?= $result->detail->keterangan; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
            </a>

            <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden p-3">
                <div class="row mb-3">
                    <div class="col">
                        <p class="fw-bolder size-15">Jawaban Siswa</p>
                    </div>
                    <div class="col-auto align-self-center"></div>
                </div>
                <?php if ($result->file_siswa) : ?>
                    <?php foreach ($result->file_siswa as $row) : ?>
                        <?php if ($row->file != FALSE) {
                            $action = 'href="' . $row->file . '" role="button" class="card shadow-sm mb-3"';
                        } else {
                            $action = 'class="card shadow-sm mb-3" onclick="take_alert(`PERINGATAN`, `Tidak bisa mengunduh file diakrenakan file rusak!`, `warning`)"';
                        }
                        ?>
                        <a <?= $action; ?>>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 rounded-10 bg-document">
                                            <?php if ($row->file != FALSE) {
                                                echo get_icon_file($row->extension);
                                            } else {
                                                echo get_icon_file('corrupt');
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <p class="mb-0 size-14 fw-normal"><?= tampil_text($row->judul, 14); ?></p>
                                        <p class="mb-0 size-12 fw-normal text-secondary"><?php if ($row->file != FALSE) {
                                                                                                echo strtoupper($row->extension);;
                                                                                            } else {
                                                                                                echo 'Corrupt';
                                                                                            } ?> File</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-center flex-wrap mt-2">
                            <div class="circle-serahtugas d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-layer-plus" style="font-size: 45px; color: #c8c5c5;"></i>
                            </div>
                            <p class="size-14 text-secondary fw-normal text-center mx-1 mt-3">Siswa belum mengumpulkan file apapun, hubungi admin jika terjadi kesalahan!</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($wali_kelas == false) : ?>
                    <?php if (!in_array($result->detail->kode_status, [2, 4, 5])) : ?>
                        <div class="row mt-4 mx-1">
                            <button class="btn btn-block btn-md btn-danger btn-detail-tolak" data-bs-toggle="modal" href="#modalTolak">Tolak Tugas</button>
                        </div>
                    <?php endif; ?>
                    <?php if (!in_array($result->detail->kode_status, [1, 3])) : ?>
                        <div class=" row mt-2 mx-1">
                            <button class="btn btn-block btn-md btn-success btn-detail-terima" data-bs-toggle="modal" href="#modalInputNilai">Terima Tugas</button>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Moda Input Nilai -->
<div class="modal fade" id="modalInputNilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" id="form_menilai" action=" <?= base_url('tugas/terima') ?>" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Nilai Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3" id="req_nilai">
                    <input type="hidden" name="id_tugas" value="<?= $id_tugas; ?>">
                    <input type="hidden" id="id_tugas_siswa" name="id_tugas_siswa" value="<?= $result->detail->id_tugas_siswa; ?>">
                    <input type="hidden" id="id_siswa" name="id_siswa" value="<?= $id_siswa; ?>">
                    <input type="number" id="nilai_siswa" name="nilai" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Masukan nilai siswa" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" id="button_menilai" onclick="submit_form(this,'#form_menilai',0)" class="btn btn-block btn-md btn-danger btn-filter">Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- Moda Tolak -->
<div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" id="form_penolakan" action=" <?= base_url('tugas/tolak') ?>" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel1">Alasan Penolakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3" id="req_keterangan">
                    <input type="hidden" name="id_tugas" value="<?= $id_tugas; ?>">
                    <input type="hidden" id="id_siswa" name="id_siswa" value="<?= $id_siswa; ?>">
                    <textarea name="keterangan" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Masukan Keterangan" style="height : 130px;" autocomplete="off"></textarea>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" id="button_menolak" onclick="submit_form(this,'#form_penolakan',1)" class="btn btn-block btn-md btn-danger btn-filter">Simpan</button>
            </div>
        </form>
    </div>
</div>
</main>