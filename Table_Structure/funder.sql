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

-- Dumping structure for table educatio_mshindi.funder
CREATE TABLE IF NOT EXISTS `funder` (
  `funderID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `funderName` varchar(100) NOT NULL,
  `imageName` varchar(100) DEFAULT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `createdBy` varchar(30) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(30) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`funderID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table educatio_mshindi.funder: ~5 rows (approximately)
/*!40000 ALTER TABLE `funder` DISABLE KEYS */;
INSERT INTO `funder` (`funderID`, `funderName`, `imageName`, `active`, `createdBy`, `createdDate`, `lastModifiedBy`, `lastModifiedDate`) VALUES
	(1, 'GIF', NULL, b'1', 'system', '2019-04-09 00:00:00', NULL, NULL),
	(2, 'P&G', NULL, b'1', 'system', '2019-04-09 00:00:00', NULL, NULL),
	(3, 'HZL', NULL, b'1', 'system', '2019-04-09 00:00:00', NULL, NULL),
	(4, 'Test', NULL, b'0', NULL, NULL, NULL, NULL),
	(5, 'Test2', NULL, b'1', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `funder` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
