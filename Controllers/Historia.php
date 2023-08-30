<?php



class Historia extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            parent::__construct();
        }

	public function index(){
		$data["page_name"] = "Perito Moreno";
		$data["page_title"] = "Historia - Perito Moreno";
		$data['function_js'] = "Historia.js";
		$this->Views->getView($this,'index',$data);

	}




}