<?php
    session_start();

    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $type = $_POST['op'];
        $c_id = $_POST['c_id'];
        $t_id = $_POST['t_id'];
        $details = $_POST['details'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        

        if($type == "Del")
        {
            $query = "delete from purchase where c_id = '$c_id' and purchase_id = '$t_id'";
            mysqli_query($connect, $query);
            
        }
        else
        {
            if(!empty($details))
            {
                $query = "update purchase set payment_details = '$details' where c_id = '$c_id' and purchase_id = '$t_id'";
                mysqli_query($connect, $query);
            }

            if(!empty($price))
            {
                $query = "update purchase set cost = '$price' where c_id = '$c_id' and purchase_id = '$t_id'";
                mysqli_query($connect, $query);
            }

            if(!empty($date))
            {
                $query = "update purchase set p_date = '$date' where c_id = '$c_id' and purchase_id = '$t_id'";
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
        <title>Ogro - Modify Purchase Info</title>
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
                    <label for="c_id"><h1>Enter customer ID:</h1></label>
                    <input type="text" name="c_id" id="c_id" size="100%" placeholder="e.g. C-12345" style="padding: 10px;" required>

                    <br> <br>
                    <br> <br>

                    <label for="t_id"><h1>Enter purchase ID:</h1></label>
                    <input type="text" name="t_id" id="t_id" size="100%" placeholder="e.g. T-12345" style="padding: 10px;" required>

                    <br> <br>
                    <br> <br>

                    <label for="op"><h1>Select operation: <h3>(For updating, some fields can be empty)</h3> <h3>(For deleting, no need to fillup anything)</h3></h1></label>
                    <select name="op" id="op" style="padding: 10px;">
                        <option value="Upd">Update</option>
                        <option value="Del">Delete</option>
                    </select>

                    <br> <br>
                    <br> <br>

                    <label for="details"><h1>Updated purchase details:</h1></label>
                    <input type="text" name="details" id="details" size="100%" placeholder="e.g. Kalke dibo" style="padding: 10px;">

                    <br> <br>
                    <br> <br>


                    <label for="price"><h1>Updated price:</h1></label>
                    <input type="text" name="price" id="price" size="100%" placeholder="e.g. 370" style="padding: 10px;">

                    <br> <br>
                    <br> <br>

                    <label for="date"><h1>Updated date:</h1></label>
                    <input type="date" name="date" id="date" size="100%" style="padding: 10px;">

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