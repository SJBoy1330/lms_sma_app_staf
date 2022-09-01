$(document).ready(function () {
  $('#calendar').evoCalendar({
    'language': 'ina'
  });
})


function detail_presensi(status, id_presensi_mapel, id_kelas) {
  $.ajax({
    url: BASE_URL + "profil/get_modal_presensi/",
    data: { status: status, id_presensi_mapel: id_presensi_mapel, id_kelas: id_kelas },
    method: 'POST',
    cache: false,
    success: function (msg) {
      $('#display_detail_presensi').html(msg);
    }
  })
}