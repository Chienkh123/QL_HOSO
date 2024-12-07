<?php
session_start(); // Start the session to access session variables

if (isset($_SESSION['username'])) {
    $masv = $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Assuming you have a database connection named $conn
        include('./Admin/connect.php');

        // Retrieve form data
        $tenchuho = $_POST['tenchuho'];
        $sonha = $_POST['sonha'];
        $sodienthoai = $_POST['sodienthoai'];
        $quanhe = $_POST['quanhe'];
        $diachi = $_POST['diachi'];
        $ngaybatdau = date("Y-m-d", strtotime($_POST['ngaybatdau'])); 
        $ngayketthuc = date("Y-m-d", strtotime($_POST['ngayketthuc'])); 

        // Update data in the database
        $query = $conn->prepare("UPDATE hsngoaitru SET tenchuho=?, sonha=?, sodienthoai=?, quanhe=?, diachi=?, ngaybd=?, ngaykt=? WHERE masv=?");
        $query->bind_param("ssssssss", $tenchuho, $sonha, $sodienthoai, $quanhe, $diachi, $ngaybatdau, $ngayketthuc, $masv);

        if ($query->execute()) {
            header("Location: ./index.php?status=success");
        } else {
            header("Location: ./index.php?status=error");
        }

        $query->close();
        $conn->close();
    } else {
        header("Location: ./index.php?status=error");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
