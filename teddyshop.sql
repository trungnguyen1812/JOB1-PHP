-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2024 lúc 05:02 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `teddyshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NamSinh` date NOT NULL,
  `GioiTinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AdminID`, `HoTen`, `MatKhau`, `Email`, `NamSinh`, `GioiTinh`) VALUES
(1, 'bui trung nguyen', 'nguyen', 'nguyen@gmail.com', '0000-00-00', 1),
(2, 'admin', 'admin', 'admin@gmail.com', '2024-11-21', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `IDChiTietDonHang` int(11) NOT NULL,
  `IDDonHang` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`IDChiTietDonHang`, `IDDonHang`, `IDSanPham`, `SoLuong`, `Gia`, `TrangThai`) VALUES
(1, 1, 6, 1, 20000, 0),
(2, 2, 6, 1, 20000, 0),
(3, 2, 9, 1, 10000, 0),
(4, 3, 6, 1, 20000, 0),
(5, 3, 11, 1, 10000, 0),
(6, 3, 12, 1, 12300, 0),
(7, 4, 9, 1, 10000, 0),
(8, 4, 12, 1, 12300, 0),
(9, 4, 11, 2, 10000, 0),
(10, 5, 9, 1, 10000, 0),
(11, 5, 8, 2, 1200, 0),
(12, 6, 1, 1, 1, 0),
(13, 6, 6, 1, 20000, 0),
(14, 7, 9, 1, 10000, 0),
(15, 7, 6, 1, 20000, 0),
(16, 8, 6, 2, 20000, 0),
(17, 8, 7, 1, 10000, 0),
(18, 9, 6, 2, 20000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `IDDonHang` int(11) NOT NULL,
  `IDKhachHang` int(11) NOT NULL,
  `TongGia` double NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `TrangThaiVanChuyen` int(11) NOT NULL,
  `NgayTao` date NOT NULL,
  `IDNhanVien` int(11) DEFAULT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`IDDonHang`, `IDKhachHang`, `TongGia`, `TrangThai`, `TrangThaiVanChuyen`, `NgayTao`, `IDNhanVien`, `DiaChi`, `SDT`) VALUES
(1, 1, 20000, 0, 4, '2024-11-20', NULL, 'can tho', '966585273'),
(2, 1, 30000, 0, 3, '2024-11-20', NULL, 'can tho', '966585273'),
(3, 1, 42300, 0, 3, '2024-11-20', NULL, 'can tho', '966585273'),
(4, 2, 42300, 0, 1, '2024-11-20', NULL, '43/99A , Ninh kiều cần thơ ', '0366599761'),
(5, 1, 12400, 0, 3, '2024-11-20', NULL, 'can tho', '966585273'),
(6, 7, 20001, 0, 3, '2024-11-24', NULL, 'Vinh Long', '795892904'),
(7, 1, 30000, 0, 1, '2024-11-28', NULL, 'can tho', '966585273'),
(8, 10, 50000, 0, 3, '2024-11-30', NULL, 'Can Tho ', '00823489a'),
(9, 10, 40000, 0, 2, '2024-11-30', NULL, 'Can Tho ', '00823489');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `IDGioHang` int(11) NOT NULL,
  `IDKhachHang` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `IDKhachHang` int(11) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` int(11) NOT NULL,
  `HinhAnhKhachHang` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`IDKhachHang`, `HoTen`, `MatKhau`, `Email`, `DiaChi`, `SDT`, `HinhAnhKhachHang`) VALUES
(1, 'Võ Ngọc Dàng', 'dang', 'NgocDang@gmail.com', 'can tho', 966585273, 'imgUploads/673deb085a02e_1732111112.jpg'),
(2, 'Trần Thị Cẩm Lài', 'lai', 'Camlaitran1812@gmail.com', '', 0, NULL),
(3, 'Nguyễn Trọng Phúc ', 'phuc', 'trongphuc@gmail.com', '', 0, NULL),
(4, 'Van Thanh Phi', 'phi', 'phi@gmail.com', '', 0, NULL),
(5, 'Nguyễn Văn A', 'vana', 'VanA@Gamil.com', '', 0, NULL),
(6, 'dangvo', '123', 'dangvo@gmail.com', '', 0, NULL),
(7, 'Trần Thị Cẩm Lài', 'LAI', 'LAI@GMAIL.COM', 'Vinh Long', 795892904, 'imgUploads/6743233c101ef_1732453180.png'),
(8, 'nguyenVanA', 'asd', 'NguyenVanA@gmail', '', 0, NULL),
(9, 'nguyenVanA', 'nguyenvana', 'NguyenVanA@Gmail.com', '', 0, NULL),
(10, 'NguyenVanB', 'vanb', 'NguyenVanB@gmail.com', '', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `IDLoaiSanPham` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(100) NOT NULL,
  `MoTa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`IDLoaiSanPham`, `TenLoaiSanPham`, `MoTa`) VALUES
(2, 'Gấu Bông', 'Gấu Bông'),
(7, 'Đồ chơi điện tử ', 'đồ chơi điện tử'),
(8, 'Sản phẩm hot trend', 'những sản phẩm hot nhất hiện tại , được cập nhật mới nhất cho khách hàng '),
(9, 'Đồ Gỗ ', 'những sản phẩm đồ chơi của các bé được làm từ các loại gỗ nhân tạo giúp an toàn cho bé không gây hại'),
(10, 'Đồ Thủ Công ', 'với những sản phẩm dược làm bằng tay thì độ thẩm mỹ khá cao với các sản phẩm được nghệ nhân tạo nên '),
(11, 'Xe ', 'các loại đồ chơi về xe được của hàng chọn lọc kỹ càng độ bền cao cho bé an tâm khi sử  dụng ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNhanVien` int(11) NOT NULL,
  `HoTenNhanVien` varchar(100) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SĐT` varchar(20) NOT NULL,
  `NamSinh` date NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `DiaChi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`IDNhanVien`, `HoTenNhanVien`, `MatKhau`, `Email`, `SĐT`, `NamSinh`, `GioiTinh`, `DiaChi`) VALUES
(3, 'Trần Thị Cẩm Lài', 'lai', 'camlaitran@gmail.com', '0366599761', '0000-00-00', 0, '43/99A , Ninh kiều cần thơ ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSanPham` int(11) NOT NULL,
  `IDLoaiSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `Gia` double NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MoTa` varchar(200) NOT NULL,
  `HinhAnh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSanPham`, `IDLoaiSanPham`, `TenSanPham`, `Gia`, `SoLuong`, `MoTa`, `HinhAnh`) VALUES
(1, 8, 'gấu bông', 1, 1, 'Gấu bông 1', 'imgUploads/67320dab2be8b_1731333547.png'),
(6, 8, 'labubu 1', 20000, 20000, 'gấu bông labubu', 'imgUploads/6734a66c2e661_1731503724.jpg'),
(7, 8, 'labubu2', 10000, 1000, 'labubu 2', 'imgUploads/6734a6744ba60_1731503732.jpg'),
(8, 2, 'gấu bông 2', 1200, 1000, 'gấu bông', 'imgUploads/6734a67c8a690_1731503740.jpg'),
(9, 2, 'capypara', 10000, 1000, 'gấu bông cao cấp cho người yêu bạn', 'imgUploads/6734c21c2b321_1731510812.jpg'),
(11, 2, 'lai', 10000, 1, 'hghjjhjh', 'imgUploads/6735f98798872_1731590535.jpg'),
(12, 9, 'dang', 12300, 1, 'qfwgj', 'imgUploads/6735f9dd1adac_1731590621.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`IDChiTietDonHang`),
  ADD KEY `IDDonHang_idx` (`IDDonHang`),
  ADD KEY `IDSanPham_idx` (`IDSanPham`),
  ADD KEY `IDDonHang_idx_new` (`IDDonHang`),
  ADD KEY `IDSanPham_idx_new` (`IDSanPham`),
  ADD KEY `IDDonHang_idx_news` (`IDDonHang`),
  ADD KEY `IDSanPham_idx_news` (`IDSanPham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`IDDonHang`),
  ADD KEY `IDKhachHang_idx` (`IDKhachHang`),
  ADD KEY `IDNhanVien_idx` (`IDNhanVien`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`IDGioHang`),
  ADD KEY `IDKhachHang` (`IDKhachHang`),
  ADD KEY `IDSanPham` (`IDSanPham`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IDKhachHang`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`IDLoaiSanPham`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNhanVien`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSanPham`),
  ADD KEY `IDLoaiSanPham_idx` (`IDLoaiSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `IDChiTietDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `IDDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `IDGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `IDKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `IDLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `IDNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_IDDonHang_donhang` FOREIGN KEY (`IDDonHang`) REFERENCES `donhang` (`IDDonHang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_IDSanPham_sanpham` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `IDKhachHang` FOREIGN KEY (`IDKhachHang`) REFERENCES `khachhang` (`IDKhachHang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IDNhanVien` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`IDKhachHang`) REFERENCES `khachhang` (`IDKhachHang`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `IDLoaiSanPham` FOREIGN KEY (`IDLoaiSanPham`) REFERENCES `loaisanpham` (`IDLoaiSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
