<!DOCTYPE html>
<html lang="en">
<head>
  <title> Signup 👤</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/GlassmorphismStyles.css">
  <link rel="stylesheet" href="./css/BackgroundAnimationStyles.css">
</head>
<body>
  <div class="wrapper">
    <div class="container">
      <div class="singup-glass-container">
        <form action="signupdb.php" method="post" class="glass-form">
          <h1>Signup</h1>
          <label for="firstName">First Name:</label>
          <input type="text" id="firstName" name="firstName" class="text-field" required>
          <label for="lastName">Last Name:</label>
          <input type="text" id="lastName" name="lastName" class="text-field" required>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" class="text-field" required>
          <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
