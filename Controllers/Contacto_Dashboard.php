<?php



class Contacto_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
			Auth::noAuth();
            Permisos::getPermisos(CONTACTOS);
            parent::__construct();
        }

	public function index(){
		
		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}

		$usersInfo = Contacto_DashboardModel::infoUsers();

		$data['usersInfo'] = to_obj($usersInfo);
		$data["page_name"] = "Contactos";
		$data["page_title"] = "Dashboard - Contactos";
		$data['function_js'] = "Contacto.js";
		$this->Views->getView($this,'index',$data);

	}




}