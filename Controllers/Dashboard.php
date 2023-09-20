<?php



class Dashboard extends Controllers{
	public function __construct()
	{
		Auth::noAuth();
		Permisos::getPermisos(DASHBOARD);
		parent::__construct();
	}

	public function index(){
		$idUser = $_SESSION['iduser'];

		$usersInfo = DB::SQL("SELECT u.ID, u.Nombre, u.Correo, r.Nombre as NombreRol FROM usuario as u INNER JOIN rol as r ON u.ID_Rol = r.ID WHERE u.ID = $idUser");

		$data['usersInfo'] = $usersInfo[0];
		$data["page_name"] = "Perfil";
		$data["page_title"] = "Dashboard - Perfil";
		$data['function_js'] = "Dashboard.js";
		$this->Views->getView($this,'index',$data);

	}




}