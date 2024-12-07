
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

<!-- Modal add-->
<div class="modal fade" id="adminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm dân tộc</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./controller/addDantoc.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Mã dân tôc</label>
                            <input type="text" name="madt" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tên dân tộc</label>
                            <input type="text" name="tendt" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addDantoc" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa dân tộc</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./controller/updateDantoc.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Mã dân tộc</label>
                            <input type="text" name="madt" class="form-control" id="editMadt" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tên dân tộc</label>
                            <input type="text" name="tendt" class="form-control" id="editTendt">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateDantoc" class="btn btn-success">Lưu</button>
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
                <h3 class="m-0 font-weight-bold text-primary">Nghành</h3>
            </h6>
        </div>
        <div class="card-body">
            <form action="" method="post" class="mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Mã Nghành</th>
                                <th>Tên nghành</th>
                                <th colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <?php
                        include_once "./connect.php";
                        $sql = "SELECT * FROM hsnghanh";
                        $result = $conn->query($sql);
                        $count = 1;
                        if ($result->num_rows > 0) {
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr class="text-center">
                                    <td><?= $count ?></td>
                                    <td><?= $row["manghanh"] ?></td>
                                    <td><?= $row["tennghanh"] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success editDantoc" data-bs-toggle="modal" data-bs-target="#editmodal" data-madt="<?= $row['manghanh'] ?>"> <i class="bi bi-pencil-square" style="color: aliceblue;"></i></a>
                                        <a href="./controller/deleteDantoc.php?manghanh=<?= $row['manghanh'] ?>" class="btn btn-danger" onclick="confirmDelete(event)"> <i class="bi bi-trash3-fill" style="color: aliceblue;"></i></a>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminprofile">Thêm</button>
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