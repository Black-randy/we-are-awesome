<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "weareawesome";

//create connection
$conn = new mysqli($servername, $username, $password, $db_name);

//check connection
if($conn->connect_error) {
 die("connection faild:" . $conn->connect_error);
}
// echo "conneted successfully";
?>
		