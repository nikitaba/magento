<?php

class Ainstainer_Blog_Block_Adminhtml_Category_Blogcategory_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'category_id';
        $this->_controller = 'adminhtml_category_blogcategory';
        $this->_blockGroup = 'blog';
        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('blog')->__('Save Category'));
        $this->_updateButton('delete', 'label', Mage::helper('blog')->__('Delete Category'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = " 

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if (Mage::registry('blog_category')->getId()) {
            return Mage::helper('blog')->__("Edit Category '%s'", $this->escapeHtml(Mage::registry('blog_category')->getTitle()));
        }
        else {
            return Mage::helper('blog')->__('New Category');
        }
    }
}
