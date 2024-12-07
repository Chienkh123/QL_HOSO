<?php 
    session_start();
    include ('../connect.php');

    if(isset($_POST['addDantoc'])) {
        $madt = $_POST['madt'];
        $tendt = $_POST['tendt'];
        $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hsdantoc WHERE madt = '$madt'"));
        if ($check > 0) {
            header("Location:../dantoc.php?status=tontaidantoc");
        }else{
            $sql = "INSERT INTO hsdantoc (madt,tendt) VALUES('$madt','$tendt')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                header("location: ../dantoc.php?status=success");
            } else {
                header("location: ../dantoc.php?status=error");
            }
        }
    }
?>