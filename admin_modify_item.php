<?php
    session_start();

    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $type = $_POST['op'];
        $s_id = $_POST['s_id'];
        $i_id = $_POST['i_id'];
        $name = $_POST['name'];
        $count = $_POST['count'];

        if($type == "Del")
        {
            $query = "delete from item where s_id = '$s_id' and item_no = '$i_id'";
            mysqli_query($connect, $query);
            
        }
        else
        {
            if(!empty($name))
            {
                $query = "update item set type = '$name' where s_id = '$s_id' and item_no = '$i_id'";
                mysqli_query($connect, $query);
            }

            if(!empty($count))
            {
                $query = "update item set unit_price = '$count' where s_id = '$s_id' and item_no = '$i_id'";
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
        <title>Ogro - Modify Items</title>
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
                    <label for="s_id"><h1>Enter seller ID:</h1></label>
                    <input type="text" name="s_id" id="s_id" size="100%" placeholder="e.g. S-12345" style="padding: 10px;" required>

                    <br> <br>
                    <br> <br>

                    <label for="i_id"><h1>Enter item ID:</h1></label>
                    <input type="text" name="i_id" id="i_id" size="100%" placeholder="e.g. I-12345" style="padding: 10px;" required>

                    <br> <br>
                    <br> <br>

                    <label for="op"><h1>Select operation: <h3>(For updating, some fields can be empty)</h3> <h3>(For deleting, no need to fillup anything)</h3></h1></label>
                    <select name="op" id="op" style="padding: 10px;">
                        <option value="Upd">Update</option>
                        <option value="Del">Delete</option>
                    </select>

                    <br> <br>
                    <br> <br>

                    <label for="name"><h1>Updated item type:</h1></label>
                    <input type="text" name="name" id="name" size="100%" placeholder="e.g. BRACU Chicken" style="padding: 10px;">

                    <br> <br>
                    <br> <br>


                    <label for="count"><h1>Updated unit price:</h1></label>
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