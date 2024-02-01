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
		$data['page_name'] = "Noticia";
		$data["page_title"] = "Dashboard - Noticia";
		$data['function_js'] = "Noticia.js";
		$this->Views->getView($this,'index',$data);
	}
	//metodo mostrar Noticias
	public function mostrar()
	{
		$noticias = Noticia_DashboardModel::all();

		if (empty($noticias)) {
			$arrJson = ["msg" => "No se encontraron registros"];
		} else {

			$arrJson = $noticias;
		}

		echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
	}
	//metodo agregar Usuario
	public function nuevo()
	{

		if (Permisos::read()) {

			$categorias = Noticia_DashboardModel::categorias();
			$autores = Noticia_DashboardModel::autores();
			

			$data['categorias'] = to_obj($categorias);
			$data["autores"] = to_obj($autores);
			$data["page_principal"] = "Noticia";
			$data["page_name"] = "Nuevo";
			$data["page_title"] = "Noticia - Nuevo";
			$data['function_js'] = "Noticia.js";
			$this->Views->getView($this, 'nuevo', $data);
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Noticia_Dashboard');
		}
	}

	//metodo eliminar
	public function eliminar()
	{
		if (Permisos::deleter()) {
			$id = intval($_POST['id']);
			$noticia = Noticia_DashboardModel::oneNoticia($id);

			if (empty($noticia)) {
				$arrJson = ['status' => false,'error' => Alertas::danger('No se encontró la noticia')];
				header("location:" . base_url . "/Noticia_Dashboard");
			}else{
				Noticia_DashboardModel::deleteNoticia($id);
				$url = "Assets/img/noticias";
				unlink($url."/".$noticia["Imagen"]);
				$arrJson = ['status' => true, 'msg' => Alertas::success('Se ha eliminado correctamente la noticia')];
			}
		}else{
			$arrJson = ['status' => false,'error' => Alertas::warning('Usted no tiene permiso para realizar esta acción')];
		}

		echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
	}



	//metodo editar Noticia
	public function editar($id)
	{
		if (Permisos::read()) {

			$categorias = Noticia_DashboardModel::categorias();
			$autores = Noticia_DashboardModel::autores();
			$idNoticia = Sanitations::san_entero($id);

			if ($idNoticia > 0) {
				$noticia = Noticia_DashboardModel::oneNoticia($idNoticia);

				$data["noticia"] = to_obj($noticia);
				$data['categorias'] = to_obj($categorias);
				$data['autores'] = to_obj($autores);
				$data["page_principal"] = "Noticia";
				$data["page_name"] = "Editar";
				$data["page_title"] = "Editando noticia";
				$data['function_js'] = "Noticia.js";
				$this->Views->getView($this, 'editar', $data);
			}
		} else {
			Alertas::warning("Usted no tiene permiso para realizar esta acción");
			header('Location:' . base_url . '/Noticia_Dashboard');
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
						$val->name('titulo')->value(limpiar($_POST['titulo']))->required();
						$val->name('copete')->value(limpiar($_POST['copete']))->required();
						$val->name('fecha')->value(limpiar($_POST['fecha']))->required();
						$val->name('categoria')->value(limpiar($_POST['categoria']))->required();
						$val->name('autor')->value(limpiar($_POST['autor']))->required();
						$val->name('noticia')->value(limpiar($_POST['noticia']))->required();


						if ($val->isSuccess()) {

							if($_FILES["img-noticia"]["name"] != null){
						
								$imgSize = $_FILES["img-noticia"]["size"];
								$url_target = "Assets/img/noticias";
								$imgNombre = $_FILES["img-noticia"]["name"];				
								
								$imgNombre_actual =  renombrar_img($_FILES["img-noticia"]["name"]);
								$tmp_name = $_FILES["img-noticia"]["tmp_name"];
								$imagen = strtolower(pathinfo($imgNombre,PATHINFO_EXTENSION));
		
								if($imagen !== "jpg" && $imagen !== "jpeg" && $imagen !== "png" && $imagen !== "gif"){
									Alertas::danger("Solo se permiten imágenes tipo JPG, JPEG, PNG & GIF");
								} elseif ($imgSize > 5000000) {
									Alertas::danger("El archivo es muy pesado");
								}else{
									
									$data = [
										"Titulo" => limpiar($_POST["titulo"]),
										"Copete" => limpiar($_POST["copete"]),
										"Contenido" => limpiar($_POST["noticia"]),
										"Imagen" => $imgNombre_actual,
										"Fecha" => limpiar($_POST["fecha"]),
										"ID_Categoria" => limpiar($_POST["categoria"]),
										"ID_Autor" => limpiar($_POST["autor"]),
									];
									$save = Noticia_DashboardModel::saveNoticia($data);
									if(move_uploaded_file($tmp_name, "$url_target/$imgNombre_actual")){
										Alertas::success("Se ha guardado los datos correctamente");
										header("location:" . base_url . "/Noticia_Dashboard");
									}
								}
							}else{
								Alertas::warning("Por favor ingrese imagen");
								header("location:" . base_url . "/Noticia_Dashboard");
							}
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Noticia_Dashboard/nuevo");
						}
					} catch(Exception $e){
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Noticia_Dashboard/nuevo");
					}
				}else{
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Noticia_Dashboard/nuevo");
				}
			} else {

				$idNoticia = limpiar($_POST["id"]);
				//actualizar
				if (Permisos::updater()) {

					try {

						$val = new Validations();
						$val->name('titulo')->value(limpiar($_POST['titulo']))->required();
						$val->name('copete')->value(limpiar($_POST['copete']))->required();
						$val->name('fecha')->value(limpiar($_POST['fecha']))->required();
						$val->name('categoria')->value(limpiar($_POST['categoria']))->required();
						$val->name('autor')->value(limpiar($_POST['autor']))->required();
						$val->name('noticia')->value(limpiar($_POST['noticia']))->required();
						


						if ($val->isSuccess()) {


							if($_FILES["img-noticia"]["name"] != null){
								
								$imgSize = $_FILES["img-noticia"]["size"];
								$urlInsert = "Assets/img/noticias";
								$imgNombre = $_FILES["img-noticia"]["name"];
								$url_target = str_replace("\\","/",$urlInsert);				
								
								$imgNombre_actual =  substr(sha1(rand(1,999)),0,-30).'_'. $_FILES["img-noticia"]["name"];
								$tmp_name = $_FILES["img-noticia"]["tmp_name"];
								$imagen = strtolower(pathinfo($imgNombre,PATHINFO_EXTENSION));
		
								if($imagen !== "jpg" && $imagen !== "jpeg" && $imagen !== "png" && $imagen !== "gif"){
									Alertas::danger("Solo se permiten imágenes tipo JPG, JPEG, PNG & GIF");
								} elseif ($imgSize > 5000000) {
									Alertas::danger("El archivo es muy pesado");
								}else{
									
									$data = [
										"Titulo" => $_POST["titulo"],
										"Copete" => $_POST["copete"],
										"Contenido" => $_POST["noticia"],
										"Imagen" => $imgNombre_actual,
										"Fecha" => $_POST["fecha"],
										"ID_Categoria" => $_POST["categoria"],
										"ID_Autor" => $_POST["autor"],
									];
									$save = Noticia_DashboardModel::updateNoticia($data,$idNoticia);
									if(move_uploaded_file($tmp_name, "$urlInsert/$imgNombre_actual")){
										Alertas::success("Se ha guardado los datos correctamente");
										header("location:" . base_url . "/Noticia_Dashboard");
									}
								}								

							}else{
								$data = [
									"Titulo" => $_POST["titulo"],
									"Copete" => $_POST["copete"],
									"Contenido" => $_POST["noticia"],
									"Fecha" => $_POST["fecha"],
									"ID_Categoria" => $_POST["categoria"],
									"ID_Autor" => $_POST["autor"],
								];

								$save = Noticia_DashboardModel::updateNoticia($data, $idNoticia);
								Alertas::success("Se ha actualizado la noticia correctamente");
								header("location:" . base_url . "/Noticia_Dashboard");

							}

							
						} else {
							Alertas::danger($val->getErrors());
							header("location:" . base_url . "/Noticia_Dashboard/editar/" . $_POST["id"]);
						}
					} catch (Exception $e) {
						Alertas::danger($e->getMessage());
						header("location:" . base_url . "/Noticia_Dashboard/editar/" . $_POST["id"]);
					}
				} else {
					Alertas::warning("Usted no tiene permiso para realizar esta acción");
					header("location:" . base_url . "/Noticia_Dashboard/editar/" . $_POST["id"]);
				}
			}
		}
	}

}