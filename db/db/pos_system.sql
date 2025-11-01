-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 04:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rposystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `rpos_admin`
--

CREATE TABLE `rpos_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_admin`
--

INSERT INTO `rpos_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'John Doe', 'admin@mail.com', 'ad473b64c3ecf1cfc6dd4bc2419188703797c880');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_customers`
--

CREATE TABLE `rpos_customers` (
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phoneno` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_customers`
--

INSERT INTO `rpos_customers` (`customer_id`, `customer_name`, `customer_phoneno`, `customer_email`, `customer_password`, `created_at`) VALUES
('06549ea58afd', 'Amanda H. Gomez', '09874123698', 'amanda@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:37:48.123424'),
('1fc1f694985d', 'John Doe', '09856321474', 'john@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:33:55.072746'),
('27e4a5bc74c2', 'Stella G. Reyes', '09856321474', 'stella@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:42:00.681688'),
('29c759d624f9', 'Anabelle L. Stuart', '09852589632', 'anastuart@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:36:42.539583'),
('35135b319ce3', 'Wade Brown', '7412569698', 'wade@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:32:16.627075'),
('3859d26cd9a5', 'Paul S. Walker', '09874521456', 'paul@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:41:21.536613'),
('7c8f2100d552', 'Danna A. Cruz', '09856323696', 'danac@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:36:05.926304'),
('9c7fcc067bda', 'Janine C. dela Cruz', '09096321452', 'janine@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:39:34.997307'),
('9f6378b79283', 'Jane Doe', '09852563682', 'janedoe@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:38:16.364321'),
('bfc6b30da99c', 'Edward Barber', '09856321475', 'barber@mail.com', '', '2023-08-24 08:33:14.480190'),
('d0ba61555aee', 'Park Chaeyong', '09874521423', 'park@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:43:21.628547'),
('d7c2db8f6cbf', 'Lisa R. Manoban', '09856321412', 'lisa@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:42:47.926291'),
('e711dcc579d9', 'Tyra M. Cooper', '09632147852', 'tyra@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:40:32.556765'),
('f3ac6b42f9b2', 'Kim Jisoo', '0985632147', 'kim.jisoo@mail.com', '', '2023-08-29 07:26:47.485155'),
('f67afd9ee10e', 'Jennie Kim', '09856321478', 'jennie@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:45:05.498186'),
('fe6bb69bdd29', 'Sabrina Reyes', '09853212563', 'sabrinar@mail.com', 'c7fcf2bda0fab99b77559f61005abf2648b7e561', '2023-08-15 04:35:29.477291');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_orders`
--

CREATE TABLE `rpos_orders` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_qty` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_orders`
--

INSERT INTO `rpos_orders` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`) VALUES
('06e17d69fd', 'PXWZ-5306', 'f3ac6b42f9b2', 'Kim Jisoo', '3adfdee116', 'Fondue ', '500', '1', '', '2023-08-29 07:41:23.244331'),
('1e5ef2754f', 'AFZO-9627', 'd7c2db8f6cbf', 'Lisa R. Manoban', '31dfcc94cf', 'Macaron', '110', '2', 'Paid', '2023-08-15 05:22:55.987440'),
('1ffd8c28ab', 'ZOVY-9234', '9c7fcc067bda', 'Janine C. dela Cruz', 'f9c2770a32', 'Ramen', '200', '1', '', '2023-08-29 07:19:50.549060'),
('305bec2a6a', 'UBNO-5084', 'd0ba61555aee', 'Park Chaeyong', 'b2f9c250fd', 'Guacamole', '250', '1', 'Paid', '2023-08-15 05:23:13.462367'),
('42ada1faf0', 'EFGP-7586', '9f6378b79283', 'Jane Doe', '2b976e49a0', 'Pad Thai', '390', '1', 'Paid', '2023-08-15 05:23:37.349974'),
('5e1e59ad79', 'OXNY-7315', '29c759d624f9', 'Anabelle L. Stuart', 'e2195f8190', 'Pasta carbonara', '200', '1', '', '2023-08-29 07:44:52.994865'),
('5f2bef1a34', 'BCPZ-5364', 'd0ba61555aee', 'Park Chaeyong', '06dc36c1be', 'Kimbap', '210', '1', 'Paid', '2023-08-15 05:05:45.719923'),
('7fe1180703', 'TQAJ-4396', 'f67afd9ee10e', 'Jennie Kim', '3adfdee116', 'Fondue ', '500', '2', 'Paid', '2023-08-15 05:23:24.043688'),
('8353a5c693', 'IJHZ-7804', 'f67afd9ee10e', 'Jennie Kim', '31dfcc94cf', 'Macaron', '110', '2', '', '2023-08-29 07:43:41.634265'),
('8b3ce6b8cc', 'ENUQ-0852', 'fe6bb69bdd29', 'Sabrina Reyes', '14c7b6370e', 'Dondurma', '550', '1', '', '2023-08-21 03:32:09.555728'),
('b04ea946a5', 'IKGN-9164', '3859d26cd9a5', 'Paul S. Walker', '2fdec9bdfb', 'Churros', '50', '2', 'Paid', '2023-08-15 05:23:58.034060'),
('f0b2d35d63', 'QUIY-7081', 'd7c2db8f6cbf', 'Lisa R. Manoban', '3adfdee116', 'Fondue ', '500', '2', '', '2023-08-29 07:44:09.084848');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_pass_resets`
--

CREATE TABLE `rpos_pass_resets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_pass_resets`
--

INSERT INTO `rpos_pass_resets` (`reset_id`, `reset_code`, `reset_token`, `reset_email`, `reset_status`, `created_at`) VALUES
(1, '63KU9QDGSO', '4ac4cee0a94e82a2aedc311617aa437e218bdf68', 'sysadmin@icofee.org', 'Pending', '2020-08-17 15:20:14.318643');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_payments`
--

CREATE TABLE `rpos_payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `pay_amt` varchar(200) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_payments`
--

INSERT INTO `rpos_payments` (`pay_id`, `pay_code`, `order_code`, `customer_id`, `pay_amt`, `pay_method`, `created_at`) VALUES
('1eecfc', '7HMQLN9T1V', 'UBNO-5084', 'd0ba61555aee', '250', 'PayPal', '2023-08-15 05:23:13.395956'),
('76bca8', 'ZEBLDFIU32', 'IKGN-9164', '3859d26cd9a5', '100', 'GCash', '2023-08-15 05:23:57.955448'),
('7b4342', 'Y83CRMFIX1', 'TQAJ-4396', 'f67afd9ee10e', '1000', 'Cash', '2023-08-15 05:23:23.973187'),
('98008f', 'RU4DML6OXY', 'EFGP-7586', '9f6378b79283', '390', 'GCash', '2023-08-15 05:23:37.296654'),
('a8c338', 'L6TI13MFPV', 'BCPZ-5364', 'd0ba61555aee', '210', 'Credit Card', '2023-08-15 05:05:45.611129'),
('d0b8d6', 'BCALDPHOUT', 'AFZO-9627', 'd7c2db8f6cbf', '220', 'Credit Card', '2023-08-15 05:22:55.623830');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_products`
--

CREATE TABLE `rpos_products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_products`
--

INSERT INTO `rpos_products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `created_at`) VALUES
('06dc36c1be', 'FCWU-5762', 'Kimbap', '31ddd0a3661844c8a10b858ab8151933 (1).jpg', 'A Korean dish consisting of seaweed (kim), seasoned rice (bap), and other, optional ingredients that are usually rolled, sliced, and served. Almost anything can be added to the roll, but the most common ingredients are fishcakes, meat, spinach, eggs, and cucumbers.', '210', '2023-08-15 01:23:27.419792'),
('0c4b5c0604', 'JRZN-9518', 'Pizza Margherita', 'eat-pray-love-39581-3.jpeg', 'Made to resemble the colors of the Italian flag: red tomatoes, white mozzarella cheese, and green basil.', '800', '2023-08-15 01:37:39.893262'),
('14c7b6370e', 'QZHM-0391', 'Dondurma', '83e4b029e24e4066964157d66b7e2a66.jpg', 'Turkish ice cream sets it apart from other varieties is its resistance to melting and a particularly dense, chewy texture. These qualities are brought by adding two thickening agents to the basic milk and sugar mixture.', '550', '2023-08-15 01:40:58.420726'),
('1e0fa41eee', 'ICFU-1231', 'Frozen yogurt', '25d6f8f98c57444c973971d33a538bde.jpg', 'Frozen yogurt is a frozen dessert treat made with yogurt and (sometimes) other dairy products and flavorings. It is lower in fat than ice cream due to the use of milk instead of cream. Frozen yogurt is usually served with numerous toppings such as strawberries, bananas, or chunks of cookies and candy.', '120', '2023-08-15 01:43:17.908186'),
('2b976e49a0', 'CEWV-9437', 'Pad Thai', 'Untitled-design-5.jpg', 'Pad Thai is Thailand\'s national dish, a flavorful stir-fry (pad in Thai) dish consisting of rice noodles, tofu, dried shrimp, bean sprouts, and eggs. If it\'s made with meat, chicken and pork are some of the most popular choices. The flavors are an intricate combination of sweet, sour, and salty, with a well-balanced contrast of textures.', '390', '2023-08-15 01:46:33.620249'),
('2fdec9bdfb', 'UJAK-9611', 'Churros', 'download (7).jfif', 'Elongated, crispy, crunchy and intensely fragrant, churros consist of deep-fried yeast dough encrusted with sugar. Although some may argue against consuming these sweet treats, warning others about the dangerous effects of sugar and fat on human bodies, the popularity of churros throughout the world doesn\'t seem to wane.', '50', '2023-08-15 01:50:00.566337'),
('31dfcc94cf', 'SYQP-3710', 'Macaron', 'bff77c0b5fe34398a03b9a436815fad2.jpg', 'A macaroon is a small cake or cookie, typically made from ground almonds, coconut or other nuts, with sugar and sometimes flavourings, food colouring, glacé cherries, jam or a chocolate coating; or a combination of these or other ingredients.', '110', '2023-08-15 01:51:58.467284'),
('3adfdee116', 'HIPF-5346', 'Fondue ', '79b9b4bc2e8140659f854da1dced600c.jpg', 'Fondue is Switzerland\'s national dish, Fondue\'s key ingredient is cheese that is melted over a fire, with a lot of regional varieties and flavorful additions such as cherry brandy, white wine, or a sprinkle of nutmeg. It was invented out of necessity, when the alpine locals and traveling herders relied only on cheese, wine, and bread to get them through the winter. ', '500', '2023-08-15 01:56:03.287506'),
('3d19e0bf27', 'EMBH-6714', 'Chutney', '90ddab16279f486ba3c8dea223ab1231.jpg', 'These fresh homemade relishes consist of pickled or stewed fruit and vegetables that are cut into small chunks, then delicately seasoned with a variety of spices such as cumin, cardamom, tamarind, ginger, and turmeric.', '350', '2023-08-15 02:00:46.591038'),
('4e68e0dd49', 'QLKW-0914', 'Bibimbap', '4dd65e828a014639994d77ab09f5dba5.jpg', 'Bibim means mixed, and bap means cooked rice, so bibimbap is literally mixed rice. The rice is combined with a variety of ingredients such as sliced beef, namul (sliced vegetables), soy sauce, gochujang (thick, deep red chili pepper paste), and a raw egg on top, cooking as it is dispersed through the steaming rice.', '540', '2023-08-15 01:59:14.006001'),
('5d66c79953', 'GOEW-9248', 'Gnocchi', '1efb92c5cefe46ab9b8d3c5d64ea6dff.jpg', 'They are typically boiled in large amounts of salted water or fried in shallow oil, a technique typical for some Italian regions. Gnocchi are believed to have been a predecessor of pasta, and historical records show that the term gnocchi, or gnocco, was sometimes interchangeably used with the word maccherone, a word that once referred to all pasta in general. ', '600', '2023-08-15 02:01:54.779533'),
('826e6f687f', 'AYFW-2683', 'Nori', '1a401abad68f4aafbcc4e9b1b6eff2e5.jpg', 'Nori is a dried edible seaweed used in Japanese cuisine, made from species of the red algae genus Pyropia, including P. yezoensis and P. tenera. It has a strong and distinctive flavor, and is often used to wrap rolls of sushi or onigir', '120', '2023-08-15 02:03:23.310714'),
('97972e8d63', 'CVWJ-6492', 'Quesadilla', 'cde29cfce09c43b0acc43e19a77b845b.jpg', 'Quesadilla is a simple Mexican snack consisting of a flour or corn tortilla filled with cheese that melts well. It is commonly folded in half and consumed. A quesadilla can also have some other ingredients on the inside such as meats, beans, or potatoes, but cheese is always mandatory (with the exception of Mexico City, where cheese in a quesadilla is often an afterthought).', '110', '2023-08-15 02:05:42.620908'),
('a419f2ef1c', 'EPNX-3728', 'Dalgona ', '6eb251b10b7a4a93b7a14132e99ccac6.jpg', 'Dalgona is a frothy whipped coffee that is served on top of milk. Although it became internationally known as a South Korean beverage, similar versions are common in other Asian countries. The basic version of this coffee is made with equal parts of instant coffee, sugar, and water.', '150', '2023-08-15 02:09:29.199919'),
('a5931158fe', 'ELQN-5204', 'Champús', 'd6840582ad36491d9185b50cfab1ebf0.jpg', 'Champús is a traditional Colombian cold beverage that is also popular in Peru and Ecuador. Refreshing and sweet, champús is typically served with a lot of ice and is considered a perfect summer drink. However, Peruvians traditionally consume it warm as a dessert, and in this version, lulo is replaced with apples. ', '180', '2023-08-15 02:10:48.954842'),
('b2f9c250fd', 'XNWR-2768', 'Guacamole', '1c79ac0beb2242419a445ae0a51d3acc.jpg', 'Guacamole is sometimes prepared in the molcajete, a traditional Mexican mortar and pestle where onions, chiles, and salt are ground to a paste and added to the coarsely mashed avocados. Of course, guacamole is only as good as the avocados it is prepared with, and among the best are the nutty and creamy Hass and smooth Fuerte avocados', '250', '2023-08-15 02:11:55.639842'),
('bd200ef837', 'HEIY-6034', 'Chicha Morada', '69ad5f4845a54965844953fb489fe872.jpg', 'Chicha Morada is a non-alcoholic drink originating from Peru whose use and consumption dates back to the era before the creation of the Inca empire. Sugar, cinnamon, and cloves can be added later for extra flavor. This simple drink can be found in street markets as well as in upscale restaurants and home kitchens throughout Peru and Bolivia.', '80', '2023-08-15 02:13:57.982509'),
('cff0cb495a', 'ZOBW-2640', 'Burrito ', 'f4291f3e82f84c33a5997f801e8fb24f.jpg', 'Burrito is a dish consisting of a wheat flour tortilla that is wrapped in such a way that it is possible to fully enclose the flavorful filling on the interior. The filling consists of a combination of various ingredients such as meat, beans, rice, lettuce, guacamole, and cheese, among others.', '300', '2023-08-15 02:15:33.650032'),
('d57cd89073', 'ZGQW-9480', 'Ravioli', 'b8dbe53b1e594d5d92c04ce61537898e.jpg', 'Ravioli are usually served boiled with a sauce as a first course, or boiled and served in broth as a traditional winter dish. Ravioli fillings include diverse varieties of meat, cheese, and vegetables, and they vary from region to region. There are also sweet ravioli, which are usually deep-fried', '180', '2023-08-15 02:16:41.390383'),
('d9aed17627', 'FIKD-9703', 'Biryani', '8fd2297171484b88be3e3e6815979690.jpg', 'Biryani is a group of classic dishes dating back to the Mughal Empire. The main ingredients of biryani are rice (ideally basmati), spices, a base of meat, eggs, or vegetables, and numerous optional ingredients such as dried fruits, nuts, and yogurt', '160', '2023-08-15 02:18:40.073485'),
('e2195f8190', 'HKCR-2178', 'Pasta carbonara', '79b072c652ba423eb4de617b9b51a399.jpg', 'The carbonara we know today is prepared by simply tossing spaghetti with guanciale (cured pork jowl), egg yolks, and Pecorino Romano cheese. Despite its simplicity, this dish remains one of Rome\'s favorites, equally popular throughout the country.', '200', '2023-08-15 02:20:04.002479'),
('e2af35d095', 'IDLC-7819', 'Quiche', 'ec9dfc952dd148a8bbcf43cdbac6569a.jpg', 'This popular French pie consists of a pastry crust filled with eggs, cream, and anything from bacon, cheese, and leek to mushrooms and seafood. Quiche is usually very filling and high in calories, making it a frequent choice for parties and buffet tables.', '170', '2023-08-15 02:21:50.295100'),
('e769e274a3', 'AHRW-3894', 'Cholado', 'f6103d8689174ae398b1645749b009e0 (1).jpg', 'Cholado is an icy cross between a fruit salad, a cocktail, and a frozen dessert. Also known as raspao, the beverage is prepared with fresh fruit such as strawberries, bananas, kiwi, papaya, pineapple, and maracuya, along with milk and a sweet syrup made with Colombian blackberries.', '90', '2023-08-15 02:24:19.527248'),
('ec18c5a4f0', 'PQFV-7049', 'Fried Chicken', 'download (8).jfif', 'The most popular food of the Southern cuisine, fried chicken is the theme of many arguments where everyone involved seems to have a favorite. Typical seasonings include salt, pepper, and hot chiles, and the pieces of meat should be edible by hand so that the consumer can bite both the crust and the meat at the same time. ', '200', '2023-08-15 02:28:47.966939'),
('f4ce3927bf', 'EAHD-1980', 'Croissant', 'b075a8fbe7224ef787272cf4d979e388.jpg', 'These flaky, golden-colored, crescent-shaped pastries are best made with pure butter and a slightly sweet yeast dough. If made properly, the yellow-white interior should be just the slightest bit elastic when pulled from the center, ready to be covered with a pad of butter or some fresh jam.', '200', '2023-08-15 02:29:27.172121'),
('f9c2770a32', 'YXLA-2603', 'Ramen', 'b6b9680a32c84a9381a1ea5f5e529698.jpg', 'These flaky, golden-colored, crescent-shaped pastries are best made with pure butter and a slightly sweet yeast dough. If made properly, the yellow-white interior should be just the slightest bit elastic when pulled from the center, ready to be covered with a pad of butter or some fresh jam.', '200', '2023-08-15 02:30:25.757895');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_staff`
--

CREATE TABLE `rpos_staff` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_staff`
--

INSERT INTO `rpos_staff` (`staff_id`, `staff_name`, `staff_number`, `staff_email`, `staff_password`, `created_at`) VALUES
(2, 'Cashier Trevor', 'QEUY-9042', 'cashier@mail.com', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d', '2022-09-04 16:11:30.581882');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rpos_admin`
--
ALTER TABLE `rpos_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `rpos_customers`
--
ALTER TABLE `rpos_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `CustomerOrder` (`customer_id`),
  ADD KEY `ProductOrder` (`prod_id`);

--
-- Indexes for table `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `rpos_payments`
--
ALTER TABLE `rpos_payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order` (`order_code`);

--
-- Indexes for table `rpos_products`
--
ALTER TABLE `rpos_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `rpos_staff`
--
ALTER TABLE `rpos_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rpos_staff`
--
ALTER TABLE `rpos_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `rpos_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `rpos_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
