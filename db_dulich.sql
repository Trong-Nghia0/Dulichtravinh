-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2023 lúc 09:50 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_dulich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbaiviet`
--

CREATE TABLE `tblbaiviet` (
  `mabaiviet` int(11) NOT NULL,
  `madiemden` int(11) NOT NULL,
  `tenbaiviet` varchar(300) NOT NULL,
  `chitietbaiviet` mediumtext NOT NULL,
  `hinhanh` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblbaiviet`
--

INSERT INTO `tblbaiviet` (`mabaiviet`, `madiemden`, `tenbaiviet`, `chitietbaiviet`, `hinhanh`) VALUES
(1, 4, 'Ao Bà Om - Truyền thuyết của người Khmer', 'Ao Bà Om (ao Vuông) là nhân vật chính trong một truyền thuyết của người Khmer cũng là một thắng cảnh độc đáo, nổi tiếng tại Trà Vinh. Ao Bà Ôm còn là địa điểm check-in ở Trà Vinh rất được yêu thích nhờ vẻ đẹp trong xanh, yên tĩnh của mặt nước. Và nhờ sự bao bọc của rừng cây hơn trăm năm tuổi nên không khí tại đây luôn mát mẻ quanh năm.\r\n\r\nTừ Ao Bà Om chúng ta có thể dễ dàng đến thăm chùa Âng và Bảo tàng văn hóa người Khmer. Ngoài ra, Ao Bà Om còn là nơi diễu hành của người Khmer trong lễ hội Ok Om Bok nối tiếng. Là một trong những địa điểm du lịch Trà Vinh độc đáo, Ao Bà Om đã được công nhận là Di tích lịch sử văn hóa quốc gia vào năm 1994.\r\n\r\nAo Bà Om tại Trà Vinh\r\nAo Bà Om là địa điểm gắn liền với huyền thoại cùng tên của người Khmer @internet\r\n\r\nĐể đến được Ao Bà Om, các bạn có thể di chuyển bằng xe du lịch, hoặc vi vu xe máy trên một con đường dài thẳng tắp được làm mát bằng cây xanh xung quanh. Nếu có cơ hội, bạn nên đi vào tháng 10 âm lịch để cùng tham gia lễ hội Ok Om Bok nhé.\r\n\r\nĐịa chỉ của ao Bà Om: khóm 3, phường 8, thành phố Trà Vinh. Các bạn có thể xem hướng dẫn của chị Google để đi. Và vì ao Bà Om cũng như các địa điểm du lịch Trà Vinh khác là địa điểm còn mới mẻ với khách từ xa nên hệ thống khách sạn chưa thật sự phát triển, nên nếu muốn qua đêm các bạn nên xem phòng và đặt trước tại đây nhé.', 'dia-diem-du-lich-tra-vinh-2.webp'),
(5, 1, 'CHÙA ÂNG – NGÔI CHÙA KHMER CỔ TUYỆT ĐẸP Ở TRÀ VINH', 'Bàn về địa điểm du lịch trà vinh đặc sắc không thể không nhắc đến những ngôi chùa cổ gắn với lịch sử khai phá phương nam của người Khmer. Trong đó, chùa Âng - một trong những Di tích lịch sử quốc gia được xem là ngôi chùa cổ nhất và đẹp nhất Trà Vinh.\r\n\r\nNhìn từ bên ngoài, chùa mang vẻ đẹp nguy nga, tráng lệ nhờ nghệ thuật điêu khắc đỉnh cao của nghệ nhân cách đây gần 1000 năm. Khi đi vào bên trong chánh điện các bạn sẽ cảm nhận được sự linh thiêng đặc biệt dưới sự hiện diện của tượng Phật Thích Ca.\r\n\r\nNgôi chùa Âng cổ kính tại Trà Vinh\r\nNgôi chùa Âng gần 1,000 tuổi cổ kính nhất Trà Vinh. Ngôi chùa này đóng vai trò quan trọng trong đời sống tinh thần của người dân tại nơi đây @internet\r\n\r\nChùa Âng có vai trò đặc biệt trong đời sống tinh thần của người Khmer. Chùa là nơi thực hiện các nghi thức Phật giáo và lưu giữ các giá trị văn hóa truyền thống của dân tộc. Với ý nghĩa và vẻ đẹp đặc biệt, chùa Âng là một trong những địa điểm tham quan hấp dẫn ở Trà Vinh mà bạn nên đến thăm và cầu nguyện cho cho những điều tốt đẹp.\r\n\r\nĐịa chỉ chùa Âng: quốc lộ 53, thuộc khóm 4, phường 8, thành phố Trà Vinh, tỉnh Trà Vinh. Chùa Âng thuộc quần thể thắng cảnh ao Bà Om và bảo tàng văn hóa dân tộc. Các bạn có thể di chuyển đến một trong ba địa điểm trên và dễ dàng tham quan những địa điểm còn lại.', 'chua-ang-1.jpg'),
(6, 5, 'Bảo tàng văn hóa dân tộc của người Khmer', 'Một trong những địa điểm du lịch Trà Vinh thuộc khuôn viên thắng cảnh ao Bà Om là bảo tàng văn hóa của người Khmer. Kiến trúc của bảo tàng là sự kết hợp hài hòa giữa phong cách kiến trúc truyền thống và hiện đại. Đây còn là nơi lưu giữ hiện vật về đời sống văn hóa tinh thần, vật chất của đồng bào Khmer ở đồng bằng sông Cửu Long.\r\n\r\nBảo tàng văn hóa Khmer tại Trà Vinh\r\nBảo tàng văn hóa Khmer tại Trà Vinh nhìn từ trên cao với khuôn viên trồng nhiều cây xanh bao phủ, tạo nên cảnh quan tươi mát @internet\r\n\r\nBa phòng trưng bày được đặt ở lầu 2 của bảo tàng là nơi cho du khách tham quan. Phòng đầu tiên trưng bày hiện vật về mô hình các ngôi chùa của người Khmer, phòng thứ hai trưng bày các nông cụ sản xuất truyền thống của người Khmer, phòng thứ ba trưng bày các nhạc cụ truyền thống, các trang phục, đạo cụ,..\r\n\r\nĐịa chỉ của Bảo tàng: thuộc quần thể di tích ao Bà Om, thuộc khóm 4, phường 8, thành phố Trà Vinh, tỉnh Trà Vinh. Các bạn có thể dễ dàng đến bảo tàng nếu đang trong quần thể ao Bà Om.', 'dia-diem-du-lich-tra-vinh-4.webp'),
(7, 6, 'Chùa Vàm Rây', 'Trong hệ thống những ngôi chùa Khmer cổ nổi tiếng tại Trà Vinh, chùa Vàm Rây là ngôi chùa Khmer lớn nhất miền Tây. Với phong cách kiến trúc Angkor đặc trưng của người Campuchia, chùa Vàm Ray mang vẻ đẹp nguy nga, lộng lẫy như cung điện. Đây chắc chắn là một trong những địa điểm du lịch Trà Vinh nổi tiếng không nên bỏ lỡ.\r\n\r\nChùa Vàm Rây - chùa Khmer lớn nhất miền Tây\r\nNgôi chùa Khmer lớn nhất miền Tây là niềm tự hào của người dân nhìn tổng quan từ trên cao @internet\r\n\r\nĐỉnh cao nghệ thuật của chùa Vàm Ray được thể hiện ở những họa tiết đại diện cho các vị thần nơi mái vòm, tường và cột. Ngoài kiến trúc rực rỡ, chùa Vàm Rây còn được biết đến với Tượng Phật nằm ngoài trời 54m lớn nhất Việt Nam. Ngôi chùa là niềm tự hào của người dân địa phương.', 'dia-diem-du-lich-tra-vinh-5.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldiemden`
--

CREATE TABLE `tbldiemden` (
  `madiemden` int(11) NOT NULL,
  `tendiemden` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `mota` mediumtext NOT NULL,
  `giomocua` time NOT NULL,
  `giodongcua` time NOT NULL,
  `giothamquan` time NOT NULL,
  `gia` int(11) NOT NULL,
  `maloaihinh` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbldiemden`
--

INSERT INTO `tbldiemden` (`madiemden`, `tendiemden`, `diachi`, `hinhanh`, `mota`, `giomocua`, `giodongcua`, `giothamquan`, `gia`, `maloaihinh`) VALUES
(1, 'Chùa Âng', 'Trà Vinh', 'chua-ang-1.jpg', 'Nhắc tới Trà Vinh, người ta nghĩ đến miền đất của những ngôi chùa Khmer cổ kính cùng những di tích lịch sử mang nhiều huyền thoại, gắn liền với hành trình khai phá phương Nam. Toàn tỉnh Trà Vinh có rất nhiều ngôi chùa Khmer, trong đó chùa Âng được xem là một trong những ngôi chùa lớn, tiêu biểu cho các ngôi chùa Khmer trong tỉnh.', '01:00:00', '02:00:00', '03:00:00', 0, 1),
(4, 'Ao Bà Om', 'Trà Vinh', 'dia-diem-du-lich-tra-vinh-2.webp', 'Ao Bà Om (ao Vuông) là nhân vật chính trong một truyền thuyết của người Khmer cũng là một thắng cảnh độc đáo, nổi tiếng tại Trà Vinh. Ao Bà Ôm còn là địa điểm check-in ở Trà Vinh rất được yêu thích nhờ vẻ đẹp trong xanh, yên tĩnh của mặt nước. Và nhờ sự bao bọc của rừng cây hơn trăm năm tuổi nên không khí tại đây luôn mát mẻ quanh năm.\r\n\r\nTừ Ao Bà Om chúng ta có thể dễ dàng đến thăm chùa Âng và Bảo tàng văn hóa người Khmer. Ngoài ra, Ao Bà Om còn là nơi diễu hành của người Khmer trong lễ hội Ok Om Bok nối tiếng. Là một trong những địa điểm du lịch Trà Vinh độc đáo, Ao Bà Om đã được công nhận là Di tích lịch sử văn hóa quốc gia vào năm 1994.\r\n\r\nAo Bà Om tại Trà Vinh\r\nAo Bà Om là địa điểm gắn liền với huyền thoại cùng tên của người Khmer @internet\r\n\r\nĐể đến được Ao Bà Om, các bạn có thể di chuyển bằng xe du lịch, hoặc vi vu xe máy trên một con đường dài thẳng tắp được làm mát bằng cây xanh xung quanh. Nếu có cơ hội, bạn nên đi vào tháng 10 âm lịch để cùng tham gia lễ hội Ok Om Bok nhé.\r\n\r\nĐịa chỉ của ao Bà Om: khóm 3, phường 8, thành phố Trà Vinh. Các bạn có thể xem hướng dẫn của chị Google để đi. Và vì ao Bà Om cũng như các địa điểm du lịch Trà Vinh khác là địa điểm còn mới mẻ với khách từ xa nên hệ thống khách sạn chưa thật sự phát triển, nên nếu muốn qua đêm các bạn nên xem phòng và đặt trước tại đây nhé.', '10:20:00', '12:02:00', '01:00:00', 0, 1),
(5, 'Bảo tàng văn hóa dân tộc của người Khmer', 'Trà Vinh', 'dia-diem-du-lich-tra-vinh-4.webp', 'Một trong những địa điểm du lịch Trà Vinh thuộc khuôn viên thắng cảnh ao Bà Om là bảo tàng văn hóa của người Khmer. Kiến trúc của bảo tàng là sự kết hợp hài hòa giữa phong cách kiến trúc truyền thống và hiện đại. Đây còn là nơi lưu giữ hiện vật về đời sống văn hóa tinh thần, vật chất của đồng bào Khmer ở đồng bằng sông Cửu Long.\r\n\r\nBảo tàng văn hóa Khmer tại Trà Vinh\r\nBảo tàng văn hóa Khmer tại Trà Vinh nhìn từ trên cao với khuôn viên trồng nhiều cây xanh bao phủ, tạo nên cảnh quan tươi mát @internet\r\n\r\nBa phòng trưng bày được đặt ở lầu 2 của bảo tàng là nơi cho du khách tham quan. Phòng đầu tiên trưng bày hiện vật về mô hình các ngôi chùa của người Khmer, phòng thứ hai trưng bày các nông cụ sản xuất truyền thống của người Khmer, phòng thứ ba trưng bày các nhạc cụ truyền thống, các trang phục, đạo cụ,..\r\n\r\nĐịa chỉ của Bảo tàng: thuộc quần thể di tích ao Bà Om, thuộc khóm 4, phường 8, thành phố Trà Vinh, tỉnh Trà Vinh. Các bạn có thể dễ dàng đến bảo tàng nếu đang trong quần thể ao Bà Om.', '11:11:00', '14:22:00', '03:33:00', 0, 1),
(6, ' Chùa Vàm Rây ', 'Trà Vinh', 'dia-diem-du-lich-tra-vinh-5.webp', 'Trong hệ thống những ngôi chùa Khmer cổ nổi tiếng tại Trà Vinh, chùa Vàm Rây là ngôi chùa Khmer lớn nhất miền Tây. Với phong cách kiến trúc Angkor đặc trưng của người Campuchia, chùa Vàm Ray mang vẻ đẹp nguy nga, lộng lẫy như cung điện. Đây chắc chắn là một trong những địa điểm du lịch Trà Vinh nổi tiếng không nên bỏ lỡ.\r\n\r\nChùa Vàm Rây - chùa Khmer lớn nhất miền Tây\r\nNgôi chùa Khmer lớn nhất miền Tây là niềm tự hào của người dân nhìn tổng quan từ trên cao @internet\r\n\r\nĐỉnh cao nghệ thuật của chùa Vàm Ray được thể hiện ở những họa tiết đại diện cho các vị thần nơi mái vòm, tường và cột. Ngoài kiến trúc rực rỡ, chùa Vàm Rây còn được biết đến với Tượng Phật nằm ngoài trời 54m lớn nhất Việt Nam. Ngôi chùa là niềm tự hào của người dân địa phương.\r\n\r\nĐịa chỉ: ấp Vàm Rây, xã Hàm Thuận, huyện Trà Cú. Chùa Vàm Rây cách quần thể du lịch ao Bà Om tầm 1 giờ xe chạy. Tùy theo địa điểm xuất phát mà bạn sắp xếp lịch trình tiện nhất nhé.', '11:11:00', '14:22:00', '03:33:00', 0, 1),
(7, '1', '1', '2-scaled.jpg', '1', '11:01:00', '11:11:00', '11:11:00', 1, 3),
(8, '1', '1', '2-scaled.jpg', '11', '11:11:00', '11:11:00', '11:11:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblloaihinh`
--

CREATE TABLE `tblloaihinh` (
  `maloaihinh` int(30) NOT NULL,
  `tenloaihinh` varchar(100) NOT NULL,
  `hinhanh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblloaihinh`
--

INSERT INTO `tblloaihinh` (`maloaihinh`, `tenloaihinh`, `hinhanh`) VALUES
(1, 'Di tích lịch sử', '../../hinhanh/chua-ang-1.jpg'),
(3, 'khu du lịch', '../../hinhanh/2-scaled.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnguoidung`
--

CREATE TABLE `tblnguoidung` (
  `manguoidung` int(30) NOT NULL,
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblnguoidung`
--

INSERT INTO `tblnguoidung` (`manguoidung`, `tendangnhap`, `matkhau`, `quyen`) VALUES
(1, 'admin@gmail.com', '123456', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblbaiviet`
--
ALTER TABLE `tblbaiviet`
  ADD PRIMARY KEY (`mabaiviet`);

--
-- Chỉ mục cho bảng `tbldiemden`
--
ALTER TABLE `tbldiemden`
  ADD PRIMARY KEY (`madiemden`);

--
-- Chỉ mục cho bảng `tblloaihinh`
--
ALTER TABLE `tblloaihinh`
  ADD PRIMARY KEY (`maloaihinh`);

--
-- Chỉ mục cho bảng `tblnguoidung`
--
ALTER TABLE `tblnguoidung`
  ADD PRIMARY KEY (`manguoidung`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblbaiviet`
--
ALTER TABLE `tblbaiviet`
  MODIFY `mabaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbldiemden`
--
ALTER TABLE `tbldiemden`
  MODIFY `madiemden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tblloaihinh`
--
ALTER TABLE `tblloaihinh`
  MODIFY `maloaihinh` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tblnguoidung`
--
ALTER TABLE `tblnguoidung`
  MODIFY `manguoidung` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
