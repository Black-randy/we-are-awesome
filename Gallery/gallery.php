<?php
include __DIR__."/../DB/dbcon.php";
include __DIR__."/../Header/header.html";
$sql = "SELECT * FROM `gallery`;";
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
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {?>
                    <div class="card text-white bg-dark mb-3" style="width: 12rem;">
                        <img src="../Assets/Images/<?php echo $row["photo"]?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["title"] ?></h5>
                            <p class="card-text"><?php echo $row["description"] ?> </p>
                            <a href="/day9/Gallery/item?<?php echo $row["id"] ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
        <?php } } ?>
    </div>
</body>

</html>
<?php
include __DIR__."/../Footer/footer.html";
?>