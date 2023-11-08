<?php require "./includes/db.inc.php" ?>
<div class="mx-wd auto">
  <div class="scroll-y">
    <div class="orders">
      <div class="card-header">
        <span>Sales History</span>
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
            $orders = $db->query("SELECT * FROM orders WHERE status = 1") or die($db->error);
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
                    <a href="?nav_3=view-sales&id=<?=$item['tracking_no']?>">View details</a>
                  </td>
                </tr>
                <?php
              }
            }else{
              ?>
                <td colspan="6" style="color: tomato; font-size:17px;">No order found</td>
              <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>