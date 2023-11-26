let incrementBtn= document.querySelector('.increment-btn');
incrementBtn.addEventListener('click', (e) => {
  e.preventDefault();
  let inputQty = document.querySelector('.input-qty').value;
  let value = parseInt(inputQty, 10);
  value =isNaN(value) ? 0 : value;

  if(value < 10){
    value++;
    document.querySelector('.input-qty').value = value;
  }
});

let decrementBtn= document.querySelector('.decrement-btn');
decrementBtn.addEventListener('click', (e) => {
  e.preventDefault();
  let inputQty = document.querySelector('.input-qty').value;
  let value = parseInt(inputQty, 10);
  value =isNaN(value) ? 0 : value;

  if(value > 1){
    value--;
    document.querySelector('.input-qty').value = value;
  }
});

//delete function
function deleteAlert(event){
  const  alert = confirm("Are you sure?\nYou want to delete this product!");
  if(alert === false){
    event.preventDefault();
  }
}
$(document).ready(function(){
  $('.addToCartBtn').click(function(e){
    e.preventDefault();
    let inputQty = $(this).closest('.product-data').find('.input-qty').val();
    let product_id = $(this).val();
    
    $.ajax({
      type: "POST",
      url: "../includes/handlerCart.php",
      data: {
        "product_id": product_id,
        "prod_qty": inputQty,
        "scope": "add"
      },
      dataType: "dataType",
      success: function(response){
        if(response == 201){
          alert("product added to cart");
        }else if(response == 500){
          alert ("something went wrong");
        }
      }

    });
  });

});
