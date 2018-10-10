<?php
$servername = "localhost";
$username = "teranoba_user";
$password = "teranoba";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
      $db_selected = mysqli_select_db($conn,"teranoba_db");
      
      }
?>