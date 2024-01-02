<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/GlassmorphismStyles.css">
    <link rel="stylesheet" href="./css/BackgroundAnimationStyles.css">

    <title>Login 👤</title>
</head>
<body>
    <div class="wrapper">
            <div class="container">
                <div class="glass-container">
                    <form action="loginvarify.php" method="post" class="glass-form">
                        <h1>Login</h1>
                        <?php echo isset($_GET['error'])? '<p class="error">' . $_GET['error'] . '</p>' : "<p></p>" ;?>
                        <input type='text'      name='uname'    placeholder="Please enter your User Name"   class="text-field" required>
                        <input type='password'  name='password' placeholder="Please enter your Password"    class="text-field" required>
                        <button type="submit">Login</button>
                    </form>
                </div>
                <a href="/reset-password" class="below-card-link">Forgot your password?</a>
            </div>
    </div>
</body>
</html>
