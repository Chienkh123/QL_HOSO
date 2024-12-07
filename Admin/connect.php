<?php
    $severName = "localhost";
    $userName = "root";
    $passWord = "";
    $dbName = "hoso_sv";
    $conn = new mysqli($severName, $userName, $passWord, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    mysqli_set_charset($conn, 'utf8');
    
