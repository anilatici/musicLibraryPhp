-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2023 at 04:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productTitle` varchar(255) NOT NULL,
  `productArtist` varchar(100) NOT NULL,
  `productCategory` varchar(25) NOT NULL,
  `productDescription` varchar(500) NOT NULL,
  `releaseDate` year(4) NOT NULL,
  `listPrice` decimal(10,2) NOT NULL,
  `product_img` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productTitle`, `productArtist`, `productCategory`, `productDescription`, `releaseDate`, `listPrice`, `product_img`) VALUES
(1, 'My Beautiful Dark Twisted Fantasy', 'Kanye West', 'Hip-Hop', 'My Beautiful Dark Twisted Fantasy is the fifth studio album by American rapper and producer Kanye West. It was released by Def Jam Recordings and Roc-A-Fella Records on November 22, 2010, following a period of public controversy for West.', 2010, '29.99', 'https://2dopeboyz.com/wp-content/uploads/2015/11/kanye-mbdtf-cover.jpg'),
(2, 'Blonde', 'Frank Ocean', 'R&B', 'Blonde is the second studio album by American singer Frank Ocean. It was released on August 20, 2016, as a timed exclusive on the iTunes Store and Apple Music, and followed the August 19 release of Oceans video album Endless. The album features guest vocals from André 3000, Beyoncé, and Kim Burrell, among others.', 2016, '24.99', 'https://images.squarespace-cdn.com/content/v1/5f6df5bcd8a0286b9df5948b/1621556908462-SD2S9SUUZA75LUJT2LSX/079-Frank-Ocean-Blonde.jpeg'),
(3, 'Trilogy', 'The Weeknd', 'R&B', 'Trilogy is the first compilation album by Canadian singer the Weeknd. It was released on November 13, 2012, through XO and Republic Records. It is composed of re-mixed and remastered versions of his 2011 mixtapes House of Balloons, Thursday and Echoes of Silence, and three previously-unreleased songs.', 2012, '34.99', 'https://i1.sndcdn.com/artworks-c03f984b-a87b-45ec-adb8-c42105a29846-0-t500x500.jpg'),
(4, 'OK Computer', 'Radiohead', 'Rock', 'OK Computer is the third studio album by the English rock band Radiohead, released in Japan on 21 May 1997 and in the UK on 16 June 1997. Radiohead self-produced the album with Nigel Godrich, an arrangement they have used for their subsequent albums.', 1997, '29.99', 'https://i.ebayimg.com/images/g/-DQAAOSw2bReCLKc/s-l500.jpg'),
(5, 'Twin Fantasy', 'Car Seat Headrest', 'Rock', 'Twin Fantasy, later re-titled Twin Fantasy, is the sixth solo album by American indie rock musician Will Toledo, under his alias Car Seat Headrest. Since its release in 2011, the album has amassed an online cult following, with the internet forums 4chan and Reddit playing major roles in the album\'s success.', 2011, '39.99', 'https://lastfm.freetls.fastly.net/i/u/500x500/4a18569943f34ae2a025c6ceabe3ed6c.jpg'),
(11, 'AT.LONG.LAST.A$AP', 'A$AP Rocky', 'Hip-Hop', 'At. Long. Last. ASAP is the second studio album by American rapper ASAP Rocky. It was released on May 26, 2015, by ASAP Worldwide, Polo Grounds Music, and RCA Records. The record serves as a sequel from Rocky\'s previous studio effort Long. Live. ASAP.', 2015, '19.99', 'https://m.media-amazon.com/images/I/61EtreSIUQL._AC_.jpg'),
(12, 'Channel Orange', 'Frank Ocean', 'R&B', 'Channel Orange is the debut studio album by American R&B singer-songwriter Frank Ocean. It was released on July 10, 2012, by Def Jam Recordings.', 2012, '27.99', 'https://external-preview.redd.it/J5_G33HDur1AtYll4nt8NbHNCYu4wMM44Iq0U6CetX4.jpg?auto=webp&s=2c2bb3cb34261d07f04b15fc496213d7be9b481a'),
(13, 'Flower Boy', 'Tyler The Creator', 'Hip-Hop', 'Flower Boy is the fourth studio album by American rapper Tyler, the Creator. The album was released on July 21, 2017, by Columbia Records.', 2017, '43.00', 'https://images.archambault.ca/images/PG/2343/2343905-gf.jpg?404=default'),
(14, 'KIDS SEE GHOSTS', 'KIDS SEE GHOSTS', 'Hip-Hop', 'Kids See Ghosts was an American hip hop duo composed of musicians Kanye West and Kid Cudi. Formed in 2018 during West’s Wyoming sessions, the duo released their eponymous debut album in June of that year, through their respective label imprints, GOOD Music and Wicked Awesome Records. The duo disbanded in 2022.', 2018, '34.99', 'https://i1.sndcdn.com/artworks-bNGGRLb1ghj0-0-t500x500.jpg'),
(15, 'Graduation', 'Kanye West', 'Hip-Hop', 'Graduation is the third studio album by American rapper and producer Kanye West, released on September 11, 2007, through Def Jam Recordings and Roc-A-Fella Records. Recording sessions took place between 2005 and 2007 at several studios in New York and Los Angeles.', 2007, '24.59', 'https://i1.sndcdn.com/artworks-afaf62a8-2265-4339-a0b3-ac4d8cc2c621-0-t500x500.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `productTitle` (`productTitle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
