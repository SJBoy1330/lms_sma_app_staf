<!-- main page content -->
<div class="main-container container">
    <input type="hidden" name="now" id="now" value="<?= date('Y-m-d'); ?>">
    <div class="row mb-5" id="display_chat">
        <div class="col-12 chat-list scroll-y mb-3" id="reload_chat">
            <?php if ($result) : ?>
                <?php foreach ($result as $row) : ?>
                    <?php if ($row->domain == true) : ?>
                        <!-- CHAT PENGIRIM -->
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block pengirim">
                                    <?php if ($row->reply == false) : ?>
                                        <!-- JIKA CHAT BIASA  -->
                                        <div class="row">
                                            <?php if ($row->file == NULL) : ?>
                                                <!-- JIKA BUKAN FILE -->
                                                <div class="col">
                                                    <?php if ($row->gambar != NULL) : ?>
                                                        <!-- JIKA ADA GAMBAR -->
                                                        <div class="mw-100 position-relative mb-2 figure">
                                                            <img src="<?= $row->gambar; ?>" alt="" class="mw-100">
                                                        </div>
                                                    <?php endif; ?>
                                                    <p class="mb-0 size-15 fw-normal" style="overflow-wrap: break-word;"><?= $row->pesan; ?></p>
                                                </div>
                                            <?php else : ?>
                                                <!-- JIKA FILE -->
                                                <div class="col-auto detail-tugas-sd">
                                                    <div class="avatar avatar-50 rounded-10 avatar-detail-tugas">
                                                        <!-- <i class="fa-solid fa-file-word size-30"></i> -->
                                                        <?= get_icon_file($row->file->ext); ?>
                                                    </div>
                                                </div>
                                                <div class="col-auto align-self-center ps-2">
                                                    <a href="<?= $row->file->download ?>" class="mb-0 size-13 fw-medium text-dark"><?= tampil_text($row->file->name, 20); ?></a>
                                                    <p class="mb-0 size-12 fw-normal text-muted"><?= strtoupper($row->file->ext) ?> File</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php else : ?>
                                        <!-- JIKA CHAT REPLY MATERI -->
                                        <div class="row flex-column">
                                            <div class="reply-text-pengirim">
                                                <div class="column-reply-pengirim flex-wrap">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="size-12 fw-medium mb-0"><?= tampil_text($row->judul_materi, 20); ?></p>
                                                    </div>
                                                    <p class="fw-normal size-12"><?= tampil_text($row->ket_materi, 70); ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0 mt-2 size-15 fw-normal"><?= $row->pesan; ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <!-- CHAT BALASAN -->
                        <div class="row no-margin left-chat my-3">
                            <div class="col-10">
                                <div class="chat-block penerima">
                                    <?php if ($row->reply == false) : ?>
                                        <!-- JIKA PESAN BIASA -->
                                        <div class="row">
                                            <?php if ($row->file == NULL) : ?>
                                                <div class="col">
                                                    <p class="mb-1 mt-0 ms-1 size-16 fw-medium text-dark"><?= tampil_text($row->nama_chat, 15); ?></p>
                                                    <?php if ($row->gambar != NULL) : ?>
                                                        <!-- JIKA ADA GAMBAR -->
                                                        <div class="mw-100 position-relative mb-2 figure">
                                                            <img src="<?= $row->gambar; ?>" alt="" class="mw-100">
                                                        </div>
                                                    <?php endif; ?>
                                                    <p class="mb-0 ms-1 size-15 fw-normal" style="overflow-wrap: break-word;"><?= $row->pesan; ?></p>
                                                </div>
                                            <?php else : ?>
                                                <!-- JIKA FILE -->
                                                <div class="col-auto detail-tugas-sd">
                                                    <div class="avatar avatar-50 rounded-10 avatar-detail-tugas">
                                                        <!-- <i class="fa-solid fa-file-word size-30"></i> -->
                                                        <?= get_icon_file($row->file->ext); ?>
                                                    </div>
                                                </div>
                                                <div class="col-auto align-self-center ps-2">
                                                    <p class="mb-1 mt-0 ms-1 size-16 fw-medium text-dark"><?= tampil_text($row->nama_chat, 15); ?></p>
                                                    <a href="<?= $row->file->download ?>" class="mb-0 size-13 fw-medium text-dark"><?= tampil_text($row->file->name, 20); ?></a>
                                                    <p class="mb-0 size-12 fw-normal text-muted"><?= strtoupper($row->file->ext) ?> File</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php else : ?>
                                        <!-- JIKA PESAN REPLAY MATERI -->
                                        <div class="row flex-column">
                                            <p class="mb-1 mt-0 ms-1 size-16 fw-medium text-dark"><?= tampil_text($row->nama_chat, 15); ?></p>
                                            <div class="reply-text-penerima">
                                                <div class="column-reply-penerima flex-wrap">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="size-12 fw-medium mb-0"><?= tampil_text($row->judul_materi, 20); ?></p>
                                                    </div>
                                                    <p class="fw-normal size-12"><?= tampil_text($row->ket_materi, 70); ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0 mt-2 size-15 fw-normal"><?= $row->pesan; ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div style="height : 20px;"></div>

            <?php else : ?>
                <?= vector_default('vector_grup_chat.svg', 'Tidak ada chat', 'Anda belum melakukan obrolan hari ini, kirim pesan di grup ini !') ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="position-fixed bottom-0 start-0 chat-post">
        <form class="row gx-3 typing-area">
            <div class="col-10">
                <div class="form-group mb-2">
                    <div class="wrapper-password d-flex flex-wrap">
                        <input type="hidden" id="id_pelajaran" value="0">
                        <input type="hidden" id="id_materi" name="id_materi">
                        <input type="hidden" name="id_diskusi_grup_tanya" id="id_diskusi_grup_tanya" value="<?= $id_diskusi_grup_tanya; ?>">
                        <div class="reply-text" id="display_reply" style="display:none;">
                            <div class="column-reply flex-wrap">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="size-15 fw-medium mb-0" id="materi">Max Smith</p>
                                    <button onclick="batal_materi()" class=" btn btn-sm btn-block"><i class="fa-regular fa-xmark" style="color: #8e8e8e;"></i></button>
                                </div>
                                <p class="fw-normal size-12 mb-2" id="text_materi">Lorem</p>
                            </div>
                        </div>
                        <div class="form-floating chatting" id="ta-frame" style="width:100%;">
                            <textarea type="text" class="form-control autoresize-textarea input-field chatting border-0" name="pesan" id="pesan" placeholder="Tulis Pesan" autocomplete="off" rows="1"></textarea>
                        </div>
                        <a href="#" class="input-group-append tambah-file" data-bs-toggle="modal" data-bs-target="#menuModalChatting" id="centermenubtn">
                            <span class="input-group-text">
                                <i class="fa-solid fa-plus size-20 text-white"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-danger btn-44 rounded-circle avatar p-0 button-kirim-pesan submit-chat" type="button" data-bs-toggle="modal" data-bs-target="#attachefiles" disabled>
                    <i class="fa-regular fa-paper-plane size-22 text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Chatting -->
<div class="modal fade" id="menuModalChatting" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow position-absolute" style="bottom: 65px;">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-auto text-center">
                        <a href="#" class="avatar avatar-60 p-1 shadow-sm shadow-danger rounded-20 bg-danger mb-2" data-bs-toggle="modal" data-bs-target="#pelajaranModal" aria-hidden="true">
                            <div class="circle-bg-top"></div>
                            <div class="circle-bg-bottom"></div>
                            <div class="icons text-danger">
                                <i class="fa-solid fa-book-open-cover size-28 text-white"></i>
                            </div>
                        </a>
                        <p class="size-13 text-secondary">Materi</p>
                    </div>

                    <div class="col-auto text-center">
                        <input id="upload-file" onchange="kirim_file(this)" type="file" />
                        <a href="javascript:void(0)" id="upload" class="avatar avatar-60 p-1 shadow-sm shadow-primary rounded-20 bg-secondary mb-2">
                            <div class="circle-bg-top"></div>
                            <div class="circle-bg-bottom"></div>
                            <div class="icons text-purple">
                                <i class="fa-solid fa-file size-28 text-white"></i>
                            </div>
                        </a>
                        <p class="size-13 text-secondary">Dokumen</p>
                    </div>

                    <div class="col-auto text-center">
                        <input id="upload-file2" type="file" onchange="kirim_gambar(this)" accept="image/*" />
                        <a href="javascript:void(0)" id="upload2" class="avatar avatar-60 p-1 shadow-sm shadow-info rounded-20 bg-image-modal mb-2">
                            <div class="circle-bg-top"></div>
                            <div class="circle-bg-bottom"></div>
                            <div class="icons text-success">
                                <i class="fa-solid fa-image size-28 text-white"></i>
                            </div>
                        </a>
                        <p class="size-13 text-secondary">Foto</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen">
        <div class="modal-content position-absolute bottom-0" style="border-radius: 15px 15px 0px 0px; height: 75%;">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="avatar-upload">
                    <div class="avatar-preview">
                        <figure id="div_gambar" style="background-image: url(<?= base_url(); ?>assets/images/naruto.png);"></figure>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <div class="position-fixed bottom-0 start-0 chat-post">
                    <div class="row gx-3">
                        <div class="col">
                            <div class="form-group mb-2">
                                <div class="wrapper-password d-flex">
                                    <input type="text" id="base_pesan_dua" class="form-control form-control-pribadi ps-3 chatting" name="text" placeholder="Tulis Pesan" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" onclick="kirim_pesan_gambar()" class="btn btn-danger btn-44 rounded-circle avatar p-0 button-kirim-pesan" data-bs-toggle="modal" data-bs-target="#attachefiles">
                                <i class="fa-regular fa-paper-plane size-22 text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Pelajaran -->
<div class="modal fade" id="pelajaranModal" tabindex="-1" aria-labelledby="pelajaranModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen">
        <div class="modal-content position-absolute bottom-0" style="border-radius: 15px 15px 0px 0px; height: 75%;">
            <div class="modal-header header-materi">
                <h5 class="modal-title" id="pelajaranModalLabel">Materi Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body body-materi" id="pelajaran">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <?php if ($pelajaran) : ?>
                            <?php foreach ($pelajaran as $row) : ?>
                                <div class="card mb-4" onclick="toBab(<?= $row->id_pelajaran; ?>)">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col align-self-center">
                                                <p class="mb-0 size-15 fw-medium"><?= $row->nama_pelajaran; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?= vector_default('vector_jadwal_kosong.svg', 'Tidak ada pelajaran!', 'Guru ini tidak mengajar mapel apapun, silahkan hubguni admin jika terjadi kesalahan!'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="modal-body body-materi hiding" id="bab_materi">
                <div class="row">
                    <div class="col-12 mx-auto" id="display_bab_materi">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>