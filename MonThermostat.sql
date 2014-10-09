-- phpMyAdmin SQL Dump

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `MonThermostat`
--

-- --------------------------------------------------------

--
-- Structure de la table `Heater`
--

CREATE TABLE IF NOT EXISTS `Heater` (
  `idHeater` int(11) NOT NULL AUTO_INCREMENT,
  `HeaterName` varchar(45) NOT NULL,
  `HeaterCmdCheck` varchar(150) NOT NULL,
  `HeaterCmdOn` varchar(150) NOT NULL,
  `HeaterCmdOff` varchar(150) NOT NULL,
  `HeaterPower` int(11) NOT NULL DEFAULT '2000',
  `HeaterWarmupCalc` varchar(45) NOT NULL DEFAULT '1',
  `HeaterACMode` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idHeater`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Heater`
--

INSERT INTO `Heater` (`idHeater`, `HeaterName`, `HeaterCmdCheck`, `HeaterCmdOn`, `HeaterCmdOff`, `HeaterPower`, `HeaterWarmupCalc`, `HeaterACMode`) VALUES
(1, 'Heater1', './MTgetrelay.sh http://localhost:40405/stats/01/output/latest', './gcerbset.sh led2_1', './gcerbset.sh led2_0', 1000, 'none', 0),
(2, 'Heater2', './MTgetrelay.sh http://localhost:40405/stats/02/output/latest', './gcerbset.sh led3_1', './gcerbset.sh led3_0', 2000, 'none', 0),
(3, 'Heater3', './MTgetrelay.sh http://localhost:40405/stats/03/output/latest', './gcerbset.sh led4_1', './gcerbset.sh led4_0', 1000, 'none', 0),
(4, 'Heater4', './MTgetrelay.sh http://localhost:40405/stats/04/output/latest', './gcerbset.sh led1_1', './gcerbset.sh led1_0', 1000, 'none', 0),
(5, 'Heater5', './MTgetrelay.sh http://localhost:40405/stats/05/output/latest', './gcerbset.sh led5_1', './gcerbset.sh led5_0', 2000, 'none', 0),
(6, 'Heater6', './MTgetrelay.sh http://localhost:40405/stats/06/output/latest', './gcerbset.sh led6_1', './gcerbset.sh led6_0', 1000, 'none', 0);

-- --------------------------------------------------------

--
-- Structure de la table `OpeningSensor`
--

CREATE TABLE IF NOT EXISTS `OpeningSensor` (
  `idOpeningSensor` int(11) NOT NULL AUTO_INCREMENT,
  `OSid` varchar(150) NOT NULL DEFAULT 'url',
  `OSName` varchar(45) NOT NULL,
  PRIMARY KEY (`idOpeningSensor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `OpeningSensor`
--

INSERT INTO `OpeningSensor` (`idOpeningSensor`, `OSid`, `OSName`) VALUES
(1, 'http://localhost:40405/stats/7/temperature/latest', 'Fenetre-Salon');

-- --------------------------------------------------------

--
-- Structure de la table `SetPointDay`
--

CREATE TABLE IF NOT EXISTS `SetPointDay` (
  `idSetPointDay` int(11) NOT NULL AUTO_INCREMENT,
  `SPDName` varchar(45) NOT NULL,
  `SPDTabTime` varchar(1000) NOT NULL,
  PRIMARY KEY (`idSetPointDay`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `SetPointDay`
--

INSERT INTO `SetPointDay` (`idSetPointDay`, `SPDName`, `SPDTabTime`) VALUES
(0, 'Default', 'a:48:{i:0;s:2:"18";i:1;s:2:"18";i:2;s:2:"18";i:3;s:2:"18";i:4;s:2:"18";i:5;s:2:"18";i:6;s:2:"18";i:7;s:2:"18";i:8;s:2:"18";i:9;s:2:"18";i:10;s:2:"18";i:11;s:2:"18";i:12;s:2:"18";i:13;s:2:"18";i:14;s:2:"18";i:15;s:2:"18";i:16;s:2:"18";i:17;s:2:"18";i:18;s:2:"18";i:19;s:2:"18";i:20;s:2:"18";i:21;s:2:"18";i:22;s:2:"18";i:23;s:2:"18";i:24;s:2:"18";i:25;s:2:"18";i:26;s:2:"18";i:27;s:2:"18";i:28;s:2:"18";i:29;s:2:"18";i:30;s:2:"18";i:31;s:2:"18";i:32;s:2:"18";i:33;s:2:"18";i:34;s:2:"18";i:35;s:2:"18";i:36;s:2:"18";i:37;s:2:"18";i:38;s:2:"18";i:39;s:2:"18";i:40;s:2:"18";i:41;s:2:"18";i:42;s:2:"18";i:43;s:2:"18";i:44;s:2:"18";i:45;s:2:"18";i:46;s:2:"18";i:47;s:2:"18";}'),
(1, 'Classic', 'a:48:{i:0;s:2:"19";i:1;s:2:"19";i:2;s:2:"19";i:3;s:2:"19";i:4;s:2:"19";i:5;s:2:"19";i:6;s:2:"19";i:7;s:4:"19.5";i:8;s:2:"20";i:9;s:4:"20.5";i:10;s:2:"21";i:11;s:4:"21.5";i:12;s:2:"22";i:13;s:2:"22";i:14;s:2:"19";i:15;s:2:"19";i:16;s:2:"19";i:17;s:2:"19";i:18;s:2:"19";i:19;s:2:"19";i:20;s:2:"19";i:21;s:2:"19";i:22;s:4:"19.5";i:23;s:2:"20";i:24;s:4:"20.5";i:25;s:2:"21";i:26;s:4:"21.5";i:27;s:2:"22";i:28;s:2:"22";i:29;s:2:"22";i:30;s:2:"22";i:31;s:2:"22";i:32;s:2:"22";i:33;s:2:"22";i:34;s:2:"22";i:35;s:2:"22";i:36;s:2:"22";i:37;s:2:"22";i:38;s:2:"22";i:39;s:2:"22";i:40;s:2:"22";i:41;s:2:"22";i:42;s:2:"19";i:43;s:2:"19";i:44;s:2:"19";i:45;s:2:"19";i:46;s:2:"19";i:47;s:2:"19";}');

-- --------------------------------------------------------

--
-- Structure de la table `TempProbe`
--

CREATE TABLE IF NOT EXISTS `TempProbe` (
  `idTempProbe` int(11) NOT NULL AUTO_INCREMENT,
  `TprobeName` varchar(45) NOT NULL,
  `TempProbeCmd` varchar(150) NOT NULL,
  `TempProbeCor` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTempProbe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `TempProbe`
--

INSERT INTO `TempProbe` (`idTempProbe`, `TprobeName`, `TempProbeCmd`, `TempProbeCor`) VALUES
(1, 'temp1', './MTgettemp.sh http://192.168.1.202:40405/stats/11/temperature/latest', -0.5),
(2, 'temp2', './MTgettemp.sh http://192.168.1.202:40405/stats/09/temperature/latest', -1),
(3, 'temp3', './MTgettemp.sh http://192.168.1.202:40405/stats/10/temperature/latest', 2),
(4, 'temp4', './MTgettemp.sh http://192.168.1.202:40405/stats/10/temperature/latest', -1),
(5, 'temp5', './MTgettemp.sh http://192.168.1.202:40405/stats/50/temperature/latest', -2),
(6, 'temp6', './MTgettemp.sh http://192.168.1.202:40405/stats/2/temperature/latest', 2),
(7, 'temp7', './MTgettemp.sh http://192.168.1.202:40405/stats/51/temperature/latest', -2.5),
(8, 'temp8', './MTgettemp.sh http://192.168.1.202:40405/stats/62/temperature/latest', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ThermostatConfig`
--

CREATE TABLE IF NOT EXISTS `ThermostatConfig` (
  `idThConfig` int(11) NOT NULL AUTO_INCREMENT,
  `ThConfName` varchar(45) NOT NULL,
  `HBTimeStamp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idThConfig`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `ThermostatConfig`
--

INSERT INTO `ThermostatConfig` (`idThConfig`, `ThConfName`, `HBTimeStamp`) VALUES
(0, 'default', 1412886021);

-- --------------------------------------------------------

--
-- Structure de la table `ThZone`
--

CREATE TABLE IF NOT EXISTS `ThZone` (
  `idThZone` int(11) NOT NULL,
  `ThZoneName` varchar(45) NOT NULL,
  `ZoneEnable` tinyint(1) NOT NULL DEFAULT '1',
  `ZonePriority` int(11) NOT NULL DEFAULT '1',
  `ZoneEnableOS` tinyint(1) NOT NULL DEFAULT '0',
  `OpeningSensor_idOpeningSensor` int(11) NOT NULL,
  `Heater_idHeater` int(11) NOT NULL,
  `TempProbe_idTempProbe` int(11) NOT NULL,
  `WeekTimeLine_idWeekTimeLine` int(11) NOT NULL,
  `ZoneLasttemp` float DEFAULT NULL,
  `ZoneLastHeaterStats` tinyint(1) NOT NULL DEFAULT '0',
  `ZoneLastOpenSStats` tinyint(1) NOT NULL DEFAULT '0',
  `UseExtTempProbe` tinyint(1) NOT NULL DEFAULT '0',
  `TempProbe_idTempProbeExt` int(11) NOT NULL,
  `ExtLastTemp` float DEFAULT NULL,
  PRIMARY KEY (`idThZone`),
  KEY `fk_ThZone_OpeningSensor` (`OpeningSensor_idOpeningSensor`),
  KEY `fk_ThZone_Heater` (`Heater_idHeater`),
  KEY `fk_ThZone_TempProbe` (`TempProbe_idTempProbe`),
  KEY `fk_ThZone_WeekTimeLine` (`WeekTimeLine_idWeekTimeLine`),
  KEY `fk_ThZone_TempProbe1` (`TempProbe_idTempProbeExt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ThZone`
--

INSERT INTO `ThZone` (`idThZone`, `ThZoneName`, `ZoneEnable`, `ZonePriority`, `ZoneEnableOS`, `OpeningSensor_idOpeningSensor`, `Heater_idHeater`, `TempProbe_idTempProbe`, `WeekTimeLine_idWeekTimeLine`, `ZoneLasttemp`, `ZoneLastHeaterStats`, `ZoneLastOpenSStats`, `UseExtTempProbe`, `TempProbe_idTempProbeExt`, `ExtLastTemp`) VALUES
(0, 'ThZone1', 1, 1, 0, 1, 1, 1, 1, 21.5, 0, 0, 0, 1, NULL),
(1, 'ThZone2', 1, 1, 0, 1, 2, 2, 2, 23.5, 0, 0, 0, 1, NULL),
(2, 'ThZone3', 1, 1, 0, 1, 3, 3, 3, 22, 0, 0, 0, 1, NULL),
(3, 'ThZone4', 1, 1, 0, 1, 4, 4, 4, 20, 0, 0, 0, 1, NULL),
(4, 'ThZone5', 1, 1, 0, 1, 5, 5, 5, 14.5, 1, 0, 0, 1, NULL),
(5, 'ThZone6', 1, 1, 0, 1, 6, 6, 6, 21, 0, 0, 0, 1, NULL),
(6, 'ThZone7', 0, 1, 0, 1, 1, 7, 7, 30, 1, 0, 0, 1, NULL),
(7, 'ThZone8', 0, 1, 0, 1, 1, 8, 8, 45, 0, 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `WeekTimeLine`
--

CREATE TABLE IF NOT EXISTS `WeekTimeLine` (
  `idWeekTimeLine` int(11) NOT NULL AUTO_INCREMENT,
  `WeekName` varchar(45) NOT NULL,
  `SetPointDay_idSetPointDay1` int(11) DEFAULT NULL,
  `SetPointDay_idSetPointDay2` int(11) DEFAULT NULL,
  `SetPointDay_idSetPointDay3` int(11) DEFAULT NULL,
  `SetPointDay_idSetPointDay4` int(11) DEFAULT NULL,
  `SetPointDay_idSetPointDay5` int(11) DEFAULT NULL,
  `SetPointDay_idSetPointDay6` int(11) DEFAULT NULL,
  `SetPointDay_idSetPointDay7` int(11) DEFAULT NULL,
  PRIMARY KEY (`idWeekTimeLine`),
  KEY `fk_WeekTimeLine_SetPointDay` (`SetPointDay_idSetPointDay1`),
  KEY `fk_WeekTimeLine_SetPointDay1` (`SetPointDay_idSetPointDay2`),
  KEY `fk_WeekTimeLine_SetPointDay2` (`SetPointDay_idSetPointDay3`),
  KEY `fk_WeekTimeLine_SetPointDay3` (`SetPointDay_idSetPointDay4`),
  KEY `fk_WeekTimeLine_SetPointDay4` (`SetPointDay_idSetPointDay5`),
  KEY `fk_WeekTimeLine_SetPointDay5` (`SetPointDay_idSetPointDay6`),
  KEY `fk_WeekTimeLine_SetPointDay6` (`SetPointDay_idSetPointDay7`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `WeekTimeLine`
--

INSERT INTO `WeekTimeLine` (`idWeekTimeLine`, `WeekName`, `SetPointDay_idSetPointDay1`, `SetPointDay_idSetPointDay2`, `SetPointDay_idSetPointDay3`, `SetPointDay_idSetPointDay4`, `SetPointDay_idSetPointDay5`, `SetPointDay_idSetPointDay6`, `SetPointDay_idSetPointDay7`) VALUES
(0, 'DefaultWeek', 0, 0, 0, 0, 0, 0, 0),
(1, 'Week1', 1, 0, 1, 0, 1, 0, 1),
(2, 'Week2', 1, 0, 1, 0, 1, 0, 1),
(3, 'Week3', 1, 0, 1, 0, 1, 0, 1),
(4, 'Week4', 1, 0, 1, 0, 1, 0, 1),
(5, 'Week5', 1, 0, 1, 0, 1, 0, 1),
(6, 'Week6', 1, 0, 1, 0, 1, 0, 1),
(7, 'Week7', 1, 0, 1, 0, 1, 0, 1),
(8, 'Week8', 1, 0, 1, 0, 1, 0, 1),
(9, 'Week9', 1, 0, 1, 0, 1, 0, 1),

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
