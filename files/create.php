<?php
include_once "./includes/create.inc.php";
?>
<div class="mx-wd auto">
  <div class="login-container">
    <div class="login-logo">
      <img src="./files/img/log.jpg" alt="">
    </div>
    <div class="form-container">
      <h2>Express Delivery Create account</h2>
      <form action="" method="post">
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
        <div class="display-flex">
          <div class="inputctrl">
            <label for="">First name:</label>
            <input type="text" placeholder="First name" name="fname">
          </div>
          <div class="inputctrl p-l">
            <label for="">Last name:</label>
            <input type="text" placeholder="Last name" name="lname">
          </div>
        </div>
        <div class="display-flex">
          <div class="inputctrl">
            <label for="">Email:</label>
            <input type="email" placeholder="Enter your email" name="email">
          </div>
          <div class="inputctrl p-l">
            <label for="">Password:</label>
            <input type="password" name="password" placeholder="Enter your password">
          </div>
        </div>
        <div class="btn">
          <span class="icon"><?php require "svgs/arrow-right.svg"?></span>
          <input type="submit" name="create">
        </div>
        <div class="forgot-p">
          <a href="?ref2=userLogin">Already have account? Login</a>
        </div>
      </form>
    </div>
  </div>
</div>