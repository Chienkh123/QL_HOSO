
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

<!-- Modal add
<div class="modal fade" id="adminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./controller/addNgoaitru.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Mã sinh viên</label>
                            <input type="text" name="masv" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tên chủ hộ</label>
                            <input type="text" name="tenchuho" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Số nhà</label>
                            <input type="text" name="sonha" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Số điện thoại</label>
                            <input type="number" name="sodt" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Quan hệ</label>
                            <input type="text" name="quanhe" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="diachi" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Ngày bắt đầu</label>
                            <input type="text" name="ngaybatdau" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Ngày kết thúc</label>
                            <input type="text" name="ngayketthuc" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addNgoaitru" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Modal edit -->
<div class="modal fade" id="editNgoaitru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./controller/updateNgoaitru.php" method="post">
                <div class="modal-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                            <label for="">Mã sinh viên</label>
                            <input type="text" name="masv" class="form-control" id="masv">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tên chủ hộ</label>
                            <input type="text" name="tenchuho" class="form-control" id="tenchuho">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Số nhà</label>
                            <input type="text" name="sonha" class="form-control" id="sonha">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Số điện thoại</label>
                            <input type="number" name="sodt" class="form-control" id="sdt" max="99999999999">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Quan hệ</label>
                            <input type="text" name="quanhe" class="form-control" id="quanhe" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="diachi" class="form-control" id="diachi" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Ngày bắt đầu</label>
                            <input type="date" name="ngaybatdau" class="form-control" id="ngaybatdau" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Ngày kết thúc</label>
                            <input type="date" name="ngayketthuc" class="form-control" id="ngayketthuc" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateNgoaitru" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Table -->
<div class="container-fluid">
    <div class="card shadow md-4">
        <div class="card-header py-3">
            <h6>
                <h3 class="m-0 font-weight-bold text-primary">Danh sách ngoại trú</h3>
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
                                <th>Tên chủ hộ</th>
                                <th>Số nhà</th>
                                <th>Số điện thoại</th>
                                <th>Quan hệ</th>
                                <th>Địa chỉ</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <?php
                        include_once "./connect.php";
                        $searchValue = $_POST['search'] ?? '';
                        $searchCriteria = $_POST['search_criteria'] ?? 'masv';

                        $sql = "SELECT * FROM hsngoaitru WHERE $searchCriteria LIKE '%$searchValue%'";
                        $result = $conn->query($sql);
                        $count = 1;
                        if ($result->num_rows > 0) {
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr class="text-center">
                                    <td><?= $count ?></td>
                                    <td><?= $row["masv"] ?></td>
                                    <td><?= $row["tenchuho"] ?></td>
                                    <td><?= $row["sonha"] ?></td>
                                    <td><?= $row["sodienthoai"] ?></td>
                                    <td><?= $row["quanhe"] ?></td>
                                    <td><?= $row["diachi"] ?></td>
                                    <td><?= $row["ngaybd"] ?></td>
                                    <td><?= $row["ngaykt"] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success editNgoaitru" data-bs-toggle="modal" data-bs-target="#editNgoaitru" data-masv="<?= $row['masv'] ?>"> <i class="bi bi-pencil-square" style="color: aliceblue;"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $count++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7" class="text-center">Không có kết quả.</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminprofile">Thêm</button> -->
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