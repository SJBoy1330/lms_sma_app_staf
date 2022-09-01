/* swiper carousel connectionwiper */
var swiper2 = new Swiper(".connectionwiper", {
    slidesPerView: "auto",
    spaceBetween: 0,
    pagination: false
});


function get_kategori(property, kategori) {
    const base_kat = document.querySelector(".base_kategori");
    const target_div = document.querySelectorAll("#display_bantuan .zoom-filter");
    base_kat.querySelector(".active").classList.remove("active");
    property.querySelector(".kategori").classList.add("active");

    target_div.forEach((div) => {
        let display_value = div.getAttribute("data-kategori");
        if ((display_value == 'bantuan_' + kategori) || (kategori == "all")) {
            div.classList.remove("hiding");
            div.classList.add("showing");
        } else {
            div.classList.add("hiding");
            div.classList.remove("showing");
        }
    });

    const vector_bantuan = document.querySelector("#vector_bantuan");
    const tampil = document.querySelectorAll(".target_search.showing");
    if (tampil.length == 0) {
        vector_bantuan.classList.remove("hiding");
        vector_bantuan.classList.add("showing");
    } else {
        vector_bantuan.classList.add("hiding");
        vector_bantuan.classList.remove("showing");
    }
}


$(document).ready(function () {
    $('.detail_bantuan').on('click', function () {
        var id = $(this).data('id');
        $.ajax({
            url: BASE_URL + "profil/get_detail_bantuan",
            data: { id_bantuan: id },
            method: 'POST',
            cache: false,
            success: function (msg) {
                $('#display_detail_bantuan').html(msg);
            }
        })
    });
})