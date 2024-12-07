-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 21, 2024 lúc 05:43 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hoso_sv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hsdantoc`
--

CREATE TABLE `hsdantoc` (
  `madt` varchar(255) NOT NULL,
  `tendt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hsdantoc`
--

INSERT INTO `hsdantoc` (`madt`, `tendt`) VALUES
('Dao', 'Dân tộc Dao'),
('Kinh', 'Dân tộc Kinh'),
('Tày', 'Dân tộc Tày');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hsdoituong`
--

CREATE TABLE `hsdoituong` (
  `madoituong` varchar(255) NOT NULL,
  `tendoituong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hsdoituong`
--

INSERT INTO `hsdoituong` (`madoituong`, `tendoituong`) VALUES
('dt1', 'Miễn học phí'),
('dt2', 'Giảm 50% học phí'),
('dt3', 'Không thuộc đối tượng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hsgiayto`
--

CREATE TABLE `hsgiayto` (
  `masv` varchar(11) NOT NULL,
  `val1` int(11) NOT NULL DEFAULT 0,
  `val2` int(11) NOT NULL DEFAULT 0,
  `val3` int(11) NOT NULL DEFAULT 0,
  `val4` int(11) NOT NULL DEFAULT 0,
  `val5` int(11) NOT NULL DEFAULT 0,
  `val6` int(11) NOT NULL DEFAULT 0,
  `val7` int(11) NOT NULL DEFAULT 0,
  `val8` int(11) NOT NULL DEFAULT 0,
  `val9` int(11) NOT NULL DEFAULT 0,
  `val10` int(11) NOT NULL DEFAULT 0,
  `val11` int(11) NOT NULL DEFAULT 0,
  `val12` int(11) NOT NULL DEFAULT 0,
  `val13` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hsgiayto`
--

INSERT INTO `hsgiayto` (`masv`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `val10`, `val11`, `val12`, `val13`) VALUES
('20211891', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1),
('20211892', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('20211896', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hslop`
--

CREATE TABLE `hslop` (
  `malop` varchar(255) NOT NULL,
  `tenlop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hslop`
--

INSERT INTO `hslop` (`malop`, `tenlop`) VALUES
('CNOT12.10.1', 'Công nghệ ô tô 12.10.1'),
('CNOT12.10.2', 'Công nghệ ô tô 12.10.2'),
('CNPT12.10.1', 'Công nghệ phần mềm 12.10.1'),
('CNPT12.10.2', 'Công nghệ phần mềm 12.10.2'),
('CNTT12.10.1', 'Công nghệ thông tin 12.10.1'),
('CNTT12.10.2', 'Công nghệ thông tin 12.10.2'),
('CNTT12.10.3', 'Công nghệ thông tin 12.10.3'),
('CNTT12.10.4', 'Công nghệ thông tin 12.10.4'),
('CNTT12.10.5', 'Công nghệ thông tin 12.10.5'),
('CNTT12.10.6', 'Công nghệ thông tin 12.10.6'),
('CNTT12.10.7', 'Công nghệ thông tin 12.10.7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hsnghanh`
--

CREATE TABLE `hsnghanh` (
  `manghanh` varchar(255) NOT NULL,
  `tennghanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hsnghanh`
--

INSERT INTO `hsnghanh` (`manghanh`, `tennghanh`) VALUES
('CNPM', 'Công nghệ phần mềm'),
('CNTO', 'Công nghệ ô tô'),
('CNTT', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hsngoaitru`
--

CREATE TABLE `hsngoaitru` (
  `masv` varchar(255) NOT NULL,
  `tenchuho` varchar(255) DEFAULT NULL,
  `sonha` varchar(255) DEFAULT NULL,
  `sodienthoai` int(11) DEFAULT NULL,
  `quanhe` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `ngaybd` date DEFAULT NULL,
  `ngaykt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hsngoaitru`
--

INSERT INTO `hsngoaitru` (`masv`, `tenchuho`, `sonha`, `sodienthoai`, `quanhe`, `diachi`, `ngaybd`, `ngaykt`) VALUES
('20211891', 'Nguyễn Văn Bd', '112', 867476811, 'Không', 'Hà nội', '2024-01-20', '2024-01-21'),
('20211892', 'Chien', '112', 12312321, '', '', '2024-01-25', '2024-02-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hsnoitru`
--

CREATE TABLE `hsnoitru` (
  `masv` varchar(255) NOT NULL,
  `sothe` varchar(255) DEFAULT NULL,
  `sonha` varchar(255) DEFAULT NULL,
  `sophong` varchar(255) DEFAULT NULL,
  `ngaybd` date DEFAULT NULL,
  `ngaykt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hsnoitru`
--

INSERT INTO `hsnoitru` (`masv`, `sothe`, `sonha`, `sophong`, `ngaybd`, `ngaykt`) VALUES
('20211896', '3123213', '112', '123', '2024-01-20', '2024-01-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hssinhvien`
--

CREATE TABLE `hssinhvien` (
  `masv` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `noisinh` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `madt` varchar(255) NOT NULL,
  `madoituong` varchar(255) NOT NULL,
  `doanvien` varchar(255) NOT NULL,
  `ngayvaodoan` date NOT NULL,
  `noiketnap` varchar(255) NOT NULL,
  `cccd` varchar(255) NOT NULL,
  `ngaycap` date NOT NULL,
  `noicap` varchar(255) NOT NULL,
  `hotenbo` varchar(255) NOT NULL,
  `nghebo` varchar(255) NOT NULL,
  `hotenme` varchar(255) NOT NULL,
  `ngheme` varchar(255) NOT NULL,
  `matinh` varchar(255) NOT NULL,
  `malop` varchar(255) NOT NULL,
  `hedaotao` varchar(255) NOT NULL,
  `manghanh` varchar(255) NOT NULL,
  `namtuyens` varchar(255) NOT NULL,
  `ngoaitru` varchar(255) NOT NULL,
  `sdt` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hssinhvien`
--

INSERT INTO `hssinhvien` (`masv`, `hoten`, `ngaysinh`, `gioitinh`, `noisinh`, `diachi`, `madt`, `madoituong`, `doanvien`, `ngayvaodoan`, `noiketnap`, `cccd`, `ngaycap`, `noicap`, `hotenbo`, `nghebo`, `hotenme`, `ngheme`, `matinh`, `malop`, `hedaotao`, `manghanh`, `namtuyens`, `ngoaitru`, `sdt`) VALUES
('20211891', 'Nông Văn Chiến', '2024-01-01', 'Nam', 'Tuyên Quang', 'Tuyên Quang', 'Tày', 'dt2', 'đã nộp', '2024-01-08', 'Tuyên Quang', '008203002738', '2024-01-10', 'CA Tuyên Quang', 'Nông Văn A', 'Làm nông', 'Quan Thị B', 'Làm nông', 'TQ', 'CNTT12.10.7', 'Chính quy', 'CNTT', '2023', 'Có', 867476810),
('20211892', 'Nông Văn C', '2024-01-11', 'Nam', 'Tuyên Quang', 'Tuyên Quang', 'Tày', 'dt2', 'đã nộp', '2024-01-16', 'Tuyên Quang', '23123', '2024-01-11', 'CA Tuyên Quang', 'Nông Văn A', 'Làm nông', 'Quan Thị B', 'Làm nông', 'CB', 'CNTT12.10.7', 'Đại học', 'CNTT', '2023', 'Có', 23423423),
('20211896', 'Nông Văn ABC', '2024-01-04', 'Nam', 'Tuyên Quang', 'Tuyên Quang', 'Dao', 'dt2', 'đã nộp', '2024-01-20', 'Tuyên Quang', '13123', '2024-01-19', 'CA Tuyên Quang', 'Nông Văn A', 'Làm nông', 'Quan Thị B', 'Làm nông', 'HN', 'CNTT12.10.7', 'Đại học', 'CNTO', '2023', 'Không', 1231313131);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hstinh`
--

CREATE TABLE `hstinh` (
  `matinh` varchar(255) NOT NULL,
  `tentinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hstinh`
--

INSERT INTO `hstinh` (`matinh`, `tentinh`) VALUES
('CB', 'Cao bằng'),
('HG', 'Hà Giang'),
('HN', 'Hà Nội'),
('TN', 'Thái Nguyên'),
('TQ', 'Tuyên quang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '123456',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL DEFAULT '/assets/images/logo.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `email`, `isAdmin`, `image`) VALUES
('20211891', '123456', 'Nông Văn Chiến', '20211891@gmail.com', 0, './assets/images/logo.png'),
('20211892', '123456', 'Nông Văn C', '20211892@gmail.com', 0, './assets/images/hinh-avatar-trang-cho-nam-va-con-than-lan_1.jpg'),
('20211896', '123456', 'Nông Văn ABC', '20211896@gmail.com', 0, './assets/images/logo.png'),
('admin', 'admin', 'Nông Văn Chiến', 'chienkh6b.vn@gmail.com', 1, '/assets/images/logo.png'),
('admin2', 'admin2', 'Admin 2', '', 2, '/assets/images/logo.png'),
('admin3', 'admin3', 'Quản lý Chiến', 'test@gmail.com', 1, '/assets/images/logo.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hsdantoc`
--
ALTER TABLE `hsdantoc`
  ADD PRIMARY KEY (`madt`);

--
-- Chỉ mục cho bảng `hsdoituong`
--
ALTER TABLE `hsdoituong`
  ADD PRIMARY KEY (`madoituong`);

--
-- Chỉ mục cho bảng `hsgiayto`
--
ALTER TABLE `hsgiayto`
  ADD KEY `fk_hsgiayto_hssinhvien` (`masv`);

--
-- Chỉ mục cho bảng `hslop`
--
ALTER TABLE `hslop`
  ADD PRIMARY KEY (`malop`);

--
-- Chỉ mục cho bảng `hsnghanh`
--
ALTER TABLE `hsnghanh`
  ADD PRIMARY KEY (`manghanh`);

--
-- Chỉ mục cho bảng `hsngoaitru`
--
ALTER TABLE `hsngoaitru`
  ADD KEY `fk_hsngoaitru_hssinhvien` (`masv`);

--
-- Chỉ mục cho bảng `hsnoitru`
--
ALTER TABLE `hsnoitru`
  ADD KEY `fk_hsnoitru_hssinhvien` (`masv`);

--
-- Chỉ mục cho bảng `hssinhvien`
--
ALTER TABLE `hssinhvien`
  ADD PRIMARY KEY (`masv`),
  ADD KEY `fk_hssinhvien_hsdoituong` (`madoituong`),
  ADD KEY `fk_hssinhvien_hstinh` (`matinh`),
  ADD KEY `fk_hssinhvien_hsdantoc` (`madt`),
  ADD KEY `fk_hssinhvien_hsnghanh` (`manghanh`),
  ADD KEY `fk_hssinhvien_hslop` (`malop`);

--
-- Chỉ mục cho bảng `hstinh`
--
ALTER TABLE `hstinh`
  ADD PRIMARY KEY (`matinh`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hsgiayto`
--
ALTER TABLE `hsgiayto`
  ADD CONSTRAINT `fk_hsgiayto_hssinhvien` FOREIGN KEY (`masv`) REFERENCES `hssinhvien` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hsngoaitru`
--
ALTER TABLE `hsngoaitru`
  ADD CONSTRAINT `fk_hsngoaitru_hssinhvien` FOREIGN KEY (`masv`) REFERENCES `hssinhvien` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hsnoitru`
--
ALTER TABLE `hsnoitru`
  ADD CONSTRAINT `fk_hsnoitru_hssinhvien` FOREIGN KEY (`masv`) REFERENCES `hssinhvien` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hssinhvien`
--
ALTER TABLE `hssinhvien`
  ADD CONSTRAINT `fk_hssinhvien_hsdantoc` FOREIGN KEY (`madt`) REFERENCES `hsdantoc` (`madt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hssinhvien_hsdoituong` FOREIGN KEY (`madoituong`) REFERENCES `hsdoituong` (`madoituong`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hssinhvien_hslop` FOREIGN KEY (`malop`) REFERENCES `hslop` (`malop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hssinhvien_hsnghanh` FOREIGN KEY (`manghanh`) REFERENCES `hsnghanh` (`manghanh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hssinhvien_hstinh` FOREIGN KEY (`matinh`) REFERENCES `hstinh` (`matinh`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
