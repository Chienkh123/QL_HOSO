# Hệ Thống Quản Lý Hồ Sơ Sinh Viên

## Tổng Quan
Đây là hệ thống quản lý hồ sơ sinh viên được phát triển bằng PHP. Hệ thống cho phép quản lý thông tin sinh viên, hồ sơ giấy tờ, thông tin nội/ngoại trú và các thông tin liên quan khác.

## Tính Năng Chính

### Quản Lý Sinh Viên
- Thêm, sửa, xóa và xem thông tin sinh viên
- Quản lý thông tin cá nhân: họ tên, ngày sinh, CCCD, địa chỉ,...
- Quản lý thông tin học tập: mã ngành, hệ đào tạo, lớp,...
- Quản lý thông tin gia đình

### Quản Lý Giấy Tờ  
- Theo dõi trạng thái nộp/trả các loại giấy tờ
- Cập nhật tình trạng giấy tờ (Đã nộp/Chưa nộp/Đã trả)
- Hiển thị trực quan bằng màu sắc

### Quản Lý Nội/Ngoại Trú
- Quản lý thông tin sinh viên nội trú
- Quản lý thông tin sinh viên ngoại trú  
- Theo dõi thời gian ở và địa chỉ lưu trú

### Quản Lý Tài Khoản
- Phân quyền admin/user
- Quản lý thông tin tài khoản
- Bảo mật thông tin đăng nhập

## Yêu Cầu Hệ Thống
- PHP 7.0 trở lên
- MySQL 5.6 trở lên  
- Web server (Apache/Nginx)

## Cài Đặt
1. Clone repository về máy.
2. Import file SQL vào database.
3. Cấu hình kết nối database trong file `Admin/connect.php`.
4. Truy cập trang admin qua đường dẫn `/Admin`.

## Cấu Trúc Thư Mục
```
QL_HOSO/
├── Admin/ # Thư mục quản trị
│ ├── controller/ # Xử lý logic
│ ├── includes/ # File giao diện chung
│ ├── css/ # Style
│ └── js/ # JavaScript
├── assets/ # Tài nguyên tĩnh
└── login.php # Trang đăng nhập
```
## Bảo Mật
- Xác thực người dùng qua session.
- Kiểm tra quyền truy cập.
- Làm sạch dữ liệu đầu vào.
- Mã hóa mật khẩu.

## Đóng Góp
Mọi đóng góp đều được chào đón. Vui lòng tạo pull request hoặc issue để thảo luận về các thay đổi.


