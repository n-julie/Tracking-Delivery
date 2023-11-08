<?php 
include "./includes/db.inc.php";
// include_once "./components.php";
 ?>
<div class="h-100vh">
  <div class="allcategories-container scroll-y">
    <div class="mx-wd auto">
      <div class="find">
        <div class="wdfull">
          <h2>Find Category:</h2>
          <form action="" method="post">
            <div class="search-box">
              <input type="text" class="js-search-btn" placeholder="search category....">
            </div>
            <div class="search-box">
              <div class="btn">
                <span class="icon"><?php include "./svgs/search.svg" ?></span>
                <input type="submit">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="all-flex">
        <div>
          <table>
            <h4>All categories</h4>
            <thead>
              <tr>
                <th>ID</th>
                <th>CATEGORY</th>
                <th>Image</th>
                <th>STOCK</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stmt = $db->query("SELECT ca.id, ca.name,ca.image,sum(pr.qty) AS stock FROM categories ca LEFT JOIN products AS pr ON pr.categoryId = ca.id GROUP BY ca.id ORDER BY ca.name ASC") or die($db->error);
              if($stmt->num_rows > 0){
                while($row=$stmt->fetch_assoc()){
                ?>
                <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['name']?></td>
                  <td style="display: flex; align-items:center;">
                    <img src="./files/uploads/<?=$row['image']?>" height="50px" alt="">
                    <div class="actions">
                      <a href="?nav_3=addCategories&cedit=<?=$row['id']?>">
                        <span style="width:10px;display:flex;"><?php include "./svgs/pencil.svg"?></span>
                      </a>
                      <a href="?nav_3=addCategories&deleted=<?=$row['id']?>">
                      <span style="width: 10px; display:flex;" onclick="deleteAlert()"><?php include "./svgs/trash.svg" ?></span></a>
                    </div>
                  </td>
                  <td><?=$row['stock'] == '' ? 0 : $row['stock']?></td>
                </tr>
                <?php }
              }else{
                ?>
                <td colspan="4" style="color: tomato; font-size:17px;">No category found</td>
                <?php
              }
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
      $count=$db->query("SELECT count(*) as total FROM categories");
      $finalData =$count->fetch_assoc();
      ?>
      <div class="countProducts">
        <span>All Categories:</span>
        <span><?=intval($finalData['total'])?></span>
      </div>
    </div>
  </div>
</div>