<?php

class Magentotutorial_Helloworld_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
//        echo "Hello world!";
        $this->loadLayout();
        $this->renderLayout();
    }

    public function paramsAction() {

        foreach($this->getRequest()->getParams() as $key=>$value) {
            echo 'Param: '.$key.' Value: '.$value.'<br>';
        }
    }

}