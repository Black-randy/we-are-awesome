<?php
include 'dbcon.php';

if (isset($_GET['Order_id'])) {
    $orderId = $_GET['Order_id'];
    $qry = $conn->query("SELECT * FROM customer_orders WHERE Order_id = $orderId");
    $order = $qry->fetch_assoc();
} else {
    // Handle the case where Order_id is not set
    echo "Order ID not provided.";
    exit();
}

// Fetch additional data for dropdowns
$deliveryPersons = $conn->query("SELECT * FROM deliveryperson")->fetch_all(MYSQLI_ASSOC);
$ordertakers = $conn->query("SELECT * FROM ordertaker_person")->fetch_all(MYSQLI_ASSOC);
$pizzas = $conn->query("SELECT * FROM pizza")->fetch_all(MYSQLI_ASSOC);
$toppings = $conn->query("SELECT * FROM topping")->fetch_all(MYSQLI_ASSOC);
$foods = $conn->query("SELECT * FROM food")->fetch_all(MYSQLI_ASSOC);
$users = $conn->query("SELECT * FROM customers")->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fluent-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Edit Order</title>
</head>
<style>
	body{
        background: #efecff;
  }
</style>
<body>
<div class="glass-form" style="width: 600px;text-align: left;">
    <div class="container mt-5">
        <h2>Edit Order</h2>
        <form action="oders_edit_func.php" method="post">
            <div class="form-group">
                <label for="Order_id">Order ID:</label>
                <input type="text" class="form-control" name="Order_id" value="<?php echo $order['Order_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Order_type">Order Type:</label>
                <select class="form-control" name="Order_type" required>
                    <option value="Dine-in" <?php echo ($order['Order_type'] == 'Dine-in') ? 'selected' : ''; ?>>Dine-in</option>
                    <option value="Delivery" <?php echo ($order['Order_type'] == 'Delivery') ? 'selected' : ''; ?>>Delivery</option>
                    <option value="Take-away" <?php echo ($order['Order_type'] == 'Take-away') ? 'selected' : ''; ?>>Take-away</option>
                </select>
            </div>
            <div class="form-group">
                <label for="UserID">customer name:</label>
                <select class="form-control" name="UserID" required>
                    <?php
                    foreach ($users as $user) {
                        echo "<option value='{$user['UserID']}'" . ($order['UserID'] == $user['UserID'] ? 'selected' : '') . ">{$user['first_name']} {$user['last_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Pizza_id">Pizza:</label>
                <select class="form-control" name="Pizza_id" required>
                    <?php
                    foreach ($pizzas as $pizza) {
                        echo "<option value='{$pizza['Pizza_id']}'" . ($order['Pizza_id'] == $pizza['Pizza_id'] ? 'selected' : '') . ">{$pizza['Pizza_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="topping_1_id">Topping 1:</label>
                <select class="form-control" name="topping_1_id" required>
                    <?php
                    foreach ($toppings as $topping) {
                        echo "<option value='{$topping['Topping_id']}'" . ($order['topping_1_id'] == $topping['Topping_id'] ? 'selected' : '') . ">{$topping['Topping_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Repeat similar dropdowns for topping_2_id, topping_3_id, Food_id, etc. -->
            
            <div class="form-group">
                <label for="topping_2_id">Topping 2:</label>
                <select class="form-control" name="topping_2_id" required>
                    <?php
                    foreach ($toppings as $topping) {
                        echo "<option value='{$topping['Topping_id']}'" . ($order['topping_2_id'] == $topping['Topping_id'] ? 'selected' : '') . ">{$topping['Topping_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="topping_3_id">Topping 3:</label>
                <select class="form-control" name="topping_3_id" required>
                    <?php
                    foreach ($toppings as $topping) {
                        echo "<option value='{$topping['Topping_id']}'" . ($order['topping_3_id'] == $topping['Topping_id'] ? 'selected' : '') . ">{$topping['Topping_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="Food_id">Food:</label>
                <select class="form-control" name="Food_id" required>
                    <?php
                    foreach ($foods as $food) {
                        echo "<option value='{$food['Food_id']}'" . ($order['Food_id'] == $food['Food_id'] ? 'selected' : '') . ">{$food['Food_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="Order_date">Order Date:</label>
                <input type="text" class="form-control" name="Order_date" value="<?php echo $order['Order_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" required>
                <option value="1" <?php echo ($order['status'] == 1 ? 'selected' : ''); ?>>Pending ⏳</option>
                <option value="2" <?php echo ($order['status'] == 2 ? 'selected' : ''); ?>>Delivering 🚚</option>
                <option value="3" <?php echo ($order['status'] == 3 ? 'selected' : ''); ?>>Confirmed ✅</option>
                <option value="4" <?php echo ($order['status'] == 4 ? 'selected' : ''); ?>>Canceled ❌</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Order</button>
        </form>
    </div>
</div>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
