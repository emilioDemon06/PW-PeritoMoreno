<?php 


class Login extends Controllers
{
	public function __construct(){
		if (isset($_SESSION['login'])) {
			header('Location:'.base_url.'/Dashboard');
		}
		parent:: __construct();
	}



	public function index()
	{
		$data["page_name"] = "Municipalidad de Perito Moreno";
		$data["page_sesion"] = "Iniciar Sesión";
		$data["page_title"] = "Login";
		$data['function_js'] = "Login.js";
		$this->Views->getView($this,"index",$data);
	}
	//envia los datos de post por json a ajax fetch
	public function ingresar(){
		$data = [];


		//validacion si se clickeo el boton del formulario
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			$val = new Validations();
			$val->name('correo')->value($_POST['username'])->pattern('email')->required();
			$val->name('contraseña')->value($_POST['password'])->min(6)->max(25)->required();
			

			if ($val->isSuccess()) {
				$usuario = LoginModel::login(limpiar($_POST["username"]),hash("sha256", limpiar($_POST["password"])));
				if (empty($usuario)) {
					
					$data = ["error" => "Nombre de Usuario o Contraseña incorecta"];	
				}else{
					$_SESSION['iduser'] = $usuario['ID'];
					$_SESSION['nombre'] = $usuario['Nombre'];
					$_SESSION['correo'] = $usuario['Correo'];
					$_SESSION['login'] = true;



					$data = ['status' => true, "msg" => "Ha ingresado correctamente."];
				}
				
				
				
			}else{
				$data = ["error" => $val->getErrors()];
			}

		
		}
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
	}

}