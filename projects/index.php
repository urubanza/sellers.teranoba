<?php
  session_start();
  $error_message = "add a category";
   $error_message2 = "";
   $fileName = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> teranoba - manage projects </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/img/newLogo.png"/>
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/styles.css" rel="stylesheet">
  <link href="styles.css" rel="stylesheet">
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
if(isset($_POST["catname"])){
    $name = $_POST["catname"];
    $description = $_POST["description"];
    $sql = "INSERT INTO `categories` (`id`,
                                      `name`,
                                      `description`,
                                      `dateAdded`,
                                      `shop`) 
                                 VALUES (NULL,
                                        '$name',
                                        '$description',
                                         CURRENT_TIMESTAMP,
                                        1)";
    $res = mysqli_query($conn,$sql);
    if($res){
        ?>
    <script>
       window.location = '../categories/';
    </script>
    <?php
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
<div class="container" style="background:white">
    <div id='cssmenuYY'>
        <ul>
           <li class='active pipNavCaregory' id="pipNavCaregory0"><a href='#' id="add"> Add category </a></li>
            <?php
             $sql = "SELECT * FROM `projects_categories`";
             $result = mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
             {
            ?>
            <li class="pipNavCaregory" id="pipNavCaregory<?php echo $row["id"] ?>"><a href='#' id='catego<?php echo $row["id"] ?>' class="Pipcatego"><?php echo $row["name"] ?></a></li>
            <?php
             }
            ?>
        </ul>
    </div>
    <div id='categoriesContainer'>
        
    </div>
    <script>
       var loading_small = new Image();
        loading_small.src = '../img/loader.gif';
      $("#categoriesContainer").html(loading_small);
      $("#categoriesContainer").load("addcategory.html");
        $('.Pipcatego').click( function(eceCat){
            eceCat.preventDefault();
            var ids = $(this).attr("id");
            ids = ids.substring(6,ids.length);
            $('.pipNavCaregory').removeClass("active");
            $("#pipNavCaregory"+ids).addClass("active");
            $("#categoriesContainer").html(loading_small);
            $.post("categoryDets.php",
                  "catId="+ids,
                  function(rets){
                $("#categoriesContainer").html(rets);
            })
            
        });
        
        $('#add').click( function(eceCat){
            $('.pipNavCaregory').removeClass("active");
            $("#pipNavCaregory0").addClass("active");
            $("#categoriesContainer").html(loading_small);
            $("#categoriesContainer").load("addcategory.html");
            
        });
    </script>
</div><br>
<br><br>
<?php
   }
?>

</body>
</html>
