<?php
if(isset($_POST["vv"])){
      include_once '../functions/conne.php';
      $hopId = $_POST["vv"];
      $sql = "SELECT * FROM `carts` 
              INNER JOIN `users` 
              ON `carts`.`user_id` = `users`.`userId` 
              INNER JOIN `products` 
              ON `carts`.`productId` = `products`.`productId` 
              INNER JOIN `shops`    
              ON `products`.`shop` = `shops`.`id`
              WHERE `status` = 0 AND `shops`.`id` = '$hopId'
              ORDER BY `carts`.`date` 
              DESC LIMIT 0,1";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
               ?>
              <div class="w3-card w3-round w3-white w3-center">
                <div class="w3-container">
                  <p> latest ordered product :</p>
                  <img src="../<?php echo $row['productIcon']?>" style="width:100%;">
                  <p><strong><?php echo $row['fname']." ".$row['lname']?></strong></p>
                  <p><i class="fa fa-calendar"></i> <?php echo $row["date"]?></p>
                  <p><a href="page.php?name=<?php echo $row["userId"]?>&demo=<?php echo $row["cartId"]?>" class="w3-button w3-block w3-theme-l4">Info</a></p>
                </div>
              </div>
              <br>
        <?php
      }
}?>