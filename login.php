<?php
    require_once("dbconnection.php");
?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="icon" href="images/Tom_evil_smile.jpg">
        <title>Orgo - Login</title>
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
                <form action="validate.php" method="post">
                    <label for="username"><h1> Please enter your username:</h1></label>
                    <input type="text" id="username" name="username">
                    <br> <br>
                    <input type="submit" value="Login">
                </form>
            </div>
        </main>

        <footer>
            <div class="bottom-section">
                <p>&copy; Unknown</p>
                <a href="#"> Back To Top</a>
            </div>
        </footer>
    </body>
</html>