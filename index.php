<?php
session_start();
// echo password_hash('ivan',PASSWORD_DEFAULT);
// echo password_hash("julie",PASSWORD_DEFAULT);
error_reporting(E_ALL);
if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['user']);
  header('location: ?nav3=categories');
}
chdir('files');

$svg = array();
foreach (glob("./files/svgs/*.svg") as $vectors){
  $ph = pathinfo($vectors);
  $svg[$ph['filename']] = file_get_contents($vectors);
}

$file = isset($_SESSION['user']) ? 'c-panel' : "dashboard";

require "./includes/header.php";
require "./$file.php";
require "./includes/footer.php";