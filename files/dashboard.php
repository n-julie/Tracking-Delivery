<div class="nav-bg">
  <div class="mx-wd auto">
    <div>
      <div class="d-flex">
        <div class="logo">
          <img src="./files/img/log.jpg" alt="Express Delivery Tracking"/>
        </div>
        <div class="nav">
          <a href="?ref=dashboard&nav=home" class="<?php if($nav == "home") echo 'active' ?>">Home</a>
          <a href="?ref=categories&nav=categories" class="<?php if($nav == "categories") echo 'active' ?>" >Categories</a>
          <a href="?ref=account&nav=account" class="<?php if($nav == "account") echo 'active' ?>">Account</a>
          <a href="?ref=profile&nav=profile" class="<?php if($nav == "profile") echo 'active' ?>">Profile</a>
          <div>
            <a href="?logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="border-b"></div>
</div>
<div>
  <div class="mx-wd auto">
    <?php
  // $nav="home";
  // if(isset($_GET['nav'])) $nav=$_GET['nav'].".php";
  //  if(file_exists($nav)) require $nav;
  if(isset($_GET['nav'])){
  $nav = $_GET['nav'] . ".php";
  }else $nav = "home";
  if(file_exists($nav)) require $nav;
   
    ?>
  </div>
</div>