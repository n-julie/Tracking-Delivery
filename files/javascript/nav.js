// function openNav(){
//   nav = document.querySelector('.navToggle');
//   if(nav.style.display === "flex") nav.style.display = "none";
//   else nav.style.display = "flex";
// }
const openNav = document.querySelector('.js-nav-btn');
// First nav
openNav.addEventListener('click', () => {
  let nav2 = document.querySelector('.d-nav');
 if(nav2.style.display === "flex") nav2.style.display = "none";
  else nav2.style.display = "flex";
});

// Second nav
openNav.addEventListener('click', () => {
 let nav = document.querySelector('.navToggle');
 if(nav.style.display === "flex") nav.style.display = "none";
  else nav.style.display = "flex";
});