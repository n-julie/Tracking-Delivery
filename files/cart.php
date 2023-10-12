<?php 
require "./includes/db.inc.php";
require_once "components.php";
?>
<div class="cart-container">
  <h2 class="cart-title">Review your order</h2>
  <div>
    <div class="wd70">
      <div class="shopping-cart">
        <?php
        $total = 0;
        if(isset($_SESSION['cart'])){
          $product_id = array_column($_SESSION['cart'], "productId");

          $result = $conn->query("SELECT * FROM products") or die($conn->error);
          while($row = $result->fetch_assoc()){
            foreach($product_id as $id){
              if($row['id'] == $id) {
                cartElement($row['productName'],$row['productPrice'],$row['productDesc'],$row['productImage'],$row['id']);
                $total += intval($row['productPrice']);

                if(isset($_GET['actionId'])){
                  $action= $_GET['actionId'];
                  if($action){
                    unset($_SESSION['cart']);
                  }
                }
              }
            }
          }
        } else {
          echo "<h5 style=\"color:red; font-size: 16px;\">Cart is empty..!!!</h5>";
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
              <?php
              if(isset($_SESSION['cart'])){
              $count = count($_SESSION['cart']);
              ?>
              <div class="details-flex">
                <span>Items(<?=intval($count)?>):</span>
                <span>UGX.<?=intval($total)?></span>

              </div>
              <?php
              } else {
                echo "<h6>Price(0 items)</h6>";
              }
              ?>
              <div>
                  <div class="details-flex bb">
                    <span>Delivery Charges</span>
                    <span style="color: green;">Free</span>
                  </div>
                  <div class="details-flex c-tomato">
                    <span>Order total:</span>
                    <span>UGX.<?=$total?></span>

                  </div>
              </div>
              <div class="place-order">
                <a href="?ref2=checkout">
                  <p>Checkout</p>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>