 <div class="row">
     <div class="col">
         <div class="card mb-3">
             <div class="card-body">
                 <div class="row">
                     <div class="col-auto ps-2 pe-1">
                         <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                             <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                 <i class="fa-solid fa-person-circle-check size-18 text-white"></i>
                             </div>
                         </div>
                     </div>
                     <div class="col align-self-center ps-1">
                         <p class="mb-0 size-12 fw-medium">Hadir</p>
                         <p class="fw-normal text-success size-12"><?= $jumlah_masuk; ?> Siswa</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col">
         <div class="card mb-3">
             <div class="card-body">
                 <div class="row">
                     <div class="col-auto ps-2 pe-1">
                         <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                             <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                 <i class="fa-solid fa-person-circle-xmark size-18 text-white"></i>
                             </div>
                         </div>
                     </div>
                     <div class="col align-self-center ps-1">
                         <p class="mb-0 size-12 fw-medium">Sakit</p>
                         <p class="fw-normal text-danger size-12"><?= $jumlah_sakit; ?> Siswa</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="row">
     <div class="col">
         <div class="card mb-3">
             <div class="card-body">
                 <div class="row">
                     <div class="col-auto ps-2 pe-1">
                         <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                             <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                 <i class="fa-solid fa-person-circle-exclamation size-18 text-white"></i>
                             </div>
                         </div>
                     </div>
                     <div class="col align-self-center ps-1">
                         <p class="mb-0 size-12 fw-medium">Ijin</p>
                         <p class="fw-normal text-warning size-12"><?= $jumlah_ijin; ?> Siswa</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col">
         <div class="card mb-3">
             <div class="card-body">
                 <div class="row">
                     <div class="col-auto ps-2 pe-1">
                         <div class="avatar avatar-40 shadow-sm rounded-circle avatar-presensi-outline">
                             <div class="avatar avatar-30 rounded-circle avatar-presensi-inline" style="line-height: 33px;">
                                 <i class="fa-solid fa-person-circle-question size-18 text-white"></i>
                             </div>
                         </div>
                     </div>
                     <div class="col align-self-center ps-1">
                         <p class="mb-0 size-12 fw-medium">Tidak Hadir</p>
                         <p class="fw-normal text-secondary size-12"><?= $jumlah_alpha; ?> Siswa</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>