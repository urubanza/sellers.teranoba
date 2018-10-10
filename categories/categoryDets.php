<?php
include("../functions/conne.php");
   if(isset($_POST['catId'])){
      $catId =  $_POST['catId'];
      $sql = 'SELECT * FROM `categories` WHERE `id` ='.$catId;
      $result = mysqli_query($conn,$sql);
      $CatDets = mysqli_fetch_array($result,MYSQLI_ASSOC);   
?>
<div class="col-sm-4  login_bg">
    <h3> <?php echo $CatDets['name']?></h3>
    <p> <?php echo $CatDets['description']?></p>
    <button type="button" class="btn btn-success" id='editCat'><i class="fa fa-pencil"></i></button>
    <button type="button" class="btn btn-danger" id='deleteCat'><i class="fa fa-trash"></i></button>
    <div id="categoriesStatus"></div>
</div>
<div class="col-sm-4  login_bg"  style='border:1px solid #000; height:100%;'>
    <h3> add a subcategory </h3>
    <form method="POST" enctype="multipart/form-data" id="addSubcategory">
      <div class="form-group">
        <label for="email"> name:</label>
        <input type="text" class="form-control" name="subcatname" id="" required>
        <input type="text" class="form-control" name="catId" id="" value="<?php echo $catId ?>" style="display:none;">
      </div>
      <div class="form-group">
        <label for="email"> description: </label>
        <textarea name="subdescription" class="form-control">

        </textarea>
      </div>
      <button type="submit" class="btn btn-info"> add </button>
    </form>
    <div id='SubcategoriesStatus'></div>
    <script>
       $("#addSubcategory").submit( function(examples){
           examples.preventDefault();
           var datas = $("#addSubcategory").serialize();
           $("#SubcategoriesStatus").html(loading_small);
              $.post("addSubCategorie.php",
                     datas,
                  function(reterne){
                      $("#SubcategoriesStatus").html(reterne);
                  })
       })
    </script>
</div>
<div class="col-sm-4  login_bg" style="height:300px; overflow:auto;">
    <?php
       $sql = 'SELECT * FROM `subcategories` WHERE `categorieId` ='.$catId; 
       $result = mysqli_query($conn,$sql);
       $nms = mysqli_num_rows($result);
       $conts = 1;
    ?>
    <h3> <?php echo $nms ?> subcategories </h3>
    <table class="table">
      <thead>
          <tr>
            <th> # </th>
            <th> Name </th>
            <th> Description </th>
            <th> action </th>
          </tr>
      </thead>
        <?php
        while($CatDets = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        ?>
        <tr>
            <td><?php echo $conts ?></td>
            <td><?php echo $CatDets['name'] ?></td>
            <td><?php echo $CatDets['descr'] ?>
                <div id="subcatDISP<?php echo $CatDets['cat_id'] ?>"></div> 
            </td>
            <td>
                <button type="button" class="btn btn-info subcatEdit" id="editsub<?php echo $CatDets['cat_id'] ?>">
                    <i class="fa fa-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger subcatDele" id="deletsub<?php echo $CatDets['cat_id'] ?>"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php
            $conts++;
        }
        ?>
      
    </table>
    <script>
       $(".subcatDele").click( function(zzz){
           zzz.preventDefault();
           var idsx = $(this).attr('id');
           idsx = idsx.substring(8,idsx.length);
           $.post("deleteSUBCat.php",
             "CCC="+idsx+"&id=<?php echo $catId?>",
          function(reterne){
              $("#subcatDISP"+idsx).html(reterne);
          })
           
       });
        $(".subcatEdit").click( function(zzz){
           zzz.preventDefault();
           var idsx = $(this).attr('id');
           idsx = idsx.substring(7,idsx.length);
           $.post("editSubCategorie.php",
             "CCC="+idsx+"&id=<?php echo $catId?>",
          function(reterne){
              $("#subcatDISP"+idsx).html(reterne);
          })
           
       });
    </script>
</div>
<script>
    var loading_small = new Image();
        loading_small.src = '../img/loader.gif';
  $("#deleteCat").click( function(examp){
      examp.preventDefault();
      $("#categoriesStatus").html(loading_small);
      $.post("deleteCat.php",
             "CCC=<?php echo $catId?>",
          function(reterne){
              $("#categoriesStatus").html(reterne);
          })
  })

$("#editCat").click( function(examp){
      examp.preventDefault();
      $("#categoriesStatus").html(loading_small);
      $.post("editCategorie.php",
             "CCC=<?php echo $catId?>",
          function(reterne){
              $("#categoriesStatus").html(reterne);
          })
  })
</script>

<?php
   }          
?>
