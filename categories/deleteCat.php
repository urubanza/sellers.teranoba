<?php
include("../functions/conne.php");
   if(isset($_POST['CCC'])){
      $catId =  $_POST['CCC'];
      $sql = "DELETE FROM `categories` WHERE `categories`.`id` = $catId";
      $result = mysqli_query($conn,$sql);
       if($result){
?>
<script>
    window.location = '../categories/';
    //$('#add').click();
</script>
<?php
   } 
}
?>
