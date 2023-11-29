<?php



class Dashboard extends Controllers
{
	public function __construct()
	{
		Auth::noAuth();
		Permisos::getPermisos(DASHBOARD);
		parent::__construct();
	}

	public function index()
	{
		$idUser = Sanitations::san_entero($_SESSION['iduser']);
		$usersInfo = DashboardModel::infoUser($idUser);
		$infoSector = DashboardModel::infoSector();

		$data["infoSector"] = to_obj($infoSector);
		$data['usersInfo'] = to_obj($usersInfo);
		$data["page_name"] = "Perfil";
		$data["page_title"] = "Dashboard - Perfil";
		$data['function_js'] = "Dashboard.js";
		$this->Views->getView($this, 'index', $data);

		$this->edit_pass();

		$this->edit_user();
	}
	//metodo editar Usuario
	public function edit_user()
	{
		$idUser = $_SESSION['iduser'];

		if ($_SERVER['REQUEST_METHOD'] == "POST"){
			try
			{
				$userEdit = DashboardModel::oneUser($idUser);
				
				$vali = new Validations();
				$vali->name("nombre")->value(limpiar($_POST["nombre"]))->pattern('text')->required();
				$vali->name("apellido")->value(limpiar($_POST['apellido']))->pattern('text')->required();
				$vali->name("lugar de trabajo")->value(limpiar($_POST['job']))->pattern('alphanum')->required();
				$vali->name("dirección de trabajo")->value(limpiar($_POST['country']))->pattern('text')->required();
				$vali->name("telefono")->value(limpiar($_POST['phone']))->pattern('telefono')->required();
				$vali->name("email")->value(limpiar($_POST['email']))->email()->required();
				$vali->name("facebook")->value($_POST['facebook'])->url()->required();
				$vali->name("instagram")->value($_POST['instagram'])->url()->required();

				if ($vali->isSuccess()) 
				{
					Alertas::success("Se ha actualizado los datos correctamente");
					header("location:" . base_url . "/Dashboard");
				}else {
					Alertas::danger($vali->getErrors());
					header("location:" . base_url . "/Dashboard");
				}

			}catch(Exception $e)
			{
				Alertas::danger($e->getMessage());
				header("location:" . base_url . "/Dashboard");
			}
		}

	}
	//metodo editar Password
	public function edit_pass()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			try {

				$id_user = Sanitations::san_entero($_POST['idUser']);
				$user = DashboardModel::oneUser($id_user);

				$val = new Validations();
				$val->name('Contraseña')->value(limpiar($_POST['password']))->required();
				$val->name('Nueva Contraseña')->value(limpiar($_POST['newpassword']))->pattern('password')->equal(limpiar($_POST['renewpassword']))->required();

				$password = Sanitations::san_string($_POST["password"]);
				
				if (password_verify($password, $user['Password']) == false) {
					Alertas::danger("Contraseña actual Incorrecta, por favor ingrese de nuevo");
					header("location:" . base_url . "/Dashboard");
				} else {
					if ($val->isSuccess()) {

						$passhash = password_hash(limpiar($_POST["newpassword"]), PASSWORD_DEFAULT);
						$data = [
							"Password" => $passhash,
						];
						$save = DashboardModel::updateUser($data, $id_user);
						Alertas::success("Se ha actualizado la contraseña correctamente");
						header("location:" . base_url . "/Dashboard");
					} else {
						Alertas::danger($val->getErrors());
						header("location:" . base_url . "/Dashboard");
					}
				}
			} catch (Exception $e) {
				Alertas::danger($e->getMessage());
				header("location:" . base_url . "/Dashboard");
			}
		}
	}
}
