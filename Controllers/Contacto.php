<?php



class Contacto extends Controllers{


	public function index(){
		$data["page_name"] = "Contacto";
		$data["page_title"] = "Contactos";
		$data['function_js'] = "Contacto.js";
		$this->Views->getView($this,'index',$data);

	}




}