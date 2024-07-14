-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 10:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_revisi`
--

CREATE TABLE `project_revisi` (
  `id_project` int(11) NOT NULL,
  `category` varchar(600) DEFAULT NULL,
  `project_number` varchar(100) NOT NULL,
  `project_name` varchar(600) NOT NULL,
  `project_manager` varchar(200) NOT NULL,
  `project_location` varchar(800) NOT NULL,
  `sektor` varchar(800) NOT NULL,
  `service` varchar(600) NOT NULL,
  `project_description` text DEFAULT NULL,
  `client` varchar(700) NOT NULL,
  `project_start` date DEFAULT NULL,
  `project_finish` date DEFAULT NULL,
  `project_picture` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_revisi`
--

INSERT INTO `project_revisi` (`id_project`, `category`, `project_number`, `project_name`, `project_manager`, `project_location`, `sektor`, `service`, `project_description`, `client`, `project_start`, `project_finish`, `project_picture`) VALUES
(23, 'study & implementation', '2034', 'eletric plant building ', 'budi raharjo', 'west sulawesi, indonesia', 'power, tin, metal, infrastructure, building', 'Power Generation, Detail Design, Capex Opex, Oil & Gas, Engineering Services, Site Communications & IT System Design, Feasibility Studies & Technical Due Diligence, Teaming with leading Coal Process Design Groups', 'pembuatan generator pembangkit listrik untuk tambang batubara', 'adaro indonesia', '2024-05-19', '2025-11-19', 'eletric plant building.jpg'),
(24, 'implementation', '2007', 'testing power', 'ardilo armando purnomo', 'jakarta  ', 'power', 'Feasibility Study', 'ya begitu deh', 'testing power', '2023-10-04', '2023-10-26', 'testing power.jpeg'),
(26, 'study', '30016', 'kilang minyak', 'yanuar bahar', 'west sumatra, indonesia ', 'coal, oil & gas', 'Feasibility Study', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam doloremque perferendis eum deleniti dolore sapiente debitis sunt omnis ipsum accusantium repellat vel beatae blanditiis et harum nisi consectetur quidem recusandae, unde temporibus exercitationem dolorem? Quo atque unde obcaecati quos, deserunt dolorum possimus id expedita ullam numquam officiis fuga nam aliquam!', 'pertamina', '2023-10-01', '2023-10-31', 'kilang minyak.jpeg'),
(35, 'implementation', '3025', 'tambang batu bara', 'yanuar bahar', 'west sumatra', 'coal, infrastructure, haul road', 'Feasibility Study, Coal Mine Development', 'tambang batubara', 'aramco', '2024-03-11', '2024-12-31', 'tambang batu bara.jpeg'),
(37, 'study', '3027', 'plant batery', 'agus setiawan', '', 'power', 'Power Generation', 'generator', 'listrik indonesia', '2022-05-26', '2023-05-11', 'plant batery.jpg'),
(38, 'implementation', '3026', 'pabrik batre', 'agus mukti', 'sulawesi selatan', 'nickel, power', 'Power Generation, Coal Mine Development', 'pabrik batre', 'pabrik batre', '2022-06-11', '2023-01-11', 'pabrik batre.jpg'),
(41, 'study', '2010', 'networking infrastructure for aquila nickel mines', 'Ahmad Habib A A', 'kalimantan, indonesia', 'infrastructure', 'Feasibility Study, Engineering Services, Site Communications & IT System Design', 'building networking infrastructur for site comunications, and networking infrastructure system design ', 'Aquila Cobalt Nickel', '2025-06-23', '2025-12-30', 'networking infrastructure for aquila nickel mines.jpeg'),
(46, 'implementation', '0921', 'tin mine', 'komaruddin', 'sulawesi tenggara, indonesia', 'power, tin, metal, gold', 'Feasibility Study, Detail Design, Capex Opex, Design & Drafting Service, Minerals & Metals Development, Project Development & Construction Service', 'tin mine project at sulawesi tenggara with buma', 'vale indonesia', '2024-05-19', '2024-05-31', '0921tin mine.jpeg'),
(47, 'implementation', '1189', 'metal mine', 'richarudin', 'kalimantan , indonesia', 'tin, metal, haul road', 'Engineering Services, Coal Mine Development, Design & Drafting Service, Minerals & Metals Development, Project Development & Construction Service', 'project about metal', 'solway indonesia', '2024-05-12', '2024-05-31', '1189metal mine.jpeg'),
(48, 'implementation', '23425', 'nickel smelther ', 'budi raharjo', 'west sulawesi, indonesia', 'nickel, metal, infrastructure, building', 'Feasibility Study, Capex Opex, Engineering Services, Design & Drafting Service, Project Development & Construction Service, Steel Fabrication Management', 'pembangunan smelter nickel untuk pertambangan vale', 'vale indonesia', '2024-07-13', '2024-12-31', '23425nickel smelther .jpeg'),
(49, 'implementation', '2984', 'electrical plant building', 'yanuar bahar', 'west sulawesi, indonesia', 'power, infrastructure, building', 'Power Generation, Steel Fabrication Management, Site Communications & IT System Design, Feasibility Studies & Technical Due Diligence, Teaming with leading Coal Process Design Groups', 'electrical plant buliding for vale smelther.', 'vale indonesia', '2024-07-01', '2024-08-10', '2984electrical plant building.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_revisi`
--
ALTER TABLE `project_revisi`
  ADD PRIMARY KEY (`id_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_revisi`
--
ALTER TABLE `project_revisi`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
