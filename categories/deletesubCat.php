<?php
include("../functions/conne.php");
   if(isset($_POST['CCC'])){
      $catId =  $_POST['CCC'];
      $Id =  $_POST['id'];
      $sql = "DELETE FROM `subcategories` WHERE `subcategories`.`cat_id` = $catId";
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