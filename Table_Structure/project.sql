-- --------------------------------------------------------
-- Host:                         192.168.0.7
-- Server version:               5.5.38-log - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table educatio_mshindi.project
CREATE TABLE IF NOT EXISTS `project` (
  `proID` int(11) NOT NULL AUTO_INCREMENT,
  `proName` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `district` varchar(150) DEFAULT NULL,
  `listSchCode` varchar(50) DEFAULT NULL,
  `proManagerID` varchar(100) DEFAULT NULL,
  `proFunderID` varchar(100) DEFAULT NULL,
  `proStart` datetime DEFAULT NULL,
  `proEnd` datetime DEFAULT NULL,
  PRIMARY KEY (`proID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table educatio_mshindi.project: ~22 rows (approximately)
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`proID`, `proName`, `state`, `district`, `listSchCode`, `proManagerID`, `proFunderID`, `proStart`, `proEnd`) VALUES
	(2, 'MindSpark', 'Gujarat', 'Ahmedabad', '0', 'Zambia', 'Kr   ', '2019-05-31 00:00:00', '2019-05-16 00:00:00'),
	(3, 'asdfghj', 'Andaman and Nicobar Islands', 'kakinada', '24567ijn ', 'Afghanistan', 'sdfghj', '2019-05-25 00:00:00', '2019-05-24 00:00:00'),
	(4, 'MSMaths', 'Goa', 'Delhi', '123,abc', 'Kenya', 'NGO', '2019-12-31 00:00:00', '2020-12-31 00:00:00'),
	(5, 'ptmn', 'Andaman and Nicobar Islands', 'Ahmedabad', 'hbjnm,xsdkk', 'Vatican City', 'fan ', '2019-12-31 00:00:00', '2019-12-31 00:00:00'),
	(6, 'MindSpark', 'Assam', 'kakinada', '123xyz,abc888', 'Zambia', 'Kr ', '2020-01-01 00:00:00', '2022-12-31 00:00:00'),
	(7, 'proname', 'Andaman and Nicobar Islands', 'Ahmedabad', 'asdfghj765', 'Afghanistan', 'dfghjklm  ', '2019-12-31 00:00:00', '2019-12-31 00:00:00'),
	(8, 'Asset', 'Arunachal Pradesh', 'Ahmedabad', 'abc123,987xyz', 'Reunion', 'Government', '2019-05-31 00:00:00', '2019-05-08 00:00:00'),
	(10, 'sdfgh', 'Andaman and Nicobar Islands', 'Ahmedabad', 'hgvjhvj', 'Reunion', 'yfvjhygvj', '2019-01-01 00:00:00', '2019-01-30 00:00:00'),
	(11, 'abc', 'hbjbkjjk', 'jbkjbkbkjbk', 'bjbkjbk,jbkjbkj', '', '', '2018-01-31 00:00:00', '2020-12-01 00:00:00'),
	(12, 'abc', 'hbjbkjjk', 'jbkjbkbkjbk', 'bjbkjbk,jbkjbkj', '', '', '2018-01-31 00:00:00', '2020-12-01 00:00:00'),
	(13, 'asdfghjkl', 'Andhra Pradesh', 'Ahmedabad', 'zxcvbnm,./', 'jhgfghjkl', 'kjhgfdfghjnmk', '2018-12-01 00:00:00', '2018-12-01 00:00:00'),
	(14, 'pro', 'dygvjhbhb', 'pro', 'nkjbkjbjlnl.jnkjnk,njnkn', '', '', '2019-12-31 00:00:00', '2019-12-31 00:00:00'),
	(15, 'DelhiMSMaths', 'Gujrat', 'Ahmedabad', '311402,abcxyz,qwer123', 'Pragnesh', 'NGO', '2019-12-31 00:00:00', '2021-01-01 00:00:00'),
	(16, 'ProN', 'Guj', 'ProN', '123abc,xyz235', 'Pragnesh', 'Government', '2019-12-31 00:00:00', '2019-12-31 00:00:00'),
	(17, 'LA', 'Guj', 'Ahm', 'av12,hj34', '', '', '2019-06-19 00:00:00', '2019-06-18 00:00:00'),
	(18, 'ProTest', 'Guj', 'Ahmed', '123abc,xyz987', 'Kruti', 'Govrn', '2019-05-20 17:03:34', '2019-06-20 17:03:35'),
	(19, 'Torrent', 'Gujarat', 'Ahmedabad', '123abc,xyz789', '1', '1', '2019-12-31 00:00:00', '2018-12-31 00:00:00'),
	(20, 'Pro1', 'Guj', 'Ahm', 'hvhv213,', '1', '2', '2019-06-27 00:00:00', '2019-06-19 00:00:00'),
	(21, 'vujvv', 'vguygbu', 'y', 'ubgjhjb', '', '', '2019-06-27 00:00:00', '2019-06-20 00:00:00'),
	(22, 'DelhiMSMaths', 'Guj', 'Ahm', 'abc123,xyz$1', '1', '3', '2019-12-30 00:00:00', '2022-10-01 00:00:00'),
	(23, 'MumbaiProMSLang', 'Maharashtra', 'Mumbai', '311402,1234', '1', '2', '2019-06-13 00:00:00', '2019-07-05 00:00:00'),
	(24, 'pro1', 'jvjhv', 'hvhjvhv', '311402', '1', '1', '2019-12-31 00:00:00', '2019-12-31 00:00:00');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
