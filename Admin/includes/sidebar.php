<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-building"></i>
        </div>
        <div class="sidebar-brand-text mx-8">Quản lý hồ sơ</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thông tin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>
    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Danh mục</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục:</h6>
                <a class="collapse-item" href="dantoc.php"><i class="bi bi-person-gear"></i> Dân tộc</a>
                <a class="collapse-item" href="tinh.php"><i class="bi bi-send-check"></i> Tỉnh</a>
                <a class="collapse-item" href="doituong.php"><i class="bi bi-person-raised-hand"></i> Đối tượng</a>
                <a class="collapse-item" href="lop.php"><i class="fas fa-fw fa-table"></i> Lớp học</a>
                <a class="collapse-item" href="nghanh.php"><i class="fas fa-fw fa-chart-area"></i> Nghành</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Cư trú</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Cư trú:</h6>
                <a class="collapse-item" href="dsngoaitru.php"><i class="bi bi-house-dash"></i> Sinh viên ngoại trú</a>
                <a class="collapse-item" href="dsnoitru.php"> <i class="bi bi-house-check"></i> Sinh viên nội trú</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Hồ sơ
    </div>


    <li class="nav-item">
        <a class="nav-link" href="dssinhvien.php">
            <i class="bi bi-hdd-stack"></i>
            <span>Hồ sơ sinh viên</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="dsgiayto.php">
            <i class="bi bi-folder2"></i>
            <span>Giấy tờ nhập trường</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="account.php">
            <i class="bi bi-person-check"></i>
            <span>Thông tin tài khoản</span></a>
    </li>
    <?php
    if (isset($_SESSION['username']) && isset($_SESSION['isAdmin'])) {
        $isAdmin = $_SESSION['isAdmin'];

        // Generate the navigation item based on isAdmin status
        if ($isAdmin == 2) {
            echo '<li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="bi bi-person-plus"></i>
                    <span>Quản lý tài khoản</span>
                </a>
            </li>';
        }
    }
    ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng đăng xuất</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn có muốn đăng xuất không</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>