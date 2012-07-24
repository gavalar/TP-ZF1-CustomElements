<?php
class MyProject_Form_Work extends MyBase_Form
{
    protected $_action_url = '/index/work';

    public function init()
    {
        parent::init();
        $this->setAction($this->_action_url)
            ->setAttrib('id', 'project_form')
            ->setMethod('post');

        $office = new MyBase_Form_Element_SelectFromDB('office_id', array(
            'table'      => 'office',
            'columns'    => array('id', 'name'),
            'label'      => 'Office:',
        ));

        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Send:',
        ));

        $this->addElement($office, 'office')
            ->addElement($submit, 'submit');
    }
}
