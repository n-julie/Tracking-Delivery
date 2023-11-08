<?php
// require_once "./includes/db.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
  if(strlen($_POST['email']) < 1) $error[] = "Please enter your email";
  else if(strlen($_POST['password']) < 1) $error[] = "Please enter your password";
  else{
    $email= mysqli_real_escape_string($db,$_POST['email']);
    $password= mysqli_real_escape_string($db,$_POST['password']);
    
    $sql= "SELECT * FROM users WHERE email = ?";
    $stm = $db->prepare($sql) or die($db->error);
    $stm->bind_param("s",$email);
    $stm->execute();
    $check =$stm->get_result();
    if(mysqli_num_rows($check) < 1){
      $error[] = "Email not found, Try with valid email";
    }else{
      $verify = $check->fetch_array();
      if(password_verify($password,$verify['password'])){
        $_SESSION['auth'] = $verify;
        ?>
        <script>
          window.location.href="./";
        </script>
        <?php
      }else{
        $error[] ="Wrong password";
      }
    }
    $stm->close();
  }
}