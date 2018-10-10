<?php
  session_start();
  $error_message = " fill this form to add a pub";
   $error_message2 = "";
   $fileName = "dfdfd";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> teranoba sellers-add a page </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../img/newLogo.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

    
<?php
include("../../functions/conne.php");
if(isset($_POST["link"])){
    $link = $_POST["link"];
    $position = $_POST["position"];
     /* staff abou product icon 
    ###################################################################################################################################################
    ###################################################################################################################################################
    */
    $target_dir = "img/";
    $target_file = $target_dir.basename($_FILES["icon"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $fileName = $target_file;
    
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["link"])) {
        $check = getimagesize($_FILES["icon"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ". in $target_file";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $error_message = "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $error_message = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    
    // Check file size
    if ($_FILES["icon"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $error_message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "GIF" && $imageFileType != "JPEG" && $imageFileType != "PNG" && $imageFileType != "JPG") {
        $error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error_message2 .= "your file was not uploaded.";
        //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
            $error_message = "The file ". basename( $_FILES["icon"]["name"]). " has been uploaded.";
            $sql = "INSERT INTO `pubs` (`pubid`, `link`, `icon`, `position`) VALUES (NULL, '$link', '$fileName', '$position')";
            $res = mysqli_query($conn,$sql);
            if($res){
                ?>
                <script>
                    //window.location = "../../pubs/"
                </script>
                <?php
            }
    
           $error_message2 .= "The file ". basename( $_FILES["icon"]["name"]). " has been uploaded.";
        } else {
            $error_message2 .="  Sorry, there was an error uploading your file.";
            //echo "Sorry, there was an error uploading your file.";
        }
    }
    
}
   if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` WHERE `userId` = $userId";
       $result = mysqli_query($conn,$sql);
       $SellerDets = mysqli_fetch_array($result,MYSQLI_ASSOC);
       include("menu.php");
       $pub_position = array("top","left","right");
?>

<div class="container">
    <div class="alert alert-warning">
      <h1><?php echo $error_message.$error_message2  ?></h1>
    </div>
    
   <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="email"> link :</label>
        <input type="text" class="form-control" name="link" id="" required>
      </div>
      <div class="form-group">
        <label for="email"> icon :</label>
        <input type="file" class="form-control" name="icon" id="" required>
      </div>
      <div class="form-group">
        <label for="email"> position :</label>
        <select class="form-control" name="position">
            <?php
            for($va = 0 ; $va<sizeof($pub_position); $va++){
            ?>
            <option value="<?php echo $va?>"><?php echo $pub_position[$va]?></option>
            <?php
            }
            ?>
        </select>
      </div>
      <button type="submit" class="btn btn-info"> add </button>
    </form>
</div><br>
<br><br>
<?php
   }
?>

</body>
</html>
