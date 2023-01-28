var enableNavBackground = function() {
    var navBar = document.querySelector(".main-nav");
    navBar.style.background = 'rgba(0, 0, 0, 0.6)';
};

var disableNavBackground = function() {
    var navBar = document.querySelector(".main-nav");
    navBar.style.background = 'rgba(0, 0, 0, 0.0)';
};

var onScroll = function() {
    var windowY = window.scrollY;
    if (windowY > 75) {
        enableNavBackground();
    }
    else {
        disableNavBackground();
    }
};

document.addEventListener("scroll", onScroll);
               