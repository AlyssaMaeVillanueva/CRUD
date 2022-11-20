<?php
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "to9_db";

    //create connection
    $conn = mysqli_connect($server,$username,$pass,$db);

    //pwde man....
    //$conn = mysqli_connect("localhost","root","","t09_db");

    //check connection
    if ($conn->connect_error) {
        die ("Connection Failed!". $conn->connect_error);
    }
?>