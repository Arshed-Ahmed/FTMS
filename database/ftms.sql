-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 03:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `actId` int(11) NOT NULL,
  `activity` text NOT NULL,
  `actDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `timeDate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backup`
--

INSERT INTO `backup` (`id`, `timeDate`) VALUES
(1, '2012/3/2');

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `calDesc` text NOT NULL,
  `calDate` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `colour`
--

CREATE TABLE `colour` (
  `colId` int(11) NOT NULL,
  `colName` text NOT NULL,
  `colDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comId` int(11) NOT NULL,
  `comName` text NOT NULL,
  `comAddress` text NOT NULL,
  `comCity` text NOT NULL,
  `comRegNo` text NOT NULL,
  `comLogo` text NOT NULL,
  `comTel` int(11) NOT NULL,
  `comEmail` text NOT NULL,
  `comWeb` text NOT NULL,
  `budget` text NOT NULL,
  `employees` text NOT NULL,
  `orders` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comId`, `comName`, `comAddress`, `comCity`, `comRegNo`, `comLogo`, `comTel`, `comEmail`, `comWeb`, `budget`, `employees`, `orders`) VALUES
(1, 'Fashion Tailors', 'No, 68/3 Malwatta Plaza, Malwatta Road, Colombo 11', 'Colombo', 'R1705156', 'IMG-62766f77ef9d07.97308374.png', 1123338554, 'fashiontaiolors@gmail.com', 'www.fashiontailors.com', '2,000,000', '4', '15');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusid` int(11) NOT NULL,
  `cusFname` text NOT NULL,
  `cusLname` text NOT NULL,
  `cusNIC` text NOT NULL,
  `cusPno` int(11) NOT NULL,
  `cusEmail` text NOT NULL,
  `cusAddress` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusid`, `cusFname`, `cusLname`, `cusNIC`, `cusPno`, `cusEmail`, `cusAddress`, `Display`) VALUES
(1, 'John', 'Wick', '9876567777V', 1223, 'Jwick@gmail.com', 'maldivs', 0),
(2, 'Josh', 'Mike', '123456789V', 12345678, 'josh@gmail.com', 'Colombo 11', 0),
(3, 'Klaus', 'Haley', '78989996230', 799223, 'khaley@gmail.com', 'Colombo 01', 0),
(4, 'Hakam', 'Ali', '1548962222063', 1542365478, 'ali@gmail.com', 'Kalubowila', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `tid` int(11) NOT NULL,
  `tFname` text NOT NULL,
  `tLname` text NOT NULL,
  `tNIC` varchar(12) NOT NULL,
  `tAddress` text NOT NULL,
  `tPno` int(11) NOT NULL,
  `tEmail` text NOT NULL,
  `tcatId` text NOT NULL,
  `tStartdate` text NOT NULL,
  `tSalary` text NOT NULL,
  `tstatus` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`tid`, `tFname`, `tLname`, `tNIC`, `tAddress`, `tPno`, `tEmail`, `tcatId`, `tStartdate`, `tSalary`, `tstatus`, `Display`) VALUES
(1, 'Ravi', 'Kluas', '123456789V', 'kadawatha', 12345678, 'kravi@gmail.com', 'Manager', '2020-12-13', '20000', 'Permanent', 0),
(2, 'Mike', 'Jakson', '8649521', 'embilipitiya', 3345820, 'Mjackson@mail.com', 'Tailor', '2020-12-13', '15000', 'Temporary', 0),
(3, 'Nik', 'Sofie', '602233444', 'London', 875463214, 'sofie@gmail.com', 'Manager', '2022-06-16', '30000', 'Permanent', 0);

-- --------------------------------------------------------

--
-- Table structure for table `finisheditems`
--

CREATE TABLE `finisheditems` (
  `fitId` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `fitName` text NOT NULL,
  `ordid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `hid` int(11) NOT NULL,
  `ordid` int(11) NOT NULL,
  `hdate` date NOT NULL,
  `hreturndate` date NOT NULL,
  `hremark` text NOT NULL,
  `hstatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`) VALUES
(8, 'IMG-5f8954bd209a92.78214246.jpg'),
(9, 'IMG-5f8954caa02539.76436861.jpg'),
(10, 'IMG-607dd1f8040e06.17444393.jpg'),
(11, 'IMG-607dd24b2cc190.81756522.jpg'),
(12, 'IMG-607dd256738c77.63515814.jpg'),
(13, 'IMG-607dd25eb71466.49018267.jpg'),
(14, 'IMG-607dd266ea32a2.51691837.jpg'),
(15, 'IMG-607dd27385a423.69281979.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invid` int(11) NOT NULL,
  `ordid` int(11) NOT NULL,
  `payid` int(11) NOT NULL,
  `invdate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invid`, `ordid`, `payid`, `invdate`) VALUES
(1, 1, 4, '2022-06-08'),
(2, 1, 4, '2022-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itid` int(11) NOT NULL,
  `itname` text NOT NULL,
  `itdescription` text NOT NULL,
  `hvalue` text NOT NULL,
  `itvalue` text NOT NULL,
  `ittype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itid`, `itname`, `itdescription`, `hvalue`, `itvalue`, `ittype`) VALUES
(1, 'Blazer 01', 'black blazer with inner Vest', '500', '10000', 'hire'),
(2, 'Blazer', 'black stripe blazer with inner Vest', '', '15,000', 'nothire'),
(3, 'Blazer 04', 'Blue colour with black inner Vest', '800', '15000', 'hire'),
(4, 'Trouser', 'Normal, Black', '', '700', 'nothire');

-- --------------------------------------------------------

--
-- Table structure for table `itemcategory`
--

CREATE TABLE `itemcategory` (
  `catId` int(11) NOT NULL,
  `catName` text NOT NULL,
  `catDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemcategory`
--

INSERT INTO `itemcategory` (`catId`, `catName`, `catDesc`) VALUES
(1, 'Uniforms', 'School, Doctor, Nurse uniform'),
(2, 'Suits', 'Work suits, and wedding suits');

-- --------------------------------------------------------

--
-- Table structure for table `jobcard`
--

CREATE TABLE `jobcard` (
  `jcid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `ordid` int(11) NOT NULL,
  `asdate` date NOT NULL,
  `jcdeadline` date NOT NULL,
  `jdetail` text NOT NULL,
  `jstatus` int(11) NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcard`
--

INSERT INTO `jobcard` (`jcid`, `tid`, `ordid`, `asdate`, `jcdeadline`, `jdetail`, `jstatus`, `Display`) VALUES
(1, 2, 2, '2022-06-15', '2022-04-10', 'neat', 0, 0),
(2, 3, 2, '2022-06-17', '2022-04-07', 'Urgent', 0, 0),
(3, 3, 3, '2022-06-19', '2022-06-24', 'Net can be taken from warehouse', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobcarddetails`
--

CREATE TABLE `jobcarddetails` (
  `jcdId` int(11) NOT NULL,
  `jcid` int(11) NOT NULL,
  `jcdDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `joblist`
--

CREATE TABLE `joblist` (
  `jlid` int(11) NOT NULL,
  `jlname` text NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `makepayment`
--

CREATE TABLE `makepayment` (
  `payid` int(11) NOT NULL,
  `poid` int(11) NOT NULL,
  `paydate` text NOT NULL,
  `payamount` text NOT NULL,
  `paidamount` text NOT NULL,
  `paybalance` text NOT NULL,
  `paytype` text NOT NULL,
  `invid` text NOT NULL,
  `remarks` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makepayment`
--

INSERT INTO `makepayment` (`payid`, `poid`, `paydate`, `payamount`, `paidamount`, `paybalance`, `paytype`, `invid`, `remarks`, `Display`) VALUES
(1, 2, '2022-06-09', '1400', '1600', '200', 'cash', 'A0012', 'paid fully', 0),
(2, 1, '2022-06-06', '1450', '2000', '550', 'cash', 'A0043', 'Ok', 0);

-- --------------------------------------------------------

--
-- Table structure for table `measuredetails`
--

CREATE TABLE `measuredetails` (
  `mid` int(11) NOT NULL,
  `itid` int(11) NOT NULL,
  `cusid` int(11) NOT NULL,
  `stlid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `measId` int(11) NOT NULL,
  `cusid` int(11) NOT NULL,
  `cusName` text NOT NULL,
  `item` text NOT NULL,
  `measurement` text NOT NULL,
  `moreDetails` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`measId`, `cusid`, `cusName`, `item`, `measurement`, `moreDetails`, `Display`) VALUES
(1, 1, 'John Wick', 'Shirt', '21,87,44,12.5', '2 pockets', 0),
(2, 3, 'Klaus Haley', 'Trousers', '65, 77, 5.51', 'Plain without back pockets', 0),
(3, 4, 'Hakam Ali', 'Trousers', '40, 7, 32, 8,14', 'front lines', 0),
(4, 3, 'Klaus Haley', 'Frock', '10, 45, 20.5,94,23,35', 'Slim fit, with black nets', 0),
(5, 3, 'Klaus Haley', 'Frock with a Showl', '10,24,25.6,24,98 / 24,38', 'With black nets and Styled neck', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notId` int(11) NOT NULL,
  `notTitle` text NOT NULL,
  `notReciever` text NOT NULL,
  `notEmail` text NOT NULL,
  `notType` text NOT NULL,
  `notMessage` text NOT NULL,
  `notDate` date NOT NULL,
  `notCategory` text NOT NULL,
  `notStatus` int(11) NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notId`, `notTitle`, `notReciever`, `notEmail`, `notType`, `notMessage`, `notDate`, `notCategory`, `notStatus`, `Display`) VALUES
(1, 'Work Assigned', '1', 'kravi@gmail.com', 'employee', 'Ravi Kluas is assigned to oversee the <a role=\'button\' data-toggle=\'modal\' data-target=\'.bs-measurement\'  onclick=\'getOrder(2)\'>order Id - 2</a>\"', '2022-06-17', 'notification created by admin', 0, 0),
(2, 'Order Complete', '2', 'josh@gmail.com', 'customer', 'You Can pickup your order on 02/06/2022 at 09.00 pm', '2022-06-17', 'notification created by admin', 0, 0),
(3, 'Work Assigned', '2', 'Mjackson@mail.com', 'employee', ' is assigned to oversee the <a role=\'button\' onclick=\'getOrder(2)\'>order Id - 2</a>\"', '2022-06-17', 'jobcard notification', 0, 1),
(4, 'Work Assigned', '2', 'Mjackson@mail.com', 'employee', 'Mike Jakson is assigned to oversee the <a role=\'button\' data-toggle=\'modal\' data-target=\'.bs-measurement\' \nonclick=\'getOrder(2)\'>order Id - 2</a>', '2022-06-17', 'jobcard notification', 0, 0),
(5, 'Work Assigned', '3', 'sofie@gmail.com', 'employee', 'Nik Sofie is assigned to oversee the <a role=\'button\' data-toggle=\'modal\' data-target=\'.bs-measurement\' onclick=\'getOrder(3)\'>order Id - 3</a>', '2022-06-19', 'jobcard notification', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `odid` int(11) NOT NULL,
  `odrid` int(11) NOT NULL,
  `itid` int(11) NOT NULL,
  `odstatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderreturn`
--

CREATE TABLE `orderreturn` (
  `id` int(11) NOT NULL,
  `ordid` int(11) NOT NULL,
  `cusid` int(11) NOT NULL,
  `rodate` text NOT NULL,
  `reason` text NOT NULL,
  `remarks` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderreturn`
--

INSERT INTO `orderreturn` (`id`, `ordid`, `cusid`, `rodate`, `reason`, `remarks`, `Display`) VALUES
(1, 1, 4, '2022-05-30', 'summa', 'summa', 0),
(2, 1, 7, '2022-06-07', 'summa 2', 'summa 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `ordid` int(11) NOT NULL,
  `cusid` int(11) NOT NULL,
  `cusName` text NOT NULL,
  `styleId` int(11) NOT NULL,
  `ordDate` text NOT NULL,
  `updateDate` text NOT NULL,
  `fitonDate` text NOT NULL,
  `deliveryDate` text NOT NULL,
  `ordPrice` text NOT NULL,
  `ordDiscount` text NOT NULL,
  `ordDescription` text NOT NULL,
  `measId` int(11) NOT NULL,
  `ordProgress` int(11) NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`ordid`, `cusid`, `cusName`, `styleId`, `ordDate`, `updateDate`, `fitonDate`, `deliveryDate`, `ordPrice`, `ordDiscount`, `ordDescription`, `measId`, `ordProgress`, `Display`) VALUES
(1, 1, 'john wick', 1, '06/13/2021', '06/17/2022', '13.05.2021', '13.05.2021', '1200', '300', 'formal suit for wedding', 1, 1, 0),
(2, 8, 'Klaus stiles', 4, '02/13/2021', '', '20.05.2021', '20.05.2021', '1520', '120', 'Urgent', 2, 0, 0),
(3, 3, 'Klaus Haley', 2, '06/19/2022', '', '2022-06-22', '2022-06-26', '6500', '500', 'want it perfect', 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(11) NOT NULL,
  `ordid` int(11) NOT NULL,
  `paydate` text NOT NULL,
  `payamount` text NOT NULL,
  `paidamount` text NOT NULL,
  `paybalance` text NOT NULL,
  `paytype` text NOT NULL,
  `invid` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `ordid`, `paydate`, `payamount`, `paidamount`, `paybalance`, `paytype`, `invid`, `remarks`, `Display`) VALUES
(1, 1, '02/11/2022', '1800', '2000', '200', 'cash', 0, 'Full', 0),
(2, 1, '2022-06-02', '1400', '2000', '600', 'cash', 14, 'Full payment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payrate`
--

CREATE TABLE `payrate` (
  `payrId` int(11) NOT NULL,
  `payrItem` text NOT NULL,
  `payRate` text NOT NULL,
  `priceRate` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payrate`
--

INSERT INTO `payrate` (`payrId`, `payrItem`, `payRate`, `priceRate`, `Display`) VALUES
(1, 'Shirt', '350', '900', 0),
(2, 'Trouser', '500', '1400', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `poid` int(11) NOT NULL,
  `itid` int(11) NOT NULL,
  `poQuantity` int(100) NOT NULL,
  `poUnitPrice` int(11) NOT NULL,
  `poPrice` int(11) NOT NULL,
  `poDate` date NOT NULL,
  `supid` int(11) NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`poid`, `itid`, `poQuantity`, `poUnitPrice`, `poPrice`, `poDate`, `supid`, `Display`) VALUES
(1, 1, 3, 900, 2700, '2022-05-11', 1, 0),
(2, 2, 4, 0, 0, '2022-05-19', 1, 0),
(3, 1, 5, 0, 0, '2022-05-05', 1, 1),
(4, 2, 2, 0, 0, '2022-05-10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdetails`
--

CREATE TABLE `purchaseorderdetails` (
  `podId` int(11) NOT NULL,
  `poid` int(11) NOT NULL,
  `podDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderreturn`
--

CREATE TABLE `purchaseorderreturn` (
  `poid` int(11) NOT NULL,
  `itid` int(11) NOT NULL,
  `poQuantity` int(100) NOT NULL,
  `poDate` date NOT NULL,
  `supid` int(11) NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorderreturn`
--

INSERT INTO `purchaseorderreturn` (`poid`, `itid`, `poQuantity`, `poDate`, `supid`, `Display`) VALUES
(1, 1, 2, '2022-05-22', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rawitems`
--

CREATE TABLE `rawitems` (
  `rid` int(11) NOT NULL,
  `Name` text CHARACTER SET latin1 NOT NULL,
  `Type` text CHARACTER SET latin1 NOT NULL,
  `Color` text CHARACTER SET latin1 NOT NULL,
  `Quantity` text CHARACTER SET latin1 NOT NULL,
  `Description` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawitems`
--

INSERT INTO `rawitems` (`rid`, `Name`, `Type`, `Color`, `Quantity`, `Description`) VALUES
(1, 'Cloths', 'Denim', 'Dark blue', '5', '1roll 30yr width'),
(2, 'Cloths', 'Denim', 'Black', '6', 'dhtughyjugi');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `paymentdate` text NOT NULL,
  `salary` text NOT NULL,
  `advance` text NOT NULL,
  `bonus` text NOT NULL,
  `ot` text NOT NULL,
  `totalsalary` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salid`, `tid`, `paymentdate`, `salary`, `advance`, `bonus`, `ot`, `totalsalary`, `Display`) VALUES
(1, 1, '2022-05-08', '30000', '12000', '2000', '5000', '25000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `start_datetime`, `end_datetime`, `description`) VALUES
(1, 'Fronted', '2022-06-19 04:57:00', '2022-06-19 05:57:00', 'Test'),
(3, 'M', '2022-06-19 02:00:00', '2022-06-19 02:00:00', 'M'),
(4, 'dd', '2022-06-19 03:01:00', '2022-06-19 05:01:00', 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `servicecategory`
--

CREATE TABLE `servicecategory` (
  `scatId` int(11) NOT NULL,
  `scatCategory` text NOT NULL,
  `scatDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serId` int(11) NOT NULL,
  `service` text NOT NULL,
  `serDescription` text NOT NULL,
  `scatId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `stlid` int(11) NOT NULL,
  `stlname` text NOT NULL,
  `uploaded` datetime NOT NULL,
  `stldesc` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`stlid`, `stlname`, `uploaded`, `stldesc`, `Display`) VALUES
(1, 'IMG-607dd1f8040e06.17444393.jpg', '2021-04-20 00:44:03', 'Neck Style', 0),
(2, 'IMG-607dd24b2cc190.81756522.jpg', '2021-04-20 00:45:03', 'Back Neck Style', 0),
(3, 'IMG-607dd25eb71466.49018267.jpg', '2021-04-20 00:46:29', 'Back Neck Style', 0),
(4, 'IMG-607dd266ea32a2.51691837.jpg', '2021-04-20 00:46:29', 'Neck Style', 0),
(5, 'IMG-607fedf99a4b73.25278578.jpg', '0000-00-00 00:00:00', 'Neck Style', 0),
(6, 'IMG-607ff0097543b7.19830153.jpg', '0000-00-00 00:00:00', 'Frock Design', 0),
(7, 'IMG-607ff5820be7e6.38438738.jpg', '0000-00-00 00:00:00', 'Frock Design with accessories', 0),
(8, 'IMG-60800205758128.43027457.jpeg', '0000-00-00 00:00:00', 'Male Child t-Shirt Design', 0),
(9, 'IMG-60804ba5b5eb41.95773174.jpg', '2021-04-21 21:28:29', 'Teenage-Boys-Shirts-Long-Sleeve-Solid-Shirt-Boys-Turn-Down-Collar-Shirt-For-Boys-White-Kids', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supid` int(11) NOT NULL,
  `supName` text NOT NULL,
  `supMname` text NOT NULL,
  `supRegno` text NOT NULL,
  `supPno` int(11) NOT NULL,
  `supEmail` text NOT NULL,
  `supAddress` text NOT NULL,
  `Display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supid`, `supName`, `supMname`, `supRegno`, `supPno`, `supEmail`, `supAddress`, `Display`) VALUES
(1, 'ESP TEX', 'Arjun', 'DFG5U', 12345678, 'arshedahmed98@gmail.com', 'Kandy', 0),
(2, 'Epirics', 'Suhail', '462798153', 853421679, 'info@epirics.com', 'No.9F, 1/1/1, Wanarathna Place, Prathibimbarama Road, Kalubowila', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tailorcategory`
--

CREATE TABLE `tailorcategory` (
  `tcatId` int(11) NOT NULL,
  `Category` text NOT NULL,
  `tcatDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tailorcategory`
--

INSERT INTO `tailorcategory` (`tcatId`, `Category`, `tcatDescription`) VALUES
(1, 'cutter', 'asdfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `tailorworklist`
--

CREATE TABLE `tailorworklist` (
  `twlistId` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `workId` int(11) NOT NULL,
  `twlistStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usr_id` text NOT NULL,
  `usr_pass` varchar(255) NOT NULL,
  `usr_type` text NOT NULL,
  `usr_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usr_id`, `usr_pass`, `usr_type`, `usr_status`) VALUES
(1, 'Admin', '202cb962ac59075b964b07152d234b70', 'Admin', 'Active'),
(2, 'Tailor', '202cb962ac59075b964b07152d234b70', 'Tailor', 'Active'),
(3, 'Arshed', '202cb962ac59075b964b07152d234b70', 'Tailor', 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `worklist`
--

CREATE TABLE `worklist` (
  `workId` int(11) NOT NULL,
  `work` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`actId`);

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colour`
--
ALTER TABLE `colour`
  ADD PRIMARY KEY (`colId`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `finisheditems`
--
ALTER TABLE `finisheditems`
  ADD PRIMARY KEY (`fitId`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itid`);

--
-- Indexes for table `itemcategory`
--
ALTER TABLE `itemcategory`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `jobcard`
--
ALTER TABLE `jobcard`
  ADD PRIMARY KEY (`jcid`);

--
-- Indexes for table `jobcarddetails`
--
ALTER TABLE `jobcarddetails`
  ADD PRIMARY KEY (`jcdId`);

--
-- Indexes for table `joblist`
--
ALTER TABLE `joblist`
  ADD PRIMARY KEY (`jlid`);

--
-- Indexes for table `makepayment`
--
ALTER TABLE `makepayment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `measuredetails`
--
ALTER TABLE `measuredetails`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`measId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`odid`);

--
-- Indexes for table `orderreturn`
--
ALTER TABLE `orderreturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD PRIMARY KEY (`ordid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `payrate`
--
ALTER TABLE `payrate`
  ADD PRIMARY KEY (`payrId`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`poid`);

--
-- Indexes for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  ADD PRIMARY KEY (`podId`);

--
-- Indexes for table `purchaseorderreturn`
--
ALTER TABLE `purchaseorderreturn`
  ADD PRIMARY KEY (`poid`);

--
-- Indexes for table `rawitems`
--
ALTER TABLE `rawitems`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salid`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicecategory`
--
ALTER TABLE `servicecategory`
  ADD PRIMARY KEY (`scatId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serId`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`stlid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supid`);

--
-- Indexes for table `tailorcategory`
--
ALTER TABLE `tailorcategory`
  ADD PRIMARY KEY (`tcatId`);

--
-- Indexes for table `tailorworklist`
--
ALTER TABLE `tailorworklist`
  ADD PRIMARY KEY (`twlistId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worklist`
--
ALTER TABLE `worklist`
  ADD PRIMARY KEY (`workId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colour`
--
ALTER TABLE `colour`
  MODIFY `colId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `finisheditems`
--
ALTER TABLE `finisheditems`
  MODIFY `fitId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itemcategory`
--
ALTER TABLE `itemcategory`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobcard`
--
ALTER TABLE `jobcard`
  MODIFY `jcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobcarddetails`
--
ALTER TABLE `jobcarddetails`
  MODIFY `jcdId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joblist`
--
ALTER TABLE `joblist`
  MODIFY `jlid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `makepayment`
--
ALTER TABLE `makepayment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `measuredetails`
--
ALTER TABLE `measuredetails`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `measId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `odid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderreturn`
--
ALTER TABLE `orderreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordertbl`
--
ALTER TABLE `ordertbl`
  MODIFY `ordid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payrate`
--
ALTER TABLE `payrate`
  MODIFY `payrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  MODIFY `podId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorderreturn`
--
ALTER TABLE `purchaseorderreturn`
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rawitems`
--
ALTER TABLE `rawitems`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servicecategory`
--
ALTER TABLE `servicecategory`
  MODIFY `scatId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `stlid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tailorcategory`
--
ALTER TABLE `tailorcategory`
  MODIFY `tcatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tailorworklist`
--
ALTER TABLE `tailorworklist`
  MODIFY `twlistId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `worklist`
--
ALTER TABLE `worklist`
  MODIFY `workId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
