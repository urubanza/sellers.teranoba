<?php
   include_once '../../functions/conne.php';
   if(isset($_POST["sds"])){
       $ids = $_POST["sds"];
       $client = $_POST["demo"];
       $val = $_POST["val"];
       $sql = "UPDATE `orders` SET `status` = $val WHERE `ordersId` = $ids";
       $result = mysqli_query($conn,$sql);
       if($result){
           ?>
         <script>
             $("#ordersContainer").html(loading_small);
             $.post("adminfunctions/acceptorder.php",
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
           $sql = "SELECT * FROM `orders` INNER JOIN `users` ON `orders`.`userId` = `users`.`userId`  WHERE `users`.`userId` = '$userId' ORDER BY `orderDate` DESC";
           $result = mysqli_query($conn,$sql);
           while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
               ?>
               
               <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                <span class="w3-right w3-opacity"><i class="fa fa-calendar"></i> <?php echo $row["orderDate"] ?></span>
                <h4><?php echo $row['lname']." ".$row["fname"]?></h4><br>
                <hr class="w3-clear">
                <h5><?php echo $row["orderstitle"] ?></h5>
                <p><?php echo $row['ordersdesc']?></p>
                <?php
                  if(!$row["status"]){
                ?>
                <button type="button" class="w3-button w3-margin-bottom ordersDetails w3-green" id="ord<?php echo $row["ordersId"] ?>"><i class="fa fa-thumbs-up"></i> &nbsp;Accept </button>
                <?php
                  }
                  else {
                ?>
                <button type="button" class="w3-button w3-margin-bottom ordersDetailz w3-red" id="ord<?php echo $row["ordersId"] ?>"><i class="fa fa-close"></i> &nbsp; decline </button> 
                <?php
                  }
                ?>
                <div id="ordersFunctions<?php echo $row["ordersId"] ?>" class="w3-container w3-card w3-white w3-round w3-margin">
                       
                </div>
              </div> 
               <?php
             }
             ?>
           <script>
               $(".ordersDetails").click( function(hjk){
                   hjk.preventDefault();
                   var ids = $(this).attr("id");
                   ids = ids.substring(3,ids.length);
                   $("#ordersFunctions"+ids).html(loading_small);
                   $.post("adminfunctions/acceptorder.php",
                         "sds="+ids+"&demo=<?php echo $userId?>&val=1",
                         function(fgh){
                             $("#ordersFunctions").html(fgh);
                         })
               })
               $(".ordersDetailz").click( function(hjk){
                   hjk.preventDefault();
                   var ids = $(this).attr("id");
                   ids = ids.substring(3,ids.length);
                   $("#ordersFunctions"+ids).html(loading_small);
                   $.post("adminfunctions/acceptorder.php",
                         "sds="+ids+"&demo=<?php echo $userId?>&val=0",
                         function(fgh){
                             $("#ordersFunctions").html(fgh);
                         })
               })
           </script>
             <?php
   }
?>