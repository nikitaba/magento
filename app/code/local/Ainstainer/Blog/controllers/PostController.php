<?php

class Ainstainer_Blog_PostController extends Mage_Core_Controller_Front_Action
{

    public function viewAction()
    {
        $this->loadLayout();
        $this->renderLayout();

    }

}