<?php
include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the form is submitted using POST method

    // Retrieve and sanitize form data
    $food_id = $_POST['food_id'];
    $food_name = mysqli_real_escape_string($conn, $_POST['food_name']);
    $food_type = mysqli_real_escape_string($conn, $_POST['food_type']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Perform update query
    $updateQuery = "UPDATE food SET 
                    Food_name='$food_name', 
                    Food_type='$food_type', 
                    price=$price
                    WHERE food_id=$food_id";

    if ($conn->query($updateQuery) === TRUE) {
        // Update successful
        echo "Food updated successfully";
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
