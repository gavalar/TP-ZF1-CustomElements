<?php

/**
 *
 *
 * @category   MyBase
 * @uses       Zend_Form_Element_Select
 */
class MyBase_Form_Element_SelectFromDB extends Zend_Form_Element_Select
{
    // First element in the select box
    protected $_select = array(
        '=== Please Select ===',
    );

    public function __construct($spec, $options)
    {
        parent::__construct($spec, $options);

        $this->addOptionsFromDatabase(Zend_Registry::get('db'), $options)
            ->setRegisterInArrayValidator(true);
    }

    public function addOptionsFromDatabase(Zend_Db_Adapter_Abstract $db, $options)
    {
        $table = $options['table'];
        $columns = $options['columns'];

        $sql = sprintf('SELECT `%s` as id, `%s` as name FROM `%s`', $columns[0], $columns[1], $table);

        $row_data = $db->fetchAll($sql . ';');

        foreach ($row_data as $row) {
            $this->_select[$row['id']] = $row['name'];
        }
        $this->addMultiOptions($this->_select);

        return $this;
    }
}
