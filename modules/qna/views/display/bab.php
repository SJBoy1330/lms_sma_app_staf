<?php if ($result) : ?>
    <?php foreach ($result as $row) : ?>
        <div class="card mb-4" onclick="toMateri(<?= $row->id_bab; ?>)">
            <div class="card-body">
                <div class="row">
                    <div class="col align-self-center">
                        <p class="mb-0 size-15 fw-medium"><?= $row->nama_bab; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <?= vector_default('vector_bab_kosong.svg', 'Tidak ada bab', 'Belum ada bab tersedia dalam pelajaran ini, hubungi guru anda atau pihak sekolah jika terjadi kesalahan!'); ?>
<?php endif; ?>