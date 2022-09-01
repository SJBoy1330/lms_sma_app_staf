function password_show_hide_new() {

    var x = document.getElementById("passwordNew");

    var show_eye = document.getElementById("show_eye_new");

    var hide_eye = document.getElementById("hide_eye_new");

    hide_eye.classList.remove("d-none");

    if (x.type === "password") {

      x.type = "text";

      show_eye.style.display = "none";

      hide_eye.style.display = "block";

    } else {

      x.type = "password";

      show_eye.style.display = "block";

      hide_eye.style.display = "none";

    }

  }

  function password_show_hide_confirm() {

    var x = document.getElementById("passwordConfirm");

    var show_eye = document.getElementById("show_eye_confirm");

    var hide_eye = document.getElementById("hide_eye_confirm");

    hide_eye.classList.remove("d-none");

    if (x.type === "password") {

      x.type = "text";

      show_eye.style.display = "none";

      hide_eye.style.display = "block";

    } else {

      x.type = "password";

      show_eye.style.display = "block";

      hide_eye.style.display = "none";

    }

  }