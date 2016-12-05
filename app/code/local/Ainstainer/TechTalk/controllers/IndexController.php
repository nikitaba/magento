<?php

require_once (Mage::getModuleDir('controllers', 'Mage_Contacts').DS.'IndexController.php');

class Ainstainer_Techtalk_IndexController extends Mage_Contacts_IndexController
{

    public function postAction() {

        $post = $this->getRequest()->getPost();
        $blogpost = Mage::getModel('techtalk/contact');
        $blogpost->setData('name', $post['name']);
        $blogpost->setData('comment', $post['comment']);
        $blogpost->save();
        $this->_redirect('contacts');
    }

}