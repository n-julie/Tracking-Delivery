<?php
// require_once "./includes/db.inc.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])){
  if(strlen($_POST['fname']) < 1) $error[] ="Insert your first name";
  elseif(strlen($_POST['lname']) < 1) $error[]="Insert your last name";
  else if(strlen($_POST['email']) < 1) $error[] = "Insert your email";
  else if(strlen($_POST['password']) < 1) $error[] = "Insert your password";
  else{
    $fname= mysqli_real_escape_string($db,$_POST['fname']);
    $lname= mysqli_real_escape_string($db,$_POST['fname']);
    $email= mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $hashed=password_hash($password,PASSWORD_DEFAULT);

    $check_email = "SELECT count(*) FROM users WHERE email = ?";
    $stmt=$db->prepare($check_email) or die($db->error);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    $stmt->close();
    if($result> 0){
      $error[] = "Email is already assocciated with another account, please try with another email";
    }else{
      $sql ="INSERT INTO users(fname,lname,email,password) VALUES(?,?,?,?)";
      $stmti = $db->prepare($sql);
      $stmti->bind_param("ssss",$fname,$lname,$email,$hashed);
      $stmti->execute();
      if($stmti){
        ?>
        <script>
          window.location.href="?ref=dashboard";
        </script>
        <?php
      }
      $stmti->close();
    }
  }
}