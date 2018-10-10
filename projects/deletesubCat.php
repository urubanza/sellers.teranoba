<?php
include("../functions/conne.php");
   if(isset($_POST['CCC'])){
      $catId =  $_POST['CCC'];
      $Id =  $_POST['id'];
      $sql = "DELETE FROM `projects` WHERE `projects`.`news_id` = $catId";
      $result = mysqli_query($conn,$sql);
       if($result){
?>
<script>
    $("#pipNavCaregory<?php echo $Id ?> a").click();
</script>
<?php
   } 
}
?>