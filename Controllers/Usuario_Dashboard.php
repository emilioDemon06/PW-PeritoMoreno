<?php



class Usuario_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(4);
            parent::__construct();
        }


	public function index(){
		

		$data["page_name"] = "Usuario";
		$data["page_title"] = "Dashboard - Usuario";
		$data['function_js'] = "Usuario.js";
		$this->Views->getView($this,'index',$data);

		if (empty($_SESSION['permisosMod']['r'])) {
			header('Location:'.base_url.'/Dashboard');
		}
	}
	public function agregarUsers(){
		$data = [];

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			//$data = $errores;			
			//$errores = Usuario_DashboardModel::validar();
			
			$val = new Validations();
			$val->name('nombre')->value($_POST['nombre'])->max(100)->required();
			$val->name('correo')->value($_POST['correo'])->pattern('email')->required();
			$val->name('contraseña')->value($_POST['password'])->min(6)->max(25)->required();
			if ($val->isSuccess()) {
				$passhash = hash("sha256", limpiar($_POST["password"]));
				$data = [ 
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



}