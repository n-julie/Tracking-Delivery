<?php require "./includes/db.inc.php" ?>
<?php
if(isset($_GET['clearAll'])){
  $clear = $_GET['clearAll'];
  $sql =$db->query("DELETE FROM orders where status !=0") or die($db->error);
}
?>
<div class="mx-wd auto">
  <div class="scroll-y">
    <div class="orders">
      <div class="card-header">
        <span>Orders History</span>
        <a href="?nav_3=orders" class="icons-flex" style="align-items:center;">
          <span style="display: flex; width:20px;height:20px;fill:#000;"><?php include "./svgs/reply.svg" ?></span>
        </a>
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
            $orders = $db->query("SELECT * FROM orders WHERE status != 0") or die($db->error);
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
                <td colspan="6" style="color: tomato; font-size:17px;">No order found</td>
              <?php
            }
            ?>
        </tbody>
      </table>
      <div class="clear-history">
        <a href="?nav_3=orders-history&clearAll" onclick="clearAll()">Clear All</a>
      </div>
          <script>
            ///clear all orders
            function clearAll(e){
              const clearAll = confirm("Are you sure?\nYou want to clear all orders history!");
              if(clearAll === false){
                e.preventDefault();
              }
            }
          </script>
    </div>
  </div>
</div>