<?php include "./includes/db.inc.php"; ?>
<div class="h-100vh">
  <div class="allcategories-container scroll-y">
    <div class="mx-wd auto">
      <div class="find">
        <div class="wdfull">
          <h2>Find products:</h2>
          <form action="" method="post">
            <div class="search-box">
              <input type="text" class="js-search-btn" placeholder="search products....">
            </div>
            <div class="search-box">
              <div class="btn">
                <span class="icon"><?php include "./svgs/arrow-right.svg" ?></span>
                <input type="submit">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="all-flex">
        <div>
          <table>
            <p>All categories</p>
            <thead>
              <tr>
                <th>ID</th>
                <th>CATEGORY</th>
                <th>STOCK</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stmt = $conn->query("SELECT id, productName, sum(qty) as stock FROM products") or die($conn->error);
              while($row=$stmt->fetch_assoc()){
              ?>
              <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['productName']?></td>
                <td><?=$row['stock'] == '' ? 0 : $row['stock']?></td>
              </tr>
              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer">
  <div class="mx-wd auto">
    <div style="padding: 10px 0;">
      <?php
      $count=$conn->query("SELECT count(*) as total FROM products");
      $finalData =$count->fetch_assoc();
      ?>
      <div class="countProducts">
        <span>All products:</span>
        <span><?=intval($finalData['total'])?></span>
      </div>
    </div>
  </div>
</div>