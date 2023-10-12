const openNav = document.querySelector('.js-nav-btn');
// First nav
openNav.addEventListener('click', () => {
  let nav2 = document.querySelector('.d-nav');
  let closeBtn = document.querySelector('.js-close');
  if(nav2.style.display === "flex") {
    nav2.style.display = "none";
  }
  else { 
    nav2.style.display = "flex";
    openNav.style.display = "none";
    closeBtn.style.display = 'flex';
  }
  closeBtn.addEventListener('click', () => {
    nav2.style.display = "none";
    closeBtn.style.display = "none";
    openNav.style.display = "flex";
    
  });
  // openNav.classList.toggle('fa-times');

});

// Second nav
openNav.addEventListener('click', () => {
  openNav.classList.toggle('fa-times');
 let nav = document.querySelector('.navToggle');
 let closeBtn = document.querySelector('.js-close');
 if(nav.style.display === "flex"){
   nav.style.display = "none";
 }
  else { 
    nav.style.display = "flex";
    openNav.style.display = "none"
    closeBtn.style.display="flex";
}

  closeBtn.addEventListener('click', () => {
    nav.style.display = "none";
    closeBtn.style.display = "none";
    openNav.style.display = "flex";
    
  });
  // openNav.classList.toggle('fa-times');
});