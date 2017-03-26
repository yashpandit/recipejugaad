-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 06:00 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_jugad`
--

-- --------------------------------------------------------

--
-- Table structure for table `addrecipe`
--

CREATE TABLE `addrecipe` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `r_id` int(11) NOT NULL,
  `recipe_name` varchar(20) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `steps` tinytext NOT NULL,
  `recipedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addrecipe`
--

INSERT INTO `addrecipe` (`id`, `first_name`, `r_id`, `recipe_name`, `ingredients`, `picture`, `steps`, `recipedate`) VALUES
(8, 'yashpandit1995@gmail.com', 4, 'KJEFLwe', 'kwjnlwjnl', '2015-larte-tesla-model-s-uhd-wallpapers.jpg,10338520_10152812206087801_3978243583378623474_o.jpg,1455883444015.jpg', 'wkrwnlkjn', '2017-03-24'),
(9, 'p@gmail.com', 5, 'ssfdsdsfd', 'dfsdfsddfddsf', 'bg3.jpg,bg4.jpg,bg5.jpg', 'dsffdsfdsfds', '2017-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `username`, `password`, `status`) VALUES
(1, 'yashpandit1995@gmail.com', 'yash', 'yash', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(12) NOT NULL,
  `contact_msg` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_user`
--

CREATE TABLE `recipe_user` (
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `picture` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `subscription` varchar(9) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_user`
--

INSERT INTO `recipe_user` (`oauth_provider`, `oauth_uid`, `id`, `first_name`, `email`, `password`, `phone`, `bday`, `picture`, `type`, `created`, `modified`, `subscription`, `status`) VALUES
('', '', 8, 'Yash Pandit', 'yash@gmail.com', 'aa5ff452bea6c4e36525303a6334da0b', '9737625463', '1995-12-21', 'yash.jpg', 'chef', '0000-00-00', '2017-03-26', '', '1'),
('', '', 9, 'punit', 'p@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543120', '2017-03-10', 'punit.jpg', 'chef', '2017-03-26', '2017-03-26', '', '1'),
('', '', 10, 'jay', 'jay@gmail.com', '61a3dd5599a14ade5de91c212073acc2', '', '0000-00-00', '', 'chef', '2017-03-26', '2017-03-26', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `save_recipe`
--

CREATE TABLE `save_recipe` (
  `uid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `recipe_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_setting`
--

CREATE TABLE `tbl_site_setting` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `constant` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `required` tinyint(4) NOT NULL,
  `value` mediumtext NOT NULL,
  `hint` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_site_setting`
--

INSERT INTO `tbl_site_setting` (`id`, `label`, `type`, `constant`, `class`, `required`, `value`, `hint`, `update_date`) VALUES
(1, 'Site name', '', 'SITE_NM', '', 0, 'Recipe-jugad', '', '2017-03-21 16:53:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addrecipe`
--
ALTER TABLE `addrecipe`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `recipe_user`
--
ALTER TABLE `recipe_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `save_recipe`
--
ALTER TABLE `save_recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_site_setting`
--
ALTER TABLE `tbl_site_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addrecipe`
--
ALTER TABLE `addrecipe`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipe_user`
--
ALTER TABLE `recipe_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `save_recipe`
--
ALTER TABLE `save_recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_site_setting`
--
ALTER TABLE `tbl_site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addrecipe`
--
ALTER TABLE `addrecipe`
  ADD CONSTRAINT `addrecipe_ibfk_1` FOREIGN KEY (`id`) REFERENCES `recipe_user` (`id`);

--
-- Constraints for table `save_recipe`
--
ALTER TABLE `save_recipe`
  ADD CONSTRAINT `save_recipe_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `recipe_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
