function pilih_domain(element) {
    var value = $(element).val();
    if (value == '') {
        $('#url_meet').val('');
        $('#url_meet').prop('readonly', true);
    } else {
        $('#url_meet').prop('readonly', false);
        $('#url_meet').focus();
    }
}


function pilih_bab(element) {
    var value = $(element).val();
    var get_showing = document.querySelectorAll('.bab.showing');
    var get_hiding = document.querySelectorAll('.bab.hiding');
    if (value == 'all') {
        get_hiding.forEach((row) => {
            row.classList.remove("hiding");
            row.classList.add("showing");
            // $('.checkboxes[value=' + value + ']').prop('checked', true);
        });
    } else {
        get_showing.forEach((row) => {
            row.classList.add("hiding");
            row.classList.remove("showing");
            // $('.checkboxes[value=' + value + ']').prop('checked', true);
        });
        $('#bab-' + value).addClass('showing');
        $('#bab-' + value).removeClass('hiding');
    }
}


function key_link(params) {
    var value = $(params).val();
    var chat = document.querySelector('#set_chatting');
    if (value != '' || chat.checked == true) {
        $('#button_setting_kbm').prop('disabled', false);
    } else {
        $('#button_setting_kbm').prop('disabled', true);
    }
}

function set_chat(params) {
    var link = $('#url_meet').val();
    if (params.checked == true || link != '') {
        $('#button_setting_kbm').prop('disabled', false);
    } else {
        $('#button_setting_kbm').prop('disabled', true);
    }
}

function pilih_materi(params) {
    // var checkbox = document.querySelectorAll('.materi_kbm');
    var checkbox = $(".materi_kbm:checked");
    // console.log(checkbox.length)
    if (checkbox.length > 0) {
        $('#button_tambah_materi_kbm').prop('disabled', false);
    } else {
        $('#button_tambah_materi_kbm').prop('disabled', true);
    }
}