<?php
include("../functions/conne.php");
   if(isset($_POST['subcatname'])){
       $subcatname = $_POST['subcatname'];
       $descr = $_POST['subdescription'];
       $categorieId = $_POST['catId'];
      
      $sql = "INSERT INTO 
                `subcategories` (`cat_id`, `name`, `descr`, `categorieId`) 
                VALUES (NULL, '$subcatname', '$descr', '$categorieId')";
      $result = mysqli_query($conn,$sql);
       if($result){
            ?><script>
                   $("#pipNavCaregory<?php echo $categorieId?> a").click();
            </script>
            <?php
     } 
}
?>
