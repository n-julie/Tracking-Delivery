<?php
// $conn = mysqli_connect("localhost","root","","deliveryTracking");
// if(!$conn){
//   echo "There is error in db connection" . mysqli_connect_error();
// }

class DB extends mysqli {
  public $db;
  public function __construct()
  {
    $host = 'localhost';
    $database = 'deliveryTracking';
    $user = 'root';
    $password = '';
    $this->db = new mysqli($host,$user,$password,$database);
  }
}
$conn = new DB;
$db = $conn->db;
