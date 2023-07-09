-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 11:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aqua_tani`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `application_status` varchar(255) NOT NULL DEFAULT 'processed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `applicant_id`, `application_status`, `created_at`, `updated_at`) VALUES
(1, 49, 30, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(2, 15, 3, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(3, 25, 31, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(4, 48, 45, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(6, 16, 46, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(7, 40, 8, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(8, 3, 46, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(9, 43, 25, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(11, 5, 40, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(12, 33, 31, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(13, 21, 3, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(14, 47, 49, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(15, 45, 6, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(16, 30, 14, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(17, 46, 7, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(18, 14, 49, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(19, 24, 18, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(20, 39, 18, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(21, 7, 31, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(22, 23, 3, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(23, 45, 30, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(24, 31, 45, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(25, 27, 46, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(26, 39, 48, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(27, 33, 31, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(28, 50, 11, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(29, 49, 48, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(30, 47, 7, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(31, 38, 49, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(32, 3, 49, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(33, 7, 49, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(34, 11, 27, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(35, 1, 9, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(36, 16, 48, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(37, 7, 22, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(38, 37, 18, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(39, 19, 48, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(40, 43, 3, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(41, 47, 22, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(42, 42, 3, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(43, 13, 14, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(44, 3, 22, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(46, 27, 28, 'processed', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(47, 49, 45, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(48, 11, 46, 'accepted', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(49, 25, 40, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(50, 3, 11, 'rejected', '2023-07-04 15:52:07', '2023-07-04 15:52:07'),
(51, 51, 51, 'processed', '2023-07-09 02:20:11', '2023-07-09 02:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `experience` text NOT NULL,
  `benefits` text NOT NULL,
  `vacancy` int(11) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `gender` enum('laki-laki','perempuan','tidak ditentukan') NOT NULL,
  `job_category` enum('pertanian','perikanan') NOT NULL,
  `job_owner_id` bigint(20) UNSIGNED NOT NULL,
  `job_status` enum('open','closed') NOT NULL,
  `job_type` enum('full-time','part-time') NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default-illustration.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `job_description`, `responsibilities`, `experience`, `benefits`, `vacancy`, `salary`, `location`, `deadline`, `gender`, `job_category`, `job_owner_id`, `job_status`, `job_type`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tes Update', '<p>Odio sapiente adipisci rem natus aut. Doloribus unde architecto id tenetur nulla autem. Dolorum impedit harum velit aut. Aut ut totam tenetur neque dignissimos.</p>', '<p>Qui et saepe qui minima. Perferendis omnis ratione quod rem.</p>', '<p>Iusto quis cupiditate ipsa laudantium aut. Qui iure voluptas incidunt expedita aperiam tenetur. Aut hic quo ducimus aperiam eum ipsum maiores. Quia eos est consequatur et incidunt ut molestias.</p>', '<p>Vitae distinctio tenetur placeat dolores laboriosam nostrum possimus. Quae ducimus earum aspernatur nihil ullam id laborum. Blanditiis quas ad omnis ut non rerum aliquam commodi.</p>', 55, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Batako No. 622, Administrasi Jakarta Timur 15974, Jabar', '2023-07-22', 'tidak ditentukan', 'pertanian', 2, 'open', 'full-time', '0d07a7f640575dd61c7d4f988917c0f0.png', '1991-04-23 21:49:50', '2023-07-09 01:20:15'),
(2, 'beatae nisi consequatur', 'Id commodi vel eveniet dolorem. Perspiciatis quaerat delectus sed. Nisi nulla delectus aut est libero consequatur nisi.', 'Fugit beatae sequi numquam perferendis quibusdam. Tenetur facilis tempora ut enim vel ad. Et doloremque sit pariatur nostrum voluptas impedit nam. Quasi quibusdam dolor qui sit necessitatibus maxime.', 'Provident asperiores quibusdam nemo praesentium voluptatem. Maiores nobis qui in et. Ut eos ipsa nihil in in.', 'Dolores repellendus quia sit necessitatibus optio omnis. Repudiandae in recusandae sit error et.', 64, 'Rp2.500.000 - Rp3.000.000/bulan', 'Kpg. Ters. Pasir Koja No. 434, Malang 83537, NTT', '2018-10-03', 'tidak ditentukan', 'perikanan', 47, 'closed', 'full-time', 'abddee4e9bc98218784dad90e06ae784.png', '1978-09-13 07:29:04', '2006-12-27 10:57:19'),
(3, 'non tempora quia', 'Et molestiae vel voluptas non vitae rerum iusto. Eum consequatur sint facere voluptate et laudantium pariatur.', 'Enim inventore quas quae ut deleniti voluptas voluptates. Qui iste repudiandae quidem vel. Sed aut cum quis. Eaque tenetur qui ut quia commodi praesentium.', 'Aut odio rerum modi libero ipsa at est praesentium. Perferendis quia quasi praesentium consequatur sit. Id alias rerum quis cum est aut. Cum totam non aspernatur aut deserunt omnis qui hic.', 'Est cupiditate laboriosam iste. Libero non rerum eum sed nulla. Nesciunt neque nesciunt at maiores rerum voluptatem. Velit vero quia quo quia amet.', 79, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Ketandan No. 781, Parepare 18919, Pabar', '1982-10-22', 'tidak ditentukan', 'pertanian', 47, 'closed', 'full-time', '21d389c661127e02cfaa00195a8b45ca.png', '1982-10-03 17:36:17', '2008-05-30 18:48:42'),
(4, 'voluptas voluptas maxime', 'Voluptatem omnis accusamus voluptatem quia voluptas dolores odio. Sapiente eos est reiciendis temporibus. In vel est amet inventore consequatur aut. Impedit fugit aliquam mollitia molestiae.', 'Quisquam facilis minima omnis non et quos. Temporibus quidem qui aut vitae non qui earum. Ducimus maiores provident expedita. Et cum debitis iste temporibus. Quos culpa consequatur aut.', 'Et quasi error voluptas voluptatem qui. Assumenda sit consequuntur tempore atque. Totam eaque dolor dolore numquam est qui facere. Nihil beatae et facere recusandae omnis unde.', 'Sunt quis asperiores voluptates quia nihil. Doloribus ullam pariatur quasi voluptas distinctio mollitia quo. Repudiandae ut velit nihil reiciendis et quasi.', 43, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jln. Suryo Pranoto No. 330, Tanjungbalai 41108, Bengkulu', '1974-10-21', 'perempuan', 'perikanan', 21, 'open', 'part-time', '66204380c6c2aa277ddfa89a9889292b.png', '1978-03-22 09:25:07', '1999-03-25 05:03:15'),
(5, 'aut qui laudantium', 'Sunt iusto voluptates qui dolor asperiores rerum. Ut impedit et ea est aperiam. Voluptate sed adipisci vel. Unde non dolores a doloremque.', 'Id neque alias quis eos aut atque. Porro est doloremque qui eveniet tenetur. Et architecto et laudantium dolor reiciendis quis quos. Et nisi rerum nemo.', 'Qui fugit nemo consequuntur sit. Saepe deleniti et nisi cumque. Quo vel aliquid aperiam in sed. Commodi aut deserunt soluta sunt ut placeat sit.', 'Magni aut iusto et. Et in eaque quasi. Quis distinctio quos officiis ut. Harum maiores mollitia qui quisquam.', 43, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ds. Umalas No. 564, Sungai Penuh 56030, NTT', '1998-10-10', 'perempuan', 'pertanian', 38, 'closed', 'part-time', '4082f43aa80521d93b231b6798051f74.png', '2011-12-30 06:22:37', '2010-09-16 16:50:09'),
(6, 'vel quibusdam veniam', 'Omnis illum non totam quos quaerat. Omnis expedita quaerat maiores unde ducimus maiores. Fugiat explicabo eaque impedit qui.', 'Modi id sit officiis magnam sit consectetur exercitationem expedita. Ipsam earum quae omnis soluta est magnam deserunt eos. Nostrum voluptas provident velit facilis impedit.', 'Sit sequi perspiciatis esse. Temporibus magnam blanditiis dolor et sint nihil.', 'Quos rerum et placeat aut consequatur eligendi fugit. Illo quidem quia ex esse perferendis quod. Repellat officia quisquam earum possimus.', 77, 'Rp2.500.000 - Rp3.000.000/bulan', 'Gg. Elang No. 377, Probolinggo 34859, Banten', '2020-10-06', 'laki-laki', 'pertanian', 34, 'open', 'part-time', '6401ae4335e355adb292a2cd978de834.png', '1991-11-22 13:36:13', '1978-03-12 10:43:20'),
(7, 'inventore ut et', 'Dolorem vitae at suscipit nisi in ut sint. Non quaerat modi nihil harum laudantium. Fugiat consequatur et atque est. Aut rerum deleniti assumenda rem ut.', 'Consequatur et vel quis repudiandae amet dolores ab. Facilis repellat est molestias autem blanditiis dignissimos quod. Et labore sed inventore quam ut repellendus saepe sit.', 'Id voluptatem pariatur eos libero perferendis. Soluta sint aliquid ut tenetur eius. Eos rerum corrupti officiis fugit aliquam. Ut velit ipsum explicabo autem voluptatem a.', 'Ut necessitatibus corrupti fugiat quasi id ratione quia. Saepe corrupti beatae nisi qui odio voluptatem quaerat minima. Optio placeat ut magni molestiae.', 24, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Baik No. 828, Bandung 14137, Sumsel', '2014-07-04', 'laki-laki', 'perikanan', 47, 'open', 'full-time', 'be51a56e2d14f1243d37806a0e42c10e.png', '2016-01-03 04:01:47', '2019-03-26 05:09:07'),
(8, 'repellat tenetur a', 'Laboriosam recusandae inventore beatae minima hic sint qui. Quos hic et quo. Dolores ex autem provident perferendis.', 'Voluptas vel ut corporis aliquid. Ab sed et sapiente fuga ea. Officiis quas veniam quae qui qui quidem nam.', 'Dignissimos quos deleniti eos reprehenderit nemo. Error aut aut unde ut.', 'Alias dolorem ut aut voluptatem accusamus. Ut ipsa maxime sed consequatur delectus reiciendis. Possimus quo facere et ea error asperiores.', 71, 'Rp2.500.000 - Rp3.000.000/bulan', 'Kpg. Laksamana No. 42, Jayapura 93023, Sulsel', '1984-05-01', 'laki-laki', 'perikanan', 12, 'open', 'part-time', '1011ffbd9587101b993c844c55830543.png', '1980-05-06 09:18:24', '2018-07-12 01:09:38'),
(9, 'quasi deleniti porro', 'Vero labore illo officiis et delectus porro neque. Ducimus dolorem non unde optio adipisci ex. Nihil nihil quia ut et et sed dolorum.', 'Ab optio maxime sed explicabo perspiciatis eum omnis tempore. Recusandae repudiandae pariatur a fugiat voluptas atque.', 'Quis est nam esse consequuntur eveniet. Optio velit facilis ut vel aut similique sed saepe. Suscipit quod numquam repudiandae voluptatem.', 'Debitis aliquid temporibus numquam amet excepturi. Qui sed nihil ipsam repellat consequuntur aut rem nihil. Assumenda est autem harum tenetur. Cum sed corporis dicta architecto nobis.', 59, 'Rp2.500.000 - Rp3.000.000/bulan', 'Dk. Yap Tjwan Bing No. 776, Tangerang Selatan 82481, Pabar', '1990-05-14', 'perempuan', 'perikanan', 21, 'closed', 'part-time', 'a51592cb7478c66e9dd9feba21135039.png', '2022-09-10 18:13:43', '2017-05-13 21:49:53'),
(10, 'magnam et veritatis', 'Ut libero fuga est est quas qui corporis. Et qui voluptatem velit architecto ipsum quia impedit. Vel laboriosam rerum corrupti quo. Eligendi nisi est rerum nemo dignissimos.', 'Ut reprehenderit fugiat laudantium et voluptas beatae. Ut qui in illo. Alias voluptas delectus aut animi hic. Occaecati et nesciunt a iste eum exercitationem.', 'Aut facilis exercitationem non et ipsa eos vero. Est iste cum reprehenderit corrupti atque dolores quo. Sit excepturi ex nulla necessitatibus.', 'Quasi sit qui molestias voluptates similique. Ad est dignissimos nam eum velit nam consequatur. Consequatur aut consequuntur dolorem optio soluta ipsa dolores est.', 29, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Muwardi No. 281, Kendari 11534, Kaltara', '1989-12-18', 'laki-laki', 'perikanan', 47, 'closed', 'full-time', '0180d0fa2c9c61456e25c9696be2f47d.png', '2021-03-19 22:53:40', '1990-08-30 18:04:17'),
(11, 'est molestias quo', 'Quidem nam in qui facilis ab. Quidem et excepturi repellendus. Rerum reprehenderit illo voluptatem magnam a ullam. Voluptatem ea consequatur minus temporibus.', 'Qui aliquid assumenda deleniti. Animi nostrum tempore numquam corrupti asperiores ut ut quia. Adipisci quia consequatur officia et veniam ut.', 'Qui inventore ab maxime ipsum assumenda error. Unde quis eius ea quia. Maxime qui nam voluptatum voluptatibus. Et fuga enim est quia.', 'Sed ipsam corrupti quibusdam sit. Delectus ducimus maiores eaque distinctio praesentium blanditiis. Sit sit quia illo optio. Dolorum enim exercitationem et cumque omnis.', 79, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Sutarjo No. 680, Padang 71201, Pabar', '1999-02-10', 'laki-laki', 'pertanian', 33, 'closed', 'full-time', '81679166d50bee1649e9e8fecb89b6c1.png', '1976-10-02 17:32:49', '1996-01-23 07:58:16'),
(12, 'nam laboriosam et', 'Sunt corrupti ullam cupiditate culpa ut. Facilis autem laudantium odit perferendis qui. Perferendis fugit neque sed eveniet.', 'Quos neque tenetur ut molestiae non et quia quibusdam. Unde aut iure sit recusandae. Vitae omnis quia molestiae eum voluptas mollitia et autem.', 'Quisquam dolores similique soluta. Quia dolor ut quisquam ut qui cupiditate. Fuga ipsum soluta voluptas at eveniet ipsam labore.', 'Omnis unde sit inventore aut nesciunt ex. Suscipit impedit incidunt maiores quas minus dolorum nobis. Quam nulla id qui laudantium et. Quia voluptatibus maxime facilis rerum voluptas.', 90, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. K.H. Wahid Hasyim (Kopo) No. 687, Tegal 14912, Bengkulu', '1978-07-06', 'laki-laki', 'pertanian', 2, 'open', 'full-time', '83ee2db6139bc373f929a0e8f5435dac.png', '1986-06-08 14:22:36', '1997-05-04 11:33:16'),
(13, 'aliquam eius aut', 'Est nostrum numquam corrupti eos voluptatem quod. Voluptatem mollitia nobis in ut iusto. Aut sed omnis voluptate aut odit.', 'Debitis id eos sint explicabo molestiae omnis ipsum. Voluptatem natus placeat sit perferendis. Debitis natus et qui odio. Nobis deserunt maiores facere repellendus eos.', 'Vel maiores dolores dolor eligendi dolore ut quaerat. Tempore doloribus qui quasi unde eaque officia. Fuga deserunt omnis neque quia consequatur assumenda. Quia quaerat incidunt quod quo.', 'Ducimus rem nostrum quia quaerat reprehenderit. Animi est iure vel. Minus minus atque cupiditate deserunt. Quo earum possimus aliquam mollitia veritatis corporis.', 94, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jln. Astana Anyar No. 441, Samarinda 16533, Jatim', '1997-11-22', 'tidak ditentukan', 'perikanan', 34, 'closed', 'full-time', 'b0ab6631d66e10cb698c3856ff98f642.png', '2021-11-07 11:00:05', '2008-12-06 06:09:25'),
(14, 'sequi quo ea', 'Earum dolores quos atque nisi quo aliquam praesentium. Fugit amet odio consequuntur numquam adipisci quisquam.', 'Illum veniam esse beatae non id temporibus nisi asperiores. Quibusdam totam eveniet dignissimos tempora facilis ipsum. Alias tenetur recusandae eum laboriosam. Aut numquam voluptatum quia.', 'Dolores sint quos provident sed sunt est. Non possimus laudantium dolorem reiciendis. Veniam nostrum harum repellendus amet.', 'Id accusantium est repudiandae. Perspiciatis rem similique repellat voluptatem eaque nam minus. Vel et sunt dolor repellat voluptatum incidunt. Qui rerum est odit asperiores.', 88, 'Rp2.500.000 - Rp3.000.000/bulan', 'Psr. Sutarjo No. 120, Jambi 84188, Sumut', '1977-01-31', 'tidak ditentukan', 'perikanan', 5, 'open', 'part-time', '959c14d310e4772a5ad9aca0647ca104.png', '1982-10-30 19:05:33', '1981-04-06 14:29:06'),
(15, 'sed voluptatem odio', 'Ut eos quas consequuntur nobis repellat quia. Eius ipsum modi officiis. Voluptatem eius voluptatibus eveniet placeat animi dolorem. Earum et vitae sunt exercitationem.', 'Earum quis et aspernatur minus recusandae nihil. Et velit incidunt sit ut. Magnam omnis veniam perspiciatis est. Consequuntur aliquam suscipit aut officiis ad.', 'Molestiae quam fuga quod. Id aut molestias temporibus qui maxime accusantium. Et adipisci ut corporis inventore enim voluptate.', 'Et est sapiente rerum suscipit impedit qui. Earum beatae et debitis et id cum voluptas. Natus possimus et quod illo veniam. Similique ea distinctio quaerat incidunt.', 33, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ds. Veteran No. 279, Bengkulu 71342, Lampung', '1999-05-30', 'tidak ditentukan', 'perikanan', 12, 'closed', 'part-time', '50563a2d6d9749f0be4b62e19aebf87d.png', '1975-09-25 17:35:36', '2019-09-05 12:13:29'),
(16, 'sed maiores quis', 'Est optio inventore reiciendis molestiae fuga. Autem ut nemo voluptate ullam assumenda. Assumenda omnis debitis nisi mollitia id placeat rerum. Facere in maiores culpa.', 'Illum dolor velit dolorum vero iste est. Cumque ipsum facilis sit qui itaque ducimus. Dolores quia et et libero perferendis sit molestiae.', 'Aut corrupti quaerat ab autem iusto. Quo in provident aliquid est magni.', 'Velit aut alias cum quo. Beatae suscipit dolor ea praesentium. Voluptatum sit alias ipsum. Tempora iste rerum ut ipsum ex. Ut tempora nam incidunt harum numquam illo. Ducimus rem culpa nulla earum.', 22, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jln. Abdullah No. 70, Medan 18405, NTB', '2019-10-17', 'laki-laki', 'perikanan', 33, 'open', 'part-time', '95f2cea251d06bd02ab897a169d078c4.png', '1977-01-20 18:04:48', '2004-12-15 05:08:40'),
(17, 'nostrum velit cupiditate', 'Facilis omnis quo praesentium provident repellat perspiciatis sit modi. Cupiditate doloremque iste nostrum ipsa quia adipisci. Consequatur tempora molestiae ut.', 'Saepe aut quo aut porro tempora sit. Vero minima vitae sint vel. Mollitia molestias odio dicta odio omnis ex. Et eos blanditiis molestiae quas in.', 'Ut sit veniam incidunt possimus. Corrupti quam ipsam atque sed. Enim esse sequi laboriosam suscipit tempore laborum delectus dolor. Debitis voluptas consequatur reiciendis sit.', 'Eveniet velit dolor quaerat minus qui. Nihil enim tenetur corporis cupiditate veniam architecto. Ab nisi mollitia quia ut omnis.', 86, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Antapani Lama No. 596, Sungai Penuh 54626, Sumut', '2022-06-16', 'tidak ditentukan', 'pertanian', 5, 'closed', 'part-time', '2cb05c2c66444b8f860b3404b8893d41.png', '2012-09-28 21:51:53', '2015-02-01 04:29:18'),
(18, 'libero omnis voluptatem', 'Tempora ut sit ut id a excepturi. Et iusto quia incidunt necessitatibus et. A qui ducimus dolor ratione quia.', 'Earum est dolores molestias consequatur libero ut. Ipsa doloribus aut quibusdam. Error nulla tenetur ut. Accusamus sed itaque ad quibusdam nostrum.', 'Atque et iure rem. Nihil nostrum et eos et perspiciatis atque. Recusandae assumenda doloribus voluptas placeat.', 'Itaque porro cumque sed. Modi dolores velit nihil officiis fuga. Odio qui asperiores tempora ipsa necessitatibus rerum.', 84, 'Rp2.500.000 - Rp3.000.000/bulan', 'Dk. BKR No. 727, Payakumbuh 49774, Maluku', '1993-04-27', 'tidak ditentukan', 'perikanan', 12, 'open', 'full-time', '49eef78178ea85d8f44581774d66ffe8.png', '1995-01-20 12:26:02', '2019-07-31 21:20:01'),
(19, 'reiciendis doloribus nihil', 'Voluptas a ut et maiores in. Odio quis minima ex debitis ea itaque. Rerum dolores voluptas qui aut rerum. Eaque voluptas excepturi eum corrupti. Excepturi atque corrupti ex beatae eaque labore.', 'Assumenda quod asperiores nam quidem. Iure et omnis rerum atque reiciendis non qui est. Sapiente fuga minima qui nemo neque earum ex earum. Voluptatem ullam ratione est ducimus.', 'Cum quo cum dolores soluta laborum. Voluptatibus debitis aliquam in nam dolorem laborum. Molestiae neque quas illum recusandae.', 'Aliquam neque debitis vel nihil. Aut eius voluptas ab veniam eligendi praesentium. Non repellendus inventore inventore asperiores. Dolorum voluptates neque enim odit qui quo.', 24, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Umalas No. 586, Dumai 79245, Pabar', '1974-04-01', 'tidak ditentukan', 'pertanian', 38, 'open', 'part-time', '2e29e1197b997e7670ade92e42290e36.png', '2000-01-16 21:42:05', '1971-06-13 01:57:10'),
(20, 'aut reiciendis quos', 'At quia rerum quis voluptatem facilis et exercitationem. Dolor aliquid facere magni.', 'Ad illum tempore sint nihil ea voluptate. Ducimus excepturi ab sint et. Laboriosam numquam suscipit voluptatem illum minus consectetur.', 'Id suscipit eligendi consectetur. Ea tenetur quia quo rerum. Maxime sed velit iste officia placeat accusantium reiciendis.', 'Ut debitis in ut tempora. Facilis quis sit ipsam praesentium officia in. Dolore neque quia quod ab voluptatibus similique.', 47, 'Rp2.500.000 - Rp3.000.000/bulan', 'Gg. Yap Tjwan Bing No. 458, Banjarbaru 97489, Jatim', '1988-08-20', 'tidak ditentukan', 'pertanian', 13, 'open', 'part-time', '434f6bbf5276bb00328b96892c2333ea.png', '2005-03-05 10:57:10', '1974-06-11 14:09:12'),
(21, 'quisquam expedita quia', 'Nihil vitae sed facilis quam sint et beatae. Tempore omnis vel quod voluptates. Distinctio reiciendis qui natus ex voluptates dolorem assumenda accusamus. Quidem eaque recusandae quaerat.', 'Aperiam a et ea quidem. Illo minus iure dolores sint culpa. Totam magni et tempore sit sint a nisi. Nihil veniam porro et amet illum autem saepe.', 'Nisi nobis ex ipsa debitis corporis quo eaque. Iure laudantium adipisci exercitationem ipsa quisquam error. Pariatur et necessitatibus deleniti at quam quia eaque.', 'Nihil et perspiciatis provident. Minus vel enim non aspernatur officia repellat. Voluptatem iste fugiat quia. Voluptatem eos qui delectus doloribus commodi labore.', 26, 'Rp2.500.000 - Rp3.000.000/bulan', 'Dk. Bahagia  No. 838, Bandung 82963, Maluku', '1990-02-19', 'laki-laki', 'perikanan', 4, 'open', 'full-time', 'bc57962de0e25c236d64a538b2b62cdf.png', '1973-03-24 12:17:51', '2017-03-16 14:41:30'),
(22, 'doloremque ea et', 'Id vel quas vel quidem atque iure est. Perferendis aliquam veritatis laudantium. Aut soluta et soluta sint.', 'Expedita aut aut ut. Eum sit et vero culpa voluptate quae accusantium in. Fugiat earum velit aut commodi culpa itaque blanditiis. Et debitis occaecati eligendi.', 'Officia dolores ea pariatur tenetur sit sed. Sit a delectus aspernatur illo qui eius. Quos quaerat possimus qui inventore dolores quia perferendis. Et officia sit qui eum labore doloribus nisi.', 'Doloribus temporibus adipisci aut minima dolores repellat. Repudiandae consectetur atque hic ipsam fuga sint. Consequatur quaerat architecto sunt qui.', 61, 'Rp2.500.000 - Rp3.000.000/bulan', 'Psr. Basoka Raya No. 686, Cilegon 75690, Jateng', '2011-11-08', 'tidak ditentukan', 'perikanan', 13, 'closed', 'part-time', 'df81dfdcedf1727c27e1c70ec3f8376b.png', '2013-05-02 22:56:52', '1973-05-03 23:08:09'),
(23, 'placeat aut ullam', 'Eius consectetur eveniet omnis magnam illo id. Rerum et quia incidunt amet. Rerum est ex officiis commodi illum. Tempora culpa voluptatem eum cumque.', 'Corporis quae sapiente quos nisi recusandae sed ab repellat. Ut necessitatibus et ut at esse. Quibusdam ipsum officia quod explicabo doloribus sed adipisci voluptatum.', 'Ad natus illum libero excepturi. Voluptas sunt praesentium a ut. Totam et ut minima repellendus aspernatur eaque adipisci enim. Earum beatae sunt quibusdam ex. Sapiente nihil nulla aperiam unde.', 'Mollitia facere enim dolorem voluptas aliquid aut. Reprehenderit natus doloribus cupiditate. Itaque aut aliquid et necessitatibus ipsum et quae.', 78, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Merdeka No. 551, Bengkulu 91751, Kalteng', '1991-12-19', 'tidak ditentukan', 'perikanan', 24, 'open', 'part-time', '1d1eda83815bd97f13a821f795fffe37.png', '1988-10-18 00:00:39', '1997-01-18 08:38:07'),
(24, 'sit eligendi dolorum', 'Minima ea libero eveniet velit. Eum quo aut distinctio id. Saepe itaque quo qui veritatis.', 'Nesciunt sapiente pariatur nesciunt in. Maxime libero voluptatem reprehenderit accusantium et animi. Et necessitatibus eum a eveniet in aperiam.', 'Velit est ullam quas nihil sint nam omnis. Natus quae distinctio facere ipsa eos dignissimos. Commodi autem maxime facere ut sit. Possimus eaque sapiente accusamus reprehenderit et maxime ut.', 'Natus sint quia nisi quas. Quasi et minima et consequatur. Voluptatem ex nemo est voluptates eius. Non ipsam et eum ad soluta.', 99, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jln. Bara No. 830, Metro 63825, Malut', '1977-11-14', 'perempuan', 'perikanan', 21, 'open', 'full-time', '6f6219128a12d999ef7ef9efe0fe08ec.png', '1987-01-02 03:37:05', '1974-01-05 15:12:15'),
(25, 'est aut itaque', 'Culpa eos est nobis consequatur ut autem. Distinctio rerum aut et at. Expedita quae maiores eius eos ipsam qui recusandae.', 'Consequatur totam minima quo ipsa. Id ratione et ut voluptatem voluptas voluptatem saepe. Rerum consequatur dolores soluta vel ipsa error. Libero officia officia totam deserunt.', 'Consequatur rerum et omnis consequuntur sed non et. Hic facilis rem dolor quaerat. Officiis ea quia et qui officiis.', 'Vitae officia ratione et quis illum. Deserunt aut id odit ipsam adipisci eius et. Sint magnam odio quaerat voluptas necessitatibus non. Commodi tempore eos recusandae.', 67, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Bakti No. 898, Prabumulih 15671, Sultra', '1996-07-03', 'tidak ditentukan', 'pertanian', 2, 'open', 'part-time', '00280dcdc7a628dcae65f8528d6ebd48.png', '1978-08-28 22:57:18', '1980-11-30 16:06:28'),
(26, 'alias ab temporibus', 'Perspiciatis ut facilis et sed impedit fugiat voluptate. Non qui asperiores ea quam. Omnis ut neque aut non quam numquam omnis.', 'Doloribus aperiam quidem perspiciatis aut voluptatem. Aut et pariatur autem quas rerum rerum reiciendis. Fugiat deleniti nostrum qui.', 'Totam ea quo ea error amet eius. Eum rerum earum aspernatur aliquid voluptate. Voluptatibus quod reprehenderit hic voluptatem autem dicta ut. Omnis fuga ea quis fuga consectetur et.', 'Vero fugiat rerum est nobis. Reiciendis hic fugit ratione quis in consectetur. Cumque distinctio enim assumenda adipisci reprehenderit inventore nam.', 74, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Laswi No. 944, Kotamobagu 38423, Malut', '2020-11-03', 'perempuan', 'perikanan', 29, 'closed', 'part-time', '9c19ae08d79855a9b63dc28ea52b0e77.png', '2001-02-10 01:30:20', '1984-05-11 01:12:09'),
(27, 'accusamus quibusdam in', 'Ut eius excepturi dolorum. Eum explicabo velit error harum.', 'Eveniet aliquid quidem omnis voluptatem. Consequatur fuga omnis fugiat repellat quo ullam. A alias accusantium et magni.', 'Architecto laborum ut sunt non. Explicabo quam laboriosam quia. Id voluptatem dolorem natus nisi quia odio vel. Laudantium nam voluptas ad est illo error eos sed. Enim omnis hic asperiores et.', 'Et velit excepturi quia eum quia. Qui quia dolore doloremque nemo illum odit. Distinctio iusto nihil sint qui corporis. Maiores minus nostrum quis non.', 50, 'Rp2.500.000 - Rp3.000.000/bulan', 'Dk. Arifin No. 715, Depok 83290, Bali', '1994-07-28', 'tidak ditentukan', 'pertanian', 26, 'open', 'part-time', '74eab23236b8a8feaeef0eb584a39342.png', '1976-08-17 15:36:02', '1997-12-14 12:43:33'),
(28, 'sed nam dicta', 'Velit suscipit dolor aut quaerat porro. Molestias molestiae quis sapiente nostrum earum et. Expedita nisi soluta quo quas non fugiat. Enim nam dicta est itaque omnis quo.', 'Sunt rerum molestiae nam quia dolore totam saepe. Cupiditate quos enim necessitatibus facere amet. Corporis libero cupiditate veritatis corrupti.', 'Iste voluptatem rerum et rerum dolor placeat ut. Repudiandae cumque architecto corrupti aut. Possimus laboriosam deserunt ea rerum blanditiis alias.', 'Sunt eius vel laboriosam. Dolorum impedit corporis dolorem velit. Autem id iusto nisi commodi. Consequatur aut excepturi laborum rerum nam expedita labore.', 76, 'Rp2.500.000 - Rp3.000.000/bulan', 'Kpg. K.H. Maskur No. 683, Langsa 60626, Sultra', '1989-12-18', 'laki-laki', 'perikanan', 24, 'closed', 'part-time', 'ad108537275fe322ebb35e717a762950.png', '2009-08-21 20:44:36', '1973-09-19 19:54:37'),
(29, 'consequatur qui minus', 'Sit ad magni illo ea velit. Magni labore dolor rem et voluptatem non occaecati. Velit illo assumenda suscipit. Atque enim eos aut occaecati accusantium.', 'Illum assumenda et possimus ut occaecati. Debitis non vitae harum ut quo itaque voluptas quod. Aut qui ut ea. Blanditiis rerum natus ex.', 'Itaque doloribus quia corporis. Quia neque aut saepe vitae aspernatur ad blanditiis.', 'Autem delectus ducimus consectetur maxime amet. Necessitatibus qui officiis autem. Earum non tempora fugiat officia ut recusandae. Culpa ipsa culpa sit ullam recusandae corporis ea.', 91, 'Rp2.500.000 - Rp3.000.000/bulan', 'Gg. Bahagia No. 628, Probolinggo 34967, Sumbar', '2007-08-19', 'tidak ditentukan', 'pertanian', 5, 'open', 'full-time', '09d0cb7916c50563639ba7bef023489b.png', '1984-01-22 19:44:42', '1981-01-11 03:50:38'),
(30, 'et assumenda saepe', 'Quia quia qui ea qui saepe est. Autem adipisci esse vitae tempora.', 'Eos esse aut assumenda qui quo rem. Velit cumque at aliquam recusandae aut quia. Non sapiente reprehenderit et voluptas fugit. Perspiciatis et et aut eum praesentium.', 'Quisquam est et maiores in est qui. Consequatur accusamus exercitationem excepturi dolorem. Quidem pariatur consequatur deserunt cum aut. Debitis illum porro eos doloremque quis voluptatem deleniti.', 'Ut sit modi iusto. Culpa eius fuga quia sunt. Autem rem consequatur nesciunt maiores voluptatum laborum.', 22, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ds. Laksamana No. 988, Bontang 92124, Kalsel', '2011-05-07', 'tidak ditentukan', 'pertanian', 24, 'closed', 'full-time', 'a459c058ca24fba6494c61d676e0cf15.png', '1970-07-25 12:18:26', '1979-06-10 16:28:07'),
(31, 'quaerat aliquam officia', 'Velit molestiae omnis sit blanditiis explicabo quia qui. Sit quia veritatis eos et. Itaque nihil rerum explicabo numquam aut in deleniti. Mollitia iste fuga iure et.', 'Et officia repellat alias labore temporibus fugit. Rerum ut a officia voluptatem. Veniam et non ad rerum deleniti praesentium soluta. Ratione quia ut at blanditiis.', 'Cumque voluptatem at eaque quae mollitia aliquam sunt. Error reiciendis ut temporibus voluptate ratione non. Quas laborum et quia dicta.', 'Doloremque nesciunt minima repellat. Atque ea a delectus dolores. Labore nam facere nisi.', 69, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Umalas No. 727, Ternate 28471, Maluku', '2021-11-09', 'perempuan', 'perikanan', 38, 'open', 'full-time', 'fe276b9ede9397b8481c17e6ad77e6a3.png', '1982-12-05 11:44:53', '2012-09-12 03:50:45'),
(32, 'enim et quia', 'Sed id et est iusto quod voluptas. Eveniet officia perferendis est optio molestiae doloribus qui sunt. Dolore nobis quia minus qui pariatur quo aut.', 'Qui illo necessitatibus ea dolorem voluptas atque amet. Explicabo molestias atque perferendis. Sit quisquam esse voluptatem voluptatem laboriosam nesciunt quidem molestiae.', 'Ipsam illum possimus at rerum dolorem voluptatem. Voluptatem esse distinctio minima ut omnis. Qui veniam ea dolorem aut qui illo aut. Animi quia cupiditate voluptate fuga placeat neque.', 'Culpa labore provident nam dolore quia nostrum officiis. Autem a est aperiam iste voluptatibus neque. Tempora voluptas reiciendis a et.', 64, 'Rp2.500.000 - Rp3.000.000/bulan', 'Psr. Baing No. 876, Banjarbaru 86069, Papua', '1979-06-19', 'tidak ditentukan', 'perikanan', 24, 'closed', 'full-time', '54bafb24b97969fb711276d77a68bfa3.png', '1972-06-17 07:13:14', '1985-09-20 14:18:49'),
(33, 'molestias porro et', 'Laudantium neque dolorem quia inventore. Voluptas vel vel illo tempora. Debitis quia et consequatur excepturi. Laborum autem consequatur modi qui.', 'Iure dolorum minima qui. Inventore non quam dicta. Eum nostrum et et quisquam dolor voluptatem aut. Culpa tempora laborum saepe voluptatibus fuga excepturi.', 'Tenetur sit accusamus modi ut iste beatae voluptatem cupiditate. Debitis natus rem autem. Aspernatur saepe velit exercitationem.', 'Cum ut molestiae exercitationem sunt ducimus voluptatem nisi qui. Sunt consequatur quia qui earum et optio sapiente. Sint quaerat illum dolore et rem id dicta.', 57, 'Rp2.500.000 - Rp3.000.000/bulan', 'Kpg. Samanhudi No. 656, Balikpapan 40058, Babel', '1982-04-17', 'tidak ditentukan', 'perikanan', 37, 'closed', 'part-time', 'adcc9f853e1e79fc337964f6b889f1f5.png', '2011-07-27 18:06:28', '1988-02-20 02:50:22'),
(34, 'sunt nobis beatae', 'Iusto a commodi vitae doloremque voluptatibus. Consequuntur doloribus itaque ut dignissimos placeat quia. Voluptatem ut aut voluptatem doloribus.', 'Quis qui impedit cupiditate quia praesentium quo. Qui qui consequatur nemo quisquam hic pariatur facilis.', 'Est ut id tenetur quae aut eum et in. Aliquid quas aut dolores consequatur labore enim natus in. Cumque ea ullam aut non nihil dolore nesciunt.', 'Fuga odit consequuntur ea laboriosam. Eius aspernatur magnam eaque explicabo eos non. Repellendus ad sint quo quos praesentium ut.', 32, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Sudiarto No. 814, Tanjung Pinang 20638, Sumsel', '1981-10-11', 'laki-laki', 'perikanan', 2, 'open', 'full-time', '910ff5e3a2ed8ea56ce01e6c055bad3a.png', '1998-08-16 05:13:30', '2009-11-12 09:47:19'),
(35, 'sunt sunt exercitationem', 'Soluta vero harum debitis impedit. Dolor consequuntur eveniet non culpa. Vel consequatur qui totam consequuntur non nemo omnis. In sequi repudiandae veniam consequuntur eos repellat aperiam.', 'Perspiciatis aspernatur dolores fugiat dolor iure atque. Aut repudiandae omnis dolor deserunt est ratione est. Accusamus numquam autem dolore quia soluta provident animi.', 'Quod ipsam suscipit harum et omnis. Itaque alias animi dolores ut id unde aut. Dolorum consequatur quidem vel omnis et consequatur.', 'Veritatis qui officiis nam aut. Architecto et consequatur non ipsam tempore et odio. Deserunt qui ipsa aut rerum culpa corporis sed.', 39, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Pintu Besar Selatan No. 721, Padangsidempuan 34537, Sulsel', '1972-03-16', 'tidak ditentukan', 'pertanian', 39, 'closed', 'part-time', '6034251d6cadc4f1b52cfa187d981c41.png', '1971-10-14 19:13:56', '1990-04-12 10:39:25'),
(36, 'qui illum et', 'Ut nostrum et doloribus accusamus quas. Qui nihil nisi quidem molestiae necessitatibus voluptate et rerum. Error perspiciatis placeat quam laudantium illo.', 'Blanditiis nisi deserunt expedita et est eum. Esse beatae minus placeat ducimus dolores esse. Eos animi nihil eum. Ipsam sint aut sit sit illo. Id ex sint atque tenetur.', 'Esse sed repellendus officia veniam. Itaque eligendi iure provident totam sequi tempora dolor aliquid. Est sit odio dolorem voluptatem.', 'Et optio quidem voluptate quibusdam. Aliquam error odio est eius debitis dolore. Voluptas nihil inventore et ratione sint.', 57, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Ciwastra No. 642, Pematangsiantar 15595, DIY', '2020-02-24', 'tidak ditentukan', 'pertanian', 26, 'closed', 'full-time', '51af718f2c6586b041813e447edcf86b.png', '1970-07-09 09:40:33', '2007-09-17 05:15:03'),
(37, 'excepturi natus qui', 'Facilis ut similique quisquam eum rerum excepturi sunt. Cumque voluptatem sunt voluptatum at. Velit qui labore officiis minus asperiores commodi.', 'Aliquam amet consequatur autem porro totam dolorem harum porro. Quas et sunt est quia aut. Tenetur qui suscipit sed nostrum ut. Odit possimus excepturi qui.', 'Illum deleniti dolorem sint ut quidem. Omnis natus deserunt provident ut ratione qui blanditiis voluptatibus. Est ducimus ut nihil fugit.', 'Dolores numquam adipisci laborum rerum et. Excepturi aspernatur consequatur animi amet sit. Incidunt qui ipsa velit aut inventore esse.', 58, 'Rp2.500.000 - Rp3.000.000/bulan', 'Dk. Kiaracondong No. 238, Jambi 98203, Kalteng', '2020-06-01', 'tidak ditentukan', 'pertanian', 44, 'closed', 'part-time', '398c24ae70ad1c7aede566d8ec8e85e7.png', '2005-04-30 19:27:20', '2020-10-22 06:43:47'),
(38, 'porro vel voluptatum', 'Est voluptatem fuga commodi dolores veniam in. Quia eligendi dolore sint. Sunt quasi omnis ut animi rerum omnis. Ut velit qui totam ut aut. Itaque aut ut rem odit.', 'Officia fugit consequatur ut et. Suscipit dignissimos quam cumque et. Odit laboriosam aspernatur aliquam in voluptatibus et. Ex illo sed ut deserunt ad.', 'Laborum in veritatis voluptatem non non laboriosam modi laudantium. Unde quasi consequatur assumenda explicabo mollitia. Tempora quis consectetur illum harum.', 'Atque tempore quas dolores optio reiciendis quod culpa suscipit. Harum facilis tenetur quibusdam laboriosam sequi. Non autem vero qui molestiae culpa. Ut error quia aut tenetur laboriosam delectus.', 47, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Baan No. 682, Tanjung Pinang 63806, DIY', '1981-11-03', 'tidak ditentukan', 'perikanan', 34, 'open', 'full-time', 'bc701c2545f534f8a827a9dbea4ccf11.png', '1970-10-17 13:19:34', '1987-10-14 00:33:09'),
(39, 'quasi officiis debitis', 'Aut maxime delectus aut veritatis. At eius ut sed non quis. Iure perferendis blanditiis impedit aperiam nemo qui.', 'Ipsam rerum amet alias eum et id. Rerum debitis quia reiciendis architecto eius ducimus qui. Placeat facere consectetur ipsam inventore ut. Quis molestiae dolores sequi rerum et.', 'Corrupti eos ea delectus et maiores qui. Vitae non et et consequatur. Enim amet nisi qui facere velit repellendus et adipisci. Consectetur enim eos aliquid voluptatibus.', 'Modi est tempore eaque eius qui. Quia non commodi vitae impedit. Qui dolores harum voluptatem ipsam.', 26, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Bakau Griya Utama No. 346, Dumai 47742, Sulbar', '2020-01-17', 'perempuan', 'perikanan', 24, 'open', 'part-time', '96cdae97ea7a1094908943e78e23fcd2.png', '2001-12-25 05:04:56', '1996-09-18 05:24:35'),
(40, 'facere distinctio est', 'Et aut eligendi dignissimos assumenda et. Ratione repellat quia ut doloribus quo.', 'Voluptatem eius aliquam nulla doloribus quisquam. Alias dignissimos earum sed quia excepturi aliquid dolores et. Est facere et quibusdam repudiandae. Omnis doloribus laudantium animi aut dolorem id.', 'Aut facilis dignissimos quis. Odit aut modi occaecati quasi at sequi quod. Quisquam est hic necessitatibus placeat rerum. Voluptatibus tempora cupiditate recusandae.', 'Ea nemo quis commodi pariatur. Ipsa eos esse et excepturi aut quas veritatis. Est ad quis quo tempora non odio rem placeat.', 53, 'Rp2.500.000 - Rp3.000.000/bulan', 'Kpg. Yap Tjwan Bing No. 133, Pontianak 34639, Sulteng', '1996-01-22', 'tidak ditentukan', 'perikanan', 37, 'open', 'part-time', '1b31aef2f0e7b15adb62b03330c01cf6.png', '1985-04-02 21:56:45', '1981-10-02 11:38:02'),
(42, 'eos sint vel', 'Sed aut aut nisi alias minus sunt sed. Repellat quaerat dolor est. Aliquam unde aut accusantium. Beatae aut corrupti fuga id.', 'Aut atque repellendus a voluptas aut voluptate. Sed repudiandae rerum eum et a. Ipsum est est sit qui.', 'Ratione hic sint aut deleniti quia. Est inventore vel voluptatibus eveniet. Eos deleniti enim dolorem soluta est error.', 'Aut eos molestias qui consequatur vero consequuntur. Harum impedit nemo officia non. Quo soluta voluptatem necessitatibus ab necessitatibus. Sed blanditiis cum illum nisi et eos earum.', 42, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Baranangsiang No. 922, Administrasi Jakarta Barat 88523, Aceh', '2004-11-09', 'tidak ditentukan', 'pertanian', 12, 'closed', 'full-time', '25d2fa212bc5608a8b058f41d504cf24.png', '2002-08-09 07:19:59', '2004-02-08 17:22:06'),
(43, 'consequatur esse eos', 'Minima porro molestiae non eaque provident ut. Facilis eum eos magnam omnis aut dolorem. Dolores asperiores nam totam occaecati repudiandae facere.', 'Inventore temporibus quam optio aut occaecati. Deserunt distinctio delectus nemo eum.', 'Non quam possimus alias. Autem ut sunt et inventore. Consequatur consequuntur ipsa ipsam atque consequatur. Tenetur quos id ut atque.', 'Nisi magnam et est ea. Voluptas quis neque quo expedita deleniti id ut ullam. Officia unde nisi quos cumque qui nisi. In corporis unde nulla libero nostrum occaecati maxime et.', 34, 'Rp2.500.000 - Rp3.000.000/bulan', 'Dk. Tambun No. 872, Malang 35875, Aceh', '2001-06-29', 'perempuan', 'pertanian', 21, 'open', 'full-time', '65ad14b29fa9577d89c37b691c8b7e26.png', '1971-08-08 13:20:00', '2005-06-15 08:56:46'),
(44, 'qui voluptatem praesentium', 'Assumenda explicabo eos temporibus nemo rerum ab sint. Dolorum deserunt quisquam voluptatum saepe id aliquam.', 'Officiis exercitationem in eum. Eum fugit voluptatem sunt asperiores. Nihil ipsa nam at et recusandae dolor temporibus.', 'Cumque est minima quia rerum id voluptatum blanditiis. Quia minus ut voluptas eum vel. Aliquam ipsum eum ut id consequatur.', 'Fuga qui accusantium tempora accusantium ea voluptatem soluta. Nemo qui cupiditate beatae placeat maxime ad dolore. Voluptate blanditiis dolores aut doloremque velit laborum animi.', 42, 'Rp2.500.000 - Rp3.000.000/bulan', 'Kpg. Rajawali Timur No. 124, Kendari 84673, Bengkulu', '2011-05-26', 'perempuan', 'perikanan', 38, 'open', 'full-time', '9cdb69ef94fda2f43ec4d27cc2a9eec5.png', '1992-08-05 16:55:18', '1971-12-23 16:00:37'),
(45, 'sed nostrum minima', 'Consequatur cum laborum omnis tenetur qui mollitia. Reiciendis sed et sit repellat dolorem blanditiis deserunt. Praesentium ab et mollitia eum in eligendi.', 'Laboriosam numquam eos accusamus rerum molestiae quaerat ut. Ut quia voluptatibus nobis. Repellendus voluptatem vero nulla amet accusantium fugiat.', 'Doloribus ab ad illo ut. Facilis maxime illum non rerum ut qui delectus facere. Quam eligendi rem occaecati cumque.', 'Ipsam vero unde quam voluptas vero. Voluptatem minus optio iste et. Molestias molestiae nam tenetur delectus ullam. Consequatur voluptatem facilis est quasi consectetur.', 63, 'Rp2.500.000 - Rp3.000.000/bulan', 'Kpg. Ikan No. 507, Solok 97726, Bengkulu', '1973-06-23', 'laki-laki', 'perikanan', 36, 'closed', 'part-time', 'dd047aece97b9c5e5bad9edca3151f6d.png', '1971-02-03 14:22:35', '1990-10-10 22:46:14'),
(46, 'quod eligendi sed', 'Nemo dolores non cupiditate dolore. Exercitationem est delectus doloribus aliquid cum tenetur.', 'Velit quisquam reprehenderit saepe illum. Pariatur reprehenderit deleniti quas et ad laborum et. Explicabo quod et sequi sit ipsa dolores et. Et neque quidem rerum aliquid.', 'Unde vero quia sit nisi voluptatibus mollitia veritatis. Debitis at quia dignissimos ad eum. Debitis rem quos consequatur dolorum sit odio.', 'Magnam dolorum eveniet amet qui voluptatem ea. Velit enim itaque hic et inventore quisquam id. Molestiae voluptas nulla modi enim.', 63, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ds. Bakhita No. 415, Batam 77471, Maluku', '2021-06-13', 'tidak ditentukan', 'perikanan', 34, 'open', 'part-time', '71f66caa4db45f471fff167ad75bbb42.png', '1988-06-28 02:54:25', '2010-08-05 22:59:02'),
(47, 'porro tenetur et', 'Minima doloremque sit ipsa quia tempora porro. Sed deserunt qui architecto vero dicta. Quia sint facilis accusamus asperiores architecto. Sed dicta cum dolorem quo.', 'Enim reprehenderit dolores et. Sed omnis incidunt quae facere magnam. Consequatur ad in accusantium aut iusto.', 'Harum possimus dolore aspernatur. Inventore non est autem quia. Et quis illo qui. Soluta quo blanditiis praesentium tempore eius dolorem facilis.', 'Est doloribus et placeat tempora magnam. Ut nobis sapiente minima et. Aliquam voluptas tempore voluptas sapiente nihil quas. Placeat temporibus aliquid vitae libero dolorum vitae eius.', 39, 'Rp2.500.000 - Rp3.000.000/bulan', 'Jr. Bakaru No. 7, Tangerang Selatan 54926, Kepri', '1973-01-01', 'perempuan', 'perikanan', 37, 'open', 'full-time', 'eb049c7db61fe2b1764c70faf4786eac.png', '1993-08-26 08:53:54', '2018-06-17 22:24:11'),
(48, 'aut ut rerum', 'Non possimus at autem minima qui dignissimos autem. Qui commodi adipisci magnam culpa aperiam eligendi tempora.', 'Repellendus ullam cupiditate vel ut ea in itaque. Quaerat consequatur quis tempore ut. Minima consequatur quibusdam voluptatem nesciunt quas.', 'Qui qui ut omnis. Sint eum vitae dicta quibusdam quisquam quia. Dolores omnis qui sit soluta. Quia in molestiae veritatis molestiae ipsa aut.', 'Praesentium dignissimos eius ut ut optio nulla nulla cupiditate. Facere repudiandae sit ut magni. Nihil illo et quod natus.', 73, 'Rp2.500.000 - Rp3.000.000/bulan', 'Gg. Labu No. 543, Payakumbuh 90263, Kalteng', '2020-06-01', 'tidak ditentukan', 'perikanan', 33, 'closed', 'part-time', '373b773f0e3a6d7fda1e2784c1828129.png', '1985-10-20 22:34:32', '2003-02-12 13:59:36'),
(49, 'aut temporibus debitis', 'Sunt qui officiis quasi beatae. Corporis voluptates nisi animi. Occaecati rem iusto vero dolor architecto. Et aliquid fugiat et sint quo tempora excepturi.', 'Consequatur molestiae esse voluptas accusantium quis qui omnis. Aut deleniti impedit laudantium praesentium cupiditate. Aut distinctio doloribus occaecati accusantium magnam qui.', 'Pariatur cumque repellendus ad nemo voluptas enim voluptatem. Ex neque ut sint qui. Magni distinctio ipsam distinctio est.', 'Dolorum possimus dignissimos et iure qui et. Voluptatum et at perferendis delectus dolorem exercitationem. Odio sapiente quia quia vel non eveniet ea. Omnis neque quia doloribus amet rerum natus.', 83, 'Rp2.500.000 - Rp3.000.000/bulan', 'Ki. Bata Putih No. 387, Cimahi 18490, Riau', '2020-11-19', 'tidak ditentukan', 'pertanian', 26, 'closed', 'part-time', '9b42b789c44fed79f2a591ae6caa852f.png', '1991-08-22 06:35:32', '1992-07-08 03:31:46'),
(50, 'iure rerum labore', 'Temporibus nemo sed illo illo fuga. Nostrum sed voluptas in ex provident doloremque. Repellat porro eum rerum veritatis expedita quis magnam voluptas.', 'Corporis excepturi repellendus nihil ea. Qui sed odio quis non soluta quo. Soluta ipsam repudiandae sunt quas dolorum ut earum. Reiciendis est vitae amet eum.', 'Quia voluptatem et debitis non necessitatibus. Nobis error sint voluptates vero exercitationem. Odio nihil labore enim perspiciatis blanditiis. Facilis quidem quia at voluptates.', 'Autem accusamus vel nihil eligendi. Temporibus atque debitis non esse enim. Voluptates aut quo quibusdam possimus quo adipisci quaerat et. Quaerat corrupti consequuntur aut ea autem sapiente.', 64, 'Rp2.500.000 - Rp3.000.000/bulan', 'Dk. PHH. Mustofa No. 964, Blitar 59518, NTB', '1992-10-02', 'laki-laki', 'perikanan', 26, 'open', 'part-time', 'c9fd453ba43548cd9e6976ffdeb78625.png', '2018-08-12 00:17:50', '1980-04-10 00:45:13'),
(51, 'Jasa Panen Kebun Jeruk & Tomat', '<p>Selamat datang di XYZ Farms! Kami adalah perusahaan pertanian yang berdedikasi untuk menghasilkan produk-produk pertanian berkualitas tinggi. Dengan inovasi dan teknologi terbaru, kami berkomitmen untuk memberikan hasil panen yang optimal, menjaga keberlanjutan lingkungan, dan menyediakan masyarakat dengan makanan sehat dan segar.</p>', '<ol><li>Memanen Padi: Anda akan melakukan pemanenan padi dengan menggunakan alat seperti sabit, golok, atau mesin panen. Anda harus memiliki keterampilan dalam memotong dan memisahkan bulir padi dengan tepat.</li><li>Mengumpulkan Padi: Setelah memanen padi, Anda akan mengumpulkan hasil panen dan menumpuknya di tempat yang ditentukan. Anda perlu bekerja dengan teliti dan cermat agar padi tidak rusak selama proses pengumpulan.</li><li>Membongkar dan Membawa Padi: Anda akan membongkar tumpukan padi dan membawanya ke tempat yang telah disiapkan, seperti kendaraan pengangkut atau gudang. Dalam melakukan tugas ini, Anda harus memperhatikan keamanan dan menghindari kerusakan pada padi.</li><li>Membersihkan Lahan: Setelah panen selesai, Anda mungkin juga bertanggung jawab untuk membersihkan lahan pertanian dari sisa-sisa tanaman atau sampah agar lahan siap digunakan untuk penanaman selanjutnya.</li><li>Bekerja dalam Tim: Pekerjaan jasa panen padi biasanya melibatkan kerja sama dalam tim. Anda harus dapat bekerja sama dengan petani dan rekan kerja lainnya untuk mencapai hasil panen yang baik.</li><li>Mematuhi Prosedur Keamanan: Anda harus memahami dan mematuhi prosedur keamanan yang berlaku dalam pekerjaan pertanian, termasuk penggunaan alat-alat dengan aman dan melindungi diri sendiri dari cedera.</li><li>Menjaga Kebersihan Alat dan Peralatan: Setelah selesai bekerja, Anda harus membersihkan dan merawat alat-alat dan peralatan yang digunakan selama proses panen agar tetap berfungsi dengan baik untuk pekerjaan selanjutnya.</li></ol>', '<p>Tidak dibutuhkan pengalaman kerja &amp; pendidikan khusus</p>', '<ol><li>Makan pagi dan siang disediakan oleh mitra</li><li>Biaya transportasi Rp30.000/hari (senin - sabtu)</li></ol>', 10, 'Rp1.500.000 - Rp2.000.000/bulan', 'Berastagi, Kab. Karo, Sumatera Utara', '2023-07-15', 'perempuan', 'pertanian', 2, 'open', 'full-time', 'pexels-mark-stebnicki-2889440.jpg', '2023-07-09 00:49:50', '2023-07-09 00:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(41, '2023_06_21_164800_create_jobs_table', 1),
(42, '2023_06_21_165423_create_applications_table', 1),
(43, '2023_06_21_165826_create_skills_table', 1),
(44, '2023_06_21_170012_create_user_skills_table', 1),
(45, '2023_06_26_063622_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `notification_title` varchar(255) NOT NULL,
  `notification_text` varchar(255) NOT NULL,
  `status` enum('Sudah Dibaca','Belum Dibaca') NOT NULL DEFAULT 'Belum Dibaca',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `receiver_id`, `notification_title`, `notification_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 'Pemberitahuan penghapusan lowongan.', 'Lamaran Anda untuk lowongan kerja a nulla vel yang disediakan oleh mitra Ani Nasyidah dibatalkan karena lowongan ini dihapus oleh mitra dengan alasan tertentu.', 'Belum Dibaca', '2023-07-09 01:20:32', '2023-07-09 01:20:32'),
(2, 27, 'Pemberitahuan penghapusan lowongan.', 'Lamaran Anda untuk lowongan kerja a nulla vel yang disediakan oleh mitra Ani Nasyidah dibatalkan karena lowongan ini dihapus oleh mitra dengan alasan tertentu.', 'Belum Dibaca', '2023-07-09 01:20:32', '2023-07-09 01:20:32'),
(3, 25, 'Pemberitahuan penghapusan lowongan.', 'Lamaran Anda untuk lowongan kerja a nulla vel yang disediakan oleh mitra Ani Nasyidah dibatalkan karena lowongan ini dihapus oleh mitra dengan alasan tertentu.', 'Belum Dibaca', '2023-07-09 01:20:32', '2023-07-09 01:20:32'),
(4, 2, 'Lamaran oleh Annelis Mellema', 'Satu lamaran baru pada lowongan Jasa Panen Kebun Jeruk & Tomat diterima. Lamaran ditandai sebagai sedang diproses. Silakan kelola lamaran Anda secara berkala.', 'Sudah Dibaca', '2023-07-09 02:20:11', '2023-07-09 02:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `created_at`, `updated_at`) VALUES
(1, 'ea quis quo', NULL, NULL),
(2, 'natus omnis aut', NULL, NULL),
(3, 'sit ut et', NULL, NULL),
(4, 'id numquam voluptatem', NULL, NULL),
(5, 'nemo qui ex', NULL, NULL),
(6, 'qui in dolorem', NULL, NULL),
(7, 'voluptate impedit officia', NULL, NULL),
(8, 'temporibus nobis fugit', NULL, NULL),
(9, 'sint quia porro', NULL, NULL),
(10, 'expedita quo nisi', NULL, NULL),
(11, 'ullam velit placeat', NULL, NULL),
(12, 'voluptatem et ducimus', NULL, NULL),
(13, 'quae eaque facere', NULL, NULL),
(14, 'fugiat aliquid omnis', NULL, NULL),
(15, 'autem dolorem distinctio', NULL, NULL),
(16, 'nesciunt autem fugiat', NULL, NULL),
(17, 'quia quisquam vel', NULL, NULL),
(18, 'nostrum alias quia', NULL, NULL),
(19, 'autem doloremque doloremque', NULL, NULL),
(20, 'consequuntur rerum officia', NULL, NULL),
(21, 'non repellendus corrupti', NULL, NULL),
(22, 'ut voluptas ullam', NULL, NULL),
(23, 'sed aut doloribus', NULL, NULL),
(24, 'quo itaque veniam', NULL, NULL),
(25, 'et doloremque est', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 3,
  `pfp` varchar(255) NOT NULL DEFAULT 'default-pfp.jpg',
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone_number`, `role`, `pfp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Latif Jumadi Budiyanto S.Gz', 'bsaputra@marpaung.go.id', 'Kpg. Bawal No. 162, Singkawang 39527, Riau', '(+62) 420 8210 4958', 3, '83c5c6c4f32c2074150115bcdb16d5f8.png', '1973-01-18 13:39:06', '$2y$10$8HeZJitjVNsi7KhWPy2p2OzZCuSFolsr2qWa1cy/MsLVZitWVW/n2', NULL, '1971-01-20 19:01:49', '1978-11-12 12:08:16'),
(2, 'Ani Nasyidah', 'daliono.sinaga@gmail.com', 'Kpg. Radio No. 43, Denpasar 28261, Sulsel', '0709 5761 172', 2, '2d9b21622c11ad4d78828b6dfacd8f21.png', '2008-05-09 04:16:34', '$2y$10$Jh6W6SG/RgZVovzN0nISXehd0t/.fm5I/tDPFpz3s6gPDhRni7vxK', NULL, '1985-01-20 22:08:04', '2010-08-15 20:49:51'),
(3, 'Amalia Nasyidah S.Ked', 'paramita18@gmail.com', 'Ds. K.H. Wahid Hasyim (Kopo) No. 163, Surabaya 27924, Jatim', '(+62) 884 8741 484', 3, '5a387138edec010a9ae56ec1cc20223b.png', '1974-09-26 02:22:07', '$2y$10$hgJbgBlmgN323qIPMsBEKuwPKhN3GFm8t7Qw9O9EKNTT0w23BEtoy', NULL, '2013-10-02 22:36:54', '2002-02-04 17:04:37'),
(4, 'Ratna Yolanda', 'purwanti.rahmi@sinaga.biz', 'Ds. Cut Nyak Dien No. 774, Tual 36538, Kalbar', '0243 3161 8054', 2, '1f9fd80855568ccc83380ec529576c17.png', '1991-10-30 22:07:11', '$2y$10$RUBzN86YKthJKAqS97xqp.9197pyHoAyGI.ZDN0/dUeEB/bCl2h7O', NULL, '2000-10-03 21:21:32', '1980-02-07 08:49:52'),
(5, 'Anita Sudiati S.IP', 'devi.waskita@gmail.com', 'Kpg. Kiaracondong No. 224, Pasuruan 69322, NTB', '(+62) 746 9932 168', 2, 'd2ecb16c6631caa608180f0124cf32ac.png', '1979-11-08 00:00:56', '$2y$10$WdwCGiIRlIrqigWZaCp8F.PBY/9D9oHvBTNLPvO5tx2EETYN1h8M.', NULL, '2009-12-29 04:56:33', '1991-10-21 01:51:25'),
(6, 'Cinthia Halimah', 'cengkal.waluyo@anggraini.my.id', 'Psr. Pasteur No. 485, Metro 79681, NTB', '(+62) 486 9163 2618', 3, 'c524cfd877028324de673275804faa30.png', '1996-06-16 10:18:05', '$2y$10$ZXrQ0sVthOV1e2ysc0wzwOJKr.lgBn.nsiii1i9hnMSA.TrbRGM36', NULL, '2020-04-20 10:45:55', '1990-12-26 06:10:38'),
(7, 'Mahesa Satya Santoso', 'simanjuntak.genta@gmail.co.id', 'Kpg. S. Parman No. 913, Batam 82113, Sulut', '(+62) 26 7480 2315', 3, '1a881b76566dd518eb8d68bb20e29b90.png', '1982-01-08 01:46:29', '$2y$10$RpU8BroKAcyuqFPXWVwTju5EGv/hDTSuF0TRHLc9O4XBQKbLQWQ1G', NULL, '1981-12-18 13:12:20', '1975-12-16 08:48:11'),
(8, 'Maida Farida', 'widiastuti.olivia@yahoo.co.id', 'Gg. Tambun No. 748, Makassar 90994, Bali', '0609 8630 3792', 3, 'd6b4597e778cd1eee8984c054791bda4.png', '1995-07-12 11:10:37', '$2y$10$wRNOA0jenWJwcjIPMeDUsuIkyurXW3myUT7B5dDK.deIaWZ.K.eYC', NULL, '1972-04-25 06:12:42', '2014-09-27 03:40:56'),
(9, 'Rangga Paiman Prasetya', 'nashiruddin.safina@agustina.or.id', 'Gg. Tambun No. 422, Semarang 61593, DIY', '(+62) 20 1794 590', 3, '1fd6e18e8dee8a28c4226caef3c7cb1f.png', '2017-01-28 21:42:57', '$2y$10$MVb6UxeS18jkgiIytIAML.m5kPezmiRKjEWi55mpzCpGegaLpjuKK', NULL, '2005-09-21 14:40:26', '2011-04-28 23:22:56'),
(10, 'Rachel Pratiwi', 'knugroho@gmail.com', 'Psr. Ujung No. 609, Sukabumi 88003, Sultra', '0290 1278 635', 1, 'cf351aa6dca8c469d1985f60443d3a36.png', '1994-08-07 07:22:06', '$2y$10$rBdeGx7zq/zJxij6cgDE5uP4whyTIr26FXM8O7rZqx5p.KtneQGFq', NULL, '1980-02-23 09:32:16', '1981-02-11 14:58:02'),
(11, 'Unjani Ratih Utami', 'putri.fujiati@fujiati.tv', 'Jln. Yosodipuro No. 172, Palangka Raya 98191, Bali', '(+62) 813 195 322', 3, '227a58cfb1216017c1067d465eff24b4.png', '1971-01-27 23:30:40', '$2y$10$WIG79/zfo0o0tRYzW95oauSrf7760uvVrkth3aSHqZ7wFVQc.OvTC', NULL, '1994-08-21 13:06:55', '1976-05-29 21:34:41'),
(12, 'Victoria Purwanti', 'riyanti.bajragin@hutagalung.biz', 'Jr. Otto No. 3, Kediri 85813, Maluku', '0630 6543 9392', 2, '1da6373b9c9d0975062cabd2218abf35.png', '1984-07-31 14:21:01', '$2y$10$fFNNaVF/qnv.pSaeKUWesOGf3/jS7AR3ONOTm19g4qNt/Ap6DJZHG', NULL, '2006-07-10 04:55:59', '1986-12-01 15:20:10'),
(13, 'Capa Bajragin Halim M.TI.', 'yono.aryani@yuliarti.org', 'Kpg. Honggowongso No. 951, Pagar Alam 65239, Lampung', '(+62) 885 1496 9734', 2, '7f9f2f25eef735818d0bbf8701f32a6b.png', '1987-01-14 19:17:09', '$2y$10$IAzABdiKR.Yppn6ryA/lGuAWoIaGoxG31PG2ZHWuOvSiapE4HE6qu', NULL, '2010-05-19 19:31:46', '1987-07-19 14:58:17'),
(14, 'Raden Gunarto', 'omaryadi@yahoo.com', 'Jr. Achmad No. 954, Binjai 90246, Banten', '0855 2037 961', 3, '3c27bc6db5ec08413fa99a987fa126df.png', '1996-12-12 05:29:36', '$2y$10$69oKxgzOq29jUaFRe10hZ.oqHbT1xllJCXj8BhUwZEurbAnW/p5b2', NULL, '1999-12-26 22:48:38', '1989-10-29 01:27:02'),
(15, 'Putri Nasyiah S.H.', 'emil.mahendra@yahoo.co.id', 'Gg. Lumban Tobing No. 94, Malang 75072, Aceh', '0379 2859 346', 1, '8c7b516c2543cb33aaebe7bd87fb3217.png', '1995-11-01 12:59:02', '$2y$10$Xfa4Izuzv5kujb8U8uybNORh3XiQKP4aSIP6/maZZBZove5EHaYM2', NULL, '2021-02-04 15:09:11', '1970-05-19 10:27:14'),
(16, 'Azalea Lailasari', 'hariyah.farhunnisa@sihombing.org', 'Ki. Ters. Buah Batu No. 321, Surakarta 31854, Sulut', '(+62) 897 2579 980', 1, '00880b5909431c6b22c8379813a3e604.png', '1997-08-28 19:33:57', '$2y$10$J7vOjVguSwFLM./jxGaCq.2EmYatyYHdZ19s/ZtfEq4EOLkGrAaRG', NULL, '2013-08-30 10:50:59', '1996-12-02 23:26:05'),
(17, 'Jaka Sitorus S.T.', 'tina02@yahoo.co.id', 'Dk. Ekonomi No. 13, Parepare 18666, DIY', '0947 7110 2507', 1, 'ca9706ae90e25c4fa8c3c1190fc714b4.png', '1982-01-31 11:57:53', '$2y$10$KxWkwY3mZXsPhbbRbHQVBuIzSpTRAZdtLc5u8wNe51ghMCu6MVEhe', NULL, '2012-05-29 10:31:14', '1986-12-20 09:51:15'),
(18, 'Hamima Pia Farida', 'safitri.cengkir@wibisono.biz', 'Jln. Ikan No. 126, Administrasi Jakarta Pusat 88173, Kepri', '(+62) 802 4887 0969', 3, '268d556d6158bf76ac8e1f811ca44642.png', '1978-09-13 10:14:06', '$2y$10$FfyZMn3mFk/bgECH7AJn7urEbPfkaq4L1pqEnqFeMhoZpjVNk86lC', NULL, '2008-11-23 16:33:02', '2009-11-09 02:28:28'),
(19, 'Malika Malika Prastuti M.Pd', 'pkuswoyo@yahoo.co.id', 'Ds. Kiaracondong No. 674, Pariaman 79079, Banten', '(+62) 331 9629 690', 1, '129f2b0bb681b0460ad1dd0eecc0b821.png', '1999-07-24 02:47:37', '$2y$10$lbCY5J0fGJWzZv/NOfw12uE0K5gqV7aQf8yj7I38C24LizVP5oE.C', NULL, '1974-11-30 07:08:01', '1970-03-05 14:25:35'),
(20, 'Ifa Winarsih', 'jaswadi55@gmail.co.id', 'Ki. Qrisdoren No. 550, Tasikmalaya 22272, Riau', '0892 679 849', 1, '8fdb2e273a82e1a5cedc518960a819c0.png', '1995-10-09 15:27:45', '$2y$10$Xam7JXkrSFSu..sJCU574uJE49cpgSCT8blugA00Rhwtxn7WP51ai', NULL, '2023-05-04 20:10:30', '1973-12-22 19:36:23'),
(21, 'Lidya Haryanti S.E.I', 'raihan.saputra@yahoo.co.id', 'Jln. Sam Ratulangi No. 479, Administrasi Jakarta Pusat 20287, Jabar', '(+62) 890 0637 847', 2, '4285bc61bea1522caf621192ca9da666.png', '2017-12-25 17:42:15', '$2y$10$SJMvI7/74DQU2OKsfSDqz.Ha3qnyJntvOXdY1E5CakyS7/GUiFkUS', NULL, '2011-04-22 14:22:33', '1981-08-08 19:13:26'),
(22, 'Eva Jelita Melani M.TI.', 'eka38@gmail.com', 'Psr. Wahidin Sudirohusodo No. 193, Bengkulu 57097, Sulteng', '(+62) 212 9310 0249', 3, '9083dc8b508134eabb6370ba0b733af6.png', '2013-12-30 11:37:44', '$2y$10$uLjn/61d2BYdLWkyZKSqAu.6VsYO3KSoMMdRieT9fzwJGQryF4iIK', NULL, '2012-04-15 08:31:42', '1993-07-16 15:45:44'),
(23, 'Hasta Utama M.Ak', 'laras78@yahoo.com', 'Dk. Camar No. 523, Gunungsitoli 17146, Banten', '(+62) 28 2004 0409', 1, '97833b5732c39302cbe1be6dd29aa3dc.png', '2000-06-24 08:19:38', '$2y$10$fNeSk4eNXBVGa/R4/tJHe.y2skTwK5PG2sHgT0OG7HDvWGX7jnUvu', NULL, '1978-01-24 06:20:45', '1990-01-05 14:08:06'),
(24, 'Calista Wijayanti S.IP', 'mkusmawati@mustofa.org', 'Psr. Ki Hajar Dewantara No. 189, Tual 50674, Jatim', '0209 1701 781', 2, '716118e492cf8cdc90de4e0785b52f64.png', '2017-07-11 20:19:39', '$2y$10$IVayMkze4Ap301ePIjYpQOcrU58PBZtnyO38BsDpXtNdh5fy6bBZq', NULL, '1979-01-07 08:31:53', '1997-08-17 18:33:24'),
(25, 'Jarwadi Saefullah', 'ganggraini@padmasari.desa.id', 'Jr. Salak No. 221, Manado 58391, Sulteng', '0955 0705 8252', 3, 'e8fcbe5ec95f255d95839e4d8049d230.png', '2017-08-12 02:09:06', '$2y$10$NbwI8hEoXTz6ck9B56YBRuH8TIMWrIwO0kzmgGuLeW/zC/MVPTd7e', NULL, '1992-10-16 20:00:56', '1970-03-14 23:41:30'),
(26, 'Nilam Namaga S.I.Kom', 'ulya08@pangestu.my.id', 'Jln. K.H. Maskur No. 142, Kediri 17984, Jateng', '0682 8937 568', 2, '5a66cb762b546b6856093dfa1d5ae652.png', '1985-11-20 07:09:36', '$2y$10$k7cmbtLVewC69SHWgkE43OHGJdSCv4qGzoZaPt7bXHq8u0A9Kg/jG', NULL, '1998-02-03 13:52:53', '1975-10-10 17:34:38'),
(27, 'Febi Clara Susanti', 'salsabila.sihombing@yahoo.co.id', 'Psr. Banceng Pondok No. 253, Tebing Tinggi 33095, Sulsel', '0366 0612 196', 3, '6c021d7d0c9da7f6c450fcd2ff5c7497.png', '1990-10-19 01:28:58', '$2y$10$Ux9zcn9X8l/NrT.rXODmHulSrPsLc92BUNkbnu5EoP8ClIUJhV1q.', NULL, '2020-10-08 12:57:14', '1992-01-20 17:01:41'),
(28, 'Dinda Wirda Winarsih S.Ked', 'umay.gunawan@gmail.com', 'Jln. Umalas No. 740, Pariaman 97519, Kalteng', '0927 5330 326', 3, 'aaf869b089869c99c98e776c8985d88d.png', '1982-06-23 06:51:13', '$2y$10$Ny7t8QX0.F6ynOoQfObcveKZZNb9Q.ycE5tCyAmUdRWp1cWrDY1rq', NULL, '2004-04-11 05:50:41', '1972-07-06 23:37:05'),
(29, 'Hasna Nasyidah', 'napitupulu.tami@yahoo.co.id', 'Jln. Ekonomi No. 821, Lubuklinggau 41164, Riau', '(+62) 509 7150 6786', 2, '636bdaff3298d902abfdd1ffc780d3eb.png', '1974-06-24 06:02:46', '$2y$10$qjAnQUkEoYpJOhBmsMQJHeRfH9.slIh97ClpkmewUExBPjsx7Wwdq', NULL, '2014-01-07 20:20:52', '1972-12-19 18:18:24'),
(30, 'Titi Titin Padmasari S.IP', 'tania16@yahoo.co.id', 'Gg. Mahakam No. 630, Solok 11637, Pabar', '(+62) 491 5944 155', 3, '10916a8aa72c81ca1016ca4e28cd54e6.png', '1995-03-16 10:46:49', '$2y$10$mD3JNEbMlqdR3BJEpxcfSuqckM1q2nkY1GnWtSxfHaIrTRpvlhj1u', NULL, '2002-02-21 05:06:29', '1987-12-30 04:43:16'),
(31, 'Ayu Fitria Haryanti', 'rrahayu@oktaviani.com', 'Dk. Cikapayang No. 788, Padang 58423, Sumut', '023 4792 8572', 3, '1695182d16b7ffcbd8d150de15186972.png', '1975-04-27 11:46:19', '$2y$10$mUgu4d2HoVxH/XtXEmUHs.CbgLVVXSy86t6OBJKq3d3x8H.bPSkm2', NULL, '1997-08-09 23:55:33', '2008-02-24 08:11:06'),
(32, 'Betania Rahayu', 'dnovitasari@melani.desa.id', 'Ki. Bakit  No. 206, Tebing Tinggi 43733, NTT', '029 1818 6869', 1, '33b14471f473e5a9d42285255950df9e.png', '2015-09-15 01:19:30', '$2y$10$Ysq/p2dUwWkhuV8hxq7uSOpSrSeWvkzf/zmB4AD5abD9diPKILtZW', NULL, '2003-01-21 13:43:43', '1986-01-30 10:11:38'),
(33, 'Eman Dabukke', 'yolanda.ulva@yahoo.com', 'Jr. Basuki No. 326, Gorontalo 71873, NTT', '0678 3485 5220', 2, '4e9e97e44f44503e7bf6c36c867ba295.png', '2003-01-05 02:21:42', '$2y$10$OepHct2G/JQvrH6tSRpm6eAC.al5.TcIKdBXoAfW7R/UEQSBYRGtG', NULL, '1977-03-14 17:48:55', '1997-03-10 17:27:38'),
(34, 'Ivan Hidayanto', 'nasyiah.sadina@yahoo.com', 'Gg. Abdul No. 976, Tanjungbalai 18898, Pabar', '0977 0908 479', 2, '638bbea6771cb99b094e14afe49559d6.png', '2021-04-13 16:44:44', '$2y$10$OEmJkKfVfykhYJNM7/v0ueMEPEIOph.Ab3vRxi4183nhI/T8nJ6Hu', NULL, '1987-04-05 16:03:34', '1992-09-12 22:29:33'),
(35, 'Salimah Bella Aryani', 'ayolanda@yuniar.go.id', 'Ki. Monginsidi No. 784, Pontianak 64081, Riau', '(+62) 281 8741 7250', 1, '2f71614615bb0b5a7151e33682cea785.png', '1987-04-26 10:06:10', '$2y$10$VSIp6cXRZ8oxJT..UwMGcO9zfkFU.mCDpR/fCpYFJaTY8PI2XNvRK', NULL, '1982-09-02 22:16:28', '1981-06-23 09:12:04'),
(36, 'Cayadi Hamzah Anggriawan M.Pd', 'ubudiman@yahoo.com', 'Psr. Batako No. 732, Bandung 16423, DKI', '0730 4885 844', 2, 'f83063476e1c3cb81ed2721d468a6bbb.png', '2019-08-11 01:16:38', '$2y$10$uqnXjdMH46fBOz44nVVQd.9Dbxjg1v0L1cvhWoTZdomnclJtZ9lmi', NULL, '1988-02-16 08:29:23', '2016-12-30 01:06:46'),
(37, 'Sakura Vanesa Mayasari S.Psi', 'lpurnawati@gmail.com', 'Gg. Kartini No. 130, Bukittinggi 40699, Jambi', '0979 7203 7308', 2, '9826f7518fbde99224f0564adc87bd41.png', '1977-04-14 20:56:11', '$2y$10$9A11op7iNduZFXA65625YuPFewQ4fD6IVfiZV0gTidSMhqW6o6wTO', NULL, '2003-06-24 20:43:51', '1986-04-28 14:23:50'),
(38, 'Suci Hasanah', 'najib.nasyiah@latupono.net', 'Dk. Siliwangi No. 692, Pekalongan 46634, Aceh', '(+62) 789 8303 8975', 2, '1132d7ea8b3a8e7b212c40de8139ac60.png', '1982-01-31 00:27:11', '$2y$10$LVy4OpwYHXgL0htuYCNZDuBTxpLMq0Aor2VIDi6VN1DJ3hT.ULFsK', NULL, '2009-01-17 16:58:17', '2017-07-30 10:08:15'),
(39, 'Darmana Kurniawan', 'mayasari.vicky@napitupulu.biz', 'Kpg. Tangkuban Perahu No. 658, Banda Aceh 30516, Malut', '029 9313 097', 2, 'db465c00f164bda3d533275380526328.png', '2005-07-12 09:35:42', '$2y$10$87OVtSgf0QeNYyXTabCB1.8p5zPMlAoFnxwiz8qMICfBfZEvVC3nC', NULL, '2007-12-15 05:15:04', '1990-03-13 09:21:05'),
(40, 'Yono Agus Kusumo', 'cengkal58@aryani.tv', 'Dk. Sukajadi No. 260, Langsa 91219, Jambi', '(+62) 24 0086 332', 3, 'ff6a8f70a36aad90d47b541ae79bedfd.png', '2000-01-20 04:43:53', '$2y$10$pLUn9lYNcBVbLK/h4Lh3e.TcHxiGRNKYrY.JNK9sOrNm2i32YZg4y', NULL, '1982-04-27 10:23:42', '2022-06-19 23:50:32'),
(41, 'Maimunah Putri Rahmawati S.E.', 'yosef27@susanti.my.id', 'Dk. Basoka Raya No. 130, Surakarta 87995, Kalteng', '(+62) 455 4839 714', 1, 'f8e7a766e3b71a469893709dbca42310.png', '2016-07-23 17:55:18', '$2y$10$OCd6HTSHSyLyq0P9taiKj.PvfQ5921krj9HMgC32M9zn0rPAJxBXm', NULL, '1995-03-17 06:49:58', '2022-05-06 18:37:39'),
(42, 'Opung Wacana', 'dalima.sirait@hassanah.biz', 'Dk. Bah Jaya No. 554, Administrasi Jakarta Timur 27903, Aceh', '(+62) 915 9312 728', 1, '21457a176995f2a4b8587a370c37d07f.png', '1979-12-16 23:34:33', '$2y$10$UdM8LW2eXCmqP8Lf2HK6v.tjLdkwY7xAVybEKg5p1YG.hhGhprL5O', NULL, '1993-04-01 02:01:12', '1988-03-18 00:27:55'),
(43, 'Nova Zelaya Rahayu', 'tira.suryono@prayoga.id', 'Gg. Bahagia  No. 970, Binjai 72172, Aceh', '0521 2912 0252', 1, 'cfb7253dd04abb56008f9808a018c549.png', '2000-03-31 23:58:12', '$2y$10$M9chlH4cKaXvME/4gdEo5uyTPTTDQf0cIsRVMv8owc06Wa8je3x2a', NULL, '1987-09-21 19:40:17', '2015-01-02 14:41:05'),
(44, 'Latika Aryani', 'kamila78@pradana.biz.id', 'Ki. Rumah Sakit No. 665, Lhokseumawe 72345, Jatim', '0960 9023 942', 2, '7d83f7f2131a95479e6cc3d4e6ae988d.png', '1991-06-24 23:40:36', '$2y$10$p.AUwjx5fXTng/jA0VYKf.7xzKdDHzz.Enq1viOwwWtj2Hb8ooUzK', NULL, '1982-07-06 12:46:26', '2019-09-26 21:36:38'),
(45, 'Nova Maryati', 'okta.wahyuni@gmail.com', 'Jln. Uluwatu No. 377, Sorong 77416, NTB', '0899 9544 566', 3, 'd0005a2805ed49a889d6e12d3be047af.png', '2015-04-08 06:20:43', '$2y$10$woCJyT0xDq/7lWRpmxkQ1.nOLhgLxUMBsPrMTlXI4dP6eopadTGy6', NULL, '1980-02-10 19:59:13', '1972-03-02 00:28:19'),
(46, 'Kanda Radika Jailani', 'rika.mulyani@gmail.com', 'Psr. Basket No. 837, Dumai 35024, Jabar', '0303 8536 525', 3, 'bff953192e93a46eb4868721d81a11d1.png', '2002-08-24 00:46:20', '$2y$10$EY48.48JxDsCTzvsd9ZSFeNgZPbKvYHhvrWvwN3vsu6CIh9Wlwz/y', NULL, '2015-10-29 02:18:05', '1991-03-18 11:56:13'),
(47, 'Jail Galar Situmorang', 'lprasetyo@gmail.co.id', 'Ki. Rajawali Timur No. 493, Administrasi Jakarta Pusat 45919, Jateng', '0972 0348 058', 2, 'be0584417ac17b4fc5c4672d0c3876db.png', '1997-07-19 06:40:44', '$2y$10$lwgRRUXo7kxLRVzjJGuA.OynfmzYUWyW507OA1atGoTHwyGQXT1Hm', NULL, '1974-07-03 03:36:51', '1999-05-08 05:38:51'),
(48, 'Jelita Eli Nuraini', 'lestari.cahyadi@yahoo.com', 'Ds. Rajawali Timur No. 935, Tarakan 46495, Kalbar', '0490 2301 3496', 3, 'd768e73bfd20e6ac1c70ec812823e9d1.png', '2014-10-24 01:25:45', '$2y$10$Lnc5bXIi/OOMviU9N2HT1ey5zSskZhVKEXSIB9FMDfTDWIHhAs3EC', NULL, '1987-09-27 04:27:14', '2015-06-18 09:10:32'),
(49, 'Taufik Habibi', 'kmelani@gmail.co.id', 'Ki. Bank Dagang Negara No. 773, Sukabumi 97551, Papua', '020 0510 5796', 3, 'af4a4e0cd0172996fac34461eeb5ad3b.png', '1970-01-15 15:17:04', '$2y$10$XIjXq.xZ2obnjFJS12siw.0ioMLMQa3Xx/BC2PW4zNa8biYE024zq', NULL, '1976-02-10 23:35:29', '1972-01-08 00:05:34'),
(50, 'Vero Sirait S.T.', 'murti.widodo@yahoo.com', 'Gg. Bagis Utama No. 436, Pasuruan 16463, Aceh', '0545 6402 2277', 1, '16a50c5c906a91b6e8ccdec82bdc8eb4.png', '1970-05-13 04:47:55', '$2y$10$DnDGZkvO7FjfNf8XjS2YH.BcNPXp2m5VDZsub.YGSGU3aA/ijdztO', NULL, '1995-10-02 23:33:56', '1975-06-02 04:30:00'),
(51, 'Annelis Mellema', 'annelis@gmail.com', NULL, NULL, 3, 'default-pfp.jpg', '2023-07-09 07:08:30', '$2y$10$uMBhObt5GAa8KDYPA1wfwuScEScVk9ZViIkW7bUsPLT40MfIerlzu', NULL, '2023-07-09 00:08:30', '2023-07-09 00:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `user_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 9, 19, NULL, NULL),
(2, 1, 25, NULL, NULL),
(3, 1, 13, NULL, NULL),
(4, 45, 18, NULL, NULL),
(5, 14, 2, NULL, NULL),
(6, 11, 16, NULL, NULL),
(7, 25, 10, NULL, NULL),
(8, 9, 20, NULL, NULL),
(9, 49, 16, NULL, NULL),
(10, 25, 18, NULL, NULL),
(11, 25, 10, NULL, NULL),
(12, 49, 3, NULL, NULL),
(13, 22, 9, NULL, NULL),
(14, 30, 18, NULL, NULL),
(15, 45, 9, NULL, NULL),
(16, 45, 8, NULL, NULL),
(17, 25, 11, NULL, NULL),
(18, 8, 8, NULL, NULL),
(19, 3, 14, NULL, NULL),
(20, 48, 21, NULL, NULL),
(21, 6, 18, NULL, NULL),
(22, 31, 25, NULL, NULL),
(23, 8, 20, NULL, NULL),
(24, 25, 1, NULL, NULL),
(25, 49, 1, NULL, NULL),
(26, 30, 16, NULL, NULL),
(27, 11, 19, NULL, NULL),
(28, 46, 14, NULL, NULL),
(29, 48, 7, NULL, NULL),
(30, 25, 9, NULL, NULL),
(31, 45, 13, NULL, NULL),
(32, 14, 12, NULL, NULL),
(33, 49, 2, NULL, NULL),
(34, 22, 3, NULL, NULL),
(35, 45, 7, NULL, NULL),
(36, 30, 11, NULL, NULL),
(37, 7, 22, NULL, NULL),
(38, 49, 2, NULL, NULL),
(39, 28, 24, NULL, NULL),
(40, 25, 13, NULL, NULL),
(41, 45, 21, NULL, NULL),
(42, 6, 6, NULL, NULL),
(43, 30, 10, NULL, NULL),
(44, 40, 8, NULL, NULL),
(45, 7, 25, NULL, NULL),
(46, 9, 10, NULL, NULL),
(47, 49, 16, NULL, NULL),
(48, 9, 11, NULL, NULL),
(49, 8, 5, NULL, NULL),
(50, 30, 22, NULL, NULL),
(51, 18, 22, NULL, NULL),
(52, 27, 3, NULL, NULL),
(53, 7, 10, NULL, NULL),
(54, 25, 5, NULL, NULL),
(55, 31, 1, NULL, NULL),
(56, 3, 7, NULL, NULL),
(57, 22, 5, NULL, NULL),
(58, 1, 14, NULL, NULL),
(59, 30, 6, NULL, NULL),
(60, 48, 18, NULL, NULL),
(61, 1, 17, NULL, NULL),
(62, 8, 2, NULL, NULL),
(63, 6, 2, NULL, NULL),
(64, 27, 14, NULL, NULL),
(65, 48, 13, NULL, NULL),
(66, 30, 3, NULL, NULL),
(67, 7, 5, NULL, NULL),
(68, 46, 25, NULL, NULL),
(69, 3, 3, NULL, NULL),
(70, 46, 9, NULL, NULL),
(71, 48, 2, NULL, NULL),
(72, 25, 9, NULL, NULL),
(73, 25, 23, NULL, NULL),
(74, 40, 6, NULL, NULL),
(75, 31, 17, NULL, NULL),
(76, 18, 16, NULL, NULL),
(77, 6, 20, NULL, NULL),
(78, 30, 1, NULL, NULL),
(79, 1, 21, NULL, NULL),
(80, 22, 24, NULL, NULL),
(81, 11, 15, NULL, NULL),
(82, 46, 19, NULL, NULL),
(83, 9, 25, NULL, NULL),
(84, 48, 8, NULL, NULL),
(85, 7, 12, NULL, NULL),
(86, 3, 18, NULL, NULL),
(87, 11, 19, NULL, NULL),
(88, 22, 1, NULL, NULL),
(89, 1, 18, NULL, NULL),
(90, 11, 10, NULL, NULL),
(91, 11, 15, NULL, NULL),
(92, 27, 2, NULL, NULL),
(93, 6, 19, NULL, NULL),
(94, 49, 14, NULL, NULL),
(95, 30, 5, NULL, NULL),
(96, 7, 1, NULL, NULL),
(97, 3, 4, NULL, NULL),
(98, 46, 15, NULL, NULL),
(99, 6, 6, NULL, NULL),
(100, 28, 24, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_job_id_foreign` (`job_id`),
  ADD KEY `applications_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_job_owner_id_foreign` (`job_owner_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_skills_user_id_foreign` (`user_id`),
  ADD KEY `user_skills_skill_id_foreign` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_job_owner_id_foreign` FOREIGN KEY (`job_owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `user_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
