# phpInfiniteMenu
a sample to show how easy it is to create a main navigation menu with infinite subcategories using a recursive php function. 
sample code designed for adminlte

MySQL Table Schema and Data

CREATE TABLE IF NOT EXISTS `sys_menu` (
  `id` int(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `upper_menu_id` int(7) UNSIGNED NOT NULL,
  `menu_text` varchar(128) NOT NULL,
  `menu_url` varchar(256) NOT NULL,
  `menu_icon` varchar(64) NOT NULL,
  `menu_order` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `upper_menu_id` (`upper_menu_id`),
  KEY `menu_order` (`menu_order`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `sys_menu` (`id`, `upper_menu_id`, `menu_text`, `menu_url`, `menu_icon`, `menu_order`) VALUES
(1, 0, 'Dashboard', '#', 'fa fa-dashboard', 1),
(2, 1, 'Dashboard v1', 'index.php', 'fa fa-circle-o', 1),
(3, 1, 'Dashboard v2', 'index2.html', 'fa fa-circle-o', 2),
(4, 0, 'Layout Options', '#', 'fa fa-files-o', 2),
(5, 4, 'Top Navigation', 'pages/layout/top-nav.html', 'fa fa-circle-o', 1),
(6, 4, 'Boxed', 'pages/layout/boxed.html', 'fa fa-circle-o', 1),
(7, 4, 'Fixed', 'pages/layout/fixed.html', 'fa fa-circle-o', 2),
(8, 4, 'Collapsed Sidebar', 'pages/layout/collapsed-sidebar.html', 'fa fa-circle-o', 3),
(9, 0, 'Widgets', 'pages/widgets.html', 'fa fa-th', 3),
(10, 0, 'Documentation', 'https://adminlte.io/docs', 'fa fa-book', 99);
