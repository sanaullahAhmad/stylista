-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2013 at 10:20 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `neoglobal_stylista`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'stylista_admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `pk_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT '1',
  `cat_image` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`pk_cat_id`, `category_name`, `category_desc`, `category_status`, `cat_image`) VALUES
(1, 'Electronics', 'this is a test description', 1, 'Penguins.jpg'),
(2, 'Furniture', 'this is a test description', 1, 'Chrysanthemum.jpg'),
(3, 'Mobile', 'this is a test description', 1, 'Desert.jpg'),
(4, 'House Hold', 'this is a test description', 1, 'Tulips.jpg'),
(5, 'Other', 'this is a test description', 1, 'Hydrangeas.jpg'),
(6, 'sanaullah Category', 'sanaullah Category description', 1, 'Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deals`
--

CREATE TABLE IF NOT EXISTS `tbl_deals` (
  `pk_deal_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_name` varchar(255) NOT NULL,
  `deal_description` text NOT NULL,
  `deal_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=payment not verified, 1=payment verified',
  `date_added` datetime NOT NULL,
  `exp_date` datetime NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `deal_image` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_deal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_deals`
--

INSERT INTO `tbl_deals` (`pk_deal_id`, `deal_name`, `deal_description`, `deal_status`, `date_added`, `exp_date`, `fk_user_id`, `deal_image`) VALUES
(4, 'a fasdf ', '<p>\r\n	a dfasf as</p>\r\n', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'Koala.jpg'),
(5, 'sana  Super deal', '<p>\r\n	sana&nbsp; Super dealsana&nbsp; Super dealsana&nbsp; Super dealsana&nbsp; Super deal</p>\r\n', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'Tulips.jpg'),
(6, 'sanaullah', '<p>\r\n	&nbsp;asdfasf asdf</p>\r\n', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'deals_img.png'),
(7, 'jgjghjgj', '<p>\r\n	gjgjghjghj</p>\r\n', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'icon_5.png'),
(8, 'tyutyu', '<p>\r\n	tyut tu tyu tu tyu</p>\r\n', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '1.jpg'),
(9, 'new deal', '<p>\r\n	&nbsp;afrasfas asdf asdf asdf</p>\r\n', 0, '2013-12-21 16:03:00', '0000-00-00 00:00:00', 0, 'about.png'),
(12, 'sanaullah deals', 'sanaullah deals', 0, '2013-01-19 01:01:28', '0000-00-00 00:00:00', 2, 'Blue hills.jpg'),
(13, 'asfsdfasdf', 'asdf asd', 0, '2013-01-19 01:01:19', '0000-00-00 00:00:00', 2, 'Winter.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dynamic_pages`
--

CREATE TABLE IF NOT EXISTS `tbl_dynamic_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort1` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_keywords` text NOT NULL,
  `page_metatags` text NOT NULL,
  `page_description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_dynamic_pages`
--

INSERT INTO `tbl_dynamic_pages` (`id`, `sort1`, `page_title`, `page_name`, `page_keywords`, `page_metatags`, `page_description`, `status`) VALUES
(1, 1, 'About Us', 'About Us', 'About Us', 'About Us', '%3Cp%3E%0D%0A%09About+Us+Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+since+the+1500s%2C+when+an+unknown+printer+took+a+galley+of+type+and+scrambled+it+to+make+a+type+specimen+book.+It+has+survived+not+only+five+centuries%2C+but+also+the+leap+into+electronic+typesetting%2C+remaining+essentially+unchanged.+It+was+popularised+in+the+1960s+with+the+release+of+Letraset+sheets+containing+Lorem+Ipsum+passages%2C+and+more+recently+with+desktop+publishing+software+like+Aldus+PageMaker+including+versions+of+Lorem+Ipsum.+It+is+a+long+established+fact+that+a+reader+will+be+distracted+by+the+readable+content+of+a+page+when+looking+at+its+layout.+The+point+of+using+Lorem+Ipsum+is+that+it+has+a+more-or-less+normal+distribution+of+letters%2C+as+opposed+to+using+%26%2339%3BContent+here%2C+content+here%26%2339%3B%2C+making+it+look+like+readable+English.+Many+desktop+publishing+packages+and+web+page+editors+now+use+Lorem+Ipsum+as+their+default+model+text%2C+and+a+search+for+%26%2339%3Blorem+ipsum%26%2339%3B+will+uncover+many+web+sites+still+in+their+infancy.+Various+versions+have+evolved+over+the+years%2C+sometimes+by+accident%2C+sometimes+on+purpose+%28injected+humour+and+the+like%29.+Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+since+the+1500s%2C+when+an+unknown+printer+took+a+galley+of+type+and+scrambled+it+to+make+a+type+specimen+book.+It+has+survived+not+only+five+centuries%2C+but+also+the+leap+into+electronic+typesetting%2C+remaining+essentially+unchanged.+It+was+popularised+in+the+1960s+with+the+release+of+Letraset+sheets+containing+Lorem+Ipsum+passages%2C+and+more+recently+with+desktop+publishing+software+like+Aldus+PageMaker+including+versions+of+Lorem+Ipsum.+It+is+a+long+established+fact+that+a+reader+will+be+distracted+by+the+readable+content+of+a+page+when+looking+at+its+layout.+The+point+of+using+Lorem+Ipsum+is+that+it+has+a+more-or-less+normal+distribution+of+letters%2C+as+opposed+to+using+%26%2339%3BContent+here%2C+content+here%26%2339%3B%2C+making+it+look+like+readable+English.+Many+desktop+publishing+packages+and+web+page+editors+now+use+Lorem+Ipsum+as+their+default+model+text%2C+and+a+search+for+%26%2339%3Blorem+ipsum%26%2339%3B+will+uncover+many+web+sites+still+in+their+infancy.+Various+versions+have+evolved+over+the+years%2C+sometimes+by+accident%2C+sometimes+on+purpose+%28injected+humour+and+the+like%29.+Contrary+to+popular+belief%2C+Lorem+Ipsum+is+not+simply+random+text.+It+has+roots+in+a+piece+of+classical+Latin+literature+from+45+BC%2C+making+it+over+2000+years+old.+Richard+McClintock%2C+a+Latin+professor+at+Hampden-Sydney+College+in+Virginia%2C+looked+up+one+of+the+more+obscure+Latin+words%2C+consectetur%2C+from+a+Lorem+Ipsum+passage%2C+and+going+through+the+cites+of+the+word+in+classical+literature%2C+discovered+the+undoubtable+source.+Lorem+Ipsum+comes+from+sections+1.10.32+and+1.10.33+of+%26quot%3Bde+Finibus+Bonorum+et+Malorum%26quot%3B+%28The+Extremes+of+Good+and+Evil%29+by+Cicero%2C+written+in+45+BC.+This+book+is+a+treatise+on+the+theory+of+ethics%2C+very+popular+during+the+Renaissance.+The+first+line+of+Lorem+Ipsum%2C+%26quot%3BLorem+ipsum+dolor+sit+amet..%26quot%3B%2C+comes+from+a+line+in+section+1.10.32.+The+standard+chunk+of+Lorem+Ipsum+used+since+the+1500s+is+reproduced+below+for+those+interested.+Sections+1.10.32+and+1.10.33+from+%26quot%3Bde+Finibus+Bonorum+et+Malorum%26quot%3B+by+Cicero+are+also+reproduced+i%3C%2Fp%3E%0D%0A', 1),
(2, 2, 'Shops', 'Shops', 'Shops', 'Shops', '%3Cp%3E%0D%0A%09shops+Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+since+the+1500s%2C+when+an+unknown+printer+took+a+galley+of+type+and+scrambled+it+to+make+a+type+specimen+book.+It+has+survived+not+only+five+centuries%2C+but+also+the+leap+into+electronic+typesetting%2C+remaining+essentially+unchanged.+It+was+popularised+in+the+1960s+with+the+release+of+Letraset+sheets+containing+Lorem+Ipsum+passages%2C+and+more+recently+with+desktop+publishing+software+like+Aldus+PageMaker+including+versions+of+Lorem+Ipsum.+It+is+a+long+established+fact+that+a+reader+will+be+distracted+by+the+readable+content+of+a+page+when+looking+at+its+layout.+The+point+of+using+Lorem+Ipsum+is+that+it+has+a+more-or-less+normal+distribution+of+letters%2C+as+opposed+to+using+%26%2339%3BContent+here%2C+content+here%26%2339%3B%2C+making+it+look+like+readable+English.+Many+desktop+publishing+packages+and+web+page+editors+now+use+Lorem+Ipsum+as+their+default+model+text%2C+and+a+search+for+%26%2339%3Blorem+ipsum%26%2339%3B+will+uncover+many+web+sites+still+in+their+infancy.+Various+versions+have+evolved+over+the+years%2C+sometimes+by+accident%2C+sometimes+on+purpose+%28injected+humour+and+the+like%29.+Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+since+the+1500s%2C+when+an+unknown+printer+took+a+galley+of+type+and+scrambled+it+to+make+a+type+specimen+book.+It+has+survived+not+only+five+centuries%2C+but+also+the+leap+into+electronic+typesetting%2C+remaining+essentially+unchanged.+It+was+popularised+in+the+1960s+with+the+release+of+Letraset+sheets+containing+Lorem+Ipsum+passages%2C+and+more+recently+with+desktop+publishing+software+like+Aldus+PageMaker+including+versions+of+Lorem+Ipsum.+It+is+a+long+established+fact+that+a+reader+will+be+distracted+by+the+readable+content+of+a+page+when+looking+at+its+layout.+The+point+of+using+Lorem+Ipsum+is+that+it+has+a+more-or-less+normal+distribution+of+letters%2C+as+opposed+to+using+%26%2339%3BContent+here%2C+content+here%26%2339%3B%2C+making+it+look+like+readable+English.+Many+desktop+publishing+packages+and+web+page+editors+now+use+Lorem+Ipsum+as+their+default+model+text%2C+and+a+search+for+%26%2339%3Blorem+ipsum%26%2339%3B+will+uncover+many+web+sites+still+in+their+infancy.+Various+versions+have+evolved+over+the+years%2C+sometimes+by+accident%2C+sometimes+on+purpose+%28injected+humour+and+the+like%29.+Contrary+to+popular+belief%2C+Lorem+Ipsum+is+not+simply+random+text.+It+has+roots+in+a+piece+of+classical+Latin+literature+from+45+BC%2C+making+it+over+2000+years+old.+Richard+McClintock%2C+a+Latin+professor+at+Hampden-Sydney+College+in+Virginia%2C+looked+up+one+of+the+more+obscure+Latin+words%2C+consectetur%2C+from+a+Lorem+Ipsum+passage%2C+and+going+through+the+cites+of+the+word+in+classical+literature%2C+discovered+the+undoubtable+source.+Lorem+Ipsum+comes+from+sections+1.10.32+and+1.10.33+of+%26quot%3Bde+Finibus+Bonorum+et+Malorum%26quot%3B+%28The+Extremes+of+Good+and+Evil%29+by+Cicero%2C+written+in+45+BC.+This+book+is+a+treatise+on+the+theory+of+ethics%2C+very+popular+during+the+Renaissance.+The+first+line+of+Lorem+Ipsum%2C+%26quot%3BLorem+ipsum+dolor+sit+amet..%26quot%3B%2C+comes+from+a+line+in+section+1.10.32.+The+standard+chunk+of+Lorem+Ipsum+used+since+the+1500s+is+reproduced+below+for+those+interested.+Sections+1.10.32+and+1.10.33+from+%26quot%3Bde+Finibus+Bonorum+et+Malorum%26quot%3B+by+Cicero+are+also+reproduced+i%3C%2Fp%3E%0D%0A', 1),
(3, 3, 'Products', 'Products', 'Products', 'Products', '%3Cp%3E%0D%0A%09Products+Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+since+the+1500s%2C+when+an+unknown+printer+took+a+galley+of+type+and+scrambled+it+to+make+a+type+specimen+book.+It+has+survived+not+only+five+centuries%2C+but+also+the+leap+into+electronic+typesetting%2C+remaining+essentially+unchanged.+It+was+popularised+in+the+1960s+with+the+release+of+Letraset+sheets+containing+Lorem+Ipsum+passages%2C+and+more+recently+with+desktop+publishing+software+like+Aldus+PageMaker+including+versions+of+Lorem+Ipsum.+It+is+a+long+established+fact+that+a+reader+will+be+distracted+by+the+readable+content+of+a+page+when+looking+at+its+layout.+The+point+of+using+Lorem+Ipsum+is+that+it+has+a+more-or-less+normal+distribution+of+letters%2C+as+opposed+to+using+%26%2339%3BContent+here%2C+content+here%26%2339%3B%2C+making+it+look+like+readable+English.+Many+desktop+publishing+packages+and+web+page+editors+now+use+Lorem+Ipsum+as+their+default+model+text%2C+and+a+search+for+%26%2339%3Blorem+ipsum%26%2339%3B+will+uncover+many+web+sites+still+in+their+infancy.+Various+versions+have+evolved+over+the+years%2C+sometimes+by+accident%2C+sometimes+on+purpose+%28injected+humour+and+the+like%29.+Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+since+the+1500s%2C+when+an+unknown+printer+took+a+galley+of+type+and+scrambled+it+to+make+a+type+specimen+book.+It+has+survived+not+only+five+centuries%2C+but+also+the+leap+into+electronic+typesetting%2C+remaining+essentially+unchanged.+It+was+popularised+in+the+1960s+with+the+release+of+Letraset+sheets+containing+Lorem+Ipsum+passages%2C+and+more+recently+with+desktop+publishing+software+like+Aldus+PageMaker+including+versions+of+Lorem+Ipsum.+It+is+a+long+established+fact+that+a+reader+will+be+distracted+by+the+readable+content+of+a+page+when+looking+at+its+layout.+The+point+of+using+Lorem+Ipsum+is+that+it+has+a+more-or-less+normal+distribution+of+letters%2C+as+opposed+to+using+%26%2339%3BContent+here%2C+content+here%26%2339%3B%2C+making+it+look+like+readable+English.+Many+desktop+publishing+packages+and+web+page+editors+now+use+Lorem+Ipsum+as+their+default+model+text%2C+and+a+search+for+%26%2339%3Blorem+ipsum%26%2339%3B+will+uncover+many+web+sites+still+in+their+infancy.+Various+versions+have+evolved+over+the+years%2C+sometimes+by+accident%2C+sometimes+on+purpose+%28injected+humour+and+the+like%29.+Contrary+to+popular+belief%2C+Lorem+Ipsum+is+not+simply+random+text.+It+has+roots+in+a+piece+of+classical+Latin+literature+from+45+BC%2C+making+it+over+2000+years+old.+Richard+McClintock%2C+a+Latin+professor+at+Hampden-Sydney+College+in+Virginia%2C+looked+up+one+of+the+more+obscure+Latin+words%2C+consectetur%2C+from+a+Lorem+Ipsum+passage%2C+and+going+through+the+cites+of+the+word+in+classical+literature%2C+discovered+the+undoubtable+source.+Lorem+Ipsum+comes+from+sections+1.10.32+and+1.10.33+of+%26quot%3Bde+Finibus+Bonorum+et+Malorum%26quot%3B+%28The+Extremes+of+Good+and+Evil%29+by+Cicero%2C+written+in+45+BC.+This+book+is+a+treatise+on+the+theory+of+ethics%2C+very+popular+during+the+Renaissance.+The+first+line+of+Lorem+Ipsum%2C+%26quot%3BLorem+ipsum+dolor+sit+amet..%26quot%3B%2C+comes+from+a+line+in+section+1.10.32.+The+standard+chunk+of+Lorem+Ipsum+used+since+the+1500s+is+reproduced+below+for+those+interested.+Sections+1.10.32+and+1.10.33+from+%26quot%3Bde+Finibus+Bonorum+et+Malorum%26quot%3B+by+Cicero+are+also+reproduced+i%3C%2Fp%3E%0D%0A', 1),
(4, 4, 'Deals', 'Deals', 'Deals', 'Deals', '%3Cp%3E%0D%0A%09Deals+Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+since+the+1500s%2C+when+an+unknown+printer+took+a+galley+of+type+and+scrambled+it+to+make+a+type+specimen+book.+It+has+survived+not+only+five+centuries%2C+but+also+the+leap+into+electronic+typesetting%2C+remaining+essentially+unchanged.+It+was+popularised+in+the+1960s+with+the+release+of+Letraset+sheets+containing+Lorem+Ipsum+passages%2C+and+more+recently+with+desktop+publishing+software+like+Aldus+PageMaker+including+versions+of+Lorem+Ipsum.+It+is+a+long+established+fact+that+a+reader+will+be+distracted+by+the+readable+content+of+a+page+when+looking+at+its+layout.+The+point+of+using+Lorem+Ipsum+is+that+it+has+a+more-or-less+normal+distribution+of+letters%2C+as+opposed+to+using+%26%2339%3BContent+here%2C+content+here%26%2339%3B%2C+making+it+look+like+readable+English.+Many+desktop+publishing+packages+and+web+page+editors+now+use+Lorem+Ipsum+as+their+default+model+text%2C+and+a+search+for+%26%2339%3Blorem+ipsum%26%2339%3B+will+uncover+many+web+sites+still+in+their+infancy.+Various+versions+have+evolved+over+the+years%2C+sometimes+by+accident%2C+sometimes+on+purpose+%28injected+humour+and+the+like%29.+Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry.+Lorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+since+the+1500s%2C+when+an+unknown+printer+took+a+galley+of+type+and+scrambled+it+to+make+a+type+specimen+book.+It+has+survived+not+only+five+centuries%2C+but+also+the+leap+into+electronic+typesetting%2C+remaining+essentially+unchanged.+It+was+popularised+in+the+1960s+with+the+release+of+Letraset+sheets+containing+Lorem+Ipsum+passages%2C+and+more+recently+with+desktop+publishing+software+like+Aldus+PageMaker+including+versions+of+Lorem+Ipsum.+It+is+a+long+established+fact+that+a+reader+will+be+distracted+by+the+readable+content+of+a+page+when+looking+at+its+layout.+The+point+of+using+Lorem+Ipsum+is+that+it+has+a+more-or-less+normal+distribution+of+letters%2C+as+opposed+to+using+%26%2339%3BContent+here%2C+content+here%26%2339%3B%2C+making+it+look+like+readable+English.+Many+desktop+publishing+packages+and+web+page+editors+now+use+Lorem+Ipsum+as+their+default+model+text%2C+and+a+search+for+%26%2339%3Blorem+ipsum%26%2339%3B+will+uncover+many+web+sites+still+in+their+infancy.+Various+versions+have+evolved+over+the+years%2C+sometimes+by+accident%2C+sometimes+on+purpose+%28injected+humour+and+the+like%29.+Contrary+to+popular+belief%2C+Lorem+Ipsum+is+not+simply+random+text.+It+has+roots+in+a+piece+of+classical+Latin+literature+from+45+BC%2C+making+it+over+2000+years+old.+Richard+McClintock%2C+a+Latin+professor+at+Hampden-Sydney+College+in+Virginia%2C+looked+up+one+of+the+more+obscure+Latin+words%2C+consectetur%2C+from+a+Lorem+Ipsum+passage%2C+and+going+through+the+cites+of+the+word+in+classical+literature%2C+discovered+the+undoubtable+source.+Lorem+Ipsum+comes+from+sections+1.10.32+and+1.10.33+of+%26quot%3Bde+Finibus+Bonorum+et+Malorum%26quot%3B+%28The+Extremes+of+Good+and+Evil%29+by+Cicero%2C+written+in+45+BC.+This+book+is+a+treatise+on+the+theory+of+ethics%2C+very+popular+during+the+Renaissance.+The+first+line+of+Lorem+Ipsum%2C+%26quot%3BLorem+ipsum+dolor+sit+amet..%26quot%3B%2C+comes+from+a+line+in+section+1.10.32.+The+standard+chunk+of+Lorem+Ipsum+used+since+the+1500s+is+reproduced+below+for+those+interested.+Sections+1.10.32+and+1.10.33+from+%26quot%3Bde+Finibus+Bonorum+et+Malorum%26quot%3B+by+Cicero+are+also+reproduced+i%3C%2Fp%3E%0D%0A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE IF NOT EXISTS `tbl_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `event_name`, `event_date`, `event_description`, `status`) VALUES
(1, 'Fourth Council meeting of the Press Council', 'December 21, 2012', '<p>\r\n	The fourth Council meeting of the Press Council of Pakistan was held under the Chairmanship of Raja Shafqat Abbasi on December21, 2012 at Islamabad Secretariat.</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow`
--

CREATE TABLE IF NOT EXISTS `tbl_follow` (
  `pk_follow_id` int(10) NOT NULL AUTO_INCREMENT,
  `fk_follower_id` int(10) NOT NULL,
  `fk_followee_id` int(10) NOT NULL,
  PRIMARY KEY (`pk_follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_follow`
--

INSERT INTO `tbl_follow` (`pk_follow_id`, `fk_follower_id`, `fk_followee_id`) VALUES
(21, 2, 1),
(22, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_image_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort1` int(11) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image_description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_intro`
--

CREATE TABLE IF NOT EXISTS `tbl_intro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intro_title` varchar(255) NOT NULL,
  `intro_description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_intro`
--

INSERT INTO `tbl_intro` (`id`, `intro_title`, `intro_description`, `status`) VALUES
(1, 'Welcome to the Press Council of Pakistan', '<p>\r\n	The Press Council of Pakistan is an autonomous and independent apex body which issue and monitor good standards of media practice. The main ambits of the Council are:</p>\r\n<p>\r\n	&nbsp;</p>\r\n<ol>\r\n	<li>\r\n		To receive complaints about the violation of Ethical Code of Practice relating to newspapers, news agencies, editors and journalists.</li>\r\n	<li>\r\n		To revise, update, enforce and implement the Ethical Code of Practice for the newspapers, news agencies, editors, journalists and publishers as laid down in the Schedule to this Ordinance.<br />\r\n		&nbsp;</li>\r\n</ol>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE IF NOT EXISTS `tbl_package` (
  `pk_package_id` int(11) NOT NULL AUTO_INCREMENT,
  `pkg_name` varchar(255) NOT NULL,
  `pkg_desc` text NOT NULL,
  `pkg_price` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`pk_package_id`, `pkg_name`, `pkg_desc`, `pkg_price`) VALUES
(1, 'shop', 'this is a test description', '500'),
(2, 'product', 'this is a test description', '300'),
(3, 'deals', 'this is a test description', '250');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `pk_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `available_till` varchar(50) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `date_added` datetime NOT NULL,
  `exp_date` datetime NOT NULL,
  `fk_store_id` int(11) NOT NULL DEFAULT '0',
  `fk_cat_id` int(11) NOT NULL DEFAULT '0' COMMENT '0=if no category',
  `fk_user_id` int(10) NOT NULL,
  `prd_main_image` varchar(255) NOT NULL,
  `prd_thumb_1` varchar(255) NOT NULL,
  `prd_thumb_2` varchar(255) NOT NULL,
  `prd_thumb_3` varchar(255) NOT NULL,
  `prd_thumb_4` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pk_product_id`, `product_name`, `price`, `available_till`, `product_num`, `product_desc`, `date_added`, `exp_date`, `fk_store_id`, `fk_cat_id`, `fk_user_id`, `prd_main_image`, `prd_thumb_1`, `prd_thumb_2`, `prd_thumb_3`, `prd_thumb_4`) VALUES
(26, 'shirt', '', '', '', '<p>\r\n	this is shirt</p>\r\n', '2013-12-21 16:03:00', '0000-00-00 00:00:00', 0, 1, 0, 'item_1.png', '', '', '', ''),
(27, 'tie', '', '', '', '<p>\r\n	this is tie</p>\r\n', '2013-12-21 16:03:00', '0000-00-00 00:00:00', 0, 2, 0, 'item_2.png', '', '', '', ''),
(28, 'Paints', '', '', '', '<p>\r\n	this is a paint</p>\r\n', '2013-12-21 16:03:00', '0000-00-00 00:00:00', 0, 3, 0, 'item_3.png', '', '', '', ''),
(29, 'jaket', '', '', '', '<p>\r\n	this is a jaket</p>\r\n', '2013-12-21 16:03:00', '0000-00-00 00:00:00', 0, 4, 0, 'item_4.png', '', '', '', ''),
(30, 'item 9', '', '', '', '<p>\r\n	this is item 9</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0, 'item_5.png', '', '', '', ''),
(31, 'sana  Super Store', '', '', '', '<p>\r\n	this is item 6</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 2, 0, 'item_6.png', '', '', '', ''),
(32, 'item 11', '', '', '', '<p>\r\n	item 11 dex</p>\r\n', '2012-12-25 15:10:51', '0000-00-00 00:00:00', 0, 3, 0, 'item_5.png', '', '', '', ''),
(33, 'sdfasdf', '', '', '', '<p>\r\n	af sfds fasdfa sdf</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 4, 0, 'item_3.png', '', '', '', ''),
(34, 'dfasdf', '', '', '', '<p>\r\n	asfa sasdfa sdf as</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0, 'item_2.png', '', '', '', ''),
(35, 'khkgh', '', '', '', '<p>\r\n	ghkghjkghk</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 2, 0, 'item_1.png', '', '', '', ''),
(36, 'l;klj;', '', '', '', '<p>\r\n	jkl;jkl;jkl;jkl;jk</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3, 0, 'item_5.png', '', '', '', ''),
(37, '  dfgsdfg ', '', '', '', '<p>\r\n	sdfgsdfg</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 4, 0, 'item_2.png', '', '', '', ''),
(38, 'sdfsdf', '', '', '', '<p>\r\n	s dfsdf ssd sdfs sdfs</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0, 'item_2.png', '', '', '', ''),
(39, 'sdf', '', '', '', '<p>\r\n	&nbsp;sdf sdf</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 4, 0, 'item_3.png', '', '', '', ''),
(40, 'ghjgh', '', '', '', '<p>\r\n	ghj ghj ghj ghjg ghjg ghjghjjgjgthj</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0, 'item_1.png', '', '', '', ''),
(41, ' gfhfgh', '', '', '', '<p>\r\n	fg hfgh</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 2, 0, 'item_6.png', '', '', '', ''),
(42, 'tyutyu', '', '', '', '<p>\r\n	tyut t tyu yt tyutyu&nbsp; tyuty ty t ty utyutyuty</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3, 0, 'item_1.png', '', '', '', ''),
(43, 'sana  Super Store', '', '', '', '<p>\r\n	sdfsdf sdf sdf</p>\r\n', '2012-12-25 15:10:51', '0000-00-00 00:00:00', 0, 4, 0, 'item_6.png', '', '', '', ''),
(44, 'dfasdf', '', '', '', '<p>\r\n	sdf sdfs sdf sdf sdf</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0, 'item_1.png', '', '', '', ''),
(45, 'test dealdd', '', '', '', '<p>\r\n	sdfs sf</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 2, 0, 'item_5.png', '', '', '', ''),
(46, 'this is sanaullah', '', '', '', '<p>\r\n	&nbsp;sdfsdf</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3, 0, 'item_4.png', '', '', '', ''),
(47, 'dfasdf', '', '', '', '<p>\r\n	sdfs dsfsdf</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 4, 0, 'item_2.png', '', '', '', ''),
(51, 'a asdfa adfasd', '', '', '', 'asdfasdfa asdfasdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 'Desert.jpg', '', '', '', ''),
(52, 'sanaullah Product', '', '', '', 'this is description of this product', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 'Penguins.jpg', 'Koala.jpg', 'Lighthouse.jpg', 'Tulips.jpg', 'Jellyfish.jpg'),
(53, 'new', '', '', '', 'New', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 'Tulips.jpg', 'Penguins.jpg', '', '', ''),
(54, 'brand new brand', '', '', '', 'sanaullah', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 'Chrysanthemum.jpg', 'Hydrangeas.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Tulips.jpg'),
(55, 'sanaullah Pero', '', '', '', 'this is des', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 46, 6, 2, 'Chrysanthemum.jpg', 'Desert.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Koala.jpg'),
(56, 'testing', 'testing', 'testing', '', 'testing testing', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 48, 6, 2, 'Winter.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `pk_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(255) NOT NULL,
  `slider_status` int(11) NOT NULL DEFAULT '1',
  `image_name` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_slider_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`pk_slider_id`, `slider_name`, `slider_status`, `image_name`) VALUES
(2, 'slider 1', 1, 'DSC_0690.jpg'),
(3, 'slider 2', 1, 'DSC_0057.JPG'),
(4, 'slider 3', 1, 'DSC_0097.JPG'),
(5, 'slider 4', 1, 'DSC_0079.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE IF NOT EXISTS `tbl_store` (
  `pk_store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) NOT NULL,
  `store_description` text NOT NULL,
  `store_address` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `exp_date` datetime NOT NULL,
  `store_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=payment not verified, 1=payment verified',
  `fk_user_id` int(11) NOT NULL,
  `store_image` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_store_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_store`
--

INSERT INTO `tbl_store` (`pk_store_id`, `store_name`, `store_description`, `store_address`, `date_added`, `exp_date`, `store_status`, `fk_user_id`, `store_image`) VALUES
(3, 'waqarSuper Store vvv', 'fa sdfasd asdfasdfsdfasdf\r\n', '', '2013-12-21 16:03:00', '2013-02-21 16:03:00', 1, 2, 'Koala.jpg'),
(18, 'sanaullah', '<p>\r\n	this is sanaullah</p>\r\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 'Tulips.jpg'),
(19, 'fsdf ', '<p>\r\n	sdfsdfsd&nbsp; sf sf sdf sdfs sdf sdf s sf</p>\r\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 'Lighthouse.jpg'),
(20, 'dfsdf', '<p>\r\n	sdfsdfsd</p>\r\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 'Koala.jpg'),
(46, 'asdasd', 'asdasd', 'this is address', '2013-01-18 11:01:30', '0000-00-00 00:00:00', 0, 2, 'Desert.jpg'),
(47, 'fsdfsd', 'sdfs df', 'sdfsd', '2013-01-23 12:01:49', '0000-00-00 00:00:00', 0, 2, 'Water lilies.jpg'),
(48, 'sanaullah new shop', 'sanaullah new shop asdas', 'sanaullah new shop adress', '2013-01-23 01:01:32', '0000-00-00 00:00:00', 0, 2, 'Winter.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `pk_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `nic_num` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL COMMENT 'will be taken as user_name for login process',
  `location` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_status` int(2) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_type` int(10) NOT NULL,
  PRIMARY KEY (`pk_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`pk_user_id`, `full_name`, `nic_num`, `shop_name`, `location`, `user_email`, `user_password`, `user_phone`, `user_status`, `user_image`, `user_type`) VALUES
(1, 'Muhammed Ahmed Baig', '37405-6441053-1', 'baig772', 'Rawalpindi', 'baig772@gmail.com', '1234', '03215624662', 1, 'Blue hills.jpg', 1),
(2, 'sanaullah', 'sana', 'sanashop', 'my location', 'sanaullahAhmad@gmail.com', '03329620292', '03135444791', 0, 'Chrysanthemum.jpg', 1),
(6, 'new', '1430181503023', 'new user', 'fsdafds', 'new@new.com', '123', 'asdfasdf', 0, 'Koala.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_list`
--

CREATE TABLE IF NOT EXISTS `tbl_user_list` (
  `pk_userlist_id` int(10) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(10) NOT NULL,
  `list_name` varchar(100) NOT NULL,
  PRIMARY KEY (`pk_userlist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_user_list`
--

INSERT INTO `tbl_user_list` (`pk_userlist_id`, `fk_user_id`, `list_name`) VALUES
(38, 2, 'sdfs'),
(39, 2, 'sana list'),
(40, 2, 'sana4'),
(41, 2, 'sana6'),
(42, 2, 'sana9'),
(43, 2, 'sdfs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_list_products`
--

CREATE TABLE IF NOT EXISTS `tbl_user_list_products` (
  `pk_userlistpro_id` int(10) NOT NULL AUTO_INCREMENT,
  `fk_user_list_id` int(10) NOT NULL,
  `fk_product_id` int(10) NOT NULL,
  `fk_user_id` int(10) NOT NULL,
  PRIMARY KEY (`pk_userlistpro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=219 ;

--
-- Dumping data for table `tbl_user_list_products`
--

INSERT INTO `tbl_user_list_products` (`pk_userlistpro_id`, `fk_user_list_id`, `fk_product_id`, `fk_user_id`) VALUES
(191, 39, 28, 0),
(199, 43, 27, 0),
(201, 39, 27, 0),
(202, 39, 30, 0),
(203, 39, 31, 0),
(204, 39, 32, 0),
(206, 42, 54, 0),
(207, 42, 56, 0),
(208, 40, 47, 0),
(209, 43, 47, 0),
(210, 38, 27, 0),
(211, 40, 26, 0),
(212, 40, 33, 0),
(213, 42, 26, 0),
(217, 40, 35, 0),
(218, 42, 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_pkg`
--

CREATE TABLE IF NOT EXISTS `tbl_user_pkg` (
  `pk_user_pkg_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(11) NOT NULL,
  `fk_pkg_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_user_pkg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE IF NOT EXISTS `tbl_wishlist` (
  `pk_wishlist_id` int(10) NOT NULL AUTO_INCREMENT,
  `fk_product_id` int(10) NOT NULL,
  `fk_user_id` int(10) NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`pk_wishlist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`pk_wishlist_id`, `fk_product_id`, `fk_user_id`, `time`) VALUES
(17, 27, 2, '13-01-30 05:01:41'),
(18, 28, 2, '13-01-30 05:01:44'),
(19, 31, 2, '13-01-30 05:01:50'),
(20, 26, 2, '13-01-30 06:01:01'),
(21, 54, 2, '13-01-30 11:01:44'),
(22, 27, 2, '13-01-31 02:01:05'),
(23, 27, 2, '13-01-31 02:01:01'),
(24, 30, 2, '13-01-31 02:01:57'),
(25, 39, 2, '13-01-31 02:01:01'),
(26, 32, 2, '13-01-31 04:01:30'),
(27, 37, 2, '13-01-31 04:01:00'),
(28, 29, 2, '13-01-31 08:01:27'),
(29, 34, 1, '13-01-31 08:01:09'),
(30, 27, 1, '13-01-31 10:01:46'),
(31, 46, 2, '13-02-02 01:02:30'),
(32, 38, 2, '13-02-02 01:02:24'),
(33, 34, 2, '13-02-07 02:02:22'),
(34, 35, 2, '13-02-07 02:02:31'),
(35, 41, 2, '13-02-14 01:02:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
