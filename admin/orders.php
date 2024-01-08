
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <title>Order Dashboard</title>
    <style>
    html,
    body,
    .intro {
      height: 90%;
    }
    
    table td,
    table th {
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
    }
    
    .card {
      border-radius: .5rem;
    }
    
    .table-scroll {
      border-radius: .5rem;
    }
    
    thead {
      top: 0;
      position: sticky;
    }
    </style>
</head>
<body>

<script>
$(document).ready(function () {
    $('.table').DataTable({
        "order": [[4, "desc"]] // Sort by the 5th column (Order Date) in descending order
    });
});
</script>

<?php
include "./dbcon.php";
?>

<h2>Orders Dashboard</h2>

<!-- Button to redirect to the form for adding new orders -->
<a href="./admin/add_order_form.php"><button>Add New Order</button></a>

<section class="intro">
  <div class="bg-image h-100" >
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card shadow-2-strong">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                  <table class="table table-dark mb-0">
                    <thead style="background-color: #393939;">
                      <tr class="text-uppercase text-success">
                        <th scope="col">Order ID</th>
                        <th scope="col">Order Type</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Pizza ID</th>
                        <th scope="col">Order Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                        <?php
                        // Fetch orders data with user names
                        $sql = "SELECT co.Order_id, co.Order_type, pu.first_name, pu.last_name, co.Pizza_id, co.Order_date
                                FROM customer_order co
                                INNER JOIN public_user pu ON co.UserID = pu.UserID";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $userName = $row['first_name'] . ' ' . $row['last_name'];
                                echo "<tr>
                                        <td>{$row['Order_id']}</td>
                                        <td>{$row['Order_type']}</td>
                                        <td>{$userName}</td>
                                        <td>{$row['Pizza_id']}</td>
                                        <td>{$row['Order_date']}</td>
                                     </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No orders found</td></tr>";
                        }
                        ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
// Close connection
$conn->close();
?>


</body>
</html>
