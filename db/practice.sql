-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 12:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `country` enum('nepal','india','japan') NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `age`, `gender`, `country`, `image`, `email`, `password`, `role`) VALUES
(19, 'Bijan', 'Pradhananga', 21, 'male', 'nepal', 'pic.jpg', 'bijan2059@gmail.com', 'bd16c5477d7e27d4598459521136f011', 'admin'),
(21, 'Katherine ', 'Langford', 21, 'female', 'india', 'katherine.jpg', 'kat@gmail.com', '01b3c76fc5f916ed8708bf51b66548a7', 'student'),
(38, 'Ankit', 'Karki', 19, 'male', 'nepal', '363282501_634610791985621_2925279393557536922_n.jpg', 'cerec@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'manager'),
(44, 'Bijaya', 'Pariyar', 21, 'male', 'nepal', 'bijaya.jpg', 'bijaya@gmail.com', '2381717213c2a55f794f5395aa2896b8', 'student'),
(45, 'Elizabeth', 'Oslen', 21, 'female', 'nepal', 'elizabeth.jpg', 'elizabeth@gmail.com', '4af09080574089cbece43db636e2025f', 'manager'),
(46, 'Leo', 'Messi', 36, 'male', 'nepal', 'messi.jpg', 'leo@gmail.com', '657b298b04e033810343842f993c9817', 'manager'),
(47, 'Pratik', 'Lamo', 22, 'male', 'nepal', 'image.png', 'pratik@gmail.com', 'f3add7844edc45f645a9f948970bf0c6', 'student'),
(48, 'Santosh', 'Raj SIngh', 21, 'male', 'nepal', 'santosh.jpg', 'santosh@gmail.com', 'ef5667331a2558206dce89d41ce4feb1', 'student'),
(49, 'September', 'Barnett', 63, 'male', 'japan', '361703202_847280917109962_2854286887758583287_n.jpg', 'qisarerat@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'student'),
(53, 'Krish', 'Maharjan', 10, 'male', 'nepal', '', 'krish@gmail.com', 'f673d9991a246dbce15d315e7716bc1f', 'student'),
(55, 'Anish', 'Pandit', 69, 'male', 'nepal', '20230829_101404.jpg', 'anish@gmail.com', 'a70ca1454267d4e4fc0bf2f130ba1a74', 'student'),
(56, 'Peter', 'Parker', 21, 'male', 'nepal', 'peter_parker.jpg', 'peter@gmail.com', 'e3e7f312a36e128c29a42352bb4ff8d7', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
