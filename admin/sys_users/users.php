<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System User Accounts</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function () {
            $('table').DataTable(); // Changed from dataTable to DataTable
        });
    </script>
</head>

<body>

    <div class="container-fluid">
        <h2>System User Accounts</h2>
        <div class="row">
            <div class="col-lg-12">
                <a href="admin/sys_users/users_add.php">
                    <button class="btn btn-primary float-right btn-sm" id="new_user">
                        <i class="fa fa-plus"></i> Add New User
                    </button>
                </a>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="card" style="border-radius: 1.25rem;">
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="userTable">
                        <thead>
                            <tr>
                                <th class="text-center">User ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../dbcon.php';
                            $users = $conn->query("SELECT * FROM sys_users ORDER BY sys_users_id ASC");
                            while ($row = $users->fetch_assoc()) :
                            ?>
                                <tr>
                                    <td><?= $row['sys_users_id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['password'] ?></td>
                                    <td>
                                        <?php
                                        switch ($row['role']) {
                                            case 1:
                                                echo "Admin";
                                                break;
                                            case 2:
                                                echo "Order Taker";
                                                break;
                                            case 3:
                                                echo "Delivery";
                                                break;
                                            case 4:
                                                echo "Not Defined Yet";
                                                break;
                                            default:
                                                echo "Unknown Role";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="btn-group">
                                                <a href="admin/sys_users/users_edit.php?sys_users_id=<?= $row['sys_users_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="admin/sys_users/users_delete.php?sys_users_id=<?= $row['sys_users_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
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

</body>

</html>
