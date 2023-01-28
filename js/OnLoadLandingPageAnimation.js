var animate = function() {
    var lpSection = document.querySelector(".lpSection");
    lpSection.style.transform = "translateY(150px)";
    lpSection.style.opacity = "1";
};

window.addEventListener("load", animate);
