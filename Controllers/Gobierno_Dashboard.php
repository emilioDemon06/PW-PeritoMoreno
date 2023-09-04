<?php



class Gobierno_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(GOBIERNO);
            parent::__construct();
        }

	public function index(){
		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}
		
		$data["page_name"] = "Gobierno";
		$data["page_title"] = "Dashboard - Gobierno";
		$data['function_js'] = "Gobierno.js";
		$this->Views->getView($this,'gobierno',$data);

	}




}