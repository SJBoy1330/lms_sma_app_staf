<form action="<?= base_url('suratijin/edit'); ?>" method="POST" id="form_surat_ijin">
    <div class=" modal-body">
        <div class="row">
            <div class="col-12">
                <?php if (!in_array($extension, ['pdf'])) : ?>
                    <figure onclick="preview_image('<?= $file_surat ?>')" class="overflow-hidden rounded-15 text-center detail-pengumuman" style="background-position: center; background-size: cover; background-image: url('<?= $file_surat ?>');">
                    </figure>
                <?php else : ?>
                    <figure class="overflow-hidden rounded-15 text-center" style="background-color: #FFE6E6; padding: 40px;">
                        <i class="fa-solid fa-file-pdf" style="font-size: 7rem;"></i>
                    </figure>
                    <a class="btn btn-block btn-md btn-filter" href="<?= $file_surat ?>">DOWNLOAD</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input type="hidden" id="id_surat_ijin" name="id_surat_ijin" value="<?= $id_surat_ijin; ?>">
                <div class="mb-3" id="req_berlaku_mulai">
                    <label class="form-label title-3">Tanggal Awal</label>
                    <input type="date" value="<?= $berlaku_mulai; ?>" name="berlaku_mulai" class="form-control form-control-solid form-control-pribadi border-0" autocomplete="off">
                </div>

                <div class="mb-3" id="req_berlaku_sampai">
                    <label class="form-label title-3">Tanggal Akhir</label>
                    <input type="date" value="<?= $berlaku_sampai; ?>" name="berlaku_sampai" class="form-control form-control-solid form-control-pribadi border-0" autocomplete="off">
                </div>

                <div class="mb-3" id="req_status">
                    <label class="form-label title-3">Status</label>
                    <select name="status" class="form-select form-select-pribadi border-0" aria-label="Default select example">
                        <option value="1" <?php if ($kode_status == 1) {
                                                echo 'selected';
                                            } ?>>Menunggu Konfirmasi</option>
                        <option value="2" <?php if ($kode_status == 2) {
                                                echo 'selected';
                                            } ?>>Diterima</option>
                        <option value="3" <?php if ($kode_status == 3) {
                                                echo 'selected';
                                            } ?>>Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label title-3">Komentar</label>
                    <textarea name="komentar" class="autoresize-textarea form-control form-control-solid border-0" id="komentar" rows='3' data-min-rows='3'><?= $komentar; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" id="button_edit_surat" onclick="submit_form(this,'#form_surat_ijin')" class="btn btn-block btn-md btn-danger btn-filter">Simpan</button>
    </div>
</form>

<script>
    textarea = document.querySelector(".autoresize-textarea");
    textarea.addEventListener('input', autoResize, false);
    
    function autoResize() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    }
</script>
