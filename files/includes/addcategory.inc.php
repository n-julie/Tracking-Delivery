<?php
// include "db.inc.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addcategories'])){
  $cname = mysqli_real_escape_string($db,$_POST['p-name']);
  $cdesc = mysqli_real_escape_string($db,$_POST['description']);
  $slug = mysqli_real_escape_string($db,$_POST['slug']);
  // $uniqueId = rand(time(),1000);
  $id = intval(mysqli_real_escape_string($db,$_POST['id']));
  $idd = $id == 0 ? 'NULL' : $id;

  $catsql= "INSERT INTO categories(id,name,cdesc,slug) VALUES(?,?,?,?) on duplicate key UPDATE `name`=values(`name`),`cdesc`=values(`cdesc`),`slug`= values(`slug`)";
  $stmt = $db->prepare($catsql) or die($db->error);
  $stmt->bind_param('isss',$idd,$cname,$cdesc,$slug);
  $stmt->execute();
  $stmt->close();
  if(isset($_FILES['file'])){
    if(intval($idd) == 0){
      $getId = "SELECT * FROM categories order by id desc limit 1";
      $query = mysqli_query($db,$getId) or die($db->error);
      $fetch = $query->fetch_array();
      $imgId = $fetch['id'];
    }else $imgId = $idd;

    $files=$_FILES['file'];
    $tmpName = $files['tmp_name'];
    $fileName = $files['name'];

    if(move_uploaded_file($tmpName, "./uploads/$fileName")){
      $update = $db->query("UPDATE categories SET image = '$fileName' WHERE id = $imgId") or die($db->error);
    }
  }
  ?>

  <script>
    alert("<?=intval($idd) > 0 ? 'Edited': 'Added'?> sussessfully!");
        window.location.href = "?nav_3=allcategories"; 
  </script>
  <?php
}