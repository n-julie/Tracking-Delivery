<?php
require_once "./components.php";
?>
<div class="home-container">
  <!-- <div class="mx-wd auto">
    <div class="tittle">
      <h1>Trendings</h1>
      <div class="underlined"></div>
    </div>
  </div> -->
  <div class="slider-flex">
    <?php
   $slider = slider('products');
   if(mysqli_num_rows($slider) > 0){
    foreach($slider as $sl){
      ?>
      <div class="slider">
        <div class="hgt">
          <div class="slider-profile">
            <img src="./files/uploads/<?=$sl['productImage']?>" alt="">
          </div>
        </div>
      </div>
      <?php
    }
    }
    ?>
  </div>
</div>
<div class="trending-container">
  <div class="mx-wd auto">
    <div class="tittle">
      <h1>Trendings</h1>
      <div class="underlined"></div>
    </div>
    <div class="display-flex">
      <?php
      $trending = trending('products');
      if(mysqli_num_rows($trending) > 0){
        foreach( $trending as $item){
          ?>
          <div class="c-wd">
            <div class="hgt">
              <a href="?ref2=view-product&on_id=<?=$item['id']?>" style="text-decoration:none;color:unset;">
                <div class="profile">
                  <img src="./files/uploads/<?=$item['productImage']?>" alt="">
                </div>
                <div class="cname">
                <?=$item['productName']?>
                </div>
              </a>
            </div>
          </div>
        <?php }
        }else{
          echo "No data found!";
      }
      ?>
      </div>
    </div>
  </div>
</div>
<div class="mx-wd auto">
  <div class="">
    <div class="tittle">
      <h1>Our Collections</h1>
      <div class="underlined"></div>
    </div>
    <div class="display-flex js-container">
      <?php
      $stmt = limit4("categories");
      if($stmt->num_rows > 0){
        foreach( $stmt as $fetch){
          categories($fetch['image'],$fetch['name']);
        }
      }
      ?>
    </div>
  </div>
</div>
<div class="mx-wd auto">
  <div class="margin-btm">
      <div class="display-flex bg-color js-container">
        <?php
        $stm2 = limit5("categories");
        if($stm2->num_rows > 0){
          foreach( $stm2 as $fetch){
            categories($fetch['image'],$fetch['name']);
          }
        }
        ?>
      </div>
  </div>
</div>
<div class="footer1">
  <?php include_once "./footer.php" ?>
</div>
<script>
  let bg = document.querySelector('.bg-color');
  if(bg.innerText === ''){
    bg.classList.add('removeBg');
  }else {
    bg.classList.remove('removeBg');
  }
</script>