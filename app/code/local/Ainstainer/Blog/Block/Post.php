<?php

class Ainstainer_Blog_Block_Post extends Mage_Core_Block_Template
{

    public function getRequestRecord()
    {
        return Mage::getModel('blog/blogpost')->load($this->getRequest()->getParam('id'));
    }

    public function getRequestCollection()
    {
        return Mage::getModel('blog/blogpost')->getCollection();
    }
}