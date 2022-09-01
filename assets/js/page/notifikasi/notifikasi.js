/* swiper carousel connectionwiper */
var swiper2 = new Swiper(".connectionwiper", {
    slidesPerView: "auto",
    spaceBetween: 0,
    pagination: false
});

const footer_notif = document.querySelector('#action_notifikasi');
const pilih_semua = document.getElementById('pilih_semua');


function get_tipe(property, tipe) {
    const base_tipe = document.querySelector(".base_tipe");
    const dis_notif = document.querySelectorAll("#display_notifikasi .zoom-filter");
    const vector_notifikasi = document.querySelector("#vector_notifikasi");
    base_tipe.querySelector(".active").classList.remove("active");
    property.querySelector(".tipe").classList.add("active");
    dis_notif.forEach((div) => {
        let display_value = div.getAttribute("data-tipe");
        if ((display_value == 'tipe-' + tipe) || (tipe == "all")) {
            div.classList.remove("hiding");
            div.classList.add("showing");
        } else {
            div.classList.add("hiding");
            div.classList.remove("showing");
        }
    });

    const tampil = document.querySelectorAll(".zoom-filter.showing");
    if (tampil.length == 0) {
        vector_notifikasi.classList.remove("hiding");
        vector_notifikasi.classList.add("showing");
    } else {
        vector_notifikasi.classList.add("hiding");
        vector_notifikasi.classList.remove("showing");
    }

}

function pilih_notif(element) {
    var jumlah_total = document.querySelectorAll(".showing").length;
    var jumlah = $(".checkboxes:checked").length;
    var div = document.querySelector('#pro-notif-' + element.value);

    if ($(element).prop('checked') == true) {
        div.classList.add('notif-active');
    } else {
        div.classList.remove('notif-active');
    }
    if (jumlah > 0) {
        footer_notif.classList.remove('d-none');

        pilih_semua.classList.remove('d-none');
    } else {
        footer_notif.classList.add('d-none');

        pilih_semua.classList.add('d-none');
        var checkbox = document.querySelectorAll('.checkboxes');
        checkbox.forEach((cb) => {
            cb.classList.add("d-none");
        });
    }
    if (jumlah == jumlah_total) {
        $('#notif_parent_checkbox').prop('checked', true);
    } else {
        $('#notif_parent_checkbox').prop('checked', false);
    }
}


function read_notif(element, status) {
    if (status != 0) {
        $.ajax({
            url: BASE_URL + "notifikasi/read_notif",
            data: { id_notifikasi_staf: $(element).data('id') },
            method: 'POST',
            dataType: 'json',
            cache: false,
            success: function (data) {
                if ($(element).data('url') == null) {
                    const div = document.querySelector('#pro-notif-' + $(element).data('id'));
                    div.classList.remove('bg-notif-readed');
                } else {
                    location.href = $(element).data('url');
                }

            }
        })
    } else {
        if ($(element).data('url') != null) {
            location.href = $(element).data('url');
        }
    }
}

$(document).ready(function () {

    $('#notif_parent_checkbox').on('change', function () {
        var div_notif = document.querySelectorAll('.div-notif');
        if ($(this).prop('checked') == true) {
            $('.checkboxes').prop('checked', true);
            div_notif.forEach((dn) => {
                dn.classList.add('notif-active');
            });
        } else {
            $('.checkboxes').prop('checked', false);
            footer_notif.classList.add('d-none');

            pilih_semua.classList.add('d-none');

            div_notif.forEach((dn) => {
                dn.classList.remove('notif-active');
            });
        }
        var jumlah = $(".checkboxes:checked").length;
        if (jumlah > 0) {
            footer_notif.classList.remove('d-none');

            pilih_semua.classList.remove('d-none');
        } else {
            footer_notif.classList.add('d-none');

            pilih_semua.classList.add('d-none');
            var checkbox = document.querySelectorAll('.checkboxes');
            checkbox.forEach((cb) => {
                cb.classList.add("d-none");
            });
        }
    });


    let button = document.querySelectorAll('.button_long_press');
    const longPress = (el, callback, duration) => {
        let timeout;
        const start = () => {
            timeout = window.setTimeout(callback, duration);
        }

        const end = () => {
            window.clearTimeout(timeout);
        }

        el.addEventListener('touchstart', start);
        el.addEventListener('touchend', end);
    }

    button.forEach((div) => {
        longPress(div, () => {
            var value = $(div).data('id');
            var checkbox = document.querySelectorAll('.checkboxes');
            checkbox.forEach((cb) => {
                cb.classList.remove("d-none");
                $('.checkboxes[value=' + value + ']').prop('checked', true);
            });
            var flex = document.querySelector('#pro-notif-' + value);
            footer_notif.classList.remove('d-none');

            pilih_semua.classList.remove('d-none');
            flex.classList.add('notif-active');
        }, 600);
    });


    $('.button_notif').on('click', function (event) {
        var id_notifikasi_staf = $(this).data('id');
        $.ajax({
            url: BASE_URL + "notifikasi/detail_notif",
            data: { id_notifikasi_staf: id_notifikasi_staf },
            method: 'POST',
            cache: false,
            success: function (msg) {
                $('#display_notifikasi_dua').html(msg);
            }
        })
    });



    $('#btn_bca_ntf').on('click', function () {
        var url = BASE_URL + 'notifikasi/read_all';
        var method = 'POST';
        var form = $('form')[0];
        var form_data = new FormData(form);

        $.ajax({
            url: url,
            data: form_data,
            method: method,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            beforeSend() {
                $('#loading_scene').modal('show');
            },
            success: function (data) {
                $('#loading_scene').modal('hide');
                $('#refresh_loading').load(BASE_URL + 'notifikasi/ #loading_scene');
                $('.modal-backdrop').remove();
                var jumlah = data.id_notifikasi_staf.length;
                footer_notif.classList.add('d-none');
                pilih_semua.classList.add('d-none');
                for (let i = 0; i < jumlah; i++) {
                    var div = document.getElementById('pro-notif-' + data.id_notifikasi_staf[i]);
                    div.classList.remove('bg-notif-readed');
                    div.classList.remove('notif-active');

                }
                var checkbox = document.querySelectorAll('.checkboxes');
                $('.checkboxes').prop('checked', false);
                checkbox.forEach((cb) => {
                    cb.classList.add("d-none");
                });

            }
        })
    });



    $('#btn_hps_ntf').on('click', function () {
        var url = BASE_URL + 'notifikasi/hapus_all';
        var method = 'POST';
        var form = $('form')[0];
        var form_data = new FormData(form);
        $.ajax({
            url: url,
            data: form_data,
            method: method,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            beforeSend() {
                $('#loading_scene').modal('show');
            },
            success: function (data) {
                var jumlah = data.id_notifikasi_staf.length;
                footer_notif.classList.add('d-none');
                pilih_semua.classList.add('d-none');
                $('#loading_scene').modal('hide');
                $('#refresh_loading').load(BASE_URL + 'notifikasi/ #loading_scene');
                $('.modal-backdrop').remove();
                for (let i = 0; i < jumlah; i++) {
                    var divv = document.getElementById('fadeout-notif-' + data.id_notifikasi_staf[i]);
                    $('#fadeout-notif-' + data.id_notifikasi_staf[i]).fadeOut();
                }

                var checkbox = document.querySelectorAll('.checkboxes');
                $('.checkboxes').prop('checked', false);
                checkbox.forEach((cb) => {
                    cb.classList.add("d-none");
                });




            }, error: function () {
                $('#loading_scene').modal('hide');
                $('#refresh_loading').load(BASE_URL + 'notifikasi/ #loading_scene');
                $('.modal-backdrop').remove();
            }
        })
    });

});