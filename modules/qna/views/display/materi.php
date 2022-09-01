<?php if ($result) : ?>
    <?php foreach ($result as $row) : ?>
        <div class="card mb-4" onclick="choose_materi(this,<?= $row->id_materi; ?>)" data-title="<?= tampil_text($row->judul, 25); ?>" data-text="<?= tampil_text($row->keterangan, 30); ?>">
            <div class="card-body">
                <div class="row">
                    <div class="col align-self-center">
                        <p class="mb-0 size-15 fw-medium"><?= tampil_text($row->judul, 25); ?></p>
                        <p class="mb-0 size-13 fw-normal text-secondary"><?= tampil_text($row->keterangan, 30); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <?= vector_default('vector_kbm_kosong.svg', 'Tidak ada materi', 'Belum ada materi tersedia dalam bab ini, hubungi guru anda atau pihak sekolah jika terjadi kesalahan!'); ?>
<?php endif; ?>