SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `ReferencesCollector` (
  `referenceName` varchar(100) NOT NULL,
  `requestedTimes` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `ReferencesCollector` (`referenceName`, `requestedTimes`) VALUES
('unknowendev', 100);
COMMIT;
