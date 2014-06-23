<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
    	$this->view->mens="hola soy el index";
    }

   
}
