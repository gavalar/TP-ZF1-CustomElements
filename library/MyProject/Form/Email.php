<?php
class MyProject_Form_Email extends MyBase_Form
{
    protected $_action_url = '/index/email';

    public function init()
    {
        parent::init();
        $this->setAction($this->_action_url)
            ->setAttrib('id', 'project_form')
            ->setMethod('post');

        $email = new MyBase_Form_Element_Email('email', array(
            'label' => 'Email Address:',
        ));
        $email->setRequired();

        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Send:',
        ));

        $this->addElement($email, 'email')
             ->addElement($submit, 'submit');
    }
}
