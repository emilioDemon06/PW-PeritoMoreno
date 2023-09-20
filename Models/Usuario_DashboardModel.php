<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class Usuario_DashboardModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		public static function all()
		{
			$respuesta = DB::SQL("SELECT us.ID, us.Nombre as NombreUser, r.Nombre as NombreRol, us.Correo,us.is_activo FROM usuario as us INNER JOIN rol as r ON us.ID_Rol = r.ID");
			return $respuesta;
		}
		public static function roles()
		{
			$respuesta = DB::SQL("SELECT * FROM rol");
			return $respuesta;
		}

	}