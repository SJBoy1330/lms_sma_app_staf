var swiper2 = new Swiper(".connectionwiper", {
    slidesPerView: "auto",
    spaceBetween: 0,
    pagination: false
});

$(document).ready(function () {

});

function modal_surat(id) {
    $.ajax({
        url: BASE_URL + "suratijin/modal_detail",
        method: "POST",
        data: {
            id_surat_ijin: id
        },
        cache: false,
        beforeSend() {
            $('#display_ijin').html(html_loader);
        },
        success: function (msg) {
            $('#display_ijin').html(msg);
        }
    })
}


function hapus_surat(id) {
    $.ajax({
        url: BASE_URL + "surat/hapus_surat",
        method: "POST",
        data: {
            id_surat_ijin: id
        },
        cache: false,
        dataType: 'json',
        beforeSend() {
            $('#hapus_surat_ijin').html('<div class="spinner-border" style="color : #FFFFFF" role="status">\
                <span class="sr-only"></span>\
</div>');
            $('#edit_surat_ijin').html('<div class="spinner-border" style="color : #FFFFFF" role="status">\
                <span class="sr-only"></span>\
</div>');
            $('#hapus_surat_ijin').prop('disabled', true);
            $('#edit_surat_ijin').prop('disabled', true);
        },
        success: function (data) {
            $('#hapus_surat_ijin').prop('disabled', false);
            $('#edit_surat_ijin').prop('disabled', false);
            $('#hapus_surat_ijin').html('Hapus Surat');
            $('#edit_surat_ijin').html('Edit Surat');
            $('#detailSuratIjin').modal('hide');
            $('#parent_load').load(BASE_URL + 'surat/ #load_surat');
            if (data.status == true) {
                var icon = 'success';
            } else {
                var icon = 'warning';
            }
            Swal.fire({
                title: data.title,
                text: data.message,
                icon: icon,
                buttonsStyling: !1,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: css_button
                }
            })
        }
    })
}