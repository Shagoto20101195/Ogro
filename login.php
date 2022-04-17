<?php
    session_start();
    require_once("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $a_id = $_POST['userid'];
        if(str_starts_with($a_id, "A"))
        {
            $query = "select * from admin where a_id = '$a_id'";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1)
            {
                $_SESSION['a_id'] = mysqli_fetch_assoc($result);
                header("Location: admin_homepage.php");
                die;
            }
        }
        elseif(str_starts_with($a_id, "C"))
        {

        }
        elseif(str_starts_with($a_id, "S"))
        {

        }
        else
        {
            echo("Invalid User!");
        }
    }
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
                <div>
                    <form method="post">
                        <label for="userid"><h1>Please enter your user ID:</h1></label>
                        <input type="text" id="userid" name="userid" minlength="7" maxlength="7" size="100%" placeholder="e.g. A-12345, S-09876, C-13579" required>
                        <br> <br>
                        <input type="submit" class="login-button" value="Login">
                    </form>
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