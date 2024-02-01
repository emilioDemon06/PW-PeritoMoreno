<?php



class Usuario_Dashboard extends Controllers
{

	public function __construct()
	{
		//ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
		Auth::noAuth();
		Permisos::getPermisos(USUARIO);
		parent::__construct();
	}


	public function index()
	{

		if (Permisos::read()) {
			$roles = Usuario_DashboardModel::roles();
			$data['roles'] = $roles;
			$data["page_name"] = "Usuario";
			$data["page_title"] = "Dashboard - Usuario";
			$data['function_js'] = "Usuario.js";
			$this->Views->getView($this, 'index', $data);
		} else {
			header('Location:' . base_url . '/Dashboard');
		}
	}

	//metodo agregar Usuario
	public function nuevo()
	{

		if (Permisos::read()) {

			$roles = Usuario_DashboardModel::roles();
			$sectores = Usuario_DashboardModel::sectores();
			
			$data['roles'] = to_obj($roles);
			$data['sectores'] = to_obj($sectores);
			$data["page_principal"] = "Usuario";
			$data["page_name"] = "Nuevo";
			$data["page_title"] = "Usuario - Nuevo";
			$data['function_js'] = "Usuario.js";
			$this->Views->getView($this, 'nuevo', $data);
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Usuario_Dashboard');
		}
	}

	//metodo editar Usuario
	public function editar($id)
	{
		if (Permisos::read()) {

			$roles = Usuario_DashboardModel::roles();
			$idUser = Sanitations::san_entero($id);

			if ($idUser > 0) {
				$usuario = Usuario_DashboardModel::oneUser($idUser);

				$data["usuario"] = to_obj($usuario);
				$data['roles'] = to_obj($roles);
				$data["page_principal"] = "Usuario";
				$data["page_name"] = "Editar";
				$data["page_title"] = "Editando usuario " . $usuario["Nombre"];
				$data['function_js'] = "Usuario.js";
				$this->Views->getView($this, 'editar', $data);
			}
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Usuario_Dashboard');
		}
	}
	//metodo store
	public function store()
	{
		//si la info viene por el metodo post
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			if (empty($_POST['id'])) {
				//guardar
				if (Permisos::create()) {
					try {

						$val = new Validations();
						$val->name('rol')->value(limpiar($_POST['rol']))->required();
						$val->name('sector')->value(limpiar($_POST['sector']))->required();
						$val->name('correo')->value(limpiar($_POST['correo']))->pattern('email')->required();
						$val->name('contraseña')->value(limpiar($_POST['password']))->min(6)->max(100)->equal(limpiar($_POST['re-password']))->required();
						$val->name('estado')->value(limpiar($_POST['is_activo']))->required();


						if ($val->isSuccess()) {

							$password = limpiar($_POST["password"]);
							$passhash = password_hash($password, PASSWORD_DEFAULT);
							$data = [
								"ID_Rol" => limpiar($_POST["rol"]),
								"ID_Sector" => limpiar($_POST["sector"]),
								"Correo" => limpiar($_POST["correo"]),
								"Password" => $passhash,
								"is_activo" => limpiar($_POST["is_activo"])
							];
							$save = Usuario_DashboardModel::save($data);
							Alertas::success(sprintf("Se ha guardado el usuario %s correctamente", $data['Nick']));
							header("location:" . base_url . "/Usuario_Dashboard");
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Usuario_Dashboard/nuevo");
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Usuario_Dashboard/nuevo");
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Usuario_Dashboard/nuevo");
				}
			} else {

				$userPass = Usuario_DashboardModel::oneUser($_POST["id"]);
				//actualizar
				if (Permisos::updater()) {

					try {

						$val = new Validations();
						$val->name('correo')->value(limpiar($_POST['correo']))->pattern('email')->required();
						$val->name('contraseña')->value(limpiar($_POST['password']))->min(6)->max(100)->required();
						$val->name('estado')->value(limpiar($_POST['is_activo']))->required();

						$password = limpiar($_POST["password"]);

						$passhash = password_hash($password, PASSWORD_DEFAULT);

						//verifica si se cambio o no el password el formulario actualizar 
						if(password_verify($userPass["Password"],$passhash) == true){
							$pass_actual = $userPass["Password"];
						}else{
							$pass_actual = $passhash;
						}

						if ($val->isSuccess()) {
							$data = [
								"ID_Rol" => limpiar($_POST["rol"]),
								"Correo" => limpiar($_POST["correo"]),
								"Password" => $pass_actual,
								"is_activo" => limpiar($_POST["is_activo"])
							];
							$save = Usuario_DashboardModel::updateUser($data, $_POST["id"]);
							Alertas::success(sprintf("Se ha actualizado el usuario %s correctamente", $data['Nick']));
							header("location:" . base_url . "/Usuario_Dashboard");
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Usuario_Dashboard/editar/" . $_POST["id"]);
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Usuario_Dashboard/editar/" . $_POST["id"]);
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Usuario_Dashboard/editar/" . $_POST["id"]);
				}
			}
		}
	}

	public function eliminar()
	{
		if (Permisos::deleter()) {
			$id = intval($_POST['id']);
			$user = Usuario_DashboardModel::oneUser($id);

			if (empty($user)) {
				$arrJson = ['status' => false,'error' => Alertas::danger('No se encontró el usuario')];
				header("location:" . base_url . "/Usuario_Dashboard");
			}else{
				Usuario_DashboardModel::deleteUser($id);
				$arrJson = ['status' => true, 'msg' => Alertas::success('Se ha eliminado correctamente el usuario')];
			}
		}else{
			$arrJson = ['status' => false,'error' => Alertas::warning('Usted no tiene permiso para realizar esta acción')];
		}

		echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
	}
	//metodo mostrar Usuario
	public function mostrarUser()
	{
		$users = Usuario_DashboardModel::all();

		if (empty($users)) {
			$arrJson = ["msg" => "No se encontraron registros"];
		} else {

			for ($i = 0; $i < count($users); $i++) {
				if ($users[$i]['is_activo'] == 1) {
					$users[$i]['is_activo'] = "<span class='badge bg-success text-wrap'>Activo</span>";
				} else {
					$users[$i]['is_activo'] = "<span class='badge bg-danger text-wrap'>Inactivo</span>";
				}
			}

			$arrJson = $users;
		}

		echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
	}
}
