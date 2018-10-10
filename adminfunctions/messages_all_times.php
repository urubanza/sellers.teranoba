<?php
session_start();
include_once '../../functions/conne.php';
if(isset($_SESSION["sellers"])){
    $adminid =  $_SESSION["sellers"];
    $sql = "SELECT `shop` FROM `users` WHERE `userId` = '$adminid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    $shop = $row[0];
    /*$allMessages = "SELECT * FROM `usermessages` 
            INNER JOIN `users`
            ON `usermessages`.`userId` = `users`.`userId` WHERE `shop` = $shop";*/
    $conversation  = "SELECT DISTINCT `userId` FROM `usermessages`";
    $resul = mysqli_query($conn,$conversation);
    $ids = array();
    while($row=mysqli_fetch_array($resul)){
        array_push($ids,$row[0]);
    }
    
    $construct = "SELECT * FROM `users` WHERE ";
    for($var = 0; $var<sizeof($ids);$var++){
        if(!($ids[$var]==$adminid)){
         $construct = $construct." `userId` = '$ids[$var]'";
         if(($var+1)<sizeof($ids)){
             $construct = $construct." OR ";
         }
        }
    }
    
    $resul = mysqli_query($conn,$construct);
    ?>
    <div class="w3-container w3-card w3-white w3-round w3-margin" style="padding:2em"><br>
    <ul class="w3-ul w3-red">
    <?php
    while($row=mysqli_fetch_array($resul)){
        
          ?>
         <li class="adminMessa" style="cursor:pointer;" id="adminMessa<?php echo $row[0]?>" style="padding:3em;"><span class="w3-badge w3-green w3-margin-left" id="userMessa<?php echo $row[0]?>"></span> <?php  echo $row[1]." ".$row[2] ?></li>
         <div>
         <script>
             $.post("adminfunctions/number_of_messages_by_user.php",
                    "cv=<?php echo $row[0]?>&adminid=<?php echo $shop?>",
                    function(loops){
                        $("#userMessa<?php echo $row[0]?>").html(loops);
                    });
            $("#adminMessa<?php echo $row[0]?>").click( function(hdmi){
                $.post("adminfunctions/userContact.php",
                       "userId=<?php echo $row[0]?>&adminid=<?php echo $shop?>",
                        function(returns){
                            $("#ordersContainer").html(returns);
                        })
            })
         </script>
         </div>
          <?php
    }
    ?>
    </ul>
    </div>
    <?php
    
    
}

?>