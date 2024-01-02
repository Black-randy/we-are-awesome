<?php
include __DIR__."/../DB/dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Change to 'email'
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $phonesql = "SELECT phoneNo FROM phoneno WHERE UserID = '$id'";
    $resultPhone = mysqli_query($conn, $phonesql);

    if (mysqli_num_rows($resultPhone) === 1) {
        $updatePhone = "UPDATE phoneno SET phoneNo = '$phone' WHERE UserID = '$id'";
        mysqli_query($conn, $updatePhone);
    } else {
        $updatePhone = "INSERT INTO phoneno (phoneNo, UserID) VALUES ('$phone', '$id')";
        mysqli_query($conn, $updatePhone);
    }

    $updateUser = "UPDATE users SET FirstName = '$email', address = '$address' WHERE UserID = '$id'"; // Change to 'email'
    $result = mysqli_query($conn, $updateUser);

    header("Location:/../ABC/index.php");
} else {
    // Handle cases where the form was not submitted
    echo "Invalid request";
}
?>
