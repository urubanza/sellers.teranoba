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
  </style>
</head>
<body style="background-image:url(../assets/img/bruno-abatti.jpg)">
    
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
<div class="container" style="background-color:#fff; height:400px; overflow-y:scroll;">
   <?php
     $sql = "SELECT * FROM `shops` WHERE `shops`.`admin` = '$userId'";
     $res = mysqli_query($conn,$sql);
     $shopId = mysqli_fetch_array($res,MYSQLI_BOTH)[0];
     $sql = "SELECT * FROM `shops`";
     $res = mysqli_query($conn,$sql);
     $nums = mysqli_num_rows($res);
     $status = array("NO","YES");
     $status_class = array("alert-danger","alert-success");
   ?>
   <div class="alert alert-info">
      <strong><?php echo $nums ?>(s) total shop found </strong>
    </div>
   <a href="add/" type="button" class="btn btn-info"><i class="fa fa-plus"></i> add more shops </a>
    <table class="table">
      <thead>
      <tr>
        <th> # </th>
        <th> name </th>
        <th> Icon </th>
        <th> edit </th>
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
        <td><?php echo $rows['shopName'] ?></td>
        <td><img src="<?php echo $rows['shopIcon'] ?>" class="img-circle" width="50" alt="<?php echo $rows['shopName'] ?>"></td>
        <td><a class="btn btn-info ?> " href="details/?us=<?php echo $rows["id"]?>&action=edit"> <i class="fa fa-pencil"></i></a></td>
        <td><a class="btn btn-danger" href="details/?us=<?php echo $rows["id"]?>&action=remo"> <i class="fa fa-trash"></i></a></td>
      </tr>
    <?php
    $numbering++;
      }
    ?>
    </table>
    <a href="add/" type="button" class="btn btn-info"><i class="fa fa-plus"></i> add more shops </a>
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
