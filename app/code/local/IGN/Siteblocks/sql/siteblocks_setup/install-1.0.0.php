<?php
/**
 * Created by PhpStorm.
 * User: Nik
 * Date: 11/9/16
 * Time: 23:24
 */

/** @var Mage_Core_Model_Resource_Setup $installer */

$installer = $this;
$installer->startSetup();
$installer->run("
CREATE TABLE IF NOT EXISTS {$this->getTable('siteblocks/block')} (
block_id int(11) NOT NULL AUTO_INCREMENT,
title varchar(500) NOT NULL,
content text NOT NULL,
block_status tinyint(4) NOT NULL,
created_at datetime NOT NULL,
PRIMARY KEY (block_id) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
");

$installer->endSetup();