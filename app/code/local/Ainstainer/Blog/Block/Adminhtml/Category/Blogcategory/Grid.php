<?php

class Ainstainer_Blog_Block_Adminhtml_Category_Blogcategory_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('cmsBlockGrid');
        $this->setDefaultSort('category_id');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('blog/category')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('name', array(
            'header'    => Mage::helper('blog')->__('Category Name'),
            'align'     => 'left',
            'index'     => 'name',
        ));

        $this->addColumn('description', array(
            'header'    => Mage::helper('blog')->__('Description'),
            'align'     => 'left',
            'index'     => 'description',
        ));

        return parent::_prepareColumns();
    }

    public function _prepareMassaction()
    {
        $this->setMassactionIdField('category_id');
        $this->getMassactionBlock()->setIdFieldName('category_id');
        $this->getMassactionBlock()
            ->addItem('delete',
                array(
                    'label' => Mage::helper('blog')->__('Delete'),
                    'url' => $this->getUrl('*/*/massDelete'),
                    'confirm' => Mage::helper('blog')->__('Are you sure?'),
                )
            );

        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('category_id' => $row->getId()));
    }
}
