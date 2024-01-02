<?php

include __DIR__."/Header/header.html";
session_start();

$user = $_SESSION['user'];
$role = $_SESSION['role'];

if (!$user == null) {
    echo "<div class='status-bar'>";
    echo "Welcome " . $user;
    if ($role == 1) {
        echo "<br>You have logged in as admin";
    } else {
        echo "<br>You have logged in as user";
    }
    echo "<br>";
    echo "<a href='logout.php'>Log Out </a>";
    echo "</div>";
} else {
    header("Location:index.php?error=Please login to continue");
}

include __DIR__."/Footer/footer.html";
?>
