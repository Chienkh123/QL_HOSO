<?php
    include '../connect.php';
    $madt = $_POST['madt'];
    $tendt = $_POST['tendt'];
    $query = "UPDATE hsdantoc SET tendt = '$tendt' WHERE madt = '$madt'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        header("Location: ../dantoc.php?status=success");
    } else {
        header("Location: ../dantoc.php?status=error");
    }
?>