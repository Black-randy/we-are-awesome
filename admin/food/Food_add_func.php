<?php
include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the form is submitted using POST method

    // Retrieve and sanitize form data
    $food_id = mysqli_real_escape_string($conn, $_POST['food_id']);
    $food_name = mysqli_real_escape_string($conn, $_POST['food_name']);
    $food_type = mysqli_real_escape_string($conn, $_POST['food_type']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Perform insert query
    $insertQuery = "INSERT INTO food (food_id,food_name,food_type,price) VALUES ('$food_id','$food_name', '$food_type', $price)";

    if ($conn->query($insertQuery) === TRUE) {
        // Insert successful
        echo "Food added successfully";
        // Redirect to home.php or desired page after successful insert
        header("Location: /weareawesome/home.php");
        exit();
    } else {
        // Handle insert failure
        echo "Error adding record: " . $conn->error;
    }
} else {
    // Redirect or handle accordingly for invalid requests
    echo "Invalid request method.";
}
?>
