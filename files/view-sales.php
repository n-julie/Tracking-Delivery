
<?php
include "./includes/db.inc.php";
if(isset($_GET['id'])){
  $tracking_no = $_GET['id'];
  $uid=$db->query('SELECT user_id FROM orders') or die($db->error);
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
        <span>View Sales</span>
        <a href="?nav_3=sales" class="icons-flex" style="align-items:center;">
          <span style="display: flex; width:20px;height:20px;fill:#000;"><?php include "./svgs/reply.svg" ?></span>
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
            <h2>Sales Details</h2>
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
                      <td><?=number_format($item['productPrice'])?></td>
                      <td><?=intval($item['orderqty'])?></td>
                    </tr>
                    <?php
                  }
                }else{
                  ?>
                  <td colspan="3" style="color: tomato; font-size:17px;">No order found</td>
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
                <?php
                if($data['status'] == 0){
                  echo "Under Process";
                }else if($data['status'] == 1){
                  echo "Completed";
                }else if($data['status'] == 2){
                  echo "Cancelled";
                }
                ?>
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