<?php
    $hostname = 'localhost';
    $dbname = 'datmonsinh';
    $username = 'root';
    $password = '';
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) die("Connection failed: " . mysqli_connect_error());
    mysqli_set_charset($conn, 'UTF8');
?>