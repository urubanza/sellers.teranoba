<?php
session_start();
include_once '../functions/conne.php';
if(isset($_SESSION["sellers"])){
    $adminid =  $_SESSION["sellers"];
    $sql = "SELECT `shopId` FROM `shopusers` WHERE `userId` = '$adminid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    $shop = $row[0];
    $sql = "SELECT * FROM `noti` 
            INNER JOIN `users` ON `noti`.`not_client` = `users`.`userId` 
            WHERE `noti`.`not_admin` = '$shop' AND `direction` = '1' AND `seen` = '0'";
    $res = mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($res);
    echo $rowcount;
}
?>