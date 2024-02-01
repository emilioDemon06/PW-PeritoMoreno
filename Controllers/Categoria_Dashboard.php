<?php



class Categoria_Dashboard extends Controllers{

	public function __construct(){
		Auth::noAuth();
		Permisos::getPermisos(CATEGORIAS);
		parent:: __construct();
	}


	public function index(){
		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}
		$categorias = Categoria_DashboardModel::all_categorias();

		$data["categorias"] = to_obj($categorias);
		$data["page_title"] = "Dashboard - Categoria";
		$data["page_name"] = "Categoria";
		$data['function_js'] = "Categoria.js";
		$this->Views->getView($this,'index',$data);

	}
	//metodo agregar Usuario
	public function nuevo()
	{

		if (Permisos::read()) {
						
			$data["page_principal"] = "Categoria";
			$data["page_name"] = "Nuevo";
			$data["page_title"] = "Categoria - Nuevo";
			$data['function_js'] = "Categoria.js";
			$this->Views->getView($this, 'nuevo', $data);
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Usuario_Dashboard');
		}
	}

	//metodo editar rol
	public function editar($id)
	{
		$idCategoria = Sanitations::san_entero(limpiar($id));

		if (Permisos::read()) {

			if ($idCategoria > 0) {
				$categoria = Categoria_DashboardModel::oneCategoria($idCategoria);
				$data["categoria"] = to_obj($categoria);
				$data["page_principal"] = "Categoria";
				$data["page_name"] = "Editar";
				$data["page_title"] = "Editando registro " . $categoria["Nombre"];
				$data['function_js'] = "Categoria.js";
				$this->Views->getView($this, 'editar', $data);
			} else {
				header('Location:' . base_url . '/Rol_Dashboard');
			}
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Categoria_Dashboard');
		}
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
						$val->name('nombre')->value(limpiar($_POST['Nombre']))->required();
						$val->name('descripción')->value(limpiar($_POST['Descripcion']));


						if ($val->isSuccess()) {
							$data = [
								"Nombre" => limpiar($_POST["nombre"]),
								"Descripcion" => limpiar($_POST["Descripcion"])
							];
							$save = Categoria_DashboardModel::saveCategoria($data);
							Alertas::success(sprintf("Se ha guardado la categoria %s correctamente", $data['Nombre']));
							header("location:" . base_url . "/Categoria_Dashboard");
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Categoria_Dashboard/nuevo");
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Categoria_Dashboard/nuevo");
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Categoria_Dashboard/nuevo");
				}
			} else {
				//actualizar
				if (Permisos::updater()) {

					try {

						$val = new Validations();
						$val->name('nombre')->value(limpiar($_POST['nombre']))->max(100)->required();



						if ($val->isSuccess()) {
							$data = [
								"Nombre" => limpiar($_POST["nombre"]),
								"Descripcion" => limpiar($_POST["descripcion"])
							];
							$save = Categoria_DashboardModel::updateCategoria($data, $_POST["id"]);
							Alertas::success(sprintf("Se ha actualizado la categoria %s correctamente", $data['Nombre']));
							header("location:" . base_url . "/Categoria_Dashboard");
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Categoria_Dashboard/editar/" . $_POST["id"]);
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Categoria_Dashboard/editar/" . $_POST["id"]);
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Categoria_Dashboard/editar/" . $_POST["id"]);
				}
			}
		}
	}

}