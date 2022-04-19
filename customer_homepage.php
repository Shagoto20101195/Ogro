<?php
    session_start();

    include("dbconnection.php");
    //$query = "select * from admin";
    //$result = mysqli_query($connect, $query);
    //echo($result);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="icon" href="images/Tom_evil_smile.jpg">
        <title>Ogro - Customer Home Page</title>
    </head>

    <body>
        <header>
            <div class="top-section">
                <h1><abbr title="Online Agro">OGRO</abbr></h1>
                <h3><i>Intended to serve a community of animal buyers and sellers across the country</i></h3>
                <br> <br>
                <span><a href="customer_homepage.php" class="home-logout">Home</a></span>
                |
                <span><a href="logout.php" class="home-logout">Logout</a></span>
            </div>  
        </header>

        <main>
            <div class="middle-section">
                <h1>Welcome <?php echo($_SESSION['a_id']);?></h1>
            </div>
        </main>

        <footer>
            <div class="bottom-section">
                <p>&copy; Unknown</p>
                
                <a href="#" class="home-logout"> Back To Top</a>
            </div>
        </footer>
    </body>
</html>