function get_jadwal(element) {
    const dis_notif = document.querySelectorAll("#display_jadwal .zoom-filter");
    dis_notif.forEach((div) => {
        let display_value = div.getAttribute("data-page");
        if ((display_value == 'jadwal-' + element.value)) {
            div.classList.remove("hiding");
            div.classList.add("showing");
        } else {
            div.classList.add("hiding");
            div.classList.remove("showing");
        }
    });
}

function get_modal_mapel(id_jadwal) {
    $.ajax({
        url: BASE_URL + 'presensi/get_modal',
        data: { id_jadwal: id_jadwal },
        method: 'POST',
        cache: false,
        dataType: 'json',
        beforeSend() {
            $('#button_presensi_mapel').prop('disabled', true);
        },
        success: function (data) {
            $('#button_presensi_mapel').prop('disabled', false);
            $('#pelajaran').text(data.pelajaran);
            $('#kelas').text(data.kelas);
            $('#waktu').text(data.waktu);
            $('#id_pelajaran_mapel').val(data.id_pelajaran);
            $('#id_kelas_mapel').val(data.id_kelas);
            if (data.jadwal != null) {
                $('.jadwal_mapel').text(data.jarak + ' M');
                $('#jadwal_mapel').text(data.jarak);
            }
        }
    })
}
