/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : lawproject

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 24/07/2020 08:46:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for about_us
-- ----------------------------
DROP TABLE IF EXISTS `about_us`;
CREATE TABLE `about_us`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of about_us
-- ----------------------------
INSERT INTO `about_us` VALUES (1, 'First', 'this is example of abut us list. this is example of abut us list. this is example of abut us list. this is example of abut us list. this is example of abut us list. this is example of abut us list. this is example of abut us list. this is example of abut us list. this is example of abut us list.');
INSERT INTO `about_us` VALUES (3, 'Second Title', 'This is description of second title. This is description of second title. This is description of second title. This is description of second title. This is description of second title. This is description of second title. This is description of second title.');

-- ----------------------------
-- Table structure for constitution
-- ----------------------------
DROP TABLE IF EXISTS `constitution`;
CREATE TABLE `constitution`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contents` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of constitution
-- ----------------------------
INSERT INTO `constitution` VALUES (1, 'CHAPTER ONE', 'The Flag of the Republic shall be shuch a device as Parliament shall prescribe The design of the Flag shall be from the top of the Flag to the bottom thereof, three horizontal stripes of green. shite and blue.');
INSERT INTO `constitution` VALUES (2, 'CHAPTER TWO', 'The Flag of the Republic shall be shuch a device as Parliament shall prescribe The design of the Flag shall be from the top of the Flag to the bottom thereof, three horizontal stripes of green. shite and blue.');
INSERT INTO `constitution` VALUES (3, 'CHAPTER THREE', 'The Flag of the Republic shall be shuch a device as Parliament shall prescribe The design of the Flag shall be from the top of the Flag to the bottom thereof, three horizontal stripes of green. shite and blue.');
INSERT INTO `constitution` VALUES (4, 'CHAPTER FOUR', 'The Flag of the Republic shall be shuch a device as Parliament shall prescribe The design of the Flag shall be from the top of the Flag to the bottom thereof, three horizontal stripes of green. shite and blue.');

-- ----------------------------
-- Table structure for downloads
-- ----------------------------
DROP TABLE IF EXISTS `downloads`;
CREATE TABLE `downloads`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kind` int(10) NULL DEFAULT 0,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of downloads
-- ----------------------------
INSERT INTO `downloads` VALUES (1, 'Extractive Industries', 'uploads/downloads/Changes part.pdf', 0, 'Changes part.pdf');
INSERT INTO `downloads` VALUES (4, 'Ratification Agreement Visa Exemple', 'uploads/downloads/Assignment.pdf', 1, 'Assignment.pdf');
INSERT INTO `downloads` VALUES (8, 'Official Reports 1', 'uploads/downloads/Assignment.pdf', 2, 'Assignment.pdf');
INSERT INTO `downloads` VALUES (11, 'Committees Reports 1', 'uploads/downloads/Assignment.pdf', 3, 'Assignment.pdf');
INSERT INTO `downloads` VALUES (14, 'Research Materials 1', 'uploads/downloads/Assignment.pdf', 4, 'Assignment.pdf');
INSERT INTO `downloads` VALUES (17, 'budget information 1', 'uploads/downloads/Changes part.pdf', 5, 'Changes part.pdf');
INSERT INTO `downloads` VALUES (20, 'State Opening1', 'uploads/downloads/Changes part.pdf', 6, 'Changes part.pdf');
INSERT INTO `downloads` VALUES (23, 'State Opening2', 'uploads/downloads/Changes part.pdf', 6, 'Changes part.pdf');
INSERT INTO `downloads` VALUES (24, 'Taxe contents', 'uploads/downloads/Changes part.pdf', 6, 'Changes part.pdf');
INSERT INTO `downloads` VALUES (25, 'Forum State', 'uploads/downloads/Changes part.pdf', 6, 'Changes part.pdf');
INSERT INTO `downloads` VALUES (26, 'other doc', 'uploads/downloads/Assignment.pdf', 6, 'Assignment.pdf');

-- ----------------------------
-- Table structure for hometable
-- ----------------------------
DROP TABLE IF EXISTS `hometable`;
CREATE TABLE `hometable`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_home` int(3) NULL DEFAULT 0,
  `is_parliament` int(2) NULL DEFAULT 0,
  `is_downloads` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hometable
-- ----------------------------
INSERT INTO `hometable` VALUES (1, 'About Us', 'A detailed information about the Parliament', '001', 1, 1, 0);
INSERT INTO `hometable` VALUES (2, 'Parliament Members', 'Biography and activities of Members of Parliament', '002', 1, 1, 0);
INSERT INTO `hometable` VALUES (3, 'Standing Order', 'View the Parliament of Sierrs Leone Standing Order', '003', 1, 0, 0);
INSERT INTO `hometable` VALUES (4, 'View Constitution', 'View in details the Constitution of Kenia', '004', 1, 0, 0);
INSERT INTO `hometable` VALUES (5, 'Video Streaming', 'Live Plenary deliberations and hearings', '005', 1, 0, 0);
INSERT INTO `hometable` VALUES (6, 'Gazetted Acts', 'Laws passed by Parliament and gazetted', '006', 1, 0, 1);
INSERT INTO `hometable` VALUES (7, 'Gov\'t Agreements', 'Signed Loans, Grants, treaties and protocols', '007', 1, 0, 1);
INSERT INTO `hometable` VALUES (8, 'Official Reports', 'A verbatim reports of what transpires in the plenary', '008', 1, 0, 1);
INSERT INTO `hometable` VALUES (9, 'Committees Reports', 'Oversight and other hearings from Committees', '009', 1, 0, 1);
INSERT INTO `hometable` VALUES (10, 'Vote Finder', 'Ayes, Nays, and Absentees for any parliamentary vote', '010', 1, 0, 0);
INSERT INTO `hometable` VALUES (11, 'Research Materials', 'Download Parliamentary Research Materials', '011', 1, 0, 1);
INSERT INTO `hometable` VALUES (12, 'Budget Information', 'Download Budget Approved by Parliament', '012', 1, 0, 0);
INSERT INTO `hometable` VALUES (13, 'State Opening', 'The Parliament of Sierra Leone State Opening Speeches', '013', 1, 0, 0);
INSERT INTO `hometable` VALUES (14, 'Parliament Calendar', 'Calendar on annual activities of Parliament', '014', 1, 1, 0);
INSERT INTO `hometable` VALUES (15, 'Votes & Proceedings', 'Attendance and order of activities in the daily sittings', '015', 1, 0, 0);
INSERT INTO `hometable` VALUES (16, 'Parliament Chief MPs', 'Biography and activities of Members of Parliament', '016', 0, 1, 0);
INSERT INTO `hometable` VALUES (17, 'Speaker of Parliament', 'Biography and activities of the Speaker of Parliament', '017', 0, 1, 0);
INSERT INTO `hometable` VALUES (18, 'Clerk of Parliament', 'Biography and activities of the Clerk of Parliament', '018', 0, 1, 0);
INSERT INTO `hometable` VALUES (19, 'Parliament Directory', 'View Parliament Directory', '019', 0, 1, 0);

-- ----------------------------
-- Table structure for members_parilament
-- ----------------------------
DROP TABLE IF EXISTS `members_parilament`;
CREATE TABLE `members_parilament`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `constituency` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of members_parilament
-- ----------------------------
INSERT INTO `members_parilament` VALUES (1, 'Emilia Lolloh Tongi', '001', 'INDEPENDENT', 'uploads/avatar.png', '232 7583695', 'lollohtece@hotmail.com', NULL);
INSERT INTO `members_parilament` VALUES (2, 'Hon. Shr Egbanda Juana', '002', 'SLPP', 'assets/img/avatars/avatar.png', NULL, 'hon@gmail.com', ' slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo ');
INSERT INTO `members_parilament` VALUES (3, 'Hon. Kamanda Komba', '024', 'C4C', 'uploads/avatar.png', '1235625465', NULL, NULL);
INSERT INTO `members_parilament` VALUES (4, 'Tom Issic Tucher', '022', 'APC', 'assets/img/avatars/default_avatar.jpg', NULL, 'hhttpdf@hotmail.com', ' slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo slafjedf fjieofajw fjeifoajei fjieowajf fjieoajf fjieowfaj fjieo ');
INSERT INTO `members_parilament` VALUES (5, 'Boris', '021', 'SLPP', 'uploads/avatar.png', NULL, 'boris@mail.com', 'sfsdfsdf dfsfe wewfewfwfew fe sfsdfsdf dfsfe wewfewfwfew fe sfsdfsdf dfsfe wewfewfwfew fe sfsdfsdf dfsfe wewfewfwfew fe sfsdfsdf dfsfe wewfewfwfew fe');
INSERT INTO `members_parilament` VALUES (10, 'Fillrm', '032', 'C4C', 'assets/img/avatars/default_avatar.jpg', '+5626895469', NULL, 'description');

-- ----------------------------
-- Table structure for members_parliament_chief
-- ----------------------------
DROP TABLE IF EXISTS `members_parliament_chief`;
CREATE TABLE `members_parliament_chief`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `directory` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of members_parliament_chief
-- ----------------------------
INSERT INTO `members_parliament_chief` VALUES (1, 'Kang Bai Joe Macovery', 'Bo', 'Sourth', 'uploads/avatar.png', '+235698562', 'macovery@info.com', 'description');

-- ----------------------------
-- Table structure for parliament_calendar
-- ----------------------------
DROP TABLE IF EXISTS `parliament_calendar`;
CREATE TABLE `parliament_calendar`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parliament_calendar
-- ----------------------------
INSERT INTO `parliament_calendar` VALUES (2, 'First Sitting', '2018-02-08');

-- ----------------------------
-- Table structure for parliament_clerk
-- ----------------------------
DROP TABLE IF EXISTS `parliament_clerk`;
CREATE TABLE `parliament_clerk`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `education` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `experience` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `skills_trainings` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activities_community_service` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parliament_clerk
-- ----------------------------
INSERT INTO `parliament_clerk` VALUES (1, 'PARAN UMAR', 'description', 'uploads/callcenter.png', 'education', 'experience', 'skills and trainings', 'activites and community service', '+693258147789', 'umar@clerk.com');

-- ----------------------------
-- Table structure for parliament_directory
-- ----------------------------
DROP TABLE IF EXISTS `parliament_directory`;
CREATE TABLE `parliament_directory`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `education` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `experience` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `skills_trainings` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activities_community_service` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parliament_directory
-- ----------------------------
INSERT INTO `parliament_directory` VALUES (4, 'Olgavin Enicovra', 'description', 'uploads/avatar.png', 'education', 'experience', 'skills and trainings', 'activites and community service', '+5626895469', 'enicovra@directory.com');

-- ----------------------------
-- Table structure for parliament_speaker
-- ----------------------------
DROP TABLE IF EXISTS `parliament_speaker`;
CREATE TABLE `parliament_speaker`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `early_life` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `education` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `career` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opposition_to_president` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `presidential_campaign` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parliament_speaker
-- ----------------------------
INSERT INTO `parliament_speaker` VALUES (1, 'MOMOR', 'description', 'early life', 'education', 'career', 'oppositoin to president', 'presidential campaign', '+5626895469', 'momor@speaker.com', 'uploads/driver2.png');

-- ----------------------------
-- Table structure for standing_order
-- ----------------------------
DROP TABLE IF EXISTS `standing_order`;
CREATE TABLE `standing_order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contents` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of standing_order
-- ----------------------------
INSERT INTO `standing_order` VALUES (1, 'Members, OFFICERS AND SITTINGS OF PARLIAMENT', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '001');
INSERT INTO `standing_order` VALUES (2, 'ARRANGEMENT OF BUSINESS', 'contents', '002');
INSERT INTO `standing_order` VALUES (3, 'PETITIONS AND PAPERS', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '003');
INSERT INTO `standing_order` VALUES (4, 'QUESTIONS TO MINISTERS', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '004');
INSERT INTO `standing_order` VALUES (5, 'PERSONAL EXPLANATIONS', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '005');
INSERT INTO `standing_order` VALUES (6, 'NOTIONS AND AMENDMENTS THERETO', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '006');
INSERT INTO `standing_order` VALUES (7, 'VOTING', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '007');
INSERT INTO `standing_order` VALUES (8, 'BILLS', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '008');
INSERT INTO `standing_order` VALUES (9, 'FINANCIAL PROVISIONS', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '009');
INSERT INTO `standing_order` VALUES (10, 'SELECT COMMITTEES', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '010');
INSERT INTO `standing_order` VALUES (11, 'MISCELLANEOUS', 'In these Standing Orders, unless the context otherwise requires, the following expressions shall have the meanings hereby assigned th them: \"allotted day\" means a sitting day ro one of a series of sitting days prescribed for the completion of debates on a business of the Houre, such as the Presidential Address, the Second Reading and Committee of Supply of the Appropriation Bill; \"bill\" means the division of members into the aye and nay lobbies to be crounted by tellers for the purpose of reaching a decision of the House, or a roll-call of Members to vote aye or nay;', '011');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'administrator@gmail.com', 'admin', 'http://127.0.0.1:4000/assets/img/avatar.png');

-- ----------------------------
-- Table structure for video_streaming
-- ----------------------------
DROP TABLE IF EXISTS `video_streaming`;
CREATE TABLE `video_streaming`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of video_streaming
-- ----------------------------
INSERT INTO `video_streaming` VALUES (1, 'Senate Live', 'Description of Senate Live', 'https://www.youtube.com/watch?v=ImtZ5yENzgE');

-- ----------------------------
-- Table structure for votes
-- ----------------------------
DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `topics` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of votes
-- ----------------------------
INSERT INTO `votes` VALUES (1, 'Vote 1', 'Being interested in a topic is great, but it is even more helpful if you already know something about it. If you can find a topic that you already have some personal and/or professional experience with, it will vastly reduce the amount of research needed and make the whole process much easier.');
INSERT INTO `votes` VALUES (4, 'Vote2', 'An interesting topic to you may not necessarily be interesting to your professor or whoever is grading your research paper. Before you begin, consider the level of interest of the person(s) who will be reading it. If you are writing a persuasive or argumentative essay, also consider their point of view on the subject matter.');
INSERT INTO `votes` VALUES (5, 'About parliament', 'An interesting topic to you may not necessarily be interesting to your professor or whoever is grading your research paper. Before you begin, consider the level of interest of the person(s) who will be reading it. If you are writing a persuasive or argumentative essay, also consider their point of view on the subject matter.  As you begin researching your topic, you may want to revise your thesis statement based on new information you have learned. This is perfectly fine, just have fun and pursue the truth, wherever it leads. If you find that you are not having fun during the research phase, you may want to reconsider the topic you have chosen.');

SET FOREIGN_KEY_CHECKS = 1;
