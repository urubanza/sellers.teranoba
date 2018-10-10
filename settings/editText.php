<?php
session_start();
 if(isset($_POST["name"])){
     include("../functions/conne.php");
     $userId = $_SESSION["sellers"];
     $fields = $_POST["name"];
     $value = $_POST[$fields];
     $sql = "UPDATE `users` SET `$fields` = '$value' WHERE `users`.`userId` = '$userId'";
     $result = mysqli_query($conn,$sql);
     if($result){
         ?>
         <b> updated success!! </b>
         <script>
             location.reload();
         </script>
         <?php
     }
     else echo mysqli_error($conn);
 }
 
  if(isset($_POST["field"])){
      $field = $_POST["field"];
      $place_holder = array("fname"=>"first name","lname"=>"last name","email"=>"email address","password"=>"New password");
      $lebels = array("fname"=>"first name:","lname"=>"last name:","email"=>"email:","password"=>"password:");
      $types = array("fname"=>"text","lname"=>"text","email"=>"email","password"=>"password");
?>
<form class="form-horizontal" id="subThee">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><?php echo $lebels[$field] ?></label>
    <div class="col-sm-10">
      <input id="email" type="<?php echo $types[$field] ?>" class="form-control" name="<?php echo $field ?>" placeholder="<?php echo $place_holder[$field] ?>" required>
      <input type="text" value="<?php echo $field ?>" name="name" style="display:none;">
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
        var values = $(this).serialize();
        $.post("../settings/editText.php",
              values,
              function(xxx){
                  $("#edit<?php echo $field?>").html(xxx);
              })
    });
    $("#cancelThee").click( function(nbm){
         nbm.preventDefault();
         $("#edit<?php echo $field?>").html("");
    })
</script>
<?php
}
?>