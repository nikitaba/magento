<?php
$installer = $this;

//throw new Exception("This is an exception to stop the installer from completing");

$installer->startSetup();
$installer->addEntityType('complexworld_eavblogpost', array(
    //entity_mode is the URI you'd pass into a Mage::getModel() call
    'entity_model'    => 'complexworld/eavblogpost',

    //table refers to the resource URI complexworld/eavblogpost
    //...eavblog_posts

    'table'           =>'complexworld/eavblogpost',
));
$installer->endSetup();