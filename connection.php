<?php

$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "smartphone_website";
    try{$conn = mysqli_connect($servername, $username, $password, $database);}
    catch(Exception){
        echo "Failed to connect to MySQL! Please contact the admin.";
        return;
    }
    if(!$conn){
        die("Connection failed.". mysqli_connect_error());
    }
    error_log("Connection successful");
