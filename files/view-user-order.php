<?php
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
        <span>Your Order</span>
        <a href="?ref2=user-orders" class="icons-flex" style="align-items:center;">
          <span style="display: flex; width:20px;height:20px;fill:#000;"><?php include "./svgs/reply.svg" ?></span>
        </a>
      </div>
      <div class="card-flex items-center">
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
          </div>
        </div>
        <div class="track">
          <div>
            <div style="display: flex; width:100%; justify-content:space-between">
              <div style="margin-right: auto;">
                <h3>Order Placed:</h3>
                <span><?=$data['created_at']?></span>
              </div>
              <div style="margin-left: 20px">
                <h3>Order ID:</h3>
                <span><?=$data['tracking_no']?></span>
              </div>
            </div>
          </div>
          <input type="hidden" name="tracking_no" value="<?=$data['tracking_no']?>">
          <!-- <option value="0"<?//=$data['status'] == 0 ? "selected" : ""?>>Under Process</option> -->
          <hr>
          <div style="margin-top: 3%;">
            <a href="?ref2=trackOrder&orderId&id_number=<?=$data['tracking_no']?>" class="trackBtn">Track Order</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    }
  }
}?>