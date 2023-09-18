<?php include "./includes/db.inc.php"; ?>
<div class="mx-wd auto">
  <div class="product-container">
    <div class="right">
      <div class="header">
        <h2>Header!!!!!</h2>
      </div>
      <div class="display-flex">
        <?php
        $productSql = "SELECT * FROM products order by id asc";
        $productSql = mysqli_query($conn,$productSql) or die($conn->error);
        while($row = $productSql->fetch_assoc()){ ?>
          <div class="wd">
            <div class="hgt">
              <div class="profile">
                <img src="./files/uploads/<?=$row['productImage']?>" alt="">
              </div>
              <div class="p-name"><?=$row['productName']?></div>
              <div class="price">Sh.<?=$row['productPrice']?></div>
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
              <div class="add-to-cart button-p">Add to cart</div>
            </div>
          </div>
        <?php }
        ?>
      </div>
    </div>
  </div>
</div>