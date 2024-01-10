<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pizza</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
</head>
<style> body{background: #efecff;}</style>
<body>

<div class="container-fluid">
    <h2>Manage Pizza</h2>
    <div class="row">
        <div class="col-lg-12">
            <a href="admin/pizza/pizza_add.php">
                <button class="btn btn-primary float-right btn-sm" id="new_pizza">
                    <i class="fa fa-plus"></i> Add New Pizza
                </button>
            </a>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="card" style="border-radius: 1.25rem;">
            <div class="card-body">
                <table class="table table-striped table-bordered" id="pizzaTable">
                    <thead>
                        <tr>
                            <th class="text-center">Pizza ID</th>
                            <th class="text-center">Pizza Name</th>
                            <th class="text-center">Pizza Category</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../dbcon.php';
                        $query = "SELECT pizza.pizza_id, pizza.pizza_name, pizza.price, pizza_catagories.pizza_category_name
                                  FROM pizza
                                  INNER JOIN pizza_catagories ON pizza.pizza_type = pizza_catagories.pizza_category_id
                                  ORDER BY pizza.pizza_id ASC";
                                  
                        $pizza = $conn->query($query);
                        
                        while ($row = $pizza->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?= $row['pizza_id'] ?></td>
                            <td><?= $row['pizza_name'] ?></td>
                            <td><?= $row['pizza_category_name'] ?></td>
                            <td class="text-right"><?= $row['price'] ?></td>
                            <td>
                                <center>
                                    <div class="btn-group">
                                        <a href="admin/pizza/pizza_edit.php?pizza_id=<?= $row['pizza_id'] ?>" class="btn btn-sm btn-primary"> Edit </a>
                                        <a href="admin/pizza/pizza_delete.php?pizza_id=<?= $row['pizza_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<!-- DataTables Initialization -->
<script>
    $(document).ready(function () {
        $('#pizzaTable').DataTable();
    });
</script>

</body>
</html>
