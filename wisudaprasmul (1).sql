-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Des 2020 pada 11.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisudaprasmul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `galeryID` int(11) NOT NULL,
  `galeryImage` text DEFAULT NULL,
  `galeryTitle` varchar(200) NOT NULL,
  `galeryDesc` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galerycomment`
--

CREATE TABLE `galerycomment` (
  `galeryCommentID` int(11) NOT NULL,
  `galeryID` int(11) NOT NULL,
  `galeryCommentName` varchar(200) NOT NULL,
  `galeryCommentValue` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `lokerID` int(11) NOT NULL,
  `lokerTitle` varchar(200) NOT NULL,
  `lokerDesc` text NOT NULL,
  `lokerImage` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`lokerID`, `lokerTitle`, `lokerDesc`, `lokerImage`, `isDelete`) VALUES
(1, 'BCA - Wealth Management Program', '<p>Qualifications :</p>\r\n\r\n<ul>\r\n	<li>Min. GPA 3.00 (SI) &amp; 3.25 (S2)</li>\r\n	<li>Max. age 24 years old (S1) &amp; 26 years old (S2)</li>\r\n	<li>Have an interest and passion in the world of investing</li>\r\n	<li>Able to speak English, both written and spoken</li>\r\n	<li>Have good analytical thinking and problem solving</li>\r\n	<li>Have good intrapersonal and interpersonal skills</li>\r\n	<li>Willing to not get married for 1 year of education prorgam</li>\r\n	<li>Ready to be bounded by working contract for 2 years</li>\r\n</ul>\r\n', 'images/10874859425fcdcaebefe74.jpeg', 0),
(2, 'BMW ASTRA - SALES CONSULTANT - JAKARTA', '<p>Requirements :</p>\r\n\r\n<ol>\r\n	<li>Male / Female</li>\r\n	<li>Own SIM A/C</li>\r\n	<li>Bachelor Degree from all major</li>\r\n	<li>Attractive and hardworking</li>\r\n	<li>27 years old maximum</li>\r\n	<li>Domiciled and being able to be placed at Jakarta</li>\r\n</ol>\r\n\r\n<p>Join BMW Astra abd Recive exciting benefits :</p>\r\n\r\n<ol>\r\n	<li>Solid &amp; collaborative family</li>\r\n	<li>Challenging environment to grow</li>\r\n	<li>Encouraging rewards abd allowances</li>\r\n</ol>\r\n\r\n<p>Interested in joining BMW Astra?</p>\r\n\r\n<p>Please send your resume (max 1.5 MB) to recruitment@bmw.astra.co.id with email subject SC Jakarta - Name. Or drop your CV to BMW AStra Head Office (PIC: Laura Devina)</p>\r\n\r\n<p>(Jl. Gaya Motor Selatan No. 1 Sunter II / Telp. (021) 650&nbsp; 8585)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Only shortisted candidates will be invited.</p>\r\n', 'images/13917172535fcdccb544f1e.jpeg', 0),
(3, 'NUTRIFOOD - We are Hiring', '<p>If you are energic and willing to do the fun &amp; meaning full work, check these :&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Strategic Marketing</li>\r\n	<li>Area Marketing</li>\r\n	<li>Distribution Development</li>\r\n</ul>\r\n\r\n<p>Submit your online CV now</p>\r\n\r\n<p>www.nutrifood.co.id/join-us</p>\r\n\r\n<p>before 31st December</p>\r\n', 'images/20132424005fcdcd893d01c.jpg', 0),
(4, 'OCBC NISP - Young Bankers', '<p>OCBC NOSP The Young Bankers program prepares fresh graduates for a banking career that creates impactful financial transformation to others.</p>\r\n\r\n<p>Experience an exciting learning journey through extensive training, in-deoth job rotations, and mentoring by the leaders.</p>\r\n\r\n<p>If you are a go-getter with strong motivation, this is a chance for you to grow.</p>\r\n\r\n<p>Qualitications :</p>\r\n\r\n<ul>\r\n	<li>A bachelor/master degree from reputable university</li>\r\n	<li>A minimum final GPA of 3.00/4.00</li>\r\n	<li>A maximum of 2 years experience</li>\r\n	<li>Good English [roficiency</li>\r\n</ul>\r\n', 'images/17906323915fcdf3bdbcdfb.jpg', 0),
(5, 'Adira Insurance - We are Hiring', '<p>Adira Insurance New Talent - Program (ANT - Program) &bull; Minimum Bachelor&#39;s degree or Diploma IV graduate is a development program prepared by Adira Insurance&nbsp;</p>\r\n\r\n<p>&bull; Open to any major. for fresh graduate candidate. In this program,&nbsp;</p>\r\n\r\n<p>&bull; Minimal GPA 3.00 participant will be given not only a comprehensive &bull; Fluent in english both oral and written knowledge about Adira Insurance and the insurance&nbsp;</p>\r\n\r\n<p>&bull; Max. 25 years old for Bachelor or Diploma VI graduate industry itself, but also soft competency that will help&nbsp;</p>\r\n\r\n<p>and 26 years old for Master graduate them to develop them<strong>selves.&nbsp;</strong></p>\r\n\r\n<p>&bull; Willing to be placed all over Indonesia&nbsp;</p>\r\n\r\n<p>Send your updated CV and others supporting document to <strong>Recruitment Jakarta@asuransiadira.co.id </strong>Subject<strong>: Adira Insurance New Talent - Program </strong><strong><em>(</em></strong><strong>ANT - Program)&nbsp;</strong></p>\r\n\r\n<p>Only qualified candidates will be contacted later to participate in the process. Join the program and be the part of Adira Insurance Family.</p>\r\n', 'images/19156298795fcdf49ccb2b3.jpg', 0),
(6, 'Nabati - Management Trainee', '<p>Requirement &amp; Qualifications :</p>\r\n\r\n<ul>\r\n	<li><strong>Bachelor&#39;s Defree&nbsp;</strong>from&nbsp;<strong>Management, Economy, Business, Accounting, Industrial Engineering, Mechanical Engineering, Electrical Engineering, Foog Technology, Chemical Engineering, Sistem Informatika, Teknik Informatika, Information Technology, Psychology, Mathematic/Statistic, Law.</strong></li>\r\n	<li>Min&nbsp;<strong>GPA 3.330&nbsp;</strong>and have a minimun&nbsp;<strong>TOEFL score 400</strong></li>\r\n	<li>Have a good analytical thinking, strategical thinking, problem solving, systematical thinking and data driven minded</li>\r\n	<li>Keen to outperform, open to learning, eager to speak up, and have a strong can-do attitude</li>\r\n	<li>Work Experience (Min 2 years experience will be advantaged); had worked in a FMCG Company will be advantage</li>\r\n	<li>Willing to be placed in Bandung or Majalengka, Rancaekek, Cicalengka&nbsp; Manufacure</li>\r\n</ul>\r\n', 'images/7115668275fcdf62777569.jpg', 0),
(7, 'Ganendra - Socmed Job', '<p>URAIANPEKERJAAN:</p>\r\n\r\n<ul>\r\n	<li>Memahami dan mampu untuk merencanakan, mengendalikan, dan mengevaluasi aktivitas keuangan</li>\r\n	<li>Mampu berpikir secara strategis untuk menumbuh kembangkan perusahaan untuk jangka menengah dan jangka panjang</li>\r\n</ul>\r\n\r\n<p>KUALIFIKASI:</p>\r\n\r\n<ul>\r\n	<li>Lulusan S2</li>\r\n	<li>Min. 1 tahun pengalaman kerja dibagian Akuntansi/Keuangan</li>\r\n	<li>Memiliki pengalaman organisasi</li>\r\n	<li>Mampu melakukan analisa dan memecahkan masalah terkait dengan perihal keuangan</li>\r\n	<li>Mampu berkomunikasi dengan baik</li>\r\n	<li>Mampu bekerja dalam kelompok</li>\r\n	<li>Berpikiran terbuka dan punya keinginan kuat untuk mempelajari hal-hal baru</li>\r\n</ul>\r\n', 'images/1285675375fcdf74b14a0a.jpg', 0),
(8, 'FWD Insurance - Join out team!', '<p>Send your updated resume to</p>\r\n\r\n<p>mentari.winarni@fwdinsurance.co.id</p>\r\n\r\n<p>before 15 December 2020</p>\r\n', 'images/3399081665fcdf7b676238.jpg', 0),
(9, 'PT Bank HSBC', '<p>As you frow, we grow.</p>\r\n\r\n<p>Discover graduate opportunities at</p>\r\n\r\n<p>www.about.hsbc.co.id/careers</p>\r\n', 'images/1974405635fcdf8410d1e3.jpg', 0),
(10, 'CIMB Biaga', '<p>Create Your Own Opportunities.</p>\r\n\r\n<p>Listen to their stories</p>\r\n', 'images/1379699975fcdf8910d812.jpg', 0),
(11, 'Blibli - We are Hiring', '<p>Jr. Content &amp; Promotion Officer (Home &amp; Living Category)</p>\r\n\r\n<p><strong>Qualification:</strong></p>\r\n\r\n<ul>\r\n	<li>​​​​​​Minimum&nbsp; Bachelor&#39;s degree from reputable university with GPA min 3.0</li>\r\n	<li>Good working knowledge of competitor and product portofolio, Shopper Experience, consumer segmentation/psychorgaphic customer behaviors/buyology, obline visitor journey, and social media marketing</li>\r\n	<li>Digital savvy and resourceful</li>\r\n	<li>Exceptional communication and organizational skills</li>\r\n	<li>Passionate, consumer oriented, persistent, creative, flexible, team player and adaptable nature</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Merchandising Officer (Handphone Category)</p>\r\n\r\n<p><strong>Qualification :</strong></p>\r\n\r\n<ul>\r\n	<li>Minimum Bachelor&#39;s degree from reputable university with GPA min. 3.0</li>\r\n	<li>Exceptional communication and organizational skills</li>\r\n	<li>Passionate, consumer oriented, persistent, creative, flexible, team player and adaptable nature</li>\r\n</ul>\r\n', 'images/20364435155fcdfa15101d4.jpg', 0),
(12, 'Dunamis', '<p>In Dunamis, we value each other and treat each person with whom we work as true partners.</p>\r\n\r\n<p>Dunamis Organization Services is a training &amp; consulting company specializing in performance improvement.</p>\r\n\r\n<p>Join us and be a&nbsp;<strong>ROCK</strong>er!</p>\r\n', 'images/19941924305fcdfa86e6e73.jpg', 0),
(13, 'Kraft Heinz', '<p>Be part of the heart and engine of one of the biggest FMCG company in Indonesia by joining Kraft Heinz Young Leaders Program.</p>\r\n\r\n<p>It&#39;s a one-year development program which will allow you to unveil you potential by learning directly and get mentoring sessions with our leaders. You&#39;ll be involved and giving opportunities to own a project business impacted and create you own Legacy!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Requirements :</p>\r\n\r\n<ul>\r\n	<li>Purpose-driven, hard-working, and passionate graduates</li>\r\n	<li>Must posses at least Bachelor degree from any major, with min. GPA 3.00</li>\r\n	<li>Graduated not more than two years ago</li>\r\n	<li>Completed thesis defense by February 2021</li>\r\n	<li>Fluent in Englist, both oral and written</li>\r\n</ul>\r\n', 'images/13189484645fcdfb957fd73.png', 0),
(14, 'Schneider - Method Engineer', '<p>Reuirements :</p>\r\n\r\n<ul>\r\n	<li>Bachelor Degree or Diploma in Industrial / Mechanical / Electrical / Electronics / Manufacturing Engineering or equivalent</li>\r\n	<li>Proficient in AutoCAD, LADM, MTM, Microsoft Office applications, Gerber software</li>\r\n	<li>Analytical with a keen eye for detail</li>\r\n	<li>Customer service and quality oriented</li>\r\n	<li>Good written and spoken Englist</li>\r\n</ul>\r\n', 'images/10902874545fcdfc74da41d.png', 0),
(15, 'Schneider - Product Engineer Electromechanical', '<p>Reuirements :</p>\r\n\r\n<ul>\r\n	<li>Bachelor Degree or Diploma in Mechanical Engineering</li>\r\n	<li>At least 3 years of relevant experiences in the manufacturing of Electrical / Electronic products</li>\r\n	<li>Experienced in product and process design at the product and sub-assembly levels</li>\r\n	<li>Hands-on experiences in Lean Manufacturing concepts and apllications</li>\r\n	<li>Independent contributor with creative flair for mechanical designing and drawing with AutoCAD or related software</li>\r\n</ul>\r\n', 'images/8631716025fcdfd2ede002.png', 0),
(16, 'Schneider - Project Management Leader', '<p>Reuirements :</p>\r\n\r\n<ul>\r\n	<li>Bachelor Degree of Mechanical / Electrical / Industrial Engineering</li>\r\n	<li>Having at least 2 years experiece in project management</li>\r\n	<li>Good in project administration and filling</li>\r\n	<li>Must be able to work individually and with sales engineers and operational engineers</li>\r\n	<li>Be able to multitask and work with teams or groups</li>\r\n</ul>\r\n', 'images/14375247615fcdfdae7e49e.png', 0),
(17, 'Schneider - Supply Chain Order Management', '<p>Reuirements :</p>\r\n\r\n<ul>\r\n	<li>Bachelor Degree&nbsp;in Industrial Engineering or equivalent</li>\r\n	<li>At least 2 years of relevant experiences in electrical / electronic producs manufacturing environment</li>\r\n	<li>Candidates with SAP experiences will be prioritized</li>\r\n	<li>Proven ability to multi-task and drive outcomes</li>\r\n	<li>Customer service and quality iruented</li>\r\n	<li>Good written and spoken English</li>\r\n</ul>\r\n', 'images/11624273645fcdfe576e1f2.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokercomment`
--

CREATE TABLE `lokercomment` (
  `lokerCommentID` int(11) NOT NULL,
  `lokerID` int(11) NOT NULL,
  `lokerCommentName` varchar(200) NOT NULL,
  `lokerCommentValue` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`galeryID`);

--
-- Indeks untuk tabel `galerycomment`
--
ALTER TABLE `galerycomment`
  ADD PRIMARY KEY (`galeryCommentID`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`lokerID`);

--
-- Indeks untuk tabel `lokercomment`
--
ALTER TABLE `lokercomment`
  ADD PRIMARY KEY (`lokerCommentID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `galeryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galerycomment`
--
ALTER TABLE `galerycomment`
  MODIFY `galeryCommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `lokerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `lokercomment`
--
ALTER TABLE `lokercomment`
  MODIFY `lokerCommentID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
