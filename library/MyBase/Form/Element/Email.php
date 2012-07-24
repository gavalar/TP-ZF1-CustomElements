<?php

/**
 *
 *
 * @category   MyBase
 * @uses 	   Zend_Form_Element_Text
 */
class MyBase_Form_Element_Email extends Zend_Form_Element_Text
{
    public $helper = 'formEmail';

    public function init()
    {
        $this->addValidator('EmailAddress')
             ->addFilter('StringToLower');

        return parent::init();
    }
}
