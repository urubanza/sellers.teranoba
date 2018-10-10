<?php
include_once '../../functions/conne.php';
     if(isset($_POST["cv"])){
         $userId = $_POST["cv"];
         $admId = $_POST["adminid"];
         $sql = "SELECT * FROM `usermessages` WHERE `userId` = $userId AND `shop` = $admId AND `seen1` = 0";
         $res = mysqli_query($conn,$sql);
         $nums = mysqli_num_rows($res);
         echo $nums;
     }
?>