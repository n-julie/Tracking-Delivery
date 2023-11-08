<?php
include "db.inc.php";
include_once "components.php";
$edit = '';
$del = '';
$category = '';
$productName ='';
$produPrice = '';
$sprice= '';
$description='';
$slug = '';
$status = '';
$qty = '';
$trending = '';
$smalldesc = '';
$id2 = 'NULL';

if(isset($_GET['edit'])){
  $edit = $_GET['edit'];
  $editsql= $db->query("SELECT * FROM products WHERE id = '$edit'") or die($db->error);
  $getData = $editsql->fetch_assoc();
  $id2 = $getData['id'];
  $category = $getData['categoryId'];
  $productName = $getData['productName'];
  $produPrice = $getData['productPrice'];
  $qty = $getData['qty'];
  $slug = $getData['slug'];
  $sprice = $getData['sellingPrice'];
  $status = $getData['status'];
  $trending = $getData['trending'];
  $description = $getData['productDesc'];
  $smalldesc = $getData['small_desc'];
}else
if(isset($_GET['delete'])){
  $del =$_GET['delete'];
  $stmi = $conn->query("DELETE  FROM products WHERE id = '$del'") or die($conn->error);
  if($stmi){
    ?>
    <script>
      window.location.href = "?nav_3=allProducts"; 
    </script>
    <?php
  }
}

$cedit= '';
$cname = '';
$cdesc = '';
$slug = '';
$id3 = 'NULL';
if(isset($_GET['cedit'])){
  $cedit = $_GET['cedit'];

  $sql=getActive('categories',$cedit);
  foreach( $sql as $fetch);
  $id3=$fetch['id'];
  $cname = $fetch['name'];
  $cdesc = $fetch['cdesc'];
  $slug = $fetch['slug'];
} else if(isset($_GET['deleted'])){
  $del= $_GET['deleted'];
  $delete = delete('categories',$del);
  if($delete){
    ?>
      <script>
        window.location.href='?nav_3=allCategories';
      </script>
    <?php
  }
}