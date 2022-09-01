 <!-- Begin page content -->
 <main class="container-fluid h-100 ">
     <div class="row h-100">
         <div class="col-11 col-sm-11 mx-auto">
             <!-- header -->
             <div class="row">
                 <header class="header">
                     <div class="row">
                     </div>
                 </header>
             </div>
             <!-- header ends -->
         </div>
         <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
             <div class="text-center">
                 <img src="<?= base_url() ?>assets/images/verifikasi-otp.png" width="225" class="img-fluid">
             </div>

             <div class="text-start my-5">
                 <p class="mb-1 title-1">Verifikasi OTP</p>
                 <p class="mb-0 fw-600 size-18 title-4">Kode OTP dikirimkan ke email anda</p>
             </div>

             <form action="">
                 <div class="mt-5" style="display:flex; justify-content:space-around; align-items:center;">
                     <input class="otp" name="otp1" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 autocomplete="off">
                     <input class="otp" name="otp2" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 autocomplete="off">
                     <input class="otp" name="otp3" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 autocomplete="off">
                     <input class="otp" name="otp4" type="text" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1 autocomplete="off">
                 </div>
             </form>
         </div>
         <div class="col-11 col-sm-11 mt-auto mx-auto pt-4 pb-5">
             <div class="row">
                 <div class="col-auto text-center mx-auto">
                     <p class="mb-3"><span class="text-muted">Belum terima?</span>
                         <a href="" class="label-merah"> Kirim ulang OTP</a>
                     </p>
                 </div>
                 <div class="col-12 d-flex justify-content-center d-grid">
                     <a href="<?= base_url('auth/reset_sandi'); ?>" onclick="unreload(this)" class="btn btn-lg shadow-sm btn-pribadi">Kirim</a>
                 </div>
             </div>
         </div>
     </div>
 </main>