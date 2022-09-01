function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

function show_video(id_materi_video, url) {
    var display = document.getElementById('display-video');
    display.classList.add("hiding");
    display.classList.remove("hiding");
    display.classList.add("showing");
    $('#iframe-video').prop('src', url);

}
function materi(evt, materi) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        tablinks[i].className = tablinks[i].className.replace(" border-danger", " ");
        tablinks[i].className = tablinks[i].className.replace(" text-danger", "");

    }
    document.getElementById(materi).style.display = "block";
    evt.currentTarget.className += " border-danger text-danger";

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
}

function hapus_video(id_materi, id_materi_video) {
    Swal.fire({
        title: 'KONFIRMASI',
        html: 'Apakah anda yakin akan menghapus materi ini ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#969696',
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "func_materi/hapus_video_materi/",
                data: { id_materi_video: id_materi_video },
                method: 'POST',
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data.status == true) {
                        $('#video-' + id_materi_video).remove();
                        $('#parent_video').load(BASE_URL + 'materi/detail_materi/' + id_materi + ' #reload_video');
                    } else {
                        Swal.fire({
                            title: data.title,
                            html: data.message,
                            icon: 'warning',
                            buttonsStyling: !1,
                            confirmButtonText: 'Ok',
                            customClass: { confirmButton: css_button }
                        });
                    }
                }
            })
        }
    })

}

function hapus_dokumen(id_materi, id_materi_dokumen) {
    Swal.fire({
        title: 'KONFIRMASI',
        html: 'Apakah anda yakin akan menghapus dokumen materi ini ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#969696',
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "func_materi/hapus_dokumen_materi/",
                data: { id_materi_dokumen: id_materi_dokumen },
                method: 'POST',
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data.status == true) {
                        $('#dokumen-' + id_materi_dokumen).remove();
                        $('#parent_dokumen').load(BASE_URL + 'materi/detail_materi/' + id_materi + ' #reload_dokumen');
                    } else {
                        Swal.fire({
                            title: data.title,
                            html: data.message,
                            icon: 'warning',
                            buttonsStyling: !1,
                            confirmButtonText: 'Ok',
                            customClass: { confirmButton: css_button }
                        });
                    }
                }
            })
        }
    })

}
function edit() {
    $('#btnedit').addClass('d-none');
    $('#btnsave').removeClass('d-none');

    $('#isimapel').addClass('d-none');
    $('#inputmapel').removeClass('d-none');

    $('#isimateri').addClass('d-none');
    $('#inputmateri').removeClass('d-none');

    $('#isiketerangan').addClass('d-none');
    $('#inputketerangan').removeClass('d-none');

    $('#isibab').addClass('d-none');
    $('#inputbab').removeClass('d-none');

    $('#isipembuat').addClass('d-none');
    $('#inputpembuat').removeClass('d-none');

    $('.awalbtn').addClass('d-none');
    $('.xbtn').removeClass('d-none');

}

function save() {
    $('#btnsave').addClass('d-none');
    $('#btnedit').removeClass('d-none');

    $('#inputmapel').addClass('d-none');
    $('#isimapel').removeClass('d-none');

    $('#inputmateri').addClass('d-none');
    $('#isimateri').removeClass('d-none');

    $('#inputketerangan').addClass('d-none');
    $('#isiketerangan').removeClass('d-none');

    $('#inputbab').addClass('d-none');
    $('#isibab').removeClass('d-none');

    $('#inputpembuat').addClass('d-none');
    $('#isipembuat').removeClass('d-none');

    $('.xbtn').addClass('d-none');
    $('.awalbtn').removeClass('d-none');
}

function tambahdownloadvideo() {
    $('#download_materi').addClass('d-none');
    $('#formdowmloadvideo').removeClass('d-none');
    $('#btntambahdownloadvideo').addClass('d-none');
    $('#btnsavedownloadvideo').removeClass('d-none');
}

function savedownloadvideo() {
    $('#download_materi').removeClass('d-none');
    $('#formdowmloadvideo').addClass('d-none');
    $('#btntambahdownloadvideo').removeClass('d-none');
    $('#btnsavedownloadvideo').addClass('d-none');
}

function tambahvideo() {
    $('#video_materi').addClass('d-none');
    $('#formvideo').removeClass('d-none');
    $('#btntambahvideo').addClass('d-none');
    $('#btnsavevideo').removeClass('d-none');
    $('#btnbatalvideo').removeClass('d-none');
}

function savevideo() {
    $('#video_materi').removeClass('d-none');
    $('#formvideo').addClass('d-none');
    $('#btntambahvideo').removeClass('d-none');
    $('#btnsavevideo').addClass('d-none');
}

function video() {
    $('#video_materi').removeClass('d-none');
    $('#formvideo').addClass('d-none');
    $('#btntambahvideo').removeClass('d-none');
    $('#btnsavevideo').addClass('d-none');
}

function bataltambahvideo() {
    $('#video_materi').removeClass('d-none');
    $('#formvideo').addClass('d-none');
    $('#btntambahvideo').removeClass('d-none');
    $('#btnsavevideo').addClass('d-none');
    $('#btnbatalvideo').addClass('d-none');
}