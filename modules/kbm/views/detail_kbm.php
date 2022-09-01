<!-- main page content -->
<?php
$batas_kbm = strtotime($tanggal . ' ' . date('H:i', strtotime($result->detail->jam_akhir)));
$mulai_kbm = strtotime($tanggal . ' ' . date('H:i', strtotime($result->detail->jam_mulai)));
?>
<div class="main-container container">
    <?php if ($mulai_kbm > strtotime(date('Y-m-d H:i')) || $batas_kbm > strtotime(date('Y-m-d H:i'))) : ?>
        <a href="#" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed" data-bs-toggle="modal" data-bs-target="#modalEdit">
            <i class="fa-solid fa-gear text-white size-26" style="margin-top: 2px;"></i>
        </a>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-12  mx-auto">
            <div class="row mb-3">
                <div class="col-12 mx-auto">
                    <div class="card mb-3">
                        <div class="card-body" id="parent_utama">
                            <div class="row scrollmenu" id="reload_utama">
                                <div class="col d-flex justify-content-center align-items-center flex-column">
                                    <?php
                                    if ($batas_kbm < strtotime(date('Y-m-d H:i')) || $mulai_kbm > strtotime(date('Y-m-d H:i'))) {
                                        $action = 'class="avatar avatar-50 rounded-18 avatar-offline"';
                                    } else {
                                        if ($presensi_setting->presensi_mapel == true) {
                                            if ($result->detail->presensi == true) {
                                                $action = 'href="' . base_url('kbm/presensi_siswa/' . $id_pelajaran . '/' . $id_kelas . '?tanggal=' . date('Y-m-d')) . '" class="avatar avatar-50 rounded-18 avatar-presensi-inline"';
                                            } else {
                                                $action = 'data-bs-toggle="modal" data-bs-target="#presensiModalMapel" class="avatar avatar-50 rounded-18 avatar-presensi-inline button_get_lokasi"';
                                            }
                                        } else {
                                            $action = 'href="' . base_url('kbm/presensi_siswa/' . $id_pelajaran . '/' . $id_kelas . '?tanggal=' . date('Y-m-d')) . '" class="avatar avatar-50 rounded-18 avatar-presensi-inline"';
                                        }
                                    }
                                    ?>
                                    <a <?= $action; ?>>
                                        <div class="circle-bg-top"></div>
                                        <div class="circle-bg-bottom"></div>
                                        <i class="fa-solid fa-calendar-check size-22 text-white"></i>
                                    </a>
                                    <p class="mt-2 mb-0 size-12 fw-medium">Presensi</p>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center flex-column">
                                    <?php
                                    if (strtotime($tanggal) < strtotime(date('Y-m-d')) || strtotime($tanggal) > strtotime(date('Y-m-d'))) {
                                        $inline = 'class="avatar avatar-50 rounded-18 avatar-offline"';
                                    } else {
                                        $inline = 'href="' . base_url('jurnal/detail_jurnal_guru/' . $id_pelajaran . '/' . $id_kelas . '?tanggal=' . date('Y-m-d')) . '" class="avatar avatar-50 rounded-18 avatar-presensi-inline"';
                                    }


                                    ?>
                                    <a <?= $inline; ?>>
                                        <div class="circle-bg-top"></div>
                                        <div class="circle-bg-bottom"></div>
                                        <i class="fa-solid fa-book-user size-22 text-white"></i>
                                    </a>
                                    <p class="mt-2 mb-0 size-12 fw-medium">Jurnal Guru</p>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center flex-column">
                                    <?php
                                    if ($batas_kbm < strtotime(date('Y-m-d H:i')) || $mulai_kbm > strtotime(date('Y-m-d H:i'))) {
                                        $link = NULL;
                                        $class = 'href="#" class="avatar avatar-50 rounded-18 avatar-offline"';
                                        $meet = 'Offline';
                                        $icon = ' <i class="fa-solid fa-bell-school-slash size-22 text-white"></i>';
                                    } else {
                                        if ($result->result) {
                                            // echo 'ada kbm';
                                            if ($result->result->link) {
                                                // echo 'ada link';
                                                $link = $result->result->link;
                                                $class = 'href="' . $result->result->link . '" class="avatar avatar-50 rounded-18 avatar-presensi-inline"';
                                                $meet = 'Online';
                                                $icon = '<i class="fa-solid fa-bell-school size-22 text-white"></i>';
                                            } else {
                                                // echo 'gada link';
                                                $link = NULL;
                                                $class = 'href="#" class="avatar avatar-50 rounded-18 avatar-offline"';
                                                $meet = 'Offline';
                                                $icon = '  <i class="fa-solid fa-bell-school-slash size-22 text-white"></i>';
                                            }
                                        } else {
                                            // echo 'gada kbm';
                                            $link = NULL;
                                            $class = 'href="#" class="avatar avatar-50 rounded-18 avatar-offline"';
                                            $meet = 'Offline';
                                            $icon = '  <i class="fa-solid fa-bell-school-slash size-22 text-white"></i>';
                                        }
                                    }



                                    ?>
                                    <a <?= $class; ?>>
                                        <div class="circle-bg-top"></div>
                                        <div class="circle-bg-bottom"></div>
                                        <?= $icon; ?>
                                    </a>
                                    <p class="mt-2 mb-0 size-12 fw-medium"><?= $meet; ?></p>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center flex-column">
                                    <?php
                                    if ($result->result) {
                                        if ($result->result->pesan == 'Y') {
                                            $pesan = 'href="' . base_url('qna/chatting_grup/' . $result->result->id_chat . '?tanggal=' . date('Y-m-d', strtotime($result->result->tanggal))) . '" class="avatar avatar-50 rounded-18 avatar-presensi-inline"';
                                        } else {
                                            $pesan = 'href="#" class="avatar avatar-50 rounded-18 avatar-offline"';
                                        }
                                    } else {
                                        $pesan = 'href="#" class="avatar avatar-50 rounded-18 avatar-offline"';
                                    }
                                    ?>
                                    <a <?= $pesan; ?>>
                                        <div class="circle-bg-top"></div>
                                        <div class="circle-bg-bottom"></div>
                                        <i class="fa-solid fa-messages size-22 text-white"></i>
                                    </a>
                                    <p class="mt-2 mb-0 size-12 fw-medium">Pesan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden mb-3 p-3">
                        <div class="row mb-3">
                            <div class="col">
                                <p class="fw-bolder size-15">Keterangan KBM</p>
                            </div>
                        </div>
                        <div class="row py-1 px-2 mt-2 mb-2 ">
                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                        <i class="fa-solid fa-calendar-week size-22 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Tanggal</p>
                                <p class="mb-0 fw-normal size-15"><?= $result->detail->nice_tanggal ?></p>
                            </div>
                        </div>
                        <div class="row py-1 px-2 mb-3">
                            <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                        <i class="fa-solid fa-building-user size-20 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Kelas</p>
                                <p class="mb-0 fw-normal size-15"><?= $result->detail->nama_kelas; ?></p>
                            </div>
                        </div>
                        <div class="row py-1 px-2 mb-3">
                            <div class="d-flex col-auto ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                        <i class="fa-brands fa-stack-overflow size-24 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Mata Pelajaran</p>
                                <p class="mb-0 fw-normal size-15"><?= $result->detail->nama_pelajaran ?></p>
                            </div>
                        </div>
                        <div class="row py-1 px-2 mb-3">
                            <div class="d-flex col-auto ps-0 pe-2">
                                <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                    <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                        <i class="fa-solid fa-clock size-22 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col p-0 d-flex align-items-start flex-column">
                                <p class="mb-0 fw-normal size-13 text-secondary">Jam Pembelajaran</p>
                                <p class="mb-0 fw-normal size-15"><?= date('H:i', strtotime($result->detail->jam_mulai)) . ' - ' . date('H:i', strtotime($result->detail->jam_akhir)) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 mx-auto">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row py-1 px-2 mb-3">
                        <div class="d-flex col-auto align-items-center ps-0 pe-2">
                            <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                    <i class="fa-solid fa-calendar-check size-22 text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                            <p class="mb-0 fw-bolder size-15">Presensi Siswa</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto ps-4 pe-1">
                            <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                                <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                    <i class="fa-solid fa-person-circle-check size-18 text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center ps-1">
                            <p class="mb-0 size-12 fw-medium">Hadir</p>
                            <p class="fw-normal text-secondary size-12"><?= $result->presensi->hadir; ?> Siswa</p>
                        </div>

                        <div class="col-auto ps-4 pe-1">
                            <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                                <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                    <i class="fa-solid fa-person-circle-minus size-18 text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center ps-1">
                            <p class="mb-0 size-12 fw-medium">Sakit</p>
                            <p class="fw-normal text-secondary size-12"><?= $result->presensi->sakit; ?> Siswa</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-auto ps-4 pe-1">
                            <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                                <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                    <i class="fa-solid fa-person-circle-exclamation size-18 text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center ps-1">
                            <p class="mb-0 size-12 fw-medium">Ijin</p>
                            <p class="fw-normal text-secondary size-12"><?= $result->presensi->ijin; ?> Siswa</p>
                        </div>

                        <div class="col-auto ps-4 pe-1">
                            <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                                <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                    <i class="fa-solid fa-person-circle-question size-18 text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center ps-1">
                            <p class="mb-0 size-12 fw-medium">Tidak Hadir</p>
                            <p class="fw-normal text-secondary size-12"><?= $result->presensi->alpha; ?> Siswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12" id="parent_materi">
            <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden p-3" id="display_materi">
                <div class="row mb-3">
                    <div class="col">
                        <p class="fw-bolder size-15">Materi</p>
                    </div>
                    <div class="col-auto align-self-center">
                        <?php if ($mulai_kbm > strtotime(date('Y-m-d H:i')) || $batas_kbm > strtotime(date('Y-m-d H:i'))) : ?>
                            <a data-bs-toggle="modal" href="#modalTambahMateri" role="button" class="label-biru fw-bold size-13"><i class="fa-regular fa-plus"></i> Tambah Materi</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($result->result->materi) : ?>
                    <?php foreach ($result->result->materi as $row) : ?>
                        <a href="<?= base_url('materi/detail_materi/' . $row->id_materi) ?>" class="card shadow-sm mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                                <i class="fa-solid fa-file size-22 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <p class="mb-0 size-14 fw-normal"><?= tampil_text($row->judul, 25); ?></p>
                                    </div>
                                    <div class="col-auto align-self-center text-end ms-3">
                                        <?php if ($mulai_kbm > strtotime(date('Y-m-d H:i')) || $batas_kbm > strtotime(date('Y-m-d H:i'))) : ?>
                                            <button class="btn btn-md bg-cancel rounded-circle"><i class="fa-solid fa-xmark size-26 text-danger"></i></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-center flex-wrap mt-2">
                            <div class="circle-serahtugas d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-layer-group" style="font-size: 45px; color: #c8c5c5;"></i>
                            </div>
                            <p class="size-14 text-secondary fw-normal text-center mx-1 mt-3">Tekan tombol lampirkan untuk menambahkan file tugas </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
<!-- main page content ends -->
</main>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="parent_modal_edit">
        <div class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)" id="reload_modal_edit">
            <div class="modal-header border-0">
                <h5 class="modal-title">Setting KBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url('kbm/tambah'); ?>" id="setting_kbm" class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <input type="hidden" name="tanggal" value="<?= $tanggal; ?>">
                            <input type="hidden" value="<?= $id_kelas; ?>" name="id_kelas">
                            <input type="hidden" value="<?= $id_pelajaran; ?>" name="id_pelajaran">
                            <label for="exampleFormControlInput3" class="form-label title-3">Meet Online</label>
                            <div class="input-group select-group">
                                <span class="input-group-addon d-flex justify-content-center align-items-center">
                                    <i class="fa-regular fa-video ps-3 pe-1"></i>
                                </span>
                                <select name="domain" onchange="pilih_domain(this)" class="form-select form-select form-select-pribadi border-0 ps-2">
                                    <option value="">Pilih</option>
                                    <option value="1" <?php if ($result->result) {
                                                            if ($result->result->provider_kode == 1) {
                                                                echo 'selected';
                                                            }
                                                        } ?>>Zoom Meeting</option>
                                    <option value="2" <?php if ($result->result) {
                                                            if ($result->result->provider_kode == 2) {
                                                                echo 'selected';
                                                            }
                                                        } ?>>Google Meet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="url_meet" class="form-label title-3">Link Url</label>
                            <input type="text" name="link" onkeyup="key_link(this)" value="<?= $link; ?>" id="url_meet" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Link Url" style="height: 44px;" autocomplete="off" <?php if ($link == NULL) {
                                                                                                                                                                                                                                                                    echo 'readonly';
                                                                                                                                                                                                                                                                } ?>>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch mb-2">
                            <input id="set_chatting" onchange="set_chat(this)" value="Y" name="chatting" type="checkbox" class="form-check-input" <?php if ($result->result) {
                                                                                                                                                        if ($result->result->pesan == 'Y') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        }
                                                                                                                                                    } ?>>
                            <label for="set_chatting" class="form-check-label size-14 fw-normal">Aktifkan Chatting Grup</label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer border-0">
                <button type="button" disabled="true" onclick="submit_form(this,'#setting_kbm',0)" id="button_setting_kbm" class="btn btn-block btn-md btn-danger btn-filter">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Filter Tambah Materi -->
<div class="modal fade" id="modalTambahMateri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="parent_tambah_materi_kbm">
        <form method="post" action="<?= base_url('kbm/tambah_materi') ?>" id="tambah_materi_kbm" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
                <h5 class="modal-title">Tambah Materi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label title-3">Bab</label>
                    <select onchange="pilih_bab(this)" class="form-select form-select form-select-pribadi border-0" aria-label="Default select example">
                        <?php if ($materi->result) : ?>
                            <option value="all" selected>Semua</option>
                            <?php foreach ($materi->result as $row) : ?>
                                <option value="<?= $row->id_bab; ?>"><?= $row->nama_bab; ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value="" selected>Tidak ada bab tersedia</option>
                        <?php endif; ?>
                    </select>
                    <div id="req_materi"></div>
                    <div class="row">
                        <input type="hidden" name="tanggal" value="<?= $tanggal; ?>">
                        <input type="hidden" value="<?= $id_kelas; ?>" name="id_kelas">
                        <input type="hidden" value="<?= $id_pelajaran; ?>" name="id_pelajaran">
                        <?php if ($materi->result) : ?>
                            <?php foreach ($materi->result as $row) : ?>
                                <div class="col-12 bab showing" id="bab-<?= $row->id_bab; ?>">
                                    <div class="wrapper-bab mt-3 p-2">
                                        <h6><?= $row->nama_bab; ?></h6>
                                    </div>
                                    <div class="col-12">
                                        <?php if ($row->materi) : ?>
                                            <?php foreach ($row->materi as $m) : ?>
                                                <div class="input-checkbox d-flex mb-3">
                                                    <input id="checkbox-<?= $m->id_materi; ?>" value="<?= $m->id_materi; ?>" <?php if (in_array($m->id_materi, $id_materi)) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?> onchange=" pilih_materi(this)" name="materi[]" class="form-check-input mb-1 materi_kbm" type="checkbox">
                                                    <label class="ms-2" for="checkbox-<?= $m->id_materi; ?>"><?= $m->judul; ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?= vector_default('vector_bab_kosong.svg', 'Tidak ada bab materi tersedia!', 'Tidak terdapat bab dan materi yang terkait dengan pelajaran ini, hubungi admin jika terjadi kesalahan!'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" id="button_tambah_materi_kbm" onclick="submit_form(this,'#tambah_materi_kbm',1)" class="btn btn-block btn-md btn-danger btn-filter" disabled="true">Simpan</button>
            </div>
        </form>
    </div>
</div>


<!-- Modal Presensi Mata Pelajaran -->
<div class="modal fade" id="presensiModalMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header py-4">
                <button type="button" class="btn-close me-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="modal-body" action="<?= base_url('presensi/mapel/') ?>" method="POST" id="form_presensi_mapel">
                <div class="row">
                    <div class="col-12">
                        <div style="width : 90%;height :100%;position : absolute;z-index : 10;"></div>
                        <div id="map-container-google-1" class="z-depth-1-half map-container">
                            <iframe id="map_mapel" src="<?= $map; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto ps-2 pe-1">
                                        <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                                <i class="fa-solid fa-building-user size-18 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-1">
                                        <p class="mb-0 size-12 fw-medium">Nama Kelas</p>
                                        <p class="fw-normal text-secondary size-12" id="kelas"><?= $result->detail->nama_kelas; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto ps-2 pe-1">
                                        <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                                <i class="fa-brands fa-stack-overflow size-24 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-1">
                                        <p class="mb-0 size-12 fw-medium">Nama Mata Pelajaran</p>
                                        <p class="fw-normal text-secondary size-12" id="pelajaran"><?= $result->detail->nama_pelajaran; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto ps-2 pe-1">
                                        <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-circle avatar-presensi-inline" style="line-height: 42px;">
                                                <i class="fa-solid fa-location-crosshairs size-24 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-1">
                                        <p class="mb-0 size-12 fw-medium">Jarak</p>
                                        <p class="fw-normal text-secondary size-12 jarak_mapel"><?= ifnull(round($jarak, 2), 0) . ' M'; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="lat" name="lat" value="<?= $lat; ?>">
                <input type="hidden" class="long" name="long" value="<?= $long; ?>">
                <input type="hidden" id="id_pelajaran_mapel" name="id_pelajaran" value="<?= $id_pelajaran; ?>">
                <input type="hidden" id="id_kelas_mapel" name="id_kelas" value="<?= $id_kelas; ?>">
                <input type="hidden" id="jarak_mapel" value="<?= ifnull(round($jarak, 2), NULL); ?>">
            </form>
            <div class=" modal-footer d-flex justify-content-center border-0">
                <button type="button" onclick="submit_form(this,'#form_presensi_mapel',2)" id="button_presensi_mapel" class="btn shadow-sm btn-presensi mb-2">Presensi</button>
            </div>
        </div>
    </div>
</div>