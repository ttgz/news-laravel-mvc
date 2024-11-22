-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2024 lúc 11:00 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `news_articles`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `published_at` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `advertisements`
--

INSERT INTO `advertisements` (`id`, `content`, `published_at`, `image`, `status`) VALUES
(1, 'vinfast vf7 - đam mê tạo phi thường', '2024-10-09', 'images/qc_vinfast.jpg', 1),
(2, 'vinfast vf8 - định nghĩa lại thương hiệu', '2024-10-12', 'images/qc_vf8.jpg', 1),
(3, 'vinfast vf8', '2024-10-12', 'images/qc_vf8.jpg', 1),
(4, 'vinfast vf8', '2024-10-12', 'images/qc_vf8.jpg', 1),
(5, 'vinfast vf8', '2024-10-12', 'images/qc_vf8.jpg', 1),
(6, 'vinfast vf8', '2024-10-12', 'images/qc_vf8.jpg', 1),
(7, 'vf9 - Lựa chọn tận hưởng đẳng cấp', '2024-10-13', 'images/qc_vf8.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `captchas`
--

CREATE TABLE `captchas` (
  `captcha` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `captchas`
--

INSERT INTO `captchas` (`captcha`) VALUES
('816558');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Thể thao', 1),
(2, 'Truyện', 1),
(82, 'Thời sự', 1),
(97, 'Công nghệ thông tin', 1),
(98, 'Ô tô', 1),
(99, 'Đời Sống', 1),
(100, 'Quảng cáo', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberphone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `numberphone`, `email`, `address`, `facebook`, `about`, `logo`) VALUES
(1, '24h news', '1234567891', 'news@gmail.com', '1111 Nguyễn Tất Thành, Quận 4, TP. Hồ Chí Minh', 'http://facebook.com', '\"24h News - Cập nhật tin tức trong nước và quốc tế nhanh chóng, chính xác. Đọc báo mỗi ngày cùng [24h News để không bỏ lỡ bất kỳ sự kiện nào quan trọng.\"', 'logo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact_requests`
--

CREATE TABLE `contact_requests` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `is_response` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact_requests`
--

INSERT INTO `contact_requests` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `is_response`) VALUES
(1, 'Trung Nguyên', 'trungnguyen@gmail.com', 'Cần cải thiện trang web', 'Thêm một số tính năng', '2024-10-08', 1),
(2, 'Trung nguyên 2', 'trungnguyen2@gmail.com', 'thêm chức năng', 'thêm nhiều chức năng hơn', '2024-10-13', 1),
(3, 'trung nguyên 3', 'trungnguyen3@gmail.com', 'tính năng nên được cải thiện', 'cải thiện các chức năng', '2024-10-13', 1),
(4, 'trung nguyên 4', 'trungnguyen4@gmail.com', 'thêm tính năng sửa', 'cần thêm tính năng sửa', '2024-10-13', 1),
(5, 'trung nguyên 5', 'trungnguyen5@gmail.com', 'thêm tính năng thêm', 'cần thêm tính năng thêm', '2024-10-13', 1),
(6, 'trung nguyên 6', 'trungnguyen4@gmail.com', 'thêm tính năng tìm kiếm', 'cần thêm tính năng tìm kiếm', '2024-10-13', 1),
(7, 'trung nguyên 7', 'trungnguyen4@gmail.com', 'thêm tính năng xóa', 'cần thêm tính năng xóa', '2024-10-13', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_video`
--

CREATE TABLE `news_video` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `link` varchar(1000) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_video`
--

INSERT INTO `news_video` (`id`, `title`, `created_at`, `link`, `image`, `category`, `status`) VALUES
(1, 'Du lịch ẩm thực Châu Phi P9: Những ngày đầu ở Kenya', '2024-10-10', 'https://www.youtube.com/embed/MLBhMV8k6e0', 'https://i.ytimg.com/vi/MLBhMV8k6e0/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCNyRFEDgD4Y-4HhK-fQu8ZZesY-w', 99, 1),
(2, 'Châu Phi p8: HÀNG C.Ấ.M & chợ khổng lồ |Du lịch ẩm thực Madagascar', '2024-10-13', 'https://www.youtube.com/embed/cJD4fc5l3fM', 'https://i.ytimg.com/vi/cJD4fc5l3fM/maxresdefault.jpg', 99, 1),
(6, 'Du lịch Châu Phi - Madagascar P1: Kinh nghiệm nhớ đời', '2024-10-26', 'https://www.youtube.com/embed/0Q8fkicguR8', 'https://i.ytimg.com/vi/0Q8fkicguR8/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLB4yikupwtNFQ_gZC9C-y1HFMw_NQ', 99, 1),
(7, 'Ẩm thực đường phố Châu Phi - Madagascar: Choáng ngợp và hoài niệm |Du lịch ẩm thực Châu Phi P2', '2024-10-26', 'https://www.youtube.com/embed/aoFeasRsiyk', 'https://i.ytimg.com/vi/aoFeasRsiyk/maxresdefault.jpg', 99, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `summary_content` text NOT NULL,
  `author` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `summary_content`, `author`, `created_at`, `updated_at`, `views`, `image`, `category`, `status`) VALUES
(1, 'Ronaldo tỏa sáng giúp Al Nassr thắng tối thiểu trước Esteghlal', 'ronaldo-toa-sang-giup-al-nassr-thang-toi-thieu-truoc-esteghlal', '<p>Rạng sáng 23/10 (theo giờ Việt Nam), Al Nassr của Cristiano Ronaldo đã có chuyến làm khách đặc biệt trước Esteghlal (Iran) tại lượt trận thứ 3 vòng bảng Cúp C1 châu Á 2024-2025. Do tình hình an ninh không ổn định ở Iran, trận đấu được chuyển sang tổ chức tại Dubai (UAE).</p><p>Dù thi đấu trên sân trung lập, Al Nassr với đội hình chất lượng vượt trội, trong đó Cristiano Ronaldo là ngôi sao được kỳ vọng nhất, đã nhanh chóng thể hiện sự áp đảo. Trong suốt hiệp một, chân sút 39 tuổi người Bồ Đào Nha và các đồng đội tạo ra nhiều cơ hội nguy hiểm, nhưng không thể xuyên thủng mành lưới của Esteghlal.</p><p><img src=\"https://nguoiduatin.mediacdn.vn/thumb_w/640/84137818385850368/2024/10/23/ronaldo-1-17296476162241632348214.jpg\" alt=\"Cristiano Ronaldo tiếp tục có trận đấu tốt với Al Nassr. (Ảnh: Al Nassr)\" width=\"1674\" height=\"952\"></p><p><i>Cristiano Ronaldo tiếp tục có trận đấu tốt với Al Nassr. (Ảnh: Al Nassr)</i></p><p>Trước sự bế tắc trong 45 phút đầu tiên, HLV Al Nassr thực hiện hàng loạt sự điều chỉnh nhằm gia tăng sức mạnh tấn công. Tuy nhiên, đại diện Saudi Pro League vẫn gặp khó khăn trong việc tìm đường vào khung thành đội chủ nhà.</p><p>Tưởng chừng Al Nassr sẽ phải chấp nhận một kết quả hòa thì bước ngoặt xảy ra ở phút 81. Cristiano Ronaldo bật cao đánh đầu khiến thủ môn Hosseini phải đẩy bóng ra, tạo điều kiện để Aymeric Laporte có mặt đúng lúc, sút bóng vào lưới trống, mang về chiến thắng 1-0 cho Al Nassr.</p>', 'Cristiano Ronaldo tiếp tục có trận đấu tốt với Al Nassr', 'nguoiduatin.vn', '2024-10-20', '2024-10-30', 6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTLrHxiL4dDyE_4gZI2D9nZffxw6KQnvbxDg&s', 1, 1),
(2, 'Kết quả Cúp C1 châu Á hôm nay 23/10: Ronaldo thăng hoa cùng Al Nassr', 'ket-qua-cup-c1-chau-a-hom-nay-2310-ronaldo-thang-hoa-cung-al-nassr', '<p><strong>VOV.VN - Kết quả Cúp C1 châu Á hôm nay 23/10: Ronaldo thăng hoa với tình huống góp công vào bàn thắng giúp Al Nassr đánh bại Esteghlal của Iran với tỷ số 1-0.</strong></p><p>&nbsp;</p><p>Ở lượt trận thứ 3 vòng bảng Cúp C1 châu Á 2024/2025, Al Nassr của Ronaldo phải đến làm khách của CLB Esteghlal (Iran). Do tình hình an ninh ở Iran không ổn định, nên trận đấu được tổ chức ở Dubai (UAE).&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1200/675;\" src=\"https://media.vov.vn/sites/default/files/styles/large/public/2024-10/ro1.jpg\" alt=\"ket qua cup c1 chau A hom nay 23 10 ronaldo thang hoa cung al nassr hinh anh 1\" width=\"1200\" height=\"675\"></figure><p>Với dàn cầu thủ có chất lượng tốt hơn, Al Nassr liên tiếp tạo ra những cơ hội ăn bàn rõ rệt nhưng không thể chuyển hóa thành bàn thắng trước sự lăn xả phòng ngự đến từ Esteghlal.&nbsp;</p><p>Bước sang hiệp 2, ban huấn luyện Al Nassr thực hiện hàng loạt sự điều chỉnh về nhân sự nhằm tăng cường sức mạnh cho hàng công, dù vậy đại diện Saudi Pro League vẫn gặp khó khăn trong việc tìm đường vào khung thành Esteghlal.&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:906/258;\" src=\"https://media.vov.vn/sites/default/files/styles/large/public/2024-10/anh.png.jpg\" alt=\"ket qua cup c1 chau A hom nay 23 10 ronaldo thang hoa cung al nassr hinh anh 2\" width=\"906\" height=\"258\"></figure><p>Tưởng như Ronaldo và các đồng đội sẽ chấp nhận kết quả hòa thì CR7 đã lên tiếng. Phút 81, Ronaldo bật cao đánh đầu khiến thủ môn Hosseini đẩy bóng ra, Laporte có mặt kịp thời để đưa bóng vào lưới trống giúp Al Nassr giành chiến thắng tối thiểu, qua đó duy trì thành tích bất bại (2 thắng, 1 hòa) &nbsp;ở Cúp C1 châu Á năm nay.&nbsp;</p><p>Ở các trận đấu đáng chú ý khác, Johor Darul Ta\'zim (Malaysia) thua Gwangju (Hàn Quốc) 1-3 trong khi Buriram United (Thái Lan) bất ngờ thắng Pohang Steelers (Hàn Quốc) 1-0.</p>', 'Ronaldo bật cao đánh đầu khiến thủ môn Hosseini đẩy bóng ra, Laporte có mặt kịp thời để đưa bóng vào lưới trống giúp Al Nassr giành chiến thắng tối thiểu', 'đông', '2024-10-21', '2024-10-30', 7, 'https://file3.qdnd.vn/data/images/0/2024/10/19/upload_2312/ronaldo%201.jpg?dpi=150&quality=100&w=870', 1, 1),
(3, 'Học gì để không thua kém ChatGPT', 'hoc-gi-de-khong-thua-kem-chatgpt', '<p>Trong thập niên 1950, nhà vật lý lỗi lạc người Mỹ Richard Feynman được Đại học Caltech và Chính phủ Mỹ tài trợ sang Brazil dạy học.</p><p>Sau một thời gian, ông quan sát thấy một hiện tượng lạ trong nền giáo dục Brazil: sinh viên có thể trả lời các câu hỏi lý thuyết trong sách rất nhanh, nhưng nếu giữ nguyên bản chất câu hỏi và thay đổi một số ngôn từ và ngữ cảnh thì họ... hoàn toàn bối rối.</p><p>Một lần, Feynman hỏi \"làm sao đo được mức độ phân cực của ánh sáng khi chiếu vào một dung môi khúc xạ\", các sinh viên hàng đầu trong lớp có thể nhanh chóng tính toán chính xác góc phân cực của ánh sáng.</p><p>Tuy nhiên trong một lần khác, khi ông hỏi \"đứng ở góc độ nào để quan sát được góc nắng phản chiếu trên mặt nước biển?\" thì không ai trả lời được. Feynman nhận ra sinh viên học thuộc lòng công thức nhưng không hiểu khái niệm \"dung môi khúc xạ\" hàm chỉ những môi trường như nước, hay cụm từ \"phân cực ánh sáng\" tương ứng với góc phản chiếu của ánh sáng mà mắt thường quan sát được.</p><p>Ngoài việc không hiểu và không thể áp dụng công thức được dạy, Feynman nhận thấy không sinh viên nào đặt câu hỏi trong lúc ông giảng bài. Sau này một học trò chia sẻ với Feynman rằng \"việc đặt câu hỏi chỉ khiến các bạn khác trong lớp coi thường bởi nó cho thấy tôi chưa hiểu vấn đề và đang làm phí thời gian của cả lớp\".</p><p>\"Hoàn toàn không có một nền giáo dục khoa học được giảng dạy ở Brazil. Học sinh được đào tạo để nhớ từng công thức trong sách giáo khoa cho các kì thi, nhưng các em không được dạy để tự khám phá, thử sai để hiểu bản chất các hiện tượng khoa học\", Richard Feynman nhận xét khi phát biểu với Hội đồng Giáo dục Brazil.</p><p>Quay lại với hiện tại 2024. Apple vừa công bố một kết quả nghiên cứu cho thấy các hệ thống AI tạo sinh như ChatGPT không có khả năng suy luận và phân tích logic để giải quyết vấn đề. Như vậy các kết quả trả lời nghe qua rất thông minh và thuyết phục của ChatGPT chỉ là \"học vẹt và bắt chước\" lượng dữ liệu khổng lồ từ vô số sách vở, báo chí và Internet mà hệ thống máy học đã được huấn luyện qua.</p><p>Ta dễ thấy sự tương đồng giữa nghiên cứu này về hạn chế của ChatGPT với phát hiện của Richard Feynman về nền giáo dục ở Brazil: người và máy đều rơi vào tình trạng \"có khả năng nhớ rõ và lặp lại từng con chữ, từng công thức nhưng không hiểu các con chữ và công thức đó thật sự có ý nghĩa gì\".</p><p>So với con người, các hệ thống AI tạo sinh rất dễ đưa ra câu trả lời lỗi (thay vì thú nhận nó không biết lời giải) nếu người sử dụng chỉ chuyển đổi câu hỏi một chút để làm rối cách hệ thống phân tích bài toán. Ví dụ, tôi chuyển đổi bài toán tiểu học \"chó và gà\" thành như sau:</p><p>\"Vừa gà vừa chó, bó lại cho tròn, 36 con, một trăm chân chẵn. <i>Chủ trang trại trước đây có mua thêm hai chú chó và ba chú gà. </i>Hỏi có bao nhiêu gà, bao nhiêu chó?\".</p><p>ChatGPT (phiên bản 4o mini) trả lời ngay là 16 con chó và 25 con gà. Chứng tỏ trong quá trình \"tư duy\" trả lời câu hỏi, hệ thống máy hoàn toàn không biết cách đặt ngược lại các câu hỏi làm rõ đề bài. Trong khi đó, học sinh có thể sẽ nêu ý kiến \"ngôn ngữ đề bài chưa được rõ ràng về mặt thời điểm của việc tính số lượng chó và gà\" khi đối mặt với bài toán này.</p><p>Các hệ thống AI tạo sinh như ChatGPT được tạo ra bằng cách nạp cho máy tính một lượng dữ liệu khổng lồ trong quá trình huấn luyện. Sau đó máy sẽ kết hợp giữa việc tra cứu và tích hợp các kiến thức đã hấp thụ trong quá trình huấn luyện để đưa ra câu trả lời trong quá trình sử dụng.</p><p>Với các ông lớn công nghệ đổ hàng tỷ USD vào việc thu thập dữ liệu và kiến thức nhân loại để huấn luyện cho máy, các hệ thống này đã có thể nhớ nhiều và nhớ nhanh hơn con người.</p><p>Tuy nhiên với kiến trúc hiện tại, đa phần hệ thống AI này vẫn rất kém trong việc tự kiểm tra tính hợp lý của câu trả lời, nhất là trong những tình huống kiến thức hay dữ liệu mới mà AI chưa có. Việc tạo ra hệ thống AI có thể tự phản biện để đánh giá được khi nào máy đưa ra câu trả lời sai trong mọi tình huống vẫn là bài toán mở lớn của ngành trí tuệ nhân tạo.</p><p>Như vậy, con người đã thua trong cuộc chiến \"học nhớ\" so với máy tính nhưng trong cuộc chiến \"học hiểu\" chúng ta vẫn còn nhiều cơ hội chiến thắng.</p><p>Trong sự học hiểu, vấn đề không chỉ là \"học gì\" mà còn là \"thái độ học như thế nào\". Với lao động tri thức, lợi thế cạnh tranh của chúng ta so với ChatGPT là khả năng hiểu sâu, khả năng phân tích logic, tự phê bình, đánh giá được khi nào mình chưa hiểu, hay còn hiểu sai để thúc đẩy bản thân tìm tòi thêm.</p><p>Quay lại câu hỏi \"học gì\", tôi nghĩ cần chọn những ngành học đề cao việc hiểu sâu bản chất vấn đề, phân tích và sáng tạo ra lời giải. Trong câu chuyện Richard Feynman phê bình giáo dục Brazil, cũng cần lưu ý thái độ \"học vẹt\" có phần trách nhiệm của môi trường và hệ thống giáo dục.</p><p>Richard Feynman từng nói \"Nguyên lý đầu tiên của tư duy là đừng tự huyễn hoặc bản thân, bởi chính chúng ta là kẻ dễ bị chúng ta lừa dối nhất\". Tự đánh giá nghiêm túc khi nào bản thân hiểu sai, hiểu thiếu, sẵn sàng đầu tư học hỏi sâu hơn để hiểu rõ và giải quyết vấn đề triệt để vẫn là khả năng của chỉ riêng loài người.</p><p>Duy trì một thái độ trung thực và cầu thị về tri thức sẽ đóng vai trò quyết định để con người không bị tụt hậu so với ChatGPT.</p>', 'Quay lại câu hỏi \"học gì\", tôi nghĩ cần chọn những ngành học đề cao việc hiểu sâu bản chất vấn đề, phân tích và sáng tạo ra lời giải', 'Ned Nguyễn', '2024-10-21', '2024-10-30', 24, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9SoNHQ_cEWjSs6aNMh3TNvHmpW4dgDgGI8Q&s', 82, 1),
(12, 'Intel Core Ultra 200S ra mắt: Cân bằng sức mạnh, giảm gánh nặng tiền điện cho ví của bạn', 'intel-core-ultra-200s-ra-mat-can-bang-suc-manh-giam-ganh-nang-tien-dien-cho-vi-cua-ban', '<p>Intel đã chính thức ra mắt dòng vi xử lý cho máy bàn Core Ultra 200S mới, tập trung vào hiệu suất trên mỗi watt để chạy mát hơn và hiệu quả hơn so với các chip thế hệ thứ 14 trước. Có tên mã Arrow Lake S, đây cũng là CPU máy bàn đầu tiên của Intel có NPU tích hợp để tăng tốc các tác vụ AI.</p><p>Intel phát triển cốt lõi của kiến trúc Arrow Lake xoay quanh nỗ lực nhằm giảm lượng điện năng tiêu thụ. Cả thế hệ CPU Intel Core Gen 13 và 14 đều ngốn điện, thường tiêu thụ nhiều năng lượng hơn đáng kể so với các chip AMD tương đương. Các chip Core Ultra 200S series mới này sẽ giảm một nửa mức tiêu thụ điện năng khi người dùng thực hiện các tác vụ cơ bản trên máy bàn và Intel tuyên bố rằng chúng cũng sẽ giảm rất nhiều công suất tiêu thụ trong khi chơi game.</p><p><img src=\"https://genk.mediacdn.vn/139269124445442048/2024/10/11/photo-1728617791632-17286177938571296385644-1728618776882-1728618777053842736321.jpeg\" alt=\"Intel Core Ultra 200S ra mắt: Cân bằng sức mạnh, giảm gánh nặng tiền điện cho ví của bạn- Ảnh 1.\" width=\"1902\" height=\"1060\"></p><p>Toàn bộ dòng Core Ultra 200S</p><p><i>\"Bạn sẽ thấy mức tiêu thụ điện năng chỉ bằng một nửa\" </i>, Robert Hallock, phó chủ tịch nhóm máy tính khách hàng tại Intel cho biết. \" <i>Người dùng cũng sẽ thấy mức tiêu thụ điện năng chỉ bằng một nửa khi sử dụng một lõi. Chơi game sẽ tăng hoặc giảm, từ 50 đến 150 watt tùy thuộc vào tựa game\".</i></p><p>Intel đã trình diễn Assassin’s Creed Mirage chạy trên Core Ultra 9 285K hàng đầu so với Core i9-14900K hiện tại. Ultra 9 285K cung cấp hiệu suất tương tự hoặc tốt hơn ở mức công suất ít hơn 80 watt trong Mirage. Intel tuyên bố bộ xử lý sẽ giảm điện năng tới 58 watt trong các game như Call of Duty: Modern Warfare III, F1 24 và Total War: Pharaoh. Có một số trường hợp đặc biệt đáng chú ý như Warhammer: Space Marines 2, trong đó Ultra 9 285K thậm chí chạy ở mức ít hơn 165 watt so với 14900K.</p><p><img src=\"https://genk.mediacdn.vn/139269124445442048/2024/10/11/photo-1728617794758-1728617794905236220009-1728618781194-17286187814271902087213.jpeg\" alt=\"Intel Core Ultra 200S ra mắt: Cân bằng sức mạnh, giảm gánh nặng tiền điện cho ví của bạn- Ảnh 2.\" width=\"1906\" height=\"1068\"></p><p>Intel so sánh mức độ sử dụng điện giữa Core Ultra 9 285K và i9-14900K</p><p>Theo Intel, nhiệt độ của Core Ultra 9 285K sẽ giảm khoảng 13 độ C so với 14900K trong khi chơi game ở độ phân giải 1080p với bộ tản nhiệt all-in-one 360mm.</p><p>Intel sử dụng công nghệ đóng gói 3D mới nhất của mình để xây dựng chip dòng Core Ultra 200S và kích thước đóng gói đã giảm 33% so với thế hệ 14.</p><p>Do thay đổi này, phiên bản cao cấp nhất Ultra 9 285K sẽ được xuất xưởng với 24 lõi, 24 luồng và boost clock là 5.7 GHz. Nghĩa là xung nhịp chậm hơn và ít hơn tám luồng so với 14900K trước đó, vì Intel đã loại bỏ siêu phân luồng (hyperthreading) để có khả năng quản lý năng lượng tốt hơn.</p><p>Ultra 9 285K sẽ có 8 lõi hiệu suất cao (P-core) và 16 lõi tiết kiệm năng lượng (E-core). Các E-core đã được nâng cấp hiệu quả hơn để xử lý các lệnh và thậm chí còn giảm độ trễ. Bộ xử lý có 36MB bộ nhớ đệm thông minh chia sẻ L3, 3MB L2 cho mỗi P-core (tăng từ 2MB trên Gen 14) và 4MB L2 cho mỗi E-core. Intel tuyên bố rằng Ultra 9 285K sẽ nhanh hơn khoảng 8% trong các tác vụ đơn luồng so với 14900K và nhanh hơn khoảng 15% trong các công việc đa luồng.</p><p>Intel cũng đã cung cấp một số điểm benchmark cho game của Ultra 9 285K so với AMD Ryzen 9 9950X và Ryzen 9 7950X3D.</p><p><img src=\"https://genk.mediacdn.vn/139269124445442048/2024/10/11/photo-1728617798103-172861780025936358624-1728618782194-1728618782317811936624.jpeg\" alt=\"Intel Core Ultra 200S ra mắt: Cân bằng sức mạnh, giảm gánh nặng tiền điện cho ví của bạn- Ảnh 3.\" width=\"1918\" height=\"1078\"></p><p>Core Ultra 9 285K sẽ cạnh tranh với Ryzen 9 9950X trong lĩnh vực game</p><p>Có vẻ như sản phẩm chủ lực mới của Intel sẽ đối đầu với CPU Zen 5 hàng đầu của AMD, nhưng về phía X3D, dữ liệu của Intel cho thấy rõ rằng sẽ không bằng. Dù sao thì Intel cũng đã minh bạch một cách đáng ngạc nhiên về việc đứng sau CPU chơi game tốt nhất hiện nay, Ryzen 7 7800X3D của AMD. Tuy nhiên Intel lại giành phần thắng trong các công cụ benchmark.</p><p>Hallock cho biết: <i>\"Tôi nghĩ sẽ thua khoảng 5% so với X3D. Bạn sẽ thấy mức thâm hụt khoảng năm phần trăm và tôi muốn nói rõ về điều đó\".</i></p><p><img src=\"https://genk.mediacdn.vn/139269124445442048/2024/10/11/photo-1728617801103-1728617801241551982560-1728618783195-17286187833971026972663.jpeg\" alt=\"Intel Core Ultra 200S ra mắt: Cân bằng sức mạnh, giảm gánh nặng tiền điện cho ví của bạn- Ảnh 4.\" width=\"1914\" height=\"1070\"></p><p>Intel minh bạch trong việc Core Ultra 9 285K sẽ thua kém chip X3D của AMD về hiệu suất chơi game</p><p>Điều này có thể gây thất vọng trong khía cạnh chơi game, nhưng Intel tuyên bố rằng họ vẫn sẽ giữ ngôi vương về hiệu suất đối với hầu hết các tác vụ sáng tạo và AI.</p><p>Intel thậm chí còn bổ sung thêm một NPU vào Ultra 9 285K, có thể tăng tốc một số tác vụ AI nhất định, nhưng sẽ không đủ điều kiện cho các tính năng Copilot Plus của Microsoft yêu cầu NPU 40 TOPS hoặc cao hơn. Intel hy vọng rằng khi việc áp dụng NPU tăng lên, các nhà phát triển sẽ có thể tận dụng điều này để giảm tải các tác vụ và thậm chí là một số tính năng liên quan đến chơi game.</p><p><i>\"Hoàn toàn có thể đưa NPU 40 TOPS vào sản phẩm này, nhưng để làm như vậy sẽ cần phải thu nhỏ số lượng lõi hoặc thay đổi số lượng lõi GPU\" </i>, Hallock thừa nhận. \" <i>Chúng tôi cũng đã thảo luận rất nhiều về nhu cầu của thị trường cao cấp đối với AI nói chung và tôi nghĩ công bằng mà nói thì chúng có phần miễn cưỡng\".</i></p><p>Core Ultra 200S sử dụng socket LGA-1851 mới, cũng có nghĩa là bo mạch chủ mới. Người dùng sẽ cần một bo mạch Z890 mới để sử dụng CPU Core Ultra 200S.</p><p><img src=\"https://genk.mediacdn.vn/139269124445442048/2024/10/11/photo-1728617804105-1728617804264742775776-1728618784195-17286187843401568201803.jpeg\" alt=\"Intel Core Ultra 200S ra mắt: Cân bằng sức mạnh, giảm gánh nặng tiền điện cho ví của bạn- Ảnh 5.\" width=\"1686\" height=\"950\"></p><p>Intel Core Ultra 200S hướng đến sự cân bằng giữa sức mạnh và điện năng</p><p>Intel cũng đang cải thiện khả năng hỗ trợ bộ nhớ với dòng Core Ultra 200S và bo mạch chủ Z890, hỗ trợ tối đa DDR5-6400, tối đa 48GB mỗi DIMM và dung lượng tối đa lên đến 192GB. Hỗ trợ DDR4 đã bị loại bỏ đối với chipset 800 Series. Các chip này cũng tuân thủ Secure Core và bao gồm ba công cụ phần cứng tích hợp để bảo mật.</p><p>Việc ra mắt Arrow Lake diễn ra chỉ vài ngày sau khi Intel cho biết cơn ác mộng về sự cố sập nguồn của Raptor Lake cuối cùng đã kết thúc. Các vấn đề về mất ổn định với chip thế hệ thứ 13 và 14 hiện đã được giải quyết, với nguyên nhân gốc rễ là sự cố điện áp quá cao. Các chip Arrow Lake mới của Intel sẽ không bị ảnh hưởng bởi các vấn đề về điện áp của Raptor Lake.</p><p>Các chip Core Ultra 200S mới của Intel sẽ bắt đầu được bán ra vào ngày 24 tháng 10, với chip Core Ultra 9 285K hàng đầu có giá 589 USD, Core Ultra 7 265K có giá 394 USD và Core Ultra 5 245K có giá 309 USD. Intel cũng đang tung ra các biến thể KF: Ultra 7 265KF (379 USD) và Ultra 5 245KF (294 USD) không có GPU Xe tích hợp.</p><p>Chúng tôi cũng sẽ sớm trên tay và đánh giá sản phẩm Core Ultra 200S trong thời gian tới, mời quý độc giả đón chờ.</p>', 'Intel đã chính thức ra mắt dòng vi xử lý cho máy bàn Core Ultra 200S  mới', 'Tuấn Lê', '2024-10-23', '2024-10-30', 46, 'https://genk.mediacdn.vn/zoom/700_430/139269124445442048/2024/10/11/avatar1728618775551-17286187761841262516241.jpg', 97, 1),
(13, 'Truyện ngắn tiếng Anh \'Sâu hóa bướm', 'truyen-ngan-tieng-anh-sau-hoa-buom', '<p>Câu chuyện mang đến bài học: sự giúp đỡ nếu không đúng lúc có thể gây ra những hậu quả đáng tiếc.</p><p><img src=\"https://i1-vnexpress.vnecdn.net/2016/04/27/26-b1-a1-1717-1461719967.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=timpqQhdVRHRO7SbZkhkhA\" alt=\"truyen-ngan-tieng-anh-sau-hoa-buom\" width=\"499\" height=\"371\"></p><p>Ngày nọ, có&nbsp;cậu bé nhìn thấy một khe hở từ một cái kén, cậu ngồi hàng giờ và nhìn con bướm vật lộn để có thể thoát khỏi cái kén từ&nbsp;chỗ hở&nbsp;nhỏ như thế.</p><p><img src=\"https://i1-vnexpress.vnecdn.net/2016/04/27/26-b1-a2-4143-1461719968.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=67C5cNBfT8jKJfLO2aB2XA\" alt=\"truyen-ngan-tieng-anh-sau-hoa-buom-1\" width=\"499\" height=\"363\"></p><p>Sau đó, có vẻ như nó dừng lại. Tưởng như con bướm chỉ có thể đi đến đó và không thể làm thêm được gì nữa.</p><p><img src=\"https://i1-vnexpress.vnecdn.net/2016/04/27/26-b1-a3-2049-1461719968.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=3hDXIV_spdsID3s0gEOgtw\" alt=\"truyen-ngan-tieng-anh-sau-hoa-buom-2\" width=\"499\" height=\"366\"></p><p>Vì vậy, cậu bé quyết định giúp đỡ con bướm bằng việc dùng kéo để cắt mở&nbsp;cái kén ra. Con bướm dễ dàng thoát ra ngoài. Nhưng cơ thể nó yếu ớt&nbsp;và đôi cánh dúm dó.</p><p><img src=\"https://i1-vnexpress.vnecdn.net/2016/04/27/26-b1-a4-1136-1461719969.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=T3X23QPYj7Yg8uGu6RR1yA\" alt=\"truyen-ngan-tieng-anh-sau-hoa-buom-3\" width=\"500\" height=\"369\"></p><p>Cậu bé tiếp tục ngồi đợi, hy vọng rằng một lúc nữa, hai cái cánh của nó&nbsp;sẽ mở ra, dang rộng để có thể nâng đỡ cơ thể chú bướm&nbsp;và trở nên vững chãi.</p><p><img src=\"https://i1-vnexpress.vnecdn.net/2016/04/27/26-b1-a5-4840-1461719969.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=6bI8PyTU9_Quou8i7i25Cg\" alt=\"truyen-ngan-tieng-anh-sau-hoa-buom-4\" width=\"500\" height=\"372\"></p><p>Điều đó đã không xảy ra. Và trong suốt phần đời còn lại,&nbsp;con bướm chỉ có thể bò với một cơ thể yếu ớt và đôi cánh dúm dó. Nó không bao giờ có thể bay.</p><p><img src=\"https://i1-vnexpress.vnecdn.net/2016/04/27/26-b1-a6-6639-1461719969.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=PdPhqq61bmZ76iD2o5bd_g\" alt=\"truyen-ngan-tieng-anh-sau-hoa-buom-5\" width=\"500\" height=\"361\"></p><p>Có lòng tốt và thiện chí nhưng cậu bé đã không hiểu rằng chiếc kén bao kín, sự vật lộn của con bướm để có thể chui qua được lỗ hở nhỏ kia là một hiện tượng tự nhiên giúp dung dịch ở trong thân của con bướm chảy sang phần cánh, giúp nó sẵn sàng bay lên khi nó&nbsp;thoát ra khỏi cái kén.</p><p>&nbsp;</p><p><img src=\"https://i1-vnexpress.vnecdn.net/2016/04/27/26-b1-a7-4935-1461719970.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=z6l7VYAiDTrciF6luXn1yg\" alt=\"truyen-ngan-tieng-anh-sau-hoa-buom-6\" width=\"499\" height=\"372\"></p><p>Thỉnh thoảng, đấu tranh là điều chúng ta cần làm trong cuộc đời. Nếu cuộc sống cho phép bạn vượt qua mọi thứ mà không có trở ngại nào, nó đang làm chính bạn bị què quặt đi. Chúng ta không thể trở nên mạnh mẽ như mình có thể. Không bao giờ có thể bay lên.</p>', 'Thỉnh thoảng, đấu tranh là điều chúng ta cần làm trong cuộc đời. Nếu cuộc sống cho phép bạn vượt qua mọi thứ mà không có trở ngại nào, nó đang làm chính bạn bị què quặt đi.', 'Sưu tầm', '2024-10-23', '2024-10-27', 3, 'https://i1-vnexpress.vnecdn.net/2016/04/27/26b3a1-1461719747.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=4_p_WG4FudJxrv2Ucx6c3g', 2, 1),
(20, 'Vinfast vf7 - Đam mê tạo phi thường', 'vinfast-vf7-dam-me-tao-phi-thuong', '<p><strong>VF 7 là một bước tiến đột phá trong thiết kế</strong><br><strong>xe ô tô của VinFast.</strong></p><p><strong>Ngoại thất kế thừa và đổi mới</strong><br><strong>từ hơn trăm năm lịch sử của ngành ô tô.</strong></p><p><strong>Triết lý thiết kế “Vũ trụ phi đối xứng”.</strong></p><p>Lấy cảm hứng từ vũ trụ và các vật thể bay trong không gian, VF 7 hiện thân cho sự tự do, công nghệ, thời đại, cá tính, mạnh mẽ và thể thao, thoả mãn mọi tâm hồn đam mê thẩm mỹ và tốc độ.</p><p>Những đường nét và hình khối được sử dụng nhịp nhàng và tinh tế, mang đến cho chủ nhân VF 7 không gian trải nghiệm đầy phóng khoáng và tràn đầy năng lượng; song vẫn không làm mất đi sự tối giản, tinh khiết và thời trang vốn có của mẫu xe đánh thức mọi đam mê.</p><p><br><img src=\"https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dw3dd225a2/reserves/VF7/vf7-img-tech.webp\" alt=\"VF 7 exterior\" width=\"2432\" height=\"1368\"></p><p>&nbsp;</p><p><span style=\"background-color:rgb(31,33,37);color:rgb(255,255,255);\">Thiết kế phần đầu xe thon gọn, dựa trên hình ảnh của chiếc phi thuyền không gian, với điểm nhấn là cụm đèn định vị cánh chim - chữ V đặc trưng kéo dài liên tưởng tới những pha bứt tốc mạnh mẽ vượt thời không và sự chuyển hướng linh hoạt trên không trung.</span></p><p>&nbsp;</p>', 'Lấy cảm hứng từ vũ trụ và các vật thể bay trong không gian, VF 7 hiện thân cho sự tự do, công nghệ, thời đại, cá tính, mạnh mẽ và thể thao, thoả mãn mọi tâm hồn đam mê thẩm mỹ và tốc độ.', 'Vinfast', '2024-10-27', '2024-10-30', 6, 'https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dw6dc913e3/reserves/VF7/vf7-uu-diem-4.webp', 100, 1),
(21, 'Vinfast vf8 lux - Thăng Hạng Đẳng Cấp', 'vinfast-vf8-lux-thang-hang-dang-cap', '<p>Thiết kế cá nhân hoá</p><p>Dòng sản phẩm VF 8S LUX và VF 8 LUX Plus đem đến 10 lựa chọn màu ngoại thất phối hai màu độc quyền, phù hợp cho những chủ nhân yêu thích phong cách và sự sang trọng.</p><figure class=\"image\"><img style=\"aspect-ratio:2580/1070;\" src=\"https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dwff895a55/reserves/VF8/sp/2418.webp\" alt=\"VinFast VF 8\" width=\"2580\" height=\"1070\"></figure><p><span style=\"background-color:rgb(255,255,255);color:rgb(60,60,60);\">VF 8S LUX và VF 8 LUX Plus dành cho những người hiểu rõ giá trị sang trọng và đẳng cấp, mong muốn tận hưởng trọn vẹn những trải nghiệm cho bản thân và gia đình.</span></p><p>Công nghệ tiên phong</p><p>VF 8S LUX và VF 8 LUX Plus là sự lựa chọn lý tưởng cho những người đam mê công nghệ, với trợ lý ảo tích hợp công nghệ AI tạo sinh, mang đến trải nghiệm tương tác và điều khiển xe thân thiện, gần gũi và thực sự hữu dụng.</p>', 'VF 8S LUX và VF 8 LUX Plus dành cho những người hiểu rõ giá trị sang trọng và đẳng cấp, mong muốn tận hưởng trọn vẹn những trải nghiệm cho bản thân và gia đình.', 'Vinfast', '2024-10-27', '2024-10-29', 0, 'https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dw51fcff21/reserves/VF8/banner.webp', 100, 1),
(22, 'Vinfast vf9 - Lựa Chọn Tận Hưởng Đẳng Cấp', 'vinfast-vf9-lua-chon-tan-huong-dang-cap', '<p>Mạnh mẽ, bề thế<br><strong>Nâng tầm thời thượng</strong></p><p>Thiết kế được lấy cảm hứng từ những chiếc du thuyền hạng sang, hoà hợp với những đường nét mạnh mẽ và phóng khoáng, đem lại vẻ ngoài độc đáo và sang trọng, xứng tầm với chủ nhân tinh hoa.</p><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:2132/934;\" src=\"https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dw5460e0c6/images/PDP/vf9/202406/interior/interior-first-sight.webp\" width=\"2132\" height=\"934\"></figure><p>Bản giao hưởng<br>của <strong>thẩm mỹ</strong> và<br><strong>trải nghiệm tiện nghi</strong></p><p>Ngôn ngữ thiết kế tối giản mang hơi hướng tương lai phối hợp cùng loạt vật liệu cao cấp, thân thiện với môi trường, VF 9 đem lại trải nghiệm nội thất khoáng đạt, thư thái trên mọi hành trình.</p><p>Công nghệ<br><strong>Cho cuộc sống</strong></p><p>Hợp tác cùng những đối tác hàng đầu trên toàn cầu, VinFast áp dụng những công nghệ hiện đại với thiết kế tập trung vào con người, đem lại trải nghiệm.<br>Trợ lý ảo cùng loạt Dịch vụ thông minh tiên tiến, đồng hành cùng bạn hướng tới tương lai tốt đẹp hơn.</p>', 'Thiết kế được lấy cảm hứng từ những chiếc du thuyền hạng sang, hoà hợp với những đường nét mạnh mẽ và phóng khoáng, đem lại vẻ ngoài độc đáo và sang trọng, xứng tầm với chủ nhân tinh hoa.', 'Vinfast', '2024-10-27', '2024-11-03', 2, 'https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dw357c1d3e/images/PDP/vf9/202406/hero.webp', 100, 1),
(23, 'Vinfast VF3 - Sáng Tạo Chất Riêng', 'vinfast-vf3-sang-tao-chat-rieng', '<p><strong>VinFast VF 3 - Xe nhỏ, giá trị lớn.</strong></p><p>Với thiết kế tối giản, nhỏ gọn, cá tính và năng động, VinFast VF 3 sẽ luôn cùng bạn hoà nhịp với xu thế công nghệ di chuyển xanh toàn cầu, trải nghiệm giá trị trên mỗi hành trình, và tự do thể hiện phong cách sống.</p><p><strong>VinFast VF 3 - Tự do sáng tạo, toả sáng chất riêng!</strong></p><p>Với dải màu ngoại thất đa dạng và độc đáo, bao gồm 9 tùy chọn màu sắc trẻ trung và thời thượng, VF 3 là sự lựa chọn hoàn hảo giúp bạn thoả sức thể hiện sự khác biệt và cá tính của riêng mình. Dù bạn là ai, hãy lựa chọn màu sắc và trang bị VF 3 theo sở thích của bạn, và cùng VinFast biến ước mơ của bạn thành hiện thực.</p><p>&nbsp;</p><p><strong>La-zăng vượt trội về kích thước &amp; phong cách.</strong></p><p>VF 3 là mẫu xe hiếm hoi trong phân khúc xe sở hữu la-zăng kích thước 16 inch, không chỉ tạo điểm nhấn về thiết kế mà còn góp phần gia tăng khả năng di chuyển trên địa hình đa dạng trong đô thị. Đặc biệt, VF 3 được trang bị tuỳ chọn ốp la-zăng, tăng thêm vẻ cá tính, sự sang trọng cho chiếc xe.</p><figure class=\"image\"><img style=\"aspect-ratio:1824/775;\" src=\"https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dw08f52c31/reserves/VF3/vf3-1.png\" width=\"1824\" height=\"775\"></figure><p><strong>VinFast VF 3 - Biểu tượng mới của cuộc sống đô thị.</strong></p><p>Vượt lên trên một phương tiện di chuyển thông thường, VinFast VF 3 là biểu tượng mới mang tính cách mạng trong cuộc sống đô thị. Với thiết kế hiện đại, hiệu suất vận hành linh hoạt, tính năng an toàn tiên tiến, cùng chi phí vận hành siêu rẻ, VF 3 sẽ mở ra một cách tiếp cận hoàn toàn mới trong việc lựa chọn phương tiện di chuyển hàng ngày, mang lại sự thuận tiện, dễ dàng và đặc biệt thoải mái cho tất cả mọi người.</p>', 'Với thiết kế hiện đại, hiệu suất vận hành linh hoạt, tính năng an toàn tiên tiến, cùng chi phí vận hành siêu rẻ, VF 3 sẽ mở ra một cách tiếp cận hoàn toàn mới trong việc lựa chọn phương tiện di chuyển hàng ngày, mang lại sự thuận tiện, dễ dàng và đặc biệt thoải mái cho tất cả mọi người.', 'Vinfast', '2024-10-27', NULL, 0, 'https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dwd4dadefc/reserves/VF3/vf3.jpg', 100, 1),
(24, 'Vf5', 'vf5', '<p>Vận hành êm ái</p><p>Công suất tối đa 134 mã lực, tương đương xe xăng 1,6L 4 xi lanh<br>Mạnh mẽ, linh hoạt. Sẵn sàng cho mọi hành trình.</p><p>Dòng xe</p><p><strong>A-SUV</strong></p><p>Quãng đường di chuyển (chuẩn NEDC)*</p><p><strong>326,4 km/lần sạc</strong></p><p>Công suất tối đa</p><p><strong>134 hp</strong></p><p>Mô men xoắn cực đại</p><p><strong>135 Nm</strong></p>', 'Không gian rộng rãi, phối màu sành điệu, cuốn hút với các đường viền bắt mắt.', 'vinfast', '2024-10-27', '2024-10-27', 1, 'https://shop.vinfastauto.com/on/demandware.static/-/Sites-app_vinfast_vn-Library/default/dwe17891fe/reserves/VF5/vf5-color-2.webp', 100, 1),
(25, 'Porsche Panamera', 'porsche-panamera', '<p><strong>Stuttgart. </strong>Một mẫu xe thể thao đích thực, một chiếc saloon có một không hai, một mẫu xe hybrid tiên phong – tính linh hoạt và sự tổng hoà của những điều tương phản đã tạo nên sự thành công của dòng xe Porsche Panamera ngay từ khi mới ra mắt. Các tính năng đặc trưng của thế hệ thứ hai đã có mặt trên thị trường từ năm 2016, giờ đây sẽ được hoàn thiện và phát triển mạnh mẽ hơn.</p><p>Phiên bản Panamera mới sẽ được giới thiệu trên toàn thế giới vào <strong>8:00 tối (giờ Việt Nam) ngày 26 tháng 8 năm 2020 </strong>dưới hình thức phát sóng trực tuyến trên Porsche NewsTV – cùng với sự góp mặt của CEO Oliver Blume và tay đua Timo Bernhard. Buổi ra mắt được thực hiện bằng tiếng Anh, tiếng Đức và tiếng Trung Quốc tại:&nbsp;<strong>newstv.porsche.com</strong></p><p><strong>Về công ty TNHH Xe Hơi Tối Thượng</strong></p><p>Công ty TNHH Xe Hơi Tối Thượng là nhà nhập khẩu chính thức của Porsche tại Việt Nam, có nền tảng vững chắc và giàu kinh nghiệm trong lĩnh vực ô tô cao cấp.</p><p><strong>Về công ty TNHH Xe Hơi Thể Thao Uy Tín</strong><br>Công ty TNHH Xe Hơi Thể Thao Uy Tín là nhà phân phối chính thức của Porsche tại Việt Nam và được thành lập từ năm 2007, cung cấp cho khách hàng dịch vụ kinh doanh và các dịch vụ cao cấp. Công ty mang đến thị trường Việt Nam toàn bộ các mẫu xe của Porsche, từ dòng xe huyền thoại 911, bộ đôi xe thể thao động cơ đặt giữa 718 Boxster và 718 Cayman, dòng xe Gran Turismo Panamera, dòng xe SUV Cayenne và dòng xe SUV Macan cỡ trung, cho đến mẫu xe thuần điện đầu tiên Porsche Taycan. Porsche tại Việt Nam hiện phát triển mạnh mẽ&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1920/739;\" src=\"https://porsche-vietnam.vn/wp-content/uploads/2024/05/PA24P5AOX0001_low-banner.jpg\" width=\"1920\" height=\"739\"></figure>', 'Một mẫu xe thể thao đích thực, một chiếc saloon có một không hai, một mẫu xe hybrid tiên phong – tính linh hoạt và sự tổng hoà của những điều tương phản đã tạo nên sự thành công của dòng xe Porsche Panamera ngay từ khi mới ra mắt', 'Porsche', '2024-10-27', '2024-10-30', 2, 'https://porsche-vietnam.vn/wp-content/uploads/2024/05/PA24P5AOX0001_low-banner.jpg', 98, 1),
(26, 'Siêu phân luồng là gì?', 'sieu-phan-luong-la-gi', '<p>Đây là cách Công nghệ siêu phân luồng Intel® (Công nghệ Intel® HT) giúp các bộ xử lý thực hiện nhiều công việc hơn cùng lúc.1</p><p>&nbsp;</p><p>Gần như tất cả các CPU ngày nay đều đa lõi: chúng chứa một số bộ xử lý có thể xử lý các tác vụ khác nhau cùng một lúc.</p><p>Tuy nhiên, lợi ích của việc thêm nhiều lõi không phải lúc nào cũng được giải thích rõ ràng. Đâu là khác biệt giữa các ứng dụng đơn luồng và đa luồng? Siêu phân luồng là gì và công nghệ này khác với đa luồng thông thường như thế nào?</p><p>Để giải thích các lợi ích của các lõi bổ sung và Công nghệ siêu phân luồng Intel®, hãy cùng xem các thuật ngữ này và giải thích ý nghĩa của chúng khi chạy các game và ứng dụng hằng ngày.<br>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Đa luồng là gì?</p><p>Đa luồng là một hình thức song song hóa hoặc phân chia công việc để xử lý đồng thời. Thay vì đưa khối lượng công việc lớn cho một lõi, các chương trình phân luồng chia công việc thành nhiều luồng phần mềm. Các luồng này được xử lý song song bởi các lõi CPU khác nhau để tiết kiệm thời gian.</p><p>Tùy thuộc vào cách thiết kế, các game có thể được phân luồng ít hoặc phân luồng nhiều. Một số công cụ phát triển game cũ được biết đến về sự phụ thuộc vào hiệu năng đơn luồng, có nghĩa là các công cụ này chủ yếu sử dụng một lõi CPU đơn và tăng mạnh hiệu năng nhờ tốc độ xung nhịp cao hơn.</p><p>Ngày nay, các công cụ phát triển game như Unreal Engine 4 sử dụng nhiều lõi khi tạo các cảnh phức tạp2. Các công cụ cũng có thể sử dụng đa luồng để xử lý các phần khác nhau của \"lệnh gọi vẽ\" — các lệnh được gửi từ CPU đến GPU về các đối tượng trong game, kết cấu và trình tạo bóng để vẽ.</p><p>&nbsp;</p><p>&nbsp;</p><p>Siêu phân luồng là gì?</p><p>&nbsp;</p><p><img src=\"https://www.intel.vn/content/dam/www/central-libraries/us/en/images/what-is-hyperthreading-rwd.png.rendition.intel.web.1648.927.png\" alt=\"Xử lý đơn luồng\" width=\"1648\" height=\"927\"></p><p>&nbsp;</p><p>Công nghệ siêu phân luồng Intel® là một cải tiến phần cứng cho phép nhiều luồng cùng chạy trên mỗi lõi. Nhiều luồng hơn có nghĩa là có nhiều công việc được thực hiện song song hơn.</p><p>Công nghệ siêu phân luồng hoạt động như thế nào? Khi Công nghệ siêu phân luồng Intel® hoạt động, CPU sẽ hiển thị hai bối cảnh thực thi trên mỗi lõi vật lý. Điều này có nghĩa là một lõi vật lý hiện hoạt động giống như hai \"lõi logic\" có thể xử lý các luồng phần mềm khác nhau.</p><p>Hai lõi logic có thể xử lý các tác vụ hiệu quả hơn so với lõi đơn luồng truyền thống. Bằng cách tận dụng thời gian không hoạt động, khi mà trước đây lõi phải chờ các tác vụ khác hoàn thành, Công nghệ Siêu phân luồng Intel® giúp cải thiện thông lượng CPU.</p><p>&nbsp;</p><p><img src=\"https://www.intel.vn/content/dam/www/central-libraries/us/en/images/what-is-hyperthreading2-rwd.png.rendition.intel.web.1648.927.png\" alt=\"Xử lý đa luồng\" width=\"1648\" height=\"927\"></p><p>&nbsp;</p><p>Bạn muốn biết cách kích hoạt công nghệ Siêu phân luồng? Công nghệ này mặc định bật, nhưng có thể bật và tắt từ môi trường BIOS bằng cách cài đặt \"Công nghệ siêu phân luồng\" thành \"Bật\" hoặc \"Tắt\". Lưu ý rằng Công nghệ siêu phân luồng Intel® chỉ khả dụng trên một số CPU dành cho người đam mê công nghệ: xem danh sách đầy đủ tại đây.</p><p>&nbsp;</p><p>&nbsp;</p><p>Tôi sẽ thấy những lợi ích gì từ công nghệ Siêu phân luồng?</p><p>&nbsp;</p><p><img src=\"https://www.intel.vn/content/dam/www/central-libraries/us/en/images/what-is-hyperthreading3-rwd.png.rendition.intel.web.1648.927.png\" alt=\"Hình ảnh máy tính có màn hình đôi\" width=\"1648\" height=\"927\"></p><p>&nbsp;</p><p>Với công nghệ Siêu phân luồng CPU, máy tính có thể xử lý nhiều thông tin hơn trong thời gian ngắn hơn và chạy nhiều tác vụ nền hơn mà không bị gián đoạn. Trong hoàn cảnh phù hợp, công nghệ cho phép các lõi CPU thực hiện hiệu quả hai việc cùng một lúc. Người đa nhiệm, người phát trực tiếp và chuyên gia chạy các chương trình có nhiều luồng có thể tăng cường trải nghiệm điện toán bằng cách nâng cấp lên máy tính xách tay chơi game hoặc CPU máy tính để bàn chơi game với Công nghệ Siêu phân luồng Intel®.</p>', 'Với công nghệ Siêu phân luồng CPU, máy tính có thể xử lý nhiều thông tin hơn trong thời gian ngắn hơn và chạy nhiều tác vụ nền hơn mà không bị gián đoạn.', 'Intel', '2024-10-27', NULL, 0, 'https://techvccloud.mediacdn.vn/thumb_w/650/280518386289090560/2022/6/10/0123dp9rxafybqkufjsxnr1-7-16548512799391640509851.jpg', 97, 1),
(27, 'Khoai Lang Thang và hành trình trở thành Vlogger được cộng đồng xê dịch mến mộ', 'khoai-lang-thang-va-hanh-trinh-tro-thanh-vlogger-duoc-cong-dong-xe-dich-men-mo', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(109,109,109);\"><i>Với niềm đam mê với ẩm thực, yêu thích sự dịch chuyển cũng như văn hóa của các vùng miền, quốc gia, Khoai Lang Thang đã trở thành một biểu tượng travel blogger được nhiều người yêu mến và ngưỡng mộ. Những video của anh không chỉ đem lại niềm vui và sự thư giãn cho khán giả mà còn truyền tải những thông điệp tích cực và yêu thương đến cộng đồng.</i></span></p><p>Khoai Lang Thang là ai?</p><p><strong>Tên thật: </strong>Đinh Võ Hoài Phương</p><p><strong>Năm sinh</strong>: 1991</p><p><strong>Quê quán: </strong>Bến Tre</p><p><strong>Nơi ở hiện nay:</strong> TP Hồ Chí Minh</p><p><strong>Nghề nghiệp:</strong> Youtuber, travel blogger</p><p><strong>Youtube:</strong> https://www.youtube.com/@KhoaiLangThang</p><p><strong>Facebook:</strong> https://www.facebook.com/DinhVoHoaiPhuong</p><p><strong>Page:</strong> https://facebook.com/KhoaiLangThang</p><p><strong>Instagram:</strong> https://www.instagram.com/khoailangthang</p><p><strong>Email:</strong> dinhvohoaiphuong@gmail.com</p><p>Khoai Lang Thang, một trong những vlogger nổi tiếng hàng đầu hiện nay, đã thu hút sự chú ý đông đảo với những video tuyệt vời về du lịch và ẩm thực. Điều đáng ngạc nhiên là gần đây anh đã trở thành người xuất hiện trên nhiều phương tiện truyền thông khác nhau và có vinh dự được biểu diễn trên đài truyền hình quốc gia VTV1.</p><p>Ban đầu, Khoai Lang Thang chỉ là một kỹ sư xây dựng không có kiến thức về chụp ảnh hay quay phim. Nhưng trong vòng 4 năm, anh đã chứng tỏ mình là một vlogger nổi tiếng. Hiện nay, anh là một cái tên đáng chú ý và đã góp mặt trong hàng loạt danh sách những YouTuber nổi tiếng của Việt Nam.</p><p>Khoai Lang Thang, với tên thật là Đinh Võ Hoài Phương, đã xây dựng biệt danh \"Khoai\" cho bản thân và chọn tên kênh YouTube là \"Khoai Lang Thang\". Từ \"lang thang\" thể hiện niềm đam mê của Khoai trong việc khám phá và di chuyển. Với sự sáng tạo và nỗ lực không ngừng, những video của Khoai dần trở nên phổ biến, và cái tên \"Khoai Lang Thang\" đã trở thành một biểu tượng được khán giả yêu mến và nhắc đến nhiều hơn.</p><p>Xem thêm: Nếm TV, Vlogger Tùng Nếm có cả chữ S của Việt Nam trong đầu</p><p><img src=\"https://mia.vn/media/uploads/blog-du-lich/travel-blogger-khoai-lang-thang-1-1688311455.jpeg\" alt=\"Khoai Lang Thang và hành trình trở thành Vlogger được cộng đồng xê dịch mến mộ 2\" width=\"800\" height=\"533\"></p><p><i>Chàng Youtuber/ Travel Blogger nổi đình đám với tên thật là Đinh Võ Hoài Phương</i></p><p><span style=\"color:rgb(0,153,204);\">2</span>Hành trình trở thành Youtuber được yêu thích nhất nhì cộng đồng du lịch của Khoai Lang Thang</p><p>Với sự hấp dẫn của chủ đề du lịch và ẩm thực, Khoai Lang Thang đã tạo nên những videp thu hút sự quan tâm lớn từ người xem. Anh chàng không chỉ có ngoại hình điển trai mà còn sở hữu tính cách hài hước, cách diễn đạt duyên dáng, cung cấp những kiến thức vô cùng hữu ích về du lịch, văn hóa và ẩm thực cho khán giả.</p><p>Ngày 22/2/2017, Khoai Lang Thang đã ra mắt video đầu tiên của mình. Ban đầu, lượt xem không nhiều. Tuy nhiên, anh không bị đánh bại mà tiếp tục hoàn thiện từng video tiếp theo. Anh luôn quan tâm đến nội dung, hình ảnh và sự xuất hiện của mình. Sau 4 năm, Khoai Lang Thang đã thu hút một lượng khán giả ổn định và trở thành người mẫu được nhiều người ngưỡng mộ.</p><p>Các video của Khoai Lang Thang không chỉ mang tính giải trí mà còn cung cấp thông tin và kiến thức hữu ích về địa lý, văn hóa và con người từng vùng miền. Mỗi địa điểm mà anh đi qua được tái hiện trong video với cảnh quay đẹp mắt, khám phá nhiều khía cạnh về phong tục, tập quán, văn hóa và đặc biệt là ẩm thực. Những video tuyệt vời của Khoai đã giúp chúng ta yêu quý và tự hào về đất nước Việt Nam và con người của nó.</p><p>Hình ảnh của chàng trai miền Tây từ bỏ công việc kỹ sư để trở thành vlogger đã trở thành nguồn cảm hứng cho nhiều người về cuộc sống theo đam mê. Phương châm sống của Khoai là \"Sống theo đam mê nhưng không mù quáng\". Khi anh chỉ mới 18 tuổi, ước mơ của anh là học giỏi, kiếm nhiều tiền để giúp đỡ gia đình và phát triển bản thân.</p><p>Tuy nhiên, vào tuổi 25, chàng trai từ Bến Tre đã mất đi đam mê của mình. Vì vậy, anh quyết định từ bỏ công việc kỹ sư để tạo ra kênh YouTube của riêng mình. Một khi đã tìm lại hướng đi, Khoai Lang Thang không ngừng học hỏi để cải thiện các bộ phim của mình, từ hình ảnh đến nội dung, khai thác tối đa tiềm năng của chúng. Những thành công hiện tại là sự đáng chú ý và xứng đáng được công nhận cho những nỗ lực mà anh đã bỏ ra.</p><p><img src=\"https://mia.vn/media/uploads/blog-du-lich/travel-blogger-khoai-lang-thang-2-1688311455.jpeg\" alt=\"Khoai Lang Thang và hành trình trở thành Vlogger được cộng đồng xê dịch mến mộ 3\" width=\"800\" height=\"800\"></p><p><i>Chàng chai Bến Tre với ngoại hình điển trai cùng những thước phim dung dị đã chinh phục trái tim của cộng đồng yêu du lịch Việt Nam</i></p><p><span style=\"color:rgb(0,153,204);\">3</span>Khoang Lang Thang - Youtuber không lấy view đo chất lượng</p><p>Muốn sản phẩm vlog của mình được nhiều lượt xem là điều mà tất cả các vlogger đều khát khao. Tuy nhiên, Khoai Lang Thang không ngại lên tiếng chỉ trích việc đánh giá chất lượng một sản phẩm chỉ dựa trên số lượt xem.</p><p>Vào năm 2019, Nas Daily đến Việt Nam để khám phá và quảng bá văn hóa ẩm thực Việt. Nhóm sản xuất của Nas Daily muốn hợp tác với những KOL (Key Opinion Leader) và vlogger nổi tiếng trong lĩnh vực này. Rất nhiều fan hâm mộ đã giới thiệu Khoai Lang Thang.</p><p>Tuy nhiên, chàng trai Bến Tre đã từ chối một cách thẳng thừng: \"Số lượng người theo dõi không thể đo lường được tâm huyết hay chất lượng nội dung của người tạo ra nó. Nếu ai đó lấy con số này làm tiêu chuẩn đánh giá, đặc biệt là trong lĩnh vực văn hóa quốc gia, thì đó là một sự thiếu tôn trọng.\"</p><p><img src=\"https://mia.vn/media/uploads/blog-du-lich/travel-blogger-khoai-lang-thang-3-1688311456.jpeg\" alt=\"Khoai Lang Thang và hành trình trở thành Vlogger được cộng đồng xê dịch mến mộ 4\" width=\"800\" height=\"461\"></p><p><i>Travel Blogger Khoai Lang Thang cho rằng, một sản phẩm hay không chỉ dựa trên lượt view mà còn phải chú trọng về nội dung và thông điệp</i></p><p><span style=\"color:rgb(0,153,204);\">4</span>Người khởi xướng dự án “Việt Nam - chuyện chưa kể”</p><p>Nhờ số tiền kiếm được từ kênh Youtube, Khoai đã sử dụng nó để thực hiện nhiều dự án cộng đồng nhằm giúp đỡ trẻ em khó khăn tại những vùng mà anh đã đặt chân tới.</p><p>Trong thời gian ngắn, Khoai Lang Thang đã xây dựng được một cộng đồng người hâm mộ, lan tỏa tình yêu thương đến những nhà hảo tâm và đồng thời tạo thêm nhiều dự án hơn cho trẻ em.</p><p>Khoai Lang Thang là người sáng lập dự án \"Việt Nam - Chuyện chưa kể\", mục tiêu là xây dựng hơn 30 sân chơi tại các trường học khó khăn trên khắp Việt Nam.</p><p>Theo số liệu từ Social Blade, doanh thu hàng năm từ các video trên YouTube có thể đem lại cho Khoai từ 371,6 triệu đến 5,9 tỷ đồng.</p><p><img src=\"https://mia.vn/media/uploads/blog-du-lich/travel-blogger-khoai-lang-thang-4-1688311456.jpeg\" alt=\"Khoai Lang Thang và hành trình trở thành Vlogger được cộng đồng xê dịch mến mộ 5\" width=\"800\" height=\"533\"></p><p><i>Dự án Việt Nam - chuyện chưa kể do Khoai Lang Thang khởi xướng</i></p><p><span style=\"color:rgb(0,153,204);\">5</span>Kết</p><p>Khoai Lang Thang là một travel blogger/ youtuber tài năng đã gặt hái thành công bằng việc chia sẻ những video hấp dẫn về du lịch và ẩm thực cả trong và ngoài nước. Với vẻ ngoài điển trai, tính cách hài hước, duyên dáng, Khoai Lang Thang không chỉ nhận được rất nhiều sự ủng hộ mà còn truyền cảm hứng và yêu thương đến cộng đồng.</p><p><i>Video: Chợ đêm biên giới : Nguồn: https://www.youtube.com/@KhoaiLangThang</i></p>', 'Với vẻ ngoài điển trai, tính cách hài hước, duyên dáng, Khoai Lang Thang không chỉ nhận được rất nhiều sự ủng hộ mà còn truyền cảm hứng và yêu thương đến cộng đồng.', 'mia.vn', '2024-10-29', '2024-10-30', 2, 'https://mia.vn/media/uploads/blog-du-lich/travel-blogger-khoai-lang-thang-4-1688311456.jpeg', 99, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcribes`
--

CREATE TABLE `subcribes` (
  `id` int(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcribes`
--

INSERT INTO `subcribes` (`id`, `email`) VALUES
(1, 'trungnguyen11879@gmail.com'),
(2, 'khanhdong@gamil.com'),
(4, 'trungnguyenlegend@gmail.com'),
(5, 'giangmyphung@gmail.com'),
(6, 'hoaigiang@gmail.com'),
(7, 'khanhdong@gmail.com'),
(9, 'trungnguyen7@gmail.com'),
(10, 'trungnguyen8@gmail.com'),
(11, 'trungnguyen9@gmail.com'),
(12, 'trungnguyen10@gmail.com'),
(15, 'giangmyphung@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Trung Nguyên', 'trungnguyen', 'trungnguyen', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact_requests`
--
ALTER TABLE `contact_requests`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_video`
--
ALTER TABLE `news_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `subcribes`
--
ALTER TABLE `subcribes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contact_requests`
--
ALTER TABLE `contact_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `news_video`
--
ALTER TABLE `news_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `subcribes`
--
ALTER TABLE `subcribes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news_video`
--
ALTER TABLE `news_video`
  ADD CONSTRAINT `news_video_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
