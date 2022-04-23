<?php
    session_start();

    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $type = $_POST['op'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $count = $_POST['count'];

        if($type == "Del")
        {
            $query = "delete from seller where s_id = '$id'";
            mysqli_query($connect, $query);
            
        }
        else
        {
            if(!empty($name))
            {
                $query = "update seller set name = '$name' where s_id = '$id'";
                mysqli_query($connect, $query);
            }

            if(!empty($address))
            {
                $query = "update seller set farm_address = '$address' where s_id = '$id'";
                mysqli_query($connect, $query);
            }

            if(!empty($count))
            {
                $query = "update seller set sales_count = '$count' where s_id = '$id'";
                mysqli_query($connect, $query);
            }
        }

        $text = "Modification was successful!";
        echo("<script type=text/javascript>alert('$text');</script>");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="icon" href="images/Tom_evil_smile.jpg">
        <title>Ogro - Modify Seller</title>
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
                    <label for="id"><h1>Enter seller ID</h1></label>
                    <input type="text" name="id" id="id" size="100%" placeholder="e.g. S-12345" style="padding: 10px;" required>

                    <br> <br>
                    <br> <br>

                    <label for="op"><h1>Select operation: <h3>(For updating, some fields can be empty)</h3> <h3>(For deleting, no need to fillup anything)</h3></h1></label>
                    <select name="op" id="op" style="padding: 10px;">
                        <option value="Upd">Update</option>
                        <option value="Del">Delete</option>
                    </select>

                    <br> <br>
                    <br> <br>

                    <label for="name"><h1>Updated name:</h1></label>
                    <input type="text" name="name" id="name" size="100%" placeholder="e.g. Mokhles Miah" style="padding: 10px;">

                    <br> <br>
                    <br> <br>

                    <label for="address"><h1>Updated address:</h1></label>
                    <input type="text" name="address" id="address" size="100%" placeholder="e.g. United States of Dhaka" style="padding: 10px;">

                    <br> <br>
                    <br> <br>

                    <label for="count"><h1>Updated sales count:</h1></label>
                    <input type="text" name="count" id="count" size="100%" placeholder="e.g. 370" style="padding: 10px;">

                    <br> <br>
                    <br> <br>

                    <input type="submit" class="login-button" value="Modify">
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