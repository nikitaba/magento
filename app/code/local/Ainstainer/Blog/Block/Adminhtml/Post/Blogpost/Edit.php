<?php

class Ainstainer_Blog_Block_Adminhtml_Post_Blogpost_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'blogpost_id';
        $this->_controller = 'adminhtml_post_blogpost';
        $this->_blockGroup = 'blog';
        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('blog')->__('Save Blogpost'));
        $this->_updateButton('delete', 'label', Mage::helper('blog')->__('Delete Blogpost'));

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
        if (Mage::registry('blog_blogpost')->getId()) {
            return Mage::helper('blog')->__("Edit Blogpost '%s'", $this->escapeHtml(Mage::registry('blog_blogpost')->getTitle()));
        }
        else {
            return Mage::helper('blog')->__('New Blogpost');
        }
    }
}
