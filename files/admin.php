<div class="flex-container">
  <div class="left navToggle">
    <div style="width: 100%;">
      <div class="flex-start">
        <div class="logo_flex">
          <div class="admin_logo">
            <img src="./files/img/log.jpg" alt="">
          </div>
          <div style="margin-right: auto;">
            <h1><?=$_SESSION['user']['username']?></h1>
            <p style="color: green; font-weight:bolder;">Active now</p>
          </div>
        </div>
        <a href="?logout" style="fill: red; text-decoration:none; font-size:20px; display:flex; font-weight:bold;">
          <span class="ics-flex" toolpit="Logout" ><?php include "./svgs/off.svg" ?></span>
        </a>
      </div>
      <div class="admin-links">
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/cube.svg" ?></span>
          </p>
            <a href="?ref=dashboard&nav=addProduct" class="<?php if($nav == 'addProduct') echo "active" ?>">Add new products</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/list-ul.svg";?></span>
          </p>
          <a href="?ref=dashboard&nav=allcategories" class="<?php if($nav == 'allcategories') echo "active" ?>">Categories</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/calendar.svg";?></span>
          </p>
          <a href="?ref=dashboard&nav=sales.php">Sales</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/user.svg" ?></span>
          </p>
          <a href="?ref=dashboard&nav=users">Users</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/gear.svg"?></span>
          </p>
          <a href="">Settings</a>
        </div>
      </div>
    </div>
  </div>

    <p class="icons-flex hide">
      <span class="ics-flex" onclick="openNav();"><?php include "./svgs/bars.svg" ?></span>
    </p>
  
  <div class="right">
    <div class="watermark">
      <img src="./files/img/log.jpg" alt="">
    </div>
    <div>
      <?php
      $nav='addProduct';
      if(isset($_GET['nav'])) $nav= $_GET['nav'] . ".php";
      if(file_exists($nav)) require $nav;
      ?>
    </div>
  </div>
</div>
<script>
  function openNav(){
    nav = document.querySelector('.navToggle');
    if(nav.style.display === "flex") nav.style.display = "none";
    else nav.style.display = "flex";
  }
</script>