<?php


/**
 * 
 */
class Legislativo_Dashboard extends Controllers
{
	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(LEGISLATIVO);
            parent::__construct();
        }
	public function index()
	{


		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}

		

		$data['page_name'] = "Honorable Consejo Deliberante";
		$data["page_title"] = "Dashboard - Legislativo";
		$data['function_js'] = "Legislativo.js";
		$this->Views->getView($this,'index',$data);
	}
}