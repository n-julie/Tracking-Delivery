<div class="nav-bg">
  <div class="mx-wd auto">
    <div>
      <div class="d-flex">
        <div class="logo">
          <img src="./files/img/log.jpg" alt="Express Delivery Tracking"/>
        </div>
        <div class="nav">
          <a href="?nav=home" class="<?php if($nav == "home") echo 'active' ?>">Home</a>
          <a href="?nav=categories" class="<?php if($nav == "categories") echo 'active' ?>" >Categories</a>
          <a href="?nav=account" class="<?php if($nav == "account") echo 'active' ?>">Account</a>
          <a href="?nav=profile" class="<?php if($nav == "profile") echo 'active' ?>">Profile</a>
        </div>
      </div>
    </div>
  </div>
  <div class="border-b"></div>
</div>
<div class="scroll-y">
  <div class="mx-wd auto">
    <div class="m-b">
      <?php
      $nav="";
      if(isset($_GET['nav'])) $nav = $_GET['nav'] . ".php";

      if(file_exists($nav)) require $nav;
      
        ?>
    </div>
  </div>
</div>