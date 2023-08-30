<?php



class Gobierno extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            parent::__construct();
        }

	public function index(){
		$data["page_name"] = "Gobierno";
		$data["page_title"] = "Gobierno";
		$data['function_js'] = "Gobierno.js";
		$this->Views->getView($this,'index',$data);

	}




}