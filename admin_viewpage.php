<?php
    session_start();

    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $type = $_POST['type'];
        $id = $_POST['id'];
        $query = "select * from seller";
        $result = mysqli_query($connect, $query);
        $table = "Seller Table";

        if($type == "C")
        {
            $table = "Customer Table";
            $query = "select * from customer";
            if($id != "")
            {
                $query .= " where c_id = '$id'";
            }
        }
        elseif($type == "S")
        {
            $query = "select * from seller";
            if($id != "")
            {
                $query .= " where s_id = '$id'";
            }
        }
        elseif($type == "I")
        {
            $table = "Item Table";
            $query = "select * from item";
            if($id != "")
            {
                $query .= " where item_no = '$id'";
            }
        }
        elseif($type == "T")
        {
            $table = "Purchase Table";
            $query = "select * from purchase";
            if($id != "")
            {
                $query .= " where purchase_id = '$id'";
            }
        }
        elseif($type == "SF")
        {
            $table = "Subscription Fee Table";
            $query = "select * from subscription_fee";
            if($id != "")
            {
                $query .= " where a_id = '$id'";
            }
        }

        $result = mysqli_query($connect, $query);
    }
    else
    {
        $query = "select * from seller";
        $result = mysqli_query($connect, $query);
        $table = "Seller Table";
    }
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

                    <label for="id"><h1>Unique identifier:</h1></label>
                    <input type="text" name="id" id="id" size="100%" placeholder="Starts with A, S, C, I, T" style="padding: 10px;">

                    <br> <br>

                    <input type="submit" class="login-button" value="Go">
                    <br>
                    <br>
                </form>

                <table align="center">
                    <caption><h1><?php echo($table); ?></h1></caption>
                    <thead>
                        <?php
                            $counter = 0; 
                            while($data = mysqli_fetch_field($result))
                            {
                        ?>
                            <th><?php echo($data->name); $counter++;?></th>
                            
                        <?php
                            }
                        ?>
                    </thead>

                    <tbody>
                        <?php
                            while($data = mysqli_fetch_array($result))
                            {
                                $index = 0;
                        ?>

                        <tr>
                            <?php
                                while($index < $counter)
                                {
                            ?>
                            <td><?php echo($data[$index]); $index++;?></td>
                            <?php    
                                } 
                            ?>
                        </tr>
                                                
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
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