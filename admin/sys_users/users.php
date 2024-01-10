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
<h2>system user accounts</h2>
	<div class="row">
	<div class="col-lg-12">
	<a href="admin/sys_users/users_add.php"><button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> Add New User</button></a>
	</div>
	</div>
	<br>
    <div class="container-fluid">
	    <div class="card"style="border-radius: 1.25rem;">
			<div class="card-body" >
				<!-- <div class="table-responsive"> -->
					<table class="table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">User ID</th>
								<th class="text-center">Name</th>
								<th class="text-center">Usename</th>
								<th class="text-center">password</th>
								<th class="text-center">Role</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include '../dbcon.php';
								$users = $conn->query("SELECT * FROM sys_users order by sys_users_id asc");
								$i = 1;
								while($row= $users->fetch_assoc()):
							?>
							<tr>
								<td>
									<?php echo $row['sys_users_id'] ?>
								</td>								
								<td>
									<?php echo $row['name'] ?>
								</td>
								<td>
									<?php echo $row['username'] ?><?php echo " " ?>
								</td>
								<td>
									<?php echo $row['password'] ?>
								</td>
								<td>
									<?php
    									$role = $row['role'];
    									if ($role == 1) {
    									    echo "Admin";
    									} elseif ($role == 2) {
    									    echo "Order Taker";
    									} elseif ($role == 3) {
    									    echo "Delivery";
    									} elseif ($role == 4) {
    									    echo "Not Defined Yet";
    									} else {
    									    echo "Unknown Role"; // Handle unexpected role values
    									}
    								?>
								</td>
								
								<td>
									<center>
											<div class="btn-group">
											<a href="admin/sys_users/users_edit.php?sys_users_id=<?php echo $row['sys_users_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
											<a href="admin/sys_users/users_delete.php?sys_users_id=<?php echo $row['sys_users_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
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
