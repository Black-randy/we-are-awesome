<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard</title>
    <link rel="stylesheet" href="../css/fluent-ui.css">
</head>

<body>

    <?php
    include "./dbcon.php";

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $orderType = $_POST["orderType"];
        $userId = $_POST["userId"];
        $pizzaId = $_POST["pizzaId"];
        $topping1Id = $_POST["topping1Id"];
        $topping2Id = $_POST["topping2Id"];
        $topping3Id = $_POST["topping3Id"];
        $pizzaSize = $_POST["pizzaSize"];
        $foodId = $_POST["foodId"];
        $menuId = $_POST["menuId"];
        $deliveryPersonId = $_POST["deliveryPersonId"];
        $orderTakerId = $_POST["orderTakerId"];

        // Use prepared statements to prevent SQL injection
        $sql = $conn->prepare("INSERT INTO customer_order (Order_type, UserID, Pizza_id, topping_1_id, topping_2_id, topping_3_id, Pizza_size, Food_id, Menu_id, DeliveryPerson_id, OrderTaker_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $sql->bind_param("siiiiisiiii", $orderType, $userId, $pizzaId, $topping1Id, $topping2Id, $topping3Id, $pizzaSize, $foodId, $menuId, $deliveryPersonId, $orderTakerId);

        // Execute the query
        if ($sql->execute()) {
            echo "New order added successfully";
        } else {
            echo "Error: " . $sql->error;
        }

        // Close the statement
        $sql->close();
    }
    ?>

    <!-- Form for adding new orders -->
    <div class="glass-form">
        <h2>Add New Order</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Order Type:
            <select class="text-field" name="orderType">
                <option value="Dine-in">Dine-in</option>
                <option value="Take-away">Take-away</option>
                <option value="Delivery">Delivery</option>
            </select><br>

            User ID:
            <select class="text-field" name="userId">
                <?php
                $queryUser = "SELECT UserID, first_name FROM public_user";
                $resultUser = mysqli_query($conn, $queryUser);
                while ($rowUser = mysqli_fetch_assoc($resultUser)) {
                    echo "<option value='{$rowUser['UserID']}'>{$rowUser['first_name']}</option>";
                }
                ?>
            </select><br>

            Pizza ID:
            <select class="text-field" name="pizzaId">
                <?php
                $queryPizza = "SELECT Pizza_id, Pizza_name FROM pizza";
                $resultPizza = mysqli_query($conn, $queryPizza);
                while ($rowPizza = mysqli_fetch_assoc($resultPizza)) {
                    echo "<option value='{$rowPizza['Pizza_id']}'>{$rowPizza['Pizza_name']}</option>";
                }
                ?>
            </select><br>

            Topping 1 ID:
            <select class="text-field" name="topping1Id">
                <?php
                $queryTopping = "SELECT Topping_id, Topping_name FROM topping";
                $resultTopping = mysqli_query($conn, $queryTopping);
                while ($rowTopping = mysqli_fetch_assoc($resultTopping)) {
                    echo "<option value='{$rowTopping['Topping_id']}'>{$rowTopping['Topping_name']}</option>";
                }
                ?>
            </select><br>

            Topping 2 ID:
            <select class="text-field" name="topping2Id">
                <?php
                mysqli_data_seek($resultTopping, 0);
                while ($rowTopping = mysqli_fetch_assoc($resultTopping)) {
                    echo "<option value='{$rowTopping['Topping_id']}'>{$rowTopping['Topping_name']}</option>";
                }
                ?>
            </select><br>

            Topping 3 ID:
            <select class="text-field" name="topping3Id">
                <?php
                mysqli_data_seek($resultTopping, 0);
                while ($rowTopping = mysqli_fetch_assoc($resultTopping)) {
                    echo "<option value='{$rowTopping['Topping_id']}'>{$rowTopping['Topping_name']}</option>";
                }
                ?>
            </select><br>

            Pizza Size:
            <select class="text-field" name="pizzaSize">
                <option value="Personal">Personal</option>
                <option value="Regular">Regular</option>
                <option value="Large">Large</option>
            </select><br>

            Food ID:
            <select class="text-field" name="foodId">
                <?php
                $queryFood = "SELECT Food_id, Food_name FROM food";
                $resultFood = mysqli_query($conn, $queryFood);
                while ($rowFood = mysqli_fetch_assoc($resultFood)) {
                    echo "<option value='{$rowFood['Food_id']}'>{$rowFood['Food_name']}</option>";
                }
                ?>
            </select><br>

            Menu ID:
            <select class="text-field" name="menuId">
                <?php
                $queryMenu = "SELECT Menu_id, Menu_Name FROM menu";
                $resultMenu = mysqli_query($conn, $queryMenu);
                while ($rowMenu = mysqli_fetch_assoc($resultMenu)) {
                    echo "<option value='{$rowMenu['Menu_id']}'>{$rowMenu['Menu_Name']}</option>";
                }
                ?>
            </select><br>

            Delivery Person ID:
            <select class="text-field" name="deliveryPersonId">
                <?php
                $queryDeliveryPerson = "SELECT Deliveryperson_id, Deliveryperson_name FROM deliveryperson";
                $resultDeliveryPerson = mysqli_query($conn, $queryDeliveryPerson);
                while ($rowDeliveryPerson = mysqli_fetch_assoc($resultDeliveryPerson)) {
                    echo "<option value='{$rowDeliveryPerson['Deliveryperson_id']}'>{$rowDeliveryPerson['Deliveryperson_name']}</option>";
                }
                ?>
            </select><br>

            Order Taker ID:
            <select class="text-field" name="orderTakerId">
                <?php
                $queryOrderTaker = "SELECT OrderTaker_id, OrderTaker_name FROM ordertaker_person";
                $resultOrderTaker = mysqli_query($conn, $queryOrderTaker);
                while ($rowOrderTaker = mysqli_fetch_assoc($resultOrderTaker)) {
                    echo "<option value='{$rowOrderTaker['OrderTaker_id']}'>{$rowOrderTaker['OrderTaker_name']}</option>";
                }
                ?>
            </select><br>

            <button type="submit">Add Order</button>
        </form>
    </div>

    <?php
    // Close connection
    $conn->close();
    ?>

</body>

</html>
