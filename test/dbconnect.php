<?php 	

$localhost = "localhost";
$username = "root";
$password = "";
// db connection
$connect = new mysqli($localhost, $username, $password);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>