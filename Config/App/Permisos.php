<?php  


/**
 * permisos de usuarios a distintos modulos
 */
class Permisos
{
	

	public static function getPermisos($idModulo)
	{
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
		

	}
}