<?php
session_start();
if(isset($_SESSION["sellers"])){
   $administrator = $_SESSION["sellers"];
   include_once '../../functions/conne.php';
   $sql = "SELECT `shop` FROM `users` WHERE `userId` = $administrator";
   $row = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
   $hopId = $row['shop'];
   if(isset($_POST["sds"])){
       $ids = $_POST["sds"];
       $client = $_POST["demo"];
       $val = $_POST["val"];
       $sql = "UPDATE `carts` SET `status` = $val WHERE `cartId` = $ids";
       $result = mysqli_query($conn,$sql);
       if($result){
           ?>
         <script>
             $("#ordersContainer").html(loading_small);
             $.post("adminfunctions/acceptcart.php",
                    "client=<?php echo $client?>",
                    function(client){
                        $("#ordersContainer").html(client);
                    });
         </script>
           <?php
       }else echo mysqli_error($conn);
   }
   if(isset($_POST["client"])){
           $userId = $_POST["client"];
           $sql = "SELECT * FROM `carts` 
                   INNER JOIN `users` 
                   ON `carts`.`user_id` = `users`.`userId` 
                   INNER JOIN `products` 
                   ON `carts`.`productId` = `products`.`productId`
                   INNER JOIN `shops` 
                   ON `products`.`shop` = `shops`.`id`
                   WHERE `users`.`userId` = '$userId' AND `shops`.`id` = '$hopId' 
                   ORDER BY `carts`.`date` DESC";
           $result = mysqli_query($conn,$sql);
           $currency = array("RWF","USD");
           $total = 0;
           while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                ?>
               
               <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
               <img src="../<?php echo $row['productIcon']?>" class="w3-left w3-circle w3-margin-right" style="width:60px">
                <span class="w3-right w3-opacity"><i class="fa fa-calendar"></i> <?php echo $row["date"] ?></span>
                <h4><?php echo $row['lname']." ".$row["fname"]?></h4><br>
                <hr class="w3-clear">
                <h5><?php echo $row["productName"] ?>
                <span class="w3-badge w3-win8-orange w3-tiny">
                <?php echo $row['Quantity'] ?></span>
                </h5>
                <?php
                  if(!($row['promotion']==0)){

                ?>
                <p> unity price: <?php echo $row['promotion']." ".$currency[$row["currency"]] ; ?>, total price:
                  <?php
                    $total += $row['promotion']*$row['Quantity'];
                   echo $row['promotion']*$row['Quantity']." ".$currency[$row["currency"]]; ?></p>

                  <p><del> unity price: <?php echo $row['productPrice']." ".$currency[$row["currency"]] ; ?>, total price:
                  <?php echo $row['productPrice']*$row['Quantity']." ".$currency[$row["currency"]]; ?></del></p>
                  <?php
                     }
                    else{
                      ?>
                    <p> unity price: <?php echo $row['productPrice']." ".$currency[$row["currency"]] ; ?>, total price:
                  <?php
                    $total += $row['productPrice']*$row['Quantity'];
                   echo $row['productPrice']*$row['Quantity']." ".$currency[$row["currency"]]; ?></p>
                      <?php
                    }
                  ?>
                  <?php
                  if(!$row["status"]){
                    ?>
                    <button type="button" class="w3-button w3-margin-bottom ordersDetails w3-green" id="ord<?php echo $row["cartId"] ?>"><i class="fa fa-thumbs-up"></i> &nbsp;Accept </button>
                    <?php
                      }
                      else {
                    ?>
                    <button type="button" class="w3-button w3-margin-bottom ordersDetailz w3-red" id="ord<?php echo $row["cartId"] ?>"><i class="fa fa-close"></i> &nbsp; decline </button> 
                    <?php
                      }
                    ?>
              
                 <div id="ordersFunctions<?php echo $row["cartId"] ?>" class="w3-container w3-card w3-white w3-round w3-margin">
                       
                 </div>
              </div> 
               <?php
                 }
                 ?>
             <div class="w3-container w3-card w3-white w3-round w3-margin">
                 <p> Amount: <?php echo $total ?> RWF </p>
             </div>
           <script>
                   $(".ordersDetails").click( function(hjk){
                       hjk.preventDefault();
                       var ids = $(this).attr("id");
                       ids = ids.substring(3,ids.length);
                       $("#ordersFunctions"+ids).html(loading_small);
                       $.post("adminfunctions/acceptcart.php",
                             "sds="+ids+"&demo=<?php echo $userId?>&val=1",
                             function(fgh){
                                 $("#ordersFunctions"+ids).html(fgh);
                             })
                   })
                   $(".ordersDetailz").click( function(hjk){
                       hjk.preventDefault();
                       var ids = $(this).attr("id");
                       ids = ids.substring(3,ids.length);
                       $("#ordersFunctions"+ids).html(loading_small);
                       $.post("adminfunctions/acceptcart.php",
                             "sds="+ids+"&demo=<?php echo $userId?>&val=0",
                             function(fgh){
                                 $("#ordersFunctions"+ids).html(fgh);
                             })
                   })
               </script>
             <?php
   }
}
?>