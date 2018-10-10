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
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/styles.css" rel="stylesheet">
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
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
    a.pipGrid{
        text-decoration:none;
    }
  </style>
</head>
<body   style="background-image:url(../assets/img/bruno-abatti.jpg)">
    
<?php
include("../functions/conne.php");
if(isset($_POST["login_user_name"])){
      $login_user_name = $_POST["login_user_name"];
      $login_user_password = $_POST["login_user_password"];
      
      // To protect from MySQL injection

    $email = stripslashes($login_user_name);
    $password = stripslashes($login_user_password);
    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn, $password);
    $password = md5($password);
    $sql = "SELECT `userId` FROM `users` WHERE `email`='$email' and `password`='$password'";
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    if($result){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
       //If username and password exist in our database then create a session.
       //Otherwise echo error.
       if(mysqli_num_rows($result) == 1)
       {
       $_SESSION['sellers'] = $row['userId'];
       $_SESSION['types'] = $row['type'];// Initializing Session
       }
       else $error_message = "Incorect username or password";
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
<div class="container">
   <?php
     $sql0 = "SELECT * FROM `users` WHERE `userId` = $userId";
     $res = mysqli_query($conn,$sql0);
     
     $shopId = mysqli_fetch_array($res)[7];
     
     $sql = "SELECT * FROM `shops` WHERE `shops`.`id` = '$shopId'";
     $res = mysqli_query($conn,$sql);
    
     
     $shopId = "";
     $shopName = "";
     
     while($row = mysqli_fetch_array($res)){
         $shopId = $row[0];
         $shopName = $row[1];
     }
     
     
     $sql1 = "SELECT `productId` FROM `products` WHERE `products`.`shop` = $shopId";
     $res = mysqli_query($conn,$sql1);
     
     
     $nums = mysqli_num_rows($res);
     $sql2 = "SELECT `userId` FROM `shopusers` WHERE `shopusers`.`shopId` = $shopId";
     
     $res = mysqli_query($conn,$sql2);
     $nums_of_same_shop = mysqli_num_rows($res);
     
     $sql3 = "SELECT * FROM `orders` WHERE `shop` = '$shopId'";
     $res = mysqli_query($conn,$sql3);
     $nums_of_order_shop = mysqli_num_rows($res);
     
     $sql4 = "SELECT * FROM `usermessages` WHERE `shop` = '$shopId' AND `seen1` = 0";
     $res = mysqli_query($conn,$sql4);
     $nums_of_mess_shop = mysqli_num_rows($res);
     
   ?>
    <div class="row">
      <div class="col-sm-4" style="padding:10px;"><a href="../" class="pipGrid"><div style="background-color:#2196F3; color:#fff; padding:10px"><h3><i class="fa fa-product-hunt" style="font-size:5em"></i> <span class="badge" style="font-size:2em"><?php echo $nums ?></span><br> product(s) from <?php echo $shopName ?> </h3></div></a></div>
      <div class="col-sm-4" style="padding:10px;"><a href="../settings/sellers.php" class="pipGrid"><div  style="background-color:#2196d3; color:#fff; padding:10px"><h3><i class="fa fa-users" style="font-size:5em"></i> <span class="badge" style="font-size:2em"><?php echo $nums_of_same_shop ?></span><br> seller(s) from  <?php echo $shopName ?> </h3></div> </a></div>
      <div class="col-sm-4" style="padding:10px;"><a href="#" class="pipGrid"><div  style="background-color:#2196b3; color:#fff; padding:10px"><h3><i class="fa fa-shopping-cart" style="font-size:5em"></i> <span class="badge" style="font-size:2em"><?php echo $nums_of_order_shop ?></span><br> order(s) for <?php echo $shopName ?> </h3></div> </a></div>
    </div>
    <div class="row">
      <div class="col-sm-4" style="padding:10px;"><a href="../page/?client=0&demo=0" class="pipGrid"><div  style="background-color:#2196b3; color:#fff; padding:10px"><h3><i class="fa fa-envelope" style="font-size:5em"></i> <span class="badge  realTMessage" style="font-size:2em"><?php echo $nums_of_mess_shop ?></span><br> new Message(s) </h3></div> </a> </div>
      <div class="col-sm-4" style="padding:10px;"><a href="../page/?client=0&demo=0" class="pipGrid"><div  style="background-color:#2196f3; color:#fff; padding:10px"><h3><i class="fa fa-bell" style="font-size:5em"></i> <span class="badge realTNotific" style="font-size:2em"></span><br> new notification(s) </h3></div></a></div>
      <div class="col-sm-4" style="padding:10px;"><a href="#" class="pipGrid"><div  style="background-color:#2196d3; color:#fff; padding:10px"><h3><i class="fa fa-cart-arrow-down" style="font-size:5em"></i> <span class="badge" style="font-size:2em"></span><br> total products sold </h3></div></a></div>
    </div>
    <div class="row">
      <div class="col-sm-4" style="padding:10px;"><a href="../settings/settings.php" class="pipGrid"><div  style="background-color:#2196F3; color:#fff; padding:10px"><h3><i class="fa fa-cogs" style="font-size:5em"></i><br> My Account </h3> </div> </a>  </div>
    </div>
</div><br>
<br><br>
<script>
            function realTime(){
                      $(".realTMessage").load("https://www.teranoba.com/sellers/adminfunctions/admini_number_of_messages.php");
                      $(".realTNotific").load("https://www.teranoba.com/sellers/adminfunctions/number_of_notification.php");
                      setTimeout(function(){ 
                            realTime();    
                                 },3000);
                    }
             //realTime();
             //realTime();
        </script>
<?php
   }
   else {
?>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 login_bg">
			<h2><?php echo $error_message; ?></h2>
			<form method="POST" action="https://www.teranoba.com/sellers/">
				<div class="form-group">
					<input type="text" placeholder="User Email" name="login_user_name" id="login_user_name" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" placeholder="User Password" name="login_user_password" id="login_user_password" class="form-control" required>
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
