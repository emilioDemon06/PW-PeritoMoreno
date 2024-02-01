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
				
				
				
				$imgNombre_actual = "";
				$tmp_name = "";
				$url_target = "";
				

				$vali = new Validations();
				$vali->name("nombre")->value(limpiar($_POST["nombre"]))->required();
				$vali->name("apellido")->value(limpiar($_POST['apellido']))->required();
				$vali->name("sector de trabajo")->value(limpiar($_POST['sector']))->required();
				$vali->name("telefono")->value(limpiar($_POST['phone']))->pattern('telefono')->required();
				$vali->name("email")->value(limpiar($_POST['email']))->email()->required();
				
				//puede ser que esten vacios los campos
				if (!empty($_POST["facebook"])) {
					$vali->name("facebook")->value($_POST['facebook'])->url();
				}elseif(!empty($_POST["instagram"])){
					$vali->name("instagram")->value($_POST['instagram'])->url();
				}
				
				
				if ($vali->isSuccess()) 
				{
					if($_FILES["img-perfil"]["name"] != null){
						
						$imgSize = $_FILES["img-perfil"]["size"];
						$urlInsert = "Assets\img\perfil";
						$imgNombre = $_FILES["img-perfil"]["name"];
						$url_target = str_replace("\\","/",$urlInsert);				
						
						$imgNombre_actual =  renombrar_img($_FILES["img-perfil"]["name"]);
						$tmp_name = $_FILES["img-perfil"]["tmp_name"];
						$imagen = strtolower(pathinfo($imgNombre,PATHINFO_EXTENSION));

						if($imagen !== "jpg" && $imagen !== "jpeg" && $imagen !== "png" && $imagen !== "gif"){
							Alertas::danger("Solo se permiten imágenes tipo JPG, JPEG, PNG & GIF");
						} elseif ($imgSize > 4000000) {
							Alertas::danger("El archivo es muy pesado");
						}else{
							
							$data = [
								"ID_Sector" => limpiar($_POST["sector"]),
								"Nombre" => limpiar($_POST["nombre"]),
								"Apellido" => limpiar($_POST["apellido"]),
								"FotoPerfil" => limpiar($imgNombre_actual),
								"Telefono" => limpiar($_POST["phone"]),
								"Correo" => limpiar($_POST["email"]),
								"Facebook" => limpiar($_POST["facebook"]),
								"Instagram" => limpiar($_POST["instagram"]),
							];
							$save = DashboardModel::updateUser($data,$idUser);
							unlink($url_target."/".$_SESSION["fotoPerfil"]);
							if(move_uploaded_file($tmp_name, "$url_target/$imgNombre_actual")){
								
								$_SESSION["fotoPerfil"] = $imgNombre_actual;
								Alertas::success("Se ha actualizado los datos correctamente");
								header("location:" . base_url . "/Dashboard");
							}
							$_SESSION["nombre"] = $_POST["nombre"];
							$_SESSION["apellido"] = $_POST["apellido"];
						}

					}else{
						$data = [
							"ID_Sector" => limpiar($_POST["sector"]),
							"Nombre" => limpiar($_POST["nombre"]),
							"Apellido" => limpiar($_POST["apellido"]),
							"Telefono" => limpiar($_POST["phone"]),
							"Correo" => limpiar($_POST["email"]),
							"Facebook" => limpiar($_POST["facebook"]),
							"Instagram" => limpiar($_POST["instagram"]),
						];
						$save = DashboardModel::updateUser($data,$idUser);
						Alertas::success("Se ha actualizado los datos correctamente");
						header("location:" . base_url . "/Dashboard");
						$_SESSION["nombre"] = $_POST["nombre"];
						$_SESSION["apellido"] = $_POST["apellido"];
					}
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
