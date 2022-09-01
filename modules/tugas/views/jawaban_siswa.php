<!-- main page content -->
<div class="main-container container top-20">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12" style="margin-top: 60px;">
            <div class="card shadow-none bg-transparent">
                <div class="card-body tabcontent-staf" id="detail_tugas" style="padding: 6px 0px;">
                    <div class="col-12 mx-auto mb-2 showing">
                        <div class="card mb-3 tugas">
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
                                        <p class="mb-0 size-15 fw-normal text-dark">Judul Tugas</p>
                                        <p class="mb-0 size-14 fw-normal text-muted"><?= $detail->detail->nama; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 tugas">
                            <div class="card-body bg-tugas">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-12 avatar-presensi-inline">
                                                <i class="fa-solid fa-hourglass-clock size-18 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <p class="mb-0 size-15 fw-normal text-dark">Batas Waktu</p>
                                        <p class="mb-0 size-14 fw-normal text-muted"><?= day_from_number(date('N', strtotime($detail->detail->batas_waktu))) . ', ' . date('d', strtotime($detail->detail->batas_waktu)) . ' ' . month_from_number(date('m', strtotime($detail->detail->batas_waktu))) . ' ' . date('Y', strtotime($detail->detail->batas_waktu)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 tugas">
                            <div class="card-body bg-tugas">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-12 avatar-presensi-inline">
                                                <i class="fa-solid fa-memo-pad size-20 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <p class="mb-0 size-15 fw-normal text-dark">Keterangan</p>
                                        <p class="mb-0 size-14 fw-normal text-muted"><?= $detail->detail->keterangan; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden p-3 mb-3">
                            <div id="display_dokumen">
                                <div id="reload_dokumen">
                                    <?php if ($detail->download) : ?>
                                        <?php foreach ($detail->download as $row) : ?>
                                            <div class="card shadow-sm mb-3" id="jawaban-<?= $row->id_file_tugas; ?>">
                                                <div class="card-body">
                                                    <div class="row" id="loading_hapus">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded-10 bg-document">
                                                                <!-- <i class="fa-solid fa-file-pdf size-30 text-danger"></i> -->
                                                                <?php if ($row->file != FALSE) {
                                                                    echo get_icon_file($row->extension);
                                                                } else {
                                                                    echo get_icon_file('corrupt');
                                                                } ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($row->file != FALSE) {
                                                            $action = 'href="' . $row->file . '" class="col align-self-center ps-0"';
                                                        } else {
                                                            $action = 'class="col align-self-center ps-0 " onclick="take_alert(`PERINGATAN`, `Tidak bisa mengunduh file diakrenakan file rusak!`, `warning`)"';
                                                        }
                                                        ?>
                                                        <a <?= $action; ?>>
                                                            <p class="mb-0 size-14 text-dark fw-normal"><?= tampil_text($row->nama, 14) ?></p>
                                                            <p class="mb-0 size-12 fw-normal text-secondary"><?php if ($row->file != FALSE) {
                                                                                                                    echo strtoupper($row->extension);;
                                                                                                                } else {
                                                                                                                    echo 'Corrupt';
                                                                                                                } ?> File</p>
                                                        </a>
                                                        <div class="col-auto align-self-center text-end ms-3" id="hapus_file_loading_<?= $row->id_file_tugas; ?>">
                                                            <?php if ($wali_kelas == false) : ?>
                                                                <?php if (strtotime($detail->detail->batas_waktu) > strtotime(date('Y-m-d H:i:s'))) : ?>
                                                                    <button type="button" onclick="hapus_file(<?= $row->id_file_tugas; ?>)" class="btn btn-md bg-cancel rounded-circle"><i class="fa-solid fa-xmark size-26 text-danger"></i></button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center align-items-center flex-wrap mt-2">
                                                <div class="circle-serahtugas d-flex justify-content-center align-items-center">
                                                    <i class="fa-solid fa-layer-plus" style="font-size: 45px; color: #c8c5c5;"></i>
                                                </div>
                                                <p class="size-14 text-secondary fw-normal text-center mx-1 mt-3">Tekan tombol lampirkan untuk menambahkan file tugas </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <form class="row mt-4 mx-1" method="post" action="<?= base_url('tugas/serahkan'); ?>" id="form_serahkan" enctype="multipart/form-data">
                                        <input type="hidden" name="id_tugas" id="id_tugas" value="<?= $id_tugas; ?>">
                                        <input type="hidden" name="id_kelas" id="id_kelas" value="<?= $id_kelas; ?>">
                                        <input type="hidden" name="id_pelajaran" id="id_pelajaran" value="<?= $id_pelajaran; ?>">
                                        <!-- BUTTON UPLOAD TUGAS -->
                                        <?php if (strtotime($detail->detail->batas_waktu) > strtotime(date('Y-m-d H:i:s'))) : ?>
                                            <input id="lapirkan_jawaban" name="file_jawaban[]" onchange="upload_tugas(this)" multiple="multiple" type="file" hidden />
                                            <label for="lapirkan_jawaban" class="btn btn-block btn-md btn-danger btn-detail-tugas-tambah mb-2">Lampirkan Tugas</label>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body tabcontent-staf" id="daftar_siswa" style="padding: 6px 0px;">
                    <div class="wrapper-searching-tugas">
                        <div class="wrapper-samaran"></div>
                        <div class="row bg-white" style="width: 100vw;">
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="text" id="search_siswa" onkeyup="search(this,'div.target_search','#vector_siswa')" class="form-control form-control-pribadi pencarian" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="basic-addon2">
                                    <button class="input-group-text searhing" id="basic-addon2" style="background-color:#EC3528;;"><i class="fa-solid fa-magnifying-glass size-20 text-white"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="display_siswa">
                        <div id="reload_siswa">
                            <?php if ($result) : ?>
                                <?php foreach ($result as $row) : ?>
                                    <?php if ($row->kode_status == 0) {
                                        $css_outline = 'btn-outline-warning';
                                        $css_text = 'text-warning';
                                    } elseif ($row->kode_status == 1) {
                                        $css_outline = 'btn-outline-success';
                                        $css_text = 'text-success';
                                    } else {
                                        $css_outline = 'btn-outline-danger';
                                        $css_text = 'text-danger';
                                    } ?>
                                    <div class="card mb-3 target_search showing">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded-circle avatar-pesan">
                                                        <img src="<?= $row->foto; ?>" alt="">
                                                    </div>
                                                </div>
                                                <a href="<?= base_url('tugas/detail_tugas/' . $row->id_siswa . '/' . $id_tugas . $get); ?>" class="col align-self-center ps-0">
                                                    <p class="mb-0 size-15 fw-normal text-dark"><?= tampil_text($row->nama, 18); ?></p>
                                                    <p class="mb-0 size-13 fw-normal <?= $css_text; ?>"><?= $row->status; ?></p>
                                                </a>
                                                <div class="col-auto align-self-center ps-0">
                                                    <button class="btn <?= $css_outline; ?> btn-value" type="button" <?php if ($wali_kelas == false) {
                                                                                                                            echo 'onclick="get_nilai(' . ifnull($row->id_tugas_siswa, 0) . ',' . ifnull($row->nilai, 0) . ',' . $row->id_siswa . ')" data-bs-toggle="modal" data-bs-target="#modalInputNilai"';
                                                                                                                        }; ?>>
                                                        <?= ifnull($row->nilai, ' - '); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>
                            <?= vector_default('vector_jawaban_kosong.svg', 'Tidak ada siswa terkait', 'Belum ada siswa terkait dengan kelas ini! hubungi admin jika terdapat kesalahan!', 'vector_siswa', count($result)); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- main page content ends -->

<!-- Filter Ujian Modal -->
<div class="modal fade" id="modalInputNilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" id="form_menilai" action=" <?= base_url('tugas/nilai') ?>" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Nilai Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3" id="req_nilai">
                    <input type="hidden" name="id_kelas" id="id_kelas" value="<?= $id_kelas; ?>">
                    <input type="hidden" name="id_pelajaran" id="id_pelajaran" value="<?= $id_pelajaran; ?>">
                    <input type="hidden" name="id_tugas" value="<?= $id_tugas; ?>">
                    <input type="hidden" id="id_tugas_siswa" name="id_tugas_siswa">
                    <input type="hidden" id="id_siswa" name="id_siswa">
                    <input type="number" id="nilai_siswa" name="nilai" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Masukan nilai siswa" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" id="button_menilai" onclick="submit_form(this,'#form_menilai',1)" class="btn btn-block btn-md btn-danger btn-filter">Simpan</button>
            </div>
        </form>
    </div>
</div>

</main>