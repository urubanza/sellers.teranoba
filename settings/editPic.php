<?php
session_start();
 if(isset($_POST["name"])){
       include("../functions/conne.php");
       include("../functions/fileUpload.php");
       
       $filds = array("shops"=>"shopIcon","users"=>"profilePicture");
       $mypic = new uploadImage("productIcon");
       if($mypic->upload('../img/',600000000,50,50)){
               $name = $_POST["name"];
               $userId = $_SESSION['sellers'];
               $shop = "SELECT `shopId` FROM `shopusers` WHERE `userId` = $userId";
               $res = mysqli_query($conn,$shop);
               $shop = mysqli_fetch_array($res)[0];
               $ids = array("shops"=>"$shop","users"=>"$userId");
               $fields_ids = array("shops"=>"id","users"=>"userId");
               $fileName = $imgUrls.$mypic->newName;
               $sql = "UPDATE `$name` SET `$filds[$name]` = '$fileName' WHERE `$name`.`$fields_ids[$name]` = '$ids[$name]'"; 
                        $res = mysqli_query($conn,$sql);
                echo $sql;
                        if($res){
                                ?>
                                <script>
                                    location.reload();
                               </script>
                        <?php
                } 
       }
 }
 
  if(isset($_POST["field"])){
      $field = $_POST["field"];
      $place_holder = array("shops"=>"choose icon of the shop:","users"=>"choose your profile pic:");
      
?>
<form class="form-horizontal" id="subThee">
  <div class="form-group">
    <label class="control-label col-sm-10" for="email"><?php echo $place_holder[$field] ?></label>
    <div class="col-sm-10">
      <input id="file" type="file" class="form-control" name="productIcon" placeholder="<?php echo $place_holder[$field] ?>" required>
      <input type="text" id="field" value="<?php echo $field ?>" name="name" style="display:none;">
    </div>
    <div class="col-sm-10">
      <button type="submit"  class="btn btn-success btn-xs">save</button>
      <button type="reset" id="cancelThee" class="btn btn-danger btn-xs">cancel</button>
    </div>
  </div>
</form>
<script>
    $("#subThee").submit( function(nbm){
        nbm.preventDefault();
        var urls = "../settings/editPic.php";
        var formData = new FormData($(this)[0]);
        //alert(formData);
        $.ajax({
               url : urls,
               type : 'POST',
               data : formData,
               processData: false,  // tell jQuery not to process the data
               contentType: false,  // tell jQuery not to set contentType
               enctype: 'multipart/form-data',
               success : function(data) {
                    $("#edit<?php echo $field?>").html(data);
               }
        });
        
    });
    $("#cancelThee").click( function(nbm){
         nbm.preventDefault();
         $("#edit<?php echo $field?>").html("");
    })
</script>
<?php
}
?>