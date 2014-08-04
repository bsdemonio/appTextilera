<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        echo json_encode(array('ERROR'=>false, 'MSG'=>'index content from new folder '));
    }
}

?>