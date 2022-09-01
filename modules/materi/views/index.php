<!-- main page content -->
<div class="main-container container top-20">
    <div class="row">
        <div class="wrapper-searching-tugas mb-3">
            <div class="wrapper-samaran"></div>
            <div class="row bg-white" style="width: 100vw;">
                <div class="col-10">
                    <div class="input-group">
                        <input type="text" onkeyup="search(this, 'a.target_search','#vector_pelajaran')" id="cari_pelajaran" class="form-control form-control-pribadi pencarian" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="basic-addon2">
                        <button class="input-group-text searhing" id="basic-addon2" style="background-color:#EC3528;;"><i class="fa-solid fa-magnifying-glass size-20 text-white"></i></button>
                    </div>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center ps-0">
                    <button class="btn bg-dropdown filter-tugas border-0" data-bs-toggle="modal" data-bs-target="#filterTingkat">
                        <i class="fa-regular fa-filter" style="color: #EC3528;"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12" id="display_pelajaran">
            <?php if ($result) : ?>
                <?php foreach ($result as $row) : ?>
                    <a href="<?= base_url('materi/detail_bab/' . $row->id_pelajaran); ?>" data-tingkat="<?= $row->id_tingkat; ?>" class="card mb-3 target_search zoom-filter showing">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                            <i class="fa-brands fa-stack-overflow size-22 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-14 fw-normal"><?= tampil_text($row->nama_pelajaran, 20); ?></p>
                                    <p class="mb-0 size-13 fw-normal text-secondary"><?= tampil_text($row->nama_kelas, 20); ?></p>
                                </div>
                                <div class="col-auto align-self-center text-end ms-3">
                                    <button class="btn btn-md btn-link"><i class="fa-solid fa-chevron-right size-26 text-dark"></i></button>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
            <?= vector_default('vector_kbm_kosong.svg', 'Tidak ada mata pelajaran', 'Tidak ada mata pelajaran terkait, silahkan coba lagi nanti atau hubungi admin', 'vector_pelajaran', count($result)) ?>
        </div>
    </div>
</div>
<!-- main page content ends -->

<!-- Filter Ujian Modal -->
<div class="modal fade" id="filterTingkat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
                <h5 class="modal-title">Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="select_tingkat" class="form-label title-3">Pilih Tingkat Kelas</label>
                    <select class="form-select form-select form-select-pribadi border-0" id="select_tingkat" aria-label="Default select example">
                        <option value="all">Semua</option>
                        <?php if ($tingkat) : ?>
                            <?php foreach ($tingkat as $row) : ?>
                                <option value="<?= $row->id_tingkat; ?>"><?= $row->nama; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button id="button_filter" onclick="filter()" class="btn btn-block btn-md btn-danger btn-filter">Tampilkan</button>
            </div>
        </div>
    </div>
</div>

</main>