<?php



class Rol_Dashboard extends Controllers
{
	public function __construct()
	{
		Auth::noAuth();
		Permisos::getPermisos(ROLES);
		parent::__construct();
	}

	public function index()
	{

		if (Permisos::read()) {
			$roles = Rol_DashboardModel::allRol();
	
			$data["roles"] = to_obj($roles);
			$data["page_name"] = "Roles";
			$data["page_title"] = "Dashboard - Roles";
			$data['function_js'] = "Rol.js";
			$this->Views->getView($this, 'index', $data);
		
		}else{
			
			header('Location:'.base_url.'/Dashboard');
		}

	}


	//Nuevo rol
	public function nuevo()
	{
		if (Permisos::read()) {

			$data["page_principal"] = "Rol";
			$data["page_name"] = "Nuevo";
			$data["page_title"] = "Rol - Nuevo";
			$data['function_js'] = "Rol.js";
			$this->Views->getView($this, 'nuevo', $data);
		} else {

			header('Location:' . base_url . '/Rol_Dashboard');
		}
	}
	//metodo editar rol
	public function editar($id)
	{
		$idRol = Sanitations::san_entero($id);

		if (Permisos::read()) {

			if ($idRol > 0) {
				$roles = Rol_DashboardModel::oneRol($idRol);
				$data["rol"] = to_obj($roles);
				$data["page_principal"] = "Rol";
				$data["page_name"] = "Editar";
				$data["page_title"] = "Editando registro " . $roles["Nombre"];
				$data['function_js'] = "Rol.js";
				$this->Views->getView($this, 'editar', $data);
			} else {
				header('Location:' . base_url . '/Rol_Dashboard');
			}
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Rol_Dashboard');
		}
	}

	public function eliminar()
	{

		if(Permisos::deleter())
		{
			$id = intval(Sanitations::san_entero($_POST['id']));
			$nombre = strval(Sanitations::san_caracter_especial($_POST['nombre']));
			$rol = Rol_DashboardModel::oneRol($id);
	
			if (empty($rol)) {
				$arrJson = ['error' => 'No se encontró el rol'];
				header("location:" . base_url . "/Rol_Dashboard");
			} else {
				Rol_DashboardModel::deleteRol($id);
				$arrJson = ['status' => true, 'msg' => Alertas::success("Se ha eliminado correctamente el rol")];
			}
		}else{
			$arrJson = ['status' => false, "error" => Alertas::warning("Usted no tiene permiso para realizar esta acción")];
		
		}
		echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
	}


	//metodo store
	public function store()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			if (empty($_POST['id'])) {
				//guardar
				if (Permisos::create()) {

					try {

						$val = new Validations();
						$val->name('nombre')->value(limpiar($_POST['nombre']))->min(3)->max(100)->required();
						$val->name('estado')->value(limpiar($_POST['is_activo']))->required();


						if ($val->isSuccess()) {
							$data = [
								"Nombre" => limpiar($_POST["nombre"]),
								"is_activo" => limpiar($_POST["is_activo"])
							];
							$save = Rol_DashboardModel::saveRol($data);
							Alertas::success(sprintf("Se ha guardado el rol %s correctamente", $data['Nombre']));
							header("location:" . base_url . "/Rol_Dashboard");
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Rol_Dashboard/nuevo");
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Rol_Dashboard/nuevo");
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Rol_Dashboard/nuevo");
				}
			} else {
				//actualizar
				if (Permisos::updater()) {

					try {

						$val = new Validations();
						$val->name('nombre')->value($_POST['nombre'])->max(100)->required();



						if ($val->isSuccess()) {
							$data = [
								"Nombre" => limpiar($_POST["nombre"]),
								"is_activo" => limpiar($_POST["is_activo"])
							];
							$save = Rol_DashboardModel::updateRol($data, $_POST["id"]);
							Alertas::success(sprintf("Se ha actualizado el rol %s correctamente", $data['Nombre']));
							header("location:" . base_url . "/Rol_Dashboard");
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Rol_Dashboard/editar/" . $_POST["id"]);
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Rol_Dashboard/editar/" . $_POST["id"]);
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Rol_Dashboard/editar/" . $_POST["id"]);
				}
			}
		}
	}
}
