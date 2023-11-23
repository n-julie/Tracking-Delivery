<div class="mx-wd auto">
  <div class="scroll-y">
    <div class="orders">
      <div class="card-header">
        <span>Orders History</span>
        <a href="?ref2=home" class="icons-flex" style="align-items:center;">
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
            <th>Status</th>
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
                    <?php
                    if($item['status'] == 1){
                      ?>
                      <span style="color: green; font-weight:bold;">Delivered</span>
                      <?php
                    }else if($item['status'] == 2){
                      ?>
                      <span style="color: red; font-weight:bold;">Cancelled..</span>
                      <?php
                    }
                    ?>
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