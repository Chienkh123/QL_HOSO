<?php
session_start(); // Start the session to access session variables

if (isset($_SESSION['username'])) {
    $masv = $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Assuming you have a database connection named $conn
        include('./Admin/connect.php');

        // Retrieve form data
        $sothe = $_POST['sothe'];
        $sonha = $_POST['sonha'];
        $sophong = $_POST['sophong'];
        $ngaybatdau = date("Y-m-d", strtotime($_POST['ngaybatdau']));
        $ngayketthuc = date("Y-m-d", strtotime($_POST['ngayketthuc']));

        // Update data in the database
        $query = $conn->prepare("UPDATE hsnoitru SET sothe=?, sonha=?, sophong=?, ngaybd=?, ngaykt=? WHERE masv=?");
        $query->bind_param("ssssss", $sothe, $sonha, $sophong, $ngaybatdau, $ngayketthuc, $masv);

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
