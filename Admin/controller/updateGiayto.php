<?php
    include '../connect.php';
    $masv = $_POST['masv'];
    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];
    $val3 = $_POST['val3'];
    $val4 = $_POST['val4'];
    $val5 = $_POST['val5'];
    $val6 = $_POST['val6'];
    $val7 = $_POST['val7'];
    $val8 = $_POST['val8'];
    $val9 = $_POST['val9'];
    $val10 = $_POST['val10'];
    $val11 = $_POST['val11'];
    $val12 = $_POST['val12'];
    $val13 = $_POST['val13'];

    $query = "UPDATE hsgiayto SET val1 = '$val1', val2 = '$val2', val3 = '$val3', val4 = '$val4', val5 = '$val5', val6 = '$val6', val7 = '$val7', val8 = '$val8', val9 = '$val9', val10 = '$val10', val11 = '$val11', val12 = '$val12', val13 = '$val13' WHERE masv = '$masv'";
   
    $data = mysqli_query($conn, $query);
    if ($data) {
        header("Location: ../dsgiayto.php?status=success");
    } else {
        header("Location: ../dsgiayto.php?status=error");
    }
?>