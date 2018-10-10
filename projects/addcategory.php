<?php
   include("../functions/conne.php");
   include("../functions/fileUpload.php");
  if(isset($_POST['catname'])){ 
                   $mypic = new uploadImage("catImage");
                   if($mypic->upload('../img/',600000000,50,50)){
                     $catname = $_POST['catname'];
                     $descr = $_POST['description'];
                     $icons = $imgUrls.$mypic->newName;
                     $sql = "INSERT INTO `projects_categories` (`id`, `name`, `descr`, `icon`) VALUES (NULL,'$catname','$descr','$icons')";
                     $result = mysqli_query($conn,$sql);
                     if($result){
                                    ?>
                                    <script>
                                           window.location = '../projects';
                                    </script>
                                    <?php
                             }
                   }
                   else echo $mypic->imageFileType.'...  '.$mypic->error;
       }

?>