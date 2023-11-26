<?php include "./includes/db.inc.php" ?>
<div class="p-container">
  <div class="scroll-y">
    <div class="wd100">
      <div>
        <h2 class="t-header">ALL PRODUCTS</h2>
        <div>
          <?php
          $select = $db->query("SELECT * FROM products") or die($db->error);
          
          ?>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Qty</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody style="position: relative;">
              <?php
              if($select->num_rows > 0){
                while($row=$select->fetch_assoc()){?>
                <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['productName']?></td>
                  <td>Sh.<?=$row['sellingPrice']?></td>
                  <td>
                    <img src="./files/uploads/<?=$row['productImage']?>" height="50px" alt="">
                  </td>
                  <td><?=$row['small_desc']?></td>
                  <td><?=$row['qty']?></td>
                  <td>
                    <div class="actions">
                      <a href="?nav_3=addProduct&edit=<?=$row['id']?>" class="icons-flex">
                        <span style="width:10px;display:flex;"><?php include "./svgs/pencil.svg" ?></span>
                      </a>
                      <a href="?nav_3=addProduct&delete=<?=$row['id']?>" class="icons-flex">
                        <span style="width:10px;display:flex;" onclick="deleteAlert();"><?php include "./svgs/trash.svg" ?></span>
                      </a>
                    </div>
                  </td>
                </tr>
                <?php }
              }else {?>
                <td colspan="6" style="color: tomato; font-size:17px;">No product found!</td>
            <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>