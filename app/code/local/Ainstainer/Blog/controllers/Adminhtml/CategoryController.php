<?php

class Ainstainer_Blog_Adminhtml_CategoryController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_category_blogcategory'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('category_id');
        Mage::register('blog_category', Mage::getModel('blog/category')->load($id));
        $blockObject = (array)Mage::getSingleton('adminhtml/session')->setBlockObject(true);

        if(count($blockObject)){
            Mage::registry('blog_category')->setData($blockObject);
        }

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_category_blogcategory_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $id = $this->getRequest()->getParam('category_id');
            $category = Mage::getModel('blog/category')->load($id);
            $category
                ->setData($this->getRequest()->getParams())
                ->save();

            if(!$category->getId()){
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the category');
            }

        } catch(Exception $exception) {
            Mage::logException($exception);
            Mage::getSingleton('adminhtml/session')->addError($exception->getMessage());
            Mage::getSingleton('adminhtml/session')->setBlockObject($category->getData());
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Category was saved successfully');

        $this->_redirect('*/*/'.$this->getRequest()->getParam('back'.'index'), array('category_id'=>$category->getId()));
    }

    public function deleteAction()
    {
        $category = Mage::getModel('blog/category')
            ->setId($this->getRequest()->getParam('category_id'))
            ->delete();

        if($category->getId()){
            Mage::getSingleton('adminhtml/session')->addSuccess('Category was deleted successfully!');
        }

        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $categories = $this->getRequest()->getParams();

        try {
            $categories = Mage::getModel('blog/category')
                ->getCollection()
                ->addFieldTofilter('category_id', array('in' => $categories['massaction']));

            foreach ($categories as $category) {
                $category->delete();
            }

        } catch(Exception $exception) {
            Mage::logException($exception);
            Mage::getSingleton('adminhtml/session')->addError($exception->getMessage());
            return $this->_redirect('*/*/');
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Categories were deleted successfully!');

        return $this->_redirect('*/*/');
    }
}
