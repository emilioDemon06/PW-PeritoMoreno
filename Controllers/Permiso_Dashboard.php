<?php



class Permiso_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
			Auth::noAuth();
            Permisos::getPermisos(PERMISOS);
            parent::__construct();
        }

	public function index($id){
		
		/*if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}*/
		$idRol = intval(limpiar($id));

		if($idRol > 0){
			$paginas = Permiso_DashboardModel::paginas();
			$permisosByRole = Permiso_DashboardModel::permisosByRoles($idRol);
			$roles = Permiso_DashboardModel::roles($idRol);
			$permisos = ['c' => 0,'r' => 0,'u' => 0,'d' => 0];
			$accesosByRoles = ['id_rol' => $idRol, 'rol' => $roles['Nombre'] ];
			

			
			if(empty($permisosByRole))
			{
				for ($i=0; $i < count($paginas) ; $i++) { 
					$paginas[$i]['accesos'] = $permisos;
				}
			}else
			{
				for ($i=0; $i < count($paginas); $i++) { 
					$permisos = ['c' => 0,'r' => 0,'u' => 0,'d' => 0];
					if(isset($permisosByRole[$i]))
					{
						$permisos = ['c' => $permisosByRole[$i]['c'], 'r' => $permisosByRole[$i]['r'], 'u' => $permisosByRole[$i]['u'], 'd' => $permisosByRole[$i]['d']];
					}
					$paginas[$i]['accesos'] = $permisos;
				}
			}
			$accesosByRoles['paginas'] = $paginas;

			$data['id_rol'] = $accesosByRoles['id_rol'];
			$data['paginas'] = $accesosByRoles['paginas'];
			$data["page_name"] = "Permisos";
			$data["page_title"] = "Dashboard - Permisos";
			$data['function_js'] = "Permiso.js";
			$this->Views->getView($this,'index',$data);
		}


	}

	public function store()
	{
		if($_SESSION["userData"]["ID_Rol"] == 1){
			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$idRol = intval($_POST['idRol']);
				$paginas = $_POST['paginas'];
				

				Permiso_DashboardModel::deletePermisos($idRol);
				foreach($paginas as $page){
					$idPage = $page['id'];
					$c = empty($page['c']) ? 0 : 1;
					$r = empty($page['r']) ? 0 : 1;
					$u = empty($page['u']) ? 0 : 1;
					$d = empty($page['d']) ? 0 : 1;
					$nuevoCambio = Permiso_DashboardModel::insertPermisos([
						'ID_Rol' => $idRol,
						'ID_Pagina' => $idPage,
						'c' => $c,
						'r'	=> $r,
						'u'	=> $u,
						'd'	=> $d,
						'creado' => now(),
					]);
				}

				if($nuevoCambio > 0){
					Alertas::success("Los permisos se guardaron correctamente");
					header('Location:' . base_url . '/Permiso_Dashboard/index/'.$idRol);
				}else{
					Alertas::danger("Error: No se guardaron los cambios de los permisos");
					header('Location:' . base_url . '/Permiso_Dashboard/index/'.$idRol);
				}


			}	
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Rol_Dashboard');
		}
	}
	




}