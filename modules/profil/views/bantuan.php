<!-- main page content -->
<div class="main-container container top-20">
    <?php if ($result) : ?>
        <div class="row">
            <div class="h-190 bg-ec3528 text-white text-center col-12 d-flex justify-content-center flex-column">
                <h3 class="mt-5 pt-3">Bagaimana cara kita membantu anda?</h3>
                <span class="mb-4 pb-3 fw-lighter">Cari topik sesuai dengan kendala anda</span>
                <div class="d-flex">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group searching" style="width: 92vw;">
                                <input type="text" onkeyup="search(this, 'a.target_search','#vector_bantuan')" id="cari_bantuan" class="form-control form-control-pribadi text-start pencarian" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="basic-addon2">
                                <button class="input-group-text searhing" id="basic-addon2"><i class="fa-solid fa-magnifying-glass size-20 text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-2">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row mb-2 my-2">
                    <div class="col-12 px-0">
                        <!-- swiper categories -->
                        <div class="swiper-container connectionwiper">
                            <div class="swiper-wrapper base_kategori">
                                <a class="swiper-slide" onclick="get_kategori(this,'all')">
                                    <div class="tag border kategori active">
                                        <span class="text-uppercase">Semua</span>
                                    </div>
                                </a>
                                <?php foreach ($result->kategori as $kat) : ?>
                                    <a class="swiper-slide" onclick="get_kategori(this,<?= $kat->id_kategori_bantuan ?>)">
                                        <div class="tag border kategori">
                                            <span class="text-uppercase"><?= $kat->nama; ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-0">
                <div class="box-fiture" id="display_bantuan">
                    <?php foreach ($result->bantuan as $row) : ?>
                        <a data-bs-toggle="modal" data-id="<?= $row->id_bantuan; ?>" data-kategori="bantuan_<?= $row->id_kategori_bantuan; ?>" data-bs-target="#modalDetailNotifikasi" class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-2 mx-3 target_search zoom-filter showing detail_bantuan">
                            <div class="row p-2">
                                <div class="col align-self-center ps-2">
                                    <p class="mb-0 fw-bold size-14"><?= $row->judul ?></p>
                                </div>
                                <div class="col-auto d-flex justify-content-end align-items-center ps-0">
                                    <div class="fs-3">
                                        <i class="fa-solid fa-chevron-right size-14"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($result) {
        $count = count($result->bantuan);
    } else {
        $count = count($result);
    } ?>
    <?= vector_default("vector_bantuan_kosong.svg", "Bantuan tidak tersedia", "Admin belum menyediakan bantuan untuk anda, silahkan hubungi admin atau pihak sekolah jika terdapat gangguan!", 'vector_bantuan', $count); ?>
</div>
<!-- main page content ends -->
</main>

<div class="modal fade" id="modalDetailNotifikasi" tabindex="-1" aria-labelledby="detailTagihanModal" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content detail-tagihan rounded-0">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="detailTagihanModal">Detail Bantuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="display_detail_bantuan">

            </div>
        </div>
    </div>
</div>
</div>