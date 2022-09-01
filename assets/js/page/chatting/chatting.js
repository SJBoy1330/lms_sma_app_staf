function openCity(evt, cityName) {
    var search_personal = document.getElementById('search_personal');
    var search_grup = document.getElementById('search_grup');
    if (cityName == 'Grup') {
        search_personal.classList.add('d-none');
        search_grup.classList.remove('d-none');
    }
    if (cityName == 'Personal') {
        search_personal.classList.remove('d-none');
        search_grup.classList.add('d-none');
    }
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
