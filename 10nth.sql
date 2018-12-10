/*
SQLyog Community Edition- MySQL GUI v5.22a
Host - 5.1.30-community : Database - transy
*********************************************************************
Server version : 5.1.30-community
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `transy`;

USE `transy`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `photos` */

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `photos` */

insert  into `photos`(`id`,`location`,`caption`) values (3,'photos/the_joker_cartoon.jpg','caption'),(4,'photos/220px-Dark_Knight.jpg','batman');

/*Table structure for table `tblclient` */

DROP TABLE IF EXISTS `tblclient`;

CREATE TABLE `tblclient` (
  `cl_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(25) DEFAULT NULL,
  `cl_surname` varchar(25) DEFAULT NULL,
  `cl_cellno` varchar(10) DEFAULT NULL,
  `cl_email` varchar(20) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `cl_date` date DEFAULT NULL,
  PRIMARY KEY (`cl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `tblclient` */

insert  into `tblclient`(`cl_no`,`cl_name`,`cl_surname`,`cl_cellno`,`cl_email`,`user_id`,`cl_date`) values (00001,'Hendry','Tompson','0741234569','hentom@gmail.com',39,'2018-11-23'),(00002,'Bongane','Simelane','0718529631','bonsim@gmail.com',NULL,'2018-11-13'),(00003,'Keith','Krugel','0826598745','keikru@gmail.com',NULL,'2018-11-22'),(00004,'Zakhele','Sithole','0600032582','zaksit@gmail.com',NULL,'2018-11-23'),(00005,'Michelle','Bower','0728513698','micbow@gmail.com',NULL,'2018-11-29'),(00006,'Mabuyi','Mokoena','0831478523','mabmok@gmail.com',NULL,'2018-11-23'),(00007,'Sarah','Nell','0762144911','sarnel@gmail.com',NULL,'2018-11-13'),(00008,'Ike','Nomazulu','0762434951','ikenom@gmail.com',NULL,'2018-11-29'),(00009,'Mike','Stevens','0734567398','mikste@gmail.com',NULL,'2018-11-22'),(00010,'Zake','Wallens','0762144914','zakwal@gmail.com',NULL,'2018-11-28'),(00011,'John','Themba','0832576895','johthe@gmail.com',NULL,'2018-11-23'),(00012,'Sizwe','Khumalo','0762344658','sizkhu@gmail.com',NULL,'2018-11-13'),(00013,'Sandile','Shabangu','0634586798','sansha@gmail.com',NULL,'2018-11-22'),(00014,'Michael','Nkosi','0762144923','micnko@gmail.com',NULL,'2018-11-28'),(00015,'Faizel','Naidoo','0723475968','fainai@gmail.com',NULL,'2018-11-29'),(00016,'Zake','Phillips','0713473468','zakphi@gmail.com',NULL,'2018-11-22'),(00017,'Mike','Skosana','0723445954','miksko@gmail.com',NULL,'2018-11-23'),(00018,'Keisha','Ledimo','0733471258','keiled@gmail.com',NULL,'2018-11-13'),(00019,'Lebo','Mokoena','0723473457','lebmok@gmail.com',NULL,'2018-11-22'),(00020,'Lasaros','Gumani','0765423467','lasgum@gmail.com',NULL,'2018-11-29'),(00021,'Precious','Mgidi','0723475876','premgi@gmail.com',NULL,'2018-11-13'),(00022,'John','Sefako','0632749576','johsef@gmail.com',NULL,'2018-11-22'),(00023,'Jooseph','Maroga','0723475945','joomar@gmail.com',NULL,'2018-11-23'),(00024,'Zaka','Simelani','0824566979','zaksim@gmail.com',NULL,'2018-11-13'),(00025,'Rayah','Malatji','0637685943','raymal@gmail.com',NULL,'2018-11-29'),(00026,'Andrew','Nkamoni','0745768493','andnka@gmail.com',NULL,'2018-11-23'),(00027,'Andris','Mokwana','0834756983','andmok@gmail.com',NULL,'2018-11-28'),(00028,'Andy','Lebese','0714759674','andleb@gmail.com',NULL,'2018-11-13'),(00029,'Given','Sithole','0606583645','givsit@gmail.com',NULL,'2018-11-22'),(00030,'Sphe','Lebepe','0795564354','sphleb@gmail.com',NULL,'2018-11-28'),(00032,'Mike','Khumalo','0721548914','xse@gmail.com',NULL,'2018-11-29'),(00033,'Kat','Mokwena','0765973125','kat@gmail.com',33,'2018-11-27'),(00042,'jack','mabu','0125896312','jack@gmail.com',38,'2018-11-27');

/*Table structure for table `tbldriver` */

DROP TABLE IF EXISTS `tbldriver`;

CREATE TABLE `tbldriver` (
  `dr_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `dr_name` varchar(15) DEFAULT NULL,
  `dr_surname` varchar(15) DEFAULT NULL,
  `dr_email` varchar(20) DEFAULT NULL,
  `dr_cellno` varchar(10) DEFAULT NULL,
  `dr_licenseType` varchar(8) DEFAULT NULL,
  `dr_amount` float(5,2) DEFAULT NULL,
  `loc_no` int(5) unsigned DEFAULT NULL,
  `dr_experience` varchar(50) DEFAULT NULL,
  `dr_image` varchar(100) DEFAULT NULL,
  `cl_no` int(5) DEFAULT NULL,
  PRIMARY KEY (`dr_no`),
  KEY `FK_tbldriver` (`loc_no`),
  CONSTRAINT `FK_tbldriver` FOREIGN KEY (`loc_no`) REFERENCES `tbllocation` (`loc_no`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

/*Data for the table `tbldriver` */

insert  into `tbldriver`(`dr_no`,`dr_name`,`dr_surname`,`dr_email`,`dr_cellno`,`dr_licenseType`,`dr_amount`,`loc_no`,`dr_experience`,`dr_image`,`cl_no`) values (00000,'Will','Dannahh','wildan@gmail.com','0727838986','Code 8',652.00,1,'Bus Driver','Images/Drivers/will.jpg',38),(00001,'Peter','Mahlangu','petmah@gmail.com','0712589362','Code 10',120.00,1,'Trucks','Images/Drivers/clive.jpg',39),(00002,'Xolani','Ngamone','xolsim@gmail.com','0826985123','Code 14',300.00,1,'Delivery driver','Images/Drivers/judy.jpg',32),(00003,'Clive','Lebepe','clileb@gmail.com','0745698125','Code 8',150.00,1,'Bus driver','Images/Drivers/junior.jpg',38),(00004,'Junior','Tlou','juntlo@gmail.com','0836589125','Code 8',220.00,1,'Uber driver','Images/Drivers/katlego.jpg',39),(00005,'Phillip','Simelane','phisim@gmail.com','0731258478','Code 8',420.00,1,'Delivery driver','Images/Drivers/phillip.jpg',32),(00072,'mpho','lebepe','mpho@gmail.com','0826985124','Code 10',350.00,1,'5 years','Images/Drivers/mpho.jpg',38),(00073,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,39);

/*Table structure for table `tblfeatures` */

DROP TABLE IF EXISTS `tblfeatures`;

CREATE TABLE `tblfeatures` (
  `f_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `f_feature` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`f_no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tblfeatures` */

insert  into `tblfeatures`(`f_no`,`f_feature`) values (00001,'pdc'),(00002,'Leather seat'),(00003,'Sunroof'),(00004,'Sportpack'),(00005,'Navigation System'),(00006,'Anti Collusion Syste'),(00007,'Refridgerator'),(00008,'Remote keyless entry'),(00009,'Anti-locks brakes'),(00010,'Electronic stability');

/*Table structure for table `tblhiredriver` */

DROP TABLE IF EXISTS `tblhiredriver`;

CREATE TABLE `tblhiredriver` (
  `hr_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `dr_no` int(5) unsigned DEFAULT NULL,
  `cl_no` int(5) unsigned DEFAULT NULL,
  `hr_date` date DEFAULT NULL,
  PRIMARY KEY (`hr_no`),
  KEY `FK_tblhiredriver` (`dr_no`),
  KEY `FK_tbldriverClient` (`cl_no`),
  CONSTRAINT `FK_tbldriverClient` FOREIGN KEY (`cl_no`) REFERENCES `tblclient` (`cl_no`),
  CONSTRAINT `FK_tblhiredriver` FOREIGN KEY (`dr_no`) REFERENCES `tbldriver` (`dr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tblhiredriver` */

insert  into `tblhiredriver`(`hr_no`,`dr_no`,`cl_no`,`hr_date`) values (00001,1,1,'2018-06-01'),(00002,2,2,'2018-06-02'),(00003,3,3,'2018-07-01'),(00004,4,4,'2018-06-03'),(00005,5,5,'2018-07-04'),(00010,1,10,'2018-07-15'),(00019,3,1,'2018-11-26'),(00020,3,42,'2018-11-26'),(00021,0,42,'2018-11-27'),(00022,4,42,'2018-11-27');

/*Table structure for table `tblhirevehicle` */

DROP TABLE IF EXISTS `tblhirevehicle`;

CREATE TABLE `tblhirevehicle` (
  `hv_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `v_no` int(5) unsigned DEFAULT NULL,
  `cl_no` int(5) unsigned DEFAULT NULL,
  `hv_date` date DEFAULT NULL,
  PRIMARY KEY (`hv_no`),
  KEY `FK_tblhirevehicle` (`v_no`),
  KEY `FK_tblhirevehcle` (`cl_no`),
  CONSTRAINT `FK_tblhirevehcle` FOREIGN KEY (`cl_no`) REFERENCES `tblclient` (`cl_no`),
  CONSTRAINT `FK_tblhirevehicle` FOREIGN KEY (`v_no`) REFERENCES `tblvehicle` (`v_no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tblhirevehicle` */

insert  into `tblhirevehicle`(`hv_no`,`v_no`,`cl_no`,`hv_date`) values (00001,1,11,'2018-06-02'),(00002,2,12,'2018-07-01'),(00003,3,13,'2018-06-29'),(00004,4,14,'2018-06-10'),(00005,5,15,'2018-07-03'),(00006,6,16,'2018-06-01'),(00007,7,17,'2018-07-20'),(00008,1,18,'2018-07-01'),(00009,4,19,'2018-06-11'),(00010,3,20,'2018-07-14');

/*Table structure for table `tbljoinliftclub` */

DROP TABLE IF EXISTS `tbljoinliftclub`;

CREATE TABLE `tbljoinliftclub` (
  `jlc_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `lc_no` int(5) unsigned DEFAULT NULL,
  `cl_no` int(5) unsigned DEFAULT NULL,
  `jlc_date` date DEFAULT NULL,
  `jlc_space` int(5) NOT NULL,
  PRIMARY KEY (`jlc_no`),
  KEY `FK_tbljoinliftclub` (`cl_no`),
  KEY `FK_tbljoinlifclub` (`lc_no`),
  CONSTRAINT `FK_tbljoinlifclub` FOREIGN KEY (`lc_no`) REFERENCES `tblliftclub` (`lc_no`),
  CONSTRAINT `FK_tbljoinliftclub` FOREIGN KEY (`cl_no`) REFERENCES `tblclient` (`cl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbljoinliftclub` */

insert  into `tbljoinliftclub`(`jlc_no`,`lc_no`,`cl_no`,`jlc_date`,`jlc_space`) values (00004,3,21,'2018-06-25',1),(00005,4,22,'2018-07-21',2),(00006,5,23,'2018-06-22',3),(00007,7,24,'2018-06-06',2),(00008,5,25,'2018-07-04',1),(00009,4,26,'2018-06-05',3),(00010,3,27,'2018-07-06',2),(00011,9,32,'2018-08-15',0),(00012,9,32,'2018-08-15',0);

/*Table structure for table `tblliftclub` */

DROP TABLE IF EXISTS `tblliftclub`;

CREATE TABLE `tblliftclub` (
  `lc_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `lc_name` varchar(15) DEFAULT NULL,
  `lc_surname` varchar(15) DEFAULT NULL,
  `lc_cellno` varchar(10) DEFAULT NULL,
  `lc_email` varchar(20) DEFAULT NULL,
  `lc_description` varchar(50) DEFAULT NULL,
  `lc_maxPassengers` int(5) DEFAULT NULL,
  `lc_amount` float(9,2) DEFAULT NULL,
  `lc_DesNo` int(5) unsigned DEFAULT NULL,
  `lc_DesTime` time DEFAULT NULL,
  `lc_DepNo` int(5) unsigned DEFAULT NULL,
  `lc_DepTime` time DEFAULT NULL,
  `lc_date` date DEFAULT NULL,
  PRIMARY KEY (`lc_no`),
  KEY `FK_tblliftclub` (`lc_DesNo`),
  KEY `FK_tblliftclub1` (`lc_DepNo`),
  CONSTRAINT `FK_tblliftclub` FOREIGN KEY (`lc_DesNo`) REFERENCES `tbllocation` (`loc_no`),
  CONSTRAINT `FK_tblliftclub1` FOREIGN KEY (`lc_DepNo`) REFERENCES `tbllocation` (`loc_no`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tblliftclub` */

insert  into `tblliftclub`(`lc_no`,`lc_name`,`lc_surname`,`lc_cellno`,`lc_email`,`lc_description`,`lc_maxPassengers`,`lc_amount`,`lc_DesNo`,`lc_DesTime`,`lc_DepNo`,`lc_DepTime`,`lc_date`) values (00001,'Mariah','Maake','0742589365','marmaa@gmail.com','Travelling 6 days a week, back and forth',4,120.00,1,'08:00:00',2,'06:30:00','2018-11-23'),(00002,'Martin','Scott','0602589632','marsco@gmail.com','Travelling only on saturdays',3,350.00,3,'10:30:00',4,'08:00:00','2018-11-24'),(00003,'Carlos','Meyer','0762465322','carmey@gmail.com','Travelling on mondays and Thursdays',3,450.00,5,'11:00:00',6,'10:00:00','2018-11-26'),(00004,'Koos','Botha','0835214789','koobot@gmail.com','Travelling on weekdays',4,620.00,7,'04:30:00',1,'04:00:00','2018-11-29'),(00005,'Jacob','Nelson','0822952864','jacnel@gmail.com','Travelling all week',2,240.00,5,'08:00:00',1,'07:00:00','2018-11-29'),(00006,'Paul','Eksteen','0794561258','paueks@gmail.com','Travelling only on wednesdays',3,280.00,5,'18:00:00',1,'14:00:00','2018-11-28'),(00007,'Dorothy','Jacobs','0836541236','dorjac@gmail.com','Travelling on weekends only',4,160.00,5,'17:00:00',1,'13:00:00','2018-11-21'),(00008,'Dee','Masha','0726541287','deemas@gmail.com','Travelling on weekdays',2,150.00,5,'11:00:00',1,'13:00:00','2018-11-27'),(00009,'Vee','Cele','0836751236','veecel@gmail.com','Everyday',4,200.00,5,'15:00:00',1,'16:00:00','2018-11-22'),(00010,'Judy','Ladwaba','0736541267','judlad@gmail.com','Travelling all week',3,210.00,5,'15:30:00',1,'18:00:00','2018-11-20');

/*Table structure for table `tbllocation` */

DROP TABLE IF EXISTS `tbllocation`;

CREATE TABLE `tbllocation` (
  `loc_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `loc_town` varchar(25) DEFAULT NULL,
  `prov_no` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`loc_no`),
  KEY `FK_tbllocation` (`prov_no`),
  CONSTRAINT `FK_tbllocation` FOREIGN KEY (`prov_no`) REFERENCES `tblprovince` (`prov_no`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbllocation` */

insert  into `tbllocation`(`loc_no`,`loc_town`,`prov_no`) values (00001,'Ermelo',1),(00002,'Witbank',1),(00003,'Benoni',1),(00004,'Barberton',1),(00005,'Ranburg',20),(00006,'Polokwane',19),(00007,'Bela-Bela',19),(00009,'Springbok',17),(00010,'East London',16),(00011,'Grahamstown',16),(00012,'Rustenburg',21),(00013,'Newcastle',15),(00014,'Richards Bay',15),(00015,'Ballito',15),(00016,'Pretoria',20),(00017,'Johannesburg',20),(00018,'Centurion',20),(00019,'Wonderboom',20),(00020,'Mthatha',16),(00021,'Graaff Reinet',16),(00022,'Jeffreys Bay',16),(00023,'Middelburg',1),(00024,'Kimberly',17),(00025,'Upington',17),(00026,'Kuruman',17),(00027,'Colesburg',17),(00028,'Bloemfontein',18),(00029,'Parys ',18),(00030,'Ficksburg',18),(00031,'Clarens',18),(00032,'Bethlehem',18),(00033,'Tzaneen',19),(00034,'Burgersfort',19),(00035,'Lephalale',19),(00036,'Hoedspruit',19),(00037,'Mahikeng',21),(00038,'Klerksdrop',21),(00039,'Brits',21),(00040,'Zeerust',21),(00041,'Cape Town',14),(00042,'Darling',14),(00043,'Paarl',14),(00044,'Overberg',14),(00045,'Montagu',14),(00046,'Dundee',15),(00047,'Lady Smith',15),(00048,'Pinetown',15);

/*Table structure for table `tblprovince` */

DROP TABLE IF EXISTS `tblprovince`;

CREATE TABLE `tblprovince` (
  `prov_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `prov_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`prov_no`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tblprovince` */

insert  into `tblprovince`(`prov_no`,`prov_name`) values (00001,'Mpumalanga'),(00014,'Western Cape'),(00015,'Kwazulu Natal'),(00016,'Eastern Cape'),(00017,'Northern Cape'),(00018,'Free State'),(00019,'Limpopo'),(00020,'Gauteng'),(00021,'North West');

/*Table structure for table `tbltransportowner` */

DROP TABLE IF EXISTS `tbltransportowner`;

CREATE TABLE `tbltransportowner` (
  `to_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `to_name` varchar(25) DEFAULT NULL,
  `to_surname` varchar(25) DEFAULT NULL,
  `to_cellno` varchar(10) DEFAULT NULL,
  `to_email` varchar(25) DEFAULT NULL,
  `loc_no` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`to_no`),
  KEY `FK_tbltransportowner` (`loc_no`),
  CONSTRAINT `FK_tbltransportowner` FOREIGN KEY (`loc_no`) REFERENCES `tbllocation` (`loc_no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tbltransportowner` */

insert  into `tbltransportowner`(`to_no`,`to_name`,`to_surname`,`to_cellno`,`to_email`,`loc_no`) values (00001,'Phiwe','Zondo','0743695284','phizon@gmail.com',1),(00002,'Mike','Sibiya','0829632123','miksib@gmail.com',1),(00003,'Fihliwe','Zungu','0836985214','fihzun@gmail.com',1),(00004,'Ndaba','Ndaba','0793625147','ndanda@gmail.com',2),(00005,'Sulat','fourie','0628964123','salfou@gmail.com',3),(00006,'Emmy','Van der walt','0712589632','emmvan@gmail.com',4),(00007,'Margaret','Burger','0732589741','marbur@gmail.com',6),(00008,'Mike','Smith','0732889756','miksmi@gmail.com',15),(00009,'John','Wallen','0736589776','johwal@gmail.com',14),(00010,'Simon','Wale','0714569741','simwal@gmail.com',13),(00013,'Peter','Maret','0735489775','petmar@gmail.com',10);

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `user_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) DEFAULT NULL,
  `user_surname` varchar(25) DEFAULT NULL,
  `user_cellno` varchar(10) DEFAULT NULL,
  `user_email` varchar(25) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_role` varchar(25) DEFAULT NULL,
  `user_tableId` int(5) unsigned DEFAULT NULL,
  `user_lc` int(5) unsigned DEFAULT NULL,
  `user_to` int(5) unsigned DEFAULT NULL,
  `temp_var` varchar(25) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK_tbluser` (`user_tableId`),
  KEY `FK_LiftClub` (`user_lc`),
  KEY `FK_Transport` (`user_to`),
  CONSTRAINT `FK_Driver` FOREIGN KEY (`user_tableId`) REFERENCES `tbldriver` (`dr_no`),
  CONSTRAINT `FK_LiftClub` FOREIGN KEY (`user_lc`) REFERENCES `tblliftclub` (`lc_no`),
  CONSTRAINT `FK_Transport` FOREIGN KEY (`user_to`) REFERENCES `tbltransportowner` (`to_no`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

insert  into `tbluser`(`user_id`,`user_name`,`user_surname`,`user_cellno`,`user_email`,`user_password`,`user_role`,`user_tableId`,`user_lc`,`user_to`,`temp_var`,`user_address`) values (00001,'Will','Danah','0727838986','wildan@gmail.com','wildan00','Driver',1,NULL,NULL,'wildan00',NULL),(00002,'Xolani','Ngamone','0826985123','xolsim@gmail.com','xolsim02','Driver',2,NULL,NULL,NULL,NULL),(00003,'Clive','Lebepe','0745698125','clileb@gmail.com','clileb03','Driver',3,NULL,NULL,'clileb03',''),(00004,'Junior','Tlou','0836589125','juntlo@gmail.com','juntlo04','Driver',4,NULL,NULL,'juntlo04',NULL),(00005,'Phillip','Simelane','0731258478','phisim@gmail.com','phisim05','Driver',5,NULL,NULL,'phisim05',NULL),(00011,'Mariah','Maake','0742589365','marmaa@gmail.com','marmaa11','Lift Club',NULL,1,NULL,'marmaa11',NULL),(00012,'Martin','Scott','0602589632','marsco@gmail.com','marsco12','Lift Club',NULL,2,NULL,NULL,NULL),(00013,'Carlos','Meyer','0762465322','carmey@gmail.com','carmey13','Lift Club',NULL,3,NULL,NULL,NULL),(00014,'Koos','Botha','0835214789','koobot@gmail.com','koobot14','Lift Club',NULL,4,NULL,NULL,NULL),(00015,'Jacob','Nelson','0822952864','jacnel@gmail.com','jacnel15','Lift Club',NULL,5,NULL,NULL,NULL),(00016,'Paul','Eksteen','0794561258','paueks@gmail.com','paueks16','Lift Club',NULL,6,NULL,NULL,NULL),(00017,'Dorothy','Jacobs','0836541236','dorjac@gmail.com','dorjac17','Lift Club',NULL,7,NULL,NULL,NULL),(00018,'Dee','Masha','0726541287','deemas@gmail.com','deemas18','Lift Club',NULL,8,NULL,NULL,NULL),(00019,'Vee','Cele','0836751236','veecel@gmail.com','veecel19','Lift Club',NULL,9,NULL,NULL,NULL),(00020,'Judy','Ladwaba','0736541267','judlad@gmail.com','judlad20','Lift Club',NULL,10,NULL,NULL,NULL),(00021,'Phiwe','Zondo','0743695284','phizon@gmail.com','phizon21','Transport',NULL,NULL,1,'phizon21',NULL),(00022,'Mike','Sibiya','0829632123','miksib@gmail.com','miksib22','Transport',NULL,NULL,2,'miksib22',NULL),(00023,'Fihliwe','Zungu','0836985214','fihzun@gmail.com','fihzun23','Transport',NULL,NULL,3,'fihzun23',NULL),(00024,'Ndaba','Ndaba','0793625147','ndanda@gmail.com','ndanda24','Transport',NULL,NULL,4,'ndanda24',NULL),(00025,'Salut','Fourie','0628964123','salfou@gmail.com','salfou25','Transport',NULL,NULL,5,'salfou25',NULL),(00026,'Emmy','Van der walt','0712589632','emmvan@gmail.com','emmvan26','Transport',NULL,NULL,6,'emmvan26',NULL),(00027,'Margaret','Burger','0732589741','marbur@gmail.com','marbur27','Transport',NULL,NULL,7,'marbur27',NULL),(00028,'Mike','Smith','0732889756','miksmi@gmail.com','miksmi28','Transport',NULL,NULL,8,NULL,NULL),(00029,'John','Wallen','0736589776','johwal@gmail.com','johwal29','Transport',NULL,NULL,9,NULL,NULL),(00030,'Simon','Wale','0714569741','simwal@gmail.com','simwal30','Transport',NULL,NULL,10,NULL,NULL),(00031,'Peter','Maret','0735489775','petmar@gmail.com','petmar31','Transport',NULL,NULL,13,NULL,NULL),(00032,'kat','mokwena','0765973125','kat@gmail.com','kat123','Client',NULL,NULL,NULL,'kat123',NULL),(00033,'Peter','Mahlangu','0712589362','petmah@gmail.com','pet123','Driver',NULL,NULL,NULL,'pet123',NULL),(00038,'jack','mabu','0125896312','jack@gmail.com','jack123','Client',NULL,NULL,NULL,'jack123','fio;hjkj  '),(00039,'Hendry','Tompson','0741234569','hentom@gmail.com','hend123','Client',NULL,NULL,NULL,'hend123','jkdfghgfb  '),(00040,'mpho','lebepe','0826985124','mpho@gmail.com','mpho123','Driver',NULL,NULL,NULL,'mpho123','  sadfhjdklfg');

/*Table structure for table `tblvehicle` */

DROP TABLE IF EXISTS `tblvehicle`;

CREATE TABLE `tblvehicle` (
  `v_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `v_make` varchar(25) DEFAULT NULL,
  `v_model` varchar(25) DEFAULT NULL,
  `v_series` varchar(15) DEFAULT NULL,
  `v_year` int(4) DEFAULT NULL,
  `v_amtPerDay` float(5,2) DEFAULT NULL,
  `v_image` varchar(75) DEFAULT NULL,
  `to_no` int(5) unsigned DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`v_no`),
  KEY `FK_tblvehicle` (`to_no`),
  CONSTRAINT `FK_tblvehicle` FOREIGN KEY (`to_no`) REFERENCES `tbltransportowner` (`to_no`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tblvehicle` */

insert  into `tblvehicle`(`v_no`,`v_make`,`v_model`,`v_series`,`v_year`,`v_amtPerDay`,`v_image`,`to_no`,`user_id`) values (00001,'BMW','E90','1.4',2013,130.00,'Images/Vehicles/e90.jpg',1,32),(00002,'Jeep','Wrangler','1.6',2018,250.00,'Images/Vehicles/jeep.jpg',2,38),(00003,'Mercedes','Gclass','1.8',2018,360.00,'Images/Vehicles/gclass.jpg',3,39),(00004,'Volkswag','Polo','2.6',2017,140.00,'Images/Vehicles/polo.jpg',4,32),(00005,'Ferrari','Spider','3.4',2016,550.00,'Images/Vehicles/spider.jpg',5,39),(00006,'BMW','325is','2.5',2017,360.00,'Images/Vehicles/is.jpg',6,38),(00007,'Range Rover','Sport','2.9',2017,410.00,'Images/Vehicles/fort.jpg',7,32);

/*Table structure for table `tblvehiclefeatures` */

DROP TABLE IF EXISTS `tblvehiclefeatures`;

CREATE TABLE `tblvehiclefeatures` (
  `vf_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `v_no` int(5) unsigned DEFAULT NULL,
  `f_no` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`vf_no`),
  KEY `FK_tblvehiclefeatures` (`f_no`),
  KEY `FK_tblvehiclefe` (`v_no`),
  CONSTRAINT `FK_tblvehiclefe` FOREIGN KEY (`v_no`) REFERENCES `tblvehicle` (`v_no`),
  CONSTRAINT `FK_tblvehiclefeatures` FOREIGN KEY (`f_no`) REFERENCES `tblfeatures` (`f_no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tblvehiclefeatures` */

insert  into `tblvehiclefeatures`(`vf_no`,`v_no`,`f_no`) values (00001,1,1),(00002,2,2),(00003,3,3),(00004,4,4),(00005,5,5),(00006,6,6),(00007,7,7),(00008,1,3),(00009,1,5),(00010,1,7),(00011,7,6),(00012,7,9);

/* Procedure structure for procedure `AddVehicle` */

/*!50003 DROP PROCEDURE IF EXISTS  `AddVehicle` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `AddVehicle`(
 IN p_email varchar(25),
 IN o_loc int,
 IN o_make varchar(25),
 IN o_model varchar(25),
 IN o_series varchar(15),
 IN o_year int,
 IN o_amt float(9, 2),
 IN v_image varchar(75)
 )
BEGIN
 DECLARE o_name varchar(25);
 DECLARE o_surname varchar(25);
 DECLARE o_cellno varchar(10);
 DECLARE o_email varchar(50);
 DECLARE p_to_no int;
 DECLARE p_usr int;
 SELECT user_name, user_surname, user_cellno, user_email
 INTO o_name, o_surname, o_cellno, o_email
 FROM tbluser 
 WHERE user_email = p_email;
 INSERT INTO tbltransportowner(to_name, to_surname, to_cellno, to_email, loc_no)
 VALUES (o_name,o_surname, o_cellno,o_email, o_loc);
 SELECT MAX(to_no) INTO p_to_no
 FROM tbltransportowner;
 INSERT INTO tblvehicle (v_make, v_model, v_series, v_year, v_amtPerDay, v_image, to_no)
 VALUES (o_make, o_model, o_series, o_year, o_amt, v_image, p_to_no);
 SELECT MAX(to_no) INTO p_usr FROM tbltransportowner;
 UPDATE tbluser SET user_lc = p_usr WHERE user_email = p_email;
 END */$$
DELIMITER ;

/* Procedure structure for procedure `DelDriver` */

/*!50003 DROP PROCEDURE IF EXISTS  `DelDriver` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `DelDriver`(
 IN p_drNo int
 )
BEGIN
 DELETE FROM tbluser WHERE user_tableId = p_drNo;
 DELETE FROM tblhiredriver WHERE dr_no = p_drNo;
 DELETE FROM tbldriver WHERE dr_no = p_drNo;
 END */$$
DELIMITER ;

/* Procedure structure for procedure `DriverBecome` */

/*!50003 DROP PROCEDURE IF EXISTS  `DriverBecome` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `DriverBecome`(
 IN p_userID varchar(25),
 IN p_dr_licenseType varchar(8),
 IN p_dr_amount float(5, 2),
 IN p_loc int,
 IN p_experience varchar(50),
 IN p_image varchar(100)
 )
BEGIN
 DECLARE p_name varchar(25);
 DECLARE p_surname varchar(25);
 DECLARE p_cellno varchar(10);
 DECLARE p_email varchar(25);
 DECLARE p_drId int;
 SELECT user_name, user_surname, user_cellno, user_email
 INTO p_name, p_surname, p_cellno, p_email
 FROM tbluser 
 WHERE user_email = p_userID;
 INSERT INTO tbldriver (dr_name, dr_surname, dr_email, dr_cellno, dr_licenseType, dr_amount, loc_no, dr_experience, dr_image) 
 VALUES (p_name, p_surname, p_email, p_cellno, p_dr_licenseType, p_dr_amount, p_loc, p_experience, p_image);
 SELECT MAX(dr_no) INTO p_drId FROM tbldriver;
 UPDATE tbluser SET user_tableId = p_drId WHERE user_email = p_userID;
 END */$$
DELIMITER ;

/* Procedure structure for procedure `hiredriver` */

/*!50003 DROP PROCEDURE IF EXISTS  `hiredriver` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `hiredriver`(
 IN p_name VARCHAR(25),
 IN p_surname VARCHAR(25),
 IN p_cell VARCHAR(10),
 IN p_email VARCHAR(50),
 IN p_drNo int
 )
BEGIN
 DECLARE p_cl_no int;
 INSERT INTO tblclient (cl_name, cl_surname, cl_cellno, cl_email)
 VALUES(p_name,p_surname , p_cell, p_email);
 SELECT MAX(cl_no) FROM tblclient INTO p_cl_no; 
 INSERT INTO tblhiredriver (dr_no, cl_no, hr_date)
 VALUES(p_drNo, p_cl_no, SYSDATE());
 END */$$
DELIMITER ;

/* Procedure structure for procedure `HireTransport` */

/*!50003 DROP PROCEDURE IF EXISTS  `HireTransport` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `HireTransport`(
 IN t_name VARCHAR(25),
 IN t_surname VARCHAR(25),
 IN t_cellno VARCHAR(10),
 IN t_email VARCHAR(50),
 IN t_vno INT(5),
 IN t_date DATE
 )
BEGIN
 DECLARE t_clNo INT(5);
 INSERT INTO tblclient (cl_name, cl_surname, cl_cellno, cl_email)
 VALUES(t_name,t_surname , t_cellno, t_email);
 SELECT MAX(cl_No) INTO t_clNo
 FROM tblclient;
 INSERT INTO tblhirevehicle (v_no, cl_no, hv_date)
 VALUES(t_vno, t_clNo, t_date);
 END */$$
DELIMITER ;

/* Procedure structure for procedure `JoinLiftClub` */

/*!50003 DROP PROCEDURE IF EXISTS  `JoinLiftClub` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `JoinLiftClub`(
 IN j_name VARCHAR(25),
 IN j_surname VARCHAR(25),
 IN j_cellno VARCHAR(10),
 IN j_email varchar(50),
 IN l_no INT(5),
 IN j_date date
 )
BEGIN
 DECLARE c_no INT(5);
 INSERT INTO tblclient (cl_name, cl_surname, cl_cellno, cl_email)
 VALUES(j_name,j_surname , j_cellno, j_email);
 SELECT MAX(cl_no) INTO c_no
 FROM tblclient;
 INSERT INTO tbljoinliftclub (lc_no, cl_no, jlc_date)
 VALUES(l_no, c_no, j_date);
 END */$$
DELIMITER ;

/* Procedure structure for procedure `LCAdd` */

/*!50003 DROP PROCEDURE IF EXISTS  `LCAdd` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `LCAdd`(
 IN p_user_email varchar(25),
 IN p_lc_description varchar(50), 
 IN p_lc_maxPassengers int,
 IN p_lc_amount float(5, 2),
 IN p_lc_DesNo int,
 IN p_lc_DesTime time,
 IN p_lc_DepNo int,
 IN p_lc_DepTime time
 )
BEGIN
 DECLARE p_name varchar(25);
 DECLARE p_surname varchar(25);
 DECLARE p_cellno varchar(10);
 DECLARE p_email varchar(25);
 DECLARE p_lc int;
 SELECT user_name, user_surname, user_cellno, user_email
 INTO p_name, p_surname, p_cellno, p_email
 FROM tbluser 
 WHERE user_email = p_user_email;
 INSERT INTO tblliftclub (lc_name, lc_surname, lc_cellno, lc_email, lc_description, lc_maxPassengers, lc_amount, lc_DesNo, lc_DesTime, lc_DepNo, lc_DepTime) 
 VALUES (p_name, p_surname, p_cellno, p_email, p_lc_description, p_lc_maxPassengers, p_lc_amount, p_lc_DesNo, p_lc_DesTime,p_lc_DepNo,p_lc_DepTime);
 SELECT MAX(lc_no) INTO p_lc FROM tblliftclub;
 UPDATE tbluser SET user_lc = p_lc WHERE user_email = p_user_email;
 END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
