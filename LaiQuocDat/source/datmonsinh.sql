-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2023 lúc 06:37 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datmonsinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Password`) VALUES
(1, 'admin', 'admin'),
(2, 'dat', 'dat'),
(14, 'test1', 'test1'),
(15, 'test3', 'b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`Id`, `Name`) VALUES
(1, 'Đối kháng'),
(3, 'Quyền'),
(6, 'test1'),
(2, 'Trang bị khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Thumbnail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Color` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Material` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Brand` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `SubCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`Id`, `Name`, `Thumbnail`, `Color`, `Material`, `Brand`, `Note`, `SubCategory`) VALUES
(1, 'Đích đấm Vstar', '../images/Dichdam Vstar.png', 'Xanh biển', 'Da', 'Vstar', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(2, 'Đích đấm BN', '../images/Dichdam BN vang.png', 'Vàng', 'Da', 'BN', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(3, 'Đích đấm BN', '../images/Dichdam BN bac.png', 'Bạc', 'Da', 'BN', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(4, 'Đích đấm BN', '../images/Dichdam BN cam.png', 'Cam', 'Da', 'BN', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(5, 'Đích đấm BN', '../images/Dichdam BN xanh.png', 'Xanh biển', 'Da', 'BN', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(6, 'Đích đấm Fighter', '../images/Dichdam Fighter.png', 'Đen – Đỏ', 'Da', 'Fighter', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(7, 'Đích đấm Fighter', '../images/Dichdam Fighter.png', 'Đen – Vàng', 'Da', 'Fighter', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(8, 'Đích đấm Fighter', '../images/Dichdam Fighter.png', 'Đen – Xanh dương', 'Da', 'Fighter', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(9, 'Đích đấm Fighter', '../images/Dichdam Fighter.png', 'Đen – Xanh lá', 'Da', 'Fighter', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(10, 'Đích đấm PU', '../images/Dichdam PU.png', 'Đen – Đỏ', 'Da', 'PU', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(11, 'Đích đấm KaiLun', '../images/Dichdam KaiLun.png', 'Đen – Trắng', 'Da', 'KaiLun', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 6),
(12, 'Đích đá đơn Jianzhikang', '../images/Dichdadon Jianzhikang do.png', 'Đỏ', 'Da', 'Jianzhikang', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 7),
(13, 'Đích đá đơn Jianzhikang', '../images/Dichdadon Jianzhikang xanh.png', 'Xanh dương', 'Da', 'Jianzhikang', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 7),
(14, 'Đích đá đơn Vstar', '../images/Dichdadon Vstar.png', 'Xanh biển', 'Da', 'Vstar', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 7),
(15, 'Đích đá đơn Kangrui KS421', '../images/Dichdadon Kangrui.png', 'Đen – Xanh dương', 'Da', 'Kangrui', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn.', 7),
(16, 'Đích đá kép WTF', '../images/Dichdakep WTF.png', 'Đen', 'Da', 'WTF', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn. Thích hợp cho các đòn đá tạt,…', 8),
(17, 'Đích đá kép Kangrui KT333', '../images/Dichdakep Kangrui.png', 'Xanh', 'Da', 'Kangrui', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn. Thích hợp cho các đòn đá tạt,…', 8),
(18, 'Đích đá kép Vstar', '../images/Dichdakep Vstar.png', 'Xanh', 'Da', 'Vstar', 'Sử dụng trong luyện tập đối kháng. Đường chỉ may chắc chắn. Thích hợp cho các đòn đá tạt,…', 8),
(19, 'Mũ Apolo', '../images/Mu Apolo.png', 'Xanh – Đỏ', 'Da', 'Apolo', 'Sử dụng trong luyện tập hoặc thi đấu đối kháng. Đường chỉ may chắc chắn. Bảo hộ tốt phần đầu của vận động viên.', 15),
(20, 'Bảo hộ răng Kwon', '../images/Baohorang Kwon.png', 'Trong suốt', 'Nhựa dẻo', 'Kwon', 'Thường được sử dụng trong thi đấu đối kháng. Kích thước vừa khuôn miệng, không gây cảm giác khó chịu khi sử dụng. Bảo vệ tránh va đập mạnh vào răng.', 1),
(21, 'Găng đấm Fairtex', '../images/Gangdam Fairtex.png', 'Xanh', 'Da', 'Fairtex', 'Là một trong những vật dụng không thể thiếu trong luyện tập và thi đấu đối kháng.', 11),
(22, 'Găng đấm BN', '../images/Gangdam BN do.png', 'Đen – Đỏ', 'Da', 'BN', 'Là một trong những vật dụng không thể thiếu trong luyện tập và thi đấu đối kháng.', 11),
(23, 'Găng đấm BN', '../images/Gangdam BN cam.png', 'Đen – Cam', 'Da', 'BN', 'Là một trong những vật dụng không thể thiếu trong luyện tập và thi đấu đối kháng.', 11),
(24, 'Găng đấm BN', '../images/Gangdam BN xanh.png', 'Đen – Xanh', 'Da', 'BN', 'Là một trong những vật dụng không thể thiếu trong luyện tập và thi đấu đối kháng.', 11),
(25, 'Găng đấm Everlast', '../images/Gangdam Everlast.png', 'Đen – Trắng', 'Da', 'Everlast', 'Là một trong những vật dụng không thể thiếu trong luyện tập và thi đấu đối kháng.', 11),
(26, 'Giáp bảo hộ Vstar', '../images/Giap doi khang.png', 'Xanh – Đỏ', 'Da', 'Vstar', 'Thường được sử dụng trong thi đấu đối kháng. Bảo vệ tránh va đập mạnh vào các bộ phận quan trọng phần trước của cơ thể.', 12),
(27, 'Giáp bảo hộ OEM', '../images/Giap bao ho hai mat.png', 'Xanh – Đỏ', 'Da', 'OEM', 'Thường được sử dụng trong thi đấu đối kháng. Bảo vệ tránh va đập mạnh vào các bộ phận quan trọng phần trước của cơ thể.', 12),
(28, 'Bảo hộ tay chân Kwon', '../images/Baohotaychan Kwon.png', 'Trắng', 'Da', 'Kwon', 'Thường được sử dụng trong thi đấu đối kháng. Bảo vệ tránh va đập mạnh vào xương cánh tay hoặc xương chày.', 2),
(29, 'Bảo hộ tay chân Ailaikit', '../images/Baohotaychan Ailaikit.png', 'Xanh – Đỏ', 'Da', 'Ailaikit', 'Thường được sử dụng trong thi đấu đối kháng. Bảo vệ tránh va đập mạnh vào xương cánh tay hoặc xương chày.', 2),
(30, 'Dây quấn tay BN', '../images/Dayquantay BN.png', 'Các màu', 'BN', 'Kwon', 'Thường được sử dụng trong thi đấu đối kháng. Bảo vệ các ngón tay, hỗ trợ lực khi tung  các đòn đấm nhờ vào việc siết chặt khoảng cách giữa các ngón tay.', 10),
(31, 'Kuki nam Unicorn', '../images/Kuki nam Unicorn.png', 'Trắng', 'Da, cao su', 'Unicorn', 'Bắt buộc sử dụng trong quá trình thi đấu đối kháng. Bảo vệ phần hạ bộ của nam giới.', 14),
(32, 'Kuki nữ Unicorn', '../images/Kuki nu Unicorn.png', 'Trắng', 'Da, cao su', 'Unicorn', 'Bắt buộc sử dụng trong quá trình thi đấu đối kháng. Bảo vệ phần hạ bộ của nữ giới.', 14),
(33, 'Kiếm', '../images/Kiem.png', '', 'Nhôm', '', 'Được sử dụng trong luyện tập và biểu diễn. Kiếm không được xuống lưỡi (không được mài bén). Một số bài biểu diễn có sử dụng kiếm như: Tinh hoa lưỡng nghi kiếm pháp, Song luyện kiếm,…', 13),
(34, 'Song dao', '../images/Songdao.png', '', 'Nhôm', '', 'Được sử dụng trong luyện tập và biểu diễn. Dao không được xuống lưỡi (không được mài bén). Một số bài biểu  diễn có sử dụng dao như: Song dao pháp, Tự vệ nữ, Song luyện dao, Tứ đấu,…', 19),
(35, 'Đơn đao Ailaikit', '../images/Dondao Ailaikit.png', '', 'Nhôm', 'Ailaikit', 'Được sử dụng trong luyện tập và biểu diễn. Đao không được xuống lưỡi (không được mài bén). Một số bài biểu  diễn có sử dụng đao như: Thái cực đơn đao.', 9),
(36, 'Đại đao Tân Việt', '../images/Daidao TanViet.png', '', 'Nhôm', 'Tân Việt', 'Được sử dụng trong luyện tập và biểu diễn. Đại đao không được xuống lưỡi (không được mài bén). Một số bài biểu  diễn có sử dụng đại đao như: Nhật nguyệt đại đao.', 5),
(37, 'Đại đao', '../images/Daidao.png', '', 'Nhôm', '', 'Được sử dụng trong luyện tập và biểu diễn. Đại đao không được xuống lưỡi (không được mài bén). Một số bài biểu  diễn có sử dụng đại đao như: Nhật nguyệt đại đao.', 5),
(38, 'Trường côn Ailaikit', '../images/Truongcon Ailaikit.png', '', 'Cây mây', 'Ailaikit', 'Được sử dụng trong luyện tập và biểu diễn. Chất liệu từ cây mây nên có thể sử dụng linh hoạt dựa vào tính chất dẻo và đàn hồi của nó. Một số bài biểu  diễn có sử dụng trường côn như: Tứ tượng côn pháp.', 20),
(39, 'Quạt', '../images/Quat.png', '', 'Vải, nhựa', '', 'Được sử dụng trong luyện tập và biểu diễn dưỡng sinh. Một số bài biểu diễn có sử dụng quạt như: Âm dương hồ điệp phiến.', 18),
(40, 'Mộc bản Ailaikit', '../images/Mocban Ailaikit.png', '', 'Gỗ', 'Ailaikit', 'Được sử dụng trong luyện tập và biểu diễn. Một số bài biểu diễn có sử dụng mộc bản như: Mộc bản pháp.', 16),
(41, 'Võ phục', '../images/Vophuc.png', '', 'Kaki', '', 'Là hình ảnh tượng trưng cho môn sinh Vovinam. Chất liệu kaki thấm hút, co giãn linh hoạt giúp môn sinh thoải mái thực hiện các bài tập của mình. Tùy vào chiều cao và cân nặng để chọn kích thước võ phục.', 21),
(42, 'Đai Tân Việt nhập môn', '../images/Dai TanViet.png', 'Xanh trời', 'Kaki hoặc Si', 'Tân Việt', 'Đai nhập môn hay còn gọi là đai tự vệ, giành cho các võ sinh mới gia nhập môn phái.', 4),
(43, 'Đai Tân Việt lam đai', '../images/Dai TanViet.png', 'Xanh dương', 'Kaki hoặc Si', 'Tân Việt', 'Lam đai, giành cho các môn sinh đạt từ cấp độ Lam đai đến Lam đai tam.', 4),
(44, 'Đai Tân Việt hoàng đai', '../images/Dai TanViet.png', 'Vàng', 'Kaki hoặc Si', 'Tân Việt', 'Hoàng đai, giành cho các trợ lý, huấn luyện viên đạt từ cấp độ Hoàng đai đến Hoàng đai tam.', 4),
(45, 'Đai Tân Việt chuẩn hồng đai', '../images/Dai TanViet.png', 'Vàng - Đỏ', 'Kaki hoặc Si', 'Tân Việt', 'Chuẩn hồng đai, đai đỏ có viền vàng. Giành cho võ sư chuẩn cao đẳng.', 4),
(46, 'Đai Tân Việt hồng đai', '../images/Dai TanViet.png', 'Đỏ', 'Kaki hoặc Si', 'Tân Việt', 'Hồng đai, đai đỏ. Giành cho võ sư cao đẳng. Có các cấp bậc từ Hồng đai nhất đến Hồng đai lục.', 4),
(47, 'Côn nhị khúc', '../images/Connhikhuc.png', 'Đen', 'Nhôm, cao su', '', 'Sử dụng trong luyện tập và biểu diễn.', 3),
(48, 'Mã tấu Ailaikit', '../images/Matau Ailaikit.png', '', 'Nhôm', 'Ailaikit', 'Sử dụng trong luyện tập và biểu diễn. Mã tấu không được xuống lưỡi (không được mài bén). Một số bài biểu diễn có sử dụng mã tấu như: Song luyện mã tấu, Tứ đấu,...', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategory`
--

CREATE TABLE `subcategory` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategory`
--

INSERT INTO `subcategory` (`Id`, `Name`, `Category`) VALUES
(1, 'Bảo hộ răng', 1),
(2, 'Bảo hộ tay - chân', 1),
(3, 'Côn nhị khúc', 3),
(4, 'Đai', 3),
(5, 'Đại đao', 2),
(6, 'Đích đấm', 1),
(7, 'Đích đá đơn', 1),
(8, 'Đích đá kép', 1),
(9, 'Đơn đao', 2),
(10, 'Dây quấn tay', 1),
(11, 'Găng', 1),
(12, 'Giáp', 1),
(13, 'Kiếm', 2),
(14, 'Kuki', 1),
(15, 'Mũ', 1),
(16, 'Mộc bản', 2),
(17, 'Mã tấu', 3),
(18, 'Quạt', 2),
(19, 'Song dao', 2),
(20, 'Trường côn', 2),
(21, 'Võ phục', 3),
(38, 'test1', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `SubCategory` (`SubCategory`);

--
-- Chỉ mục cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Category` (`Category`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `SubCategory` FOREIGN KEY (`SubCategory`) REFERENCES `subcategory` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `Category` FOREIGN KEY (`Category`) REFERENCES `category` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
