<?php
  session_start();
  $error_message = "edit this field";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> teranoba sellers page </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/img/newLogo.png"/>
  <link href="../../assets/css/bootstrap.css" rel="stylesheet">
  <script src="../../assets/js/jquery-1.10.2.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
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

   if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` WHERE `userId` = $userId";
       $result = mysqli_query($conn,$sql);
       $SellerDets = mysqli_fetch_array($result,MYSQLI_ASSOC);
       include("menu.php");
       if(isset($_GET["fId"])){
           $productId = $_GET["fId"];
           $productId = intval($productId);
           $productId = $productId/111;
           $productId  = $productId - 5;
           
           $type = $_GET["type"];
           $fieldName = $_GET["fieldName"];
           $sql = "SELECT `$fieldName` FROM `products` WHERE `productId` = '$productId'";
           $ress = mysqli_query($conn,$sql);
           $existingValue = mysqli_fetch_array($ress)[0];
           if($type=="text"){
               ?>
               <div class="container">
                  <div class="row">
                		<div class="col-sm-4 col-sm-offset-4 login_bg">
                			<h2><?php echo $error_message; ?></h2>
                			<form method="POST" action="">
                				<div class="form-group">
                					<input type="text" placeholder=" Change the field " name="text_to_edit" value="<?php echo $existingValue ?>"  class="form-control" required>
                					<input type="text" placeholder=" Change the field " name="field_to_edit" value="<?php echo $fieldName?>"  class="form-control" style="display:none;">
                					<input type="text" placeholder=" Change the field " name="value_id" value="<?php echo $productId?>"  class="form-control" style="display:none;">
                				</div> 
                				<input type="submit" name="login_btn" id="login_btn" class="btn btn-block login_btn btn-warning" value="Save"/>
                			</form>
                		</div>
                	</div>
                </div>
               <?php 
           }
           else if($type=="list"){
               $parent = $_GET["parent"];
               $fieldToSelect = $_GET["fieldToSelect"];
               $sql = "SELECT * FROM `$parent`";
               $res = mysqli_query($conn,$sql);
               ?>
               <div class="container">
                  <div class="row">
                		<div class="col-sm-4 col-sm-offset-4 login_bg">
                			<h2><?php echo $error_message; ?></h2>
                			<form method="POST" action="">
                				<div class="form-group">
                				    <select class="form-control" name="text_to_edit">
                				        <?php
                				          while($rows = mysqli_fetch_array($res,MYSQLI_BOTH)){
                				        ?>
                				        <option value="<?php echo $rows[0]?>"><?php echo $rows[$fieldToSelect]?></option>
                				        <?php
                				          }
                				        ?>
                				    </select>
                					<input type="text" placeholder=" Change the field " name="field_to_edit" value="<?php echo $fieldName?>"  class="form-control" style="display:none;">
                					<input type="text" placeholder=" Change the field " name="value_id" value="<?php echo $productId?>"  class="form-control" style="display:none;">
                				</div> 
                				<input type="submit" name="login_btn" id="login_btn" class="btn btn-block login_btn btn-warning" value="Save"/>
                			</form>
                		</div>
                	</div>
                </div>
               <?php 
           }
           else if($type=="textArea"){
               $sql = "SELECT `$fieldName` FROM `products` WHERE `productId` = '$productId'";
               $ress = mysqli_query($conn,$sql);
               $existingValue = mysqli_fetch_array($ress)[0];
               ?>
               <div class="container">
                  <div class="row">
                		<div class="col-sm-4 col-sm-offset-4 login_bg">
                			<h2><?php echo $error_message; ?></h2>
                			<form method="POST" action="">
                				<div class="form-group">
                				    <label for="comment"> product description :</label>
                                    <textarea class="form-control" rows="5" id="comment" name="text_to_edit"><?php echo $existingValue ?></textarea>
                					<input type="text" placeholder=" Change the field " name="field_to_edit" value="<?php echo $fieldName?>"  class="form-control" style="display:none;">
                					<input type="text" placeholder=" Change the field " name="value_id" value="<?php echo $productId?>"  class="form-control" style="display:none;">
                				</div> 
                				<input type="submit" name="login_btn" id="login_btn" class="btn btn-block login_btn btn-warning" value="Save"/>
                			</form>
                		</div>
                	</div>
                </div>
               <?php 
           }
           else if($type=="boolean"){
               $newValue = $_GET["current"];
               if($newValue){
                  $newValue = 0; 
               }
               else $newValue = 1; 
               $sql = "UPDATE `products` SET `$fieldName` = '$newValue' WHERE `products`.`productId` = '$productId'";
               $ress = mysqli_query($conn,$sql);
               if($ress){
                   ?>
                   <script>
                        window.location = "../?fileId=<?php echo ($value_id+5)*111?>";
                       //window.location = "../../../?fileId=<?php echo ($value_id+5)*111?>";
                       //document.location = "https://www.teranoba.com/sellers/products/?fileId=<?php echo ($productId+5)*111?>";
                   </script>
                   <?php
               }
           }
       }
       
       if(isset($_GET["fiId"])){
           $productId = $_GET["fiId"];
           $productId = intval($productId);
           $productId = $productId/111;
           $productId  = $productId - 5;
           ?>
               <div class="container">
                  <div class="row">
                		<div class="col-sm-4 col-sm-offset-4 login_bg">
                			<h2><?php echo $error_message; ?></h2>
                			<form method="POST" enctype="multipart/form-data">
                				<div class="form-group">
                				    <label for="comment"> product icon(150x200) :</label>
                				    <input type="file" name="productIcon" required>
                					<input type="text" placeholder=" Change the field " name="value_id_img" value="<?php echo $productId?>"  class="form-control" style="display:none;">
                				</div> 
                				<input type="submit" name="login_btn" id="login_btn" class="btn btn-block login_btn btn-warning" value="Save"/>
                			</form>
                		</div>
                	</div>
                </div>
               <?php 
       }
       
       
       
       if(isset($_POST["value_id_img"])){
           $productId = $_POST["value_id_img"];
           include("../../functions/fileUpload.php");
           $mypic = new uploadImage("productIcon");
           if($mypic->upload('../../img/',600000000,150,200)){
                    $icon = $imgUrls.$mypic->newName;
                    $sql = "UPDATE `products` SET `productIcon` = '$icon' WHERE `products`.`productId` = '$productId'"; 
                   //echo $sql;
                    $res = mysqli_query($conn,$sql);
                    if($res){
                    ?>
                    <script>
                       window.location = "../../";
                       //document.location = "https://www.teranoba.com/sellers/products/?fileId=<?php echo ($productId+5)*111?>";
                   </script>
                    <?php
                    } 
                    //echo "The file ". basename( $_FILES["productIcon"]["name"]). " has been uploaded.";
                } else {
                   
                }
            }
       
       
       
       
       if(isset($_POST["text_to_edit"])){
           $text_to_edit = $_POST["text_to_edit"];
           $field_to_edit = $_POST["field_to_edit"];
           $value_id = $_POST["value_id"];
           $sql = "UPDATE `products` SET `$field_to_edit` = '$text_to_edit' WHERE `products`.`productId` = '$value_id'";
           $ress = mysqli_query($conn,$sql);
           if($ress){
               ?>
               <script>
                   window.location = "../?fileId=<?php echo ($value_id+5)*111?>";
                   //document.location = "https://www.teranoba.com/sellers/products/?fileId=<?php echo ($value_id+5)*111?>";
               </script>
               <?php
           }
           
           
       }
?>

<?php
   }
?>

</body>
</html>
