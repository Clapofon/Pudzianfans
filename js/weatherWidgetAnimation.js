                  var widget = document.querySelector(".weather-widget");

var openButton = document.querySelector(".weather-widget-button-open");
var closeButton = document.querySelector(".weather-widget-button-close");

var onOpen = function () {
    openButton.style.display = "none";
    closeButton.style.display = "block";
    widget.style.transform = "translateX(310px)";
};

var onClose = function () {
    closeButton.style.display = "none";
    openButton.style.display = "block";
    widget.style.transform = "translateX(0px)";
};

openButton.addEventListener("click", onOpen);
closeButton.addEventListener("click", onClose);                                                                                          