
                <?php
              include_once '../functions/conne.php';
              $sql = "SELECT * FROM `orders` INNER JOIN `users` ON `orders`.`userId` = `users`.`userId` WHERE `status` = 0 ORDER BY `orderDate` DESC LIMIT 0,1";
                   $result = mysqli_query($conn,$sql);
                   while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                       ?>
              
                          <div class="w3-card w3-round w3-white w3-center">
                            <div class="w3-container">
                              <p>latest order </p>
                              <span><?php echo $row['lname']." ".$row["fname"]?>
                              <br>
                               <small class="w3-blue"><?php echo $row['orderstitle']." ".$row["ordersdesc"]?></small>
                              </span>
                              <div class="w3-row w3-opacity">
                                  <?php
                                      if(!$row["status"]){
                                    ?>
                                    <div>
                                      <a href="page.php?client=<?php echo $row["ordersId"]?>&demo=<?php echo $row["userId"]?>" class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></a>
                                    </div>
                                    <?php
                                      }
                                      else {
                                    ?>
                                    <div class="w3-half">
                                      <button class="w3-button w3-block w3-red w3-section ordersDetailz" title="Decline" id="ord<?php echo $row["ordersId"] ?>"><i class="fa fa-remove"></i></button>
                                    </div>
                                    <?php
                                      }
                                    ?>
                              </div>
                            </div>
                          </div>
                          <br>
                    <?php
                   }
                    ?>