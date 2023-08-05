<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "smartphone_website";

if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("failed to connect!");
}