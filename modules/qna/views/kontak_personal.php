<!-- main page content -->
<div class="main-container container">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <?php if ($result) : ?>
                <?php foreach ($result as $row) : ?>
                    <?php if ($row->redirect == true) : ?>
                        <a href="<?= base_url('qna/chatting/' . $row->id . '?tanggal=' . date('Y-m-d')); ?>" class="card mb-3">
                        <?php else : ?>
                            <a data-url_ajax="<?= base_url('qna/create_chat'); ?>" data-post="id_siswa," data-value="<?= $row->id_siswa; ?>," <?= alert_question('KONFIRMASI', 'Apakah anda akan memulai chat dengan ' . $row->nama_staf . ' ?'); ?> class="card mb-3 question_alert">
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 rounded-circle avatar-pesan">
                                            <img src="<?= $row->foto; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <p class="mb-0 size-14 fw-medium"><?= $row->nama_siswa; ?></p>
                                        <p class="text-muted text-secondary size-12"><?= nice_title($row->nama_kelas, 40); ?></p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
        </div>
        <!-- <div class="col-12 col-md-6 col-lg-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="lds-ripple">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- main page content ends -->