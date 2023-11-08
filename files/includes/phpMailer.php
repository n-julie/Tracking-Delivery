<?php
// require "./db.inc.php";
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "../mailer/vendor/autoload.php";
$activeEmail ="SELECT email,fname,lname,total_price FROM orders where email = '{$email}'";
$activeQ = mysqli_query($db,$activeEmail) or die($db->error);
if(mysqli_num_rows($activeQ) > 0);
foreach($activeQ as $item){
$uemail =$item['email'];
$ufname = $item['fname'];
$ulname =$item['lname'];
$utotal = $item['total_price'];
}
$mail = new PHPMailer(true);
try {
  //Server settings
  $mail->SMTPDebug = 2;
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'thecoder609@gmail.com';
  $mail->Password ='avjjxqgteegffhyl';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  //Recipients
  $mail->setFrom('thecoder609@gmail.com');
  $mail->addAddress($uemail);

  //Content
  $mail->isHTML(true);
  $mail->Subject ="Thank you for your order";
  $mail->Body = "Dear $ufname $ulname,\nThank you for your order. Your order has been received and being processed.\nWe will notify you once your order has been shipped.";
  $mail->send();
  //Redirect
  //clear the cart and redirect to thank-you page
  $_SESSION['cart'] = [];
  $total = [];
  ?>
  <script>
    // window.location.href = "?ref2=thank-you";
  </script>
  <?php
  // exit();
} catch (Exception $e) {
  $error[] = "Message could not sent. Mail error: {$mail->ErrorInfo}";
}