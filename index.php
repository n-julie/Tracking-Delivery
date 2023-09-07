<?php
session_start();
chdir('./files');
// echo password_hash('ivan',PASSWORD_DEFAULT);
// echo password_hash("julie",PASSWORD_DEFAULT);
error_reporting(E_ALL);
if(isset($_GET['logout'])){
  session_destroy();
  header('location: ?ref=login');
}

$svg = array();
foreach (glob("./files/svgs/*.svg") as $vectors){
  $ph = pathinfo($vectors);
  $svg[$ph['filename']] = file_get_contents($vectors);
}
// $file="index";
// if(isset($_GET['ref'])) $file=$_GET['ref'];
$file = isset($_SESSION['user']) ? "dashboard" : "login";
if(!isset($_SESSION['user'])) $file = "login";

include "includes/header.php";
include "$file.php";
include "includes/footer.php";