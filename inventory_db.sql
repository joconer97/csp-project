--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `category`) VALUES
(1, '', '', 'Mouse'),
(2, 'Acer Mouse', '10', 'Mouse'),
(3, 'Sample', '5', 'Keyboard'),
(4, '', '', 'Mouse'),
(5, '', '', 'Mouse'),
(6, '', '', 'Mouse'),
(7, '', '', 'Mouse'),
(8, 'Sample', '51', 'Mouse'),
(9, '', '', 'Mouse'),
(10, 'sample product', '51', 'Monitor'),
(11, 'sample product', '51', 'Monitor'),
(12, 'Asus', '5', 'Motherboard'),
(13, 'Asus Keyboard', '12', 'Keyboard'),
(14, 'Sample', '213', 'Mouse'),
(15, '', '', 'Mouse'),
(16, '', '', 'Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'joshua', '12345', 'joshua', 'oconer'),
(2, 'laurence', 'admin', 'laurence', 'rubis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
