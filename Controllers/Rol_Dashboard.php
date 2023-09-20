<?php



class Rol_Dashboard extends Controllers{
	public function __construct()
	{
		Auth::noAuth();
		Permisos::getPermisos(ROLES);
		parent::__construct();
	}

	public function index(){
		
		$data["page_name"] = "Roles";
		$data["page_title"] = "Dashboard - Roles";
		$data['function_js'] = "Rol.js";
		$this->Views->getView($this,'index',$data);

	}
	public function mostrarRol()
	{
		$roles = Rol_DashboardModel::all();

		if (empty($roles)) {
			$arrJson = ["msg" => "No se encontraron registros"];
		}else{

			for ($i=0; $i < count($roles); $i++) { 
				if ($roles[$i]['is_activo'] == 1) {
					$roles[$i]['is_activo'] = "<span class='badge bg-success text-wrap'>Activo</span>";
				}else{
					$roles[$i]['is_activo'] = "<span class='badge bg-danger text-wrap'>Inactivo</span>";
				}
			}

			$arrJson = $roles;
		}

		echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
	}




}