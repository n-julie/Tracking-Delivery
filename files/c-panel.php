<?php $select = 'allcategories'; ?>
<div class="flex-container">
  <div class="left navToggle">
    <div style="width: 100%;">
      <div class="flex-start">
        <div class="logo_flex">
          <div class="admin_logo">
            <img src="./files/i_2mg/log.jpg" alt="">
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
            <a href="?ref=c-panel&nav_3=addProduct">Add new products</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/list-ul.svg";?></span>
          </p>
          <a href="?ref=c-panel&nav_3=allcategories">Categories</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/calendar.svg";?></span>
          </p>
          <a href="?ref=c-panel&nav_3=sales">Sales</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/user.svg" ?></span>
          </p>
          <a href="?ref=c-panel&nav_3=users">Users</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex cart-color"><?php include "./svgs/cart.svg" ?></span>
          </p>
          <a href="">Check orders</a>
        </div>
        <div class="links">
          <p class="icons-flex">
            <span class="ics-flex"><?php include "./svgs/gear.svg"?></span>
          </p>
          <a href="?ref=c-panel&nav_3=settings">Settings</a>
        </div>
      </div>
    </div>
  </div class="icons-position ic-left">
    <p class="icons-flex hide p-abso">
      <span class="ics-flex hide js-nav-btn"><?php include "./svgs/bars.svg" ?></span>
    </p>
    <p class="icons-flex p-abso x js-close">
      <span class="ics-flex"><?php include "./svgs/xmark.svg" ?></span>
    </p>
  <div class="right">
    <div class="watermark">
      <img src="./files/img/log.jpg" alt="">
    </div>
    <div>
      <?php
      $nav3 =isset($_GET['nav_3']) ? $_GET['nav_3'] : "addProduct" ;
      $page2 = "./".$nav3 .".php";
      if(file_exists($page2)) require $page2;
      ?>
    </div>
  </div>
</div>