<?php

/**
 * sessiones
 */
class Auth
{

	/**
	 *
	 * @void sessiones // session de usuario 
	 * guarda toda la data del usuario en uan variable
	 */

	public static function sessionUser($idUser)
	{
		$respuesta = DB::SQL("SELECT * FROM usuario as u INNER JOIN rol as r ON u.ID_Rol = r.ID WHERE u.ID = $idUser");
		$_SESSION["userData"] = $respuesta[0];
		return $respuesta[0];
	}
	/**
	 *
	 * @void sessiones // no autenticado
	 *
	 */
	
	public static function noAuth()
	{
		if (!isset($_SESSION['login'])) {
			header('Location:'.base_url.'/Login');
		}
	}

	/**
	 *
	 * @void sessiones // cerrar session
	 *
	 */
	public static function logout()
	{
		session_start();
		session_destroy();
		$_SESSION = [];
		header('Location:'.base_url.'/Login');
	}

	public static function logoutHome(){
		if (isset($_SESSION['login'])) {
			session_destroy();
			$_SESSION = [];
		}
	}
}