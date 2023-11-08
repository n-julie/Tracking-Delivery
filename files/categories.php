<?php include "./includes/db.inc.php"; ?>
<?php 
if(isset($_POST['add'])){
  if(isset($_SESSION['cart'])){

    $item_array_id = array_column($_SESSION['cart'], "productId");
    // print_r($item_array_id);

    $matchData = in_array($_POST['productId'],$item_array_id);
    if($matchData){
      echo "<script>alert('Product is already added in the cart..!')</script>";
      echo "<script>windows.location.href='?refdashbord&nav=categories';</script>";
      
    }else{

      $count=count($_SESSION['cart']);
      $item_array = array(
        'productId' => $_POST['productId']
      );
      $_SESSION['cart'][$count] = $item_array;
      // print_r($_SESSION['cart']);
    }
  }else {
    $item_array = array(
      'productId' => $_POST['productId']
    );

    //create new session variable
    $_SESSION['cart'][0]= $item_array;
    // print_r($_SESSION['cart']);
  }
}
?>
<div class="mx-wd auto">
  <div class="product-container">
    <div class="right">
      <div class="header">
        <h2>Welcome to Express Delivery</h2>
      </div>
      <div class="display-flex js-container">
        <?php
        $productSql = "SELECT * FROM products order by id asc";
        $productSql = mysqli_query($conn,$productSql) or die($conn->error);
        while($row = $productSql->fetch_assoc()){ ?>
          <div class="wd js-product">
            <div class="hgt">
              <form action="" method="post">
                <a href="" style="color:unset; text-decoration:none;" >
                  <div class="profile">
                    <img src="./files/uploads/<?=$row['productImage']?>" alt="">
                  </div>
                </a>
                <div class="p-name js-productName"><?=$row['productName']?></div>
                <div class="price">UGX.<?=$row['productPrice']?></div>
                <div class="product-qty">
                  <select name="" id="">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </div>
                <input type="hidden" name="productId" value="<?=$row['id']?>">
                <button type="submit" name="add" class="add-to-cart button-p">
                  <div class="links">
                    <div class="icons-flex" style="font-size: 15px; display:flex;align-items:center; margin:0 auto;">
                      Add to cart
                      <span class="ics-flex"><?php include "./svgs/cart.svg" ?></span>
                    </div>
                  </div>
                </button>
              </form>
            </div>
          </div>
        <?php }
        ?>
      </div>
    </div>
  </div>
</div>