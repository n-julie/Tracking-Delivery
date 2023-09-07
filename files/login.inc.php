<?php
include "includes/db.inc.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){
  if(strlen($_POST['email']) < 1) $error[] = "Email is required";
  else if(strlen($_POST['password']) < 1) $error[] = "Password is required";
  else{
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $error[]= "Please insert valid email!";
    }else{
      $sql = "SELECT * FROM `admin` WHERE email ='$email'";
      $query = mysqli_query($conn,$sql) or die($conn->error);
      if(mysqli_num_rows($query) == 0){
        $error[]= "email is not exist";
      }else{
        $verify = mysqli_fetch_assoc($query);
        if(password_verify($pwd, $verify['password'])){
          $_SESSION['user'] = $verify;
          ?>
          <script>
            window.location.href = "?ref=dashboard";
          </script>
          <?php
        }else{
          $error[]="wrong password";
        }
      }
    }
  }
}