<?php
session_start();
include_once '../../functions/conne.php';
if(isset($_SESSION["sellers"])){
    $adminid =  $_SESSION["sellers"];
    $sql = "SELECT `shop` FROM `users` WHERE `userId` = '$adminid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    $shop = $row[0];
    $colors = array("w3-green","w3-white");
    $sql = "SELECT * FROM `usermessages` 
            INNER JOIN `users` ON `usermessages` .`userId` = `users`.`userId` 
            WHERE `usermessages`.`shop` = '$shop' 
            AND `direction` = '1' 
            ORDER BY `messId` DESC LIMIT 0,5";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
        ?>
        <a href="#" id="adminMessall<?php echo $row[0]?>" class="w3-bar-item w3-button <?php echo $colors[$row[6]]?>"><strong><?php echo $row[9]." ".$row[10] ?></strong> <br><small><?php echo $row[3] ?></small>
        <br><small><i class="fa fa-calendar"></i> <?php echo $row[4] ?></small>
        </a>
        <script>
            $("#adminMessall<?php echo $row[0]?>").click( function(hdmi){
                $.post("adminfunctions/userContact.php",
                       "userId=<?php echo $row[1]?>&adminid=<?php echo $shop?>",
                        function(returns){
                            $("#ordersContainer").html(returns);
                        })
            });
         </script>
        <?php
    }
    
}
?>
<a href="#" class="w3-bar-item w3-button" id="MESS_SEE_ALL"> see all </a>
<script>
    $("#MESS_SEE_ALL").click( function(ew){
        ew.preventDefault();
        $("#ordersContainer").load("adminfunctions/messages_all_times.php");
    });
</script>