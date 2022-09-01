const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector(".submit-chat"),
    id_diskusi_tanya = form.querySelector("#id_diskusi_tanya").value,
    chatBox = document.querySelector("#reload_chat");
var tanggal_sekarang = $('#now').val();

var pelajaran = document.querySelector('#pelajaran');
var bab_materi = document.querySelector('#bab_materi');
var id_pelajaran = $('#id_pelajaran').val();
scrollToBottom();
function kirim_file(element) {
    // console.log('ok');
    $('#menuModalChatting').modal('hide');
    var id_base = $('#id_diskusi_tanya').val();
    var url = BASE_URL + 'qna/kirim_file';
    var method = 'POST';
    const berkas_file = document.querySelector('#upload-file');
    let file = berkas_file.files[0];

    const oFReader = new FileReader();
    oFReader.readAsDataURL(file);

    var form_data = new FormData();
    form_data.append("file", file);
    form_data.append("id_diskusi_tanya", id_base);
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
            $('#refresh_loading').load(BASE_URL + 'qna/chatting/' + id_base + '?tanggal=' + tanggal_sekarang + ' #loading_scene');
            $('.modal-backdrop').remove();
            if (data.status == true) {
                var icon = 'success';
                $('#display_chat').load(BASE_URL + 'qna/chatting/' + id_base + '?tanggal=' + tanggal_sekarang + ' #reload_chat');
                scrollToBottom();
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

        }, error: function () {
            // $('#loading_scene').modal('hide');
        }
    });
}

function kirim_gambar(element) {
    $('#base_pesan_dua').val('');
    const div_gambar = document.querySelector('#div_gambar');
    $('#menuModalChatting').modal('hide');
    $('#imageModal').modal('show');
    const images = document.querySelector('#upload-file2');

    let gambar = images.files[0];
    const oFReader = new FileReader();
    oFReader.readAsDataURL(gambar);
    oFReader.onload = function (oFREvent) {
        div_gambar.style.backgroundImage = 'url(' + oFREvent.target.result + ')';
    }

}

function kirim_pesan_gambar(params) {
    $('#imageModal').modal('hide');
    var id_base = $('#id_diskusi_tanya').val();
    var pesan = $('#base_pesan_dua').val();
    console.log(pesan);
    const images = document.querySelector('#upload-file2');
    let gambar = images.files[0];

    var form_data = new FormData();
    form_data.append("gambar", gambar);
    form_data.append("id_diskusi_tanya", id_base);
    form_data.append("pesan", pesan);
    $.ajax({
        url: BASE_URL + 'qna/kirim_gambar',
        method: 'POST',
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
            $('#refresh_loading').load(BASE_URL + 'qna/chatting/' + id_base + '?tanggal=' + tanggal_sekarang + ' #loading_scene');
            $('.modal-backdrop').remove();
            if (data.status == true) {
                var icon = 'success';
                $('#display_chat').load(BASE_URL + 'qna/chatting/' + id_base + '?tanggal=' + tanggal_sekarang + ' #reload_chat');
                scrollToBottom();
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

        }, error: function () {
            // $('#loading_scene').modal('hide');
        }
    });
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#imagePreview").hide();
            $("#imagePreview").fadeIn(650);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function () {
    readURL(this);
});

$("#upload").click(function () {
    $("#upload-file").trigger('click');
});

$("#upload2").click(function () {
    $("#upload-file2").trigger('click');
});

function toPelajaran() {
    $('.header-materi').html(`<h5 class="modal-title" id="pelajaranModalLabel">Materi Pelajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`);
    $('#id_pelajaran').val(0);
    pelajaran.classList.remove('hiding');
    pelajaran.classList.add('showing');
    bab_materi.classList.remove('showing');
    bab_materi.classList.add('hiding');
}

function toBab(id_pelajaran) {

    $('#id_pelajaran').val(id_pelajaran);
    $.ajax({
        url: BASE_URL + 'qna/get_bab',
        data: { id_pelajaran: id_pelajaran },
        method: 'POST',
        cache: false,
        //         beforeSend: function () {
        //             $('#display_bab_materi').html('<div class="spinner-border text-danger" role="status">\
        //                 <span class= "visually-hidden"></span>\
        // </div>');
        //         },
        beforeSend() {
            $('#display_bab_materi').html(html_loader);
        },
        success: function (msg) {
            $('.header-materi').html(`<h5 class="modal-title" id="pelajaranModalLabel"><span class="pe-3" onclick="toPelajaran()"><i class="fa-regular fa-chevron-left"></i></span>Bab Pelajaran</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`);
            // console.log(data);
            $('#display_bab_materi').html(msg);
            pelajaran.classList.add('hiding');
            pelajaran.classList.remove('showing');
            bab_materi.classList.add('showing');
            bab_materi.classList.remove('hiding');
        }
    })
}

function toMateri(id_bab) {
    var id = $('#id_pelajaran').val();

    $.ajax({
        url: BASE_URL + 'qna/get_materi',
        data: { id_bab: id_bab },
        method: 'POST',
        cache: false,
        //         beforeSend: function () {
        //             $('#display_bab_materi').html('<div class="spinner-border text-danger" role="status">\
        //                 <span class= "visually-hidden"></span>\
        // </div>');
        //         },
        beforeSend() {
            $('#display_bab_materi').html(html_loader);
        },
        success: function (msg) {
            $('.header-materi').html(`<h5 class="modal-title" id="pelajaranModalLabel"><span class="pe-3" onclick="toBab(` + id + `)"><i class="fa-regular fa-chevron-left"></i></span>Materi Pelajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`);
            // console.log(data);
            $('#display_bab_materi').html(msg);
            pelajaran.classList.add('hiding');
            pelajaran.classList.remove('showing');
            bab_materi.classList.add('showing');
            bab_materi.classList.remove('hiding');

        }
    })
}

function choose_materi(element, id_materi) {
    var judul = $(element).data('title');
    var message = $(element).data('text');
    $('#id_materi').val(id_materi);
    $('#pelajaranModal').modal('hide');
    $('#menuModalChatting').modal('hide');
    $('#materi').text(judul);
    $('#text_materi').text(message);
    $('#display_reply').show();
    pelajaran.classList.remove('hiding');
    pelajaran.classList.add('showing');
    bab_materi.classList.remove('showing');
    bab_materi.classList.add('hiding');

}

function batal_materi() {
    $('#id_materi').val('');
    $('#display_reply').hide();
}




form.onsubmit = (e) => {
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = () => {
    if (inputField.value != "") {
        // sendBtn.classList.add("active");
        $('.submit-chat').prop("disabled", false);
    } else {
        // $('.submit-chat').classList.remove("active");
        $('.submit-chat').prop("disabled", true);
    }
}

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", BASE_URL + "qna/kirim_pesan", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
                $('#id_materi').val(null);
                $('.submit-chat').prop("disabled", true);
                $('#display_chat').load(BASE_URL + 'qna/chatting/' + id_diskusi_tanya + '?tanggal=' + tanggal_sekarang + ' #reload_chat');
                batal_materi()
                scrollToBottom();
            } else {
                Swal.fire({
                    title: 'PERINGATAN',
                    html: 'Pesan gagal di kirim, silahkan coba lagi beberapa saat atau laporkan',
                    icon: 'warning',
                    buttonsStyling: !1,
                    confirmButtonText: 'Ok',
                    customClass: { confirmButton: css_button }
                });
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

function scrollToBottom() {
    // chatBox.scrollTop = chatBox.scrollHeight;
    window.scrollTo(-5, document.body.scrollHeight);
}

// function scrollToBottom() {
//     chatBox.scrollTop = chatBox.scrollHeight;
// }


var div = document.querySelector('#ta-frame');
var ta = document.querySelector('textarea');

ta.addEventListener('keydown', autosize);

function autosize() {
    setTimeout(function () {
        ta.style.cssText = 'height:0px';
        var height = Math.min(20 * 5, ta.scrollHeight);
        div.style.cssText = 'height:' + height + 'px';
        ta.style.cssText = 'height:' + height + 'px';
    }, 0);
}
