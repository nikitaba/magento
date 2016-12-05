<?php

class Ainstainer_Blog_Block_Adminhtml_Post_Blogpost extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_controller = 'adminhtml_post_blogpost';
        $this->_blockGroup = 'blog';
        $this->_headerText = Mage::helper('blog')->__('Blog Post');
        $this->_addButtonLabel = Mage::helper('blog')->__('Add New Blog Post');
        parent::__construct();
    }

}
