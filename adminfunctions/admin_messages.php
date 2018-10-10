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
    <ul class="w3-ul w3-red">
    <?php
    while($row=mysqli_fetch_array($resul)){
        
          ?>
         <li class="adminMess" style="cursor:pointer;" id="adminMess<?php echo $row[0]?>" ><span class="w3-badge w3-green w3-margin-left" id="userMess<?php echo $row[0]?>"></span> <?php  echo $row[1]." ".$row[2] ?></li>
         <div><script>
             $.post("adminfunctions/number_of_messages_by_user.php",
                    "cv=<?php echo $row[0]?>&adminid=<?php echo $shop?>",
                    function(loops){
                        $("#userMess<?php echo $row[0]?>").html(loops);
                    });
            $("#adminMess<?php echo $row[0]?>").click( function(hdmi){
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
    <?php
    
    
}

?>