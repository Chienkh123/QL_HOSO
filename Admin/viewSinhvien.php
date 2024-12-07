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

    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param("s", $masv);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image1 = $row['image'];
    }
    }

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="panel mx-auto c-mb-3">
                    <div class="col-sm-12 dv-title">
                        <h3 class="c-text-left c-uppercase c-border-l-4 c-border-green-600 c-font-bold c-text-2xl "> Thông Tin Sinh Viên </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 p-0">
                     <img style="border: 2px solid; border-radius: 10%;" src="<?php echo '.'.$image1 ?>" width="200" height="200" alt="">
                        <table class="table table-hover table-borderless">
                            <?php
                            include "./connect.php";
                            if (isset($_GET['masv'])) {
                                $masv = $_GET['masv'];
                            
                                // Assuming you have a database connection named $conn
                                include('./connect.php');
                            
                                $query = $conn->prepare("SELECT * FROM hssinhvien WHERE masv = ?");
                                $query->bind_param("s", $masv);
                                $query->execute();
                                $result = $query->get_result();
                            
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                            ?>
                                           
                                    <tbody>
                                        <tr>
                                            <th>Mã sinh viên</th>
                                            <td><?php echo $row['masv']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Họ tên:</th>
                                            <td><?php echo $row['hoten']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày sinh:</th>
                                            <td><?php echo $row['ngaysinh']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Đối tượng</th>
                                            <td><?php echo $row['madoituong']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Đoàn viên</th>
                                            <td><?php echo $row['doanvien']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày vào đoàn</th>
                                            <td><?php echo $row['ngayvaodoan']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nơi kết nạp</th>
                                            <td><?php echo $row['noiketnap']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>CCCD</th>
                                            <td><?php echo $row['cccd']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày cấp</th>
                                            <td><?php echo $row['ngaycap']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nơi cấp</th>
                                            <td><?php echo $row['noicap']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Họ tên bố</th>
                                            <td><?php echo $row['hotenbo']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nghề nghiệp</th>
                                            <td><?php echo $row['nghebo']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Họ tên mẹ</th>
                                            <td><?php echo $row['hotenme']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nghề nghiệp</th>
                                            <td><?php echo $row['ngheme']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tỉnh thành</th>
                                            <td><?php echo $row['matinh']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Lớp</th>
                                            <td><?php echo $row['malop']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Hệ đào tạo</th>
                                            <td><?php echo $row['hedaotao']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngành</th>
                                            <td><?php echo $row['manghanh']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Năm tuyển sinh</th>
                                            <td><?php echo $row['namtuyens']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngoại trú</th>
                                            <td><?php echo $row['ngoaitru']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại</th>
                                            <td><?php echo $row['sdt']; ?></td>
                                        </tr>



                                    </tbody>
                            <?php
                                } else {
                                    echo "<p>No records found.</p>";
                                }
                            } else {
                                echo "<p>Error executing query: " . $conn->error . "</p>";
                            }

                            // Close the database connection
                            $conn->close();
                        }
                            ?>
                        </table>
                        <td><a href="dssinhvien.php" type="button" class="btn btn-secondary mb-3">Quay lại</a></td>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<?php
include('./includes/script.php');
include('./includes/footer.php');
include('./includes/sweetalert2.php');
?>