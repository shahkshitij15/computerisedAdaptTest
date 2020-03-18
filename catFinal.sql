-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 01:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat1`
--

-- --------------------------------------------------------

--
-- Table structure for table `english`
--

CREATE TABLE `english` (
  `q_id` int(11) NOT NULL,
  `statement` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `a` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `b` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `d` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `answer` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `english`
--

INSERT INTO `english` (`q_id`, `statement`, `a`, `b`, `c`, `d`, `value`, `answer`, `marks`) VALUES
(101, 'Jenny ___________ tired', 'be', 'is', 'has', 'have', -1, 'b', 5),
(102, '\" ___________ is she?\" \"She\'s my friend from London\"', 'who', 'why', 'which', 'what', -1, 'a', 5),
(103, 'Today is Wednesday. Yesterday it ___________ Tuesday.', 'were', 'is', 'be', 'was', -1, 'd', 5),
(104, 'It\'s Thursday today. Tomorrow it ___________ Friday.', 'will', 'will be', 'be ', 'was', -1, 'b', 5),
(105, '___________ lots of animals in the zoo.', 'There', 'There is', 'There are', 'There are\'nt', -1, 'c', 5),
(106, 'I\'m very happy _____ in India. I really miss being there', 'to live', 'to have lived', 'to be lived', 'to be living', 0, 'b', 10),
(107, 'They didn\'t reach an agreement ______ their differences', 'on account of', 'due', 'because', 'owing', 0, 'a', 10),
(108, 'I wish I _____ those words. But now it\'s too late.', 'not having said', 'have never said', 'never said', 'had never said', 0, 'd', 10),
(109, 'The woman, who has been missing for 10 days, is believed _____.', 'to be abducted', 'to be abducting', 'to have been abducted', 'to have been abducting', 0, 'c', 10),
(110, 'She was working on her computer with her baby next to _____.', 'herself', 'her', 'her own', 'hers', 0, 'b', 10),
(111, '_____ to offend anyone, she said both cakes were equally good.', 'not wanting', 'as not wanting', 'she didnt want', 'because not wanting', 1, 'a', 15),
(112, '_____ in trying to solve this problem. It\'s clearly unsolvable', 'There\'s no point', 'Its no point', 'There isn\'t a point', 'It\'s no need', 1, 'a', 15),
(113, 'Last year, when I last met her, she told me she _____ a letter every day for the last two months.', 'had written', 'has written', 'had been writing', 'wrote', 1, 'c', 15),
(114, 'He _____ robbed as he was walking out of the bank', 'had', 'did', 'got', 'were', 1, 'c', 15),
(115, '_____ forced to do anything. He acted of his own free will.', 'in no way was he', 'no way was he', 'in any way he was', 'in any way was he', 1, 'a', 15);

-- --------------------------------------------------------

--
-- Stand-in structure for view `english_view`
-- (See below for the actual view)
--
CREATE TABLE `english_view` (
`s_id` varchar(20)
,`s_name` varchar(20)
,`marks` int(11)
,`total` int(11)
,`percent` decimal(17,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `maths`
--

CREATE TABLE `maths` (
  `q_id` int(11) NOT NULL,
  `statement` longtext COLLATE utf8_general_mysql500_ci NOT NULL,
  `a` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `b` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `c` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `d` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `value` int(11) NOT NULL,
  `answer` char(2) COLLATE utf8_general_mysql500_ci NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `maths`
--

INSERT INTO `maths` (`q_id`, `statement`, `a`, `b`, `c`, `d`, `value`, `answer`, `marks`) VALUES
(101, 'Multiply 0.06 by 0.021', ' 0.0126', '0.0000126', '0.00126', '0.126', -1, 'c', 5),
(102, 'Divide 4.2 by 0.07', ' 1.33', '60', '6', '600', -1, 'b', 5),
(103, '9 – 3 (2+6)÷6 -2 × 5 ', '-2', '35', '5', '-5', -1, 'd', 5),
(104, 'The decimal equivalent of 9/40 is:', '4.44 ', '2.25', '0.225', '0.0225', -1, 'c', 5),
(105, '6.42 × 10⁴ is equivalent to:', ' 64,200', '642', '0.000642', '642,000', -1, 'a', 5),
(106, 'The cost of an article including 15% for taxes is $138.00. What is the cost of the article without taxes?', '$120.00', '$117.30', '$20.70', '$92.00', 0, 'a', 10),
(107, 'Sandra’s monthly salary is $3200. If a deduction for taxes from her monthly paycheck is $800, what percent of her salary goes to these deductions?', ' 25%', '25.6%', '40%', '4%', 0, 'a', 10),
(108, 'Dividing by 10, 000 is the same as multiplying by', '0.01', '1/10000', '1/1000', '0.001', 0, 'b', 10),
(109, 'Find the value of y -6y², when y=  1/3\r\n', '-2/3', '-1/3', '1', '-14/3', 0, 'b', 10),
(110, 'Express y-4[y-3(y-2)] -5 in simplest form', '19+9y', '-7y – 29', '-2y²+14y-29', '9y-29', 0, 'd', 10),
(111, 'How many 4cm by 4 cm tiles are needed to cover an area, which measures 20 cm, by 28 cm?', '48', '35', '140', '560', 1, 'b', 15),
(112, 'Solve for b: 3b = 5(2-b) -4 (1-3b)', '-3/2', '6/7', '3/2', '3/10', 1, 'a', 15),
(113, 'The rank of a 3 x 3 matrix C (= AB), found by multiplying a non-zero column matrix A of size 3 x 1 and a non-zero row matrix B of size 1 x 3, is', '0', '1', '2', '3', 1, 'b', 15),
(114, 'If A and B are square matrices of size n x n, then which of the following statement is not true?', 'det. (AB) = det (A) det (B)', 'det (kA) = kn det (A)', 'det (A + B) = det (A) + det (B)', 'det (AT) =1/det (A-1)', 1, 'c', 15),
(115, 'Matrix, A =\r\n 	\r\ncosΘ	sinΘ	0\r\nsinΘ	cosΘ	0\r\n0	0	1\r\n \r\n', 'orthogonal\r\n', 'non-singular\r\n', 'have A-1 exists\r\n', 'both (b) & (c)', 1, 'd', 15);

-- --------------------------------------------------------

--
-- Stand-in structure for view `maths_view`
-- (See below for the actual view)
--
CREATE TABLE `maths_view` (
`s_id` varchar(20)
,`s_name` varchar(20)
,`marks` int(11)
,`total` int(11)
,`percent` decimal(17,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `name` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `query` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`name`, `email`, `query`) VALUES
('rhs', 'rhs1@gmail.com', 'abhjgjhb'),
('tirth', 'tirth@gmail.com', 'Test1'),
('mridul', 'mridul@gmail.com', 'Test2'),
('tirth', 'tirth@gmail.com', 'abcdadfasfa'),
('Bhavik Sanghv', 'bhaviksanghvi786@gma', 'gvhjn km'),
('Saurabh Rane', 'saurabhrane1199@gmai', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `examid` int(11) NOT NULL,
  `u_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `subject` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`examid`, `u_id`, `subject`, `marks`, `total`) VALUES
(1, 'bds123', 'maths', 40, 55),
(2, 'srs206', 'maths', 50, 55),
(3, 'ssr119', 'science', 30, 45),
(4, 'tvp139', 'english', 55, 70),
(5, 'bds123', 'science', 55, 70),
(7, 'bds718', 'maths', 15, 45),
(9, 'bds718', 'maths', 70, 70),
(11, 'bds718', 'science', 50, 65),
(12, 'bds718', 'science', 40, 65),
(13, 'bds718', 'maths', 50, 65),
(14, 'bds718', 'english', 10, 35),
(15, 'bds718', 'english', 15, 50),
(16, 'bds718', 'maths', 5, 30),
(17, 'bds718', 'science', 45, 55),
(18, 'bds718', 'maths', 30, 40),
(19, 'bds718', 'english', 45, 55),
(20, 'bds718', 'science', 50, 65),
(21, 'jainam123', 'maths', 10, 45),
(22, 'bds718', 'english', 5, 35),
(23, 'bds718', 'maths', 15, 60),
(24, 'bds718', 'maths', 0, 0),
(25, 'srs206', 'maths', 25, 40),
(26, 'bds718', 'english', 45, 55),
(28, 'bds718', 'english', 5, 30),
(29, 'bds718', 'english', 0, 0),
(30, 'bds718', 'english', 10, 35),
(31, 'bds718', 'english', 30, 40);

-- --------------------------------------------------------

--
-- Table structure for table `science`
--

CREATE TABLE `science` (
  `q_id` int(11) NOT NULL,
  `statement` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `a` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `b` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `d` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `answer` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `science`
--

INSERT INTO `science` (`q_id`, `statement`, `a`, `b`, `c`, `d`, `value`, `answer`, `marks`) VALUES
(101, 'Brass gets discoloured in air because of the presence of which of the following gases in air?', 'oxygen', 'Hydrogen Sulphide', 'Carbon Dioxide', 'Nitrogen', -1, 'b', 5),
(102, 'Which of the following is a non metal that remains liquid at room temperature?', 'phosphorous', 'bromine', 'chlorine', 'helium', -1, 'b', 5),
(103, 'Chlorophyll is a naturally occurring chelate compound in which central metal is', 'copper', 'iron', 'magnesium', 'lead', -1, 'c', 5),
(104, 'Which of the following is used in pencils?', 'graphite', 'silicon', 'charcoal', 'phosphorous', -1, 'a', 5),
(105, 'Which of the following metals forms an amalgam with other metals?', 'tin', 'lead', 'copper', 'mercury', -1, 'd', 5),
(106, 'Chemical formula for water is', 'NaAlO2', 'H2O', 'Al2O3', 'CaSiO3', 0, 'b', 10),
(107, 'The gas usually filled in the electric bulb is', 'nitrogen', 'hydrogen', 'carbon dioxide', 'oxygen', 0, 'a', 10),
(108, 'Washing soda is the common name for', 'sodium carbonate', 'calcium bicarbonate', 'sodium bicarbonate', 'calcium bicarbonate', 0, 'a', 10),
(109, 'Quartz crystals normally used in quartz clocks etc. is chemically', 'germanium oxide', 'sodium silicate', 'sodium carbide', 'silicon dioxide', 0, 'd', 10),
(110, 'Which of the gas is not known as green house gas?', 'methane', 'nitrous oxide', 'hydrogen', 'carbon dioxide', 0, 'c', 10),
(111, '	\r\nBromine is a', 'black solid', 'red liquid', 'colourless gas', 'inflammable gas', 1, 'b', 15),
(112, 'The hardest substance available on earth is', 'gold', 'iron', 'diamond', 'platinum', 1, 'c', 15),
(113, 'The variety of coal in which the deposit contains recognisable traces of the original plant material is', 'bitumen', 'anthracite', 'lignite', 'peat', 1, 'd', 15),
(114, 'Tetraethyl lead is used as', 'pain killer', 'fire extinguisher', 'mosquito repellent', 'petrol additive', 1, 'd', 15),
(115, '	\r\nWhich of the following is used as a lubricant?', 'graphite', 'silica', 'iron oxide', 'diamond', 1, 'a', 15);

-- --------------------------------------------------------

--
-- Stand-in structure for view `science_view`
-- (See below for the actual view)
--
CREATE TABLE `science_view` (
`s_id` varchar(20)
,`s_name` varchar(20)
,`marks` int(11)
,`total` int(11)
,`percent` decimal(17,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `s_name` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `s_email` varchar(40) COLLATE utf8_general_mysql500_ci NOT NULL,
  `s_pwd` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `dob` date NOT NULL DEFAULT '1999-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `s_name`, `s_email`, `s_pwd`, `dob`) VALUES
('bds718', 'Bhavik Sanghvi', 'bhaviksanghvi786@gmail.com', '111', '1999-11-16'),
('iyerboi', 'Vinayak Iyer', 'vinu@gmail.com', 'idli', '1999-01-01'),
('jainam123', 'jainam fagania', 'jf@gmail.com', '123', '1999-01-01'),
('srs206', 'Sahil Sheth', 'srs@gmail.com', '123', '1999-06-05'),
('ssr119', 'Saurabh Rane', 'saurabh.rane@spit.ac.in', '123456', '1999-09-11'),
('tvp139', 'Tirth Parekh', 'tvp@gmail.com', '123456', '1999-09-13');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `bi_student` BEFORE INSERT ON `students` FOR EACH ROW BEGIN
  IF NEW.s_email NOT LIKE '_%@_%.__%' THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Email field is not valid';
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pwd_s` AFTER UPDATE ON `students` FOR EACH ROW update users set pwd = NEW.s_pwd where username = NEW.s_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_view`
-- (See below for the actual view)
--
CREATE TABLE `student_view` (
`s_id` varchar(20)
,`s_name` varchar(20)
,`s_email` varchar(40)
,`dob` date
,`age` bigint(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `t_name` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `t_email` varchar(40) COLLATE utf8_general_mysql500_ci NOT NULL,
  `subject` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `t_pwd` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_email`, `subject`, `t_pwd`) VALUES
('david123', 'David Warner', 'dvd2@gmail.com', 'maths', '456789'),
('kuldeep845', 'Kuldeep', 'kld854@gamil.com', 'maths', '4567'),
('ramesh777', 'Ramesh', 'r777@gamil.com', 'science', '4567'),
('rhs999', 'Rupali Sawant', 'rhs999@gmail.com', 'english', '456789');

--
-- Triggers `teacher`
--
DELIMITER $$
CREATE TRIGGER `bi_teacher` BEFORE INSERT ON `teacher` FOR EACH ROW BEGIN
  IF NEW.t_email NOT LIKE '_%@_%.__%' THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Email field is not valid';
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pwd_t` AFTER UPDATE ON `teacher` FOR EACH ROW update users set pwd = NEW.t_pwd where username = NEW.t_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `teacher_view`
-- (See below for the actual view)
--
CREATE TABLE `teacher_view` (
`t_id` varchar(20)
,`t_name` varchar(20)
,`t_email` varchar(40)
,`subject` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `count` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `response` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `pwd` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pwd`, `type`) VALUES
('bds718', '111', 1),
('bhavik718', 'admin', 3),
('david123', '456789', 2),
('iyerboi', 'idli', 1),
('jainam123', '123', 1),
('kshitij15', 'admin', 3),
('ramesh777', '4567', 2),
('rhs999', '456789', 2),
('saurabh41', 'admin', 3),
('srs206', '123', 1),
('ssr119', '123456', 1),
('test122', '123', 1),
('tvp139', '123456', 1);

-- --------------------------------------------------------

--
-- Structure for view `english_view`
--
DROP TABLE IF EXISTS `english_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `english_view`  AS  select `students`.`s_id` AS `s_id`,`students`.`s_name` AS `s_name`,`result`.`marks` AS `marks`,`result`.`total` AS `total`,((`result`.`marks` / `result`.`total`) * 100) AS `percent` from (`students` join `result`) where ((`result`.`u_id` = `students`.`s_id`) and (`result`.`subject` = 'english')) ;

-- --------------------------------------------------------

--
-- Structure for view `maths_view`
--
DROP TABLE IF EXISTS `maths_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `maths_view`  AS  select `students`.`s_id` AS `s_id`,`students`.`s_name` AS `s_name`,`result`.`marks` AS `marks`,`result`.`total` AS `total`,((`result`.`marks` / `result`.`total`) * 100) AS `percent` from (`students` join `result`) where ((`result`.`u_id` = `students`.`s_id`) and (`result`.`subject` = 'maths')) ;

-- --------------------------------------------------------

--
-- Structure for view `science_view`
--
DROP TABLE IF EXISTS `science_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `science_view`  AS  select `students`.`s_id` AS `s_id`,`students`.`s_name` AS `s_name`,`result`.`marks` AS `marks`,`result`.`total` AS `total`,((`result`.`marks` / `result`.`total`) * 100) AS `percent` from (`students` join `result`) where ((`result`.`u_id` = `students`.`s_id`) and (`result`.`subject` = 'science')) ;

-- --------------------------------------------------------

--
-- Structure for view `student_view`
--
DROP TABLE IF EXISTS `student_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_view`  AS  select `students`.`s_id` AS `s_id`,`students`.`s_name` AS `s_name`,`students`.`s_email` AS `s_email`,`students`.`dob` AS `dob`,floor(((to_days(curdate()) - to_days(`students`.`dob`)) / 365.25)) AS `age` from `students` ;

-- --------------------------------------------------------

--
-- Structure for view `teacher_view`
--
DROP TABLE IF EXISTS `teacher_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `teacher_view`  AS  select `teacher`.`t_id` AS `t_id`,`teacher`.`t_name` AS `t_name`,`teacher`.`t_email` AS `t_email`,`teacher`.`subject` AS `subject` from `teacher` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `english`
--
ALTER TABLE `english`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `maths`
--
ALTER TABLE `maths`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`examid`);

--
-- Indexes for table `science`
--
ALTER TABLE `science`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `english`
--
ALTER TABLE `english`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `maths`
--
ALTER TABLE `maths`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `examid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `science`
--
ALTER TABLE `science`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
