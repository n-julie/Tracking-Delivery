<?php
include "./includes/db.inc.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addUser'])){
  if(strlen($_POST['addname']) < 1) $error[] = "Enter user's name";
  else if(strlen($_POST['addemail']) < 1) $error[] = "Enter user's email";
  else{
    $addname = $_POST['addname'];
    $addemail = $_POST['addemail'];
    $checksql= "SELECT count(*) FROM admin where email = ? ";
    $stmt = $conn->prepare($checksql) or die($conn->error);
    $stmt->bind_param("s",$addemail);
    $stmt->execute();
    $stmt->bind_result($results);
    $stmt->fetch();
    $stmt->close();
    if($results > 0){
      $error[] = "The email is already used!";
    } else {
      $addsql = "INSERT INTO admin(username,email) VALUES(?,?)";
      $stmti = $conn->prepare($addsql);
      $stmti->bind_param("ss", $addname, $addemail) or die($conn->error);
      $stmti->execute();
      $stmti->close();
      if($stmti){
        $error[] = "Done";
      }else{
        $error[] = "Something went wrong!!";
      }
    }
  }
}