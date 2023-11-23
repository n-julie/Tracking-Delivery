<?php 
include "./includes/activeLink.php";
include "./components.php";
include "./class.cart.php";
?>
<div class="nav-bg">
  <div class="mx-wd auto">
    <div>
      <div class="d-flex">
        <div>
          <div class="logo">
            <a href="?ref2=home">
              <img src="./files/img/log.jpg" alt="Express Delivery Tracking"/>
            </a>
          </div>
        </div>
        <div class="search">
          <form action="" method="post" class="search">
            <input type="text" name="search"class="js-search-btn">
            <button>
              <div class="links">
                <p class="icons-flex">
                  <span class="ics-flex search-icon"><?php include "./svgs/search.svg" ?></span>
                </p>
              </div>
            </button>
          </form>
        </div>
        <div style="position:relative;">
          <div class="nav_flex">
            <div class="nav d-nav">
              <a href="?ref=dashboard&ref2=home" style="border-radius: 3px;" class="<?php if($current_url === 'ref=dashboard&ref2=home')echo "active"?>">Home</a>
              <a href="?ref=dashboard&ref2=products"style="border-radius: 3px;" class="<?php if($current_url === 'ref=dashboard&ref2=products')echo "active"?>">All products</a>
            <div class="d-nav">
              <a href="?ref=dashboard&ref2=cart" class="h-border">
                <div class="links" style="position: relative;">
                  <p class="icons-flex">
                    <span class="ics-flex cart-color"><?php include "./svgs/cart.svg" ?></span>
                  </p>
                  <sapn style="position:absolute; left:28px; top:-8px"><?=$cart->cartItems()?></sapn>
                </div>
              </a>
            </div>
            </div>
            <?php
            if(isset($_SESSION['auth'])){
              ?>
              <a href="" >
                <div class="user-profile">
                  <div class="links js-profileBtn" style="background-color: #fff; width:30px;height:30px; border-radius:50%; align-items:center;justify-content:center;">
                    <p class="icons-flex">
                      <span class="ics-flex" style="width:15px;"><?php include "./svgs/user.svg" ?></span>
                    </p>
                  </div>
                  <div class="js-dropdown" style="align-items: center;">
                    <div style="display: flex;align-items:center;">
                      <div class="links js-profileBtn" style="background-color: #333; width:30px;height:30px; border-radius:50%; align-items:center;justify-content:center;">
                        <p class="icons-flex">
                          <span class="ics-flex" style="width:15px; fill:#fff;"><?php include "./svgs/user.svg" ?></span>
                        </p>
                      </div>
                      <p style="padding: 0 4px;"><?=$_SESSION['auth']['email']?></p>
                    </div>
                    <div class="my-orders" style="padding: 5px 0;">
                      <a href="?ref2=user-orders" style="padding: unset;">Orders&return</a>
                    </div>
                    <div style="padding: 5px 0;">
                      <a href="?logout" style="padding:unset; color:tomato;">Logout</a>
                    </div>
                  </div>
                </div>
              </a>
              <?php
            }else{
              ?>
            <div class="nvv" style="margin-left: 8px;">
              <a href="?ref-dashboard&ref2=userLogin">sign in</a>
            </div>
              <?php
            }
            ?>
          </div>
          <div class="icons-position">
            <p class="icons-flex hide2 p-right p-abso">
              <span class="ics-flex js-nav-btn"><?php include "./svgs/bars.svg" ?></span>
            </p>
            <p class="icons-flex p-right p-abso x js-close">
              <span class="ics-flex"><?php include "./svgs/xmark.svg" ?></span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="border-b"></div>
  <p class="nodata" style="text-align: center;">No data found for your search..</p>
  <?php
    // var_dump($_SESSION['auth_user']);
    ?>
</div>
<div class="scroll-y">
  <div>
    <div class="m-b"  style="padding-bottom:100px;">
      <?php
      $nav = isset($_GET['ref2']) ? $_GET['ref2'] : "home";
      $page = "./". $nav . ".php";
      if (file_exists($page)) require $page;
        
      ?>
    </div>
  </div>
</div>