<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
<script>
    var cx = 0;
</script>
<?php
session_start();
if(isset($_SESSION["sellers"])){
include('../../functions/conne.php');
    if(isset($_POST["userId"])){
      if(isset($_POST["value"])){
          $userId = $_POST["userId"];
          $shop = $_POST["adminid"];
    	$contents = $_POST["value"];
    	$sql = "INSERT INTO `usermessages` (`messId`, `userId`, `shop`, `contents`, `messdate`,`direction`)
                          VALUES (NULL, '$userId', '$shop', '$contents', CURRENT_TIMESTAMP,0)";
        $result = mysqli_query($conn,$sql);
      }
      $userId = $_POST["userId"];
      $shop = $_POST["adminid"];
      $numberOfallMess = "SELECT * FROM `usermessages` WHERE `userId` = '$userId' AND `shop` = '$shop' ";
 	  $result = mysqli_query($conn,$numberOfallMess);
 	  $totalN = mysqli_num_rows($result);
 	  $totalN2 = $totalN;
 	  if($totalN<9)
 	  	$totalN2 = 0;
 	  else $totalN2 = $totalN-9;
      $sql = "SELECT * FROM `usermessages` INNER JOIN `users` ON `usermessages`.`userId` = `users`.`userId`WHERE `usermessages`.`userId` = '$userId' AND `usermessages`.`shop` = '$shop' ORDER BY `messId` ASC LIMIT $totalN2,$totalN";
      $align = array("w3-right-align","w3-left-align");
      $result = mysqli_query($conn,$sql);
      ?>
      <div class="w3-row-padding">
        <div class="w3-col m12">
            <script>
                cx = <?php echo $totalN ?>;
            </script>
      <?php
            while($row = mysqli_fetch_array($result))
            {
            	?>
            	<div class="w3-card-4">
	                 <div class="w3-container w3-win8-blue <?php echo $align[$row[5]]?>">
	                    <h2><?php if($row['direction']) echo $row[9]." <b>".$row[10]."</b>"; else echo "you" ?></h2>
	                    <p><?php echo $row[3]; ?></p>
	                    <p><i class="fa fa-calendar"></i> <?php echo $row[4]; ?></p>
	                 </div>
	              </div>
	              <br>
            	<?php
 }
 $sql = "UPDATE `usermessages` SET `seen1` = '1' WHERE `userId` = '$userId' AND `shop` = '$shop'";
 $result = mysqli_query($conn,$sql);
      ?>
          <div id="newestMessages">
              
          </div>
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              
              <p>
              <input class="w3-input" type="text" id="adminValue"></p>
              <button type="button" class="w3-button w3-theme" id="adminSend"><i class="fa fa-paper-plane"></i> &nbsp;send </button> 
            </div>
          </div>
          <script>
              $("#adminSend").click( function(ext){
                  ext.preventDefault();
                  var vals = $("#adminValue").val();
                  $.post("adminfunctions/userContact.php",
                         "userId=<?php echo $userId?>&adminid=<?php echo $shop?>&value="+vals,
                         function(rets){
                              $("#ordersContainer").html(rets);
                         })
              })
             function check_new_messages(){
                 var currentConts = $("#newestMessages").html();
                $.post("adminfunctions/userCharts.php",
                      "xc="+cx+"&userId=<?php echo $userId?>&adminid=<?php echo $shop?>",
                      function(rets){
                          $("#newestMessages").html(currentConts+rets);
                         setTimeout( function(){ check_new_messages();},1000);
                      });
             }
             check_new_messages();
            </script>
      <?php
    }
    
    ?>
        </div>
      </div>
    <?php
}
?>

</div>
