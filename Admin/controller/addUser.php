<?php
session_start();
include ('../connect.php');

function addUser($conn) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : null;

    // Kiểm tra các điều kiện hợp lệ
    if(empty($username) || empty($password) || empty($name)) {
        $_SESSION['error'] = "Thêm thất bại: Vui lòng điền đầy đủ thông tin";
        return false;
    }
    if(strlen($username) < 5 || strlen($username) > 20) {
        $_SESSION['error'] = "Thêm thất bại: Username phải có từ 5 đến 20 ký tự";
        return false;
    }
    if(strlen($password) < 5 || strlen($password) > 20) {
        $_SESSION['error'] = "Thêm thất bại: Password phải có từ 5 đến 20 ký tự";
        return false;
    }
    if(strlen($name) < 5 || strlen($name) > 20) {
        $_SESSION['error'] = "Thêm thất bại: Tên phải có từ 5 đến 20 ký tự";
        return false;
    }
    if($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Thêm thất bại: Email không hợp lệ";
        return false;
    }

    // Kiểm tra username đã tồn tại trong cơ sở dữ liệu chưa
    $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'"));
    if($check > 0) {
        $_SESSION['error'] = "Thêm thất bại: Username đã tồn tại trong hệ thống";
        return false;
    } else {
        $sql = "INSERT INTO users(username, password, name, email, isAdmin) VALUES('$username', '$password', '$name', '$email', 1)";

        $query = mysqli_query($conn, $sql);
        if($query) {
            $_SESSION['success'] = "Thêm mới thành công";
            return true;
        } else {
            $_SESSION['error'] = "Thêm mới thất bại";
            return false;
        }
    }
}

if(isset($_POST['addUser'])) {
    $result = addUser($conn);
    if (!$result) {
        header("location: ../users.php?status=error");
        exit();
    }
    header("location: ../users.php?status=success");
    exit();
} else {
    // Nếu không có hành động post từ form, chuyển hướng về trang chủ
    header("location: ../index.php");
    exit();
}
?>
