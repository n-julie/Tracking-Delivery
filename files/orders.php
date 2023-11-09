<?php require "./includes/db.inc.php" ?>
<div class="mx-wd auto">
  <div class="scroll-y">
    <div class="orders">
      <div class="orders-header">
        <span>Orders</span>
        <a href="?nav_3=orders-history">Orders History</a>
      </div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>User</th>
            <th>Tracking No</th>
            <th>Price</th>
            <th>Date</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $orders = $db->query("SELECT * FROM orders WHERE status = 0 order by id DESC") or die($db->error);
            if($orders->num_rows > 0){
              foreach($orders as $item){
                ?>
                <tr>
                  <td><?=$item['id']?></td>
                  <td><?=$item['fname']." ". $item['lname']?></td>
                  <td><?=$item['tracking_no']?></td>
                  <td><?=number_format($item['total_price'])?></td>
                  <td><?=$item['created_at']?></td>
                  <td>
                    <a href="?nav_3=view-order&id=<?=$item['tracking_no']?>">View details</a>
                  </td>
                </tr> 
                <?php
              }
            }else{
              ?>
             <td colspan="6" style="color: tomato; font-size:17px;"> No order found</td>
              <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>