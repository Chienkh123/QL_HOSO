<?php
include '../connect.php';
$id = $_GET['username'];
$query = "DELETE FROM users WHERE username = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
    header("Location: ../users.php?status=success");
} else {
    header("Location: ../users.php?status=error");
}
?>