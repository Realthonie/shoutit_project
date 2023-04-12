<?php
// connect to mysql
$con = mysqli_connect("localhost", "root", "", "projectdb");

// test connection
if(mysqli_connect_errno()){
    echo "Failed to connect". mysqli_connect_error();
} else {
    // echo "Hello";
}