<?php
    session_start();

    include("dbconnection.php");

	$query = "select item_no, Name, unit_price from item where type ='Chicken' ";
        $result = mysqli_query($connect, $query);
        $table = "Chicken";

   
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
		<h1>Welcome <?php echo($_SESSION['user']['name']);?></h1>
 	
		<br>
                <span><a href="customer_homepage.php" class="home-logout">Home</a></span>
                |
                <span><a href="logout.php" class="home-logout">Logout</a></span>
            </div>  
        </header>

        <main>
        <div class="middle-section">
                <a href="customer_viewpage.php" class="logins">View</a>

                <a href="customer_purchase.php" class="logins">Purchase</a>
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