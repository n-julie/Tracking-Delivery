<?php
?>
<div class="mx-wd auto">
  <div class="users-container">
    <div class="add_newuser">
      <div>
        <form action="./includes/addUser.inc.php" method="post">
          <h2 style="font-weight:bolder; font-size:30px;">Add new user</h2>
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
          <div class="userinput">
            <input type="text" name="addname" placeholder="Enter user's name" class="m-r">
            <input type="email" name="addemail" placeholder="Enter user's email">
          </div>
          <!-- <div class="userinput pwd-wd-50 btn-center">
            <input type="password">
          </div> -->
          <div class="btn btn-center">
            <span class="icon"><?php include "./svgs/arrow-right.svg"?></span>
            <input type="submit" name="addUser">
          </div>

        </form>
      </div>
    </div>
    <div class="userTable">
      <h2>All users</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Email</th>
            <th>STATUS</th>
          </tr>
        </thead>
        <?php
        include "./includes/db.inc.php";
        $selectUsers = $db->query("SELECT * FROM admin") or die($db->error);
        ?>
        <tbody>
          <?php
          while ($getusers = $selectUsers->fetch_assoc()){
          ?>
          <tr>
            <td><?=$getusers['id']?></td>
            <td><?=$getusers['username']?></td>
            <td><?=$getusers['email']?></td>
            <td></td>
          </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>