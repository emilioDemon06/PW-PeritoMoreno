<?php



class Categoria_Dashboard extends Controllers{

	public function __construct(){
		Auth::noAuth();
		Permisos::getPermisos(5);
		parent:: __construct();
	}


	public function index(){
		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}


		$data["page_title"] = "Dashboard - Categoria";
		$data["page_name"] = "Categoria";
		$data['function_js'] = "Categoria.js";
		$this->Views->getView($this,'index',$data);

	}

	public function agregar(){

		$errores = Categoria_DashboardModel::validar();
		

		$data = $errores;

		if (empty($errores)) {
			$data = [
				'Nombre' => $_POST['categ_name']
			];
			$idInsert = Categoria_DashboardModel::insert('categoria',$data);
			$data = ["msg" =>"se guardo correctamente"];
		}
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
	}



}