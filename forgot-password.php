<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    include_once './Admin/connect.php';
    $sql = "SELECT password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $retrievedPassword = $row['password'];

        // JavaScript code to show an alert
        echo '<script>alert("Mật khẩu: ' . $retrievedPassword . '");</script>';
    } else {
        // JavaScript code to show an alert
        echo '<script>alert("Email không tồn tại");</script>';
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quên mật khẩu</title>

    <!-- Custom fonts for this template-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Quên mật khẩu?</h1>
                                        <p class="mb-4">Bạn vui lòng nhập email để lấy lại mật khẩu</p>
                                    </div>
                                    <form class="needs-validation" novalidate method="POST" action="forgot-password.php">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control is-invalid form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập địa chỉ Email..." required>
                                            <div class="invalid-feedback">
                                                Vui lòng nhập email.
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Gửi
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Quay lại đăng nhập!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>