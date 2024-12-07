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
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Modal add-->
        <div class="modal fade" id="adminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm sinh viên</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="./controller/addSinhvien.php" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Mã sinh viên</label>
                                    <input type="text" name="masv" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="hoten" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ngày sinh</label>
                                    <input type="date" name="ngaysinh" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Giới tính</label>
                                    <select name="gioitinh" class="form-control">
                                        <option value="" selected disabled>Chọn giới tính</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nơi sinh</label>
                                    <input type="text" name="noisinh" class="form-control" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã dân tộc</label>
                                    <select name="madt" id="madt" class="form-control">
                                        <option value="" selected disabled>Chọn dân tộc</option>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hsdantoc");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $row['madt'] ?>"><?php
                                                                                            echo $row['madt'] . ' - ' . $row['tendt'] ?></option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã đối tượng</label>
                                    <select name="madoituong" id="madoituong" class="form-control" required>
                                        <option value="" selected disabled>Chọn đối tượng</option>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hsdoituong");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $row['madoituong'] ?>"><?php
                                                                                                    echo $row['madoituong'] . ' - ' . $row['tendoituong'] ?></option>
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
                                        <option value="" selected disabled>Chọn đoàn viên</option>
                                        <option value="đã nộp">Đã nộp</option>
                                        <option value="chưa nộp">Chưa nộp</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ngày vào đoàn</label>
                                    <input type="date" name="ngayvaodoan" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nơi kết nạp</label>
                                    <input type="text" name="noiketnap" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Số CCCD</label>
                                    <input type="number" name="cccd" class="form-control" maxlength="12" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ngày cấp</label>
                                    <input type="date" name="ngaycap" max="<?php echo date('Y-m-d'); ?>" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nơi cấp</label>
                                    <input type="text" name="noicap" class="form-control" required>
                                </div>
                                <div class=" form-group col-md-6">
                                    <label for="">Họ Tên Bố</label>
                                    <input type="text" name="hotenbo" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nghề nghiệp</label>
                                    <input type="text" name="nghebo" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Họ Tên Mẹ</label>
                                    <input type="text" name="hotenme" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nghề nghiệp</label>
                                    <input type="text" name="ngheme" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã tỉnh</label>
                                    <select name="matinh" id="matinh" class="form-control" required>
                                        <option value="" selected disabled>Chọn tỉnh</option>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hstinh");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $row['matinh'] ?>"><?php echo $row['matinh'] . ' - ' . $row['tentinh'] ?></option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã lớp</label>
                                    <select name="malop" id="malop" class="form-control" required>
                                        <option value="" selected disabled>Chọn lớp</option>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hslop");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $row['malop'] ?>"><?php echo $row['malop'] . ' - ' . $row['tenlop'] ?></option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Hệ đào tạo</label>
                                    <select name="hedaotao" id="hedaotao" class="form-control" required>
                                        <option value="" selected disabled>Chọn hệ đào tạo</option>
                                        <option value="Chính quy">Chính quy</option>
                                        <option value="Đại học">Đại học</option>
                                        <option value="Cao đẳng">Cao đẳng</option>
                                        <option value="Trung cấp">Trung cấp</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mã ngành</label>
                                    <select name="manghanh" id="manghanh" class="form-control" required>
                                        <option value="" selected disabled>Chọn ngành</option>
                                        <?php
                                        include('./connect.php');
                                        $result = $conn->query("SELECT * FROM hsnghanh");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $row['manghanh'] ?>"><?php echo $row['manghanh'] . ' - ' . $row['tennghanh'] ?></option>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Năm Tuyển sinh</label>
                                    <input type="text" name="namtuyens" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ngoại trú</label>
                                    <select name="ngoaitru" id="ngoaitru" class="form-control" required>
                                        <option value="" selected disabled>Chọn</option>
                                        <option value="Có">Có</option>
                                        <option value="Không">Không</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-control" maxlength="11">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="addSinhvien" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Danh sách sinh viên</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin sinh viên</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="input-group col-md-6 mb-3" style="float: right;">
                            <select name="search_criteria" class="form-control col-md-3 form-select" style="margin-right: 10px; border-radius: 5px;">
                                <option value="masv">Mã sinh viên</option>
                                <option value="hoten">Tên sinh viên</option>
                            </select>

                            <input type="search" name="search" class="form-control rounded" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-outline-success rounded" style="margin-left: 10px;" data-mdb-ripple-init><i class="bi bi-search"></i></button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã sinh viên</th>
                                        <th>Họ tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới tính</th>
                                        <th>Nơi sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>Mã Dân tộc</th>
                                        <th>Mã đối tượng</th>
                                        <th>Đoàn viên</th>
                                        <th>Ngày vào đoàn</th>
                                        <th>Nơi kết nạp</th>
                                        <th>Số CCCD</th>
                                        <th>Ngày cấp</th>
                                        <th>Nơi cấp</th>
                                        <th>Họ tên bố</th>
                                        <th>Nghề nghiệp</th>
                                        <th>Họ tên mẹ</th>
                                        <th>Nghề nghiệp</th>
                                        <th>Mã tỉnh</th>
                                        <th>Mã lớp</th>
                                        <th>Hệ đào tạo</th>
                                        <th>Mã ngành</th>
                                        <th>Năm tuyển sinh</th>
                                        <th>Ngoại trú</th>
                                        <th>Số điện thoại</th>
                                        <th colspan="2">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       function getStatusColor($value) {
                                        switch ($value) {
                                            case 'chưa nộp':
                                                return 'red';
                                            case 'đã nộp':
                                                return 'green';
                                            default:
                                                return 'black'; // Default color if val is not 0, 1, or 2
                                        }
                                      }
                                     
                                    include "./connect.php";
                                    $searchValue = $_POST['search'] ?? '';
                                    $searchCriteria = $_POST['search_criteria'] ?? 'masv';

                                    $sql = "SELECT * FROM hssinhvien WHERE $searchCriteria LIKE '%$searchValue%'";
                                    $result = $conn->query($sql);
                                    $count = 1;
                                    if ($result->num_rows > 0) {
                                        $count = 1;
                                        while ($row = $result->fetch_assoc()) {
                                    ?>

                                            <tr>
                                                <td><?= $count ?></td>
                                                <td><?= $row['masv'] ?></td>
                                                <td><?= $row['hoten'] ?></td>
                                                <td><?= $row['ngaysinh'] ?></td>
                                                <td><?= $row['gioitinh'] ?></td>
                                                <td><?= $row['noisinh'] ?></td>
                                                <td><?= $row['diachi'] ?></td>
                                                <td><?= $row['madt'] ?></td>
                                                <td><?= $row['madoituong'] ?></td>
                                                <td style="color: <?= getStatusColor($row["doanvien"])?>"><?= $row['doanvien'] ?></td>
                                                <td><?= $row['ngayvaodoan'] ?></td>
                                                <td><?= $row['noiketnap'] ?></td>
                                                <td><?= $row['cccd'] ?></td>
                                                <td><?= $row['ngaycap'] ?></td>
                                                <td><?= $row['noicap'] ?></td>
                                                <td><?= $row['hotenbo'] ?></td>
                                                <td><?= $row['nghebo'] ?></td>
                                                <td><?= $row['hotenme'] ?></td>
                                                <td><?= $row['ngheme'] ?></td>
                                                <td><?= $row['matinh'] ?></td>
                                                <td><?= $row['malop'] ?></td>
                                                <td><?= $row['hedaotao'] ?></td>
                                                <td><?= $row['manghanh'] ?></td>
                                                <td><?= $row['namtuyens'] ?></td>
                                                <td><?= $row['ngoaitru'] ?></td>
                                                <td><?= $row['sdt'] ?></td>
                                                 <td>
                                                    <a href="./viewSinhvien.php?masv=<?= $row['masv'] ?>" class="btn btn-success"><i class="bi bi-eye" style="color: aliceblue;"></i></a>
                                                </td>
                                                <td>
                                                    <a href="./editSinhvien.php?masv=<?= $row['masv'] ?>" class="btn btn-success"><i class="bi bi-pencil-square" style="color: aliceblue;"></i></a>
                                                </td>
                                                <td>
                                                    <a href="./controller/deleteSinhvien.php?masv=<?= $row['masv'] ?>" class="btn btn-danger" onclick="confirmDelete(event)"> <i class="bi bi-trash3-fill" style="color: aliceblue;"></i></a>
                                                </td>

                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="28" class="text-center">Không có kết quả.</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#adminprofile">Thêm</button>
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
