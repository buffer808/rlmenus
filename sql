CREATE TABLE IF NOT EXISTS `midnight_snacks` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ;
