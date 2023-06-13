-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2023 lúc 03:50 PM
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
-- Cơ sở dữ liệu: `webphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`) VALUES
(2, 'Phim Lẻ', 'Phim lẻ cập nhật hằng ngày', 1, 'phim-le', 0),
(4, 'Phim Bộ', 'Phim bộ cập nhật hằng ngày', 1, 'phim-bo', 1),
(5, 'Phim Hoạt Hình', 'Phim hoạt hình cập nhật nhanh nhất', 1, 'phim-hoat-hinh', 2),
(6, 'Phim Mới', 'Phim mới cập nhật nhanh nhất', 1, 'phim-moi', 3),
(9, 'Phim Chiếu Rạp', 'Phim chiếu rạp cập nhật nhanh nhất', 1, 'phim-chieu-rap', 4),
(11, 'Phim Thuyết Minh', 'Phim thuyết minh mới nhất', 0, 'phim-thuyet-minh', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Việt Nam', 'Phim Việt Nam cập nhật nhanh nhất', 1, 'viet-nam'),
(2, 'Mỹ', 'Phim Mỹ cập nhật hằng ngày', 1, 'my'),
(3, 'Anh', 'Phim Anh cập nhật nhanh nhất', 1, 'anh'),
(4, 'Nhật Bản', 'Phim Nhật Bản cập nhật nhanh nhất', 1, 'nhat-ban'),
(5, 'Hàn Quốc', 'Phim Hàn Quốc cập nhật nhanh nhất', 1, 'han-quoc'),
(6, 'Trung quốc', 'Phim Trung Quốc cập nhật nhanh nhất', 1, 'trung-quoc'),
(7, 'Thái Lan', 'Phim Thái Lan cập nhật nhanh nhất', 1, 'Thái Lan'),
(8, 'Đài Loan', 'Phim Đài Loan cập nhật nhanh nhất', 1, 'Đài Loan'),
(9, 'Singapo', 'phim singapo', 1, 'Singapo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` varchar(500) NOT NULL,
  `episode` varchar(11) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `updated_at`, `created_at`) VALUES
(1, 42, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4VsEhT2o3fY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1', '2023-05-16 14:05:48', '2023-05-16 14:05:48'),
(2, 29, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" scrolling=\"0\" src=\"https://kd.opstream3.com/share/212ad7bb06e34ce8eff54540c30efdff\" width=\"100%\"></iframe></p>', '1', '2023-05-17 09:59:12', '2023-05-17 09:59:12'),
(3, 29, '<p><iframe allowfullscreen frameborder=\"0\" height=\"350\" scrolling=\"0\" src=\"https://1080.opstream4.com/share/f54a08db5a4566edfcbb8958c7575556\" width=\"100%\"></iframe></p>', '2', '2023-05-26 18:22:00', '2023-05-26 18:22:00'),
(4, 29, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" scrolling=\"0\" src=\"https://hdbo.opstream5.com/share/6ded8940f3bcd34111d2e673d4bf5780\" width=\"100%\"></iframe></p>', '3', '2023-05-26 18:22:57', '2023-05-26 18:22:57'),
(5, 26, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" scrolling=\"0\" src=\"https://hdbo.opstream5.com/share/2f9fc227758c8375bfd10a1447c195cf\" width=\"100%\"></iframe></p>', 'HD', '2023-05-17 09:54:43', '2023-05-17 09:54:43'),
(6, 29, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" scrolling=\"0\" src=\"https://hdbo.opstream5.com/share/3fd45b2ea4e5e54b553ba47f6460585a\" width=\"100%\"></iframe></p>', '4', '2023-05-26 18:23:37', '2023-05-26 18:23:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Hành Động', 'Phim hành động cập nhật nhanh nhất', 1, 'hanh-dong'),
(3, 'Hài Hước', 'Phim hài hước cập nhật hằng ngày', 1, 'hai-huoc'),
(4, 'Lãng Mạn', 'Phim lãng mạn cập nhật nhanh nhất', 1, 'lang-man'),
(5, 'Viễn Tưởng', 'Phim viễn tưởng cập nhật nhanh nhất', 1, 'vien-tuong'),
(6, 'Võ Thuật', 'Phim võ thuật cập nhật nhanh nhất', 1, 'vo-thuat'),
(7, 'Kinh Dị', 'Phim kinh dị cập nhật nhanh nhất', 1, 'kinh-di'),
(8, 'Tâm Lý', 'Phim tâm lý cập nhật nhanh nhất', 0, 'tam-ly');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thoiluong` varchar(50) DEFAULT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thuocphim` varchar(50) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `name_eng` varchar(255) NOT NULL,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(50) DEFAULT NULL,
  `ngaycapnhat` varchar(50) DEFAULT NULL,
  `year` int(20) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` varchar(50) NOT NULL DEFAULT '0',
  `trailer` varchar(100) DEFAULT NULL,
  `sotap` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `thoiluong`, `description`, `status`, `image`, `slug`, `category_id`, `thuocphim`, `genre_id`, `country_id`, `phim_hot`, `resolution`, `name_eng`, `phude`, `ngaytao`, `ngaycapnhat`, `year`, `tags`, `topview`, `season`, `trailer`, `sotap`) VALUES
(5, 'SIÊU NHÂN/NGƯỜI DƠI ĐẠI CHIẾN: KẺ THÙ QUỐC GIA', NULL, 'Siêu Nhân/Người Dơi Đại Chiến: Kẻ Thù Quốc Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub\r\nSuperman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đã cáo buộc Superman là kẻ thù, buộc Superman làm sao để phá vỡ sao băng Kryptonite chuẩn bị đâm vào trái đất. Superman sẽ hành động thế nào?', 1, 'sieu-nhan-nguoi-doi-dai-chien-ke-thu-quoc-gia8833.jpg', 'sieu-nhannguoi-doi-dai-chien-ke-thu-quoc-gia', 5, 'phimle', 1, 2, 0, 0, 'S Vs B', 0, '', '2023-05-09 14:58:01', NULL, NULL, NULL, '0', NULL, 1),
(6, 'HUYỀN THOẠI GAME THỦ', NULL, 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'GG_Akuma-ga-Kitari-Kimi-ni-Muchuu_ch00_p0037523.jpg', 'huyen-thoai-game-thu', 5, 'phimbo', 4, 4, 0, 0, 'The legendary of gamer', 0, '', '2023-05-12 10:21:17', NULL, NULL, NULL, '0', NULL, 1),
(9, 'SIÊU NHÂN/NGƯỜI DƠI ĐẠI CHIẾN: KẺ THÙ QUỐC GIA', NULL, 'Siêu Nhân/Người Dơi Đại Chiến: Kẻ Thù Quốc Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub\r\nSuperman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đã cáo buộc Superman là kẻ thù, buộc Superman làm sao để phá vỡ sao băng Kryptonite chuẩn bị đâm vào trái đất. Superman sẽ hành động thế nào?', 1, 'sieu-nhan-nguoi-doi-dai-chien-ke-thu-quoc-gia8833.jpg', 'sieu-nhannguoi-doi-dai-chien-ke-thu-quoc-gia', 5, 'phimle', 1, 2, 0, 0, 'SUPER MAN VS BAT MAN', 0, '', '2023-05-09 14:57:15', NULL, NULL, NULL, '0', NULL, 1),
(10, 'HUYỀN THOẠI GAME THỦ', NULL, 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'NoGameNoLife_Volume_1_cover_page2254.jpg', 'huyen-thoai-game-thu', 5, 'phimbo', 3, 4, 0, 0, 'The legendary of gamer', 0, '', '2023-05-12 10:22:49', NULL, NULL, NULL, '0', NULL, 1),
(13, 'SIÊU NHÂN/NGƯỜI DƠI ĐẠI CHIẾN: KẺ THÙ QUỐC GIA', NULL, 'Siêu Nhân/Người Dơi Đại Chiến: Kẻ Thù Quốc Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub\r\nSuperman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đã cáo buộc Superman là kẻ thù, buộc Superman làm sao để phá vỡ sao băng Kryptonite chuẩn bị đâm vào trái đất. Superman sẽ hành động thế nào?', 1, 'sieu-nhan-nguoi-doi-dai-chien-ke-thu-quoc-gia8833.jpg', 'sieu-nhannguoi-doi-dai-chien-ke-thu-quoc-gia', 5, 'phimle', 1, 2, 0, 0, 'SUPER MAN VS BAT MAN', 0, '', '2023-05-09 14:56:27', NULL, NULL, NULL, '0', NULL, 1),
(14, 'HUYỀN THOẠI GAME THỦ', NULL, 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'NoGameNoLife_Volume_1_cover_page869.jpg', 'huyen-thoai-game-thu', 2, 'phimbo', 1, 1, 1, 0, 'The legendary of gamer', 0, '', '2023-05-12 10:23:02', NULL, NULL, NULL, '0', NULL, 1),
(17, 'SIÊU NHÂN/NGƯỜI DƠI ĐẠI CHIẾN: KẺ THÙ QUỐC GIA', NULL, 'Siêu Nhân/Người Dơi Đại Chiến: Kẻ Thù Quốc Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub\r\nSuperman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đã cáo buộc Superman là kẻ thù, buộc Superman làm sao để phá vỡ sao băng Kryptonite chuẩn bị đâm vào trái đất. Superman sẽ hành động thế nào?', 1, 'sieu-nhan-nguoi-doi-dai-chien-ke-thu-quoc-gia8833.jpg', 'sieu-nhannguoi-doi-dai-chien-ke-thu-quoc-gia', 2, 'phimle', 5, 2, 1, 0, 'SUPER MAN VS BAT MAN', 0, '', '2023-05-09 14:55:13', NULL, NULL, NULL, '0', NULL, 1),
(19, 'HUYỀN THOẠI GAME THỦ', NULL, 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'unnamed3838.jpg', 'huyen-thoai-game-thu', 4, 'phimbo', 5, 7, 1, 0, 'No Game, No Life', 0, '', '2023-05-12 10:22:06', NULL, NULL, NULL, '0', NULL, 1),
(20, 'One Punch Man', NULL, 'one punch man c Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub Superman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đ', 1, 'thoi-dai-ma-phap6341.jpg', 'one-punch-man', 4, 'phimbo', 6, 5, 1, 0, 'one-punch-man', 0, '', '2023-05-09 14:54:02', NULL, NULL, NULL, '0', NULL, 1),
(22, 'D4DJ: FIRST MIX', '23 phút/tập', 'D4DJ: First Mix, D4DJ First Mix, Dig Delight Direct Drive DJ 2020 Tập 11 Anime HD Vietsub\r\nD4DJ: First Mix, D4DJ First Mix, Dig Delight Direct Drive DJ 2020 Anime', 1, 'd4dj-first-mix-61500-thumbnail6547.jpg', 'd4dj-first-mix', 5, 'phimbo', 8, 4, 1, 0, 'D4DJ First Mix, Dig Delight Direct Drive DJ (2020)', 0, '', '2023-05-09 14:56:15', NULL, NULL, NULL, '0', NULL, 1),
(26, 'THÁM TỬ LỪNG DANH CONAN: NÀNG DÂU HALLOWEEN', '120 phút', 'Thám Tử Lừng Danh Conan: Nàng Dâu Halloween 2022, Detective Conan: The Bride of Halloween HD Vietsub + Thuyết minh\r\nShibuya , Tokyo, nhộn nhịp với mùa Halloween. Một đám cưới đang được tổ chức tại Shibuya Hikarie, nơi Sato đang mặc váy cưới. Trong khi Conan và những vị khách được mời khác đang xem, một kẻ tấn công bất ngờ xông vào và Takagi, người đang cố gắng bảo vệ Sato, bị thương. Takagi sống sót và tình hình đã được giải quyết, nhưng trong mắt Sato, hình ảnh của thần chết mà cô đã thấy khi Jinpei Matsuda, người đàn ông cô yêu, đã bị giết trong một loạt vụ đánh bom ba năm trước, phủ lên Của Takagi.Đồng thời, thủ phạm của các vụ đánh bom đã trốn thoát khỏi nhà tù. Rei Furuya / Toru Amuro, một thành viên của cảnh sát an toàn công cộng, đang truy lùng kẻ đã giết bạn cùng lớp của mình, nhưng một kẻ bí ẩn giả dạng đột nhiên xuất hiện và đặt một quả bom cổ vào người.Conan đến thăm nơi trú ẩn dưới lòng đất nơi Amuro đang ẩn náu để giải giáp quả bom, và nghe về một sự cố cách đây ba năm khi cậu và những người bạn cùng lớp đã qua đời của mình từ học viện cảnh sát gặp phải một kẻ đánh bom ảo không xác định tên là \"Plamya\" ở Shibuya. Khi Conan và nhóm của anh ấy điều tra, một bóng đen đáng lo ngại bắt đầu hiện ra trước mặt họ.', 1, 'rsz_conan_movie_2022-_vnese_poster_1_7758.jpg', 'tham-tu-lung-danh-conan-nang-dau-halloween', 5, 'phimle', 8, 4, 1, 0, 'Detective Conan: The Bride of Halloween (2022)', 0, '', '2023-05-16 19:48:50', 2022, 'Trường học, Trinh thám,Anime', 2, '0', 'SqSJPzWvcLc', 1),
(27, 'CUỘC CHIẾN THỜI TIỀN SỬ 65', NULL, 'Một phi hành gia gặp nạn hạ cánh xuống một hành tinh bí ẩn chỉ để phát hiện ra mình không đơn độc.', 1, '65_film_teaser_poster5183.jpg', 'cuoc-chien-thoi-tien-su-65', 11, 'phimle', 5, 2, 1, 0, '65 (2023)', 1, '', '2023-05-09 14:53:24', 2023, NULL, 2, '0', NULL, 1),
(28, 'TIẾNG THÉT 6', '122 phút', 'Trong phần tiếp theo, những người sống sót sau vụ giết Ghostface bỏ lại Woodsboro và bắt đầu một chương mới ở thành phố New York.', 1, 'tải xuống8682.jfif', 'tieng-thet-6', 6, 'phimle', 8, 2, 1, 1, 'Scream VI (2023)', 0, '', '2023-05-09 14:53:10', 2023, NULL, 0, '0', NULL, 1),
(29, 'Thanh Gươm Diệt Quỷ', '26 tập', 'Từ thời xưa luôn có những truyền thuyết về loài quỷ ăn thịt người rình mò trong các khu rừng khi màn đêm buông xuống. Chính điều này khiến người dân không ai dám vào rừng vào ban đêm. Tuy nhiên, Tanjiro, một cậu trai làm nghề bán củi than sống cùng gia đình trên núi lại không tin vào điều này, cậu quá bận rộn làm nuôi các anh em của mình. Nhưng rồi Tanjiro đã sớm phải tin vào những câu chuyện hảo huyền đó khi hiện thực cay nghiệt đến với cậu...', 1, '27851248.jpg', 'thanh-guom-diet-quy', 4, 'phimbo', 7, 4, 1, 0, 'Kimetsu no Yaiba', 0, '2023-05-08 13:25:11', '2023-05-16 14:21:40', 2023, 'Anime, Hành động,Lịch sử, Siêu nhiên, Shounen, Demon', 1, '3', 'PUeB0qbisq0', 6),
(30, 'Vệ Binh Dải Ngân Hà 3', '150 phút', 'Cho dù vũ trụ này có bao la đến đâu, các Vệ Binh của chúng ta cũng không thể trốn chạy mãi mãi.\r\n\r\nSau 6 năm chờ đợi, người hâm mộ mới có cơ hội được gặp lại nhóm Vệ binh “lầy lội” trong Guardians of the Galaxy Vol.3 (tựa Việt: Vệ binh dải Ngân Hà 3).\r\n\r\nĐây cũng là chuyến hành trình cuối cùng của họ và nhiều cái tên sẽ nói lời chia tay khán giả sau bộ phim Guardians of the Galaxy Vol.3.\r\n\r\nSau buổi công chiếu toàn cầu, giới phê bình dành cho tác phẩm của James Gunn nhiều lời khen ngợi, đánh giá là bộ phim Marvel hay nhất sau Avengers: Endgame (2019) với nhiều tình tiết đầy cảm xúc.\r\n\r\nGuardians of the Galaxy Vol.3 vừa có buổi chiếu ra mắt toàn cầu mang tên European Gala Event tại Marvel Avengers Campus ở Disneyland Paris (Pháp) với sự góp mặt của đạo diễn kiêm biên kịch James Gunn cùng các ngôi sao Chris Pratt, Zoe Saldaña, Karen Gillan, Pom Klementieff và Vin Diesel.\r\n\r\nDàn diễn viên đã tham gia giao lưu và chụp ảnh cùng người hâm mộ. Nhiều nhà phê bình cũng đã có cơ hội xem trọn vẹn bom tấn mới nhất của Marvel Studios tại sự kiện lần này và dành cho bộ phim rất nhiều lời khen ngợi.\r\n\r\nIan Sandwell của Digital Spy gọi tác phẩm là cái kết tuyệt vời cho một bộ ba phim (trilogy): “Guardians of the Galaxy Vol.3 là cái kết tuyệt vời cho một bộ ba phim tuyệt vời. Nó rất hài hước, xúc động và mỗi nhân vật đều có khoảnh khắc nổi bật riêng. Adam Warlock của Will Poulter là một sự bổ sung xuất sắc nhưng trọng tâm của phim vẫn là cái kết viên mãn cho các Vệ binh. Tôi sẽ nhớ họ lắm”.', 1, 'Ak5hAxorxMpxKoVw5e3kGfxs7sY3757.jpg', 've-binh-dai-ngan-ha-3', 9, 'phimle', 5, 2, 1, 4, 'Guardians of the Galaxy Volume 3', 0, '2023-05-09 09:31:59', '2023-05-09 14:51:54', 2023, 'Guardians of the Galaxy , Marvel , Hành động', NULL, '0', 'nBH8Anzfkvc', 1),
(31, 'Chiến Binh Báo Đen: Wakanda Bất Diệt', '162 phút', 'Dường như Black Panther/ T’Challa đã qua đời trong một sự kiện nào đó. Shuri (Letitia Wright), Okoye (Danai Gurira) lẫn nữ hoàng Ramonda (Angela Bassett) đều đau đớn và không cầm được nước mắt. Sau sự ra đi của Chadwick Boseman, Kevin Feige quyết định không chọn diễn viên mới cho nhân vật này mà chọn một người khác kế tục danh hiệu Black Panther. Có vẻ, cái chết của T’Challa đã dẫn đến cuộc chiến giữa Wakanda và Atlantis – một vương quốc sống dưới mặt nước do Namor (Tenoch Huerta) lãnh đạo. Trong truyện tranh, Namor là một nhân vật quan trọng khi góp mặt trong nhiều nhóm siêu anh hùng. Atlantis sở hữu nhiều công nghệ tiên tiến không kém cạnh Wakanda, đồng thời còn có khả năng liên kết và điều khiển các sinh vật biển. Toàn bộ bộ lạc đều bị cuốn vào giao tranh. Vương quốc Wakanda hùng mạnh lần đầu tiên bị kẻ thù nhấn chìm trong biển nước. Ngay cả nội bộ nhóm Dora Milaje cũng xảy ra mâu thuẫn.   Ngoài ra, trailer còn giới thiệu Ironheart/Riri Williams (Dominique Thorne) xuất hiện bên cạnh Shuri. Trong nguyên tác truyện tranh, nữ nhân vật này là một thiên tài công nghệ khi tự chế ra bộ giáp riêng và được ví như truyền nhân của Iron Man. Cuối trailer, một Black Panther mới xuất hiện nhưng không rõ danh tính. Nhân vật này khả năng cao sẽ là người xuất hiện trong các phần phim sau này thay thế cho vị trí của T’Challa. Black Panther: Wakanda Forever chính là bước đệm để mang đến một kỷ nguyên mới cho MCU.', 1, 'sumbrk_payoff_1sht_eng_4d993829-185x2787548.png', 'chien-binh-bao-den-wakanda-bat-diet', 2, 'phimle', 5, 2, 1, 0, 'Black Panther: Wakanda Forever', 0, '2023-05-09 09:49:45', '2023-05-09 14:51:45', 2023, 'Marvel , Hành động, Black Panther', NULL, '0', 'RlOB3UALvrQ', 1),
(32, 'Trái Tim Ngừng Nhịp', '40 phút/ tập', '“Heartstopper” (Trái Tim Ngừng Nhịp) – bộ phim tuổi teen lấy LGBTQ làm trọng tâm của Netflix vừa mới lên sóng nhưng đã nhanh chóng gây sốt bởi quá đáng yêu và truyền cảm hứng bởi những thông điệp sâu sắc và tích cực.\r\nBộ phim Heartstopper (Trái Tim Ngừng Nhịp) của Netflix được dựng dựa trên truyện tranh cùng tên của Alice Oseman. Điều đặc biệt của Heartstopper là phim đặt LGBTQ vào trọng tâm của câu chuyện, chứ không chỉ ở bên rìa “điểm tô” cho câu chuyện của một nhân vật chính khác. Thêm nữa, Heartstopper chọn lối kể chuyện nhẹ nhàng, tông màu thơ mộng, ngọt ngào, chứ không đen tối và giằng xé như đa số các bộ phim chủ đề LGBTQ khác lựa chọn.\r\n\r\nNhân vật chính của câu chuyện là Charlie, một nam sinh biết chơi trống, chạy rất nhanh, giỏi trò chơi điện tử. Mở đầu Heartstopper, Charlie dùng dằng trong một mối quan hệ bí mật, và khi nhận ra nó không ổn cậu đã kết thúc nó. Đồng thời, Charlie bắt đầu có cảm tình với Nick, một nam sinh nổi bật trong trường, ngôi sao của đội bóng bầu dục, được xưng tụng là Vua Bóng Bầu Dục. Cả hai được xếp chỗ ngồi cạnh nhau trong lớp.\r\n\r\n“Rắc rối” của Heartstopper là Charlie và Nick là hai người thuộc về hai thế giới khác nhau. Charlie thuộc về “tầng lớp” kém tiếng ở trường, là đối tượng của đám bắt nạt; còn Nick thuộc hội “nổi tiếng”, được những bạn học khác có phần nể trọng.\r\n\r\nBạn bè của Charlie không muốn cậu dây dưa với Nick, vì sợ kiểu gì thằng bạn thân của mình cũng đau khổ. Bởi Charlie là một nam sinh đồng tính công khai, nhưng Nick “thẳng ơi là thẳng” – ít nhất là đa số đều nhận xét như thế.\r\n\r\nTrong câu chuyện của Heartstopper còn có những nhân vật siêu đáng yêu khác. Đó là Elle, cô bạn chuyển giới của nhóm bạn Charlie, nay đã chuyển sang trường nữ sinh. Tao – một người bạn thẳng thắn và bộc trực, luôn lo lắng cho bạn bè. Isaac là một mọt sách chính hiệu khi luôn xuất hiện với những cuốn sách mới.\r\n\r\nHeartstopper không chỉ kể câu chuyện tình gà bông LGBTQ siêu yêu mà còn là về tình bạn thân thiết, tình cảm gia đình ấm áp, truyền cảm hứng cho những cô cậu tuổi teen trên hành trình tìm kiếm chính mình. Đâu có ngoài kia có thể có một Charlie, một Nick, một Elle, hay một Tao… trong câu chuyện của chính họ.\r\n\r\nBộ phim chữa lành và truyền cảm hứng, gửi đi những thông điệp tích cực, rằng hãy cứ là chính bạn, đừng để bất kỳ ai thay đổi bạn chỉ để hòa nhập. Bởi vì sự khác biệt của bạn là điều khiến bạn trở nên đặc biệt.', 1, 'A9lLwds9PExI5sjOpMaGXLZqwti-200x3007087.jpg', 'trai-tim-ngung-nhip', 4, 'phimbo', 8, 3, 1, 0, 'Heartstopper', 0, '2023-05-09 09:53:13', '2023-05-09 14:51:27', 2022, 'Trường học , Trái tim ngừng nhịp', NULL, '0', 'FrK4xPy4ahg', 1),
(33, 'Tiên Hắc Ám 2', '120 phút', 'Xem phim Tiên Hắc Ám 2 – Maleficent: Mistress of Evil 2019. Câu chuyện cổ tích về nàng công chúa Aurora nay sẽ được kể lại qua một góc nhìn mới.\r\n\r\nTừ một góc nhìn phản diện sẽ khiến tất cả trong chúng ta mở ra được một câu chuyện cổ tích mới. Disney cho biết trong phần 2 này, Maleficent và Aurora tiếp tục mối quan hệ phức tạp của họ. Đồng thời cùng nhau đối mặt với một mối nguy hiểm mới đang đe dọa vùng đất Moors.\r\n\r\nTác phẩm đánh dấu sự trở lại của ngôi sao điện ảnh Angelina Jolie trong hình tượng bà tiên đẹp lộng lẫy nhưng cũng vô cùng đáng sợ. Kết thúc phần đầu tiên cách đây 5 năm, tiên hắc ám Maleficent và công chúa Aurora đã rũ bỏ những hiểu lầm và thù hận để cùng nhau trị vì hai vương quốc của con người và sinh vật huyền bí.\r\n\r\nTuy nhiên, trailer mới nhất cho thấy sự yên bình không thể tồn tại mãi mãi. Maleficent và công chúa Aurora một lần nữa gặp bất hòa sau cuộc gặp gỡ với hoàng hậu Ingrith của nước láng giềng. Bà tiên bóng tối đã “ác hóa”, trở thành mối hiểm họa cho toàn vương quốc. Cùng với những thay đổi của Maleficent, khán giả có thể nhận thấy sự trưởng thành rõ nét ở Aurora. Nàng công chúa thơ dại ngày nào giờ đã ra dáng nữ chủ của một vương triều. Vai diễn này cũng gắn liền với sự trưởng thành về mặt diễn xuất của nữ diễn viên trẻ Elle Fanning.', 1, 'tBuabjEqxzoUBHfbyNbd8ulgy5j8884.jpg', 'tien-hac-am-2', 11, 'phimle', 5, 2, 1, 0, 'Maleficent: Mistress of Evil', 1, '2023-05-09 09:56:51', '2023-05-09 14:51:02', 2020, 'Maleficent , Giả tưởng , Âu Mỹ , Disney', NULL, '0', 'n0OFH4xpPr4', 1),
(34, 'Aladdin và Cây Đèn Thần (1992)', '90 phút', 'Phim Aladdin Và Cây Đèn Thần – Aladdin 1992: là bộ phim hoạt hình dựa theo câu chuyện trong Ngàn lẻ một đêm. Bộ phim online này kể về Aladdin, một thanh niên vô gia cư sống lang thang bên đường phố Agrabah. vô tình có được cây đèn thần kỳ diệu. Nhờ có vị thần đèn vui tính, Aladdin từ một kẻ mồ côi, lang thang đã có tất cả nhưng gì anh mơ ước như của cải và cô công chúa xinh đẹp. Nhưng một tên phù thủy gian ác đang âm mưu phá hoại cuộc sống của Aladdin bằng cách chiếm đoạt lại cây đèn thần này, và bắt công chúa người nah yêu đi. Aladdin sẽ phải làm gì đây?', 1, '9TO4MUGtidmylYZFGPKwR33is8N8021.jpg', 'aladdin-va-cay-den-than-1992', 5, 'phimle', 5, 2, 1, 0, 'addin', 1, '2023-05-09 09:59:53', '2023-05-09 14:50:49', 2000, 'Disney , Phim hoạt hình', NULL, '0', '-KOW5rn6YPs', 1),
(35, 'One Ranger', '95 phút', 'Phim theo chân một Texas Ranger Jane khi anh ta được Tình báo Anh tuyển dụng để truy tìm một tên khủng bố nguy hiểm và ngăn chặn hắn tấn công London.', 1, 'wifpeW84yfrj2ta00ngcHPPZSNA8172.jpg', 'one-ranger', 6, 'phimle', 1, 2, 1, 0, 'One Ranger', 0, '2023-05-09 10:06:12', '2023-05-12 10:24:10', 2023, 'Hành động , Miền Tây', NULL, '0', 'zD4UrHqPp9U', 1),
(36, 'Muốn Gặp Anh (Bản Điện Ảnh)', '107 phút', 'Hoàng Vũ Huyên (Kha Giai Yến) là nhân viên văn phòng trong một công ty công ty IT. Cô vẫn luôn sống trong đau khổ, nhung nhớ khi người bạn trai của mình là Vương Tuyên Thắng (Hứa Quang Hán) mất tích trong vụ tai nạn máy bay 2 năm trước. Trong một dịp tình cờ, cô phát hiện một bức ảnh chụp giống hệt mình và bạn trai thông qua ứng dụng “tìm người có khuôn mặt giống bạn”.\r\n\r\nVài ngày sau sinh nhật lần thứ 27 của mình, Hoàng Vũ Huyên nhận được một chiếc cassette mini cùng với đĩa nhạc Last Dance. Chiếc cassette và bản nhạc đó đã đưa cô trở lại năm 1998, trong thân phận nữ sinh Trần Vận Như và gặp được Lý Tử Duy – người giống hệt Vương Tuyên Thắng mà cô hằng đêm mong nhớ cùng Mạc Tuấn Kiệt (Thi Bách Vũ) – chàng trai yêu thầm Trần Vận Như.\r\n\r\nTrần Vận Như vốn hướng nội, nhút nhát đột nhiên trở thành một Hoàng Vũ Huyên cởi mở, hoạt bát khiến mọi chuyện trong quá khứ thay đổi. Hoàng Vũ Huyên chỉ vì một câu nói “Cậu ấy chính là Vương Tuyên Thắng” mà tiếp tục dùng thân phận của Trần Vận Như để được ở gần Lý Tử Duy, đồng thời tìm cách thay đổi quá khứ, tìm ra kẻ sát hại Trần Vận Như vào đêm giao thừa năm 1999 như ở tương lai năm 2019 cô đã nghe kể lại.', 1, 'muon-gap-anh3670.jpg', 'muon-gap-anh-ban-dien-anh', 6, 'phimle', 8, 6, 1, 0, 'Someday Or One Day', 0, '2023-05-09 10:08:37', '2023-05-09 23:06:10', 2023, 'Someday Or One Day , Lãng mạn , Lưu Bách Vũ', NULL, '0', 'm838XNyLx48', 1),
(37, 'Mẹ Ma Than Khóc', '93 phút', 'Xem phim Mẹ Ma Than Khóc La Llorona: Một bom tấn từ ông hoàng phim kinh dị James Wan về hồn ma của ác quỷ tàn khốc La Llorona – người phụ nữ vì ghen tuông mà đã ném hai đứa con của mình xuống sông, sau đó hối hận và trở thành hồn ma, bà đi lang thang khắp nhân gian để tìm lại con của mình.\r\n\r\nBộ phim lấy bối cảnh năm 1973 tại Los Angeles, với nhân vật chính là Anna Garcia (Linda Cardellini đóng), một nhân viên công tác xã hội góa chồng đang nuôi nấng hai đứa con nhỏ. Khi tới điều tra vụ việc một bà mẹ bị buộc tội bạo hành trẻ em, Anna đã phát hiện ra những bí ẩn khó có thể giải thích trong vụ án này.\r\n\r\nCàng ngày, cô càng nhận ra sự trùng hợp ghê rợn giữa vụ việc của bà mẹ kia và những hiện tượng siêu nhiên xảy ra với chính gia đình mình, mà đứng đằng sau không ai khác chính là ác ma than khóc trong truyền thuyết La Llorona. Trước mối hiểm họa có thể ập đến hai người con của mình bất kỳ lúc nào, Anna buộc phải nhờ đến sự giúp đỡ của một thầy cúng địa phương để tống khứ bà mẹ ác quỷ về nơi mụ thuộc về.', 1, '86rN4tE6SuYSX9fiknoVxZiiSNk-185x2787812.jpg', 'me-ma-than-khoc', 6, 'phimle', 7, 2, 1, 0, 'The Curse of La Llorona', 0, '2023-05-09 10:10:53', '2023-05-12 10:24:06', 2023, 'Mẹ ma than khóc , kinh dị , Netflix', NULL, '0', 'uOV-xMYQ7sk', 1),
(38, 'Chainsaw Man', '12 tập', 'Cậu thiếu niên Denji sống một cuộc sống nghèo khổ và phải làm việc vất vả để trả nợ. Cậu vừa sống vừa làm Thợ Săn Quỷ cùng với Pochita – loài quỷ Chainsaw, nhưng rồi một ngày cậu trở thành mục tiêu của một con quỷ tàn bạo…', 1, '3628694.jpg', 'chainsaw-man', 2, 'phimbo', 7, 4, 1, 0, 'Chainsaw Man', 0, '2023-05-09 13:49:32', '2023-05-12 10:23:58', 2023, 'Hành động, Shounen, Siêu nhiên, Kinh dị, Anime', NULL, '0', 'v4yLeNt-kCU', 1),
(42, 'Bluelock', '24 tập', 'Yoichi Isagi đã bỏ lỡ cơ hội tham dự giải Cao Trung toàn quốc do đã chuyền cho đồng đội thay vì tự thân mình dứt điểm. Cậu là một trong 300 chân sút U-18 được tuyển chọn bởi Jinpachi Ego, người đàn ông được Hiệp Hội Bóng Đá Nhật Bản thuê sau hồi FIFA World Cup năm 2018, nhằm dẫn dắt Nhật Bản vô địch World Cup bằng cách tiêu diệt nền bóng đá Nhật Bản. Kế hoạch của Ego gồm việc cô lập 300 tay sút trong một nhà ngục - dưới một tổ chức với tên gọi là \"Blue Lock\", với mục tiêu là tạo ra chân sút \"tự phụ\" nhất thế giới, điều mà nền bóng đá Nhật Bản còn thiếu.', 1, '36217960.jpg', 'bluelock', 5, 'phimbo', 4, 4, 1, 0, 'Bluelock', 0, '2023-05-09 14:35:00', '2023-05-16 19:26:39', 2023, 'Anime', NULL, '0', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(1, 42, 3),
(2, 42, 4),
(5, 38, 7),
(6, 37, 7),
(7, 36, 4),
(8, 36, 5),
(9, 36, 8),
(10, 35, 1),
(11, 34, 3),
(12, 34, 5),
(13, 33, 3),
(14, 33, 5),
(15, 32, 4),
(16, 32, 8),
(17, 32, 3),
(18, 31, 1),
(19, 31, 5),
(20, 30, 1),
(21, 30, 3),
(22, 30, 5),
(23, 29, 1),
(24, 29, 3),
(25, 29, 5),
(26, 29, 6),
(27, 29, 7),
(28, 28, 1),
(29, 28, 7),
(30, 28, 8),
(31, 27, 1),
(32, 27, 5),
(33, 26, 1),
(34, 26, 3),
(35, 26, 8),
(36, 20, 1),
(37, 20, 3),
(38, 20, 6),
(41, 17, 1),
(42, 17, 5),
(45, 14, 1),
(46, 22, 8),
(47, 13, 1),
(50, 10, 3),
(51, 9, 1),
(55, 5, 1),
(56, 38, 1),
(57, 38, 5),
(62, 6, 3),
(63, 6, 4),
(64, 19, 3),
(65, 19, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$osK2axoPspvmR.WCiboT6OYv7Rj5yKX4C2l1f5XalBanI7PqXzAv.', '2023-06-11 22:26:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `rating`, `movie_id`, `ip_address`) VALUES
(1, 2, 26, '127.0.0.1'),
(2, 5, 29, '127.0.0.1'),
(3, 4, 42, '127.0.0.1'),
(4, 3, 35, '127.0.0.1'),
(5, 4, 37, '127.0.0.1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'user01', 'user01@gmail.com', NULL, '$2y$10$UYX7Phik6ozCMxYBsPZAcOJOAgiRX2kABKPSRMi4Mn.b03/5eQmzy', NULL, '2022-01-03 07:00:17', '2022-01-03 07:00:17'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$1RZ/ZSDHa7LC3hAYiy5hP.CGBRhN.RgRHsjjoUCm/pN/EtGsPOIui', NULL, '2023-03-13 08:37:01', '2023-03-13 08:37:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`genre_id`,`country_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_ibfk_3` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
