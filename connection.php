<?php

$dbhost = "localhost"; //or your server host
$dbuser = "root";
$dbpass = ""; //or your db pass
$dbname = "login_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect!");
}

