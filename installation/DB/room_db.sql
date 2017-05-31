/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50541
Source Host           : 127.0.0.1:3306
Source Database       : room_db

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2017-05-31 14:13:42
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
  `reserve_topic` text,
  `reserve_activity_type` int(11) DEFAULT NULL,
  `reserve_att_num` int(11) DEFAULT NULL,
  `reserve_layout` int(11) DEFAULT NULL,
  `reserve_sdate` date DEFAULT NULL,
  `reserve_stime` time DEFAULT NULL,
  `reserve_edate` date DEFAULT NULL,
  `reserve_etime` time DEFAULT NULL,
  `reserve_room` int(11) DEFAULT NULL,
  `reserve_equipment` varchar(20) DEFAULT NULL,
  `reserve_depart` int(11) DEFAULT NULL,
  `reserve_user` varchar(20) DEFAULT NULL,
  `reserve_tel` varchar(10) DEFAULT NULL,
  `reserve_budget` int(11) DEFAULT NULL,
  `reserve_status` int(11) DEFAULT NULL COMMENT '0=รอ,1=เปิด, 2=อนุมัติ, 3=ยกเลิก',
  `reserve_comment` text,
  `reserve_remark` text,
  `reserve_pay_rate` int(11) DEFAULT NULL,
  `reserve_pay_price` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`reserve_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservation
-- ----------------------------
INSERT INTO `reservation` VALUES ('1', 'ทดสอบ1', '1', '12', '4', '2016-06-10', '13:00:00', '2016-06-10', '16:00:00', '1', '', '39', '1300200009261', '1201', '0', '6', 'cccccccccc', 'cccccccc', '12', '12', null, null, null, null);
INSERT INTO `reservation` VALUES ('2', 'ทดสอบ2', '1', '12', '4', '2016-06-13', '13:00:00', '2016-06-13', '16:00:00', '2', '', '39', '1300200009261', '1201', '0', '4', 'cccccccccc', 'cccccccc', '12', '12', null, null, null, null);
INSERT INTO `reservation` VALUES ('3', 'ประชุมทีม MIS ประจำเดือน มิ.ย. 59', '1', '15', '4', '2016-06-21', '13:00:00', '2016-06-21', '16:30:00', '2', '', '39', '1300200009261', '1201', '0', '6', 'ใช้ Projector + Mic', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('4', 'อบรมการใช้งาน HOSxP', '2', '50', '3', '2016-06-24', '08:00:00', '2016-06-24', '16:00:00', '1', '', '39', '1300200009261', '1201', '0', '6', 'ใช้ Projector และ Notebook', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('5', 'ประชุมรับประเมินระบบบัญชี รพ.', '1', '50', '4', '2016-06-06', '08:00:00', '2016-06-07', '16:00:00', '1', null, '39', '1300200009261', '1201', '0', '1', '', '', '0', null, null, null, null, null);
INSERT INTO `reservation` VALUES ('6', 'ประชุมรับประเมินตัวชี้วัดสำนักงานสาธารณสุขจังหวัดนครราชสีมา', '1', '50', '6', '2016-04-20', '09:00:00', '2016-04-20', '16:30:00', '1', null, '39', '1300200009261', '1201', '0', '2', '', '', '0', null, null, null, null, null);
INSERT INTO `reservation` VALUES ('7', 'ประชุมวิชาการ Stoke Unit', '1', '60', '4', '2016-06-22', '09:00:00', '2016-06-22', '16:00:00', '2', null, '39', '1300200009261', '1201', '0', '1', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('8', 'อบรม Leadership', '2', '50', '3', '2016-06-16', '08:00:00', '2016-06-17', '16:00:00', '2', null, '39', '1300200009261', '1201', '0', '1', '', '', '0', null, null, null, null, null);
INSERT INTO `reservation` VALUES ('9', 'อบรม ESB', '2', '120', '3', '2016-06-23', '08:00:00', '2016-06-23', '16:00:00', '2', null, '39', '1300200009261', '1201', '0', '1', '', '', '0', null, null, null, null, null);
INSERT INTO `reservation` VALUES ('10', 'ทดสอบ3', '1', '10', '4', '2016-06-24', '08:00:00', '2016-06-24', '16:00:00', '3', '1,2,4', '39', '1300200009261', '1201', '0', '6', '', '', '0', null, null, null, null, null);
INSERT INTO `reservation` VALUES ('11', 'ประชุมทีม MIS', '1', '15', '6', '2016-10-31', '13:30:00', '2016-10-27', '16:00:00', '1', '1,2,3,4', '39', '1300200009261', '1201', '0', '1', '', '', '0', null, null, null, null, null);
INSERT INTO `reservation` VALUES ('12', 'นำเสนอผลงานทีมนำ เตรียมรับ re-accredit', '1', '30', '6', '2016-11-09', '08:00:00', '2016-11-09', '16:00:00', '2', '1,2,3,4', '39', '1300200009261', '1201', '0', '1', '', '', '0', null, null, null, null, null);
INSERT INTO `reservation` VALUES ('13', 'ทีม MIS', '1', '18', '6', '2017-04-21', '13:30:00', '2017-04-21', '16:00:00', '1', '1,2,3,4', '39', '1300200009261', '1201', '0', '1', 'ทดสอบ', 'ทดสอบ', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('14', 'ทีม CFO', '1', '20', '4', '2017-04-28', '13:30:00', '2017-04-28', '16:00:00', '1', '1,2,3,4', '3', '3360600834346', '4202', '0', '1', 'ร่วมกับคณะทำงานพัฒนา Unit cost', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('15', 'อบรมการใช้งานระบบจองห้องประชุม', '2', '30', '3', '2017-04-28', '08:00:00', '2017-04-28', '16:00:00', '2', '1,2,3,4', '39', '1300200009261', '1201', '0', '1', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('16', 'ประชุม กบ. ครั้งที่ 4 ประจำเดือนเมษายน 2560', '1', '30', '6', '2017-04-27', '13:00:00', '2017-04-27', '16:00:00', '2', '1,2,3,4', '1', '3100903382095', '4204', '0', '3', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('17', 'ประชุมรับการประเมิน re-accredit HA ขั้น 3 จาก สรพ.', '1', '30', '6', '2017-05-11', '08:00:00', '2017-05-11', '16:00:00', '2', '1,2,3,4', '42', '1369900108405', '1209', '0', '3', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('18', 'ประชุม กบ. ครั้งที่ 8 ประจำเดือนพฤษภาคม 2560', '1', '30', '6', '2017-05-22', '13:00:00', '2017-05-22', '16:00:00', '2', '1,2,3,4', '1', '3100903382095', '4204', '0', '3', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('19', 'จัดงานเลี้ยงส่งและต้อนรับแพทย์ Intern', '5', '100', '2', '2017-05-29', '18:00:00', '2017-05-29', '22:00:00', '2', '1,2,4', '1', '3100903382095', '4204', '0', '3', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('20', 'ประชุมทีม MIS', '1', '20', '6', '2017-06-02', '13:00:00', '2017-06-02', '16:00:00', '1', '1,2,3,4', '39', '1309900284700', '1201', '0', '3', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('21', 'การใช้งาน HOSxP สำหรับเจ้าหน้าที่ใหม่', '2', '30', '3', '2017-06-05', '08:00:00', '2017-06-05', '16:00:00', '1', '1,2,4', '39', '1309900284700', '1201', '0', '3', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('22', 'ประชุมทีม PTC', '1', '20', '6', '2017-05-31', '13:00:00', '2017-05-31', '16:00:00', '1', '1,2,3,4', '17', '3309900180137', '2111', '0', '2', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('23', 'ประชุมทีม CFO', '1', '20', '6', '2017-05-31', '13:00:00', '2017-05-31', '16:00:00', '2', '1,2,3,4', '3', '3360600834346', '4202', '0', '1', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('24', 'การบริหารจัดการกองทุน', '2', '37', '3', '2017-05-30', '08:00:00', '2017-05-30', '16:00:00', '4', '1,2,3,4', '38', '3309901414841', '1101', '0', '1', '', '', '0', '0', null, null, null, null);
INSERT INTO `reservation` VALUES ('25', 'ประชุมทีม MRA', '1', '20', '6', '2017-05-30', '08:00:00', '2017-05-30', '16:00:00', '1', '1,2,3,4', '38', '3309901414841', '1101', '3000', '1', '', '', '0', '0', null, null, null, null);

-- ----------------------------
-- Table structure for reserve_activity
-- ----------------------------
DROP TABLE IF EXISTS `reserve_activity`;
CREATE TABLE `reserve_activity` (
  `activity_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_type_name` varchar(255) DEFAULT NULL,
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
  `equipment_name` varchar(255) DEFAULT NULL,
  `equipment_description` varchar(255) DEFAULT NULL,
  `equipment_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reserve_equipment
-- ----------------------------
INSERT INTO `reserve_equipment` VALUES ('1', 'คอมพิวเตอร์', null, null);
INSERT INTO `reserve_equipment` VALUES ('2', 'Projector', null, null);
INSERT INTO `reserve_equipment` VALUES ('3', 'Visualizer', null, null);
INSERT INTO `reserve_equipment` VALUES ('4', 'ไมโครโฟน', null, null);

-- ----------------------------
-- Table structure for reserve_layout
-- ----------------------------
DROP TABLE IF EXISTS `reserve_layout`;
CREATE TABLE `reserve_layout` (
  `reserve_layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_layout_name` varchar(255) DEFAULT NULL,
  `reserve_layout_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`reserve_layout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reserve_layout
-- ----------------------------
INSERT INTO `reserve_layout` VALUES ('1', 'Banquet', 'BQ.jpg');
INSERT INTO `reserve_layout` VALUES ('2', 'Banquet Round', 'BQR.jpg');
INSERT INTO `reserve_layout` VALUES ('3', 'Class Room', 'Classroom.jpg');
INSERT INTO `reserve_layout` VALUES ('4', 'Conference', 'Conference.jpg');
INSERT INTO `reserve_layout` VALUES ('5', 'Theatre', 'Theatre.jpg');
INSERT INTO `reserve_layout` VALUES ('6', 'U-Shape', 'U.jpg');

-- ----------------------------
-- Table structure for reserve_status
-- ----------------------------
DROP TABLE IF EXISTS `reserve_status`;
CREATE TABLE `reserve_status` (
  `reserve_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_status_name` varchar(255) DEFAULT NULL,
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
  `room_name` varchar(100) DEFAULT NULL,
  `room_size` varchar(20) DEFAULT NULL,
  `room_capacity` int(11) DEFAULT NULL,
  `room_locate` varchar(200) DEFAULT NULL,
  `room_contact_name` varchar(50) DEFAULT NULL,
  `room_contact_tel` varchar(50) DEFAULT NULL,
  `room_pay_rate` double DEFAULT NULL,
  `room_reserv_max` int(11) DEFAULT NULL,
  `room_color` varchar(10) DEFAULT NULL,
  `room_img1` varchar(100) DEFAULT NULL,
  `room_img2` varchar(100) DEFAULT NULL,
  `room_img3` varchar(100) DEFAULT NULL,
  `room_img4` varchar(100) DEFAULT NULL,
  `room_img5` varchar(100) DEFAULT NULL,
  `room_img6` varchar(100) DEFAULT NULL,
  `room_img_act` varchar(255) DEFAULT NULL,
  `room_detail` text,
  `room_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('1', 'ห้องมงคล ณ สงขลา', '8x10 m.', '50', 'อาคารผู้ป่วยนอก อุบัติเหตุและฉุกเฉิน ชั้น 5', null, null, '1000', '1', '#FE2E2E', 'meet02.jpg', null, null, null, null, null, null, null, '1');
INSERT INTO `room` VALUES ('2', 'ห้องหลวงพ่อพุธ ฐานิโย', '15x10 m.', '200', 'อาคารผู้ป่วยนอก อุบัติเหตุและฉุกเฉิน ชั้น 5', null, null, '3000', '1', '#0040FF', 'meet01.jpg', null, null, null, null, null, null, null, '1');
INSERT INTO `room` VALUES ('3', 'ห้องศูนย์พัฒนาคุณภาพ', '3x3 m.', '15', 'ตึก PCU ชั้น 2 (ห้องกลุ่มงานศูนย์พัฒนาคุณภาพ)', 'คุณรุ่งรัตน์', '1204', '0', '2', '#01DF01', '21102314_0_20140629-171146.jpg', 'vconference02.jpg.jpg', null, null, null, null, null, '', '1');
INSERT INTO `room` VALUES ('4', 'ห้อง Audit เวชระเบียน', '5x5 m.', '25', 'อาคารผู้ป่วยนอก อุบัติเหตุและฉุกเฉิน ชั้น 3 (ห้อง LAB เก่า)', '', '', '0', '3', '#FFBF00', null, null, null, null, null, null, null, '', '1');

-- ----------------------------
-- Table structure for room_status
-- ----------------------------
DROP TABLE IF EXISTS `room_status`;
CREATE TABLE `room_status` (
  `room_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_status_name` varchar(255) DEFAULT NULL,
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
  `room_id` varchar(50) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
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
