<?php



class Contacto_Dashboard extends Controllers{

	public function __construct() 
        {
            //ejecutamos el metodo constructor de la clase controller de la ruta libraries/core
			Auth::noAuth();
            Permisos::getPermisos(CONTACTOS);
            parent::__construct();
        }

	public function index(){
		
		if (empty($_SESSION['permisosMod']['r'])) {
		
			header('Location:'.base_url.'/Dashboard');
		}

		$usersInfo = Contacto_DashboardModel::infoUsers();
		$contactsInfo = Contacto_DashboardModel::infoContacts();

		$data['usersInfo'] = to_obj($usersInfo);
		$data['contactos'] = to_obj($contactsInfo);
		$data["page_name"] = "Contactos";
		$data["page_title"] = "Dashboard - Contactos";
		$data['function_js'] = "Contacto.js";
		$this->Views->getView($this,'index',$data);

	}

	//metodo agregar contacto
	public function nuevo()
	{


		if (Permisos::read()) {
			$sectores = Contacto_DashboardModel::sectores();

			$data["sectores"] = to_obj($sectores);
			$data["page_principal"] = "Contacto";
			$data["page_name"] = "Nuevo";
			$data["page_title"] = "Contacto - Nuevo";
			$data['function_js'] = "Contacto.js";
			$this->Views->getView($this, 'nuevo', $data);
		} else {
			header('Location:' . base_url . '/Contacto_Dashboard');
		}
	}

	//metodo editar contacto
	public function editar($id)
	{


		$idContacto = Sanitations::san_entero(limpiar($id));
		
		if (Permisos::read()) {

			if ($idContacto > 0) 
			{
				$contacto = Contacto_DashboardModel::oneContacto($idContacto);
				$sectores = Contacto_DashboardModel::sectores();

				$data["contacto"] = to_obj($contacto);
				$data["sectores"] = to_obj($sectores);
				$data["page_principal"] = "Contacto";
				$data["page_name"] = "Editar";
				$data["page_title"] = "Editando contacto ";
				$data['function_js'] = "Contacto.js";
				$this->Views->getView($this, 'editar', $data);
			}else{
				header('Location:' . base_url . '/Contacto_Dashboard');
			}
		} else {
			header('Location:' . base_url . '/Contacto_Dashboard');
		}
	}

}