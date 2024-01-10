<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
$('table').dataTable()
</script>


<div class="container-fluid">
<h2>Oders Page</h2>
<div class="row">
	<div class="col-lg-12">
      <a href="admin/oders_add.php"><button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> Add New oder</button></a>
	</div>
	</div>
  <br>
    
  <div class="container-fluid">
  <div class="card"style="border-radius: 1.25rem;">
			<div class="card-body">
				<!-- <div class="table-responsive"> -->
					<table class="table-striped table-bordered">
						<thead>
							<tr>
                <th class="text-center">Order_id</th>
                <th class="text-center">Order_type</th>
                <th class="text-center">Pizza</th>
                <th class="text-center">topping 1</th>
                <th class="text-center">topping 2</th>
                <th class="text-center">topping 3</th>
                <th class="text-center">Food</th>
                <th class="text-center">Order_date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                            <?php
                            $i = 1;
                            include 'dbcon.php';
                            $qry = $conn->query("SELECT * FROM customer_orders");
                            while ($row = $qry->fetch_assoc()) :
                                ?>
                                <tr>
                                    <td><?php echo $row['Order_id'] ?></td>
                                    <td><?php echo $row['Order_type'] ?></td>
                                    <td><?php echo getPizzaName($row['Pizza_id'], $conn) ?></td>
                                    <td><?php echo getToppingName($row['topping_1_id'], $conn) ?></td>
                                    <td><?php echo getToppingName($row['topping_2_id'], $conn) ?></td>
                                    <td><?php echo getToppingName($row['topping_3_id'], $conn) ?></td>
                                    <td><?php echo getFoodName($row['Food_id'], $conn) ?></td>
                                    <td><?php echo $row['Order_date'] ?></td>
                                    <?php if ($row['status'] == 1) : ?>
                                        <td class="text-center"><span class="badge badge-secondary">Pending</span></td>
                                    <?php elseif ($row['status'] == 2) : ?>
                                        <td class="text-center"><span class="badge badge-primary">Delivering</span></td>
                                    <?php elseif ($row['status'] == 3) : ?>
                                        <td class="text-center"><span class="badge badge-success">Confirmed</span></td>
                                    <?php elseif ($row['status'] == 4) : ?>
                                        <td class="text-center"><span class="badge badge-danger">Canceled</span></td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <center>
									                      		<div class="btn-group">
									                      		<a href="admin/oders_edit.php?Order_id=<?php echo $row['Order_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
									                      		<a href="admin/oders_delete.php?Order_id=<=<?php echo $row['Order_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
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
</div>

<?php
function getPizzaName($pizzaId, $conn)
{
    $query = $conn->query("SELECT Pizza_name FROM pizza WHERE Pizza_id = $pizzaId");
    $result = $query->fetch_assoc();
    return $result ? $result['Pizza_name'] : 'N/A';
}

function getToppingName($toppingId, $conn)
{
    $query = $conn->query("SELECT Topping_name FROM topping WHERE Topping_id = $toppingId");
    $result = $query->fetch_assoc();
    return $result ? $result['Topping_name'] : 'N/A';
}

function getFoodName($foodId, $conn)
{
    $query = $conn->query("SELECT Food_name FROM food WHERE Food_id = $foodId");
    $result = $query->fetch_assoc();
    return $result ? $result['Food_name'] : 'N/A';
}
?>



<script>
    $(document).ready(function() {
        // Initialize DataTable
        //  var table = $('#ordersTable').DataTable();

        // Handle click events without AJAX
        $('#ordersTable tbody').on('click', '.edit_order', function(e) {
            e.preventDefault();
            var orderId = $(this).data('id');
            location.href = 'admin/oders_edit.php?action=edit&Order_id=' + orderId;
        });
    });
</script>
