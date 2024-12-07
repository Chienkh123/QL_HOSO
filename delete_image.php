<?php
session_start();
include './Admin/connect.php';

// Check if the user is logged in and has a session
if (isset($_SESSION['username'])) {
    // Update SQL database with a specific image path (e.g., ./assets/images/logo.png)
    $defaultImage = './assets/images/logo.png';
    $sql = "UPDATE users SET image = '$defaultImage' WHERE username = '" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);

    if ($result) {
        header("location: ./index.php?status=success");
    } else {
        header("location: ./index.php?status=error");
    }
} else {
    header("location: ./index.php?status=error");
}
?>