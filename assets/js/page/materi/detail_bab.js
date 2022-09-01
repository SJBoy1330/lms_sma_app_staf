function toggle_menu() {
    let menuToggle = document.querySelector('.toggle');
    let menu = document.querySelector('.menu');
    let indicator = document.querySelector('.indicator');
    menu.classList.toggle('active')
    menuToggle.classList.toggle('active')
    const list = document.querySelectorAll('li');
    function activeLink() {
        list.forEach((item) => item.classList.remove('active'));
        this.classList.add('active');
        indicator.classList.remove('d-none');
    }

    list.forEach((item) => item.addEventListener('click', activeLink))
}



function edit_bab() {
    var trio_menu = document.querySelector('#trio_menu');
    var action_menu = document.querySelector('#action_menu');
    var inputan = document.querySelectorAll('.input_judul_bab');
    var text = document.querySelectorAll('.text_judul_bab');
    inputan.forEach((input) => {
        input.classList.remove("d-none");
    });

    text.forEach((msg) => {
        msg.classList.add("d-none");
    });

    trio_menu.classList.add('d-none');
    action_menu.classList.remove('d-none');
}


function batal_edit_bab() {
    var trio_menu = document.querySelector('#trio_menu');
    var action_menu = document.querySelector('#action_menu');
    var inputan = document.querySelectorAll('.input_judul_bab');
    var text = document.querySelectorAll('.text_judul_bab');
    inputan.forEach((input) => {
        input.classList.add("d-none");
    });

    text.forEach((msg) => {
        msg.classList.remove("d-none");
    });

    trio_menu.classList.remove('d-none');
    action_menu.classList.add('d-none');
}


function hapus_materi(id_bab, id_materi) {
    var id_pelajaran = $('#id_pelajaran').val();
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
                url: BASE_URL + "func_materi/hapus_materi/",
                data: { id_materi: id_materi },
                method: 'POST',
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data.status == true) {
                        $('#materi-' + id_materi).remove();
                        $('#display_detail').load(BASE_URL + 'materi/detail_bab/' + id_pelajaran + ' #reload_detail');
                        $('#collapse-' + id_bab).load(BASE_URL + 'materi/detail_bab/' + id_pelajaran + ' #reload-materi-' + id_bab);
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


function hapus_bab(id_bab) {
    var id_pelajaran = $('#id_pelajaran').val();
    Swal.fire({
        title: 'KONFIRMASI',
        html: 'Apakah anda yakin akan menghapus bab ini ?',
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
                url: BASE_URL + "func_materi/hapus_bab/",
                data: { id_bab: id_bab },
                method: 'POST',
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data.status == true) {
                        $('#dis-bab-' + id_bab).fadeOut();
                        $('#display_jumlah').load(BASE_URL + 'materi/detail_bab/' + id_pelajaran + ' #reload_jumlah');
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