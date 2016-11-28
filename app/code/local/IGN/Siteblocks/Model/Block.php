<?php
/**
 * Created by PhpStorm.
 * User: Nik
 * Date: 11/9/16
 * Time: 21:09
 */
class IGN_Siteblocks_Model_Block extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('siteblocks/block');
        echo Mage::helper('siteblocks')->__('siteblocks');
        echo Mage::helper('siteblocks/array')->__('siteblocks');
    }
}