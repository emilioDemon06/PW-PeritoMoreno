<?php


class Logout extends Controllers
{
	
	public function index()
	{
		//instancia la clases logout para cerrar session
		Auth::logout();
	}
}