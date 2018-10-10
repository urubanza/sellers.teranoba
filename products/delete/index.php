<?php
  session_start();
  $error_message = "login first";
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
       include("menu.php");
       $productId = 0;
       if(isset($_GET["fiId"])){
           $productId = $_GET["fiId"];
           $productId = intval($productId);
           $productId = $productId/111;
           $productId  = $productId - 5;
           $sql = "DELETE FROM `products` WHERE `products`.`productId` = $productId";
           $result = mysqli_query($conn,$sql);
               if($result){
                   ?>
                   <script>
                        window.location = "../../";
                   </script>
                   <?php
               }  
           }
       }
?>
<div class="container">
   
</div>
</body>
</html>
