<?php
include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the form is submitted using POST method

    // Retrieve and sanitize form data
    $pizza_id = $_POST['pizza_id'];
    $pizza_name = mysqli_real_escape_string($conn, $_POST['pizza_name']);
    $pizza_category = mysqli_real_escape_string($conn, $_POST['pizza_category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Perform update query
    $updateQuery = "UPDATE pizza SET 
                    pizza_name='$pizza_name', 
                    pizza_type='$pizza_category', 
                    price=$price
                    WHERE pizza_id=$pizza_id";

    if ($conn->query($updateQuery) === TRUE) {
        // Update successful
        echo "Pizza updated successfully";
        // Redirect to home.php after successful update
        header("Location: /weareawesome/home.php");
        exit();
    } else {
        // Handle update failure
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Redirect or handle accordingly for invalid requests
    echo "Invalid request method.";
}
?>
