<?php
// customers_Delete.php

// Check if the Order_id is set in the URL
if(isset($_GET['Order_id'])) {
    // Include the database connection file
    include 'dbcon.php';

    // Sanitize the input to prevent SQL injection
    $Order_id = mysqli_real_escape_string($conn, $_GET['Order_id']);

    // Perform the delete query
    $deleteQuery = "DELETE FROM customer_orders WHERE Order_id = '$Order_id'";
    if($conn->query($deleteQuery)) {
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
    // If Order_id is not set in the URL, redirect to the customers page
    header("Location: ../404.html");
    exit();
}
?>
