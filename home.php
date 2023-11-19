<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("location: login.php"); exit();
}

if(isset($_GET['logout']))
{
    unset($_SESSION['user']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home Page</title>
</head>
<body>
    <div class="top-bar">
        <div class="dropdown">
            <button class="buttonStyle">Menu</button>
            <div class="content">
                <a href="HW1.html">CV page</a>
                <a href="MyFirstWebPage.html">WebPage</a>
                <a href="Gal.html">My Gallery</a>
            </div>
        </div>
        <a class="logout-btn" href="login.php">Log out</a>

    </div>
    <div class="column">
        <div class="maincontainer">
            <h1 class="Title">Welcome to my website, <?php echo $_SESSION['user']; ?></h1>
        </div>
    </div>
</body>
</html>
