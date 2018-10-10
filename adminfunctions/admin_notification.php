<?php
session_start();
include_once '../../functions/conne.php';
if(isset($_SESSION["sellers"])){
    $adminid =  $_SESSION["sellers"];
    $sql = "SELECT `shop` FROM `users` WHERE `userId` = '$adminid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    $shop = $row[0];
    $sql = "SELECT * FROM `noti` INNER JOIN `users` ON `noti`.`not_client` = `users`.`userId` WHERE `not_admin` = '$shop' AND `noti`.`direction` = '1' ORDER BY `noti`.`not_id` DESC LIMIT 0,5";
    $resul = mysqli_query($conn,$sql);
    $colors = array("w3-green","w3-white");
    $datas = array("name","demo");
    ?>
    <ul class="w3-ul w3-red">
    <?php
    while($row=mysqli_fetch_array($resul)){
        
          ?>
         <li class="adminMess <?php echo $colors[$row[7]]?>" style="cursor:pointer;" id="adminNot<?php echo $row[0]?>" ><span class="w3-badge w3-green w3-margin-left" id="userNot<?php echo $row[0]?>"></span>
         <a href="page.php?<?php echo $datas[$row[5]]."=".$row[2]?>" style="text-decoration:none;"> <?php  echo $row[9]." ".$row[10]." ".$row[1] ?></a></li>
          <?php
    }
    ?>
    </ul>
    <?php
}
?>
