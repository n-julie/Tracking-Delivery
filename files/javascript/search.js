let searchBtn = document.querySelector('.js-search-btn');
searchBtn.addEventListener('input', () =>{
  let searchValue = searchBtn.value;

  console.log(searchValue);
  const storeItems = document.querySelector('.js-container');
  const products = storeItems.querySelector('.js-product');

  for(let i = 0; i < products.length; i++) {
    const productName = products[i].querySelector('.js-productName');
    let nameValue = productName.textContent || productName.innerHTML;

    if(nameValue.toLowerCase().indexOf(searchValue.toLowerCase()) > -1){
      products[i].style.display = "block";
    } else {
      products[i].style.display = "none";
    }
  }
});