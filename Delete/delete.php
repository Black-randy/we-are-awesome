<?php
include __DIR__."/../DB/dbcon.php";
//echo $_POST["name"];
//echo $_POST["address"];

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE UserID = $id";
$result = mysqli_query($conn, $sql);
echo $result ;
header("Location:../index.php");

?>