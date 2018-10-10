<?php
session_start();
include_once '../functions/conne.php';
if(isset($_SESSION["sellers"])){
    $adminid =  $_SESSION["sellers"];
    $sql = "SELECT `shopId` FROM `shopusers` WHERE `userId` = '$adminid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    echo mysqli_error($conn);
    $shop = $row[0];
    $sql = "SELECT * FROM `usermessages` INNER JOIN `users` ON `usermessages` .`userId` = `users`.`userId` WHERE `usermessages`.`shop` = '$shop' AND `direction` = '1' AND `seen1` = '0'";
    $res = mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($res);
    echo $rowcount;
    
}
?>