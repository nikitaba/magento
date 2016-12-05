<?php

class Ainstainer_Blog_Model_Resource_Blogpost extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/blogpost', 'blogpost_id');
    }
}