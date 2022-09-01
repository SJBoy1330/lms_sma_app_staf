// Tab Tugas & Ujian staf
function openCity(evt, cityName) {
    var i, tabcontent_staf, tablinks_staf;
    tabcontent_staf = document.getElementsByClassName("tabcontent-staf");
    for (i = 0; i < tabcontent_staf.length; i++) {
        tabcontent_staf[i].style.display = "none";
    }
    tablinks_staf = document.getElementsByClassName("tablinks-staf");
    for (i = 0; i < tablinks_staf.length; i++) {
        tablinks_staf[i].className = tablinks_staf[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();



function upload_tugas(element) {
    // console.log('ok');
    var id = $('#id_tugas').val();
    var id_pelajaran = $('#id_pelajaran').val();
    var id_kelas = $('#id_kelas').val();
    var url = BASE_URL + 'tugas/upload';
    var method = 'POST';
    // console.log(url);

    var form = $('form')[0];
    var form_data = new FormData(form);

    $.ajax({
        url: url,
        method: method,
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        beforeSend: function () {
            $('#loading_scene').modal('show');
        },
        success: function (data) {
            $('#loading_scene').modal('hide');
            $('#refresh_loading').load(BASE_URL + 'tugas/detail_tugas/ #loading_scene');
            $('.modal-backdrop').remove();
            if (data.status == true) {
                var icon = 'success';
                $('#display_dokumen').load(BASE_URL + 'tugas/jawaban_siswa/' + id_kelas + '/' + id_pelajaran + '/' + id + ' #reload_dokumen');
            } else {
                var icon = 'warning';
            }
            Swal.fire({
                title: data.titile,
                text: data.message,
                icon: icon,
                buttonsStyling: !1,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: css_button
                }
            })

        }, error: function () {
            // $('#loading_scene').modal('hide');
        }
    });
}


function hapus_file(id_file) {
    var id_tugas = $('#id_tugas').val();
    var id_pelajaran = $('#id_pelajaran').val();
    var id_kelas = $('#id_kelas').val();
    $.ajax({
        url: BASE_URL + "tugas/hapus_file/",
        data: { id_file: id_file },
        method: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend: function () {
            $('#button_submited_tugas').prop('disabled', true);
            $('#hapus_file_loading_' + id_file).html('<div class="spinner-border text-danger" role="status">\
                     <span class="sr-only"></span>\
</div>');
            $('#lapirkan_jawaban').prop('readonly', true);
        },
        success: function (data) {
            // console.log(data);
            $('#button_submited_tugas').prop('disabled', false);
            $('#lapirkan_jawaban').prop('readonly', false);
            if (data.status == true) {
                $('#jawaban-' + id_file).fadeOut(function () {
                    $('#display_dokumen').load(BASE_URL + 'tugas/jawaban_siswa/' + id_kelas + '/' + id_pelajaran + '/' + id_tugas + ' #reload_dokumen');
                });
            } else {
                Swal.fire({
                    title: 'PERINGATAN',
                    text: data.message,
                    icon: 'warning',
                    buttonsStyling: !1,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: css_button
                    }
                })
            }
        }
    })
}


function get_nilai(id_tugas_siswa = 0, nilai = 0, id_siswa) {
    if (id_tugas_siswa != 0) {
        $('#id_tugas_siswa').val(id_tugas_siswa);
        $('#nilai_siswa').val(nilai);
        $('#id_siswa').val(id_siswa);
    } else {
        $('#id_tugas_siswa').val('');
        $('#nilai_siswa').val('');
        $('#id_siswa').val(id_siswa);
    }
}