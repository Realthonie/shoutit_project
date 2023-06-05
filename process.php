<?php

include"database.php";

// check if user clicked the submit button
if(isset($_POST['submit'])){
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // set timezone
    date_default_timezone_set('Africa/Lagos');
    $time = date("h:i:s a", time()); //the time() function gives us the current time 

    //validate input
    if(!isset($user) || $user == "" || !isset($message) || $message == "") {
        $error = "Please fill in your name and a message";
        header("Location: index.php?error=".urlencode($error));
        exit();
    }else {
        $query = "INSERT INTO shouts (user, message, time) VALUES ('$user', '$message', '$time')";
    }

    if(!mysqli_query($con, $query)) {
        die("Error: " . mysqli_connect($cnn));
    }else{
        header("Location: index.php");
    }

}
?>