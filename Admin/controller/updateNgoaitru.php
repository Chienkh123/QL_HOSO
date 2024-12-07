<?php
include('../connect.php');
$masv = $_POST['masv'];
$tenchuho = $_POST['tenchuho'];
$sonha = $_POST['sonha'];
$sodienthoai = $_POST['sodt'];
$quanhe = $_POST['quanhe'];
$diachi = $_POST['diachi'];
$ngaybatdau = date("Y-m-d", strtotime($_POST['ngaybatdau']));
$ngayketthuc = date("Y-m-d", strtotime($_POST['ngayketthuc']));

// Update data in the database
$query = $conn->prepare("UPDATE hsngoaitru SET tenchuho=?, sonha=?, sodienthoai=?, quanhe=?, diachi=?, ngaybd=?, ngaykt=? WHERE masv=?");
$query->bind_param("ssssssss", $tenchuho, $sonha, $sodienthoai, $quanhe, $diachi, $ngaybatdau, $ngayketthuc, $masv);

if ($query->execute()) {
    header("Location: ../dsngoaitru.php?status=success");
} else {
    header("Location: ../dsngoaitru.php?status=error");
}

$query->close();
$conn->close();
