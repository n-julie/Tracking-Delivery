<?php 
include "./includes/updates.inc.php"; 
include "./includes/addcategory.inc.php";
?>
<div class="scroll-y">
  <div class="p-container">
    <!-- <div class="p-container"> -->
      <h1 style="margin:0 auto;">Add Categories</h1>
    <div class="wd-40">
      <div>
        <form method="post" enctype="multipart/form-data">
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
          <div class="display-flex">
            <div class="input-controller">
              <label for="">Product Name:</label>
              <input type="text" name="p-name" value="<?=$cname?>">
            </div>
            <div class="input-controller">
              <label for="">Slug:</label>
              <input type="text" name="slug" value="<?=$slug?>">
            </div>
          </div>
          <div class="display-flex">
            <div class="input-controller">
              <label for="">Product image:</label>
              <input type="file" name="file">
            </div>
              
            <input type="hidden" name="id" value="<?=$id3?>">
            <div class="input-controller">
              <label for="">Product Description:</label>
              <textarea name="description" id="" rows="3" style="resize: none;"><?=$cdesc?></textarea>
            </div>
          </div>
          <div class="cBtn">
            <input type="submit" value="Add Category" class="btn" name="addcategories">
          </div>
        </form>
      </div>
    </div>
    <!-- </div> -->
  </div>
</div>
