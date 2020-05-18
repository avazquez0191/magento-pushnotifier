CREATE TABLE `firebase_token` (
  `id` int(11) NOT NULL auto_increment,
  `customer_id` int(11),
  `token_id` text,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
)