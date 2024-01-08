<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fluent-ui.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <title>Login 👤</title>
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                        <h2 class="card-title mb-4">Welcome!</h2>
                        <form  action="loginvarify.php" method="post">
                        <?php echo isset($_GET['error'])? '<p class="error">' . $_GET['error'] . '</p>' : "<p></p>" ;?>
                        <input type="text" name="uname" placeholder="Please enter your User Name" class="form-control text-field" required>
                        <input type="password" name="password" placeholder="Please enter your Password" class="form-control text-field" required>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="/reset-password">Forgot your password?</a>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (Optional, for Bootstrap features that require them) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
