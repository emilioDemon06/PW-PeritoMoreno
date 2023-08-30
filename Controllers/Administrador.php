<?php



class Administrador extends Controllers{
	public function __construct()
	{
		Auth::noAuth();
		Permisos::getPermisos(1);
		parent::__construct();
	}

	public function index(){
		if (empty($_SESSION['permisosMod']['r'])) {
			header('Location:'.base_url.'/Login');
		}


		$data["page_name"] = "Administrador";
		$data["page_title"] = "Dashboard - administrador";
		$data['function_js'] = "Dashboard-admin.js";
		$this->Views->getView($this,'administrador',$data);

	}




}