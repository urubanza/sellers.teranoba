<?php
  session_start();
  $error_message = "fill this form to add a product";
   $error_message2 = "";
   $fileName = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> teranoba sellers add a product </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/img/newLogo.png"/>
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/styles.css" rel="stylesheet">
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
  <script src="../assets/js/jquery-1.10.2.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body  style="background-image:url(../assets/img/bruno-abatti.jpg)">
<script>
  var currentId = 0;    
</script>
    
<?php
include("../functions/conne.php");
if(isset($_POST["productName"])){
include("../functions/fileUpload.php");
    $mypic = new uploadImage("productIcon"); 
       if($mypic->upload('../img/',600000000,150,200)){
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $promotion = $_POST["promotion"];
        $quantity = $_POST["quantity"];
        $productCategory = $_POST["productCategory"];
        $productDescription = $_POST["productDescription"];
        $notes = $_POST["notes"];
        $shop = $_POST["shop"];
        $icon = $imgUrls.$mypic->newName;
        $subCategorie = $_POST["productsubCategory"];
            $sql = "INSERT INTO `products` (`productId`,
                                            `productName`,
                                            `productPrice`,
                                            `promotion`,
                                            `quantity`,
                                            `currency`,
                                            `productCategory`,
                                            `productDescription`,
                                            `notes`,
                                            `dateAdded`,
                                            `productIcon`,
                                            `shop`,
                                            `subCategory`) 
                                 VALUES (NULL,
                                        '$productName',
                                        '$productPrice',
                                        '$promotion',
                                        '$quantity',
                                        '0',
                                        '$productCategory',
                                        '$productDescription',
                                        '$notes',
                                        CURRENT_TIMESTAMP,
                                        '$icon',
                                        '$shop',
                                        '$subCategorie')";
            $res = mysqli_query($conn,$sql);
            echo $sql;
           if(!$res)
               echo mysqli_error($conn);
           else {
               ?>
            <script>
                window.location = '../';
            </script>
    <?php
           }
    }else echo $mypic->imageFileType.'...  '.$mypic->error;    
}
   if(isset($_SESSION["sellers"]))
   {
       $userId = $_SESSION["sellers"];
       $sql = "SELECT * FROM `users` WHERE `userId` = $userId";
       $result = mysqli_query($conn,$sql);
       $SellerDets = mysqli_fetch_array($result,MYSQLI_ASSOC);
       include("menu.php");
?>

<div class="container" style="background:white">
    <div class="alert alert-warning">
      <h1><?php echo $error_message2."  ".$error_message." ".$fileName?></h1>
    </div>
    
   <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="email">Product title:</label>
        <input type="text" class="form-control" name="productName" id="" required>
      </div>
      <div class="form-group">
        <label for="email">Product Price in Rwf:</label>
        <input type="number" class="form-control" name="productPrice" id="" required>
      </div>
      <div class="form-group">
        <label for="email">Promotion Price in Rwf:</label>
        <input type="number" class="form-control" name="promotion" id="">
      </div>
      <div class="form-group">
        <label for="email">Available quantity( currently):</label>
        <input type="number" class="form-control" name="quantity" id="" required>
      </div>
      <div class="form-group">
       <div class="col-sm-6">
        <label for="email"> choose a categorie </label>
            <select class="form-control" name="productCategory" id="superCategory">
                <?php
                 $sql = "SELECT * FROM `categories`";
                 $result = mysqli_query($conn,$sql);
                 $cont = 0;
                 while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
                 { 
                     if($cont==0){
                ?>
                <script>
                  currentId = <?php echo $row["id"] ?>;    
                </script>
                <?php
                }
                    ?>
                <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                <?php
                    $cont++;
                 }
                ?>
            </select>
        </div>
        <div class="col-sm-6">
        <label for="email"> choose a subcategorie : </label>
        <select class="form-control" name="productsubCategory" id="subcats">
            
        </select>
        <script>
            $.post('listofsubcats.php',
                  'values='+currentId,
                  function(retsxx){
               $("#subcats").html(retsxx);
            }); 
            $("#superCategory").change( function(){
                currentId = $("#superCategory").val();
                $.post('listofsubcats.php',
                  'values='+currentId,
                  function(retsxx){
                        $("#subcats").html(retsxx);
            }); 
            });
        </script>
        </div>
      </div>
      <div class="form-group">
        <label for="email"> product description:</label>
        <textarea class="form-control" name="productDescription" id="">
            
        </textarea>
      </div>
      <div class="form-group">
        <label for="email"> this is product notes (quantity limit on the product, discount percentage on product and many more):</label>
        <textarea class="form-control" name="notes" id="">
            
        </textarea>
      </div>
      <div class="form-group">
        <label for="email"> product icon(150x200):</label>
        <input type="file" class="form-control" name="productIcon" id="" required>
        <?php 
        $sql0 = "SELECT `shopId` FROM `shopusers` WHERE `shopusers`.`userId` = '$userId'";
        $res = mysqli_query($conn,$sql0);
        $shopId = mysqli_fetch_array($res)[0];
        ?>
        <input type="text" class="form-control" name="shop" value="<?php echo $shopId ?>" id="" required style="display:none;">
      </div>
      <button type="submit" class="btn btn-info"> add this product </button>
    </form>
</div><br>
<br><br>
<?php
   }
?>

</body>
</html>
