<?php

class Ainstainer_Blog_Block_Adminhtml_Post_Blogpost_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('cmsBlockGrid');
        $this->setDefaultSort('blogpost_id');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('blog/blogpost')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('title', array(
            'header'    => Mage::helper('blog')->__('Title'),
            'align'     => 'left',
            'index'     => 'title',
        ));

        $this->addColumn('status', array(
            'header'    => Mage::helper('blog')->__('Status'),
            'index'     => 'status',
            'type'      => 'options',
            'options'   => array(
                0 => Mage::helper('blog')->__('Hide'),
                1 => Mage::helper('blog')->__('Show')
            ),
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('blog')->__('Created At'),
            'align'     => 'left',
            'index'     => 'created_at'
        ));

        $this->addColumn('updated_at', array(
            'header'    => Mage::helper('blog')->__('Updated At'),
            'align'     => 'left',
            'index'     => 'updated_at'
        ));

        return parent::_prepareColumns();
    }

    public function _prepareMassaction()
    {
        $this->setMassactionIdField('blogpost_id');
        $this->getMassactionBlock()->setIdFieldName('blogpost_id');
        $this->getMassactionBlock()
            ->addItem('delete',
                array(
                    'label' => Mage::helper('blog')->__('Delete'),
                    'url' => $this->getUrl('*/*/massDelete'),
                    'confirm' => Mage::helper('blog')->__('Are you sure?'),
                )
            )
            ->addItem('status',
                array(
                    'label' => Mage::helper('blog')->__('Update status'),
                    'url' => $this->getUrl('*/*/massStatus'),
                    'additional' =>
                        array('status'=>
                            array(
                                'name' => 'status',
                                'type' => 'select',
                                'class' => 'required-entity',
                                'label' => Mage::helper('blog')->__('Status'),
                                'values' => array(
                                    0 => Mage::helper('blog')->__('Hide'),
                                    1 => Mage::helper('blog')->__('Show')
                                )
                            )
                        )
                    )
                );

        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('blogpost_id' => $row->getId()));
    }

}
