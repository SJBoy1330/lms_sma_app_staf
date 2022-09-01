<!-- main page content -->
<div class="main-container container top-20">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <?php if (isset($result) && $result != NULL) : ?>

                <div class="row mb-2">
                    <div class="col-12 px-0">
                        <!-- swiper categories -->
                        <div class="swiper-container connectionwiper">
                            <div class="swiper-wrapper base_kategori">
                                <a class="swiper-slide" onclick="get_kategori(this,'all')">
                                    <div class="tag border kategori active">
                                        <span class="text-uppercase">Semua</span>
                                    </div>
                                </a>
                                <?php foreach ($kategori as $k) : ?>
                                    <a class="swiper-slide" onclick="get_kategori(this,<?= $k->id_kategori_konten; ?>)">
                                        <div class="tag border kategori">
                                            <span class="text-uppercase"><?= $k->nama ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="display_berita">
                    <?php foreach ($result as $b) : ?>
                        <div data-kategori="kategori-<?= $b->id_kategori_konten; ?>" class="zoom-filter">
                            <a href="<?= base_url('home/detail_berita/') . $b->id_konten ?>" class="col-12 text-dark">
                                <div class="row">
                                    <div class="col-12">
                                        <figure class="overflow-hidden rounded-15 text-center detail-berita" style="background-position: center; background-size: cover; background-image: url('<?= $b->gambar != '' || $b->gambar != NULL ? $b->gambar : 'kosong' ?>');">
                                        </figure>
                                    </div>
                                </div>

                                <div class="row mb-4 mx-2">
                                    <div class="col-12">
                                        <p class="my-2 fw-medium size-18"><?= $b->judul ?></p>
                                        <p class="text-secondary deskripsi-berita"><?= $b->keterangan ?><span>...</span><a href="<?= base_url('home/detail_berita/') . $b->id_konten ?>" class="label-merah ms-2">selengkapnya</a></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>

            <?php else : ?>
                <?= vector_default("vector_pengumuman_berita_kosong.svg", "Berita tidak tersedia!", "Sekolah tidak menyediakan berita untuk anda, Silahkan hubungi pihak sekolah jika terjadi kesalahan!"); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
<!-- main page content ends -->


</main>
<!-- Page ends-->