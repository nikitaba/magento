<?php

class Ainstainer_Blog_Block_Adminhtml_Post_Blogpost_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('blog_form');
        $this->setTitle(Mage::helper('blog')->__('Blogpost Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('blog_blogpost');

        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('blogpost_id' => $this->getRequest()->getParam('blogpost_id'))),
                'method' => 'post')
        );

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('blog')->__('General Information'), 'class' => 'fieldset-wide'));

        if ($model->getBlockId()) {
            $fieldset->addField('blogpost_id', 'hidden', array(
                'name' => 'blogpost_id',
            ));
        }

        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => Mage::helper('blog')->__('Blogpost Title'),
            'title'     => Mage::helper('blog')->__('Blogpost Title'),
            'required'  => true,
        ));

        $fieldset->addField('short_description', 'textarea', array(
            'name'      => 'short_description',
            'label'     => Mage::helper('blog')->__('Short Description'),
            'title'     => Mage::helper('blog')->__('Short Description'),
            'required'  => true,
        ));

        $fieldset->addField('content', 'textarea', array(
            'name'      => 'content',
            'label'     => Mage::helper('blog')->__('Content'),
            'title'     => Mage::helper('blog')->__('Content'),
            'required'  => true,
        ));

        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('blog')->__('Status'),
            'title'     => Mage::helper('blog')->__('Status'),
            'name'      => 'status',
            'required'  => true,
            'options'   => array(
                '1'     => Mage::helper('blog')->__('Show'),
                '0'     => Mage::helper('blog')->__('Hide'),
            ),
        ));

        $dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('created_at', 'date', array(
            'name'          => 'created_at',
            'label'         => Mage::helper('blog')->__('Created At'),
            'title'         => Mage::helper('blog')->__('Created At'),
            'input_format'  => $dateFormatIso,
            'format'        => $dateFormatIso,
        ));

        $fieldset->addField('updated_at', 'date', array(
            'name'          => 'updated_at',
            'label'         => Mage::helper('blog')->__('Updated At'),
            'title'         => Mage::helper('blog')->__('Updated At'),
            'input_format'  => $dateFormatIso,
            'format'        => $dateFormatIso,
        ));

        $fieldset->addField('category', 'select', array(
            'name'      => 'category',
            'label'     => Mage::helper('blog')->__('Category'),
            'title'     => Mage::helper('blog')->__('Category'),
            'required'  => true,
            'options'   => array(
                '0'     => Mage::helper('blog')->__('pick a category...'),
                '1'     => Mage::helper('blog')->__('Building'),
                '2'     => Mage::helper('blog')->__('Garden'),
                '3'     => Mage::helper('blog')->__('Furniture'),
            ),
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
