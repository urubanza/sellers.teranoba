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
   if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` WHERE `userId` = $userId";
       $result = mysqli_query($conn,$sql);
       $SellerDets = mysqli_fetch_array($result,MYSQLI_ASSOC);
       include("menu.php");
?>
<div class="container" style="background-color:#fff;">
   <?php
     $userz = 1;
     $action = "edit";
     if(isset($_GET["us"])){
         $userz = $_GET["us"];
         if(isset($_GET["action"])){
             $action = $_GET["action"];
             if($action=="block"){
               $activated = "SELECT `activated` FROM `users` WHERE `userId` = '$userz'";
               $res = mysqli_query($conn,$activated);
               $activated = mysqli_fetch_array($res,MYSQLI_BOTH)[0];
               $activated = intval($activated);
               $value = 1;
               if($activated==1)
                 $value = 0;
               $updates = "UPDATE `users` SET `activated` = '$value' WHERE `users`.`userId` = '$userz'";
               $res = mysqli_query($conn,$updates);
               if($res){
                   ?>
                   <script>
                       window.location = "../"
                   </script>
                   <?php
               }
               
             }
             else if($action=="remo"){
                $updates = "DELETE FROM `shops` WHERE `shops`.`id` = '$userz'";
                $res = mysqli_query($conn,$updates);
                if($res){
                   ?>
                   <script>
                       window.location = "../"
                   </script>
                   <?php
               }
             }
             else if(isset($_POST["ShopName"])){
                 $new = $_POST["ShopName"];
                 $updates = "UPDATE `shops` SET `shopName` = '$new' WHERE `shops`.`id` = '$userz'";
                 $res = mysqli_query($conn,$updates);
                 if($res){
                   ?>
                   <script>
                       window.location = "../"
                   </script>
                   <?php
               }
             }
         }
     }
        
     $sql = "SELECT * FROM `shops` WHERE `id` = '$userz'";
     $res = mysqli_query($conn,$sql);
     $nums = mysqli_num_rows($res);
   ?>
    <table class="table">
      <thead>
      <tr>
        <th> # </th>
        <th> name </th>
        <th> Icon </th>
      </tr>
    </thead>
      <?php
      $numbering = 1;
      $shopName = "";
      while($rows = mysqli_fetch_array($res,MYSQLI_BOTH))
      {
            $shopName = $rows['shopName'];
      ?>
      <tr>
        <td><?php echo $numbering ?></td>
        <td><?php echo $rows['shopName']?></td>
        <td><img src="<?php echo $rows['shopIcon'] ?>" class="img-circle" width="50" alt="<?php echo $rows['shopName'] ?>"></td>
      </tr>
    <?php
    $numbering++;
      }
    ?>
    </table>
			<form method="POST" action="">
				<div class="form-group">
				    <label> shop name:</label>
					<input type="text" placeholder="User first name" name="ShopName" id="login_user_name" class="form-control" value="<?php echo $shopName ?>" required>
				</div>
				<input type="submit" name="login_btn" id="login_btn" class="btn btn-block login_btn btn-warning" value="Save"/>
			</form>
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
