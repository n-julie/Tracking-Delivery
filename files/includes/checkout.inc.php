<?php
include "./includes/db.inc.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['checkout'])){
  if(strlen($_POST['fname']) < 1) $error[] = "First name is required!";
  else if(strlen($_POST['lname']) < 1) $error[] = "Last name is required!";
  else if (strlen($_POST['email']) < 1) $error[] = "Email is required";
  else if(strlen($_POST['num']) < 1) $error[] = "Your phone number is required";
  else if(strlen($_POST['address']) < 1) $error[] = "Please enter your address!";
  else if(empty($_POST['pmethod'])) $error[] = "Please select your payment method";
}
