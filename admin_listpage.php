<?php 
    session_start();
    include("dbconnection.php");
    $query = "select * from admin";
    $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" href="images/Tom_evil_smile.jpg">
    <title>Ogro - Admin List</title>
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
            <table align="center">
                <caption><h1>Admin List</h1></caption>
                
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php
                        while($data = mysqli_fetch_assoc($result))
                        {
                    ?>

                    <tr>
                            <td><?php echo($data['a_id']); ?></td>
                            <td><?php echo($data['name']); ?></td>
                            <td><?php echo($data['email']); ?></td>
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