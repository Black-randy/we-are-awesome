<?php
include __DIR__."/../Header/header.html";
include __DIR__."/../DB/dbcon.php";

$userID = $_GET['id'];
$sql = "SELECT users.UserID, users.LastName, users.FirstName, users.address, phoneno.phoneNo FROM users LEFT JOIN phoneno ON users.UserID = phoneno.UserID WHERE users.UserID = $userID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
} else {
    // Handle the case where no user is found
    echo "User not found!";
    exit; // Stop execution if the user is not found
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Titile</title>
</head>

<body>
    <div class="container" style="margin-top: 2rem">
        <h2>UPDATE USER</h2>
        <div class=" row" style="margin-top: 4rem">
            <div class="col">

                <form action="update_function.php?id=<?php echo $userID?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="<?php echo $row["FirstName"] ?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputPassword1"
                            value="<?php echo $row["address"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phoneNumber"
                            value="<?php echo $row["phoneNo"] ?>">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>

<?php
include __DIR__."/../Footer/footer.html";
?>
