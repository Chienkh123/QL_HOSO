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


<!-- Table -->
<div class="container-fluid">
    <div class="card shadow md-4">
        <div class="card-header py-3">
            <h6>
                <h3 class="m-0 font-weight-bold text-primary">Giấy tờ nhập trường</h3>
            </h6>
        </div>
        <div class="card-body">
            <form action="" method="post" class="mb-3">
                <div class="input-group col-md-6 mb-3" style="float: right;">
                    <select name="search_criteria" class="form-control col-md-3 form-select" style="margin-right: 10px; border-radius: 5px;">
                        <option value="masv">Mã sinh viên</option>
                    </select>

                    <input type="search" name="search" class="form-control rounded" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-outline-success rounded" style="margin-left: 10px;" data-mdb-ripple-init><i class="bi bi-search"></i></button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Mã sinh viên</th>
                                <th>Giấy chuyển sinh hoạt Đảng hoặc Đoàn(nếu có)</th>
                                <th>Giấy chứng nhận kết quả thi tốt nghiệp THPT năm 2021 (bản gốc)</th>
                                <th>Học bạ THPT hoặc tương đương (bản sao công chứng)</th>
                                <th>Bằng tốt nghiệp cấp 3(photo công chứng)</th>
                                <th>Giấy chứng nhận kết quả thi</th>
                                <th>Bản photo công chứng CMND hoặc Căn cước công dân</th>
                                <th>Giấy khai sinh (bản sao hoặc trích lục)</th>
                                <th>2 ảnh 3*4</th>
                                <th>Sơ yếu lý lịch (có dấu xác nhận của địa phương)</th>
                                <th>Phiếu đăng ký xét tuyển</th>
                                <th>Giấy chuyển NVQS</th>
                                <th>Các loại giấy tờ xác nhận đối tượng và khu vực ưu tiên (nếu có)</th>
                                <th>Giấy báo nhập học hoặc thông báo xác nhận xét tuyển (bản chính)</th>
                                <th colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <?php
                        function getStatus($status)
                        {
                            switch ($status) {
                                case 0:
                                    return "Chưa nộp";
                                case 1:
                                    return "Đã nộp";
                                case 2:
                                    return "Đã trả";
                                default:
                                    return "Unknown Status";
                            }
                        }
                        function getStatusColor($value) {
                            switch ($value) {
                                case 0:
                                    return 'red';
                                case 1:
                                    return 'green';
                                case 2:
                                    return 'orange';
                                default:
                                    return 'black'; // Default color if val is not 0, 1, or 2
                            }
                        }
                        ?>
                        <?php
                        include_once "./connect.php";
                        $searchValue = $_POST['search'] ?? '';
                        $searchCriteria = $_POST['search_criteria'] ?? 'masv';

                        $sql = "SELECT * FROM hsgiayto WHERE $searchCriteria LIKE '%$searchValue%'";
                        $result = $conn->query($sql);
                        $count = 1;
                        if ($result->num_rows > 0) {
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr class="text-center">
                                    <td><?= $count ?></td>
                                    <td><?= $row["masv"] ?></td>
                                    <td style="color: <?= getStatusColor($row["val1"]) ?>"><?= getStatus($row["val1"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val2"]) ?>"><?= getStatus($row["val2"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val3"]) ?>"><?= getStatus($row["val3"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val4"]) ?>"><?= getStatus($row["val4"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val5"]) ?>"><?= getStatus($row["val5"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val6"]) ?>"><?= getStatus($row["val6"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val7"]) ?>"><?= getStatus($row["val7"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val8"]) ?>"><?= getStatus($row["val8"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val9"]) ?>"><?= getStatus($row["val9"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val10"]) ?>"><?= getStatus($row["val10"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val11"]) ?>"><?= getStatus($row["val11"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val12"]) ?>"><?= getStatus($row["val12"]) ?></td>
                                    <td style="color: <?= getStatusColor($row["val13"]) ?>"><?= getStatus($row["val13"]) ?></td>
                                    <td>
                                        <a href="./editGiayto.php?masv=<?= $row['masv'] ?>" class="btn btn-success"> <i class="bi bi-pencil-square" style="color: aliceblue;"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $count++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="16" class="text-center">Không có kết quả.</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <?php
    include('includes/script.php');
    include('includes/footer.php');
    include('includes/sweetalert2.php');
    ?>

</div>