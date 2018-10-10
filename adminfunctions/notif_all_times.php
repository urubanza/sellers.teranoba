<div class="w3-container w3-card w3-white w3-round w3-margin" style="padding:2em">
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
    $sql = "UPDATE `noti` SET `seen` = '1' WHERE `noti`.`not_admin` = '$shop'";
    $resul = mysqli_query($conn,$sql);
    $sql = "SELECT * FROM `noti` INNER JOIN `users` ON `noti`.`not_client` = `users`.`userId` WHERE `not_admin` = '$shop' AND `noti`.`direction` = '1' ORDER BY `noti`.`not_id` DESC";
    $resul = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($resul)){
        ?>
        <a  href="page.php?<?php echo $datas[$row[5]]."=".$row[2]?>" id="not_details" class="w3-bar-item w3-button <?php echo $colors[$row[7]] ?>" style="width:100%; border:1px solid #300; padding:3em;"><strong><?php  echo $row[9]." ".$row[10]." ".$row[1] ?></a>
        <br>
        <?php
    }
}
?>
</div>