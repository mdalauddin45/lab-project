<?php
include 'includes/db.php';
include 'includes/functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Welcome to the Home Page</h2>
    <a href="logout.php">Logout</a>
    <div class="cards">
        <div class="card">
            <h3>Card 1</h3>
            <p>Some content for card 1.</p>
        </div>
        <div class="card">
            <h3>Card 2</h3>
            <p>Some content for card 2.</p>
        </div>
        <div class="card">
            <h3>Card 3</h3>
            <p>Some content for card 3.</p>
        </div>
    </div>
</body>
</html>