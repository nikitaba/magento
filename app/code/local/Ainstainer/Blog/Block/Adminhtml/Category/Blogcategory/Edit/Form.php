<?php

class Ainstainer_Blog_Block_Adminhtml_Category_Blogcategory_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('blog_form');
        $this->setTitle(Mage::helper('blog')->__('Category Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('blog_category');

        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('category_id' => $this->getRequest()->getParam('category_id'))),
                'method' => 'post')
        );

        $form->setHtmlIdPrefix('blogpost_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('blog')->__('General Information'), 'class' => 'fieldset-wide'));

        if ($model->getBlockId()) {
            $fieldset->addField('category_id', 'hidden', array(
                'name' => 'category_id',
            ));
        }

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('blog')->__('Category Title'),
            'title'     => Mage::helper('blog')->__('Category Title'),
            'required'  => true,
        ));

        $fieldset->addField('description', 'textarea', array(
            'name'      => 'description',
            'label'     => Mage::helper('blog')->__('Short Description'),
            'title'     => Mage::helper('blog')->__('Short Description'),
            'required'  => true,
        ));

        $fieldset->addField('image', 'image', array(
            'name'      => 'image',
            'label'     => Mage::helper('blog')->__('Image'),
            'title'     => Mage::helper('blog')->__('Image'),
        ));

        if (!$model->getId()) {
            $model->setData('is_active', '1');
        }

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
