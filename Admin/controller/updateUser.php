<?php
    include '../connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE username = '$username'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        header("Location: ../users.php?status=success");
    } else {
        header("Location: ../users.php?status=error");
    }
?>