<?php
include("../functions/conne.php");
if(isset($_POST['values'])){
     $values = $_POST['values'];
     $sql = "SELECT * FROM `subcategories` WHERE `subcategories`.`categorieId` = $values";
     $result = mysqli_query($conn,$sql);
     while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
     {
        ?>
    <option value="<?php echo $row["cat_id"] ?>"><?php echo $row["name"] ?></option>
    <?php
     }
}
?>