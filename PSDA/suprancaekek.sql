/*
SQLyog Community v9.63 
MySQL - 5.1.33-community-log : Database - sup_rancaekek
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sup_rancaekek` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sup_rancaekek`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('admin','blangko','debit') NOT NULL,
  `id_session` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `personil` (`id_personil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`,`status`,`id_session`) values (5,'pangeran','ed02a0d2174f83e6bbea0bcfeb5b7a60','admin','m57og0qm7ktv2r91spm5rdfi61'),(6,'pangeran90','23efb564762b031f94be4b033da6087d','debit','klrpr23s9dgo8pinnqlr5jhtp0'),(7,'pangeran','d8578edf8458ce06fbc5bb76a58c5ca4','debit','m57og0qm7ktv2r91spm5rdfi61'),(8,'iwansetiawan','4ac6a1440c83bcb7d0b9880418d0bd30','debit','kbq3ip5vbnnpgn0g9v546dlbn0');

/*Table structure for table `agama` */

DROP TABLE IF EXISTS `agama`;

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `nm_agama` varchar(20) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `agama` */

insert  into `agama`(`id_agama`,`nm_agama`) values (1,'Islam'),(2,'Kristen'),(3,'Hindu'),(4,'Budha'),(5,'DLL');

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `id_agenda` int(5) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `agenda` */

insert  into `agenda`(`id_agenda`,`tema`,`tema_seo`,`isi_agenda`,`tempat`,`pengirim`,`tgl_mulai`,`tgl_selesai`,`tgl_posting`,`jam`,`username`) values (30,'Seminar \"Membangun Portal Berita ala Detik.com\"','seminar-membangun-portal-berita-ala-detikcom','Seminar ini akan membahas tentang konsep, proses, dan implementasi dalam membangun portal berita sekelas detik.com.<br>','Lab. Universitas Atmajaya Yogyakarta','HMJ TI (081843092580)','2009-03-14','2009-03-14','2009-01-31','11.00 s/d 13.00 WIB','admin'),(31,'Bedah Buku \"Membongkar Trik Rahasia Master PHP\"','bedah-buku-membongkar-trik-rahasia-master-php','Acara bedah buku terbaru dari Lukmanul Hakim yang berjudul Membongkar Trik Rahasia Para Master PHP.\r\n','Toko Buku Gramedia Sudirman','Enda (08192839849)','2009-10-29','2009-10-30','2009-01-31','08.00 s/d 12.00 WIB','joko'),(36,'Workshop VBA Programming for Excel','workshop-vba-programming-for-excel','Tes\r\n','Lab. Pusat Komputer UII','Aci (08189320984)','2009-10-29','2009-10-29','2009-10-26','09.00 s/d Selesai','wiro'),(38,'Workshop Kolaborasi PHP dan jQuery','workshop-kolaborasi-php-dan-jquery','Materinya mengenai cara mengkolaborasikan pemrograman PHP dan jQuery\r\n','Hotel Santika Yogyakarta','Rendy (08787768768)','2010-01-15','2010-01-15','2010-01-15','09.00 s/d 16.00 WIB','admin');

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `banner` */

insert  into `banner`(`id_banner`,`judul`,`url`,`gambar`,`tgl_posting`) values (4,'Fresh Book','http://freshbooks.com','freshbook.jpg','2009-02-05'),(7,'Cinema 21','http://21cineplex.com','cinema21.jpg','2008-02-09'),(8,'Penjualan Handphone','http://www.abdulkohar.com','561099_10152343066330634_1965957595_n.jpg','2015-07-11');

/*Table structure for table `bentukbendung` */

DROP TABLE IF EXISTS `bentukbendung`;

CREATE TABLE `bentukbendung` (
  `id_bentukbendung` int(11) NOT NULL AUTO_INCREMENT,
  `nm_bentukbendung` varchar(30) NOT NULL,
  `rumushitunganL` double NOT NULL,
  `rumushitunganM` double NOT NULL,
  PRIMARY KEY (`id_bentukbendung`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `bentukbendung` */

insert  into `bentukbendung`(`id_bentukbendung`,`nm_bentukbendung`,`rumushitunganL`,`rumushitunganM`) values (1,'Cipoleti',30.3,30);

/*Table structure for table `berita` */

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `berita` */

insert  into `berita`(`id_berita`,`id_kategori`,`username`,`judul`,`judul_seo`,`headline`,`isi_berita`,`hari`,`tanggal`,`jam`,`gambar`,`dibaca`,`tag`) values (76,23,'joko','Laskar Pelangi Pecahkan Rekor','laskar-pelangi-pecahkan-rekor','Y','Sukses film Laskar Pelangi dalam memecahkan rekor jumlah penonton memberi pembelajaran bahwa penonton film Indonesia bisa menerima inovasi. Mira Lesmana dari Miles Films yang memproduksi film ini mengatakan, sampai Rabu (12/11), pemutaran Laskar Pelangi di 100 layar bioskop di 25 kota menyedot lebih dari 4,4 juta penonton. Padahal, Kamis kemarin, jumlah kota yang memutar film itu bertambah dengan Padang, Tasikmalaya, dan Ambon. Sebelumnya, Ayat-ayat Cinta ditonton 3,7 juta penonton (Kompas, 26/10).<br><br>Jumlah penonton itu belum termasuk penonton layar tancap untuk menjangkau penonton di daerah yang belum memiliki gedung bioskop.<br><br>Menurut Mira, layar tancap di tiga lokasi di Belitung, tempat cerita berlokasi, menyedot penonton lebih dari 60.000 penonton dan di Bangka sekitar 80.000-an orang. Pemutaran layar tancap juga dilakukan di Rantau (Sumatera Utara) dan akan dilakukan di Natuna, Aceh (enam lokasi), Lombok, serta Papua di Timika, Sorong, dan Jayapura.<br><br>Kabar gembira lainnya, film ini menjadi salah satu film yang terpilih untuk menjadi bagian dari Berlin International Film Festival atau Berlinale 2009. Festival ini adalah sebuah peristiwa budaya terpenting di Jerman yang juga adalah salah satu festival film internasional paling bergengsi di dunia.<br><br>Film Laskar Pelangi diangkat dari novel berjudul sama karya Andrea Hirata. Film ini mengangkat realitas sosial masyarakat Belitung, tentang persahabatan, kegigihan dan harapan, dalam bingkai kemiskinan dan ketimpangan kelas sosial.<br><br>\"Jumlah penonton dan panjangnya masa pemutaran film sejak 25 September memperlihatkan penonton butuh sesuatu yang baru, yang inovatif, walau yang ditampilkan realitas tidak gemerlap,\" papar Mira.<br><br>Selama ini, kebanyakan film Indonesia bertema drama cinta, horor, dan komedi, sementara Miles Films dalam empat film terakhirnya menggarap tema realisme sosial-politik.<br><br>Mira mengakui, inovasi itu tidak selalu berhasil secara komersial. Contohnya Gie, juga produksi Miles Films. Meskipun dari sisi kritik film dan kreativitas bagus, tetapi tidak sesukses Laskar Pelangi dalam pemasaran.<br><br>Produksi film ini menghabiskan biaya Rp 9 miliar dan 90 persen dikerjakan di dalam negeri. \"Sound mixing dengan sistem Dolby dan transfer optis untuk suara belum bisa dikerjakan di dalam negeri,\" ujar Mira.<br><br>Miles Films dan para investor, antara lain Mizan Publishing, kini bersiap memproduksi lanjutan Laskar Pelangi. Sang Pemimpi adalah bagian novel tetralogi Andrea Hirata. (sumber: kompas.com)<br>','Minggu','2009-02-01','14:31:58','76laskarpelangi.jpg',11,'laskar-pelangi'),(69,22,'admin','Gelombang Solidaritas untuk Palestina','gelombang-solidaritas-untuk-palestina','Y','Serangan Israel kepada Palestina yang terjadi mulai akhir Desember 2008 silam telah menewaskan hampir seribu nyawa manusia. Warga sipil yang kebanyakan perempuan dan anak-anak menjadi korban keganasan tentara Israel. Warga dunia pun marah. Saat ini, hampir setiap hari sejumlah unjuk rasa mengecam kebiadaban Israel terjadi di seluruh belahan dunia. Kejahatan Israel adalah kejahatan kemanusiaan dan sudah menjadi isu bersama umat manusia.<br><br>Kecaman tidak hanya datang dari umat Islam, tapi juga dari umat agama lain. Lihat saja sejumlah biksu yang tergabung dalam Perwakilan Umat Buddha Indonesia (Walubi), kemudian Persatuan Tionghoa Indonesia serta Dewan Pemuda Kristen Indonesia.<br><br>Mereka semua ikut berpatisipasi dalam aksi solidaritas untuk Palestina yang dilaksanakan di lapangan Monas, Jakarta Ahad (11/1/2009) lalu. Mereka mengutuk kebiadaban Israel. (sumber: sabili.co.id)<br>','Sabtu','2009-01-31','14:34:18','11solidaritas.jpg',12,'gaza,israel,palestina'),(78,2,'wiro','Cristiano Ronaldo Pemain Sepakbola Terbaik 2008','cristiano-ronaldo-pemain-sepakbola-terbaik-2008','Y','Cristiano Ronaldo akhirnya terpilih sebagai Pemain Terbaik Dunia versi FIFA, mengalahkan Lionel Messi (Barcelona), dan Fernando Torres (Liverpool). Penetapan itu diumumkan di Zurich, Swiss, Senin atau Selasa (13/1) dini hari. Ronaldo menjadi pemain pertama dari Premier League yang menerima penghargaan itu. Sebelumnya, dia juga terpilih sebagai Pemain Terbaik Eropa (Ballon d\'Or) dan baru saja dinobatkan sebagai Pemain Terbaik Dunia versi suporter.<br><br>Pemain Manchester United (MU) asal Portugal itu meraih 935 pemilih dari poling yang disebar ke seluruh dunia. Pemilihnya hanya dibatasi kapten tim dan pelatih. Hasil itu diumumkan oleh pemain legendaris Brasil, Pele.<br><br>Sementara itu, Lionel Messi berada di tempat kedua. Pemain Barcelona asal Argentina itu meraih 678 suara. Adapun striker Liverpool asal Spanyol, Fernando Torres, berada di tempat ketiga dengan 203 suara.<br><br>Musim lalu, Ronaldo memang tampil bagus. Dia mencetak 42 gol dan membawa Manchester United merebut gelar Premier League dan Liga Champions.<br><br>\"Ini momen yang sangat indah buatku. Momen spesial dalam hidupku. Aku ingin mengatakan kepada ibu dan saudara perempuanku bahwa kembang api sudah saatnya disulut,\" kata Ronaldo seusai menerima penghargaan itu. (sumber: detiksport.com)<br>','Senin','2009-02-02','14:36:34','92cristianoronaldo.jpg',16,'sepakbola'),(71,2,'admin','Ronaldo \"CR7\" Pecahkan Transfer Termahal','ronaldo-cr7-pecahkan-transfer-termahal','Y','Cristiano Ronaldo segera menjadi pemain termahal dunia, menumbangkan rekor Zinedine Zidane. Agen Ronaldo menyebut bahwa kliennya terikat pra kontrak 91 juta poundsterling dengan Real Madrid. Dengan transfer senilai Rp 1,5 triliun itu, maka CR7 dipastikan akan menjadi pemain termahal dunia. Tapi, itu mungkin baru terealisasi musim depan alias musim panas nanti.<br><br>Sport melansir bahwa Pemain Terbaik Dunia 2008 itu terikat kontrak dengan Madrid untuk jangka panjang. Bahkan, juga disebutkan bahwa agen Ronaldo, Jorge Mendes, akan terkena klausul penalti (penalty clause) 20 juta euro (18 juta pounds) jika Ronaldo tak hadir di Santiago Bernabeu, musim depan.<br><br>Sebelumnya, pemain berusia 23 tahun ini dikabarkan juga terikat kontrak dengan mantan presiden Madrid, Florentino Perez. Ronaldo akan menjadi alat kampanye Perez dalam pemilihan presiden Madrid, pertengahan Juli 2009.<br><br>Rekor pemain termahal dunia kini masih dipegang Zinedine Zidane dengan 46 juta poundsterling pada 2001. Perez juga menjadi aktor di balik kedatangan maestro asal Prancis itu dari Juventus ke Madrid.<br><br>Demikian juga runner up pemain termahal dunia, Luis Figo. Perez membajaknya dari rival bebuyutan Barcelona pada 2000 dengan nilai 38,7 juta pounds. Saat itu, Figo juga jadi alat kampanye Perez. (sumber: vivanews.com)<br>','Sabtu','2009-01-31','14:41:25','97cristiano-ronaldo.jpg',31,'sepakbola'),(72,22,'admin','Belajar Dari Krisis Amerika','belajar-dari-krisis-amerika','Y','Ibarat karena nila setitik, rusak susu sebelanga. Dan di kolam susu inilah tampaknya warga dunia tengah menunggu kapan giliran nila itu datang yang akan benar-benar melumpuhkan sendi perekonomian di negaranya masing-masing, tak terkecuali kita di Indonesia.<br><br>Dan kini kita paham bahwa kondisi yang cukup serius kali ini memang awalnya bermula dari krisis nasional di AS, yang kemudian menyebar dengan cepat ke seluruh dunia. Namun jelas bahwa ia bukanlah penyebab utamanya seperti yang dituding oleh sejumlah media (lihat \'Runtuhnya Pusat Kapitalisme\', Editorial Harian Radar Bogor, 27/09/08).<br><br>Yang menjadi benang merah dari rentetan krisis ini justru adalah penerapan globalisasi dimana roda perekonomian banyak negara di dunia digantungkan. Sebab dalam sistem ekonomi global yang tengah dipraktikkan banyak negara saat ini, krisis yang dialami suatu negara akan menular bak virus ke negara-negara lain, khususnya bila krisis itu bermula dari negara-negara maju dan yang punya otoritas dalam peta perkonomian dunia.<br><br>Meski belum memiliki definisi yang mapan, istilah globalisasi banyak dihubungkan dengan peningkatan keterkaitan dan ketergantungan antarbangsa dan antarmanusia di seluruh dunia dunia melalui perdagangan, investasi, perjalanan, budaya populer, dan bentuk-bentuk interaksi yang lain sehingga batas-batas suatu negara menjadi bias (wikipedia.com).<br><br>Di alam globalisasi inilah, kesalingbergantungan antara negara satu dengan negara lain terjalin begitu kuat. Dengan begitu, sebuah negara yang telah maju diharapkan akan merangsang perekonomian negara-negara yang sedang berkembang lewat sistem pasar bebas yang saling terhubung dan kompetitif. Tak heran bila globalisasi dipercaya akan mampu membawa kemaslahatan pada segenap umat manusia di dunia.<br><br>Sebuah niat yang kedengarannya cukup mulia memang. Dan sejak diterapkan pada era 80-an, globalisasi menjadi sistem ekonomi (mencakup juga aspek sosial, budaya, dan komunikasi) yang populer di banyak negara. Tak terkecuali bagi negara kita tercinta yang kala itu berada di bawah rezim Orde Baru.<br><br>Tapi dengan adanya krisis global ini, untuk pertama kalinya kita disadarkan, betapa sistem globalisasi yang tengah dipraktikkan kebanyakan negara saat ini, ternyata juga berpotensi membawa umat manusia pada krisis berkepanjangan. Ditambah lagi betapa globalisasi ekonomi dunia kian hari kita lihat semu dan banal, yakni di mana triliunan dollar AS diperjualbelikan dan dipermainkan di pasar modal, tetapi hanya sebagian saja diantaranya yang benar-benar menyentuh sektor riil.<br><br>Dengan kondisi kesalingterhubungan dan kesalingbergantungan inilah globalisasi ekonomi menciptakan budaya ekonomi sebagai jaringan terbuka (open network) yang rawan terhadap kemacetan di suatu titik jaringan dan serangan virus ke seluruh jaringan. Serangan virus (semisal kemacetan likuiditas) di sebuah titik jaringan (seperti AS) dengan cepat menjalar ke seluruh jejaring global tanpa ada yang tersisa.<br><br>Maka di titik ini pulalah kita sadar betapa Indonesia sebagai salah satu peserta yang turut serta dalam sistem ekonomi global, cukup rentan terkena dampak krisis ini.<br><br>Sejatinya, krisis global ini memang lebih banyak berpengaruh pada industri keuangan, khususnya pasar modal. Ruang gerak pasar modal itu sendiri belum meluas bagi usaha dan bisnis yang dijalankan bagi kebanyakan masyarakat Indonesia.<br><br>Bisa disimak bahwa roda perekonomian di Kota Bogor sendiri lebih banyak digerakkan oleh sektor riil dan usaha kecil menengah (UKM). Kebanyakan dari mereka menjalankan usaha yang tak memiliki persinggungan langsung dengan investor, juga dikerjakan oleh SDM dari dalam negeri sendiri.<br><br>Karenanya, kita selaku warga Bogor patut menjadikan peristiwa krisis global saat ini sebagai momentum dalam mendukung segenap pelaku bisnis dan UKM kota Bogor. Sebab, sejarah negeri ini telah membuktikan bahwa para pelaku bisnis dan UKM-lah yang mampu bertahan ketika krisis menerpa Indonesia di tahun 1998.<br><br>Dan kepada merekalah kita bisa berharap krisis global kali ini takkan mampir ke Indonesia. (sumber: http://prys3107.blogspot.com/)<br>','Sabtu','2009-01-31','14:48:09','44amerika.jpg',8,'amerika'),(74,19,'admin','Google Chrome Susupi Microsoft','google-chrome-susupi-microsoft','Y','<p>\r\nBrowser Microsoft, Internet Explorer (IE), bisa mendominasi karena tersedia secara default pada banyak komputer di pasaran. Google Chrome akan menggoyang dengan menyusup di lahan yang sama. Google rupanya sudah bersiap-siap menawarkan Google Chrome secara default pada komputer-komputer baru. \r\n</p>\r\n<p>\r\nPichai juga menjanjikan Chrome akan keluar dari versi Beta (uji coba) pada awal 2009. \r\nJika Google berhasil menyusupkan Chrome dalam lahan yang selama ini jadi &#39;mainan&#39; Microsoft, lanskap perang browser akan mengalami perubahan. \r\n</p>\r\n<p>\r\nSaat ini Microsoft masih mendominasi pada kisaran 70 persen lewat Internet Explorer-nya, sedangkan Firefox menguasai sekitar 20 persen. (sumber: <a href=\"http://detikinet.com\" target=\"_blank\">detikinet.com</a>)\r\n</p>\r\n','Sabtu','2009-01-31','13:34:25','25chrome.jpg',30,'browser,google'),(60,19,'admin','Digerus Firefox, IE Makin Melempem','digerus-firefox-ie-makin-melempem','Y','Browser Mozilla Firefox sepertinya makin berkibar. Berdasarkan data terbaru dari biro penelitian Net Applications, Firefox menapak naik dengan menguasai 20,78 persen pangsa pasar browser pada bulan November, naik dari angka 19,97 persen di bulan Oktober.<br><br>Dikutip detikINET dari Afterdawn, Selasa (2/1/2/2008), Firefox kemungkinan sukses menggaet user yang sebelumnya mengandalkan browser Internet Explorer (IE) besutan Microsoft. Pasalnya, masih menurut data Net Applications, pangsa pasar IE kini menurun di bawah 70 persen untuk kali pertama sejak tahun 1998. IE sekarang menguasai 69,8 persen pangsa pasar dari sebelumnya 71,3 persen di bulan Oktober.<br><br>Padahal di masa jayanya di tahun 2003, IE pernah begitu dominan dengan menguasai 95 persen pasaran browser. Penurunan pangsa pasar IE ini disinyalir juga terkait musim liburan di AS di mana banyak perusahaan libur. Padahal browser IE banyak dipakai oleh kalangan perusahaan.<br><br>Adapun produk browser lainnya menunjukkan tren peningkatan. Apple Safari kini punya pangsa 7,13 persen dan Google Chrome sebesar 0,83 persen dari yang sebelumnya 0,74 persen. Sementara pangsa pasar Opera mengalami penurunan dari yang sebelumnya 0,75 persen menjadi 0,71 persen saja. (sumber: <a target=\"_blank\" title=\"http://detikinet.com\" href=\"http://detikinet.com\">detikinet.com</a>)<br>','Sabtu','2009-01-31','13:58:31','47firefox.jpg',4,'browser'),(61,22,'admin','Sepatu Melayang Saat Bush Berpidato di Irak','sepatu-melayang-saat-bush-berpidato-di-irak','Y','Apakah pemerintah AS sakit hati karena Presiden Bush ditimpuk sepatu? Sudah pasti. Tapi di Irak, sepatu melayang itu sebagai pamitan terindah untuk Bush. Muntazer Al Zaidi dieluk-elukkan di Irak. Tuntutan masyarakat agar dia dibebaskan juga semakin kencang. Mereka menilai tindakan Al Zaidi menimpuk Bush dengan sepatunya sebagai tindakan paling berani.<br><br>Sahabat Al Zaidi di stasiun TV Al Baghdadia, mengungkapkan betapa bencinya Al Zaidi pada Bush. Dia menganggap Bush sebagai tokoh yang memerintahkan perang di Irak.<br><br>\"Melempari sepatu pada Bush merupakan ciuman pamitan terbaik hingga sejauh ini ... itu merupakan ungkapan bagaimana rakyat Irak dan bangsa Arab lainnya membenci Bush,\" tulis Musa Barhoumeh, editor koran independen Yordania, Al-Gahd, Selasa (16/12).<br><br>Di Washington, Al Zaidi dicap sebagai orang yang cuma mencari perhatian.<br><br>\"Tak diketahui apa motivasi orang itu, ia tampaknya jelas hanya berusaha mendapatkan perhatian atas dirinya,\" kata Jurubicara Deplu AS, Roberet Wood, kepada para wartawan.<br><br>Pemerintah Irak mencap tindakan Zaidi sebagai \'memalukan\' dan menuntut permintaan maaf dari pemimpin redaksinya yang berkerdudukan di Kairo. Namun Bos Al Zaidi malah menuntut pembebasan reporternya itu. (sumber: <a target=\"_blank\" title=\"http://inilah.com\" href=\"http://inilah.com\">inilah.com</a>)<br>','Sabtu','2009-01-31','14:04:27','38bush.jpg',11,'amerika,george-bush'),(62,22,'admin','Monumen Menghormati Pelempar Sepatu Bush','monumen-menghormati-pelempar-sepatu-bush','Y','Wartawan pelempar sepatu ke arah mantan Presiden Amerika Serikat George W Bush Desember lalu, benar-benar menjadi pahlawan. Sebuah kota di Irak bahkan membuatkan monumen sepatu untuk menghormatinya. Seperti diberitakan Reuters, Jumat (30/1/2009), monumen sepatu yang terletak di kota Tikrit Irak tersebut diresmikan Kamis kemarin. Sepatu sepanjang dua meter itu dilapis material berwarna perunggu.<br><br>\"Muntazar: Puasa (bicara) hingga pedang menyayat kebisuan dengan darah. Sunyi hingga mulut kami menyuarakan kebenaran,\" demikian tertulis di monument itu. Saat melemparkan sepatunya ke Bush dalam sebuah konferensi pers di Baghdad, wartawan televisi Al Baghdadia itu mengucapkan bahwa Bush merupakan orang yang bertangung jawab atas kematian ribuan warga Irak. Zaidi juga menyebut Bush dengan kata \"anjing\".<br><br>Sejak insiden itu Zaidi medekam di penjara Baghdad. Dia menghadapi tuntutan penyerangan terhadap tamu negara dengan ancaman hukuman penjara hingga 15 tahun.<br><br>Pimpinan rumah yatim piatu dan organisasi kesejahteraan anak Tikrit Fatin Abdul Qader mengatakan monumen itu didesain oleh Laith Al Amiri dengan bobot keseluruhan sekira 1,2 ton. Tema monumen tersebut adalah \"Patung Semangat dan Kedermawanan\".<br><br>\"Monumen ini merupakan ekspresi penghargaan dan apresiasi kami untuk Muntazhar Zaidi akrena hati orang-orang Irak akan tenang dengan leparan sepatunya,\" kata Fatin. (sumber: <a target=\"_blank\" title=\"http://sabili.co..id\" href=\"http://sabili.co..id\">sabili.co.id</a>)<br>','Sabtu','2009-01-31','14:11:28','91bushet.jpg',5,'amerika,george-bush'),(75,22,'admin','Krisis Ekonomi Amerika, Bukti Gagalnya Kapitalisme','krisis-ekonomi-amerika-bukti-gagalnya-kapitalisme','Y','<p>\r\nPresiden Ekuador, Rafael Correa menilai krisis yang terjadi di Amerika menjadi bukti kegagalan sistem kapitalis dan periode Kapitalisme telah berakhir serta ekonomi Amerika sebagai pasar terbesar dunia telah dililit krisis. (Kantor Berita Fars Prensa Latina Kuba).\r\n</p>\r\n<p>\r\nCorrea menambahkan, apa yang terjadi di Amerika tidak terbatas pada krisis keuangan, namun bukti kebuntuan sebuah sistem yang dibangun tanpa dicermati secara serius. \r\n</p>\r\n<p>\r\nMenurut Correa, solusi krisis sistem keuangan Amerika tidak akan bisa selesai dengan menyuntikkan dana 700 miliar dolar kepada bank-bank yang telah bangkrut, namun yang lebih penting lagi adalah Amerika harus melakukan perubahan fundamental. (sumber: hidayatullah.com)\r\n</p>\r\n','Sabtu','2009-01-31','14:13:52','54RafelKarera.jpg',19,'amerika'),(79,22,'admin','Ahmadinejad: Gaza Akan Jadi Kuburan Israel','ahmadinejad-gaza-akan-jadi-kuburan-israel','Y','Iran dan Israel tampaknya tidak akan pernah melakukan genjatan senjata. Presiden Iran Mahmoud Ahmadinejad melontarkan kata-kata serangan terhadap Israel dengan menyebut negara Yahudi itu akan segera lenyap dari bumi. \"<span style=\"font-weight: bold; font-style: italic;\">Kejahatan yang dilakukan rejim Zionis (Israel) terjadi karena mereka sadar sudah sampai di akhir dan segera lenyap dari muka bumi</span>,\" kata Ahmadinejad dalam pawai anti-Israel yang berlangsung di Teheran, seperti dilaporkan kantor berita Mehr dan dikutip DPA, Sabtu (13/12).<br><br>Dia mengatakan Israel sudah kehilangan arah dan kian sadar bahwa kelompok negara-negara kuat makin ragu untuk menunjukkan dukungan untuk negara Yahudi itu.<br><br>Ahmadinejad juga mengatakan bahwa kejahatan Israel di Gaza bertujuan mengganti pemimpin politik di wilayah itu agar sesuai dengan kepentingan politik Israel. (sumber: <a target=\"_blank\" title=\"Situs Berita Inilah.com\" href=\"http://inilah.com\">inilah.com</a>)<br>','Senin','2009-02-02','14:23:39','22ahmadinejad.jpg',88,'gaza,israel,palestina'),(65,23,'admin','Michael Heart \"Song for Gaza\"','michael-heart-song-for-gaza','Y','Banyak cara untuk men-support perjuangan rakyat Palestina di Gaza, salah satunya dengan lagu. Seorang penyanyi di Los Angeles Amerika Serikat - Michael Heart yang bernama asli Annas Allaf kelahiran Syiria, membuat sebuah lagu khusus yang dia tujukan untuk rakyat Gaza yang sampai saat ini masih jadi sasaran pembantaian oleh Zionis Israel.<br><br>Sejak dia merilis lagu yang berjudul \"We will not go down\" (Song for Gaza), lagu tersebut mendapat banyak respon, berupa komentar dukungan, sampai ia sendiri kewalahan menjawab dan membalas berbagai email yang masuk.<br><br>Michael Heart menggambarkan kondisi rakyat Gaza akan gempuran Zionis Israel dalam lagunya itu membuat kita merasa tersindir dan sedih akan nasib rakyat Gaza. Walaupun lagu itu baru di rilis, namun telah ratusan ribu orang melihatnya di youtube dan mendownload MP3 nya.<br><br>Awalnya dia berencana dengan menjual CD lagu MP3 nya itu dan hasil penjualannya akan dia donasikan untuk kepentingan amal kemanusiaan untuk penduduk Gaza, tapi karena dia merasa sulit kalau harus sendiri mendonasikan hasil penjualan CD MP3 nya, akhirnya dia memutuskan semua orang bisa mendownload gratis lagu tersebut. Dan dia berharap, setelah mendengarkan lagu itu, orang-orang akan tergerak hatinya untuk membantu rakyat Palestina di Gaza dengan mendonasikan uangnya ke lembaga-lembaga kemanusiaan yang ada atau organisasi yang didedikasikan untuk meringankan penderitaan rakyat Palestina.<br><br>Sebagai musisi Michael Heart sangat berterima kasih atas dukungan yang diberikan kepada dia atas lagu tersebut. Dan dia berharap setiap orang yang masih mempunyai hati nurani, mendukung perjuangan rakyat Palestina dan membantu mereka walau hanya dengan berupa doa.<br><br><br><span style=\"font-weight: bold;\">WE WILL NOT GO DOWN (Song for Gaza)</span><br style=\"font-weight: bold;\"><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">A blinding flash of white light</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">Lit up the sky over Gaza tonight</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">People running for cover</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">Not knowing whether they\'re dead or alive</span><br style=\"font-style: italic;\"><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">They came with their tanks and their planes</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">With ravaging fiery flames</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">And nothing remains</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">Just a voice rising up in the smoky haze</span><br style=\"font-style: italic;\"><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">We will not go down</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">In the night, without a fight</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">You can burn up our mosques and our homes and our schools</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">But our spirit will never die</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">We will not go down</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">In Gaza tonight</span><br style=\"font-style: italic;\"><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">Women and children alike</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">Murdered and massacred night after night</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">While the so-called leaders of countries afar</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">Debated on who\'s wrong or right</span><br style=\"font-style: italic;\"><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">But their powerless words were in vain</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">And the bombs fell down like acid rain</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">But through the tears and the blood and the pain</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">You can still hear that voice through the smoky haze</span><br style=\"font-style: italic;\"><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">We will not go down</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">In the night, without a fight</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">You can burn up our mosques and our homes and our schools</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">But our spirit will never die</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">We will not go down</span><br style=\"font-style: italic;\"><span style=\"font-style: italic;\">In Gaza tonight </span><br><br>(sumber: detik.com)<br>','Sabtu','2009-01-31','14:26:40','24michaelheart.jpg',24,'gaza,israel,palestina'),(66,22,'admin','Demo Kecam Israel Warnai Ibukota','demo-kecam-israel-warnai-ibukota','Y','Aksi unjuk rasa menentang agresi militer Israel ke Jalur Gaza, Palestina kembali mewarnai Jakarta. Unjuk rasa kali ini dilakukan oleh Ormas Islam Hizbut Thahrir di kawasan Silang Monas, Jakarta. Sejak Minggu (4/1) pagi, para pengunjuk rasa nampak berbondong-bondong membawa karton besar bertuliskan \'Save Palestine\' dan foto anak-anak serta perempuan Palestina yang menjadi korban tak berdosa dari serangan biadab militer Israel.<br><br>Kepada warga Jakarta yang berolahraga di sekitar kawasan Monas, para pengunjuk rasa juga mengedarkan kotak sumbangan untuk didonasikan kepada korban warga Palestina.<br><br>Aksi unjuk rasa dan banyaknya warga Jakarta yang rutin berolahraga di kawasan Silang Monas setiap Minggu pagi, membuat kawasan itu cukup padat untuk dilalui kendaraan bermotor.<br><br>Serangan udara Israel yang dimulai pada 27 Desember 2008 sudah terjadi selama sepekan di Jalur Gaza dan menewaskan lebih 420 orang.<br><br>Meski mendapat kutukan keras dari dunia Internasional, termasuk Indonesia, Israel sampai saat ini belum menunjukkan tanda-tanda akan menghentikan aksi militernya. (sumber: inilah.com)<br>','Sabtu','2009-01-31','14:29:16','32demo.jpg',23,'gaza,israel,palestina'),(67,2,'admin','Ana Ivanovic Dinobatkan Sebagai Ratu Tenis 2008','ana-ivanovic-dinobatkan-sebagai-ratu-tenis-2008','Y','Ana Ivanovic, dara kelahiran Belgrade pada tanggal 6 November 1987 sudah mulai bermain tenis sejak umur 5 tahun sesudah menonton Monica Seles di TV, mengingat nomor telpon sekolah tenis lokal dan memohon kepada orang tuanya untuk mengajak pergi ke sekolah itu. Kemudian di acara ulang tahunnnya yang ke-5, orang tuanya memberi hadiah berupa raket tenis dan sejak itu dia mulai jatuh cinta dengan dunia tenis. Kemudian Ana mulai berlatih tenis secara intens dengan Scott Byrnes pada bulan juli 2006.<br><br>Dragana, ibunya adalah seorang pengacara, sedangkan Miroslav bapaknya adalah seorang pebisnis, Milos kakaknya adalah seorang pemain basket dan seluruh keluarganya menyukai olahraga, tetapi tidak ada yang menyukai tenis seperti ana.<br><br>Senjata utamanya di tenis adalah pukulan forehand-nya, dan dia bisa main di segala jenis lapangan. Hobinya adalah menonton film di bioskop atau menonton DVD di rumah. Ana juga suka membaca, khususnya tentang Mitologi dan Sejarah Yunani. Ana juga senang sekali mendengarkan musik.<br><br>Pada tahun 2008 ini, setelah menjuarai Roland Garros prancis dengan mengalahkan Dinara safina dari rusia di final, maka saat ini peringkat Ana Ivanovic naik menjadi peringkat 1 dunia untuk petenis putri.<br>','Sabtu','2009-01-31','14:30:48','20anaivanovic.jpg',7,'tenis'),(73,2,'admin','Maria Kirilenko, Petenis Terseksi Versi WTA','maria-kirilenko-petenis-terseksi-versi-wta','Y','Pesona kecantikan Maria Sharapova dan Ana Ivanovic sepertinya sudah mendapat saingan baru. Tidak jauh-jauh, nama Maria Kirilenko tiba-tiba menyeruak di daftar petenis terseksi pilihan responden WTA. Artinya, Maria sukses merengkuh gelar yang musim lalu diraih Maria Sharapova.<br><br>Setengah dari 7 ribu responden yang masuk ke WTA menyebut, kalau Maria adalah sosok petenis ideal dan paling proporsional di level bentuk tubuh. Meski hanya berperingkat 18 dunia, namun pesonanya di atas lapangan tenis menjadi daya tarik tersendiri.<br><br>\"Tubuhnya sangat indah, siluetnya membuat setiap pria pasti penasaran ingin melihat lebih dekat. Yang jelas, ia memiliki kepribadian baik yang makin menyempurnakan pesona fisiknya,\" tulis seorang responden. Di kalangan petenis putri sendiri, sudah lama Maria menjadi saingan berat Masha dan Ana ivanovic.<br><br>Di situs pribadinya, petenis bernama asli Maria Yuryevna Kirilenko ini mengaku selalu menjaga proporsi tubuh dengan senam dan renang, selain tentu berlatih fisik tenis. \"Olahraga adalah cermin hidupku, jika tak olahraga sehari saja, kadang membuat tubuhku terasa lemas dan tak bergairah,\" ujar Maria.&nbsp; (persda network/bud)<br><br>Meksi bersaing di lapangan dan dunia mode, namun ternyata sosok Maria Kirilenko adalah sobat sejati Maria Sharapova. Bukan hanya karena sama-sama berasal dari Rusia, namun gaya hidup mereka berdualah yang membuat Maria-Masha banyak memiliki kecocokan.<br>Selain suka fotografi, mereka berdua juga memiliki hobi berbelanja, terutama fashion dan perhiasan. Bukan untuk pamer memang, tapi mereka melakukan itu untuk tabungan dan investasi.<br><br>Di beberapa turnamen, Masha dan Maria memang tampak bersama tatkala berada di luar lapangan. Mereka biasanya menyingkir dari rombongan pemain lain, dan memilih berburu barang kesukaan mereka dengan menyisir bagian kota tempat mereka tengah bertanding. \"Aku dan Masha seperti kakak beradik, bagiku dia lebih dari sekedar sahabat, dia begitu dewasa, apalagi saat kami berdua saling curhat,\" sebut Maria, di tennisnews. <br><br>Daftar petenis terseksi WTA:<br><ol><li>Maria Kirilenko (Russia)</li><li>Maria Sharapova (Russia)</li><li>Ana Ivanovic (Serbian)</li><li>Caroline Wozniacki (Danish)</li><li>Nicole Vaidisova (Czech)</li><li>Sania Mirza (Indian)</li><li>Ashley Harkleroad (American)</li><li>Gisela Dulko (Argentinian)</li><li>Samantha Stosur (Australian)<br></li></ol>','Sabtu','2009-01-31','15:01:49','14mariakirilenko.jpg',41,'tenis'),(77,2,'sinto','Sharapova, Petenis Wanita Berpenghasilan Tertinggi','sharapova-petenis-wanita-berpenghasilan-tertinggi','Y','Petenis asal Rusia, Maria Sharapova dengan penghasilan 26 juta dolar AS merupakan petenis wanita berpenghasilan tertinggi. Ia pernah menempati peringkat satu dunia, pasca mundurnya Justine Henin. Ia juga memiliki prestasi dengan menjuarai turnamen grand slam Australia Terbuka dan AS Terbuka. Namun, sebagian besar penghasilannya didapat dari kontrak iklannya bersama Pepsi, Colgate-Palmolive, Nike dan Motorola.<br><br>Berikutnya disusul Williams bersaudara dari Amerika, yaitu Serena Williams dengan penghasilan 14 juta dolar AS. Ia meraih tiga gelar juara tiap tahunnya semenjak tahun 2005. Ia juga merupakan model dari produk Hawlett-Packard, Nike, dan Kraft. Sedangkan kakak kandungnya, yaitu Venus Williams berpenghasilan 13 juta dolar AS. Ia mengalahkan adiknya di final Wimbledon tahun 2008. Ia memiliki dan menjalankan sendiri usaha fashion Eleven.<br><br>Di peringkat ke empat dan kelima adalah petenis Belgia yaitu Justine Henin dengan penghasilan 12,5 juta dolar AS. Dan petenis asal Serbia, yaitu Ana Ivanovic dengan penghasilan 6,5 juta dolar AS.<br>','Minggu','2009-02-01','19:58:16','89sharapova.jpg',22,'tenis'),(68,2,'admin','Roger Federer, Petenis Legenda Abad Ini','roger-federer-petenis-legenda-abad-ini','Y','Siapa yang tak kenal dengan Roger Federer saat ini? Masih muda, ganteng, namun sudah jadi legenda. Bayangkan, dalam usia belum menginjak 26 tahun, ia sudah memecahkan rekor bertahan sebagai peringkat pertama dunia tenis selama 161 pekan berturut-turut. Ia memecahkan rekor Jimmy Connor yang sudah bertahan puluhan tahun. <br><br>Itu baru satu rekor. Sebelumnya, ia juga mendapat penghargaan Bagel Award, yakni penghargaan sebagai petenis paling banyak memenangkan set tenis dengan angka sempurna 6-0. \"Saya hanya berusaha melakukan yang terbaik dan tidak berhenti memperbaiki kesalahan-kesalahan saya,\"sebut Federer merendah tentang prestasinya itu.<br><br>Dengan kerendahhatian dan semangat untuk terus memperbaiki diri, pria keturunan campuran Swiss, German, dan Afrika Selatan ini sepertinya akan terus mengukir prestasi. Sebab, mengingat usia yang masih muda dan jarak nilai ATP dengan peringkat kedua dunia Rafael Nadal, cukup jauh, ia akan bisa terus bertahan di rangking satu dunia. Apalagi jika ia nantinya bisa memenangkan satu-satunya gelar tenis Grand Slam yang belum diraih, Perancis Terbuka. Ia akan jadi satu-satunya petenis pria yang bisa mengawinkan semua gelar tenis Grand Slam.<br><br>Roger Federer memang sepertinya terlahir untuk jadi legenda. Bahkan, menurut pengakuannya, sejak kecil ia sudah disebut banyak orang punya bakat gemilang di bidang olahraga. Tapi, menurut dirinya, bukan bakat yang membuatnya seperti sekarang. Kerja keras, ketekunan berlatih, dan keuletan di lapangan lah yang membuat dia bisa jadi juara sejati. \"Saya terus berlatih untuk meningkatkan teknik permainan saya dan menambah kekuatan saya. Proses ini saya jalani sampai hari ini dan bahkan makin saya tingkatkan sejak saya jadi juara. Ini saya lakukan karena saya yakin masih banyak perbaikan yang harus terus dilakukan.\"<br><br>Dengan tekad untuk terus melakukan perbaikan itu, Roger Federer terus meretas jalan untuk mengukir rekor-rekor lainnya. Namun, semua rekor dan kemenangan yang diperolehnya, ternyata bukan hanya untuk kebanggaan dirinya. Melalui sebuah yayasan yang diberi nama seperti dirinya, Roger Federer Foundation, ia membantu anak-anak kurang beruntung di dunia terutama di Afrika Selatan. Sebagian hadiah yang diperoleh dari kemenangannya di kejuaraan tenis, digunakan untuk membantu anak-anak itu. Ia juga berperan banyak saat terjadi tsunami akhir tahun 2005. Saat itu, ia terpilih menjadi duta UNICEF, untuk membantu anak-anak yang jadi korban tsunami di Tamil Nadu, India. Ia juga berjanji untuk mengukir lebih banyak kemenangan guna mengumpulkan lebih banyak dana untuk yayasannya. Ia juga merelakan beberapa raketnya untuk dilelang guna disumbangkan melalui UNICEF. Roger Federer telah membuktikan, dengan kerja keras, semangat pantang menyerah, tekad kuat, dan kepedulian terhadap sesama, telah menjadikannya sebagai juara sejati.<br><br>Dari kisah sukses Roger Federer ini, kita dapat mengambil pelajaran bahwa dengan kerja keras disertai semangat pantang menyerahlah kita bisa mewujudkan cita-cita. Selain itu, kepedulian kepada sesama juga selayaknya dapat mendorong semangat kita untuk terus mengukir prestasi. (sumber: andriewongso.com)<br>','Sabtu','2009-01-31','18:59:14','33federer.jpg',16,'tenis'),(70,19,'admin','Kisah Sukses Google','kisah-sukses-google','Y','Dalam daftar orang terkaya di Amerika baru-baru ini, terselip dua nama yang cukup fenomenal. Masih muda, usianya baru di awal 30-an, namun kekayaannya mencapai miliaran dolar. Nama kedua orang itu adalah Larry Page dan Sergey Brin. Mereka adalah pendiri Google, situs pencari data di internet paling terkenal saat ini.<br><br>Terlepas dari jumlah kekayaan mereka, ada beberapa hal yang perlu dicontoh dari kisah sukses mereka. Satu hal yang pertama, yang disebut Sergey Brin, yang kini menjabat sebagai Presiden Teknologi Google, yakni tentang kekuatan kesederhanaan. Menurutnya, simplicity web adalah hal yang disukai penjelajah internet. Dan, Google berhasil karena menggunakan filosofi tersebut, menghadirkan web yang bukan saja mudah untuk mencari informasi, namun juga menyenangkan orang.<br><br>Kunci sukses kedua adalah integritas mereka dalam mewujudkan impiannya. Mereka rela drop out dari program doktor mereka di Stanford University untuk mengembangkan google. Mereka pun pada awalnya tidak mencari keuntungan dari proyek tersebut. Malah, kedua orang itu berangkat dari sebuah ide sederhana. Yakni, bagaimana membantu banyak orang untuk mempermudah mencari sumber informasi dan data di dunia maya. Mereka sangat yakin, ide mereka akan sangat berguna bagi banyak orang untuk mempermudah mencari data apa saja di internet.<br><br>Kunci sukses lainnya yaitu mereka tidak melupakan jasa orang-orang yang mendukung kesuksesan mereka. Larry dan Sergey sangat memerhatikan kesejahteraan SDM di Google. Kantornya yang diberi nama Googleplex dinobatkan sebagai tempat bekerja terbaik di Amerika tahun 2007 oleh majalah Fortune. Di sana suasananya sangat kekeluargaan, ada makanan gratis tiga kali sehari, ada tempat perawatan bagi bayi ibu muda, bahkan sampai kursi pijat elektronik pun tersedia. Mereka sadar, di balik sukses inovasi yang dilakukan Google, ada banyak doktor matematika dan lulusan terbaik dari berbagai universitas yang membantu mereka.<br><br>Larry dan Sergey memang tak pernah menduga Google akan sesukses sekarang. Kedua orang yang terlahir dari keluarga ilmuwan ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ ayah Sergey adalah doktor matematika, sedangkan Larry adalah putra almarhum doktor pertama komputer di Amerika ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ ini memang hanya berangkat dari sebuah masalah sederhana. Mereka berusaha memecahkan masalah tersebut, dan berbagi dengan orang lain. Namun, justru dengan kesederhanaan dan integritas mereka, mampu membuat Google saat ini menjadi mesin pencari terdepan, dikunjungi lebih dari 300 juta orang perhari. Diterjemahkan dalam 88 bahasa dengan nilai saham mencapai lebih dari 500 dolar AS per lembar, membuat sebuah kesederhanaan menjelma menjadi kekuatan yang luar biasa.<br><br>Sebuah niat mulia, meski sesederhana apapun, jika dilandasi kerja keras dan integritas yang tinggi, akan menghasilkan sesuatu yang istimewa. Hal tersebut nampak dari contoh kisah sukses Larry Page dan Sergey Brin di atas. Google yang mereka dirikan terbukti telah membantu banyak orang untuk bisa mendapatkan apa saja dari internet. Dan kini, mereka pun mendapatkan imbalan yang bahkan tak diduga mereka sebelumnya. Kesuksesan sejati memang akan terasa saat kita bisa berbagi. Dan, Larry serta Sergey membuktikannya sendiri. (sumber: andriewongso.com)<br>','Minggu','2009-01-25','20:26:26','73google.jpg',6,'google'),(64,19,'wiro','Browser Safari Diklaim Paling Handal di Windows','browser-safari-diklaim-paling-handal-di-windows','Y','Dibandingkan browser Internet lainnya, Apple mengklaim browser web Safari buatannya adalah yang paling handal digunakan jika digunkan di atas sistem operasi Windows. Hal tersebut disampaikan CEO Apple Steve Jobs saat mengumumkan versi terbaru Safari yang dapat berjalan di Windows.<br><br>\"Kami kira para pengguna Windows akan benar-benar terkejut saat melihat begitu cepat dan menariknya berselancar di Internet menggunakan Safari,\" ujar Steve Jobs di acara Worldwide Developer Conference Apple di San Fransisco, AS, Senin (11/6). Ia mengklaim browser Safari dapat membuka sebuah halaman web dua kali lebih cepat dibandingkan Internet Explorer 7 di Windows dan masih lebih cepat dibandingkan Opera maupun Firefox.<br><br>Kehadiran Safari untuk para pengguna Windows akan semakin menyemarakkan persaingan browser web. Steve Jobs berharap peluncuran ini akan meningkatkan popularitas Safari yang baru mencapai 4,9 persen pangsa pasar browser web. Persaingan browser web saat ini masih didominasi IE dengan pangsa pasar 78 persen menyusul Firefox. Versi tes Safari 3 untuk Windows XP, Vista, dan Apple Macs OSX sudah dapat di-download dari situs Apple sejak Senin (11/6). (sumber: bbc.co.uk)<br>','Minggu','2009-01-25','20:35:26','18safari.jpg',4,'browser'),(58,23,'sinto','Pelajaran Moral dari Film Laskar Pelangi','pelajaran-moral-dari-film-laskar-pelangi','Y','\"Kalau Nak Pintar, Belajar! Kalau Nak Berhasil, Usaha!\" Itulah mantra yang diberikan Tuk Bayan Tula kepada anak-anak laskar pelangi saat mau menghadapi ujian. Berikut beberapa fakta mengapa saya sangat menyukai film Laskar Pelangi (Petik hikmahnya ya):<br><br>1. Pelajaran itu bisa didapatkan dimana saja<br><br>Para Laskar Pelangi menimba ilmu di sekolah reot yang sangat tidak layak, kegigihan untuk menimba ilmu dan mengubah sejarah hidup membuat mereka mampu bangkit dan membuktikan bahwa mereka bisa menjadi yang terbaik. Sebagai blogger, belajarlah dari siapapun, baik master ataupun newbie, anda tidak akan rugi. Saya selalu senang belajar dari semua orang :)<br><br>2. Keinginan untuk memberi.<br><br>Keinginan untuk memberi akan membuat kita kuat dan bahagia. Berbagi itu Indah (seperti paman gober yang berbagi PR dengan saya). Semangat untuk memberikan yang terbaik akan membuat kita berusaha sekuat mungkin. Dari apa yang kita berikan pada orang lain, kitapun akan memetik hasilnya. Jangan takut kehilangan karena berbagi.<br><br>3. Semangat komunitas, lihat bagaimana mereka membangun tim.<br>Team building, walaupun saya seorang blogger, di BlogicThink saya bekerja bersama. Ada perbedaan sikap dalam menghadapi suatu masalah, dan tim yang baik akan menemukan jalan keluarnya. Saksikan bagaimana Laskar Pelangi memenangkan karnaval dan cerdas cermat. Terima kasih kepada Mas Ary yang mau berbagi dengan saya.<br><br>4. Kalau Nak Pintar, Belajar! Kalau Nak Berhasil, Usaha!<br>Saya suka bagian ini. Laskar pelangi mendatangi dukun untuk lulus dalam ujian. Sang Dukun yang bertempat di pilau terpencil mengngatkan untuk membaca mantra itu dipagi hari. Para Laskar pelangipun menurutinya. Dibawalah selembar mantra tersebut, dibaca didepan sekolah bersama keras-keras : Kalau Nak Pintar, Belajar! Kalau Nak Berhasil, Usaha!<br><br>Yups, suatu pelajaran bagi kita untuk tidak pendek akal ketika ingin menjadi blogger sukses. Saya memilih mewawancara Mas Jimmy, ketimbang membeli resep kebut semalam. Terima kasih untuk Mas Jimmy atas PRnya.<br><br>5. Gunakan waktu, mumpung masih muda<br><br>Ketika saya menonton Laskar Pelangi, saya ingat umur. Saya mengagumi mereka yang memiliki tekad belajar yang kuat, cerita tentang anak-anak kelas 5 SD ini memang mengagumkan. Saya jadi teringat Kawan Blogger saya Ruzdee yang mengenal internet saat kelas 5 SD, suatu kesempatan yang hebat. Semoga sukses kawan :)<br><br>6. Buku kucel mereka, adalah awal dari masa depan.<br><br>9 Laskar pelangi berkumpul dikelas saat sekolah mau dibuka, masih kurang 1 anak. Dalam suasana menunggu Ditampilkan buku kucel yang membuat haru penonton, efek dramatis berhasil dimunculkan. Melihat buku itu saya teringat buku catatan saya, saya memiliki buku catatan yang selalu habis dalam waktu kurang dari satu bulan, isinya adalah ide-ide bisnis.<br><br>Saya jadi ingat spydeey yang menjadikan blognya sebagai oret-oretan catatan belajar komputer dan internet, thanks atas PRnya Bro :)<br><br>7. Lintang, sang jenius yang tak berhenti bermimpi<br><br>Melihat lintang membuat saya melakukan refleksi. Saya tau rasanya putus sekolah. Dan saya tahu rasanya kehilangan kesempatan kuliah karena masalah biaya. Bagi saya itu bukan hambatan. Saya tahu saya akan berhasi. walau kadang dunia tak adil, sekarang saya coba menjawabn setiap permasalahan, dan saya bahagia.<br><br>8. Sekolah kecil itu mengalahkan sekolah dengan modal besar<br><br>Karena sekolah memang bukan soal modal. Pendidikan sejatinya bukan masalah hitung-hitungan material. Ini masalah nilai-nilai. SD Para Laskar Pelangi mengalahkan SD berfasilitas lengkap, karena mereka memiliki cita-cita, semangat, harapan dan kebijaksanaan seorang pendidik.<br><br>Saya adalah seorang trainer di organisasi saya dulu ketika mahasiswa. Anehnya, saya tidak suka sekolah, saya menganggapnya mengungkung pemikiran saya. Ada terlalu banyak pemikiran kaku dan tertinggal disana yang saya tidak sukai.<br><br>9. Ajari saya bermimpi<br><br>Seandainya kondisi membuat saya mundur, maka saya telah tertinggal sejak lama. Banting setir ke dunia bisnis adalah pilihan dari kesulitan ekonomi dan ketidakmampuan untuk melanjutkan kuliah. Awalnya saya down, namun saya tidak mau berlama-lama. Saya coba berusaha bangkit. Hari ini, saya dapat bangga akan ilmu manajemen pemasaran yang saya miliki. Bahkan ketika bertemu dengan kawan-kawan saya dibangku kuliah dulu. Beruntung, walaupun tidak bekerja seperti mereka, saya bangga menjadi seorang blogger dan bukan buruh orang lain. Btw, Om jadul ngasih PR ( Blognya kok suspend Om?)<br><br>10. Seperti Ikal saya berniat sekolah di Perancis<br><br>Jika Ikal pergi ke sorbonne dan berkeliling dunia saya berniat untuk belajar di Universitas Frankfurt, mungkinkah? kita tunggu saja nanti. (sumber: blogicthink.com)<br>','Minggu','2009-01-25','21:10:44','46laskar.jpg',11,'laskar-pelangi'),(85,19,'admin','Windows 7 Gantikan Windows Vista','windows-7-gantikan-windows-vista','Y','<p>\r\nMicrosoft  ingin memudahkan rencana para administrator komputer yang akan bermigrasi ke Windows 7, namun sebuah tulisan di blog salam satu anggota tim Windows 7 berkata sebaliknya.\r\nSkenario uji coba terbaru menunjukkan, sebagian besar pengguna, proses upgrading akan menyulitkan, mengambil waktu kira-kira 30 menit. \r\n</p>\r\n<p>\r\nProsentasi terbesar pengguna menyebut, migrasi butuh waktu hingga 21 jam.\r\nSalah satu anggota tim Windows dari Microsoft, Chris Hernandez, mengungkap hasi pengetesan timnya dengan berbagai merek komputer dan konfigurasi tipikal pengguna lewat simulasi pada tingkatan berbeda dari proses migrasi Vista ke Windwos pada Jumat akhir pekan lalu.\r\n</p>\r\n<p>\r\nTujuan simulasi untuk memastikan apakah upgrade dari Vista Service Pack (SP) 1 ke Windows 7, dalam lima persen percobaan utama, lebih cepat ketimbang upgrade dari Vista SP1 ke Vista SP2, ujar Chris.\r\nProses dari Vista SP1 ke Vista SP2 dipilih karena itu opsi instalasi paling umum digunakan Microsoft Product Support Services, yakni skenario repair (perbaikan ulang) di mana prosedur yang paling dianjurkan adalah melakukan re-instalasi sistem operasi (OS) yang sudah ada di komputer saat itu. \r\n</p>\r\n<p>\r\nChris menampilkan hasil tes dalam blognya.\r\nTim mengetes konfigurasi komputer khusus hadware, merentang dari kategori hardware low-end (spesifikasi rendah), mid-range (spesifikasi menengah) dan high-end (spesifikasi atas). Kategori itu berlawanan dengan skenario pengguna pada umumnya yang berbasis pertanyaan seperti, berapa besar set data yang dibutuhkan pengguna dan bagaimana macam aplikasi tersebut diinstall.\r\n</p>\r\n<p>\r\nUntuk kategori komputer spesifikasi atas, Chris dan timnya mendefinisikan komputer dengan sistem operasi 32 bit dan memiliki CPU berprosesor Inter Core 2 Quad, yang bejalan di 2,4 GHz, memori 4GB dan hardisk 1 Terabyte .\r\nSementara, pengguna umumnya memiliki data sebesar 125 GB yang terikat dalam format dokumen, musik dan gambar dengan 40 aplikasi yang diinstal di komputer mereka.\r\nKinerja upgrade Vista SP1 ke Windows 7 pada hardware spesifikasi atas dengan konfigurasi pemilik pengguna kelas berat, membutuhkan 160 menit, atau sekitar 2,7 jam. \r\n</p>\r\n<p>\r\nSebagai perbandingan, upgrade repair (perbaikan) dari Vista SP1 ke Vista SP1 dengan hadware yang sama dan penggunaan bera membutuhkan 176 menit, atau 2,9 jam.\r\nSkenario terburuk muncul pada konfigurasi hadware kelas menengah, yakni CPU 32 bit namun dengan software dan konfigurasi &quot;pengguna super&quot;. Proses upgrading akan butuh waktu hingga 1.220 menit alias 20,3 jam. Padahal yang dianggap hadware kelas menengah, memiliki spesifikasi setara memory 2GB RAM, prosesor dual core, Athlon 64 X2, pada 2,6GHz dan hardisk 1 Terabyte.\r\n</p>\r\n<p>\r\nMereka yang dianggap pengguna super, memiliki profil lebih sadis dalam istilah penggunaan data, ketimbang pengguna kelas berat pada umumnya. Sebagai contoh, tim penguji menyebut pengguna super memiliki 650 GB data dan 40 aplikasi lebih yang terinstal dalam komputer mereka.\r\nLalu pada kelas rendah, pengguna medium, dengan 70 GB data dan 20 aplikasi, dengan memori sekitar 1 GB, prosesor 64 bit, AMD Athlon pada kecepatan 2,2 GHz, bakal butuh waktu bermigrasi sekitar 175 menit. Hardware yang lebih bertenaga, secara umum membutuhkan waktu instalasi lebih singkat.\r\n</p>\r\n<p>\r\nMicrosoft tidak selalu bisa mencapai target lima persen tujuan tim Chris yang telah dijanjikan. Dalam satu contoh, instalasi bersih (instalasi pertama pada komputer baru tanpa OS) Windows 7 pada hardware spesifikasi menengah membutuhkan 30 menit sementara instalasi bersih Vista SP1 butuhk 31 menit. Hanya saja, secara keseluruhan, tidak ada instalasi Windows 7 yang lebih lambat dibandingkan Vista.\r\n</p>\r\n<p>\r\nPertanyaan tersisa, apakah para toko dan ritel software akan mendengar rayuan Microsoft dan memutuskan hijrah ke Windows 7 lebih cepat? Tradisi yang berlaku, ritel IT akan cenderung menunggu Service Pack I sebelum mendatangkan versi terbaru Windows.\r\nWaktu yang akan menjadi sumber menentukan apakah kalangan profesional IT akan berpindah, sehingga Vista tak lagi menarik bagi ritel dan toko software. Jadi kehijrahan mereka ke Windows 7 dengan segera, menandakan pula, apakah para profesional IT suka dengan hasil pengujian waktu instal yang dilakukan Chris Hernandez.  internetnews/itz.\r\n</p>\r\n','Minggu','2009-10-25','07:25:22','19windows7.jpg',18,'komputer'),(92,23,'admin','Pemilik Facebook akan Dibuat Filmnya','pemilik-facebook-akan-dibuat-filmnya','Y','<p>\r\nSutradara David Fincher nampak jeli melihat peluang di tengah booming fenomena Facebook. Fincher akan menghadirkan sebuah film yang menceritakan tentang Mark Zuckerberg dan Facebook bagi para pencinta film dan Facebook tentunya.\r\n</p>\r\n<p>\r\nFincher mengaku rencana pembuatan film ini masih dinegosiasikan dengan pihak Zuckerberg. Dia hanya menyebutkan, filmya akan fokus menceritakan Mark Zuckerberg yang awalnya merancang Facebook sebatas untuk keperluan mahasiswa Universitas Harvard.\r\n</p>\r\n<p>\r\nFilm ini memaparkan bagaimana setelah itu Facebook kemudian berkembang menjadi fenomena yang mendunia sejak diluncurkan pada 2004.\r\n</p>\r\n<p>\r\nDalam penggarapan film ini, Fincher mengajak serta orang-orang kompeten di bidang film. Antara lain Aaron Sorkin, yang merupakan penulis naskah acara serial televisi ternama The West Wing.\r\n</p>\r\n<p>\r\nSementara itu, Columbia Pictures yang menamai film ini &quot;The Social Network&quot; dipercaya untuk memulai produksi film pada akhir tahun ini.\r\n</p>\r\n<p>\r\nSebagian orang menilai kehadiran film ini nantinya akan mengorek kembali kasus lama dimana tiga teman Zuckerberg, Cameron dan Tyler Winklevoss serta Divya Narendra mengklaim Zuckerberg telah mencuri ide mereka untuk membuat Facebook.\r\n</p>\r\n<p>\r\nPada saat Zuckerberg meluncurkan Facebook, mereka menuntut perkara atas Zuckerberg. Awal tahun ini, pengadilan AS memutuskan Facebook harus membayar USD65 juta untuk melunasi perkara ini.\r\n</p>\r\n','Minggu','2009-10-25','07:36:47','17mark_zuckerberg.jpg',20,'film'),(90,19,'admin','Ferrari 458 Polesan Teknologi Jepang','ferrari-458-polesan-teknologi-jepang','Y','<p>\r\nBarangkali hanya Jepang (diluar Italia) yang berani memoles bodi mobil dari Ferrari, sekaligus mengumumkan hasilnya kepada publik. Seperti dilakukan rumah modifikasi ASI terhadap Ferrari 458 yang oleh pabrikannya di Italia baru di launching.\r\n</p>\r\n<p>\r\nASI dengan keberaniannya menggarap proyek berisiko tinggi. Beberapa mobil berharga miliaran rupiah pernah digarap dan membuat tampilan mobil lebih sporty dan tambah dinamis dari versi standar.\r\n</p>\r\n<p>\r\nSebut saja, Bentley Continental GT (yang diberi julukan The ASI Tetsu GTR) dan Ferrari 430. Bahkan Ferrari milik seorang pengusaha muda di Indonesia pernah juga dimodifikasi (body) di Jepang pada 2007.\r\n</p>\r\n<p>\r\nCEO ASI Satoshi Kondo menjelaskan, bahwa tim rekayasanya telah bekerja keras memproduksi aerokit untuk Ferrari 458. ASI, katanya sengaja mengeluarkan sketsa dari hasil kerja mereka dengan terus melakukan finalisasi prototype yang ada, dan menghindari pencurian desain.\r\n</p>\r\n<p>\r\nSentuhan pada bagian depan dari kuda jingkrak menjadi salah satu yang menonjol. Di antaranya moncong yang baru, lubang udara lebih besar, dan dilanjutkan pada bagian roda. Dari sketsa gambar tampak terpasang sayap baru di bagian belakang.\r\n</p>\r\n<p>\r\nPaket body kit dari ASI mempertegas tampilan Ferrari sebagai hasil kawin silang dari gaya tuner Jepang dengan kendaraan eksotis khas Italia. ASI mengklaim, adanya perubahan dan penambahan pada bodi tidak mengurangi performa standar. Bahkan bobot kendaraan lebih ringan dari asli. (sumber: kompas.com)\r\n</p>\r\n','Minggu','2009-10-25','07:44:05','4ferrari458.jpg',2,'mobil'),(86,22,'admin','Program 100 Hari Menkominfo Tifatul','program-100-hari-menkominfo-tifatul','Y','<p>\r\nBelum juga resmi diumumkan masuk jajaran kabinet, sejumlah calon menteri sudah berani membeberkan programnya. Salah satunya, Tifatul Sembiring. Tifatul disebut-sebut sebagai calon kuat Menkominfo (Menteri Komunikasi dan Informasi).\r\n</p>\r\n<p>\r\nApa saja program Tifatul? &quot;100 Hari pertama? Kita targetkan sampai 2014 itu ada 10 ribu desa komputer. Presiden menargetkan tiga bulan ini ada 100 desa komputer harus tercapai,&quot; kata Tifatul di Gedung MPR/DPR, Jakarta, Selasa 20 Oktober 2009.\r\n</p>\r\n<p>\r\nKomputer-komputer ini, kata dia, bisa dimasukkan ke lembaga pendidikan untuk meningkatkan sumber daya manusia. Bagaimana SDM Indonesia bisa masuk ke bisnis supaya Indonesia bisa bersaing dengan negara-negara lain. Selain itu juga untuk meningkatkan e-goverment untuk meminimalisir korupsi, kolusi, kolusi dan nepotisme.\r\n</p>\r\n<p>\r\nDengan e-goverment, kata dia, maka nantinya semua urusan menjadi less paper. Artinya pegawai di tingkat pemda dan kecamatan, tidak lagi menerima uang tunai. &quot;Tapi cukup menerima resi, sehingga sogok menyogok bisa diminimalisir,&quot; kata dia.\r\n</p>\r\n<p>\r\nTifatul sendiri mengaku tidak begitu asing dengan dunia Kominfo karena latar belakang pendidikannya cukup mendukung. Gelar sarjana strata satunya di bidang Informatika dan Komunikasi. Ia juga mengaju pernah bekerja selama delapan tahun di sistem informatika dan komunikasi PT Perusahaan Listrik Negara.\r\n</p>\r\n<p>\r\nSementara strata duanya di bidang politik internasional di Islamabad, Pakistan. &quot;Itu saja sih, pinter ya belum, diupayakan sesuai,&quot; kata dia.\r\n</p>\r\n<p>\r\nNamun ia berharap bisa menembus tantangan Kominfo ke depan, yakni perbedaan kemudahan akses di kota besar dan desa. Selain itu juga soal infrastruktur yang masih lemah. Masalah lain, kurangnya tayangan edukatif di bidang informasi. &quot;Dalam satu riset dikatakan 10 dari 75 tayangan di TV, radio masih bermasalah,&quot; kata dia.\r\n</p>\r\n<p>\r\nDia menambahkan, pelayanan informasi di Indonesia juga masih  lemah. Karena itu ia akan mengusahakan peningkatan layanan informasi ini. (Sumber: vivanews.com)\r\n</p>\r\n','Minggu','2009-10-25','07:49:46','27tifatul_sembiring.jpg',16,'komputer'),(93,23,'admin','Dalam Dua Pekan, KCB 2 Ditonton 1,5 Juta Penonton','dalam-dua-pekan-kcb-2-ditonton-15-juta-penonton','Y','<p>\r\nFilm Ketika Cinta Bertasbih (KCB) 2 diyakini bakal mereguk sukses seperti sekuel pertamanya Sejak diputar perdana tanggal 17 September lalu atau selama 15 hari, film garapan SinemArt telah disaksikan 1,5 juta penonton. \r\n</p>\r\n<p>\r\nRekor yang sama juga dialami KCB 1. &quot;Pada pemutaran KCB 1 kami bisa memecah rekor pemutaran film di Indonesia, yaitu mendapat penonton sebanyak 100.000 perhari,&quot; ungkap Frans dari SinemArt saat promo film KCB 2 di Royal Plaza, Minggu (4/10).\r\n</p>\r\n<p>\r\nPihak SinemArt berharap KCB 2 bisa meraih prestasi minimal sama dengan KCB 1 dengan total 3 juta penonton. Untuk mencapai target tersebut, pihak SinemArt tak henti melakukan serangkaian promo di sejumlah kota di Tanah Air maupun di mancanegara.\r\n</p>\r\n<p>\r\n&quot;Hari ini (Minggu, 4/10), Kholidi (Kholidi Asadil Alam, pemeran Azzam) dan Oki (Oki Setiana Dewi pemeran Anna) ke Hongkong untuk promo di sana,&quot; imbuh Frans. Pekan depan (10-12 Oktober 2009), giliran Meyda Sefira berangkat ke Makau untuk kegiatan yang sama.\r\n</p>\r\n<p>\r\nFilm besutan sutradara Chaerul Umam ini juga dijadwalkan diputar di Aceh pada tanggal 11-12 Oktober mendatang. Menurut Frans, pemutaran KCB 1 di kota yang dikenal dengan sebutan Serambi Mekkah ini ditonton 8.000 orang.\r\n</p>\r\n<p>\r\nPadahal di kota tersebut sama sekali tidak ada gedung bioskop. Karena itu kru SinemArt terpaksa mengusung peralatan khusus dari Jakarta dan memutar di sebuah gedung khusus selama dua hari dalam tujuh kali show.\r\n</p>\r\n<p>\r\nBertutur tentang kesan berperan di KCB 2, Kholidi beberapa waktu lalu mengaku paling terkesan dengan adegan kecelakaan saat membonceng Bu&#39;e (Ninik L Karim). Karena ketika sepeda motornya terjatuh dia harus teriak memanggil ibundanya. &quot;Bu&#39;eee! Wah itu lumayan sulit,&quot; ungkap Kholidi.\r\n</p>\r\n<p>\r\nAdegan lain yang cukup berkesan adalah ketika pria asal Pasuruan ini terkapar di rumah sakit paska kecelakaan yang dia alami. &quot;Ekspresi orang sakitnya kan harus dapat. Terus suaranya juga harus disesuaikan, tidak seperti kita ngomong biasa, jadi agak sedikit tertahan di tenggorokan, powernya tidak full seperti ngomong biasanya,&quot; bebernya.\r\n</p>\r\n<p>\r\nUntuk adegan itu Kholidi yang kini menempuh pendidikan di Universitas Al Azhar, Jakarta melakukan observasi pada beberapa orang yang pernah mengalami kecelakaan. &quot;Aku juga tanya-tanya ke dokter. Ternyata di tempat tidurnya nggak bisa pakai bantal, posisi badannya harus lurus. Terus kalau ada gips di kaki, posisi jalan kita akan seperti apa. Biar nantinya terlihat lebih reel lah adengannya,&quot;  pungkas Kholidi. (sumber: <a href=\"http://surya.co.id\">surya.co.id</a>) \r\n</p>\r\n','Minggu','2009-10-25','07:55:45','54kcb2.jpg',53,'film'),(91,2,'admin','Manchester United Incar Zidane Baru','manchester-united-incar-zidane-baru','Y','<p>\r\nManchester United sedang mengincar pemain muda Perancis berdarah Aljazair. Pemain itu adalah Sofiane Feghouli yang baru berusia 19 tahun.\r\n</p>\r\n<p>\r\nSofiane Feghouli saat ini memperkuat tim Liga Perancis, Grenoble Foot 38. Posisinya adalah di lapangan tengah.\r\n</p>\r\n<p>\r\nPemain yang punya tinggi badan 178 cm itu disebut punya gaya bermain yang serupa dengan Zinedine Zidane. Feghouli sudah masuk dalam tim nasional Perancis U-21.\r\n</p>\r\n<p>\r\nTak hanya MU yang menginginkan pemain yang pernah ditolak Paris Saint-Germain itu. Tim-tim besar macam Barcelona, Liverpool dan Inter Milan juga sedang mengambil ancang-ancang untuk mengajukan tawaran.\r\n</p>\r\n<p>\r\nSeperti diberitakan Tribalfootball, MU sudah berencana untuk melakukan transaksi dengan Grenoble bulan Januari nanti. (Sumber: vivanews.com)\r\n</p>\r\n','Minggu','2009-10-25','13:58:18','62sofiane.jpg',20,'sepakbola'),(99,19,'admin','Editor TextArea Ala Ms Word','editor-textarea-ala-ms-word','Y','<div style=\"text-align: center\">\r\n</div>\r\n<div style=\"text-align: center\">\r\n</div>\r\n<div style=\"text-align: center\">\r\n</div>\r\n<p>\r\nSecara standar, textarea akan ditampilkan apa adanya, artinya teks yang diketik tidak bisa diatur formatnya, misalnya apabila kita ingin kalimat tertentu ditebalkan, dimiringkan atau diatur jenis dan ukuran hurufnya. Hal ini tidak bisa dilakukan dalam textarea standar, kecuali Anda hapal perintah HTML, kemudian menuliskannya secara manual di textarea tersebut, namun bagi reporter atau user yang awam tentu hal ini cukup menyulitkan mereka.<br />\r\n<br />\r\nSolusinya, gunakan editor <strong>WYSIWYG</strong> (<em>What You See Is What You Get</em>) &ndash; Apa yang kau lihat adalah apa yang kau dapatkan. Menurut pengertian dari Wikipedia, WYSIWYG adalah suatu editor yang memungkinkan user untuk menentukan format, ukuran dan jenis huruf, menambahkan hyperlink dan tabel, dan juga bisa mengupload file, gambar, animasi flash, dan video.<br />\r\n</p>\r\n<div style=\"text-align: center\">\r\n<img src=\"http://localhost./lokomedia/tinymcpuk/gambar/Image/cktini.jpg\" alt=\" \" width=\"326\" height=\"72\" />\r\n</div>\r\n<p>\r\nSaat ini banyak sekali editor WYSIWYG, tapi daripada bingung memilih, saya sarankan untuk menggunakan <strong>TinyMCE</strong> atau <strong>CKEditor</strong>, karena kedua open source editor WYSIWYG tersebut sudah teruji di CMS sekelas Joomla dan Wordpress. Alasan lainnya, karena kelengkapan dokumentasi, kaya fiturnya, kompatibilitas browser, dukungan forum, update, dan plugins. \r\n</p>\r\n<p>\r\nSaat searching di Google, saya ketemu sama yang namanya <strong>tinyFCK</strong> (<a href=\"http://p4a2.crealabsfoundation.org/tinyfck\" target=\"_blank\">http://p4a2.crealabsfoundation.org/tinyfck</a>), editor WYSIWYG yang menggabungkan kelebihan dari TinyMCE dan CKEditor, atau yang lebih kompleks lagi, yaitu <strong>TinyMCPUK</strong>, karena selain menggabungkan kelebihan dari TinyMCE dan CKEditor, juga ditambahkan image manager yang berguna untuk memanipulasi gambar.\r\n</p>\r\n','Selasa','2010-01-12','02:27:42','72office.jpg',145,'komputer'),(101,2,'admin','Jadwal Lengkap Sepakbola Piala Dunia 2010','jadwal-lengkap-sepakbola-piala-dunia-2010','Y','<p>\r\nPerhelatan akbar piala dunia 2010 yang diselenggrakan di Afsel (Afrika Selatan) akan jatuh pada bulan Juni nanti, walaupun pada piala dunia kali saya kurang antusias karena pemain pujaan tidak lagi bertanding, Zinedine Zidane, tapi tetep berusaha meyakinkan diri bahwa Perancis setidaknya dapat berbicara banyak nanti.<br />\r\n<br />\r\nBerikut ini adalah jadwal piala dunia 2010 berserta jam tayang, tanggal dan bulan, yang akan ditayangkan di ke 2 stasiun TV swasta yakni RCTI dan Global TV karena mereka yang dapat hak siar<br />\r\n<br />\r\n<strong>Keterangan</strong>: Waktu untuk pertandingan ialah GMT+1, yang perlu dilakukan untuk sesuaikan dengan waktu Indonesia cukup memajukan 6 jam saja karena Indonesia termasuk kedalam waktu GMT+7<br />\r\n<br />\r\nGrup A<br />\r\n<br />\r\nJumat, 11 Juni 2010<br />\r\nAfrika Selatan v Meksiko, 15:00<br />\r\nUruguay v Perancis, 19:30<br />\r\n<br />\r\nRabu, 16 Juni 2010<br />\r\nAfrika Selatan v Uruguay, 19:30<br />\r\n<br />\r\nKamis, 17 Juni 2010<br />\r\nFrance v Meksiko, 12:30<br />\r\n<br />\r\nSelasa, 22 Juni 2010<br />\r\nFrance v Afrika Selatan, 15:00<br />\r\nMeksiko v Uruguay, 15:00<br />\r\n<br />\r\nGrup B<br />\r\n<br />\r\nSabtu, 12 Juni 2010<br />\r\nArgentina v Nigeria, 12:30<br />\r\nKorea Selatan v Yunani, 15:00<br />\r\n<br />\r\nKamis, 17 Juni 2010<br />\r\nArgentina v Korea Selatan, 19:30<br />\r\nYunani v Nigeria, 15:00<br />\r\n<br />\r\nSelasa, 22 Juni 2010<br />\r\nYunani v Argentina, 19:30<br />\r\nNigeria v Korea Selatan, 19:30<br />\r\n<br />\r\nGrup C<br />\r\n<br />\r\nSabtu, 12 Juni 2010<br />\r\nEngland v USA, 19:30<br />\r\n<br />\r\nMinggu, 13 Juni 2010<br />\r\nAlgeria v Slovenia, 12:30<br />\r\n<br />\r\nJumat, 18 Juni 2010<br />\r\nEngland v Aljazair, 19:30<br />\r\nSlovenia v USA, 15:00<br />\r\n<br />\r\nRabu, 23 Juni 2010<br />\r\nSlovenia v England, 15:00<br />\r\nUSA v Aljazair, 15:00<br />\r\n<br />\r\nGrup D<br />\r\n<br />\r\nMinggu, 13 Juni 2010<br />\r\nJerman v Australia, 15:00<br />\r\nSerbia v Ghana, 19:30<br />\r\n<br />\r\nJumat, 18 Juni 2010<br />\r\nJerman v Serbia, 12:30<br />\r\n<br />\r\nSabtu, 19 Juni 2010<br />\r\nGhana v Australia, 12:30<br />\r\n<br />\r\nRabu, 23 Juni 2010<br />\r\nAustralia v Serbia, 19:30<br />\r\nGhana v Germany, 19:30<br />\r\n<br />\r\nGrup E<br />\r\n<br />\r\nSenin, 14 Juni 2010<br />\r\nJepang v Kamerun, 15:00<br />\r\nBelanda v denmark, 12:30<br />\r\n<br />\r\nSabtu, 19 Juni 2010<br />\r\nKamerun v denmark, 19:30<br />\r\nBelanda v Jepang, 15:00<br />\r\n<br />\r\nKamis, 24 Juni 2010<br />\r\nKamerun v Belanda, 19:30<br />\r\nDenmark v Jepang, 19:30<br />\r\n<br />\r\nGrup F<br />\r\n<br />\r\nSenin, 14 Juni 2010<br />\r\nItalia v Paraguay, 19:30<br />\r\n<br />\r\nSelasa, 15 Juni 2010<br />\r\nSelandia Baru v Slowakia, 12:30<br />\r\n<br />\r\nMinggu, 20 Juni 2010<br />\r\nItalia v Selandia Baru, 15:00<br />\r\nParaguay v Slowakia, 12:30<br />\r\n<br />\r\nKamis, 24 Juni 2010<br />\r\nParaguay v Selandia Baru, 15:00<br />\r\nSlovakia v Italia, 15:00<br />\r\n<br />\r\nGrup G<br />\r\n<br />\r\nSelasa, 15 Juni 2010<br />\r\nBrasil v Korea Utara, 19:30<br />\r\nPantai Gading v portugal, 15:00<br />\r\n<br />\r\nMinggu, 20 Juni 2010<br />\r\nBrasil v Pantai Gading, 19:30<br />\r\n<br />\r\nSenin, 21 Juni 2010<br />\r\nPortugal v Korea Utara, 12:30<br />\r\n<br />\r\nJumat, 25 Juni 2010<br />\r\nKorea Utara v Pantai Gading, 15:00<br />\r\nPortugal v Brazil, 15:00<br />\r\n<br />\r\nGrup H<br />\r\n<br />\r\nRabu, 16 Juni 2010<br />\r\nHonduras v Chili, 12:30<br />\r\nSpanyol v Swiss, 15:00<br />\r\n<br />\r\nSenin, 21 Juni 2010<br />\r\nChili v Swiss, 15:00<br />\r\nSpanyol v Honduras, 19:30<br />\r\n<br />\r\nJumat, 25 Juni 2010<br />\r\nChili v Spanyol, 19:30<br />\r\nSwiss v Honduras, 19:30\r\n</p>\r\n<p>\r\n(sumber: pialadunia2010com.com) \r\n</p>\r\n','Sabtu','2010-04-10','22:21:38','54bola.jpg',18,'sepakbola'),(102,2,'admin','Lionel Messi \'Berlumuran\' Rekor Gol','lionel-messi-berlumuran-rekor-gol','Y','<p>\r\nTanpa ampun Lionel Messi menggelontor gawang Arsenal dengan empat gol\r\ndi Camp Nou. Dengan gol-gol itu, si andalan Barcelona pun bikin\r\nsejumlah raihan positif.<br />\r\n<br />\r\nDi hadapan sekitar 95 ribu penonton yang memadati Camp Nou, Rabu (7/4/2010) dinihari WIB, Barca memastikan laju ke semifinal usai Messi menjebol gawang Manuel Almunia pada menit 21,\r\n37, 42 dan 88. Arsenal sendiri hanya sempat membalas lewat gol Nicklas\r\nBendtner pada menit 18.<br />\r\n<br />\r\nDengan penampilan apik berbuah gol-gol\r\ntersebut, Messi dicatat situs Barca membuat sejumlah capaian. Berikut\r\ncapaian-capaian tersebut:<br />\r\n</p>\r\n<ul>\r\n	<li>\r\n	Ini adalah kali pertama Messi bikin\r\n	empat gol dalam satu pertandingan untuk Barca. Sebelumnya, si pemain\r\n	Argentina itu &quot;cuma&quot; bisa bikin lima hat-trick dan 18 kali membuat\r\n	sepasang gol dalam satu laga.</li>\r\n	<li>Messi menjadi pemain pertama musim ini yang berhasil membuat empat gol dalam satu laga di Liga Champions.</li>\r\n	<li>Messi menjadi satu dari enam pemain di dalam sejarah kompetisi ini\r\n	untuk membuat empat gol di satu partai. Sebelumnya telah ada Marco Van\r\n	Basten (AC Milan), Simone Inzaghi (Lazio), Dado Prso (M&ograve;naco), Ruud Van\r\n	Nistelroy (M. United) dan Andriy Shevchenko (AC Milan). Artinya, Messi\r\n	juga menjadi pemain pertama Barca yang melakukannya.</li>\r\n	<li>Berkat\r\n	tiga gol di paruh pertama, Messi menjadi satu dari sembilan pemain yang\r\n	mampu bikin hat-trick di babak pertama partai Liga Champions. Messi\r\n	adalah pemain pertama yang melakukannya musim ini.</li>\r\n	<li>Tambahan\r\n	empat gol ke gawang Arsenal membuat total gol Messi di Liga Champions\r\n	menjadi 25 gol. Ini menyamai pundi gol mantan pemain Barca, Rivaldo,\r\n	yang juga topskorer Barca dalam kompetisi tersebut.</li>\r\n	<li>Dengan\r\n	empat gol ke gawang Arsenal di satu partai, Messi membuat klub London\r\n	tersebut menjadi tim yang paling banyak dia bobol gawangnya di Eropa.\r\n	Sevilla dan Atletico Madrid adalah lumbung gol kesukaan Messi di La\r\n	Liga Primera dengan tujuh gol.</li>\r\n	<li>Dengan tambahan empat gol,\r\n	Messi kini menjadi topskorer sementara Liga Champions dengan delapan\r\n	gol. Pesaing terdekatnya adalah andalan Real Madrid --yang sudah\r\n	tersingkir-- Cristiano Ronaldo (tujuh gol) dan bintang Manchester\r\n	United Wayne Rooney (lima gol).</li>\r\n	<li>Messi sudah mengoleksi total\r\n	39 gol musim ini. Jumlah itu lebih banyak satu gol ketimbang musim\r\n	lalu. Messi kini bahkan melakukannya hanya dalam 42 laga, delapan\r\n	partai lebih sedikit dibandingkan musim lalu.</li>\r\n	<li>Empat gol ke\r\n	gawang Arsenal juga menambah catatan gol Messi di kandang Barca, yang\r\n	kini menjadi 67 gol. Sejumlah 52 gol lain dia buat di laga tandang.\r\n	</li>\r\n</ul>\r\n<p>\r\n(sumber: detiksport.com) \r\n</p>\r\n','Sabtu','2010-04-10','22:28:32','51messi.jpg',22,'sepakbola'),(103,22,'admin','Penanganan Gempa Berjalan Cepat, Presiden SBY Puas','penanganan-gempa-berjalan-cepat-presiden-sby-puas','Y','<p>\r\nPresiden\r\nSusilo Bambang Yudhoyono (SBY) mengaku puas atas reaksi\r\ninstansi-instansi terkait dalam menangani gempa di Nanggroe Aceh\r\nDarussalam dan beberapa daerah di Sumatera pada Rabu (7/4) pukul 05.15\r\nWIB. Menurut Presiden, sistem reaksi cepat penanggulangan bencana telah\r\nberjalan dengan baik.<br />\r\n<br />\r\n&quot;Saya juga senang bahwa sistem telah\r\nberjalan karena begitu diterima gempa, satuan reaksi cepat\r\npenanggulangan bencana siap di Halim,&quot; kata Presiden di Bandara Halim\r\nPerdanakusuma, Rabu (7/4). Presiden menyampaikan hal itu sebelum\r\nbertolak menuju Hanoi, Vietnam untuk menghadiri KTT ASEAN hingga Sabtu\r\n(10/4).<br />\r\n<br />\r\nPresiden mengatakan, dirinya langsung berkomunikasi\r\nKetua Badan Nasional Penanggulangan Bencana (BNPB), Gubernur NAD, dan\r\nGubernur Sumatera Utara. Melalui komunikasi itu, Presiden mendapat\r\ninformasi bahwa kerusakan yang ditimbulkan tergolong ringan dan\r\npemadaman listrik sudah berakhir. Presiden mengucapkan terima kasih\r\natas kerja sigap instansi terkait.<br />\r\n<br />\r\nDalam kesempatan sama,\r\nMenteri Sosial, Salim Segaf Aljufri, mengatakan, dampak dari gempa di\r\nAceh itu tergolong ringan, tidak banyak bangunan yang rusak berat.\r\n&quot;Luka berat empat orang, seluruhnya 12 orang yang dirawat di rumah\r\nsakit,&quot; kata mantan Dubes RI di Arab Saudi ini.<br />\r\n<br />\r\nSalim\r\nmengatakan, gempa itu juga masih bisa ditangani oleh pemerintah daerah.\r\nAlasannya, stok bantuan bahan pangan di daerah masih mencukupi,\r\nkhususnya beras dan lauk pauk. &quot;Buffer stock kita di provinsi cukup,\r\nberas ada 50 ton,&quot; ujar Salim. Penyaluran bantuan pun belum ada kendala\r\nberarti.\r\n</p>\r\n<p>\r\n(sumber: republika.co.id) \r\n</p>\r\n','Sabtu','2010-04-10','22:32:19','58sby.jpg',11,''),(104,23,'admin','Film \'My Name is Khan\' Cetak Rekor di Amerika','film-my-name-is-khan-cetak-rekor-di-amerika','Y','<p>Dengan US$1,86 juta pada <em>box office</em> di minggu pertamanya, film <em>My Name is Khan</em> yang dibintangi Shah Rukh Khan telah memecahkan rekor sebagai film India dengan pendapatan terbanyak yang diputar di Amerika Utara. <br /> <br /> Film arahan Karan Johar ini diperkirakan menghasilkan US$15.500 dari 120 bioskop di AS dan Kanada pada akhir pekan 12-14 Februari 2009. Rekor sebelumnya dipegang film musikal yang juga dibintangi Shah Rukh, <em>Om Shanti Om</em>, dengan pendapatan US$1,76 juta dari 114 bioskop saat dirilis pada 2007. <br /> <br /> Saat diluncurkan Jumat (12/2), <em>My Name is Khan</em> langsung mendapatkan US$444 ribu, lalu langsung meningkat 65% menjadi US$734.000 Sabtu (13/2). Tapi, film ini lalu menurun sebanyak 7% menjadi US$682 ribu pada Minggu (14/2) yang bertepatan dengan Hari Valentine. <br /> <br /> Terlebih lagi, <em>My Name is Khan</em> mendapatkan pujian dari kritikus AS. Publikasi surat kabar <em>Hollywood Reporter</em> mengatakan, \"Ini sepadan untuk perjalanan selama 162 menit. Shah Rukh Khan datang ke Amerika (walau melalui film Bollywood) dan telah menunjukkan bahwa dirinya adalah megabintang India,\" tambahnya. <br /> <br /> \"Yang khas dari bintang Bollywood adalah mereka tidak hanya aktor yang berkualitas, tapi juga memiliki kharisma. Jadi, tidak mengejutkan bila menemukan megabintang Shah Rukh Khan dalam <em>My Name is Khan</em>. Tampaknya ia sedang menantang dirinya sendiri untuk meningkatkan kemampuan aktingnya dan memperluas jaringan penggemar internasionalnya.\" <br /> <br /> \"Dengan arahan sutradara andal Karan Johar dan musik pengiring yang menggugah oleh Shankar, Ehsaan &amp; Loy, Khan membuat kita mudah meneteskan air mata seraya mengajarkan kita mengenai Islam dan toleransi,\" kata surat kabar <em>Times</em>. <br /> <br /> Di dalam negeri sendiri, pada saat rilis perdananya, Jumat (12/2), hanya 13 bioskop yang memutarnya dari awal rencana 63 bioskop. Tapi, pada Sabtu (13/2), semua bioskop di Mumbai, Pune, dan Maharashra telah menayangkannya. Terakhir, pendapatan film tersebut di seluruh dunia telah mencapai US$18 juta.</p>\r\n<p>(sumber: mediaindonesia.com)</p>','Sabtu','2010-04-10','22:46:50','39khan.jpg',19,'film'),(105,2,'admin','Taufik Berada di Grup Maut Kejuaran Dunia Bulutangkis','taufik-berada-di-grup-maut-kejuaran-dunia-bulutangkis','Y','<p>\r\nTaufik Hidayat akan menghadapi pemain China, Bao Chunlai, di babak awal pertadingan Grup A \r\nkejuaraan World Super Series Masters Finals, Rabu (2/11).<br />\r\n<br />\r\nTaufik,\r\nyang merupakan satu-satunya pemain tunggal putra asal Indonesia,\r\nbergabung di Grup A bersama peringkat satu dunia Lee Chong Wei, Bao\r\nChunlai, serta pemain China Taipei, Hsieh Yu Hsin.<br />\r\n<br />\r\nMemakai\r\nsistem pertandingan round robin, Taufik akan menghadapi Chunlai,\r\nsedangkan Chong Wei bertemu dengan Hsieh Yu Hsin dalam pertandingan\r\nlainnya, Rabu (2/11).<br />\r\n<br />\r\nGrup A dianggap sebagai grup neraka atau\r\nmaut, sedangkan Grup B terdiri dari dua pemain Denmark, Peter Hoeg Gade\r\ndan Jan O Jorgensen, serta pemain Thailand, Boonsak Ponsana.<br />\r\n<br />\r\nTaufik\r\nsendiri menjadi satu-satunya pemain tunggal asal Indonesia setelah Sony\r\nDwi Kuncoro dan Simon Santoso absen karena diprioritaskan bermain di\r\najang SEA Games, Laos, Desember ini.<br />\r\n<br />\r\nPeraih medali emas\r\nOlimpiade Atlanta 2004 ini mengaku siap menghadapi tantangan di grup\r\nyang berat ini. Di jejaring sosial Facebook, ia menulis, &quot;Death Group?&quot;\r\nTantangan berat di Johor Bahru, tapi harus memberi yang terbaik! Let&#39;s\r\nGo!\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<div style=\"text-align: center\">\r\n<img src=\"http://localhost./lokomedia/tinymcpuk/gambar/Image/taufik_hidayat.jpg\" alt=\" \" width=\"350\" height=\"250\" />\r\n</div>\r\n<br />\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\nGrup A<br />\r\n1 [MAS] LEE Chong Wei<br />\r\n1 [CHN] BAO Chunlai <br />\r\n1 [INA] HIDAYAT Taufik<br />\r\n1 [TPE] HSIEH Yu Hsin<br />\r\n<br />\r\nGrup B<br />\r\n1 [DEN] GADE Peter Hoeg<br />\r\n1 [KOR] PARK Sung Hwan <br />\r\n1 [DEN] O JORGENSEN Jan<br />\r\n1 [THA] PONSANA Boonsak\r\n</p>\r\n<p>\r\n(sumber: beritajitu.com) \r\n</p>\r\n','Sabtu','2010-04-10','22:51:14','92taufik.jpg',78,'tenis'),(122,22,'admin','Terima Kasih Gayus Tambunan','terima-kasih-gayus-tambunan','Y','<p>\r\nSekali lagi, terima kasih Gayus Tambunan! Kita semua mesti berterima \r\nkasih pada pegawai Pajak golongan III A  ini.\r\nGara-gara aksinya terbongkar, semua mata kini memandang ke kasus  \r\npenggelapan pajak yang menimpanya. 25 Milyar rupiah bukan jumlah yang  \r\nsedikit. Apalagi dimiliki seorang pegawai negeri sipil yang gaji per  \r\nbulan plus tunjangan ini itu 12 jutaan.\r\n</p>\r\n<p>\r\nBerterima kasihlah pada Gayus. Karena berkat jasanya lah kasus  Century \r\njadi temaram. Siapa yang peduli dengan kasus 6,7 trilyun yang  tak jelas\r\nkemana itu. Setidaknya kini media massa ramai-ramai berdendang  lagu \r\nGAYUS. Lupakan huru hara di panggung paripurna DPR bulan lalu.  Lupakan \r\npula rekomendasi yang meminta penon aktifan dua petinggi negara,  Wapres\r\nBoediono dan Menteri Keuangan Sri Mulyani.\r\n</p>\r\n<p>\r\nKini arahkan pandangan kita pada rumah megah Gayus di Kelapa Gading.  \r\nSaya sendiri hanya berdecak kaget. Wow, darimana ya si Gayus yang masih \r\n30 tahunan itu bisa membangun istana semegah itu?\r\n</p>\r\n<p>\r\nBenarkah itu <em>tilepan</em> pajak rakyat? Atau suap para  pengemplang \r\npajak agar cuma bayar pajak dalam jumlah kecil. Entahlah.\r\n</p>\r\n<p>\r\nYang jelas saya ingin berucap terima kasih pada Gayus, karena berkat  \r\nkasusnya KPK, kepolisian, kejaksaan, atau para pengacara kondang bakal  \r\ndapat job menggiurkan. Ya siapa tahu kecipratan 25 M!\r\n</p>\r\n<p>\r\nGayus, di tangan saya masih ada form SPT yang baru terisi separuhnya.  \r\nSaya berencana menyerahkan form ini sebelum &ldquo;D&rdquo; day 31 Maret mendatang. \r\nTapi hati saya galau. Sebagai warga negara yang baik saya biasanya taat\r\nbayar pajak. Karena saya sadar pajak itu akan kembali pada kita \r\nsebagai  warga dalam bentuk layanan dan fasilitas publik.\r\n</p>\r\n<p>\r\nTapi, kelakuanmu Gayus, membuat saya dan juga pembayar pajak yang  taat \r\nterluka. Apalah artinya laporan pajak saya yang &#39;cuma&#39; beberapa  juta \r\nrupiah ini, jika ternyata uang pajak yang mestinya disalurkan  \r\ndikemplang pegawainya sendiri?\r\n</p>\r\n<p>\r\nHaruskah saya bayar pajak, Gayus? (sumber:www.kompas.com)\r\n</p>\r\n','Kamis','2011-02-10','23:23:57','80gayus.jpg',14,'gayus'),(121,2,'admin','Hantam Laos 6-0, Indonesia Semifinal','hantam-laos-60-indonesia-semifinal','Y','<p>\r\nIndonesia menang meyakinkan atas Laos. Enam\r\ngol mereka lesakkan, membuat mereka lolos ke semifinal dengan status \r\njuara Grup A. Di stadion Gelora Bung Karno, Sabtu (4/12/2010), \r\nIndonesia langsung menekan sejak awal laga. Lewat sebuah serangan balik,\r\nIndonesia mengancam pertahanan Laos melalui M. Ridwan di sisi sayap \r\nkanan. Tapi umpan silang Ridwan masih bisa dihalau. Sepak pojok untuk \r\nIndonesia.\r\n</p>\r\n<p>\r\nPada menit ketujuh, Ridwan kembali mencoba \r\nperuntungannya. Tapi tendangan kaki kananannya dari luar kotak penalti \r\nmembentur tubuh pemain Laos. Kembali, Indonesia mendapatkan sepak pojok.<br />\r\n<br />\r\nSemenit\r\nberselang, umpan silang Firman Utina di sayap kiri diterima oleh Hamka \r\nHamzah di tiang jauh. Sial bagi Hamka, sundulannya masih melenceng \r\ntipis.<br />\r\n<br />\r\nOoh! Laos mendapatkan kesempatan emas pertamanya dalam \r\nlaga ini. Sepakan Kaysone Soukhavong dari luar kotak penalti membentur \r\ntiang gawang Indonesia. Nyaris.<br />\r\n<br />\r\nPenalti untuk Indonesia! Cristian\r\nGonzales dijatuhkan di dalam kotak penalti ketika memggiring bola di \r\ndalam kotak penalti.<br />\r\n<br />\r\nFirman Utina maju menjadi eksekutornya, dan \r\nkapten Indonesia ini berhasil mengecoh kiper Sengphachan Bounthisanh \r\nuntuk membawa Indonesia unggul 1-0.<br />\r\n<br />\r\nGol lagi untuk Indonesia! \r\nAksi Ridwan, usai memanfaatkan blunder operan Kitsada, membawa Indonesia\r\nunggul 2-0 atas Laos.<br />\r\n<br />\r\nRidwan membawa bola sendirian ke dalam \r\nkotak penalti, ia mengecoh kiper Bounthisanh, dan menceploskan bola ke \r\ndalam gawang, meski sempat terpeleset. <br />\r\n<br />\r\nIndonesia memulai babak \r\nkedua dengan baik, dan tepat pada menit 49 &#39;Garuda&#39; kembali membobol \r\njala Laos. Kembali Firman yang menjadi pencetak golnya.<br />\r\n<br />\r\nGol \r\ntersebut diawali oleh operan satu-dua dengan Ridan di luar kotak \r\npenalti. Begitu kembali menerima bola, Firman melepaskan sepakan kaki \r\nkanan ke tiang jauh. Indonesia unggul 3-0.<br />\r\n<br />\r\nKeunggulan Indonesia \r\nbertambah besar menjadi 4-0 di menit 51 dan yang menjadi pendulangnya \r\nadalah Irfan Bachdim. Ini adalah gol keduanya dalam turnamen ini.<br />\r\n<br />\r\nGol\r\nkeempat Indonesia itu tercipta setelah Irfan melakukan operan satu-dua \r\ndengan Cristian Gonzales. Lewat satu sepakan kaki kanan ke tiang jauh, \r\nIrfan pun membobol jala Laos.<br />\r\n<br />\r\nTekanan Indonesia ke pertahana Laos\r\nakhirnya kembali berbuah hasil di menit 76. Berawal dari umpan lambung \r\nFirman, terjadi kemelut di dalam kotak penalti Laos.<br />\r\n<br />\r\nSepakan \r\nHamka masih bisa ditepis Bounthisanh, tapi bola disambar oleh Arief \r\nSuyono dan terciptalah gol kelima Indonesia. Ini adalah gol kedua Arief \r\ndalam turnamen ini.<br />\r\n<br />\r\nGol lagi! Indonesia unggul jauh 6-0 atas Laos\r\ndi menit 80 dengan diawali oleh umpan terobosan Irfan kepada Okto \r\nManiani. Lewat kecepatannya, Okto mengungguli dua pemain Laos dan \r\nmelepaskan tendangan kaki kiri ke tiang dekat. Si pemain nomor 10 ini \r\nakhirnya mencetak gol.<br />\r\n<br />\r\nAksi Okto itu kemudian menjadi gol penutup\r\ndalam pertandingan ini. Indonesia menang enam gol tanpa balas dan \r\nberhak melaju ke semifinal dengan status juara Grup A. \r\n</p>\r\n','Kamis','2011-02-10','23:22:35','1bachdim.jpg',22,'sepakbola'),(120,23,'admin','Saat Raja Belajar Bertutur Kata','saat-raja-belajar-bertutur-kata','Y','<p>Ini dia film yang meraih perolehan nominator terbanyak dalam acara Academy Awards ke 83. Dari 24 jumlah nominasi yang ada, The King\'s Speech berhasil meraih setengahnya dan menjadikan film produksi See Saw Films dan Bedlam Productions itu merajai Oscar 2011 yang merupakan ajang perfilman paling bergengsi di dunia.<br /> <br /> Setelah kematian ayahandanya, raja George V (Michael Gambon), pangeran Albert (Colin Firth) akhirnya dinobatkan sebagai raja. Diangkatnya ayah dua anak ini menjadi raja baru Inggris karena sang kakak, pangeran Edward VIII (Guy Pearce) yang seharusnya berkuasa, rela turun tahta karena lebih memilih seorang janda keturunan Amerika untuk dinikahinya. <br /> <br /> Tapi apa jadinya jika seorang raja menderita kesulitan berbicara?terutama pada saat berpidato. Karena sebelum dinobatkan sebagai Raja, beberapa kali Bertie (panggilan pangeran Albert dari orang-orang terdekatnya) harus mewakili pidato ayahnya yang sakit, baik secara langsung maupun melalui siaran radio dan hasilnya sangat mengecewakan bagi siapa saja yang mendengarnya.<br /> <br /> Dibantu sang istri tercinta, Elizabeth (Helena Bonham Carter), Raja George VI menemui ahli terapi bicara bersama Lionel Logue (Geoffrey Rush) yang eksentrik. Pertemuan keduanya walau diawali dengan perseteruan, keduanya akhirnya menjalani program terapi dan akhirnya membentuk ikatan yang tak terpisahkan.<br /> <br /> Masalah raja George VI ternyata bukan hanya dari dalam dirinya saja, dengan keadaan negara yang diambang peperangan, raja baru itu akhirnya melakukan pidato pertamanya di radio BBC untuk rakyat dan negaranya. Dengan dukungan dari Lionel, keluarga, pemerintah dan Winston Churchill (Timothy Spall), mampukah raja baru ini menginspirasi seluruh Inggris untuk bersiap melawan kebrutalan tentara Jerman.<strong><br /> </strong> <br /> Kejeniusan sang sutradara mengemas film akhirnya memberikan jaminan <strong>The King\'s Speech</strong> menjadi tontonan yang sangat menarik. Anda akan merasakan emosi sekaligus tertawa saat melihat Colin Firth yang sangat mendalami karakter raja George VI. Akting Geoffrey Rush sebagai ahli bicara membuktikan dirinya memang jago berbicara, bahkan di hadapan seorang Raja.</p>','Kamis','2011-02-10','23:15:39','89speech.jpg',8,'film'),(124,19,'admin','Angry Birds Siap Hadirkan Budaya Indonesia','angry-birds-siap-hadirkan-budaya-indonesia','Y','<p>Game mobile Angry Birds yang tengah digandrungi, rencananya akan masuk pasar Indonesia. Tim game Rovio ingin menggaet developer tanah air. Mereka mengaku mengharapkan kelahiran Angry Birds yang khas Indonesia.</p>\r\n<p>\"Kami mengerti (keinginan) itu. Siapa tahu nantinya Angry Birds ala Indonesia akan memakai batik,\" ungkap Chief Marketing Officer Rovio, Peter Vesterbacka, saat ditemui di Hotel Kempinski, Jakarta, Rabu (25/1). \"Tapi kami ingin menyelami lebih dalam. Apa saja yang bisa digali dari Indonesia.\"</p>\r\n<p>Peter juga mengungkapkan telah menerima banyak masukan untuk menghadirkan wayang, batik, garuda dan Bali di game tersebut. Untuk itu, Rovio bersama Nokia kemudian menggelar kompetisi. Diharapkan dari situ akan lahir Angry Birds yang \"Indonesia Banget\".</p>\r\n<p>Sayangnya, Peter enggan menyebutkan kapan tepatnya rencana itu akan direalisasikan. Namun ini tetap menjadi kabar baik untuk developer lokal untuk semakin berkibar. \"Pengembang aplikasi di Indonesia memiliki potensi dan talenta untuk dikembangkan,\" lanjut Peter yakin.</p>\r\n<p>(sumber: wowkeren.com)</p>','Sabtu','2012-02-11','01:14:45','32angrybird.jpg',67,'film');

/*Table structure for table `blangko08` */

DROP TABLE IF EXISTS `blangko08`;

CREATE TABLE `blangko08` (
  `id_blangkoO08` int(11) NOT NULL AUTO_INCREMENT,
  `id_b08O` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_blangkoO08` int(5) NOT NULL,
  `tgl_ket` enum('1 s/d 15','16 s/d 30','16 s/d 31','16 s/d 28','16 s/d 29') NOT NULL,
  `bln_blangkoO08` int(5) NOT NULL,
  `bln_ket` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember') NOT NULL,
  `thn_blangkoO08` int(4) NOT NULL,
  `no` int(5) NOT NULL,
  `no_rata` int(10) NOT NULL,
  `limpasH` int(5) NOT NULL,
  `limpasQ` int(5) NOT NULL,
  `irigasiKNH` int(5) NOT NULL,
  `irigasiKNQ` int(5) NOT NULL,
  `irigasiKRH` int(5) NOT NULL,
  `irigasiKRQ` int(5) NOT NULL,
  `totalDebit` int(6) NOT NULL,
  PRIMARY KEY (`id_blangkoO08`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `blangko08_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `blangko08` */

/*Table structure for table `bulan` */

DROP TABLE IF EXISTS `bulan`;

CREATE TABLE `bulan` (
  `nm_bulan` varchar(20) NOT NULL,
  `id_bulan` int(10) NOT NULL,
  PRIMARY KEY (`nm_bulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bulan` */

insert  into `bulan`(`nm_bulan`,`id_bulan`) values ('Agustus',8),('April',4),('Desember',12),('Februari',2),('Januari',1),('Juli',7),('Juni',6),('Maret',3),('Mei',5),('Nopember',11),('Oktober',10),('September',9);

/*Table structure for table `debit` */

DROP TABLE IF EXISTS `debit`;

CREATE TABLE `debit` (
  `id_debit` int(11) NOT NULL AUTO_INCREMENT,
  `limpas` int(5) NOT NULL,
  `hlimpas` int(5) NOT NULL,
  `masukkiri` int(5) DEFAULT NULL,
  `hmasukiri` int(5) DEFAULT NULL,
  `masukkanan` int(5) DEFAULT NULL,
  `hmasukkanan` int(11) DEFAULT NULL,
  `total` int(5) NOT NULL,
  PRIMARY KEY (`id_debit`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `debit` */

insert  into `debit`(`id_debit`,`limpas`,`hlimpas`,`masukkiri`,`hmasukiri`,`masukkanan`,`hmasukkanan`,`total`) values (16,5,190,20,306,0,0,496),(17,5,190,20,306,0,0,496),(18,23,1875,20,306,34,678,2859),(19,8,385,20,306,0,0,691),(20,10,538,20,306,0,0,844),(21,6,250,20,306,0,0,556),(22,5,190,20,306,0,0,496),(23,23,1875,23,377,23,377,2629),(24,23,1875,23,377,23,377,2629);

/*Table structure for table `design` */

DROP TABLE IF EXISTS `design`;

CREATE TABLE `design` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `design` */

insert  into `design`(`id`,`judul`,`deskripsi`,`gambar`) values (1,'Ako sayang Neng Resti','','386749C360_2014-12-28-08-21-59-698.jpg'),(2,'I want you','','793304BeautyPlus_20150510120142_fast.jpg'),(3,'Ako Setia Kamu yang','','607116C360_2015-01-04-07-17-01-619.jpg'),(4,'Neng Resti Milikku','','619934BeautyPlus_20150510115824_fast.jpg'),(5,'aa ako cinta neng resti','ako nyaah pisan ka neng resti nurwanti','790893C360_2014-12-28-08-21-14-436.jpg'),(6,'Ako nyaah ka Neng','Syang abi hoyong nikah ka neng salamina jadi suami neng resti','760284C360_2014-12-28-08-24-23-487.jpg'),(7,'Neng abdi hayang jeng neng','Sayang abdi hayang jeng neng salamina nya?','146636C360_2014-12-28-08-21-59-698.jpg');

/*Table structure for table `di` */

DROP TABLE IF EXISTS `di`;

CREATE TABLE `di` (
  `id_di` int(11) NOT NULL AUTO_INCREMENT,
  `nm_di` varchar(30) NOT NULL,
  `nr_di` varchar(30) NOT NULL,
  `id_bentukbendung` int(11) NOT NULL,
  `sungai` varchar(50) NOT NULL,
  `id_rantingpengamat` int(11) NOT NULL,
  `tot_sawah` double NOT NULL,
  `jum_petaktersier` double NOT NULL,
  `tot_luaswilayah` double NOT NULL,
  `kab` varchar(50) NOT NULL,
  `lebarlimpas` double NOT NULL,
  `lebaririgasi` double NOT NULL,
  `foto_bendungan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_di`),
  KEY `id_bentukbendung` (`id_bentukbendung`),
  KEY `id_rantingpengamat` (`id_rantingpengamat`),
  CONSTRAINT `di_ibfk_1` FOREIGN KEY (`id_bentukbendung`) REFERENCES `bentukbendung` (`id_bentukbendung`),
  CONSTRAINT `di_ibfk_2` FOREIGN KEY (`id_rantingpengamat`) REFERENCES `rantingpengamat` (`id_rantingpengamat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `di` */

insert  into `di`(`id_di`,`nm_di`,`nr_di`,`id_bentukbendung`,`sungai`,`id_rantingpengamat`,`tot_sawah`,`jum_petaktersier`,`tot_luaswilayah`,`kab`,`lebarlimpas`,`lebaririgasi`,`foto_bendungan`) values (5,'Ciranjeng','0920930923',1,'Cilakdjfla',6,60,90,90,'Sumedang-bandung',9,90,'340850Fashion11_jpg.jpg'),(6,'Cangkuang','0920902302',1,'CItarik',6,90,30,30,'Sumedang',30,10,'279022561099_10152343066330634_1965957595_n.jpg');

/*Table structure for table `download` */

DROP TABLE IF EXISTS `download`;

CREATE TABLE `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `download` */

insert  into `download`(`id_download`,`judul`,`nama_file`,`tgl_posting`,`hits`) values (3,'Membuat Shopping Cart dengan PHP','shopping cart.pdf','2009-02-17',4),(5,'Skrip Captcha','captcha.rar','2009-02-06',2),(1,'Kalender Tahun 2009','kalender2009.rar','2009-02-06',8),(8,'Wallpaper PHP','PHP_weapon.jpg','2009-10-28',3),(9,'Slide  Pemrograman VBA Excell','Excell_VBA.ppt','2009-11-03',6);

/*Table structure for table `fitur` */

DROP TABLE IF EXISTS `fitur`;

CREATE TABLE `fitur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `fitur` */

insert  into `fitur`(`id`,`judul`,`deskripsi`,`gambar`) values (1,'Ako Cinta km Resti sayangku','Ku tau cepat atau lambat pasti kamu mengerti','636779BeautyPlus_20150214174709_fast.jpg'),(3,'Kau adalah Perhiasanku','mau mu jadi mauku pahitpun itu ku tersenyum. kamu tak tau rasanya hatiku saatberhadapan kamu','708618BeautyPlus_20150301104038_fast.jpg'),(4,'Sayang aku ingin selalu bersama dirimu','ako hayang salamina sareng neng sayang <3','742828BeautyPlus_20150405170410_fast.jpg'),(5,'Aku cinta melibihi siapapun','Aku sayang kamu neng. jangan putuskan ikatan ini','340057BeautyPlus_20150301104038_fast.jpg'),(6,'Ako masih cinta','Senyumu selalu ada untukku','881225BeautyPlus_20150221184954_fast.jpg'),(10,'Ako sayang Km','Jangan Lepaskan ikatanmu dengan aku','835906BeautyPlus_20141029172931_fast.jpg'),(11,'Neng ulah ninggalken ako','sayang ako hoyong sareng neng salamina','422760BeautyPlus_20150329162611_fast.jpg'),(12,'Neng Resti Nurwanti dan Abdul Kohar','Abi hoyong ka neng kanggo terahir jeng kanggo salamina','141906BeautyPlus_20150405170820_fast.jpg'),(13,'1 Juli 2014','Sayang Ulah Pegat nya hubungan ieu bertahan nu teu aya Ahirna.','129455C360_2015-02-14-17-43-35.jpg'),(14,'Biar Saksi Mata semuanya ada untuk neng','Ako alim melarian dei neng, abi alim ti awal dei jeng batur. Ako hayang jeng neng salamina','758422BeautyPlus_20141221143110_fast.jpg'),(15,'Aa sayang neng','Ulah Lupaken abi nya syang muah :* I love you','794952BeautyPlus_20141222111034_fast.jpg'),(16,'Bismillahhirrohmanirrohim','Allah nu ngahijiken urang duaan. sing janten ngahiji Amin','848846BeautyPlus_20141109111139_fast.jpg'),(17,'ako love you','','994689BeautyPlus_20150517164134_fast.jpg');

/*Table structure for table `hubungi` */

DROP TABLE IF EXISTS `hubungi`;

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `hubungi` */

insert  into `hubungi`(`id_hubungi`,`nama`,`email`,`subjek`,`pesan`,`tanggal`) values (1,'Ariawan','ariawan@gmail.com','Mohon Informasi','Mohon informasi mengenai buku yang diterbitkan oleh Lokomedia.','2008-02-10'),(4,'lukman','lukman@hakim','Request Code','Tolong dunk ..','2009-02-25'),(8,'lukman','lukman@bukulokomedia.com','kontak kami','tes modul hubungi kami','2010-05-16');

/*Table structure for table `inbox` */

DROP TABLE IF EXISTS `inbox`;

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  `Trash` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

/*Data for the table `inbox` */

insert  into `inbox`(`UpdatedInDB`,`ReceivingDateTime`,`Text`,`SenderNumber`,`Coding`,`UDH`,`SMSCNumber`,`Class`,`TextDecoded`,`ID`,`RecipientID`,`Processed`,`Trash`) values ('2013-11-07 01:23:38','2013-10-21 23:58:42','0065006B006F00730069007300740065006D','+6285720314054','Default_No_Compression','','+62816124',-1,'ekosistem',1,'','false',1),('2013-11-07 01:23:39','2013-10-21 23:58:45','0066006F0074006F00730069006E00740065007300690073','+6285222241987','Default_No_Compression','','+6281100000',-1,'fotosintesis',2,'','false',1),('2013-11-07 01:23:40','2013-10-22 00:03:01','0065006B006F00730069007300740065006D','+6285222241987','Default_No_Compression','','+6281100000',-1,'ekosistem',3,'','false',1),('2013-11-07 01:23:41','2013-10-23 00:03:40','0066006F0074006F00730069006E00740065007300690073','+6285222241987','Default_No_Compression','','+6281100000',-1,'fotosintesis',4,'','false',1),('2013-11-07 01:23:46','2013-10-23 00:05:10','0066006F0074006F00730069006E00740065007300690073','+6285720314054','Default_No_Compression','','+62816124',-1,'fotosintesis',5,'','false',1),('2013-11-07 01:23:48','2013-10-24 00:06:39','0066006F0074006F00730069006E00740065007300690073','+6283822115510','Default_No_Compression','','+628315000032',-1,'fotosintesis',6,'','false',1),('2013-11-07 01:23:54','2013-10-24 00:11:34','0066006F0074006F00730069006E00740065007300690073','+6285720314054','Default_No_Compression','','+62816124',-1,'fotosintesis',7,'','false',1),('2013-11-07 01:23:56','2013-10-24 00:15:02','0065006B006F00730069007300740065006D','+6285720314054','Default_No_Compression','','+62816124',-1,'ekosistem',8,'','false',1),('2013-10-25 02:52:34','2013-10-25 08:38:36','006100730073002C006B0061006E0067006700650020006B006C00750061007200670061002000620065007300610072002700270042004100520041005900410020004B004F004500520049004E0047002700270020006400200061006E0074006F00730020006B002000730075006D00700069006E00670061006E0027006E00200064002000620075006D006900200041007300650070002000470075006E006100770061006E002F0061007300670075006E0020007200650062006F0020006D006C006D0020006B0065006D00690073002000740067006C002000320033002F003200340020004F006B0074006F006200650072002E','+6281210454202','Default_No_Compression','','+6281100000',-1,'ass,kangge kluarga besar\'\'BARAYA KOERING\'\' d antos k sumpingan\'n d bumi Asep Gunawan/asgun rebo mlm kemis tgl 23/24 Oktober.',9,'','false',1),('2013-11-07 01:24:00','2013-10-24 09:48:30','006600610074006B00680069','+6285222241987','Default_No_Compression','','+6281100000',-1,'fatkhi',10,'','false',1),('2013-11-07 01:24:06','2013-10-24 09:52:15','007400610072006B0069006D0061006E','+6285222241987','Default_No_Compression','','+6281100000',-1,'tarkiman',11,'','false',1),('2013-11-07 01:24:03','2013-10-30 04:42:17','0066006F0074006F00730069006E00740065007300690073','+6285722113057','Default_No_Compression','','+62816124',-1,'fotosintesis',12,'','false',1),('2013-11-07 01:24:09','2013-10-30 05:33:07','00410079006F0020006B006900720069006D0020003200200053004D00530020006C006100670069002000640061006E0020006B0061006D007500200061006B0061006E0020006D0065006E00640061007000610074006B0061006E00200047005200410054004900530020003900380030003000200053004D00530020006B006500200041005800490053002000640061006E002000320030003000200053004D00530020006B0065002000530045004D005500410020004F00500045005200410054004F0052002000680069006E0067006700610020006A0061006D002000320034002E00200044006100680073007900610074002000480065006D00610074006E007900610020003200340020004A0061006D002E00200049006E0066006F003800330038','AXIS','Default_No_Compression','','+628315000038',-1,'Ayo kirim 2 SMS lagi dan kamu akan mendapatkan GRATIS 9800 SMS ke AXIS dan 200 SMS ke SEMUA OPERATOR hingga jam 24. Dahsyat Hematnya 24 Jam. Info838',13,'','false',1),('2013-11-07 01:24:13','2013-10-30 06:21:43','00530065006C0061006D0061007400210020004B0061006D007500200064006100700061007400200047005200410054004900530020003900380030003000200053004D00530020006B006500200041005800490053002000640061006E002000320030003000200053004D00530020006B0065002000530045004D005500410020004F00500045005200410054004F0052002000680069006E0067006700610020006A0061006D002000320034002E00300030002E00200044006100680073007900610074002000480065006D00610074006E007900610020003200340020004A0061006D002E00200049006E0066006F003800330038','AXIS','Default_No_Compression','','+628315000038',-1,'Selamat! Kamu dapat GRATIS 9800 SMS ke AXIS dan 200 SMS ke SEMUA OPERATOR hingga jam 24.00. Dahsyat Hematnya 24 Jam. Info838',14,'','false',1),('2013-11-07 01:24:15','2013-10-30 06:23:23','0066006F0074006F00730069006E00740065007300690073','+6285722113057','Default_No_Compression','','+62816124',-1,'fotosintesis',15,'','false',1),('2013-11-07 01:24:18','2013-10-30 06:25:20','0065006B006F00730069007300740065006D','+6285722113057','Default_No_Compression','','+62816124',-1,'ekosistem',16,'','false',1);

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id_jabatan`,`nm_jabatan`,`keterangan`) values (1,'OP','PPA - APBD'),(2,'TPOP','PPA - APBN');

/*Table structure for table `komentar` */

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `komentar` */

insert  into `komentar`(`id_komentar`,`id_berita`,`nama_komentar`,`url`,`isi_komentar`,`tgl`,`jam_komentar`,`aktif`) values (12,71,'Wisnu','wisnu.wordpress.com','pertamax','2009-02-02','08:10:23','Y'),(13,71,'Adrian','adrian.blogspot.com','CR 7 emang idola gua, melesat terus ya prestasinya.','2009-02-02','09:06:01','Y'),(15,79,'Armen','detik.com','ahmadinejad emang idolaku','2009-02-03','10:05:20','Y'),(17,74,'Lukman','hakim.com','apakah browser google secanggih search enginenya?','2009-02-21','10:12:23','Y'),(34,92,'Rudi','bukulokomedia.com',' Kalau  tentang  gue,  kapan  dibuat  filmnya  ya?   ','2009-10-28','21:21:21','Y'),(22,77,'Raihan','bukulokomedia.com','mas .. tolong kirimin source code proyek lokomedia&nbsp; ke email saya di raihan@gmail.com','2009-08-25','16:30:00','Y'),(23,77,'Wawan','bukulokomedia.com','woi .. kunjungin dong website saya di http://bukulokomedia.com, jangan lupa kasih komen dan sarannya ya.','2009-08-25','16:31:50','Y'),(36,93,'Lukman','google.com','tes  kata-kata  jelek  sex   ','2009-11-04','10:04:26','Y'),(65,85,'hilman','antonhilman.com',' emang  sih,  windows  7  lebih  cepat  dibandingkan  vista,  tapi  masih  banyak  bug  bung.   ','2010-01-15','04:16:25','Y'),(66,78,'ronaldinho','ronaldino.com',' ronaldo  pantas  mendapatkannya  tahun  ini  dan  kayaknya  tahun  depan  masih  menjadi  miliknya.   ','2010-01-15','04:18:08','Y'),(67,99,'lukman','bukulokomedia.com',' tes   ','2010-02-11','02:42:46','Y'),(69,99,'fathan','bukulokomedia.com','keduax','2010-02-15','07:44:12','Y'),(70,99,'Rianto','bukulokomedia.com',' kok  nggak  ada  yang  pertamax  ..  langsung  keduax  sih.   ','2010-05-16','11:33:26','Y'),(72,99,'lokomedia','bukulokomedia.com',' test  paging  komentar   ','2012-01-03','17:50:14','Y'),(73,99,'husada','bukulokomedia.com',' perbaikan  paging  halaman  komentar   ','2012-01-03','17:53:03','Y'),(74,99,'hendra','bukulokomedia.com',' iya  kemarin  sudah  saya  coba  yang  CMS  Lokomedia  versi  1.5,  paging  komentarnya  masih  error.   ','2012-01-03','17:53:59','Y'),(75,99,'lukman','bukulokomedia.com',' @  husada  dan  hendra:  terimakasih  atas  perbaikan  bugnya.   ','2012-01-03','17:54:41','Y'),(76,99,'lokomedia','bukulokomedia.com',' pada  versi  1.5.5,  bug  paging  halaman  komentar  sudah  diperbaiki.   ','2012-01-03','17:55:27','Y'),(77,99,'hendra','bukulokomedia.com',' paging  halaman  komentar  sudah  berjalan  dengan  baik,  thanks  lokomedia   ','2012-01-03','17:56:12','Y'),(92,124,'lukman','bukulokomedia.com',' tes  komentar  pakai  url  http://bukulokomedia.com   ','2012-05-02','11:27:28','Y');

/*Table structure for table `mainmenu` */

DROP TABLE IF EXISTS `mainmenu`;

CREATE TABLE `mainmenu` (
  `id_main` int(5) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `adminmenu` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_main`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `mainmenu` */

insert  into `mainmenu`(`id_main`,`nama_menu`,`link`,`aktif`,`adminmenu`) values (2,'Beranda','http://localhost/lokomedia','Y','N'),(3,'Profil','statis-1-profil.html','Y','N'),(4,'Agenda','semua-agenda.html','Y','N'),(5,'Berita','semua-berita.html','Y','N'),(6,'Download','semua-download.html','Y','N'),(7,'Galeri Foto','semua-album.html','Y','N'),(8,'Hubungi Kami','hubungi-kami.html','Y','N'),(14,'Setting Web','','N','Y'),(15,'Setting Menu','','N','Y'),(16,'Manajemen Berita','','N','Y'),(54,'Hubungi Kami','?module=hubungi','N','Y'),(53,'Interaksi','','N','Y'),(52,'Media','','N','Y'),(59,'Banner','?module=banner','N','Y');

/*Table structure for table `modul` */

DROP TABLE IF EXISTS `modul`;

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('admin','debit','blangko') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `modul` */

insert  into `modul`(`id_modul`,`nama_modul`,`link`,`static_content`,`gambar`,`publish`,`status`,`aktif`,`urutan`,`link_seo`) values (2,'Manajemen User','?module=user','','','N','admin','Y',1,''),(18,'Berita','?module=berita','','','Y','debit','Y',6,'semua-berita.html'),(19,'Banner','?module=banner','','','Y','admin','Y',9,''),(37,'Profil','?module=profil','<b>Bukulokomedia.com</b> merupakan website resmi dari penerbit Lokomedia yang bermarkas di Jl. Arwana No.24 Minomartani Yogyakarta 55581. Dirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret 2008.<br><br>Produk unggulan dari penerbit Lokomedia adalah buku-buku serta aksesoris bertema PHP (<span style=\"font-weight: bold; font-style: italic;\">PHP: Hypertext Preprocessor</span>) yang merupakan pemrograman Internet paling handal saat ini.\r\n','gedungku.jpg','N','admin','N',3,'profil-kami.html'),(10,'Manajemen Modul','?module=modul','','','N','admin','Y',2,''),(31,'Kategori','?module=kategori','','','Y','admin','Y',5,''),(33,'Poling','?module=poling','','','Y','admin','Y',10,''),(34,'Tag (Label)','?module=tag','','','N','admin','Y',7,''),(35,'Komentar','?module=komentar','','','Y','admin','Y',8,''),(36,'Download','?module=download','','','Y','admin','Y',11,'semua-download.html'),(40,'Hubungi Kami','?module=hubungi','','','Y','admin','Y',12,'hubungi-kami.html'),(41,'Agenda',' ?module=agenda','','','Y','debit','Y',31,'semua-agenda.html'),(42,'Shoutbox','?module=shoutbox','','','Y','admin','Y',13,''),(43,'Album','?module=album','','','N','admin','Y',14,''),(44,'Galeri Foto','?module=galerifoto','','','Y','admin','Y',15,''),(45,'Templates','?module=templates','','','N','admin','Y',16,''),(46,'Kata Jelek','?module=katajelek','','','N','admin','Y',17,''),(47,'RSS','-','','','Y','admin','N',18,''),(48,'YM','-','','','Y','admin','N',19,''),(49,'Indeks Berita','-','','','Y','admin','N',20,''),(50,'Kalender','-','','','Y','admin','N',21,''),(51,'Statistik User','-','','','Y','admin','N',22,''),(52,'Pencarian','-','','','Y','admin','N',23,''),(53,'Berita Teratas','-','','','Y','admin','N',24,''),(54,'Arsip Berita','-','','','Y','admin','N',25,''),(55,'Berita Sebelumnya','-','','','Y','admin','N',26,''),(60,'Sekilas Info','?module=sekilasinfo','','','Y','admin','Y',13,''),(57,'Menu Utama','?module=menuutama','','','Y','admin','Y',28,''),(58,'Sub Menu','?module=submenu','','','Y','admin','Y',29,''),(59,'Halaman Statis','?module=halamanstatis','','','Y','admin','Y',30,''),(61,'Identitas Website','?module=identitas','','','N','admin','N',4,'');

/*Table structure for table `personil` */

DROP TABLE IF EXISTS `personil`;

CREATE TABLE `personil` (
  `id_personil` int(11) NOT NULL AUTO_INCREMENT,
  `nm_personil` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `stt_perkawinan` varchar(20) NOT NULL,
  `nope` varchar(20) DEFAULT NULL,
  `id_di` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `masuk_kerja` date NOT NULL,
  `foto_personil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_personil`),
  KEY `id_jabatan` (`id_jabatan`),
  KEY `id_di` (`id_di`),
  KEY `id_agama` (`id_agama`),
  CONSTRAINT `personil_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  CONSTRAINT `personil_ibfk_2` FOREIGN KEY (`id_di`) REFERENCES `di` (`id_di`),
  CONSTRAINT `personil_ibfk_3` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `personil` */

insert  into `personil`(`id_personil`,`nm_personil`,`alamat`,`tgl_lahir`,`jeniskelamin`,`id_agama`,`pendidikan`,`stt_perkawinan`,`nope`,`id_di`,`id_jabatan`,`masuk_kerja`,`foto_personil`) values (5,'Abdul Kohar','Kp. Babakan Desa Nanjung Mekar RT03/RW06 Kec. Rancaekek Kab.','2015-07-09','Laki-laki',1,'Sarjana','Sudah Menikah','34343434',6,1,'2015-07-09','644927Glasses19_jpg.jpg'),(6,'Resti Nurwanti','Manabaya','2015-02-11','Perempuan',1,'SMA','Belum Menikah','039049304',5,1,'2015-02-11','337371C360_2015-07-26-12-39-33.jpg'),(7,'Gungun Gunawan','Kp. Nagrog','2015-07-10','Laki-laki',1,'SMA','Belum Menikah','34343434',6,1,'2015-07-10','803985C360_2014-12-28-08-21-14-436.jpg'),(8,'Iwan Setiawan','Kp. Narawita ','2015-07-11','Laki-laki',1,'SMA','Belum Menikah','903943940394039403',6,1,'2015-07-11','872222C360_2015-07-26-15-48-27.jpg'),(9,'Gun gun junaedi','Kp. Bojong Hangser','2015-06-11','Laki-laki',1,'Sarjana','Belum Menikah','09090903903903',6,2,'2015-06-11','856811Fashion30_jpg.jpg');

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `nama_perusahaan` varchar(50) NOT NULL,
  `deskripsi` text,
  `logo` varchar(50) DEFAULT NULL,
  `motto` varchar(50) DEFAULT NULL,
  `handphone` varchar(50) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `kutipan` text,
  `sumber_kutipan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nama_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `profil` */

insert  into `profil`(`nama_perusahaan`,`deskripsi`,`logo`,`motto`,`handphone`,`telepon`,`fax`,`email`,`alamat`,`longitude`,`latitude`,`facebook`,`twitter`,`website`,`kutipan`,`sumber_kutipan`) values ('SUP RANCAEKEK','Sup Rancaekek adalah salah satu lembaga PU yang bergerak di bidang Irigasi, Sub Unit Pelayan Rancaekek untuk memelihara saluran Sungai dan Irigasi.','logo.png','\"Kepuasan Anda adalah jaminan kami\"','0857-2112-2226','(0283) 6195567',NULL,'gypsum_griyaindah@yahoo.com','Jl.Raya Bogares Kidul, Pangkah, Kab.Tegal - Jawa Tengah',NULL,NULL,NULL,NULL,'www.gypsumgriyaindah.com','\"Bismillah... kamu pasti bisa\" \r\n','Abdul Kohar');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `alamat` varchar(100) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `project` */

insert  into `project`(`id`,`judul`,`deskripsi`,`alamat`,`gambar`,`tanggal_mulai`,`tanggal_selesai`) values (1,'Perumahan Tegal Indah','Project Pertama kami','Tegal','Baja-ringan.jpg','2015-03-08',NULL),(2,'Desain Rumah Jl.Bogares Kidul','Project Kedua kami','Subang','Baja-ringan.jpg','2015-03-18',NULL),(3,'Desain Rumah Jl.Asia Afrika','Project Ketiga kami','Bandung','Baja-ringan.jpg','2015-03-29',NULL);

/*Table structure for table `rantingpengamat` */

DROP TABLE IF EXISTS `rantingpengamat`;

CREATE TABLE `rantingpengamat` (
  `id_rantingpengamat` int(11) NOT NULL AUTO_INCREMENT,
  `nm_rantingpengamat` varchar(40) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `alamat` varchar(60) NOT NULL,
  PRIMARY KEY (`id_rantingpengamat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `rantingpengamat` */

insert  into `rantingpengamat`(`id_rantingpengamat`,`nm_rantingpengamat`,`tgl_berdiri`,`alamat`) values (6,'Sup Rancaekek','2015-06-27','Kp. Rancaekek Kab. Bandung 40396');

/*Table structure for table `sekilasinfo` */

DROP TABLE IF EXISTS `sekilasinfo`;

CREATE TABLE `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL AUTO_INCREMENT,
  `info` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_sekilas`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `sekilasinfo` */

insert  into `sekilasinfo`(`id_sekilas`,`info`,`tgl_posting`,`gambar`) values (1,'Anak yang mengalami gangguan tidur, cenderung memakai obat2an dan alkohol berlebih saat dewasa.','2010-04-11','news5.jpg'),(2,'WHO merilis, 30 persen anak-anak di dunia kecanduan menonton televisi dan bermain komputer.','2010-04-11','news4.jpg'),(3,'Menurut peneliti di Detroit, orang yang selalu tersenyum lebar cenderung hidup lebih lama.','2010-04-11','news3.jpg'),(4,'Menurut United Stated Trade Representatives, 25% obat yang beredar di Indonesia adalah palsu.','2010-04-11','news2.jpg'),(5,'Presiden AS Barack Obama memesan Nasi Goreng di restoran Bali langsung dari Amerika','2010-04-11','news1.jpg');

/*Table structure for table `shoutbox` */

DROP TABLE IF EXISTS `shoutbox`;

CREATE TABLE `shoutbox` (
  `id_shoutbox` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `website` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_shoutbox`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `shoutbox` */

insert  into `shoutbox`(`id_shoutbox`,`nama`,`website`,`pesan`,`tanggal`,`jam`,`aktif`) values (1,'lukman','lukman.com','tes :-) aja ;-D ha ha ha <:D>','2009-11-02','00:00:00','Y'),(2,'hakim','hakim.com','tes :-) aja ;-D ha ha ha <:D>\r\ndfa\r\nfdas\r\nfdsa\r\nfdasf\r\n:-(','2009-11-02','00:00:00','Y'),(3,'daryono','bukulokomedia.com','ku tes lagi<br>\r\ntes :-) aja ;-D ha ha ha &lt;:D&gt;<br>\r\nkeren euy<br>\r\n:-(','2009-11-02','13:55:00','Y'),(5,'iin','uin-suka.ac.id','tes aja euy ;-D boi','2009-11-03','11:36:06','Y');

/*Table structure for table `slider` */

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `slider` */

insert  into `slider`(`id`,`judul`,`deskripsi`,`gambar`) values (1,'Ako & Resti SuamiIstri','Ako Hayang Neng Jadi Istri Abdi Salamina<br>Abdi Hayang jd Suami Neng Salmina<br>Bismillah :)','285491picture071.jpg'),(2,'Resti&Ako4EVER','Insya Allah<br>Abi jEng Neng<br>Janten Tarik Jodo','285491picture071.jpg'),(3,'aKO sYang Neng','Suami Istri Salawasna<br>Neng Resti Nurwanti<br>Abdul Kohar','285491picture071.jpg'),(4,'Ako Hyng Salilana jEng Neng','Sayang<br>Abdi Leres Pisan Hayang Jeng Neng<br>Salamina','285491picture071.jpg'),(5,'Ako Cinta Resti','Sayang Hayang Salilana jeng neng abdul kohar','285491picture071.jpg'),(6,'Ako Nyaah Ka Neng','Sayang abdi alim ditinggalken ku neng,\r\nhayang nikah ka neng sayang','285491picture071.jpg'),(7,'Neng abdi hayang jeng neng','Sayang hayang jeng neng salamina','285491picture071.jpg');

/*Table structure for table `statistik` */

DROP TABLE IF EXISTS `statistik`;

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `statistik` */

insert  into `statistik`(`ip`,`tanggal`,`hits`,`online`) values ('127.0.0.2','2009-09-11',1,'1252681630'),('127.0.0.1','2009-09-11',17,'1252734209'),('127.0.0.3','2009-09-12',8,'1252817594'),('127.0.0.1','2009-10-24',8,'1256381921'),('127.0.0.1','2009-10-26',108,'1256620074'),('127.0.0.1','2009-10-27',52,'1256686769'),('127.0.0.1','2009-10-28',124,'1256792223'),('127.0.0.1','2009-10-29',9,'1256828032'),('127.0.0.1','2009-10-31',3,'1257047101'),('127.0.0.1','2009-11-01',85,'1257113554'),('127.0.0.1','2009-11-02',11,'1257207543'),('127.0.0.1','2009-11-03',165,'1257292312'),('127.0.0.1','2009-11-04',59,'1257403499'),('127.0.0.1','2009-11-05',10,'1257433172'),('127.0.0.1','2009-11-11',13,'1258006911'),('127.0.0.1','2009-11-12',10,'1258048069'),('127.0.0.1','2009-11-14',14,'1258222519'),('127.0.0.1','2009-11-17',2,'1258473856'),('127.0.0.1','2009-11-19',16,'1258635469'),('127.0.0.1','2009-11-21',4,'1258863505'),('127.0.0.1','2009-11-25',3,'1259216216'),('127.0.0.1','2009-11-26',1,'1259222467'),('127.0.0.1','2009-11-30',11,'1259651841'),('127.0.0.1','2009-12-02',9,'1259746407'),('127.0.0.1','2009-12-03',17,'1259906128'),('127.0.0.1','2009-12-10',69,'1260423794'),('127.0.0.1','2009-12-12',26,'1260560082'),('127.0.0.1','2009-12-11',5,'1260508621'),('127.0.0.1','2009-12-13',8,'1260716786'),('127.0.0.1','2009-12-14',9,'1260772698'),('127.0.0.1','2009-12-15',9,'1260837158'),('127.0.0.1','2009-12-16',7,'1260905627'),('127.0.0.1','2009-12-17',48,'1261026791'),('127.0.0.1','2009-12-18',11,'1261088534'),('127.0.0.1','2009-12-22',3,'1261477278'),('127.0.0.1','2009-12-25',2,'1261686043'),('127.0.0.1','2009-12-26',29,'1261835507'),('127.0.0.1','2009-12-27',7,'1261920445'),('127.0.0.1','2009-12-28',3,'1261965611'),('127.0.0.1','2009-12-29',21,'1262024011'),('127.0.0.1','2009-12-30',24,'1262146708'),('127.0.0.1','2010-01-01',12,'1262286131'),('127.0.0.1','2010-01-03',38,'1262529325'),('127.0.0.1','2010-01-12',89,'1263264291'),('127.0.0.1','2010-01-14',54,'1263482540'),('127.0.0.1','2010-01-15',57,'1263506901'),('127.0.0.1','2010-02-11',30,'1265831568'),('127.0.0.1','2010-02-13',2,'1266032303'),('127.0.0.1','2010-02-14',3,'1266115347'),('127.0.0.1','2010-02-15',15,'1266195235'),('127.0.0.1','2010-02-18',1,'1266499945'),('127.0.0.1','2010-02-22',5,'1266856332'),('127.0.0.1','2010-02-25',46,'1267103145'),('127.0.0.1','2010-05-12',10,'1273654648'),('127.0.0.1','2010-05-16',195,'1274026185'),('127.0.0.1','2010-05-17',2,'1274029517'),('127.0.0.1','2010-05-19',1,'1274279374'),('127.0.0.1','2010-05-27',16,'1274967085'),('127.0.0.1','2010-05-30',4,'1275192045'),('127.0.0.1','2010-05-31',13,'1275271939'),('127.0.0.1','2010-06-05',1,'1275676869'),('127.0.0.1','2010-06-06',2,'1275842170'),('127.0.0.1','2010-06-15',3,'1276572924'),('127.0.0.1','2010-06-22',206,'1277221605'),('127.0.0.1','2010-08-02',17,'1280754660'),('127.0.0.1','2010-08-20',7,'1282285305'),('127.0.0.1','2010-08-30',21,'1283185430'),('127.0.0.1','2010-08-31',53,'1283207455'),('127.0.0.1','2010-09-02',133,'1283402651'),('127.0.0.1','2010-09-05',35,'1283702206'),('127.0.0.1','2010-09-13',10,'1284370291'),('127.0.0.1','2010-09-17',12,'1284662303'),('127.0.0.1','2010-09-22',2,'1285091212'),('127.0.0.1','2010-09-23',47,'1285254071'),('127.0.0.1','2010-09-26',32,'1285512806'),('127.0.0.1','2010-09-27',48,'1285529871'),('127.0.0.1','2011-01-19',18,'1295395096'),('127.0.0.1','2011-01-21',6,'1295580166'),('127.0.0.1','2011-01-22',3,'1295639704'),('127.0.0.1','2011-01-25',2,'1295895420'),('127.0.0.1','2011-01-27',20,'1296145564'),('127.0.0.1','2011-01-28',5,'1296150116'),('127.0.0.1','2011-02-01',10,'1296555613'),('127.0.0.1','2011-02-02',1,'1296657225'),('127.0.0.1','2011-02-05',3,'1296875908'),('127.0.0.1','2011-02-07',5,'1297090649'),('127.0.0.1','2011-02-09',182,'1297254341'),('127.0.0.1','2011-02-10',268,'1297355704'),('127.0.0.1','2011-02-16',6,'1297824002'),('127.0.0.1','2011-02-17',2,'1297945065'),('127.0.0.1','2011-12-28',12,'1325081007'),('127.0.0.1','2011-12-29',13,'1325167281'),('127.0.0.1','2011-12-31',34,'1325296088'),('127.0.0.1','2012-01-02',1,'1325449458'),('127.0.0.1','2012-01-03',55,'1325601219'),('127.0.0.1','2012-01-04',1,'1325630436'),('127.0.0.1','2012-02-08',86,'1328720292'),('127.0.0.1','2012-02-09',110,'1328798857'),('127.0.0.1','2012-02-10',87,'1328871532'),('127.0.0.1','2012-02-11',16,'1328899301'),('127.0.0.1','2012-03-31',87,'1333186737'),('127.0.0.1','2012-04-01',69,'1333248528'),('127.0.0.1','2012-04-02',9,'1333338582'),('127.0.0.1','2012-04-03',31,'1333456570'),('127.0.0.1','2012-04-04',2,'1333498207'),('127.0.0.1','2012-04-05',5,'1333628029'),('127.0.0.1','2012-04-08',22,'1333871463'),('127.0.0.1','2012-04-09',109,'1333972788'),('127.0.0.1','2012-04-10',70,'1334024998'),('127.0.0.1','2012-05-01',8,'1335889888'),('127.0.0.1','2012-05-02',17,'1335935829'),('127.0.0.1','2012-05-27',6,'1338133681'),('127.0.0.1','2012-05-29',22,'1338304361'),('127.0.0.1','2012-05-30',5,'1338389383'),('127.0.0.1','2012-05-31',5,'1338408772'),('127.0.0.1','2012-06-01',5,'1338567612'),('127.0.0.1','2012-07-01',10,'1341152776'),('127.0.0.1','2012-07-29',12,'1343572702'),('127.0.0.1','2012-07-30',15,'1343658587'),('127.0.0.1','2012-07-31',179,'1343743877'),('127.0.0.1','2012-08-03',11,'1344000498'),('127.0.0.1','2012-08-08',28,'1344364863'),('127.0.0.1','2012-08-09',7,'1344477542'),('127.0.0.1','2012-08-10',1,'1344601882'),('127.0.0.1','2013-10-29',75,'1383025156'),('127.0.0.1','2013-10-30',2,'1383147392'),('127.0.0.1','2013-11-23',6,'1385215043'),('127.0.0.1','2013-12-09',1,'1386606910'),('127.0.0.1','2013-12-10',3,'1386652160'),('127.0.0.1','2013-12-12',1,'1386789667'),('127.0.0.1','2013-12-20',1,'1387544322'),('192.168.1.101','2013-12-26',4,'1388058624'),('127.0.0.1','2013-12-29',1,'1388322783'),('127.0.0.1','2013-12-30',1,'1388391092'),('127.0.0.1','2014-04-11',2,'1397159528'),('127.0.0.1','2014-05-04',1,'1399210656'),('127.0.0.1','2014-05-18',5,'1400413113'),('127.0.0.1','2014-07-14',1,'1405336296'),('127.0.0.1','2015-03-08',1,'1425808714'),('127.0.0.1','2015-03-28',6,'1427558614');

/*Table structure for table `submenu` */

DROP TABLE IF EXISTS `submenu`;

CREATE TABLE `submenu` (
  `id_sub` int(5) NOT NULL AUTO_INCREMENT,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  `id_submain` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `adminsubmenu` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `submenu` */

insert  into `submenu`(`id_sub`,`nama_sub`,`link_sub`,`id_main`,`id_submain`,`aktif`,`adminsubmenu`) values (2,'Visi dan Misi','statis-2-visidanmisi.html',3,0,'Y','N'),(3,'Struktur Organisasi','statis-3-strukturorganisasi.html',3,0,'Y','N'),(7,'Politik','kategori-22-politik.html',5,0,'Y','N'),(11,'Manajemen Modul','?module=modul',14,0,'N','Y'),(10,'Identitas Web','?module=identitas',14,0,'N','Y'),(12,'Manajemen User','?module=user',14,0,'N','Y'),(14,'Menu Utama','?module=menuutama',15,0,'N','Y'),(15,'Sub Menu','?module=submenu',15,0,'N','Y'),(16,'Kategori Berita','?module=kategori',16,0,'N','Y'),(17,'Berita','?module=berita',16,0,'N','Y'),(18,'Komentar','?module=komentar',16,0,'N','Y'),(20,'Tag / Label','?module=tag',16,0,'N','Y'),(21,'Sensor Kata','?module=katajelek',16,0,'N','Y'),(22,'Album','?module=album',52,0,'N','Y'),(24,'Download','?module=download',52,0,'N','Y'),(25,'Agenda','?module=agenda',53,0,'N','Y'),(26,'Poling','?module=poling',53,0,'N','Y'),(27,'Sekilas Info','?module=sekilasinfo',53,0,'N','Y'),(30,'ShoutBox','?module=shoutbox',53,0,'N','Y'),(36,'Fitur','?module=fitur',14,0,'Y','Y'),(37,'Desain','?module=desain',14,0,'Y','Y'),(49,'Blangko O08','?module=blangkoO08',8,0,'Y','Y'),(39,'Jabatan TKK','?module=jabatan',16,0,'Y','Y'),(40,'Ranting Pengamat','?module=rantingpengamat',4,0,'Y','Y'),(41,'Bentuk Bendung','?module=bentukbendung',15,0,'Y','Y'),(43,'Daerah Irigasi','?module=di',7,0,'Y','Y'),(45,'Personil','?module=personil',15,0,'Y','Y'),(46,'Admin','?module=admin',2,0,'Y','Y'),(47,'Debit','?module=debit',4,0,'Y','Y'),(48,'percarian','?module=pencarian',7,0,'Y','Y');

/*Table structure for table `t_blangko08` */

DROP TABLE IF EXISTS `t_blangko08`;

CREATE TABLE `t_blangko08` (
  `kd_blangko08` double NOT NULL,
  `kd_di` double NOT NULL,
  `kd_user` double NOT NULL,
  `tgl_b08` double NOT NULL,
  `tgl_ket` varchar(20) DEFAULT NULL,
  `bln_b08` double NOT NULL,
  `bln_ket` varchar(20) DEFAULT NULL,
  `thn_b08` varchar(5) NOT NULL,
  `no` double NOT NULL,
  `no_rata` double DEFAULT NULL,
  `limpasH` double NOT NULL,
  `limpasQ` double NOT NULL,
  `irigasiKNH` double DEFAULT NULL,
  `irigasiKNQ` double DEFAULT NULL,
  `irigasiKRH` double DEFAULT NULL,
  `irigasiKRQ` double DEFAULT NULL,
  `sungai` double DEFAULT NULL,
  KEY `kd_di` (`kd_di`),
  KEY `kd_user` (`kd_user`),
  CONSTRAINT `t_blangko08_ibfk_1` FOREIGN KEY (`kd_di`) REFERENCES `t_di` (`kd_DI`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_blangko08_ibfk_2` FOREIGN KEY (`kd_user`) REFERENCES `t_user` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_blangko08` */

insert  into `t_blangko08`(`kd_blangko08`,`kd_di`,`kd_user`,`tgl_b08`,`tgl_ket`,`bln_b08`,`bln_ket`,`thn_b08`,`no`,`no_rata`,`limpasH`,`limpasQ`,`irigasiKNH`,`irigasiKNQ`,`irigasiKRH`,`irigasiKRQ`,`sungai`) values (1,1,1,1,'1 s/d 15',4,'April','2005',1,1,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',4,'April','2005',2,1,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',4,'April','2005',3,1,2,23,2,5,0,0,28),(1,1,1,1,'1 s/d 15',4,'April','2005',4,1,0,0,23,176,0,0,176),(1,1,1,1,'1 s/d 15',4,'April','2005',5,1,0,0,23,176,0,0,176),(1,1,1,1,'1 s/d 15',4,'April','2005',6,2,0,0,23,176,0,0,176),(1,1,1,1,'1 s/d 15',4,'April','2005',7,2,0,0,23,176,0,0,176),(1,1,1,1,'1 s/d 15',4,'April','2005',8,2,0,0,23,176,0,0,176),(1,1,1,1,'1 s/d 15',4,'April','2005',9,2,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',4,'April','2005',10,2,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',4,'April','2005',11,3,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',4,'April','2005',12,3,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',4,'April','2005',13,3,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',4,'April','2005',14,3,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',4,'April','2005',15,3,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',5,'Mei','2005',1,1,23,904,32,290,0,0,1194),(1,1,1,1,'1 s/d 15',5,'Mei','2005',2,1,2,23,2,5,0,0,28),(1,1,1,1,'1 s/d 15',5,'Mei','2005',3,1,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',5,'Mei','2005',4,1,32,1484,32,290,0,0,1774),(1,1,1,1,'1 s/d 15',5,'Mei','2005',5,1,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',5,'Mei','2005',6,2,22,846,22,165,0,0,1011),(1,1,1,1,'1 s/d 15',5,'Mei','2005',7,2,22,846,22,165,0,0,1011),(1,1,1,1,'1 s/d 15',5,'Mei','2005',8,2,11,299,11,58,0,0,357),(1,1,1,1,'1 s/d 15',5,'Mei','2005',9,2,33,1554,33,303,0,0,1857),(1,1,1,1,'1 s/d 15',5,'Mei','2005',10,2,0,0,33,303,0,0,303),(1,1,1,1,'1 s/d 15',5,'Mei','2005',11,3,0,0,33,303,0,0,303),(1,1,1,1,'1 s/d 15',5,'Mei','2005',12,3,0,0,33,303,0,0,303),(1,1,1,1,'1 s/d 15',5,'Mei','2005',13,3,22,846,23,176,0,0,1022),(1,1,1,1,'1 s/d 15',5,'Mei','2005',14,3,23,904,23,176,0,0,1080),(1,1,1,1,'1 s/d 15',5,'Mei','2005',15,3,23,904,23,176,0,0,1080),(1,1,1,2,'16 s/d 29',5,'Mei','2011',16,1,23,904,23,176,0,0,1080),(1,1,1,2,'16 s/d 29',5,'Mei','2011',17,1,23,904,23,176,0,0,1080),(1,1,1,2,'16 s/d 29',5,'Mei','2011',18,1,23,904,23,176,0,0,1080),(1,1,1,2,'16 s/d 29',5,'Mei','2011',19,1,23,904,23,176,0,0,1080),(1,1,1,2,'16 s/d 29',5,'Mei','2011',20,1,34,1626,34,317,0,0,1943);

/*Table structure for table `tag` */

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tag` */

insert  into `tag`(`id_tag`,`nama_tag`,`tag_seo`,`count`) values (1,'Palestina','palestina',7),(2,'Gaza','gaza',11),(9,'Tenis','tenis',5),(10,'Sepakbola','sepakbola',7),(8,'Laskar Pelangi','laskar-pelangi',2),(11,'Amerika','amerika',18),(12,'George Bush','george-bush',3),(13,'Browser','browser',9),(14,'Google','google',3),(15,'Israel','israel',5),(16,'Komputer','komputer',24),(17,'Film','film',9),(19,'Mobil','mobil',0),(21,'Gayus','gayus',2);

/*Table structure for table `tahun` */

DROP TABLE IF EXISTS `tahun`;

CREATE TABLE `tahun` (
  `thn` int(4) NOT NULL,
  PRIMARY KEY (`thn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tahun` */

insert  into `tahun`(`thn`) values (2000),(2001),(2002),(2003),(2004),(2005),(2006),(2007),(2008),(2009),(2010),(2011),(2012),(2013),(2014),(2015);

/*Table structure for table `tanggal` */

DROP TABLE IF EXISTS `tanggal`;

CREATE TABLE `tanggal` (
  `id_tgl` int(11) NOT NULL,
  `nm_tgl` varchar(10) NOT NULL,
  `jum_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tanggal` */

insert  into `tanggal`(`id_tgl`,`nm_tgl`,`jum_hari`) values (1,'1 s/d 15',15),(2,'16 s/d 28',13),(2,'16 s/d 29',14),(2,'16 s/d 30',15),(2,'16 s/d 31',16);

/*Table structure for table `tblsementara` */

DROP TABLE IF EXISTS `tblsementara`;

CREATE TABLE `tblsementara` (
  `kode` varchar(30) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `harga` int(8) DEFAULT NULL,
  `jumlah` int(8) DEFAULT NULL,
  `subtotal` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblsementara` */

/*Table structure for table `tes` */

DROP TABLE IF EXISTS `tes`;

CREATE TABLE `tes` (
  `akar` int(5) NOT NULL AUTO_INCREMENT,
  `pangkat` double DEFAULT NULL,
  `perkalian` double DEFAULT NULL,
  `pembagi` double DEFAULT NULL,
  PRIMARY KEY (`akar`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tes` */

insert  into `tes`(`akar`,`pangkat`,`perkalian`,`pembagi`) values (1,1,4,8),(2,2.82842712474619,4,8),(4,2.64575131106459,4,8),(5,11.1803398874989,4,NULL),(6,14.6969384566991,4,8),(7,18.5202591774521,7,18.5202591774521),(8,22.6274169979695,8,22.6274169979695);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `users` */

insert  into `users`(`username`,`password`,`nama_lengkap`,`email`,`no_telp`,`level`,`blokir`,`id_session`) values ('pangeran','ed02a0d2174f83e6bbea0bcfeb5b7a60','Administrator','admin@detik.com','08238923848','admin','N','mss3cn09m8bfd9d3t2qraqb922'),('sinto ','685aacb5cd4626a1c52c4840afd4b675','Sinto Gendeng','sinto@detik.com','09945849545','user','N','ah94hkov0pf3ebv3tds5a48nc0'),('joko','9ba0009aa81e794e628a04b51eaf7d7f','Joko Sembung','joko@detik.com','0895485045958','user','N','53ikmiqeqqs38lac9bk33btgt3'),('wiro','7577bfe4fecd40c43e6140344d90ce0e','Wiro Sableng','wiro@detik.com','038039403948','user','N','skrfpu5loh03fj988ffi3615l6'),('wiros','96e24dcc52c75ea07c503acd371c5e61','wiryo','wiryo@sableng','98797','user','N','9hre1dmja1r5ccui3ar3c32n05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
