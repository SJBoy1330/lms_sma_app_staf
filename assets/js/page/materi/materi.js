function filter() {
    var vector_tugas = document.querySelector('#vector_pelajaran');
    var id_tingkat = $('#select_tingkat').val();
    const prop_display = document.querySelectorAll("#display_pelajaran .zoom-filter");

    $('#filterTingkat').modal('hide');
    prop_display.forEach((div) => {
        let val_tingkat = div.getAttribute("data-tingkat");
        if ((val_tingkat == id_tingkat) || (id_tingkat == "all")) {
            div.classList.remove("hiding"); //first remove the hide class from the image
            div.classList.add("showing"); //add show class in image
        } else {
            div.classList.add("hiding"); //add hide class in image
            div.classList.remove("showing"); //remove show class from the image
        }
    });

    var count = $('.target_search.showing').length;
    if (count <= 0) {
        vector_tugas.classList.remove('hiding');
        vector_tugas.classList.add('showing');
    } else {
        vector_tugas.classList.add('hiding');
        vector_tugas.classList.remove('showing');
    }
}