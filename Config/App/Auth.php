<?php

/**
 * sessiones
 */
class Auth
{

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