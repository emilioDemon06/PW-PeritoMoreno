<?php  


/**
 * permisos de usuarios/roles a distintos paginas
 */
class Permisos
{
	


	public static function permisoPagina($idRol){
		
		$sql = DB::SQL("SELECT * FROM permiso as p INNER JOIN pagina as pg ON p.ID_Rol = pg.ID WHERE p.ID_Rol = $idRol");
		$arrPermisos = [];

		for ($i=0; $i < count($sql) ; $i++) { 
			$arrPermisos[$sql[$i]["ID_Pagina"]] = $sql[$i];
		}

		return $arrPermisos;
	}
	/**
	 *
	 * Permisos de paginas por rol
	 *
	 */
	public static function getPermisos($idPagina)
	{
		if (!empty($_SESSION["userData"])) {
			$intRol = $_SESSION["userData"]["ID_Rol"];
			$arrPermisos = self::permisoPagina($intRol);
			$permisos = '';
			$permisosPag = '';

			if (count($arrPermisos) > 0) {
				$permisos = $arrPermisos;
				$permisosPag = isset($arrPermisos[$idPagina]) ? $arrPermisos[$idPagina] : '';  
			}

			$_SESSION['permisos'] = $permisos;
			$_SESSION['permisosMod'] = $permisosPag;	
		}
	}
	/**
	 *
	 * Permisos de pagina por usuario
	 *
	 */
	public static function getPermisosModulo($idModulo)
	{
		/*
		$idUser = $_SESSION['iduser'];
		$permisoByUser = DB::SQL("SELECT p.*, m.ID, m.Nombre FROM permiso as p INNER JOIN modulo as m ON p.ID_Modulo = m.ID WHERE ID_Usuario = $idUser");

		
		$arrPermisos = [];

		for($i=0; $i < count($permisoByUser); $i++) { 
			$arrPermisos[$permisoByUser[$i]['ID_Modulo']] = $permisoByUser[$i];
		}
		$permisos = "";
		$permisosMod = "";



		if (count($arrPermisos) > 0) {
			$permisos = $arrPermisos;
			$permisosMod = isset($arrPermisos[$idModulo]) ? $arrPermisos[$idModulo] : '';	
		}
		
		$_SESSION['permisos'] = $permisos;
		$_SESSION['permisosMod'] = $permisosMod;
		*/	
	}
	/**
	 *
	 * dimanizar y traer los permisos del menu de navegacion
	 *
	 */
	public static function nav(){
		$sql = DB::SQL("SELECT ID as idpagina, Titulo as titulo, Icono as icono FROM pagina");
		$completo = "_Dashboard";
		foreach ($sql as $item) {
			if (!empty($_SESSION['permisos'][$item["idpagina"]]['r']))
			{
				echo "<li class='nav-item'>
        				<a class='nav-link collapsed' href='".base_url."/".$item["titulo"]."".$completo."'>
          					<i class='".$item["icono"]."'></i>
          					<span>".$item["titulo"]."</span>
        				</a>
      				 </li>";
			}
		}
	}
	/**
	 *
	 * dimanizar y traer los permisos del menu de navegacion y sus submenues
	 *
	 */
	public static function getMenu(){
		$consulta = DB::SQL("SELECT * FROM pagina");
		$menus = [];

		foreach ($consulta as $index => $row) {
			if ($row['ID_Menu']) {
				$id = $row['ID_Menu'];

				$menus['menu_'.$id]['submenu'][] = [
					'id' => $row['ID'],
					'titulo' => $row['Titulo'],
					'page' => $row['Page'],
					'icono' => $row['Icono']
				];
			}else{
				$id = $row['ID'];

				$menus["menu_".$id] = [
					'id' => $row['ID'],
					'titulo' => $row['Titulo'],
					'page' => $row['Page'],
					'icono' => $row['Icono']
				];
			}
		}

		return $menus;
	}

	public static function mostrarMenu()
	{
		$menus = self::getMenu();

		if(!$menus){
			return "No existe ningun menú en la base de datos";
		}
		$html = "";
		$completo = "_Dashboard";
		foreach ($menus as $menu) 
		{
			if (isset($menu["submenu"]))
			{
				if (!empty($_SESSION['permisos'][$menu["id"]]['r']))
				{
					if ($menu["page"])
					{
						$html .= '<li class="nav-item">
					        		<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="'.base_url.''.$menu['page'].''.$completo.'">
					          		<i class="'.$menu['icono'].'"></i><span> '.$menu['titulo'].' </span><i class="bi bi-chevron-down ms-auto"></i>
					        		</a>';
					}else
					{
						$html .= '<li class="nav-item">
					        		<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
					          		<i class="'.$menu['icono'].'"></i><span> '.$menu['titulo'].' </span><i class="bi bi-chevron-down ms-auto"></i>
					        		</a>';
					}

					if (is_array($menu["submenu"])) 
					{
						$html .= '<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">';

						foreach ($menu["submenu"] as $submenu)
						{
							if ($submenu["page"])
							{
								$html .= '<li>
					            			<a href="'.base_url.'/'.$submenu['page'].''.$completo.'">
					              				<i class="'.$submenu['icono'].'"></i><span>'.$submenu['titulo'].'</span>
					            			</a>
					          			</li>';
							}else
							{

								$html .= '<li>
					            			<a href="#">
					              				<i class="'.$submenu['icono'].'"></i><span>'.$submenu['titulo'].'</span>
					            			</a>
					          			</li>';
							}
						}
						$html .= '</ul>';
						$html .= '</li>';
					}



				}


			}else
			{
				if (!empty($_SESSION['permisos'][$menu["id"]]['r']))
				{
					if ($menu["page"]) 
					{
						$html .= '<li class="nav-item">
					       			 <a class="nav-link collapsed" href="'.base_url.'/'.$menu['page'].''.$completo.'">
					          			<i class="'.$menu['icono'].'"></i>
					          			<span>'.$menu['titulo'].'</span>
					        		</a>
					      		</li>';
					}else
					{
						$html .= '<li class="nav-item">
					       			 <a class="nav-link collapsed">
					          			<i class="'.$menu['icono'].'"></i>
					          			<span>'.$menu['titulo'].'</span>
					        		</a>
					      		</li>';
					}
				}
			}
		}
		return $html;
	}
	/**
	 *
	 * permiso crear
	 *
	 */
	public static function create(){
		if (!empty($_SESSION['permisosPag']['c'])) {
			return true;
		}
	}
	public static function read(){
		if (!empty($_SESSION['permisosPag']['r'])) {
			return true;
		}
	}
	public static function updater(){
		if (!empty($_SESSION['permisosPag']['u'])) {
			return true;
		}
	}
	public static function deleter(){
		if (!empty($_SESSION['permisosPag']['d'])) {
			return true;
		}
	}

}