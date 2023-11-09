<?php
require_once "../includes/db.inc.php";
if(isset($_POST['scope'])){
  $scope = $_POST['scope'];
  switch($scope){
    case "add":
      $prod_id = $_POST['prod_id'];
      $prod_qty = $_POST['prod-qty'];

      $sql = "INSERT INTO carts(prod_id,prod_qty) VALUES(??)";
      $stmt =$conn->prepare($sql);
      $stmt->bind_param("ss",$prod_id,$prod_qty);
      $stmt->execute();
      $stmt->close(); 
      if($stmt){
        echo 201;
      }else{
        echo 500;
      }

      break;
      default:
      echo 500;
  }
}
?>