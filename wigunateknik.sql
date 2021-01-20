-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2020 at 06:34 AM
-- Server version: 5.7.31-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wigunateknik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `hargabeli` int(11) NOT NULL,
  `hargajual` decimal(10,0) NOT NULL,
  `kategori` int(11) NOT NULL,
  `stokbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`idbarang`, `namabarang`, `hargabeli`, `hargajual`, `kategori`, `stokbarang`) VALUES
(482, 'CPT', 50000, '25000', 1, 45),
(501, 'Bosse ', 33000, '38000', 1, 30080),
(505, 'Ellysion [Kramik]', 50, '75000', 1, 138),
(508, 'RI-511C', 180000, '215000', 107, 220),
(509, 'RI-511E', 205000, '240000', 107, 6),
(580, 'Shimizu PS130 Bit', 540000, '620000', 108, 15),
(581, 'Shimizu PS116 Bit', 346000, '400000', 108, 0),
(582, 'Shimizu PS128 Bit', 391000, '440000', 108, 16),
(583, 'Shimizu PS135 E', 472000, '550000', 108, 5),
(587, 'Bitec Volcano', 26, '30000', 1, 292),
(590, 'GAT', 31000, '35000', 1, 310),
(592, 'Piting Gantung Broco', 3700, '6000', 110, 113),
(593, 'GT', 36500, '40000', 1, 979),
(595, 'DCA AMP02-6', 340000, '400000', 121, 0),
(596, 'DCA AMP03-6', 382000, '480000', 121, 0),
(597, 'BITEC RPM 3702 Biru', 404000, '500000', 121, 0),
(598, 'BITEC RPM 3701 Merah', 280000, '350000', 121, 0),
(599, 'MAKTEC MT370', 560000, '720000', 121, 0),
(600, 'BOSCH GST700', 820000, '975000', 116, 1),
(601, 'BENZ 400W', 235000, '400000', 116, 0),
(602, 'KODENKI', 210000, '250000', 116, 0),
(603, 'STANLEY SJ45', 610000, '700000', 116, 0),
(604, 'STANLEY SJ60', 710000, '800000', 116, 0),
(605, 'STHIL FR 3001', 1675000, '2000000', 117, 0),
(606, 'MULTI PRO BC-328', 1100000, '1450000', 117, 0),
(607, 'TRITON TN-328A', 850000, '1200000', 117, 0),
(608, 'BOSCH GHO 6500', 1170000, '1325000', 120, 0),
(609, 'DCA AMB82', 425000, '600000', 120, 0),
(610, 'SUKAKU K1900N', 325000, '425000', 120, 0),
(611, 'RYU RPL 82-3A', 480000, '500000', 120, 0),
(612, 'BOSCH GKS 7000', 1535000, '1700000', 123, 0),
(613, 'DCA AMY 185', 775000, '900000', 123, 0),
(614, 'STANLY', 950000, '1250000', 123, 0),
(615, 'MODERN', 510000, '600000', 123, 0),
(616, 'RYU RCS 185', 480000, '575000', 123, 0),
(617, 'BITEC CM 508', 400000, '600000', 123, 0),
(618, 'BLACK DECKER', 764000, '1000000', 123, 0),
(619, 'Meja Pres Kecil', 1875000, '2000000', 126, 10),
(620, 'Meja Pres Besar', 0, '2500000', 126, 0),
(621, 'Centong Bulat 5 IGM', 13000, '15000', 127, 130),
(622, 'Lem Dextone G', 5250, '7000', 127, 87),
(623, 'Angker DCA GWS 6-100', 65000, '80000', 128, 210),
(628, 'Dinamax Merah', 90000, '140000', 1, 54),
(629, 'Bosch GSB 550', 490000, '600000', 118, 9),
(630, 'Bosch GBM 350', 415000, '500000', 118, 9),
(631, 'RD-460 (2mm)', 62500, '65000', 129, 182),
(632, 'NK-68 (2.6mm)', 107000, '130000', 129, 23),
(634, 'UCP 208-24', 95000, '125000', 130, 0),
(635, 'Sprayer Ayumi', 395000, '600000', 131, 2),
(636, 'Kompresor Lakoni 0.75', 950000, '1200000', 132, 0),
(637, 'RI-511A', 211200, '250000', 107, 17),
(638, 'RI-522C', 295500, '335000', 107, 9),
(639, 'RI-522E', 400000, '370000', 107, 40),
(640, 'RI-522A', 350000, '400000', 107, 0),
(641, 'RI-602E', 350000, '400000', 107, 4),
(642, 'RI-602AG', 380000, '435000', 107, 3),
(643, 'RI-602BGX', 420000, '480000', 107, 2),
(644, 'RI-712A', 450000, '550000', 107, 1),
(645, 'RI-712T', 505000, '600000', 107, 0),
(646, 'RI-712BGX', 490000, '600000', 107, 1),
(647, 'RI-300HP', 615000, '700000', 107, 1),
(648, 'MH-388', 400000, '500000', 107, 1),
(649, 'MH-101C', 135000, '165000', 107, 13),
(650, 'Kull BULL 6 100', 5500, '10000', 145, 628),
(651, 'Angker BULL GWS 6-100', 90000, '125000', 128, 19),
(652, 'Selang Paket Miyako RMS-206 M', 68000, '90000', 107, 19),
(653, 'Selang Paket Caisar', 50000, '75000', 107, 20),
(654, 'Panasonic GP-129JPX', 433650, '500000', 108, 20),
(655, 'Panasonic GA-130JAK', 596948, '650000', 108, 10),
(656, 'Panasonic GA-125FAK', 630766, '690000', 108, 3),
(657, 'Kull Kuning 6 100', 3300, '6000', 145, 2095),
(658, 'Maestro CS6500L', 1490000, '1850000', 109, 38),
(684, 'Saklar 6-100 Caliber', 9000, '25000', 124, 0),
(685, 'Otomatis Radar 99 OR', 52000, '85000', 108, 0),
(686, 'Otomatis JP PM-5', 50000, '80000', 108, 0),
(687, 'Otomatis Wipro 8KD', 80000, '100000', 108, 0),
(688, 'Handle Switch 6-100', 3000, '10000', 124, 0),
(689, 'Kapasitor Comp 27,505', 35000, '50000', 134, 0),
(690, 'Rantai 070 Stihl Besar', 240000, '265000', 109, 49),
(691, 'Rantai 22 Stihl', 165000, '200000', 109, 45),
(692, 'Rantai 25 Stihl', 187500, '220000', 109, 11),
(693, 'Rantai MS 180 Stihl', 145000, '185000', 109, 10),
(694, 'Sproket 070 Stihl', 115000, '145000', 109, 0),
(695, 'Kikir 5.5 ', 14583, '17000', 109, 150),
(696, 'Kikir 4.8', 13750, '17000', 109, 161),
(699, 'Atman AT 102', 105000, '130000', 108, 10),
(700, 'Miyako KG-502 55', 275000, '335000', 107, 1),
(701, 'Shimizu PS125  Bit', 370000, '420000', 108, 1),
(702, 'Dispenser Miyako WD-189H', 160000, '195000', 135, 4),
(703, 'Shimizu PS121 Bit', 377000, '430000', 108, 1),
(704, 'Atman AT 103', 170000, '180000', 108, 0),
(705, 'Sprayer Wipro MSE-15', 650000, '900000', 131, 0),
(706, 'Sprayer Bamboo B-E16', 0, '800000', 131, 39),
(707, 'Sprayer SOLO 425 Manual', 395000, '465000', 131, 0),
(708, 'Atman AT 104 ', 220000, '230000', 108, 2),
(709, 'Laher 607 ASB', 4000, '8000', 130, 19),
(710, 'Laher 607 LFB', 15000, '15000', 130, 100),
(711, 'Laher 608 LFB', 15000, '15000', 130, 96),
(712, 'Karet Laher Bawah', 3000, '10000', 124, 99),
(713, 'Karet Laher Atas', 3000, '10000', 124, 98),
(714, 'Isi Skre Tembak', 14000, '20000', 136, 48),
(715, 'Silikon Motor', 11000, '15000', 137, 14),
(716, 'Kater / Cutter ', 10000, '15000', 127, 0),
(717, 'Isi Cutter', 4000, '10000', 127, 38),
(719, 'Kapasitor 100uF', 48000, '75000', 134, 0),
(720, 'Kull Master 51A', 3000, '10000', 145, 83),
(721, 'Timbangan Hiosi 20Kg', 170000, '220000', 138, 27),
(722, 'Timbangan Hiosi 10Kg', 170000, '220000', 138, 28),
(723, 'Timbangan Tora 5Kg', 160000, '220000', 138, 0),
(724, 'Mata Bor 3.5mm ', 2000, '5000', 139, 21),
(725, 'DMX 3 inc', 23000, '35000', 140, 97),
(726, 'DMX 4 inc', 27000, '40000', 140, 100),
(727, 'Tora cembung 3 inc', 21000, '30000', 140, 100),
(728, 'CPT 3 inc', 35000, '40000', 140, 100),
(729, 'Ellysion 3 Inch Biru', 40000, '45000', 140, 0),
(730, 'Spray Gun Nichie F-25G', 110000, '150000', 141, 18),
(731, 'Obeng BolakBalik Chome', 8000, '20000', 142, 191),
(732, 'Obeng Amerika', 7000, '15000', 142, 30),
(733, 'Socket Driling 8mm Tora', 4000, '8000', 139, 18),
(734, 'Obeng CPT', 11000, '20000', 142, 65),
(735, 'Obeng Getok Camel', 21000, '35000', 142, 2),
(736, 'Senter Kepala Matsugi', 42500, '70000', 143, 11),
(737, 'Philips Essential 5 WATT', 24140, '28000', 110, 9),
(738, 'Philips Essential 8 WATT', 26520, '30500', 110, 12),
(739, 'Philips Essential 11 WATT', 29240, '33500', 110, 0),
(740, 'Philips Essential 14 WATT', 31620, '36000', 110, 0),
(741, 'Philips Essential 18 WATT', 32980, '38000', 110, 12),
(742, 'Philips Essential 23 WATT', 39440, '45500', 110, 13),
(743, 'Philips LED My Care 3 WATT', 19080, '22000', 110, 4),
(744, 'Philips LED My Care 4 WATT', 25560, '29500', 110, 5),
(745, 'Philips LED My Care 6 WATT', 29880, '35000', 110, 7),
(746, 'Philips LED My Care 8 WATT', 34200, '39500', 110, 7),
(747, 'Philips LED My Care 10 WATT', 37800, '43500', 110, 0),
(748, 'Philips LED My Care 12 WATT', 46440, '53500', 110, 1),
(749, 'Philips LED My Care 14 WATT', 50400, '60000', 110, 0),
(750, 'Philips LED My Care 19 WATT', 69840, '80000', 110, 0),
(751, 'Philips LED Essential 3 WATT', 14040, '17000', 110, 31),
(752, 'Philips LED Essential 5 WATT', 17280, '20000', 110, 0),
(753, 'Philips LED Essential 7 WATT', 20520, '24000', 110, 5),
(754, 'Philips LED Essential 9 WATT', 24120, '28000', 110, 6),
(755, 'Philips LED Essential 11 WATT', 31680, '36500', 110, 4),
(756, 'Philips LED Essential 13 WATT', 37080, '43000', 110, 0),
(757, 'Philips HELIX 35 WATT', 47600, '55000', 110, 10),
(758, 'Philips HELIX 45 WATT', 51000, '60000', 110, 0),
(759, 'Philips HELIX 55 WATT', 58480, '70000', 110, 11),
(760, 'Philips Tornado 15 WATT', 39440, '45500', 110, 12),
(761, 'Philips Tornado 20 WATT', 41480, '48000', 110, 8),
(762, 'Philips Tornado 24 WATT', 45220, '53000', 110, 10),
(763, 'Grinda DCA 03 Samping', 280000, '320000', 124, 72),
(764, 'Grinda DCA 02 Belakang', 260000, '315000', 124, 24),
(765, 'Meteran Hiosi 3M', 7000, '15000', 127, 44),
(766, 'Meteran Onda 3M', 27500, '25000', 144, 49),
(767, 'Meteran Onda 5M', 34, '35000', 127, 42),
(768, 'Tespen Visalux', 6250, '10000', 142, 19),
(769, 'Tespen Sivitech', 6500, '10000', 142, 12),
(770, 'Tespen Guanzhu', 6000, '10000', 142, 11),
(771, 'Tespen Camel', 6700, '10000', 142, 20),
(772, 'Grinda Bosch 060', 350000, '380000', 124, 383),
(773, 'Grinda Wipro W3435B', 280000, '320000', 124, 1),
(774, 'Grinda Wipro W3439', 280000, '320000', 124, 5),
(775, 'Grinda Inotec IT 91', 245000, '290000', 124, 7),
(776, 'Grinda Bitec GM9552 R-J', 240000, '265000', 124, 4),
(777, 'Grinda Doliz Samping', 275000, '320000', 124, 15),
(778, 'Grinda Doliz Belakang', 240000, '300000', 124, 2),
(779, 'Grinda Caliber CAL6-100', 200000, '230000', 124, 6),
(780, 'B 30', 18000, '24000', 133, 3),
(781, 'B 31', 18600, '24800', 133, 0),
(782, 'B 32', 19200, '25600', 133, 2),
(783, 'B 33', 19800, '26400', 133, 0),
(784, 'B 34', 20400, '27200', 133, 1),
(785, 'B 35', 21000, '28000', 133, 5),
(786, 'B 36', 21600, '28800', 133, 0),
(787, 'B 37', 22200, '29600', 133, 0),
(788, 'B 38', 22800, '30400', 133, 0),
(789, 'B 39', 23400, '31200', 133, 8),
(790, 'B 40', 24000, '32000', 133, 8),
(791, 'B 41', 24600, '32800', 133, 2),
(792, 'B 42', 25200, '33600', 133, 8),
(793, 'B 43', 25800, '34400', 133, 4),
(794, 'B 44', 26400, '35200', 133, 17),
(795, 'B 45', 27000, '36000', 133, 1),
(796, 'B 46', 27600, '36800', 133, 20),
(797, 'B 47', 28200, '37600', 133, 10),
(798, 'B 48', 28800, '38400', 133, 0),
(799, 'B 49', 29400, '39200', 133, 0),
(800, 'B 50', 30000, '40000', 133, 0),
(801, 'B 51', 30600, '40800', 133, 0),
(802, 'B 52', 31200, '41600', 133, 0),
(803, 'B 53', 31800, '42400', 133, 0),
(804, 'B 54', 32400, '43200', 133, 0),
(805, 'B 55', 33000, '44000', 133, 2),
(806, 'B 56', 33600, '44800', 133, 12),
(807, 'B 57', 34200, '45600', 133, 34),
(808, 'B 58', 34800, '46400', 133, 11),
(809, 'B 59', 35400, '47200', 133, 12),
(810, 'B 60', 36000, '48000', 133, 16),
(811, 'B 61', 36600, '48800', 133, 16),
(812, 'B 62', 37200, '49600', 133, 2),
(813, 'B 63', 37800, '50400', 133, 12),
(814, 'B 64', 38400, '51200', 133, 4),
(815, 'B 65', 39000, '52000', 133, 10),
(816, 'B 66', 39600, '52800', 133, 11),
(817, 'B 67', 40200, '53600', 133, 4),
(818, 'B 68', 40800, '54400', 133, 7),
(819, 'B 69', 41400, '55200', 133, 8),
(820, 'B 70', 42000, '56000', 133, 13),
(821, 'B 71', 42600, '56800', 133, 10),
(822, 'B 72', 43200, '57600', 133, 22),
(823, 'B 73', 43800, '58400', 133, 22),
(824, 'B 74', 44400, '59200', 133, 23),
(825, 'B 75', 45000, '60000', 133, 7),
(826, 'B 76', 45600, '60800', 133, 21),
(827, 'B 77', 46200, '61600', 133, 16),
(828, 'B 78', 46800, '62400', 133, 9),
(829, 'B 79', 47400, '63200', 133, 11),
(830, 'B 80', 48000, '64000', 133, 11),
(831, 'B 81', 48600, '64800', 133, 10),
(832, 'B 82', 49200, '65600', 133, 1),
(833, 'B 83', 49800, '66400', 133, 6),
(834, 'B 84', 50400, '67200', 133, 4),
(835, 'B 85', 51000, '68000', 133, 16),
(836, 'B 86', 51600, '68800', 133, 7),
(837, 'B 87', 52200, '69600', 133, 13),
(838, 'B 88', 52800, '70400', 133, 0),
(839, 'B 89', 53400, '71200', 133, 1),
(840, 'B 90', 54000, '72000', 133, 11),
(841, 'B 91', 54600, '72800', 133, 0),
(842, 'B 92', 55200, '73600', 133, 1),
(843, 'B 93', 55800, '74400', 133, 1),
(844, 'B 94', 56400, '75200', 133, 1),
(845, 'B 95', 57000, '76000', 133, 1),
(846, 'B 96', 57600, '76800', 133, 1),
(847, 'B 97', 58200, '77600', 133, 0),
(848, 'B 98', 58800, '78400', 133, 1),
(849, 'B 99', 59400, '79200', 133, 0),
(850, 'B 100', 60000, '80000', 133, 0),
(851, 'Kull Makita 303', 14000, '25000', 145, 99),
(852, 'Amplas Bulat', 500, '1000', 146, 5000),
(853, 'Oli Castrol', 34000, '36000', 147, 29),
(854, 'Mata Bor 2,5mm', 1500, '4000', 139, 30),
(855, 'Mata Bor 2mm', 1500, '4000', 139, 30),
(856, 'Mata Bor 3mm', 1500, '15000', 139, 20),
(857, 'Mata Bor 5mm', 3000, '10000', 139, 4),
(858, 'RB-26 (2mm)', 60000, '65000', 129, 18),
(859, 'BWS', 1800, '4000', 1, 1987),
(860, 'Meteran Magnum 5M', 20000, '22000', 144, 11),
(861, 'Tali Stater GX', 6250, '15000', 148, 86),
(862, 'Mur Atas', 3000, '5000', 149, 541),
(863, 'Mur Bawah', 3000, '5000', 149, 48),
(864, 'Isolasi Kertas', 4000, '8000', 150, 200),
(865, 'Isolasi 3M', 6750, '10000', 150, 40),
(866, 'Isolasi NASIONAL', 4000, '8000', 150, 5),
(867, 'Meteran Kain 30M', 46000, '65000', 144, 0),
(868, 'Meteran Kain HI 50M', 55000, '95000', 144, 2),
(869, 'Siku Besar', 14600, '20000', 127, 71),
(870, 'Siku Kecil', 11000, '13000', 127, 237),
(871, 'Centong Bulat 5 BELCO', 15000, '17000', 127, 6),
(872, 'Meteran Kain 30M INC-CO', 75000, '100000', 144, 2),
(873, 'Angker DCA N9500N', 70000, '95000', 128, 11),
(874, 'Kull Master 411A', 4500, '10000', 145, 99),
(875, 'Handel Luar Grinda', 3000, '10000', 149, 198),
(876, 'Baut 1/2 x 3', 2200, '4000', 152, 440),
(878, 'Gemuk Cobra Pail', 395000, '430000', 153, 34),
(879, 'Gemuk Kyodoyosi Pail', 1000000, '1100000', 153, 39),
(880, 'Kumpon Motor', 6000, '10000', 137, 16),
(881, 'Benang Sepat', 2500, '3000', 154, 100),
(882, 'Tutup Debu ', 12000, '15000', 149, 98),
(883, 'Tatakan Laher Grinda', 15000, '20000', 149, 24),
(884, 'Gres Gun Tekiro', 135000, '165000', 153, 8),
(885, 'Gres Gun Haston', 115000, '165000', 153, 1),
(886, 'Busi NGK BPM6A / Potong Rumput', 12000, '20000', 155, 36),
(887, 'Busi Bosch WS7F', 16000, '25000', 155, 37),
(888, 'Kull DCA 6-100', 0, '15000', 145, 200),
(889, 'Bitec 7 Standar', 72500, '115000', 156, 99),
(890, 'Busi NGK BP5ES', 10500, '20000', 155, 13),
(891, 'Busi NGK C7HSA - SUPRA', 10500, '20000', 155, 3),
(892, 'Busi NGK BP7ES', 10500, '20000', 155, 4),
(893, 'Busi NGK BP7HS', 10500, '20000', 155, 8),
(894, 'Resibon Asab ', 10500, '15000', 1, 25),
(895, 'Kinik Asab', 6750, '9000', 1, 608),
(896, 'Ultraflex asab', 8000, '12000', 1, 0),
(897, 'Kinik keramik', 10500, '15000', 1, 200),
(898, 'Amplas tumpuk benz', 4500, '8000', 1, 64),
(899, 'Dobel Tape Hitam', 5000, '15000', 150, 0),
(900, 'Dobel Tape 3M Putih', 15000, '25000', 150, 0),
(901, 'Mesran Super', 31240, '34000', 147, 49),
(902, 'Mesran B 4 Liter', 113960, '125000', 147, 0),
(903, 'Mesran B 5 Liter', 138600, '0', 147, 0),
(904, 'Laher 608 ASB', 3500, '8000', 130, 99),
(905, 'Handel Pioline Kecil ', 30500, '40000', 110, 0),
(906, 'Handel Pionline Besar ', 48000, '65000', 110, 0),
(907, 'Laher 6201 KOYO', 21000, '30000', 130, 39),
(908, 'Laher 6201 ASB', 4000, '15000', 130, 50),
(909, 'RB-26 (2.6mm)', 140000, '160000', 129, 20),
(910, 'RB-26 (3.2mm)', 130000, '160000', 129, 0),
(967, 'A 30', 15000, '21000', 133, 0),
(968, 'A 31', 15500, '21700', 133, 0),
(969, 'A 32', 16000, '22400', 133, 2),
(970, 'A 33', 16500, '23100', 133, 0),
(971, 'A 34', 17000, '23800', 133, 2),
(972, 'A 35', 17500, '24500', 133, 5),
(973, 'A 36', 18000, '25200', 133, 3),
(974, 'A 37', 18500, '25900', 133, 3),
(975, 'A 38', 19000, '26600', 133, 5),
(976, 'A 39', 19500, '27300', 133, 0),
(977, 'A 40', 20000, '28000', 133, 10),
(978, 'A 41', 20500, '28700', 133, 15),
(979, 'A 42', 21000, '29400', 133, 14),
(980, 'A 43', 21500, '30100', 133, 6),
(981, 'A 44', 22000, '30800', 133, 0),
(982, 'A 45', 22500, '31500', 133, 2),
(983, 'A 46', 23000, '32200', 133, 1),
(984, 'A 47', 23500, '32900', 133, 1),
(985, 'A 48', 24000, '33600', 133, 16),
(986, 'A 49', 24500, '34300', 133, 0),
(987, 'A 50', 25000, '35000', 133, 6),
(988, 'A 51', 25500, '35700', 133, 10),
(989, 'A 52', 26000, '36400', 133, 5),
(990, 'A 53', 26500, '37100', 133, 13),
(991, 'A 54', 27000, '37800', 133, 10),
(992, 'A 55', 27500, '38500', 133, 1),
(993, 'A 56', 28000, '39200', 133, 1),
(994, 'A 57', 28500, '39900', 133, 5),
(995, 'A 58', 29000, '40600', 133, 4),
(996, 'A 59', 29500, '41300', 133, 3),
(997, 'A 60', 30000, '42000', 133, 1),
(998, 'A 61', 30500, '42700', 133, 1),
(999, 'A 62', 31000, '43400', 133, 0),
(1000, 'A 63', 31500, '44100', 133, 0),
(1001, 'A 64', 32000, '44800', 133, 0),
(1002, 'A 65', 32500, '45500', 133, 0),
(1003, 'A 66', 33000, '46200', 133, 0),
(1004, 'A 67', 33500, '46900', 133, 3),
(1005, 'A 68', 34000, '47600', 133, 0),
(1006, 'A 69', 34500, '48300', 133, 0),
(1007, 'A 70', 35000, '49000', 133, 2),
(1008, 'A 71', 35500, '49700', 133, 1),
(1009, 'A 72', 36000, '50400', 133, 5),
(1010, 'A 73', 36500, '51100', 133, 0),
(1011, 'A 74', 37000, '51800', 133, 3),
(1012, 'A 75', 37500, '52500', 133, 0),
(1013, 'A 76', 38000, '53200', 133, 0),
(1014, 'A 77', 38500, '53900', 133, 0),
(1015, 'A 78', 39000, '54600', 133, 0),
(1016, 'A 79', 39500, '55300', 133, 0),
(1017, 'A 80', 40000, '56000', 133, 0),
(1018, 'A 81', 40500, '56700', 133, 0),
(1019, 'A 82', 41000, '57400', 133, 0),
(1020, 'A 83', 41500, '58100', 133, 12),
(1021, 'A 84', 42000, '58800', 133, 3),
(1022, 'A 85', 42500, '59500', 133, 1),
(1023, 'Air Accu YUASA ZUUR', 8976, '15000', 105, 260),
(1024, 'NS 60 YUASA', 622792, '750000', 105, 10),
(1025, 'N 70Z YUASA', 992419, '1200000', 105, 2),
(1026, 'N 120 YUASA', 1593355, '1850000', 105, 2),
(1027, 'Selang Paket Win Gas ', 75000, '100000', 107, 10),
(1038, 'Atman AT 101', 64000, '95000', 108, 10),
(1039, 'Sakai Pro WP-1200P', 32000, '65000', 108, 9),
(1040, 'Yukari SP-1200', 31000, '65000', 108, 10),
(1047, 'RI-288', 240000, '100000', 105, 0),
(1058, 'Tali Stater Sensor Kecil', 5000, '10000', 148, 100),
(1059, 'Kunci T8', 28000, '35000', 1, 30),
(1060, 'Kunci T9', 28000, '35000', 1, 8),
(1061, 'Kunci T10', 22000, '35000', 1, 10),
(1062, 'Saringan FFC 15 Sidi Tepung', 6000, '10000', 1, 50),
(1063, 'Kikir Bahco', 31000, '35000', 1, 50),
(1064, 'AJP SILVER 42', 2900000, '3300000', 159, 50),
(1066, 'Quantum QRL 032', 85000, '115000', 157, 12),
(1067, 'AJP HITAM 42', 2600000, '3000000', 159, 70),
(1068, 'AJP 8 inc Merah', 235000, '275000', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE `tbcustomer` (
  `idcustomer` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`idcustomer`, `nama`, `alamat`, `hp`) VALUES
(1, 'Pak Adi', 'Selat Karangasem', '0894584354'),
(3, 'komang dangin', 'pesangkan', '085355258321'),
(4, 'Pak Tabag', 'Duda', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetailtransaksi`
--

CREATE TABLE `tbdetailtransaksi` (
  `iddetailtransksi` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `hargabeli` int(11) DEFAULT NULL,
  `jumlahbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetailtransaksi`
--

INSERT INTO `tbdetailtransaksi` (`iddetailtransksi`, `idtransaksi`, `idbarang`, `hargabeli`, `jumlahbarang`) VALUES
(540, 'TR001', 482, 40000, 50),
(541, 'TR002', 482, 50000, 10),
(542, 'TR003', 766, 27500, 40),
(543, 'TR003', 767, 34250, 31),
(544, 'TR004', 1067, 2600000, 35),
(545, 'TR004', 1064, 2900000, 20),
(551, 'TR004', 894, 20000, 14),
(552, 'TR004', 587, 26, 50),
(553, 'TR004', 587, 26, 8),
(554, 'TR004', 587, 26000, 10),
(558, 'TR004', 505, 50000, 18),
(559, 'TR004', 590, 31, 49),
(560, 'TR004', 590, 31000, 10),
(561, 'TR005', 862, 3000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`idkategori`, `namakategori`) VALUES
(1, 'PISAU 4 INCH'),
(105, 'ACCU'),
(107, 'KOMPOR'),
(108, 'Pompa'),
(109, 'Sensor'),
(110, 'ALAT LISTRIK'),
(116, 'JIG SAW'),
(117, 'Potong Rumput'),
(118, 'BOR'),
(119, 'CUT OFF'),
(120, 'Planer / Srut'),
(121, 'Profil'),
(123, 'CIRKULAR SAW'),
(124, 'GRINDA'),
(126, 'Mesin'),
(127, 'ALAT TUKANG'),
(128, 'ANGKER'),
(129, 'KAWAT LAS'),
(130, 'LAHER'),
(131, 'Sprayer'),
(132, 'KOMPRESOR'),
(133, 'Vanbelt'),
(134, 'KAPASITOR'),
(135, 'DISPENSER'),
(136, 'Skre Tembak'),
(137, 'ALAT MOTOR'),
(138, 'Timbangan'),
(139, 'MATA BOR'),
(140, 'Pisau Mangkok'),
(141, 'Spait Cat'),
(142, 'Obeng'),
(143, 'Senter'),
(144, 'METERAN'),
(145, 'Skull'),
(146, 'AMPLAS'),
(147, 'OLI'),
(148, 'Tali'),
(149, 'ALAT GRINDA'),
(150, 'ISOLASI'),
(152, 'BAUT'),
(153, 'GEMUK'),
(154, 'BENANG'),
(155, 'BUSI'),
(156, 'Pisau 7 inch'),
(157, 'REGULATOR'),
(159, 'PISAU 24 INCH'),
(160, 'asdjkasjdas');

-- --------------------------------------------------------

--
-- Table structure for table `tbnota`
--

CREATE TABLE `tbnota` (
  `idnota` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpembayaran`
--

CREATE TABLE `tbpembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlahbayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsuplier`
--

CREATE TABLE `tbsuplier` (
  `idsuplier` int(11) NOT NULL,
  `namasuplier` varchar(50) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `hp1` varchar(15) DEFAULT NULL,
  `hp2` varchar(15) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `norekening` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsuplier`
--

INSERT INTO `tbsuplier` (`idsuplier`, `namasuplier`, `alamat`, `hp1`, `hp2`, `bank`, `norekening`) VALUES
(3, 'Omega Teknik', 'Denpasar', '8', '', '', ''),
(5, 'Yuasa', 'Jl. Sekar Jepun No.2 Kesiman Kerta Langu Denpasar', '03614713484', '0', '-', '0'),
(8, 'Pak Cosmoss', 'Denpasar', '08563880878', '', 'BRI', '834887584'),
(9, 'AJP', 'Jakarta', '08174795079', '0', 'BRI', '66222'),
(10, 'Pak Sujana', 'Denpasar', '087761872588', '', '', ''),
(11, 'Karya Bangun Sentosa', 'Denpasar', '085100501334', '0', '', ''),
(12, 'Ponti Dewata Teknik', 'Jl.Cargo Permai No.7, Denpasar Bali', '081338139953', '', '', ''),
(13, 'Multi Jaya (Agus)', 'Jl.Raya Besakih, Br. Bukian, Desa Nongan, Karangasem', '082145555088', '', '', ''),
(14, 'Yanmar Bali', 'Denpasar', '', '', '', ''),
(15, 'CHS', 'Surabaya', '', '', '', ''),
(16, 'Hans Teknik', 'Jl. Nangka Utara, G. Murai', '', '', '', ''),
(17, 'Mulia Teknik', 'Gianyar', '', '', '', ''),
(18, 'Panji Teknik', 'Jl. A.Yani Barat 188 B', '03623435274', '', '', ''),
(19, 'Putra Teknik', 'Denpasar', '082144202861', '', '', ''),
(20, 'CV.Difan Raya Sejahtera (Diton)', 'Jl.Kusuma Dewa I No.18 Denpasar Bali', '085100451072', '0361423358', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tipetransaksi` char(6) NOT NULL,
  `status` char(1) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `diskon1` int(3) DEFAULT NULL,
  `diskon2` int(3) DEFAULT NULL,
  `diskon3` int(3) DEFAULT NULL,
  `ppn` int(3) DEFAULT NULL,
  `idcustomer` int(11) DEFAULT NULL,
  `idsuplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `tanggal`, `tipetransaksi`, `status`, `gambar`, `diskon1`, `diskon2`, `diskon3`, `ppn`, `idcustomer`, `idsuplier`) VALUES
('TR001', '2020-09-26', 'In', '0', NULL, 0, 0, 0, 0, NULL, 3),
('TR002', '2020-09-26', 'In', '0', NULL, 0, 0, 0, 0, NULL, 3),
('TR003', '2020-09-26', 'In', '0', NULL, 25, 0, 0, 0, NULL, 11),
('TR004', '2020-09-28', 'In', '0', NULL, 0, 0, 0, 0, NULL, 9),
('TR005', '2020-10-21', 'In', '0', NULL, 0, 0, 0, 0, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `tbdetailtransaksi`
--
ALTER TABLE `tbdetailtransaksi`
  ADD PRIMARY KEY (`iddetailtransksi`),
  ADD KEY `idtransaksi` (`idtransaksi`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `tbnota`
--
ALTER TABLE `tbnota`
  ADD PRIMARY KEY (`idnota`),
  ADD KEY `iddetailtransaksi` (`idtransaksi`);

--
-- Indexes for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idtransaksi` (`idtransaksi`);

--
-- Indexes for table `tbsuplier`
--
ALTER TABLE `tbsuplier`
  ADD PRIMARY KEY (`idsuplier`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idcustomer` (`idcustomer`),
  ADD KEY `idsuplier` (`idsuplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbbarang`
--
ALTER TABLE `tbbarang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1069;
--
-- AUTO_INCREMENT for table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbdetailtransaksi`
--
ALTER TABLE `tbdetailtransaksi`
  MODIFY `iddetailtransksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `tbnota`
--
ALTER TABLE `tbnota`
  MODIFY `idnota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbsuplier`
--
ALTER TABLE `tbsuplier`
  MODIFY `idsuplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD CONSTRAINT `tbbarang_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tbkategori` (`idkategori`);

--
-- Constraints for table `tbdetailtransaksi`
--
ALTER TABLE `tbdetailtransaksi`
  ADD CONSTRAINT `tbdetailtransaksi_ibfk_2` FOREIGN KEY (`idbarang`) REFERENCES `tbbarang` (`idbarang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbdetailtransaksi_ibfk_3` FOREIGN KEY (`idtransaksi`) REFERENCES `tbtransaksi` (`idtransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD CONSTRAINT `tbpembayaran_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `tbtransaksi` (`idtransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD CONSTRAINT `tbtransaksi_ibfk_1` FOREIGN KEY (`idcustomer`) REFERENCES `tbcustomer` (`idcustomer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbtransaksi_ibfk_2` FOREIGN KEY (`idsuplier`) REFERENCES `tbsuplier` (`idsuplier`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
