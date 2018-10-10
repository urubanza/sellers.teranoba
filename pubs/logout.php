<html>
<head>
    <title> logout teranoba :: sellers </title>
</head>
<body>
    <h1> teranoba :: sellers :: pages </h1>
<?php
session_start();
if(session_destroy())
{
  ?>
    <script>
		window.location = "../";
    </script>
  <?php
}
?>
</body>  
</html>