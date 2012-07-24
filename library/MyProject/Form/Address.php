<?php
class MyProject_Form_Address extends MyBase_Form
{
    protected $_action_url = '/index/address';

    public function init()
    {
        parent::init();
        $this->setAction($this->_action_url)
            ->setAttrib('id', 'project_form')
            ->setMethod('post');

        $billing = new Zend_Form_Element_Textarea('billing_address', array(
            'label' => 'Billing Address:',
        ));
        $billing->setRequired();

        $del_diff = new Zend_Form_Element_Checkbox('different_delivery_address', array(
            'label' => 'Deliver to different address:',
        ));

        $delivery = new Zend_Form_Element_Textarea('delivery_address', array(
            'label' => 'Delivery Address:',
        ));

        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Send:',
        ));

        $this->addElement($billing, 'billing_address')
             ->addElement($del_diff, 'different_delivery_address')
             ->addElement($delivery, 'delivery_address')
             ->addElement($submit, 'submit');
    }

    public function isValid($value, $context = null)
    {
        $valid = parent::isValid($value, $context);

        if ($this->isDeliveryAddressDifferent()) {
            $this->getElement('delivery_address')->setRequired();
            return parent::isValid($value, $context);
        }
        return true;
    }

    public function isDeliveryAddressDifferent()
    {
        if ($this->getValue('different_delivery_address') == 1) {
            return true;
        }
        return false;
    }

    public function getBillingAddress()
    {
        return $this->getValue('billing_address');
    }

    public function getDeliveryAddress()
    {
        return $this->getValue('delivery_address');
    }
}
