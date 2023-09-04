<?php



class Dashboard extends Controllers{
	public function __construct()
	{
		Auth::noAuth();
		Permisos::getPermisos(DASHBOARD);
		parent::__construct();
	}

	public function index(){
		
		$data["page_name"] = "Perfil";
		$data["page_title"] = "Dashboard - Perfil";
		$data['function_js'] = "Dashboard.js";
		$this->Views->getView($this,'index',$data);

	}




}