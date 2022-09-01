<!-- main page content -->
<div class="main-container container top-20">
    <div class="row mt-3">
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <form action="<?= base_url('func_materi/edit_materi') ?>" method="post" id="form_edit_materi">
                <div id="reload-detail-materi">
                    <input type="hidden" name="id_materi" value="<?= $id_materi; ?>">
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <div class="card mb-3">
                                <div class="col-auto position-absolute avatar-detail-kbm">
                                    <div class="avatar avatar-50 shadow-sm rounded-18 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                            <i class="fa-solid fa-building-user size-18 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body detail-kbm">
                                    <div class="row">
                                        <div class="col align-self-center ps-4 text-detail-kbm" id="req_id_bab">
                                            <p class="mb-0 size-15 fw-medium">Bab</p>
                                            <p class="fw-normal text-secondary size-12" id="isibab"><?= tampil_text($result->detail->bab, 25); ?></p>
                                            <!-- <input type="text" id="inputbab" class="d-none" value="<?= $result->detail->bab; ?>"> -->
                                            <select name="id_bab" id="inputbab" class="form-select form-select-solid rounded-2 border bg-f5f5f5 d-none" style="height: 35px !important; line-height: 23px;">
                                                <?php if ($bab) : ?>
                                                    <?php foreach ($bab as $row) : ?>
                                                        <option value="<?= $row->id_bab; ?>" <?php if ($row->id_bab == $result->detail->id_bab) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?= $row->nama; ?></option>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <option value="">Tidak ada bab</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mx-auto">
                            <div class="card">
                                <div class="col-auto position-absolute avatar-detail-kbm">
                                    <div class="avatar avatar-50 shadow-sm rounded-18 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline" style="line-height: 44px;">
                                            <i class="fa-solid fa-book-open-cover size-20 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body detail-kbm">
                                    <div class="row">
                                        <div class="col align-self-center ps-4 text-detail-kbm" id="req_judul_materi">
                                            <p class="mb-0 size-15 fw-medium">Materi</p>
                                            <p class="fw-normal text-secondary size-12" id="isimateri"><?= tampil_text($result->detail->materi, 25); ?></p>
                                            <input type="text" id="inputmateri" name="judul_materi" class="form-control form-control-solid rounded-2 bg-f5f5f5 d-none" value="<?= $result->detail->materi; ?>" style="height: 35px !important;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6 mx-auto">
                            <div class="card mb-3">
                                <div class="col-auto position-absolute avatar-detail-kbm">
                                    <div class="avatar avatar-50 shadow-sm rounded-18 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                            <i class="fa-brands fa-stack-overflow size-22 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body detail-kbm">
                                    <div class="row">
                                        <div class="col align-self-center ps-4 text-detail-kbm">
                                            <p class="mb-0 size-14 fw-medium">Mata Pelajaran</p>
                                            <p class=" fw-normal text-secondary size-12"><?= tampil_text($result->detail->nama_pelajaran, 30); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mx-auto">
                            <div class="card">
                                <div class="col-auto position-absolute avatar-detail-kbm">
                                    <div class="avatar avatar-50 shadow-sm rounded-18 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                            <i class="fa-solid fa-chalkboard-user size-20 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body detail-kbm">
                                    <div class="row">
                                        <div class="col align-self-center ps-4 text-detail-kbm">
                                            <p class="mb-0 size-13 fw-medium">Pembuat Materi</p>
                                            <p class="fw-normal text-secondary size-12"><?= tampil_text($result->detail->nama_staf, 15); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 mx-auto">
                            <div class="card mb-3">
                                <div class="col-auto position-absolute avatar-detail-kbm">
                                    <div class="avatar avatar-50 shadow-sm rounded-18 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                            <i class="fa-solid fa-align-left size-20 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="req_keterangan" class="row">
                                        <div class="col align-self-center ps-4 text-detail-kbm">
                                            <p class="mb-0 size-14 fw-medium">Keterangan</p>
                                            <p class="fw-normal text-secondary size-12" id="isiketerangan"><?= $result->detail->keterangan; ?></p>
                                            <textarea class="form-control form-control-solid rounded-2 bg-f5f5f5 d-none" name="keterangan" id="inputketerangan" style="height: auto;"><?= $result->detail->keterangan; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="row mb-2">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card shadow-none bg-transparent mb-3">
                        <div class="card-header border-0">
                            <div class="col-12 align-self-center tab" style="display: flex; justify-content:center; align-items:center;">
                                <button id="defaultOpen" class="tablinks" onclick="openCity(event, 'Video')" style=" width: 100%; height: 100%; padding: 10px;">Video</button>
                                <button class="tablinks" onclick="openCity(event, 'Download')" style="width: 100%; height: 100%; padding: 10px;">Download</button>
                            </div>
                        </div>
                        <div class="card-body tabcontent" id="Video">
                            <div id="parent_video">
                                <div id="reload_video">
                                    <?php if ($result->result->video) : ?>

                                        <div class="mb-3 zoom-filter hiding" id="display-video">
                                            <iframe id="iframe-video" class="video-detail-materi" width="420" height="345" src=""></iframe>
                                        </div>
                                        <?php foreach ($result->result->video as $row) : ?>
                                            <div id="video-<?= $row->id_materi_video; ?>">
                                                <a class="card mb-3" onclick="show_video(<?= $row->id_materi_video; ?>,'<?= $row->url; ?>')">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 shadow-sm rounded-18 avatar-presensi-outline">
                                                                    <div class="avatar avatar-40 rounded-15 avatar-presensi-inline" style="line-height: 43px;">
                                                                        <i class="fa-solid fa-circle-play size-22 text-white"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col align-self-center px-0">
                                                                <p class="mb-1 size-13 fw-normal"><?= tampil_text($row->judul, 20); ?></p>
                                                                <p class="text-muted text-secondary size-12"><?= $row->durasi; ?></p>
                                                            </div>
                                                            <div class="col-auto align-self-center">
                                                                <button type="button" onclick="hapus_video(<?= $id_materi; ?>,<?= $row->id_materi_video; ?>)" class="btn bg-dropdown bg-button rounded-pill">
                                                                    <i class="fa-solid fa-trash" style="font-size: 14px; color: #EC3528;"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- <button type="button" onclick="hapus_video(<?= $id_materi; ?>,<?= $row->id_materi_video; ?>)">HAPUS</button> -->
                                            </div>

                                        <?php endforeach; ?>


                                    <?php else : ?>
                                        <?= vector_default('vector_video_kosong.svg', 'Tidak terdapat materi video', 'Sekolah belum menyediakan materi berbasis video, hubungi guru atau admin jika terjadi kesalahan!', 'video_materi'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <form action="<?= base_url('func_materi/tambah_video'); ?>" method="POST" class="row" id="form_tambah_video">
                                <div class="col-12 d-none" id="formvideo">
                                    <div class="row">
                                        <div class="col-6" id="req_judul_video">
                                            <input type="hidden" name="id_materi" value="<?= $id_materi; ?>" class="form-control form-control-pribadi border-0">
                                            <label for="judul" class="form-label size-15 fw-bold">Judul</label>
                                            <input type="text" name="judul_video" class="form-control form-control-pribadi border-0" id="judul" placeholder="isikan judul" autocomplete="off">
                                        </div>
                                        <div class="col-6" id="req_url_video">
                                            <label for="url" class="form-label size-15 fw-bold">Link URL</label>
                                            <input type="text" name="url_video" class="form-control form-control-pribadi border-0" id="url" placeholder="isikan link url" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center d-flex justify-content-center my-3">
                                    <a id="btntambahvideo" onclick="tambahvideo()" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid">
                                        <i class="fa-solid fa-plus-large size-26 text-white" style="margin-top: 2px;"></i>
                                    </a>
                                    <a id="btnbatalvideo" onclick="bataltambahvideo()" class="d-none avatar avatar-50 shadow-lg rounded-circle avatar-presensi-solid me-2">
                                        <i class="fa-solid fa-xmark text-white" style="margin-top: 2px;"></i>
                                    </a>
                                    <a id="btnsavevideo" onclick="submit_form(this,'#form_tambah_video',1)" class="d-none avatar avatar-50 shadow-lg rounded-circle avatar-presensi-solid ms-2" style="background-color: #00CF98;">
                                        <i class="fa-solid fa-check text-white" style="margin-top: 2px;"></i>
                                    </a>

                                </div>
                            </form>
                        </div>

                        <div class="card-body tabcontent" id="Download">
                            <div id="parent_dokumen">
                                <div id="reload_dokumen">
                                    <?php if ($result->result->dokumen) : ?>
                                        <?php foreach ($result->result->dokumen as $row) : ?>
                                            <div id="dokumen-<?= $row->id_materi_dokumen; ?>">
                                                <?php
                                                if ($row->file_dokumen != FALSE) {
                                                    $action = 'href="' . $row->file_dokumen . '"';
                                                } else {
                                                    $action = 'onclick="take_alert(`PERINGATAN`, `Tidak bisa mengunduh file diakrenakan file rusak!`, `warning`)"';
                                                }
                                                ?>
                                                <a <?= $action; ?> class="card mb-3" <?php
                                                                                        if ($row->file_dokumen == FALSE) {
                                                                                            echo 'style="background-color : #EAEBEB;"';
                                                                                        }
                                                                                        ?>>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 shadow-sm rounded-18 <?php
                                                                                                                    if ($row->file_dokumen != FALSE) {
                                                                                                                        echo 'avatar-presensi-outline';
                                                                                                                    } else {
                                                                                                                        echo 'avatar-presensi-outline-second';
                                                                                                                    }
                                                                                                                    ?>">
                                                                    <div class="avatar avatar-40 rounded-15 <?php
                                                                                                            if ($row->file_dokumen != FALSE) {
                                                                                                                echo 'avatar-presensi-inline';
                                                                                                            } else {
                                                                                                                echo 'avatar-presensi-inline-second';
                                                                                                            }
                                                                                                            ?>">
                                                                        <i class="fa-solid fa-download size-22 text-white"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col align-self-center ps-0">
                                                                <p class="mb-1 size-13 fw-normal"><?= tampil_text($row->judul, 20); ?></p>
                                                                <p class="text-muted text-secondary size-12"><?= $row->size; ?></p>
                                                            </div>
                                                            <div class="col-auto align-self-center">
                                                                <button type="button" onclick="hapus_dokumen(<?= $id_materi; ?>,<?= $row->id_materi_dokumen; ?>)" class="btn bg-dropdown bg-button rounded-pill"><i class="fa-solid fa-trash" style="font-size: 14px; color: #EC3528;"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- <button type="button" onclick="hapus_dokumen(<?= $id_materi; ?>,<?= $row->id_materi_dokumen; ?>)">HAPUS</button> -->
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <?= vector_default('vector_dokumen_kosong.svg', 'Tidak ada dokumen', 'Sekolah belum menyediakan materi dalam bentuk dokumen, hubungi guru atau sekolah jika terjadi kesalahan', 'download_materi'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <form id="form_tambah_dokumen" action="<?= base_url('func_materi/tambah_dokumen'); ?>" method="post" enctype="multipart/form-data" class="row">
                                <div class="col-12 d-none" id="formdowmloadvideo">
                                    <div class="row">
                                        <div class="col-6" id="req_judul_dokumen">
                                            <input type="hidden" name="id_materi" value="<?= $id_materi; ?>">
                                            <label for="dokumenjudul" class="form-label size-15 fw-bold">Judul</label>
                                            <input type="text" name="judul_dokumen" class="form-control form-control-pribadi border-0" id="dokumenjudul" placeholder="isikan judul" autocomplete="off">
                                        </div>
                                        <div class="col-6" id="req_dokumen">
                                            <label for="file" class="form-label size-15 fw-bold">File</label>
                                            <label for="file" class="form-control form-control-pribadi bg-f5f5f5 border-0">Pilih file</label>
                                            <input class="d-none" name="dokumen" type="file" id="file" title="foo" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center d-flex justify-content-center my-3">
                                    <a id="btntambahdownloadvideo" onclick="tambahdownloadvideo()" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid">
                                        <i class="fa-solid fa-plus-large size-26 text-white" style="margin-top: 2px;"></i>
                                    </a>
                                    <button id="btnsavedownloadvideo" type="button" onclick="submit_form(this,'#form_tambah_dokumen',2)" class="d-none avatar avatar-50 shadow-lg rounded-circle avatar-presensi-solid border-0" style="background-color: #00CF98;">
                                        <i class="fa-solid fa-check text-white" style="margin-top: 2px;"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main page content ends -->