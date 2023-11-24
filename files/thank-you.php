<div class="mx-wd auto">
  <div>
    <?php
    // include "./includes/db.inc.php";
    // var_dump($_SESSION['auth_user']);
    if(is_array($_SESSION['auth_user']) && !empty($_SESSION['auth_user'])){
      $fetch = $_SESSION['auth_user'];
      $tracking_no = $fetch['tracking_no'];

      if(isset($_GET['./'])){
        $_SESSION['auth_user'] = [];
        session_destroy();
        exit();
        ?>
        <script>
          window.location.href ="?ref_2=home";
        </script>
        <?php
      }
    ?>
        <div class="mx-wd auto">
          <div style="padding:10px 0;">
            <div class="card">
              <div class="card-header card-header2">
                <span>Order Summarry</span>
                <a href="?./" class="icons-flex" style="align-items:center;">
                  <span style="display: flex; width:20px;height:20px;"><?php include "./svgs/xmark.svg" ?></span>
                </a>
              </div>
              <div class="card-flex">
                <div class="card-body">
                  <h2>Delivery Details</h2>
                  <div class="row">
                    <div class="col-md">
                      <label for="">Name</label>
                      <div class="border"><?=$fetch['fname']." ". $fetch['lname'];?></div>
                    </div>
                    <div class="col-md">
                      <label for="">Email</label>
                      <div class="border"><?=$fetch['email']?></div>
                    </div>
                    <div class="col-md">
                      <label for="">Phone</label>
                      <div class="border"><?=$fetch['phone']?></div>
                    </div>
                    <div class="col-md">
                      <label for="">Tracking No.</label>
                      <div class="border"><?=$fetch['tracking_no']?></div>
                    </div>
                    <div class="col-md">
                      <label for="">Address</label>
                      <div class="border"><?=$fetch['address']?></div>
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
                          echo "<h4>No order found</h4>";
                        }
                        ?>
                      </tbody>
                    </table>
                    <h4>Total price: <span>UGX.<?=number_format($fetch['total_price'])?></span></h4>
                    <hr>
                    <div class="col-md" style="margin-top: 4px;">
                      <label for="">Payment Mode</label>
                      <div class="border">
                        <?=$fetch['payment_mode']?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php
  }else{
    echo "<h4>No order found</h4>";
  }
  ?>
  </div>
</div>