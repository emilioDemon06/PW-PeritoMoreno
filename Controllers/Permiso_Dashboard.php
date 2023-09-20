<?php



class Permiso_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
			Auth::noAuth();
            Permisos::getPermisos(PERMISOS);
            parent::__construct();
        }

	public function index(){
		
		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}

		$data["page_name"] = "Permisos";
		$data["page_title"] = "Dashboard - Permisos";
		$data['function_js'] = "Permisos.js";
		$this->Views->getView($this,'index',$data);

	}




}