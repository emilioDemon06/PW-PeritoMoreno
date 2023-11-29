<?php



class Gobierno_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(EJECUTIVO);
            parent::__construct();
        }

	public function index(){
		
		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}
		
		$data["page_name"] = "Ejecutivo Municipal";
		$data["page_title"] = "Dashboard - Ejecutivo";
		$data['function_js'] = "Gobierno.js";
		$this->Views->getView($this,'index',$data);

	}




}