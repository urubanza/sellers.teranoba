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
    $datas = array("name","demo");
    $sql = "SELECT * FROM `noti` INNER JOIN `users` ON `noti`.`not_client` = `users`.`userId` WHERE `not_admin` = '$shop' AND `noti`.`direction` = '1' ORDER BY `noti`.`not_id` DESC LIMIT 0,5";
    $resul = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($resul)){
        ?>
        <a href="page.php?<?php echo $datas[$row[5]]."=".$row[2]?>" class="w3-bar-item w3-button <?php echo $colors[$row[7]] ?>"><strong><?php  echo $row[9]." ".$row[10]." ".$row[1] ?></a>
        <?php
    }
    
}
?>
<a href="#" class="w3-bar-item w3-button" id="NOTI_SEE_ALL"> see all </a>
<script>
    $("#NOTI_SEE_ALL").click( function(ew){
        ew.preventDefault();
        $("#ordersContainer").load("adminfunctions/notif_all_times.php");
    });
</script>