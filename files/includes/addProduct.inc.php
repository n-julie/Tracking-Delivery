<?php
include "./includes/db.inc.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addProduct'])){

  if(strlen($_POST['p-name']) < 1) $error[] = "Product name is required!";
  else if(strlen($_POST['p-price']) < 1) $error[] = "Product price required!";
  else{
    $pname =$_POST['p-name'];
    $pprice = $_POST['p-price'];
    $pdesc = $_POST['description'];
    $uniqueId = rand(time(),1000);
    $id = intval($_POST['id']);
    $id = $id == 0 ? 'NULL' : $id;
    
    $sql = "INSERT INTO products (id,productName,productPrice,productDesc,uniqueId) VALUES($id,'$pname','$pprice','$pdesc','$uniqueId') on duplicate key update `productName`=values(`productName`),`productPrice`=values(`productPrice`),`productDesc`=values(`productDesc`)";
    $query = mysqli_query($conn,$sql) or die($conn->error);
    // print_r($sql);
    if(isset($_FILES['file'])){
      if(intval($id) == 0){
        $getidsql= "SELECT * FROM products order by id desc limit 1";
        print_r($getidsql);
        $getidquery=mysqli_query($conn,$getidsql) or die($conn->error);
        $fetch = $getidquery->fetch_assoc();
        $productId = $fetch['id'];
        echo $productId;
      }else $productId = $id;
      // echo '<pre>';
      // print_r($_FILES);
      // echo '</pre>';
        $files = $_FILES['file'];
        $tmp_name=$files['tmp_name'];
        $name = $files['name'];
      
        if(move_uploaded_file($tmp_name, "./uploads/$name")){
          $update = "UPDATE products SET productImage = '$name' where id = '$productId'";
          $imgQuery= mysqli_query($conn,$update) or die($conn->error);
        }
      }
  ?>
  <script>
    alert("<?= intval($id) > 0 ? 'Edited' : 'Added'?> successfully!");
    window.location.href = "?nav=addproduct";
  </script>
  <?php
  }
}