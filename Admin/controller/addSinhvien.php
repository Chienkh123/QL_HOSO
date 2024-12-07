<?php
    session_start();
    include ('../connect.php');

    if(isset($_POST['addSinhvien'])) {
        $masv = $_POST['masv'];
        $hoten = $_POST['hoten'];
        $ngaysinh = date("Y-m-d", strtotime($_POST["ngaysinh"]));
        $gioitinh = $_POST['gioitinh'];
        $noisinh = $_POST['noisinh'];
        $diachi = $_POST['diachi'];
        $madt = $_POST['madt'];
        $madoituong = $_POST['madoituong'];
        $doanvien = $_POST['doanvien'];
        $ngayvaodoan = date("Y-m-d", strtotime($_POST["ngayvaodoan"]));
        $noiketnap = $_POST['noiketnap'];
        $cccd = $_POST['cccd'];
        $ngaycap = date("Y-m-d", strtotime($_POST["ngaycap"]));
        $noicap = $_POST['noicap'];
        $hotenbo = $_POST['hotenbo'];
        $nghebo = $_POST['nghebo'];
        $hotenme = $_POST['hotenme'];
        $ngheme = $_POST['ngheme'];
        $matinh = $_POST['matinh'];
        $malop = $_POST['malop'];
        $hedaotao = $_POST['hedaotao'];
        $manghanh = $_POST['manghanh'];
        $namtuyens = $_POST['namtuyens'];
        $ngoaitru = $_POST['ngoaitru'];
        $sdt = $_POST['sdt'];

        $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hssinhvien WHERE masv = '$masv'"));
        if ($check > 0) {
            header("Location:../dssinhvien.php?status=tontaimasv");
        }else{
            $sql = "INSERT INTO hssinhvien (masv, hoten, ngaysinh, gioitinh, noisinh, diachi, madt, madoituong, doanvien, ngayvaodoan, noiketnap, cccd, ngaycap, noicap, hotenbo, nghebo, hotenme, ngheme, matinh, malop, hedaotao, manghanh,namtuyens,ngoaitru,sdt)
            VALUES('$masv', '$hoten', '$ngaysinh', '$gioitinh', '$noisinh', '$diachi', '$madt', '$madoituong', '$doanvien', '$ngayvaodoan', '$noiketnap', '$cccd', '$ngaycap', '$noicap', '$hotenbo', '$nghebo', '$hotenme', '$ngheme', '$matinh', '$malop', '$hedaotao', '$manghanh', '$namtuyens', '$ngoaitru', '$sdt')";
            $query = mysqli_query($conn, $sql);
            
            $email = $masv . '@gmail.com';
            $sql1 = "INSERT INTO users (username ,name, email)
            VALUES('$masv', '$hoten','$email')";
            $query1 = mysqli_query($conn, $sql1);

            $sqlhsgiayto = "INSERT INTO hsgiayto (masv) 
            VALUES ('$masv')";
    
            if($ngoaitru == 'Có'){
                $sql2 = "INSERT INTO hsngoaitru (masv)
                VALUES('$masv')";
                $query2 = mysqli_query($conn, $sql2);
            }else{
                $sql2 = "INSERT INTO hsnoitru (masv)
                VALUES('$masv')";
                $query2 = mysqli_query($conn, $sql2);
            }
            $query3 = mysqli_query($conn, $sqlhsgiayto);

            if($query1){
                header("location: ../dssinhvien.php?status=success");
            }else {
                header("location: ../dssinhvien.php?status=errortk");
            }

            if( $query && $query2 && $query3) { 
                header("location: ../dssinhvien.php?status=success");
            }else {
                header("location: ../dssinhvien.php?status=tontaimasv");
            }

        }
    }
?>