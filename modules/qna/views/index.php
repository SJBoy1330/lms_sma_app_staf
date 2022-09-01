<!-- main page content -->
<div class="main-container container top-20">
    <div class="row" style="margin-top: 130px;">
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <div class="row mb-2">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card shadow-none bg-transparent">
                        <div class="card-body tabcontent" id="Personal">
                            <a href="<?= base_url('qna/kontak_personal') ?>" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed">
                                <i class="fa-solid fa-message-lines size-26 text-white mt-1"></i>
                            </a>
                            <?php if ($result) : ?>
                                <?php foreach ($result as $row) : ?>
                                    <div>
                                        <a href="<?= base_url('qna/chatting/' . $row->id_diskusi_tanya . '?tanggal=' . date('Y-m-d')) ?>" class="card mb-3 target_search_1 showing">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <div class="avatar avatar-50 rounded-circle avatar-pesan">
                                                            <img src="<?= $row->foto; ?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col align-self-center ps-0">
                                                        <p class="mb-1 size-13 fw-medium"><?= tampil_text($row->nama_siswa, 20); ?></p>
                                                        <p class="text-muted text-secondary size-12"><?= ifnull(tampil_text($row->last_chat, 20), '.....') ?></p>
                                                    </div>
                                                    <div class="col-auto align-self-center pesan-sd position-absolute">
                                                        <p class="mb-0 ms-1 size-10 fw-medium"><?= $row->waktu; ?></p>
                                                        <!-- <span class="badge rounded-pill bg-danger badge-notifikasi">3</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?= vector_default('vector_chatting_kosong.svg', 'Tidak ada obrolan', 'Anda belum memulai obrolan apapun, hubungi pihak sekolah jika terjadi kesalahan!', 'vector_pesan', count($result)) ?>
                        </div>

                        <div class="card-body tabcontent" id="Grup">
                            <a href="<?= base_url('qna/kontak_grup'); ?>" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed">
                                <i class="fa-solid fa-messages size-26 text-white mt-1"></i>
                            </a>
                            <?php if ($result_dua) : ?>
                                <?php foreach ($result_dua as $row) : ?>
                                    <div>
                                        <a href="<?= base_url('qna/chatting_grup/' . $row->id_diskusi_grup_tanya . '?tanggal=' . date('Y-m-d')) ?>" class="card mb-3 target_search_2 showing">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <div class="avatar avatar-50 rounded-circle avatar-pesan">
                                                            <?php if ($row->accept == true) : ?>
                                                                <img src="<?= $row->foto; ?>" alt="">
                                                            <?php else : ?>
                                                                <?= $row->foto; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col align-self-center ps-0">
                                                        <p class="mb-1 size-13 fw-medium"><?= tampil_text($row->nama_kelas, 10) . ' | ' . tampil_text($row->nama_pelajaran, 18); ?></p>
                                                        <p class="text-muted text-secondary size-12"><?= ifnull(tampil_text($row->last_chat, 20), '.....') ?></p>
                                                    </div>
                                                    <div class="col-auto align-self-center pesan-sd position-absolute">
                                                        <p class="mb-0 ms-1 size-10 fw-medium"><?= $row->waktu; ?></p>
                                                        <!-- <span class="badge rounded-pill bg-danger badge-notifikasi">3</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?= vector_default('vector_grup_chat.svg', 'Tidak ada obrolan Grup', 'Anda belum memulai obrolan apapun, hubungi pihak sekolah jika terjadi kesalahan!', 'vector_grup_pesan', count($result_dua)) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main page content ends -->