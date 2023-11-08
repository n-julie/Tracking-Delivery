<?php 
require_once "./components.php";
require_once "./includes/updates.inc.php";
require_once "./includes/addProduct.inc.php";
?>
<div class="scroll-y">
  <div class="p-container">
    <!-- <div class="p-container"> -->
    <h1 style="margin:0 auto;">Add product</h1>
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
              <label for="">Select category:</label>
              <select name="categoryId" class="select">
                <option selected>Select category</option>
                <?php
                $categories = getAll('categories');
                if($categories->num_rows > 0){
                  foreach($categories as $item){
                    ?>
                    <option value="<?=$item['id']?>" <?=$category == $item['id'] ? 'selected': ''?>><?=$item['name']?></option>
                    <?php
                  }
                }
                ?>
              </select>
            </div>
            <div class="input-controller">
              <label for="">Product Name:</label>
              <input type="text" name="p-name" value="<?=$productName?>">
            </div>
          </div>
          <div class="display-flex">
            <div class="input-controller">
              <label for="">Product Price:</label>
              <input type="text" name="p-price" value="<?=$produPrice?>">
            </div>
            <div class="input-controller">
              <label for="">Selling Price</label>
              <input type="text" name="s-price" value="<?=$sprice?>">
            </div>
          </div>
          <div class="display-flex">
            <div class="input-controller">
              <label for="">Quantity:</label>
              <input type="number" name="qty" value="">
            </div>
            <div class="input-controller">
              <label for="">Product image:</label>
              <input type="file" name="file">
            </div>
          </div>
          <div class="display-flex">
            <div class="input-controller">
              <label for="">Slung:</label>
              <input type="text" name="slug" value="<?=$slug?>">
            </div>
            <div class="input-controller status-flex">
              <div>
                <label for="">Status:</label>
                <input type="checkbox" name="status"<?=$status == 0 ? '' : 'checked'?>>
              </div>
              <div>
                <label for="">Trending:</label>
                <input type="checkbox" name="trending" <?=$trending == 0 ? '' : 'checked'?>>
              </div>
            </div>
          </div>
          <div class="display-flex">
            <input type="hidden" name="id" value="<?=$id2?>">
            <div class="input-controller">
              <label for="">Product Description:</label>
              <textarea name="description" id="" rows="3" style="resize: none;"><?=$description?></textarea>
            </div>
            <div class="input-controller">
              <label for="">Small description:</label>
              <textarea name="small-description" rows="3" style="resize: none;"><?=$smalldesc?></textarea>
            </div>
          </div>
          <div class="cBtn">
            <input type="submit" value="Add product" class="btn" name="addProduct">
          </div>
        </form>
      </div>
    </div>
    <!-- </div> -->
  </div>
</div>
