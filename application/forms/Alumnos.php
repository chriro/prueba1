<?php
class Application_Form_Alumnos extends Zend_Form{
	public function init(){
		$this->setName("frmAlumnos");

		$aid=new Zend_Form_Element_Text('aid');
		$aid->setAttrib("maxlength","10")->setAttrib("size","10");

		$nombre=new Zend_Form_Element_Text('nombre');
		$nombre->setAttrib("maxlength","20")->setAttrib("size","10");

		$apellidos=new Zend_Form_Element_Text('apellidos');
		$apellidos->setAttrib("maxlength","20")->setAttrib("size","10");

		$submit = new Zend_Form_Element_Submit('Guardar');
		$submit->setAttrib("class","btn btn-primary");

		$this-> addElements(array($aid,$nombre,$apellidos,$submit));
	}
}