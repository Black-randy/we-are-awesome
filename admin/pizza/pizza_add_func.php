<?php
include '../dbcon.php';

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pizza_name = $_POST["pizza_name"];
    $pizza_type = $_POST["pizza_type"];
    $price = $_POST["price"];

    $sql = "INSERT INTO pizza (pizza_name, pizza_type, price) 
            VALUES ('$pizza_name', '$pizza_type', '$price')";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        echo "User updated successfully";
        // Redirect to home.php after successful update
        header("Location: /weareawesome/home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
