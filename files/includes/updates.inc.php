<?php
include "db.inc.php";
$edit = '';
$del = '';
$productName ='';
$produPrice = '';
$id = 'NULL';

if(isset($_GET['edit'])){
  $edit = $_GET['edit'];
  $editsql= $conn->query("SELECT * FROM products WHERE uniqueId = '$edit'") or die($conn->error);
  $getData = $editsql->fetch_assoc();
  $id = $getData['id'];
  $productName = $getData['productName'];
  $produPrice = $getData['productPrice'];
}else
if(isset($_GET['delete']))
$del =$_GET['delete'];
$stmi = $conn->query("DELETE  FROM products WHERE uniqueId = '$del'") or die($conn->error);