const togglePasswordNew = document.querySelector("#togglePasswordNew");
const passwordNew = document.querySelector("#newpassword");

const togglePasswordNow = document.querySelector("#togglePasswordNow");
const passwordNow = document.querySelector("#nowpassword");

const togglePasswordRe = document.querySelector("#togglePasswordRe");
const passwordRe = document.querySelector("#repeat-newpassword");

togglePasswordNow.addEventListener("click", function () {

    // toggle the type attribute
    const type = passwordNow.getAttribute("type") === "password" ? "text" : "password";
    passwordNow.setAttribute("type", type);
    // toggle the eye icon
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});

togglePasswordNew.addEventListener("click", function () {

    // toggle the type attribute
    const type = passwordNew.getAttribute("type") === "password" ? "text" : "password";
    passwordNew.setAttribute("type", type);
    // toggle the eye icon
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});

togglePasswordRe.addEventListener("click", function () {

    // toggle the type attribute
    const type = passwordRe.getAttribute("type") === "password" ? "text" : "password";
    passwordRe.setAttribute("type", type);
    // toggle the eye icon
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});