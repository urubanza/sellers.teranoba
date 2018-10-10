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
  <link rel="shortcut icon" href="../../assets/img/newLogo.png"/>
  <link href="../../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link href="../../assets/css/styles.css" rel="stylesheet">
  <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
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
<body  style="background-image:url(../../assets/img/bruno-abatti.jpg)">
    
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

<div class="container" style="background-color:white">
    <div class="alert alert-warning">
      <h1> add a seller </h1>
    </div>
    <?php
    if(isset($_POST["fname"])){
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];
                $shop = $_POST["shop"];
                $password = "123456789";
                $icon = $imgUrls."users.png";
                $type = "seller";
        //shopusers '$shop'
                $sql = "INSERT INTO `users` (`userId`,`fname`,`lname`,`email`,`password`,`profilePicture`,`type`) 
                                     VALUES (NULL,'$fname','$lname','$email','$password','$icon','$type')";
                        $res = mysqli_query($conn,$sql);
                        if($res){
                            $insertId = mysqli_insert_id($conn);
                            $sql = "INSERT INTO `shopusers` (`id`,`userId`,`shopId`,`dateAdded`) 
                                    VALUES (NULL,'$insertId','$shop',CURRENT_TIMESTAMP)";
                            $res = mysqli_query($conn,$sql);
                            if($res){   
                                 ?>
                            <script>
                                alert('new seller has been added');
                                window.location = "../";
                            </script>
                            <?php 
                            }
                            else echo "<h1 style='color:red'> nope ".mysqli_error($conn)." </h1>";
                        }
                        else echo "<h1 style='color:red'> nope ".mysqli_error($conn)." </h1>";


            }
       
       ?>
    
   <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="email"> first name : </label>
        <input type="text" class="form-control" name="fname" id="" required>
      </div>
      <div class="form-group">
        <label for="email"> last name : </label>
        <input type="text" class="form-control" name="lname" id="" required>
      </div>
      <div class="form-group">
        <label for="email"> Email : </label>
        <input type="email" class="form-control" name="email" id="" required>
      </div>
      <div class="form-group">
        <label for="email"> choose a shop( currently): </label>
        <select class="form-control" name="shop">
            <?php
             $sql = "SELECT * FROM `shops`";
             $result = mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
             {
            ?>
            <option value="<?php echo $row["id"] ?>"><?php echo $row["shopName"] ?></option>
            <?php
             }
            ?>
        </select>
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
