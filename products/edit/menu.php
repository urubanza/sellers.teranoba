<header>
<?php
  include("../../functions/conne.php");
  if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` 
               INNER JOIN `shopusers` ON `users`.`userId` = `shopusers`.`userId` 
               INNER JOIN `shops` ON `shops`.`id` = `shopusers`.`shopId`
               WHERE `users`.`userId` = $userId";
       $result = mysqli_query($conn,$sql);
       echo mysqli_error($conn);
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
                <li   class="active"><a href="../../" >My Products</a></li>
                <?php 
                     if($SellerDets["type"]=="admin"){
                     ?>
                <li><a href="../../sellers/"> Sellers </a></li>
                <li><a href="../../shops/"> Shops </a></li>
                <li><a href="../../pubs/"> Pubs </a></li>
                <?php  
                           }
            ?>
                <li><a href="#"> Social Network </a></li>
                <li><a href="../../page/?client=0&demo=0"><i class="fa fa-bell"></i><span class="badge number_of_notification"></span></a></li>
                <li><a href="../../page/?client=0&demo=0"><i class="fa fa-envelope"></i><span class="badge number_of_messages"></span></a></li>
                <li><div class="dropdown">
                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        users activities
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <ul style="list-style:none; width:300%; margin:0; padding:10px; background-color:#fff">
                            <?php
                                $shopId  = $SellerDets["shopId"];
                                $sql = "SELECT * FROM `carts` INNER JOIN 
                        			    `users` ON `carts`.`user_id` = `users`.`userId`
                        			    INNER JOIN 
                        				`products` ON `carts`.`productId` = `products`.`productId` 
                        				INNER JOIN 
                        				`shops` ON `shops`.`id` = `products`.`shop`
                        				WHERE `shops`.`id` = '$shopId' ORDER BY `cartId` LIMIT 0,5";
                        		$result = mysqli_query($conn,$sql);
                        		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        		    ?>
                        		    <li>
                        		        <img src="../<?php echo $row["productIcon"]?>" style="width:10%;">
                        		        <a  href="../../page/?name=<?php echo $row["userId"]?>&amp;demo=<?php echo $row["productId"]?>"> <?php echo $row["fname"]." ".$row["lname"]?> </a>
                        		    </li>
                        		    <?php
                        		}
                        		
                                ?>
                        </ul>
                      </div>
                </div>
                </li>
                <li><div class="dropdown">
                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Recent Orders
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <ul style="list-style:none; width:300%; margin:0; padding:10px; background-color:#fff" >
                              <?php
                              
                                $sql = "SELECT * FROM `orders` 
                                        INNER JOIN `users` 
                                        ON `orders`.`userId` = `users`.`userId` 
                                        WHERE `users`.`type` = 'member'
                                        AND `orders`.`shop` = '0'
                                        OR `orders`.`shop` = '$shopId' 
                                        ORDER BY `ordersId` LIMIT 0,5";
                                $result = mysqli_query($conn,$sql);
                        		while($value = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        		    ?>
                        		    <li style="width:100%;">
                        		        <a href="../../page/?client=<?php echo $value["ordersId"] ?>&amp;demo=<?php echo $value["userId"] ?>" style="width:100%;">
											<span ><?php  echo $value["lname"]." ".$value["fname"] ?> &nbsp; &nbsp; &nbsp;<i><small><?php echo $value["orderDate"]?></small></i></span>
										</a>
                        		    </li>
                        		    <?php
                        		}
                        		
                                ?>
                        </ul>
                      </div>
                </div>
                </li>
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