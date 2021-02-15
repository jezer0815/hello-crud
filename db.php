<?php

$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbase = "firstproject_db";

$conn = mysqli_connect($servername, $username, $password,$dbase);
if (!$conn) {
    die("Connection failed: ask me" . $conn->connect_error);
}


?> 