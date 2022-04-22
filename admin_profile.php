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
        <title>Ogro - <?php echo($_SESSION['user']['name']); ?></title>
    </head>

    <body>
        <header>
            <div class="top-section">
                <h1><abbr title="Online Agro">OGRO</abbr></h1>
                <h3><i>Intended to serve a community of animal buyers and sellers across the country</i></h3>
                <br> <br>
                <span><a href="admin_homepage.php" class="home-logout">Home</a></span>
                |
                <span><a href="admin_profile.php" class="home-logout"><?php echo($_SESSION['user']['name']); ?></a></span>
                |
                <span><a href="logout.php" class="home-logout">Logout</a></span>
            </div>  
        </header>

        <main>
            <div class="middle-section">

                <div style="word-wrap: break-word;">
                <h1>Name:<br>
                <?php echo($_SESSION['user']['name']); ?>
                </h1>
                <hr>
                <h2>Email:<br>
                <?php echo($_SESSION['user']['email']); ?>
                </h2>
                <hr>
                <h2>User ID:<br>
                <?php echo($_SESSION['user']['a_id']); ?>
                </h2>
                </div>
                
            </div>
        </main>

        <footer>
            <div class="bottom-section">
                <p>&copy; <a href="admin_listpage.php" class="home-logout">Administration</a></p>
                
                <a href="#" class="home-logout"> Back To Top</a>
            </div>
        </footer>
    </body>
</html>