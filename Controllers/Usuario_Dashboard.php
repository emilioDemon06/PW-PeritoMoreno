<?php



class Usuario_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(USUARIOS);
            parent::__construct();
        }


	public function index(){

		if (empty($_SESSION['permisosMod']['r'])) {
			header('Location:'.base_url.'/Dashboard');
		}

		$data["page_name"] = "Usuario";
		$data["page_title"] = "Dashboard - Usuario";
		$data['function_js'] = "Usuario.js";
		$this->Views->getView($this,'index',$data);

	}

	//metodo agregar Usuario
	public function nuevo(){
		$roles = Usuario_DashboardModel::roles();


		Alertas::newAlert('Guardar','success');

		$data['roles'] = $roles;
		$data["page_principal"] = "Usuario";
		$data["page_name"] = "Nuevo";
		$data["page_title"] = "Usuario - Nuevo";
		$data['function_js'] = "Usuario.js";
		$this->Views->getView($this,'nuevo',$data);
		


		$data = [];

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			$val = new Validations();
			$val->name('nombre')->value($_POST['nombre'])->max(100)->required();
			$val->name('correo')->value($_POST['correo'])->pattern('email')->required();
			$val->name('contraseña')->value($_POST['password'])->min(6)->max(25)->required();
			if ($val->isSuccess()) {
				$passhash = hash("sha256", limpiar($_POST["password"]));
				$data = [ 
					"ID_Rol" => limpiar($_POST["rol"]),
					"Nombre" => limpiar($_POST["nombre"]),
					"Correo" => limpiar($_POST["correo"]),
					"Password" => $passhash
				];
				
				$idInsert = Usuario_DashboardModel::insert("usuario",$data);
				$data = ['status' => true, "msg" => "Se guardo correctamente."];
				
				
			}else{
				$data = ["error" => $val->getErrors()];
			}
		}

		echo json_encode($data,JSON_UNESCAPED_UNICODE);

	}

	//metodo mostrar Usuario
	public function mostrarUser()
	{
		$users = Usuario_DashboardModel::all();

		if (empty($users)) {
			$arrJson = ["msg" => "No se encontraron registros"];
		}else{

			for ($i=0; $i < count($users); $i++) { 
				if ($users[$i]['is_activo'] == 1) {
					$users[$i]['is_activo'] = "<span class='badge bg-success text-wrap'>Activo</span>";
				}else{
					$users[$i]['is_activo'] = "<span class='badge bg-danger text-wrap'>Inactivo</span>";
				}
			}

			$arrJson = $users;
		}

		echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
	}
	//metodo editar Usuario
	public function editar(){
		$roles = Usuario_DashboardModel::roles();

		$data['roles'] = $roles;
		$data["page_principal"] = "Usuario";
		$data["page_name"] = "Editar";
		$data["page_title"] = "Usuario - Editar";
		$data['function_js'] = "Usuario.js";
		$this->Views->getView($this,'editar',$data);
	}
}