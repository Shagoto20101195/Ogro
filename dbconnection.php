<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "temp_ogro";

    $connect = mysqli_connect($host, $user, $password, $database);

    if($connect->connect_error)
    {
        die("Failed to connect with database.");
    }
    else{
        //echo("Success!");
    }
?>