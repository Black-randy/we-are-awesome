<?php
include __DIR__."/../DB/dbcon.php";

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Insert user information into the users table
$sql = "INSERT INTO users (FirstName, address) VALUES ('$name','$address')";
$resultUser = mysqli_query($conn, $sql);

if ($resultUser) {
    // If user insertion is successful, get the inserted user's ID
    $userId = mysqli_insert_id($conn);

    // Insert phone number into the phoneno table
    $insertPhone = "INSERT INTO phoneno (UserID, phoneNo) VALUES ('$userId', '$phone')";
    $resultPhone = mysqli_query($conn, $insertPhone);

    if (!$resultPhone) {
        // Handle the case where phone number insertion fails
        echo "Error inserting phone number: " . mysqli_error($conn);
    }
} else {
    // Handle the case where user insertion fails
    echo "Error inserting user: " . mysqli_error($conn);
}

// Redirect to the main page
header("Location:/../ABC/index.php");
?>
