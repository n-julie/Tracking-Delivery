<?php 
include "./includes/db.inc.php";
include "./includes/updates.inc.php"; 
include "./includes/addProduct.inc.php";
?>
<div class="scroll-y">
  <div class="p-container">
    <!-- <div class="p-container"> -->
    <div class="wd-40">
      <div>
        <form method="post" enctype="multipart/form-data">
          <h2 style="text-align: center; margin:5px 0;">Add product</h2>
          <div>
            <?php
            if(!empty($error)){
              foreach($error as $errors){
                ?>
                <p class="error"><?=$errors?></p>
                <?php
              }
            }
            ?>
          </div>
          <div class="input-controller">
            <label for="">Product Name:</label>
            <input type="text" name="p-name" value="<?=$productName?>">
          </div>
          <div class="input-controller">
            <label for="">Product Price:</label>
            <input type="text" name="p-price" value="<?=$produPrice?>">
          </div>
          <div class="input-controller">
            <label for="">Product image:</label>
            <input type="file" name="file">
          </div>
          <input type="hidden" name="id" value="<?=$id?>">
          <div class="input-controller">
            <label for="">Product Description:</label>
            <textarea name="description" id="" rows="7" style="resize: none;">

            </textarea>
          </div>
          <div class="input-controller">
            <input type="submit" value="Add product" class="btn" name="addProduct">
          </div>
        </form>
      </div>
    </div>
    <div class="wd-60">
      <div>
        <h2 style="margin: 5px auto; text-align:center;">Last 10 products</h2>
        <div>
          <?php
          $select = $conn->query("SELECT * FROM products order by uniqueId desc limit 10") or die($conn->error);
          
          ?>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>price</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody style="position: relative;">
              <?php
              if($select->num_rows > 0){
                while($row=$select->fetch_assoc()){?>
                <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['productName']?></td>
                  <td>Sh.<?=$row['productPrice']?></td>
                  <td><?=$row['productDesc']?></td>
                  <td style="display:flex;align-items:center; flex-direction:column">
                    <a href="?nav=addProduct&edit=<?=$row['uniqueId']?>" class="icons-flex">
                      <span class="ics-small green"><?php include "./svgs/pencil.svg" ?></span>
                    </a>
                    <a href="?nav=addProduct&delete=<?=$row['uniqueId']?>" class="icons-flex">
                      <span class="ics-small red" onclick="deleteAlert();"><?php include "./svgs/trash.svg" ?></span>
                    </a>
                  </td>
                </tr>
                <?php }
              }else {?>
                <p style="position: absolute; top:15%; color:red; font-weight:bolder;">No data found!</p>
            <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
</div>
<script>
  function deleteAlert(){
    const  alert = confirm("Are you sure?\nYou want to delete this product!");
    if(alert === false){
      event.preventDefault();
    }
  }
</script>
