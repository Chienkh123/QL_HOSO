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

<!-- Table -->
<div class="container-fluid">
    <div class="card shadow md-4">
        <div class="card-header py-3">
            <h6>
                <h3 class="m-0 font-weight-bold text-primary">Giấy tờ nhập trường</h3>
            </h6>
        </div>
        <div class="card-body">
            <form action="./controller/updateGiayto.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Mã sinh viên</label>
                            <input type="text" name="masv" class="form-control" value="<?php echo $masv; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giấy chuyển sinh hoạt Đảng hoặc Đoàn(nếu có)</label>
                            <select name="val1" id="val1" class="form-control <?= ($val1 == 1) ? 'is-valid' : (($val1 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val1 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val1 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val1 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val1 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val1 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giấy chứng nhận kết quả thi tốt nghiệp THPT năm 2021 (bản gốc)</label>
                            <select name="val2" id="val2" class="form-control <?= ($val2 == 1) ? 'is-valid' : (($val2 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val2 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val2 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val2 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val2 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val2 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Học bạ THPT hoặc tương đương (bản sao công chứng)</label>
                            <select name="val3" id="val3" class="form-control <?= ($val3 == 1) ? 'is-valid' : (($val3 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val3 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val3 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val3 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val3 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val3 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Bằng tốt nghiệp cấp 3(photo công chứng)</label>
                            <select name="val4" id="val4" class="form-control <?= ($val4 == 1) ? 'is-valid' : (($val4 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val4 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val4 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val4 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val4 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val4 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giấy chứng nhận kết quả thi</label>
                            <select name="val5" id="val5" class="form-control <?= ($val5 == 1) ? 'is-valid' : (($val5 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val5 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val5 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val5 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val5 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val5 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Bản photo công chứng CMND hoặc Căn cước công dân</label>
                            <select name="val6" id="val6" class="form-control <?= ($val6 == 1) ? 'is-valid' : (($val6 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val6 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val6 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val6 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val6 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val6 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giấy khai sinh (bản sao hoặc trích lục)</label>
                            <select name="val7" id="val7" class="form-control <?= ($val7 == 1) ? 'is-valid' : (($val7 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val7 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val7 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val7 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val7 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val7 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">2 ảnh 3*4</label>
                            <select name="val8" id="val8" class="form-control <?= ($val8 == 1) ? 'is-valid' : (($val8 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val8 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val8 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val8 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val8 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val8 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Sơ yếu lý lịch (có dấu xác nhận của địa phương)</label>
                            <select name="val9" id="val9" class="form-control <?= ($val9 == 1) ? 'is-valid' : (($val9 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val9 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val9 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val9 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val9 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val9 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="val10">Phiếu đăng ký xét tuyển</label>
                            <select name="val10" id="val10" class="form-control <?= ($val10 == 1) ? 'is-valid' : (($val10 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val10 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val10 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val10 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val10 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val10 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Giấy chuyển NVQS</label>
                            <select name="val11" id="val11" class="form-control <?= ($val11 == 1) ? 'is-valid' : (($val11 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val11 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val11 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val11 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val11 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val11 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Các loại giấy tờ xác nhận đối tượng và khu vực ưu tiên (nếu có)</label>
                            <select name="val12" id="val12" class="form-control <?= ($val12 == 1) ? 'is-valid' : (($val12 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val12 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val12 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val12 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val12 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val12 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Giấy báo nhập học hoặc thông báo xác nhận xét tuyển (bản chính)</label>
                            <select name="val13" id="val13" class="form-control <?= ($val13 == 1) ? 'is-valid' : (($val13 == 0) ? 'is-invalid' : ''); ?>">
                                <option value="0" <?= ($val13 == 0) ? 'selected' : ''; ?> class="form-control <?= ($val13 == 0) ? 'is-invalid' : ''; ?>">Chưa nộp</option>
                                <option value="1" <?= ($val13 == 1) ? 'selected' : ''; ?> class="form-control <?= ($val13 == 1) ? 'is-valid' : ''; ?>">Đã nộp</option>
                                <option value="2" <?= ($val13 == 2) ? 'selected' : ''; ?>>Đã trả</option>
                            </select>
                            </select>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Cập nhật</button>
                <a href="dsgiayto.php" class="btn btn-danger mt-5">Thoát</a>
            </form>

        </div>
    </div>

    <?php
    include('includes/script.php');
    include('includes/footer.php');
    include('includes/sweetalert2.php');
    ?>

</div>