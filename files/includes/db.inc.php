<?php
$conn = mysqli_connect("localhost","root","","deliveryTracking");
if(!$conn){
  echo "There is error in db connection" . mysqli_connect_error();
}
