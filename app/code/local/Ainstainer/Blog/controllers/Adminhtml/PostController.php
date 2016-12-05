<?php

class Ainstainer_Blog_Adminhtml_PostController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_post_blogpost'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('blogpost_id');
        Mage::register('blog_blogpost', Mage::getModel('blog/blogpost')->load($id));
        $blockObject = (array)Mage::getSingleton('adminhtml/session')->setBlockObject(true);

        if(count($blockObject)){
            Mage::registry('blog_blogpost')->setData($blockObject);
        }

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_post_blogpost_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $id = $this->getRequest()->getParam('blogpost_id');
            $blogpost = Mage::getModel('blog/blogpost')->load($id);
            $blogpost
                ->setData($this->getRequest()->getParams())
                ->setCreatedAt(Mage::app()->getLocale()->date())
                ->save();

            if(!$blogpost->getId()){
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the blogpost');
            }

        } catch(Exception $exception) {
            Mage::logException($exception);
            Mage::getSingleton('adminhtml/session')->addError($exception->getMessage());
            Mage::getSingleton('adminhtml/session')->setBlockObject($blogpost->getData());
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Blogpost was saved successfully');

        $this->_redirect('*/*/'.$this->getRequest()->getParam('back'.'index'), array('blogpost_id'=>$blogpost->getId()));
    }

    public function deleteAction()
    {
        $blogpost = Mage::getModel('blog/blogpost')
            ->setId($this->getRequest()->getParam('blogpost_id'))
            ->delete();

        if($blogpost->getId()){
            Mage::getSingleton('adminhtml/session')->addSuccess('Blogpost was deleted successfully!');
        }

        $this->_redirect('*/*/');
    }

    public function massStatusAction()
    {
        $statuses = $this->getRequest()->getParams();

        try {
            $blogposts = Mage::getModel('blog/blogpost')
                ->getCollection()
                ->addFieldTofilter('status', array('in' => $statuses['massaction']));

            foreach ($blogposts as $blogpost) {
                $blogpost->setBlockStatus($statuses['status'])->save();
            }

        } catch(Exception $exception) {
            Mage::logException($exception);
            Mage::getSingleton('adminhtml/session')->addError($exception->getMessage());
            return $this->_redirect('*/*/');
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Blogposts were updated successfully!');

        return $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $blogposts = $this->getRequest()->getParams();

        try {
            $blogposts = Mage::getModel('blog/blogpost')
                ->getCollection()
                ->addFieldTofilter('blockpost_id', array('in' => $blogposts['massaction']));

            foreach ($blogposts as $blogpost) {
                $blogpost->delete();
            }

        } catch(Exception $exception) {
            Mage::logException($exception);
            Mage::getSingleton('adminhtml/session')->addError($exception->getMessage());
            return $this->_redirect('*/*/');
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Blogposts were deleted successfully!');

        return $this->_redirect('*/*/');
    }
}