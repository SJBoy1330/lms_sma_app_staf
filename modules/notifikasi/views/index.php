<!-- main page content -->
<div class="main-container container pt-0">
    <!-- notification list -->
    <?php if ($result) : ?>
        <div class="row my-2">
            <div class="col-12 px-0">
                <!-- swiper categories -->
                <div class="swiper-container connectionwiper">
                    <div class="swiper-wrapper base_tipe">

                        <a class="swiper-slide" onclick="get_tipe(this,'all')">
                            <div class="tag border tipe active">
                                <span class="text-uppercase">Semua</span>
                            </div>
                        </a>
                        <?php foreach (get_tipe_notif() as $kode => $tipe) : ?>
                            <a class="swiper-slide" onclick="get_tipe(this,<?= $kode; ?>)">
                                <div class="tag border tipe">
                                    <span class="text-uppercase"><?= $tipe; ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row" id="parent_notif">
        <div class="col-12 px-0" id="reload_content_notif" style="margin-bottom: 100px;">
            <?php if ($result) : ?>
                <!-- <div class="d-none ms-3 mb-2 align-self-center" id="pilih_semua" style="display : flex; justify-content: flex-start; align-items : flex-start">
                    <input class="form-check-input" type="checkbox"  id="notif_parent_checkbox" style="width : 18px; height: 18px; border-radius: 5px;">
                    <span class="ms-2 size-13">Pilih Semua</span>
                </div> -->
                <div class="form-check d-none align-self-center ms-2 mb-2" id="pilih_semua" style="display : flex; justify-content: flex-start; align-items : end">
                    <input class="form-check-input" type="checkbox" id="notif_parent_checkbox" style="width : 18px; height: 18px; border-radius: 5px;">
                    <label class="form-check-label size-12 ms-1">
                        Pilih Semua
                    </label>
                </div>
                <form action="<?= base_url('notifikasi/hapus_all') ?>" method="POST" id="form_action_notifikasi">
                    <div class="list-group list-group-flush bg-none" id="display_notifikasi">
                        <?php foreach ($result as $row) : ?>
                            <?php if ($row->terbaca == 'N') {
                                $status = 1;
                            } else {
                                $status = 0;
                            } ?>
                            <div id="fadeout-notif-<?= $row->id_notifikasi_staf; ?>" class=" list-group-item bg-white py-0 zoom-filter showing" data-tipe="tipe-<?= $row->tipe; ?>">
                                <input type="checkbox" onchange="pilih_notif(this)" class="checkboxes d-none" name="id_notifikasi_staf[]" value="<?= $row->id_notifikasi_staf; ?>" style="position : absolute;width : 85vw; height : 100%;opacity : 0;">
                                <?php if ($row->link != NULL) : ?>
                                    <a onclick="read_notif(this,<?= $status; ?>)" data-url="<?= convert_link($row->link); ?>" data-id="<?= $row->id_notifikasi_staf; ?>" class="button_long_press text-dark py-0" data-tipe="tipe-<?= $row->tipe; ?>">
                                    <?php else : ?>
                                        <a onclick="read_notif(this,<?= $status; ?>)" data-bs-toggle="modal" data-bs-target="#detail_notifikasi" role="button" data-id="<?= $row->id_notifikasi_staf; ?>" class="py-0 button_notif button_long_press text-dark" data-tipe="tipe-<?= $row->tipe; ?>">
                                        <?php endif; ?>
                                        <div id="pro-notif-<?= $row->id_notifikasi_staf; ?>" class="row <?php if ($row->terbaca == 'N') {
                                                                                                            echo 'bg-notif-readed';
                                                                                                        } ?> pb-3 div-notif">
                                            <div class="col-12">
                                                <div class="row d-flex justify-content-between my-2">
                                                    <div class="col-auto not-info">
                                                        <div class="col d-flex align-items-center not-info">
                                                            <span class="dot-notif"></span>
                                                            <p class="size-12 fw-bold ps-1 unselectable"><?= get_tipe_notif($row->tipe); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="size-12 unselectable"><?= nice_time($row->tanggal); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col align-self-center">
                                                <p class="mb-1 size-14 unselectable"><b><?= nice_title($row->judul, 30); ?></b> </p>
                                                <p class="size-12 text-secondary unselectable"><?= nice_title($row->keterangan, 80); ?></p>
                                            </div>
                                        </div>
                                        </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </form>

            <?php endif; ?>

            <?= vector_default("vector_notifikasi_kosong.svg", "Tidak ada notifikasi", "Tidak ditemukan pemberitahuan untuk anda, Hubungi admin jika terjadi kesalahan!", 'vector_notifikasi', count($result)); ?>
        </div>

        <!-- Action Notfikasi -->
        <div id="action_notifikasi" class="footer-notifikasi d-none">
            <div class="container px-0">
                <div class="row notifikasi px-0">
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <button type="button" id="btn_bca_ntf" class="btn btn-danger rounded-pill btn-notifikasi-fill"><i class="fa-regular fa-check notifikasi"></i><span class="span-notifikasi">Tandai dibaca</span></button>
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <button type="button" id="btn_hps_ntf" class="btn btn-danger rounded-pill btn-notifikasi-outline"><i class="fa-regular fa-trash notifikasi"></i><span class="span-notifikasi">Hapus Notifikasi</span></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Action Notifikasi -->

    </div>
</div>
<!-- main page content ends -->

</main>


<div class="modal fade" id="detail_notifikasi" tabindex="-1" aria-labelledby="notifikasi_staf" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="display_notifikasi_dua">

    </div>
</div>