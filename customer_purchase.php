<?php
    session_start();

    include("dbconnection.php");
    include("generator.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
    { 
        $p_id=gen_id("T-", $connect);

        $type = $_POST['type'];
        $id=$_POST['id'];
        $c_id = $_SESSION['user']['c_id'];
        $query = "select * from item where item_no = '$id'";
        $result = mysqli_query($connect, $query);
        $result = mysqli_fetch_assoc($result);
        $price = $result['unit_price'];
        $s_id = $result['s_id'];
        
        $query = "insert into purchase (purchase_id, cost, c_id) values ('$p_id', '$price', '$c_id')";
        mysqli_query($connect, $query);
        $query = "delete from item where item_no = '$id'";
        $result = mysqli_query($connect, $query);
        $query = "select sales_count from seller where s_id = '$s_id'";
        $result = mysqli_query($connect, $query);
        $result = mysqli_fetch_assoc($result);
        $newCount = $result['sales_count'] + 1;

        $query = "update seller set sales_count = '$newCount' where s_id = '$s_id'";
        mysqli_query($connect, $query);
        $text = "Purchase successful";
        echo("<script type=text/javascript>alert('$text');</script>");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="icon" href="images/Tom_evil_smile.jpg">
        <title>Ogro - Purchase</title>
    </head>

    <body>
        <header>
            <div class="top-section">
                <h1><abbr title="Online Agro">OGRO</abbr></h1>
                <h3><i>Intended to serve a community of animal buyers and sellers across the country</i></h3>
                <br> <br>
                <span><a href="customer_homepage.php" class="home-logout">Home</a></span>
                |
                <span><a href="Customer_profile.php" class="home-logout"><?php echo($_SESSION['user']['name']); ?></a></span>
                |
                <span><a href="logout.php" class="home-logout">Logout</a></span>
            </div>  
        </header>

        <main>
            <div style="display: block; padding: 300px;">
                <form method="POST">
                    <label for="type"><h1>Item type:</h1></label>
                    <select name="type" id="type" style="padding: 10px;">
                        <option value="CH">Chicken</option>
                        <option value="CT">Cattle</option>
                        <option value="F">Fish</option>
                    </select>

                    <br> <br>

                    <label for="id"><h1>Enter Item ID</h1></label>
                    <input type="text" name="id" id="id" size="100%" placeholder="e.g. I-12345" style="padding: 10px;" required>


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