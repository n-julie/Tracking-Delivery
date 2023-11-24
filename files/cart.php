<?php 
// include "./includes/db.inc.php";
require_once "components.php";
// include "./class.cart.php";
?>
<div class="cart-container">
  <h2 class="cart-title">Review your order</h2>
  <div>
    <div class="wd70">
      <div class="shopping-cart">
        <?php
        // echo '<pre>';
        // print_r($_SESSION['cart']);
        // echo '</pre>';
        $total = 0;
        $count = $cart->cartItems();
        if(!empty($_SESSION['cart'])){
          // $product_id = array_column($_SESSION['cart'], "productId");
          
          // foreach ($cart->cartArray as $item);//get the quantity for each product

          // $result = $db->query("SELECT * FROM products") or die($db->error);
          foreach($_SESSION['cart'] as $item){
            cartElement($item['productName'],$item['sellingPrice'],$item['productDesc'],$item['productImage'],$item['productId'],$item['qty']);
            $total += intval($item['sellingPrice'] * $item['qty']);
            $_SESSION['total']=$total;
            $_SESSION['price']=$item['sellingPrice'];
          }
          // while($row = $result->fetch_assoc()){
          // }
        } else {
          echo "<h5 style=\"color:red; font-size: 16px; margin-left:10px;\">Cart is empty..!!!</h5>";
        }

        if(isset($_GET['removedProductFromCart'])){
          $product_id = $_GET["productId"];
          $cart->removeProduct($product_id);
        }
        ?>
      </div>
    </div>
    <div class="wd30">
      <div class="price-details">
        <h2>Order summary</h2>
        <div style="padding: 5px 0;">
          <form action="">
            <div>
              <div class="details-flex">
                <span>Items(<?=number_format($count)?>):</span>
                <span>UGX.<?=number_format($total)?></span>

              </div>
              <div>
                  <div class="details-flex bb">
                    <span>Delivery Charges</span>
                    <span style="color: green;">Free</span>
                  </div>
                  <div class="details-flex c-tomato">
                    <span>Order total:</span>
                    <span>UGX.<?=number_format($total)?></span>

                  </div>
              </div>
              <?php
              if(!empty($_SESSION['cart'])){
                ?>
                <div class="place-order">
                  <a href="?ref2=checkout" name="checkout">
                    <p>Checkout</p>
                  </a>
                </div>
                <?php

              }else{
                ?>
                <div class="place-order disabled">
                  <a href="#" name="checkout" onclick="alert('You can\'t checkout when the cart is empty!!!\n Please try to add atleast 1 item.\nThank you!.');">
                    <p>Checkout</p>
                  </a>
                </div>
                <?php
              }
              ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>