<?php
// require_once "./includes/db.inc.php";
function cartElement($productname,$productprice,$productDesc,$productimg,$productuniqueId,$proQty){
  $element = "
  <div class=\"wd50\">
    <form action=\"\" method=\"post\">
      <div class=\"cart-flex\">
        <div class=\"d_flex\">
          <div class=\"f-flex\">
            <div class=\"cart-img\">
              <div>
                <img src=\"./files/uploads/$productimg\" alt=\"\">
              </div>
            </div>
          </div>
          <div class=\"cname\">
            <h5>$productname</h5>
            <small>$productDesc</small>
            <h2 style=\"color:red; font-size:17px;\">UGX.$productprice</h2>
            <div class=\"cbtns\">
              <div>
                <a href=\"\" style=\"text-decoration:none; color:#333;font-size:15px;\">Quantity:</a>
                <div class=\"product-qty\">
                  <button class=\"decrement-btn\">-</button>
                  <input type=\"text\" value=\"$proQty\" class=\"input-qty\" disabled>
                  <button class=\"increment-btn\">+</button>
                </div>
                <a href=\"?ref2=cart&removedProductFromCart&productId=$productuniqueId\" class=\"removebtn\">Remove</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  ";
  echo $element;
}

function products($cimage,$cname,$cprice,$cid){
  $element2 = "
    <div class=\"wd js-product\">
      <div class=\"hgt\">
        <form action=\"\" method=\"post\">
          <a href=\"?ref=dashboard&ref2=view-product&on_id=$cid\" style=\"color:unset; text-decoration:none;\" >
            <div class=\"profile\">
              <img src=\"./files/uploads/$cimage\" alt=\"\">
            </div>
            <div class=\"p-name js-productName\">$cname</div>
          </a>
          <div class=\"price\">UGX.$cprice</div>
        </form>
      </div>
    </div>
  ";
  echo $element2;
}

function categories($c_img,$c_name){
  $element3="
    <div class=\"c-wd js-product\">
      <div class=\"hgt\">
        <a href=\"?ref2=categories&category=$c_name\" style=\"text-decoration:none;color:unset;\">
          <div class=\"profile\">
            <img src=\"./files/uploads/$c_img\" alt=\"\">
          </div>
          <div class=\"cname js-productName\">
          $c_name
          </div>
        </a>
      </div>
    </div>
  ";
  echo $element3;
}

function prod($pid,$pname,$pimg){
  $element4="
  <div class=\"c-wd\">
    <div class=\"hgt\">
      <a href=\?ref2=view-products&on_id=$pid\" style=\"text-decoration:none;color:unset;\">
        <div class=\"profile\">
          <img src=\"./files/uploads/$pimg\" alt=\"\">
        </div>
        <div class=\"cname\">
        $pname
        </div>
      </a>
    </div>
  </div>
";
  echo $element4;
}

function getNameActive($table,$slug){
  global $db;
  $stmt = "SELECT * FROM $table WHERE name = '$slug'";
  $query_run = mysqli_query($db,$stmt) or die($db->error);
  return $query_run; 
}

function getActive($table,$id){
  global $db;
  $stmt = "SELECT * FROM $table WHERE id = '$id'";
  $query_run = mysqli_query($db,$stmt) or die($db->error);
  return  $query_run;
}

function getProductByCategory($category_id){
  global $db;
  $stmt = "SELECT * FROM products WHERE categoryId = '$category_id'";
  $query_run = mysqli_query($db,$stmt) or die($db->error);
  return $query_run;
}

function getAll($table){
  global $db;
  $sql = "SELECT * FROM $table";
  $query = mysqli_query($db,$sql) or die($db->error);
  return $query;
}

function limit4($table){
  global $db;
  $sql = "SELECT * FROM $table order by id asc limit 0,5";
  $query = mysqli_query($db,$sql) or die($db->error);
  return $query;
}

function limit5($table){
  global $db;
  $sql = "SELECT * FROM $table order by id asc limit 5,5";
  $query = mysqli_query($db,$sql) or die($db->error);
  return $query;
}

function slider($table){
  global $db;
  $sql = "SELECT * FROM $table WHERE status = 1";
  $sql_run = mysqli_query($db,$sql) or die($db->error);
  return $sql_run;
}

function trending($table){
  global $db;
  $stmt = "SELECT * FROM $table WHERE trending = 1";
  $query_run = mysqli_query($db,$stmt) or die($db->error);
  return $query_run;
}

// function getOrders(){
// global $db;
// $stm = "SELECT * FROM $table WHERE status = 0";
// $query = mysqli_query($db,$stm) or die($db->error);
// return $query;
// }

function delete($table,$id){
  global $db;
  $stmt = $db->query("DELETE FROM $table where id = '$id'") or die($db->error);
  return $stmt;
  
}

function redirect($url,$message){
  $error[] = $message;
  header('Location'.$url);
  exit();
}
?>