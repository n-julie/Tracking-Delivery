
<?php
include "./includes/db.inc.php";
if(isset($_POST['update_order_btn'])){
  $track_no = $_POST['tracking_no'];
  $order_status = $_POST['order_status'];
  $updateOrder_query = $db->query("UPDATE orders SET status='$order_status' WHERE tracking_no ='$track_no'") or die($db->error);
  if($updateOrder_query){
  ?>
  <script>
    window.location.href = "?nav_3=orders";
  </script>
  <?php
  }
  
}
if(isset($_GET['id'])){
  $tracking_no = $_GET['id'];
  $uid=$db->query("SELECT user_id FROM orders WHERE tracking_no = '$tracking_no'") or die($db->error);
  $getid =mysqli_fetch_array($uid);
  $_SESSION['user_id']=$getid;
  $userId = $_SESSION['user_id']['user_id'];
  $q=$db->query("SELECT * FROM orders WHERE tracking_no ='$tracking_no' AND user_id='$userId'") or die($db->error);
  if($q->num_rows < 0){
    ?>
    <h4>Something went wrong</h4>
    <?php
    die();
  }else{
    while($data = mysqli_fetch_array($q)){
?>
<div class="mx-wd auto">
  <div>
    <div class="card">
      <div class="card-header">
        <span>View Order</span>
        <a href="?nav_3=orders-history" class="icons-flex" style="align-items:center;">
          <span style="display:flex; width:20px;height:20px;fill:#000;"><?php include "./svgs/reply.svg" ?></span>
        </a>
      </div>
      <div class="card-flex">
        <div class="card-body">
          <h2>Delivery Details</h2>
          <div class="row">
            <div class="col-md">
              <label for="">Name</label>
              <div class="border"><?=$data['fname']." ".$data['lname']?></div>
            </div>
            <div class="col-md">
              <label for="">Email</label>
              <div class="border"><?=$data['email']?></div>
            </div>
            <div class="col-md">
              <label for="">Phone</label>
              <div class="border"><?=$data['phone']?></div>
            </div>
            <div class="col-md">
              <label for="">Tracking No.</label>
              <div class="border"><?=$data['tracking_no']?></div>
            </div>
            <div class="col-md">
              <label for="">Address</label>
              <div class="border"><?=$data['address']?></div>
            </div>
          </div>
        </div>
        <div class="col">
          <div>
            <h2>Order Details</h2>
            <table class="order-table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $order_query = $db->query("SELECT o.id as oid, o.tracking_no, o.user_id,oi.*,oi.qty as orderqty,p.* FROM orders o, orders_items oi,products p WHERE oi.order_id=o.id AND p.id =oi.product_id AND o.tracking_no='$tracking_no'")or die($db->error);
                if($order_query->num_rows > 0){
                  foreach($order_query as $item){
                    ?>
                    <tr>
                      <td class="data-center">
                        <img src="./files/uploads/<?=$item['productImage']?>" height="50px" alt="<?=$item['productName']?>">
                        <?=$item['productName']?>
                      </td>
                      <td><?=number_format($item['sellingPrice'])?></td>
                      <td><?=intval($item['orderqty'])?></td>
                    </tr>
                    <?php
                  }
                }else{
                  ?>
                  <td colspan="3" style="color: tomato; font-size:17px;">No order details found</td>
                  <?php
                }
                ?>
              </tbody>
            </table>
            <h4>Total price: <span>UGX.<?=number_format($data['total_price'])?></span></h4>
            <hr>
            <div class="col-md" style="margin-top: 4px;">
              <label for="">Payment Mode</label>
              <div class="border">
                <?=$data['payment_mode']?>
              </div>
            </div>
            <div class="col-md">
              <label for="">Status</label>
              <div style="margin-bottom: 4px;">
                <form action="" method="post">
                  <input type="hidden" name="tracking_no" value="<?=$data['tracking_no']?>">
                  <select name="order_status" id="" class="form-select">
                    <option value="0"<?=$data['status'] == 0 ? "selected" : ""?>>Under Process</option>
                    <option value="1"<?=$data['status'] == 1 ? "selected" : ""?>>Completed</option>
                    <option value="2"<?=$data['status'] == 2 ? "selected" : ""?>>Cancelled</option>
                  </select>
                  <button type="submit" name="update_order_btn" class="orderbtn">Update Status</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    }
  }
}
// else{
  ?>
  <!-- <h4>Something went wrong</h4> -->
  <?php
  // die();
// }