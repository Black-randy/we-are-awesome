<?php
include 'dbcon.php';

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["user_email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone_no = $_POST["phone_no"];
    $User_loyalty = $_POST["User_loyalty"];
    $User_Birthday = $_POST["User_Birthday"];
    $address = $_POST["address"];

    $sql = "INSERT INTO customers (user_email, first_name, last_name, phone_no, User_loyalty, User_Birthday, address) 
            VALUES ('$user_email', '$first_name', '$last_name', '$phone_no', '$User_loyalty', '$User_Birthday', '$address')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the previous page
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
