<?php
// require_once "components.php";
if(isset($_GET['category'])){
  $category = $_GET['category'];
  $tittle_data= getNameActive('categories',$category);
  $tittle=$tittle_data->fetch_assoc();
  if($tittle){
    $cId = $tittle['id'];
    ?>
    <div class="mx-wd auto">
      <div class="tittle">
        <h1><?=$tittle['name'] ?></h1>
        <div class="underlined"></div>
      </div>
      <div class="display-flex">
        <?php
        $product = getProductByCategory($cId);
        if(mysqli_num_rows($product) > 0){
          foreach( $product as $item){
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
  <?php
  }else {
    echo "Something went wrong!";
  }
} else {
  echo "Something went wrong!";
} ?>