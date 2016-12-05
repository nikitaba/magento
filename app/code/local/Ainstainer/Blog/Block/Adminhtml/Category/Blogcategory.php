<?php

class Ainstainer_Blog_Block_Adminhtml_Category_Blogcategory extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_category_blogcategory';
        $this->_blockGroup = 'blog';
        $this->_headerText = Mage::helper('blog')->__('Blog Category');
        $this->_addButtonLabel = Mage::helper('blog')->__('Add New Blog Category');
        parent::__construct();
    }

}

