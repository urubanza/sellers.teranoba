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
                $updates = "DELETE FROM `users` WHERE `users`.`userId` = '$userz'";
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
        
    
     $sql = "SELECT  `shopId`  FROM `shopusers` WHERE `shopusers`.`userId` = '$userId'";
     $res = mysqli_query($conn,$sql);
     $shopId = mysqli_fetch_array($res,MYSQLI_BOTH)[0];
     $sql = "SELECT * FROM `users` INNER JOIN `shopusers` ON `shopusers`.`shopId` = `shopusers`.`userId` INNER JOIN `shops` ON `shopusers`.`shopId` = `shops`.`id` WHERE `users`.`type` = 'seller' AND `shopusers`.`userId` = '$userz'";
     $res = mysqli_query($conn,$sql);
     $nums = mysqli_num_rows($res);
     echo mysqli_error($conn);
   ?>
    <table class="table">
      <thead>
      <tr>
        <th> <?php echo $action ?> </th>
        <th> First name </th>
        <th> Last name </th>
        <th> email </th>
        <th> Shop </th>
      </tr>
    </thead>
      <?php
      $numbering = 1;
      $fname = "";
      $lname = "";
      $email = "";
      while($rows = mysqli_fetch_array($res,MYSQLI_BOTH))
      {
            $fname = $rows['fname'];
            $lname = $rows['lname'];
            $email = $rows['email']; 
      ?>
      <tr>
        <td><?php echo $numbering ?></td>
        <td><?php echo $rows['fname']?></td>
        <td><?php echo $rows['lname']?></td>
        <td><?php echo $rows['email']?></td>
        <td><?php echo $rows['shopName']?></td>
      </tr>
    <?php
    $numbering++;
      }
    ?>
    </table>
			<form method="POST" action="">
				<div class="form-group">
				    <label> first name:</label>
					<input type="text" placeholder="User first name" name="login_user_fname" id="login_user_name" class="form-control" value="<?php echo $fname ?>" required>
				</div>
				<div class="form-group">
				    <label> last name:</label>
					<input type="text" placeholder="User last name" name="login_user_lname" id="login_user_password" class="form-control" value="<?php echo $lname ?>" required>
				</div> 
				<div class="form-group">
				    <label> email:</label>
					<input type="text" placeholder="Email" name="login_user_email" id="login_user_email" class="form-control" value="<?php echo $email ?>" required>
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
