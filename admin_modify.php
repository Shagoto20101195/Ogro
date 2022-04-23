<?php
    session_start();

    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $type = $_POST['type'];

        if($type == "S")
        {
            header("Location: admin_modify_seller.php");
        }
        elseif($type == "C")
        {
            header("Location: admin_modify_customer.php");
        }
        elseif($type == "I")
        {
            header("Location: admin_modify_item.php");
        }
        elseif($type == "T")
        {
            header("Location: admin_modify_purchase.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="icon" href="images/Tom_evil_smile.jpg">
        <title>Ogro - Modify</title>
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
            <div style="display: block; padding: 300px;">
                <form method="POST">
                    <label for="type"><h1>Table type:</h1></label>
                    <select name="type" id="type" style="padding: 10px;">
                        <option value="S">Seller</option>
                        <option value="C">Customer</option>
                        <option value="T">Purchases</option>
                        <option value="I">Items</option>
                        <option value="SF">Subscription Fee</option>
                    </select>

                    <br> <br>

                    

                    <br> <br>

                    <input type="submit" class="login-button" value="Go">
                    <br>
                    <br>
                </form>

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