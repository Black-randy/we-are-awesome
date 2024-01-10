<?php
include 'dbcon.php';

$users = $conn->query("SELECT * FROM customers ORDER BY UserID ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Customers Page</title>

   <!-- Include jQuery -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   <!-- Include Bootstrap JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

   <!-- Include DataTables CSS and JS -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

   <script>
      $(document).ready(function () {
         $('table').DataTable();
      });
   </script>
</head>
<body>

<div class="container-fluid">
   <h2>Customers Page</h2>
   <div class="row">
      <div class="col-lg-12">
         <a href="admin/customer_add.php">
            <button class="btn btn-primary float-right btn-sm" id="new_user">
               <i class="fa fa-plus"></i> Add New Customer
            </button>
         </a>
      </div>
   </div>
   <br>

   <div class="card" style="border-radius: 1.25rem;">
      <div class="card-body">
         <table class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">User_loyalty</th>
                  <th class="text-center">Phone NO</th>
                  <th class="text-center">Order Count</th>
                  <th class="text-center">User_Birthday</th>
                  <th class="text-center">Address</th>
                  <th class="text-center">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php while ($row = $users->fetch_assoc()): ?>
                  <tr>
                     <td><?= $row['UserID'] ?></td>
                     <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
                     <td><?= $row['user_email'] ?></td>
                     <td><?= $row['User_loyalty'] ?></td>
                     <td><?= $row['phone_no'] ?></td>
                     <td><?= $row['Order_count'] ?></td>
                     <td><?= $row['User_Birthday'] ?></td>
                     <td><?= $row['address'] ?></td>
                     <td>
                        <center>
                           <div class="btn-group">
                              <a href="admin/customers_edit.php?UserID=<?= $row['UserID'] ?>" class="btn btn-sm btn-primary">Edit</a>
                              <a href="admin/customers_delete.php?UserID=<?= $row['UserID'] ?>" class="btn btn-sm btn-danger">Delete</a>
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

</body>
</html>
