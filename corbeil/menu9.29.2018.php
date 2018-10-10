<!--
                <li><div class="dropdown">
                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        users activities
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <ul style="list-style:none; width:300%; margin:0; padding:10px; background-color:#fff">
                            <?php
                                $shopId  = $SellerDets["shop"];
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
                        		        <a  href="https://www.teranoba.com/sellers/page.php?name=<?php echo $row["userId"]?>&amp;demo=<?php echo $row["productId"]?>"> <?php echo $row["fname"]." ".$row["lname"]?> </a>
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
                        		        <a href="https://www.teranoba.com/sellers/page.php?client=<?php echo $value["ordersId"] ?>&amp;demo=<?php echo $value["userId"] ?>" style="width:100%;">
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
-->