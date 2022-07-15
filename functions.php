<?php

function check_login($con)
{
    if (isset($_SESSION['user_id']))  //checking if values exist
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) 
        {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
            
            
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

function random_num($length)
{

    $text = "";
    if ($length < 5) 
    {
        $length = 5;
    }

    $len = rand(4, $length); //number between 4 and 20

    for ($i = 0; $i < $len; $i++) { //I don't want to be the user id to be the same length
         
        $text .= rand(0, 9);
    }

    return $text;
}
