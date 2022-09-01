<!-- main page content -->
<div class="main-container container">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <?php if ($result) : ?>
                <?php foreach ($result as $row) : ?>
                    <?php if ($row->redirect == true) : ?>
                        <a href="<?= base_url('qna/chatting_grup/' . $row->id_diskusi . '?tanggal=' . date('Y-m-d')); ?>" class="card mb-3">
                        <?php else : ?>
                            <a href="#" data-url_ajax="<?= base_url('qna/create_chat_grup'); ?>" data-post="id_kelas,id_pelajaran" data-value="<?= $row->id_kelas; ?>,<?= $row->id_pelajaran; ?>" <?= alert_question('KONFIRMASI', 'Apakah anda akan memulai chat di grup ' . $row->nama_pelajaran . ' ?'); ?> class="card mb-3 question_alert">
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">

                                        <?php if ($row->accept == true) : ?>
                                            <div class="avatar avatar-50 rounded-circle avatar-pesan">
                                                <img src="<?= $row->foto; ?>" alt="">
                                            </div>
                                        <?php else : ?>
                                            <div class="avatar avatar-50 rounded-circle avatar-pesan">
                                                <?= $row->foto; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <p class="mb-0 size-14 fw-medium"><?= tampil_text($row->nama_pelajaran, 25); ?></p>
                                        <p class="text-muted text-secondary size-12"><?= tampil_text($row->nama_staf, 20); ?></p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
        </div>
        <!-- <div class="col-12 col-md-6 col-lg-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="lds-ripple"><div></div><div></div></div>
            </div>
        </div> -->
    </div>
</div>
<!-- main page content ends -->