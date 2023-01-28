var showLoginForm = function () {
    var loginForm = document.querySelector(".nav-form-container");
    loginForm.style.display = "flex";
};

var showLoginFormModal = function () {
    var loginForm = document.querySelector(".login-form-modal");
    loginForm.style.display = "flex";

    var offset = window.scrollY;
    loginForm.style.transform = "translateY(" + offset + "px)"

    var body = document.querySelector("body");
    body.style.overflowY = "hidden";
};

var hideLoginFormModal = function () {
    var loginForm = document.querySelector(".login-form-modal");
    loginForm.style.display = "none";

    var body = document.querySelector("body");
    body.style.overflowY = "visible";
};

var hideLoginForm = function () {
    var loginForm = document.querySelector(".nav-form-container");
    loginForm.style.display = "none";
};

var showHamburgerMenu = function () {
    var hamburgerMenu = document.querySelector(".login-hamburger-button");
    hamburgerMenu.style.display = "flex";
};

var hideHamburgerMenu = function () {
    var hamburgerMenu = document.querySelector(".login-hamburger-button");
    hamburgerMenu.style.display = "none";
};

var loggedIn = document.querySelector(".logged-in").innerHTML;

var onResize = function () {
    var vieportWidth = window.innerWidth;
    if (loggedIn == "false")
    {
        if (vieportWidth < 1300) {
            hideLoginForm();
            showHamburgerMenu();
        }
        else {
            showLoginForm();
            hideHamburgerMenu();
        }
    }
};

var hamburger = document.querySelector(".login-hamburger-button");
var closeLoginModalButton = document.querySelector(".login-close-button");

window.addEventListener("resize", onResize);
document.addEventListener("DOMContentLoaded", onResize);

if (loggedIn == "false")
{
    hamburger.addEventListener("click", showLoginFormModal);
    closeLoginModalButton.addEventListener("click", hideLoginFormModal);
}
               