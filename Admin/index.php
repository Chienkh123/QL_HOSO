<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
if (isset($_SESSION['username'])) {
    $name = $_SESSION['name'];
    $image = $_SESSION['image'];
}

if (isset($_SESSION['username']) && isset($_SESSION['isAdmin'])) {
    $isAdmin = $_SESSION['isAdmin'];
    if ($isAdmin == 0) {
        header("Location: ../index.php");
        exit();
    }
}
?>

<?php
include('./includes/header.php');
include('./includes/sidebar.php');
include('./includes/navbar.php');
?>
<style>
    .earnings-card-zoom:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease-in-out;
        cursor: pointer;
    }
</style>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="./dssinhvien.php" class="card-link">
                    <div class="card border-left-primary shadow h-100 py-2 earnings-card-zoom">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Thông tin sinh viên
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        include('./connect.php');
                                        $sql = "SELECT COUNT(*) as count FROM hssinhvien";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $count = $row['count'];
                                        }
                                        echo $count;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                      <a href="./account.php" class="card-link">
                    <div class="card border-left-success shadow h-100 py-2 earnings-card-zoom" >
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Thông tin tài khoản
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        include('./connect.php');
                                        $sql = "SELECT COUNT(*) as count FROM users WHERE isAdmin = 0";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $count = $row['count'];
                                        }
                                        echo $count;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="./dsngoaitru.php" class="card-link">
                    <div class="card border-left-info shadow h-100 py-2 earnings-card-zoom">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Sinh viên ngoại trú
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <?php
                                                include('./connect.php');
                                                $sql = "SELECT COUNT(*) as count FROM hsngoaitru";
                                                $result = $conn->query($sql);
                                                $count = 0;
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $count = $row['count'];
                                                }
                                                echo $count;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="./dsnoitru.php" class="card-link">
                    <div class="card border-left-warning shadow h-100 py-2 earnings-card-zoom">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Sinh viên nội trú</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        include('./connect.php');
                                        $sql = "SELECT COUNT(*) as count FROM hsnoitru";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $count = $row['count'];
                                        }
                                        echo $count;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    include('includes/script.php');
    include('includes/sweetalert2.php');
    ?>