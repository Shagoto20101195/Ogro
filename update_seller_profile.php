<?php //shesh
    session_start();

include("dbconnection.php");
$seller_id = $_SESSION['user']['s_id'];
$query = "select name, farm_address from seller where s_id = '$seller_id'";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>
    <head>
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="icon" href="images/Tom_evil_smile.jpg">
        <title>Ogro - Seller Home Page</title>
    </head>

    <body>
        
                
        <header>
            <div class="top-section">
                <h1><abbr title="Online Agro">OGRO</abbr></h1>
                <h3><i>Intended to serve a community of animal buyers and sellers across the country</i></h3>
                <br> <br>
        <table align = "center" border = "1px" style = "width:600px; line-height:40px;">
            
            <t>
                <th> 
                <span><a href="view_profile.php" class="home-logout">Name</a></span>
                </th>
                <th> <span><a href="stock_info.php" class="home-logout">Farm Address</a></span> </th>
            </t>
        <?php
            while ($rows = mysqli_fetch_assoc($result))
            {
        ?>
                <tr>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['farm_address']; ?></td>
                </tr>
        <?php
            }
        ?>

        </table>
                <br> <br>
                <br> <br>
                <span><a href="seller_homepage.php" class="home-logout">Home</a></span>
                |
                <span><a href="logout.php" class="home-logout">Logout</a></span>
            </div>  
        </header>

        <main>
            <div class="middle-section">
                
            </div>
        </main>

        <footer>
            <div class="bottom-section">
                <p>&copy; Unknown</p>
                
                <a href="#" class="home-logout"> Back To Top</a>
            </div>
        </footer>
    </body>
</html>