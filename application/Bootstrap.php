<?php

/**
 * Bootstrap for the application
 *
 * @uses 	   Zend_Application_Bootstrap_Bootstrap
 * @copyright  Copyright (c) 2011 Ibuildings UK Limited
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Instantiates the autoloader and adds the namespaces used by the application
     */
    protected function _initAutoload()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('MyBase_');
        $autoloader->registerNamespace('MyProject_');
    }

    /**
     * Instantiates a database connection
     */
    protected function _initDatabase()
    {
        $options = $this->getOption('resources');
        $db = Zend_Db::factory($options['db']['adapter'], $options['db']['params']);
        Zend_Registry::set('db', $db);
    }

    /**
     * Sets the Doctype (HTML5)
     */
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }

    /**
     * Sets up the view helper folder and namespace
     */
    protected function _initViewHelpers()
    {
        $view_renderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $view_renderer->initView();

        //include our custom helpers
        $view_renderer->view->addHelperPath(APPLICATION_PATH . '/../library/MyBase/View/Helper', 'MyBase_View_Helper');
    }
}
