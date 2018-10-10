<?php
  session_start();
  $error_message = "fill this form to add a product";
   $error_message2 = "";
   $fileName = "dfdfd";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> teranoba sellers-add a page </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link href="../../assets/css/styles.css" rel="stylesheet">
  <link rel="shortcut icon" href="../../assets/img/newLogo.png"/>
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
<body style="background-image:url(../../assets/img/bruno-abatti.jpg)">
    
<?php
include("../../functions/conne.php");
if(isset($_POST["shopName"])){
    $shopName = $_POST["shopName"];
    $icon = $imgUrls."shops.png";
    $sql = "INSERT INTO `shops` (`id`,
                                 `shopName`,
                                 `dateAdded`,
                                 `shopIcon`) 
                                 VALUES (NULL,
                                        '$shopName',
                                        CURRENT_TIMESTAMP,
                                        '$icon')";
            $res = mysqli_query($conn,$sql);
            if($res){
                ?>
                <script>
                    window.location = "../../shops/"
                </script>
                <?php
            }
    
    
}
   if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` WHERE `userId` = $userId";
       $result = mysqli_query($conn,$sql);
       $SellerDets = mysqli_fetch_array($result,MYSQLI_ASSOC);
       include("menu.php");
?>

<div  class="container" style="background-color:#fff;">
    <div class="alert alert-warning">
      <h1> add a shop </h1>
    </div>
    
   <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="email"> shop name :</label>
        <input type="text" class="form-control" name="shopName" id="" required>
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
