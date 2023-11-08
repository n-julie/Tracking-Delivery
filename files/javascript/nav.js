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

//dropDown
let profileBtn = document.querySelector('.js-profileBtn');
let dropdown =document.querySelector('.js-dropdown');
profileBtn.addEventListener('click',(e) => {
  e.preventDefault();
  if(dropdown.classList.contains('show')){
    dropdown.classList.remove('show');
  }else {
    dropdown.classList.add('show');
  }
});


// let active = document.querySelector('.nav > a');
// active.addEventListener('click',(e)=>{
// e.preventDefault();
// if(active.classList.contains('active')){
//   active.classList.remove('active');
// }else{
//   active.classList.add('active');
// }
// });