<?php


/**
 * 
 */
class Sector_Dashboard extends Controllers
{
	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(SECTORES);
            parent::__construct();
        }
	public function index()
	{


		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}

		$sectores = Sector_DashboardModel::all();

		$data['sectores'] = to_obj($sectores);
		$data['page_name'] = "Sector Municipal";
		$data["page_title"] = "Dashboard - Sector";
		$data['function_js'] = "Sector.js";
		$this->Views->getView($this,'index',$data);
	}

	//metodo editar rol
	public function editar($id)
	{
		$idSector = Sanitations::san_entero($id);

		if (Permisos::read()) {

			if ($idSector > 0) {
				$sector = Sector_DashboardModel::oneSector($idSector);
				$data["sector"] = to_obj($sector);
				$data["page_principal"] = "Sector";
				$data["page_name"] = "Editar";
				$data["page_title"] = "Editando Sector " . $sector["Lugar"];
				$data['function_js'] = "Sector.js";
				$this->Views->getView($this, 'editar', $data);
			} else {
				header('Location:' . base_url . '/Sector_Dashboard');
			}
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Sector_Dashboard');
		}
	}
	//Nuevo sector
	public function nuevo()
	{
		if (Permisos::read()) {

			$data["page_principal"] = "Sector";
			$data["page_name"] = "Nuevo";
			$data["page_title"] = "Sector - Nuevo";
			$data['function_js'] = "Sector.js";
			$this->Views->getView($this, 'nuevo', $data);
		} else {

			header('Location:' . base_url . '/Sector_Dashboard');
		}
	}

	public function eliminar()
	{

		if(Permisos::deleter())
		{
			$id = intval(Sanitations::san_entero($_POST['id']));
			$nombre = strval(Sanitations::san_caracter_especial($_POST['nombre']));
			$sector = Sector_DashboardModel::oneSector($id);
	
			if (empty($sector)) {
				$arrJson = ['error' => 'No se encontró el sector'];
				header("location:" . base_url . "/Sector_Dashboard");
			} else {
				$borrado = Sector_DashboardModel::deleteSector($id);
				if($borrado){

					$arrJson = ['status' => true, 'msg' => Alertas::success("Se ha eliminado correctamente el sector")];
				}
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
						$val->name('nombre')->value(limpiar($_POST['nombre']))->max(100)->required();
						$val->name('calle')->value(limpiar($_POST['calle']))->pattern('dir2')->required();
						$val->name('altura')->value(limpiar($_POST['altura']))->pattern('int');

						$lugar = Sanitations::san_caracter_especial($_POST["nombre"]);
						$calle = Sanitations::san_string($_POST["calle"]);
						$altura = Sanitations::san_entero($_POST["altura"]);


						if ($val->isSuccess()) {
							$data = [
								"Lugar" => limpiar($lugar),
								"Calle" => limpiar($calle),
								"Altura" => limpiar($altura)
							];
							$save = Sector_DashboardModel::save($data);
							Alertas::success(sprintf("Se ha guardado %s correctamente", $data['Nombre']));
							header("location:" . base_url . "/Sector_Dashboard");
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Sector_Dashboard/nuevo");
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Sector_Dashboard/nuevo");
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Sector_Dashboard/nuevo");
				}
			} else {
				//actualizar
				if (Permisos::updater()) {

					try {
						$id = Sanitations::san_entero($_POST['id']);

						$val = new Validations();
						$val->name('nombre')->value($_POST['nombre'])->max(100)->required();
						$val->name('calle')->value(limpiar($_POST['calle']))->pattern('dir2')->required();
						$val->name('altura')->value(limpiar($_POST['altura']))->pattern('int');

						$lugar = Sanitations::san_string($_POST["nombre"]);
						$calle = Sanitations::san_string($_POST["calle"]);
						$altura = Sanitations::san_entero($_POST["altura"]);

						if ($val->isSuccess()) {
							$data = [
								"Lugar" => $lugar,
								"Calle" => $calle,
								"Altura" => $altura
							];
							$save = Sector_DashboardModel::updateSector($data, $id);
							Alertas::success(sprintf("Se ha actualizado %s correctamente", $data['Lugar']));
							header("location:" . base_url . "/Sector_Dashboard");
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Sector_Dashboard/editar/" . $_POST["id"]);
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Sector_Dashboard/editar/" . $_POST["id"]);
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Sector_Dashboard/editar/" . $_POST["id"]);
				}
			}
		}
	}


}