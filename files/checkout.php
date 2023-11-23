<?php 
include_once "./includes/checkout.inc.php";
$total = 0;
$total = number_format($_SESSION['total']);

?>
<div class="scroll-y">
  <div class="check-container">
    <div>
        <?php
        if(isset($_SESSION['auth'])){
        ?>
      <form action="" method="post">
        <h2 style="text-align: center; padding:8px 0; color:green;">Complete your order!</h2>
        <div>
          <?php
            if(!empty($error)){
              foreach($error as $errors){
                ?>
                <p class="alert"><?php echo $errors?></p>
                <?php
                
              }
            }
          ?>
        </div>
        <div class="payable-header">
          <div style="font-size:17px;">Delivery Charge: <span style="color:green;">Free</span></div>
          <div class="payable">
            <span style="font-weight:bolder;">Total Amount Payable:</span>
            <span style="color:red; font-weight:bolder;">UGX.<?=($total)?></span>
          </div>
        </div>
        <div class="ctrl-f">
          <div class="ctrl">
            <label for="">First Name:</label>
            <input type="text" name="fname" placeholder="Name">
          </div>
          <div class="ctrl">
            <div class="input-p">
              <label for="">Last Name:</label>
              <input type="text" name="lname" placeholder="Last Name">
            </div>
          </div>
        </div>
        <div class="ctrl-f">
          <div class="ctrl">
            <label for="">Email:</label>
            <input type="email" name="email" value="<?=$_SESSION['auth']['email']?>" readonly placeholder="Email">
          </div>
          <div class="ctrl">
            <div class="input-p">
              <label for="">phone:</label>
              <input type="tel" name="num">
            </div>
          </div>
        </div>
        <div class="ctrl-f">
        <div class="ctrl text-area">
          <label for="">Address:</label>
          <textarea name="address"  rows="3" placeholder="Enter your address"></textarea>
        </div>
        <div class="ctrl">
          <div class="input-p">
            <label for="">Pin code:</label>
            <input type="text" name="pin" value="1234" disabled>
            <input type="hidden" name="payment_mode" value="CASH ON DELIVERY">
          </div>
        </div>
        <div class="place">
          <input type="submit" name="checkout" value="Place Order">
        </div>

      </form>
      <?php
        }
        else {
          ?>
          <script>
            window.location.href="?ref2=userLogin";
          </script>
          <?php
        }
      ?>
    </div>
  </div>
</div>