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
//
//    public function saveAction()
//    {
//
//        try {
//            $id = $this->getRequest()->getParam('category_id');
//            $blogpost = Mage::getModel('blog/category')->load($id);
//            $blogpost
//                ->setData($this->getRequest()->getParams())
//                ->setCreatedAt(Mage::app()->getLocale()->date())
//                ->save();
//
//            if(!$blogpost->getId()){
//                Mage::getSingleton('adminhtml/session')->addError('Cannot save the blogpost');
//            }
//        } catch(Exception $exception) {
//            Mage::logException($exception);
//            Mage::getSingleton('adminhtml/session')->addError($exception->getMessage());
//            Mage::getSingleton('adminhtml/session')->setBlockObject($blogpost->getData());
//        }
//
//        Mage::getSingleton('adminhtml/session')->addSuccess('Blogpost was saved successfully');
//
//        $this->_redirect('*/*/'.$this->getRequest()->getParam('back'.'index'), array('category_id'=>$blogpost->getId()));
//
//    }
//
//    public function deleteAction()
//    {
//
//        $blogpost = Mage::getModel('blog/category')
//            ->setId($this->getRequest()->getParam('category_id'))
//            ->delete();
//        if($blogpost->getId()){
//            Mage::getSingleton('adminhtml/session')->addSuccess('Blogpost was deleted successfully!');
//        }
//
//        $this->_redirect('*/*/');
//
//    }

//    public function massDeleteAction()
//    {
//
//        $blogposts = $this->getRequest()->getParams();
//
//        try {
//            $blogposts = Mage::getModel('blog/blogpost')
//                ->getCollection()
//                ->addFieldTofilter('blockpost_id', array('in' => $blogposts['massaction']));
//
//            foreach ($blogposts as $blogpost) {
//                $blogpost->delete();
//            }
//        } catch(Exception $exception) {
//            Mage::logException($exception);
//            Mage::getSingleton('adminhtml/session')->addError($exception->getMessage());
//            return $this->_redirect('*/*/');
//        }
//
//        Mage::getSingleton('adminhtml/session')->addSuccess('Blogposts were deleted successfully!');
//
//        return $this->_redirect('*/*/');
//
//    }

}