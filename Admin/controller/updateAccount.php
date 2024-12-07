<?php
    include '../connect.php';
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE username = '$username'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        header("Location: ../account.php?status=success");
    } else {
        header("Location: ../account.php?status=error");
    }
?>