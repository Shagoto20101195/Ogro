<?php
    session_start();

    include("dbconnection.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="icon" href="images/Tom_evil_smile.jpg">
        <title>Ogro - Admin Home Page</title>
    </head>

    <body>
        <h1>Welcome <?php echo($_SESSION['userid']) ?></h1>
        <a href="logout.php">Logout</a>
    </body>
</html>