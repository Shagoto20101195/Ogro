<?php
    session_start();
    include("generator.php");
    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $role = $_POST['role'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        if($role == "S")
        {
            $id = gen_id("S-", $connect);
            $query = "insert into seller values ('$name', '$id', '$address', 0)";
            mysqli_query($connect, $query);
            $query = "select * from seller where s_id = '$id'";
            $result = mysqli_query($connect, $query);
            $_SESSION['user'] = mysqli_fetch_assoc($result);
            header("Location: signup_success_s.php");
        }
        else
        {
            $id = gen_id("C-", $connect);
            $query = "insert into customer values ('$name', '$id', '$phone', '$address', 0)";
            mysqli_query($connect, $query);
            $query = "select * from customer where c_id = '$id'";
            $result = mysqli_query($connect, $query);
            $_SESSION['user'] = mysqli_fetch_assoc($result);
            header("Location: signup_success_c.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" href="images/Tom_evil_smile.jpg">
    <title>Ogro - Signup</title>
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
            <form method="post">
                <label for="role"><h1>Select role:</h1></label>
                <select name="role" id="role" style="padding: 10px;">
                    <option value="S">Seller</option>
                    <option value="C">Customer</option>
                </select>
                <br> <br>

                <label for="name"><h1>Your name:</h1></label>
                <input type="text" id="name" name="name" size="100%" placeholder="e.g. Meme Miah" style="padding: 10px;" required>
                <br> <br>

                <label for="address"><h1>Your address:</h1></label>
                <input type="text" id="address" name="address" size="100%" placeholder="e.g. Bhooter Golli" style="padding: 10px;" required>
                <br> <br>

                <label for="phone"><h1>Your phone number:<h3>(will be empty if not given)</h3></h1></label>
                <input type="text" id="phone" name="phone" size="100%" maxlength="11" placeholder="e.g. 01234543210" style="padding: 10px;">
                <br> <br>

                <input type="submit" class="login-button" value="Register">
            </form>
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