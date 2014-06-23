<?php
class AlumnosController extends Zend_Controller_Action{
	public function init(){
        
	}
    public function indexAction() {

    }
	public function listarAction(){
		/*$mensaje='holas';
		$this->view->mens=$mensaje;*/
		$dblistar=new Application_Model_DbTable_Alumnos();
		$a=$dblistar->_getall();
		$this->view->lista=$a;
	}

	public function nuevoAction(){
		$frmAlumnos= new Application_Form_Alumnos();
		$this->view->fm=$frmAlumnos;
		if($this->getRequest()->isPost()){
    		$formData = $this->getRequest()->getPost();
    			if($frmAlumnos->isValid($formData)){
    				unset($formData['Guardar']);
    				print_r($formData);
    				$alumno = new Application_Model_DbTable_Alumnos();
    				$alumno->guardar($formData); 
    				$this->_redirect("/alumnos/listar");
    			}


    	}
	}

	public function modificarAction(){
		$aid=$this->_getParam('aid');
    	$lista = new Application_Model_DbTable_Alumnos();
    	$dat_alu=$lista->row($aid);
    	// print_r($dat_aut);
    	$formAlumnos = new Application_Form_Alumnos();
    	if($this->getRequest()->isPost())
    	{
    		$formData = $this->getRequest()->getPost();
    		if($formAlumnos->isValid($formData))
    		{
    			// print_r($formData);
    			unset($formData['Guardar']);
    			$alumno = new Application_Model_DbTable_Alumnos();
    			$alumno->actualizar($formData);
    			$this->_redirect("/alumnos/listar");	
    	 	}
    	}
    	$formAlumnos->aid->setAttrib('readonly','true');
    	$formAlumnos->populate($dat_alu);
    	$this->view->fm=$formAlumnos;
	}

	public function eliminarAction() {
        $aid=$this->_getParam('aid');
        $eliminar= new Application_Model_DbTable_Alumnos();
        $eliminar->eliminar($aid);
        $this->_redirect("/alumnos/listar"); 

    		  
    }

}