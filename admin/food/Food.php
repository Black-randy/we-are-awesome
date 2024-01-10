<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage food</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <style>
        body {
            background: #efecff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h2>Manage food</h2>
        <div class="row">
            <div class="col-lg-12">
                <a href="admin/food/food_add.php">
                    <button class="btn btn-primary float-right btn-sm" id="new_user">
                        <i class="fa fa-plus"></i> Add New food
                    </button>
                </a>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="card" style="border-radius: 1.25rem;">
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="foodTable">
                        <thead>
                            <tr>
                                <th class="text-center">food ID</th>
                                <th class="text-center">food Name</th>
                                <th class="text-center">food Category</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include '../dbcon.php';

                            // Use a SQL JOIN to get category names instead of IDs
                            $stmt = $conn->prepare("SELECT food.food_id, food.food_name, product_catagories.products_type_name as food_Category, food.Price
                                                FROM food
                                                INNER JOIN product_catagories ON food.food_type = product_catagories.product_type_id
                                                ORDER BY food.food_id ASC");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Fetch data using associative array
                            while ($row = $result->fetch_assoc()):
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['food_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['food_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['food_Category']); ?></td>
                                    <td><?php echo htmlspecialchars($row['Price']); ?></td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a href="admin/food/food_edit.php?food_id=<?php echo htmlspecialchars($row['food_id']); ?>"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <a href="admin/food/food_delete.php?food_id=<?php echo htmlspecialchars($row['food_id']); ?>"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                            <?php
                            // Close the prepared statement and result set
                            $stmt->close();
                            $result->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Use $(document).ready shorthand
        $(function () {
            $('#foodTable').DataTable();
        });
    </script>
</body>

</html>
