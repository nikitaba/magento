<?php
/**
 * Created by PhpStorm.
 * User: Nik
 * Date: 11/9/16
 * Time: 21:13
 */
class IGN_Siteblocks_Model_Resource_Block extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
         $this->_init('siteblocks/block', 'block_id');
    }
}