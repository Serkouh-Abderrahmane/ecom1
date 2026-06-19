-- ============================================================
-- COMPREHENSIVE SEED DATA FOR ECOMMERCE WEBSITE
-- Run this AFTER database.sql has been imported
-- ============================================================

-- Categories (8 categories matching the navigation)
INSERT INTO `shop_categories` (`id`, `sub_for`, `position`) VALUES
(1, 0, 1),
(2, 0, 2),
(3, 0, 3),
(4, 0, 4),
(5, 0, 5),
(6, 0, 6),
(7, 0, 7),
(8, 0, 8);

-- Category translations (Vietnamese)
INSERT INTO `shop_categories_translations` (`id`, `name`, `abbr`, `for_id`) VALUES
(1, 'Áo Thun Relaxed Fit', 'vi', 1),
(2, 'Áo Thun Ringer', 'vi', 2),
(3, 'Túi Canvas', 'vi', 3),
(4, 'Áo Ba Lỗ', 'vi', 4),
(5, 'Áo Thun Dài Tay', 'vi', 5),
(6, 'Áo Sweater', 'vi', 6),
(7, 'Áo Hoodie', 'vi', 7),
(8, 'Quần Jogger & Quần Ống Suông', 'vi', 8);

-- Category translations (English)
INSERT INTO `shop_categories_translations` (`name`, `abbr`, `for_id`) VALUES
('T-Shirt Relaxed Fit', 'en', 1),
('Ringer T-Shirt', 'en', 2),
('Canvas Bag', 'en', 3),
('Tank Top', 'en', 4),
('Long Sleeve T-Shirt', 'en', 5),
('Sweater', 'en', 6),
('Hoodie', 'en', 7),
('Jogger & Straight Pants', 'en', 8);

-- Insert brands
INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Xưởng May Nhà Công'),
(2, 'LVT Premium'),
(3, 'LVT Basics');

-- ============================================================
-- PRODUCTS (12 products across categories)
-- ============================================================

-- Category 1: Áo Thun Relaxed Fit
INSERT INTO `products` (`id`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `position`, `vendor_id`, `brand_id`) VALUES
(1, 'tshirt1.jpg', UNIX_TIMESTAMP(), 0, 1, 1, 50, 120, 1, 'ao-thun-relaxed-fit-trang_1', 1, 0, 1),
(2, 'tshirt2.jpg', UNIX_TIMESTAMP(), 0, 1, 1, 35, 85, 0, 'ao-thun-relaxed-fit-den_2', 2, 0, 1),
(3, 'tshirt3.jpg', UNIX_TIMESTAMP(), 0, 1, 1, 40, 95, 0, 'ao-thun-relaxed-fit-xanh_3', 3, 0, 3);

INSERT INTO `products_translations` (`title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
('Áo Thun Relaxed Fit - Trắng', 'Áo thun Relaxed Fit chất liệu cotton 100% cao cấp. Thiết kế thoải mái, phù hợp mặc hàng ngày. Form rộng thoáng mát, thấm hút mồ hôi tốt. Phù hợp cho cả nam và nữ.', 'Cotton 100% | Form rộng | Thoáng mát', '180000', '250000', 'vi', 1),
('Relaxed Fit T-Shirt - White', 'Premium 100% cotton Relaxed Fit t-shirt. Comfortable design suitable for daily wear. Loose fit, breathable, moisture-wicking. Suitable for both men and women.', '100% Cotton | Loose Fit | Breathable', '180000', '250000', 'en', 1),

('Áo Thun Relaxed Fit - Đen', 'Áo thun Relaxed Fit màu đen cơ bản. Chất liệu cotton compact 2 chiều cao cấp. Định hình form dáng sau nhiều lần giặt. Phù hợp phối đồ hàng ngày.', 'Cotton compact | Giữ form | Màu đen cơ bản', '190000', '260000', 'vi', 2),
('Relaxed Fit T-Shirt - Black', 'Basic black Relaxed Fit t-shirt. Premium 2-way compact cotton material. Maintains shape after many washes. Perfect for everyday styling.', 'Compact Cotton | Shape Retention | Basic Black', '190000', '260000', 'en', 2),

('Áo Thun Relaxed Fit - Xanh Navy', 'Áo thun Relaxed Fit màu xanh navy lịch lãm. Chất liệu cotton organic mềm mại. Thích hợp mặc đi làm hoặc đi chơi.', 'Cotton organic | Mềm mại | Màu navy', '195000', '270000', 'vi', 3),
('Relaxed Fit T-Shirt - Navy', 'Elegant navy Relaxed Fit t-shirt. Soft organic cotton material. Suitable for work or casual outings.', 'Organic Cotton | Soft | Navy', '195000', '270000', 'en', 3);

-- Category 2: Áo Thun Ringer
INSERT INTO `products` (`id`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `position`, `vendor_id`, `brand_id`) VALUES
(4, 'tshirt4.jpg', UNIX_TIMESTAMP(), 0, 1, 2, 30, 65, 0, 'ao-thun-ringer-trang-xanh_4', 4, 0, 1),
(5, 'tshirt5.jpg', UNIX_TIMESTAMP(), 0, 1, 2, 25, 55, 0, 'ao-thun-ringer-den-do_5', 5, 0, 2);

INSERT INTO `products_translations` (`title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
('Áo Thun Ringer - Trắng Viền Xanh', 'Áo thun Ringer phong cách retro với viền cổ và tay màu xanh tương phản. Chất liệu cotton 100%. Phong cách vintage những năm 80s.', 'Retro style | Viền tương phản | Cotton 100%', '220000', '300000', 'vi', 4),
('Ringer T-Shirt - White with Blue Trim', 'Retro style Ringer t-shirt with contrasting blue collar and sleeve trim. 100% cotton. 80s vintage style.', 'Retro Style | Contrast Trim | 100% Cotton', '220000', '300000', 'en', 4),

('Áo Thun Ringer - Đen Viền Đỏ', 'Áo thun Ringer màu đen với viền đỏ nổi bật. Thiết kế cổ tròn và tay ngắn. Phong cách đường phố cá tính.', 'Street style | Viền đỏ | Cá tính', '230000', '310000', 'vi', 5),
('Ringer T-Shirt - Black with Red Trim', 'Black Ringer t-shirt with striking red trim. Round neck and short sleeves design. Stylish streetwear look.', 'Street Style | Red Trim | Edgy', '230000', '310000', 'en', 5);

-- Category 3: Túi Canvas
INSERT INTO `products` (`id`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `position`, `vendor_id`, `brand_id`) VALUES
(6, 'bag1.jpg', UNIX_TIMESTAMP(), 0, 1, 3, 100, 200, 1, 'tui-canvas-logo_6', 6, 0, 1);

INSERT INTO `products_translations` (`title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
('Túi Canvas - Logo LVT', 'Túi canvas cao cấp với logo LVT in nổi. Chất liệu canvas dày dặn, bền bỉ. Phù hợp đi học, đi làm, đi chơi. Kích thước 40x35cm.', 'Canvas dày | Logo LVT | 40x35cm', '150000', '200000', 'vi', 6),
('Canvas Bag - LVT Logo', 'Premium canvas bag with embossed LVT logo. Thick, durable canvas material. Suitable for school, work, or leisure. Size 40x35cm.', 'Thick Canvas | LVT Logo | 40x35cm', '150000', '200000', 'en', 6);

-- Category 4: Áo Ba Lỗ
INSERT INTO `products` (`id`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `position`, `vendor_id`, `brand_id`) VALUES
(7, 'tank1.jpg', UNIX_TIMESTAMP(), 0, 1, 4, 60, 130, 0, 'ao-ba-lo-trang_7', 7, 0, 3),
(8, 'tank2.jpg', UNIX_TIMESTAMP(), 0, 1, 4, 45, 100, 0, 'ao-ba-lo-den_8', 8, 0, 3);

INSERT INTO `products_translations` (`title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
('Áo Ba Lỗ - Trắng', 'Áo ba lỗ trắng cơ bản. Cotton 100% mềm mại, thoáng mát. Phù hợp mặc trong nhà hoặc tập thể thao.', 'Basic style | Cotton 100% | Thoáng mát', '100000', '140000', 'vi', 7),
('Tank Top - White', 'Basic white tank top. Soft, breathable 100% cotton. Suitable for home wear or sports.', 'Basic Style | 100% Cotton | Breathable', '100000', '140000', 'en', 7),

('Áo Ba Lỗ - Đen', 'Áo ba lỗ đen thời trang. Chất liệu cotton dày dặn. Mix đồ dễ dàng với quần jeans hoặc jogger.', 'Thời trang | Cotton dày | Dễ phối đồ', '110000', '150000', 'vi', 8),
('Tank Top - Black', 'Fashionable black tank top. Thick cotton material. Easy to pair with jeans or joggers.', 'Fashionable | Thick Cotton | Versatile', '110000', '150000', 'en', 8);

-- Category 5: Áo Thun Dài Tay
INSERT INTO `products` (`id`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `position`, `vendor_id`, `brand_id`) VALUES
(9, 'long1.jpg', UNIX_TIMESTAMP(), 0, 1, 5, 40, 75, 0, 'ao-thun-dai-tay-xam_9', 9, 0, 1);

INSERT INTO `products_translations` (`title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
('Áo Thun Dài Tay - Xám', 'Áo thun dài tay màu xám thanh lịch. Chất liệu cotton fleece ấm áp. Mặc đơn giản hoặc layer với áo khoác.', 'Tay dài | Cotton Fleece | Ấm áp', '250000', '340000', 'vi', 9),
('Long Sleeve T-Shirt - Gray', 'Elegant gray long sleeve t-shirt. Warm cotton fleece material. Wear alone or layer with a jacket.', 'Long Sleeve | Cotton Fleece | Warm', '250000', '340000', 'en', 9);

-- Category 6: Áo Sweater
INSERT INTO `products` (`id`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `position`, `vendor_id`, `brand_id`) VALUES
(10, 'sweater1.jpg', UNIX_TIMESTAMP(), 0, 1, 6, 20, 40, 0, 'ao-sweater-crew-neck_10', 10, 0, 2);

INSERT INTO `products_translations` (`title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
('Áo Sweater - Cổ Tròn', 'Áo sweater cổ tròn chất liệu acrylic cao cấp. Thiết kế đơn giản, thanh lịch. Phù hợp mùa thu đông.', 'Acrylic cao cấp | Cổ tròn | Thu đông', '350000', '450000', 'vi', 10),
('Sweater - Crew Neck', 'Premium acrylic crew neck sweater. Simple, elegant design. Suitable for fall and winter.', 'Premium Acrylic | Crew Neck | Fall/Winter', '350000', '450000', 'en', 10);

-- Category 7: Áo Hoodie
INSERT INTO `products` (`id`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `position`, `vendor_id`, `brand_id`) VALUES
(11, 'hoodie1.jpg', UNIX_TIMESTAMP(), 0, 1, 7, 25, 60, 0, 'ao-hoodie-non-trang_11', 11, 0, 2);

INSERT INTO `products_translations` (`title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
('Áo Hoodie - Nón Trắng', 'Áo hoodie có nón màu trắng. Chất liệu nỉ bông dày dặn. Có túi trước tiện lợi. Dây rút điều chỉnh nón.', 'Nỉ bông | Có nón | Có túi trước', '380000', '500000', 'vi', 11),
('Hoodie - White', 'White hoodie with hood. Thick fleece cotton material. Convenient front pocket. Adjustable drawstring hood.', 'Fleece Cotton | Hooded | Front Pocket', '380000', '500000', 'en', 11);

-- Category 8: Quần Jogger và Quần Ống Suông
INSERT INTO `products` (`id`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `position`, `vendor_id`, `brand_id`) VALUES
(12, 'pants1.jpg', UNIX_TIMESTAMP(), 0, 1, 8, 35, 70, 0, 'quan-jogger-den_12', 12, 0, 1);

INSERT INTO `products_translations` (`title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
('Quần Jogger - Đen', 'Quần jogger ống suông màu đen. Chất liệu thun cotton co giãn. Có dây thun và dây rút ở cạp. Phù hợp mặc thể thao hoặc đi chơi.', 'Thun cotton | Co giãn | Ống suông', '280000', '370000', 'vi', 12),
('Jogger Pants - Black', 'Black straight-leg jogger pants. Stretchy cotton fabric. Elastic waistband with drawstring. Suitable for sports or casual wear.', 'Stretch Cotton | Straight Leg | Elastic Waist', '280000', '370000', 'en', 12);

-- Add Vietnamese to languages table
INSERT INTO `languages` (`id`, `abbr`, `name`, `currency`, `currencyKey`, `flag`) VALUES
(10, 'vi', 'vietnamese', '₫', 'VND', 'vi.jpg')
ON DUPLICATE KEY UPDATE `abbr` = 'vi', `name` = 'vietnamese', `currency` = '₫', `currencyKey` = 'VND';

-- Add admin user if not exists
INSERT INTO `users` (`username`, `password`, `email`, `last_login`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'contact@xuongmaynhacong.vn', UNIX_TIMESTAMP())
ON DUPLICATE KEY UPDATE `username` = 'admin';

-- Reset auto_increment
-- Note: If these products exist, the auto_increment might need resetting
-- We skip this to avoid conflicts with existing data

-- ============================================================
-- SEO Pages Translations
-- ============================================================
INSERT INTO `seo_pages_translations` (`title`, `description`, `abbr`, `page_type`) VALUES
('Xưởng May Nhà Công - Trang Chủ', 'Xưởng May Nhà Công - Thương hiệu may mặc Việt Nam. Áo thun, hoodie, sweater chất lượng cao.', 'vi', 'home'),
('Xưởng May Nhà Công - Home', "Xưởng May Nhà Công - Vietnamese garment brand. High quality t-shirts, hoodies, sweaters.", 'en', 'home'),
('Thanh Toán - Xưởng May Nhà Công', 'Thanh toán đơn hàng của bạn tại Xưởng May Nhà Công. Giao hàng toàn quốc.', 'vi', 'checkout'),
("Checkout - Xưởng May Nhà Công", "Checkout your order at Xưởng May Nhà Công. Nationwide delivery.", 'en', 'checkout'),
('Liên Hệ - Xưởng May Nhà Công', 'Liên hệ với Xưởng May Nhà Công. Chúng tôi luôn sẵn sàng hỗ trợ bạn.', 'vi', 'contacts'),
("Contact - Xưởng May Nhà Công", "Contact Xưởng May Nhà Công. We are always ready to help you.", 'en', 'contacts');

-- ============================================================
-- Value Store (settings with default values)
-- Delete existing rows first to avoid duplicates, then insert
-- ============================================================
DELETE FROM `value_store` WHERE `thekey` IN (
  'publicQuantity', 'publicDateAdded', 'contactsEmailTo',
  'footerContactEmail', 'footerContactPhone', 'footerContactAddr',
  'footerAboutUs', 'footercopyright', 'outOfStock', 'showBrands',
  'showInSlider', 'multiVendor', 'shippingOrder', 'shippingAmount',
  'cashondelivery_visibility', 'paypal_email', 'paypal_sandbox'
);
INSERT INTO `value_store` (`thekey`, `value`) VALUES
('publicQuantity', '1'),
('publicDateAdded', '1'),
('contactsEmailTo', 'contact@xuongmaynhacong.vn'),
('footerContactEmail', 'contact@xuongmaynhacong.vn'),
('footerContactPhone', '0386524760'),
('footerContactAddr', 'Số 122 đường Khúc Hạo, Phường An Biên, TP Hải Phòng'),
('footerAboutUs', 'Xưởng May Nhà Công - Thương hiệu may mặc Việt Nam. Chúng tôi mang đến những sản phẩm chất lượng cao với giá cả phải chăng. Sứ mệnh của chúng tôi là mang đến những bộ trang phục chất lượng nhất cho mọi người.'),
('footercopyright', 'Copyright © 2026, Xưởng May Nhà Công'),
('outOfStock', '1'),
('showBrands', '1'),
('showInSlider', '1'),
('multiVendor', '0'),
('shippingOrder', 'standard'),
('shippingAmount', '30000'),
('cashondelivery_visibility', '1'),
('paypal_email', ''),
('paypal_sandbox', '1');
