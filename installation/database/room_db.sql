/*
Navicat MySQL Data Transfer

Source Server         : Svr-Intranet
Source Server Version : 50505
Source Host           : 192.168.20.4:3306
Source Database       : room_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-13 13:59:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1458041058');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1458041066');

-- ----------------------------
-- Table structure for reservation
-- ----------------------------
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_topic` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reserve_activity_type` int(11) DEFAULT NULL,
  `reserve_att_num` int(11) DEFAULT NULL,
  `reserve_layout` int(11) DEFAULT NULL,
  `reserve_sdate` date DEFAULT NULL,
  `reserve_stime` time DEFAULT NULL,
  `reserve_edate` date DEFAULT NULL,
  `reserve_etime` time DEFAULT NULL,
  `reserve_room` int(11) DEFAULT NULL,
  `reserve_equipment` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reserve_depart` int(11) DEFAULT NULL,
  `reserve_user` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reserve_tel` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reserve_budget` int(11) DEFAULT NULL,
  `reserve_status` int(11) DEFAULT NULL COMMENT '0=รอ,1=เปิด, 2=อนุมัติ, 3=ยกเลิก',
  `reserve_comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reserve_remark` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reserve_pay_rate` int(11) DEFAULT NULL,
  `reserve_pay_price` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`reserve_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservation
-- ----------------------------
INSERT INTO `reservation` VALUES ('1', 'ประชุมประจำเดือนทีมพัฒนาระบบบริการ CUP เทพรัตน์นครราชสีมา', '1', '0', '1', '2017-05-12', '13:00:00', '2017-05-12', '16:00:00', '1', '1,2,3,4', '66', '3309800364295', '1106', '0', '1', '', '', '0', '0', '2017-03-03 09:21:28', null, '2017-03-03 09:21:28', null);
INSERT INTO `reservation` VALUES ('2', 'ประชุมแผนงานการพยาบาลชุมชน', '1', '0', '1', '2017-05-18', '08:00:00', '2017-05-18', '16:00:00', '1', '1,2,3,4', '66', '3309800364295', '1106', '0', '1', '', '', '0', '0', '2017-04-03 09:49:31', null, '2017-04-03 09:49:31', null);
INSERT INTO `reservation` VALUES ('3', 'ประชุมแผนงานการพยาบาลชุมชน', '1', '0', '1', '2017-05-24', '08:00:00', '2017-05-25', '16:00:00', '1', '1,2,3,4', '66', '3309800364295', '1106', '0', '1', '', '', '0', '0', '2017-04-03 09:49:31', null, '2017-04-03 09:49:31', null);
INSERT INTO `reservation` VALUES ('4', 'Conference case แพทย์ Intern', '1', '10', '1', '2017-05-04', '12:00:00', '2017-05-04', '14:00:00', '1', '1,2,3', '5', '1301900044108', '4101', '0', '1', '', '', '0', '0', '2017-04-03 10:10:31', null, '2017-04-03 10:10:31', null);
INSERT INTO `reservation` VALUES ('5', 'Conference case แพทย์ Intern', '1', '10', '1', '2017-05-11', '12:00:00', '2017-05-11', '14:00:00', '1', '1,2,3', '5', '1301900044108', '4101', '0', '1', '', '', '0', '0', '2017-04-03 10:10:31', null, '2017-04-03 10:10:31', null);
INSERT INTO `reservation` VALUES ('6', 'Conference case แพทย์ Intern', '1', '10', '1', '2017-05-30', '12:00:00', '2017-05-30', '14:00:00', '1', '1,2,3', '5', '1301900044108', '4101', '0', '1', '', '', '0', '0', '2017-04-03 10:10:31', null, '2017-04-03 10:10:31', null);
INSERT INTO `reservation` VALUES ('7', 'ประชุมประจำเดือนทีมพัฒนาระบบบริการ CUP เทพรัตน์นครราชสีมา', '1', '0', '1', '2017-05-19', '13:00:00', '2017-05-19', '16:00:00', '1', '1,2,3,4', '66', '3309800364295', '1106', '0', '1', '', '', '0', '0', '2017-03-03 09:21:28', null, '2017-03-03 09:21:28', null);
INSERT INTO `reservation` VALUES ('8', 'อบรมฟื้นฟูความรู้ CG', '2', '50', '1', '2017-05-22', '08:00:00', '2017-05-22', '16:00:00', '2', '1,2,3,4', '66', '3301800337860', '1106', '0', '1', '', '', '0', '0', '2017-04-12 10:11:10', null, '2017-04-12 10:11:10', null);
INSERT INTO `reservation` VALUES ('9', 'ฟื้นฟูวิทยากรผู้ดูแล', '1', '50', '1', '2017-05-08', '08:00:00', '2017-05-08', '16:00:00', '2', '1,2,3,4', '66', '3301800337860', '1106', '0', '1', '', '', '0', '0', '2017-04-12 10:18:30', null, '2017-04-12 10:18:30', null);
INSERT INTO `reservation` VALUES ('10', 'อบรมทีม PC CUP', '2', '20', '1', '2017-05-30', '08:00:00', '2017-05-30', '16:00:00', '2', '1,2,3,4', '66', '3301800337860', '1106', '0', '1', '', '', '0', '0', '2017-04-12 10:22:37', null, '2017-04-12 10:22:37', null);
INSERT INTO `reservation` VALUES ('11', 'กรรมการ LTC', '1', '30', '1', '2017-05-31', '08:00:00', '2017-05-31', '16:00:00', '1', '1,2,3,4', '66', '3301800337860', '1106', '0', '1', '', '', '0', '0', '2017-04-12 10:27:06', null, '2017-04-12 10:27:06', null);
INSERT INTO `reservation` VALUES ('12', 'รับประเมิน HA', '1', '100', '1', '2017-05-11', '08:00:00', '2017-05-11', '16:00:00', '1', '1,2,3,4', '42', '3309900027371', '1209', '0', '1', '', '', '0', '0', '2017-04-12 10:25:09', null, '2017-04-12 10:25:09', null);
INSERT INTO `reservation` VALUES ('13', 'รับประเมิน HA', '1', '100', '1', '2017-05-11', '08:00:00', '2017-05-11', '16:00:00', '2', '1,2,3,4', '42', '3309900027371', '1209', '0', '1', '', '', '0', '0', '2017-04-12 10:25:09', null, '2017-04-12 10:25:09', null);
INSERT INTO `reservation` VALUES ('14', 'ทีม QST', '1', '30', '1', '2017-05-03', '13:00:00', '2017-05-03', '16:00:00', '2', '1,2,3', '42', '3309900027371', '1209', '0', '1', '', '', '0', '0', '2017-04-12 10:30:06', null, '2017-04-12 10:30:06', null);
INSERT INTO `reservation` VALUES ('15', 'ประเมินมาตรฐานงานรังสี', '1', '30', '1', '2017-05-30', '13:00:00', '2017-05-30', '16:00:00', '1', '1,2,3,4', '42', '3309900027371', '1209', '0', '1', '', '', '0', '0', '2017-05-23 10:36:59', null, '2017-05-23 10:36:59', null);
INSERT INTO `reservation` VALUES ('16', 'ปฐมนิเทศนักศึกษาพยาบาล', '1', '40', '3', '2017-05-29', '09:00:00', '2017-05-29', '12:00:00', '2', '1,2,3', '41', '1302200046443', '1202', '0', '1', '', '', '0', '0', '2017-04-18 10:41:02', null, '2017-04-18 10:41:02', null);
INSERT INTO `reservation` VALUES ('17', 'ประชุม QA', '1', '20', '1', '2017-05-25', '08:00:00', '2017-05-25', '16:00:00', '1', '1,2,3,4', '33', '3309901057835', '5804, 1205', '0', '1', '', '', '0', '0', '2017-04-21 10:49:40', null, '2017-04-21 10:49:40', null);
INSERT INTO `reservation` VALUES ('18', 'Conference case แพทย์ Med', '1', '10', '1', '2017-05-30', '12:00:00', '2017-05-30', '14:00:00', '1', '1,2,3', '5', '1301900044108', '4101', '0', '1', '', '', '0', '0', '2017-04-26 12:53:18', null, '2017-04-26 12:53:18', null);
INSERT INTO `reservation` VALUES ('19', 'คณะกรรมการคลินิคโรคไม่ติดต่อเรื้อรัง (NCD)', '1', '30', '1', '2017-05-01', '13:30:00', '2017-05-01', '16:30:00', '2', '1,2,3,4', '24', '3309901371483', '7110', '0', '1', '', '', '0', '0', '2017-04-26 13:57:12', null, '2017-04-26 13:57:12', null);
INSERT INTO `reservation` VALUES ('20', 'รับตรวจสอบภายใน การตรวจราชการ รอบ 2 ปีงบ 2560', '1', '50', '1', '2017-06-06', '13:00:00', '2017-06-06', '16:00:00', '2', '1,2,3,4', '1', '3300101621053', '4204', '0', '1', '', '', '0', '0', '2017-06-05 08:30:00', null, '2017-06-05 08:30:00', null);
INSERT INTO `reservation` VALUES ('21', 'ซักซ้อมความเข้าใจการกรอกแบบสัมรวจ Happy no meter', '1', '60', '3', '2017-05-02', '08:00:00', '2017-05-02', '16:00:00', '1', '1,2,3,4', '40', '1341400019392', '4205', '0', '1', '', '', '0', '0', '2017-04-28 11:06:48', null, '2017-04-28 11:06:48', null);
INSERT INTO `reservation` VALUES ('22', 'พัฒนาระบบการรับ - ส่งต่อร่วมกับลูกข่าย รพ.เทพรัตน์นครราชสีมา', '1', '50', '3', '2017-05-17', '08:00:00', '2017-05-17', '16:00:00', '2', '1,2,3,4', '46', '3300101488183', '2119', '0', '1', '', '', '0', '0', '2017-04-28 11:09:43', null, '2017-04-28 11:09:43', null);
INSERT INTO `reservation` VALUES ('23', 'คณะกรรมการจัดห้องสอบและคุมสอบ', '1', '10', '1', '2017-05-08', '13:30:00', '2017-05-08', '16:00:00', '1', '1,4', '40', '3410600688179', '4205', '0', '1', '', '', '0', '0', '2017-05-03 11:12:57', null, '2017-05-03 11:12:57', null);
INSERT INTO `reservation` VALUES ('24', 'คณะกรรมการคัดเลือกข้อสอบ', '1', '18', '6', '2017-05-04', '09:00:00', '2017-05-04', '14:30:00', '2', '9', '40', '3410600688179', '4205', '0', '1', '', '', '0', '0', '2017-05-03 11:14:57', null, '2017-05-03 11:14:57', null);
INSERT INTO `reservation` VALUES ('25', 'คณะกรรมการคัดเลือกข้อสอบ', '1', '10', '6', '2017-05-05', '09:00:00', '2017-05-05', '11:00:00', '2', '9', '40', '3410600688179', '4205', '0', '1', '', '', '0', '0', '2017-05-03 11:19:01', null, '2017-05-03 11:19:01', null);
INSERT INTO `reservation` VALUES ('26', 'การวางแผนพัฒนาระบบการกำกับดูแลด้านสิ่งแวดล้อมภายใน รพ.', '1', '20', '1', '2017-05-15', '13:30:00', '2017-05-15', '16:00:00', '2', '1,2,3,4', '1', '1489900091501', '2503', '0', '1', '', '', '0', '0', '2017-05-15 08:24:39', null, '2017-05-15 08:24:39', null);
INSERT INTO `reservation` VALUES ('27', 'ชี้แจงการดำเนินงานกำหนดพื้นที่รอยต่อระหว่างอำเภอแบบ Catchment Area ทางระบบ VDO Conference', '4', '12', '1', '2017-05-16', '08:00:00', '2017-05-16', '10:00:00', '1', '1,2', '38', '1301600082918', '1101', '0', '1', '', '', '0', '0', '2017-05-15 11:29:12', null, '2017-05-15 11:29:12', null);
INSERT INTO `reservation` VALUES ('28', 'ทีม CFO', '1', '5', '1', '2017-05-16', '08:30:00', '2017-05-16', '12:00:00', '2', '1,2,3,4', '3', '1301000093161', '4202', '0', '1', '', '', '0', '0', '2017-05-16 08:30:00', null, '2017-05-16 08:30:00', null);
INSERT INTO `reservation` VALUES ('29', 'การพัฒนาระบบส่งต่อข้อมูลต่างๆ ให้กับกลุ่มงานบัญชี', '1', '30', '1', '2017-05-16', '13:00:00', '2017-05-16', '16:30:00', '1', '1,2,3,4', '1', '1489900091501', '2503', '0', '1', '', '', '0', '0', '2017-05-16 08:30:05', null, '2017-05-16 08:30:05', null);
INSERT INTO `reservation` VALUES ('30', 'ทีม ENV', '1', '20', '1', '2017-05-19', '13:30:00', '2017-05-19', '16:00:00', '2', '1,2,3,4', '42', '1149700038308', '1209', '0', '1', '', '', '0', '0', '2017-05-16 08:30:09', null, '2017-05-16 08:30:09', null);
INSERT INTO `reservation` VALUES ('31', 'พัฒนาคุณภาพข้อมูล ปี 2560', '4', '10', '1', '2017-05-23', '13:00:00', '2017-05-23', '16:00:00', '1', '1,3', '39', '1301300082793', '1201', '0', '1', '', '', '0', '0', '2017-05-23 08:30:00', null, '2017-05-23 08:30:00', null);
INSERT INTO `reservation` VALUES ('32', 'การดำเนินงานที่มีผลต่อรูปคดี', '1', '10', '1', '2017-05-24', '10:00:00', '2017-05-24', '11:00:00', '1', '1,2,3,4', '65', '3349900066831', '1205', '0', '1', '', '', '0', '0', '2017-05-24 08:30:00', null, '2017-05-24 08:30:00', null);
INSERT INTO `reservation` VALUES ('33', 'คณะทำงานด้านการเงิน CUP รพ.เทพรัตน์นครราชสีมา', '1', '20', '1', '2017-05-26', '13:30:00', '2017-05-26', '16:00:00', '1', '1,2,3,4', '20', '3300101048167', '1106', '0', '1', '', '', '0', '0', '2017-05-19 08:30:00', null, '2017-05-19 08:30:00', null);
INSERT INTO `reservation` VALUES ('34', 'สอบสัมภาษณ์', '5', '10', '5', '2017-05-31', '13:30:00', '2017-05-31', '16:00:00', '4', '9', '41', '1309900433985', '1202', '0', '1', '', '', '0', '0', '2017-05-29 08:30:00', null, '2017-05-29 08:30:00', null);
INSERT INTO `reservation` VALUES ('35', 'How to shape your root canal : Simple and complicated cases.', '1', '70', '3', '2017-05-26', '08:00:00', '2017-05-26', '16:00:00', '2', '1,2,3', '16', '1309900519537', '2310', '0', '1', '', '', '0', '0', '2017-05-22 08:30:00', null, '2017-05-22 08:30:00', null);

-- ----------------------------
-- Table structure for reserve_activity
-- ----------------------------
DROP TABLE IF EXISTS `reserve_activity`;
CREATE TABLE `reserve_activity` (
  `activity_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`activity_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reserve_activity
-- ----------------------------
INSERT INTO `reserve_activity` VALUES ('1', 'ประชุม');
INSERT INTO `reserve_activity` VALUES ('2', 'อบรม');
INSERT INTO `reserve_activity` VALUES ('3', 'สัมมนา');
INSERT INTO `reserve_activity` VALUES ('4', 'VDO Conference');
INSERT INTO `reserve_activity` VALUES ('5', 'อื่นๆ');

-- ----------------------------
-- Table structure for reserve_equipment
-- ----------------------------
DROP TABLE IF EXISTS `reserve_equipment`;
CREATE TABLE `reserve_equipment` (
  `equipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `equipment_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `equipment_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reserve_equipment
-- ----------------------------
INSERT INTO `reserve_equipment` VALUES ('1', 'ไมโครโฟน', null, null);
INSERT INTO `reserve_equipment` VALUES ('2', 'คอมพิวเตอร์', null, null);
INSERT INTO `reserve_equipment` VALUES ('3', 'Projector', null, null);
INSERT INTO `reserve_equipment` VALUES ('4', 'Visualizer', null, null);
INSERT INTO `reserve_equipment` VALUES ('9', 'ไม่ใช้', null, null);

-- ----------------------------
-- Table structure for reserve_layout
-- ----------------------------
DROP TABLE IF EXISTS `reserve_layout`;
CREATE TABLE `reserve_layout` (
  `reserve_layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_layout_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reserve_layout_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`reserve_layout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reserve_layout
-- ----------------------------
INSERT INTO `reserve_layout` VALUES ('1', 'U-Shape', 'U.jpg');
INSERT INTO `reserve_layout` VALUES ('2', 'Conference', 'Conference.jpg');
INSERT INTO `reserve_layout` VALUES ('3', 'Class Room', 'Classroom.jpg');
INSERT INTO `reserve_layout` VALUES ('4', 'Theatre', 'Theatre.jpg');
INSERT INTO `reserve_layout` VALUES ('5', 'Banquet', 'BQ.jpg');
INSERT INTO `reserve_layout` VALUES ('6', 'Banquet Round', 'BQR.jpg');

-- ----------------------------
-- Table structure for reserve_status
-- ----------------------------
DROP TABLE IF EXISTS `reserve_status`;
CREATE TABLE `reserve_status` (
  `reserve_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_status_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`reserve_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reserve_status
-- ----------------------------
INSERT INTO `reserve_status` VALUES ('1', 'รอดำเนินการ');
INSERT INTO `reserve_status` VALUES ('2', 'อ่านแล้ว');
INSERT INTO `reserve_status` VALUES ('3', 'อนุมัติ');
INSERT INTO `reserve_status` VALUES ('4', 'ไม่อนุมัติ');
INSERT INTO `reserve_status` VALUES ('5', 'ขอยกเลิก');
INSERT INTO `reserve_status` VALUES ('6', 'ยกเลิก');

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_size` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_capacity` int(11) DEFAULT NULL,
  `room_locate` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_contact_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_contact_tel` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_pay_rate` double DEFAULT NULL,
  `room_reserv_max` int(11) DEFAULT NULL,
  `room_color` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_img1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_img2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_img3` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_img4` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_img5` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_img6` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_img_act` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `room_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('1', 'ห้องมงคล ณ สงขลา', '8x10 m.', '50', 'อาคารผู้ป่วยนอก อุบัติเหตุและฉุกเฉิน ชั้น 5', null, null, '1000', '1', '#FE2E2E', 'meet02.jpg', null, null, null, null, null, null, null, '1');
INSERT INTO `room` VALUES ('2', 'ห้องหลวงพ่อพุธ ฐานิโย', '15x10 m.', '200', 'อาคารผู้ป่วยนอก อุบัติเหตุและฉุกเฉิน ชั้น 5', null, null, '3000', '1', '#0040FF', 'meet01.jpg', null, null, null, null, null, null, null, '1');
INSERT INTO `room` VALUES ('3', 'ห้องศูนย์พัฒนาคุณภาพ', '3x3 m.', '15', 'ตึก PCU ชั้น 2 (ห้องกลุ่มงานศูนย์พัฒนาคุณภาพ)', 'คุณรุ่งรัตน์', '1204', '0', '2', '#01DF01', '21102314_0_20140629-171146.jpg', 'vconference02.jpg.jpg', null, null, null, null, null, '', '1');
INSERT INTO `room` VALUES ('4', 'ห้อง Audit เวชระเบียน', '5x5 m.', '25', 'อาคารผู้ป่วยนอก อุบัติเหตุและฉุกเฉิน ชั้น 3 (ห้อง LAB เก่า)', '', '', '0', '3', '#FFBF00', null, null, null, null, null, null, null, '', '1');
INSERT INTO `room` VALUES ('5', 'ห้องประชุม พญ.พวงเพ็ญ อ่ำบัว', '5x5 m.', '25', 'อาคารแพทย์แผนไทยและทางเลือก ชั้น 2', '', null, '0', '2', '#58FAF4', null, null, null, null, null, null, null, null, '1');

-- ----------------------------
-- Table structure for room_status
-- ----------------------------
DROP TABLE IF EXISTS `room_status`;
CREATE TABLE `room_status` (
  `room_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_status_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`room_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_status
-- ----------------------------
INSERT INTO `room_status` VALUES ('1', 'ว่าง');
INSERT INTO `room_status` VALUES ('2', 'ไม่ว่าง');
INSERT INTO `room_status` VALUES ('3', 'ปิดปรับปรุง');
INSERT INTO `room_status` VALUES ('4', 'ยกเลิก');

-- ----------------------------
-- Table structure for room_uploads
-- ----------------------------
DROP TABLE IF EXISTS `room_uploads`;
CREATE TABLE `room_uploads` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
  `is_default` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT 'ประเภท',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_uploads
-- ----------------------------
INSERT INTO `room_uploads` VALUES ('11', '2', 'meet01.jpg', '68688e941e0905a667fe9fdc255b22f5.jpg', '1', null, '2017-05-02 03:22:02');
INSERT INTO `room_uploads` VALUES ('12', '3', '21102314_0_20140629_171146.jpg', '042c2d41ecf8e91e475373b2bf3fbcb6.jpg', '1', null, '2017-05-02 03:24:31');
INSERT INTO `room_uploads` VALUES ('15', '3', 'vdoconference03.png', '24ed7ba592e224e4823750b51453b909.png', '0', null, '2017-05-02 03:30:55');
INSERT INTO `room_uploads` VALUES ('16', '1', 'meet02.jpg', '789924222e526984d211c9bd43d40777.jpg', '1', null, '2017-05-02 03:32:27');
INSERT INTO `room_uploads` VALUES ('17', '1', 'ccc.jpg', '4e0b2416e56acfdeb405dced80e05c4d.jpg', '0', null, '2017-05-02 03:32:44');
INSERT INTO `room_uploads` VALUES ('18', '4', 'vconference02.jpg', 'fd647a23d15c35ae40a88e65069aea96.jpg', '1', null, '2017-05-30 11:45:53');
INSERT INTO `room_uploads` VALUES ('19', '4', 'vdoconference01.jpg', 'e89af2c7f4edc12356dfd4849fb659bd.jpg', '0', null, '2017-05-30 11:45:53');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'jyEHZF7otd0UWOG-Hs2zeMIQR1HoW6U8', '$2y$13$zCL/Rto.DklkKIPciG0rXud3Ppf8EO5AbfP1ezAhomLOj/RI6YRLK', null, 'sanyath007@gmail.com', '10', '1458041135', '1458041135');
