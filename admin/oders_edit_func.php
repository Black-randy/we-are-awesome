<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $orderId = $_POST['Order_id'];
    $orderType = $_POST['Order_type'];
    $userId = $_POST['UserID'];
    $pizzaId = $_POST['Pizza_id'];
    $topping1Id = $_POST['topping_1_id'];
    $topping2Id = $_POST['topping_2_id'];
    $topping3Id = $_POST['topping_3_id'];
    $foodId = $_POST['Food_id'];
    $orderDate = $_POST['Order_date'];
    $status = $_POST['status'];

    // Update the order in the database
    $updateQuery = "UPDATE customer_orders SET
                    Order_type = '$orderType',
                    UserID = '$userId',
                    Pizza_id = '$pizzaId',
                    topping_1_id = '$topping1Id',
                    topping_2_id = '$topping2Id',
                    topping_3_id = '$topping3Id',
                    Food_id = '$foodId',
                    Order_date = '$orderDate',
                    status = '$status'
                    WHERE Order_id = $orderId";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Order updated successfully";
        // Redirect to home.php after successful update
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error updating order: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to an error page or handle the situation accordingly
    echo "Invalid request method";
}
?>
