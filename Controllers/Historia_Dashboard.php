<?php



class Historia_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(HISTORIAS);
            parent::__construct();
        }

	public function index(){
		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}


		$data["page_name"] = "Historia";
		$data["page_title"] = "Dashboard - Historia";
		$data['function_js'] = "Historia.js";
		$this->Views->getView($this,'index',$data);

	}




}