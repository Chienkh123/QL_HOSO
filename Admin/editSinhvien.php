<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
$name = $_SESSION['name'];
$image = $_SESSION['image'];

include('./includes/header.php');
include('./includes/sidebar.php');
include('./includes/navbar.php');

if (isset($_GET['masv'])) {
    $masv = $_GET['masv'];

    // Assuming you have a database connection named $conn
    include('./connect.php');

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
        $malop = $row['malop'];
        $hedaotao = $row['hedaotao'];
        $manghanh = $row['manghanh'];
        $namtuyens = $row['namtuyens'];
        $ngoaitru = $row['ngoaitru'];
        $sdt = $row['sdt'];
    }

    $query->close();
    $conn->close();
}

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Sửa thông tin sinh viên</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin sinh viên</h6>
                </div>
                <div class="card-body">
                    <form action="./controller/updateSinhvien.php" method="post">
                        <div class="body" id="editsinhvien">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Mã sinh viên</label>
                                    <input type="text" name="masv" class="form-control" value="<?php echo $masv; ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="hoten" class="form-control" value="<?php echo $hoten; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ngày sinh</label>
                                    <input type="date" name="ngaysinh" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $ngaysinh; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Giới tính</label>
                                    <select name="gioitinh" class="form-control">
                                        <option value="Nam" <?php echo (isset($gioitinh) && $gioitinh == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                                        <option value="Nữ" <?php echo (isset($gioitinh) && $gioitinh == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                                        <option value="Khác" <?php echo (isset($gioitinh) && $gioitinh == 'Khác') ? 'selected' : ''; ?>>Khác</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nơi sinh</label>
                                    <input type="text" name="noisinh" class="form-control" value="<?php echo $noisinh; ?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control" value="<?php echo $diachi; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã dân tộc</label>
                                    <select name="madt" id="madt" class="form-control">
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hsdantoc");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = (isset($madt) && $madt == $row['madt']) ? 'selected' : '';
                                        ?>
                                                <option value="<?php echo $row['madt']; ?>" <?php echo $selected; ?>> <?php echo $row['madt'] . ' - ' . $row['tendt']; ?>
                                                </option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã đối tượng</label>
                                    <select name="madoituong" class="form-control" required>
                                        <option value="" selected disabled>Chọn đối tượng</option>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hsdoituong");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = (isset($madoituong) && $madoituong == $row['madoituong']) ? 'selected' : '';
                                        ?>
                                                <option value="<?php echo $row['madoituong'] ?>" <?php echo $selected; ?> ><?php echo $row['madoituong'] . ' - ' . $row['tendoituong'] ?></option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Đoàn viên</label>
                                    <select name="doanvien" required class="form-control">
                                        <option value="đã nộp" <?php echo (isset($doanvien) && $doanvien == 'đã nộp') ? 'selected' : ''; ?>>Đã nộp</option>
                                        <option value="chưa nộp" <?php echo (isset($doanvien) && $doanvien == 'chưa nộp') ? 'selected' : ''; ?>>Chưa nộp</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ngày vào đoàn</label>
                                    <input type="date" name="ngayvaodoan" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $ngayvaodoan; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nơi kết nạp</label>
                                    <input type="text" name="noiketnap" class="form-control" value="<?php echo $noiketnap; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Số CCCD</label>
                                    <input type="number" name="cccd" class="form-control" value="<?php echo $cccd; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ngày cấp</label>
                                    <input type="date" name="ngaycap" max="<?php echo date('Y-m-d'); ?>" class="form-control" value="<?php echo $ngaycap; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nơi cấp</label>
                                    <input type="text" name="noicap" class="form-control" value="<?php echo $noicap; ?>" required>
                                </div>
                                <div class=" form-group col-md-6">
                                    <label for="">Họ Tên Bố</label>
                                    <input type="text" name="hotenbo" class="form-control" value="<?php echo $hotenbo; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nghề nghiệp</label>
                                    <input type="text" name="nghebo" class="form-control" value="<?php echo $nghebo; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Họ Tên Mẹ</label>
                                    <input type="text" name="hotenme" class="form-control" value="<?php echo $hotenme; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nghề nghiệp</label>
                                    <input type="text" name="ngheme" class="form-control" value="<?php echo $ngheme; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã tỉnh</label>
                                    <select name="matinh" class="form-control" required>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hstinh");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = ($row['matinh'] == $matinh) ? 'selected' : '';
                                        ?>
                                                <option value="<?php echo $row['matinh'] ?>" <?php echo $selected;?>><?php echo $row['matinh'] . ' - ' . $row['tentinh'] ?></option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã lớp</label>
                                    <select name="malop" class="form-control" required>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hslop");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = ($row['malop'] == $malop) ? 'selected' : '';
                                        ?>
                                                <option value="<?php echo $row['malop'] ?>" <?php echo $selected;?>><?php echo $row['malop'] . ' - ' . $row['tenlop'] ?></option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Hệ đào tạo</label>
                                    <select name="hedaotao" class="form-control" required>
                                        <option value="Chính quy" <?php echo ($hedaotao == 'Chính quy') ? 'selected' : '';?>>Chính quy</option>
                                        <option value="Đại học <?php echo ($hedaotao == 'Đại học') ? 'selected' : '';?>">Đại học</option>
                                        <option value="Cao đẳng" <?php echo ($hedaotao == 'Cao đẳng') ? 'selected' : '';?>>Cao đẳng</option>
                                        <option value="Trung cấp" <?php echo ($hedaotao == 'Trung cấp') ? 'selected' : '';?>>Trung cấp</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã nghành</label>
                                    <select name="manghanh" class="form-control" required>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hsnghanh");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = ($row['manghanh'] == $manghanh) ? 'selected' : '';
                                        ?>
                                                <option value="<?php echo $row['manghanh'] ?>" <?php echo $selected;?>><?php echo $row['manghanh'] . ' - ' . $row['tennghanh'] ?></option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Năm Tuyển sinh</label>
                                    <input type="text" name="namtuyens" class="form-control" value="<?php echo $namtuyens; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ngoại trú</label>
                                    <select name="ngoaitru" id="ngoaitru" class="form-control" required>
                                        <option value="Có" <?php echo ($ngoaitru == 'Có') ? 'selected' : '';?>>Có</option>
                                        <option value="Không" <?php echo ($ngoaitru == 'Không') ? 'selected' : '';?>>Không</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-control" value="<?php echo $sdt; ?>">
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-5">Cập nhật</button>
                        <a href="dssinhvien.php" class="btn btn-danger mt-5">Thoát</a>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<?php
include('includes/script.php');
include('includes/footer.php');
include('includes/sweetalert2.php');
?>