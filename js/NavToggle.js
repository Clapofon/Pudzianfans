var hamburgerNav = document.querySelector(".nav-hamburger-button");
var closeNavButton = document.querySelector(".nav-close-button");

var showNav = function () {
    var nav = document.querySelector(".nav");
    nav.style.display = "flex";
    nav.style.textAlign = "left";
};

var showNavBlock = function () {
    var nav = document.querySelector(".nav");
    var mainNav = document.querySelector(".main-nav");
    mainNav.style.alignIrems = "flex-start";
    nav.style.display = "block";
    nav.style.textAlign = "center";
    nav.style.padding = "0px";
    nav.style.background = "rgba(0, 0, 0, 0.6)";
    nav.style.fontSize = "2em";
    nav.style.margin = "0";
    nav.style.padding = "80px 0 80px 0";
    closeNavButton.style.display = "block";
    hamburgerNav.style.display = "none";
};

var hideNav = function () {
    var nav = document.querySelector(".nav");
    nav.style.display = "none";
    nav.style.fontSize = "inherit"
    nav.style.background = "transparent";
    nav.style.padding = "0 0 0 40px";
    closeNavButton.style.display = "none";
};

var showHamburgerMenuNav = function () {
    var hamburgerMenu = document.querySelector(".nav-hamburger-button");
    hamburgerMenu.style.display = "flex";
};

var hideHamburgerMenuNav = function () {
    var hamburgerMenu = document.querySelector(".nav-hamburger-button");
    hamburgerMenu.style.display = "none";
};

var onResize = function () {
    var vieportWidth = window.innerWidth;
    if (vieportWidth < 900) {
        hideNav();
        showHamburgerMenuNav();
    }
    else {
        showNav();
        hideHamburgerMenuNav();
    }
};

window.addEventListener("resize", onResize);
document.addEventListener("DOMContentLoaded", onResize);
hamburgerNav.addEventListener("click", showNavBlock);
closeNavButton.addEventListener("click", hideNav);
