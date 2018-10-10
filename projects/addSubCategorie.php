<?php
include("../functions/conne.php");
include("../functions/fileUpload.php");
   if(isset($_POST['title'])){
       $mypic = new uploadImage("icon");
       if($mypic->upload('../img/',600000000,150,200)){
           $title = $_POST['title'];
           $subtitle = $_POST['subtitle'];
           $description = $_POST['description'];
           $catd = $_POST['catId'];
           $icon = $imgUrls.$mypic->newName;
           $sql = "INSERT INTO `projects` (`news_id`, `title`, `subtitle`, `contents`,`icon`,`categorie`,`dateup`) 
                    VALUES (NULL, '$title', '$subtitle', '$description','$icon','$catd',CURRENT_TIMESTAMP)";
               if(mysqli_query($conn,$sql)){
                    ?>
                    <script>
                           $("#pipNavCaregory<?php echo $categorieId?> a").click();
                    </script> 
                    <?php
             } else echo mysqli_error($conn);
           
       } else echo $mypic->imageFileType.'...  '.$mypic->error; 
}
?>
