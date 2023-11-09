<?php 
// include "./includes/db.inc.php";
require_once "components.php"; 
?>
<div class="flex-growFooter">
  <div class="mx-wd auto" style="height:fit-content;">
    <div class="product-container">
      <div class="right">
        <div class="header"></div>
        <div class="display-flex js-container">
          <?php
          $productSql = getAll('products');
          foreach($productSql as $row){
            products($row['productImage'],$row['productName'],$row['productPrice'],$row['id']);
            ?>
          <?php }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="grow-1">
    <div class="footer1">
      <?php include_once "./footer.php" ?>
    </div>
  </div>
</div>