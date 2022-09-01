$(document).ready(function () {
  $('#calendar').evoCalendar({
    'language': 'ina'
  });
})

function detail_presensi(id_kelas, id_pelajaran, tanggal) {
  $.ajax({
    url: BASE_URL + "profil/get_modal_presensi_kelas/",
    data: { id_kelas: id_kelas, tanggal: tanggal, id_pelajaran: id_pelajaran },
    method: 'POST',
    cache: false,
    success: function (msg) {
      $('#display_detail_presensi').html(msg);
    }
  })
}