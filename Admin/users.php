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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm tài khoản</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./controller/addUser.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Tài khoản</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Họ và tên</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addUser" class="btn btn-success">Lưu</button>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa tài khoản</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./controller/updateUser.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Tài khoản</label>
                            <input type="text" name="username" class="form-control" id="editMasv" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Mật khẩu</label>
                            <input type="text" name="password" class="form-control" id="editName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Họ và tên</label>
                            <input type="text" name="name" class="form-control" id="editEmail">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">email</label>
                            <input type="email" name="email" class="form-control" id="editPassword">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateUser" class="btn btn-success">Lưu</button>
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
                <h3 class="m-0 font-weight-bold text-primary">Tài khoản</h3>
            </h6>
        </div>
        <div class="card-body">
            <form action="" method="post" class="mb-3">
                <div class="input-group col-md-6 mb-3" style="float: right;">
                    <select name="search_criteria" class="form-control col-md-3 form-select" style="margin-right: 10px; border-radius: 5px;">
                        <option value="username">Tài khoản</option>
                        <option value="name">Họ và tên</option>
                    </select>

                    <input type="search" name="search" class="form-control rounded" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-outline-success rounded" style="margin-left: 10px;" data-mdb-ripple-init><i class="bi bi-search"></i></button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Họ Và Tên</th>
                                <th>Email</th>
                                <th>Chức vụ</th>
                                <th colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <?php
                        include_once "./connect.php";
                        $searchValue = $_POST['search'] ?? '';
                        $searchCriteria = $_POST['search_criteria'] ?? 'username';

                        $sql = "SELECT * FROM users WHERE $searchCriteria LIKE '%$searchValue%' AND isAdmin = 1";
                        $result = $conn->query($sql);
                        $count = 1;
                        if ($result->num_rows > 0) {
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr class="text-center">
                                    <td><?= $count ?></td>
                                    <td><?= $row["username"] ?></td>
                                    <td><?= $row["password"] ?></td>
                                    <td><?= $row["name"] ?></td>
                                    <td><?= $row["email"] ?></td>
                                    <td><?= $row["isAdmin"] == 1 ? 'Quản lý' : 'Admin' ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success editBtn" data-bs-toggle="modal" data-bs-target="#editmodal" data-masv="<?= $row['username'] ?>"> <i class="bi bi-pencil-square" style="color: aliceblue;"></i></a>
                                        <a href="./controller/deleteUsers.php?username=<?= $row['username'] ?>" class="btn btn-danger" onclick="confirmDelete(event)"> <i class="bi bi-trash3-fill" style="color: aliceblue;"></i></a>
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