$('#select_pelajaran').on('change', function () {
	var value = $(this).val();
	$('#display_kelas').html('');
	$.ajax({
		url: BASE_URL + "tugas/get_kelas/",
		data: { id_pelajaran: value },
		method: 'POST',
		cache: false,
		success: function (data) {
			if (data != '') {
				$('#cari_kelas').prop('placeholder', 'Cari Kelas').prop('readonly', false);
			} else {
				$('#cari_kelas').prop('placeholder', 'Tidak ada data kelas').prop('readonly', true);
			}
			$('#display_kelas').html(data);
		}
	})
});

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