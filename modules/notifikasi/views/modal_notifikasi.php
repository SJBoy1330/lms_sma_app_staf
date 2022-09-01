<div class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
    <div class="modal-header">
        <h5 class="modal-title" id="notifikasi_staf"><?= get_tipe_notif($tipe); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body text-center">
        <h5 class="mb-2"><?= $judul; ?></h5>
        <p class="size-13 text-muted mb-3"><?= $keterangan; ?></p>
    </div>
</div>