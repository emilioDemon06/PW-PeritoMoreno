<?php



class Dashboard extends Controllers{
	public function __construct()
	{
		Auth::noAuth();
		Permisos::getPermisos(1);
		parent::__construct();
	}

	public function index(){
		
		$data["page_name"] = "Dashboard";
		$data["page_title"] = "Dashboard";
		$data['function_js'] = "Dashboard.js";
		$this->Views->getView($this,'index',$data);

	}




}