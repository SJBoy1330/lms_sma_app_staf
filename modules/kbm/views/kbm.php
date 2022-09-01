<!-- main page content -->
<div class="main-container container position-relative">
    <div class="row">
        <div class="col-12">
            <div class="row mb-3">
                <?php if ($result) : ?>
                    <?php foreach ($result as $row) : ?>
                        <a href="<?= base_url('kbm/detail_kbm/' . $row->id_pelajaran . '/' . $row->id_kelas . '?tanggal=' . $tanggal) ?>" class=" col-12">
                            <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden mb-3 p-3">
                                <?php if ($row->kbm == true) : ?>
                                    <div class="badge-keterangan-aktif">
                                        <p class="text-white size-12"></p>
                                    </div>
                                <?php else : ?>
                                    <div class="badge-keterangan-nonaktif">
                                        <p class="text-white size-12"></p>
                                    </div>
                                <?php endif; ?>
                                <div class="row py-1 px-2 mt-2 mb-2 ">
                                    <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                        <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                                <i class="fa-brands fa-stack-overflow size-22 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                        <p class="mb-0 fw-normal size-13 text-secondary">Mata Pelajaran</p>
                                        <p class="mb-0 fw-normal size-15"><?= $row->pelajaran; ?></p>
                                    </div>
                                </div>
                                <div class="row py-1 px-2 mb-3">
                                    <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                        <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                                <i class="fa-solid fa-building-user size-18 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                        <p class="mb-0 fw-normal size-13 text-secondary">Kelas</p>
                                        <p class="mb-0 fw-normal size-15"><?= $row->kelas; ?></p>
                                    </div>
                                </div>
                                <div class="row py-1 px-2 mb-3">
                                    <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                        <div class="avatar avatar-50 shadow-sm rounded-circle avatar-presensi-outline">
                                            <div class="avatar avatar-40 rounded-circle avatar-presensi-inline">
                                                <i class="fa-solid fa-clock size-22 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                        <p class="mb-0 fw-normal size-13 text-secondary">Waktu</p>
                                        <p class="mb-0 fw-normal size-15"><?= date('H:i', strtotime($row->jam_mulai)) ?> - <?= date('H:i', strtotime($row->jam_selesai)) ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- main page content ends -->
</main>

<!-- Filter KBM -->
<div class="modal fade" id="filterCalendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="GET" action="<?= base_url('kbm/kbm'); ?>" class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
                <h5 class="modal-title">Filter KBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label title-3">Tanggal</label>
                    <input type="date" name="tanggal" value="<?= $tanggal; ?>" class=" form-control form-control-solid form-control-pribadi border-0">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" class="btn btn-block btn-md btn-danger btn-filter">Simpan</button>
            </div>
        </form>
    </div>
</div>