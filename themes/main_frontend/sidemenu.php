<!-- Sidebar main menu -->
<?php if (!isset($button_back)) :  ?>
    <div id="sidemenu" class="sidebar-wrap  sidebar-overlay">
        <!-- Add pushcontent or fullmenu instead overlay -->
        <div id="content_sidemenu">
            <div class="closemenu text-muted">Close Menu</div>
            <div class="sidebar">
                <!-- user information -->
                <div class="row my-3">
                    <div class="col-12 profile-sidebar" id="reload_side_foto">
                        <div class="row mt-3" id="side_foto_profil">
                            <div class=" col-auto">
                                <figure class="avatar avatar-80 rounded-20 p-1 bg-white shadow-sm figure-sidemenu" style="background-image: url(' <?= $this->session->userdata('lms_staf_foto'); ?>')"></figure>
                            </div>
                            <div class=" col px-0 align-self-center">
                                <h5 class="mb-0 fw-normal text-white"><?= tampil_text($this->session->userdata('lms_staf_nama'), 20); ?></h5>
                                <p class="text-muted size-12"><?= $this->session->userdata('lms_staf_role'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- user emnu navigation -->
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link <?= (set_active($this->uri->segment(1), 'home', $this->uri->segment(2), array())) ?>" aria-current="page" href="<?= base_url('home'); ?>" onclick="unreload(this)">
                                    <div class="avatar avatar-40 icon"><i class="fa-solid fa-house"></i></div>
                                    <div class="col">Beranda</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link <?= (set_active($this->uri->segment(1), 'kbm', $this->uri->segment(2), array())) ?>" href="<?= base_url('kbm') ?>" tabindex="-1" onclick="unreload(this)">
                                    <div class="avatar avatar-40 icon"><i class="fa-solid fa-calendar-days"></i></div>
                                    <div class="col">Jadwal</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= (set_active($this->uri->segment(1), 'materi', $this->uri->segment(2), array())) ?>" href="<?= base_url('materi') ?>" tabindex="-1" onclick="unreload(this)">
                                    <div class="avatar avatar-40 icon"><i class="fa-solid fa-book-open-cover"></i></div>
                                    <div class="col">Materi</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= (set_active($this->uri->segment(1), 'tugas', $this->uri->segment(2), array())) ?>" href="<?= base_url('tugas') ?>" onclick="unreload(this)" tabindex="-1">
                                    <div class="avatar avatar-40 icon"><i class="fa-solid fa-list-check"></i></div>
                                    <div class="col">Tugas</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= (set_active($this->uri->segment(1), 'toko', $this->uri->segment(2), array())) ?>" href="<?= base_url('toko') ?>" onclick="unreload(this)" tabindex="-1">
                                    <div class="avatar avatar-40 icon"><i class="fa-solid fa-shop"></i></div>
                                    <div class="col">Toko</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item logout">
                                <a class="nav-link question_alert" <?= alert_question('KONFIRMASI', 'Apakah anda akan keluar dari aplikasi KlasQ Staf ?', 'question') ?> href="<?= base_url('auth/logout') ?>" tabindex="-1">
                                    <div class="avatar avatar-40 icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                                    <div class="col">Keluar</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php else : ?>
    <?php if (isset($button_back['khusus'])) : ?>
        <?php if (isset($button_back['khusus']['ujian'])) : ?>
            <!-- Sidebar Penomoran -->
            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" styele="background-color: #FFE6E6;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
                    <button type="button" class="btn-close text-reset mt-1 me-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ujian">
                    <div class="row">
                        <div class="col-12">
                            <h5>Paket Ujian 01</h5>
                            <p class="fw-normal text-dark size-15">Bahasa Indonesia</p>
                            <div class="solid-line mb-4"></div>
                        </div>
                        <div class="col-12 tab px-0">
                            <div class="wrapper-ujian d-flex justify-content-center align-items-center flex-wrap">
                                <button id="defaultOpen" class="btn rounded-circle mx-2 mb-3 tablinks" onclick="openCity(event,'ForSoal')">1</button>
                                <button class="btn rounded-circle mx-2 mb-3 tablinks" onclick="openCity(event, 'ForSoal2')">2</button>
                                <button class="btn btn-ragu_ragu mx-2 mb-3" onclick="openCity(event, 'ForSoal3')">3</button>
                                <button class="btn rounded-circle mx-2 mb-3 tablinks" onclick="openCity(event, 'ForSoal4')">4</button>
                                <button class="btn rounded-circle mx-2 mb-3 tablinks" onclick="openCity(event, 'ForSoal5')">5</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-footer bg-none my-3 mx-4">
                    <div class="wrapper-button">
                        <a href="#" class="btn btn-block btn-md btn-danger btn-detail-tugas" style="width: 100%;">Selesai Ujian</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<!-- Sidebar main menu ends -->
<main class="h-100">

    <!-- Header -->
    <?php if (isset($khusus)) : ?>
        <?php if (isset($khusus['tugas'])) : ?>
            <header class="header tugas-ujian position-fixed" style="background-color: #EC3528;">
            <?php endif; ?>
            <?php if (isset($khusus['qna'])) : ?>
                <header class="header tugas-ujian position-fixed bg-white">
                <?php endif; ?>
                <?php if (isset($khusus['notifikasi'])) : ?>
                    <header class="header position-fixed">
                    <?php endif; ?>
                    <?php if (isset($khusus['ujian'])) : ?>
                        <header class="header tugas-ujian position-fixed" style="background-color: #EC3528;">
                        <?php endif; ?>
                        <?php if (isset($khusus['detail_ujian'])) : ?>
                            <header class="header tugas-ujian position-fixed" style="background-color: #EC3528;">
                            <?php endif; ?>
                        <?php else : ?>
                            <header class="header position-fixed">
                            <?php endif; ?>
                            <div id="reload_header">
                                <div class="row" id="header_config">
                                    <div class="col-auto">
                                        <?php if (isset($button_back)) : ?>
                                            <?php if (!isset($button_back['khusus'])) : ?>
                                                <a href="<?= $button_back ?>" target="_self" class="btn btn-44">
                                                    <?php if (isset($text['white'])) : ?>
                                                        <i class="fa-solid fa-chevron-left text-white"></i>
                                                    <?php else : ?>
                                                        <i class="fa-solid fa-chevron-left text-dark"></i>
                                                    <?php endif; ?>
                                                </a>
                                            <?php else : ?>
                                                <?php if (isset($button_back['khusus']['ujian'])) : ?>
                                                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" class="btn btn-44 rounded-circle menu-btn number-exam">
                                                        <i class="fa-regular fa-objects-column" style="font-size:20px; color: #EC3528;"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <div class="col-auto">
                                                <a href="javascript:void(0)" target="_self" class="btn btn-44 menu-btn">
                                                    <img src="<?= base_url(); ?>assets/icons/hamburger.png" width="24" alt="">
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center text-center">
                                        <?php if (isset($text['white'])) : ?>
                                            <h6 class="text-white"><?php if (isset($judul_halaman)) {
                                                                        echo $judul_halaman;
                                                                    }; ?></h6>
                                        <?php else : ?>
                                            <h6 class="text-dark"><?php if (isset($judul_halaman)) {
                                                                        echo $judul_halaman;
                                                                    }; ?></h6>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-auto">
                                        <?php if (!isset($config_hidden['notifikasi']) || $config_hidden['notifikasi'] != true) : ?>
                                            <a href="<?= base_url('notifikasi'); ?>" target="_self" class="btn btn-44 rounded-circle btn-notifikasi">
                                                <img src="<?= base_url(); ?>assets/icons/notif.png" width="24" alt="">
                                                <!-- <span class="count-indicator"></span> -->
                                            </a>
                                        <?php endif; ?>

                                        <?php if (isset($right_button['profil'])) : ?>
                                            <button type="button" class="btn btn-44" id="button_submit_atas" onclick="submit_form(this,'#form_ubah_profil',0,'#ec3528')">
                                                <i class="fa-solid fa-check"></i>
                                            </button>

                                        <?php endif; ?>

                                        <?php if (isset($right_button['ubah_password'])) : ?>
                                            <button type="button" class="btn btn-44" id="button_submit_password_atas" onclick="submit_form(this,'#form_update_password',0,'#ec3528')">
                                                <i class="fa-solid fa-check"></i>
                                            </button>

                                        <?php endif; ?>

                                        <?php if (isset($right_button['materi'])) : ?>
                                            <div class="col-auto" id="parent_header_materi">
                                                <div id="reload_header_materi">
                                                    <button id="btnedit" class="btn " onclick="edit()">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <button id="btnsave" onclick="submit_form(this,'#form_edit_materi',0,'small','#000000')" class="btn d-none">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        <?php endif; ?>

                                        <?php if (isset($config_hidden['notifikasi']) && !isset($right_button)) : ?>
                                            <a href="#" target="_self" class="btn btn-44"> </a>
                                        <?php endif; ?>

                                        <?php if (isset($right_button['laporan_ujian'])) : ?>
                                            <a href="#" target="_self" class="btn btn-44" data-bs-toggle="modal" data-bs-target="#filterUjian"><i class="fa-regular fa-filter"></i></a>
                                        <?php endif; ?>
                                        <?php if (isset($right_button['chatting'])) :  ?>
                                            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#detail_profil_chat" aria-controls="offcanvasRight" class="btn btn-44 rounded-circle btn-notifikasi" style="background-image: url(<?= $foto_siswa; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;"></a>
                                        <?php endif; ?>
                                        <?php if (isset($right_button['chatting_grup'])) :  ?>
                                            <?php if ($foto_accept) : ?>
                                                <a class="btn btn-44 rounded-circle btn-notifikasi" style="background-image: url(<?= $foto_grup; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;"></a>
                                            <?php else : ?>
                                                <a class="btn btn-44 rounded-circle btn-notifikasi" style="background-repeat: no-repeat; background-size: cover; background-position: center;"><?= $foto_grup; ?></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if (isset($right_button['jurnal_guru'])) : ?>
                                            <a href="#" target="_self" class="btn btn-44" data-bs-toggle="modal" data-bs-target="#filterCalendar">
                                                <i class="fa-regular fa-filter"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (isset($right_button['jurnal_staf'])) : ?>
                                            <a href="#" target="_self" class="btn btn-44" data-bs-toggle="modal" data-bs-target="#filterCalendar">
                                                <i class="fa-regular fa-calendar"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (isset($right_button['kbm'])) : ?>
                                            <a href="#" target="_self" class="btn btn-44" data-bs-toggle="modal" data-bs-target="#filterCalendar">
                                                <i class="fa-regular fa-calendar"></i>
                                            </a>
                                        <?php endif; ?>

                                    </div>

                                </div>
                                <?php if (isset($khusus['qna'])) :  ?>
                                    <div class="row my-3">
                                        <div class="col-12 mx-auto">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-pribadi pencarian" id="search_personal" onkeyup="search(this,'a.target_search_1','#vector_pesan')" placeholder="Cari kontak" aria-label="Pencarian">
                                                <input type="text" class="form-control form-control-pribadi pencarian d-none" id="search_grup" onkeyup="search(this,'a.target_search_2','#vector_grup_pesan')" placeholder="Cari nama grup" aria-label="Pencarian" style="border-radius: 10px;">
                                                <button class="input-group-text searhing" id="basic-addon2"><i class="fa-solid fa-magnifying-glass size-20 text-white"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div class="tablinknya-tugas-ujian">
                                            <div class="col-12 align-self-center tab" style="display: flex; justify-content:center; align-items:center;">
                                                <!-- <span class="badge rounded-pill bg-danger ms-1">3</span> -->
                                                <button id="defaultOpen" class="tablinks" onclick="openCity(event, 'Personal')" style=" width: 100%; height: 100%; padding: 5px;">Pesan </button>
                                                <button class="tablinks" onclick="openCity(event, 'Grup')" style="width: 100%; height: 100%; padding: 5px;">Pesan Grup</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($khusus['ujian'])) : ?>
                                    <div class="d-flex justify-content-center">
                                        <div class="tablinknya-tugas-ujian">
                                            <div class="col-12 align-self-center tab-wali" style="display: flex; justify-content:center; align-items:center;">
                                                <button id="defaultOpen" class="tablinks-wali" onclick="openCity(event, 'Tugas')" style=" width: 100%; height: 100%; padding: 10px;">Daftar Ujian</button>
                                                <button class="tablinks-wali" onclick="openCity(event, 'Ujian')" style="width: 100%; height: 100%; padding: 10px;">Daftar Riwayat</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($khusus['detail_ujian'])) : ?>
                                    <div class="d-flex justify-content-center">
                                        <div class="tablinknya-tugas-ujian">
                                            <div class="col-12 align-self-center tab-wali" style="display: flex; justify-content:center; align-items:center;">
                                                <button id="defaultOpen" class="tablinks-wali" onclick="openCity(event, 'Tugas')" style=" width: 100%; height: 100%; padding: 10px;">Detail Ujian</button>
                                                <button class="tablinks-wali" onclick="openCity(event, 'Ujian')" style="width: 100%; height: 100%; padding: 10px;">Instruksi Ujian</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($khusus['tugas'])) : ?>
                                    <div class="d-flex justify-content-center">
                                        <div class="tablinknya-tugas-ujian">
                                            <div class="col-12 align-self-center tab-staf" style="display: flex; justify-content:center; align-items:center;">
                                                <button id="defaultOpen" class="tablinks-staf" onclick="openCity(event, 'detail_tugas')" style=" width: 100%; height: 100%; padding: 10px;">Tugas</button>
                                                <button class="tablinks-staf" onclick="openCity(event, 'daftar_siswa')" style="width: 100%; height: 100%; padding: 10px;">Siswa</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            </header>
                            <!-- Header ends -->