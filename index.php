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
  <link rel="shortcut icon" href="assets/img/newLogo.png"/>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet">
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
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
<body style="background-image:url(assets/img/bruno-abatti.jpg)">
    
<?php
include("functions/conne.php");
if(isset($_POST["login_user_name"])){
      $login_user_name = $_POST["login_user_name"];
      $login_user_password = $_POST["login_user_password"];
      
      // To protect from MySQL injection

    $email = stripslashes($login_user_name);
    $password = stripslashes($login_user_password);
    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn, $password);
    //$password = md5($password);
    $sql = "SELECT `userId`,`type` FROM `users` WHERE `email`='$email' AND `password`='$password'";
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
       include("modules/menu.php");
?>
<div class="container" style="height:400px; overflow-y:scroll;">
   <?php
     $sql0 = "SELECT * FROM `shopusers` WHERE `userId` = $userId";
     $res = mysqli_query($conn,$sql0);
     $shopId = mysqli_fetch_array($res)[2];
     $shopName = mysqli_fetch_array(mysqli_query($conn,"SELECT `shopName` FROM `shops` WHERE `id` = $shopId"))[0];
     $sql = "SELECT * FROM `products` WHERE `products`.`shop` = $shopId";
     $res = mysqli_query($conn,$sql);
     $nums = mysqli_num_rows($res);
     $status = array("NO","YES");
     $status_class = array("alert-danger","alert-success");
   ?>
 <div  style="background-color:white; padding:10px; box-shadow:0 0 30px black; border-radius:20px">
   <div class="alert alert-info">
      <strong><?php echo $nums ?>(s) total products found  in <?php echo $shopName ?> shop </strong>
    </div>
   <a href="add/" type="button" class="btn btn-warning"><i class="fa fa-plus"></i> add a product </a>
    <table class="table">
      <thead>
      <tr>
        <th> # </th>
        <th> Title </th>
        <th> icon </th>
        <th> Default price </th>
        <th> view details </th>
        <th> Slides </th>
        <th> Special </th>
      </tr>
    </thead>
      <?php
      $numbering = 1;
      while($rows = mysqli_fetch_array($res,MYSQLI_BOTH))
      {
      ?>
      <tr>
        <td><?php echo $numbering ?></td>
        <td><?php echo $rows['productName'] ?></td>
        <td><img src="<?php echo $rows['productIcon']?>" class="img-responsive" width="50" alt="Image"></td>
        <td><?php echo $rows['productPrice']?> Frw</td>
        <td>
            <a href="products/?fileId=<?php echo ($rows['productId']+5)*111?>" type="button" class="btn btn-info"><i class="fa fa-reorder"></i> </a>
            <a href="products/delete/?fiId=<?php echo ($rows['productId']+5)*111?>" type="button" class="btn btn-danger">
                <i class="fa fa-trash"></i>
            </a>
        </td>
        <td><span class="alert <?php echo $status_class[$rows['slides']]?>"><?php echo $status[$rows['slides']]?></span></td>
        <td><span class="alert <?php echo $status_class[$rows['special']]?>"><?php echo $status[$rows['special']] ?></span></td>
      </tr>
    <?php
    $numbering++;
      }
    ?>
    </table>
    <a href="add/" type="button" class="btn btn-warning"><i class="fa fa-plus"></i></a>
</div><br>
<br><br>
</div>
<?php
   }
   else {
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-sm-offset-4 login_bg">
			<h1>.</h1>
            <h1>.</h1>
            <h1>.</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 login_bg"   style="background-color:white; padding:10px;">
			<h2 style=" text-align:center"><img src="assets/img/newLogo.png" width="50"><?php echo $error_message; ?></h2>
			<form method="POST" action="">
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
<script>
    function realTime(){
              $("#realtimeOrder").load("realtimeOrder.php");
              $("#messages_real_time").load("adminfunctions/admin_all_messages.php");
              $("#notifications_real_time").load("adminfunctions/admin_all_notification.php");
              $(".number_of_messages").load("adminfunctions/admini_number_of_messages.php");
              $(".number_of_notification").load("adminfunctions/number_of_notification.php");
              $.post("reatimeCart.php",
                    "vv=<?php echo $hopId?>",
                    function(realThee){
                        $("#reatimeCart").html(realThee);
                    });
              setTimeout(function(){ 
                    realTime();    
                         },3000);
            }
     //realTime();
</script>
</body>
</html>
