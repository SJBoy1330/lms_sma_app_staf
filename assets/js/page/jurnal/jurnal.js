$('#lain').click(function () {
    $("#showhideText").toggle(this.checked);
});



function hapus_jurnal_staf(id_jurnal) {
    $.ajax({
        url: BASE_URL + 'func_jurnal/hapus_jurnal_staf',
        data: { id_jurnal: id_jurnal },
        method: 'POST',
        cache: false,
        dataType: 'json',
        beforeSend() {
            $('.button_hapus').prop('disabled', true);
            $('#loading_scene').modal('show');
        },
        success: function (data) {
            $('#loading_scene').modal('hide');
            $('#refresh_loading').load(BASE_URL + 'notifikasi/ #loading_scene');
            $('.modal-backdrop').remove();
            if (data.status == 200 || data.status == true) {
                var icon = 'success';
            } else {
                var icon = 'warning';
            }

            Swal.fire({
                title: data.alert.title,
                text: data.alert.message,
                icon: icon,
                buttonsStyling: !1,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: css_button
                }
            }).then(function () {
                $('#card-jurnal-' + id_jurnal).remove();
            });
        }
    })
}