<main class="h-100 py-0">
    <!-- Header -->
    <header class="header position-fixed">
        <div class="row">
            <div class="col-auto">
                <a href="<?= base_url('materi/detail_bab')?>" class="btn btn-44">
                    <i class="fa-solid fa-chevron-left text-dark"></i>
                </a>
            </div>
            <div class="col text-center">
                <div class="logo-small">
                    <h6>Edit Materi</h6>
                </div>
            </div>
            <div class="col-auto">
                <a href="#" target="_self" class="btn btn-44"></a>
            </div>
        </div>
    </header>
    <!-- Header ends -->

    <!-- main page content -->
    <div class="main-container container position-relative">
        <div class="row">
            <div class="col-12 px-4">
                <div class="mb-3">
                    <label class="form-label title-3">Bab</label>
                    <select class="form-select form-select form-select-pribadi border-0">
                        <option selected>Pilih bab</option>
                        <option value="1">Bab 1</option>
                        <option value="2">Bab 2</option>
                        <option value="3">Bab 3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label title-3">Nama Materi</label>
                    <input type="text" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Masukkan kata sandi">
                </div>

                <div class="mb-5">
                    <label class="form-label title-3">Keterangan Materi</label>
                    <input type="text" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Masukkan keterangan materi">
                </div>
            </div>
            <div class="col-12">
                <div class="list-group-item rounded-15 mb-3 shadow-sm position-relative overflow-hidden p-3">
                    <div class="row mb-3">
                        <div class="col">
                            <p class="fw-bolder size-15">Video</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <a href="#modalTambahVideo" data-bs-toggle="modal" role="button" class="label-biru fw-bold size-13"><i class="fa-regular fa-plus"></i> Tambah Video</a>
                        </div>
                    </div>
    
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                            <i class="fa-solid fa-circle-play size-22 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-14 fw-normal">video_pembel_.mp4</p>
                                </div>
                                <div class="col-auto align-self-center text-end ms-3">
                                    <div class="dropdown btn-group dropstart">
                                        <button class="btn btn-secondary bg-dropdown bg-button rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-sliders-simple" style="font-size: 14px; color: #EC3528;"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item my-2 size-15" href="#modalEditVideo" data-bs-toggle="modal" role="button"><i class="fa-solid fa-pen-to-square pe-2"></i>Edit Video</a></li>
                                            <li><a class="dropdown-item my-2 size-15" href="#"><i class="fa-solid fa-trash pe-2"></i>Hapus Video</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item rounded-15 mb-3 shadow-sm position-relative overflow-hidden p-3">
                    <div class="row mb-3">
                        <div class="col">
                            <p class="fw-bolder size-15">Dokumen</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <a href="#modalTambahDokumen" data-bs-toggle="modal" role="button" class="label-biru fw-bold size-13"><i class="fa-regular fa-plus"></i> Tambah File</a>
                        </div>
                    </div>
    
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-50 shadow-sm rounded-15 avatar-presensi-outline">
                                        <div class="avatar avatar-40 rounded-15 avatar-presensi-inline">
                                            <i class="fa-solid fa-circle-play size-22 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-14 fw-normal">document_pelajar..</p>
                                </div>
                                <div class="col-auto align-self-center text-end ms-3">
                                    <div class="dropdown btn-group dropstart">
                                        <button class="btn btn-secondary bg-dropdown bg-button rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-sliders-simple" style="font-size: 14px; color: #EC3528;"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item my-2 size-15" href="#modalEditDokumen" data-bs-toggle="modal" role="button"><i class="fa-solid fa-pen-to-square pe-2"></i>Edit Dokumen</a></li>
                                            <li><a class="dropdown-item my-2 size-15" href="#"><i class="fa-solid fa-trash pe-2"></i>Hapus Dokumen</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-11 col-sm-11 mt-auto mx-auto pt-4 pb-5">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center d-grid">
                        <a href="index-SD.html" class="btn btn-lg shadow-sm btn-pribadi">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main page content ends -->
</main>

<!-- Modal Tambah Dokumen -->
<div class="modal fade" id="modalTambahDokumen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
            <h5 class="modal-title">Tambah Dokumen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label title-3">Judul File</label>
                    <input type="text" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Isikan judul file">
                </div>

                <div class="mb-3">
                    <label class="form-label title-3">File Upload</label>
                    <input class="form-control form-control-solidborder-0" type="file" name="file" style="border-radius: 10px;">
                </div>
            </div>
            <div class="modal-footer border-0">
                <a href="#" class="btn btn-block btn-md btn-danger btn-filter">Simpan</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Dokumen -->
<div class="modal fade" id="modalEditDokumen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
            <h5 class="modal-title">Edit Dokumen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label title-3">Judul File</label>
                    <input type="text" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Isikan judul file" value="Dokumen 1">
                </div>

                <div class="mb-3">
                    <label class="form-label title-3">File Upload</label>
                    <input class="form-control form-control-solidborder-0" type="file" name="file" style="border-radius: 10px;">
                </div>
            </div>
            <div class="modal-footer border-0">
                <a href="#" class="btn btn-block btn-md btn-danger btn-filter">Simpan</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Video -->
<div class="modal fade" id="modalTambahVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
            <h5 class="modal-title">Tambah Video</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label title-3">Judul Video</label>
                    <input type="text" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Isikan judul video">
                </div>

                <div class="mb-3">
                    <label class="form-label title-3">URL Video</label>
                    <input type="text" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Isikan URL video">
                </div>
            </div>
            <div class="modal-footer border-0">
                <a href="#" class="btn btn-block btn-md btn-danger btn-filter">Simpan</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Video -->
<div class="modal fade" id="modalEditVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="box-shadow: 100px 0px 100px 100px rgb(0 0 0 / 10%)">
            <div class="modal-header border-0">
            <h5 class="modal-title">Tambah Video</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label title-3">Judul Video</label>
                    <input type="text" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Isikan judul video" value="video1.mp4">
                </div>

                <div class="mb-3">
                    <label class="form-label title-3">URL Video</label>
                    <input type="text" class="form-control form-control-solid form-control-pribadi border-0" placeholder="Isikan URL video" value="https://www.youtube.com/">
                </div>
            </div>
            <div class="modal-footer border-0">
                <a href="#" class="btn btn-block btn-md btn-danger btn-filter">Simpan</a>
            </div>
        </div>
    </div>
</div>