<?php
include __DIR__."/../DB/dbcon.php";
$sql = "SELECT users.UserID, users.LastName, users.FirstName, users.address, phoneno.phoneNo FROM users LEFT JOIN phoneno ON users.UserID = phoneno.UserID;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>User Table</h2>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td> <?php echo $row["UserID"] ?> </td>
                            <td> <?php echo $row["LastName"] ?> </td>
                            <td> <?php echo $row["FirstName"] ?> </td>
                            <td> <?php echo $row["address"] ?> </td>
                            <td> <?php echo $row["phoneNo"] ? $row["phoneNo"] : "Not Available" ?> </td>
                            <td> <button type='button' class='btn btn-danger'>
                                    <a class="text-light" href="/ABC/Delete/delete.php?id=<?php echo $row['UserID'] ?>"> Delete </a>
                                </button> </td>
                            <td> <button type='button' class='btn btn-warning'>
                                    <a class="text-light" href="/ABC/Update/update.php?id=<?php echo $row['UserID'] ?>"> Update </a>
                                </button> </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
