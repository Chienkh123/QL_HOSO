<?php
include '../connect.php';
$id = $_GET['masv'];
$query = "DELETE FROM hssinhvien WHERE masv = '$id'";
$query2 = "DELETE FROM users WHERE username = '$id'";

$data = mysqli_query($conn, $query);
$data2 = mysqli_query($conn, $query2);

if ($data && $data2) {
    header("Location: ../dssinhvien.php?status=success");
} else {
    header("Location: ../dssinhvien.php?status=failed");
}
?>