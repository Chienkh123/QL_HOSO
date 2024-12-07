<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include('../connect.php');
    $masv = $_POST['masv'];
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $noisinh = $_POST['noisinh'];
    $diachi = $_POST['diachi'];
    $madt = $_POST['madt'];
    $madoituong = $_POST['madoituong'];
    $doanvien = $_POST['doanvien'];
    $ngayvaodoan = $_POST['ngayvaodoan'];
    $noiketnap = $_POST['noiketnap'];
    $cccd = $_POST['cccd'];
    $ngaycap = $_POST['ngaycap'];
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

    $query = "UPDATE hssinhvien SET hoten = '$hoten', ngaysinh = '$ngaysinh', gioitinh = '$gioitinh', 
    noisinh = '$noisinh', diachi = '$diachi', madt = '$madt', madoituong = '$madoituong', 
    doanvien = '$doanvien', ngayvaodoan = '$ngayvaodoan', noiketnap = '$noiketnap', 
    cccd = '$cccd', ngaycap = '$ngaycap', noicap = '$noicap', hotenbo = '$hotenbo', 
    nghebo = '$nghebo', hotenme = '$hotenme', ngheme = '$ngheme', matinh = '$matinh', 
    malop = '$malop', hedaotao = '$hedaotao', manghanh = '$manghanh', namtuyens = '$namtuyens', 
    ngoaitru = '$ngoaitru', sdt = '$sdt' WHERE masv = '$masv'";
    
    $data = mysqli_query($conn, $query);
    if($data) {
        header("Location:../dssinhvien.php?status=success");
        exit();
    }else{
        header("Location:../dssinhvien.php?status=error");
        exit();
    }
} else {
    // If the form is not submitted via POST method, redirect to an error page or homepage
    header("Location:../dssinhvien.php?status=error");
    exit();
}
?>
