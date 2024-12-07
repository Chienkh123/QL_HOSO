<?php
session_start();
include('./Admin/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'"));
    if ($check == 0) {
        echo "<script>alert('Thông tin tài khoản và mật khẩu không chính xác.');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit();
    }

    if ($check == 1) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $isAdmin = $row['isAdmin'];
                if($isAdmin == 1 || $isAdmin == 2){
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['image'] = $row['image'];
                    $_SESSION['isAdmin'] = $isAdmin;
                    setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 seconds = 1 day
                    header("Location: ./Admin/index.php");
                    exit();
                } else if($isAdmin == 0){
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['image'] = $row['image'];
                    $_SESSION['isAdmin'] = $isAdmin;
                    setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 seconds = 1 day
                    header("Location: ./index.php");
                    exit();
                }else{
                    echo "Đăng nhập sai";
                    exit();
                }
                
            } else {
                echo "Đăng nhập thất bại";
                exit();
            }
        } else {
            echo "Lỗi truy vấn CSDL";
            exit();
        }
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-5">
                                    <form action="login.php" method="post">
                                        <h1 class="h4 text-gray-900 mb-2 text-center mb-4">Đăng nhập</h1>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Tài khoản..." aria-label="Username" aria-describedby="basic-addon1" required>
                                        </div>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                            <input class="form-control" type="password" name="password" id="password" placeholder="Mật khẩu..." required><br>   
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="showPassword" id="showPasswordCheckbox">
                                            <label class="form-check-label" for="showPasswordCheckbox">Hiển thị mật khẩu</label><br>
                                        </div>

                                        <input class="btn btn-primary form-control mt-3 mb-3" type="submit" value="Đăng nhập">
                                    </form>
                                    <hr>
                                    <a style="display: flex;justify-content: flex-end;" class="text-decoration-none" href="forgot-password.php">Quên mật khẩu?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');
        showPasswordCheckbox.addEventListener('change', function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>

</body>

</html>