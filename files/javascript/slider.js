const slider = document.querySelectorAll('.slider');
let currentSlide = 0;

//show the first slide
slider[currentSlide].classList.add("actives");

//start the slideshow

setInterval(() => {
  //Remove the active class from the current  slide
  slider[currentSlide].classList.remove("actives");

  //move to the next slide
  currentSlide = (currentSlide + 1) % slider.length;

  //Add the active class to the nex slide
  slider[currentSlide].classList.add("actives");
}, 5000);