<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>
        <?php
          if(isset($_SESSION["sellers"])){
                 $administrator = $_SESSION["sellers"];
                 include_once '../functions/conne.php';
                 $sql = "SELECT `shopId` FROM `shopusers` WHERE `userId` = $administrator";
                 $row = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
                 $hopId = $row['shopId'];
              
                 $sql = "SELECT * FROM `users` WHERE `userId` = $administrator";
                 $row = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
                 $user_name = $row['lname'].'  '.$row['fname'];
                 $user_email = $row['email'];
        	     $site_name = "Teranoba";  
              
                 
        echo $site_name;
    ?>
 || orders </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css/w3.css">
<link rel="stylesheet" href="../assets/css/theme.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
<link rel="shortcut icon" href="../assets/img/newLogo.png"/>
<script src="scripts/jquery.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5" style="background-image:url(../assets/img/bruno-abatti.jpg)">
    <script>
        var loading = new Image();
        var loading_small = new Image();
        loading.src = "../assets/img/newLogo.png";
        loading_small.src = "../assets/img/newLogo.png";
        loading.style.width = "30%";
        loading_small.style.width = "10%";
        loading.style.margin = "auto";
    </script>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="../sellers/" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i> welcome <?php echo $user_name ?></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white classes" title="Account Settings"><i class="fa fa-user"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large  classes" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green number_of_notification"></span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
        <div id="notifications_real_time">
            
        </div>
      <!--<a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>-->
    </div>
  </div>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large  classes" title="messages"><i class="fa fa-envelope"></i><span class="w3-badge w3-right w3-small w3-green number_of_messages"></span></button>  
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
        <div id="messages_real_time">
            
        </div>
        <!--
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>-->
    </div>
  </div>
 </div>
</div>


<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?php echo $user_name ?></h4>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> email ,<?php echo $user_email ?></p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-envelope fa-fw w3-margin-right"></i> Messages </button>
          <div id="Demo1" class="w3-hide w3-container">
            <div id="conversation">
                
            </div>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-bell fa-fw w3-margin-right"></i> Notifications </button>
          <div id="Demo2" class="w3-hide w3-container">
            <div id="Notifications">
                
            </div>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Projects </button>
              <div id="Demo3" class="w3-hide w3-container">
                 
              </div>
            <button onclick="myFunction('Demo4')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-reorder fa-fw w3-margin-right"></i> Orders </button>
              <div id="Demo4" class="w3-hide w3-container">
                 
              </div>
              <button onclick="myFunction('Demo5')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-shopping-cart fa-fw w3-margin-right"></i> Carts </button>
              <div id="Demo5" class="w3-hide w3-container">
                 
              </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p> Categories </p>
          <p>
        <?php
          $sql = "SELECT * FROM `categories`";
          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
               ?>
            <span class="w3-tag w3-small w3-theme-d5"><?php echo $row["name"]?></span>
        <?php
          }
        ?>
          </p>
        </div>
      </div>
      <br>
      
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7" id="ordersContainer">
        <?php
           if(isset($_GET["demo"])&&!isset($_GET["name"])){
              $userId  = $_GET["demo"];
              $OrderId  = $_GET["client"];
           $sql = "SELECT * FROM `orders` INNER JOIN `users` ON `orders`.`userId` = `users`.`userId`  WHERE `users`.`userId` = '$userId' ORDER BY `orderDate` DESC";
           $result = mysqli_query($conn,$sql);
           while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
               ?>
               
               <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                <span class="w3-right w3-opacity"><i class="fa fa-calendar"></i> <?php echo $row["orderDate"] ?></span>
                <h4><?php echo $row['lname']." ".$row["fname"]?></h4><br>
                <hr class="w3-clear">
                <h5><?php echo $row["orderstitle"] ?></h5>
                <p><?php echo $row['ordersdesc']?></p>
                <?php
                  if(!$row["status"]){
                ?>
                <button type="button" class="w3-button w3-margin-bottom ordersDetails w3-green" id="ord<?php echo $row["ordersId"] ?>"><i class="fa fa-thumbs-up"></i> &nbsp;Accept </button>
                <?php
                  }
                  else {
                ?>
                <button type="button" class="w3-button w3-margin-bottom ordersDetailz w3-red" id="ord<?php echo $row["ordersId"] ?>"><i class="fa fa-close"></i> &nbsp; decline </button> 
                <?php
                  }
                ?>
                <div id="ordersFunctions<?php echo $row["ordersId"] ?>" class="w3-container w3-card w3-white w3-round w3-margin">
                       
                </div>
              </div> 
               <?php
             }
             
           ?>
           <div class="w3-container w3-card w3-white w3-round w3-margin">
             </div>
               <script>
               
    
                   $(".ordersDetails").click( function(hjk){
                       hjk.preventDefault();
                       var ids = $(this).attr("id");
                       ids = ids.substring(3,ids.length);
                       $("#ordersFunctions"+ids).html(loading_small);
                       $.post("adminfunctions/acceptorder.php",
                             "sds="+ids+"&demo=<?php echo $userId?>&val=1",
                             function(fgh){
                                 $("#ordersFunctions"+ids).html(fgh);
                             })
                   })
                   $(".ordersDetailz").click( function(hjk){
                       hjk.preventDefault();
                       var ids = $(this).attr("id");
                       ids = ids.substring(3,ids.length);
                       $("#ordersFunctions"+ids).html(loading_small);
                       $.post("adminfunctions/acceptorder.php",
                             "sds="+ids+"&demo=<?php echo $userId?>&val=0",
                             function(fgh){
                                 $("#ordersFunctions"+ids).html(fgh);
                             })
                   })
                   
               </script>
           <?php
           }
           
           if(isset($_GET["name"])){
           $userId  = $_GET["name"];
           $sql = "SELECT * FROM `carts` 
                   INNER JOIN `users`  
                   ON `carts`.`user_id` = `users`.`userId` 
                   INNER JOIN `products` 
                   ON `carts`.`productId` = `products`.`productId`
                   INNER JOIN `shops` 
                   ON `products`.`shop` = `shops`.`id`
                   WHERE `users`.`userId` = '$userId' AND `shops`.`id` = '$hopId' 
                   ORDER BY `carts`.`date` DESC";
           $result = mysqli_query($conn,$sql);
           $currency = array("RWF","USD");
           $total = 0;
           while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
               ?>
               
               <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
               <img src="../<?php echo $row['productIcon']?>" class="w3-left w3-circle w3-margin-right" style="width:60px">
                <span class="w3-right w3-opacity"><i class="fa fa-calendar"></i> <?php echo $row["date"] ?></span>
                <h4><?php echo $row['lname']." ".$row["fname"]?></h4><br>
                <hr class="w3-clear">
                <h5><?php echo $row["productName"] ?>
                <span class="w3-badge w3-win8-orange w3-tiny">
                <?php echo $row['Quantity'] ?></span>
                </h5>
                <?php
                  if(!($row['promotion']==0)){

                ?>
                <p> unity price: <?php echo $row['promotion']." ".$currency[$row["currency"]] ; ?>, total price:
                  <?php
                    $total += $row['promotion']*$row['Quantity'];
                   echo $row['promotion']*$row['Quantity']." ".$currency[$row["currency"]]; ?></p>

                  <p><del> unity price: <?php echo $row['productPrice']." ".$currency[$row["currency"]] ; ?>, total price:
                  <?php echo $row['productPrice']*$row['Quantity']." ".$currency[$row["currency"]]; ?></del></p>
                  <?php
                     }
                    else{
                      ?>
                    <p> unity price: <?php echo $row['productPrice']." ".$currency[$row["currency"]] ; ?>, total price:
                  <?php
                  if($row["status"]) 
                      $total += $row['productPrice']*$row['Quantity'];
                   echo $row['productPrice']*$row['Quantity']." ".$currency[$row["currency"]]; ?></p>
                      <?php
                    }
                  ?>
                  <?php
                  if(!$row["status"]){
                    ?>
                    <button type="button" class="w3-button w3-margin-bottom ordersDetails w3-green" id="ord<?php echo $row["cartId"] ?>"><i class="fa fa-thumbs-up"></i> &nbsp;Accept </button>
                    <?php
                      }
                      else {
                    ?>
                    <button type="button" class="w3-button w3-margin-bottom ordersDetailz w3-red" id="ord<?php echo $row["cartId"] ?>"><i class="fa fa-close"></i> &nbsp; decline </button> 
                    <?php
                      }
                    ?>
              
                 <div id="ordersFunctions<?php echo $row["cartId"] ?>" class="w3-container w3-card w3-white w3-round w3-margin">
                       
                 </div>
              </div> 
               <?php
             }
             ?>
             <div class="w3-container w3-card w3-white w3-round w3-margin">
                 <p> Amount: <?php echo $total ?> RWF </p>
             </div>
               <script>
               
                   
                   $(".ordersDetails").click( function(hjk){
                       hjk.preventDefault();
                       var ids = $(this).attr("id");
                       ids = ids.substring(3,ids.length);
                       $("#ordersFunctions"+ids).html(loading_small);
                       $.post("adminfunctions/acceptcart.php",
                             "sds="+ids+"&demo=<?php echo $userId?>&val=1",
                             function(fgh){
                                 $("#ordersFunctions"+ids).html(fgh);
                             })
                   })
                   
                   $(".ordersDetailz").click( function(hjk){
                       hjk.preventDefault();
                       var ids = $(this).attr("id");
                       ids = ids.substring(3,ids.length);
                       $("#ordersFunctions"+ids).html(loading_small);
                       $.post("adminfunctions/acceptcart.php",
                             "sds="+ids+"&demo=<?php echo $userId?>&val=0",
                             function(fgh){
                                 $("#ordersFunctions"+ids).html(fgh);
                             })
                   });
                  
               </script>
             <?php
           }
        ?>
      
      
    <!-- End Middle Column -->
    </div>
    <div class="w3-col m2">
        <div id="reatimeCart">
            <!-- Right Column -->
    
            
        </div>
        
        <div id="realtimeOrder">
            
            <!-- End Right Column -->
            
        </div>
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>


 
<script>

// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

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
$("#conversation").load("adminfunctions/admin_messages.php");
$("#Notifications").load("adminfunctions/admin_notification.php");
</script>
<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Teranoba</h5>
</footer>
</body>
</html> 
<?php
}

?>