<?php
include("../functions/conne.php");
   if(isset($_POST['CCC'])){
      $catId =  $_POST['CCC'];
      $Id =  $_POST['id'];
      $sql = "SELECT * FROM `subcategories` WHERE `subcategories`.`cat_id` = $catId";
      $result = mysqli_query($conn,$sql);
       if($rows = mysqli_fetch_array($result)){
?>
        <form method="POST" enctype="multipart/form-data" id="saveCategory" style="background-color:#34ff45">
          <div class="form-group">
            <label for="email"> name:</label>
            <input type="text" class="form-control" name="catnames" value="<?php echo $rows[1] ?>"  required>
          </div>
          <div class="form-group">
            <label for="email"> description: </label>
            <textarea name="description" class="form-control">
                 <?php echo $rows[2] ?>
            </textarea>
          </div>
            <input type="text" class="form-control" name="catId" value="<?php echo $catId ?>" style="display:none;">
            <input type="text" class="form-control" name="id" value="<?php echo $Id ?>" style="display:none;">
          <button type="submit" class="btn btn-info"> save </button>
        </form>
        <script>
           $("#saveCategory").submit( function(examples){
               examples.preventDefault();
               var datas = $("#saveCategory").serialize();
               $("#subcatDISP<?php echo $catId ?>").html(loading_small);
               //$("#categoriesStatus").html(loading_small);
                  $.post("editSubCategorie.php",
                         datas,
                      function(reterne){
                          $("#categoriesStatus").html(reterne);
                      });
           })
        </script>
<?php
   } 
}

if(isset($_POST['catnames'])){
    $catnames = $_POST['catnames'];
    $descr = $_POST['description'];
    $catId = $_POST['catId'];
    $Id =  $_POST['id'];
    $sql= "UPDATE `subcategories` SET `name` = '$catnames', 
           `descr` = '$descr'  WHERE `subcategories`.`cat_id` = $catId";
   $result = mysqli_query($conn,$sql);
   echo mysqli_error($conn);
    if($result){
             ?>
<script>
   $("#pipNavCaregory<?php echo $Id?> a").click();
</script>
<?php
    }
    
}
?>
