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
                <li><a href="../../settings/"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="../../" ><i class="fa fa-product-hunt"></i> My Products</a></li>
                <?php 
                     if($SellerDets["type"]=="admin"){
                     ?>
                <li  class="active"><a href="#"><i class="fa fa-users"></i> Sellers </a></li>
                <li><a href="../../shops/"><i class="fa fa-shopping-bag"></i> Shops </a></li>
                <li><a href="../../pubs/"><i class="fa fa-rocket"></i> Pubs </a></li>
                <?php  
                           }
            ?>
                
                <li><div class="dropdown">
                      <a href='#' class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:20px; background-color:#fff">
                       <i class="fa fa-shopping-cart"></i> Carts
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"  style=" width:400%;">
                        <ul style="list-style:none;margin:0; padding:10px; background-color:#fff">
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
                        		        <img src="<?php echo $row["productIcon"]?>" style="width:10%;">
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
                      <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:20px; background-color:#fff"><i class="fa fa-comment"></i>
                        Orders
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style=" width:400%;">
                        <ul style="list-style:none; margin:0; padding:10px; background-color:#fff;" >
                              <?php
                              
                                $sql = "SELECT * FROM `orders` 
                                        INNER JOIN `users` 
                                        ON `orders`.`userId` = `users`.`userId` 
                                        WHERE `users`.`type` = 'member'
                                        AND `orders`.`shop` = '0'
                                        OR `orders`.`shop` = '$shopId' 
                                        ORDER BY `ordersId` LIMIT 0,5";
                                $result = mysqli_query($conn,$sql);
                                echo mysqli_error($conn);
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
                    <div class="dropdown pipDropdowns  dropdownClick">
                          <div class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span style=" background-color:#df5600; color:#fff; padding:10px; border-radius:20px;">
                                   <img src='<?php echo $SellerDets['profilePicture'] ?>' width="50" style="border-radius:25px;">
                                  <b><?php echo      $SellerDets['fname']." ".$SellerDets['lname'] ?></b> <i class="fa fa-envelope"></i><span class="badge number_of_messages"></span><i class="fa fa-bell"></i><span class="badge number_of_notification"></span>
                              
                                  </span>
                            
                          </div>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="background:none;">
                              <div id="cssmenu">
                                    <ul>
                                       <li><a href="../../settings/"><span><i class="fa fa-cogs"></i> Settings </span></a></li>
                                       <li><a href="#"><span><i class="fa fa-sitemap"></i> Social Network </span> </a></li>
                                       <li class="active"><a href="../../page/?client=0&demo=0"><span><i class="fa fa-envelope"></i><span class="badge number_of_messages"></span> messages </span></a>
                                       </li>
                                       <li><a href="../../page/?client=0&demo=0"><span><i class="fa fa-bell"></i><span class="badge number_of_notification"></span> notifications</span></a></li>
                                       <li class="last"><a href="../../logout.php"><span><i class="fa fa-sign-out"></i> log out</span></a></li>
                                    </ul>
                               </div>
                          </div>
                    </div>
                    <script>
                    </script>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <script>
//            function realTime(){
//                      $(".number_of_messages").load("https://www.teranoba.com/sellers/adminfunctions/admini_number_of_messages.php");
//                      $(".number_of_notification").load("https://www.teranoba.com/sellers/adminfunctions/number_of_notification.php");
//                      setTimeout(function(){ 
//                            realTime();    
//                                 },3000);
//                    }
            $(".number_of_messages").load("../../adminfunctions/admini_number_of_messages.php");
            $(".number_of_notification").load("../../adminfunctions/number_of_notification.php");
             //realTime();
        </script>
       <?php
   }
?>
</header>