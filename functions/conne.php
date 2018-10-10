<?php
$imgUrls = "http://localhost/seller.teranoba.com/img/";

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
      $db_selected = mysqli_select_db($conn,"nobarwanda"); 
      }
?>