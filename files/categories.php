<?php 
include "./includes/db.inc.php";
require_once "components.php"; 
?>

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
        while($row = $productSql->fetch_assoc()){
          categories($row['productImage'],$row['productName'],$row['productPrice'],$row['id']);
          ?>
        <?php }
        ?>
      </div>
    </div>
  </div>
</div>