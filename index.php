<?php include_once('./includes/header.php'); ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {   
    header("Location: ./login.php");
    exit();
}
if (isset($_SESSION['isAdmin']) && ($_SESSION['isAdmin'] == 1 || $_SESSION['isAdmin'] == 2)) {
    header("Location: ./Admin/index.php");
    exit();
}
if (isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
} 

include './Admin/connect.php';
if (isset($_SESSION['username'])) {
    // Get the image path from the database
    $sqlSelect = "SELECT image FROM users WHERE username = '" . $_SESSION['username'] . "'";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        $row = $resultSelect->fetch_assoc();
        $image = $row['image'];
    }
    $name = $_SESSION['name'];
    $username = $_SESSION['username'];
    $image = $_SESSION['image'];
}

?>
<style>
    .profile-image-container {
        position: relative;
        display: inline-block;
    }

    #profileImage {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .choose-image-btn {
        position: absolute;
        background-color: #fff;
        font-size: 20px;
        right: 0;
        bottom: 0;
        padding: 6px;
        cursor: pointer;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 1;
    }

    .nav-item:hover {
        transform: scale(1.1);
        /* Phóng to lên 1.1 lần khi di chuột vào */
        transition: transform 0.5s ease;
        /* Thêm hiệu ứng chuyển động */
        cursor: pointer;
        background-color: #fff;
        border-radius: 10px;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Add this link for Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid overcover">
        <div class="container profile-box">
            <div class="top-cover">
                <div class="covwe-inn">
                    <div class="row no-margin ">
                        <div class="col-md-2 img-c">
                            <!-- Your HTML and PHP code -->
                            <div class="profile-image-container">
                                <img style="border: 2px solid; border-radius: 50%;" src="<?php echo $image ?>" width="600" height="600" alt="" id="profileImage" class="clickable-image" data-toggle="modal" data-target="#imageModal">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label for="fileInput" class="choose-image-btn" data-toggle="modal" data-target="#fileModal"><i class="fa fa-camera"></i></label>
                                </form>
                            </div>
                            <!-- Modal for displaying the enlarged image -->
                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="<?php echo $image ?>" alt="Enlarged Image" class="img-fluid" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Your JavaScript code -->
                            <script>
                                $(document).ready(function() {
                                    // Handle click event on the profile image
                                    $('.clickable-image').on('click', function() {
                                        $('#imageModal').modal('show');
                                    });
                                });
                            </script>
                            <div class="btn-group mt-4">
                                <a href="logout.php" class="btn btn-sm btn-primary mr-2">Đăng xuất</a>
                                <a href="changepassword.php" class="btn btn-sm btn-danger">Đổi mật khẩu</a>
                            </div>

                            <!-- Modal Dialog for File Selection -->
                            <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <form id="uploadForm" action="upload_image.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="fileModalLabel">Avatar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="profile_image_modal" id="fileInputModal" accept="image/*" onchange="displaySelectedFileName(this)">
                                                        <label class="custom-file-label" for="fileInputModal">Chọn file ảnh</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function displaySelectedFileName(input) {
                                                    var fileName = input.files[0].name;
                                                    var label = document.querySelector('.custom-file-label');
                                                    label.textContent = fileName;
                                                }
                                            </script>
                                            <div class="form-group d-flex justify-content-center mb-2">
                                                <div class="row">
                                                    <div class="col-6 d-grid">
                                                        <button type="submit" class="btn btn-primary">Đổi Avatar</button>
                                                    </div>
                                                    <div class="col-6 d-grid">
                                                        <a href="delete_image.php" class="btn btn-danger">Xóa Avatar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 tit-det">
                            <h2><?php echo $name ?></h2>
                            <p><strong class="mb-3">Mã sinh viên: <?php echo $username ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-briefcase"></i> Giấy tờ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-user"></i> Thông tin cá nhân</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#resume" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-graduation-cap"></i> Nghành học</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-buildings-fill"></i> Nơi cư trú</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade exp-cover show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="data-box">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Thông tin giấy tờ</h6>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="body" id="editsinhvien">
                                        <div class="row">
                                            <?php

                                            if (isset($_SESSION['username'])) {
                                                $masv = $_SESSION['username'];

                                                // Assuming you have a database connection named $conn
                                                include('./Admin/connect.php');

                                                $query = $conn->prepare("SELECT * FROM hsgiayto WHERE masv = ?");
                                                $query->bind_param("s", $masv);
                                                $query->execute();
                                                $result = $query->get_result();

                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $val1 = $row['val1'];
                                                    $val2 = $row['val2'];
                                                    $val3 = $row['val3'];
                                                    $val4 = $row['val4'];
                                                    $val5 = $row['val5'];
                                                    $val6 = $row['val6'];
                                                    $val7 = $row['val7'];
                                                    $val8 = $row['val8'];
                                                    $val9 = $row['val9'];
                                                    $val10 = $row['val10'];
                                                    $val11 = $row['val11'];
                                                    $val12 = $row['val12'];
                                                    $val13 = $row['val13'];
                                                }
                                                $query->close();
                                                $conn->close();
                                            }
                                            ?>

                                            <div class="form-group col-md-6">
                                                <label for="">Giấy chuyển sinh hoạt Đảng hoặc Đoàn(nếu có)</label>
                                                <input type="text" name="val1" class="form-control" value="<?php echo ($val1 == 0) ? 'chưa nộp' : (($val1 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Giấy chứng nhận kết quả thi tốt nghiệp THPT năm 2021 (bản gốc)</label>
                                                <input type="text" name="val2" class="form-control" value="<?php echo ($val2 == 0) ? 'chưa nộp' : (($val2 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Học bạ THPT hoặc tương đương (bản sao công chứng)</label>
                                                <input type="text" name="val3" class="form-control" value="<?php echo ($val3 == 0) ? 'chưa nộp' : (($val3 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Bằng tốt nghiệp cấp 3(photo công chứng)</label>
                                                <input type="text" name="val4" class="form-control" value="<?php echo ($val4 == 0) ? 'chưa nộp' : (($val4 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Giấy chứng nhận kết quả thi</label>
                                                <input type="text" name="val5" class="form-control" value="<?php echo ($val5 == 0) ? 'chưa nộp' : (($val5 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Bản photo công chứng CMND hoặc Căn cước công dân</label>
                                                <input type="text" name="val6" class="form-control" value="<?php echo ($val6 == 0) ? 'chưa nộp' : (($val6 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Giấy khai sinh (bản sao hoặc trích lục)</label>
                                                <input type="text" name="val7" class="form-control" value="<?php echo ($val7 == 0) ? 'chưa nộp' : (($val7 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">2 ảnh 3*4</label>
                                                <input type="text" name="val8" class="form-control" value="<?php echo ($val8 == 0) ? 'chưa nộp' : (($val8 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Sơ yếu lý lịch (có dấu xác nhận của địa phương)</label>
                                                <input type="text" name="val9" class="form-control" value="<?php echo ($val9 == 0) ? 'chưa nộp' : (($val9 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="val10">Phiếu đăng ký xét tuyển</label>
                                                <input type="text" name="val10" class="form-control" value="<?php echo ($val10 == 0) ? 'chưa nộp' : (($val10 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Giấy chuyển NVQS</label>
                                                <input type="text" name="val11" class="form-control" value="<?php echo ($val11 == 0) ? 'chưa nộp' : (($val11 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Các loại giấy tờ xác nhận đối tượng và khu vực ưu tiên (nếu có)</label>
                                                <input type="text" name="val12" class="form-control" value="<?php echo ($val12 == 0) ? 'chưa nộp' : (($val12 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Giấy báo nhập học hoặc thông báo xác nhận xét tuyển (bản chính)</label>
                                                <input type="text" name="val13" class="form-control" value="<?php echo ($val13 == 0) ? 'chưa nộp' : (($val13 == 1) ? 'đã nộp' : 'đã trả'); ?>" readonly>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn btn-success mb-3 float-right" onclick="printPage()">In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade exp-cover" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="data-box">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Thông tin cá nhân</h6>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="body" id="editsinhvien">
                                        <div class="row">
                                            <?php

                                            if (isset($_SESSION['username'])) {
                                                $masv = $_SESSION['username'];

                                                // Assuming you have a database connection named $conn
                                                include('./Admin/connect.php');

                                                $query = $conn->prepare("SELECT * FROM hssinhvien WHERE masv = ?");
                                                $query->bind_param("s", $masv);
                                                $query->execute();
                                                $result = $query->get_result();

                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $hoten = $row['hoten'];
                                                    $ngaysinh = $row['ngaysinh'];
                                                    $gioitinh = $row['gioitinh'];
                                                    $noisinh = $row['noisinh'];
                                                    $diachi = $row['diachi'];
                                                    $madt = $row['madt'];
                                                    $madoituong = $row['madoituong'];
                                                    $doanvien = $row['doanvien'];
                                                    $ngayvaodoan = $row['ngayvaodoan'];
                                                    $noiketnap = $row['noiketnap'];
                                                    $cccd = $row['cccd'];
                                                    $ngaycap = $row['ngaycap'];
                                                    $noicap = $row['noicap'];
                                                    $hotenbo = $row['hotenbo'];
                                                    $nghebo = $row['nghebo'];
                                                    $hotenme = $row['hotenme'];
                                                    $ngheme = $row['ngheme'];
                                                    $matinh = $row['matinh'];
                                                    $ngoaitru = $row['ngoaitru'];
                                                    $sdt = $row['sdt'];
                                                }
                                                $query->close();
                                                $conn->close();
                                            }
                                            ?>
                                            <div class="form-group col-md-3">
                                                <label for="">Họ và tên</label>
                                                <input type="text" name="hoten" class="form-control" value="<?php echo $hoten; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Ngày sinh</label>
                                                <input type="date" name="ngaysinh" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $ngaysinh; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Giới tính</label>
                                                <input type="text" name="gioitinh" class="form-control" value="<?php echo $gioitinh; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Nơi sinh</label>
                                                <input type="text" name="noisinh" class="form-control" value="<?php echo $noisinh; ?>" readonly>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" name="diachi" class="form-control" value="<?php echo $diachi; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Mã dân tộc</label>
                                                <input type="text" name="madt" class="form-control" value="<?php echo $madt; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Mã đối tượng</label>
                                                <input type="text" name="madoituong" class="form-control" value="<?php echo $madoituong; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Đoàn viên</label>
                                                <input type="text" name="donvi" class="form-control" value="<?php echo $doanvien; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Ngày vào đoàn</label>
                                                <input type="date" name="ngayvaodoan" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $ngayvaodoan; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Nơi kết nạp</label>
                                                <input type="text" name="noiketnap" class="form-control" value="<?php echo $noiketnap; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Số CCCD</label>
                                                <input type="number" name="cccd" class="form-control" value="<?php echo $cccd; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Ngày cấp</label>
                                                <input type="date" name="ngaycap" max="<?php echo date('Y-m-d'); ?>" class="form-control" value="<?php echo $ngaycap; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Nơi cấp</label>
                                                <input type="text" name="noicap" class="form-control" value="<?php echo $noicap; ?>" readonly>
                                            </div>
                                            <div class=" form-group col-md-3">
                                                <label for="">Họ Tên Bố</label>
                                                <input type="text" name="hotenbo" class="form-control" value="<?php echo $hotenbo; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Nghề nghiệp</label>
                                                <input type="text" name="nghebo" class="form-control" value="<?php echo $nghebo; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Họ Tên Mẹ</label>
                                                <input type="text" name="hotenme" class="form-control" value="<?php echo $hotenme; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Nghề nghiệp</label>
                                                <input type="text" name="ngheme" class="form-control" value="<?php echo $ngheme; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Mã tỉnh</label>
                                                <input type="text" name="matinh" class="form-control" value="<?php echo $matinh; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Ngoại trú</label>
                                                <input type="text" name="ngoaitru" class="form-control" value="<?php echo $ngoaitru; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" name="sdt" class="form-control" value="+84 <?php echo $sdt; ?>" readonly>
                                            </div>

                                        </div>
                                        <button class="btn btn-success mb-3 float-right" onclick="printPage()">In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade exp-cover" id="resume" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Nghành học</h6>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="body">
                                    <div class="row">
                                        <?php

                                        if (isset($_SESSION['username'])) {
                                            $masv = $_SESSION['username'];

                                            // Assuming you have a database connection named $conn
                                            include('./Admin/connect.php');

                                            $query = $conn->prepare("SELECT * FROM hssinhvien 
                                            INNER JOIN hsnghanh ON hssinhvien.manghanh = hsnghanh.manghanh
                                            INNER JOIN hslop ON hssinhvien.malop = hslop.malop 
                                            WHERE masv = ?");
                                            $query->bind_param("s", $masv);
                                            $query->execute();
                                            $result = $query->get_result();

                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $malop = $row['malop'];
                                                $hedaotao = $row['hedaotao'];
                                                $manghanh = $row['manghanh'];
                                                $namtuyens = $row['namtuyens'];
                                                $tenlop = $row['tenlop'];
                                                $tenghanh = $row['tennghanh'];
                                            }
                                            $query->close();
                                            $conn->close();
                                        }
                                        ?>
                                        <div class="form-group col-md-6">
                                            <label for="">Mã lớp</label>
                                            <input type="text" name="malop" class="form-control" value="<?php echo $malop; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Tên lớp</label>
                                            <input type="text" name="malop" class="form-control" value="<?php echo $tenlop; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Hệ đào tạo</label>
                                            <input type="text" name="hedaotao" class="form-control" value="<?php echo $hedaotao; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Mã nghành</label>
                                            <input type="text" name="manghanh" class="form-control" value="<?php echo $manghanh; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Tên nghành</label>
                                            <input type="text" name="tennghanh" class="form-control" value="<?php echo $tenghanh; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Năm Tuyển sinh</label>
                                            <input type="text" name="namtuyens" class="form-control" value="<?php echo $namtuyens; ?>" readonly>
                                        </div>

                                    </div>
                                    <button class="btn btn-success mb-3 float-right" onclick="printPage()">In</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade exp-cover" id="gallery" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="tab1">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Ngoại trú</h6>
                            </div>
                            <div class="card-body">
                                <form action="./updateNgoaitru.php" method="post" >
                                    <div class="body">
                                        <div class="row">
                                            <?php

                                            if (isset($_SESSION['username'])) {
                                                $masv = $_SESSION['username'];

                                                // Assuming you have a database connection named $conn
                                                include('./Admin/connect.php');

                                                $query = $conn->prepare("SELECT * FROM hsngoaitru WHERE masv = ?");
                                                $query->bind_param("s", $masv);
                                                $query->execute();
                                                $result = $query->get_result();

                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $tenchuho = $row['tenchuho'];
                                                    $sonha = $row['sonha'];
                                                    $sodienthoai = $row['sodienthoai'];
                                                    $quanhe = $row['quanhe'];
                                                    $diachi = $row['diachi'];
                                                    $ngaybd = $row['ngaybd'];
                                                    $ngaykt = $row['ngaykt'];
                                                }
                                                $query->close();
                                                $conn->close();
                                            }
                                            ?>
                                            <div class="form-group col-md-6">
                                                <label for="">Tên chủ hộ</label>
                                                <input type="text" name="tenchuho" class="form-control" value="<?php echo $tenchuho; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Số nhà</label>
                                                <input type="text" name="sonha" class="form-control" value="<?php echo $sonha; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" name="sodienthoai" class="form-control" value="<?php echo $sodienthoai; ?>" >
                                            </div>
                                              <div class="form-group col-md-6">
                                                <label for="">Quan hệ</label>
                                                <input type="text" name="quanhe" class="form-control" value="<?php echo $quanhe; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" name="diachi" class="form-control" value="<?php echo $diachi; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Ngày bắt đầu</label>
                                                <input type="date" name="ngaybatdau" class="form-control"  value="<?php echo $ngaybd; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Ngày kết thúc</label>
                                                <input type="date" name="ngayketthuc" class="form-control"  value="<?php echo $ngaykt; ?>" >
                                            </div>

                                        </div>
                                        <button type= "submit" class="btn btn-warning mb-3 float-right ml-3"><i class="fas fa-edit"></i>Sửa </button>
                                        <button class="btn btn-success mb-3 float-right" onclick="printPage()">In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Nội trú</h6>
                        </div>
                        <div class="card-body">
                            <form action = "./updateNoitru.php"  method="post">
                                <div class="body">
                                    <div class="row">
                                        <?php

                                        if (isset($_SESSION['username'])) {
                                            $masv = $_SESSION['username'];

                                            // Assuming you have a database connection named $conn
                                            include('./Admin/connect.php');

                                            $query = $conn->prepare("SELECT * FROM hsnoitru WHERE masv = ?");
                                            $query->bind_param("s", $masv);
                                            $query->execute();
                                            $result = $query->get_result();

                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $sothe = $row['sothe'];
                                                $sonha = $row['sonha'];
                                                $sophong = $row['sophong'];
                                                $ngaybd = $row['ngaybd'];
                                                $ngaykt = $row['ngaykt'];
                                            }
                                            $query->close();
                                            $conn->close();
                                        }
                                        ?>
                                        <div class="form-group col-md-6">
                                            <label for="">Số Thẻ</label>
                                            <input type="text" name="sothe" class="form-control" value="<?php echo $sothe; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Số nhà</label>
                                            <input type="text" name="sonha" class="form-control" value="<?php echo $sonha; ?>" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Số phòng</label>
                                            <input type="text" name="sophong" class="form-control" value="<?php echo $sophong; ?>" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Ngày bắt đầu</label>
                                            <input type="date" name="ngaybatdau" class="form-control"  value="<?php echo $ngaybd; ?>" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Ngày kết thúc</label>
                                            <input type="date" name="ngayketthuc" class="form-control"  value="<?php echo $ngaykt; ?>" >
                                        </div>
                                    </div>
                                    <button type = "submit" class="btn btn-warning mb-3 float-right ml-3"><i class="fas fa-edit"></i>Sửa </button>

                                    <button class="btn btn-success mb-3 float-right" onclick="printPage()">In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['username'])) {
                    $masv = $_SESSION['username'];

                    include('./Admin/connect.php');

                    // Kiểm tra xem sinh viên có là ngoại trú hay không
                    $queryCheckNgoaiTru = $conn->prepare("SELECT COUNT(*) AS count FROM hssinhvien WHERE masv = ? AND ngoaitru = 'Có'");
                    $queryCheckNgoaiTru->bind_param("s", $masv);
                    $queryCheckNgoaiTru->execute();
                    $resultCheckNgoaiTru = $queryCheckNgoaiTru->get_result();
                    $rowCheckNgoaiTru = $resultCheckNgoaiTru->fetch_assoc();
                    $isNgoaiTru = $rowCheckNgoaiTru['count'] > 0;

                    $queryCheckNgoaiTru->close();

                    // Tùy thuộc vào kết quả kiểm tra, hiển thị tab tương ứng
                    if ($isNgoaiTru) {
                        echo '<script>$(".tab1").show(); $(".tab2").hide();</script>';
                    } else {
                        echo '<script>$(".tab1").hide(); $(".tab2").show();</script>';
                    }

                    $conn->close();
                }
                ?>
            </div>
        </div>
    </div>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function() {
        // Perform any additional client-side validation or actions if needed
        // This will trigger the form submission and execute your PHP script
    });
</script>

<?php
include('./Admin/includes/script.php');
include('./Admin/includes/sweetalert2.php');
?>


</html>