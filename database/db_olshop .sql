-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 05:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `publication_status`) VALUES
(1, 'Symphony', 'Symphony Desc', 1),
(2, 'Samsung', 'Samsung desc', 1),
(3, 'IPhone', 'IPhone Desc<br>', 1),
(4, 'H&M', 'H&amp;M Desc', 1),
(5, 'Adidas', 'Adidas Desc', 1),
(6, 'Razer', 'Razer Desc', 1),
(7, 'Asus', 'Asus VivoBook', 1),
(9, 'Thoshiba', 'Flashdisk and Conputer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `published` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_description`, `published`) VALUES
(12, 'MAN', 'Semua Baju Pria', 1),
(13, 'WOMEN', 'Semua Produk Woman', 1),
(14, 'KIDS', 'Semua Baju Anak Kecil', 1),
(15, 'ACCESSORIES', 'Semua Jenis Accessories', 1),
(16, 'Makanan Ringan', 'Kripik Kentang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `checkout_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `checkout_name` varchar(50) NOT NULL,
  `checkout_email` varchar(100) NOT NULL,
  `checkout_alamat` text NOT NULL,
  `checkout_provinsi` varchar(100) NOT NULL,
  `checkout_kota` varchar(50) NOT NULL,
  `expedisi` varchar(125) NOT NULL,
  `ongkir` varchar(125) NOT NULL,
  `checkout_phone` varchar(20) NOT NULL,
  `kodepos` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_belanja` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`checkout_id`, `customer_id`, `checkout_name`, `checkout_email`, `checkout_alamat`, `checkout_provinsi`, `checkout_kota`, `expedisi`, `ongkir`, `checkout_phone`, `kodepos`, `created_at`, `total_belanja`) VALUES
(33, 0, 'asdada', 'asad@gmail.com', 'aasda', '1', '17', 'jne', '1', '2312312', '1231312', '2023-06-15 00:06:03', 263000.00),
(34, 0, 'asdada', 'q@gmail.com', 'asdada', '1', '17', 'jne', '1', '123131231', '121312', '2023-06-15 00:11:49', 78000.00),
(35, 0, 'sasada', 'a@gmail.com', 'asdada', '1', '32', 'tiki', '1', '123131231', '2313123', '2023-06-15 00:12:55', 86000.00),
(36, 0, 'asadas', 'as@gmail.com', 'aasad', '1', '17', 'jne', '1', '1313123131', '23131231', '2023-06-15 00:20:09', 178000.00),
(37, 0, 'asaa', 'a@gmail.com', 'sadasda', '1', '17', 'tiki', '2', '12312312', '123131', '2023-06-15 00:25:46', 173000.00),
(38, 0, 'bisa', 'bisa@gmail.com', 'adasdasdsa', '1', '17', 'pos', '1', '1231231231412', '2131231321', '2023-06-15 00:27:25', 83000.00),
(39, 0, 'asasdsa', 'a@gmail.com', 'asadad', '1', '17', 'jne', '2', '11231313123123', '12321312', '2023-06-15 00:39:29', 98000.00),
(40, 0, 'testing', 'tes@Gmail.com', 'asdasda', '1', '32', 'jne', '1', '081381928391', '21312321', '2023-06-15 01:00:15', 233000.00),
(41, 0, 'lisa', 'lisa@gmail.com', 'sadadsa', '1', '17', 'jne', '1', '08129189218', '12312312', '2023-06-15 01:13:56', 243000.00),
(42, 0, 'asada', 'asasd@gmail.com', 'aadas', '4', '62', 'tiki', '1', '2131231', '123131', '2023-06-15 02:43:01', 112000.00),
(43, 0, 'sembilan', '9@gmail.com', 'asdada', '7', '77', 'tiki', '1', '23131', '131231', '2023-06-15 02:54:32', 192000.00),
(44, 0, 'asada', 'a@gmail.com', 'asdasd', '1', '32', 'jne', '1', '12312321', '123212', '2023-06-15 03:00:54', 78000.00),
(45, 0, 'asad', 'luna@gmail.com', 'asdasd', '1', '17', 'tiki', '1', '131231', '2131231', '2023-06-15 03:04:38', 76000.00),
(46, 0, 'asdsa', 'a@gmail.com', 'asdasd', '1', '32', 'tiki', '1', '2131231', '21312', '2023-06-15 03:05:47', 76000.00),
(47, 0, 'assdada', 'a@gmail.com', 'asdasda', '2', '28', 'jne', '1', '1231312', '13231', '2023-06-15 03:06:58', 112000.00),
(48, 0, 'asda', 'a@gmail.com', 'sdasas', '1', '32', 'tiki', '2', '212131', '22121', '2023-06-15 03:08:02', 88000.00),
(49, 0, 'belnja dulu', 'kluna@gmail.com', 'asdasa', '1', '17', 'tiki', '1', '21321321', '212131', '2023-06-15 03:13:59', 76000.00),
(50, 0, 'asada', 'kurangi@gmail.com', 'adasdas', '1', '17', 'jne', '1', '1123123', '21312', '2023-06-15 03:23:35', 68000.00),
(51, 0, 'sada', 'bisa@gmail.com', 'asdada', '2', '27', 'jne', '1', '13123', '2213123', '2023-06-15 03:27:47', 102000.00),
(52, 0, 'asdasd', 'a@gmail.com', 'sadas', '1', '32', 'jne', '2', '313213', '221321', '2023-06-15 03:36:47', 158000.00),
(53, 0, 'asdsad', 'a@gmail.com', 'asdasd', '1', '32', 'jne', '1', '2131231312', '1231312', '2023-06-15 03:38:53', 148000.00),
(54, 0, 'sadsad', 'a@gmail.com', 'asdasda', '1', '17', 'jne', '1', '212312', '2121312', '2023-06-15 03:39:41', 148000.00),
(55, 0, 'puput', 'puput@gmail.com', 'surabaya', '11', '133', 'pos', '1', '0812381028318', '8981218', '2023-06-15 13:05:52', 35000.00),
(56, 0, 'ayu', 'ayu@gmail.com', 'sadadsadsa', '3', '106', 'jne', '1', '01820812810', '0823193', '2023-06-19 00:37:21', 224000.00),
(57, 0, 'wkkwkwk', 'akak@gmail.com', 'dasdsadsa', '6', '152', 'tiki', '2', '2131231', '131231', '2023-06-19 03:18:39', 40000.00),
(58, 0, 'asdad', 'adsa@gmail.com', 'qweqwe', '7', '77', 'jne', '1', '31312', '1313', '2023-06-19 03:29:23', 204000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(125) NOT NULL,
  `customer_password` varchar(32) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_password`, `customer_address`, `customer_active`) VALUES
(9, 'luna', 'user@gmail.com', '1829129182', '5f4dcc3b5aa765d61d8327deb882cf99', 'asdadssadasda', 1),
(10, 'Bob Gardin', 'bobg@gmail.com', '12318931', '5f4dcc3b5aa765d61d8327deb882cf99', 'asdasdasda', 1),
(25, 'md5', 'md5@gmail.com', '86545721', '827ccb0eea8a706c4c34a16891f84e7b', 'adasdasdas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `actions` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `checkout_id`, `id_transaction`, `order_total`, `actions`) VALUES
(73, 9, 55, 69, 35000, 'Pending'),
(74, 25, 56, 70, 224000, 'Pending'),
(75, 25, 57, 71, 40000, 'Pending'),
(76, 25, 58, 72, 204000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_price` float NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `product_image` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `product_image`) VALUES
(30, 50, 34, 'Tshirt Rendy fashion', 20000, 2, '20230601085043_2023_Thu_1.jpg'),
(31, 53, 34, 'Tshirt Rendy fashion', 20000, 1, '20230601085043_2023_Thu_1.jpg'),
(32, 59, 34, 'Tshirt Rendy fashion', 20000, 1, '20230601085043_2023_Thu_1.jpg'),
(33, 66, 34, 'Tshirt Rendy fashion', 20000, 1, '20230601085043_2023_Thu_1.jpg'),
(34, 67, 33, 'Kaos Oversize Pria', 10000, 1, '20230601071934_2023_Thu_1.jpg'),
(35, 68, 33, 'Kaos Oversize Pria', 10000, 1, '20230601071934_2023_Thu_1.jpg'),
(36, 69, 26, 'kemeja batik pria lengan panjang batik slimfit batik model terbaru - S', 90000, 1, '20230601054717_2023_Thu_1.jpg'),
(37, 70, 26, 'kemeja batik pria lengan panjang batik slimfit batik model terbaru - S', 90000, 1, '20230601054717_2023_Thu_1.jpg'),
(38, 71, 26, 'kemeja batik pria lengan panjang batik slimfit batik model terbaru - S', 90000, 1, '20230601054717_2023_Thu_1.jpg'),
(39, 72, 35, 'tela -tela', 5000, 1, '20230615124917_2023_Thu_1.jpg'),
(40, 73, 35, 'tela -tela', 5000, 1, '20230615124917_2023_Thu_1.jpg'),
(41, 74, 26, 'kemeja batik pria lengan panjang batik slimfit batik model terbaru - S', 90000, 1, '20230601054717_2023_Thu_1.jpg'),
(42, 74, 37, 'anak anak', 100000, 1, '20230619020531_2023_Mon_1.jpg'),
(43, 75, 33, 'Kaos Oversize Pria', 10000, 1, '20230601071934_2023_Thu_1.jpg'),
(44, 76, 34, 'Tshirt Rendy fashion', 20000, 1, '20230601085043_2023_Thu_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_author` int(11) NOT NULL,
  `product_view` int(11) NOT NULL DEFAULT 0,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_description`, `product_image`, `product_price`, `product_quantity`, `product_category`, `product_brand`, `product_author`, `product_view`, `published_date`, `publication_status`) VALUES
(24, 'Mooi Kemeja Anak Laki-laki', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;SUMMER KNIT COLLECTION- 100% Premium Cotton Twill- Soft, lightweight and comfortable, perfect for daily wear- Button closure at the front- Embroidery detail at chest(JANGAN JADIKAN UMUR SEBAGAI PATOKAN SIZE, MOHON DIUKUR KE ANAK MASING2KARENA SETIAP ANAK BERBEDA)TOLERANSI UKURAN +- 1 CMWarna produk asli mungkin akan sedikit berbeda denganfoto, karena efek layar HP atau komputer yang berbeda-beda.Mohon perhatikan detail size, dan mohon pengertiannya untuk toleransi ukuran jahitan +/- (1-2cm)dikarenakan seluruh proses produksi semua menggunakan tenaga SDM.', '20230601054056_2023_Thu_1.jpg', 75000, 100, 12, 5, 1, 0, '2023-06-01 05:40:56', 1),
(25, 'Kemeja Batik Pria Lengan Panjang Slimfit Baju Laki Laki Dewasa Terbaru - 10, M', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;BATIK PRIAkemeja batik pria lengan panjang slimfit• Keterangan :• Bahan : Katun Prima halus• Spesifikasi Jahitan:- make up - slimfit/junkies- stik - lapisan pundak belakang• Ukuran : M/L/XL/XXL(M) : Lebar Dada 52cm: Lingkar Dada 104cm: Panjang Baju 69cm(L) : Lebar Dada 54cm: Panjang Baju 71cm(XL) : Lebar Dada 56cm: Lingkar Dada 112cm: Panjang Baju 73cm(XXL) : Lebar Dada 58cm: Lingkar Dada 116cm: Panjang Baju 74cm*TOLERANSI UKURAN -/+2CmMenerima Pesanan Seragam.HAPPY SHOPPING .', '20230601054524_2023_Thu_1.jpg', 150000, 10, 12, 1, 1, 0, '2023-06-01 05:45:24', 1),
(26, 'kemeja batik pria lengan panjang batik slimfit batik model terbaru - S', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;BATIK PRIAkemeja batik pria lengan panjan&amp;nbsp;g slimfit• Keterangan :• Bahan : Katun Prima halus• Spesifikasi Jahitan:- make up - slimfit/junkies- stik - lapisan pundak belakang• Ukuran : M/L/XL/XXL(M) : Lebar Dada 52cm: Lingkar Dada 104cm: Panjang Baju 69cm(L) : Lebar Dada 54cm: Panjang Baju 71cm(XL) : Lebar Dada 56cm: Lingkar Dada 112cm: Panjang Baju 73cm(XXL) : Lebar Dada 58cm: Lingkar Dada 116cm: Panjang Baju 74cm*TOLERANSI UKURAN -/+2CmMenerima Pesanan Seragam.HAPPY SHOPPING .', '20230601054717_2023_Thu_1.jpg', 90000, 8, 12, 1, 1, 0, '2023-06-01 05:47:17', 1),
(27, 'Baju Tidur Piyama Wanita Pajamas Dewasa Katun Motif PP Guillen - PP GUILLEN NAVY', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;Semua EtalaseAYO DI ORDER MUMPUNG LAGI PROMO ! WELCOME DROPSHIPPER &amp;amp; RESELLERREADY STOK SETELAN BAJU TIDUR PIYAMA KATUN MICRO MOTIF KOTAK GUILLENQUALITY DIJAMIN NYAMAN DIPAKAI ^^Bahan Katun Jepang full print = Adem , Dingin , Lembut Dijamin Nyaman Dipakai , Jahitan Rapi Tidak Mengecewakan dan GOOD QUALITY DAN REAL PICTURELengan panjang celana panjangKancing HidupKantong HidupAll size fit to LLingkar Dada 104cmLingkar Paha 54cmLingkar Pinggang Celana Full Karet : 52-110cmPanjang Baju : 62cmPanjang Lengan : 50cmPanjang Celana : 90cmNOTE : REAL PICT-Warna :1. BLACK2. CREAM3. NAVYBagi yang ingin order harap mencantumkan model karakter di catatan keterangan. jika tidak akan kita kirim warna random sesuai stok yang ada.- Kami hadir untuk memberikan kenyamanan dan kepuasan kepada customer dalam berbelanja karena produk yang kami jual semua sudah dalam seleksi dan bahan yang terjamin Good Quality !- Terpercaya ^^-Jika anda ingin dropship silahkan di beri keterangan di kolom dropship.-Jika terjadi cacat/salah kirim bisa ditukar-Terima kasih sudah berkunjung di toko kami^^', '20230601_2023_Thu_1_5da992f6-9eff-454b-b000-11c614a1ea67.jpg', 60000, 100, 13, 1, 1, 0, '2023-06-01 05:49:24', 1),
(28, 'KIYOREN KEMEJA ANIISA', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;Semua EtalaseNAMA ; ANIISA BLOUSEMODEL ; FORMAL BLOUSEMATT ; KOSIBOSIZE ; XL 110 CMPANJANG 78 CMKEMEJA FORMAL COCOK UNTUK KERJA DAN UNTUK SEHARI - HARIBAHAN ADEM LEMBUT DAN NYAMAN UNTUK DIPAKAI', '20230601060908_2023_Thu_1.jpg', 95000, 100, 13, 5, 1, 0, '2023-06-01 06:09:08', 1),
(29, 'Blan Shirt (Kemeja Anak Polos Lengan Panjang Warna Putih) - 4-5 tahun', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;Kemeja AnakLITTLEBEESCOUT Blan ShirtKemeja Anak Lengan PanjangWarna Putih&amp;nbsp;Bahan : 100% KatunDijamin TIDAK PANASBangga Lokal Buatan IndonesiaModel kemeja didesain oleh LITTLE BEESCOUT- Kemeja Lengan Panjang warna putih.- Cocok digunakan untuk acara formal, semi-formal.- Mudah dipadupadankan dengan berbagai macam model bawahan.Untuk ukuran yang lebih pasti, jangan hanya menggunakan patokan umur. Tapi sila bandingkan ukuran baju/kemeja yang biasa digunakan anak-anak dengan size chart kami.&amp;nbsp;', '20230601062046_2023_Thu_1.jpg', 85000, 100, 14, 4, 1, 0, '2023-06-01 06:20:46', 1),
(30, 'Aksesoris tas for bag twilly shawl scarf shall syal wanita', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;Semua EtalaseREADY STOCK!HARGA PER PCSBahan satin importGood qualityMOHON KONFIRMASI STOCK TERLEBIH DAHULUC,E,T, U, dan W habis. Selain kode ini READYJangan lupa tulis di notes motif yang diinginkan!Kalau tidak, akan kami kirim random..', '20230601062348_2023_Thu_1.jpg', 100000, 10, 15, 1, 1, 0, '2023-06-01 06:23:48', 1),
(31, 'Bando Fashion Korea Jepit Rambut 2in1 Aksesoris Wanita Anak Dewasa Kar', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;Aksesoris RambutDikirim Random yaaaBando Rambut Karakter Fashion KoreaBando 2in1 Bisa Untuk Jepit RambutKarakter Lucu Untuk Di Pakai Anak &amp;amp; DewasaBando Terbuat Dari Bahan Plastik KwalitasPERATURAN TOKOSuport Pengiriman Sameday, Instant, CODPengiriman Di Lakukan Hari Senin SD SabtuMohon Lakukan Video Unboxing Saat Paket Diterima ????Produk yang masih bisa di klik Variasi = Ready Stok boleh langsung di order 8', '20230601062530_2023_Thu_1.jpg', 25000, 100, 15, 1, 1, 0, '2023-06-01 06:25:30', 1),
(32, 'GELANG BRACELET FASHION HARD ROCK LEATHER KULIT AKSESORIS PRIA', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;GelangREADY STOCK!!UNTUK MEMPERCEPAT TRANSAKSI SILAHKAN LANGSUNG ORDER DAN TULIS VARIASI WARNA, UKURAN ATAU MODEL DI CATATAN PEMBELIAN ATAU BISA MELALUI CHAT..THX FOR SHOPPING :)- 1 produk isi ada 6pcs gelang- bisa disesuaikan dengan ukuran tangan- terima dropship dan reseller', '20230601062731_2023_Thu_1.jpg', 15000, 100, 15, 5, 1, 0, '2023-06-01 06:27:31', 1),
(33, 'Kaos Oversize Pria', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;Semua EtalaseFIT TO LLD (lingkar dada): 96-100 cmP (panjang): 70 cmBahan: Cotton combed 30sWarna: sesuai gambar', '20230601071934_2023_Thu_1.jpg', 10000, 0, 12, 1, 1, 0, '2023-06-01 07:19:34', 1),
(34, 'Tshirt Rendy fashion', 'Kondisi:&amp;nbsp;BaruMin. Pemesanan:&amp;nbsp;1 BuahEtalase:&amp;nbsp;AtasanBahan full babyterryAllsize fit to LLD 104cm PJ 68cmTidak ada pilihan ukuranMotif sablonCocok untuk dipakai sehari-hari', '20230601085043_2023_Thu_1.jpg', 20000, 0, 12, 1, 1, 0, '2023-06-01 08:50:43', 1),
(35, 'tela -tela', 'contoh', '20230615124917_2023_Thu_1.jpg', 5000, 5, 16, 6, 1, 0, '2023-06-15 12:49:17', 1),
(36, '&lt;h1&gt;hello world&lt;/h1&gt;', 'asdada', '20230615125801_2023_Thu_1.PNG', 13123, 12312312, 15, 4, 1, 0, '2023-06-15 12:58:01', 1),
(37, 'anak anak', 'testing anak anak', '20230619020531_2023_Mon_1.jpg', 100000, 99, 14, 4, 1, 0, '2023-06-19 00:05:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(125) NOT NULL,
  `alamat_toko` varchar(125) NOT NULL,
  `description` text NOT NULL,
  `profile` varchar(225) NOT NULL,
  `phone` varchar(125) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_toko`
--

INSERT INTO `tbl_toko` (`id_toko`, `nama_toko`, `alamat_toko`, `description`, `profile`, `phone`, `role_id`) VALUES
(5, 'Toko Jaya Online', 'suka makmur', 'jalan sehat sejahtera', '20230619050759_2023_Mon_1.jpg', '08218928192', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `name`, `bank_name`, `account_number`, `created_at`) VALUES
(46, 'luna', 'BNI', '7878278129301301', '2023-06-15 02:43:10'),
(47, 'sembilan', 'BRI', '1021930129301301', '2023-06-15 02:54:44'),
(48, 'sembilan', 'BRI', '1021930129301301', '2023-06-15 02:55:05'),
(49, 'sembilan', 'BRI', '1021930129301301', '2023-06-15 02:55:53'),
(50, 'asdasda', 'BRI', '1021930129301301', '2023-06-15 03:00:58'),
(51, 'asdasd', 'Mandiri', '1993828929301301', '2023-06-15 03:04:43'),
(52, 'asdasd', 'Mandiri', '1993828929301301', '2023-06-15 03:05:12'),
(53, 'adasda', 'BCA', '8638183929301301', '2023-06-15 03:05:52'),
(54, 'asdsada', 'BCA', '8638183929301301', '2023-06-15 03:07:02'),
(55, 'adasdas@gmail.com', 'BNI', '7878278129301301', '2023-06-15 03:08:15'),
(56, 'lunamaya', 'BRI', '1021930129301301', '2023-06-15 03:14:08'),
(57, 'lunamaya', 'BRI', '1021930129301301', '2023-06-15 03:14:49'),
(58, 'lunamaya', 'BRI', '1021930129301301', '2023-06-15 03:16:56'),
(59, 'luna', 'BRI', '1021930129301301', '2023-06-15 03:17:07'),
(60, 'luna', 'BRI', '1021930129301301', '2023-06-15 03:19:07'),
(61, 'luna', 'BRI', '1021930129301301', '2023-06-15 03:21:15'),
(62, 'luna', 'BRI', '1021930129301301', '2023-06-15 03:22:43'),
(63, 'asdada', 'BCA', '8638183929301301', '2023-06-15 03:23:40'),
(64, 'sadas', 'BNI', '7878278129301301', '2023-06-15 03:27:52'),
(65, 'asdasd', 'BCA', '8638183929301301', '2023-06-15 03:36:52'),
(66, 'adasda', 'BCA', '8638183929301301', '2023-06-15 03:38:58'),
(67, 'asdasd', 'BRI', '1021930129301301', '2023-06-15 03:39:45'),
(68, 'puput', 'BCA', '8638183929301301', '2023-06-15 13:20:20'),
(69, 'puput', 'BCA', '8638183929301301', '2023-06-15 13:20:21'),
(70, 'ayu rahmah', 'BNI', '7878278129301301', '2023-06-19 00:37:30'),
(71, 'qqeqweq', 'BRI', '1021930129301301', '2023-06-19 03:18:45'),
(72, 'adasd', 'BCA', '8638183929301301', '2023-06-19 03:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `images`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'user', 'user@gmail.com', '$2y$10$9JV2NjaCQvaqoWXU4.VtDevAHSkMPcrejDEzk3AeFELbaRKrQO9cC', 'profile.jpg', 2, 1, '0000-00-00'),
(8, 'Administrator', 'admin@gmail.com', '$2y$10$shH2mh8LK5jrzm72JxCo1.aVBPW0Pq/2Len4eHtu7P9cTwfZjfIwq', 'profile.jpg', 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `user_menu_id` int(11) NOT NULL,
  `menu` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`user_menu_id`, `menu`) VALUES
(1, 'Admin'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Customers');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `user_submenu_id` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL,
  `title` varchar(125) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_submenu`
--

INSERT INTO `user_submenu` (`user_submenu_id`, `user_menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'My Profile', 'toko', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Managemen', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(25, 1, 'Role Options', 'admin/role', 'fas fa-fw fa-users-cog', 1),
(29, 1, 'Products Options', 'product', 'fab fa-fw fa-dropbox', 1),
(30, 1, 'Category Options', 'category', 'fas fa-fw fa-tasks', 1),
(31, 1, 'Brand Options', 'brand', 'fab fa-bandcamp', 1),
(32, 1, 'Order Optionts', 'ManageOrder', 'fas fa-fw fa-shopping-bag', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`user_menu_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`user_submenu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `user_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `user_submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
