<!-- main page content -->
<div class="main-container container top-20 pb-5" style="overflow-x: hidden;">
    <div id="display_detail">
        <div class="row d-flex justify-content-center align-items-center" id="reload_detail">
            <ul class="menu position-fixed" id="trio_menu">
                <div class="toggle" onclick="toggle_menu()">
                    <i class="fa-solid fa-plus-large"></i>
                </div>
                <li style="--i:0;"><a href="#modalTambahBab" data-bs-toggle="modal" role="button"><img src="<?= base_url() ?>assets/icons/tambah-bab.png" width="25" alt=""></a></li>
                <li style="--i:1;"><a <?php if ($result->result) {
                                            echo 'onclick="edit_bab()"';
                                        } else {
                                            echo 'onclick="take_alert(`PERINGATAN`,`Tidak ada bab tersedia! edit tidak bisa di lakukan`,`warning`)"';
                                        } ?> role="button"><img src="<?= base_url() ?>assets/icons/edit-bab.png" width="25" alt=""></a></li>
                <li style="--i:2;"><a href="#modalTambahMateri" data-bs-toggle="modal" role="button"><img src="<?= base_url() ?>assets/icons/tambah-materi.png" width="30" alt=""></a></li>
                <div class="indicator d-none"></div>
            </ul>
            <ul class="menu position-fixed d-none" id="action_menu">
                <button type="button" class="btn btn-cancel me-2" onclick="batal_edit_bab()"><i class="fa-solid fa-xmark"></i></button>
                <button type="button" class="btn btn-yes ms-2" onclick="submit_form(this,'#form_edit_bab',0,'big')" id="simpan_editan_bab"><i class="fa-solid fa-check"></i></button>
            </ul>
            <div class=" col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="avatar avatar-46 shadow-sm rounded-15 avatar-presensi-outline">
                                    <div class="avatar avatar-36 rounded-12 avatar-presensi-inline">
                                        <i class="fa-brands fa-stack-overflow size-22 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center ps-0">
                                <p class="mb-0 size-12 fw-normal text-secondary">Mata Pelajaran</p>
                                <p class="mb-0 size-14 fw-normal"><?= $result->detail->nama_pelajaran; ?></p>
                            </div>
                        </div>
                        <div id="display_jumlah">
                            <div class="row mt-3" id="reload_jumlah">
                                <div class="col-auto">
                                    <div class="avatar avatar-46 shadow-sm rounded-15 avatar-presensi-outline">
                                        <div class="avatar avatar-36 rounded-12 avatar-presensi-inline">
                                            <i class="fa-regular fa-chart-bar size-20 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0 pe-0">
                                    <p class="mb-0 size-12 fw-normal text-secondary">Bab Pelajaran</p>
                                    <p class="mb-0 size-13 fw-normal"><?= $result->detail->jumlah_bab; ?> Bab</p>
                                </div>

                                <div class="col-auto ps-1">
                                    <div class="avatar avatar-46 shadow-sm rounded-15 avatar-presensi-outline">
                                        <div class="avatar avatar-36 rounded-12 avatar-presensi-inline" style="line-height: 39px;">
                                            <i class="fa-solid fa-book-open-cover size-20 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-12 fw-normal text-secondary">Materi Pelajaran</p>
                                    <p class="mb-0 size-13 fw-normal"><?= $result->detail->jumlah_materi; ?> Materi</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row accordion-babpelajaran g-0" id="display_bab">
        <div id="reload_bab">
            <?php if ($result->result) : ?>
                <form action="<?= base_url('func_materi/update_multiple_bab') ?>" method="POST" id="form_edit_bab">
                    <input type="hidden" name="id_pelajaran" value="<?= $id_pelajaran; ?>" autocomplete="off">
                    <?php foreach ($result->result as $row) : ?>
                        <div id="dis-bab-<?= $row->id_bab; ?>">
                            <div class="d-flex input_judul_bab d-none">
                                <div class="col-10 mb-3">
                                    <input type="hidden" class="form-control form-control-pribadi text-start" name="id_bab[]" value="<?= $row->id_bab; ?>" autocomplete="off">
                                    <input type="text" class="form-control form-control-pribadi text-start" name="bab[]" style="width : 100%;" value="<?= $row->nama_bab; ?>" autocomplete="off">
                                </div>
                                <div class="col-2 d-flex justify-content-end align-items-center mb-3">
                                    <button type="button" onclick="hapus_bab(<?= $row->id_bab; ?>)" class="btn btn-secondary bg-dropdown bg-button rounded-pill">
                                        <i class="fa-solid fa-xmark" style="color: #EC3528;"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 mb-3 text_judul_bab">
                                <div class="accordion accordion-flush shadow-sm p-0" id="accordion-<?= $row->id_bab; ?>" style="border-radius: 10px;">
                                    <div class="accordion-item" style="border-radius: 10px;">
                                        <h2 class="accordion-header" id="flush-heading-<?= $row->id_bab; ?>">
                                            <button class="accordion-button collapsed text-wrap" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $row->id_bab; ?>" aria-expanded="false" aria-controls="collapse-<?= $row->id_bab; ?>" style="border-radius: 10px;">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <div class="avatar avatar-46 shadow-sm rounded-15 avatar-presensi-outline">
                                                            <div class="avatar avatar-36 rounded-12 avatar-presensi-inline">
                                                                <i class="fa-regular fa-chart-bar size-20 text-white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col align-self-center ps-0">
                                                        <p class="mb-1 size-12 fw-normal text-secondary">Bab Pelajaran</p>
                                                        <p class="mb-0 size-14 fw-normal"><?= $row->nama_bab; ?></p>

                                                    </div>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapse-<?= $row->id_bab; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?= $row->id_bab; ?>" data-bs-parent="#accordion-<?= $row->id_bab; ?>">
                                            <div id="reload-materi-<?= $row->id_bab; ?>" class="accordion-body size-11">
                                                <?php if ($row->materi) : ?>
                                                    <?php foreach ($row->materi as $mt) : ?>
                                                        <div class="row d-flex mb-3" id="materi-<?= $mt->id_materi; ?>">
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-46 shadow-sm rounded-circle avatar-presensi-outline">
                                                                    <div class="avatar avatar-36 rounded-circle avatar-presensi-inline" style="line-height: 37px;">
                                                                        <i class="fa-solid fa-book-open-cover size-16 text-white"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="<?= base_url('materi/detail_materi/' . $mt->id_materi); ?>" class="col align-self-center ps-0">
                                                                <p class="mb-0 size-12 fw-normal text-secondary">Materi Pelajaran</p>
                                                                <p class="mb-0 size-14 fw-normal text-dark"><?= $mt->judul; ?></p>
                                                            </a>
                                                            <div class="col-auto ps-0">
                                                                <div class="dropdown btn-group dropstart">
                                                                    <button onclick="hapus_materi(<?= $row->id_bab; ?>,<?= $mt->id_materi; ?>)" type="button" class="btn btn-secondary bg-dropdown bg-button rounded-pill" type="button">
                                                                        <i class="fa-solid fa-trash" style="font-size: 14px; color: #EC3528;"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <?= vector_default('vector_kbm_kosong.svg', 'Tidak ada materi', 'Sekolah belum menyediakan materi untuk anda, hubungi guru anda atau pihak sekolah jika terjadi kesalahan!') ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>
                </form>
            <?php else : ?>
                <?= vector_default('vector_bab_kosong.svg', 'Tidak ada bab', 'Tidak ada data Bab dan Materi tersedia, hubungi admin sekolah jika terjadi kesalahan!'); ?>
            <?php endif; ?>
        </div>

    </div>
</div>
<!-- main page content ends -->

</main>

<!-- Filter Tambah Bab -->
<div class="modal fade" id="modalTambahBab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" id="form_tambah_bab" action="<?= base_url('func_materi/tambah_bab'); ?>" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bab</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3" id="req_nama_bab">
                    <label class="form-label title-3">Nama Bab</label>
                    <input type="hidden" name="id_pelajaran" id="id_pelajaran" value="<?= $id_pelajaran; ?>">
                    <input type="text" name="nama_bab" id="nama_bab" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Isikan nama bab" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" id="tambah_bab" onclick="submit_form(this,'#form_tambah_bab',1)" class="btn btn-block btn-md btn-danger btn-filter">Tambah</a>
            </div>
        </form>
    </div>
</div>



<!-- Filter Tambah Materi -->
<div class="modal fade" id="modalTambahMateri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" id="form_tambah_materi" action="<?= base_url('func_materi/tambah_materi'); ?>" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" name="id_pelajaran" value="<?= $id_pelajaran; ?>" autocomplete="off">
            <div class="modal-body">
                <div class="col-12">
                    <div id="select_bab_parent">
                        <div class="mb-3" id="req_select_bab">
                            <label class="form-label title-3">Bab</label>
                            <select name="select_bab" class="form-select form-select form-select-pribadi border-0">
                                <option value="" selected>Pilih</option>
                                <?php if ($result->result) : ?>
                                    <?php foreach ($result->result as $row) : ?>
                                        <option value="<?= $row->id_bab; ?>"><?= $row->nama_bab; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>


                    <div class="mb-3" id="req_judul_materi">
                        <label class="form-label title-3">Nama Materi</label>
                        <input type="text" name="judul_materi" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Masukkan nama materi" autocomplete="off">
                    </div>

                    <div class="mb-5" id="req_keterangan_materi">
                        <label class="form-label title-3">Keterangan Materi</label>
                        <textarea name="keterangan_materi" style="min-height : 120px;" class="form-control form-control-solid form-control-pribadi border-0" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" id="tambah_materi" onclick="submit_form(this,'#form_tambah_materi',2)" class="btn btn-block btn-md btn-danger btn-filter">Tambah</a>
            </div>
        </form>
    </div>
</div>