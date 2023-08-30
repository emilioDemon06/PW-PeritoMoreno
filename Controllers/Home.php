<?php
/**
llama a la vista index por medio del controlador que esta en Config/App/Controller.php
 * 
 */
class Home extends Controllers
{
	public function __construct(){
		parent::__construct();
		Auth::logoutHome();#cerrar session cada vez que entra a la pagina principal
	}

	public function index()
	{
		$data["page_title"] = "Inicio";
		$data["function_js"] = "Home.js";
		$data["activo"] = "active";
		$this->Views->getView($this,"index",$data);
	}
}