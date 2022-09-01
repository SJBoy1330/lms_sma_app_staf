<!-- main page content -->
<div class="main-container container position-relative" id="parent_reload">
    <div class="row" id="display_surat">
        <div class="col-12">
            <div class="row mb-2">
                <?php if ($result) : ?>
                    <?php foreach ($result as $row) : ?>
                        <a data-bs-toggle="modal" onclick="modal_surat(<?= $row->id_surat_ijin; ?>)" href="#modalDetailSuratIjin">
                            <div class="list-group-item rounded-15 mb-1 shadow-sm position-relative overflow-hidden mb-3 p-3" <?php if (strtotime(date('Y-m-d H:i:s')) >= strtotime($row->berlaku_mulai)) {
                                                                                                                                    echo 'style="background-color : #F0F0F0;"';
                                                                                                                                } ?>>
                                <?php
                                if (strtotime(date('Y-m-d H:i:s')) >= strtotime($row->berlaku_mulai)) {
                                    $color = "bg-757575";
                                } else {
                                    if ($row->kode_status == 1 || $row->kode_status == NULL) {
                                        $color = "bg-FFBD17";
                                    } elseif ($row->kode_status == 2) {
                                        $color = "bg-00DFA3";
                                    } else {
                                        $color = "bg-F74141";
                                    }
                                }
                                ?>
                                <span class="py-2 px-3 text-light size-14 position-absolute top-0 end-0 <?= $color; ?> rounded-15-start-bottom blm-lns"><?= $row->status; ?></span>
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="fw-bolder size-14 mb-0">Surat Keterangan <?php if ($row->tipe == 1) {
                                                                                                echo 'izin';
                                                                                            } else {
                                                                                                echo 'sakit';
                                                                                            } ?></p>
                                        <p class="mb-0 fw-normal size-13 text-secondary"><?= nice_time($row->tanggal); ?></p>
                                    </div>
                                </div>
                                <div class="row py-1 px-2 mt-2 mb-2">
                                    <div class="d-flex col-auto align-items-center ps-0 pe-2">
                                        <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                                            <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                                <i class="fa-solid fa-graduation-cap size-15 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center p-0 d-flex align-items-start flex-column">
                                        <p class="mb-0 fw-normal size-13 text-secondary">Nama Siswa/Siswi</p>
                                        <p class="mb-0 fw-normal size-15"><?= $row->nama; ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?= vector_default("vector_surat_ijin_kosong.svg", "Tidak ada surat ijin!", "Murid kelas anda belum ada yang melakukan izin, hubungi admin atau pihak sekolah jika terjadi kesalahan!"); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- main page content ends -->

<!-- Modal Surat Ijin -->
<div class="modal fade bg-white" id="modalDetailSuratIjin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header py-3">
                <h5 class="modal-title">Detail Surat Ijin</h5>
                <button type="button" class="btn-close me-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="display_ijin">

            </div>
        </div>
    </div>
</div>
</main>