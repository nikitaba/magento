<?php
/**
 * Created by PhpStorm.
 * User: Nik
 * Date: 11/11/16
 * Time: 11:55
 */

/** siteblocks/test/myaction */

class IGN_Siteblocks_TestController extends Mage_Core_Controller_Front_Action
{
    public function myactionAction()
    {
        $enabled = Mage::getStoreConfig('siteblocks/settings/enabled');
        $count = Mage::getStoreConfig('siteblocks/settings/blocks_count');
        $text = Mage::getStoreConfig('siteblocks/settings/raw_text');

        Mage::app()->getConfig()->saveConfig('siteblocks/ettings/enabled', '0');

        var_dump($enabled);
        var_dump($count);
        var_dump($text);
    }
}