<?php

class IndexController extends MyBase_Controller_Action
{

    public function indexAction()
    {
    }

    public function addressAction()
    {
        $form = $this->validateForm(new MyProject_Form_Address());
        $this->view->assign('form', $form);
    }

    public function workAction()
    {
        try {
            $form = $this->validateForm(new MyProject_Form_Work());
            $this->view->assign('form', $form);
        } catch (Zend_Db_Exception $e) {
            $this->_helper->viewRenderer('database');
        }

    }

    public function emailAction()
    {
        $form = $this->validateForm(new MyProject_Form_Email());
        $this->view->assign('form', $form);
    }

    protected function validateForm(Zend_Form $form)
    {
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                echo 'success';
            } else {
                $form->populate($formData);
            }
        }
        return $form;
    }
}
