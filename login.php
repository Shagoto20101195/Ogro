<?php
    session_start();
    require_once("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $userid = $_POST['userid'];
        if(str_starts_with($userid, "A"))
        {
            $query = "select * from admin where a_id = '$userid'";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1)
            {
                $_SESSION['user'] = mysqli_fetch_assoc($result);
                header("Location: admin_homepage.php");
                die;
            }
            else
            {
                $text = "No such Admin found!";
                echo("<script type=text/javascript>alert('$text');</script>");
            }
        }
        elseif(str_starts_with($userid, "C"))
        {
            $query = "select * from customer where c_id = '$userid'";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1)
            {
                $_SESSION['user'] = mysqli_fetch_assoc($result);
                header("Location: customer_homepage.php");
                die;
            }
            else
            {
                $text = "No such Customer found!";
                echo("<script type=text/javascript>alert('$text');</script>");
            }
        }
        elseif(str_starts_with($userid, "S"))
        {
            $query = "select * from seller where s_id = '$userid'";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1)
            {
                $_SESSION['user'] = mysqli_fetch_assoc($result);
                header("Location: seller_homepage.php");
                die;
            }
            else
            {
                $text = "No such Seller found!";
                echo("<script type=text/javascript>alert('$text');</script>");
            }
        }
        else
        {
            $text = "Invalid User ID!";
            echo("<script type=text/javascript>alert('$text');</script>");
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
                        <label for="userid"><h1>Please enter your user ID:<h3>(Or <a href="signup.php">signup here</a>)</h3></h1></label>
                        <input type="text" id="userid" name="userid" minlength="7" maxlength="7" size="100%" placeholder="e.g. A-12345, S-09876, C-13579" style="padding: 10px;" required>
                        <br> <br>
                        <input type="submit" class="login-button" value="Login">
                    </form>
                </div>
            </div>
        </main>

        <footer>
            <div class="bottom-section">
                <p>&copy; <a href="admin_listpage.php" class="home-logout">Administration</a></p>
                <span><a href="#" class="home-logout">Back To Top</a></span>
                |
                <span><a href="index.html" class="home-logout">Back To Home</a></span>
            </div>
        </footer>
    </body>
</html>