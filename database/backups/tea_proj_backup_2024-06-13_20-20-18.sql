-- Table structure for table audit_trail
CREATE TABLE `audit_trail` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `audit_action` varchar(100) NOT NULL,
  `audit_dated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`audit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=405 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table audit_trail
INSERT INTO audit_trail VALUES ('1', '1', 'Successful Login', '2024-06-04 13:04:40');
INSERT INTO audit_trail VALUES ('2', '1', 'Login Verified Using OTP', '2024-06-04 13:05:27');
INSERT INTO audit_trail VALUES ('3', '1', 'Successful Login', '2024-06-04 16:05:55');
INSERT INTO audit_trail VALUES ('4', '1', 'Login Verified Using OTP', '2024-06-04 16:06:29');
INSERT INTO audit_trail VALUES ('5', '1', 'Successful Login', '2024-06-04 17:39:25');
INSERT INTO audit_trail VALUES ('6', '1', 'Login Verified Using OTP', '2024-06-04 17:39:52');
INSERT INTO audit_trail VALUES ('7', '1', 'Successful Login', '2024-06-05 19:38:19');
INSERT INTO audit_trail VALUES ('8', '1', 'Login Verified Using OTP', '2024-06-05 19:38:40');
INSERT INTO audit_trail VALUES ('9', '1', 'Successful Login', '2024-06-06 14:11:18');
INSERT INTO audit_trail VALUES ('10', '1', 'Login Verified Using OTP', '2024-06-06 14:11:42');
INSERT INTO audit_trail VALUES ('11', '1', 'Logout', '2024-06-06 14:13:48');
INSERT INTO audit_trail VALUES ('12', '2', 'Account Verified', '2024-06-06 14:14:33');
INSERT INTO audit_trail VALUES ('13', '2', 'Successful Login', '2024-06-06 14:16:36');
INSERT INTO audit_trail VALUES ('14', '2', 'Account Verified', '2024-06-06 14:19:18');
INSERT INTO audit_trail VALUES ('15', '2', 'Successful Login', '2024-06-06 14:19:26');
INSERT INTO audit_trail VALUES ('16', '2', 'Login Verified Using OTP', '2024-06-06 14:19:43');
INSERT INTO audit_trail VALUES ('17', '2', 'Logout', '2024-06-06 14:23:10');
INSERT INTO audit_trail VALUES ('18', '1', 'Successful Login', '2024-06-06 14:23:18');
INSERT INTO audit_trail VALUES ('19', '1', 'Login Verified Using OTP', '2024-06-06 14:23:33');
INSERT INTO audit_trail VALUES ('20', '1', 'Logout', '2024-06-06 14:24:08');
INSERT INTO audit_trail VALUES ('21', '2', 'Successful Login', '2024-06-06 14:24:15');
INSERT INTO audit_trail VALUES ('22', '2', 'Login Verified Using OTP', '2024-06-06 14:24:30');
INSERT INTO audit_trail VALUES ('23', '1', 'Successful Login', '2024-06-06 19:40:53');
INSERT INTO audit_trail VALUES ('24', '1', 'Login Verified Using OTP', '2024-06-06 19:41:26');
INSERT INTO audit_trail VALUES ('25', '1', 'Logout', '2024-06-06 19:43:23');
INSERT INTO audit_trail VALUES ('26', '1', 'Successful Login', '2024-06-06 20:31:05');
INSERT INTO audit_trail VALUES ('27', '1', 'Successful Login', '2024-06-06 20:32:45');
INSERT INTO audit_trail VALUES ('28', '1', 'Login Verified Using OTP', '2024-06-06 20:33:52');
INSERT INTO audit_trail VALUES ('29', '1', 'Logout', '2024-06-06 21:06:34');
INSERT INTO audit_trail VALUES ('30', '3', 'Account Created', '2024-06-07 08:12:42');
INSERT INTO audit_trail VALUES ('31', '1', 'Successful Login', '2024-06-07 08:16:09');
INSERT INTO audit_trail VALUES ('32', '1', 'Successful Login', '2024-06-07 08:47:05');
INSERT INTO audit_trail VALUES ('33', '1', 'Successful Login', '2024-06-07 08:50:06');
INSERT INTO audit_trail VALUES ('34', '1', 'Successful Login', '2024-06-07 09:51:25');
INSERT INTO audit_trail VALUES ('35', '1', 'Account Locked', '2024-06-07 09:53:05');
INSERT INTO audit_trail VALUES ('36', '2', 'Successful Login', '2024-06-07 09:55:10');
INSERT INTO audit_trail VALUES ('37', '2', 'Successful Login', '2024-06-07 09:58:50');
INSERT INTO audit_trail VALUES ('38', '1', 'Successful Login', '2024-06-07 10:00:03');
INSERT INTO audit_trail VALUES ('39', '1', 'Account Locked', '2024-06-07 10:00:35');
INSERT INTO audit_trail VALUES ('40', '2', 'Account Locked', '2024-06-07 10:04:38');
INSERT INTO audit_trail VALUES ('41', '1', 'Successful Login', '2024-06-07 10:39:04');
INSERT INTO audit_trail VALUES ('42', '1', 'Login Verified Using OTP', '2024-06-07 10:39:34');
INSERT INTO audit_trail VALUES ('43', '1', 'Logout', '2024-06-07 10:39:47');
INSERT INTO audit_trail VALUES ('44', '1', 'Successful Login', '2024-06-07 10:41:11');
INSERT INTO audit_trail VALUES ('45', '1', 'Successful Login', '2024-06-07 10:48:46');
INSERT INTO audit_trail VALUES ('46', '1', 'Successful Login', '2024-06-07 10:53:39');
INSERT INTO audit_trail VALUES ('47', '1', 'Successful Login', '2024-06-07 13:53:18');
INSERT INTO audit_trail VALUES ('48', '1', 'Successful Login', '2024-06-07 13:58:47');
INSERT INTO audit_trail VALUES ('49', '1', 'Login Verified Using OTP', '2024-06-07 14:00:11');
INSERT INTO audit_trail VALUES ('50', '1', 'Logout', '2024-06-07 14:03:04');
INSERT INTO audit_trail VALUES ('51', '1', 'Successful Login', '2024-06-07 14:09:51');
INSERT INTO audit_trail VALUES ('52', '1', 'Login Verified Using OTP', '2024-06-07 14:10:21');
INSERT INTO audit_trail VALUES ('53', '1', 'Logout', '2024-06-07 14:23:13');
INSERT INTO audit_trail VALUES ('54', '1', 'Successful Login', '2024-06-07 14:26:47');
INSERT INTO audit_trail VALUES ('55', '1', 'Login Verified Using OTP', '2024-06-07 14:27:40');
INSERT INTO audit_trail VALUES ('56', '1', 'Updated Profile Picture', '2024-06-07 15:05:32');
INSERT INTO audit_trail VALUES ('57', '1', 'Updated Profile Picture', '2024-06-07 15:10:29');
INSERT INTO audit_trail VALUES ('58', '1', 'Updated Profile Picture', '2024-06-07 15:12:19');
INSERT INTO audit_trail VALUES ('59', '1', 'Updated Last Name', '2024-06-07 15:13:34');
INSERT INTO audit_trail VALUES ('60', '1', 'Logout', '2024-06-07 16:00:24');
INSERT INTO audit_trail VALUES ('61', '1', 'Successful Login', '2024-06-07 16:01:32');
INSERT INTO audit_trail VALUES ('62', '1', 'Login Verified Using OTP', '2024-06-07 16:02:58');
INSERT INTO audit_trail VALUES ('63', '1', 'Logout', '2024-06-07 16:20:30');
INSERT INTO audit_trail VALUES ('64', '48', 'Logout', '2024-06-07 16:32:52');
INSERT INTO audit_trail VALUES ('65', '1', 'Successful Login', '2024-06-07 16:33:01');
INSERT INTO audit_trail VALUES ('66', '1', 'Login Verified Using OTP', '2024-06-07 16:33:27');
INSERT INTO audit_trail VALUES ('67', '1', 'Successful Login', '2024-06-07 19:08:29');
INSERT INTO audit_trail VALUES ('68', '1', 'Login Verified Using OTP', '2024-06-07 19:09:15');
INSERT INTO audit_trail VALUES ('69', '1', 'Logout', '2024-06-07 19:29:29');
INSERT INTO audit_trail VALUES ('70', '1', 'Successful Login', '2024-06-07 19:31:11');
INSERT INTO audit_trail VALUES ('71', '1', 'Login Verified Using OTP', '2024-06-07 19:31:28');
INSERT INTO audit_trail VALUES ('72', '1', 'Updated Profile Picture', '2024-06-07 20:32:26');
INSERT INTO audit_trail VALUES ('73', '1', 'Updated Profile Picture', '2024-06-08 00:09:06');
INSERT INTO audit_trail VALUES ('74', '1', 'Logout', '2024-06-08 00:14:47');
INSERT INTO audit_trail VALUES ('75', '1', 'Successful Login', '2024-06-08 09:15:26');
INSERT INTO audit_trail VALUES ('76', '1', 'Login Verified Using OTP', '2024-06-08 09:16:19');
INSERT INTO audit_trail VALUES ('77', '1', 'Logout', '2024-06-08 09:19:00');
INSERT INTO audit_trail VALUES ('78', '3', 'Account Verified', '2024-06-08 09:26:07');
INSERT INTO audit_trail VALUES ('79', '3', 'Successful Login', '2024-06-08 09:28:14');
INSERT INTO audit_trail VALUES ('80', '3', 'Login Verified Using OTP', '2024-06-08 09:28:42');
INSERT INTO audit_trail VALUES ('81', '1', 'Logout', '2024-06-09 01:08:23');
INSERT INTO audit_trail VALUES ('82', '1', 'Successful Login', '2024-06-09 01:09:53');
INSERT INTO audit_trail VALUES ('83', '1', 'Login Verified Using OTP', '2024-06-09 01:20:05');
INSERT INTO audit_trail VALUES ('84', '1', 'Logout', '2024-06-09 01:29:22');
INSERT INTO audit_trail VALUES ('85', '1', 'Successful Login', '2024-06-09 01:32:11');
INSERT INTO audit_trail VALUES ('86', '1', 'Login Verified Using OTP', '2024-06-09 01:32:25');
INSERT INTO audit_trail VALUES ('87', '1', 'Logout', '2024-06-09 02:02:15');
INSERT INTO audit_trail VALUES ('88', '1', 'Successful Login', '2024-06-09 02:12:00');
INSERT INTO audit_trail VALUES ('89', '1', 'Login Verified Using OTP', '2024-06-09 02:13:08');
INSERT INTO audit_trail VALUES ('90', '1', 'Logout', '2024-06-09 02:15:05');
INSERT INTO audit_trail VALUES ('91', '3', 'Successful Login', '2024-06-09 02:15:14');
INSERT INTO audit_trail VALUES ('92', '3', 'Login Verified Using OTP', '2024-06-09 02:15:28');
INSERT INTO audit_trail VALUES ('93', '1', 'Logout', '2024-06-09 02:26:50');
INSERT INTO audit_trail VALUES ('94', '1', 'Successful Login', '2024-06-09 02:26:58');
INSERT INTO audit_trail VALUES ('95', '1', 'Login Verified Using OTP', '2024-06-09 02:27:16');
INSERT INTO audit_trail VALUES ('96', '1', 'Logout', '2024-06-09 02:38:10');
INSERT INTO audit_trail VALUES ('97', '1', 'Update User Status of User ID# 1', '2024-06-09 11:29:25');
INSERT INTO audit_trail VALUES ('98', '1', 'Update User Status of User ID# 1', '2024-06-09 11:29:49');
INSERT INTO audit_trail VALUES ('99', '1', 'Update User Status of User ID# 1', '2024-06-09 11:29:59');
INSERT INTO audit_trail VALUES ('100', '2', 'Update User Status of User ID# 2', '2024-06-09 11:30:01');
INSERT INTO audit_trail VALUES ('101', '2', 'Update User Status of User ID# 2', '2024-06-09 11:30:04');
INSERT INTO audit_trail VALUES ('102', '1', 'Update User Status of User ID# 1', '2024-06-09 11:30:05');
INSERT INTO audit_trail VALUES ('103', '2', 'Update User Status of User ID# 2', '2024-06-09 11:30:08');
INSERT INTO audit_trail VALUES ('104', '1', 'Update User Status of User ID# 1', '2024-06-09 11:31:01');
INSERT INTO audit_trail VALUES ('105', '1', 'Update User Status of User ID# 1', '2024-06-09 11:53:25');
INSERT INTO audit_trail VALUES ('106', '1', 'Update User Status of User ID# 1', '2024-06-09 12:09:36');
INSERT INTO audit_trail VALUES ('107', '1', 'Update User Status of User ID# 1', '2024-06-09 12:25:40');
INSERT INTO audit_trail VALUES ('108', '1', 'Successful Login', '2024-06-09 17:59:34');
INSERT INTO audit_trail VALUES ('109', '1', 'Login Verified Using OTP', '2024-06-09 18:00:02');
INSERT INTO audit_trail VALUES ('110', '1', 'Updated Profile Picture', '2024-06-09 18:52:54');
INSERT INTO audit_trail VALUES ('111', '1', 'Logout', '2024-06-09 18:53:07');
INSERT INTO audit_trail VALUES ('112', '3', 'Successful Login', '2024-06-09 18:53:35');
INSERT INTO audit_trail VALUES ('113', '3', 'Login Verified Using OTP', '2024-06-09 18:54:03');
INSERT INTO audit_trail VALUES ('114', '1', 'Logout', '2024-06-09 19:17:40');
INSERT INTO audit_trail VALUES ('115', '1', 'Successful Login', '2024-06-09 19:19:10');
INSERT INTO audit_trail VALUES ('116', '1', 'Login Verified Using OTP', '2024-06-09 19:19:26');
INSERT INTO audit_trail VALUES ('117', '1', 'Updated Profile Picture', '2024-06-09 20:33:09');
INSERT INTO audit_trail VALUES ('118', '1', 'Logout', '2024-06-09 20:47:59');
INSERT INTO audit_trail VALUES ('119', '1', 'Successful Login', '2024-06-09 20:48:11');
INSERT INTO audit_trail VALUES ('120', '3', 'Successful Login', '2024-06-09 20:57:41');
INSERT INTO audit_trail VALUES ('121', '3', 'Login Verified Using OTP', '2024-06-09 21:14:57');
INSERT INTO audit_trail VALUES ('122', '1', 'Logout', '2024-06-09 21:27:31');
INSERT INTO audit_trail VALUES ('123', '1', 'Successful Login', '2024-06-09 21:28:05');
INSERT INTO audit_trail VALUES ('124', '1', 'Account Retrieved', '2024-06-09 21:37:59');
INSERT INTO audit_trail VALUES ('125', '1', 'Account Retrieved', '2024-06-09 21:40:50');
INSERT INTO audit_trail VALUES ('126', '1', 'Successfully Updated Password', '2024-06-09 21:41:21');
INSERT INTO audit_trail VALUES ('127', '1', 'Successful Login', '2024-06-09 21:41:56');
INSERT INTO audit_trail VALUES ('128', '3', 'Successful Login', '2024-06-09 21:42:19');
INSERT INTO audit_trail VALUES ('129', '3', 'Login Verified Using OTP', '2024-06-09 21:44:24');
INSERT INTO audit_trail VALUES ('130', '3', 'Downloaded Package Ranking Report', '2024-06-09 23:34:29');
INSERT INTO audit_trail VALUES ('131', '3', 'Downloaded Package Ranking Report', '2024-06-09 23:35:27');
INSERT INTO audit_trail VALUES ('132', '3', 'Downloaded Package Ranking Report', '2024-06-09 23:36:24');
INSERT INTO audit_trail VALUES ('133', '3', 'Downloaded Package Ranking Report', '2024-06-09 23:36:31');
INSERT INTO audit_trail VALUES ('134', '3', 'Downloaded Package Ranking Report', '2024-06-09 23:38:13');
INSERT INTO audit_trail VALUES ('135', '1', 'Logout', '2024-06-10 00:07:49');
INSERT INTO audit_trail VALUES ('136', '1', 'Successful Login', '2024-06-10 00:09:43');
INSERT INTO audit_trail VALUES ('137', '1', 'Login Verified Using OTP', '2024-06-10 00:14:15');
INSERT INTO audit_trail VALUES ('138', '1', 'Successful Login', '2024-06-10 08:31:37');
INSERT INTO audit_trail VALUES ('139', '3', 'Successful Login', '2024-06-10 08:42:36');
INSERT INTO audit_trail VALUES ('140', '3', 'Successful Login', '2024-06-10 08:45:40');
INSERT INTO audit_trail VALUES ('141', '3', 'Login Verified Using OTP', '2024-06-10 08:46:13');
INSERT INTO audit_trail VALUES ('142', '1', 'Successful Login', '2024-06-10 10:17:34');
INSERT INTO audit_trail VALUES ('143', '1', 'Login Verified Using OTP', '2024-06-10 10:18:18');
INSERT INTO audit_trail VALUES ('144', '1', 'Logout', '2024-06-10 10:23:24');
INSERT INTO audit_trail VALUES ('145', '3', 'Successful Login', '2024-06-10 10:23:58');
INSERT INTO audit_trail VALUES ('146', '3', 'Login Verified Using OTP', '2024-06-10 10:24:13');
INSERT INTO audit_trail VALUES ('147', '4', 'Account Created', '2024-06-10 10:31:57');
INSERT INTO audit_trail VALUES ('148', '4', 'Account Verified', '2024-06-10 10:37:56');
INSERT INTO audit_trail VALUES ('149', '5', 'Account Created', '2024-06-10 10:39:01');
INSERT INTO audit_trail VALUES ('150', '4', 'Successful Login', '2024-06-10 10:40:29');
INSERT INTO audit_trail VALUES ('151', '4', 'Login Verified Using OTP', '2024-06-10 10:40:47');
INSERT INTO audit_trail VALUES ('152', '4', 'Updated Profile Picture', '2024-06-10 10:43:06');
INSERT INTO audit_trail VALUES ('153', '3', 'Successful Login', '2024-06-10 10:59:05');
INSERT INTO audit_trail VALUES ('154', '3', 'Login Verified Using OTP', '2024-06-10 10:59:32');
INSERT INTO audit_trail VALUES ('155', '1', 'Logout', '2024-06-10 11:21:03');
INSERT INTO audit_trail VALUES ('156', '6', 'Account Created', '2024-06-10 11:30:09');
INSERT INTO audit_trail VALUES ('157', '6', 'Account Verified', '2024-06-10 11:30:33');
INSERT INTO audit_trail VALUES ('158', '6', 'Successful Login', '2024-06-10 11:32:15');
INSERT INTO audit_trail VALUES ('159', '6', 'Successful Login', '2024-06-10 11:32:57');
INSERT INTO audit_trail VALUES ('160', '6', 'Login Verified Using OTP', '2024-06-10 11:34:32');
INSERT INTO audit_trail VALUES ('161', '1', 'Logout', '2024-06-10 11:39:26');
INSERT INTO audit_trail VALUES ('162', '3', 'Successful Login', '2024-06-10 11:39:35');
INSERT INTO audit_trail VALUES ('163', '3', 'Login Verified Using OTP', '2024-06-10 11:39:54');
INSERT INTO audit_trail VALUES ('164', '3', 'Downloaded Package Ranking Report', '2024-06-10 11:43:20');
INSERT INTO audit_trail VALUES ('165', '1', 'Logout', '2024-06-10 11:44:26');
INSERT INTO audit_trail VALUES ('166', '6', 'Successful Login', '2024-06-10 11:44:36');
INSERT INTO audit_trail VALUES ('167', '6', 'Successful Login', '2024-06-10 11:47:25');
INSERT INTO audit_trail VALUES ('168', '1', 'Logout', '2024-06-10 11:52:55');
INSERT INTO audit_trail VALUES ('169', '6', 'Successful Login', '2024-06-10 12:12:56');
INSERT INTO audit_trail VALUES ('170', '1', 'Logout', '2024-06-10 12:40:08');
INSERT INTO audit_trail VALUES ('171', '6', 'Successful Login', '2024-06-10 13:04:44');
INSERT INTO audit_trail VALUES ('172', '1', 'Logout', '2024-06-10 13:12:11');
INSERT INTO audit_trail VALUES ('173', '3', 'Successful Login', '2024-06-10 13:12:18');
INSERT INTO audit_trail VALUES ('174', '3', 'Login Verified Using OTP', '2024-06-10 13:12:38');
INSERT INTO audit_trail VALUES ('175', '1', 'Successful Login', '2024-06-10 21:04:34');
INSERT INTO audit_trail VALUES ('176', '1', 'Login Verified Using OTP', '2024-06-10 21:07:26');
INSERT INTO audit_trail VALUES ('177', '1', 'Logout', '2024-06-10 21:07:54');
INSERT INTO audit_trail VALUES ('178', '1', 'Account Locked', '2024-06-10 21:08:28');
INSERT INTO audit_trail VALUES ('179', '1', 'Account Locked', '2024-06-10 21:09:18');
INSERT INTO audit_trail VALUES ('180', '2', 'Successful Login', '2024-06-10 21:10:14');
INSERT INTO audit_trail VALUES ('181', '2', 'Login Verified Using OTP', '2024-06-10 21:10:29');
INSERT INTO audit_trail VALUES ('182', '2', 'Updated Profile Picture', '2024-06-10 21:11:29');
INSERT INTO audit_trail VALUES ('183', '2', 'Updated First Name', '2024-06-10 21:11:37');
INSERT INTO audit_trail VALUES ('184', '1', 'Logout', '2024-06-10 21:28:23');
INSERT INTO audit_trail VALUES ('185', '7', 'Account Created', '2024-06-10 21:29:36');
INSERT INTO audit_trail VALUES ('186', '7', 'Account Verified', '2024-06-10 21:31:35');
INSERT INTO audit_trail VALUES ('187', '7', 'Account Verified', '2024-06-10 21:32:30');
INSERT INTO audit_trail VALUES ('188', '7', 'Account Verified', '2024-06-10 21:32:43');
INSERT INTO audit_trail VALUES ('189', '7', 'Account Verified', '2024-06-10 21:32:54');
INSERT INTO audit_trail VALUES ('190', '7', 'Account Verified', '2024-06-10 21:33:07');
INSERT INTO audit_trail VALUES ('191', '7', 'Account Verified', '2024-06-10 21:33:15');
INSERT INTO audit_trail VALUES ('192', '7', 'Successful Login', '2024-06-10 21:34:22');
INSERT INTO audit_trail VALUES ('193', '1', 'Logout', '2024-06-10 21:34:47');
INSERT INTO audit_trail VALUES ('194', '8', 'Account Created', '2024-06-10 21:37:03');
INSERT INTO audit_trail VALUES ('195', '8', 'Account Verified', '2024-06-10 21:37:53');
INSERT INTO audit_trail VALUES ('196', '3', 'Successful Login', '2024-06-10 21:38:06');
INSERT INTO audit_trail VALUES ('197', '3', 'Login Verified Using OTP', '2024-06-10 21:38:23');
INSERT INTO audit_trail VALUES ('198', '3', 'Downloaded Package Ranking Report', '2024-06-10 21:38:45');
INSERT INTO audit_trail VALUES ('199', '1', 'Logout', '2024-06-10 21:44:53');
INSERT INTO audit_trail VALUES ('200', '9', 'Account Created', '2024-06-11 14:27:44');
INSERT INTO audit_trail VALUES ('201', '9', 'Account Verified', '2024-06-11 14:28:33');
INSERT INTO audit_trail VALUES ('202', '10', 'Account Created', '2024-06-11 14:32:09');
INSERT INTO audit_trail VALUES ('203', '1', 'Successful Login', '2024-06-11 14:58:10');
INSERT INTO audit_trail VALUES ('204', '1', 'Successful Login', '2024-06-11 16:32:03');
INSERT INTO audit_trail VALUES ('205', '1', 'Successful Login', '2024-06-11 16:33:07');
INSERT INTO audit_trail VALUES ('206', '1', 'Successful Login', '2024-06-11 16:37:31');
INSERT INTO audit_trail VALUES ('207', '1', 'Successful Login', '2024-06-11 16:39:14');
INSERT INTO audit_trail VALUES ('208', '1', 'Login Verified Using OTP', '2024-06-11 16:48:27');
INSERT INTO audit_trail VALUES ('209', '1', 'Logout', '2024-06-11 17:07:52');
INSERT INTO audit_trail VALUES ('210', '1', 'Successful Login', '2024-06-11 17:08:54');
INSERT INTO audit_trail VALUES ('211', '1', 'Login Verified Using OTP', '2024-06-11 17:09:14');
INSERT INTO audit_trail VALUES ('212', '1', 'Logout', '2024-06-11 17:11:39');
INSERT INTO audit_trail VALUES ('213', '3', 'Successful Login', '2024-06-11 17:13:15');
INSERT INTO audit_trail VALUES ('214', '3', 'Login Verified Using OTP', '2024-06-11 17:14:59');
INSERT INTO audit_trail VALUES ('215', '1', 'Successful Login', '2024-06-12 08:18:04');
INSERT INTO audit_trail VALUES ('216', '1', 'Successful Login', '2024-06-12 08:52:13');
INSERT INTO audit_trail VALUES ('217', '1', 'Successful Login', '2024-06-12 09:09:35');
INSERT INTO audit_trail VALUES ('218', '1', 'Successful Login', '2024-06-12 09:17:16');
INSERT INTO audit_trail VALUES ('219', '1', 'Successful Login', '2024-06-12 09:18:57');
INSERT INTO audit_trail VALUES ('220', '1', 'Account Retrieved', '2024-06-12 09:50:55');
INSERT INTO audit_trail VALUES ('221', '1', 'Account Retrieved', '2024-06-12 09:55:12');
INSERT INTO audit_trail VALUES ('222', '1', 'Successfully Updated Password', '2024-06-12 09:56:54');
INSERT INTO audit_trail VALUES ('223', '1', 'Successful Login', '2024-06-12 09:57:15');
INSERT INTO audit_trail VALUES ('224', '1', 'Successful Login', '2024-06-12 10:03:06');
INSERT INTO audit_trail VALUES ('225', '1', 'Login Verified Using OTP', '2024-06-12 10:06:07');
INSERT INTO audit_trail VALUES ('226', '1', 'Updated First Name', '2024-06-12 10:58:53');
INSERT INTO audit_trail VALUES ('227', '1', 'Updated Profile Picture', '2024-06-12 10:59:04');
INSERT INTO audit_trail VALUES ('228', '1', 'Updated Contact Number', '2024-06-12 10:59:16');
INSERT INTO audit_trail VALUES ('229', '1', 'Updated Contact Number', '2024-06-12 10:59:22');
INSERT INTO audit_trail VALUES ('230', '1', 'Logout', '2024-06-12 12:18:36');
INSERT INTO audit_trail VALUES ('231', '1', 'Successful Login', '2024-06-12 12:18:46');
INSERT INTO audit_trail VALUES ('232', '3', 'Successful Login', '2024-06-12 12:18:58');
INSERT INTO audit_trail VALUES ('233', '1', 'Logout', '2024-06-12 12:19:12');
INSERT INTO audit_trail VALUES ('234', '2', 'Successful Login', '2024-06-12 12:19:40');
INSERT INTO audit_trail VALUES ('235', '1', 'Logout', '2024-06-12 12:23:22');
INSERT INTO audit_trail VALUES ('236', '1', 'Successful Login', '2024-06-12 12:28:02');
INSERT INTO audit_trail VALUES ('237', '1', 'Successful Login', '2024-06-12 12:34:22');
INSERT INTO audit_trail VALUES ('238', '1', 'Account Locked', '2024-06-12 12:36:36');
INSERT INTO audit_trail VALUES ('239', '1', 'Account Locked', '2024-06-12 12:41:36');
INSERT INTO audit_trail VALUES ('240', '1', 'Account Locked', '2024-06-12 12:44:01');
INSERT INTO audit_trail VALUES ('241', '2', 'Account Locked', '2024-06-12 12:45:41');
INSERT INTO audit_trail VALUES ('242', '1', 'Account Locked', '2024-06-12 12:52:26');
INSERT INTO audit_trail VALUES ('243', '2', 'Account Locked', '2024-06-12 12:54:10');
INSERT INTO audit_trail VALUES ('244', '1', 'Account Locked', '2024-06-12 12:57:25');
INSERT INTO audit_trail VALUES ('245', '1', 'Account Locked', '2024-06-12 12:57:54');
INSERT INTO audit_trail VALUES ('246', '1', 'Account Locked', '2024-06-12 13:00:44');
INSERT INTO audit_trail VALUES ('247', '1', 'Account Locked', '2024-06-12 13:01:06');
INSERT INTO audit_trail VALUES ('248', '1', 'Account Locked', '2024-06-12 13:01:31');
INSERT INTO audit_trail VALUES ('249', '1', 'Account Disabled', '2024-06-12 13:02:28');
INSERT INTO audit_trail VALUES ('250', '1', 'Logout', '2024-06-12 13:07:07');
INSERT INTO audit_trail VALUES ('251', '1', 'Logout', '2024-06-12 13:08:31');
INSERT INTO audit_trail VALUES ('252', '3', 'Successful Login', '2024-06-12 13:08:48');
INSERT INTO audit_trail VALUES ('253', '1', 'Logout', '2024-06-12 13:19:50');
INSERT INTO audit_trail VALUES ('254', '1', 'Successful Login', '2024-06-12 13:19:58');
INSERT INTO audit_trail VALUES ('255', '3', 'Successful Login', '2024-06-12 13:25:52');
INSERT INTO audit_trail VALUES ('256', '1', 'Logout', '2024-06-12 13:34:25');
INSERT INTO audit_trail VALUES ('257', '2', 'Successful Login', '2024-06-12 13:35:08');
INSERT INTO audit_trail VALUES ('258', '1', 'Logout', '2024-06-12 13:39:16');
INSERT INTO audit_trail VALUES ('259', '2', 'Successful Login', '2024-06-12 13:39:27');
INSERT INTO audit_trail VALUES ('260', '1', 'Logout', '2024-06-12 13:54:52');
INSERT INTO audit_trail VALUES ('261', '1', 'Successful Login', '2024-06-12 13:56:52');
INSERT INTO audit_trail VALUES ('262', '1', 'Login Verified Using OTP', '2024-06-12 14:02:19');
INSERT INTO audit_trail VALUES ('263', '1', 'Logout', '2024-06-12 14:06:04');
INSERT INTO audit_trail VALUES ('264', '1', 'Successful Login', '2024-06-12 14:06:12');
INSERT INTO audit_trail VALUES ('265', '1', 'Login Verified Using OTP', '2024-06-12 14:06:33');
INSERT INTO audit_trail VALUES ('266', '1', 'Logout', '2024-06-12 14:06:49');
INSERT INTO audit_trail VALUES ('267', '1', 'Successful Login', '2024-06-12 14:07:32');
INSERT INTO audit_trail VALUES ('268', '1', 'Login Verified Using OTP', '2024-06-12 14:07:54');
INSERT INTO audit_trail VALUES ('269', '1', 'Logout', '2024-06-12 17:15:11');
INSERT INTO audit_trail VALUES ('270', '1', 'Successful Login', '2024-06-12 17:15:20');
INSERT INTO audit_trail VALUES ('271', '1', 'Logout', '2024-06-12 18:31:45');
INSERT INTO audit_trail VALUES ('272', '3', 'Successful Login', '2024-06-12 18:31:54');
INSERT INTO audit_trail VALUES ('273', '1', 'Logout', '2024-06-12 20:47:49');
INSERT INTO audit_trail VALUES ('274', '3', 'Successful Login', '2024-06-12 21:00:42');
INSERT INTO audit_trail VALUES ('275', '1', 'Logout', '2024-06-12 21:03:02');
INSERT INTO audit_trail VALUES ('276', '2', 'Successful Login', '2024-06-12 21:03:51');
INSERT INTO audit_trail VALUES ('277', '1', 'Logout', '2024-06-12 21:26:32');
INSERT INTO audit_trail VALUES ('278', '2', 'Successful Login', '2024-06-12 21:26:51');
INSERT INTO audit_trail VALUES ('279', '1', 'Logout', '2024-06-12 21:35:34');
INSERT INTO audit_trail VALUES ('280', '2', 'Successful Login', '2024-06-12 21:35:48');
INSERT INTO audit_trail VALUES ('281', '1', 'Successful Login', '2024-06-13 12:21:41');
INSERT INTO audit_trail VALUES ('282', '1', 'Successful Login', '2024-06-13 12:40:10');
INSERT INTO audit_trail VALUES ('283', '1', 'Login Verified Using Security Questions', '2024-06-13 12:40:14');
INSERT INTO audit_trail VALUES ('284', '1', 'Successful Login', '2024-06-13 12:43:55');
INSERT INTO audit_trail VALUES ('285', '1', 'Login Verified Using Security Questions', '2024-06-13 12:44:00');
INSERT INTO audit_trail VALUES ('286', '1', 'Successful Login', '2024-06-13 12:45:29');
INSERT INTO audit_trail VALUES ('287', '1', 'Login Verified Using Security Questions', '2024-06-13 12:46:20');
INSERT INTO audit_trail VALUES ('288', '1', 'Successful Login', '2024-06-13 12:56:10');
INSERT INTO audit_trail VALUES ('289', '1', 'Login Verified Using Security Questions', '2024-06-13 12:56:53');
INSERT INTO audit_trail VALUES ('290', '1', 'Logout', '2024-06-13 12:59:46');
INSERT INTO audit_trail VALUES ('291', '1', 'Successful Login', '2024-06-13 12:59:54');
INSERT INTO audit_trail VALUES ('292', '1', 'Login Verified Using Security Questions', '2024-06-13 13:00:08');
INSERT INTO audit_trail VALUES ('293', '1', 'Logout', '2024-06-13 13:01:49');
INSERT INTO audit_trail VALUES ('294', '1', 'Successful Login', '2024-06-13 13:01:51');
INSERT INTO audit_trail VALUES ('295', '1', 'Login Verified Using Security Questions', '2024-06-13 13:02:18');
INSERT INTO audit_trail VALUES ('296', '1', 'Logout', '2024-06-13 13:05:13');
INSERT INTO audit_trail VALUES ('297', '1', 'Successful Login', '2024-06-13 13:05:17');
INSERT INTO audit_trail VALUES ('298', '1', 'Login Verified Using Security Questions', '2024-06-13 13:05:35');
INSERT INTO audit_trail VALUES ('299', '1', 'Logout', '2024-06-13 13:07:23');
INSERT INTO audit_trail VALUES ('300', '1', 'Successful Login', '2024-06-13 13:07:29');
INSERT INTO audit_trail VALUES ('301', '1', 'Login Verified Using Security Questions', '2024-06-13 13:08:25');
INSERT INTO audit_trail VALUES ('302', '1', 'Login Verified Using Security Questions', '2024-06-13 13:11:01');
INSERT INTO audit_trail VALUES ('303', '1', 'Logout', '2024-06-13 13:11:07');
INSERT INTO audit_trail VALUES ('304', '1', 'Successful Login', '2024-06-13 13:11:10');
INSERT INTO audit_trail VALUES ('305', '1', 'Login Verified Using Security Questions', '2024-06-13 13:11:17');
INSERT INTO audit_trail VALUES ('306', '1', 'Logout', '2024-06-13 13:11:55');
INSERT INTO audit_trail VALUES ('307', '1', 'Successful Login', '2024-06-13 13:11:58');
INSERT INTO audit_trail VALUES ('308', '1', 'Login Verified Using Security Questions', '2024-06-13 13:12:06');
INSERT INTO audit_trail VALUES ('309', '1', 'Logout', '2024-06-13 13:12:50');
INSERT INTO audit_trail VALUES ('310', '1', 'Successful Login', '2024-06-13 13:12:53');
INSERT INTO audit_trail VALUES ('311', '1', 'Login Verified Using Security Questions', '2024-06-13 13:13:01');
INSERT INTO audit_trail VALUES ('312', '1', 'Logout', '2024-06-13 13:13:45');
INSERT INTO audit_trail VALUES ('313', '1', 'Successful Login', '2024-06-13 13:13:47');
INSERT INTO audit_trail VALUES ('314', '1', 'Login Verified Using Security Questions', '2024-06-13 13:13:53');
INSERT INTO audit_trail VALUES ('315', '1', 'Logout', '2024-06-13 13:16:13');
INSERT INTO audit_trail VALUES ('316', '1', 'Successful Login', '2024-06-13 13:16:16');
INSERT INTO audit_trail VALUES ('317', '1', 'Login Verified Using Security Questions', '2024-06-13 13:16:22');
INSERT INTO audit_trail VALUES ('318', '1', 'Logout', '2024-06-13 13:16:32');
INSERT INTO audit_trail VALUES ('319', '1', 'Successful Login', '2024-06-13 13:17:16');
INSERT INTO audit_trail VALUES ('320', '1', 'Login Verified Using Security Questions', '2024-06-13 13:17:25');
INSERT INTO audit_trail VALUES ('321', '1', 'Logout', '2024-06-13 13:18:10');
INSERT INTO audit_trail VALUES ('322', '1', 'Successful Login', '2024-06-13 13:18:13');
INSERT INTO audit_trail VALUES ('323', '1', 'Login Verified Using Security Questions', '2024-06-13 13:18:52');
INSERT INTO audit_trail VALUES ('324', '1', 'Logout', '2024-06-13 13:20:47');
INSERT INTO audit_trail VALUES ('325', '1', 'Successful Login', '2024-06-13 13:20:50');
INSERT INTO audit_trail VALUES ('326', '1', 'Login Verified Using Security Questions', '2024-06-13 13:20:56');
INSERT INTO audit_trail VALUES ('327', '1', 'Logout', '2024-06-13 13:23:18');
INSERT INTO audit_trail VALUES ('328', '1', 'Successful Login', '2024-06-13 13:23:22');
INSERT INTO audit_trail VALUES ('329', '1', 'Login Verified Using Security Questions', '2024-06-13 13:23:36');
INSERT INTO audit_trail VALUES ('330', '1', 'Logout', '2024-06-13 13:41:49');
INSERT INTO audit_trail VALUES ('331', '1', 'Successful Login', '2024-06-13 13:41:52');
INSERT INTO audit_trail VALUES ('332', '1', 'Login Verified Using Security Questions', '2024-06-13 13:42:01');
INSERT INTO audit_trail VALUES ('333', '1', 'Logout', '2024-06-13 13:46:12');
INSERT INTO audit_trail VALUES ('334', '1', 'Successful Login', '2024-06-13 13:46:19');
INSERT INTO audit_trail VALUES ('335', '1', 'Login Verified Using Security Questions', '2024-06-13 13:46:28');
INSERT INTO audit_trail VALUES ('336', '1', 'Logout', '2024-06-13 13:50:14');
INSERT INTO audit_trail VALUES ('337', '1', 'Successful Login', '2024-06-13 13:50:17');
INSERT INTO audit_trail VALUES ('338', '1', 'Login Verified Using Security Questions', '2024-06-13 13:50:23');
INSERT INTO audit_trail VALUES ('339', '1', 'Logout', '2024-06-13 13:52:01');
INSERT INTO audit_trail VALUES ('340', '1', 'Successful Login', '2024-06-13 13:52:04');
INSERT INTO audit_trail VALUES ('341', '1', 'Login Verified Using Security Questions', '2024-06-13 13:52:10');
INSERT INTO audit_trail VALUES ('342', '1', 'Logout', '2024-06-13 13:53:11');
INSERT INTO audit_trail VALUES ('343', '1', 'Successful Login', '2024-06-13 13:53:38');
INSERT INTO audit_trail VALUES ('344', '1', 'Login Verified Using Security Questions', '2024-06-13 13:54:15');
INSERT INTO audit_trail VALUES ('345', '1', 'Logout', '2024-06-13 13:54:38');
INSERT INTO audit_trail VALUES ('346', '1', 'Successful Login', '2024-06-13 13:54:40');
INSERT INTO audit_trail VALUES ('347', '1', 'Login Verified Using Security Questions', '2024-06-13 13:54:47');
INSERT INTO audit_trail VALUES ('348', '1', 'Logout', '2024-06-13 13:54:55');
INSERT INTO audit_trail VALUES ('349', '1', 'Successful Login', '2024-06-13 13:55:00');
INSERT INTO audit_trail VALUES ('350', '1', 'Login Verified Using Security Questions', '2024-06-13 13:55:07');
INSERT INTO audit_trail VALUES ('351', '1', 'Logout', '2024-06-13 13:57:19');
INSERT INTO audit_trail VALUES ('352', '1', 'Successful Login', '2024-06-13 13:57:23');
INSERT INTO audit_trail VALUES ('353', '1', 'Login Verified Using Security Questions', '2024-06-13 13:57:30');
INSERT INTO audit_trail VALUES ('354', '1', 'Logout', '2024-06-13 13:58:29');
INSERT INTO audit_trail VALUES ('355', '1', 'Successful Login', '2024-06-13 13:58:35');
INSERT INTO audit_trail VALUES ('356', '1', 'Login Verified Using Security Questions', '2024-06-13 13:58:40');
INSERT INTO audit_trail VALUES ('357', '1', 'Logout', '2024-06-13 13:59:28');
INSERT INTO audit_trail VALUES ('358', '1', 'Successful Login', '2024-06-13 13:59:31');
INSERT INTO audit_trail VALUES ('359', '1', 'Login Verified Using Security Questions', '2024-06-13 13:59:36');
INSERT INTO audit_trail VALUES ('360', '1', 'Logout', '2024-06-13 16:05:23');
INSERT INTO audit_trail VALUES ('361', '1', 'Successful Login', '2024-06-13 16:09:04');
INSERT INTO audit_trail VALUES ('362', '1', 'Logout', '2024-06-13 16:54:08');
INSERT INTO audit_trail VALUES ('363', '3', 'Successful Login', '2024-06-13 16:54:21');
INSERT INTO audit_trail VALUES ('364', '1', 'Logout', '2024-06-13 16:54:41');
INSERT INTO audit_trail VALUES ('365', '2', 'Successful Login', '2024-06-13 16:55:50');
INSERT INTO audit_trail VALUES ('366', '1', 'Logout', '2024-06-13 17:31:46');
INSERT INTO audit_trail VALUES ('367', '2', 'Successful Login', '2024-06-13 17:32:18');
INSERT INTO audit_trail VALUES ('368', '2', 'Downloaded Package Ranking Report', '2024-06-13 19:33:52');
INSERT INTO audit_trail VALUES ('369', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:37:39');
INSERT INTO audit_trail VALUES ('370', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:38:13');
INSERT INTO audit_trail VALUES ('371', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:44:11');
INSERT INTO audit_trail VALUES ('372', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:45:30');
INSERT INTO audit_trail VALUES ('373', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:45:33');
INSERT INTO audit_trail VALUES ('374', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:45:38');
INSERT INTO audit_trail VALUES ('375', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:46:00');
INSERT INTO audit_trail VALUES ('376', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:48:26');
INSERT INTO audit_trail VALUES ('377', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:49:19');
INSERT INTO audit_trail VALUES ('378', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:49:33');
INSERT INTO audit_trail VALUES ('379', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:56:24');
INSERT INTO audit_trail VALUES ('380', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:57:07');
INSERT INTO audit_trail VALUES ('381', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:57:20');
INSERT INTO audit_trail VALUES ('382', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:57:46');
INSERT INTO audit_trail VALUES ('383', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:58:13');
INSERT INTO audit_trail VALUES ('384', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:59:02');
INSERT INTO audit_trail VALUES ('385', '2', 'Downloaded Audit Trail Report', '2024-06-13 19:59:31');
INSERT INTO audit_trail VALUES ('386', '2', 'Downloaded Audit Trail Report', '2024-06-13 20:00:45');
INSERT INTO audit_trail VALUES ('387', '2', 'Downloaded Audit Trail Report', '2024-06-13 20:01:35');
INSERT INTO audit_trail VALUES ('388', '2', 'Downloaded Audit Trail Report', '2024-06-13 20:03:06');
INSERT INTO audit_trail VALUES ('389', '2', 'Downloaded Audit Trail Report', '2024-06-13 20:03:27');
INSERT INTO audit_trail VALUES ('390', '2', 'Backed Up Database', '2024-06-13 20:17:16');
INSERT INTO audit_trail VALUES ('391', '2', 'Backed Up Database', '2024-06-13 20:17:30');
INSERT INTO audit_trail VALUES ('392', '2', 'Backed Up Database', '2024-06-13 20:17:56');
INSERT INTO audit_trail VALUES ('393', '2', 'Backed Up Database', '2024-06-13 20:17:57');
INSERT INTO audit_trail VALUES ('394', '2', 'Backed Up Database', '2024-06-13 20:17:58');
INSERT INTO audit_trail VALUES ('395', '2', 'Backed Up Database', '2024-06-13 20:18:45');
INSERT INTO audit_trail VALUES ('396', '2', 'Backed Up Database', '2024-06-13 20:18:46');
INSERT INTO audit_trail VALUES ('397', '2', 'Backed Up Database', '2024-06-13 20:18:46');
INSERT INTO audit_trail VALUES ('398', '2', 'Backed Up Database', '2024-06-13 20:18:47');
INSERT INTO audit_trail VALUES ('399', '2', 'Backed Up Database', '2024-06-13 20:18:47');
INSERT INTO audit_trail VALUES ('400', '2', 'Backed Up Database', '2024-06-13 20:18:47');
INSERT INTO audit_trail VALUES ('401', '2', 'Backed Up Database', '2024-06-13 20:19:00');
INSERT INTO audit_trail VALUES ('402', '2', 'Backed Up Database', '2024-06-13 20:20:17');
INSERT INTO audit_trail VALUES ('403', '2', 'Backed Up Database', '2024-06-13 20:20:18');
INSERT INTO audit_trail VALUES ('404', '2', 'Backed Up Database', '2024-06-13 20:20:18');

-- Table structure for table failed_logins
CREATE TABLE `failed_logins` (
  `failed_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `failed_login_dated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`failed_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table feedbacks
CREATE TABLE `feedbacks` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `fb_message` varchar(300) DEFAULT NULL,
  `fb_stars` int(11) NOT NULL,
  `fb_dated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table feedbacks
INSERT INTO feedbacks VALUES ('1', '1', '53', 'sdfsdf', '1', '2024-06-13 16:51:54');
INSERT INTO feedbacks VALUES ('2', '1', '53', 'fgdfdgdfgdf', '1', '2024-06-13 16:52:13');
INSERT INTO feedbacks VALUES ('3', '1', '53', 'ghfhfgh', '2', '2024-06-13 16:53:12');

-- Table structure for table order_add_ons
CREATE TABLE `order_add_ons` (
  `oadd_id` int(11) NOT NULL AUTO_INCREMENT,
  `oitem_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `oadd_qty` int(11) NOT NULL,
  `oadd_total` float(9,2) NOT NULL,
  `oadd_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`oadd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table order_add_ons
INSERT INTO order_add_ons VALUES ('2', '3', '7', '1', '20', '2024-06-04 15:03:35');
INSERT INTO order_add_ons VALUES ('3', '3', '8', '1', '20', '2024-06-04 15:03:35');
INSERT INTO order_add_ons VALUES ('4', '5', '3', '1', '20', '2024-06-04 18:17:16');
INSERT INTO order_add_ons VALUES ('5', '5', '7', '1', '20', '2024-06-04 18:17:16');
INSERT INTO order_add_ons VALUES ('6', '7', '6', '3', '60', '2024-06-04 18:20:44');
INSERT INTO order_add_ons VALUES ('7', '7', '7', '2', '40', '2024-06-04 18:20:44');
INSERT INTO order_add_ons VALUES ('8', '8', '7', '1', '20', '2024-06-04 18:23:17');
INSERT INTO order_add_ons VALUES ('9', '8', '8', '1', '20', '2024-06-04 18:23:17');
INSERT INTO order_add_ons VALUES ('10', '9', '3', '2', '40', '2024-06-04 18:25:43');
INSERT INTO order_add_ons VALUES ('11', '10', '7', '3', '60', '2024-06-04 18:31:34');
INSERT INTO order_add_ons VALUES ('12', '12', '7', '3', '60', '2024-06-04 18:39:39');
INSERT INTO order_add_ons VALUES ('13', '13', '4', '9', '180', '2024-06-04 18:42:03');
INSERT INTO order_add_ons VALUES ('14', '13', '8', '6', '120', '2024-06-04 18:42:03');
INSERT INTO order_add_ons VALUES ('15', '15', '8', '6', '120', '2024-06-04 19:00:01');
INSERT INTO order_add_ons VALUES ('16', '18', '3', '2', '40', '2024-06-04 19:26:24');
INSERT INTO order_add_ons VALUES ('17', '18', '4', '2', '40', '2024-06-04 19:26:24');
INSERT INTO order_add_ons VALUES ('18', '18', '8', '2', '40', '2024-06-04 19:26:24');
INSERT INTO order_add_ons VALUES ('19', '19', '7', '2', '40', '2024-06-04 22:32:29');
INSERT INTO order_add_ons VALUES ('20', '19', '8', '2', '40', '2024-06-04 22:32:29');
INSERT INTO order_add_ons VALUES ('21', '20', '3', '2', '40', '2024-06-04 22:40:43');
INSERT INTO order_add_ons VALUES ('22', '20', '4', '2', '40', '2024-06-04 22:40:43');
INSERT INTO order_add_ons VALUES ('23', '20', '8', '2', '40', '2024-06-04 22:40:43');
INSERT INTO order_add_ons VALUES ('24', '22', '3', '2', '40', '2024-06-04 23:33:04');
INSERT INTO order_add_ons VALUES ('25', '23', '3', '3', '60', '2024-06-04 23:33:11');
INSERT INTO order_add_ons VALUES ('26', '23', '4', '2', '40', '2024-06-04 23:33:11');
INSERT INTO order_add_ons VALUES ('27', '24', '7', '3', '60', '2024-06-05 19:38:51');
INSERT INTO order_add_ons VALUES ('28', '25', '3', '2', '40', '2024-06-05 20:13:42');
INSERT INTO order_add_ons VALUES ('32', '31', '4', '8', '160', '2024-06-07 16:34:34');
INSERT INTO order_add_ons VALUES ('33', '31', '7', '8', '160', '2024-06-07 16:34:34');
INSERT INTO order_add_ons VALUES ('34', '37', '3', '2', '40', '2024-06-09 18:02:09');
INSERT INTO order_add_ons VALUES ('36', '55', '7', '5', '100', '2024-06-09 19:25:32');
INSERT INTO order_add_ons VALUES ('37', '55', '8', '15', '300', '2024-06-09 19:25:32');
INSERT INTO order_add_ons VALUES ('38', '60', '5', '4', '80', '2024-06-10 10:41:18');
INSERT INTO order_add_ons VALUES ('39', '60', '8', '8', '160', '2024-06-10 10:41:18');
INSERT INTO order_add_ons VALUES ('40', '61', '4', '10', '200', '2024-06-10 11:35:30');
INSERT INTO order_add_ons VALUES ('44', '68', '5', '6', '120', '2024-06-10 21:22:59');
INSERT INTO order_add_ons VALUES ('45', '68', '8', '6', '120', '2024-06-10 21:22:59');

-- Table structure for table order_items
CREATE TABLE `order_items` (
  `oitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `oitem_size` varchar(50) NOT NULL,
  `oitem_sweetness` varchar(20) NOT NULL,
  `oitem_qty` int(11) NOT NULL,
  `oitem_total` float(9,2) NOT NULL,
  `oitem_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `oitem_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`oitem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table order_items
INSERT INTO order_items VALUES ('3', '1', '12', 'Regular', '75', '1', '115', '2024-06-04 15:03:35', '2024-06-04 15:03:35');
INSERT INTO order_items VALUES ('4', '2', '11', 'Regular', '0', '1', '75', '2024-06-04 17:50:09', '2024-06-04 17:50:09');
INSERT INTO order_items VALUES ('5', '3', '12', 'Regular', '0', '1', '115', '2024-06-04 18:17:16', '2024-06-04 18:17:16');
INSERT INTO order_items VALUES ('6', '4', '12', 'Regular', '75', '1', '75', '2024-06-04 18:19:08', '2024-06-04 18:19:08');
INSERT INTO order_items VALUES ('7', '5', '15', 'Regular', '75', '1', '185', '2024-06-04 18:20:44', '2024-06-04 18:20:44');
INSERT INTO order_items VALUES ('8', '6', '12', 'Regular', '50', '1', '115', '2024-06-04 18:23:17', '2024-06-04 18:23:17');
INSERT INTO order_items VALUES ('9', '7', '11', 'Regular', '75', '1', '115', '2024-06-04 18:25:43', '2024-06-04 18:25:43');
INSERT INTO order_items VALUES ('10', '8', '11', 'Regular', '75', '1', '135', '2024-06-04 18:31:34', '2024-06-04 18:31:34');
INSERT INTO order_items VALUES ('11', '9', '11', 'Regular', '50', '1', '75', '2024-06-04 18:33:38', '2024-06-04 18:33:38');
INSERT INTO order_items VALUES ('12', '10', '15', 'Regular', '75', '1', '145', '2024-06-04 18:39:39', '2024-06-04 18:39:39');
INSERT INTO order_items VALUES ('13', '11', '16', 'Large', '75', '3', '585', '2024-06-04 18:42:03', '2024-06-04 18:42:03');
INSERT INTO order_items VALUES ('14', '12', '11', 'Regular', '100', '1', '75', '2024-06-04 18:45:23', '2024-06-04 18:45:23');
INSERT INTO order_items VALUES ('15', '13', '12', 'Regular', '0', '3', '345', '2024-06-04 19:00:01', '2024-06-04 19:00:01');
INSERT INTO order_items VALUES ('16', '14', '12', 'Regular', '50', '1', '75', '2024-06-04 19:04:03', '2024-06-04 19:04:03');
INSERT INTO order_items VALUES ('17', '15', '12', 'Regular', '0', '1', '75', '2024-06-04 19:06:14', '2024-06-04 19:06:14');
INSERT INTO order_items VALUES ('18', '16', '12', 'Regular', '50', '1', '195', '2024-06-04 19:26:24', '2024-06-04 19:26:24');
INSERT INTO order_items VALUES ('19', '17', '11', 'Regular', '75', '1', '155', '2024-06-04 22:32:29', '2024-06-04 22:32:29');
INSERT INTO order_items VALUES ('20', '18', '11', 'Large', '50', '1', '205', '2024-06-04 22:40:43', '2024-06-04 22:40:43');
INSERT INTO order_items VALUES ('21', '19', '12', 'Regular', '0', '1', '75', '2024-06-04 22:48:47', '2024-06-04 22:48:47');
INSERT INTO order_items VALUES ('22', '20', '11', 'Regular', '0', '1', '115', '2024-06-04 23:33:04', '2024-06-04 23:33:04');
INSERT INTO order_items VALUES ('23', '20', '12', 'Regular', '0', '1', '175', '2024-06-04 23:33:11', '2024-06-04 23:33:11');
INSERT INTO order_items VALUES ('24', '21', '12', 'Regular', '50', '1', '135', '2024-06-05 19:38:51', '2024-06-05 19:38:51');
INSERT INTO order_items VALUES ('25', '22', '14', 'Regular', '100', '1', '125', '2024-06-05 20:13:42', '2024-06-05 20:13:42');
INSERT INTO order_items VALUES ('27', '24', '11', 'Regular', '100', '3', '225', '2024-06-06 14:20:55', '2024-06-06 15:28:31');
INSERT INTO order_items VALUES ('28', '24', '12', 'Regular', '0', '1', '75', '2024-06-06 14:21:57', '2024-06-06 14:21:57');
INSERT INTO order_items VALUES ('29', '23', '10', 'Large', '75', '1', '85', '2024-06-07 14:14:31', '2024-06-07 14:15:30');
INSERT INTO order_items VALUES ('31', '25', '16', 'Large', '50', '4', '700', '2024-06-07 16:34:34', '2024-06-07 16:34:34');
INSERT INTO order_items VALUES ('33', '26', '11', 'Regular', '0', '1', '75', '2024-06-08 09:16:31', '2024-06-08 09:16:31');
INSERT INTO order_items VALUES ('35', '28', '11', 'Regular', '0', '1', '75', '2024-06-09 18:01:28', '2024-06-09 18:01:28');
INSERT INTO order_items VALUES ('36', '29', '11', 'Regular', '0', '1', '75', '2024-06-09 18:02:01', '2024-06-09 18:02:01');
INSERT INTO order_items VALUES ('37', '30', '14', 'Regular', '100', '1', '125', '2024-06-09 18:02:09', '2024-06-09 18:02:09');
INSERT INTO order_items VALUES ('47', '27', '14', 'Regular', '100', '1', '125', '2024-06-09 18:22:32', '2024-06-09 18:22:32');
INSERT INTO order_items VALUES ('50', '31', '16', 'Large', '50', '4', '700', '2024-06-09 18:38:16', '2024-06-09 18:38:16');
INSERT INTO order_items VALUES ('55', '32', '16', 'Large', '50', '5', '875', '2024-06-09 19:24:40', '2024-06-09 19:26:52');
INSERT INTO order_items VALUES ('56', '32', '12', 'Regular', '0', '1', '75', '2024-06-09 19:24:47', '2024-06-09 19:24:47');
INSERT INTO order_items VALUES ('60', '34', '19', 'Large', '50', '4', '620', '2024-06-10 10:41:18', '2024-06-10 10:41:18');
INSERT INTO order_items VALUES ('61', '35', '18', 'Large', '75', '5', '675', '2024-06-10 11:35:30', '2024-06-10 11:35:41');
INSERT INTO order_items VALUES ('64', '36', '18', 'Large', '75', '5', '675', '2024-06-10 13:11:17', '2024-06-10 13:11:17');
INSERT INTO order_items VALUES ('66', '37', '11', 'Regular', '50', '5', '375', '2024-06-10 21:15:38', '2024-06-10 21:15:46');
INSERT INTO order_items VALUES ('68', '38', '12', 'Regular', '0', '3', '465', '2024-06-10 21:22:59', '2024-06-10 21:22:59');
INSERT INTO order_items VALUES ('69', '39', '12', 'Regular', '0', '3', '465', '2024-06-10 21:27:17', '2024-06-10 21:27:17');
INSERT INTO order_items VALUES ('71', '33', '16', 'Large', '50', '5', '875', '2024-06-11 17:11:00', '2024-06-11 17:11:00');
INSERT INTO order_items VALUES ('72', '33', '12', 'Regular', '0', '1', '75', '2024-06-11 17:11:00', '2024-06-11 17:11:00');
INSERT INTO order_items VALUES ('83', '40', '16', 'Large', '50', '5', '875', '2024-06-12 17:03:32', '2024-06-12 17:03:32');
INSERT INTO order_items VALUES ('84', '40', '12', 'Regular', '0', '1', '75', '2024-06-12 17:03:32', '2024-06-12 17:03:32');
INSERT INTO order_items VALUES ('85', '41', '16', 'Regular', '75', '1', '85', '2024-06-12 17:17:15', '2024-06-12 17:17:15');
INSERT INTO order_items VALUES ('88', '42', '16', 'Large', '50', '5', '875', '2024-06-12 17:42:25', '2024-06-12 17:42:25');
INSERT INTO order_items VALUES ('89', '42', '12', 'Regular', '0', '1', '75', '2024-06-12 17:42:25', '2024-06-12 17:42:25');
INSERT INTO order_items VALUES ('92', '43', '16', 'Large', '50', '5', '875', '2024-06-12 17:45:15', '2024-06-12 17:45:15');
INSERT INTO order_items VALUES ('93', '43', '12', 'Regular', '0', '1', '75', '2024-06-12 17:45:15', '2024-06-12 17:45:15');
INSERT INTO order_items VALUES ('94', '44', '16', 'Large', '50', '5', '875', '2024-06-12 17:45:46', '2024-06-12 17:45:46');
INSERT INTO order_items VALUES ('95', '44', '12', 'Regular', '0', '1', '75', '2024-06-12 17:45:46', '2024-06-12 17:45:46');
INSERT INTO order_items VALUES ('96', '45', '16', 'Large', '50', '5', '875', '2024-06-12 18:21:20', '2024-06-12 18:21:20');
INSERT INTO order_items VALUES ('97', '45', '12', 'Regular', '0', '1', '75', '2024-06-12 18:21:20', '2024-06-12 18:21:20');
INSERT INTO order_items VALUES ('98', '46', '16', 'Large', '50', '5', '875', '2024-06-12 18:23:58', '2024-06-12 18:23:58');
INSERT INTO order_items VALUES ('99', '46', '12', 'Regular', '0', '1', '75', '2024-06-12 18:23:58', '2024-06-12 18:23:58');
INSERT INTO order_items VALUES ('100', '47', '16', 'Large', '50', '5', '875', '2024-06-12 18:25:25', '2024-06-12 18:25:25');
INSERT INTO order_items VALUES ('101', '47', '12', 'Regular', '0', '1', '75', '2024-06-12 18:25:25', '2024-06-12 18:25:25');
INSERT INTO order_items VALUES ('102', '48', '16', 'Large', '50', '5', '875', '2024-06-13 14:00:06', '2024-06-13 14:00:06');
INSERT INTO order_items VALUES ('103', '48', '12', 'Regular', '0', '1', '75', '2024-06-13 14:00:06', '2024-06-13 14:00:06');
INSERT INTO order_items VALUES ('104', '49', '16', 'Large', '50', '5', '875', '2024-06-13 14:03:35', '2024-06-13 14:03:35');
INSERT INTO order_items VALUES ('105', '49', '12', 'Regular', '0', '1', '75', '2024-06-13 14:03:35', '2024-06-13 14:03:35');
INSERT INTO order_items VALUES ('106', '50', '16', 'Large', '50', '5', '875', '2024-06-13 14:04:52', '2024-06-13 14:04:52');
INSERT INTO order_items VALUES ('107', '50', '12', 'Regular', '0', '1', '75', '2024-06-13 14:04:52', '2024-06-13 14:04:52');
INSERT INTO order_items VALUES ('108', '51', '16', 'Large', '50', '5', '875', '2024-06-13 14:13:03', '2024-06-13 14:13:03');
INSERT INTO order_items VALUES ('109', '51', '12', 'Regular', '0', '1', '75', '2024-06-13 14:13:03', '2024-06-13 14:13:03');
INSERT INTO order_items VALUES ('110', '52', '16', 'Large', '50', '5', '875', '2024-06-13 14:13:20', '2024-06-13 14:13:20');
INSERT INTO order_items VALUES ('112', '53', '16', 'Large', '50', '5', '875', '2024-06-13 14:20:38', '2024-06-13 14:20:38');

-- Table structure for table orders
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `uaddress_id` int(11) NOT NULL,
  `order_sub_total` float(9,2) DEFAULT NULL,
  `order_del_fee` float(9,2) NOT NULL,
  `order_grand_total` float(9,2) NOT NULL,
  `order_opened_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_placed_at` timestamp NULL DEFAULT NULL,
  `order_delivered_at` timestamp NULL DEFAULT NULL,
  `order_cancel_reason` varchar(300) DEFAULT NULL,
  `order_cancelled_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table orders
INSERT INTO orders VALUES ('1', '1', 'Canceled', '1', '0', '115', '0', '0', '2024-06-04 14:36:25', '2024-06-04 11:47:25', '0000-00-00 00:00:00', 'Malakas po ulan', '');
INSERT INTO orders VALUES ('2', '1', 'Canceled', '1', '0', '75', '30', '105', '2024-06-04 17:50:09', '2024-06-04 12:17:05', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('3', '1', 'Canceled', '1', '0', '115', '30', '145', '2024-06-04 18:17:16', '2024-06-04 12:18:24', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('4', '1', 'Canceled', '1', '0', '75', '30', '105', '2024-06-04 18:19:08', '2024-06-04 12:19:23', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('5', '1', 'Canceled', '1', '0', '185', '30', '215', '2024-06-04 18:20:44', '2024-06-04 12:22:21', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('6', '1', 'Canceled', '1', '0', '115', '20', '135', '2024-06-04 18:23:17', '2024-06-04 12:24:20', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('7', '1', 'Canceled', '1', '0', '115', '20', '135', '2024-06-04 18:25:43', '2024-06-04 12:27:32', '0000-00-00 00:00:00', 'Malakas po ulan', '');
INSERT INTO orders VALUES ('8', '1', 'Canceled', '1', '0', '135', '30', '165', '2024-06-04 18:31:34', '2024-06-04 12:32:52', '0000-00-00 00:00:00', 'Malaks ulan', '');
INSERT INTO orders VALUES ('9', '1', 'Approved', '1', '2', '75', '30', '105', '2024-06-04 18:33:38', '2024-06-04 12:33:58', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('10', '1', 'Approved', '1', '2', '145', '30', '175', '2024-06-04 18:39:39', '2024-06-04 12:39:57', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('11', '1', 'On the Way', '3', '5', '585', '30', '615', '2024-06-04 18:42:03', '2024-06-04 12:42:18', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('12', '1', 'Approved', '1', '6', '75', '30', '105', '2024-06-04 18:45:23', '2024-06-04 12:45:58', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('13', '1', 'Approved', '3', '7', '345', '30', '375', '2024-06-04 19:00:01', '2024-06-04 13:00:23', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('14', '1', 'Approved', '1', '2', '75', '30', '105', '2024-06-04 19:04:03', '2024-06-04 13:04:14', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('15', '1', 'Approved', '1', '8', '75', '30', '105', '2024-06-04 19:06:14', '2024-06-04 13:20:52', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('16', '1', 'Approved', '1', '4', '195', '20', '215', '2024-06-04 19:26:24', '2024-06-04 16:32:14', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('17', '1', 'Approved', '1', '9', '155', '20', '175', '2024-06-04 22:32:29', '2024-06-04 16:32:53', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('18', '1', 'Approved', '1', '10', '205', '20', '225', '2024-06-04 22:40:43', '2024-06-04 16:47:50', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('19', '1', 'Approved', '1', '11', '75', '20', '95', '2024-06-04 22:48:47', '2024-06-04 17:06:42', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('20', '1', 'Approved', '2', '12', '290', '20', '310', '2024-06-04 23:33:04', '2024-06-04 17:33:25', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('21', '1', 'Delivered', '1', '4', '135', '20', '155', '2024-06-05 19:38:51', '2024-06-05 13:39:18', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('22', '1', 'Processed', '1', '1', '125', '30', '155', '2024-06-05 20:13:42', '2024-06-05 14:13:50', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('23', '1', 'Delivered', '1', '2', '85', '30', '115', '2024-06-06 14:11:51', '2024-06-07 08:16:07', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('24', '2', 'Delivered', '4', '0', '300', '0', '0', '2024-06-06 14:20:55', '', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('25', '1', 'On the Way', '4', '2', '700', '30', '730', '2024-06-07 16:19:45', '2024-06-07 10:35:22', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('26', '1', 'Delivered', '1', '2', '75', '30', '105', '2024-06-07 20:32:05', '2024-06-08 03:17:39', '0000-00-00 00:00:00', '', '');
INSERT INTO orders VALUES ('31', '1', 'Canceled', '4', '2', '700', '30', '730', '2024-06-09 18:28:50', '2024-06-09 12:38:36', '', 'Madulas', '2024-06-11 18:50:56');
INSERT INTO orders VALUES ('32', '1', 'Delivered', '6', '2', '950', '30', '980', '2024-06-09 18:51:28', '2024-06-09 13:27:05', '', '', '');
INSERT INTO orders VALUES ('33', '1', 'Placed', '6', '2', '950', '30', '980', '2024-06-10 10:19:53', '2024-06-11 11:11:27', '', '', '');
INSERT INTO orders VALUES ('34', '4', 'Open', '4', '0', '620', '0', '0', '2024-06-10 10:41:18', '', '', '', '');
INSERT INTO orders VALUES ('35', '6', 'Approved', '5', '15', '675', '0', '675', '2024-06-10 11:35:30', '2024-06-10 05:35:59', '', '', '');
INSERT INTO orders VALUES ('36', '6', 'Open', '5', '0', '675', '0', '0', '2024-06-10 11:36:15', '2024-06-10 11:36:15', '', '', '');
INSERT INTO orders VALUES ('37', '2', 'Canceled', '5', '18', '375', '0', '375', '2024-06-10 21:14:42', '2024-06-10 15:22:19', '', 'Malakas po ulan', '');
INSERT INTO orders VALUES ('38', '2', 'Processing', '3', '19', '465', '0', '495', '2024-06-10 21:22:59', '2024-06-10 15:26:49', '', '', '');
INSERT INTO orders VALUES ('39', '2', 'Open', '', '0', '', '0', '0', '2024-06-10 21:27:17', '2024-06-10 21:27:17', '', '', '');
INSERT INTO orders VALUES ('40', '1', 'Placed', '6', '2', '950', '30', '980', '2024-06-12 15:46:54', '2024-06-12 11:12:45', '', '', '');
INSERT INTO orders VALUES ('41', '1', 'Placed', '1', '4', '85', '20', '105', '2024-06-12 17:17:15', '2024-06-12 11:34:13', '', '', '');
INSERT INTO orders VALUES ('42', '1', 'Placed', '6', '23', '950', '30', '980', '2024-06-12 17:34:52', '2024-06-12 11:43:04', '', '', '');
INSERT INTO orders VALUES ('43', '1', 'Placed', '6', '24', '950', '30', '980', '2024-06-12 17:43:49', '2024-06-12 11:45:41', '', '', '');
INSERT INTO orders VALUES ('44', '1', 'Placed', '6', '25', '950', '30', '980', '2024-06-12 17:45:45', '2024-06-12 12:13:02', '', '', '');
INSERT INTO orders VALUES ('45', '1', 'Placed', '6', '26', '950', '30', '980', '2024-06-12 18:21:20', '2024-06-12 12:23:08', '', '', '');
INSERT INTO orders VALUES ('46', '1', 'Placed', '6', '27', '950', '30', '980', '2024-06-12 18:23:58', '2024-06-12 12:24:16', '', '', '');
INSERT INTO orders VALUES ('47', '1', 'Placed', '6', '28', '950', '20', '970', '2024-06-12 18:25:25', '2024-06-12 12:25:36', '', '', '');
INSERT INTO orders VALUES ('48', '1', 'Placed', '6', '24', '950', '30', '980', '2024-06-13 14:00:06', '2024-06-13 08:03:09', '', '', '');
INSERT INTO orders VALUES ('49', '1', 'Placed', '6', '24', '950', '30', '980', '2024-06-13 14:03:35', '2024-06-13 08:04:32', '', '', '');
INSERT INTO orders VALUES ('50', '1', 'Placed', '6', '24', '950', '30', '980', '2024-06-13 14:04:52', '2024-06-13 08:05:51', '', '', '');
INSERT INTO orders VALUES ('51', '1', 'Placed', '6', '24', '950', '30', '980', '2024-06-13 14:13:03', '2024-06-13 08:13:09', '', '', '');
INSERT INTO orders VALUES ('52', '1', 'Placed', '5', '24', '875', '30', '905', '2024-06-13 14:13:20', '2024-06-13 08:13:35', '', '', '');
INSERT INTO orders VALUES ('53', '1', 'Placed', '5', '24', '875', '30', '905', '2024-06-13 14:20:38', '2024-06-13 09:57:42', '', '', '');

-- Table structure for table payments
CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_ref_num` varchar(30) DEFAULT NULL,
  `pay_cod_proof` varchar(300) DEFAULT NULL,
  `pay_amount` float(9,2) NOT NULL,
  `pay_change` float(9,2) NOT NULL,
  `pay_paid_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_status` varchar(10) DEFAULT 'Paid',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table payments
INSERT INTO payments VALUES ('1', '2', 'GCash', 'example_ref_num', '', '100', '0', '2024-06-04 07:45:31', 'Paid');
INSERT INTO payments VALUES ('2', '2', 'GCash', '7308150178', '', '155', '0', '2024-06-04 13:52:55', 'Paid');
INSERT INTO payments VALUES ('3', '2', 'GCash', '5051528851', '', '155', '0', '2024-06-04 13:53:05', 'Paid');
INSERT INTO payments VALUES ('4', '2', 'GCash', '7110013145', '', '155', '0', '2024-06-04 13:54:06', 'Paid');
INSERT INTO payments VALUES ('5', '2', 'GCash', '4504808081', '', '155', '0', '2024-06-04 13:54:13', 'Paid');
INSERT INTO payments VALUES ('6', '2', 'GCash', '8681974203', '', '155', '0', '2024-06-04 07:54:54', 'Paid');
INSERT INTO payments VALUES ('7', '2', 'GCash', '4070502699', '', '155', '0', '2024-06-04 07:55:06', 'Paid');
INSERT INTO payments VALUES ('8', '2', 'Cash on Delivery', '0679646514', '', '155', '0', '2024-06-04 07:55:22', 'Paid');
INSERT INTO payments VALUES ('9', '2', 'GCash', '5634670979', '', '155', '0', '2024-06-04 07:57:42', 'Paid');
INSERT INTO payments VALUES ('10', '2', 'GCash', '2306323912', '', '155', '0', '2024-06-04 08:03:59', 'Paid');
INSERT INTO payments VALUES ('11', '2', 'GCash', '3336549511', '', '155', '0', '2024-06-04 08:08:58', 'Paid');
INSERT INTO payments VALUES ('12', '2', 'GCash', '1273293777', '', '155', '0', '2024-06-04 08:13:14', 'Paid');
INSERT INTO payments VALUES ('13', '1', 'GCash', '1558960875', '', '145', '0', '2024-06-04 11:47:25', 'Paid');
INSERT INTO payments VALUES ('14', '2', 'Cash on Delivery', '', '', '0', '0', '2024-06-04 18:17:05', 'Unpaid');
INSERT INTO payments VALUES ('15', '3', 'GCash', '6753568163', '', '145', '0', '2024-06-04 12:18:24', 'Paid');
INSERT INTO payments VALUES ('16', '4', 'GCash', '7826830957', '', '105', '0', '2024-06-04 12:19:23', 'Paid');
INSERT INTO payments VALUES ('17', '5', 'GCash', '7423208131', '', '215', '0', '2024-06-04 12:22:21', 'Paid');
INSERT INTO payments VALUES ('18', '6', 'GCash', '6052729062', '', '135', '0', '2024-06-04 12:24:20', 'Paid');
INSERT INTO payments VALUES ('19', '7', 'GCash', '4320704378', '', '135', '0', '2024-06-04 12:27:32', 'Paid');
INSERT INTO payments VALUES ('20', '8', 'Cash on Delivery', '7436587175', '', '165', '0', '2024-06-04 12:31:57', 'Paid');
INSERT INTO payments VALUES ('21', '8', 'Cash on Delivery', '2002270974', '', '165', '0', '2024-06-04 12:32:52', 'Paid');
INSERT INTO payments VALUES ('22', '9', 'GCash', '9405962250', '', '105', '0', '2024-06-04 12:33:58', 'Paid');
INSERT INTO payments VALUES ('23', '10', 'GCash', '0530201589', '', '175', '0', '2024-06-04 12:39:57', 'Paid');
INSERT INTO payments VALUES ('24', '11', 'GCash', '2168820968', '', '615', '0', '2024-06-04 12:42:18', 'Paid');
INSERT INTO payments VALUES ('25', '12', 'GCash', '8396040012', '', '105', '0', '2024-06-04 12:45:58', 'Paid');
INSERT INTO payments VALUES ('26', '13', 'GCash', '7467382125', '', '375', '0', '2024-06-04 13:00:23', 'Paid');
INSERT INTO payments VALUES ('27', '14', 'GCash', '4090667577', '', '105', '0', '2024-06-04 13:04:14', 'Paid');
INSERT INTO payments VALUES ('28', '15', 'GCash', '0134568996', '', '105', '0', '2024-06-04 13:20:52', 'Paid');
INSERT INTO payments VALUES ('29', '16', 'GCash', '0471798009', '', '215', '0', '2024-06-04 16:32:14', 'Paid');
INSERT INTO payments VALUES ('30', '17', 'GCash', '7603888046', '', '175', '0', '2024-06-04 16:32:53', 'Paid');
INSERT INTO payments VALUES ('31', '18', 'GCash', '4965510128', '', '225', '0', '2024-06-04 16:47:50', 'Paid');
INSERT INTO payments VALUES ('32', '19', 'GCash', '2312444543', '', '95', '0', '2024-06-04 17:06:42', 'Paid');
INSERT INTO payments VALUES ('33', '20', 'GCash', '3413189635', '', '310', '0', '2024-06-04 17:33:25', 'Paid');
INSERT INTO payments VALUES ('34', '21', 'GCash', '9246668428', '', '155', '0', '2024-06-05 13:39:18', 'Paid');
INSERT INTO payments VALUES ('35', '22', 'GCash', '4194203724', '', '155', '0', '2024-06-05 14:13:50', 'Paid');
INSERT INTO payments VALUES ('36', '23', 'GCash', '7107104592', '', '115', '0', '2024-06-07 08:16:07', 'Paid');
INSERT INTO payments VALUES ('37', '25', 'GCash', '3955588637', '', '730', '0', '2024-06-07 10:35:22', 'Paid');
INSERT INTO payments VALUES ('38', '26', 'GCash', '9346720757', '', '105', '0', '2024-06-08 03:17:39', 'Paid');
INSERT INTO payments VALUES ('39', '31', 'GCash', '9323119154', '', '730', '0', '2024-06-09 12:38:36', 'Paid');
INSERT INTO payments VALUES ('40', '32', 'GCash', '1842663817', '', '980', '0', '2024-06-09 13:27:05', 'Paid');
INSERT INTO payments VALUES ('41', '35', 'GCash', '8020556395', '', '675', '0', '2024-06-10 05:35:59', 'Paid');
INSERT INTO payments VALUES ('42', '37', 'GCash', '1739811148', '', '375', '0', '2024-06-10 15:22:19', 'Paid');
INSERT INTO payments VALUES ('43', '38', 'GCash', '1227130664', '', '495', '0', '2024-06-10 15:26:49', 'Paid');
INSERT INTO payments VALUES ('44', '33', 'GCash', '9726292230', '', '980', '0', '2024-06-11 11:11:27', 'Paid');
INSERT INTO payments VALUES ('45', '40', 'Cash on Delivery', '', '', '0', '0', '2024-06-12 17:12:45', 'Paid');
INSERT INTO payments VALUES ('46', '41', 'GCash', '4672477380', '', '105', '0', '2024-06-12 11:34:13', '');
INSERT INTO payments VALUES ('47', '42', 'GCash', '1274798562', '', '980', '0', '2024-06-12 11:43:04', '');
INSERT INTO payments VALUES ('48', '43', 'GCash', '4036534448', '', '980', '0', '2024-06-12 11:45:41', '');
INSERT INTO payments VALUES ('49', '44', 'GCash', '4754226364', '', '980', '0', '2024-06-12 12:13:02', '');
INSERT INTO payments VALUES ('50', '45', 'Card', '7247932662', '', '980', '0', '2024-06-12 12:23:08', '');
INSERT INTO payments VALUES ('51', '46', 'Paymaya', '4860038094', '', '980', '0', '2024-06-12 12:24:16', '');
INSERT INTO payments VALUES ('52', '47', 'Cash on Delivery', '', '', '0', '0', '2024-06-12 18:25:36', 'Unpaid');
INSERT INTO payments VALUES ('53', '48', 'GCash', '8045297357', '', '980', '0', '2024-06-13 08:03:09', 'Paid');
INSERT INTO payments VALUES ('54', '49', 'Cash on Delivery', '', '', '0', '0', '2024-06-13 14:03:40', 'Unpaid');
INSERT INTO payments VALUES ('55', '49', 'Cash on Delivery', '', '', '0', '0', '2024-06-13 14:04:22', 'Unpaid');
INSERT INTO payments VALUES ('56', '49', 'Cash on Delivery', '', '', '0', '0', '2024-06-13 14:04:32', 'Unpaid');
INSERT INTO payments VALUES ('57', '50', 'Cash on Delivery', '', '', '0', '0', '2024-06-13 14:04:58', 'Unpaid');
INSERT INTO payments VALUES ('58', '50', 'Cash on Delivery', '', '', '0', '0', '2024-06-13 14:05:23', 'Unpaid');
INSERT INTO payments VALUES ('59', '50', 'Cash on Delivery', '', '', '0', '0', '2024-06-13 14:05:29', 'Unpaid');
INSERT INTO payments VALUES ('60', '50', 'Cash on Delivery', '', '', '0', '0', '2024-06-13 14:05:51', 'Unpaid');
INSERT INTO payments VALUES ('61', '51', 'Cash on Delivery', '', '', '0', '0', '2024-06-13 14:13:09', 'Unpaid');
INSERT INTO payments VALUES ('62', '52', 'GCash', '4435259808', '', '905', '0', '2024-06-13 08:13:35', 'Paid');
INSERT INTO payments VALUES ('63', '53', 'GCash', '8018193481', '', '905', '0', '2024-06-13 08:20:50', 'Paid');
INSERT INTO payments VALUES ('64', '53', 'GCash', '5702521935', '', '905', '0', '2024-06-13 08:30:54', 'Paid');
INSERT INTO payments VALUES ('65', '53', 'GCash', '5654103615', '', '905', '0', '2024-06-13 08:31:27', 'Paid');
INSERT INTO payments VALUES ('66', '53', 'GCash', '5594329809', '', '905', '0', '2024-06-13 08:42:24', 'Paid');
INSERT INTO payments VALUES ('67', '53', 'GCash', '4289719563', '', '905', '0', '2024-06-13 08:42:29', 'Paid');
INSERT INTO payments VALUES ('68', '53', 'GCash', '7595030819', '', '905', '0', '2024-06-13 08:42:32', 'Paid');
INSERT INTO payments VALUES ('69', '53', 'GCash', '8535970757', '', '905', '0', '2024-06-13 08:42:43', 'Paid');
INSERT INTO payments VALUES ('70', '53', 'GCash', '2295903499', '', '905', '0', '2024-06-13 08:44:17', 'Paid');
INSERT INTO payments VALUES ('71', '53', 'GCash', '9083730014', '', '905', '0', '2024-06-13 08:46:27', 'Paid');
INSERT INTO payments VALUES ('72', '53', 'GCash', '3569887001', '', '905', '0', '2024-06-13 08:48:26', 'Paid');
INSERT INTO payments VALUES ('73', '53', 'GCash', '4335326111', '', '905', '0', '2024-06-13 08:49:57', 'Paid');
INSERT INTO payments VALUES ('74', '53', 'GCash', '8065740345', '', '905', '0', '2024-06-13 08:50:06', 'Paid');
INSERT INTO payments VALUES ('75', '53', 'GCash', '3507919783', '', '905', '0', '2024-06-13 08:50:21', 'Paid');
INSERT INTO payments VALUES ('76', '53', 'GCash', '5924675442', '', '905', '0', '2024-06-13 08:50:46', 'Paid');
INSERT INTO payments VALUES ('77', '53', 'GCash', '0556005227', '', '905', '0', '2024-06-13 08:50:55', 'Paid');
INSERT INTO payments VALUES ('78', '53', 'GCash', '0328410205', '', '905', '0', '2024-06-13 08:51:03', 'Paid');
INSERT INTO payments VALUES ('79', '53', 'GCash', '9685471005', '', '905', '0', '2024-06-13 08:51:50', 'Paid');
INSERT INTO payments VALUES ('80', '53', 'GCash', '3452443693', '', '905', '0', '2024-06-13 08:52:03', 'Paid');
INSERT INTO payments VALUES ('81', '53', 'GCash', '7059317001', '', '905', '0', '2024-06-13 08:52:28', 'Paid');
INSERT INTO payments VALUES ('82', '53', 'GCash', '5593642395', '', '905', '0', '2024-06-13 08:52:53', 'Paid');
INSERT INTO payments VALUES ('83', '53', 'GCash', '6029030379', '', '905', '0', '2024-06-13 08:53:04', 'Paid');
INSERT INTO payments VALUES ('84', '53', 'GCash', '0605415549', '', '905', '0', '2024-06-13 08:54:11', 'Paid');
INSERT INTO payments VALUES ('85', '53', 'GCash', '3739512556', '', '905', '0', '2024-06-13 08:57:13', 'Paid');
INSERT INTO payments VALUES ('86', '53', 'GCash', '0676900163', '', '905', '0', '2024-06-13 08:58:06', 'Paid');
INSERT INTO payments VALUES ('87', '53', 'GCash', '7544814662', '', '905', '0', '2024-06-13 08:58:37', 'Paid');
INSERT INTO payments VALUES ('88', '53', 'GCash', '8229708071', '', '905', '0', '2024-06-13 08:59:50', 'Paid');
INSERT INTO payments VALUES ('89', '53', 'GCash', '9110813963', '', '905', '0', '2024-06-13 09:00:06', 'Paid');
INSERT INTO payments VALUES ('90', '53', 'GCash', '8653033945', '', '905', '0', '2024-06-13 09:00:36', 'Paid');
INSERT INTO payments VALUES ('91', '53', 'GCash', '2268332340', '', '905', '0', '2024-06-13 09:00:53', 'Paid');
INSERT INTO payments VALUES ('92', '53', 'GCash', '7614486418', '', '905', '0', '2024-06-13 09:01:49', 'Paid');
INSERT INTO payments VALUES ('93', '53', 'GCash', '9789506714', '', '905', '0', '2024-06-13 09:01:59', 'Paid');
INSERT INTO payments VALUES ('94', '53', 'GCash', '0723671175', '', '905', '0', '2024-06-13 09:02:50', 'Paid');
INSERT INTO payments VALUES ('95', '53', 'GCash', '7830516984', '', '905', '0', '2024-06-13 09:03:00', 'Paid');
INSERT INTO payments VALUES ('96', '53', 'GCash', '8471457013', '', '905', '0', '2024-06-13 09:03:45', 'Paid');
INSERT INTO payments VALUES ('97', '53', 'GCash', '2131992519', '', '905', '0', '2024-06-13 09:05:44', 'Paid');
INSERT INTO payments VALUES ('98', '53', 'GCash', '1318450683', '', '905', '0', '2024-06-13 09:07:15', 'Paid');
INSERT INTO payments VALUES ('99', '53', 'GCash', '5346323256', '', '905', '0', '2024-06-13 09:09:33', 'Paid');
INSERT INTO payments VALUES ('100', '53', 'GCash', '1396688799', '', '905', '0', '2024-06-13 09:09:59', 'Paid');
INSERT INTO payments VALUES ('101', '53', 'GCash', '9601875693', '', '905', '0', '2024-06-13 09:11:10', 'Paid');
INSERT INTO payments VALUES ('102', '53', 'GCash', '7924762910', '', '905', '0', '2024-06-13 09:11:51', 'Paid');
INSERT INTO payments VALUES ('103', '53', 'GCash', '8342955203', '', '905', '0', '2024-06-13 09:14:04', 'Paid');
INSERT INTO payments VALUES ('104', '53', 'GCash', '3257713159', '', '905', '0', '2024-06-13 09:15:09', 'Paid');
INSERT INTO payments VALUES ('105', '53', 'GCash', '5759500990', '', '905', '0', '2024-06-13 09:16:10', 'Paid');
INSERT INTO payments VALUES ('106', '53', 'GCash', '0395678545', '', '905', '0', '2024-06-13 09:16:35', 'Paid');
INSERT INTO payments VALUES ('107', '53', 'GCash', '3650766992', '', '905', '0', '2024-06-13 09:16:40', 'Paid');
INSERT INTO payments VALUES ('108', '53', 'GCash', '1904683024', '', '905', '0', '2024-06-13 09:17:06', 'Paid');
INSERT INTO payments VALUES ('109', '53', 'GCash', '4576941852', '', '905', '0', '2024-06-13 09:17:14', 'Paid');
INSERT INTO payments VALUES ('110', '53', 'GCash', '8563209056', '', '905', '0', '2024-06-13 09:17:18', 'Paid');
INSERT INTO payments VALUES ('111', '53', 'GCash', '7435147545', '', '905', '0', '2024-06-13 09:17:23', 'Paid');
INSERT INTO payments VALUES ('112', '53', 'GCash', '9741674087', '', '905', '0', '2024-06-13 09:18:50', 'Paid');
INSERT INTO payments VALUES ('113', '53', 'GCash', '5434089500', '', '905', '0', '2024-06-13 09:20:50', 'Paid');
INSERT INTO payments VALUES ('114', '53', 'GCash', '0569111869', '', '905', '0', '2024-06-13 09:22:51', 'Paid');
INSERT INTO payments VALUES ('115', '53', 'GCash', '4576328475', '', '905', '0', '2024-06-13 09:22:56', 'Paid');
INSERT INTO payments VALUES ('116', '53', 'GCash', '3294474623', '', '905', '0', '2024-06-13 09:24:42', 'Paid');
INSERT INTO payments VALUES ('117', '53', 'GCash', '5517610411', '', '905', '0', '2024-06-13 09:25:20', 'Paid');
INSERT INTO payments VALUES ('118', '53', 'GCash', '8103734978', '', '905', '0', '2024-06-13 09:25:31', 'Paid');
INSERT INTO payments VALUES ('119', '53', 'GCash', '5984560098', '', '905', '0', '2024-06-13 09:25:38', 'Paid');
INSERT INTO payments VALUES ('120', '53', 'GCash', '2489871722', '', '905', '0', '2024-06-13 09:27:01', 'Paid');
INSERT INTO payments VALUES ('121', '53', 'GCash', '4812732826', '', '905', '0', '2024-06-13 09:27:53', 'Paid');
INSERT INTO payments VALUES ('122', '53', 'GCash', '2777321931', '', '905', '0', '2024-06-13 09:29:29', 'Paid');
INSERT INTO payments VALUES ('123', '53', 'GCash', '3177731050', '', '905', '0', '2024-06-13 09:29:43', 'Paid');
INSERT INTO payments VALUES ('124', '53', 'GCash', '4697616780', '', '905', '0', '2024-06-13 09:30:10', 'Paid');
INSERT INTO payments VALUES ('125', '53', 'GCash', '6656280973', '', '905', '0', '2024-06-13 09:31:16', 'Paid');
INSERT INTO payments VALUES ('126', '53', 'GCash', '4197587076', '', '905', '0', '2024-06-13 09:31:19', 'Paid');
INSERT INTO payments VALUES ('127', '53', 'GCash', '7626604314', '', '905', '0', '2024-06-13 09:31:49', 'Paid');
INSERT INTO payments VALUES ('128', '53', 'GCash', '2589350635', '', '905', '0', '2024-06-13 09:34:05', 'Paid');
INSERT INTO payments VALUES ('129', '53', 'GCash', '0853005669', '', '905', '0', '2024-06-13 09:34:20', 'Paid');
INSERT INTO payments VALUES ('130', '53', 'GCash', '9900076875', '', '905', '0', '2024-06-13 09:34:29', 'Paid');
INSERT INTO payments VALUES ('131', '53', 'GCash', '6649205438', '', '905', '0', '2024-06-13 09:34:49', 'Paid');
INSERT INTO payments VALUES ('132', '53', 'GCash', '8871478420', '', '905', '0', '2024-06-13 09:36:08', 'Paid');
INSERT INTO payments VALUES ('133', '53', 'GCash', '5803603009', '', '905', '0', '2024-06-13 09:36:48', 'Paid');
INSERT INTO payments VALUES ('134', '53', 'GCash', '0631838124', '', '905', '0', '2024-06-13 09:37:02', 'Paid');
INSERT INTO payments VALUES ('135', '53', 'GCash', '9473785484', '', '905', '0', '2024-06-13 09:37:40', 'Paid');
INSERT INTO payments VALUES ('136', '53', 'GCash', '1713954236', '', '905', '0', '2024-06-13 09:37:51', 'Paid');
INSERT INTO payments VALUES ('137', '53', 'GCash', '3762498976', '', '905', '0', '2024-06-13 09:38:04', 'Paid');
INSERT INTO payments VALUES ('138', '53', 'GCash', '3145114862', '', '905', '0', '2024-06-13 09:38:44', 'Paid');
INSERT INTO payments VALUES ('139', '53', 'GCash', '2055281216', '', '905', '0', '2024-06-13 09:38:51', 'Paid');
INSERT INTO payments VALUES ('140', '53', 'GCash', '8756336168', '', '905', '0', '2024-06-13 09:41:24', 'Paid');
INSERT INTO payments VALUES ('141', '53', 'GCash', '5145983228', '', '905', '0', '2024-06-13 09:41:32', 'Paid');
INSERT INTO payments VALUES ('142', '53', 'GCash', '6205458016', '', '905', '0', '2024-06-13 09:42:16', 'Paid');
INSERT INTO payments VALUES ('143', '53', 'GCash', '7351070378', '', '905', '0', '2024-06-13 09:42:26', 'Paid');
INSERT INTO payments VALUES ('144', '53', 'GCash', '3264371629', '', '905', '0', '2024-06-13 09:44:14', 'Paid');
INSERT INTO payments VALUES ('145', '53', 'GCash', '9883580615', '', '905', '0', '2024-06-13 09:44:27', 'Paid');
INSERT INTO payments VALUES ('146', '53', 'GCash', '7660484419', '', '905', '0', '2024-06-13 09:44:55', 'Paid');
INSERT INTO payments VALUES ('147', '53', 'GCash', '5046129522', '', '905', '0', '2024-06-13 09:45:37', 'Paid');
INSERT INTO payments VALUES ('148', '53', 'GCash', '6725591553', '', '905', '0', '2024-06-13 09:46:50', 'Paid');
INSERT INTO payments VALUES ('149', '53', 'GCash', '3317211916', '', '905', '0', '2024-06-13 09:48:24', 'Paid');
INSERT INTO payments VALUES ('150', '53', 'GCash', '9048429179', '', '905', '0', '2024-06-13 09:48:31', 'Paid');
INSERT INTO payments VALUES ('151', '53', 'GCash', '2826066367', '', '905', '0', '2024-06-13 09:48:36', 'Paid');
INSERT INTO payments VALUES ('152', '53', 'GCash', '6654063742', '', '905', '0', '2024-06-13 09:48:43', 'Paid');
INSERT INTO payments VALUES ('153', '53', 'GCash', '8031935033', '', '905', '0', '2024-06-13 09:49:18', 'Paid');
INSERT INTO payments VALUES ('154', '53', 'GCash', '9627102789', '', '905', '0', '2024-06-13 09:49:33', 'Paid');
INSERT INTO payments VALUES ('155', '53', 'GCash', '5591827252', '', '905', '0', '2024-06-13 09:50:00', 'Paid');
INSERT INTO payments VALUES ('156', '53', 'GCash', '9100474982', '', '905', '0', '2024-06-13 09:50:44', 'Paid');
INSERT INTO payments VALUES ('157', '53', 'GCash', '8994026995', '', '905', '0', '2024-06-13 09:50:54', 'Paid');
INSERT INTO payments VALUES ('158', '53', 'GCash', '9708677361', '', '905', '0', '2024-06-13 09:51:04', 'Paid');
INSERT INTO payments VALUES ('159', '53', 'GCash', '7894006060', '', '905', '0', '2024-06-13 09:51:17', 'Paid');
INSERT INTO payments VALUES ('160', '53', 'GCash', '5679640418', '', '905', '0', '2024-06-13 09:51:33', 'Paid');
INSERT INTO payments VALUES ('161', '53', 'GCash', '2223635861', '', '905', '0', '2024-06-13 09:52:05', 'Paid');
INSERT INTO payments VALUES ('162', '53', 'GCash', '3587769042', '', '905', '0', '2024-06-13 09:52:37', 'Paid');
INSERT INTO payments VALUES ('163', '53', 'GCash', '7896253927', '', '905', '0', '2024-06-13 09:52:45', 'Paid');
INSERT INTO payments VALUES ('164', '53', 'GCash', '4806055629', '', '905', '0', '2024-06-13 09:52:57', 'Paid');
INSERT INTO payments VALUES ('165', '53', 'GCash', '2809484669', '', '905', '0', '2024-06-13 09:53:21', 'Paid');
INSERT INTO payments VALUES ('166', '53', 'GCash', '3397436443', '', '905', '0', '2024-06-13 09:53:39', 'Paid');
INSERT INTO payments VALUES ('167', '53', 'GCash', '5526087187', '', '905', '0', '2024-06-13 09:57:42', 'Paid');

-- Table structure for table products
CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(80) NOT NULL,
  `prod_category` varchar(50) NOT NULL,
  `prod_base_price` float(9,2) NOT NULL,
  `prod_img` varchar(300) NOT NULL,
  `prod_status` varchar(30) NOT NULL DEFAULT 'Available',
  `prod_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `prod_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table products
INSERT INTO products VALUES ('1', 'Coffee Jelly', 'Add-Ons', '20', 'assets/products/sample.jpg', 'Archived', '2024-06-02 01:47:04', '2024-06-12 21:51:21');
INSERT INTO products VALUES ('2', 'Crystals', 'Add-Ons', '20', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-10 11:01:44');
INSERT INTO products VALUES ('3', 'Cream Cheese', 'Add-Ons', '20', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-10 11:40:15');
INSERT INTO products VALUES ('4', 'Cream Puff', 'Add-Ons', '20', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('5', 'Crushed Oreo', 'Add-Ons', '20', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 21:45:12');
INSERT INTO products VALUES ('6', 'Pearls', 'Add-Ons', '20', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 21:45:12');
INSERT INTO products VALUES ('7', 'Popping Boba', 'Add-Ons', '20', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 21:45:12');
INSERT INTO products VALUES ('8', 'Pudding', 'Add-Ons', '20', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('9', 'Blueberry', 'Fruit Tea', '75', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('10', 'Green Apple', 'Fruit Tea', '75', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('11', 'Kiwi', 'Fruit Tea', '75', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('12', 'Lychee', 'Fruit Tea', '75', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('13', 'Passion', 'Fruit Tea', '75', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('14', 'Chocolate', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('15', 'Cookies & Cream', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('16', 'Dark Choco', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('17', 'Dark Choco Vanilla', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('18', 'Hokkaido', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('19', 'Honey Dew Slush', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('20', 'Kingkong\'s Delight', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('21', 'Matcha', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('22', 'Okinawa', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('23', 'Premium Thai Classic', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('24', 'Taiwan\'s Classic', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('25', 'Taro', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('26', 'Wintermelon', 'Milk Tea with Pearl', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('27', 'Cappuccino', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('28', 'Choco Banana', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('29', 'Dark Choco', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('30', 'Double Dutch', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('31', 'Java Chip', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('32', 'Matcha', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('33', 'Matcha Oreo', 'Smoothies Edition', '100', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('34', 'Milky Taro', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('35', 'Mocha', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('36', 'Salted Caramel', 'Smoothies Edition', '90', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('37', 'Blueberry', 'Yakult Edition', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('38', 'Green Apple', 'Yakult Edition', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('39', 'Kiwi', 'Yakult Edition', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('40', 'Lychee', 'Yakult Edition', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');
INSERT INTO products VALUES ('41', 'Passion', 'Yakult Edition', '85', 'assets/products/sample.jpg', 'Available', '2024-06-02 01:47:04', '2024-06-02 01:50:30');

-- Table structure for table user_addresses
CREATE TABLE `user_addresses` (
  `uaddress_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `uaddress_name` varchar(50) NOT NULL,
  `uaddress_type` varchar(50) NOT NULL,
  `uaddress_house_num` varchar(50) DEFAULT NULL,
  `uaddress_street` varchar(50) NOT NULL,
  `uaddress_brgy` varchar(50) NOT NULL,
  `uaddress_city` varchar(50) NOT NULL,
  `uaddress_province` varchar(100) DEFAULT NULL,
  `uaddress_region` varchar(100) DEFAULT NULL,
  `uaddress_landmark` varchar(100) NOT NULL,
  `uaddress_archived` int(11) NOT NULL DEFAULT 0,
  `uaddress_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`uaddress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table user_addresses
INSERT INTO user_addresses VALUES ('1', '1', 'Home Address', 'Saved', '', 'Purok Uno', 'Tenejero', 'Candaba', '', '', '', '0', '2024-06-03 21:27:53');
INSERT INTO user_addresses VALUES ('2', '1', 'Bahay ni Lola', 'Saved', '12', 'Purok Uno', 'Tenejero', 'Candaba', '', '', 'Tapat ng SJSC', '1', '2024-06-03 21:58:59');
INSERT INTO user_addresses VALUES ('3', '1', 'Bahay ni Bazil', 'Saved', '1234', 'Green Peas', 'Tangos', 'Baliwag', '', '', 'NU Baliwag', '1', '2024-06-03 21:59:43');
INSERT INTO user_addresses VALUES ('4', '1', 'Bahay ni Lolo', 'Saved', '1234', 'Purok Uno', 'Sto. Nino', 'San Luis', '', '', 'None', '1', '2024-06-04 15:16:33');
INSERT INTO user_addresses VALUES ('5', '1', 'Home', 'Not Saved', '12', 'Purok Uno', '', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-04 12:42:18');
INSERT INTO user_addresses VALUES ('6', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', '', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-04 12:45:58');
INSERT INTO user_addresses VALUES ('7', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', '', 'Candaba', '', '', 'undefined', '0', '2024-06-04 13:00:23');
INSERT INTO user_addresses VALUES ('8', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', '', '', '', '', 'Tapat ng SJSC', '0', '2024-06-04 13:20:52');
INSERT INTO user_addresses VALUES ('9', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', '', '', '', '', 'Tapat ng SJSC', '0', '2024-06-04 16:32:53');
INSERT INTO user_addresses VALUES ('10', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', '', '', '', '', 'undefined', '0', '2024-06-04 16:47:50');
INSERT INTO user_addresses VALUES ('11', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Barit', 'Candaba', '', '', 'Hatdog', '0', '2024-06-04 17:06:42');
INSERT INTO user_addresses VALUES ('12', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Barit', 'Candaba', '', '', 'None', '0', '2024-06-04 17:33:25');
INSERT INTO user_addresses VALUES ('13', '1', 'Kath\'s House', 'Saved', '1234', 'Purok Uno', '035405009', '035405', '', '', 'None', '1', '2024-06-09 20:47:48');
INSERT INTO user_addresses VALUES ('14', '4', 'Bahay Namin', 'Saved', '12', 'Purok Uno', '035405034', '035405', '', '', 'Hatdog', '0', '2024-06-10 10:43:41');
INSERT INTO user_addresses VALUES ('15', '6', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Talang', 'Candaba', '', '', 'Hatdog', '0', '2024-06-10 05:35:59');
INSERT INTO user_addresses VALUES ('16', '6', 'Kath\'s House', 'Saved', '1234', 'Purok Uno', '031405010', '031405', '', '', 'Hatdog', '0', '2024-06-10 11:38:19');
INSERT INTO user_addresses VALUES ('17', '2', 'Kath\'s House', 'Saved', '1234', 'Purok Uno', '035405034', '035405', '', '', 'Tapat ng SJSC', '0', '2024-06-10 21:11:00');
INSERT INTO user_addresses VALUES ('18', '2', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Talang', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-10 15:22:19');
INSERT INTO user_addresses VALUES ('19', '2', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', '', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-10 15:26:49');
INSERT INTO user_addresses VALUES ('20', '1', 'Kath&#039;s House', 'Saved', '1234', 'Purok Uno', '035405034', '035405', '', '', 'None', '1', '2024-06-12 15:27:29');
INSERT INTO user_addresses VALUES ('21', '1', 'Kath\'s House', 'Saved', '1234', 'Purok Uno', 'Biñang 1st', 'Bocaue', '', '', 'undefined', '1', '2024-06-12 15:39:49');
INSERT INTO user_addresses VALUES ('22', '1', 'Kath\'s House', 'Saved', '1234', 'Purok Uno', 'Catulinan', 'Baliuag', '', '', 'None', '1', '2024-06-12 16:33:01');
INSERT INTO user_addresses VALUES ('23', '1', 'Delivery Address Only', 'Not Saved', '12', 'Purok Uno', 'Dalayap', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-12 11:43:04');
INSERT INTO user_addresses VALUES ('24', '1', 'My House', 'Saved', '1234', 'Purok Uno', 'Dalayap', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-12 17:43:45');
INSERT INTO user_addresses VALUES ('25', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Talang', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-12 12:13:02');
INSERT INTO user_addresses VALUES ('26', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Mangga', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-12 12:23:08');
INSERT INTO user_addresses VALUES ('27', '1', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Dalayap', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-12 12:24:16');
INSERT INTO user_addresses VALUES ('28', '1', 'Delivery Address Only', 'Not Saved', '12', 'Purok Uno', 'San Roque', 'San Luis', '', '', 'Tapat ng SJSC', '0', '2024-06-12 12:25:36');

-- Table structure for table users
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `user_num` varchar(11) NOT NULL,
  `user_pic` varchar(500) NOT NULL,
  `user_sec_que_1` varchar(100) NOT NULL,
  `user_sec_ans_1` varchar(256) NOT NULL,
  `user_sec_que_2` varchar(100) NOT NULL,
  `user_sec_ans_2` varchar(256) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'Registered',
  `user_state` varchar(30) DEFAULT 'Enabled',
  `user_mfa` varchar(10) NOT NULL DEFAULT 'Disabled',
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_verification_code` varchar(6) DEFAULT NULL,
  `user_verified_at` timestamp NULL DEFAULT NULL,
  `user_locked_until` timestamp NULL DEFAULT NULL,
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table users
INSERT INTO users VALUES ('1', '1', 'Nataliaaaa', 'Molitoooooooo', 'nataliamolito120101@gmail.com', '$2y$10$zkuoKY4M.CoktbpA1HzrA.r0vA8iAXz9zPy5NUdGA9umjGQXHuuHm', '09655439798', 'assets/profile-pictures/_1_Nataliaaaa Molitoooooooo_profile_pic_2024-06-12 04-59-04.png', 'What is the name of your first pet?', '$2y$10$DKrEwMMzQzKWl740fAifMu4IJ0kfVWDBQRh.lF2J22BstYsqTcKN.', 'In what city were you born?', '$2y$10$8nQ6qUoamTgL9jEMNHk8K.DDmm.ARic4I27Bb6Ep/OekbjY3ktOXa', 'Verified', 'Enabled', 'Disabled', '2024-06-03 03:08:39', '', '2024-06-03 03:41:04', '', '2024-06-13 13:59:52');
INSERT INTO users VALUES ('2', '3', 'Natalia Secondddd', 'Molito', 'natalia.styles.molito@gmail.com', '$2y$10$zkuoKY4M.CoktbpA1HzrA.r0vA8iAXz9zPy5NUdGA9umjGQXHuuHm', '09655439798', 'assets/profile-pictures/_2_Natalia Second Molito_profile_pic_2024-06-10 15-11-29.jpg', 'What is the name of your first pet?', '$2y$10$d1EW8Y3iwixG8', 'In what city were you born?', '$2y$10$BjDeV7IDjJ5td', 'Verified', 'Enabled', 'Disabled', '2024-06-03 03:08:45', '', '2024-06-06 14:19:18', '', '2024-06-13 16:55:35');
INSERT INTO users VALUES ('3', '2', 'Blu', 'Gfx', 'blugfxdesign@gmail.com', '$2y$10$zJ1yZkh8rwC0ICKf4xS7cuLaVb8F//2uCG7qPURraiOwyaRwkSQWq', '09655439880', '', 'What is the name of your first pet?', '$2y$10$vL4QTd1y1qwpF', 'What is the name of your favorite teacher?', '$2y$10$1p9/oCcK/K4NP', 'Verified', 'Enabled', 'Disabled', '2024-06-07 08:12:42', '', '2024-06-08 09:26:07', '', '2024-06-11 17:14:59');
INSERT INTO users VALUES ('4', '1', 'Rochelle', 'Sagnip', 'rochelle.sagnip12@gmail.com', '$2y$10$fZ7qc52Mu76Hg16lJx50H.Hx2l1arh08rjO9/nK2rgYFYiSkT93CO', '09655439893', 'assets/profile-pictures/_4_Rochelle Sagnip_profile_pic_2024-06-10 04-43-06.jpg', 'What is the name of your first pet?', '$2y$10$Er7YzgLzq03Fc1PAgUTMreoD45pQuhv777/VDdiMvB5yLc153FEki', 'In what city were you born?', '$2y$10$.CYgwSmrIOBTRcQhpdbSreg8U3dWmk6RQuxlOY2h3eTYqlWmdXn6q', 'Verified', 'Enabled', 'Disabled', '2024-06-10 10:31:57', '', '2024-06-10 10:37:56', '', '2024-06-12 13:29:10');
INSERT INTO users VALUES ('5', '1', 'Ivan', 'Lunita', 'ivanlunits@gmail.com', '$2y$10$5dqhoGUyJHXxSlJXK5mRIOGLAYKaVI2URib/qf8SnNf8S52BlBof2', '09361364732', '', 'What is the name of your first pet?', '$2y$10$DKrEwMMzQzKWl740fAifMu4IJ0kfVWDBQRh.lF2J22BstYsqTcKN.', 'In what city were you born?', '$2y$10$V8q2cs7Htn21eXqqF5kSUOKN9GTOCKFN5bnoZzIUFSEyIciGjCyMm', 'Registered', 'Enabled', 'Disabled', '2024-06-10 10:39:01', '', '', '', '2024-06-12 13:29:08');
INSERT INTO users VALUES ('6', '1', 'Mak', 'Pongase', 'macmacpongs02@gmail.com', '$2y$10$dXG6rcobl59OHjIEt3L3VegZwGUuS7NfrohD8DZco7RY7kMYjTTOm', '09655439793', '', 'What is the name of your first pet?', '$2y$10$bkrit6xhuMhW5.9W2jPgpuA/EYl/gxd2TfriA1MAJenT.VDMGPRzm', 'In what city were you born?', '$2y$10$8nQ6qUoamTgL9jEMNHk8K.DDmm.ARic4I27Bb6Ep/OekbjY3ktOXa', 'Verified', 'Enabled', 'Disabled', '2024-06-10 11:30:09', '', '2024-06-10 11:30:33', '', '2024-06-10 11:34:31');
INSERT INTO users VALUES ('7', '1', 'Madelleine', 'Hipolito', 'leileihplto@gmail.com', '$2y$10$pkLyuEeeXiUJtfjC0eh3qeNSZm1NAQQdrIZLq6DU8Fb35dfDvVuGy', '09655439733', '', 'What is the name of your first pet?', '$2y$10$iCZN2CtkDyOBOgASc7fFWOQxGlWa8I6IoBQjWEcbKI3QCyKpNxQuq', 'In what city were you born?', '$2y$10$00/puzYeJoi7gITNsvXgBujmqgN3qNmvRKP1Jw1hHHnEzJ9nSpHFi', 'Verified', 'Enabled', 'Disabled', '2024-06-10 21:29:36', '', '2024-06-10 21:33:15', '', '2024-06-10 21:33:15');
INSERT INTO users VALUES ('8', '1', 'Christian', 'Isleta', 'christianchen243@gmail.com', '$2y$10$nNN.vx/ys3MS7RdoJf8SKuZiluviN/K0L5ZcEqg00LnJW6g5lNLeC', '09655439791', '', 'In what city were you born?', '$2y$10$QpkpqFIIFwe7zm5ZmStypetEHJPDSG8YUY4wLFxTDVGlcqh/UrLSy', 'What is the name of your first pet?', '$2y$10$IHBN.wcV.ORLVxWesvKEaOR8SCXj845ErWuvuuHKxzTDbB9Yt9tfW', 'Verified', 'Enabled', 'Disabled', '2024-06-10 21:37:02', '', '2024-06-10 21:37:53', '', '2024-06-10 21:37:53');
INSERT INTO users VALUES ('9', '1', 'Shemaiah', 'Santos', 'shemaiahs10@gmail.com', '$2y$10$/USxqFI2xJen9x8LEWmc9udd5K/BDBwMR2iuLL4/FfMVeOWD/4PYi', '09655439745', '', 'What is the name of your first pet?', '$2y$10$o3HaOvcuwuVxAxeUzB1uLu6wIGCXB0D9SpNotJKL6J.Bfx0XkeLEC', 'In what city were you born?', '$2y$10$Vh5UBxCMwWX.oZcTV6x57OmiQvqLyMUicBUr6jiXKJeK1hb1DdlW6', 'Verified', 'Enabled', 'Disabled', '2024-06-11 14:27:43', '', '2024-06-11 14:28:33', '', '2024-06-11 14:28:33');
INSERT INTO users VALUES ('10', '1', 'Justin', 'Dino', 'justindino280@gmail.com', '$2y$10$8gJFpP56tcefD9UDS9GNGez1WSf/Md9fVuSHb6Tha4fXf/yEDMWsK', '09655439677', '', 'What is the name of your first pet?', '$2y$10$zix3xDS/4cPafSJ2mh.aheLeF0hzwDzxS1kip633rr4/cAfCojz76', 'In what city were you born?', '$2y$10$8FNKzcFxuPvt9JmDL.9vre5Mjhf89nfCqK6CS52Q6rldBaU2qsrNK', 'Registered', 'Enabled', 'Disabled', '2024-06-11 14:32:09', '', '', '', '2024-06-11 14:32:09');

