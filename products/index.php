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
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/styles.css" rel="stylesheet">
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
  <script src="../assets/js/jquery-1.10.2.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
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
<body  style="background-image:url(../assets/img/bruno-abatti.jpg)">
    
<?php
include("../functions/conne.php");

   if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` WHERE `userId` = $userId";
       $result = mysqli_query($conn,$sql);
       $SellerDets = mysqli_fetch_array($result,MYSQLI_ASSOC);
       include("menu.php");
       $productId = 0;
       if(isset($_GET["fileId"])){
           $productId = $_GET["fileId"];
           $productId = intval($productId);
           $productId = $productId/111;
           $productId  = $productId - 5;
       }
?>
<div class="container">
   <?php
     $sql0 = "SELECT `shopId` FROM `shopusers` WHERE `shopusers`.`userId` = '$userId'";
     $res = mysqli_query($conn,$sql0);
     $shopId = mysqli_fetch_array($res)[0];
     $sql = "SELECT * FROM `products` INNER JOIN `categories` ON `products`.`productCategory` = `categories`.`id` WHERE `products`.`shop` = '$shopId' AND `productId` = '$productId'";
     $res = mysqli_query($conn,$sql);
     $nums = mysqli_num_rows($res);
     $status = array("NO","YES");
     $status_class = array("alert-danger","alert-success");
     $status_class_btn = array("btn-success","btn-danger");
     $status_btn_text = array("ON","OFF");
     
   ?>
   
    
      <?php
      $numbering = 1;
      $currency = array("RWF","USD");
      while($rows = mysqli_fetch_array($res,MYSQLI_BOTH))
      {
      ?>

      <a href="edit/?fiId=<?php echo ($rows['productId']+5)*111 ?>" type="button" class="btn btn-success"> edit this product icon </a>
      <a href="delete/?fiId=<?php echo ($rows['productId']+5)*111 ?>" type="button" class="btn btn-danger"> Delete this  product </a>
    
      <div style="background-color:white">
          <div class="media-left media-top">
            <img src="<?php echo $rows['productIcon']?>" class="media-object" style="width:60px">
          </div>
          <div class="media-body">
            <h4 class="media-heading"> <strong>Title: </strong><?php echo $rows['productName']?></h4>
            <p>Date added :<?php echo $rows['dateAdded']?></p>
            <p> <strong> Product informations: </strong> <?php echo $rows['notes']?> <a href="edit/?type=textArea&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=notes" type="button" class="btn btn-info btn-xs"> Change </a></p>
          </div>
        </div>
        <div class="well well-sm"><h4 style="text-align:center;"> Product Price :</h4> <p style="text-align:center"><?php echo $rows['productPrice']?> <a href="edit/?type=text&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=productPrice" type="button" class="btn btn-info btn-xs"> Change </a> </p></div>
        <div class="well well-sm"><h4 style="text-align:center;"> Product Promotion :</h4> <p style="text-align:center"> <?php echo $rows['promotion']?> <a href="edit/?type=text&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=promotion" type="button" class="btn btn-info btn-xs"> Change </a> </p></div>
        <div class="well well-sm"><h4 style="text-align:center;"> Available Quantity :</h4> <p style="text-align:center"> <?php echo $rows['quantity']?> <a href="edit/?type=text&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=quantity" type="button" class="btn btn-info btn-xs"> Change </a> </p></div>
        <div class="well well-sm"><h4 style="text-align:center;"> Product Currency :</h4> <p style="text-align:center"> <?php echo $currency[$rows['currency']]?> <a href="#" type="button" class="btn btn-info btn-xs"> Change </a></p></div>
        <div class="well well-sm"><h4 style="text-align:center;"> Product Categorie :</h4> <p style="text-align:center"> <?php echo $rows['name']?> <a href="edit/?type=list&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=productCategory&parent=categories&fieldToSelect=name" type="button" class="btn btn-info btn-xs"> Change </a></p></div>
        <div class="well well-sm"><h4 style="text-align:center;"> Product Description :</h4> <p style="text-align:justify"> <?php echo $rows['productDescription']?> <a href="edit/?type=textArea&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=productDescription" type="button" class="btn btn-info btn-xs"> Change </a></p></div>
        <div class="well well-sm">Special status : <span class="alert <?php echo $status_class[$rows['special']]?>"><?php echo $status[$rows['special']] ?></span>
           <?php
              if($SellerDets["type"]="admin"){
                  /*
                  ========================================================================================================================= past link of this was edit/?type=boolean&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=special&current=<?php echo $rows['special']?>
                  ===========================================================================================================================
                  */
           ?>
                        <a href="edit/?type=boolean&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=special&current=<?php echo $rows['special']?>" type="button" class="btn <?php echo $status_class_btn[$rows['special']] ;?> btn-xs"> <?php echo $status_btn_text[$rows['special']] ;?> </a>
        <?php
              }
        ?>
        </div>
        <div class="well well-sm">Slides status : <span class="alert <?php echo $status_class[$rows['slides']]?>"><?php echo $status[$rows['slides']]?></span>
        <?php
              if($SellerDets["type"]="admin"){
                  /*
                  ========================================================================================================================= past link of this was edit/?type=boolean&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=slides&current=<?php echo $rows['slides']?>
                  ===========================================================================================================================
                  */
           ?>
                        <a href="edit/?type=boolean&fId=<?php echo ($rows['productId']+5)*111?>&fieldName=slides&current=<?php echo $rows['slides']?>" type="button" class="btn <?php echo $status_class_btn[$rows['slides']] ;?> btn-xs"> <?php echo $status_btn_text[$rows['slides']] ;?></a>
        <?php
              }
        ?>
        </div>
    <?php
    $numbering++;
      }
    ?>
</div><br>
<br><br>
<?php
   }
   else {
?>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 login_bg">
			<h2><?php echo $error_message; ?></h2>
			<form method="POST" action="">
				<div class="form-group">
					<input type="text" placeholder="User Email" name="login_user_name" id="login_user_name" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="text" placeholder="User Password" name="login_user_password" id="login_user_password" class="form-control" required>
				</div> 
				<input type="submit" name="login_btn" id="login_btn" class="btn btn-block login_btn btn-warning" value="Login"/>
			</form>
		</div>
	</div>
</div>
<?php
}

?>

</body>
</html>
