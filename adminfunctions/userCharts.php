<?php
if(isset($_POST['xc'])){
    include('../../functions/conne.php');
    $xc = $_POST['xc'];
    $userId = $_POST["userId"];
      $shop = $_POST["adminid"];
    $numberOfallMess = "SELECT * FROM `usermessages` WHERE `userId` = '$userId' AND `shop` = '$shop'";
 	  $result = mysqli_query($conn,$numberOfallMess);
 	  $totalN = mysqli_num_rows($result);
 	  $totalN = (int)$totalN;
 	  $xc = (int)$xc;
 	  if($totalN>$xc){
          $sql = "SELECT * FROM `usermessages` INNER JOIN `users` ON `usermessages`.`userId` = `users`.`userId`WHERE `usermessages`.`userId` = '$userId' AND `usermessages`.`shop` = '$shop' ORDER BY `messId` ASC LIMIT $xc,$totalN";
          $align = array("w3-right-align","w3-left-align");
          $result = mysqli_query($conn,$sql);
         // echo $sql;
            while($row = mysqli_fetch_array($result))
            {
                        	?>
                        	  <div class="w3-card-4">
            	                 <div class="w3-container w3-win8-blue <?php echo $align[$row[5]]?>">
            	                    <h2><?php if($row['direction']) echo $row[9]." <b>".$row[10]."</b>"; else echo "you" ?></h2>
            	                    <p><?php echo $row[3]; ?></p>
            	                    <p><i class="fa fa-calendar"></i> <?php echo $row[4]; ?></p>
            	                 </div>
            	              </div>
            	              <br>
                        	<?php
             }
             $sql = "UPDATE `usermessages` SET `seen1` = '1' WHERE `userId` = '$userId' AND `shop` = '$shop'";
             $result = mysqli_query($conn,$sql);
             ?>
             <script>
                 cx = <?php echo $totalN ?>;
             </script>
             <?php
 	  }
 	  else echo "";
}
?>