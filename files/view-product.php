<?php 
// include "./includes/db.inc.php";
include_once "./class.cart.php";
?>
<?php
  if(isset($_GET['addToCart'])){
    $productId = $_GET['productId'];
    $stmt = getActive("products",$productId);
    $row=$stmt->fetch_assoc();
    $product = array(
      "productId" => $row['id'],
      "productName" => $row['productName'],
      "image" => $row['productImage'],
      "qty" => 1,
      "productDesc" => $row['productDesc'],
      "productImage" => $row['productImage'],
      "productPrice" => $row['productPrice']
    );
    $cart->addProduct($product);
    ?>
    <script>
      window.location.href = "?ref2=products";
    </script>
    <?php
  }
?>
<div class="details-container prodcut-data">
  <div class="details-p-flex">
    <?php
    if(isset($_GET['on_id'])){
      $proId =$_GET['on_id'];
      $details = $db->query("SELECT * FROM products where id = '$proId'") or die($db->error);
      while($row = $details->fetch_assoc()){?>
      <div class="wd1">
        <div class="hgt1 mg ">
          <div class="profile1">
            <img src="./files/uploads/<?=$row['productImage']?>" alt="">
          </div>
        </div>
      </div>
      <div class="wd2">
        <div class="mg">
          <div class="p-name js-productName"><?=$row['productName']?></div>
          <div class="price">UGX.<?=number_format($row['productPrice'])?></div>
          <div><?=$row['small_desc']?></div>
        </div>
        <div class="mg">
          <!-- <div class="styles">
            <div>
              <span>Style: </span>
              <span>Dark gray</span>
            </div>
            <div class="colors">
              <a  href="">Gray</a>
              <a href="">Dark gray</a>
              <a href="">Black</a>
              <a href="">White</a>
            </div>
          </div> -->
          <div>
            <!-- <div class="about-p">
              <div class="dblock">
                <span>Brand</span>
                <span>Model name</span>
                <span>Cellular</span>
              </div>
              <div class="dblock mleft">
                <span>Oppo</span>
                <span></span>
                <span>5G</span>
              </div>
            </div> -->
            <p class="borderbtm"></p>
            <div>
              <h2>About this item</h2>
              <div><?=$row['productDesc']?></div>
            </div>
          </div>
        </div>
      </div>
      <div class="wd3">
        <div class="mg cart-border">
          <form action="" method="post">
            <div class="price-cart">
              <span>UGX.<?=number_format($row['productPrice'])?></span>
              <div class="product-qty">
                <button class="decrement-btn">-</button>
                <input type="text" value="1" class="input-qty" disabled>
                <button class="increment-btn">+</button>
              </div>
            </div>
            <input type="hidden" name="productId" value="<?=$row['id']?>">
            <a href="?ref2=view-product&addToCart&productId=<?=$row['id']?>" data-id="<?=$row['id']?>" style="text-decoration:none;color:unset;" class="cart-btn">
              <div class="links">
                <div class="icons-flex" style="font-size: 15px; display:flex;align-items:center; margin:0 auto;">
                  Add to cart
                  <span class="ics-flex"><?php include "./svgs/cart.svg" ?></span>
                </div>
              </div>
            </a>
          </form>
        </div>
      </div>
      <?php }
    }
    ?>
  </div>
</div>
