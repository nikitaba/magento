# magento

SQL tables

CREATE TABLE `ain_category` (
  `category_id` int(11) NOT NULL auto_increment,
  `name` VARCHAR(255),
  `description` TEXT,
  `image` VARCHAR(255),
  PRIMARY KEY  (`category_id`)
)

CREATE TABLE `ain_blogpost` (
  `blogpost_id` int(11) NOT NULL auto_increment,
  `title` text,
  `content` text,
  `short_description` text,
  `status` tinyint,
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  `post_catagory_id` int(11),
  PRIMARY KEY  (`blogpost_id`)
)
