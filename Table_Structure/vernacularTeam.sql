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

-- Dumping structure for table educatio_mshindi.vernacularTeam
CREATE TABLE IF NOT EXISTS `vernacularTeam` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) DEFAULT '0',
  `userName` varchar(100) DEFAULT '0',
  `post` enum('PM','AM','LIC','DC') DEFAULT NULL,
  `email` varchar(100) DEFAULT '0',
  `contactNo` varchar(100) DEFAULT '0',
  `reportingID` varchar(100) DEFAULT '0',
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table educatio_mshindi.vernacularTeam: ~2 rows (approximately)
/*!40000 ALTER TABLE `vernacularTeam` DISABLE KEYS */;
INSERT INTO `vernacularTeam` (`memberID`, `fullName`, `userName`, `post`, `email`, `contactNo`, `reportingID`) VALUES
	(1, 'Pragnesh Bhavsar', 'Pragnesh', 'PM', 'pragnesh.b@gmail.com', '9696969696', '1'),
	(2, 'Janvi Soni', 'Janvi', 'DC', 'janvi.s@gmail.com', '8787878787', '2');
/*!40000 ALTER TABLE `vernacularTeam` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
