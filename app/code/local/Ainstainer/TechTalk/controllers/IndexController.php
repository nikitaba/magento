<?php

class Ainstainer_Techtalk_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction() {

        $blogpost = Mage::getModel('techtalk/contact');
        $blogpost->setData('name', $this->getRequest()->getPost('name'));
        $blogpost->setData('comment',  $this->getRequest()->getPost('comment'));
        $blogpost->save();
        $this->_redirect('contact/');
    }

//    // edit section
//
//    public function newAction()
//    {
//        // the same form is used to create and edit
//        $this->_forward('edit');
//    }
//
//    public function editAction()
//    {
//        $this->_title($this->__('Contact Request'));
//
//        // 1. Get ID and create model
//        $id = $this->getRequest()->getParam('request_id');
//        $model = Mage::getModel('techtalk/contact');
//
//        // 2. Initial checking
//        if ($id) {
//            $model->load($id);
//            if (! $model->getId()) {
//                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('techtalk')->__('This block no longer exists.'));
//                $this->_redirect('*/*/');
//                return;
//            }
//        }
//
//        $this->_title($model->getId() ? $model->getTitle() : $this->__('New Request'));
//
//        // 3. Set entered data if was error when we do save
//        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
//        if (! empty($data)) {
//            $model->setData($data);
//        }
//
//        // 4. Register model to use later in blocks
//        Mage::register('contact_request', $model);
//
//        // 5. Build edit form
//        $this->loadLayout();
//        $this->_addContent($this->getLayout()->createBlock('techtalk/adminhtml_contact_edit'));
//        $this->_setActiveMenu('cms/ain_contacts')
//            ->_addBreadcrumb($id ? Mage::helper('techtalk')->__('Edit Request') : Mage::helper('techtalk')->__('New Request'), $id ? Mage::helper('techtalk')->__('Edit Request') : Mage::helper('techtalk')->__('New Request'))
//            ->renderLayout();
//    }
//
//    public function saveAction() {
//
//    }
}