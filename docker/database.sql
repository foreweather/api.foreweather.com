SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `city`
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `city_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', 'Istanbul', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('2', 'Tokyo', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('3', 'Berlin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('4', 'London', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('5', 'Bangkok', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('6', 'Paris', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('7', 'New York', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('8', 'Osaka', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('9', 'Bali', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `city` VALUES ('10', 'Antalya', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `coupon`
-- ----------------------------
DROP TABLE IF EXISTS `coupon`;
CREATE TABLE `coupon` (
  `coupon_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `code` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('used','unused','cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unused',
  `used_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of coupon
-- ----------------------------
INSERT INTO `coupon` VALUES ('1', null, 'TEST001', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('2', null, 'TEST002', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('3', null, 'TEST003', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('4', null, 'TEST004', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('4', null, 'TEST004', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('5', null, 'TEST005', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('6', null, 'TEST006', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('7', null, 'TEST007', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('8', null, 'TEST008', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('9', null, 'TEST009', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('10', null, 'TEST010', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('11', null, 'TEST011', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('12', null, 'TEST012', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('13', null, 'TEST013', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('14', null, 'TEST014', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('15', null, 'TEST015', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('16', null, 'TEST016', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('17', null, 'TEST017', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('18', null, 'TEST018', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('19', null, 'TEST019', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('20', null, 'TEST020', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('21', null, 'TEST021', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('22', null, 'TEST022', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('23', null, 'TEST023', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('24', null, 'TEST024', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('25', null, 'TEST025', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('26', null, 'TEST026', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('27', null, 'TEST027', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('28', null, 'TEST028', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('29', null, 'TEST029', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('30', null, 'TEST030', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('31', null, 'TEST031', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('32', null, 'TEST032', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('33', null, 'TEST033', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('34', null, 'TEST034', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('35', null, 'TEST035', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('36', null, 'TEST036', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('37', null, 'TEST037', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('38', null, 'TEST038', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('39', null, 'TEST039', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('40', null, 'TEST040', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('41', null, 'TEST041', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('42', null, 'TEST042', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('43', null, 'TEST043', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('44', null, 'TEST044', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('45', null, 'TEST045', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('46', null, 'TEST046', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('47', null, 'TEST047', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('48', null, 'TEST048', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('49', null, 'TEST049', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('50', null, 'TEST050', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('51', null, 'TEST051', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('52', null, 'TEST052', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('53', null, 'TEST053', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('54', null, 'TEST054', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('55', null, 'TEST055', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('56', null, 'TEST056', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('57', null, 'TEST057', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('58', null, 'TEST058', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('59', null, 'TEST059', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('60', null, 'TEST060', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('61', null, 'TEST061', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('62', null, 'TEST062', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('63', null, 'TEST063', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('64', null, 'TEST064', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('65', null, 'TEST065', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('66', null, 'TEST066', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('67', null, 'TEST067', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('68', null, 'TEST068', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('69', null, 'TEST069', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('70', null, 'TEST070', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('71', null, 'TEST071', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('72', null, 'TEST072', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('73', null, 'TEST073', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('74', null, 'TEST074', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('75', null, 'TEST075', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('76', null, 'TEST076', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('77', null, 'TEST077', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('78', null, 'TEST078', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('79', null, 'TEST079', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('80', null, 'TEST080', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('81', null, 'TEST081', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('82', null, 'TEST082', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('83', null, 'TEST083', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('84', null, 'TEST084', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('85', null, 'TEST085', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('86', null, 'TEST086', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('87', null, 'TEST087', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('88', null, 'TEST088', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('89', null, 'TEST089', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('90', null, 'TEST090', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('91', null, 'TEST091', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('92', null, 'TEST092', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('93', null, 'TEST093', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('94', null, 'TEST094', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('95', null, 'TEST095', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('96', null, 'TEST096', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('97', null, 'TEST097', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('98', null, 'TEST098', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('99', null, 'TEST099', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `coupon` VALUES ('100', null, 'TEST100', 'unused', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
-- ----------------------------
-- Table structure for `oauth_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `access_token` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`access_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `oauth_authorization_codes`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_authorization_codes`;
CREATE TABLE `oauth_authorization_codes` (
  `authorization_code` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redirect_uri` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_token` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`authorization_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_authorization_codes
-- ----------------------------

-- ----------------------------
-- Table structure for `oauth_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `client_id` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `client_secret` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redirect_uri` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grant_types` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scope` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('notify', 'teknasyon', null, 'client_credentials refresh_token ', 'admin', '1');
INSERT INTO `oauth_clients` VALUES ('postman', 'teknasyon', '', 'password refresh_token ', 'write', '1');

-- ----------------------------
-- Table structure for `oauth_jwt`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_jwt`;
CREATE TABLE `oauth_jwt` (
  `client_id` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_key` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_jwt
-- ----------------------------

-- ----------------------------
-- Table structure for `oauth_refresh_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `refresh_token` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`refresh_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `oauth_scopes`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_scopes`;
CREATE TABLE `oauth_scopes` (
  `scope` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`scope`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_scopes
-- ----------------------------

-- ----------------------------
-- Table structure for `oauth_users`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_users`;
CREATE TABLE `oauth_users` (
  `username` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT NULL,
  `scope` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_users
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(96) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(32) COLLATE utf8_unicode_ci DEFAULT 'default.jpg',
  `photo_base64` text COLLATE utf8_unicode_ci,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `language` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `device` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `onesignal_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subscribe_at` datetime DEFAULT NULL,
  `email_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mobile_push_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('active','passive','canceled') COLLATE utf8_unicode_ci DEFAULT 'passive',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'teknasyon@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557016060', 'default.jpg', 'data:image/jpeg;base64,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', '1,3', 'Europe/London', 'tr', 'iPhone11,2 (13.4)', '1831af97-67db-4a52-95ef-45b479f3849c', '2020-04-06 12:35:23', '2020-04-06 15:20:10', '2020-04-06 13:43:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');
INSERT INTO `user` VALUES ('2', 'test@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557016060', 'default.jpg', 'data:image/jpeg;base64,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', '1,3', 'Europe/London', 'tr', 'iPhone11,2 (13.4)', '1831af97-67db-4a52-95ef-45b479f3849c', '2020-04-06 12:35:22', '2020-04-06 15:20:27', '2020-04-06 13:49:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');
INSERT INTO `user` VALUES ('3', 'test002@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014003', 'default.jpg', null, '3', 'Europe/Amsterdam', 'en', 'iPhone12,3 (13.2.3)', 'c1bd439f-9c00-48f1-a046-67e628eb39dd', '2020-04-06 01:28:58', '2020-04-06 13:56:00', '2020-04-06 13:56:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');
INSERT INTO `user` VALUES ('4', 'test002@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014004', 'default.jpg', null, '9', 'Atlantic/Cape_Verde', 'fr', 'iPhone11,6 (13.3.1)', '1c9d2457-e141-41b0-8d4b-3da55bcd377b', '2020-04-06 11:23:06', '2020-04-06 13:00:38', '0000-00-00 00:00:00', '2020-04-06 13:00:37', '2020-04-06 13:00:34', 'passive');
INSERT INTO `user` VALUES ('5', 'test003@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014005', 'default.jpg', null, '10', 'Asia/Bangkok', 'tr', 'CPH1903 (8.1.0)\r\nCPH1903 (8.1.0)', '742a76f9-bf43-4da7-a661-1b435d88def4', '2020-04-06 11:23:07', '2020-04-05 12:50:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('6', 'test004@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014006', 'default.jpg', null, '6,7,4', 'Asia/Tokyo', 'tr', 'iPhone9,3 (13.3.1)', '1831af97-67db-4a52-95ef-45b479f3849c', '2020-04-06 11:23:35', '2020-04-06 05:21:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');
INSERT INTO `user` VALUES ('7', 'test007@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014007', 'default.jpg', null, '7', 'America/New_York', 'en', 'iPhone9,3 (13.3.1)', '0bd5a189-fa0a-4554-bb8d-5fd33aef869b', '2020-04-06 01:28:59', '2020-04-05 12:51:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('8', 'test008@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014008', 'default.jpg', null, '8', 'Asia/Beirut', 'fr', 'iPhone11,2 (13.4)', '062da9d7-0564-4b7a-a0fc-aadc7a5b50a8', '2020-04-06 02:43:09', '2020-04-06 05:41:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('9', 'test009@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014009', 'default.jpg', null, '9', 'Pacific/Wallis', 'tr', 'iPhone10,5 (13.3.1)', '6d0570a5-ab6b-428b-b7d4-fa7666976481', '2020-04-06 01:28:59', '2020-04-05 12:51:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('10', 'test010@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014010', 'default.jpg', null, '10', 'Pacific/Tongatapu', 'ru', 'Venus GO (8.1.0)', '760a0f46-7543-488c-89c1-954adf94ad42', '2020-04-06 01:28:59', '2020-04-05 12:51:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('11', 'test011@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014011', 'default.jpg', null, '5', 'Europe/Istanbul', 'en', 'iPhone12,3 (13.2.3)', 'ad6adabb-4293-4a94-8d21-b6d4403cb56a', '2020-04-06 11:23:02', '2020-04-06 05:21:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');
INSERT INTO `user` VALUES ('12', 'test012@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014012', 'default.jpg', null, '4', 'Africa/Douala', 'tr', 'iPhone11,6 (13.3.1)', '5e8d0a38-bf34-47d4-9f43-7a4fbec14ffa', '2020-04-06 11:23:10', '2020-04-05 12:51:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('13', 'test013@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014013', 'default.jpg', null, '8', 'Europe/Kaliningrad', 'ru', 'CPH1903 (8.1.0)', 'd547bc2b-9607-4b53-8812-2f0116c58f9b', '2020-04-06 11:23:12', '2020-04-05 21:22:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('14', 'test014@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014014', 'default.jpg', null, '2', 'Europe/Istanbul', 'tr', 'iPhone10,5 (13.3.1)', '1f239953-ae18-4eff-a904-6303cfc524ee', '2020-04-06 11:23:11', '2020-04-06 05:21:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('15', 'test015@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014015', 'default.jpg', null, '4', 'Africa/Abidjan', 'ru', 'Venus GO (8.1.0)', '6d37ecb3-bb6d-4687-a855-ffc590781a7f', '2020-04-06 11:23:14', '2020-04-05 12:51:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('16', 'test016@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014016', 'default.jpg', null, '4', 'Europe/Istanbul', 'en', 'iPhone12,3 (13.2.3)', '4dec26b3-6e29-458e-b81c-1130fe4baa27', '2020-04-06 11:23:04', '2020-04-06 05:21:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');
INSERT INTO `user` VALUES ('17', 'test017@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014017', 'default.jpg', null, '6', 'Pacific/Apia', 'tr', 'iPhone11,6 (13.3.1)', 'e55c6a6b-5bcc-4604-9a28-ecd189b7eb3e', '2020-04-06 11:23:14', '2020-04-05 12:51:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('18', 'test018@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014018', 'default.jpg', null, '8', 'Europe/Malta', 'ru', 'CPH1903 (8.1.0)', '8a4f189b-5cbf-46b3-bb56-9ca6e1b8ac2a', '2020-04-06 11:23:15', '2020-04-05 12:51:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('19', 'test019@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014019', 'default.jpg', null, '3', 'Europe/Istanbul', 'tr', 'CPH1903 (8.1.0)', '96d483e8-dcec-4e03-a792-c3151936c02b', '2020-04-06 11:23:05', '2020-04-06 05:21:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');
INSERT INTO `user` VALUES ('20', 'test020@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014020', 'default.jpg', null, '9', 'Europe/Vaduz', 'ru', 'iPhone9,3 (13.3.1)', '82db3237-e246-44ef-b312-0964967772ed', '2020-04-06 11:23:16', '2020-04-05 12:51:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('21', 'test021@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014021', 'default.jpg', null, '9', 'Europe/Istanbul', 'en', 'iPhone9,3 (13.3.1)', '4ba7bd74-f3b2-4a0e-b1f3-c3b753bdf378', '2020-04-06 11:23:17', '2020-04-06 05:21:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
INSERT INTO `user` VALUES ('22', 'test022@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '905557014022', 'default.jpg', null, '2', 'Europe/Prague', 'fr', 'iPhone11,2 (13.4)', 'dcb69c92-c655-43f7-b366-d8786109d766', '2020-04-06 11:23:20', '2020-04-05 12:51:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'passive');
