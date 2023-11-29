<?php


/**
 * 
 */
class Judicial_Dashboard extends Controllers
{
	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(JUDICIAL);
            parent::__construct();
        }
	public function index()
	{


		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}

		

		$data['page_name'] = "Juzgado Municipal";
		$data["page_title"] = "Dashboard - Judicial";
		$data['function_js'] = "Judicial.js";
		$this->Views->getView($this,'index',$data);
	}
}