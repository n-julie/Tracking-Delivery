<?php 
  $select = 'allcategories';
  include "./includes/activeLink.php";

?>
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
        <a href="?ref=c-panel&nav_3=addCategories" class="<?php if($current_url === 'ref=c-panel&nav_3=addCategories') echo "active" ?>">
          <div class="links">
            <p class="icons-flex">
              <span class="ics-flex"><?php include "./svgs/plus.svg" ?></span>
            </p>
              <span>Add Categories</span>
          </div>
        </a>
        <a href="?ref=c-panel&nav_3=allcategories" class="<?php if($current_url === 'ref=c-panel&nav_3=allcategories') echo "active" ?>">
          <div class="links">
            <p class="icons-flex">
              <span class="ics-flex"><?php include "./svgs/list-ul.svg";?></span>
            </p>
            <span>All Categories</span>
          </div>
        </a>
        <a href="?ref=c-panel&nav_3=addProduct" class="<?php if($current_url === 'ref=c-panel&nav_3=addProduct') echo "active" ?>">
          <div class="links">
            <p class="icons-flex">
              <span class="ics-flex"><?php include "./svgs/plus.svg" ?></span>
            </p>
              <span>Add products</span>
          </div>
        </a>
        <a href="?ref=c-panel&nav_3=allProducts" class="<?php if($current_url === 'ref=c-panel&nav_3=allProducts') echo "active" ?>">
          <div class="links">
            <p class="icons-flex">
              <span class="ics-flex"><?php include "./svgs/list-ul.svg";?></span>
            </p>
            <span>All Products</span>
          </div>
        </a>
        <a href="?ref=c-panel&nav_3=sales" class="<?php if($current_url === 'ref=c-panel&nav_3=sales') echo "active" ?>">
          <div class="links">
            <p class="icons-flex">
              <span class="ics-flex"><?php include "./svgs/calendar.svg";?></span>
            </p>
            <span>Sales</span>
          </div>
        </a>
        <a href="?ref=c-panel&nav_3=users" class="<?php if($current_url === 'ref=c-panel&nav_3=users') echo "active" ?>">
          <div class="links">
            <p class="icons-flex">
              <span class="ics-flex"><?php include "./svgs/user.svg" ?></span>
            </p>
            <span>Users</span>
          </div>
        </a>
        <a href="?ref=c-panel&nav_3=orders" class="<?php if($current_url === 'ref=c-panel&nav_3=orders') echo "active" ?>">
          <div class="links">
            <p class="icons-flex">
              <span class="ics-flex cart-color"><?php include "./svgs/cart.svg" ?></span>
            </p>
            <span>Orders</span>
          </div>
        </a>
        <a href="?ref=c-panel&nav_3=settings" class="<?php if($current_url === 'ref=c-panel&nav_3=settings') echo "active" ?>">
          <div class="links">
            <p class="icons-flex">
              <span class="ics-flex"><?php include "./svgs/gear.svg"?></span>
            </p>
            <span>Settings</span>
          </div>
        </a>
      </div>
    </div>
  </div class="icons-position ic-left">
    <p class="icons-flex hide p-abso">
      <span class="ics-flex hide js-nav-btn"><?php include "./svgs/bars.svg" ?></span>
    </p>
    <p class="icons-flex x js-close">
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