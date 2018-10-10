<header>
<?php
  include("../../functions/conne.php");
  if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` WHERE `userId` = $userId";
       $result = mysqli_query($conn,$sql);
       $SellerDets = mysqli_fetch_array($result,MYSQLI_ASSOC);
       ?>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <nav class="navbar navbar-inverse" style="padding:30px;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#"><img src="../../assets/img/newLogo.png" width="50"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
<!--                <li class="active"><a href="#">Home</a></li>-->
                <li><a href="../../" >My Products</a></li>
                <?php 
                     if($SellerDets["type"]=="admin"){
                     ?>
                <li  class="active"><a href="../../sellers/"> Sellers </a></li>
                <li><a href="../../shops/"> Shops </a></li>
                <li><a href="../../pubs/"> Pubs </a></li>
                <?php  
                           }
            ?>
                <li><a href="sellers/social_netwok/"> Social Network </a></li>
                <li><a href="https://www.teranoba.com/sellers/page.php?client=0&demo=0"><i class="fa fa-bell"></i><span class="badge number_of_notification"></span></a></li>
                <li><a href="https://www.teranoba.com/sellers/page.php?client=0&demo=0"><i class="fa fa-envelope"></i><span class="badge number_of_messages"></span></a></li>
              </ul>
                
              <ul class="nav navbar-nav navbar-right">
                  <li>
                    <div class="dropdown">
                          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span><?php echo $SellerDets['fname']." ".$SellerDets['lname'] ?>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <ul style="list-style:none;">
                                <li><a href="../settings/" class="btn btn-info"> Settings </a></li>
                                <li><a href="../logout.php" class="btn btn-info"> log out </a></li>
                            </ul>
                          </div>
                    </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <script>
            function realTime(){
                      $(".number_of_messages").load("https://www.teranoba.com/sellers/adminfunctions/admini_number_of_messages.php");
                      $(".number_of_notification").load("https://www.teranoba.com/sellers/adminfunctions/number_of_notification.php");
                      setTimeout(function(){ 
                            realTime();    
                                 },3000);
                    }
             //realTime();
        </script>
       <?php
   }
?>
</header>