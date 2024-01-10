<?php
// customers_Delete.php

// Check if the UserID is set in the URL
if(isset($_GET['UserID'])) {
    // Include the database connection file
    include 'dbcon.php';

    // Sanitize the input to prevent SQL injection
    $userID = mysqli_real_escape_string($conn, $_GET['UserID']);

    // Perform the delete query
    $deleteQuery = "DELETE FROM customers WHERE UserID = $userID";
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
    // If UserID is not set in the URL, redirect to the customers page
    header("Location: ../404.html");
    exit();
}
?>
