<?php
// pizza_delete.php

// Check if the pizza_id is set in the URL
if (isset($_GET['pizza_id'])) {
    // Include the database connection file
    include '../dbcon.php';

    // Sanitize the input to prevent SQL injection
    $pizzaID = mysqli_real_escape_string($conn, $_GET['pizza_id']);

    // Perform the delete query
    $deleteQuery = "DELETE FROM pizza WHERE pizza_id = $pizzaID";

    if ($conn->query($deleteQuery)) {
        // If the deletion is successful, redirect to the customers page
        echo "Deleted";
        // header("Location: ../home.php");
        exit();
    } else {
        // If an error occurs, you can handle it accordingly (display an error message, log the error, etc.)
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If pizza_id is not set in the URL, redirect to the 404 page
    header("Location: ../404.html");
    exit();
}
?>
