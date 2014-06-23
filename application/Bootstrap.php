<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initViewHelpers() {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $view->doctype('XHTML1_STRICT');
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
        //$view->headMeta()->appendHttpEquiv('Cache-Control', 'no-cache');
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('Sistema de Academico UNDAC 2.0');
        $view->headLink()->prependStylesheet('/css/style.css');
        
               
        Zend_Session::start();
        Zend_Layout::startMvc(APPLICATION_PATH . '/layouts/scripts');
        $view = Zend_Layout::getMvcInstance()->getView();
        $viewRenderer = Zend_controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);
        $moneda = new Zend_Locale('es_PE');
        Zend_Registry::set('Zend_Locale', $moneda);
        return;
    }
}

