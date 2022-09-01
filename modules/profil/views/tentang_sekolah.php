<!-- main page content -->
<div class="main-container container top-20">
    <div class="row">
        <div class="col-12 px-0">
            <div class="box-fiture">
                <div class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="col-6 align-self-center p-0">
                            <img src="<?= base_url(); ?>assets/images/tentang_logo_sekolah.svg" alt="" width="175">
                        </div>
                        <div class="col-6 align-self-center ps-2">
                            <p class="mb-0 fw-bold size-16">Nama Sekolah</p>
                            <p class="text-secondary size-12"><?= $data_sekolah->nama_sekolah ?></p>
                        </div>
                        <div class="logo-sekolah position-absolute" style="top: 45px; left: 65px; width:50px;">
                            <img src="<?= $data_sekolah->logo; ?>" alt="" width="30">
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-fiture">
                <div class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="col-6 align-self-center ps-3">
                            <img src="<?= base_url(); ?>assets/images/tentang_nspm_sekolah.svg" alt="" width="100">
                        </div>
                        <div class="col-6 align-self-center p-0">
                            <p class="mb-0 fw-bold size-16">NPSN Sekolah</p>
                            <p class="text-secondary size-12"><?= $data_sekolah->npsn ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-fiture">
                <div class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="col-6 align-self-center ps-3">
                            <p class="mb-0 fw-bold size-16">Alamat Sekolah</p>
                            <p class="text-secondary size-12"><?= $data_sekolah->alamat ?></p>
                        </div>
                        <div class="col-6 align-self-center p-0">
                            <img src="<?= base_url(); ?>assets/images/tentang_alamat_sekolah.svg" alt="" width="115">
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-fiture">
                <div class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="col-6 align-self-center ps-3">
                            <img src="<?= base_url(); ?>assets/images/tentang_jumlah_siswa.svg" alt="" width="115">
                        </div>
                        <div class="col-6 align-self-center p-0">
                            <p class="mb-0 fw-bold size-16">Jumlah Siswa</p>
                            <p class="text-secondary size-12"><?= $count_siswa ?> Siswa</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-fiture">
                <div class="list-group-item border-0 bg-f5f5f5 shadow-none rounded-15 py-1 px-3 mb-3 mx-3">
                    <div class="row p-2">
                        <div class="col-6 align-self-center ps-3">
                            <p class="mb-0 fw-bold size-16">Jumlah Staf</p>
                            <p class="text-secondary size-12"><?= $count_staf ?> Staf</p>
                        </div>
                        <div class="col-6 align-self-center p-0">
                            <img src="<?= base_url(); ?>assets/images/tentang_jumlah_staf.svg" alt="" width="115">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main page content ends -->
</main>