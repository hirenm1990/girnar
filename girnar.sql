-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2017 at 12:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `girnar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `phone2` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `account_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `swift_code` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `isActive` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `name`, `address`, `phone`, `phone2`, `account_no`, `swift_code`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'AXIS BANK', 'Shop No. 1,2,3 Raiji Nagar Shoping Centre,\r\nN K mehta Road,Motibag,\r\nJunagadh(362001), Gujarat, INDIA.', NULL, NULL, '912030004364581', 'AXISINBB087', 1, '2017-09-15 05:23:59', '2017-09-15 05:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE `buyer_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `name`, `address`, `country`, `phone`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'STAR ASIA (FAR EAST) CO. LTD', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', 'THAILAND', NULL, 1, '2017-09-15 06:35:10', '2017-09-15 06:35:10'),
(2, 'Test Buyer', '', '', '', 1, '2017-09-18 16:02:55', NULL),
(3, 'ABC', 'ABC', '', '', 1, '2017-09-18 16:02:55', NULL),
(4, 'BJ HONG', 'KAOHSIUNG\r\nTAIWAN', 'TAIWAN', '+1234656787', 1, '2017-09-18 16:02:55', NULL),
(5, 'SAMYANG FINE', 'SOUTH KOREA', 'SOUTH KOREA', '', 1, '2017-09-18 16:02:55', NULL),
(6, 'STAR ASIA (FAR EAST) CO. LTD', '972/1 3RD FLOOR, VORASUBIN BUILDING\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', 'THAILAND', '', 1, '2017-09-18 16:02:55', NULL),
(7, 'test', 'tsdaga', '', '', 1, '2017-09-18 16:02:55', NULL),
(8, 'fasdf', '', '', '', 1, '2017-09-18 16:02:55', NULL),
(9, 'Test buyer', '', '', '', 1, '2017-09-18 16:02:55', NULL),
(10, 'Test buyer', '', '', '', 1, '2017-09-18 16:02:55', NULL),
(11, 'BAALBAKI GROUP SA OFFSHORE', 'P.O. Box: 42448 HAMRIYAH FREE ZONE, SHARJAH - UAE Tel: +971 6 52 60788 Fax: +971 6 52 61799', 'UAE', '+971 6 52 60788', 1, '2017-09-18 16:02:55', NULL),
(12, 'DONGYANG OIL', '', '', '', 1, '2017-09-18 16:02:55', NULL),
(13, 'SOLCHEM D.O.O.', 'KOPER, SLOVENIA', 'SLOVENIA', '', 1, '2017-09-18 16:02:55', NULL),
(14, 'EAGLE POLYMERS', 'INDUSTRIAL ZONE # 2,\r\nPART 233, 6th OF OCTOBER CITY\r\n', 'EGYPT', '', 1, '2017-09-18 16:02:55', NULL),
(15, 'A. AZEVEDO INDÃšSTRIA E COMÃ‰RCIO DE Ã“LEOS LTDA', 'ESTRADA MUNICIPAL BENTO PEREIRA DE TOLEDO, 2043\r\nCEP 13295-000 â€“ ITUPEVA â€“ SÃƒO PAULO â€“ BRASIL\r\nCNPJ 61.278.875/0003-06     I.E. 388.010.905.115\r\nTEL: 55-11-3806-4800 FAX: 55-11-2061-2111', 'BRASIL', '+55-11-3806-4800 ', 1, '2017-09-18 16:02:55', NULL),
(16, 'INTERFAT, S.A.', 'AVD. DIAGONAL, 403, 6-2 08808 BARCELONA\r\nES TELF : 934161999 FAX: 934161048    A08461089', 'SPAIN', ' 934161999', 1, '2017-09-18 16:02:55', NULL),
(17, '\"AKTAM\"', '198096,SAINT-PETERSBURG,PORTOVAYA ST, \r\n15, LIT. B, OF-4H. OGRN 1117847461181\r\nINN 7807364464 KRP 780701001', 'RUSSIA', '', 1, '2017-09-18 16:02:55', NULL),
(18, '\"AKTAM\"', '198096,SAINT-PETERSBURG,PORTOVAYA ST, \r\n15, LIT. B, OF-4H. OGRN 1117847461181\r\nINN 7807364464 KRP 780701001', 'RUSSIA', '', 1, '2017-09-18 16:02:55', NULL),
(19, '\"AKTAM\"', '198096,SAINT-PETERSBURG,PORTOVAYA ST, \r\n15, LIT. B, OF-4H. OGRN 1117847461181\r\nINN 7807364464 KRP 780701001', 'RUSSIA', '', 1, '2017-09-18 16:02:55', NULL),
(20, '\"AKTAM\"', '198096,SAINT-PETERSBURG,PORTOVAYA ST, \r\n15, LIT. B, OF-4H. OGRN 1117847461181\r\nINN 7807364464 KRP 780701001', 'RUSSIA', '', 1, '2017-09-18 16:02:55', NULL),
(21, 'LIBA CHEM', '20061 CARUGATE(MI)-VIA ITALIA,30\r\nTEL-.02 92505648 , FAX: 02 92153614', 'SPAIN', '02 92505648', 1, '2017-09-18 16:02:55', NULL),
(22, 'HAMPSHIRE COMMODITIES LIMITED', '121 ALBERT STREET, FLEET, HAMPSHIRE GU51 3SR\r\nTELEPHONE : 01252 613058 FAX 01252 616374\r\nEMAIL : jon@hampshire-commodities.co.uk\r\n', 'UK', '01252 613058', 1, '2017-09-18 16:02:55', NULL),
(23, 'CHIN MING TRADING CO,.LTD', '3FL, NO 296, SEC 1, CHUNG SHAN ROAD SHULIN\r\nTAIWAN 23842\r\n', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(24, 'TEXTRON TECNICA S.L.', 'GIRONA,34\r\n08400 GRANOLLERS (BARCELONA)\r\nSPAIN', 'SPAIN', '', 1, '2017-09-18 16:02:55', NULL),
(25, 'SINOCHEM PLASTICS CO., LTD.', '7F, SINOCHEM TOWER, A2 FUXINGMENWAI STREET\r\nBEIJING', 'CHINA', '', 1, '2017-09-18 16:02:55', NULL),
(26, 'QUIMICA OCCIDENTAL, S.A. DE C.V.', 'LUIS BRAILLE NO.135, COL.INDEPENDANCIA\r\n03630 MEXICO, D.F.', 'MEXICO', '+52 55 5539 3612', 1, '2017-09-18 16:02:55', NULL),
(27, 'CJP CHEMICALS (PTY) LTD', '60 ELECTRON AVENUE\r\nISANDO\r\nJOHANNESBURG 1600', 'SOUTH AFRICA', '+27 11 494 6700', 1, '2017-09-18 16:02:55', NULL),
(28, 'IFFCO CHEMICALS FZE', 'PO BOX 41671. HAMIRIYAH FREE ZONE, PHASE I,\r\nSHARJAH', 'UAE', '+971 6526 3922', 1, '2017-09-18 16:02:55', NULL),
(29, 'SAUDI INDUSTRIAL DETERGENTS CO.', 'PO BOX 2571 DAMMAM', 'SAUDI ARABIA', '+966 13 816 6777', 1, '2017-09-18 16:02:55', NULL),
(30, 'AUSTRALIAN VINYLS CORPORATION PTY LTD', 'Jesica Road, Campbellfield,\r\nVictoria 3061', 'AUSTRALIA', '+61 03 8359 7364', 1, '2017-09-18 16:02:55', NULL),
(31, 'SIROCKO (THAILAND) CO. LTD.', '129/112 Moo1 Bangkayang, Moung,\r\nANY PORT, INDIA\r\nPathumthani 12000', 'THAILAND', '+66(0)-81-810-2780', 1, '2017-09-18 16:02:55', NULL),
(32, 'NEFTECHEMEX LLC', '115516, Russia, Moscow,\r\nPromyshlennaya, 11, building 3, of.419', 'RUSSIA', '+7 (495) 646 81 35', 1, '2017-09-18 16:02:55', NULL),
(33, 'LUBRICANTES DE AMERICA, S.A. DE C.V.', 'Carretera a GarcÃ­a Km 1.2 S/N\r\nSanta Catarina, N.L.\r\nCP 66350 MÃ©xico\r\nTax ID: LAM951127KF6', 'MEXICO', '+52 81 81227400 ext.', 1, '2017-09-18 16:02:55', NULL),
(34, 'PATECH FINE CHEMICALS CO., LTD.', 'NO.41, ALLEY 1, LANE420, KUANG-FU S.RD.,\r\nTAIPEI, TAIWAN R.O.C. 10695', 'TAIWAN', '+886 2 2703 3268', 1, '2017-09-18 16:02:55', NULL),
(35, 'AFRIGLOBAL COMMODITIES DMCC', '905, JBC 2, Jumeirah Lake Towers\r\nDubai, UAE\r\nPhone - +971 4 4484258   Fax - +971 4 4484259', 'UAE', ' +971 4 4484258', 1, '2017-09-18 16:02:55', NULL),
(36, 'YU YUAN TECHNOLOGY CO., LTD ', 'NO.20-56, NIAOSONG VILLAGE,DONGSHIH TOWNSHIP,\r\nCHIAYI COUNTY 614, TAIWAN R.O.C.', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(37, 'LVLIN BIOTECH CO LTD.', '2F, NO 58, CHANGPING E, 3RD BEITUN DISTRICT,\r\nTAICHUNG CITY 406, TAIWAN R.O.C.', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(38, 'B.J. HONG ENTERPRISE CO., LTD.', '11F-3, NO. 372 CHUNG CHENG 1ST ROAD,\r\nKAOHSIUNG, TAIWAN R.O.C.\r\nTel:886-7-7232212  Fax:886-7-7238557', 'TAIWAN', '+886-7-7232212', 1, '2017-09-18 16:02:55', NULL),
(39, 'OOO Nortex', '101000, Russia, Moscow\r\nArmyanskiy per. 4 bld. 1 AB\r\nTel./Fax +7 (495) 225 44 40', 'RUSSIA', '+7 (495) 225 44 40', 1, '2017-09-18 16:02:55', NULL),
(40, 'TELENOLOGY INTERNATIONAL CO., LTD', '12F No.695 MingCheng 3rd Road\r\nKaohsiung 804, Taiwan\r\nTel: +886 7 553-8738 Fax: +886 7 553-6867', 'TAIWAN', '+886 7 553-8738', 1, '2017-09-18 16:02:55', NULL),
(41, 'DONGEUN CO., LTD', '28-19, Bunseong-ro 5412eon-gi3, Gi0hae-si,\r\nGyeongsangna0-do, 50820, Korea\r\nTe3 : +82 55 322 9986 Fax : +82 55 322 9989', 'SOUTH KOREA', '+82 55 322 9986', 1, '2017-09-18 16:02:55', NULL),
(42, 'KING NUNG YEOU ENTERPRISE CO., LTD', 'NO.600. TING-HO SEC., TOU YUAN RD., FANG YUAN TOWNSHIP,\r\nCHANGHUA COUNTY 528, TAIWAN, R.O.C.', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(43, 'TAI YEH CHEMICAL INDUSTRY CO., LTD.', '68-1, 9 LING, BAO TANQ TSUN, GUAN IN SHIANG,\r\nTAO YUAN, TAIWAN, R.O.C.', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(44, 'SHOEI YAKUHIN CO.,LTD.', '5-1, 1-CHOME, AZUCHIMACHI, CHUOKU, OSAKA,\r\nJAPAN\r\nTEL: +81 06 6262 2701', 'JAPAN', '+81 06 6262 2701', 1, '2017-09-18 16:02:55', NULL),
(45, 'FWUSOW INDUSTRY CO., LTD', '4th FLOOR, NO.72, NINGPO WEST STREET,\r\nTAIPEI 10075, TAIWAN', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(46, 'EVERKEM SRL ', 'VIA DELLA LIRICA 11\r\n48124 RAVENNA RA', 'ITALY', '', 1, '2017-09-18 16:02:55', NULL),
(47, 'TADBIR GOSTAR ZAMAN', 'ADD : No.15, Ostad Shahriyar Alley, Baghshomal Tabriz, Iran.\r\nTel. : +98 41 35544872  \r\n Fax : +98 41 35538475', 'IRAN', '+98 41 35544872 ', 1, '2017-09-18 16:02:55', NULL),
(48, 'TADBIR GOSTAR ZAMAN', 'ADD : No.15, Ostad Shahriyar Alley, Baghshomal Tabriz, Iran.\r\nTel. : +98 41 35544872  \r\n Fax : +98 41 35538475', 'IRAN', '+98 41 35544872 ', 1, '2017-09-18 16:02:55', NULL),
(49, 'CHARLOTTE CHEMICAL INC.', '9901 I-1O West Suite 800,\r\nSan Antonio TX 78230 USA\r\nPhone 210 558 2886', 'USA', '210 558 2886', 1, '2017-09-18 16:02:55', NULL),
(50, 'CASTOR INTERNATIONAL BV', 'P.O. BOX 96.\r\n5750 AB DEURNE\r\nTHE NETHERLANDS', 'NETHERLAND', '', 1, '2017-09-18 16:02:55', NULL),
(51, 'CHEMICAL-LAND TRADING CO. LTD', '69, BANSONG-RO, YEONJE KU,\r\nBUSAN, SOUTH KOREA\r\nT:051-865-3232', 'SOUTH KOREA', '+82-51-865-3232', 1, '2017-09-18 16:02:55', NULL),
(52, 'SAMYANG FINE CHEMICAL CO.,LTD.', '301-804, BUCHEON TECHNO-PARK,SSANGYONG 3RD.,\r\n397,SEOKCHEON-RO,OJEONG-GU,BUCHEON-SI,\r\nGYEONGGI-DO,KOREA', 'SOUTH KOREA', '+82 32 624 2021', 1, '2017-09-18 16:02:55', NULL),
(53, 'WELLNESS-TOP BIOTECHNOLOGY CO.,LTD.', 'No.11, Shennong E. Rd., Changzhi Township,\r\nPingtung County 908, Taiwan\r\nTEL:886-7-2266699 FAX:886-7-2273957', 'TAIWAN', '+886-7-2266699', 1, '2017-09-18 16:02:55', NULL),
(54, 'FYC CO LTD', 'FYC BLDG,2-1-5,MINATO CHUO-KU,FUKUOKA\r\nJAPAN, POSTCODE :810-0075', 'JAPAN', '+81-92-712-4121', 1, '2017-09-18 16:02:55', NULL),
(55, 'CAHAYA LAGENDA RESOURCES SDN. BHD.', 'TD-03-04, CRYSTAL TOWER, CHANGKAT BUKIT INDAH DUA,\r\nBUKIT INDAH, 68000 AMPANG, SELANGOR D.E.\r\nTEL: +603-2289 0632 FAX: +603-2289 0636', 'MALAYSIA', '+603-2289 0632', 1, '2017-09-18 16:02:55', NULL),
(56, 'DONG YANG OIL CHEMICAL CO. LTD.', '1785-6, CHEONGWON RO, WONGOK MYEON,\r\nANSEONG SI, GYEONGGI DO, SEOUL,\r\nSOUTH KOREA', 'SOUTH KOREA', '', 1, '2017-09-18 16:02:55', NULL),
(57, 'INDUSTRIA QUIMICA ANASTACIO S/A', 'RUA GIL STEIN FERREIRA,357 , SALA 703,\r\n 88 301-210 CENTRO, ITAJAI-SC,\r\nCNPJ 60.874.724/0005-10', 'BRASIL', '', 1, '2017-09-18 16:02:55', NULL),
(58, 'MFRP ENGINEERING SDN BHD', 'NO. 26, JALAN PUTERI 5/16, BANDAR PUTERI,\r\n47100 PUCHONG, SELANGOR DARUL EHSAN, MALAYSIA\r\nTEL: +603-80624478 FAX: +603-80616876', 'MALAYSIA', '+603-80624478', 1, '2017-09-18 16:02:55', NULL),
(59, 'OOO \"TD HALMEK\"', '3.BLDG ., 7A DOROZHNAYA ST. ,\r\nMOSCOW, RUSSIA 117545\r\nTEL : +7 (963) 682-99-44', 'RUSSIA', '+7 (963) 682-99-44', 1, '2017-09-18 16:02:55', NULL),
(60, 'GREATWILL INTERNATIONAL CO., LTD.', 'RM51, 5TH FLOOR, BRITANNIA HOUSE, JALAN CATOR,\r\nBANDAR SERI BEGAWAN BS 8811,NEGARA BRUNEI DARUSSALAM\r\nTEL:+886-6-2531668 FAX: +886-6-2421613', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(61, 'LUBRICANTS ASIA LTD.', 'BSCIS I/E, Sagarika Road\r\nBlock-A, P.O. Customs Academy, Chittagong-4219\r\nTel: +880-31-750060/750446 \r\nFAX: +880-31-750061', 'BANGLADESH', '+880-31-750060/75044', 1, '2017-09-18 16:02:55', NULL),
(62, 'GO-FENG INDUSTRY CO., LTD', 'NO.7-1, LN. 520, DAREN RD., LUZHU DIST.,\r\nKAOHSIUNG CITY 821, TAIWAN (R.O.C.)', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(63, 'THAI CASTOR OIL INDUSTRIES CO., LTD', '12th Fl., Orakarn Bldg., 26/42 Soi Chidlom,Ploenchit Rd.,\r\nLumpini, Patumvan, Bangkok 10330, Thailand\r\nTel : +66 2254 1490-7', 'THAILAND', '+66 2254 1490-7', 1, '2017-09-18 16:02:55', NULL),
(64, 'HORN HAUR ENTERPRISE CO., LTD.', '5F, No.3, Alley 14, Lane 151, Yuan Shan Rd.,\r\nChung Ho Dist., New Taipei City 235, Taiwan\r\nTel : +886-2-2226-5160\r\nFax: +886-2-2226-9687', 'TAIWAN', '+886-2-2226-5160', 1, '2017-09-18 16:02:55', NULL),
(65, 'KUWAIT LUBE OIL COMPANY', 'INDUSTRIAL AREA, BUILDING NO-52, BLOCK-4\r\nSTREET-7, SHUAIBAH, P.O.BOX 9748\r\nAHMADI 61008, KUWAIT', 'KUWAIT', '', 1, '2017-09-18 16:02:55', NULL),
(66, 'PAK GREASE MFG CO (PVT) LTD', 'NO. 6 OIL INSTALLATION AREA, KHEMARI\r\nKARACHI - 75620 PAKISTAN', 'PAKISTAN', '', 1, '2017-09-18 16:02:55', NULL),
(67, 'KIILTO OY', 'KEHATIE 1\r\n33880 LEMPAALA\r\nFINLAND', 'FINLAND', '', 1, '2017-09-18 16:02:55', NULL),
(68, 'MB PETROLUBE INDUSTRIES PVT. LTD.', '303 Kamaladi, Kathmandu Nepal\r\nCustomers VAT/PAN Number: 300020748\r\nTel: + 977 1 4240363', 'NEPAL', '+977 1 4240363', 1, '2017-09-18 16:02:55', NULL),
(69, 'OMNI - CHEM', '1427 W. 86th Street Suite 365\r\nIndianapolis, IN 46260\r\nTel : +1 -317-852-1986', 'USA', '+1 -317-852-1986', 1, '2017-09-18 16:02:55', NULL),
(70, 'CHURWAN YU CO., LTD.', 'NO.29, LANE 180, CHIEN CHENG RD.,\r\nMIN SHENG TSUN, FANG YUAN HSIANG, \r\nCHANGHUA HSIEN, TAIWAN', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(71, 'MADESA S.A.', 'Av. Presidente Eduardo Frei Montalva 9431\r\nQuilicura, Santiago, Chile - 8710004\r\nVAT NÂ°: 84.083.400-K\r\nContact person: Jose Miralles', 'CHILE', '+56 224357781', 1, '2017-09-18 16:02:55', NULL),
(72, 'EPIC FOODS (PTY) LTD', '1 Guy Gibson Avenue\r\nAeroton 2013, Gauteng, South Africa\r\nTel : (+27) 11 248 0000 Fax: (+27) 494 1115', 'SOUTH AFRICA', '+27 11 248 0000', 1, '2017-09-18 16:02:55', NULL),
(73, 'ZAO \"Ruskhimset\"', 'Noviy Arbat str., h. 21 office 1806\r\nMoscow 119019, Russia\r\nTel :+7-495-789-8399, 739-5457', 'RUSSIA', '+7-495-789-8399', 1, '2017-09-18 16:02:55', NULL),
(74, 'PT. BALMER LAWRIE INDONESIA', 'GRAHA STR 2nd FLOOR, JI. AMPERA RAYA NO.11\r\nRAGUNAN - PASAR MINGGU, JAKARTA SELATION 12550', 'INDONESIA', '', 1, '2017-09-18 16:02:55', NULL),
(75, 'PAN ASIA CHEMICAL CORPORATION', '10F., NO.50, SEC. 1, XINSHENG S. RD.,\r\nTAIPEI, TAIWAN(R.O.C.)\r\nTEL : 886-2-23937111', 'TAIWAN', '+886-2-23937111', 1, '2017-09-18 16:02:55', NULL),
(76, 'THE PEKAY GROUP (PTY) LTD.', '24 Fulton Street, Industria West,\r\nJohannesburg, Gauteng\r\nSOUTH AFRICA', 'SOUTH AFRICA', '', 1, '2017-09-18 16:02:55', NULL),
(77, 'HUBE GLOBAL CO., LTD', 'Office 610, Wooree Venture Town II, 82-29, 3-Ga Mullae-dong,\r\nYeongdeungpo-gu, Seoul, Republic of Korea (#150-836)\r\nTEL : +82-2-2068-9312, \r\nFAX : +82-2-2068-8761,', 'SOUTH KOREA', '+82-2-2068-9312', 1, '2017-09-18 16:02:55', NULL),
(78, 'TRADECOM SERVICES PVT LTD', '3 SHENTON WAY, #09-08 SHENTON HOUSE\r\nSINGAPORE 068805\r\nTEL : (65) 62240036 FAX : (65) 62230611', 'SINGAPORE', '+65 62240036', 1, '2017-09-18 16:02:55', NULL),
(79, 'KOWON EVERCHEM CORPORATION', 'Kowon Building 20-19\r\nYangjae-Dong,Seocho-ku Seoul,Korea\r\nTel : +82-2-578-6181 Fax : +82-2-578-6692', 'SOUTH KOREA', '+82-2-578-6181', 1, '2017-09-18 16:02:55', NULL),
(80, 'LLCâ€œRU SIE AGRINOLâ€', '3-a, Stroitelnaya str., Berdyansk\r\nUkraine, 71100\r\nTel.: +38 06153 60701', 'ODESSA', '+38 06153 60701', 1, '2017-09-18 16:02:55', NULL),
(81, 'EL KAYAR IMPORT, EXPORT & COMMERCIAL AGENCIES CORP', '14 SELIM HASSAN STREET - EL SHATBY\r\nALEXANDRIA - EGYPT', 'EGYPT', '', 1, '2017-09-18 16:02:55', NULL),
(82, 'AL SHARHAN INDUSTRIES', 'P.O. BOX 424\r\n13005 SAFAT\r\nKUWAIT', 'KUWAIT', '', 1, '2017-09-18 16:02:55', NULL),
(83, 'SUFI SOAP & CHEMICAL INDUSTRIES (PVT) LTD', '1-B GARDEN BLOCK, GARDEN TOWN\r\nLAHORE, PAKISTAN', 'PAKISTAN', '', 1, '2017-09-18 16:02:55', NULL),
(84, 'TIANXING BIOTECHNOLOGY CO., LTD', 'HANDIAN INDUSTRIAL ZONE, ZOUPING\r\nSHANDONG 256200 CHINA', 'CHINA', '', 1, '2017-09-18 16:02:55', NULL),
(85, 'FLEXA ADHESIVOS Y RECUBRIMIENTOS S. R. L.', 'ALBERTI 101-(1722) MERLO - PCIA. DE BS. AS.\r\nREPUBLICA ARGENTINA', 'ARGENTINA', '', 1, '2017-09-18 16:02:55', NULL),
(86, 'AUSTRALIAN MUD COMPANY', '216 BALCATTA ROAD, BALCATTA\r\nWA 6021 AUSTRALIA', 'AUSTRALIA', '', 1, '2017-09-18 16:02:55', NULL),
(87, 'CHOLIMEX FOODS JOINT STOCK COMPANY', '7th ST. VINH LOC INDUSTRIAL PARK\r\nBINH CHANH DIS., HO CHI MINH CITY,\r\nVIETNAM', 'VIETNAM', '', 1, '2017-09-18 16:02:55', NULL),
(88, 'THREE JACK FEED INDUSTRY CO., LTD.', 'NO.282, FU HSING RD., IA LIAO VILL.,\r\nLU JWU HSIANG, KAOHSIUNG, TAIWAN R.O.C.', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(89, 'SABO SPA', 'VIA CARAVAGGI - 24040 LEVATE (BG)\r\nITALY\r\nTEL. +39 035596000 FAX. : +39.035594400', 'ITALY', '+39 035596000', 1, '2017-09-18 16:02:55', NULL),
(90, 'BILTREC S.A.,', 'ATLANTIDA, 21 , 102a\r\n08930 SANT ADRIA DE BESOS\r\nBARCELONA SPAIN', 'SPAIN', '', 1, '2017-09-18 16:02:55', NULL),
(91, 'BILTREC S.A.,', 'ATLANTIDA, 21 , 102a\r\n08930 SANT ADRIA DE BESOS\r\nBARCELONA SPAIN', 'SPAIN', '', 1, '2017-09-18 16:02:55', NULL),
(92, 'N H TRADING', '(553, Sungnae-dong) 7, Olympic-ro 48-gil,\r\nGangdong-gu, Seoul, Korea', 'SOUTH KOREA', '', 1, '2017-09-18 16:02:55', NULL),
(93, 'Universal Marketing & Consultancy FZCo', 'Warehouse RA08BB04, JAFZA, UAE\r\nTel: +9714 880 8272\r\nFax: +9714 8808 273', 'UAE', '', 1, '2017-09-18 16:02:55', NULL),
(94, 'VVF SINGAPORE PTE LTD', '133 Cecil Street, #9-01A, Keck Seng Tower,\r\nSingapore 069535\r\nTel : +65 6224 8871 Fax : +65 6224 8082', 'SINGAPORE', '+65 6224 8871', 1, '2017-09-18 16:02:55', NULL),
(95, 'FERMIC , S.A. DE C.V.', 'REFORMA NO. 873, COL. SAN NICOLAS TOLENTINO\r\nC.P. 09850, DEL .IZTAPALAPA\r\nMEXICO, D.F', 'MEXICO', '', 1, '2017-09-18 16:02:55', NULL),
(96, 'SYNCHEM INTERNATIONAL CO., LTD', 'NO 25, TONG XING STREET, ROOM 3208, 3209\r\nWORLD TRADE CENTRE, DALIAN, ZIP CODE : 116001\r\n', 'CHINA', '', 1, '2017-09-18 16:02:55', NULL),
(97, 'United Trading System Scandinavia AB', 'Box 187\r\n265 22 Ã…STORP\r\nSWEDEN', 'SWEDEN', '', 1, '2017-09-18 16:02:55', NULL),
(98, 'CHANG HSING BIOTECHNOLOGY CO., LTD.', '1F, NO.21-2, HUZI TSUO, LONGHSING VILLAGE\r\nCHONGPU HSIANG, CHIAYI COUNTY,TAIWAN, R.O.C', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(99, 'CHANG HSING BIOTECHNOLOGY CO., LTD.', '1F, NO.21-2, HUZI TSUO, LONGHSING VILLAGE\r\nCHONGPU HSIANG, CHIAYI COUNTY,TAIWAN, R.O.C', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(100, 'CHEONG-MU ENTERPRISE CO., LTD.', 'NO.160, LI-KANG RD., CHUN-LIN VILLAGE,\r\nLI-KANG HSIANG, PING-TUNG HSIEN,\r\nTAIWAN(R.O.C.)', 'TAIWAN', '', 1, '2017-09-18 16:02:55', NULL),
(101, 'OLEON N.V.', 'ASSENEDESTRAAT 2\r\n9940 ERTVELDE\r\nBELGIUM', 'BELGIUM', '', 1, '2017-09-18 16:02:55', NULL),
(102, 'EL NABILA GROUP COMPANY', '1st Elshiek Rehan, Inside Panasonic Building, \r\n9th Floor, Abdeen, Cairo, Egypt', 'EGYPT', '+202 2512 1473', 1, '2017-09-18 16:02:55', NULL),
(103, 'VANDEPUTTE OLEOCHEMICALS SA', 'BOULEVARD INDUSTRIAL, 120\r\nB-7700 BELGIUM\r\nVAT NUMBER : BE - 471.546.593', 'BELGIUM', '', 1, '2017-09-18 16:02:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commercial_invoice_details`
--

CREATE TABLE `commercial_invoice_details` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `buyer_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `buyer_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `buyer_bank_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `buyer_bank_details` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comm_invoice_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `comm_invoice_date` date NOT NULL,
  `lc_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lc_date` date NOT NULL,
  `bl_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bl_date` date NOT NULL,
  `vessel_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `country_of_origin` varchar(50) CHARACTER SET utf8 NOT NULL,
  `drawn_under` varchar(255) CHARACTER SET utf8 NOT NULL,
  `specification` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comm_invoice_notes` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comm_invoice_discount` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `phone2` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `weighbridge_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `weighbridge_reg_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `gst_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `iec_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lut_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pan_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `website` varchar(50) CHARACTER SET utf8 NOT NULL,
  `isActive` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `name`, `address`, `phone`, `phone2`, `weighbridge_address`, `weighbridge_reg_no`, `gst_no`, `iec_no`, `lut_no`, `pan_no`, `website`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Girnar Industries', 'Opp. Rajdhani weighbridge,\r\nRajkot Road, Dolatpara, Junagadh(362003),\r\nGUJARAT, INDIA\r\nTel. +91 285 2660893', '+91 285 2660893', NULL, 'Opp. Rajdhani weighbridge,\r\nRajkot Road, Dolatpara, Junagadh(362003),\r\nGUJARAT, INDIA\r\nTel. +91 285 2660893', '194824-13/06/2016', '24AAIFG8649K1ZW', '2412004315', 'v/30-09/mp/LUT/2017-18/1581', 'AAIFG8649K', 'www.girnarindustries.com', 1, '2017-09-15 21:09:37', '2017-09-15 21:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE `containers` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `container_size` varchar(100) CHARACTER SET utf8 NOT NULL,
  `container_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `self_seal_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `line_seal_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gross weight` double NOT NULL,
  `net_weight` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `container_products`
--

CREATE TABLE `container_products` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  `shipment_containers_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `gross_weight` double DEFAULT NULL,
  `net_weight` double DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `container_types`
--

CREATE TABLE `container_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `contract_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contract_date` date NOT NULL,
  `surveyor_id` int(11) NOT NULL,
  `purchase_order_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `buyer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `buyer_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `notifier_party` varchar(255) CHARACTER SET utf8 NOT NULL,
  `consignee_party` varchar(255) CHARACTER SET utf8 NOT NULL,
  `delivery_terms_id` int(11) NOT NULL,
  `payment_terms_id` int(11) NOT NULL,
  `dollor_exchange_rate` double NOT NULL,
  `dollor_exchange_id` int(11) NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contract_no`, `contract_date`, `surveyor_id`, `purchase_order_no`, `buyer_id`, `buyer_name`, `buyer_address`, `notifier_party`, `consignee_party`, `delivery_terms_id`, `payment_terms_id`, `dollor_exchange_rate`, `dollor_exchange_id`, `isActive`, `created_at`, `updated_at`) VALUES
(1, '1', '2017-09-19', 2, '', 1, 'STAR ASIA (FAR EAST) CO. LTD', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', 2, 2, 1, 1, 0, '2017-09-18 21:46:53', '2017-09-22 04:10:56'),
(2, '2', '2017-09-19', 2, '', 1, 'STAR ASIA (FAR EAST) CO. LTD', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', 2, 2, 2, 1, 1, '2017-09-19 04:47:26', '2017-09-19 23:22:00'),
(3, '3', '2017-09-19', 2, '', 1, 'STAR ASIA (FAR EAST) CO. LTD', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', 2, 2, 60.05, 1, 1, '2017-09-19 04:50:24', '2017-09-19 04:50:24'),
(4, '4', '2017-09-20', 2, '', 4, 'BJ HONG', 'KAOHSIUNG\r\nTAIWAN', 'KAOHSIUNG\r\nTAIWAN', 'KAOHSIUNG\r\nTAIWAN', 5, 3, 50, 2, 1, '2017-09-19 23:14:54', '2017-09-19 23:14:54'),
(5, 'test', '2017-09-22', 2, '123', 1, 'STAR ASIA (FAR EAST) CO. LTD', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', 5, 4, 132, 1, 1, '2017-09-22 00:17:02', '2017-09-22 00:17:02'),
(6, '123', '2017-09-22', 2, '123', 1, 'STAR ASIA (FAR EAST) CO. LTD', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', '972/1 3RD FLOOR, VORASUBIN BUILDING\r\nSOI RANA 9 HOSPITAL,RAMA 9 ROAD, BANG KAPI,\r\nBANG KAPI, HUAI KHWANG,BANGKOK 10320 THAILAND', 2, 2, 60, 1, 1, '2017-09-22 00:54:59', '2017-09-22 00:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `contract_products`
--

CREATE TABLE `contract_products` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `discharge_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `specification` varchar(255) CHARACTER SET utf8 NOT NULL,
  `qty` double NOT NULL,
  `rate` double NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_products`
--

INSERT INTO `contract_products` (`id`, `contract_id`, `shipment_id`, `discharge_port`, `product_id`, `package_id`, `specification`, `qty`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(1, 6, 7, '1', 2, 2, 'test', 10, 20, 200, '2017-09-22 00:54:59', '2017-09-22 00:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `container_type_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `container_type_id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
(1, NULL, 'SOUTH KOREA', 1, '2017-09-15 22:03:29', '2017-09-15 22:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE `delivery_orders` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `forwarder_id` int(5) DEFAULT NULL,
  `shipment_line` varchar(255) DEFAULT NULL,
  `freight` varchar(255) DEFAULT NULL,
  `total_freight` varchar(255) DEFAULT NULL,
  `thc` varchar(255) DEFAULT NULL,
  `blc` varchar(255) DEFAULT NULL,
  `booking_no` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_expiry_date` date NOT NULL,
  `vessel_name` varchar(255) DEFAULT NULL,
  `voyage_no` varchar(255) DEFAULT NULL,
  `eta_origin` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `etd_origin` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `eta_destination` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `eta_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_transit` varchar(255) DEFAULT NULL,
  `vgm_cutoff` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `container_gate_open` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `gate_cutoff` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `document_cutoff` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `si_cutoff` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `stuffing_from` date NOT NULL DEFAULT '0000-00-00',
  `stuffing_to` date NOT NULL DEFAULT '0000-00-00',
  `total_detention_days` varchar(255) DEFAULT NULL,
  `total_demurrage_days` varchar(255) DEFAULT NULL,
  `change_eta_destination_port` varchar(255) DEFAULT '0000-00-00',
  `change_total_transit_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_terms`
--

CREATE TABLE `delivery_terms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_terms`
--

INSERT INTO `delivery_terms` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
(2, 'CFR', 1, '2016-10-13 17:54:40', '2016-10-13 17:54:40'),
(3, 'CNF', 1, '2016-12-28 00:14:27', '2016-12-28 00:14:27'),
(5, 'FOB PIPAVAV', 1, '2017-01-25 18:14:41', '2017-03-23 17:13:56'),
(6, 'CIF', 1, '2017-01-25 22:13:04', '2017-01-25 22:13:04'),
(7, 'DAP', 1, '2017-02-24 18:09:53', '2017-02-24 18:09:53'),
(9, 'EX -WORKS', 1, '2017-02-24 22:32:31', '2017-02-24 22:32:31'),
(11, 'C&F', 1, '2017-03-19 16:40:40', '2017-03-19 16:40:40'),
(12, 'FOB MUNDRA', 1, '2017-03-23 17:14:09', '2017-03-23 17:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `discharge_ports`
--

CREATE TABLE `discharge_ports` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discharge_ports`
--

INSERT INTO `discharge_ports` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
(2, 'KAOHSIUNG', 1, '2016-10-13 17:54:17', '2016-10-13 17:54:17'),
(3, 'BUSAN', 1, '2016-10-29 17:50:42', '2016-10-29 17:50:42'),
(4, 'TAICHUNG', 1, '2016-11-19 00:10:35', '2016-11-19 00:10:35'),
(5, 'HOUSTON', 1, '2016-12-28 00:12:05', '2016-12-28 00:12:05'),
(6, 'SHARJAH', 1, '2017-01-10 21:17:47', '2017-03-23 17:10:19'),
(7, 'KOPER', 1, '2017-01-22 19:29:05', '2017-01-22 19:29:05'),
(8, 'ALEXANDRIA OLD PORT', 1, '2017-01-22 19:48:37', '2017-01-22 19:48:37'),
(9, 'SANTOS', 1, '2017-01-25 17:49:19', '2017-01-25 17:49:19'),
(10, 'BARCELONA', 1, '2017-01-25 18:13:43', '2017-01-25 18:13:43'),
(12, 'GENOVA', 1, '2017-01-25 22:14:47', '2017-01-25 22:14:47'),
(13, 'felixstowe', 1, '2017-01-25 23:16:42', '2017-01-25 23:16:42'),
(14, 'SHANGHAI', 1, '2017-02-01 16:51:24', '2017-02-01 16:51:24'),
(15, 'HUANGPU', 1, '2017-02-01 17:19:12', '2017-02-01 17:19:12'),
(16, 'VERACRUZ', 1, '2017-02-01 17:33:38', '2017-02-01 17:33:38'),
(17, 'DURBAN', 1, '2017-02-01 18:04:27', '2017-02-01 18:04:27'),
(18, 'CAPETOWN', 1, '2017-02-01 18:04:42', '2017-02-01 18:04:42'),
(19, 'JEBEL ALI', 1, '2017-02-01 18:46:28', '2017-02-01 18:46:28'),
(20, 'DAMMAM', 1, '2017-02-01 18:55:03', '2017-02-01 18:55:03'),
(21, 'SYDNEY', 1, '2017-02-01 19:03:28', '2017-02-01 19:03:28'),
(22, 'BANGKOK', 1, '2017-02-02 17:05:16', '2017-02-02 17:05:16'),
(23, 'ST.PETERSBURG', 1, '2017-02-02 17:40:27', '2017-02-02 17:40:27'),
(24, 'ALTAMIRA', 1, '2017-02-02 17:47:29', '2017-02-02 17:47:29'),
(25, 'ALEXANDRIA', 1, '2017-02-02 18:07:25', '2017-02-02 18:07:25'),
(26, 'OSAKA', 1, '2017-02-02 23:24:24', '2017-02-02 23:24:24'),
(27, 'BANDARABBAS', 1, '2017-02-03 02:12:51', '2017-02-03 02:12:51'),
(28, 'ROTTERDAM', 1, '2017-02-04 16:51:43', '2017-02-04 16:51:43'),
(29, 'INCHEON', 1, '2017-02-06 18:41:27', '2017-02-06 18:41:27'),
(30, 'SHIBUSHI', 1, '2017-02-07 17:18:45', '2017-02-07 17:18:45'),
(31, 'PORT KELANG', 1, '2017-02-10 00:59:47', '2017-02-10 00:59:47'),
(33, 'ITAJAI / NAVEGANTS', 1, '2017-02-11 16:29:25', '2017-02-11 16:29:25'),
(34, 'HCMC(CAT LAI)', 1, '2017-02-14 22:43:32', '2017-02-14 22:43:32'),
(35, 'CHITTAGONG', 1, '2017-02-21 17:51:53', '2017-02-21 17:51:53'),
(36, 'KEELUNG', 1, '2017-02-22 23:20:54', '2017-02-22 23:20:54'),
(37, 'SHUWAIKH', 1, '2017-02-24 17:05:55', '2017-02-24 17:43:19'),
(38, 'KARACHI', 1, '2017-02-24 17:12:47', '2017-02-24 17:12:47'),
(39, 'LEMPAALA', 1, '2017-02-24 18:09:29', '2017-02-24 18:09:29'),
(40, 'EX -WORKS', 1, '2017-02-24 22:32:02', '2017-02-24 22:32:02'),
(41, 'MANZANILLO', 1, '2017-02-24 22:44:46', '2017-02-24 22:44:46'),
(42, 'SAN-ANTONIO', 1, '2017-03-03 16:27:19', '2017-03-03 16:27:19'),
(43, 'JAKARTA', 1, '2017-03-11 06:37:55', '2017-03-11 06:37:55'),
(44, 'JOHANNESBURG', 1, '2017-03-17 00:03:09', '2017-03-17 00:03:09'),
(45, 'MANILA', 1, '2017-03-17 00:27:22', '2017-03-17 00:27:22'),
(46, 'ODESSA', 1, '2017-03-18 01:25:38', '2017-03-18 01:25:38'),
(47, 'BUENOS AIRES', 1, '2017-03-19 16:51:36', '2017-03-19 16:51:36'),
(48, 'FREEMANTLE', 1, '2017-04-05 02:13:52', '2017-04-05 02:13:52'),
(49, 'HO CHI MINH', 1, '2017-04-05 02:19:23', '2017-04-05 02:19:23'),
(50, 'DOHA', 1, '2017-04-06 23:42:13', '2017-04-06 23:42:13'),
(51, 'LIANYUNGANG', 1, '2017-04-16 17:44:39', '2017-04-16 17:44:39'),
(52, 'LIANYUNGANG', 1, '2017-04-16 17:44:39', '2017-04-16 17:44:39'),
(53, 'ANTWERP', 1, '2017-04-24 18:34:47', '2017-04-24 18:34:47'),
(54, 'ANTWERP', 1, '2017-04-24 18:34:48', '2017-04-24 18:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `document_status`
--

CREATE TABLE `document_status` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dollor_exchanges`
--

CREATE TABLE `dollor_exchanges` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cents` varchar(25) CHARACTER SET utf8 NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dollor_exchanges`
--

INSERT INTO `dollor_exchanges` (`id`, `name`, `full_name`, `cents`, `isActive`, `created_at`, `updated_at`) VALUES
(1, '$ USD', '', '', 1, '2017-09-18 05:35:19', '2017-09-18 11:39:32'),
(2, '€ EURO', '', '', 1, '2017-09-18 05:35:39', '2017-09-18 11:40:00'),
(3, '₹ INR', '', '', 1, '2017-09-18 05:35:49', '2017-09-18 11:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `final_destination`
--

CREATE TABLE `final_destination` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `final_destination`
--

INSERT INTO `final_destination` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Test Destination', 1, '2016-09-30 13:37:11', '2016-09-30 13:37:11'),
(2, 'KAOHSIUNG', 1, '2016-10-13 17:54:26', '2016-10-13 17:54:26'),
(3, 'BUSAN', 1, '2016-10-29 17:50:52', '2016-10-29 17:50:52'),
(4, 'TAICHUNG', 1, '2016-11-19 00:10:54', '2016-11-19 00:10:54'),
(5, 'HOUSTON', 1, '2016-12-28 00:13:50', '2016-12-28 00:13:50'),
(6, 'sharjah', 1, '2017-01-10 21:19:43', '2017-01-10 21:19:43'),
(7, 'KOPER', 1, '2017-01-22 19:29:23', '2017-01-22 19:29:23'),
(8, 'KOPER', 1, '2017-01-22 19:29:24', '2017-01-22 19:29:24'),
(9, 'ALEXANDRIA OLD PORT', 1, '2017-01-22 19:48:50', '2017-01-22 19:48:50'),
(10, 'EGYPT', 1, '2017-01-22 19:49:00', '2017-01-22 19:49:00'),
(11, 'SANTOS', 1, '2017-01-25 17:50:03', '2017-01-25 17:50:03'),
(12, 'ST.PETERSBURG', 1, '2017-01-25 22:12:50', '2017-01-25 22:12:50'),
(13, 'GENOVA', 1, '2017-01-25 22:15:02', '2017-01-25 22:15:02'),
(14, 'felixstowe', 1, '2017-01-25 23:17:06', '2017-01-25 23:17:06'),
(15, 'BARCELONA', 1, '2017-01-26 16:18:32', '2017-01-26 16:18:32'),
(16, 'SHANGHAI', 1, '2017-02-01 16:52:04', '2017-02-01 16:52:04'),
(17, 'HUANGPU', 1, '2017-02-01 17:19:25', '2017-02-01 17:19:25'),
(18, 'VERACRUZ', 1, '2017-02-01 17:33:52', '2017-02-01 17:33:52'),
(19, 'MEXICO', 1, '2017-02-01 17:34:06', '2017-02-01 17:34:06'),
(20, 'CAPETOWN', 1, '2017-02-01 18:04:53', '2017-02-01 18:04:53'),
(21, 'JEBEL ALI', 1, '2017-02-01 18:46:39', '2017-02-01 18:46:39'),
(22, 'DAMMAM', 1, '2017-02-01 18:55:13', '2017-02-01 18:55:13'),
(23, 'SYDNEY', 1, '2017-02-01 19:03:55', '2017-02-01 19:03:55'),
(24, 'BANGKOK', 1, '2017-02-02 17:05:28', '2017-02-02 17:05:28'),
(25, 'ALTAMIRA', 1, '2017-02-02 17:47:44', '2017-02-02 17:47:44'),
(26, 'ALEXANDRIA', 1, '2017-02-02 18:07:34', '2017-02-02 18:07:34'),
(27, 'OSAKA', 1, '2017-02-02 23:24:32', '2017-02-02 23:24:32'),
(28, 'BANDAR ABBAS', 1, '2017-02-03 02:13:05', '2017-02-03 02:13:05'),
(29, 'ROTTERDAM', 1, '2017-02-04 16:51:54', '2017-02-04 16:51:54'),
(30, 'INCHEON', 1, '2017-02-06 18:41:35', '2017-02-06 18:41:35'),
(31, 'SHIBUSHI', 1, '2017-02-07 17:19:02', '2017-02-07 17:19:02'),
(32, 'PORT KELANG', 1, '2017-02-10 00:59:55', '2017-02-10 00:59:55'),
(33, 'ITAJAI / NAVEGANTS', 1, '2017-02-11 16:29:33', '2017-02-11 16:29:33'),
(34, 'HCMC(CAT LAI)', 1, '2017-02-14 22:43:42', '2017-02-14 22:43:42'),
(35, 'CHITTAGONG', 1, '2017-02-21 17:52:05', '2017-02-21 17:52:05'),
(36, 'KEELUNG', 1, '2017-02-22 23:21:09', '2017-02-22 23:21:09'),
(37, 'SHUWAIKH', 1, '2017-02-24 17:06:15', '2017-02-24 17:06:15'),
(38, 'KARACHI', 1, '2017-02-24 17:13:10', '2017-02-24 17:13:10'),
(39, 'LEMPAALA', 1, '2017-02-24 18:09:39', '2017-02-24 18:09:39'),
(40, 'KATHMANDU', 1, '2017-02-24 22:32:16', '2017-02-24 22:32:16'),
(41, 'MANZANILLO', 1, '2017-02-24 22:45:00', '2017-02-24 22:45:00'),
(42, 'SAN-ANTONIO', 1, '2017-03-03 16:27:28', '2017-03-03 16:27:28'),
(43, 'DURBAN', 1, '2017-03-03 16:31:13', '2017-03-03 16:31:13'),
(44, 'SPAIN', 1, '2017-03-04 16:20:38', '2017-03-04 16:20:38'),
(45, 'JAKARTA', 1, '2017-03-11 06:38:27', '2017-03-11 06:38:27'),
(46, 'JOHANNESBURG', 1, '2017-03-17 00:03:30', '2017-03-17 00:03:30'),
(47, 'MANILA', 1, '2017-03-17 00:27:33', '2017-03-17 00:27:33'),
(48, 'ODESSA', 1, '2017-03-18 01:25:48', '2017-03-18 01:25:48'),
(49, 'BUENOS AIRES', 1, '2017-03-19 16:51:48', '2017-03-19 16:51:48'),
(50, 'FREEMANTLE', 1, '2017-04-05 02:14:48', '2017-04-05 02:14:48'),
(51, 'HO CHI MINH', 1, '2017-04-05 02:19:31', '2017-04-05 02:19:31'),
(52, 'DOHA', 1, '2017-04-06 23:42:22', '2017-04-06 23:42:22'),
(53, 'LIANYUNGANG', 1, '2017-04-16 17:44:51', '2017-04-16 17:44:51'),
(54, 'ANTWERP', 1, '2017-04-24 18:34:59', '2017-04-24 18:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `forwarders`
--

CREATE TABLE `forwarders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contact_person` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forwarders`
--

INSERT INTO `forwarders` (`id`, `name`, `contact_person`, `phone`, `email`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'SURYA SHIPPING SERVICES', 'MR. SURESH NAIR', '9099023246', 'SURESH@SURYASHIP.COM', 1, '2017-09-17 21:47:03', '2017-09-17 21:47:03'),
(2, 'ORANGE MARITIME', 'BHAVIN RAJAYAGURU', NULL, 'BHAVINR@ORANGEMARITIME.COM', 1, '2017-09-17 21:49:37', '2017-09-17 21:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `loding_port_details`
--

CREATE TABLE `loding_port_details` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `loading_port_id` int(11) NOT NULL,
  `discharge_port_id` int(11) NOT NULL,
  `final_destination_id` int(11) NOT NULL,
  `destination_country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `loding_port_details`
--

INSERT INTO `loding_port_details` (`id`, `contract_id`, `shipment_id`, `loading_port_id`, `discharge_port_id`, `final_destination_id`, `destination_country_id`, `created_at`, `updated_at`) VALUES
(1, 6, 7, 1, 2, 1, 1, '2017-09-22 00:54:59', '2017-09-22 00:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `table_id` varchar(20) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `log` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Test Package', 0, '2016-09-30 13:38:05', '2017-09-16 01:25:47'),
(2, '200KG DRUMS NON-PALLETIZED', 1, '2016-10-13 17:56:09', '2016-10-13 17:56:09'),
(3, 'BULK IN CONTAINER', 1, '2016-10-24 19:34:36', '2016-10-24 19:34:36'),
(4, 'BULK IN FLEXI TANK  (TLBD)', 1, '2016-12-28 00:17:53', '2016-12-28 00:17:53'),
(5, 'FLEXI TANK(BLBD)', 1, '2017-01-10 21:52:08', '2017-01-10 21:52:08'),
(6, '40KG PP BAGS', 1, '2017-01-23 00:22:33', '2017-01-23 00:22:33'),
(10, 'BULK IN \"ISO\" TANK', 1, '2017-01-25 18:16:17', '2017-01-25 18:16:17'),
(12, ' IN NEW MS DRUMS 225KGS NET', 1, '2017-01-25 18:27:48', '2017-01-25 18:27:48'),
(13, 'BULK IN FLEXI TANK (TLTD)', 1, '2017-02-01 17:08:43', '2017-02-01 17:08:43'),
(15, '25KG PAPER BAGS NON-PALLETIZED', 1, '2017-02-01 17:44:20', '2017-02-01 17:44:20'),
(16, '225KG DRUMS NON-PALLETIZED', 1, '2017-02-01 18:41:10', '2017-02-01 18:41:10'),
(17, '200KG DRUMS PALLETIZED', 1, '2017-02-01 18:48:16', '2017-02-01 18:48:16'),
(18, '225KG DRUMS PALLETIZZED', 1, '2017-02-01 18:56:54', '2017-02-01 18:56:54'),
(19, 'IN 225KG DRUMS PALLETIZED', 1, '2017-02-01 18:58:37', '2017-02-01 18:58:37'),
(20, 'IN 25KG PAPER BAGS PALLETIZED', 1, '2017-02-01 19:05:55', '2017-02-01 19:05:55'),
(21, 'IN 225KG DRUMS NON-PALLETIZED', 1, '2017-02-02 17:42:31', '2017-02-02 17:42:31'),
(22, 'IN 25KG PAPER BAGS NON-PALLETIZED', 1, '2017-02-02 17:59:16', '2017-02-02 17:59:16'),
(23, 'IN 200KG DRUMS PALLETIZED', 1, '2017-02-02 18:10:13', '2017-02-02 18:10:13'),
(24, 'IN FLEXI TANK(TOP LOADING BOTTON DISCHARGE) WITH H', 1, '2017-02-02 22:09:51', '2017-02-02 22:09:51'),
(25, 'IN BULK IN CONTAINER', 1, '2017-02-02 22:26:56', '2017-02-02 22:26:56'),
(26, 'IN 500KG JUMBO BAGS PALLETIZED', 1, '2017-02-02 23:07:17', '2017-02-02 23:07:17'),
(27, 'IN 200KG DRUMS NON-PALLETIZED', 1, '2017-02-04 22:54:09', '2017-02-04 22:54:09'),
(28, 'IN 850KG JUMBO BAGS NON-PALLETIZED', 1, '2017-02-07 17:20:56', '2017-02-07 17:20:56'),
(29, 'IN 50KG PP BAGS NON-PALLETIZED', 1, '2017-02-24 22:33:22', '2017-02-24 22:33:22'),
(30, 'IN 950KG NEW IBC TANK', 1, '2017-03-03 16:28:31', '2017-03-03 16:28:31'),
(31, 'IN 225KG NEW HDPE DRUMS NON-PALLETIZED', 1, '2017-03-03 16:33:51', '2017-03-03 16:33:51'),
(32, 'BULK IN FLEXITANK(BLBD)', 1, '2017-04-06 19:06:11', '2017-04-06 19:06:11'),
(33, 'IN 30KG PP BAGS', 1, '2017-04-06 19:23:59', '2017-04-06 19:23:59'),
(34, 'abc_packing', 1, '2017-09-04 07:12:38', '2017-09-04 07:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
(2, 'LC AT SIGHT', 1, '2016-10-13 17:54:49', '2016-10-13 17:54:49'),
(3, 'CAD THROUGH BANK', 1, '2016-12-28 00:14:51', '2016-12-28 00:14:51'),
(4, '30% ADVANCE & 70% AGAINST DOCS', 1, '2017-01-22 19:30:14', '2017-01-22 19:30:14'),
(6, 'CAD', 1, '2017-01-25 18:24:37', '2017-01-25 18:24:37'),
(7, '100% TT PAYMENT', 1, '2017-01-25 18:25:05', '2017-01-25 18:25:05'),
(8, 'TT 45 DAYS FROM B/L DATE', 1, '2017-01-26 16:19:15', '2017-01-26 16:19:15'),
(9, 'CASH AGAINST DOCUMENT', 1, '2017-01-26 16:26:49', '2017-01-26 16:26:49'),
(10, 'TT 15DAYS AFTER VESSEL ARRIVES AT DEST. PORT', 1, '2017-02-01 17:34:51', '2017-02-01 17:34:51'),
(11, '60 DAYS LC FROM BL DATE', 1, '2017-02-01 18:05:50', '2017-02-01 18:05:50'),
(12, '100% ADVANCE PAYMENT', 1, '2017-02-01 18:47:23', '2017-02-01 18:47:23'),
(13, 'DP AT SIGHT(AGAINST SCAN DOCS)', 1, '2017-02-02 18:08:37', '2017-02-02 18:08:37'),
(14, '50% ADVANCE + 50% AGAINST SCAN BL', 1, '2017-02-14 22:27:55', '2017-02-14 22:27:55'),
(15, 'CAD THROUGH BANK 60 DAYS', 1, '2017-02-24 18:10:15', '2017-02-24 18:10:15'),
(16, 'TT 30DAYS FROM BL DATE', 1, '2017-03-17 00:28:07', '2017-03-17 00:28:07'),
(17, 'LC SIGHT 30 DAYS', 1, '2017-04-05 02:19:57', '2017-04-05 02:19:57'),
(18, 'CAD THROUGH BANK 30DAYS FROM B/L DATE', 1, '2017-04-24 18:35:51', '2017-04-24 18:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `permission_no` varchar(50) NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `name`, `permission_no`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'MUNDRA', '', 1, '2016-09-30 13:36:48', '2017-09-06 10:46:41'),
(2, 'PIPAVAV', '', 1, '2016-09-30 13:36:53', '2017-09-06 10:47:01'),
(3, 'EX -WORKS', '', 1, '2017-02-24 22:31:42', '2017-02-24 22:31:42'),
(4, 'ANY', '', 0, '2017-03-23 17:02:04', '2017-03-23 17:09:39'),
(5, 'ANY PORT IN INDIA', '', 1, '2017-03-23 17:02:22', '2017-03-23 17:02:22'),
(6, 'MUMBAI', '', 1, '2017-07-06 06:57:05', '2017-08-17 04:10:20'),
(7, 'test', '', 0, '2017-09-06 10:44:42', '2017-09-16 07:57:57'),
(8, 'add test', '1321251', 1, '2017-09-11 08:09:29', '2017-09-11 08:09:29'),
(9, 'new Post Add', '112233', 1, '2017-09-11 08:10:28', '2017-09-11 08:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hs_code` varchar(50) NOT NULL,
  `shortcode` varchar(50) DEFAULT NULL,
  `dbk_scheme_no` varchar(50) DEFAULT NULL,
  `fob` varchar(50) DEFAULT NULL,
  `file_no` varchar(50) DEFAULT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `hs_code`, `shortcode`, `dbk_scheme_no`, `fob`, `file_no`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Test Product 1', '123456', '', '2307A', '1', '', 0, '2016-09-30 13:37:58', '2017-02-04 22:55:38'),
(2, 'CASTOR OIL FIRST SPECIAL GRADE', '15153090', 'COFSG', '2208A', '1', '', 1, '2016-10-13 17:55:50', '2017-08-10 06:16:47'),
(3, 'CASTOR SEED MEAL', '23069027', '', '2306A', '1', '', 0, '2016-10-24 19:34:19', '2017-03-23 17:11:14'),
(4, 'CASTOR OIL -REFINED- NOT FOR EDIBLE USE', '15153090', 'CO-R-NFEU', '22098A', '1', '', 1, '2016-12-28 00:17:18', '2017-08-10 06:16:41'),
(5, 'DEHYDRATED CASTOR OIL', '15180029', 'DCO', '23065A', '1', '', 1, '2017-01-22 19:35:30', '2017-08-10 06:16:57'),
(6, 'CASTOR OIL PALE PRESSED GRADE', '15153090', 'COPPG', NULL, '1', NULL, 1, '2017-01-25 23:23:15', '2017-09-16 08:57:33'),
(7, '12HYDROXY STEARIC ACID', '29157040', '12HSA', '2915B', '1.5', '', 1, '2017-02-01 17:44:01', '2017-07-17 08:36:02'),
(8, 'HYDROGENATED CASTOR OIL - NORMAL', '15162039', 'HCO-N', '1516A', '1', '', 1, '2017-02-01 17:45:09', '2017-07-17 08:40:27'),
(9, 'HYDROGENATED CASTOR OIL - STANDARD', '15162039', 'H CO - STANDARD', '1516A', '1', '', 1, '2017-02-01 19:05:29', '2017-07-17 09:04:43'),
(10, '12HYDROXY STEARIC ACID - STANDARD', '29157040', '12HSA-S', '2915B', '1.5', '', 1, '2017-02-01 19:06:45', '2017-07-17 08:37:06'),
(11, '12HYDROXY STEARIC ACID - NORMAL', '29157040', '12HSA-N', '2915B', '1.5', '', 1, '2017-02-02 17:50:47', '2017-07-17 08:36:51'),
(12, 'INDIAN CASTOR SEED EXTRACTION MEAL', '23069027', 'ICSEM', '2306A', '1', '', 1, '2017-02-02 22:26:41', '2017-07-17 08:41:14'),
(13, '12HYDROXY STEARIC ACID - BLEACHED', '38231990', '12HSA-B', '2105A', '1.5', '', 1, '2017-02-02 23:07:01', '2017-08-10 06:16:26'),
(14, 'H.C.O FATTY ACID ', '38231900', 'H.C.O FA', '', '1', '', 1, '2017-02-11 16:30:23', '2017-08-10 06:17:08'),
(15, 'RICINOLEIC ACID', '29161990', 'RA', '1516A', '1.4', '', 1, '2017-02-24 18:48:24', '2017-07-17 08:42:00'),
(16, 'INDIAN CASTOR SEED EXTRACTION MEAL - PELLET FORM', '23069027', 'ICSEM-PF', '2306A', '1', '', 1, '2017-02-24 22:40:35', '2017-07-17 08:43:42'),
(17, 'GROUNDNUT EXTRACTION MEAL - 40%', '23050020', 'GEM-40%', '2305A', '1', '', 1, '2017-02-24 22:49:08', '2017-07-17 09:01:58'),
(18, 'GROUNDNUT MEAL 45%', '23050090', 'GEM-45%', '1212A', '1', '', 1, '2017-04-05 02:22:14', '2017-08-10 06:17:03'),
(19, 'INDIAN CASTOR SEED EXTRACTION MEAL - HIGH PROTEIN', '23069027', 'ICSEM-HP', '2212A', '1', '', 1, '2017-04-06 23:33:17', '2017-08-10 06:17:14'),
(20, 'CASTOR  CAKE', '23069027', 'CC', '1210A', '1', '', 1, '2017-04-24 17:21:10', '2017-08-10 06:16:35'),
(21, 'sahgdjhsgdhgjhgsad', '2432432', 'fgh', '1123A', '1', '', 0, '2017-07-17 07:47:13', '2017-07-17 08:42:06'),
(22, 'abc_1234', 'abc1234', '0', '', '', '', 1, '2017-09-04 07:00:11', '2017-09-04 07:00:11'),
(23, 'abc_1234', 'abc1234', '0', '', '', '', 1, '2017-09-04 07:00:12', '2017-09-04 07:00:12'),
(24, 'abc_1234', 'abc1234', '0', '', '', '', 1, '2017-09-04 07:00:13', '2017-09-04 07:00:13'),
(25, 'abc_1234', 'abc1234', '0', '', '', '', 1, '2017-09-04 07:00:13', '2017-09-04 07:00:13'),
(26, 'abc_1234', 'abc1234', '0', '', '', '', 1, '2017-09-04 07:00:13', '2017-09-04 07:00:13'),
(27, 'abc_1234', 'abc1234', '0', '', '', '', 1, '2017-09-04 07:00:13', '2017-09-04 07:00:13'),
(28, 'abc_123', 'abc_123', '', '', '', '', 1, '2017-09-04 07:00:35', '2017-09-04 07:00:35'),
(29, 'adsadasd', 'sad', '', '', '', '', 1, '2017-09-04 07:05:46', '2017-09-04 07:05:46'),
(30, 'abc_112233', '112233', '', '', '', '', 1, '2017-09-04 07:09:42', '2017-09-04 07:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment` varchar(100) CHARACTER SET utf8 NOT NULL,
  `shipment_code` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `shipment_notes` varchar(255) CHARACTER SET utf8 NOT NULL,
  `container_size_twenty` varchar(50) CHARACTER SET utf8 NOT NULL,
  `container_size_forty` varchar(50) CHARACTER SET utf8 NOT NULL,
  `quotation_freight_twenty` varchar(50) CHARACTER SET utf8 NOT NULL,
  `quotation_freight_forty` varchar(50) CHARACTER SET utf8 NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `contract_id`, `shipment`, `shipment_code`, `shipment_notes`, `container_size_twenty`, `container_size_forty`, `quotation_freight_twenty`, `quotation_freight_forty`, `isActive`, `created_at`, `updated_at`) VALUES
(7, 6, 'shipment A', 'A', 'test', '20', '10', '10', '20', 1, '2017-09-22 00:54:59', '2017-09-22 00:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `stocks_products`
--

CREATE TABLE `stocks_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `stuffing_invoice`
--

CREATE TABLE `stuffing_invoice` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `invoice_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `invoice_date` date NOT NULL,
  `are_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `are_date` date NOT NULL,
  `dbk_rate` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `freight` varchar(100) CHARACTER SET utf8 NOT NULL,
  `extra_charge_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `extra_charge_amount` double NOT NULL,
  `examining_officer` varchar(100) CHARACTER SET utf8 NOT NULL,
  `supervision_officer` varchar(100) CHARACTER SET utf8 NOT NULL,
  `examined` varchar(100) CHARACTER SET utf8 NOT NULL,
  `container_markings` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surveyors`
--

CREATE TABLE `surveyors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveyors`
--

INSERT INTO `surveyors` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Test Surveyor', 0, '2016-09-30 13:36:07', '2017-02-04 22:55:51'),
(2, 'GEOCHEM', 1, '2016-10-13 17:53:36', '2016-10-13 17:53:36'),
(3, 'SGS', 1, '2016-10-24 19:27:44', '2016-10-24 19:27:44'),
(4, 'INTERTEK', 1, '2016-10-29 17:49:47', '2016-10-29 17:49:47'),
(5, 'ANY', 1, '2017-02-02 22:41:53', '2017-02-02 22:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `upload_documents`
--

CREATE TABLE `upload_documents` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filetype` varchar(20) NOT NULL,
  `extension` varchar(255) NOT NULL DEFAULT '',
  `size` varchar(255) NOT NULL DEFAULT '',
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isActive` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `email`, `password`, `isActive`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Lakhman', NULL, NULL, NULL, 'bhutiyalakhman@gmail.com', '$2y$10$CKAlp5mQY8iu6qRgZ4sY4.nQ0XLT.9AI47gP8iFJ/tHx8S53w7Za.', 1, '2017-09-22 09:22:22', '2017-09-13 04:58:46', 'nxbiLDIOdCPdaAmzHeYpzUqzg6g8jL5lE4mEbq15CuU0k31DHny1SaLfre35');

-- --------------------------------------------------------

--
-- Table structure for table `vgm_details`
--

CREATE TABLE `vgm_details` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `name_authorized` varchar(255) CHARACTER SET utf8 NOT NULL,
  `designation_authorized` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact_detail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `max_weight_csc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gross_mass` double DEFAULT NULL,
  `gross_method` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `gross_net` double DEFAULT NULL,
  `gross_tare` double DEFAULT NULL,
  `gross_packing` text CHARACTER SET utf8,
  `date_time` varchar(255) CHARACTER SET utf8 NOT NULL,
  `weight_slip_no` text CHARACTER SET utf8 NOT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `hazardous` varchar(255) CHARACTER SET utf8 NOT NULL,
  `booking` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commercial_invoice_details`
--
ALTER TABLE `commercial_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `container_products`
--
ALTER TABLE `container_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `container_types`
--
ALTER TABLE `container_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_products`
--
ALTER TABLE `contract_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_terms`
--
ALTER TABLE `delivery_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge_ports`
--
ALTER TABLE `discharge_ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_status`
--
ALTER TABLE `document_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dollor_exchanges`
--
ALTER TABLE `dollor_exchanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_destination`
--
ALTER TABLE `final_destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forwarders`
--
ALTER TABLE `forwarders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loding_port_details`
--
ALTER TABLE `loding_port_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks_products`
--
ALTER TABLE `stocks_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveyors`
--
ALTER TABLE `surveyors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_documents`
--
ALTER TABLE `upload_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vgm_details`
--
ALTER TABLE `vgm_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `commercial_invoice_details`
--
ALTER TABLE `commercial_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `container_products`
--
ALTER TABLE `container_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `container_types`
--
ALTER TABLE `container_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contract_products`
--
ALTER TABLE `contract_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_terms`
--
ALTER TABLE `delivery_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `discharge_ports`
--
ALTER TABLE `discharge_ports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `document_status`
--
ALTER TABLE `document_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dollor_exchanges`
--
ALTER TABLE `dollor_exchanges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `final_destination`
--
ALTER TABLE `final_destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `forwarders`
--
ALTER TABLE `forwarders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loding_port_details`
--
ALTER TABLE `loding_port_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stocks_products`
--
ALTER TABLE `stocks_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surveyors`
--
ALTER TABLE `surveyors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `upload_documents`
--
ALTER TABLE `upload_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vgm_details`
--
ALTER TABLE `vgm_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
