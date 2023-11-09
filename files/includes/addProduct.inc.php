<?php
// include "db.inc.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addProduct'])){

  if(strlen($_POST['p-name']) < 1) $error[] = "Product name is required!";
  else if(strlen($_POST['p-price']) < 1) $error[] = "Product price required!";
  else{
    $categoryId = mysqli_escape_string($db, $_POST['categoryId']);
    $pname =mysqli_escape_string($db,$_POST['p-name']);
    $pprice = mysqli_escape_string($db, $_POST['p-price']);
    $selprice = mysqli_escape_string($db,$_POST['s-price']);
    $qty = mysqli_escape_string($db,$_POST['qty']);
    $slug = mysqli_escape_string($db,$_POST['slug']);
    $status = isset($_POST['status']) ? 1 : 0;
    $trending = isset($_POST['trending']) ? 1 : 0;
    $pdesc = mysqli_escape_string($db,$_POST['description']);
    $smalldesc = mysqli_escape_string($db,$_POST['small-description']);
    $uniqueId = rand(time(),1000);
    $id = mysqli_escape_string($db,intval($_POST['id']));
    $id1 = $id == 0 ? 'NULL' : $id;
    
    $sql = "INSERT INTO products (id,categoryId,productName,productPrice,sellingPrice,qty,slug,status,trending,productDesc,small_desc,uniqueId) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)

    on duplicate key UPDATE 
    
    `categoryId`=values(`categoryId`), `productName`=values(`productName`),`productPrice`=values(`productPrice`),`sellingPrice`=values(`sellingPrice`),`qty`=values(`qty`),`slug`=values(`slug`),`status` = values(`status`),`trending` = values(`trending`),`productDesc`=values(`productDesc`),`small_desc` = values(`small_desc`)";
    // print_r($sql);
    $stmt=$db->prepare($sql);
    $stmt->bind_param('isssssssssss',$id1,$categoryId,$pname,$pprice,$selprice,$qty,$slug,$status,$trending,$pdesc,$smalldesc,$uniqueId);
    $stmt->execute();
    $stmt->close();

    if(isset($_FILES['file'])){
      if(intval($id1) == 0){
        $idstmt= "SELECT * FROM products order by id desc limit 1";
        // print_r($getidsql);
        $idquery=mysqli_query($db,$idstmt) or die($db->error);
        $fetch = $idquery->fetch_assoc();
        $productId = $fetch['id'];
        // echo $productId;
      } else $productId = $id1;
        $files = $_FILES['file'];
        $tmp_name=$files['tmp_name'];
        $name = $files['name'];
        $filename = time().$name;
      
        if(move_uploaded_file($tmp_name, "./uploads/$filename")){
          $update = "UPDATE products SET productImage = '$filename' where id = '$productId'";
          $imgQuery= mysqli_query($db,$update) or die($db->error);
        }
      }
    // if($stmt){
      ?>
      <script>
        alert("<?=intval($id1) > 0 ? 'Edited' : 'Added'?> successfully!");
        window.location.href = "?nav_3=allProducts"; 
      </script>
      <?php
    // }
  }
}
