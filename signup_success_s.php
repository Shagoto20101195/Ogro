<?php
    session_start();
    require_once("dbconnection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" href="images/Tom_evil_smile.jpg">
    <title>Ogro - Signup Successful</title>
</head>
    
<body>
    <header>
        <div class="top-section">
            <h1><abbr title="Online Agro">OGRO</abbr></h1>
            <h3><i>Intended to serve a community of animal buyers and sellers across the country</i></h3>
        </div>  
    </header>

    <main>
        <div class="middle-section">
            <div>
                <h1 style="text-align: center;">Dear user, your signup was successful and unique id is: <?php
                    echo($_SESSION['user']['s_id']);
                    unset($_SESSION['user']);
                ?></h1>
                <h1 style="text-align: center;">Please use your this id to login anytime and make sure you do not forget it!</h1>
                <h1 style="text-align: center;"><a href="login.php">Login Now</a></h1>
            </div>
         </div>
    </main>

    <footer>
        <div class="bottom-section">
            <p>&copy; Unknown</p>
            <span><a href="#" class="home-logout">Back To Top</a></span>
            |
            <span><a href="index.html" class="home-logout">Back To Home</a></span>
        </div>
    </footer>
</body>
</html>