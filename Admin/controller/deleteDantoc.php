<?php
include '../connect.php';
$id = $_GET['madt'];
$query = "DELETE FROM hsdantoc WHERE madt = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
    header("Location: ../dantoc.php?status=success");
} else {
    header("Location: ../dantoc.php?status=failed");
}
?>