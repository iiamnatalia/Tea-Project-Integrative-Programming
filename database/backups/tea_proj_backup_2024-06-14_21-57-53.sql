-- Table structure for table audit_trail
CREATE TABLE `audit_trail` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `audit_action` varchar(100) NOT NULL,
  `audit_dated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`audit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table audit_trail
INSERT INTO audit_trail VALUES ('1', '1', 'Account Created', '2024-06-14 14:39:58');
INSERT INTO audit_trail VALUES ('2', '1', 'Account Verified', '2024-06-14 14:40:46');
INSERT INTO audit_trail VALUES ('3', '1', 'Successful Login', '2024-06-14 14:41:12');
INSERT INTO audit_trail VALUES ('4', '1', 'Logout', '2024-06-14 14:41:20');
INSERT INTO audit_trail VALUES ('5', '2', 'Account Created', '2024-06-14 14:43:54');
INSERT INTO audit_trail VALUES ('6', '2', 'Account Verified', '2024-06-14 14:44:13');
INSERT INTO audit_trail VALUES ('7', '3', 'Account Created', '2024-06-14 14:46:57');
INSERT INTO audit_trail VALUES ('8', '3', 'Account Verified', '2024-06-14 14:47:12');
INSERT INTO audit_trail VALUES ('9', '4', 'Account Created', '2024-06-14 14:48:38');
INSERT INTO audit_trail VALUES ('10', '4', 'Account Verified', '2024-06-14 14:52:59');
INSERT INTO audit_trail VALUES ('11', '4', 'Account Verified', '2024-06-14 14:58:37');
INSERT INTO audit_trail VALUES ('12', '4', 'Account Verified', '2024-06-14 14:58:45');
INSERT INTO audit_trail VALUES ('13', '4', 'Account Verified', '2024-06-14 14:58:53');
INSERT INTO audit_trail VALUES ('14', '4', 'Account Verified', '2024-06-14 14:59:03');
INSERT INTO audit_trail VALUES ('15', '2', 'Successful Login', '2024-06-14 14:59:36');
INSERT INTO audit_trail VALUES ('16', '2', 'Added Item to Cart', '2024-06-14 15:00:42');
INSERT INTO audit_trail VALUES ('17', '2', 'Edited Cart Item', '2024-06-14 15:01:13');
INSERT INTO audit_trail VALUES ('18', '2', 'Checked Out Order #1', '2024-06-14 15:02:03');
INSERT INTO audit_trail VALUES ('19', '1', 'Logout', '2024-06-14 15:03:16');
INSERT INTO audit_trail VALUES ('20', '5', 'Account Created', '2024-06-14 15:08:57');
INSERT INTO audit_trail VALUES ('21', '5', 'Account Verified', '2024-06-14 15:09:33');
INSERT INTO audit_trail VALUES ('22', '5', 'Successful Login', '2024-06-14 15:10:02');
INSERT INTO audit_trail VALUES ('23', '5', 'Added Item to Cart', '2024-06-14 15:10:53');
INSERT INTO audit_trail VALUES ('24', '5', 'Edited Cart Item', '2024-06-14 15:11:06');
INSERT INTO audit_trail VALUES ('25', '5', 'Deleted an Item from Cart', '2024-06-14 15:11:11');
INSERT INTO audit_trail VALUES ('26', '5', 'Added Item to Cart', '2024-06-14 15:11:30');
INSERT INTO audit_trail VALUES ('27', '5', 'Added Item to Cart', '2024-06-14 15:11:49');
INSERT INTO audit_trail VALUES ('28', '5', 'Edited Cart Item', '2024-06-14 15:12:01');
INSERT INTO audit_trail VALUES ('29', '5', 'Edited Cart Item', '2024-06-14 15:12:07');
INSERT INTO audit_trail VALUES ('30', '5', 'Checked Out Order #2', '2024-06-14 15:12:55');
INSERT INTO audit_trail VALUES ('31', '5', 'Reordered Order #2', '2024-06-14 15:13:39');
INSERT INTO audit_trail VALUES ('32', '5', 'Edited Cart Item', '2024-06-14 15:13:47');
INSERT INTO audit_trail VALUES ('33', '5', 'Checked Out Order #3', '2024-06-14 15:14:10');
INSERT INTO audit_trail VALUES ('34', '1', 'Successful Login', '2024-06-14 15:15:03');
INSERT INTO audit_trail VALUES ('35', '5', 'Submitted a Feedback for Order ID #3', '2024-06-14 15:17:16');
INSERT INTO audit_trail VALUES ('36', '1', 'Logout', '2024-06-14 15:20:51');
INSERT INTO audit_trail VALUES ('37', '5', 'Successful Login', '2024-06-14 15:21:38');
INSERT INTO audit_trail VALUES ('38', '5', 'Added Item to Cart', '2024-06-14 15:21:59');
INSERT INTO audit_trail VALUES ('39', '5', 'Edited Cart Item', '2024-06-14 15:22:35');
INSERT INTO audit_trail VALUES ('40', '5', 'Checked Out Order #4', '2024-06-14 15:22:54');
INSERT INTO audit_trail VALUES ('41', '5', 'Reordered Order #3', '2024-06-14 15:23:28');
INSERT INTO audit_trail VALUES ('42', '5', 'Checked Out Order #5', '2024-06-14 15:23:54');
INSERT INTO audit_trail VALUES ('43', '5', 'Updated First Name', '2024-06-14 15:24:30');
INSERT INTO audit_trail VALUES ('44', '5', 'Updated Profile Picture', '2024-06-14 15:24:41');
INSERT INTO audit_trail VALUES ('45', '5', 'Reordered Order #3', '2024-06-14 15:25:36');
INSERT INTO audit_trail VALUES ('46', '5', 'Deleted an Item from Cart', '2024-06-14 15:25:44');
INSERT INTO audit_trail VALUES ('47', '5', 'Checked Out Order #6', '2024-06-14 15:25:56');
INSERT INTO audit_trail VALUES ('48', '5', 'Submitted a Feedback for Order ID #5', '2024-06-14 15:28:13');
INSERT INTO audit_trail VALUES ('49', '1', 'Downloaded Audit Trail Report', '2024-06-14 15:29:37');
INSERT INTO audit_trail VALUES ('50', '1', 'Backed Up Database', '2024-06-14 15:30:02');
INSERT INTO audit_trail VALUES ('51', '1', 'Logout', '2024-06-14 15:30:43');
INSERT INTO audit_trail VALUES ('52', '5', 'Successful Login', '2024-06-14 15:30:56');
INSERT INTO audit_trail VALUES ('53', '5', 'Login Verified Using Security Questions', '2024-06-14 15:31:12');
INSERT INTO audit_trail VALUES ('54', '1', 'Logout', '2024-06-14 15:31:21');
INSERT INTO audit_trail VALUES ('55', '5', 'Successful Login', '2024-06-14 15:31:31');
INSERT INTO audit_trail VALUES ('56', '5', 'Login Verified Using OTP', '2024-06-14 15:31:54');
INSERT INTO audit_trail VALUES ('57', '1', 'Logout', '2024-06-14 15:38:25');
INSERT INTO audit_trail VALUES ('58', '1', 'Logout', '2024-06-14 21:36:34');
INSERT INTO audit_trail VALUES ('59', '1', 'Successful Login', '2024-06-14 21:54:22');
INSERT INTO audit_trail VALUES ('60', '1', 'Backed Up Database', '2024-06-14 21:57:53');

-- Table structure for table failed_logins
CREATE TABLE `failed_logins` (
  `failed_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `failed_login_dated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`failed_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table feedbacks
CREATE TABLE `feedbacks` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `fb_message` varchar(300) DEFAULT NULL,
  `fb_stars` int(11) NOT NULL,
  `fb_dated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table feedbacks
INSERT INTO feedbacks VALUES ('1', '5', '3', '', '5', '2024-06-14 15:17:16');
INSERT INTO feedbacks VALUES ('2', '5', '5', 'Ang sarap!', '5', '2024-06-14 15:28:13');

-- Table structure for table order_add_ons
CREATE TABLE `order_add_ons` (
  `oadd_id` int(11) NOT NULL AUTO_INCREMENT,
  `oitem_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `oadd_qty` int(11) NOT NULL,
  `oadd_total` float(9,2) NOT NULL,
  `oadd_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`oadd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table order_add_ons
INSERT INTO order_add_ons VALUES ('3', '1', '6', '25', '500', '2024-06-14 15:01:13');
INSERT INTO order_add_ons VALUES ('5', '3', '7', '6', '120', '2024-06-14 15:11:30');
INSERT INTO order_add_ons VALUES ('6', '7', '7', '4', '80', '2024-06-14 15:21:59');
INSERT INTO order_add_ons VALUES ('7', '7', '8', '4', '80', '2024-06-14 15:21:59');
INSERT INTO order_add_ons VALUES ('8', '7', '2', '6', '120', '2024-06-14 15:22:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table order_items
INSERT INTO order_items VALUES ('1', '1', '10', 'Large', '100', '5', '925', '2024-06-14 15:00:42', '2024-06-14 15:01:13');
INSERT INTO order_items VALUES ('3', '2', '9', 'Regular', '50', '3', '345', '2024-06-14 15:11:30', '2024-06-14 15:12:01');
INSERT INTO order_items VALUES ('4', '2', '21', 'Large', '100', '1', '95', '2024-06-14 15:11:49', '2024-06-14 15:12:07');
INSERT INTO order_items VALUES ('5', '3', '9', 'Regular', '25', '1', '75', '2024-06-14 15:13:39', '2024-06-14 15:13:47');
INSERT INTO order_items VALUES ('6', '3', '21', 'Large', '100', '1', '95', '2024-06-14 15:13:39', '2024-06-14 15:13:39');
INSERT INTO order_items VALUES ('7', '4', '9', 'Large', '100', '2', '450', '2024-06-14 15:21:59', '2024-06-14 15:22:35');
INSERT INTO order_items VALUES ('8', '5', '9', 'Regular', '25', '1', '75', '2024-06-14 15:23:28', '2024-06-14 15:23:28');
INSERT INTO order_items VALUES ('9', '5', '21', 'Large', '100', '1', '95', '2024-06-14 15:23:28', '2024-06-14 15:23:28');
INSERT INTO order_items VALUES ('10', '6', '9', 'Regular', '25', '1', '75', '2024-06-14 15:25:36', '2024-06-14 15:25:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table orders
INSERT INTO orders VALUES ('1', '2', 'Refunded', '5', '1', '925', '30', '955', '2024-06-14 15:00:42', '2024-06-14 15:02:02', '', 'Malaks Ulan', '2024-06-14 09:17:53');
INSERT INTO orders VALUES ('2', '5', 'Canceled', '4', '2', '440', '20', '460', '2024-06-14 15:10:53', '2024-06-14 15:12:55', '', 'Malakas Ulan', '2024-06-14 09:16:16');
INSERT INTO orders VALUES ('3', '5', 'Delivered', '2', '3', '170', '30', '200', '2024-06-14 15:13:38', '2024-06-14 15:14:10', '', '', '');
INSERT INTO orders VALUES ('4', '5', 'Canceled', '2', '4', '450', '30', '480', '2024-06-14 15:21:59', '2024-06-14 15:22:54', '', 'Malakas Ulan', '2024-06-14 09:26:36');
INSERT INTO orders VALUES ('5', '5', 'Delivered', '2', '5', '170', '20', '190', '2024-06-14 15:23:28', '2024-06-14 15:23:54', '', '', '');
INSERT INTO orders VALUES ('6', '5', 'Refunded', '1', '6', '75', '30', '105', '2024-06-14 15:25:36', '2024-06-14 15:25:56', '', 'Malakas Ulan', '2024-06-14 09:26:49');

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
  `pay_status` varchar(30) DEFAULT 'Paid',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table payments
INSERT INTO payments VALUES ('1', '1', 'GCash', '9918321200', '', '0', '0', '2024-06-14 15:02:02', 'Refunded');
INSERT INTO payments VALUES ('2', '2', 'Cash on Delivery', '', '', '0', '0', '2024-06-14 15:12:55', '');
INSERT INTO payments VALUES ('3', '3', 'GCash', '9853610433', '', '200', '0', '2024-06-14 15:14:10', 'Paid');
INSERT INTO payments VALUES ('4', '4', 'Cash on Delivery', '', '', '0', '0', '2024-06-14 15:22:54', '');
INSERT INTO payments VALUES ('5', '5', 'GCash', '5884223379', '', '190', '0', '2024-06-14 15:23:54', 'Paid');
INSERT INTO payments VALUES ('6', '6', 'GCash', '8371938618', '', '0', '0', '2024-06-14 15:25:56', 'Refunded');

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table products
INSERT INTO products VALUES ('1', 'Coffee Jelly', 'Add-Ons', '20', 'assets/products/add-ons.png', 'Archived', '2024-06-02 01:47:04', '2024-06-14 15:33:36');
INSERT INTO products VALUES ('2', 'Crystals', 'Add-Ons', '20', 'assets/products/add-ons.png', 'Archived', '2024-06-02 01:47:04', '2024-06-14 21:56:54');
INSERT INTO products VALUES ('3', 'Cream Cheese', 'Add-Ons', '20', 'assets/products/add-ons.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:42:03');
INSERT INTO products VALUES ('4', 'Cream Puff', 'Add-Ons', '20', 'assets/products/add-ons.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:42:07');
INSERT INTO products VALUES ('5', 'Crushed Oreo', 'Add-Ons', '20', 'assets/products/add-ons.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:42:09');
INSERT INTO products VALUES ('6', 'Pearls', 'Add-Ons', '20', 'assets/products/add-ons.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:42:12');
INSERT INTO products VALUES ('7', 'Popping Boba', 'Add-Ons', '20', 'assets/products/add-ons.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:42:14');
INSERT INTO products VALUES ('8', 'Pudding', 'Add-Ons', '20', 'assets/products/add-ons.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:42:18');
INSERT INTO products VALUES ('9', 'Blueberry', 'Fruit Tea', '75', 'assets/products/blueberry_ft.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:41:16');
INSERT INTO products VALUES ('10', 'Green Apple', 'Fruit Tea', '75', 'assets/products/green_apple_ft.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:40:36');
INSERT INTO products VALUES ('11', 'Kiwi', 'Fruit Tea', '75', 'assets/products/kiwi_ft.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:39:58');
INSERT INTO products VALUES ('12', 'Lychee', 'Fruit Tea', '75', 'assets/products/lychee_ft.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:39:28');
INSERT INTO products VALUES ('13', 'Passion', 'Fruit Tea', '75', 'assets/products/passion_ft.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:38:55');
INSERT INTO products VALUES ('14', 'Chocolate', 'Milk Tea with Pearl', '85', 'assets/products/chocolate_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 11:57:54');
INSERT INTO products VALUES ('15', 'Cookies & Cream', 'Milk Tea with Pearl', '85', 'assets/products/cookies_and_cream_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:00:08');
INSERT INTO products VALUES ('16', 'Dark Choco', 'Milk Tea with Pearl', '85', 'assets/products/dark_chocolate_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:02:34');
INSERT INTO products VALUES ('17', 'Dark Choco Vanilla', 'Milk Tea with Pearl', '85', 'assets/products/dark_choco_vanilla_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:03:45');
INSERT INTO products VALUES ('18', 'Hokkaido', 'Milk Tea with Pearl', '85', 'assets/products/hokkaido_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:05:20');
INSERT INTO products VALUES ('19', 'Honey Dew Slush', 'Milk Tea with Pearl', '85', 'assets/products/honey_dew_slush_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:06:55');
INSERT INTO products VALUES ('20', 'Kingkong\'s Delight', 'Milk Tea with Pearl', '85', 'assets/products/kingkong_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:07:55');
INSERT INTO products VALUES ('21', 'Matcha', 'Milk Tea with Pearl', '85', 'assets/products/matcha_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:10:01');
INSERT INTO products VALUES ('22', 'Okinawa', 'Milk Tea with Pearl', '85', 'assets/products/okinawa_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:11:02');
INSERT INTO products VALUES ('23', 'Premium Thai Classic', 'Milk Tea with Pearl', '85', 'assets/products/premium_thai_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:12:33');
INSERT INTO products VALUES ('24', 'Taiwan\'s Classic', 'Milk Tea with Pearl', '85', 'assets/products/taiwan_classic_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:13:39');
INSERT INTO products VALUES ('25', 'Taro', 'Milk Tea with Pearl', '85', 'assets/products/taro_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:17:17');
INSERT INTO products VALUES ('26', 'Wintermelon', 'Milk Tea with Pearl', '85', 'assets/products/wintermelon_mtwp.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:18:33');
INSERT INTO products VALUES ('27', 'Cappuccino', 'Smoothies Edition', '90', 'assets/products/cappucino_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:20:31');
INSERT INTO products VALUES ('28', 'Choco Banana', 'Smoothies Edition', '90', 'assets/products/choco_banana_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:22:02');
INSERT INTO products VALUES ('29', 'Dark Choco', 'Smoothies Edition', '90', 'assets/products/dark_choco_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:25:15');
INSERT INTO products VALUES ('30', 'Double Dutch', 'Smoothies Edition', '90', 'assets/products/double_dutch_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:26:24');
INSERT INTO products VALUES ('31', 'Java Chip', 'Smoothies Edition', '90', 'assets/products/java_chip_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:27:13');
INSERT INTO products VALUES ('32', 'Matcha', 'Smoothies Edition', '90', 'assets/products/matcha_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:28:01');
INSERT INTO products VALUES ('33', 'Matcha Oreo', 'Smoothies Edition', '100', 'assets/products/matcha_oreo_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:28:54');
INSERT INTO products VALUES ('34', 'Milky Taro', 'Smoothies Edition', '90', 'assets/products/milky_taro_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:29:41');
INSERT INTO products VALUES ('35', 'Mocha', 'Smoothies Edition', '90', 'assets/products/mocha_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:30:45');
INSERT INTO products VALUES ('36', 'Salted Caramel', 'Smoothies Edition', '90', 'assets/products/salted_caramel_se.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:31:34');
INSERT INTO products VALUES ('37', 'Blueberry', 'Yakult Edition', '85', 'assets/products/blueberry_ye.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:34:30');
INSERT INTO products VALUES ('38', 'Green Apple', 'Yakult Edition', '85', 'assets/products/green_apple_ye.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:35:13');
INSERT INTO products VALUES ('39', 'Kiwi', 'Yakult Edition', '85', 'assets/products/kiwi_ye.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:35:56');
INSERT INTO products VALUES ('40', 'Lychee', 'Yakult Edition', '85', 'assets/products/lychee_ye.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:36:32');
INSERT INTO products VALUES ('41', 'Passion', 'Yakult Edition', '85', 'assets/products/passion_ye.png', 'Available', '2024-06-02 01:47:04', '2024-06-14 12:37:13');
INSERT INTO products VALUES ('42', 'Strawberry', 'Smoothies Edition', '50', 'assets/products/strawberry_ye.png', 'Available', '2024-06-14 11:44:46', '2024-06-14 12:37:57');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table user_addresses
INSERT INTO user_addresses VALUES ('1', '2', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Tenejero', 'Candaba', '', '', 'None', '0', '2024-06-14 15:02:02');
INSERT INTO user_addresses VALUES ('2', '5', 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Musni', 'San Luis', '', '', 'Hatdog Shop', '0', '2024-06-14 15:12:55');
INSERT INTO user_addresses VALUES ('3', '5', 'Delivery Address Only', 'Not Saved', '12', 'Purok Uno', 'Tenejero', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-14 15:14:10');
INSERT INTO user_addresses VALUES ('4', '5', 'Delivery Address Only', 'Not Saved', '12', 'Purok Uno', 'Talang', 'Candaba', '', '', 'Hatdog Shop', '0', '2024-06-14 15:22:54');
INSERT INTO user_addresses VALUES ('5', '5', 'Delivery Address Only', 'Not Saved', '1234', '2321', 'San Jose', 'San Luis', '', '', 'Hatdog Shop', '0', '2024-06-14 15:23:54');
INSERT INTO user_addresses VALUES ('6', '5', 'Kath\'s House', 'Saved', '12', 'Purok Uno', 'Dalayap', 'Candaba', '', '', 'Tapat ng SJSC', '0', '2024-06-14 15:25:19');

-- Table structure for table users
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `user_num` varchar(11) NOT NULL,
  `user_pic` varchar(500) NOT NULL DEFAULT 'assets/profile-pictures/default.webp',
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data dump for table users
INSERT INTO users VALUES ('1', '3', 'Tea', 'Project', 'teaprojesip@gmail.com', '$2y$10$tWrPHPaF2XpiEmOD0tDTd.3xGqP2qNhBR5Ps4SCzzl7W0GkJsOiQ6', '09655439799', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$vd7p2D3V1tSr3zxnEXs3Oe6Jwyz/65CYGnon4dsu5IjmxASYivgwK', 'What is your favorite food?', '$2y$10$EEyC10CDWBesK.VyUmEQ1.F5cvU9uLM1A.M/TMQleRlRYraBI.IA.', 'Verified', 'Enabled', 'Disabled', '2024-06-14 14:39:58', '', '2024-06-14 14:40:46', '', '2024-06-14 15:04:47');
INSERT INTO users VALUES ('2', '1', 'Natalia', 'Molito', 'nataliamolito120101@gmail.com', '$2y$10$mF6e0R/3XCq/YUuA2hqHc.A5yItWFc.w850IfzY0c7oN12pKjyCXm', '09655439798', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$SysKfBEBbFmZZD//3k3eXeP7Hai9E6KU7zolAHM2Lz3epK4PAXJx.', 'In what city were you born?', '$2y$10$cV74vJOMOmXwqcGDVB.lPOI0u0UiZdo5krBWK26YtUwhoJ9ToWed2', 'Verified', 'Enabled', 'Disabled', '2024-06-14 14:43:54', '', '2024-06-14 14:44:13', '', '2024-06-14 14:44:13');
INSERT INTO users VALUES ('3', '2', 'Blu', 'Gfx', 'blugfxdesign@gmail.com', '$2y$10$ezcrlcAdwD7Xsk0/1z57KORoZPgSyLRUV3iB2TRPoXlWmEjpeunu6', '09655439796', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$s4lNsKZMcGGqdRqCZ7fsj.aPvDNQXFxHz3xPkhy/IB3PE95vQ8EQ2', 'In what city were you born?', '$2y$10$OtwUFoPlMNlHNSWZqgOWPuWyGkyFtWWV0p6PD/463O5h7xWGhV9bm', 'Verified', 'Enabled', 'Disabled', '2024-06-14 14:46:56', '', '2024-06-14 14:47:12', '', '2024-06-14 15:04:51');
INSERT INTO users VALUES ('5', '1', 'Natalia Cute', 'Molito', 'natalia.styles.molito@gmail.com', '$2y$10$09xJQGk8mPLgTgpFbcU2GeI0F0MZKRSutAdxntFa2SNXq5U7bIJq.', '09655439744', 'assets/profile-pictures/_5_Natalia Cute Molito_profile_pic_2024-06-14 09-24-41.jpg', 'In what city were you born?', '$2y$10$6ourrEME4mdAWHvFDMHn5u8u.7G3k8lJuWw3BAuxnHPDmFBiCjLDG', 'What is the name of your first pet?', '$2y$10$RJ9OeZBdXaP/TlNSZmhVtO6KB9aoIS9syUofAfDESaSLyKuJYsscC', 'Verified', 'Enabled', 'Enabled', '2024-06-14 15:08:57', '', '2024-06-14 15:09:33', '', '2024-06-14 15:31:54');

