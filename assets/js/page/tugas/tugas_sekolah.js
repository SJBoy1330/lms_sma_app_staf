function hapus_tugas(id_tugas) {
    var id_pelajaran = $('#id_pelajaran').val();
    var id_kelas = $('#id_kelas').val();
    Swal.fire({
        title: 'KONFIRMASI',
        html: 'Apakah anda yakin akan menghapus tugas ini ?',
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
                url: BASE_URL + "tugas/hapus_tugas/",
                data: { id_tugas: id_tugas },
                method: 'POST',
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data.status == true) {
                        $('#tugas-' + id_tugas).fadeOut();
                        $('#parent_tugas').load(BASE_URL + 'tugas/tugas_sekolah/' + id_kelas + '/' + id_pelajaran + ' #reload_tugas');
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

const dt = new DataTransfer();

$("#attachment").on('change', function (e) {
	for (var i = 0; i < this.files.length; i++) {
		let fileBloc = $('<span/>', { class: 'file-block' }),
			fileName = $('<span/>', { class: 'name', text: this.files.item(i).name });
		fileBloc.append('<span class="file-delete"><span>+</span></span>')
			.append(fileName);
		$("#filesList > #files-names").append(fileBloc);
	};

	for (let file of this.files) {
		dt.items.add(file);
	}

	this.files = dt.files;

	$('span.file-delete').click(function () {
		let name = $(this).next('span.name').text();

		$(this).parent().remove();
		for (let i = 0; i < dt.items.length; i++) {

			if (name === dt.items[i].getAsFile().name) {

				dt.items.remove(i);
				continue;
			}
		}

		document.getElementById('attachment').files = dt.files;
	});
});



function pilih(element, id) {
	// console.log(id);
	if (element.checked == true) {
		let text = document.getElementById('label-' + id).innerHTML;
		$('#display_tag').append('<div class="tagar" id="tagging-' + id + '" onclick="delete_kelas(' + id + ')">\
			<span>'+ text + '</span>\
                            </div>');
	} else {
		$('#tagging-' + id).remove();
	}

}


function delete_kelas(id) {
	// console.log(id);
	$('#tagging-' + id).remove();
	$('#check-' + id).prop('checked', false);

}