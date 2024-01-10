<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the form is submitted using POST method

    // Retrieve and sanitize form data
    $userID = $_POST['UserID'];
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
    $order_count = mysqli_real_escape_string($conn, $_POST['order_count']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    // Add lines for other fields

    // Perform update query
    $updateQuery = "UPDATE customers SET 
                    first_name='$first_name', 
                    last_name='$last_name', 
                    user_email='$user_email', 
                    phone_no='$phone_no', 
                    Order_count='$order_count', 
                    address='$address'
                    WHERE UserID=$userID";
    // Add lines for other fields

    if ($conn->query($updateQuery) === TRUE) {
        // Update successful
        // header("Location: customers_edit.php?UserID=$userID");
        echo "customer updated successfully";
        // Redirect to home.php after successful update
        header("Location: ../home.php");
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
