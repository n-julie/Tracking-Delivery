<div class="display-flex" style="display: <?=in_array(2, [$category, $_SESSION['category']]) ? 'flex' : 'none'?>;">
  <div class="input-controller">
    <label for="">Name</label>
    <input type="text" name="p.name[]">
  </div>
  <div class="input-controller">
    <label for="">Size</label>
    <input type="text" name="size[]">
  </div>
</div>