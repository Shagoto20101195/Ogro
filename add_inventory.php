<?php //Pray shesh :)
    session_start();
    include("dbconnection.php");
    include("generator.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $item = $_POST['item']; //item = Cattle Ct, Chicken Ck, Fishery F
        $name = $_POST['name']; //gorur naam othoba eidar zaat
        $quantity = $_POST['quantity'];
        $s_id = $_SESSION['user']['s_id'];
        $price = $_POST['price'];

        if($item == "Ct") //C = Cattle
        {
            $id = gen_id("I-", $connect);
            $query = "insert into item values ('$id', '$name','$s_id', 'Cattle', '$price')";
            mysqli_query($connect, $query);
            $query = "select * from item where item_no = '$id'";
            $result = mysqli_query($connect, $query);
            $_SESSION['item'] = mysqli_fetch_assoc($result);
            header("Location: item_add_success_s.php");
        }
        elseif($item == "Ck") //C = Chicken
        {
            $id = gen_id("I-", $connect);
            $query = "insert into item values ('$id', '$name', '$s_id', 'Chicken', '$price')";
            mysqli_query($connect, $query);
            $query = "select * from item where item_no = '$id'";
            $result = mysqli_query($connect, $query);
            $_SESSION['item'] = mysqli_fetch_assoc($result);
            header("Location: item_add_success_s.php");
        }
        else
        {
            $id = gen_id("I-", $connect);
            $query = "insert into item values ('$id', '$name', '$s_id', 'Fish', '$price')";
            mysqli_query($connect, $query);
            $query = "select * from item where item_no = '$id'";
            $result = mysqli_query($connect, $query);
            $_SESSION['item'] = mysqli_fetch_assoc($result);
            header("Location: item_add_success_s.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" href="images/Tom_evil_smile.jpg">
    <title>Adding inventory</title>
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
                <label for="item"><h1>Select Item:</h1></label>
                <select name="item" id="item" style="padding: 10px;">
                    <option value="Ct">Cattle</option>
                    <option value="Ck">Chicken</option>
                    <option value="F">Fish</option>
                </select>
                <br> <br>

                <label for="name"><h1>Item name:</h1></label>
                <input type="text" id="name" name="name" size="100%" placeholder="e.g. Australian Cow, Farm Chicken, Hilsha Fish" style="padding: 10px;" required>
                <br> <br>

                <label for="quantity"><h1>Item quantity:</h1></label>
                <input type="text" id="quantity" name="quantity" size="100%" placeholder="e.g. 1, 10, 20" style="padding: 10px;" required>
                <br> <br>

                <label for="price"><h1>Unit Price:</h1></label>
                <input type="text" id="price" name="price" size="100%" placeholder="e.g. 10, 50, 100" style="padding: 10px;" required>
                <br> <br>


                <input type="submit" class="login-button" value="Done">
            </form>
         </div>
    </main>

    <footer>
        <div class="bottom-section">
            <p>&copy; Unknown</p>
            <span><a href="#" class="home-logout">Back To Top</a></span>
            |
            <span><a href="index.html" class="home-logout">Back To Home</a></span>
        </div>
    </footer>
</body>
</html>