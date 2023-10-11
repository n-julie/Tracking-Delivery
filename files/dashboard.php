<div class="nav-bg">
  <div class="mx-wd auto">
    <div>
      <div class="d-flex">
        <div>
          <div class="logo">
            <img src="./files/img/log.jpg" alt="Express Delivery Tracking"/>
          </div>
        </div>
        <div class="search">
          <input type="text" class="js-search-btn">
          <button>
            <div class="links">
              <p class="icons-flex">
                <span class="ics-flex search-icon"><?php include "./svgs/search.svg" ?></span>
              </p>
            </div>
          </button>
        </div>
        <div style="position:relative;">
          <div class="nav d-nav">
            <a href="?ref&dashboard&ref2=home">Home</a>
            <a href="?ref&dashboard&ref2=categories" >Categories</a>
            <a href="?ref&dashboard&ref2=cart" class="h-border">
              <div class="links">
                <p class="icons-flex">
                  <span class="ics-flex cart-color"><?php include "./svgs/cart.svg" ?></span>
                </p>
                <?php
                  if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo "<span style=\"color: red; font-weight:bold;\">$count</span>";
                  } else {
                    echo "<span style=\"color: red; font-weight:bold;\">0</span>";
                  }
                ?>
              </div>
            </a>
          </div>
          <div>
            <p class="icons-flex hide2 p-right">
              <span class="ics-flex js-nav-btn"><?php include "./svgs/bars.svg" ?></span>
            </p>
          </div>
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
      // if(isset($_GET['nav'])) $nav = $_GET['nav'] . ".php";
      // if(file_exists($nav)) require $nav;
    $nav = isset($_GET['ref2']) ? $_GET['ref2'] : "categories";
    $page = "./". $nav . ".php";
    if (file_exists($page)) require $page;
      
        ?>
    </div>
  </div>
</div>