var slideIndex = 1;
showSlides(slideIndex);

var next = function () {
    showSlides(++slideIndex);
};

var previous = function () {
    showSlides(--slideIndex);
};

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slide");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}                             

var prevButton = document.querySelector(".prev");
var nextButton = document.querySelector(".next");

prevButton.addEventListener("click", previous);
nextButton.addEventListener("click", next);                                                                                                                        