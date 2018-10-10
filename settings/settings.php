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
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
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
<body>
    
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
<script>
    var loading = new Image();
    var loading_small = new Image();
    loading.src = "../img/loader.gif";
    loading_small.src = "../img/loader.gif";
    loading.style.width = "30%";
    loading_small.style.width = "10%";
    loading.style.margin = "auto";
</script>
<div class="container">
   <?php
   
     $sql0 = "SELECT * FROM `users` WHERE `userId` = $userId";
     $res = mysqli_query($conn,$sql0);
     
     $shopId = mysqli_fetch_array($res)[7];
     
     $sql = "SELECT * FROM `shops` WHERE `shops`.`id` = '$shopId'";
     $res = mysqli_query($conn,$sql);
     
     $shopId = "";
     $shopName = "";
     $shopImg = $row[1];
     
     while($row = mysqli_fetch_array($res)){
         $shopId = $row[0];
         $shopName = $row[1];
         $shopImg = $row[4];
     }
     
   ?>
    <div class="row">
      <div class="col-sm-4" style="padding:10px;"><div style="background-color:#2196F3; color:#fff; padding:10px"><h5> <strong>first name:</strong> <?php echo $SellerDets["fname"]?> </h5> <button id="fname" type="button" class="btn btn-warning btn-xs changeName"> change</button><div id="editfname"></div></div></div>
      <div class="col-sm-4" style="padding:10px;"><div style="background-color:#2196F3; color:#fff; padding:10px"><h5> last name: <?php echo $SellerDets["lname"]?> </h5> <button type="button" id="lname"  class="btn btn-warning btn-xs changeName"> change</button><div id="editlname"></div></div></div>
      <div class="col-sm-4" style="padding:10px;"><div style="background-color:#2196F3; color:#fff; padding:10px"><h5> Shop: <img src="<?php echo $shopImg ?>" class="img-circle"  style="width:10%;"></h5> <button id="shops" type="button" class="btn btn-warning btn-xs changePic"> change</button> <div id="editshops"></div></div></div>
      <div class="col-sm-4" style="padding:10px;"><div style="background-color:#2196F3; color:#fff; padding:10px"><h5> Email: <?php echo $SellerDets["email"]?> </h5> <button id="email" type="button" class="btn btn-warning btn-xs changeName"> change</button><div id="editemail"></div></div></div>
      <div class="col-sm-4" style="padding:10px;"><div style="background-color:#2196F3; color:#fff; padding:10px"><h5> <button type="button" id="password" class="btn btn-warning btn-xs changeName"> change password</button> </h5><div id="editpassword"></div></div></div>
      <div class="col-sm-4" style="padding:10px;"><div style="background-color:#2196F3; color:#fff; padding:10px"><h5>
          Profile Pic: <img src="<?php echo $SellerDets["profilePicture"] ?>" class="img-circle"  style="width:10%;"></h5> <button id="users" type="button" class="btn btn-warning btn-xs changePic"> change</button> <div id="editusers"></div> </div></div>
    </div>
</div><br>
<br><br>
<script>
    $(".changeName").click( function( ev){
        ev.preventDefault();
        var idsx = $(this).attr("id");
        $("#edit"+idsx).html(loading_small);
        $.post("editText.php",
               "field="+idsx,
               function(xxx){
                  $("#edit"+idsx).html(xxx); 
               })
    })
    
    $(".changePic").click( function( ev){
        ev.preventDefault();
        var idsx = $(this).attr("id");
        $("#edit"+idsx).html(loading_small);
        $.post("editPic.php",
               "field="+idsx,
               function(xxx){
                  $("#edit"+idsx).html(xxx); 
               })
    })
</script>
<?php
   }
   else {
?>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 login_bg">
			<h2><?php echo $error_message; ?></h2>
			<form method="POST" action="../sellers/">
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
