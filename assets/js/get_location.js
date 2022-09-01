$(document).ready(function () {
    x = navigator.geolocation;

    x.getCurrentPosition(success, failure);

    function success(position) {
        var myLat = position.coords.latitude;
        var myLong = position.coords.longitude;
        $('#map_iframe').attr("src", "https://maps.google.com/maps?q=" + myLat + "," + myLong + "&hl=en;z=14&output=embed");
        $("#lat").val(myLat);
        $("#long").val(myLong);
    }
    function failure(position) {
        alert('error : ' + position.message);
    }


    $('.button_get_lokasi').on('click', function () {
        x = navigator.geolocation;

        x.getCurrentPosition(success, failure);

    });

    function success(position) {
        var myLat = position.coords.latitude;
        var myLong = position.coords.longitude;
        $('#map_iframe').attr("src", "https://maps.google.com/maps?q=" + myLat + "," + myLong + "&hl=en;z=14&output=embed");
        $('#map_mapel').attr("src", "https://maps.google.com/maps?q=" + myLat + "," + myLong + "&hl=en;z=14&output=embed")
        $(".lat").val(myLat);
        $(".long").val(myLong);
        var jarak = get_jarak(myLat, myLong, lat_sekul, long_sekul);
        $('#jarak').val(jarak.toFixed(2));
        $('.jarak').text(jarak.toFixed(2) + 'Km');
        $('#jarak_mapel').val(jarak.toFixed(2));
        $('.jarak_mapel').text(jarak.toFixed(2) + 'Km');
    }
    function failure(position) {
        alert('error : ' + position.message);
    }

    function get_jarak(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2 - lat1);  // deg2rad below
        var dLon = deg2rad(lon2 - lon1);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2)
            ;
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km
        return d;
    }

    function deg2rad(deg) {
        return deg * (Math.PI / 180)
    }
})