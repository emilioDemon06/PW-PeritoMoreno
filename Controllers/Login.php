<?php


class Login extends Controllers
{
	public function __construct()
	{
		if (isset($_SESSION['login'])) {
			header('Location:' . base_url . '/Dashboard');
		}
		parent::__construct();
	}



	public function index()
	{
		$data["page_name"] = "Municipalidad de Perito Moreno";
		$data["page_sesion"] = "Iniciar Sesión";
		$data["page_title"] = "Login";
		$data['function_js'] = "Login.js";
		$this->Views->getView($this, "index", $data);
	}
	//envia los datos de post por json a ajax fetch
	#loguearse con metodo hash
	/*public function ingresar(){
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
				}elseif ($usuario['is_activo'] == 0) {
					$data = ["error" => "Usuario Inactivo"];
				}
				else{
					$_SESSION['iduser'] = $usuario['ID'];
					$_SESSION['usuario'] = $usuario['Nick'];
					$_SESSION['correo'] = $usuario['Correo'];
					$_SESSION['login'] = true;

					Auth::sessionUser($_SESSION['iduser']);


					$data = ['status' => true, "msg" => "Ha ingresado correctamente."];
				}
				
				
				
			}else{
				$data = ["error" => $val->getErrors()];
			}

		
		}
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
	}*/
	#loguearse con metodo password_hash
	public function ingresar_2()
	{
		$data = [];


		//validacion si se clickeo el boton del formulario
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$val = new Validations();
			$val->name('correo')->value($_POST['emailname'])->email()->required();
			$val->name('contraseña')->value($_POST['password'])->pattern('alphanum')->required();

			//$_SESSION["intentos"] = 0;

			if ($val->isSuccess()) {
				$pass = Sanitations::san_caracter_especial($_POST['password']);
				$usuario = Sanitations::san_email($_POST["emailname"]);
				$usuario = LoginModel::login2($usuario);
				
				if( array_key_exists( 'intentos', $_SESSION ) ){
					if($usuario['ID_Rol'] == 1){
						$_SESSION['intentos'] = 1;
					}else{
						$_SESSION['intentos'] = $_SESSION['intentos'] + 1;
					}
				} else {
					$_SESSION['intentos'] = 1;
				}

				if (empty($usuario)) {
					$data = ["error1" => "Email o Contraseña incorrecta"];
				} elseif (password_verify($pass, $usuario['Password']) == false) {
					$data = ["error2" => "Email o Contraseña incorecta, Intento " . $_SESSION["intentos"]];
					if ($_SESSION["intentos"] >= 3) {
						$inactivo = 0;
						$data = [
							"is_activo" => $inactivo,
						];
						LoginModel::updateEstado($data, $usuario["ID"]);
						$data = ["error3" => "Cuenta bloqueada"];
					}
				} elseif ($usuario['is_activo'] == 0) {
					$data = ["error1" => "Usuario Bloqueado"];
				} else {

					$_SESSION['iduser'] = $usuario['ID'];
					$_SESSION['idRolUser'] = $usuario['ID_Rol'];
					$_SESSION['idSectorUser'] = $usuario['ID_Sector'];
					$_SESSION['nombre'] = $usuario['Nombre'];
					$_SESSION['apellido'] = $usuario['Apellido'];
					$_SESSION['correo'] = $usuario['Correo'];
					$_SESSION['fotoPerfil'] = $usuario['FotoPerfil'];
					$_SESSION['login'] = true;
					Auth::sessionUser($_SESSION['iduser']);
					$data = ['status' => true, "msg" => "Ingresó correctamente."];
				}
			} else {
				$data = ["error" => Alertas::danger($val->getErrors())];
			}
		}
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}
}
