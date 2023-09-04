<?php


/**
 * 
 */
class Noticia_Dashboard extends Controllers
{
	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
            Auth::noAuth();
			Permisos::getPermisos(NOTICIAS);
            parent::__construct();
        }
	public function index()
	{


		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}

		//SELECT
		//$noticias = Noticia_DashboardModel::listEqual("noticia",['ID' => 1]);

		

		//SELECT JOIN
		$noticias = Noticia_DashboardModel::join("noticia","categoria","ID_Categoria","ID");

		
		
		//INSERT
		/*$datos = [
			"Nombre" => "Cultural"

		];
		Noticia_DashboardModel::insert("categoria",$datos);*/



		//UPDATE
		/*$datosUpdate = [
			"Nombre" => "Deporte"

		];
		Noticia_DashboardModel::update("categoria", $datosUpdate,["ID" => 2]);*/



		//DELETE
		/*$datosDelete = 6;
		Noticia_DashboardModel::delete("categoria",["ID" => $datosDelete]);*/

		$data['page_name'] = "Noticias";
		$data["page_title"] = "Dashboard - Noticia";
		$data['function_js'] = "Noticia.js";
		$data['noticias'] = $noticias;
		$this->Views->getView($this,'noticia',$data);
	}
}