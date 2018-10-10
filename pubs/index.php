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
<body   style="background-image:url(../assets/img/bruno-abatti.jpg)">
    
<?php
include("../functions/conne.php");
   if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` WHERE `userId` = $userId";
       $result = mysqli_query($conn,$sql);
       $SellerDets = mysqli_fetch_array($result,MYSQLI_ASSOC);
       include("menu.php");
?>
<div class="container" style="background-color:#fff;  padding:10px; box-shadow:0 0 30px black; border-radius:20px">
   <?php
     $sql = "SELECT * FROM `shops` WHERE `shops`.`admin` = '$userId'";
     $res = mysqli_query($conn,$sql);
     $shopId = mysqli_fetch_array($res,MYSQLI_BOTH)[0];
     $sql = "SELECT * FROM `pubs`";
     $res = mysqli_query($conn,$sql);
     $nums = mysqli_num_rows($res);
     $pub_position = array("top","left","right");
   ?>
   <div class="alert alert-info">
      <strong><?php echo $nums ?>(s) total pub found </strong>
    </div>
   <a href="add/" type="button" class="btn btn-info"> add more pubs </a>
    <table class="table">
      <thead>
      <tr>
        <th> # </th>
        <th> link </th>
        <th> Icon </th>
        <th> position </th>
        <th> delete </th>
      </tr>
    </thead>
      <?php
      $numbering = 1;
      while($rows = mysqli_fetch_array($res,MYSQLI_BOTH))
      {
      ?>
      <tr>
        <td><?php echo $numbering ?></td>
        <td><a href="<?php echo $rows['link'] ?>"> visit <?php echo $rows['link'] ?> </a></td>
        <td><img src="add/<?php echo $rows['icon'] ?>"  width="50" alt="<?php echo $rows['link'] ?>"></td>
        <td><?php echo $pub_position[$rows['position']]?></td>
        <td><a class="btn btn-danger" href="details/?us=<?php echo $rows["pubid"]?>&action=remo"> delete </a></td>
      </tr>
    <?php
    $numbering++;
      }
    ?>
    </table>
    <a href="add/" type="button" class="btn btn-info"> add more pubs </a>
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
